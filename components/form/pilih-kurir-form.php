<form method="post" action="../controllers/config/p_konfir-pesan.php">
    <td>
        <?php echo $d['kode_kurir'] ?>
        <input type="text" name="kode_kurir" value="<?= base64_encode($d['kode_kurir']) ?>" hidden>
        <input type="text" name="kode_terima" value="<?= base64_encode($kode) ?>" hidden>
    </td>
    <td>
        <?php echo $d['nama_kurir'] ?>
    </td>
    <td>
        <?php echo $d['telepon'] ?>
    </td>
    <td>
        <button type="submit" class='btn modal-trigger'>Pilih</button>
    </td>
</form>