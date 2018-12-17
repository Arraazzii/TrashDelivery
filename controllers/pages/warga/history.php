<?php 
    if (!isset($_SESSION['nik'])) {
        echo "<script>window.history.back();</script>";
    }elseif (isset($_SESSION['level'])) {
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
        <h4 class="hide-on-small-only">
            Riwayat Pengambilan Sampah<br>
            Keluarga Bapak <b><?php echo $_SESSION['ayah'];?></b>
        </h4>
        <h5 class="hide-on-med-and-up">
            Riwayat Sampah<br>
            Keluarga <b><?php echo $_SESSION['ayah'];?></b>
        </h5> 
    </center>
                    </span>
                </div>
                <table class="display centered hide-on-small-only" id="tb_pesan">
                    <thead>
                        <tr>
                            <th>Kode Pengantaran</th>
                            <th>Kode Pemesanan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Berat Sampah</th>
                            <th>Total Harga</th>
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
                    $nik = $_SESSION['nik'];
                    $q = mysql_query("SELECT * FROM tb_terima WHERE nik ='$nik' AND status='Selesai' ORDER BY kode_terima DESC") or die(mysql_error());
                    
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
                                <?php echo $d['kode_pesan'] ?>
                            </td>
                            <td>
                                <?php echo number_format ($d['harga']) ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        <?php
                // Make a MySQL Connection
                $query = "SELECT SUM(harga) FROM tb_terima WHERE nik ='$nik' AND status='Selesai' "; 
                     
                $result = mysql_query($query) or die(mysql_error());
                // Print out result
                $row = mysql_fetch_array($result)?>
                            <tr>
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b><?php echo number_format ($row['SUM(harga)'])?></b></td>
                            </tr>
                    </tfoot>
                </table>
                <table class="responsive-table centered hightlight stripped hide-on-med-and-up">
                    <thead>
                        <tr>
                            <th>Kode Pengantaran</th>
                            <th>Kode Pemesanan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Berat Sampah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    require '../../../_database/koneksi.php';
                    $nik = $_SESSION['nik'];
                    $q = mysql_query("SELECT * FROM tb_terima WHERE nik ='$nik' AND status='Selesai' ORDER BY kode_terima DESC") or die(mysql_error());
                    
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
                                <?php echo $d['kode_pesan'] ?>
                            </td>
                            <td>
                                <?php echo number_format ($d['harga']) ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        <?php
                // Make a MySQL Connection
                $query = "SELECT SUM(harga) FROM tb_terima WHERE nik ='$nik' AND status='Selesai' "; 
                     
                $result = mysql_query($query) or die(mysql_error());
                // Print out result
                $row = mysql_fetch_array($result)?>
                            <tr>
                                <td>Total</td>
                                <td><b><?php echo number_format ($row['SUM(harga)'])?></b></td>
                            </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php } ?>