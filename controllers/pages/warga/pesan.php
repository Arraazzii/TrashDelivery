<?php 
    date_default_timezone_set("Asia/Jakarta");
    if (!isset($_SESSION['nik'])) {
        echo "<script>window.history.back();</script>";
    }elseif (isset($_SESSION['level'])) {
        echo "<script>window.history.back();</script>";
    }else{

        require '../../../_database/koneksi.php';
        $nik = $_SESSION['nik'];
        $q0 = mysql_query("SELECT * FROM tb_terima WHERE nik ='$nik' AND status !='Selesai' ") or die(mysql_error());
        if (mysql_num_rows($q0) <= 0) {?>
<div class="row">
    <div class="col s10 push-s1 m10 push-m1 l7 push-l1" style="padding:0;">
        <div class="card z-depth-3" style="height:300px">
            <div class="card-content black-text">
                <div class="card-panel teal white-text z-depth-3">
                    <span class="card-title">
            <h5>Pesan Kurir</h5>
                    </span>
                </div>
                <?php include '../../../components/form/pesan-kurir-form.php'; ?>
            </div>
        </div>
    </div>
    <div class="col s10 push-s1 m10 push-m1 l3 push-l1 hide-on-med-and-down" style="padding:0;margin-left:20px">
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header"><i class="material-icons left">filter_drama</i>Daftar Harga<i class="small material-icons right">menu</i></div>
                <div class="collapsible-body">
                    <p style="margin-left:10px">1kg = 1.000
                        <br>2kg = 2.000
                        <br>3kg = 3.000
                        <br>*Berlaku kelipatan</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="col s10 push-s1 m10 push-m1 l3 push-l1 hide-on-large-only">
        <div class="card z-depth-3">
            <div class="card-content black-text">
                <span class="card-title">
                        Daftar Harga
                    </span>
                <p style="margin-left:10px">1kg = 1.000
                    <br>2kg = 2.000
                    <br>3kg = 3.000
                    <br>*Berlaku kelipatan</p>
            </div>
        </div>
    </div>
    <?php }else{
                $q = mysql_query("SELECT * FROM tb_terima WHERE nik ='$nik' AND status='Menunggu'") or die(mysql_error());
                $q1 = mysql_query("SELECT * FROM tb_terima WHERE nik ='$nik' AND status='Diproses'") or die(mysql_error());
                if (mysql_num_rows($q) > 0) {?>
    <div class="col s10 push-s1 m10 push-m1 l10 push-l1" style="padding:0;margin-top:50px">
        <div class="card card-panel teal z-depth-3">
            <div class="teal white-text">
                <center>
                    <h3>Pemesanan Anda Masih Menunggu Konfirmasi</h3>
                    <p>Untuk pemesanan selanjutnya dapat dilakukan setelah pemesanan sebelumnya telah selesai</p>
                </center>
            </div>
        </div>
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    <?php }elseif (mysql_num_rows($q1) > 0){?>
    <div class="col s10 push-s1 m10 push-m1 l10 push-l1" style="padding:0;">
        <div class="card z-depth-3">
            <div class="card-content black-text">
                <div class="card-panel teal white-text z-depth-3">
                    <span class="card-title">
                <center>
                    <h3 class="hide-on-small-only">Pemesanan Anda Sebelumnya Sedang Diproses</h3>
                    <h5 class="hide-on-med-and-up">Detail Pemesanan</h5>
                            <div class="progress">
                                <div class="indeterminate"></div>
                            </div>
                </center>
                    </span>
                </div>
                <?php 
                            $query = mysql_query("SELECT * FROM tb_terima JOIN tb_kurir ON tb_terima.kode_kurir = tb_kurir.kode_kurir WHERE tb_terima.nik = '$nik' LIMIT 1") or die(mysql_error());
                            while ($d = mysql_fetch_array($query)) {?>
                <div class="row center">
                    <div class="col s12 m6 l6">
                        <div class="very-small card red lighten-1 z-depth-3">
                            <div class="card-content white-text">
                                <span class="card-title"><i style="font-size: 20px" class="small material-icons">code</i>&nbspKode Pengantaran</span>
                                <p><b><?php echo $d['kode_terima']; ?></b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="very-small card blue lighten-1 z-depth-3">
                            <div class="card-content white-text">
                                <span class="card-title"><i style="font-size: 20px" class="small material-icons">credit_card</i>&nbspKode Pemesanan</span>
                                <p><b><?php echo $d['kode_pesan']; ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row center" style="margin-top: -100px">
                    <div class="col s12 m6 l6">
                        <div class="very-small card green lighten-1 z-depth-3">
                            <div class="card-content white-text">
                                <span class="card-title"><i style="font-size: 20px" class="small material-icons">exposure</i>&nbspBerat</span>
                                <p><b><?php echo $d['berat']; ?>Kg</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="very-small card brown lighten-1 z-depth-3">
                            <div class="card-content white-text">
                                <span class="card-title"><i style="font-size: 20px" class="small material-icons">person</i>&nbspNama Kurir</span>
                                <p><b><?php echo $d['nama_kurir']; ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row center" style="margin-top: -100px">
                    <div class="col s12 m12 l12">
                        <div class="very-small card teal lighten-1 z-depth-3">
                            <div class="card-content white-text">
                                <span class="card-title"><i style="font-size: 20px" class="small material-icons">exposure</i>&nbspTotal Harga</span>
                                <p><b>Rp <?php echo $d['harga']; ?> ;</b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <br>
                <?php include '../../../components/form/pengambilan-sampah-oleh-kurir-form.php'; ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } 
            }?>
</div>
<?php }?>