<?php
	session_start();
	if (isset($_POST['login'])) {
		
		require '../../_database/koneksi.php';

		$nik = mysql_real_escape_string($_POST['nik']);
		$pw = mysql_real_escape_string($_POST['password']);
		$cek = mysql_query("SELECT * FROM tb_warga WHERE nik='$nik' AND password = '$pw'") or die(mysql_error());

		if (mysql_num_rows($cek) > 0) {
			$c = mysql_fetch_array($cek);
			$nik = $c['nik'] ;
			$ayah = $c['kepala_keluarga']  ;
			$kd_alamat = $c['kode_alamat'] ;
			$telepon = $c['telepon']  ;
			// ini sessionnnya 
			$_SESSION['nik'] = $nik;
			$_SESSION['ayah'] = $ayah;
			$_SESSION['kd_alamat'] = $kd_alamat;
			$_SESSION['telepon'] = $telepon;
			if (!empty($nik)) {
				echo "<script>alert('Welcome!'); window.location.href='/trashdelivery/warga/home?login=berhasil'</script>";
			}else{
				echo "<script>alert('Error'); window.history.back();</script>";
			}
		}else{
			echo "<script>alert('Error!'); window.history.back();</script>";
		}
	}else if (isset($_POST['admin'])) {
		
		require '../../_database/koneksi.php';

		$user = $_POST['username'];
		$pass = $_POST['password'];

		$sql = "SELECT * FROM tb_admin WHERE username = '$user' and password = '$pass'";

		$cekuser = mysql_query("SELECT username from tb_admin where username ='$user'") or die(mysql_error());

		$cekpw = mysql_query("SELECT password from tb_admin where password ='$pass' and username='$user' ") or die(mysql_error());

		$q = mysql_query($sql) or die(mysql_error());

		$c = mysql_num_rows($q);

		$row = mysql_fetch_array($q);

		$name = $row['username'];
		
		if (mysql_num_rows($cekuser) <= 0 ) {
			echo '<script>   alert("Username Tidak ada!!"); </script>';
			echo "<script>window.history.back();</script>";
		}else if(mysql_num_rows($cekpw) <= 0){
			echo '<script>   alert("Password salah!!"); </script>';
			echo "<script>window.history.back();</script>";
		}else{
			if ($c > 0) {
				$_SESSION['nama'] = $row['nama_admin'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['level'] = $row['level'];
				if (!empty($user)) {
					echo "<script>alert('Welcome!'); window.location.href='/trashdelivery/adminweb/home?login=berhasil'</script>";
				}else{
					echo "<script>alert('Error!'); window.history.back();</script>";
				}
			}else{
				echo "<script>alert('Error!'); window.history.back();</script>";
			}
		}
		
	}else if (isset($_POST['kurir'])) {
		
		require '../../_database/koneksi.php';

		$kode = mysql_real_escape_string($_POST['kode']);
		$pw = mysql_real_escape_string($_POST['password']);

		$cek = mysql_query("SELECT * FROM tb_kurir WHERE kode_kurir='$kode' AND password = '$pw'") or die(mysql_error());

		if (mysql_num_rows($cek) > 0) {
			$c = mysql_fetch_array($cek);
			$_SESSION['kode_kurir'] = $c['kode_kurir'];
			if (!empty($_SESSION['kode_kurir'])) {
				echo "<script>alert('Welcome!'); window.location.href='/trashdelivery/kurir/home?login=berhasil'</script>";

				echo "<script>alert('Error!'); window.history.back();</script>";
			}
		}else{
			echo "<script>alert('Kode atau password salah!'); window.history.back();</script>";
		}
	}
	else{
		echo "<script>window.history.back();</script>";
	}

?>