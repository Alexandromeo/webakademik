<?php
include "../koneksi.php";
include "../php/lib.php";
error_reporting(0);
session_start();

if ($_SESSION['level'] == "guru")
{
	echo "<script>alert('Username `Guru` Sudah Terdaftar Sebagai Admin')</script>";
	echo "<meta content='0; url=../login.php' http-equiv='refresh'>";
	session_destroy();
}

if (empty($_SESSION['induk']) && empty($_SESSION['password']))
{
	echo "<script>alert('Anda Harus Login Sebagai Siswa Dahulu')</script>";
	echo "<meta content='0; url=../login.php' http-equiv='refresh'>";
	session_destroy();
}

$_GET['nis'] = $_SESSION['nis'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Beranda : Siswa</title>
	<style type="text/css">
		.tengah
		{
			margin-left: 40%;
		}

		#tengah
		{
			margin-left: 30%;
			font-family: "Aharoni";
		}

		#tengahbawah
		{
			margin-left: 39%;
		}
	</style>
</head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<body>

<?= headersiswa(); ?>

<div class="kontentitle">
	<br><h2>Beranda</h2>
	<hr noshade width="90%">
</div>
<div class="konten">
	<span class="tengah">
		<img src="../img/siswa.jpg">
	</span><br><br>

	<span id="tengah">
		Anda Bisa Melihat Data Anda Sendiri Dengan Cara<br>
		<span id="tengahbawah">
			Klik Tombol di Bawah<br><br>
		</span>

		<span id="tengahbawah">
			<a href="lihat.php"><input type="button" value="Lihat Data Anda Sendiri" class="okbtn"></a>
		</span>
	</span>
</div>
</body>
</html>