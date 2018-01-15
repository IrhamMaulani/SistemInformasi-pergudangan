<?php
// check request
require("../Koneksi.php");
if(isset($_POST['idkonsumen']) && isset($_POST['idkonsumen']) != "")
{
    // include Database connection file
   
 
    // get user id
    $idkonsumen = $_POST['idkonsumen'];


    $Tampil_data = $koneksi->prepare("DELETE FROM konsumen WHERE idkonsumen = :idkonsumen");
    
$koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$Tampil_data->bindParam(":idkonsumen",$idkonsumen);

             $Tampil_data->execute();
}
?>