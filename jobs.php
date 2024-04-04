<?php
// Include file koneksi database
include 'koneksi.php';

// Ambil data dari database
$sql = "SELECT * FROM Jobs";
$result = $conn->query($sql);

// Ambil data kategori unik dari database untuk filter
$sql_kategori = "SELECT DISTINCT kategori FROM Jobs";
$result_kategori = $conn->query($sql_kategori);

// Ambil data lokasi unik dari database untuk filter
$sql_lokasi = "SELECT DISTINCT lokasi FROM Jobs";
$result_lokasi = $conn->query($sql_lokasi);

// Ambil data range gaji unik dari database untuk filter
$sql_range_gaji = "SELECT DISTINCT range_gaji FROM Jobs";
$result_range_gaji = $conn->query($sql_range_gaji);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pekerjaan</title>
    <!-- Tautkan CSS Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="mt-5">Daftar Pekerjaan</h1>
    <form method="GET">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" id="kategori" name="kategori">
                    <option value="">Semua Kategori</option>
                    <?php while($row = $result_kategori->fetch_assoc()): ?>
                        <option value="<?php echo $row['kategori']; ?>"><?php echo $row['kategori']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <select class="form-select" id="lokasi" name="lokasi">
                    <option value="">Semua Lokasi</option>
                    <?php while($row = $result_lokasi->fetch_assoc()): ?>
                        <option value="<?php echo $row['lokasi']; ?>"><?php echo $row['lokasi']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="range_gaji" class="form-label">Range Gaji</label>
                <select class="form-select" id="range_gaji" name="range_gaji">
                    <option value="">Semua Range Gaji</option>
                    <?php while($row = $result_range_gaji->fetch_assoc()): ?>
                        <option value="<?php echo $row['range_gaji']; ?>"><?php echo $row['range_gaji']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
                <th>Kategori</th>
                <th>Range Gaji</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Filter berdasarkan kategori, lokasi, dan range gaji jika ada
            $filter_kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
            $filter_lokasi = isset($_GET['lokasi']) ? $_GET['lokasi'] : '';
            $filter_range_gaji = isset($_GET['range_gaji']) ? $_GET['range_gaji'] : '';
            
            $sql_filter = "SELECT * FROM Jobs WHERE 1=1";
            if (!empty($filter_kategori)) {
                $sql_filter .= " AND kategori='$filter_kategori'";
            }
            if (!empty($filter_lokasi)) {
                $sql_filter .= " AND lokasi='$filter_lokasi'";
            }
            if (!empty($filter_range_gaji)) {
                $sql_filter .= " AND range_gaji='$filter_range_gaji'";
            }
            
            $result_filter = $conn->query($sql_filter);

            if ($result_filter->num_rows > 0) {
                while($row = $result_filter->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["judul"] . "</td>";
                    echo "<td>" . $row["deskripsi"] . "</td>";
                    echo "<td>" . $row["lokasi"] . "</td>";
                    echo "<td>" . $row["kategori"] . "</td>";
                    echo "<td>" . $row["range_gaji"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data yang sesuai dengan filter</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Tautkan JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>

<?php
$conn->close();
?>
