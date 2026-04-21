<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
}

$id = $_GET['id'];

// Ambil data berdasarkan ID
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM items WHERE id=$id"));

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    // Update data
    mysqli_query($conn, "UPDATE items SET name='$name', stock='$stock', price='$price' WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h3>Edit Barang</h3>

<form method="POST">
    <div class="mb-3">
        <label>Nama Barang</label>
        <input name="name" value="<?= $data['name'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input name="stock" value="<?= $data['stock'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input name="price" value="<?= $data['price'] ?>" class="form-control">
    </div>

    <button name="submit" class="btn btn-warning">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>