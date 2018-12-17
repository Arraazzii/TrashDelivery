<?php 
	session_start();
	if (isset($_SESSION['username'])) {
		echo "<script>window.location.href='/trashdelivery/adminweb/home'</script>";
	}elseif (isset($_SESSION['nik'])) {
        echo "<script>window.location.href='/trashdelivery/warga/home'</script>";
    }elseif (isset($_SESSION['kode_kurir'])) { 
        echo "<script>window.location.href='/trashdelivery/kurir/home'</script>";
    }else{
?>

<?php include'../components/base/head-admin.php'; ?>
<?php include'../components/base/js-admin.php'; ?>

<div class="container white z-depth-2" style="height: 1000px">
    <ul class="tabs teal tabs-fixed-width">
        <li class="tab col s6"><a class="white-text active" href="#admin">Admin</a></li>
    </ul>
    <div id="admin" class="col s12">
        <?php include '../components/form/login-admin-form.php'; ?>
    </div>
</div>
<?php }?>