<?php require("../Koneksi.php")?>
        
        <?  $Tampil_data = $koneksi->prepare('SELECT * FROM barang group by idbarang desc');?>

        <?  $Tampil_data->execute();?>
        <? $daftar = $Tampil_data->fetchAll(PDO::FETCH_OBJ);?>



   

<table id="tabel-data" class="table table-bordered ">
<thead>
        <tr>
        <th><center>Id Barang</center></th>
        <th><center> Nama Barang</center></th>
        <th><center> Jenis Barang</center></th>
        <th><center>View Data</center></th>
        <th><center>Edit Data</center></th>
        <th><center>Delete Data</center></th>
        </tr>
       <center><center>
       </thead>     
        
            <?php foreach ($daftar as $data):?>
            <tr>
            <center><td><?="$data->idbarang " ?></td></center>
                <center><td><?="$data->namabarang " ?></td></center>
                <center><td><?="$data->jenisbarang " ?></td></center>
                <td><input type="button" name="view" value="view" id="<?php echo $data->idbarang; ?>" class="btn btn-info  view_data" /></td>
                <td><button onclick="GetUserDetails('<?echo $data->idbarang?>')" class="btn btn-primary">Update</button></td>
                <td><button onclick="DeleteUser('<?echo $data->idbarang?>')" class="btn btn-danger">Delete</button></td>
                
                

               
                
                

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

