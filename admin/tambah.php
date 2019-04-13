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

$nis = $_GET['nis'];
$cek = mysqli_query($konek, "select * from datasiswa where nis = '$nis'");
$jumlah = mysqli_num_rows($cek);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data : Diri Sendiri</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<?= headersiswa(); ?>

<div class="kontentitle">
	<br><h2>Tambah Data Sendiri</h2>
	<hr noshade width="90%">
</div>
	<div class="konten">
	<form method="post" action="lihat.php" enctype="multipart/form-data">
		<?php
		if ($nis == $_SESSION['induk'])
		{
			formtambahsendiri();
		}

		else
		{
			echo "<script>alert('NIS Tidak Sesuai Dengan No. Induk Anda')</script>";
			echo "<meta content='0; url=lihat.php' http-equiv='refresh'>";
		}
		?>
	</form>
	</div>
</body>
</html>