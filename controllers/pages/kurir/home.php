<?php 
    if (!isset($_SESSION['kode_kurir'])) {
        echo "<script>window.history.back();</script>";
    } else {

    include ('../../../_database/koneksi.php');
    $kode_kurir = $_SESSION['kode_kurir'];
    $q = mysql_query("SELECT * FROM tb_kurir JOIN alamat ON tb_kurir.kode_alamat = alamat.kode_alamat WHERE tb_kurir.kode_kurir = '$kode_kurir'") or die(mysql_error());
    if (mysql_num_rows($q) == 0) {
      header('location:http://localhost/trashdelivery/kurir/');
    }else{

      while ($d = mysql_fetch_array($q)) {?>
<div class="welcome">
    <span id="splash-overlay" class="splash hide-on-med-and-down" style="margin-left:115px"></span>
    <span id="splash-overlay" class="splash hide-on-large-only"></span>
    <span id="welcome" class="z-depth-4"></span>
    <header>
    </header>
    <main class="valign-wrapper">
        <span class="container grey-text text-lighten-1 ">

      <p class="flow-text teal-text hide-on-small-only">Welcome <?php echo $d['nama_kurir']; ?> as (<?php 
                          if (isset($_SESSION['nik'])) {
                            echo "Warga";
                        } else {
                            Echo "Kurir";
                        } ?>), to</p>
      <p class="flow-text teal-text hide-on-med-and-up center">Welcome <?php echo $d['nama_kurir']; ?> as (<?php 
                          if (isset($_SESSION['nik'])) {
                            echo "Warga";
                        } else {
                            Echo "Kurir";
                        } ?>), to</p>
      <h1 class="title teal-text text-lighten-3 hide-on-small-only">Trash || Delivery App</h1>
      <h1 class="title teal-text text-lighten-3 hide-on-med-and-up center">Trash <div style="font-size:50px">Delivery App</div></h1>

      <blockquote class="flow-text teal-text hide-on-small-only">Selamat Datang di Tempat Sampah Jaman Now!</blockquote>
      <div class="flow-text teal-text hide-on-med-and-up center">Selamat Datang<br>di Tempat Sampah Jaman Now!</div>

    </span>
    </main>
    <footer>
    </footer>
</div>
<?php 

  }
} 

}

?>