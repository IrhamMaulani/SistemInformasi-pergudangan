<?php
 
require("../Koneksi.php");

    // get User ID
    $idkonsumen = $_POST['idkonsumen'];
 
    $query =$koneksi->prepare("SELECT * FROM konsumen WHERE idkonsumen = :idkonsumen");
    $query->bindParam("idkonsumen", $idkonsumen);
    $query->execute();
    $userData_List = array();
    
       while($row=$query->fetch(PDO::FETCH_ASSOC)){
           $userData_List= $row;	
       }
       echo json_encode($userData_List);
