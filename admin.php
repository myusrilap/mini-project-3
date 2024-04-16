<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna telah login sebagai superadmin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    // Jika tidak, arahkan ke halaman login
    header("Location: login.php");
    exit; // Hentikan eksekusi skrip
}

// Jika pengguna mengklik tombol logout
if (isset($_GET['logout'])) {
    // Hapus semua data sesi
    session_unset();
    session_destroy();

    // Redirect ke halaman login
    header("Location: index.php");
    exit; // Hentikan eksekusi skrip
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin Dashboard</title>
    <!-- Tautkan CSS Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tautkan CSS Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card-header {
            background-color: #dc3545; /* Warna merah */
            color: #fff;
        }
        .card {
            border-radius: 15px;
        }
        .job-table {
            width: 100%;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btn-lg {
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-edit,
        .btn-delete {
            color: #dc3545; /* Warna merah */
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center mb-5">Admin Dashboard</h1>
    <div class="btn-container">
        <a href="form_create.php" class="btn btn-primary btn-lg">
            <i class="fas fa-plus-circle"></i> Tambah Data
        </a>
        <a href="?logout" class="btn btn-danger btn-lg">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Data Pekerjaan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped job-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Lokasi</th>
                                <th>Kategori</th>
                                <th>Range Gaji</th>
                                <th>Aksi</th> <!-- Kolom untuk tombol edit dan hapus -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Ambil data dari database untuk menampilkan di tabel
                            $sql = "SELECT * FROM Jobs";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["judul"] . "</td>";
                                    echo "<td>" . $row["deskripsi"] . "</td>";
                                    echo "<td>" . $row["lokasi"] . "</td>";
                                    echo "<td>" . $row["kategori"] . "</td>";
                                    echo "<td>" . $row["range_gaji"] . "</td>";
                                    // Tambah tombol edit dan hapus dengan link ke halaman admin_process.php
                                    echo "<td>
                                            <a href='sadmin_process.php?action=edit&id=" . $row["id"] . "' class='btn btn-edit'><i class='fas fa-edit'></i> Edit</a>
                                            <a href='admin_process.php?action=delete&id=" . $row["id"] . "' class='btn btn-delete'><i class='fas fa-trash-alt'></i> Hapus</a>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tautkan JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
