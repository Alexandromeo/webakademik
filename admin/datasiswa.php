<?php
include "../koneksi.php";
include "../php/lib.php";
error_reporting(0);
session_start();

$nis = $_GET['nis'];

if ($_SESSION['level'] != "guru")
{
	echo "<script>alert('Anda Harus Login Sebagai Guru Dahulu')</script>";
	echo "<meta content='0; url=../login.php' http-equiv='refresh'>";
	session_destroy();
}

$cek = mysqli_query($konek, "select * from datasiswa where nis = '$nis'");
$jumlah = mysqli_num_rows($cek);

if (!$jumlah)
{
	echo "<script>alert('NIS Tidak Ada')</script>";
	echo "<meta content='0; url=lihatsiswa.php' http-equiv='refresh'>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sunting Data : Siswa</title>
</head>
<body>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<?= headerguru(); ?>


<div class="kontentitle">
	<br><h2>Sunting Data Siswa</h2>
	<hr noshade width="90%">
</div>
<form method="POST" action="lihatsiswa.php" enctype="multipart/form-data">
<div class="konten">
	<br><?=formeditsiswa();?>
</div>
</body>
</html>