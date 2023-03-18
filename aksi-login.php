<?php 
session_start();
include 'koneksi.php';
function cek_login($username,$password)
{
	include 'admin/koneksi.php';
	$query = mysqli_query($koneksi,"SELECT * FROM admin WHERE
		username='$username' AND password='$password'");
	$cek = mysqli_num_rows($query);
	if ($cek>0) {
		$data = mysqli_fetch_array($query);
		$_SESSION['level'] = $data['level'];
		$_SESSION['nama_petugas'] = $data['nama_petugas'];
		$_SESSION['id_petugas'] = $data['id_petugas'];
		$jenis="admin";
		return $jenis;
	}	
}

$username = $_POST['username'];
$password = $_POST['password'];

if (cek_login($username,$password)=="admin") {
    $_SESSION['username'] = $username;
	header("location:admin/");
}else {
	header("location:index.php?pesan=gagal");
}

 ?>