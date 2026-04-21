<?php
session_start();


// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {

    // Jika belum login → tampilkan alert + redirect
    echo "<script>
            alert('Anda harus login terlebih dahulu!');
            window.location='auth/login.php';
          </script>";
    exit;

} else {

    // Jika sudah login → masuk ke dashboard
    header("Location: items/index.php");
    exit;
}
?>