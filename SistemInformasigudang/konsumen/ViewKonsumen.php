<?php
if(isset($_POST["employee_id"]))
{
require("../Koneksi.php");



$output = '';

 //$Tampil_data = $koneksi->prepare("SELECT * FROM employee WHERE id = '".$_POST["employee_id"]."'");
 $Tampil_data = $koneksi->prepare("SELECT * FROM konsumen WHERE idkonsumen = '".$_POST["employee_id"]."'");
 
          $Tampil_data->execute();
        $daftar = $Tampil_data->fetchAll(PDO::FETCH_OBJ);

        $output .= '  
        <div class="table-responsive">  
        <table class="table table-bordered">';
 


 foreach ($daftar as $data)
{
    $output .= '
    <tr>  
           <td width="40%"><label>Id Konsumen</label></td>  
           <td width="70%">'.$data->idkonsumen.'</td>  
       </tr>
       <tr>  
           <td width="40%"><label>Nama Konsumen</label></td>  
           <td width="70%">'.$data->namakonsumen.'</td>  
       </tr>
       <tr>  
           <td width="40%"><label>Alamat Konsumen</label></td>  
           <td width="70%">'.$data->alamatkonsumen.'</td>  
       </tr>
       <tr>  
           <td width="45%"><label>Tanggal Lahir<br>(YYYY-MM-DD) </label></td>  
           <td width="70%">'.$data->ttl.'</td>  
       </tr>
       <tr>  
       <td width="40%"><label>Jenis Kelamin</label></td>  
       <td width="70%">'.$data->jenis_kelamin.'</td>  
   </tr>
     
    ';
}
$output .= '</table></div>';
echo $output;
    



}




?>