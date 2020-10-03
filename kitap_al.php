<?php
session_start();
include "conn.php";
$kitap_id=$_GET["id"];
$user_id=$_SESSION["user_id"];
// 604800‬
$time =time();
$sql=$db->prepare("select * from kitap_sahipleri where user_id=?");
$sql->execute(array($user_id));
if($sql->rowCount()>=3){
    ?>
    <script>alert("3'den fazla kitap alamazsınız.")</script>
    <?php
    header("Refresh:0 url=index.php");
    die();
}else{
    foreach ($sql as $row){
        $sure =time()-$row["tarih"];
        if($sure>=604800){
            ?>
            <script>alert("Teslim süresi dolmuş kitabız var. Kitap almak için önce teslim edin.")</script>
            <?php
            header("Refresh:0 url=index.php");
            die();
        }
    }

    $alinmis_mi_sql=$db->prepare("select * from kitap_sahipleri where kitap_id=? ");
    $alinmis_mi_sql->execute(array($kitap_id));
    if($alinmis_mi_sql->rowCount()>0){
        ?>
        <script>alert("Alınmış bir kitabı almaya çalşıyorsunuz!")</script>
        <?php
        header("Refresh:0 url=kitaplarim.php");

    }else{
   $ekle=$db->prepare("insert  into kitap_sahipleri (user_id,kitap_id,tarih) value (?,?,?) ");
    $ekle->execute(array($user_id,$kitap_id,$time));
    if($ekle){
        header("Refresh:0 url=kitaplarim.php");
    }
    }
}



?>