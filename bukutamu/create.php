<!DOCTYPE html>
<html>
<head>
	<title>Form Buku Tamu</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">

	<?php
	//Include file koneksi, untuk koneksikan ke database
	include "koneksi.php";
	
	//fungsi untuk mencegah inputan karakter yang tidak sesuai
	function input($data) {
			$data = trim($data); 
			$data = stripslashes($data); 
			$data = htmlspecialchars ($data);
			return $data;
	}
	//Cek apakah ada kiriman form dari method post
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		
		$nama=input($_POST["nama"]);
		$alamat=input($_POST["alamat"]);
		$no_hp=input($_POST["no_hp"]);
		$keperluan=input($_POST["keperluan"]);
		
		//Query input menginput data kedalam tabel tamu
		$sql="insert into tamu (nama,alamat,no_hp,keperluan)values
		('$nama','$alamat','$no_hp','$keperluan')";
		
		//Mengeksekusi/menjalankan query diatas
		$hasil=mysqli_query($kon,$sql);
		
		//kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
		if ($hasil) {
			header ("Location:home.php");
		}
		else {
			echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
		}
	}
		?>
		<h2>Input Data</h2>
		
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
			<div class="form-group">
				<label>Nama:</label>
				<input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
				
			</div>
			<div class="form-group">
				<label>Alamat:</label>
				<textarea name="alamat" class="form-control" rows="5" placeholder="Masukan Alamat" required></textarea>
				
			</div>
				<div class="form-group =">
				<label>No Hp:</label>
				<input type="text" name="no_hp" class="form-control" placeholder="Masukan No Hp" required/>
				
			</div>
			<div class="form-group">
				<label>Keperluan:</label>
				<textarea name="keperluan" class="form-control" rows="5" placeholder="Masukan keperluan" required></textarea>
			</div>
			
			<button type="submit" name="submit" class="btn btn-primary">submit</button>
		</form>
	</div>
	</body>
	</html>
			