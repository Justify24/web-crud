<?php
include 'config/app.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contoh Tampilan Table dengan Bootstrap</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Navbar</a>
    </nav>
</div>

<div>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Suku Cadang</h2>
            <div>
                <a href="tambahbarang.php" class="btn btn-success mr-2">Tambah</a>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">Tanggal Terima</th>
                    <th scope="col">Support</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Foto Barang</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">HAPUS</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_barang as $barang): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $barang['id_barang'] ?></td>
                    <td><?= $barang['nama'];?></td>
                    <td><?= date('d/m/Y', strtotime($barang['tanggal']));?></td>
                    <td><?= $barang['support'];?></td>
                    <td><?= $barang['kondisi'];?></td>
                    <td>
                        <center>
                            <img src="asset/<?= $barang['foto'];?>" border="0" width="70px" height="70px"/>
                        </center>
                    </td>
                    <td>
                        <a type="button" class="btn btn-secondary" href="editbarang.php?id_barang=<?= $barang['id_barang'];?>">Edit</a>
                    </td>
                    <td>
                        <a type="button" class="btn btn-secondary" href="hapusbarang.php?id_barang=<?= $barang['id_barang'];?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>              
            </tbody>
        </table>
    </div>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
