<?php

session_start();
require('../Koneksi.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $koneksi->prepare("SELECT COUNT('username') FROM pegawai WHERE username = :username AND password = :pass");
    
    $query->bindParam("username", $username);
    $query->bindParam("pass", $password);

    $query->execute();

    $count = $query->fetchColumn();
    
    

    if ($count == "1"){
        $id=$koneksi->prepare("SELECT *FROM PEGAWAI WHERE USERNAME = :user AND PASSWORD = :password ");
        $id->bindparam("user",$username);
        $id->bindParam("password", $password);
        $id->execute();
         $data = $id->fetch(PDO::FETCH_OBJ);
       $idpegawai=$data->idPegawai;
        
        $update = $koneksi->prepare("UPDATE `pegawai`   
    SET `stat` = 'ON'
  WHERE `username` = :user");
  $update->bindParam(":user",$username);
  $update->execute();



        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['Idpegawai'] = $idpegawai;
         //echo $_SESSION['Idpegawai'];
       // header('location: index.php?error='.('<div class="alert alert-success" >Log In Berhasil</div>  ' ));
       echo "<div class='alert alert-success'>Log In Berhasil</div>";
        echo '<meta http-equiv="refresh" content="1;url=../dashboard.php"> ';
       
        
    }
    if ($count == "0"){
         echo "<div class='alert alert-danger'>Username and Password do not match.</div>";
        //  header('location: index.php?error='.('<div class="alert alert-danger" >User Name and Password do not Match!</div>'));
         // exit();
    }
    
}
//require("index.php");

?>