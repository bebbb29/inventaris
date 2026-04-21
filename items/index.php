<?php
session_start();
include '../config/koneksi.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Anda harus login terlebih dahulu!');
            window.location='../auth/login.php';
          </script>";
    exit;
}

// Ambil username dari session
$username = $_SESSION['username'];

$data = mysqli_query($conn, "SELECT * FROM items");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: #f4f6f9;
    }
    .card {
        border-radius: 15px;
    }
    </style>
</head>

<body>

<div class="container mt-5">

    <!-- Header -->
     <div class="alert alert-success">
    Selamat datang, <strong><?php echo $username; ?></strong></div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>📦 Inventaris toko olahraga</h3>
        <div>
            <a href="tambah.php" class="btn btn-success">+ Tambah</a>
            <a href="../auth/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Card Table -->
    <div class="card shadow">
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><span class="badge bg-info"><?= $row['stock'] ?></span></td>
                        <td>Rp <?= number_format($row['price']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>