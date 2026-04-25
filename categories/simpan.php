<?php
include '../config/koneksi.php';

$name = $_POST['name'];

mysqli_query($conn, "INSERT INTO categories (name) VALUES ('$name')");

header("Location: index.php");
?>