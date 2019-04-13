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
	<title>Tambah Data : Siswa</title>
</head>
<body>
<form method="POST" action="lihatsiswa.php" enctype="multipart/form-data">

<link rel="stylesheet" type="text/css" href="../css/style.css">

<?= headerguru(); ?>

<div class="kontentitle">
	<br><h2>Tambah Data Siswa</h2>
	<hr noshade width="90%">
</div>
<div class="konten">
	<?= formtambahsiswa(); ?>
</div>
</form>
</body>
</html>