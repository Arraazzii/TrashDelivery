<form action="editkurir" method="post">
    <button class="btn">
        <input type="hidden" name="edit" value="<?php echo $d['kode_kurir']; ?>">EDIT
    </button>
    <a class="btn red" onclick="return confirm('Hapus Data?')" href="../controllers/config/p_hapus-kurir.php?qweqwe=<?php echo base64_encode($d['kode_kurir']); ?>&ewwq=<?php echo base64_encode($d['kode_alamat']); ?>">Hapus</a>
</form>