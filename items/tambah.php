<?php
session_start();
include '../config/koneksi.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Jika tombol submit ditekan
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id']; // tambahan

    mysqli_query($conn, "INSERT INTO items (name, stock, price, category_id) 
    VALUES ('$name','$stock','$price','$category_id')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h3>Tambah Barang</h3>

<form method="POST">

    <div class="mb-3">
        <label>Nama Barang</label>
        <input name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input name="stock" type="number" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input name="price" type="number" class="form-control" required>
    </div>

    <!--TAMBAHAN KATEGORI -->
    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>

            <?php
            $cat = mysqli_query($conn, "SELECT * FROM categories");
            while($c = mysqli_fetch_assoc($cat)) {
            ?>
                <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
            <?php } ?>

        </select>
    </div>

    <button name="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</body>
</html>