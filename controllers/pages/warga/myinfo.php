<?php 
    if (!isset($_SESSION['nik'])) {
        echo "<script>window.history.back();</script>";
    }elseif (isset($_SESSION['level'])) {
        echo "<script>window.history.back();</script>";
    }else{
?>
<div class="col s12 m12 l12">
    <div id="profile-page-header" class="card">
        <?php  

        include ('../../../_database/koneksi.php');
        $nik = $_SESSION['nik'];
        $q = mysql_query("SELECT * FROM tb_warga JOIN alamat ON tb_warga.kode_alamat = alamat.kode_alamat WHERE tb_warga.nik = '$nik'") or die(mysql_error());
        if (mysql_num_rows($q) == 0) {
            header('location:http://localhost/trashdelivery/warga/');
        }else{

            while ($d = mysql_fetch_array($q)) { ?>
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="../assets/img/user-bg.jpg" alt="user background">
        </div>
        <div class="row">
            <div class="col s12">
                <figure class="card-profile-image hide-on-med-and-down">
                    <img src="../assets/img/User.jpg" alt="profile image" class="circle z-depth-2 responsive-img activator">
                </figure>
            </div>
            <div class="col s12">
                <figure style="margin-left: 300px" class="card-profile-image hide-on-large-only show-on-medium hide-on-small-only">
                    <img src="../assets/img/User.jpg" alt="profile image" class="circle z-depth-2 responsive-img activator">
                </figure>
            </div>
            <div class="col s12">
                <figure style="margin-left: 85px" class="card-profile-image hide-on-med-and-up">
                    <img src="../assets/img/User.jpg" alt="profile image" class="circle z-depth-2 responsive-img activator">
                </figure>
            </div>
        </div>
        <div class="card-content hide-on-small-only">
            <div class="row" style="margin-top:20px">
                <div class="col s3 offset-s2">
                    <h4 class="card-title grey-text text-darken-4"><?php echo $_SESSION['ayah']; ?></h4>
                    <p class="medium-small grey-text">
                        <?php 
                            if (isset($_SESSION['nik'])) {
                                echo "Warga";
                        } else {
                                Echo "Kurir";
                        } ?>
                    </p>
                </div>
                <div class="col s2 offset-s4 push-s1">
                    <h4 class="card-title grey-text text-darken-4"><?php echo $d['jumlah_pemesanan']; ?>x</h4>
                    <p class="medium-small grey-text">Jumlah Pemesanan</p>
                </div>
                <div class="col s1 right-align" style="margin-top:-25px">
                    <a class="btn-floating activator waves-effect waves-light darken-2 right">
                          <i class="material-icons">arrow_drop_up</i>
                      </a>
                </div>
            </div>
        </div>
        <div class="card-content hide-on-med-and-up">
            <div class="row" style="margin-top:20px">
                <div class="col s6">
                    <h4 class="card-title grey-text text-darken-4"><?php echo $_SESSION['ayah']; ?></h4>
                    <p class="medium-small grey-text">
                        <?php 
                            if (isset($_SESSION['nik'])) {
                                echo "Warga";
                        } else {
                                Echo "Kurir";
                        } ?>
                    </p>
                </div>
                <div class="col s6 right-align" style="margin-top:-25px">
                    <a class="btn-floating activator waves-effect waves-light darken-2 right">
                          <i class="material-icons">arrow_drop_up</i>
                      </a>
                </div>
            </div>
        </div>
        <div class="card-reveal" style="display: none; transform: translateY(0px);">
            <p class="row">
                <span class="card-title grey-text text-darken-4 left"><i class="material-icons teal-text">person</i><?php echo $_SESSION['ayah']; ?></span>
                <span class="card-title grey-text text-darken-4 right"><i class="material-icons right">close</i></span>
            </p>
            <div class="divider"></div>
            <?php include'../../../components/form/edit-warga-profil-form.php'; ?>
        </div>
        <?php 
            }
        }
    ?>
    </div>
</div>
<?php } ?>