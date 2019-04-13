<?php
include "../koneksi.php";
include "../php/lib.php";

error_reporting(0);
session_start();

	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jk'];
	$mapel = $_POST['mapel'];
	$tempatlahir = $_POST['tempatlahir'];
	$bulanlahir = $_POST['bulanlahir'];
	$tahunlahir = $_POST['tahunlahir'];
	$tanggallahir = $_POST['tanggallahir'];
	$foto = $_FILES['foto'];
	$namafoto = $foto['name'];
	$tmpfoto = $foto['tmp_name'];

$db = mysqli_query($konek, "select * from dataguru");

//hanya username + password "guru" yg bisa akses
if ($_SESSION['level'] != "guru") 
{
	echo "<script>alert('Anda Harus Login Sebagai Guru Dahulu')</script>";
	echo "<meta content='0; url=../login.php' http-equiv='refresh'>";
	session_destroy();
}


if(isset($_POST["tambahdata"]))
{
	$tambah = mysqli_query($konek, "insert into dataguru values ('$nip', '$nama', '$alamat', '$jk', '$mapel', '$tempatlahir', '$tanggallahir','$bulanlahir','$tahunlahir', '$namafoto')");

	$pindah = move_uploaded_file($tmpfoto, "../img/".$namafoto);

	//cek apakah nis udh terdaftar belum
	$cek = mysqli_query($konek, "select * from dataguru where nip = '$nip'");
	$data = mysqli_fetch_array($cek);
	$jumlah = mysqli_num_rows($cek);

	if ($tambah && $pindah)
	{
		echo "<script>alert('Data Berhasil Ditambahkan')</script>";
		echo "<meta content='0; url=lihatguru.php' http-equiv='refresh'>";
	}

	elseif ($jumlah>0)
	{
		echo "<script>alert('NIP Sudah Terdaftar')</script>";
		echo "<meta content='0; url=tambahguru.php' http-equiv='refresh'>";
	}

	else
	{
		echo "<script>alert('Data Tidak Berhasil Ditambahkan')</script>";
		echo "<meta content='0; url=tambahguru.php' http-equiv='refresh'>";
	}
}

elseif (isset($_POST['suntingdata']))
{
	$sunting = mysqli_query($konek, "update dataguru set nama = '$nama', alamat = '$alamat', jk = '$jk', mapel = '$mapel', tempatlahir = '$tempatlahir',  tanggallahir = '$tanggallahir', bulanlahir = '$bulanlahir', tahunlahir = '$tahunlahir', foto = '$namafoto' where nip = '$nip'");

	$pindah = move_uploaded_file($tmpfoto, "../img/".$namafoto);

	$cekmapel = $_GET['mapel'];
	$duplikat = mysqli_query($konek, "select * from dataguru where mapel = '$cekmapel'");
	$obj = mysqli_num_rows(mysqli_fetch_assoc($duplikat));

	if ($sunting && $pindah)
	{	
		echo "<script>alert('Data Berhasil Disunting')</script>";
		echo "<meta content='0; url=lihatguru.php' http-equiv='refresh'>";
	}

	elseif ($obj == 0)
	{
		echo "<script>alert('Mapel Sudah Dipilih Guru Lain')</script>";
		echo "<meta content='0; url=lihatguru.php' http-equiv='refresh'>";
	}

	else
	{
		echo "<script>alert('Data Gagal Disunting')</script>";
	}
}	

elseif ($_GET['nip'])
{
	$nip = $_GET['nip'];
	$hapus = mysqli_query($konek, "delete from dataguru where nip = '$nip'");

	if ($hapus)
	{
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<meta content='0; url=lihatguru.php' http-equiv='refresh'>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lihat Data : Guru</title>
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

<?= headercariguru(); ?>

<div class="kontentitle">
	<br><h2>Lihat Data Guru</h2>
	<hr noshade width="90%">
</div>
<div class="konten">
	<?php
	while ($data = mysqli_fetch_array($db)) 
	{
		$daftar = mysqli_query($konek, "select *from akun where induk = '".$data['nip']."'");
		$jumlah = mysqli_num_rows($daftar);

			echo "<img src='../img/$data[foto]'  alt='".$data['nama']."'>";

			echo "<div class='siswa'>";
			echo "<b>NIP : </b>";
			echo $data['nip'];
			echo "<br>";

			echo "<b>Nama : </b>";
			echo $data['nama'];
			echo "<br>";

			echo "<b>Alamat : </b>";
			echo $data['alamat'];
			echo "<br>";

			echo "<b>Jenis Kelamin : </b>";
			echo $data['jk'];
			echo "<br>";

			echo "<b>Mata Pelajaran : </b>";
			echo $data['mapel'];
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

			echo "<br><br>";

			echo "<a href='?hapus&nip=".$data['nip']."' title='Hapus' onclick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')\"><input type='button' class='dgrbtn' name='hapusdata' value='Hapus'></a>&nbsp";
			echo "<a href=\"dataguru.php?nip=".$data['nip']."&nama=".$data['nama']."&alamat=".$data['alamat']."&mapel=".$data['mapel']."\"><input type='button' class='okbtn' value='Sunting Data'></a>";
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