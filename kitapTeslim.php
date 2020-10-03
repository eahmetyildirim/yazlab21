<?php
session_start();
include("conn.php");
$isbn =$_GET["id"];
$user_id=$_SESSION["user_id"];
$sql_kitap=$db->prepare("select * from kitaplar where isbn=?");
$sql_kitap->execute(array($isbn));
$_SESSION["islem"]=0;
if($sql_kitap->rowCount()==0){
    ?>
    <script>alert("Kütüphanemizde bu isbn numarasına kayıtlı kitap bulunmamaktadır.");
        window.close();
    </script>
    <?php

}else{
$kitap_id=$sql_kitap->fetch();
$kitap_id=$kitap_id["id"];
$sql=$db->prepare("select * from kitap_sahipleri where user_id=? and kitap_id=?");
$sql->execute(array($user_id,$kitap_id));
if($sql->rowCount()==0){
    ?>
    <script>alert("Size ait bir kitap değil.");

        window.close();
    </script>
    <?php
    header("Refresh:0 url=kitaplarim.php");

}else if($sql->rowCount()==1){
    $sql=$db->prepare("delete from kitap_sahipleri  where user_id=? and kitap_id=? ");
    $sql->execute(array($user_id,$kitap_id));
    if($sql){
        ?>
        <script>alert("Kitap teslim alındı.Lütfen kitaplarim sayfasını güncelleyiniz.");
            window.close();
        </script>
        <?php
        header("Refresh:0 url=kitaplarim.php");
    }
}



}
?>