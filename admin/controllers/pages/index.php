<?php 			
	session_start();if (!isset($_SESSION['level'])) {
		echo "<script>window.history.back();</script>";
	}else{

include '../../../components/base/head.php';
include '../../../components/navigation/first-navigation-admin.php';?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<div class="row">
    <div class="col s12 m12 l10 push-l2" style="padding:0;">
        <?php 
	if(isset($_GET['page'])){
		$base_url = 'http://localhost/trashdelivery/adminweb/';
		$page = $_GET['page'];
		$file = $page.".php";
		switch ($page) {
			case 'home':
				include "home.php";
			break;
			case 'kurir':
				include "kurir.php";
			break;
			case 'laporan':
				include "laporan.php";
			break;
			case 'pesanan':
				include "pesanan.php";
			break;	
			case 'warga':
				include "warga.php";
			break;	
			case 'diproses':
				include "diproses.php";
			break;		
			case 'editwarga':
				include "../config/edit-warga.php";
			break;
			case 'editkurir':
				include "../config/edit-kurir.php";
			break;		
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}
	 ?>
    </div>
</div>
<?php include '../../../components/base/footer.php';?>

</html>
<?php } ?>