<?php 
	date_default_timezone_set("Asia/Jakarta");
	session_start();
	require '../../_database/koneksi.php';
	if (isset($_POST['pesan'])) {
		//kode pesan 
		$querypesan = "SELECT max(kode_pesan) as maxKode FROM tb_pesan";
		$hasilpesan = mysql_query($querypesan) or die(mysql_error());
		$datapesan  = mysql_fetch_array($hasilpesan);
		$kodepesan = $datapesan['maxKode'];

		$noUrutpesan = (int) substr($kodepesan, 3, 3);

		$noUrutpesan++;
		$charpesan = "PSN";
		$newkodepesan = $charpesan . sprintf("%03s", $noUrutpesan);
		// end kode pesan

		//kode terima
		$query = "SELECT max(kode_terima) as maxKode FROM tb_terima";
		$hasil = mysql_query($query) or die(mysql_error());
		$data  = mysql_fetch_array($hasil);
		$kodeterima = $data['maxKode'];

		$noUrut = (int) substr($kodeterima, 3, 3);

		$noUrut++;
		$char = "TRM";
		$newkodeterima = $char . sprintf("%03s", $noUrut);
		//end kode terima

		$nik = $_SESSION['nik'];
		$berat = mysql_real_escape_string($_POST['berat']);
		$harga = $berat * 1000;
		$date = date('Y-m-d');
		if (!empty($berat)) {	
			$pesan = mysql_query("INSERT INTO tb_pesan VALUES ('$newkodepesan','$nik','$berat', '')") or die(mysql_error()) ;
			if ($pesan == true) {
				$terima = mysql_query("INSERT INTO tb_terima 
						VALUES ('$newkodeterima','$nik','$date','','$berat','$harga','Menunggu','$newkodepesan')
						")or die(mysql_error());
				if ($terima == true) {
					echo "<script>alert('Berhasil memesan! Silahkan tunggu konfirmasi!'); window.location.href='/trashdelivery/warga/pesan'</script>";
				}else{
					echo "<script>alert('error!'); window.history.back();</script>";
				}
			}
		}else{
			echo "<script>alert('error!'); window.history.back();</script>";
		}

	}else if(isset($_POST['konfir'])) {

		$nik = $_SESSION['nik'];
		$kode = $_POST['kode'];
		$total = $_POST['total'];
		$harga = $_POST['harga'];
		$tgl = $_POST['tanggal'];
		if (!empty($nik)) {	
			$terima = mysql_query("UPDATE tb_terima SET status = 'Selesai' WHERE nik='$nik'")or die(mysql_error());
			if ($terima == true) {
				$terima = mysql_query("UPDATE tb_warga SET jumlah_pemesanan = jumlah_pemesanan + 1  WHERE nik='$nik'")or die(mysql_error());
				mysql_query("INSERT INTO tb_laporan VALUES (NULL,'$kode','$tgl','$total','$harga')") or die(mysql_error());
				unset($_SESSION['kode_pesan']);
				echo "<script>alert('Terima kasih telah menggunakan jasa kami!'); window.location.href='/trashdelivery/warga/pesan?Konfirm=berhasil'</script>";

			}else{
				echo "<script>alert('error!'); window.history.back();</script>";
			}
		}else{
			echo "<script>alert('error!'); window.history.back();</script>";
		}
	}else if(isset($_POST['kurir'])) {

		$kode = $_POST['kode'];
		
		if (!empty($kode)) {	
			$terima = mysql_query("UPDATE tb_kurir SET status = 'Menunggu Order' WHERE kode_kurir='$kode'")or die(mysql_error());
			if ($terima == true) {
				echo "<script>alert('Terima kasih telah menggunakan jasa kami!'); window.location.href='/trashdelivery/kurir/pesanan?Konfirm=berhasil'</script>";
			}else{
				echo "<script>alert('error!'); window.history.back();</script>";
			}
		}else{
			echo "<script>alert('error!'); window.history.back();</script>";
		}
	}else{
		echo "<script>window.history.back();</script>";
	}
?>