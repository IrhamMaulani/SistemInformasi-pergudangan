<?php require("../Koneksi.php")?>
        
        <?  $Tampil_data = $koneksi->prepare('SELECT * FROM konsumen group by idkonsumen desc');?>

        <?  $Tampil_data->execute();?>
        <? $daftar = $Tampil_data->fetchAll(PDO::FETCH_OBJ);?>



   

<table id="tabel-data" class="table table-bordered ">
<thead>
        <tr>
        <th><center>Id Konsumen</center></th>
        <th><center> Nama Konsumen</center></th>
        <th><center>View Data</center></th>
        <th><center>Edit Data</center></th>
        <th><center>Delete Data</center></th>
        </tr>
       <center><center>
       </thead>     
        
            <?php foreach ($daftar as $data):?>
            <tr>
            <center><td><?="$data->idkonsumen " ?></td></center>
                <center><td><?="$data->namakonsumen " ?></td></center>
                <td><input type="button" name="view" value="view" id="<?php echo $data->idkonsumen; ?>" class="btn btn-info  view_data" /></td>
                <td><button onclick="GetUserDetails('<?echo $data->idkonsumen?>')" class="btn btn-primary">Update</button></td>
                <td><button onclick="DeleteUser('<?echo $data->idkonsumen?>')" class="btn btn-danger">Delete</button></td>
                
                

               
                
                

            </tr>
            <?endforeach?>
        </table>
        <script>
    $(document).ready(function(){
        responsive: true
        var table = $('#tabel-data').DataTable({order:[]});
       // $('#tabel-data').DataTable();
       
    });
</script>
</body>

