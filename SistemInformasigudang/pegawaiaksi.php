<?php 
//session_start();
require ("koneksi.php");

if(isset($_POST['submit']) && isset($_SESSION['username'])   ) 

{ 

    isset($_POST["gender"]);
    $nama=$_POST["namapegawai"];
    $alamat=$_POST["alamat"];
    $gender=$_POST["gender"];

$folder ="Pic/"; 

$image = $_FILES['image']['name']; 


$path = $folder . $image ; 

$target_file=$folder.basename($_FILES["image"]["name"]);

 
 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

 
$allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 

$ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 

{ 

 echo "<div class='alert alert-danger'>
 <strong>Sorry, only JPG, JPEG, PNG & GIF  files are allowed
</div>";


}

else{ 
      $Tampil_data = $koneksi->prepare('SELECT * FROM pegawai where username=:username');

     $koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$Tampil_data->bindParam(":username",$_SESSION['username']);
  $Tampil_data->execute();
 $daftar = $Tampil_data->fetch(PDO::FETCH_OBJ);

    if(is_file($daftar->image)) // Jika foto ada
    unlink($daftar->image); 


    echo"<div class='alert alert-success'>
    <strong>Gambar Berhasil di Ubah
  </div>";

move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 

$sth=$koneksi->prepare("UPDATE `pegawai`   
SET `image` = :pic

    
where `idPegawai`= :user "); 

$sth->bindParam(':user',$_POST['id']); 
$sth->bindParam(':pic',$path); 

$sth->execute(); 


} 

} 

?> 
