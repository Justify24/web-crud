<?php

include 'config/app.php';

if (isset($_POST['ubah'])) {
	if (update_barang($_POST) > 0) {
		echo "<script>
				alert('Data barang berhasil diubahkan');
				document.location.href = 'index.php';
				</script>";
	} else {
		echo "<script>
				alert('Data barang gagal diubahkan');
				document.location.href = 'index.php';
				</script>";
	}
}
// ambil id dari barang
$id_barang = $_GET['id_barang'];
//quey ambil data mahasiswa
$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Suku Cadang</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

	<div>
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">Navbar</a>
		</nav>
	</div>

	<div class="container mt-2">
		<h1>ubah Data Suku Cadang</h1>
		<form action="" method="post">
			<input type="hidden" name="id_barang" value="<? $barang['id_barang'] ?>" />
			<input type="hidden" name="fotoLama" value="<?= $barang['foto']; ?>">

			<div class="form-group">
				<label for="id_barang">Kode barang:</label>
				<input type="text" class="form-control" id="id_barang" name="id_barang" value="<?= $barang['id_barang']; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="nama">Nama:</label>
				<input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']; ?>">
			</div>

			<div class="form-group">
				<label for="tanggal">Tanggal Terima:</label>
				<input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $barang['tanggal']; ?>">
			</div>
			
			<div class="form-group">
				<label for="support">Support Kendaraan:</label>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="motor" id="support_motor" name="support" <?php if(isset($barang['support']) && $barang['support'] == 'motor') echo 'checked'; ?>>
					<label class="form-check-label" for="support_kendaraan_motor">
						Motor
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="mobil" id="support_mobil" name="support" <?php if(isset($barang['support']) && $barang['support'] == 'mobil') echo 'checked'; ?>>
					<label class="form-check-label" for="support_kendaraan_mobil">
						Mobil
					</label>
				</div>
			</div>


			<div class="form-group">
				<label for="kondisi">Kondisi:</label>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="kondisi" id="kondisi_baru" value="baik" <?php if($barang['kondisi']=='baru') echo 'checked'?>>
					<label class="form-check-label" for="kondisi_baik">
						Baru
				 	</label>
				</div>

				<div class="form-check">
					<input class="form-check-input" type="radio" name="kondisi" id="kondisi_bekas" value="rusak"<?php if($barang['kondisi']=='bekas') echo 'checked'?>>
					<label class="form-check-label" for="kondisi_rusak">
						Bekas
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="foto">Foto Barang:</label>
				<input type="file" class="form-control-file" id="foto" name="foto" value ="<?= $barang['foto']; ?>">
				<p>
					<small>Gambar Sebelumnya</small>
				</p>
				<img src="asset/<?= $barang['foto']; ?>" alt="" width="100px">	
			</div>
			<button type="submit" class="btn btn-primary" name="ubah" style="float:right;">edit</button>
		</form>
	</div>


<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
