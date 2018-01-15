<?php
if(isset($_POST["employee_id"]))
{
require("../Koneksi.php");



$output = '';

 //$Tampil_data = $koneksi->prepare("SELECT * FROM employee WHERE id = '".$_POST["employee_id"]."'");
 $Tampil_data = $koneksi->prepare("SELECT * FROM barang WHERE idbarang = '".$_POST["employee_id"]."'");
 
          $Tampil_data->execute();
        $daftar = $Tampil_data->fetchAll(PDO::FETCH_OBJ);

        $output .= '  
        <div class="table-responsive">  
        <table class="table table-bordered">';
 


 foreach ($daftar as $data)
{
    $output .= '
    <tr>  
           <td width="30%"><label>Id Barang</label></td>  
           <td width="70%">'.$data->idbarang.'</td>  
       </tr>
       <tr>  
           <td width="30%"><label>Nama Barang</label></td>  
           <td width="70%">'.$data->namabarang.'</td>  
       </tr>
       <tr>  
           <td width="30%"><label>Harga Barang</label></td>  
           <td width="70%">'.$data->hargabarang.'</td>  
       </tr>
       <tr>  
           <td width="30%"><label>Supplier</label></td>  
           <td width="70%">'.$data->supplier.'</td>  
       </tr>
       <tr>  
       <td width="30%"><label>Supplier</label></td>  
       <td width="70%">'.$data->jenisbarang.'</td>  
   </tr>
     
    ';
}
$output .= '</table></div>';
echo $output;
    



}




?>