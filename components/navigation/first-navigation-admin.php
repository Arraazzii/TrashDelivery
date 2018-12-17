<?php
        //jumlah notifikasi 
        require '../../../_database/koneksi.php';
        $q = mysql_query("SELECT * FROM tb_terima WHERE status ='Menunggu'") or die(mysql_error());
        $w = mysql_query("SELECT * FROM tb_warga") or die(mysql_error());
        $e = mysql_query("SELECT * FROM tb_kurir") or die(mysql_error());
        
        ?>
    <header>
        <div class="navbar-fixed">
            <nav class="teal row" role="navigation">
                <div class="nav-wrapper  col s12 m12 l9 push-l3">
                    <a id="logo-container" href="home" class="brand-logo hide-on-med-and-down" style="margin-left:-20px">Trash || Delivery </a>
                    <a id="logo-container" href="home" class="brand-logo hide-on-large-only">Trash || Delivery</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="../controllers/config/logout.php"><i class="large right material-icons">exit_to_app</i>Log Out</a></li>
                    </ul>
                    <ul id="nav-mobile" class="side-nav">
                        <li><a href="kurir"><i class="material-icons">transfer_within_a_station</i>Kurir</a></li>
                        <li><a href="warga"><i class="material-icons">person</i>Warga</a></li>
                        <li>
                            <div class="divider"></div>
                        </li>
                        <li><a href="laporan"><i class="material-icons">report</i>Laporan</a></li>
                        <li><a href="pesanan"><i class="material-icons">shop</i>Pesanan</a></li>
                        <li><a href="diproses"><i class="material-icons">show_chart</i>Diproses</a></li>
                        <li><a href="../controllers/config/logout.php"><i class="large right material-icons">exit_to_app</i>Log Out</a></li>
                    </ul>
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                </div>
            </nav>
        </div>
        <div class="row">
            <ul class="side-nav fixed col s2 m2 l2" style="padding:0;margin:0;width:225px;">
                <li>
                    <div class="userView">
                        <div class="background">
                            <img src="../assets/img/Sampah.jpg">
                        </div>
                        <a href=""><img  style="margin-left:45px" class="circle" src="../assets/img/User.jpg"></a>
                        <a href=""><span style="margin-left:45px" class="white-text name">Welcome!</span></a>
                        <a href=""><span style="margin-left:35px" class="white-text email">Admin, <?php echo $_SESSION['nama']; ?></span></a>
                    </div>
                </li>
                <li><a class="waves-effect" href="kurir"><i class="material-icons">transfer_within_a_station</i>Kurir<span class="badge"><?php echo mysql_num_rows($e); ?></span></a></li>
                <li><a class="waves-effect" href="warga"><i class="material-icons">person</i>Warga<span class="badge"><?php echo mysql_num_rows($w); ?></span></a></li>
                <li>
                    <div class="divider"></div>
                </li>
                <li><a class="waves-effect" href="laporan"><i class="material-icons">report</i>Laporan</a></li>
                <li><a class="waves-effect" href="pesanan"><i class="material-icons">shop</i>Pesanan
                <span style="margin-left: -4px" class="new badge"><?php echo mysql_num_rows($q); ?></span></a></li>
                <li><a class="waves-effect" href="diproses"><i class="material-icons">show_chart</i>Diproses</a></li>
            </ul>
        </div>
    </header>
    <main>