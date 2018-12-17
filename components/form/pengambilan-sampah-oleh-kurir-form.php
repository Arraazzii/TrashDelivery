<form action="../controllers/config/p_pesan.php" method="post" class="center">
    <input type="" name="kode" value="<?php echo $d['kode_terima']; ?>" hidden>
    <input type="" name="total" value="<?php echo $d['berat']; ?>" hidden>
    <input type="" name="harga" value="<?php echo $d['harga']; ?>" hidden>
    <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" hidden>
    <input type="checkbox" id="indeterminate-checkbox" name="kurir" />
    <label for="indeterminate-checkbox">Harap klik tombol konfimasi jika Kurir telah mengambil Sampah</label>
    <br>
    <br>
    <button class="btn teal waves-effect" type="submit" name="konfir">Konfirmasi</button>
</form>