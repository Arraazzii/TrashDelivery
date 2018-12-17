<?php 
	require '../../_database/koneksi.php';
	if (isset($_POST['kode_terima'])) {
		$kodeKurir = base64_decode($_POST['kode_kurir']);
		$kodeTerima = base64_decode($_POST['kode_terima']);
		$update = mysql_query("UPDATE tb_terima SET kode_kurir = '$kodeKurir', status = 'Diproses' WHERE kode_terima = '$kodeTerima'");
		if ($update) {
			$kurir = mysql_query("UPDATE tb_kurir SET status = 'Diperjalanan' WHERE kode_kurir = '$kodeKurir'");
			if ($kurir) {
				echo "<script>window.location.href='/trashdelivery/adminweb/pesanan?konfirm=berhasil'</script>";
			}
		}else{
			echo "<script>alert('Terjadi Kesalahan!'); </script>";
		}
	}else{
		echo "<script>window.history.back();</script>";
	}

?>