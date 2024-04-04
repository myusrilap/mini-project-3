<?php
// Sertakan file koneksi.php
include 'koneksi.php';
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    // Jika tidak, arahkan ke halaman login
    header("Location: login.php");
    exit; // Hentikan eksekusi skrip
}

// Ambil username pengguna dari sesi
$username = $_SESSION['username'];

// Periksa apakah parameter action=delete diterima untuk menghapus pendaftaran
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['job_id'])) {
    // Ambil job_id yang akan dihapus
    $job_id_to_delete = $_GET['job_id'];

    // Query untuk menghapus pendaftaran
    $sql_delete_registration = "DELETE FROM Registrations WHERE username = '$username' AND job_id = '$job_id_to_delete'";
    if ($conn->query($sql_delete_registration) === TRUE) {
        // Redirect kembali ke halaman user.php setelah penghapusan berhasil
        header("Location: user.php");
        exit;
    } else {
        echo "Error: " . $sql_delete_registration . "<br>" . $conn->error;
    }
}

// Query untuk mengambil data pengguna
$sql_user = "SELECT * FROM Users WHERE username = '$username'";
$result_user = $conn->query($sql_user);

// Query untuk mengambil daftar pekerjaan yang tersedia
$sql_jobs = "SELECT * FROM Jobs";
$result_jobs = $conn->query($sql_jobs);

// Query untuk mengambil daftar pekerjaan yang telah diapply oleh pengguna
$sql_applied_jobs = "SELECT Jobs.*, Registrations.id AS registration_id FROM Jobs INNER JOIN Registrations ON Jobs.id = Registrations.job_id WHERE Registrations.username = '$username'";
$result_applied_jobs = $conn->query($sql_applied_jobs);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>User Dashboard</h1>

    <!-- Data Diri -->
    <div class="card mt-3">
        <h5 class="card-header">Data Diri</h5>
        <div class="card-body">
            <?php
            if ($result_user->num_rows > 0) {
                while ($row = $result_user->fetch_assoc()) {
                    echo "<p class='card-text'><strong>Nama:</strong> " . $row["nama"] . "</p>";
                    echo "<p class='card-text'><strong>Email:</strong> " . $row["email"] . "</p>";
                    echo "<p class='card-text'><strong>Nomor Telepon:</strong> " . $row["nomor_telepon"] . "</p>";
                    // Tampilkan informasi lainnya sesuai kebutuhan
                }
            }
            ?>
        </div>
    </div>

    <!-- Daftar Pekerjaan Tersedia -->
    <div class="card mt-5">
        <h5 class="card-header">Daftar Pekerjaan Tersedia</h5>
        <ul class="list-group list-group-flush">
            <?php
            if ($result_jobs->num_rows > 0) {
                while ($row = $result_jobs->fetch_assoc()) {
                    echo "<li class='list-group-item'>";
                    echo "<strong>" . $row["judul"] . "</strong><br>";
                    echo "<p class='mb-1'>" . $row["deskripsi"] . "</p>";
                    echo "<p class='mb-1'><strong>Lokasi:</strong> " . $row["lokasi"] . "</p>";
                    echo "<p class='mb-1'><strong>Kategori:</strong> " . $row["kategori"] . "</p>";
                    echo "<p class='mb-1'><strong>Range Gaji:</strong> " . $row["range_gaji"] . "</p>";
                    echo "<a href='apply_job.php?job_id=" . $row["id"] . "' class='btn btn-primary'>Mendaftar</a>";
                    echo "</li>";
                }
            } else {
                echo "<li class='list-group-item'>Tidak ada pekerjaan tersedia</li>";
            }
            ?>
        </ul>
    </div>

    <!-- Daftar Pekerjaan yang Telah Diapply -->
    <div class="card mt-5">
        <h5 class="card-header">Daftar Pekerjaan yang Telah Diapply</h5>
        <ul class="list-group list-group-flush">
            <?php
            if ($result_applied_jobs->num_rows > 0) {
                while ($row = $result_applied_jobs->fetch_assoc()) {
                    echo "<li class='list-group-item'>";
                    echo "<strong>" . $row["judul"] . "</strong><br>";
                    echo "<p class='mb-1'>" . $row["deskripsi"] . "</p>";
                    echo "<p class='mb-1'><strong>Lokasi:</strong> " . $row["lokasi"] . "</p>";
                    echo "<p class='mb-1'><strong>Kategori:</strong> " . $row["kategori"] . "</p>";
                    echo "<p class='mb-1'><strong>Range Gaji:</strong> " . $row["range_gaji"] . "</p>";
                    echo "<a href='user.php?action=delete&job_id=" . $row["id"] . "' class='btn btn-danger'>Hapus</a>";
                    echo "</li>";
                }
            } else {
                echo "<li class='list-group-item'>Anda belum mendaftar ke lowongan pekerjaan manapun</li>";
            }
            ?>
        </ul>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
