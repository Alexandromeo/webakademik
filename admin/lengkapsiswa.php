<?php
include "../koneksi.php";
include "../php/lib.php";
error_reporting(0);
session_start();

$nis = $_GET['nis'];

$cek = mysqli_query($konek, "select * from datasiswa where nis = '$nis'");
$jumlah = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);

if (!$jumlah)
{
	echo "<script>alert('NIS Tidak Ada')</script>";
	echo "<meta content='0; url=lihatsiswa.php' http-equiv='refresh'>";
}

if (($nis != $_SESSION['induk']) && ($_SESSION['level'] != "guru"))
{
	echo "<script>alert('Anda Tidak Punya Hak Akses Atas NIS Ini')</script>";
	echo "<meta content='0; url=../login.php' http-equiv='refresh'>"; 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lihat Data Lengkap : Siswa</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<?php 
	if ($_SESSION['level'] == "siswa")
	{
		headersiswa();
	}
	elseif ($_SESSION['level'] == "guru")
	{
		headerguru();
	}
	?>

<div class="kontentitle">
	<br><h2>Tambah Data Guru</h2>
	<hr noshade width="90%">
</div>
<div class="konten">
	<center><h2><font face ="Aharoni" color="#186">Data Lengkap Siswa</font></h2></center>
	<?php
	$nis = $_GET['nis'];
	$lengkapsiswa = mysqli_query($konek, "select datasiswa.*,  nilai.*, pelajaran.* from datasiswa, nilai, pelajaran where datasiswa.nis ='".$nis."' AND nilai.nis = pelajaran.nis");
	$data = mysqli_fetch_array($lengkapsiswa);

	if ($data['jk'] == "P")
	{
		$data['jk'] = "Perempuan";
	}

	else
	{
		$data['jk'] = "Laki-laki";
	}

	echo "<img src=../img/$data[foto] class='mlipir'>";
	echo '<center>
	<table>
		<tr>
			<th>NIS</th>
			<th>:</th>
			<td>'.$data['nis'].'</td>
		</tr>

		<tr>
			<th>Nama</th>
			<th>:</th>
			<td>'.$data['nama'].'</td>
		</tr>

		<tr>
			<th>Alamat</th>
			<th>:</th>
			<td>'.$data['alamat'].'</td>
		</tr>

		<tr>
			<th>Tempat, Tanggal Lahir</th>
			<th>:</th>
			<td>'.$data['tempatlahir'].', '.$data['tanggallahir'].' '.$data['bulanlahir'].' '.$data['tahunlahir'].'</td>
		</tr>

		<tr>
			<th>Jenis Kelamin</th>
			<th>:</th>
			<td>'.$data['jk'].'</td>
		</tr>

		<tr>
			<th>Kelas</th>
			<th>:</th>
			<td>'.$data['kelas'].' '.$data['jurusan'].'</td>
		</tr>
	</table></center>';
?>
	<hr noshade width="90%" height="1">
<center><h2><font face ="Aharoni" color="#186">Nilai Siswa</font></h2></center>

&nbsp;&nbsp;&nbsp;
<?='<a href="?nis='.$nis.'&nilai=Database"><input type="button" value="Lihat Nilai Database" class="okbtn"></a>';?>&nbsp;
<?='<a href="?nis='.$nis.'&nilai=OOP"><input type="button" value="Lihat Nilai Pemrograman Objek" class="okbtn"></a>';?>&nbsp;
<?='<a href="?nis='.$nis.'&nilai=Pemdas"><input type="button" value="Lihat Nilai Pemrograman Dasar" class="okbtn"></a>';?>&nbsp;
<?='<a href="?nis='.$nis.'&nilai=Pemdesk"><input type="button" value="Lihat Nilai Pemrograman Desktop" class="okbtn"></a>';?>&nbsp;
<?='<a href="?nis='.$nis.'&nilai=Pemweb"><input type="button" value="Lihat Nilai Pemrograman Web" class="okbtn"></a>';?>&nbsp;

<?php

if ($_GET['nilai'] == "Database")
{
	$id = $nis."a";
	$lengkapsiswa = mysqli_query($konek, "select datasiswa.*,  nilai.*, pelajaran.* from datasiswa, nilai, pelajaran where datasiswa.nis ='".$nis."' AND nilai.id = '".$id."'");
	$data = mysqli_fetch_array($lengkapsiswa);
	echo '<center><br><br><b><h4>Database</h4></b>

	<table>
	<tr>
		<th>UH 1</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh1"].'></th>
	</tr>

	<tr>
		<th>UH 2</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh2"].'></th>
	</tr>

	<tr>
		<th>UH 3</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh3"].'></th>
	</tr>

	<tr>
		<th>UTS</th>
		<th><input type="text" disabled class="logininput" value='.$data["uts"].'></th>
	</tr>

	<tr>
		<th>UKK</th>
		<th><input type="text" disabled class="logininput" value='.$data["ukk"].'></th>
	</tr>
		
</table><center>';
}

elseif ($_GET['nilai'] == "OOP")
{
	$id = $nis."b";
	$lengkapsiswa = mysqli_query($konek, "select datasiswa.*,  nilai.*, pelajaran.* from datasiswa, nilai, pelajaran where datasiswa.nis ='".$nis."' AND nilai.id = '".$id."'");
	$data = mysqli_fetch_array($lengkapsiswa);
	echo '<center><br><br><b><h4>Pemrograman Objek</h4></b>

	<table>
	<tr>
		<th>UH 1</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh1"].'></th>
	</tr>

	<tr>
		<th>UH 2</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh2"].'></th>
	</tr>

	<tr>
		<th>UH 3</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh3"].'></th>
	</tr>

	<tr>
		<th>UTS</th>
		<th><input type="text" disabled class="logininput" value='.$data["uts"].'></th>
	</tr>

	<tr>
		<th>UKK</th>
		<th><input type="text" disabled class="logininput" value='.$data["ukk"].'></th>
	</tr>
		
</table><center>';
}

elseif ($_GET['nilai'] == "Pemdas")
{
	$id = $nis."c";
	$lengkapsiswa = mysqli_query($konek, "select datasiswa.*,  nilai.*, pelajaran.* from datasiswa, nilai, pelajaran where datasiswa.nis ='".$nis."' AND nilai.id = '".$id."'");
	$data = mysqli_fetch_array($lengkapsiswa);
	echo '<center><br><br><b><h4>Pemrograman Dasar</h4></b>

	<table>
	<tr>
		<th>UH 1</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh1"].'></th>
	</tr>

	<tr>
		<th>UH 2</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh2"].'></th>
	</tr>

	<tr>
		<th>UH 3</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh3"].'></th>
	</tr>

	<tr>
		<th>UTS</th>
		<th><input type="text" disabled class="logininput" value='.$data["uts"].'></th>
	</tr>

	<tr>
		<th>UKK</th>
		<th><input type="text" disabled class="logininput" value='.$data["ukk"].'></th>
	</tr>
		
</table><center>';
}

elseif ($_GET['nilai'] == "Pemdesk")
{
	$id = $nis."d";
	$lengkapsiswa = mysqli_query($konek, "select datasiswa.*,  nilai.*, pelajaran.* from datasiswa, nilai, pelajaran where datasiswa.nis ='".$nis."' AND nilai.id = '".$id."'");
	$data = mysqli_fetch_array($lengkapsiswa);
	echo '<center><br><br><b><h4>Pemrograman Desktop</h4></b>

	<table>
	<tr>
		<th>UH 1</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh1"].'></th>
	</tr>

	<tr>
		<th>UH 2</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh2"].'></th>
	</tr>

	<tr>
		<th>UH 3</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh3"].'></th>
	</tr>

	<tr>
		<th>UTS</th>
		<th><input type="text" disabled class="logininput" value='.$data["uts"].'></th>
	</tr>

	<tr>
		<th>UKK</th>
		<th><input type="text" disabled class="logininput" value='.$data["ukk"].'></th>
	</tr>
		
</table><center>';
}

elseif ($_GET['nilai'] == "Pemweb")
{
	$id = $nis."e";
	$lengkapsiswa = mysqli_query($konek, "select datasiswa.*,  nilai.*, pelajaran.* from datasiswa, nilai, pelajaran where datasiswa.nis ='".$nis."' AND nilai.id = '".$id."'");
	$data = mysqli_fetch_array($lengkapsiswa);
	echo '<center><br><br><b><h4>Pemrograman Web</h4></b>

	<table>
	<tr>
		<th>UH 1</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh1"].'></th>
	</tr>

	<tr>
		<th>UH 2</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh2"].'></th>
	</tr>

	<tr>
		<th>UH 3</th>
		<th><input type="text" disabled class="logininput" value='.$data["uh3"].'></th>
	</tr>

	<tr>
		<th>UTS</th>
		<th><input type="text" disabled class="logininput" value='.$data["uts"].'></th>
	</tr>

	<tr>
		<th>UKK</th>
		<th><input type="text" disabled class="logininput" value='.$data["ukk"].'></th>
	</tr>
		
</table><center>';
}
?>
</div>
</body>
</html>