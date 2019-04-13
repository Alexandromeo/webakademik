<?php
include "../koneksi.php";
include "../php/lib.php";
error_reporting(0);
session_start();

if (($_SESSION['level'] == "guru"))
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

$nis = $_GET['nis'];
$cek = mysqli_query($konek, "select * from datasiswa where nis = '$nis'");
$jumlah = mysqli_num_rows($cek);

if (!$jumlah)
{
	echo "<script>alert('NIS Tidak Ada')</script>";
	echo "<meta content='0; url=lihat.php' http-equiv='refresh'>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sunting Data : Siswa</title>
</head>
<body>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<?= headersiswa(); ?>

<div class="kontentitle">
	<br><h2>Sunting Data Siswa</h2>
	<hr noshade width="90%">
</div>
<div class="konten">
<form method="POST" action="lihat.php" enctype="multipart/form-data">
	<br><table>
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><input type="text" name="nis" value="<?= $_GET['nis']; ?>" readonly class="logininput"></td>
		</tr>

		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?= $_GET['nama']; ?>" required class="logininput"></td>
		</tr>

		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><input type="text" name="alamat" value="<?= $_GET['alamat']; ?>" required class="logininput"></td>
		</tr>

		<tr>
			<td>Tempat Lahir</td>
			<td>:</td>
			<td><input type="text" name="tempatlahir" placeholder="Tempat Lahir" required class="logininput"></td>
		</tr>

		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td>
				<select name="tanggallahir">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				</select>

				<select name="bulanlahir">
				<option value="Januari">Januari</option>
				<option value="Februari">Februari</option>
				<option value="Maret">Maret</option>
				<option value="April">April</option>
				<option value="Mei">Mei</option>
				<option value="Juni">Juni</option>
				<option value="Juli">Juli</option>
				<option value="Agustus">Agustus</option>
				<option value="September">September</option>
				<option value="Oktober">Oktober</option>
				<option value="November">November</option>
				<option value="Desember">Desember</option>
				</select>

				<select name="tahunlahir">
				<option value="<1998"><1998</option>
				<option value="1998">1998</option>
				<option value="1999">1999</option>
				<option value="2000">2000</option>
				<option value="2001">2001</option>
				<option value="2002">2002</option>
				<option value="2003">2003</option>
				<option value=">2003">>2003</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>Jurusan</td>
			<td>:</td>
			<td><input type="radio" name="jurusan" value="RPL" checked="">RPL 
				<input type="radio" name="jurusan" value="TKJ">TKJ 
				<input type="radio" name="jurusan" value="MM">MM
				<input type="radio" name="jurusan" value="AK">AK
				<input type="radio" name="jurusan" value="AP">AP
				<input type="radio" name="jurusan" value="PM">PM</td>
		</tr>

		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><input type="radio" name="kelas" value="X" checked="">X
				<input type="radio" name="kelas" value="XI">XI
				<input type="radio" name="kelas" value="XII">XII</td>
		</tr>

		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><input type="radio" name="jk" value="L" checked="">L
				<input type="radio" name="jk" value="P">P</td>
		</tr>

		<tr>
			<td>Foto</td>
			<td>:</td>
			<td><input type="file" name="foto" required></td>
		</tr>

		<tr>
			<td><input name="suntingdata" type="submit" value="Sunting" class="okbtn"></td></form>
			<td></td>
			<td><a href="lihat.php"><input type="button" value="Kembali" class="dgrbtn"></a></td>
		</tr>
	</table>
</div>
</body>
</html>