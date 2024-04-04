<?php
session_start();

// Periksa apakah pengguna telah login sebagai admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    // Jika tidak, arahkan ke halaman login
    header("Location: login.php");
    exit; // Hentikan eksekusi skrip
}

// Jika pengguna mengklik tombol logout
if (isset($_GET['logout'])) {
    // Hapus semua data sesi
    session_destroy();

    // Redirect ke halaman login
    header("Location: login.php");
    exit; // Hentikan eksekusi skrip
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tautkan CSS Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="mt-5">Admin Dashboard</h1>
    <a href="?logout" class="btn btn-danger mb-3">Logout</a>
    <a href="admin_process.php?action=create" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
                <th>Kategori</th>
                <th>Range Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php'; // Sertakan file koneksi.php
            
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
                    echo "<td>
                            <a href='admin_process.php?action=edit&id=" . $row["id"] . "' class='btn btn-primary'>Edit</a> 
                            <a href='admin_process.php?action=delete&id=" . $row["id"] . "' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
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

<!-- Tautkan JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
