<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Tambah Data</title>
    <!-- Tautkan CSS Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="mt-5">Tambah Data Pekerjaan</h1>
    <form action="admin_process.php?action=store" method="POST">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <select class="form-select" id="lokasi" name="lokasi" required>
                <option selected disabled>Pilih Lokasi</option>
                <option value="Remote">Remote</option>
                <option value="Ditempat">Ditempat</option>
                <option value="Hybrid">Hybrid</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option selected disabled>Pilih Kategori</option>
                <option value="IT">IT</option>
                <option value="Keuangan">Keuangan</option>
                <option value="Pemasaran">Pemasaran</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="mb-3">
            <label for="range_gaji" class="form-label">Range Gaji</label>
            <select class="form-select" id="range_gaji" name="range_gaji" required>
                <option selected disabled>Pilih Range Gaji</option>
                <option value="< Rp1.000.000">< Rp1.000.000</option>
                <option value="Rp1.000.000 - Rp5.000.000">Rp1.000.000 - Rp5.000.000</option>
                <option value="> Rp5.000.000">> Rp5.000.000</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

<!-- Tautkan JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
