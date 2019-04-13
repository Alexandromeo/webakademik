<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Masuk</title>
</head>
<body bgcolor="#ddd">
<form method="POST" action="member.php">
<div class="login">
	<div class="loginfont"><br><center><h2>Masuk</h2></center>
		<hr noshade width="90%" height="1">
			<center>
				<font face="Aharoni">
					<input type="radio" name="level" value="guru" checked>Guru
					<input type="radio" name="level" value="siswa">Siswa
				</font>
			</center>

			No. Induk<br>
			<center><input type="text" name="induk" placeholder="No. Induk" required class="logininput"></center><br>
			
			Password<br>
			<center><input type="text" name="password" placeholder="Password" required class="logininput"></center>
			
			<br><br><center><a href="signup.php"><font color="grey">Belum Punya Akun ?</font></a></center><br><br>
			
			<a href="index.php"><input type="button" value="Kembali" class="dgrbtn"></a>
			
			<div class="kanan"><input type="submit" value="Login" class="goodbtn"></div>
	</div>
</div>
</form>
</body>
</html>