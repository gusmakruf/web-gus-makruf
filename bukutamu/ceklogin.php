<?php
include "koneksi.php";

$username =$_POST['username'];
$password =$_POST['password'];

$username =stripslashes($username);
$password =stripslashes($password);

$username = mysqli_real_escape_string($kon,$username);
$password = mysqli_real_escape_string($kon,$password);

$sql="SELECT * FROM member WHERE username ='$username' and password='$password'";
$result=mysqli_query($kon,$sql);
$count=mysqli_num_rows($result);

if ($count == 1) {
echo "<script>window.location = 'home.php';</script>";
}
else {
echo "Username atau Password yang anda masukkan salah";
}
?>