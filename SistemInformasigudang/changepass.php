<?session_start();

require("Template.php");
if(isset($_POST['pass']) && isset($_POST['confirmpass']) && isset($_POST['passlama']) && isset($_SESSION['username']) )
{
  
    require("Koneksi.php");

    $output=' ';
    echo $output;
    // get values 
    $pass = $_POST['pass'];
    $confirm = $_POST['confirmpass'];
    $passlama = $_POST['passlama'];
    $username  = $_SESSION["username"];
    $passsession= $_SESSION['password'];
 
      $Tampil_data = $koneksi->prepare('SELECT * FROM pegawai where username=:username');
      $Tampil_data->bindParam(":username",  $username);

     $Tampil_data->execute();
     $daftar = $Tampil_data->fetch(PDO::FETCH_OBJ);
    $coba= $daftar->password; 
    
if($passlama==$coba){
if($pass==$confirm){    
    $query=$koneksi->prepare("UPDATE `pegawai`   
    SET `password` = :pass
       
  WHERE `username` = :user");

$query->bindParam(":pass",  $pass);
$query->bindParam(":user", $username );
 

 
 $query->execute();

    
    
    
    
    //$pdoExec = $pdoResult->execute(array(":namabarang"=>$namabarang,":hargabarang"=>$hargabarang,":supplier"=>$supplier));
 if($query)
   {
        echo"<div class='alert alert-success'>
        <strong>Password Telah Diubah
      </div>";
   
      
      
         
     }else{
         echo 'Data Not Inserted';
   }


 
}
else{
    global $output;
    $output="<div class='alert alert-danger'>
    <strong>Password tidak cocok dengan password confirm
  </div>";
  echo $output;
 
}
}
else{
 echo "<div class='alert alert-danger'>
    <strong>Password lama salah 
  </div>";
}
}
require("changepass.view.php");

?>



