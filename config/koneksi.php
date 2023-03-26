<?php
    $koneksi = mysqli_connect('localhost', 'root','','database_v3922033');

    if(!$koneksi)
    {
        die ("Koneksi dengan database gagal: " . mysqli_connect_errno(). mysqli_connect_error());
    }
?>