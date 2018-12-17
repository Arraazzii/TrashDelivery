<form class="col s12" action="controllers/config/p_login.php" method="post">
    <div class="form-container">
        <h3 class="teal-text">Hello, Kurir</h3>
        <div class="row">
            <div class="input-field col s12">
                <input id="kode" type="password" name="kode" class="validate">
                <label for="kode">Enter Your Code Here..</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">Password</label>
            </div>
        </div>
        <br>
        <center>
            <button class="btn waves-effect waves-light teal" type="submit" name="kurir">Connect</button>
        </center>
    </div>
</form>