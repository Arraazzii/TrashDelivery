<?php 
    if (!isset($_SESSION['level'])) {
        echo "<script>window.history.back();</script>";
    }else{
?>
<div class="row">
    <div class="col s10 push-s1 m10 push-m1 l10 push-l1" style="padding:0;">
        <div class="card z-depth-3">
            <div class="card-content black-text">
                <div class="card-panel teal white-text z-depth-3 activator">
                    <span class="card-title">
                        <i class="small material-icons right waves-effect waves-block waves-light" style="cursor: pointer;">more_vert</i>
                        <center class="hide-on-small-only">
                            <h3> Laporan Keuangan</h3>
                            <h4>Pengambilan Sampah RT Bapak <b><?php echo $_SESSION['nama'];?></b></h4>
                        </center>
                        <center class="hide-on-med-and-up">
                            <h3> Laporan</h3>
                            <h4>Sampah RT Bapak <b><?php echo $_SESSION['nama'];?></b></h4>            
                        </center>
                    </span>
                </div>
                <table id="tb_lapor" class="display centered hide-on-small-only">
                    <thead>
                        <tr>
                            <th>No.</th>
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
                        $q = mysql_query("SELECT * FROM tb_laporan ORDER BY tanggal DESC ") or die(mysql_error());
                        $no = 1 ;
                        while ($d = mysql_fetch_array($q)) {?>
                        <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $d['kode_terima'] ?>
                            </td>
                            <td>
                                <?php echo TanggalIndo($d['tanggal']) ?>
                            </td>
                            <td>
                                <?php echo $d['total_sampah'] ?> KG</td>
                            <td>
                                <?php echo number_format ($d['total_uang']) ?>
                            </td>
                        </tr>
                        <?php $no++;}?>
                    </tbody>
                    <tfoot>
                        <?php
                        $query = "SELECT SUM(total_uang) FROM tb_laporan "; 
                             
                        $result = mysql_query($query) or die(mysql_error());
                        if (mysql_num_rows($result) == 0) {
                            
                        }else{ 
                            while($row = mysql_fetch_array($result)){?>
                            <tr>
                                <td colspan="4" align="right">Total</td>
                                <td><b><?php echo number_format ($row['SUM(total_uang)'])?></b></td>
                            </tr>
                            <?php }
                        }?>
                    </tfoot>
                </table>
                <table class="responsive-table hightlight stripped hide-on-med-and-up">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Pemesanan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Berat Sampah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require '../../../_database/koneksi.php';
                        $q = mysql_query("SELECT * FROM tb_laporan ORDER BY tanggal DESC ") or die(mysql_error());
                        $no = 1 ;
                        while ($d = mysql_fetch_array($q)) {?>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $d['kode_terima'] ?>
                            </td>
                            <td>
                                <?php echo TanggalIndo($d['tanggal']) ?>
                            </td>
                            <td>
                                <?php echo $d['total_sampah'] ?> KG</td>
                            <td>
                                <?php echo number_format ($d['total_uang']) ?>
                            </td>
                        </tr>
                        <?php $no++;}?>
                    </tbody>
                    <tfoot>
                        <?php
                        $query = "SELECT SUM(total_uang) FROM tb_laporan "; 
                             
                        $result = mysql_query($query) or die(mysql_error());
                        if (mysql_num_rows($result) == 0) {
                            
                        }else{ 
                            while($row = mysql_fetch_array($result)){?>
                            <tr>
                                <td>Total</td>
                                <td><b><?php echo number_format ($row['SUM(total_uang)'])?></b></td>
                            </tr>
                            <?php }
                        }?>
                    </tfoot>
                </table>
            </div>
            <?php 
                $q = mysql_query("
                    SELECT  
                        COUNT(IF( MONTHNAME(tanggal) = 'January' , tanggal, NULL)) AS January,
                        COUNT(IF( MONTHNAME(tanggal) = 'February' , tanggal, NULL)) AS February,
                        COUNT(IF( MONTHNAME(tanggal) = 'March' , tanggal, NULL)) AS March,
                        COUNT(IF( MONTHNAME(tanggal) = 'April' , tanggal, NULL)) AS April,
                        COUNT(IF( MONTHNAME(tanggal) = 'May' , tanggal, NULL)) AS May,
                        COUNT(IF( MONTHNAME(tanggal) = 'June' , tanggal, NULL)) AS June,
                        COUNT(IF( MONTHNAME(tanggal) = 'July' , tanggal, NULL)) AS July,
                        COUNT(IF( MONTHNAME(tanggal) = 'August' , tanggal, NULL)) AS August,
                        COUNT(IF( MONTHNAME(tanggal) = 'September' , tanggal, NULL)) AS September,
                        COUNT(IF( MONTHNAME(tanggal) = 'October' , tanggal, NULL)) AS October,
                        COUNT(IF( MONTHNAME(tanggal) = 'November' , tanggal, NULL)) AS November,
                        COUNT(IF( MONTHNAME(tanggal) = 'December' , tanggal, NULL)) AS December
                    FROM tb_laporan ")or die(mysql_error());

                $d = mysql_fetch_array($q);
                $bulan = array(
                    $d['January'],
                    $d['February'],
                    $d['March'],
                    $d['April'],
                    $d['May'],
                    $d['June'],
                    $d['July'],
                    $d['August'],
                    $d['September'],
                    $d['October'],
                    $d['November'],
                    $d['December'],
                );
            ?>
            <!-- Bulan -->
            <div class="card-reveal">
                <div class="card-panel teal white-text z-depth-3 activator">
                    <span class="card-title">
                        <i class="small material-icons right">close</i>      
                        <center>
                            <h5>Grafik Pemesanan</h5>
                        </center>
                    </span>
                </div>
                <ul id="tabs-swipe-demo" class="tabs">
                    <li class="tab col s6"><a class="active" href="#bulan">Bulan</a></li>
                    <li class="tab col s6"><a href="#tahun">Tahun</a></li>
                </ul>
                <div id="bulan" class="col s12">
                    <canvas class="hide-on-med-and-down" id="bulan-large" width="100" height="35"></canvas>
                    <canvas class="hide-on-large-only show-on-medium hide-on-small-only" id="bulan-medium" width="100" height="42"></canvas>
                    <canvas class="hide-on-med-and-up" id="bulan-small" width="100" height="200"></canvas>
                </div>
                <div id="tahun" class="col s12">
                    <canvas class="hide-on-med-and-down" id="tahun-large" width="100" height="35"></canvas>
                    <canvas class="hide-on-large-only show-on-medium hide-on-small-only" id="tahun-medium" width="100" height="42"></canvas>
                    <canvas class="hide-on-med-and-up" id="tahun-small" width="100" height="200"></canvas>
                </div>
            </div>
            <!-- END BULAN -->
        </div>
    </div>
</div>
<?php } ?>