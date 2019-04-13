<?php

include "koneksi.php";

session_start();

$induk = $_POST['induk'];
$password = $_POST['password'];
$konfirmasi = $_POST['konfirmasipassword'];
$level = $_POST['level'];

$duplikatnim = mysqli_query($konek, "select * from akun where induk = '$induk'");
$objnim = mysqli_fetch_assoc($duplikatnim);

if ($konfirmasi == $password)
{
	$query = mysqli_query($konek, "insert into akun values ('$induk', '$password', '$level')");
	$_SESSION['induk'] = $induk;
	$_SESSION['password'] = $password;
	$_SESSION['level'] = $level;

	if ($query)
	{
		if ($_SESSION['level'] == "siswa")
		{
			echo "<meta http-equiv='refresh' content='0; url=admin/siswa.php'>";
		}

		else
		{
			echo "<meta http-equiv='refresh' content='0; url=admin/guru.php'>";
		}
	}

	if ($objnim)
	{
		echo "<script>alert('No. Induk Pernah Didaftarkan')</script>";
		echo "<meta content='0; url=signup.php' http-equiv='refresh'>";
	}
}

elseif ($konfirmasi != $password) 
{
	echo "<script>alert('Password dan Konfirmasi Tidak Sama')</script>";
	echo "<meta content='0; url=signup.php' http-equiv='refresh'>";
}

else
{
	echo "<script>alert('Gagal Membuat Akun')</script>";
	echo "<meta content='0; url=signup.php' http-equiv='refresh'>";
}
?>