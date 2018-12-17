<?php 
    if (!isset($_SESSION['kode_kurir'])) {
        echo "<script>window.history.back();</script>";
    } else {
    require '../../../_database/koneksi.php';
    $kode_kurir = $_SESSION['kode_kurir'];
    $query = mysql_query("SELECT * FROM tb_terima JOIN alamat ON tb_terima.nik = alamat.nik JOIN tb_warga ON tb_terima.nik = tb_warga.nik WHERE tb_terima.kode_kurir = '$kode_kurir' AND tb_terima.status= 'Diproses'") or die(mysql_error());
    $query1 = mysql_query("SELECT * FROM tb_kurir JOIN tb_terima ON tb_terima.kode_kurir = tb_kurir.kode_kurir WHERE tb_kurir.status = 'Menunggu Order' AND tb_terima.status = 'Diproses' AND tb_terima.kode_kurir = '$kode_kurir' ") or die(mysql_error());
if (mysql_num_rows($query) == 0) { ?>
    <center>
        <div class="row">
            <div class="col s10 push-s1 m10 push-m1 l10 push-l1" style="padding:0;margin-top: 50px">
                <div class="card z-depth-3" style="height:300px">
                    <div class="card-content black-text">
                        <div class="card-panel teal white-text z-depth-3">
                            <span class="card-title">
                                <h2>Anda belum mendapatkan pemesanan</h2>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
<?php } else if (mysql_num_rows($query1) >= 1) { ?>
    <center>
        <div class="row">
            <div class="col s10 push-s1 m10 push-m1 l10 push-l1" style="padding:0;margin-top: 50px">
                <div class="card z-depth-3" style="height:300px">
                    <div class="card-content black-text">
                        <div class="card-panel teal white-text z-depth-3">
                            <span class="card-title">
                                <h4>Menunggu Konfirmasi Pemesan</h4>
                                <h5>Harap Meminta pemesan untuk <b>konfirmasi pengambilan selesai</b></h5>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
<?php }else {?>
    <div class="col s10 push-s1 m10 push-m1 l10 push-l1" style="padding:0;">
        <div class="card z-depth-3">
            <div class="card-content black-text">
                <div class="card-panel teal white-text z-depth-3">
                    <span class="card-title center">
                        <h3 class="hide-on-small-only">Anda Mendapatkan Pemesanan</h3>
                        <h3 class="hide-on-med-and-up">Pesanan Anda</h3>
                    </span>
                </div>
                <?php while ($d = mysql_fetch_array($query)) {?>
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
                                <span class="card-title"><i style="font-size: 20px" class="small material-icons">euro_symbol</i>&nbspTotal Pembayaran</span>
                                <p><b>Rp<?php echo $d['harga']; ?></b>;</p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="collapsible popout" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">person    </i>Nama Pemesan</div>
                        <div class="collapsible-body teal-text"><span><b><?php echo $d['kepala_keluarga'];?></b></span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">contacts</i>Telepon Pemesan</div>
                        <div class="collapsible-body teal-text"><span><b><?php echo $d['telepon'];?></b></span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">place</i>Alamat</div>
                        <div class="collapsible-body"><span><b><?php echo $d['alamat'] ." No.".$d['no_rumah'] ." RT.".$d['rt'] ."/".$d['rw'] ."<br> Kel. ".$d['kelurahan'] ." Kec. ".$d['kecamatan'] ." Kota ".$d['kota'] ." ".$d['kode_pos'] ; ?></b></span></div>
                    </li>
                </ul>
                <div class="divider"></div>
                <br>
                <?php include '../../../components/form/konfirm-kurir-form.php'; ?>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } 
    } 
?>