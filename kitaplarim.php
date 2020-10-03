<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kütüphane</title>
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
    <link rel="stylesheet"  href="css/bootstrap.css">
</head>
<body>
<?php
include ("menu.php");
include ("conn.php");
?>

<div class="container">
    <h3 class="text-center mt-5">ALDIĞINIZ KİTAPLAR:</h3>

    <div class="row mt-5">
        <?php
            $_SESSION["kitapver_islem"]=0;
            $kitap_sql =$db->prepare("select * from kitap_sahipleri where user_id=?");
            $kitap_sql->execute(array($_SESSION["user_id"]));



        foreach ($kitap_sql as $row){

            $query = $db->query("SELECT * FROM kitaplar WHERE id = '{$row["kitap_id"]}'")->fetch(PDO::FETCH_ASSOC);



            ?>
            <div class="col-md-4" >
                <div class="card" style="height:100%; ">
                    <img src="kitap_fotolari/<?php echo $query["kitapOn_url"]; ?>"  class="card-img-top" style="height:65%; " alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $query["kitap_adi"];?></h5>
                        <p class="card-title">ISBN:<?php echo $query["isbn"];  ?></p>

                    </div>
                    <div class="card-footer">
                        <form action="" method="post" enctype="multipart/form-data">

                            <label for="customFile">Kitabın barkodlu kısmını seçiniz:</label>
                            <br>
                            <input type="file" name="kitap_arka" id="customFile">
                            <br><br>

                            <input type="submit" class="btn btn-danger btn-block" name="arka_foto"    value="Teslim Et">

                        </form>

                        <!--<a class="btn btn-danger btn-block" onclick="PopupCenter()" style="color:white; "> Teslim Et</a>-->
                    </div>

                </div>
            </div>

            <?php

        }
        ?>


    </div>



</div>

<?php
if(@$_POST["arka_foto"]){
        if($_FILES["kitap_arka"]["name"]==null){
            ?>
            <script>alert("Lütfen kitabın barkodlu fotoğrafını yükleyiniz")</script>
            <?php
            header("Refresh=0 url=kitaplarim.php");
        }else{
            $_FILES["kitap_arka"]["name"]="arka.jpg";
            $ydizin_arka="kitap_teslim_image/".basename($_FILES['kitap_arka']['name']);
            if(move_uploaded_file($_FILES['kitap_arka']['tmp_name'],$ydizin_arka)){
               echo  '<img src="kitap_teslim_image/arka.jpg" onload="PopupCenter()" style="height:0;">';
            }

        }

}
?>
<script>

    function PopupCenter() {
        var w = 1090; //pencere genislik
        var h = 600; //pencere yukseklik
        /*sayfaya ortala*/
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        /*--------------*/
        window.open("crop.php", "Kırpma ve Barkod Okuma", 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left); //pencereyi ac

    }
</script>
<script src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</body>
</html>