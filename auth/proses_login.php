<?php
session_start();
include '../config/koneksi.php';


// Ambil input
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Query user
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($query);

// CEK USER
if ($user) {

    // CEK PASSWORD HASH
    if (password_verify($password, $user['password'])) {

        // Simpan session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // DEBUG (hapus nanti kalau sudah jalan)
        // echo "Login berhasil";

        // Redirect ke dashboard
        header("Location: ../items/index.php");
        exit;

    } else {
        echo "<script>alert('Password salah');window.location='login.php';</script>";
    }

} else {
    echo "<script>alert('Email tidak ditemukan');window.location='login.php';</script>";
}
?>