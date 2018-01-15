<?session_start();
if(isset($_POST['logout'])){

    require("../koneksi.php");

    $username = $_SESSION["username"];

    $update = $koneksi->prepare("UPDATE `pegawai`   
    SET `stat` = 'OF'
  WHERE `username` = :user");
  $update->bindParam(":user",$username);
  $update->execute();
    
    session_destroy();

    header('location: index.php');die();
}

?>