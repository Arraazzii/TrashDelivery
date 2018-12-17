<form action="../controllers/config/p_pesan.php" method="post" class="center">
    <input type="" name="kode" value="<?php echo $kode_kurir?>" hidden>
    <input type="checkbox" id="indeterminate-checkbox" name="kurir" />
    <label for="indeterminate-checkbox">Harap klik tombol konfimasi jika telah mengambil Sampah</label>
    <br>
    <br>
    <button class="btn teal waves-effect" type="submit" name="kurir">Konfirmasi</button>
</form>