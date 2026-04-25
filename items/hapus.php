<?php
session_start();
include '../config/koneksi.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Validasi ID
if (isset($_GET['id'])) {

    $id = intval($_GET['id']);  
    // Hapus data
    mysqli_query($conn, "DELETE FROM items WHERE id=$id");

}

// Redirect
header("Location: index.php");
exit;
?>