<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kütüphane</title>

    <link rel="stylesheet"  href="css/bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
</head>
<body>
<?php
include ("menu.php");
include ("conn.php");
?>

<div class="container">
    <h3 class="text-center mt-5">KİTAPLARIMIZ</h3>
    <div class="col-ms-12">
    <form action="index.php" method="post">
        <div class="form-inline">
        <label for="search">Kitap Ara:</label>
        <input type="search" id="search" name="search" class="form-control" style="width:85%; margin-left:10px;  " placeholder="Aramak istediğiniz kitap adı yada isbn numarasını yazınız">
        <input type="submit" style="margin-left:10px; " name="submit" class="btn btn-dark " value="BUL">
        </div>
    </form>
    </div>
    <div class="row mt-5">
        <?php
        if(@$_POST["submit"]){
            if($_POST["search"]==null){
                $kitap_sql =$db->prepare("select * from kitaplar order by kitap_adi asc");
                $kitap_sql->execute();
            }else{
                $kitap_sql =$db->prepare("select * from kitaplar where kitap_adi LIKE ? or isbn LIKE ? ");
                $kitap_sql->execute(array('%'.$_POST["search"].'%',$_POST["search"].'%'));
            }
        }else{
            $kitap_sql =$db->prepare("select * from kitaplar order by kitap_adi asc");
            $kitap_sql->execute();
        }


        foreach ($kitap_sql as $row){


            ?>
            <div class="col-md-4" >
                <div class="card" style="height:90%; ">
                    <img src="kitap_fotolari/<?php echo $row["kitapOn_url"]; ?>"  class="card-img-top" style="height:70%; " alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["kitap_adi"];?></h5>
                        <p class="card-title">ISBN:<?php echo $row["isbn"];  ?></p>

                    </div>
                    <div class="card-footer">
                    <?php
                    if(@$_SESSION["user_aktif"]==true){
                        $alinmis_mi_sql=$db->prepare("select * from kitap_sahipleri where kitap_id=? ");
                        $alinmis_mi_sql->execute(array($row["id"]));
                        if($alinmis_mi_sql->rowCount()>0){
                            echo "Bu kitap alınmış.";
                        }else{
                        echo '  <a class="btn btn-success btn-block" href="kitap_al.php?id='.$row["id"].'">Kitap Al</a>';
                        }
                    }else{
                        echo 'Kitap almak için  giriş yapınız. <a href="user_login.php">Giriş Yap</a>';
                    } ?>

                    </div>

                </div>
            </div>

            <?php
        }
        ?>


    </div>



</div>

<script src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</body>
</html>