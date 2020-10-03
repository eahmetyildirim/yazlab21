<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php
    session_start();
    ?>
    <a class="navbar-brand" href="index.php">KÜTÜPHANE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Ana Sayfa <span class="sr-only">(current)</span></a>
            </li>
            <?php if(@$_SESSION["user_aktif"]){ ?>
            <li class="nav-item">
                <a class="nav-link" href="kitaplarim.php">Kitaplarım</a>
            </li>
            <?php } ?>

            <?php if(@!$_SESSION["user_aktif"]){ ?>
            <li class="nav-item">
                <a class="nav-link" href="user_login.php">Giriş Yap</a>
            </li>
            <?php } ?>
            <?php if(@$_SESSION["user_aktif"]){ ?>
            <li class="nav-item">
                <a class="nav-link" href="cikis.php">Çıkış Yap</a>
            </li>
            <?php } ?>

        </ul>
    </div>
</nav>