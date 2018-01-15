<?php
// check request
require("../Koneksi.php");
if(isset($_POST['idbarang']) && isset($_POST['idbarang']) != "")
{
    // include Database connection file
   
 
    // get user id
    $idbarang = $_POST['idbarang'];


    $Tampil_data = $koneksi->prepare("DELETE FROM barang WHERE idbarang = :idbarang");
    
$koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$Tampil_data->bindParam(":idbarang",$idbarang);

             $Tampil_data->execute();
}
?>