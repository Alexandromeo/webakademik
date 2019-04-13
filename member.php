<?php

include "koneksi.php";
error_reporting(0);
session_start();

$induk = $_POST['induk'];
$password = $_POST['password'];
$level = $_POST['level'];

$cek = mysqli_query($konek, "select * from akun where induk = '$induk' && binary password ='$password'");
$data = mysqli_fetch_array($cek);
$jumlah = mysqli_num_rows($cek);

if ($jumlah>0)
{
	$_SESSION['induk'] = $data['induk'];
	$_SESSION['password'] = $data['password'];
	$_SESSION['level'] = $data['level'];


	//untuk seleksi login siswa / guru
	if ($level == "guru")
	{
		echo "<meta content='0; url=admin/guru.php' http-equiv='refresh'>";
	}

	else
	{
		echo "<meta content='0; url=admin/siswa.php' http-equiv='refresh'>";
	}
}

//pass atau username salah
else
{
	echo "<script>alert('No. Induk/Password/Status Salah')</script>";
	echo "<meta content='0; url=login.php' http-equiv='refresh'>";
}
?>