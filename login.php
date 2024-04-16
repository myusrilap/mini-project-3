<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tautkan CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('img/bg2.jpg'); /* Ganti 'path_to_your_image.jpg' dengan path relatif atau absolut ke gambar Anda */
            background-size: cover; /* Untuk memastikan gambar meliputi seluruh area latar belakang */
            background-position: center; /* Untuk mengatur posisi gambar latar belakang */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <?php
                    session_start();
                    if (isset($_SESSION['login_error'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['login_error'] . '</div>';
                        unset($_SESSION['login_error']); // Hapus pesan kesalahan dari sesi setelah ditampilkan
                    }
                    ?>
                    <form method="POST" action="login_process.php">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" class="form-control" name="role">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tautkan JavaScript Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
