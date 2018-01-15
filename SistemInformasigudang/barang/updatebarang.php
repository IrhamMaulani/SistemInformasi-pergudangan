



<?php
require("../Koneksi.php");


//if (isset($_POST['submit'])) {
    if(isset($_POST)  && !empty($_POST['namabarang']) &&  !empty($_POST['hargabarang']))
    {
       
        $Namabarang=$_POST['namabarang'];
        $hargabarang=$_POST['hargabarang'];
        $Supplier=$_POST['supplier'];
        $jenisbarang=$_POST['jenisbarang'];
      
  
    
    $query=$koneksi->prepare("UPDATE `barang`   
    SET `namabarang` = :Nama,
        `hargabarang` = :harga,
        `supplier` = :supplier,
        `jenisbarang`= :jenisbarang
  WHERE `idbarang` = :idbarang");

$query->bindParam(":idbarang",  $_POST["idbarang"]);
 $query->bindParam(":Nama",  $Namabarang);
 $query->bindParam(":harga", $hargabarang);
 $query->bindParam(":supplier",$Supplier);
 $query->bindParam(":jenisbarang",$jenisbarang);



 $query->execute();

 if($query){

 
 echo "<a href='InsertPegawai.php'>Kembali Ke Halaman Depan</a>";
 }
 else
 {
echo"Gagal";
 }
 //$Tampil_data = $koneksi->prepare(" UPDATE pegawai set NamaPegawai='".$_POST["NamaPegawai"]."' Alamat= '".$_POST["alamat"]."' Jenis_kelamin= '".$_POST["gender"]."' where idPegawai= ".$_POST["id"]." " );
 
          //$Tampil_data->execute();
         // echo "Berhasil";



}

?>