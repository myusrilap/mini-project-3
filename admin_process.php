<?php
session_start();
include 'koneksi.php';

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

// Periksa aksi yang diminta
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'create') {
        // Jika aksi adalah 'create', tampilkan form tambah data
        include 'form_create.php';
    } elseif ($action === 'store') {
        // Jika aksi adalah 'store', simpan data yang dikirimkan dari form tambah
        // Lakukan validasi data dan masukkan ke database
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $lokasi = $_POST['lokasi'];
        $kategori = $_POST['kategori'];
        $range_gaji = $_POST['range_gaji'];

        $sql = "INSERT INTO Jobs (judul, deskripsi, lokasi, kategori, range_gaji) 
                VALUES ('$judul', '$deskripsi', '$lokasi', '$kategori', '$range_gaji')";

        if ($conn->query($sql) === TRUE) {
            header("Location: admin.php"); // Setelah berhasil menyimpan, kembali ke halaman admin
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action === 'edit') {
        // Jika aksi adalah 'edit', tampilkan form edit data
        $id = $_GET['id'];
        $sql = "SELECT * FROM Jobs WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            include 'form_edit.php';
        } else {
            echo "Data tidak ditemukan";
        }
    } elseif ($action === 'update') {
        // Jika aksi adalah 'update', simpan data yang diubah dari form edit
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $lokasi = $_POST['lokasi'];
        $kategori = $_POST['kategori'];
        $range_gaji = $_POST['range_gaji'];

        $sql = "UPDATE Jobs SET judul='$judul', deskripsi='$deskripsi', lokasi='$lokasi', kategori='$kategori', range_gaji='$range_gaji' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: admin.php"); // Setelah berhasil mengupdate, kembali ke halaman admin
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action === 'delete') {
        // Jika aksi adalah 'delete', hapus data berdasarkan ID
        $id = $_GET['id'];
        $sql = "DELETE FROM Jobs WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: admin.php"); // Setelah berhasil menghapus, kembali ke halaman admin
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
