<form action="../controllers/config/p_edit-warga.php" method="post">
    <div class="form-container">
        <div class="row">
            <div class="input-field col s6">
                <input value="<?php echo $d['kepala_keluarga'] ?>" id="name" type="text" name="ayah" class="validate" required>
                <label class="active" for="name">
                    Nama
                </label>
            </div>
            <div class="input-field col s6">
                <input value="<?php echo $d['nik'] ?>" id="nik" type="number" name="nik" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="18" class="validate" readonly>
                <label class="active" for="nik">
                    NIK
                </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input value="<?php echo $d['password'] ?>" id="password" type="password" name="password" class="validate" required>
                <label class="active" for="password">
                    password
                </label>
            </div>
            <div class="input-field col s6">
                <input value="<?php echo $d['telepon'] ?>" id="telepon" type="number" name="telepon" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="validate" maxlength="13" required>
                <label class="active" for="telepon">
                    No. Telepon
                </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s10">
                <input value="<?php echo $d['alamat'] ?>" id="alamat" type="text" name="alamat" class="validate" required>
                <label class="active" for="alamat">
                    Alamat
                </label>
            </div>
            <div class="input-field col s2">
                <input value="<?php echo $d['no_rumah'] ?>" id="no_rumah" type="number" name="no_rumah" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="validate" maxlength="3" required>
                <label class="active" for="no_rumah">
                    No. Rumah
                </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input value="<?php echo $d['rt'] ?>" id="rt" type="number" name="rt" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="validate" maxlength="3" required>
                <label class="active" for="rt">
                    RT
                </label>
            </div>
            <div class="input-field col s6">
                <input value="<?php echo $d['rw'] ?>" id="rw" type="number" name="rw" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="validate" maxlength="3" required>
                <label class="active" for="rw">
                    RW
                </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input value="<?php echo $d['kelurahan'] ?>" id="kelurahan" type="text" name="kelurahan" class="validate" required>
                <label class="active" for="kelurahan">
                    Kelurahan
                </label>
            </div>
            <div class="input-field col s6">
                <input value="<?php echo $d['kecamatan'] ?>" id="kecamatan" type="text" name="kecamatan" class="validate" required>
                <label class="active" for="kecamatan">
                    Kecamatan
                </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input value="<?php echo $d['kota'] ?>" id="city" type="text" name="kota" class="validate" required>
                <label class="active" for="city">
                    Kota
                </label>
            </div>
            <div class="input-field col s6">
                <input value="<?php echo $d['kode_pos'] ?>" id="zipcode" type="number" name="kode_pos" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="validate" maxlength="5" required>
                <label class="active" for="zipcode">
                    Kode Pos
                </label>
                <input class="active" type="hidden" name="kode_alamat" value="<?php echo $d['kode_alamat'] ?>">
            </div>
        </div>
        <div class="modal-footer center">
            <button class="btn waves-effect waves-light teal" type="submit" name="edit">Submit</button>
        </div>
    </div>
</form>