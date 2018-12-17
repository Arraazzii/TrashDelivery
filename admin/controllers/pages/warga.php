<?php 
    if (!isset($_SESSION['level'])) {
        echo "<script>window.history.back();</script>";
    }else{
?>
<div class="row">
    <div class="col s10 push-s1 m10 push-m1 l10 push-l1" style="padding:0;">
        <div class="card z-depth-3">
            <div class="card-content black-text">
                <div class="card-panel teal white-text z-depth-3">
                    <span class="card-title">
        <center>
            <h3> Daftar Warga </h3> 
        </center>
                    </span>
                </div>
                <table id="tb_warga" class="display centered hide-on-med-and-down">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Jumlah Pemesanan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    require '../../../_database/koneksi.php';
                    $q = mysql_query("SELECT * FROM tb_warga JOIN alamat ON tb_warga.kode_alamat = alamat.kode_alamat") or die(mysql_error());
                    
                    while ($d = mysql_fetch_array($q)) {?>
                        <tr>
                            <td>
                                <?php echo $d['nik'] ?>
                            </td>
                            <td>
                                <?php echo $d['kepala_keluarga'] ?>
                            </td>
                            <td>
                                <?php echo $d['alamat'] ." No.".$d['no_rumah'] ." RT.".$d['rt'] ."/".$d['rw'] ." Kel. ".$d['kelurahan'] ." Kec. ".$d['kecamatan'] ." Kota ".$d['kota'] ." ".$d['kode_pos'] ; ?>
                            </td>
                            <td>
                                <?php echo $d['telepon'] ?>
                            </td>
                            <td>
                                <?php echo number_format ($d['jumlah_pemesanan']) ?>
                            </td>
                            <td>
                                <?php include '../../../components/form/button-edit-warga-form.php'; ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <table class="responsive-table hightlight stripped hide-on-large-only">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Kepala
                                <br>Keluarga</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Jumlah
                                <br>Pemesanan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    require '../../../_database/koneksi.php';
                    $q = mysql_query("SELECT * FROM tb_warga JOIN alamat ON tb_warga.kode_alamat = alamat.kode_alamat") or die(mysql_error());
                    
                    while ($d = mysql_fetch_array($q)) {?>
                        <tr>
                            <td>
                                <?php echo $d['nik'] ?>
                            </td>
                            <td>
                                <?php echo $d['kepala_keluarga'] ?>
                            </td>
                            <td>
                                <?php echo $d['alamat'] ." No.".$d['no_rumah'] ." RT.".$d['rt'] ."/".$d['rw'] ." Kel. ".$d['kelurahan'] ." Kec. ".$d['kecamatan'] ." Kota ".$d['kota'] ." ".$d['kode_pos'] ; ?>
                            </td>
                            <td>
                                <?php echo $d['telepon'] ?>
                            </td>
                            <td>
                                <?php echo number_format ($d['jumlah_pemesanan']) ?>
                            </td>
                            <td>
                                <?php include '../../../components/form/button-edit-warga-small-form.php'; ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large teal modal-trigger" href="#warga">
      <i class="large material-icons">add</i>
    </a>
</div>
<div class="modal fade bd-example-modal-lg" id="warga" tabindex="-1" role="dialog" aria-labelledby="warga" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="warga">Tambahkan Warga</h5>
            </div>
            <div class="modal-body">
                <?php include '../../../components/form/tambah-warga-form.php'; ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>