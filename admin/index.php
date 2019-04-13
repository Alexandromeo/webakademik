<?php

if (empty($_SESSION['induk']) || ($_SESSION['password']))
{
	echo "<script>alert('Anda Harus Login Dahulu')</script>";
	echo "<meta content='0; url=../index.php' http-equiv='refresh'>";
}

?>