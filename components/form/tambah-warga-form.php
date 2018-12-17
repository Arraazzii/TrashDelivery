<form class="col s12" action="../controllers/config/p_daftar.php" method="post">
    <div class="form-container">
        <div class="row">
            <div class="input-field col s6">
                <input id="father_name" type="text" name="ayah" class="validate" required>
                <label for="father_name">Nama Ayah</label>
            </div>
            <div class="input-field col s6">
                <input id="nik" type="number" name="nik" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="18" class="validate" required>
                <label for="nik">NIK</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="telepon" type="number" name="telepon" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="validate" maxlength="13" required>
                <label for="telepon">No. Telepon</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="alamat" type="text" name="alamat" class="validate" required>
                <label for="alamat">Alamat</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="no_rumah" type="number" name="no_rumah" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="validate" maxlength="3" required>
                <label for="no_rumah">No. Rumah</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="rt" type="number" name="rt" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="validate" maxlength="3" required>
                <label for="rt">RT</label>
            </div>
            <div class="input-field col s6">
                <input id="rw" type="number" name="rw" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="validate" maxlength="3" required>
                <label for="rw">RW</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="kelurahan" type="text" name="kelurahan" class="validate" required>
                <label for="kelurahan">Kelurahan</label>
            </div>
            <div class="input-field col s6">
                <input id="kecamatan" type="text" name="kecamatan" class="validate" required>
                <label for="kecamatan">Kecamatan</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="city" type="text" name="kota" class="validate" required>
                <label for="city">Kota</label>
            </div>
            <div class="input-field col s6">
                <input id="zipcode" type="number" name="kode_pos" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="validate" maxlength="5" required>
                <label for="zipcode">Kode Pos</label>
            </div>
        </div>
        <div class="modal-footer center">
            <button class="btn waves-effect waves-light teal" type="submit" name="daftar">Submit</button>
        </div>
    </div>
</form>