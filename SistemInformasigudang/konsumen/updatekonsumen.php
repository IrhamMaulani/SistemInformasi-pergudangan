



<?php
require("../Koneksi.php");


//if (isset($_POST['submit'])) {
    if(isset($_POST)  && !empty($_POST['namakonsumen']) &&  !empty($_POST['alamatkonsumen']))
    {
       
        $Namakonsumen=$_POST['namakonsumen'];
        $alamatkonsumen=$_POST['alamatkonsumen'];
        $tanggal=$_POST['tanggal'];
        $gender = $_POST['gender'];
      
  
    
    $query=$koneksi->prepare("UPDATE `konsumen`   
    SET `namakonsumen` = :Nama,
        `alamatkonsumen` = :alamat,
        `ttl` = :ttl,
        `jenis_kelamin`= :gender
  WHERE `idkonsumen` = :idkonsumen");

$query->bindParam(":idkonsumen",  $_POST["idkonsumen"]);
 $query->bindParam(":Nama",  $Namakonsumen);
 $query->bindParam(":alamat", $alamatkonsumen);
 $query->bindParam(":ttl",$tanggal);
 $query->bindParam(":gender",$gender);


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