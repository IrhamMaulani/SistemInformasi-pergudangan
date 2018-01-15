<?if(isset($_POST['input']) && isset($_SESSION['username']) &&!empty($_POST['namapegawai']) && !empty($_POST['alamat']) && !empty($_POST['email'])) 
{ 

    $nama=$_POST["namapegawai"];
    $alamat=$_POST["alamat"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $nama = trim($nama);
    $alamat= trim($alamat);
    $email= trim($email);

    
$std=$koneksi->prepare("UPDATE `pegawai`   
SET `NamaPegawai` = :nama,
    `Alamat` = :alamat,
    `Jenis_kelamin` = :gender,
    `email` = :email

    
where `idPegawai`= :user "); 

$std->bindParam(':user',$_POST['id']); 
$std->bindParam(':nama',$nama); 
$std->bindParam(':alamat',$alamat);
$std->bindParam(':gender',$gender);  
$std->bindParam(':email',$email);  

$std->execute();
if($std)
{
    echo "<div class='alert alert-success'>
    <strong>Data telah dirubah
   </div>";

}
else{
    echo "<div class='alert alert-danger'>
    <strong>Terjadi Kesalahan
   </div>";
}

}

?>