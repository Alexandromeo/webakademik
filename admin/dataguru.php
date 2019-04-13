<?php
include "../koneksi.php";
include "../php/lib.php";
error_reporting(0);
session_start();

$nip = $_GET['nip'];

if (($_SESSION['level'] != "guru"))
{
	echo "<script>alert('Anda Harus Login Sebagai Guru Dahulu')</script>";
	echo "<meta content='0; url=../login.php' http-equiv='refresh'>";
	session_destroy();
}

$cek = mysqli_query($konek, "select * from dataguru where nip = '$nip'");
$jumlah = mysqli_num_rows($cek);

if (!$jumlah)
{
	echo "<script>alert('NIP Tidak Ada')</script>";
	echo "<meta content='0; url=lihatguru.php' http-equiv='refresh'>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sunting Data : Guru</title>
</head>
<body>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<?= headerguru(); ?>


<div class="kontentitle">
	<br><h2>Sunting Data Guru</h2>
	<hr noshade width="90%">
</div>
<form method="POST" action="lihatguru.php" enctype="multipart/form-data">
<div class="konten">
	<br><table>
		<tr>
			<td>NIP</td>
			<td>:</td>
			<td><input type="text" name="nip" value="<?= $_GET['nip']; ?>" readonly class="logininput"></td>
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
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><input type="radio" name="jk" value="L" checked="">L
				<input type="radio" name="jk" value="P">P</td>
		</tr>

		<tr>
			<td>Mapel</td>
			<td>:</td>
			<td><select name="mapel">
				<option value="Database">Database</option>
				<option value="Pemrograman Berorientasi Objek">Pemrograman Objek</option>
				<option value="Pemrograman Dasar">Pemrograman Dasar</option>
				<option value="Pemrograman Desktop">Pemrograman Desktop</option>
				<option value="Pemrograman Web">Pemrograman Web</option>
				</select></td>
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
				<option value="<1960"><1960</option>
				<option value="1960">1960</option>
				<option value="1961">1961</option>
				<option value="1962">1962</option>
				<option value="1963">1963</option>
				<option value="1964">1964</option>
				<option value="1965">1965</option>
				<option value=">1965">>1965</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>Foto</td>
			<td>:</td>
			<td><input type="file" name="foto" required></td>
		</tr>
		<tr>
			<td><input name="suntingdata" type="submit" value="Sunting" class="okbtn"></td></form>
			<td></td>
			<td><a href="lihatguru.php"><input type="button" value="Kembali" class="dgrbtn"></a></td>
		</tr>
	</table>
</div>
</body>
</html>