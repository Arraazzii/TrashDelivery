<?php 
    if (!isset($_SESSION['level'])) {
        echo "<script>window.history.back();</script>";
    }else{
?>
<?php
        require '../../../_database/koneksi.php';
        $kode = $_POST['edit'];
        $q = mysql_query("SELECT * FROM tb_kurir JOIN alamat ON tb_kurir.kode_alamat = alamat.kode_alamat WHERE tb_kurir.kode_kurir = '$kode'") or die(mysql_error());
        if (mysql_num_rows($q) < 1) {
                echo "<center><h1>Terjadi Kesalahan</h1><a href='kurir'>Back</a></center>";
        }else{
            while ($d = mysql_fetch_array($q)) {?>
    <div class="row">
        <div class="col s10 push-s1 m10 push-m1 l10 push-l1" style="padding:0;">
            <div class="card z-depth-3">
                <div class="card-content black-text">
                    <div class="card-panel teal white-text z-depth-3">
                        <span class="card-title">
        <center>
            <h3 class="hide-on-small-only"> Perbarui Data Kurir, <?php echo $d['nama_kurir'] ?> </h3> 
            <h3 class="hide-on-med-and-up"> Data Kurir, <?php echo $d['nama_kurir'] ?> </h3>
        </center>
                        </span>
                    </div>
                    <?php include '../../../components/form/edit-kurir-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <?php }
    } 
} ?>