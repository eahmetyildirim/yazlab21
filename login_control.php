<?php
$userORmail=$_POST["emailoruser"];
$pass =$_POST["pass"];
include ("conn.php");

    $sql =$db->prepare("select * from users where user_name=? or mail=?");
    $sql->execute(array($userORmail,$userORmail));
    $row =$sql->fetch();
    if($sql->rowCount()==0){
            header("Location:user_login.php?du=1");
    }else{
        $sifre=$row["pass"];
        if($pass!=$sifre){
            header("Location:user_login.php?du=2");
        }else{
            session_start();
            $_SESSION["user_aktif"]=true;
            $_SESSION["user_Username"]=$row["user_name"];
            $_SESSION["user_mail"]=$row["mail"];
            $_SESSION["user_id"]=$row["id"];
            header("Location:index.php");
        }
    }

?>