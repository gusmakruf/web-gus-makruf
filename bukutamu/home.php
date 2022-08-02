<DOCTYPE html>
<html>
<head>
	<title> buku tamu</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>

<div class="container">
<div style= 'text-align:right;'>
<left><a href="logout.php" class="btn btn-primary" role="button">Log Out</a></left>
</div>

	<br>
	<h4>CRUD Sederhana Dengan PHP dan Boostrap</h4>
<?php
	
	include "koneksi.php";

	if (isset($_GET['id_tamu'])) {
		$id_tamu=htmlspecialchars($_GET["id_tamu"]);
		
		$sql="delete from tamu where id_tamu='$id_tamu'";
		$hasil=mysqli_query($kon,$sql);
		
		//kondisi apakah berhasil atau tidak
		if ($hasil){
			header("Location:home.php");
		}
		else {
			echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
		}
	}
?>

	<table class="table table-bordered table-hover"border="1";>
		<br>
		<thead>
		<tr>
		<th> No </th>
		<th> Nama </th>
		<th> Alamat </th>
		<th> No HP </th>
		<th> Keperluan </th>
		<th colspan='2'>Aksi</th>
		</tr>
		</thead>
	<?php
	include "koneksi.php";
	$sql="select * from tamu order by id_tamu desc";
	$hasil=mysqli_query($kon,$sql);
	$no=0;
	while ($data = mysqli_fetch_array($hasil)) {
		$no++;
		
		?>
<tbody>
<tr>
	<td><?php echo $no;?></td>
	<td><?php echo $data["nama"];?></td>
	<td><?php echo $data["alamat"];?></td>
	<td><?php echo $data["no_hp"];?></td>
	<td><?php echo $data["keperluan"];?></td>
	<td>
	<a href="update.php?id_tamu=<?php echo htmlspecialchars($data['id_tamu']); ?>" 
	class="btn btn-warning" 
	role="button">Update</a>
	<a href= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
	?>?id_tamu=<?php echo $data['id_tamu']; ?>" class="btn btn-danger" role="button">Delete</a>
	</td>
	</tr>
</tbody>
<?php
	}
?>
</table>
<a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>

	
</div>
</body>
</html>	