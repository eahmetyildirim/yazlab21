<?php

try {
    $db = new PDO("mysql:host=localhost; dbname=yazlab21;", "root", "");
} catch (PDOException $e) {
    print $e->getMessage();
}


?>
