<?php include'components/base/head-login.php'; ?>
<?php include'components/base/js-login.php'; ?>
<?php 
$url = explode("/",$_SERVER["REQUEST_URI"]);
$segmen1   = $url[1];
$segmen2   = $url[2];

session_start();
    if (isset($_SESSION['nik'])) {
        echo "<script>window.location.href='/trashdelivery/warga/home'</script>";
    } elseif (isset($_SESSION['kode_kurir'])) { 
        echo "<script>window.location.href='/trashdelivery/kurir/home'</script>";
    } else {
?>
<div class="container">
    <div class="white z-depth-2" style="height: 100%">
        <ul class="tabs teal tabs-fixed-width">
            <li class="tab col s3"><a class="white-text active" href="#warga">Warga</a></li>
            <li class="tab col s3"><a class="white-text" href="#kurir">Kurir</a></li>
        </ul>
        <div id="warga" class="col s12">
            <?php include 'components/form/login-warga-form.php'; ?>
        </div>
        <div id="kurir" class="col s12">
            <?php include 'components/form/login-kurir-form.php'; ?>
        </div>
    </div>
</div>
<?php } ?>