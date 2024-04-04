<?php
// Include koneksi ke database
include 'koneksi.php';

// Tangkap data yang dikirimkan dari formulir registrasi
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];
$pendidikan = $_POST['pendidikan'];
$gender = $_POST['gender'];

// Periksa apakah username sudah ada di database
$check_username_query = "SELECT * FROM Users WHERE username = '$username'";
$result = $conn->query($check_username_query);

if ($result->num_rows > 0) {
    // Username sudah ada, kirim respons ke klien bahwa registrasi gagal
    $response = [
        'success' => false,
        'message' => 'Username sudah digunakan. Silakan gunakan username lain.'
    ];
} else {
    // Username belum ada, lanjutkan dengan menyimpan data ke dalam database
    $sql = "INSERT INTO Users (username, password, nama, email, nomor_telepon, alamat, pendidikan, gender) 
            VALUES ('$username', '$password', '$nama', '$email', '$nomor_telepon', '$alamat', '$pendidikan', '$gender')";

    if ($conn->query($sql) === TRUE) {
        // Registrasi berhasil, kirim respons ke klien bahwa registrasi berhasil
        $response = [
            'success' => true,
            'message' => 'Registrasi berhasil.'
        ];
    } else {
        // Registrasi gagal karena terjadi kesalahan server, kirim respons ke klien bahwa registrasi gagal
        $response = [
            'success' => false,
            'message' => 'Terjadi kesalahan. Registrasi gagal. Silakan coba lagi.'
        ];
    }
}

// Tutup koneksi ke database
$conn->close();

// Kirim respons ke klien dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
