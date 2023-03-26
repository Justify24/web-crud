<?php

include 'config/app.php';

if (isset($_POST['tambah'])) {
	if (create_barang($_POST) > 0) {
		echo "<script>
				alert('Data barang berhasil ditambahkan');
				document.location.href = 'index.php';
				</script>";
	} else {
		echo "<script>
				alert('Data barang gagal ditambahkan');
				document.location.href = 'index.php';
				</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Suku Cadang</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

	<div>
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">Navbar</a>
		</nav>
	</div>

	<div class="container mt-5">
		<h1>Tambah Data Suku Cadang</h1>
		<form action="" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label for="id_barang">Kode barang:</label>
				<input type="text" class="form-control" id="id_barang" name="id_barang">
			</div>

			<div class="form-group">
				<label for="nama">Nama:</label>
				<input type="text" class="form-control" id="nama" name="nama">
			</div>

			<div class="form-group">
				<label for="tanggal">Tanggal Terima:</label>
				<input type="date" class="form-control" id="tanggal" name="tanggal">
			</div>
			
			<div class="form-group">
				<label for="support">Support Kendaraan:</label>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="motor" id="support_motor" name="support">
					<label class="form-check-label" for="support_kendaraan_motor">
						Motor
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="mobil" id="support_mobil" name="support">
					<label class="form-check-label" for="support_kendaraan_mobil">
						Mobil
					</label>
				</div>
			</div>

			<div class="form-group">
				<label for="kondisi">Kondisi:</label>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="kondisi" id="kondisi_baru" value="baru">
					<label class="form-check-label" for="kondisi_baru">
						Baru
					</label>
				</div>

				<div class="form-check">
					<input class="form-check-input" type="radio" name="kondisi" id="kondisi_bekas" value="bekas">
					<label class="form-check-label" for="kondisi_bekas">
						Bekas
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="foto">Foto Barang:</label>
				<input type="file" class="form-control-file" id="foto" value="foto" name="foto">	
			</div>
			<button type="submit" class="btn btn-primary" name="tambah" style="float:right;">Tambah</button>
		</form>
	</div>


<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
