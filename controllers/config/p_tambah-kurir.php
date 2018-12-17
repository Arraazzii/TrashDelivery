<?php 
	require '../../_database/koneksi.php';
	if (isset($_POST['daftar'])) {	
		//kode alamat
		$query = "SELECT max(kode_alamat) as maxKode FROM alamat";
		$hasil = mysql_query($query) or die(mysql_error());
		$data  = mysql_fetch_array($hasil);
		$kodeAlamat = $data['maxKode'];

		$noUrut = (int) substr($kodeAlamat, 3, 3);

		$noUrut++;
		$char = "ALM";
		$newID = $char . sprintf("%03s", $noUrut);	
		//end kode alamat

		//kode kurir
		$query1 = "SELECT max(kode_kurir) as maxKode FROM tb_kurir";
		$hasil1 = mysql_query($query1) or die(mysql_error());
		$data1  = mysql_fetch_array($hasil1);
		$kodeKurir1 = $data1['maxKode'];

		$noUrut1 = (int) substr($kodeKurir1, 3, 3);

		$noUrut1++;
		$char1 = "KRR";
		$newID1 = $char1 . sprintf("%03s", $noUrut1);	
		//end kode kurir

		$url = $_SERVER['REQUEST_URI'];
		$nama = mysql_escape_string($_POST['nama']);
		$telepon = mysql_escape_string($_POST['telepon']);
		$alamat = mysql_escape_string($_POST['alamat']);
		$no_rumah = mysql_escape_string($_POST['no_rumah']);
		$rt = mysql_escape_string($_POST['rt']);
		$rw = mysql_escape_string($_POST['rw']);
		$kelurahan = mysql_escape_string($_POST['kelurahan']);
		$kecamatan = mysql_escape_string($_POST['kecamatan']);
		$kota = mysql_escape_string($_POST['kota']);
		$kode_pos = mysql_escape_string($_POST['kode_pos']);
		$gaji = mysql_escape_string($_POST['gaji']);
		if (!empty($nama)) {
			$insAlamat = mysql_query("INSERT INTO alamat VALUES 
						('$newID','$alamat','$no_rumah','$rt','$rw','$kelurahan','$kecamatan','$kota','$kode_pos',0)
						")or die(mysql_error());
			if ($insAlamat == true) {
				$warga = mysql_query("INSERT INTO tb_kurir VALUES 
						('$newID1',1234,'$nama','$telepon','$newID','$gaji','Menunggu Order');
						") or die(mysql_error());
				if ($warga) {
					echo "<script>alert('Berhasil Menambahkan Kurir!'); window.location.href='$url'</script>";
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