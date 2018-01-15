<?php
 
require("../Koneksi.php");

    // get User ID
    $idbarang = $_POST['idbarang'];
 
    $query =$koneksi->prepare("SELECT * FROM barang WHERE idbarang = :idbarang");
    $query->bindParam("idbarang", $idbarang);
    $query->execute();
    $userData_List = array();
    
       while($row=$query->fetch(PDO::FETCH_ASSOC)){
           $userData_List= $row;	
       }
       echo json_encode($userData_List);
