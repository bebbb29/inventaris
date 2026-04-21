<?php
session_start();

// Kalau sudah login → langsung ke dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: ../items/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Sistem Inventaris Barang</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Background sama seperti login */
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
        }

        .register-card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .title {
            font-weight: bold;
            color: #4e73df;
        }

        .btn-custom {
            background-color: #4e73df;
            color: white;
        }

        .btn-custom:hover {
            background-color: #2e59d9;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="col-md-5">
        <div class="card register-card p-4">

            <!-- Judul -->
            <h3 class="text-center title mb-3">
                Daftar Akun
            </h3>
            <p class="text-center text-muted mb-4">
                Sistem Inventaris toko olahraga
            </p>

            <!-- Form Register -->
            <form action="proses_register.php" method="POST">

                <!-- Username -->
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi password" required>
                </div>

                <!-- Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom">Daftar</button>
                </div>

            </form>

            <!-- Link Login -->
            <div class="text-center mt-3">
                <small>
                    Sudah punya akun? 
                    <a href="login.php">Login</a>
                </small>
            </div>

        </div>
    </div>

</div>

</body>
</html>