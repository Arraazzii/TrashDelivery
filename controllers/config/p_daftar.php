<?php 
	require '../../_database/koneksi.php';
	if (isset($_POST['daftar'])) {	
		$query = "SELECT max(kode_alamat) as maxKode FROM alamat";
		$hasil = mysql_query($query) or die(mysql_error());
		$data  = mysql_fetch_array($hasil);
		$kodeAlamat = $data['maxKode'];

		$noUrut = (int) substr($kodeAlamat, 3, 3);

		$noUrut++;
		$char = "ALM";
		$newID = $char . sprintf("%03s", $noUrut);	

		$url = $_SERVER['REQUEST_URI'];
		$nik = mysql_escape_string($_POST['nik']);
		$ayah = mysql_escape_string($_POST['ayah']);
		$telepon = mysql_escape_string($_POST['telepon']);
		$alamat = mysql_escape_string($_POST['alamat']);
		$no_rumah = mysql_escape_string($_POST['no_rumah']);
		$rt = mysql_escape_string($_POST['rt']);
		$rw = mysql_escape_string($_POST['rw']);
		$kelurahan = mysql_escape_string($_POST['kelurahan']);
		$kecamatan = mysql_escape_string($_POST['kecamatan']);
		$kota = mysql_escape_string($_POST['kota']);
		$kode_pos = mysql_escape_string($_POST['kode_pos']);

		$cek = mysql_query("SELECT nik FROM tb_warga WHERE nik = '$nik'");
		if (mysql_num_rows($cek) < 1) {
			$insAlamat = mysql_query("INSERT INTO alamat VALUES 
						('$newID','$alamat','$no_rumah','$rt','$rw','$kelurahan','$kecamatan','$kota','$kode_pos','$nik')
						")or die(mysql_error());
			if ($insAlamat == true) {
				$warga = mysql_query("INSERT INTO tb_warga VALUES 
						('$nik',1234,'$ayah','$newID','$telepon','','',0);
						") or die(mysql_error());
				if ($warga) {
					echo "<script>alert('berhasil daftar!'); window.location.href='$url?daftar=berhasil'</script>";
				}else{
					echo "<script>alert('error!'); window.history.back();</script>";
				}
			}
		}else{
			echo "<script>alert('NIK sudah terdaftar!'); window.history.back();</script>";
		}
	}elseif (isset($_GET['lat'])) {
		
		$nik = $_SESSION['nik'];
		$lat = mysql_real_escape_string($_GET['lat']);
		$lng = mysql_real_escape_string($_GET['lng']);
		if (!empty($nik)) {
			mysql_query("UPDATE tb_warga SET lat='$lat',lng='$lng' WHERE nik ='$nik'");
		}
	}else{
		echo "<script>window.history.back();</script>";
	}
	
?>