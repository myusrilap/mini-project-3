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

// Periksa apakah parameter job_id telah diterima
if (isset($_GET['job_id']) && !empty($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    // Lakukan pendaftaran
    $sql_register = "INSERT INTO Registrations (username, job_id) VALUES ('$username', '$job_id')";
    if ($conn->query($sql_register) === TRUE) {
        // Redirect kembali ke halaman sebelumnya atau tampilkan pesan sukses
        header("Location: user.php");
        exit;
    } else {
        echo "Error: " . $sql_register . "<br>" . $conn->error;
    }
} else {
    echo "Parameter job_id tidak diterima.";
}
?>
