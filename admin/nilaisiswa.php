<?php
include "../koneksi.php";
include "../php/lib.php";

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
	<title>Tambah Nilai : Siswa</title>
</head>
<body>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<?= headerguru(); ?>

<div class="kontentitle">
	<br><h2>Tambah Nilai Siswa</h2>
	<hr noshade width="90%">
</div>

<div class="konten">
<form method="POST" action="">
	<center><h2><font face ="Aharoni" color="#186">Data Lengkap Siswa</font></h2></center>
	<?= datanilai(); ?>

	<hr noshade width="90%" height="1">
	<?= tambahnilai(); ?>
</form>
</div>
</body>
</html>

<?php

if (isset($_POST['tambahnilai']))
{
	$mapel = $_POST['mapel'];
	$nis = $_POST['nis'];
	$uh1 = $_POST['uh1'];
	$uh2 = $_POST['uh2'];
	$uh3 = $_POST['uh3'];
	$uts = $_POST['uts'];
	$ukk = $_POST['ukk'];

	if ($mapel == "Database")
	{
		$id = $nis."a";
	}
	elseif ($mapel == "Pemrograman Objek")
	{
		$id = $nis."b";
	} 
	elseif ($mapel == "Pemrograman Dasar") 
	{
		$id = $nis."c";
	}
	elseif ($mapel == "Pemrograman Desktop")
	{
		$id = $nis."d";
	}
	elseif ($mapel == "Pemrograman Web")
	{
		$id = $nis."e";
	}
	
	if ((!is_numeric($uh1)) || (!is_numeric($uh2)) || (!is_numeric($uh3)) || (!is_numeric($uts)) || (!is_numeric($ukk)))
	{
		echo "<script>alert('Nilai Harus Berupa Angka')</script>";
	}

	elseif ((is_numeric($uh1)) && (is_numeric($uh2)) && (is_numeric($uh3)) && (is_numeric($uts)) && (is_numeric($ukk)))
	{
		$cekmapel = mysqli_query($konek, "select * from pelajaran where id='$id'");
		$data = mysqli_num_rows($cekmapel);
	
		$tambahnilai = mysqli_query($konek, "insert into nilai values ('$nis','$uh1','$uh2','$uh3','$uts','$ukk','$id')");
		$tambahmapel = mysqli_query($konek, "insert into pelajaran values ('$id', '$mapel', '$nis')");

		if ($data<=0 && $tambahnilai && $tambahmapel)
		{
			echo "<script>alert('Nilai Berhasil Ditambahkan')</script>";
		}

		elseif ($data>=0)
		{
			echo "<script>alert('Nilai dengan Mapel dan NIS Ini Pernah Ditambahkan')</script>";
		}
		
		else
		{
			echo "<script>alert('Nilai Tidak Berhasil Ditambahkan')<script>";
		}
	}
}