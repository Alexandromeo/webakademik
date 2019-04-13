<?php
include "../koneksi.php";


function headerguru()
{
	echo '<div class="header">
		<div class="kanan">
			<ul>
				<li><a href="logout.php" onclick="return confirm(\'Apakah Anda Yakin Akan Keluar ?\')"><font color="white">Keluar</font></a></li>
				</ul>
		</div>

		<div>
			<ul>
				<li><a href="guru.php"><font color="white">Beranda</font></a></li>
				<li><font color="white">Tambah Data
					<ul>
						<li><a href="tambahguru.php"><font color="white">Data Guru</font></a></li>
						<li><a href="tambahsiswa.php"><font color="white">Data Siswa</font></a></li>
					</ul>
				</li>
				<li>Lihat Data
					<ul>
						<li><a href="lihatguru.php"><font color="white">Data Guru</font></a></li>
						<li><a href="lihatsiswa.php"><font color="white">Data Siswa</font></font></a></li>
					</ul>
				</li>
			</ul>
		</div>
		</div>';
}

function headersiswa()
{
	echo '<div class="header">
	<div class="kanan">
		<ul>
			<li><a href="logout.php" onclick="return confirm(\'Apakah Anda Yakin Akan Keluar ?\')"><font color="white">Keluar</font></a></li>
			</ul>
	</div>

	<div>
		<ul>
			<li><a href="siswa.php"><font color="white">Beranda</font></a></li>
			<li><a href="lihat.php"><font color="white">Lihat Data</font></a></li>
		</ul>
	</div>
</div>';
}

function headercarisiswa()
{
	echo '<form method="post" action="">';
	echo '<div class="header">
		<div class="kanan">
			<ul>
				<li><a href="logout.php" onclick="return confirm(\'Apakah Anda Yakin Akan Keluar ?\')"><font color="white">Keluar</font></a></li>
				</ul>
		</div>

		<div>
			<ul>
				<li><a href="guru.php"><font color="white">Beranda</font></a></li>
				<li><font color="white">Tambah Data
					<ul>
						<li><a href="tambahguru.php"><font color="white">Data Guru</font></a></li>
						<li><a href="tambahsiswa.php"><font color="white">Data Siswa</font></a></li>
					</ul>
				</li>
				<li>Lihat Data
					<ul>
						<li><a href="lihatguru.php"><font color="white">Data Guru</font></a></li>
						<li><a href="lihatsiswa.php"><font color="white">Data Siswa</font></font></a></li>
					</ul>
				</li>
				<li class="tanpa">
								<input type="text" name="keyword" class="searchbox" placeholder="Cari...">
								<input type="submit" class="okbtn" name="searchbox" value="Cari">
								<select name="pilihan" class="okbtn">
								<option value="nis">NIS</option>
								<option value="nama">Nama</option>
								<option value="alamat">Alamat</option>
								<option value="tempatlahir">Tempat Lahir</option>
								<option value="tanggallahir">Tanggal Lahir</option>
								<option value="bulanlahir">Bulan Lahir</option>
								<option value="tahunlahir">Tahun Lahir</option>
								<option value="jk">Jenis Kelamin</option>
								<option value="kelas">Kelas</option>
								<option value="jurusan">Jurusan</option>
								</select>
			</ul>
			</div>
		</div>';
	echo "</form>";
}

function headercariguru()
{
	echo '<form method="post" action="">';
	echo '<div class="header">
		<div class="kanan">
			<ul>
				<li><a href="logout.php" onclick="return confirm(\'Apakah Anda Yakin Akan Keluar ?\')"><font color="white">Keluar</font></a></li>
				</ul>
		</div>

		<div>
			<ul>
				<li><a href="guru.php"><font color="white">Beranda</font></a></li>
				<li><font color="white">Tambah Data
					<ul>
						<li><a href="tambahguru.php"><font color="white">Data Guru</font></a></li>
						<li><a href="tambahsiswa.php"><font color="white">Data Siswa</font></a></li>
					</ul>
				</li>
				<li>Lihat Data
					<ul>
						<li><a href="lihatguru.php"><font color="white">Data Guru</font></a></li>
						<li><a href="lihatsiswa.php"><font color="white">Data Siswa</font></font></a></li>
					</ul>
				</li>
				<li class="tanpa">
								<input type="text" name="keyword" class="searchbox" placeholder="Cari...">
								<input type="submit" class="okbtn" name="searchbox" value="Cari">
								<select name="pilihan" class="okbtn">
								<option value="nip">NIP</option>
								<option value="nama">Nama</option>
								<option value="alamat">Alamat</option>
								<option value="jk">Jenis Kelamin</option>
								<option value="mapel">Mata Pelajaran</option>
								<option value="tempatlahir">Tempat Lahir</option>
								<option value="tanggallahir">Tanggal Lahir</option>
								<option value="bulanlahir">Bulan Lahir</option>
								<option value="tahunlahir">Tahun Lahir</option>
								</select>
			</ul>
			</div>
		</div>';
	echo "</form>";
}

function formtambahsiswa()
{
	echo '<br><table>
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><input type="text" name="nis" placeholder="NIS" required class="logininput"></td>
		</tr>

		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" placeholder="Nama" required class="logininput"></td>
		</tr>

		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><input type="text" name="alamat" placeholder="Alamat" required class="logininput"></td>
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
			<td><input name="tambahdata" type="submit" value="Tambah" class="goodbtn"></td>
		</tr>
	</table>';
}

function formtambahguru()
{
	echo '<br><table>
		<tr>
			<td>NIP</td>
			<td>:</td>
			<td><input type="text" name="nip" placeholder="NIP" required class="logininput"></td>
		</tr>

		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" placeholder="Nama" required class="logininput"></td>
		</tr>

		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><input type="text" name="alamat" placeholder="Alamat" required class="logininput"></td>
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
				</select>
			</td>
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
			<td><input name="tambahdata" type="submit" value="Tambah" class="goodbtn"></td>
		</tr>
	</table>';
}

function formtambahsendiri()
{
	
	echo '<br><table>
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><input type="text" name="nis" value='.$_GET['nis'].' readonly class="logininput"></td>
		</tr>

		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" placeholder="Nama" required class="logininput"></td>
		</tr>

		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><input type="text" name="alamat" placeholder="Alamat" required class="logininput"></td>
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
			<td><input name="tambahdata" type="submit" value="Tambah" class="goodbtn"></td></form>
		</tr>
	</table>';
}

function datanilai()
{

	if ($_GET['jk'] == "L")
	{
		$jk = "Laki-Laki";
	}

	else
	{
		$jk = "Perempuan";
	}
	echo '<table>
		<tr>
			<th>NIS</th>
			<th>:</th>
			<td>'.$_GET['nis'].'</td>
		</tr>

		<tr>
			<th>Nama</th>
			<th>:</th>
			<td>'.$_GET['nama'].'</td>
		</tr>

		<tr>
			<th>Alamat</th>
			<th>:</th>
			<td>'.$_GET['alamad'].'</td>
		</tr>

		<tr>
			<th>Tempat, Tanggal Lahir</th>
			<th>:</th>
			<td>'.$_GET['ttl'].'</td>
		</tr>

		<tr>
			<th>Jenis Kelamin</th>
			<th>:</th>
			<td>'.$jk.'</td>
		</tr>

		<tr>
			<th>Kelas</th>
			<th>:</th>
			<td>'.$_GET['kelas'].'</td>
		</tr>
	</table>';
}

function tambahnilai()
{
	echo '<center><h2><font face ="Aharoni" color="#186">Nilai Siswa</font></h2>
	<b>NIS: </b><input type="text" name="nis" value='.$_GET['nis'].' readonly></td></center><br><br>
	<table>
		<tr>
			<td><input type="radio" value="Database" checked name="mapel"><font face="Aharoni">Database</font></td>
			<td><input type="radio" value="Pemrograman Objek" name="mapel"><font face="Aharoni">Pemrograman Objek</font></td>
			<td><input type="radio" value="Pemrograman Dasar" name="mapel"><font face="Aharoni">Pemrograman Dasar</font></td>
			<td><input type="radio" value="Pemrograman Desktop" name="mapel"><font face="Aharoni">Pemrograman Desktop</font></td>
			<td><input type="radio" value="Pemrograman Web" name="mapel"><font face="Aharoni">Pemrograman Web</font></td>
		</tr>
		
		<tr>
			<td></td>
			<th>UH 1 </th>
			<th>UH 2</th>
			<th>UH 3</th>
			<th>UTS</th>
			<th>UKK</th>
		</tr>

		<tr>
			<td></td>
			<td><input type="text" name="uh1" class="logininput" required></td>
			<td><input type="text" name="uh2" class="logininput" required></td>
			<td><input type="text" name="uh3" class="logininput" required></td>
			<td><input type="text" name="uts" class="logininput" required></td>
			<td><input type="text" name="ukk" class="logininput" required></td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="tambahnilai" value="Tambah Nilai" class="goodbtn"></td>
			<td><a href="../admin/lihatsiswa.php"><input type="button" class="dgrbtn" value="Kembali"></a></td>
		</tr>
		</table>';
}

function formeditsiswa()
{
	echo '<br><table>
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><input type="text" name="nis" value='.$_GET['nis'].' readonly class="logininput"></td>
		</tr>

		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" value='.$_GET['nama'].' required class="logininput"></td>
		</tr>

		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><input type="text" name="alamat" value='.$_GET['alamad'].' required class="logininput"></td>
		</tr>

		<tr>
			<td>Tempat Lahir</td>
			<td>:</td>
			<td><input type="text" name="tempatlahir" value='.$_GET['ttl'].' required class="logininput"></td>
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
			<td><a href="lihatsiswa.php"><input type="button" value="Kembali" class="dgrbtn"></a></td>
		</tr>
	</table>';
}

?>