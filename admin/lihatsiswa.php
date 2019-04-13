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

	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tempatlahir = $_POST['tempatlahir'];
	$bulanlahir = $_POST['bulanlahir'];
	$tahunlahir = $_POST['tahunlahir'];
	$tanggallahir = $_POST['tanggallahir'];
	$jurusan = $_POST['jurusan'];
	$kelas = $_POST['kelas'];
	$jk = $_POST['jk'];
	$foto = $_FILES['foto'];
	$namafoto = $foto['name'];
	$tmpfoto = $foto['tmp_name'];

$db = mysqli_query($konek, "select * from datasiswa");

if(isset($_POST["tambahdata"]))
{
	//cek apakah nis udh terdaftar belum
	$cek = mysqli_query($konek, "select * from datasiswa where nis = '$nis'");
	$data = mysqli_fetch_array($cek);
	$jumlah = mysqli_num_rows($cek);

	if (!is_numeric($nis))
	{
		echo "<script>alert('NIS Harus Berupa Angka')</script>";
		echo "<meta content='0; url=tambahsiswa.php' http-equiv='refresh'>";
	}

	elseif (is_numeric($nis))
	{
		$tambah = mysqli_query($konek, "insert into datasiswa values ('$nis', '$nama', '$alamat', '$tempatlahir', '$tanggallahir','$bulanlahir','$tahunlahir', '$jurusan', '$kelas', '$jk', '$namafoto')");

		$pindah = move_uploaded_file($tmpfoto, "../img/".$namafoto);
		
		echo "<script>alert('Data Berhasil Ditambahkan')</script>";
		echo "<meta content='0; url=lihatsiswa.php' http-equiv='refresh'>";
	}

	elseif ($jumlah>0)
	{
		echo "<script>alert('NIS Sudah Terdaftar')</script>";
		echo "<meta content='0; url=tambahsiswa.php' http-equiv='refresh'>";
	}

	else
	{
		echo "<script>alert('Data Tidak Berhasil Ditambahkan')</script>";
		echo "<meta content='0; url=tambahsiswa.php' http-equiv='refresh'>";
	}
}

elseif (isset($_POST['suntingdata']))
{
	$sunting = mysqli_query($konek, "update datasiswa set nama = '$nama', alamat = '$alamat', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', bulanlahir = '$bulanlahir', tahunlahir = '$tahunlahir', jurusan = '$jurusan', kelas = '$kelas', jk = '$jk', foto = '$namafoto' where nis = '$nis'");

	$pindah = move_uploaded_file($tmpfoto, "../img/".$namafoto);

	if ($sunting && $pindah)
	{	
		echo "<script>alert('Data Berhasil Disunting')</script>";
		echo "<meta content='0; url=lihatsiswa.php' http-equiv='refresh'>";
	}

	else
	{
		echo "<script>alert('Data Gagal Disunting')</script>";
	}
}	

elseif ($_GET['nis'])
{
	$nis = $_GET['nis'];
	$hapus = mysqli_query($konek, "delete from datasiswa where nis = '$nis'");

	if ($hapus)
	{
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<meta content='0; url=lihatsiswa.php' http-equiv='refresh'>";
	}
}
elseif($_GET['by']){
	$search = mysqli_query($konek,"select * from siswa where $_GET[by] like '%$_GET[q]%'");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lihat Data  Siswa</title>
	<style type="text/css">
		.searchbox
		{
			width: 200px;
			height: 25px;
			font-family: "Aharoni";
			margin-left: 250px;
			background-color: #eee;
			color: black;
			font-weight: bold;
			border-color: #1a6;
		}

		.searchbox:focus
		{
			background-color: white;
		}
	</style>
</head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<body>

<?= headercarisiswa(); ?>

<div class="kontentitle">
	<br><h2>Lihat Data : Siswa</h2>
	<hr noshade width="90%">
</div>
<div class="konten">
	<?php

	while ($data = mysqli_fetch_array($db)) 
	{
		$daftar = mysqli_query($konek, "select *from akun where induk = '".$data['nis']."'");
		$jumlah = mysqli_num_rows($daftar);

			echo "<img src='../img/$data[foto]'  alt='".$data['nama']."'>";
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
			echo "<br><br>";

			echo "<a href='?hapus&nis=".$data['nis']."' title='Hapus' onclick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')\"><input type='button' class='dgrbtn' name='hapusdata' value='Hapus Data'></a>&nbsp";

			echo "<a href=\"datasiswa.php?nis=".$data['nis']."&nama=".$data['nama']."&alamad=".$data['alamat']."&ttl=".$data['tempatlahir']." ".$data['tanggallahir']." ".$data['bulanlahir']." ".$data['tahunlahir']."&jk=".$data['jk']."&kelas=".$data['kelas']." ".$data['jurusan']."\"><input type='button' class='okbtn' value='Sunting Data'></a>&nbsp";

			echo "<a href=\"nilaisiswa.php?nis=".$data['nis']."&nama=".$data['nama']."&alamad=".$data['alamat']."&ttl=".$data['tempatlahir'].", ".$data['tanggallahir']." ".$data['bulanlahir']." ".$data['tahunlahir']."&jk=".$data['jk']."&kelas=".$data['kelas']." ".$data['jurusan']."\"><input type='button' class='goodbtn' value='Tambah Nilai'></a>&nbsp";

			echo "<a href=\"lengkapsiswa.php?nis=".$data['nis']."\"><input type='button' class='grtbtn' value='Lihat Data Lengkap'></a>";
			echo "<br>";
			echo "</div>";
			echo "<hr noshade width='90%' height='1'>";


			echo '<div class="cekdaftar">';
			if ($jumlah<=0)
			{
				echo "<font color=red>Akun Belum Terdaftar</font>";
			}

			else
			{
				echo "<font color=green>Akun Telah Terdaftar</font>";
			}
			echo "</div><br><br><br>";
	}	
?>
</div>
</body>
</html>

<?php

if (isset($_POST['searchbox']))
{
	$keyword = $_POST['keyword'];
	$pilihan = $_POST['pilihan'];
	echo "<meta content='0; url=?q=\"".$keyword."\"&by=\"".$pilihan."\"' http-equiv='refresh'>";
	$query = mysqli_query($konek, "select *from datasiswa where '".$pilihan."' like '%".$keyword."%'");


	while ($data = mysqli_fetch_array($query))
	{
		$daftar = mysqli_query($konek, "select *from akun where induk = '".$data['nis']."'");
		$jumlah = mysqli_num_rows($daftar);

			echo "<a href=\"datasiswa.php?nis=".$data['nis']."&nama=".$data['nama']."&alamat=".$data['alamat']."\">";
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
			echo "<br><br>";

			echo "<a href='?hapus&nis=".$data['nis']."' title='Hapus' onclick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')\"><input type='button' class='dgrbtn' name='hapusdata' value='Hapus'></a>&nbsp";

			echo "<a href=\"datasiswa.php?nis=".$data['nis']."&nama=".$data['nama']."&alamat=".$data['alamat']."&ttl=".$data['tempatlahir']."\"><input type='button' class='okbtn' value='Sunting Data'></a>&nbsp";

			echo "<a href=\"nilaisiswa.php?nis=".$data['nis']."&nama=".$data['nama']."&alamad=".$data['alamat']."&ttl=".$data['tempatlahir'].", ".$data['tanggallahir']." ".$data['bulanlahir']." ".$data['tahunlahir']."&jk=".$data['jk']."&kelas=".$data['kelas']." ".$data['jurusan']."\"><input type='button' class='goodbtn' value='Tambah Nilai'></a>";
			echo "<br>";
			echo "</div>";
			echo "<hr noshade width='90%' height='1'>";


			echo '<div class="cekdaftar">';
			if ($jumlah<=0)
			{
				echo "<font color=red>Akun Belum Terdaftar</font>";
			}

			else
			{
				echo "<font color=green>Akun Telah Terdaftar</font>";
			}
			echo "</div><br><br><br>";
	}
}
?>