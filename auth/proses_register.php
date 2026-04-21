<?php
include '../config/koneksi.php';

// Ambil data dari form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Enkripsi password (WAJIB)
$hash = password_hash($password, PASSWORD_BCRYPT);

// Simpan ke database
mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$username','$email','$hash')");

// Redirect ke login
echo "<script>alert('Registrasi berhasil!');window.location='login.php';</script>";
?>