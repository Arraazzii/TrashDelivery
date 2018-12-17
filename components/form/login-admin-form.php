<form class="col s12" action="../controllers/config/p_login.php" method="post">
    <div class="form-container">
        <h3 class="teal-text">Hello, Admin</h3>
        <div class="row">
            <div class="input-field col s12">
                <input id="username" type="text" name="username" class="validate">
                <label for="username">Username</label>
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
            <button class="btn waves-effect waves-light teal" type="submit" name="admin">Connect</button>
        </center>
    </div>
</form>