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

	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tempatlahir = $_POST['tempatlahir'];
	$tanggallahir = $_POST['tanggallahir'];
	$bulanlahir = $_POST['bulanlahir'];
	$tahunlahir = $_POST['tahunlahir'];
	$jurusan = $_POST['jurusan'];
	$kelas = $_POST['kelas'];
	$jk = $_POST['jk'];
	$foto = $_FILES['foto'];
	$namafoto = $foto['name'];
	$tmpfoto = $foto['tmp_name'];

if (isset($_POST['tambahdata'])) 
{
	$induk = $_SESSION['induk'];

	if ($nis == $induk)
	{
		$pindah = move_uploaded_file($tmpfoto, "../img/".$namafoto);
		$tambah = mysqli_query($konek, "insert into datasiswa values ('$nis', '$nama', '$alamat', '$tempatlahir', '$tanggallahir','$bulanlahir','$tahunlahir', '$jurusan', '$kelas', '$jk', '$namafoto')");


		if ($tambah && $pindah)
		{
			echo "<script>alert('Data Berhasil Ditambahkan')</script>";
			echo "<meta content='0; url=lihat.php' http-equiv='refresh'>";
		}

		else
		{
			echo "<script>alert('Data Tidak Berhasil Ditambahkan')</script>";
			echo "<meta content='0; url=lihat.php' http-equiv='refresh'>";
		}
	}

	else
	{
		echo "<script>alert('NIS Harus Sesuai dengan No. Induk Anda Sewaktu Login</script>";
		echo "<meta content='0; url=lihat.php' http-equiv='refresh'>";
	}
}


elseif (isset($_POST['suntingdata']))
{
	$pindah = move_uploaded_file($tmpfoto, "../img/".$namafoto);

	$sunting = mysqli_query($konek, "update datasiswa set nama = '$nama', alamat = '$alamat', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', bulanlahir = '$bulanlahir', tahunlahir = '$tahunlahir', jurusan = '$jurusan', kelas = '$kelas', jk = '$jk', foto = '$namafoto' where nis = '$nis'");


	if ($sunting && $pindah)
	{	
		echo "<script>alert('Data Berhasil Disunting')</script>";
		echo "<meta content='0; url=lihat.php' http-equiv='refresh'>";
	}
}

elseif ($_GET['nis'])
{
	$nis = $_GET['nis'];
	$hapus = mysqli_query($konek, "delete from datasiswa where nis = '$nis'");

	if ($hapus)
	{
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<meta content='0; url=lihat.php' http-equiv='refresh'>";
	}
}

$nis = $_SESSION['induk'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lihat Data Sendiri</title>
</head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<body>

<?= headersiswa(); ?>

<div class="kontentitle">
	<br><h2>Lihat Data Sendiri</h2>
	<hr noshade width="90%">
</div>
<div class="konten">

<?php

$query = mysqli_query($konek, "select * from datasiswa where nis = '$nis'");
$data = mysqli_fetch_array($query);
$jumlah = mysqli_num_rows($query);

		if ($data)
		{
			echo "<a href=\"data.php?nis=".$data['nis']."&nama=".$data['nama']."&alamat=".$data['alamat']."\">";
			echo "<img src='../img/$data[foto]'  alt='".$data['nama']."'>";
			echo "</img>";
			echo "</a>";

			echo "<div class='siswa'>";
			echo "<b>NIS : </b>";
			echo $data['nis'];
			echo "<br>";

			echo "<b>Nama : </b>";
			echo $data['nama'];
			echo "<br>";

			echo "<b>Alamat : </b>";
			echo $data['alamat'];
			echo "<br>";

			echo "<b>Tempat, Tanggal Lahir : </b>";
			echo $data['tempatlahir'];
			echo ", ";
			echo $data['tanggallahir'];
			echo " ";
			echo $data['bulanlahir'];
			echo " ";
			echo $data['tahunlahir'];
			echo "<br>";

			echo "<b>Jenis Kelamin : </b>";
			echo $data['jk'];
			echo "<br>";

			echo "<b>Kelas : </b>";
			echo $data['kelas'];
			echo " ";
			echo $data['jurusan'];
			echo "<br><br><br>";

			echo "<a href='?hapus&nis=".$data['nis']."' title='Hapus' onclick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')\"><input type='button' class='dgrbtn' name='hapusdata' value='Hapus'></a>&nbsp";
			
			echo "<a href=\"data.php?nis=".$data['nis']."&nama=".$data['nama']."&alamat=".$data['alamat']."\"><input type='button' class='goodbtn' value='Sunting Data'></a>&nbsp";
			
			echo "<a href=\"lengkapsiswa.php?nis=".$data['nis']."\"><input type='button' class='grtbtn' value='Lihat Data Lengkap'></a>";

			echo "</div>";
			echo "<hr noshade width='90%' height='1'>";
		}

		else
		{
			echo "<center>Data Dengan NIS ".$nis." Belum Ditambahkan</center>";
			echo "<center><br><a href=\"tambah.php?nis=".$nis."\"><input type='button' class='goodbtn' value='Tambah Data'></a></center>";
		}

?>
</div>
</body>
</html>