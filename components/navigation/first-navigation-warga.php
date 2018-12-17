<header>
    <div class="navbar-fixed">
        <nav class="teal row" role="navigation">
            <div class="nav-wrapper  col s12 m12 l9 push-l3">
                <a id="logo-container" href="home" class="brand-logo hide-on-med-and-down" style="margin-left:-20px">Trash || Delivery</a>
                <a id="logo-container" href="home" class="brand-logo hide-on-large-only">Trash || Delivery</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="../controllers/config/logout.php"><i class="large right material-icons">exit_to_app</i>Log Out</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="myinfo">Profil Saya</a></li>
                    <li><a href="pesan">Pesan Kurir</a></li>
                    <li><a href="history">Riwayat Pemesanan</a></li>
                    <li><a href="../controllers/config/logout.php"><i class="large right material-icons">exit_to_app</i>Log Out</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>
    <div class="fixed-action-btn horizontal">
        <a class="btn-floating btn-large teal modal-trigger" href="#modal1">
      <i class="large material-icons">mode_edit</i>
    </a>
    </div>
    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Chat With your Courier!</h4>
            </div>
            <div class="modal-body">
            </div>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="input-field col s10 m10 l10">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                    <label for="icon_prefix2">Type Here.. </label>
                </div>
                <button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Send</button>
            </div>
        </div>
    </div>
    <div class="row">
        <ul class="side-nav fixed col s2 m2 l2" style="padding:0;margin:0;width:225px;">
            <li>
                <div class="userView">
                    <div class="background">
                        <img src="../assets/img/Sampah.jpg">
                    </div>
                    <a href=""><img  style="margin-left:45px" class="circle" src="../assets/img/User.jpg"></a>
                    <a href=""><span style="margin-left:45px" class="white-text name">Welcome!</span></a>
                    <a href=""><span style="margin-left:35px" class="white-text email">Bapak <?php echo $_SESSION['ayah']; ?></span></a>
                </div>
            </li>
            <li><a class="waves-effect" href="myinfo"><i class="material-icons">face</i>Profil</a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="waves-effect" href="pesan"><i class="material-icons">group_add</i>Pesan Kurir</a></li>
            <li><a class="waves-effect" href="history"><i class="material-icons">graphic_eq</i>Riwayat Pemesanan</a></li>
        </ul>
    </div>
</header>
<main>