<?php
	session_start();
	if (!isset($_SESSION['nik'])) {
		echo "<script>window.history.back();</script>";
	}elseif (isset($_SESSION['level'])) {
		echo "<script>window.history.back();</script>";
	}else{

include '../../../components/base/head.php'; 
include '../../../components/navigation/first-navigation-warga.php';
?>
    <div class="row">
        <div class="col s12 m12 l10 push-l2" style="padding:0;">
            <?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$base_url = 'http://localhost/trashdelivery/controllers/pages/warga/';
		$file = $page.".php";
		switch ($page) {
			case 'home':
				include "/home.php";
				break;
			case 'history':
				include "/history.php";
				break;
			case 'myinfo':
				include "/myinfo.php";
				break;
			case 'pesan':
				include "/pesan.php";
				break;
			case 'editwarga':
				include "/edit-warga.php";
				break;				
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}
	 ?>
        </div>
    </div>
    <?php include '../../../components/base/footer.php';
		}
	?>