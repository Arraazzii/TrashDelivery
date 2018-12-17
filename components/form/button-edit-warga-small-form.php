<form action="editwarga" method="post">
    <button class="btn">
        <input type="hidden" name="edit" value="<?php echo $d['nik']; ?>">EDIT
    </button>
    <a class="btn red" onclick="return confirm('Hapus Data?')" href="../controllers/config/p_hapus-warga.php?qweqwe=<?php echo base64_encode($d['nik']);?>">Hapus</a>
</form>