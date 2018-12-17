<?php 
	require '../../_database/koneksi.php';
	if (isset($_GET['qweqwe'])) {
		$nik = base64_decode($_GET['qweqwe']);
		$hapus = mysql_query("DELETE FROM tb_warga WHERE nik = '$nik' ");
		
		if ($hapus) {
			mysql_query("DELETE FROM alamat JOIN tb_warga ON tb_warga.kode_alamat = alamat.kode_alamat WHERE tb_warga.nik = '$nik'");
			echo "<script>window.location.href='/trashdelivery/adminweb/warga&hapus=berhasil'</script>";
		}else{
			echo "<script>alert('Terjadi Kesalahan!'); window.history.back();</script>";
		}
	}else{
		echo "<script>window.history.back();</script>";
	}

?>