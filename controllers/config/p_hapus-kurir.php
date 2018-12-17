<?php 
	require '../../_database/koneksi.php';
	if (isset($_GET['qweqwe'])) {
		$kode = base64_decode($_GET['qweqwe']);
		$kodeAlamat = base64_decode($_GET['ewwq']);

		$hapus = mysql_query("DELETE FROM tb_kurir WHERE kode_kurir = '$kode' ");
		if ($hapus) {
			mysql_query("DELETE FROM alamat WHERE kode_alamat = '$kodeAlamat'");
			echo "<script>window.location.href='/trashdelivery/adminweb/kurir&hapus=berhasil'</script>";
		}else{
			echo "<script>alert('Terjadi Kesalahan!'); window.history.back();</script>";
		}
	}else{
		echo "<script>window.history.back();</script>";
	}

?>