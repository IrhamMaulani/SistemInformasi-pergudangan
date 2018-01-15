<?php
if(isset($_POST['namakonsumen']) && isset($_POST['alamatkonsumen']) && isset($_POST['tanggal']) && isset($_POST['gender']))
{
    // include Database connection file 
    include("../Koneksi.php");

    // get values 
    $namakonsumen = $_POST['namakonsumen'];
    $alamat = $_POST['alamatkonsumen'];
    $tanggal = $_POST['tanggal'];
    $gender = $_POST['gender'];

    $pdoQuery = "INSERT INTO `konsumen`(`namakonsumen`, `alamatkonsumen` , `jenis_kelamin`, `ttl`) VALUES (:namakonsumen,:alamatkonsumen,:jeniskelamin,:ttl)";
    
    $koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $pdoResult = $koneksi->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":namakonsumen"=>$namakonsumen,":alamatkonsumen"=>$alamat,":jeniskelamin"=>$gender,":ttl"=>$tanggal));
   if($pdoExec)
     {
       
        echo"<script>Alert('Data Tersimpan')</script>";
         
     }else{
         echo 'Data Not Inserted';
     }



}
?>