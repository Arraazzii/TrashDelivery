<?php 
    if (!isset($_SESSION['level'])) {
        echo "<script>window.history.back();</script>";
    }else{
?>
<div class="row">
    <div class="col s10 push-s1 m10 push-m1 l10 push-l1" style="padding:0;">
        <div class="card z-depth-3">
            <?php 
                require '../../../_database/koneksi.php';
                if (!isset($_POST['kode'])) {?>
            <div class="card-content black-text">
                <div class="card-panel teal white-text z-depth-3">
                    <span class="card-title">
                                <center class="hide-on-small-only">
                                    <h3> Daftar Pemesanan Kurir </h3>     
                                </center>
                                <center class="hide-on-med-and-up">
                                    <h3> Daftar Pemesanan</h3>      
                                </center>
                            </span>
                </div>
                <table id="tb_pesanan" class="display centered hide-on-small-only">
                    <thead>
                        <tr>
                            <th>Kode Pengantaran</th>
                            <th>Kode Pemesanan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Berat Sampah</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                function TanggalIndo($date){
                                    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                 
                                    $tahun = substr($date, 0, 4);
                                    $bulan = substr($date, 5, 2);
                                    $tgl   = substr($date, 8, 2);
                                 
                                    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;     
                                    return($result);
                                }
                                require '../../../_database/koneksi.php';
                                $month =  date('m');
                                $q = mysql_query("SELECT * FROM tb_terima WHERE status='Menunggu' ORDER BY kode_terima DESC ") or die(mysql_error());
                                
                                while ($d = mysql_fetch_array($q)) {?>
                        <tr>
                            <td>
                                <?php echo $d['kode_terima'] ?>
                            </td>
                            <td>
                                <?php echo $d['kode_pesan'] ?>
                            </td>
                            <td>
                                <?php echo TanggalIndo($d['tanggal_terima']) ?>
                            </td>
                            <td>
                                <?php echo $d['berat'] ?> KG</td>
                            <td>
                                <?php echo number_format ($d['harga']) ?>
                            </td>
                            <td>
                                <?php include '../../../components/form/detail-pesanan-form.php'; ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <table class="responsive-table hightlight stripped hide-on-med-and-up">
                    <thead>
                        <tr>
                            <th>Kode Pengantaran</th>
                            <th>Kode Pemesanan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Berat Sampah</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                require '../../../_database/koneksi.php';
                                $month =  date('m');
                                $q = mysql_query("SELECT * FROM tb_terima WHERE status='Menunggu' ORDER BY kode_terima DESC ") or die(mysql_error());
                                
                                while ($d = mysql_fetch_array($q)) {?>
                        <tr>
                            <td>
                                <?php echo $d['kode_terima'] ?>
                            </td>
                            <td>
                                <?php echo $d['kode_pesan'] ?>
                            </td>
                            <td>
                                <?php echo TanggalIndo($d['tanggal_terima']) ?>
                            </td>
                            <td>
                                <?php echo $d['berat'] ?> KG</td>
                            <td>
                                <?php echo number_format ($d['harga']) ?>
                            </td>
                            <td>
                                <?php include '../../../components/form/detail-pesanan-form.php'; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php }else{?>
            <div class="card-content black-text">
                <div class="card-panel teal white-text z-depth-3">
                    <span class="card-title">
                                <center class="hide-on-small-only">
                                    <h3> Silahkan Pilih Kurir </h3>     
                                </center>
                                <center class="hide-on-med-and-up">
                                    <h3> Silahkan Pilih Kurir</h3>      
                                </center>
                            </span>
                </div>
                <?php 
                           $q = mysql_query("SELECT * FROM tb_kurir") or die(mysql_error());
                           $kode = $_POST['kode']
                        ?>
                <table id="tb_pilih_kurir" class="display centered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Kurir</th>
                            <th>Nama Kurir</th>
                            <th>Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                          
                                    while ($d = mysql_fetch_array($q)) {?>
                            <tr>
                                <?php include '../../../components/form/pilih-kurir-form.php'; ?>
                            </tr>
                            <?php }?>
                    </tbody>
                </table>
            </div>
            <?php }
            ?>
        </div>
    </div>
</div>
<?php } ?>