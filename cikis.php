<?php
session_start();
unset($_SESSION["user_aktif"],$_SESSION["user_id"],$_SESSION["user_Username"],$_SESSION["user_name"]);
header("Location:index.php");

?>