<?php 
	require '../../_database/koneksi.php';
	if (isset($_POST['edit'])) {	
		$url = $_SERVER['REQUEST_URI'];
		$nik = mysql_escape_string($_POST['nik']);
		$password = mysql_escape_string($_POST['password']);
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
		$kode_alamat = mysql_escape_string($_POST['kode_alamat']);

		if (!empty($nik)) {
			$insAlamat = mysql_query("UPDATE alamat SET 
						alamat = '$alamat', no_rumah = '$no_rumah', rt ='$rt', rw='$rw', kelurahan = '$kelurahan', kecamatan = '$kecamatan', kota = '$kota', kode_pos = '$kode_pos' WHERE kode_alamat = '$kode_alamat'")or die(mysql_error());
			if ($insAlamat == true) {
				$warga = mysql_query("UPDATE tb_warga SET
						password = '$password', kepala_keluarga = '$ayah', telepon = '$telepon' WHERE nik = '$nik'") or die(mysql_error());
				if ($warga) {
					echo "<script>alert('Berhasil diperbarui!'); window.location.href='/trashdelivery/adminweb/warga&edit=berhasil'</script>";
				}else{
					echo "<script>alert('error!'); window.history.back();</script>";
				}
			}
		}else{
			echo "<script>alert('error!'); window.history.back();</script>";
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