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
        <center class="hide-on-small-only">
            <h3> Daftar Pemesanan </h3>
            <h4> Sedang di Proses </h4>            
        </center>
        <center class="hide-on-med-and-up">
            <h3> Daftar Pemesanan</h3>
            <h4> Proses </h4>            
        </center>
                    </span>
                </div>
                <table id="tb_proses" class="display centered hide-on-small-only">
                    <thead>
                        <tr>
                            <th>Kode Pengantaran</th>
                            <th>Kode Pemesanan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Kurir</th>
                            <th>Berat Sampah</th>
                            <th>Total</th>
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
                    $q = mysql_query("SELECT * FROM tb_terima JOIN tb_kurir ON tb_terima.kode_kurir = tb_kurir.kode_kurir WHERE tb_terima.status='Diproses' ORDER BY kode_terima DESC ") or die(mysql_error());
                    
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
                                <?php echo $d['nama_kurir'] ?>
                            </td>
                            <td>
                                <?php echo $d['berat'] ?> KG
                            </td>
                            <td>
                                Rp
                                <?php echo $d['harga'] ?>;
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
                <table class="responsive-table hightlight stripped hide-on-med-and-up">
                    <thead>
                        <tr>
                            <th>Kode Pengantaran</th>
                            <th>Kode Pemesanan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Kurir</th>
                            <th>Berat Sampah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    require '../../../_database/koneksi.php';
                    $month =  date('m');
                    $q = mysql_query("SELECT * FROM tb_terima JOIN tb_kurir ON tb_terima.kode_kurir = tb_kurir.kode_kurir WHERE tb_terima.status='Diproses' ORDER BY kode_terima DESC ") or die(mysql_error());
                    
                    if (mysql_num_rows($q) == 0 ) {
                        echo "<tr>
                                <td colspan=6><center>Tidak Ada Pemesanan yang Diproses</center></td>
                            </tr>";
                    }else { 
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
                                <?php echo $d['nama_kurir'] ?>
                            </td>
                            <td>
                                <?php echo $d['berat'] ?> KG
                            </td>
                            <td>
                                Rp
                                <?php echo $d['harga'] ?>;
                            </td>
                        </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php } ?>