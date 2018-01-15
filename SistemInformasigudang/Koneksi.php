<?php
try{
$koneksi = new PDO('mysql:host=localhost;dbname=supermarket', "root", "");
}catch (PDOException $e){
    die($e-> getMessage());
    exit();
}

?>