<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="stylesheet"  href="css/bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
</head>
<body>

<?php include("menu.php");
$durum =@$_GET["d"];
$durum2 =@$_GET["du"];
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6  mt-3">
           <div class="card">
            <div class="card-header">
                <h4 class="text-center">Giriş Yap</h4>
            </div>
            <div class="card-body">
            <form action="login_control.php" method="post">

                <div class="form-group">
                    <label for="exampleInputEmail1">E-Posta yada Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="emailoruser" id="exampleInputEmail1" placeholder="Mail adresinizi yada kullanıcı adınızı giriniz" aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Şifre</label>
                    <input type="password" class="form-control" name="pass" placeholder="Şifrenizi giriniz" id="exampleInputPassword1">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Giriş Yap</button>
                    <span>yada </span>
                    <a href="user_register.php" class="btn btn-danger">Kayıt Ol</a>
                </div>
                    <?php

                if(isset($durum)){  ?>
                    <div class="alert alert-success mt-2" role="alert">
                        <?php
                        if($durum==1){
                            echo "Kayıt tamamlandı giriş yapabilirsiniz.";
                        }
                        ?>
                    </div>
                <?php }
                if(isset($durum2)){ ?>
                <div class="alert alert-danger mt-2" role="alert">
                    <?php

                    if ($durum2 == 1) {
                        echo "Mail adresi yada kullanıcı adı kullanılmamakta!";
                    } else if ($durum2 == 2) {
                        echo "Şifre yanlış!";
                    }
                    ?></div><?php
                }
                ?>
            </form>
            </div>
           </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</body>
</html>