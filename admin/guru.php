<?php
include "../koneksi.php";
include "../php/lib.php";
error_reporting(0);
session_start();

if ($_SESSION['level'] != "guru")
{
	echo "<script>alert('Anda Harus Login Sebagai Guru Dahulu')</script>";
	echo "<meta content='0; url=../login.php' http-equiv='refresh'>";
	session_destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Beranda : Guru</title>
	<style type="text/css">
		.tulisankiri
		{
			margin-left: 80px;
			font-family: "Aharoni";
		}

		.tulisankanan
		{
			margin-left: 200px;
			font-family: "Aharoni";
		}
	</style>
</head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<body>

<?= headerguru(); ?>

<div class="kontentitle">
	<br><h2>Beranda</h2>
	<hr noshade width="90%">
</div>
<div class="konten">
	<div class="landingpagekiri">
		<img src="../img/guru.jpg">
	</div>

	<div class="landingpagekanan">
		<img src="../img/siswa.jpg">
	</div>
	
	<br>
	<span class="tulisankiri">
		Tambah atau Lihat Data Guru dengan Cara
	</span>

	<span class="tulisankanan">
		Tambah atau Lihat Data Siswa dengan Cara
	</span>

	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tulisankiri" text-align="center">Klik Tombol di Bawah</span>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tulisankanan" text-align="center">Klik Tombol di Bawah</span><br><br>

	<hr noshade width="90%">
	<span class="tulisankiri">
		<a href="lihatguru.php"><input type="button" value="Lihat Data Guru" class="okbtn"></a>
		<a href="tambahguru.php"><input type="button" value="Tambah Data Guru" class="goodbtn"></a>
	</span>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<span class="tulisankanan">
		<a href="lihatsiswa.php"><input type="button" value="Lihat Data Siswa" class="okbtn"></a>
		<a href="tambahsiswa.php"><input type="button" value="Tambah Data Siswa" class="goodbtn"></a>
	</span>
</div>
</body>
</html>