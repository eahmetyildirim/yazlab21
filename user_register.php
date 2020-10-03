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
$durum=@$_GET["d"];

?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6  mt-3">
            <div class="card" id="kayitolma">
                <div class="card-header">
                    <h2 class="text-center">Kayıt Ol</h2>
                </div>
                <div class="card-body" >
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="exampleInputUser">Kullanıcı Adı</label>
                            <input type="text" class="form-control" name="user_name" id="exampleInputUser"  placeholder="Kullanıcı giriniz" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-Posta</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"  placeholder="Mail adresinizi giriniz" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Şifre</label>
                            <input type="password" class="form-control" name="pass1" placeholder="Şifrenizi giriniz" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Şifre Tekrar</label>
                            <input type="password" class="form-control" name="pass2" placeholder="Şifrenizi giriniz" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary" name="buton">Kayıt Ol</button>

                        <?php

                        if(isset($durum)){  ?>
                        <div class="alert alert-danger mt-2" role="alert">
                            <?php
                            if($durum==1){
                                echo "Lütfen boş alan bırakmayınız!";
                            }
                            if($durum==2){
                                echo "Şifreler eşleşmedi!";
                            }
                            if($durum==3){
                                echo "Mail adresi yada kullanıcı adı kullanılıyor!";
                            }
                            if($durum==4){
                                echo "Kayıt başarısız!";
                            }
                            ?>
                        </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST["buton"])){
   $user_name=$_POST["user_name"];
   $email=$_POST["email"];
   $pass1=$_POST["pass1"];
   $pass2=$_POST["pass2"];
   if($user_name==null || $email==null || $pass1==null || $pass2==null){
       header("Location:user_register.php?d=1");
   }else if($pass1!=$pass2){
       header("Location:user_register.php?d=2");
   }else{
    include ("conn.php");
    $varmi=$db->prepare("select * from users where user_name=? or mail=? ");
    $varmi->execute(array($user_name,$email));
       if($varmi->rowCount()>0){
           header("Location:user_register.php?d=3");
       }else{
           $ekle=$db->prepare("insert into users (user_name,mail,pass) value (?,?,?)");
           $ekle->execute(array($user_name,$email,$pass1));
           if($ekle->errorInfo()[0]==0){
               header("Location:user_login.php?d=1");
           }else{
               header("Location:user_register.php?d=4");
           }

    }

   }
}
?>
<script src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</body>
</html>