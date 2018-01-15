<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

if( isset($_POST['idpegawai']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
{
    
    require("Koneksi.php");
$id=$_POST['idpegawai'];
$email =$_POST['email'];
$subject = $_POST['subject'];
$pesan = $_POST['message'];



$pdoQuery = "INSERT INTO `keluhan`(`idpegawai`, `subject`, `pesan`, `email`) VALUES (:idpegawai,:subjects,:pesan,:email)";
    
   $koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $pdoResult = $koneksi->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":idpegawai"=>$id,":subjects"=>$subject,":pesan"=>$pesan,":email"=>$email));
   if($pdoExec)
     {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Pesan Terkirim","Terima Kasih Telah Menguhubungi Kami","success");';
        echo '}, 500);</script>';
         
     }else{
        echo 'Data Not Inserted';
     }

    

}


require("contact.php");

?>
