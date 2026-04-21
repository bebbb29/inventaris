<?php 
// Memulai session
session_start(); 

// Jika sudah login → ke dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: ../items/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Inventaris toko olahraga</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Background gradasi */
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
        }

        /* Card login */
        .login-card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        /* Judul */
        .title {
            font-weight: bold;
            color: #4e73df;
        }

        /* Button custom */
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

    <div class="col-md-4">
        <div class="card login-card p-4">

            <!-- Judul -->
            <h3 class="text-center title mb-3">
                Sistem Inventaris toko olah raga
            </h3>
            <p class="text-center text-muted mb-4">
                Silakan login untuk melanjutkan
            </p>

            <!-- Form Login -->
            <form action="proses_login.php" method="POST">

                <!-- Username -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan username" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <!-- Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-custom">Login</button>
                </div>

            </form>

            <!-- Link Register -->
            <div class="text-center mt-3">
                <small>
                    Belum punya akun? 
                    <a href="register.php">Daftar</a>
                </small>
            </div>

        </div>
    </div>

</div>

</body>
</html>