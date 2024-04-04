<?php
session_start();

include 'koneksi.php'; // Sertakan file koneksi.php

// Mendapatkan data dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Query berdasarkan role yang dipilih
if ($role == 'admin') {
    $query = "SELECT * FROM Admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        // Login berhasil untuk admin
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header("Location: admin.php"); // Redirect ke halaman admin
    } else {
        // Login gagal
        $_SESSION['login_error'] = "Username atau password salah.";
        header("Location: login.php"); // Redirect kembali ke halaman login
    }
} else if ($role == 'user') {
    $query = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        // Login berhasil untuk pengguna
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        header("Location: user.php"); // Redirect ke halaman dashboard pengguna
    } else {
        // Login gagal
        $_SESSION['login_error'] = "Username atau password salah.";
        header("Location: login.php"); // Redirect kembali ke halaman login
    }
}

// Tutup koneksi
$conn->close();
?>
