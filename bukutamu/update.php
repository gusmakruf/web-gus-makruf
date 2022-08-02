<!DOCTYPE html>
<html>
<head>
    <title>Form Buku tamu</title>
	<!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_tamu'])) {
        $id_tamu=input($_GET["id_tamu"]);

        $sql="select * from tamu where id_tamu=$id_tamu";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_tamu=htmlspecialchars($_POST["id_tamu"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $no_hp=input($_POST["no_hp"]);
		$keperluan=input($_POST["keperluan"]);

        //Query update data pada tabel anggota
        $sql="update tamu set
			nama='$nama',
			alamat='$alamat',
			no_hp='$no_hp',
			keperluan='$keperluan'
			where id_tamu='$id_tamu'";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:home.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }

    ?>
    <h2>Update Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5" placeholder="Masukan Alamat" 
			required><?php echo $data['alamat']; ?></textarea>
        
		</div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" value="<?php echo 
			$data['no_hp']; ?>" placeholder="Masukan No HP" required/>
        </div>
		<div class="form-group">
            <label>keperluan:</label>
            <textarea name="keperluan" class="form-control" rows="5" 
			placeholder="Masukan keperluan" required><?php echo $data['keperluan']; ?></textarea>
        
		</div>

        <input type="hidden" name="id_tamu" value="<?php echo $data['id_tamu']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>