<?php

include 'config/app.php';

//menerima id_barang yang dipilih pengguna 
$id_barang = $_GET['id_barang'];

if (delete_barang($id_barang) > 0) {
    echo "<script>
            alert('Data barang berhasil dihapus');
            document.location.href = 'index.php';
            </script>";
} else {
    echo "<script>
            alert('Data barang gagal dihapus');
            document.location.href = 'index.php';
            </script>";
}

?>
