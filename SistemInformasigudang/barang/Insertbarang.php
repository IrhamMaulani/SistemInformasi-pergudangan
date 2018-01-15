<?php
if(isset($_POST['namabarang']) && isset($_POST['hargabarang']) && isset($_POST['supplier']) && isset($_POST['jenisbarang']))
{
    // include Database connection file 
    include("../Koneksi.php");

    // get values 
    $namabarang = $_POST['namabarang'];
    $hargabarang = $_POST['hargabarang'];
    $supplier = $_POST['supplier'];
    $jenisbarang = $_POST['jenisbarang'];

    $pdoQuery = "INSERT INTO `barang`(`namabarang`, `hargabarang`, `supplier`, `jenisbarang`) VALUES (:namabarang,:hargabarang,:supplier,:jenisbarang)";
    
    $koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $pdoResult = $koneksi->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":namabarang"=>$namabarang,":hargabarang"=>$hargabarang,":supplier"=>$supplier,":jenisbarang"=>$jenisbarang));
   if($pdoExec)
     {
         $output="Data Masuk";
         
     }else{
         echo 'Data Not Inserted';
     }



}
?>