<?php

include 'koneksi.php';

function select($query) {
	
	//panggil koneksi database 
	global $koneksi;

	$result = mysqli_query($koneksi, $query);
	$rows= [];

	while ($row = mysqli_fetch_array($result)) {
		$rows[] = $row;
	}

	return $rows;
}

$data_barang = select("SELECT * FROM barang");

//fungsi menambahkan data barang
function create_barang($post) {
	global $koneksi;
	
	$id_barang = $post['id_barang'];
	$nama = $post['nama'];
	$tanggal = $post['tanggal'];
	$support = $post['support'];
	$kondisi = $post['kondisi'];
	$foto = upload_file();
	  
	// check upload foto
	if (!$foto) {
		return false;
	}

	// query tambah data
	$query = "INSERT INTO barang (id_barang, nama, tanggal, support, kondisi, foto) VALUES 
	('$id_barang', '$nama', '$tanggal', '$support', '$kondisi', '$foto')";
	mysqli_query($koneksi, $query);
  
	return mysqli_affected_rows($koneksi);
}

  
//fungsi mengubah data barang
function update_barang($post){
    global $koneksi;


    $id_barang = strip_tags($post['id_barang']);
    $nama = strip_tags($post['nama']);
    $tanggal = strip_tags($post['tanggal']);
    $support = strip_tags($post['support']); // menggunakan implode untuk menggabungkan nilai dari checkbox yang dipilih menjadi satu string yang dipisahkan oleh koma
    $kondisi = strip_tags($post['kondisi']);
	$foto = strip_tags($post['foto']);
	
	// check upload foto baru atau tidak
	if (!$foto) {
		return false;
	}

    // query ubah data
    $query = mysqli_query($koneksi, "UPDATE barang SET id_barang='$id_barang' 
	nama='$nama', tanggal='$tanggal', support='$support', kondisi='$kondisi', foto='$foto'");

    return mysqli_affected_rows($koneksi);
	
}

//fungsi menghapus data barang
function delete_barang($id_barang){

	global $koneksi;

	//query hapus data barang
	$query = "DELETE FROM barang WHERE id_barang";

	mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//fungsi mengupload file
function upload_file()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $ekstensifileValid = ['jpg', 'jpeg', 'png'];
    $ekstensifile = explode('.', $namaFile);
    $ekstensifile = strtolower(end($ekstensifile));

    if (!in_array($ekstensifile, $ekstensifileValid)) {
        //pesan gagal
      echo "<script>
//            alert('Format File Tidak Valid');
//            document.location.href = 'index.php';
        </script>";
        die();
    }

    //check ukuran file 2 MB
    if ($ukuranFile > 2048000) {
        //pesan gagal
        echo "<script>
            alert('Ukuran File Max 2 MB');
            document.location.href = 'tambahbarang.php';
        </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid() . "." . $ekstensifile;

    //pindahkan ke folder local
    move_uploaded_file ($tmpName, 'asset/' . $namaFileBaru);
    return $namaFileBaru;
}
