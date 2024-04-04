<?php

// Include file koneksi database
include 'koneksi.php';

// Periksa apakah pengguna telah login sebagai admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    // Jika tidak, arahkan ke halaman login
    header("Location: login.php");
    exit; // Hentikan eksekusi skrip
}

// Ambil data yang akan diedit dari database
$id = $_GET['id'];
$sql = "SELECT * FROM Jobs WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan";
    exit; // Hentikan eksekusi skrip jika data tidak ditemukan
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Edit Data</title>
    <!-- Tautkan CSS Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="mt-5">Edit Data Pekerjaan</h1>
    <form action="admin_process.php?action=update" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?php echo $row['deskripsi']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <select class="form-select" id="lokasi" name="lokasi" required>
                <option disabled>Pilih Lokasi</option>
                <option value="Remote" <?php if ($row['lokasi'] === 'Remote') echo 'selected'; ?>>Remote</option>
                <option value="Ditempat" <?php if ($row['lokasi'] === 'Ditempat') echo 'selected'; ?>>Ditempat</option>
                <option value="Hybrid" <?php if ($row['lokasi'] === 'Hybrid') echo 'selected'; ?>>Hybrid</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option disabled>Pilih Kategori</option>
                <option value="IT" <?php if ($row['kategori'] === 'IT') echo 'selected'; ?>>IT</option>
                <option value="Keuangan" <?php if ($row['kategori'] === 'Keuangan') echo 'selected'; ?>>Keuangan</option>
                <option value="Pemasaran" <?php if ($row['kategori'] === 'Pemasaran') echo 'selected'; ?>>Pemasaran</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="mb-3">
            <label for="range_gaji" class="form-label">Range Gaji</label>
            <select class="form-select" id="range_gaji" name="range_gaji" required>
                <option disabled>Pilih Range Gaji</option>
                <option value="< Rp1.000.000" <?php if ($row['range_gaji'] === '< Rp1.000.000') echo 'selected'; ?>>< Rp1.000.000</option>
                <option value="Rp1.000.000 - Rp5.000.000" <?php if ($row['range_gaji'] === 'Rp1.000.000 - Rp5.000.000') echo 'selected'; ?>>Rp1.000.000 - Rp5.000.000</option>
                <option value="> Rp5.000.000" <?php if ($row['range_gaji'] === '> Rp5.000.000') echo 'selected'; ?>>> Rp5.000.000</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<!-- Tautkan JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
