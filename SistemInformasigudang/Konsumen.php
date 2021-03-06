<?session_start();?>

<?php if (isset($_SESSION['username'])): ?>


<?require("Template.php");?>



<script src="Asset\js\jquery-3.2.1.js"></script>
<!--<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->
<script type="text/javascript" src="https://cdn.datatables.net/v/ju/dt-1.10.16/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript" src="konsumen.js"></script>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="Dashboard.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Konsumen</li>
      </ol>

      <p class="alert-success"></p>
<div class="container">
<div class="row">
<div class="col-md-12">
<h2></h2>
<div class="pull-right">
<button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<h4>Records:</h4>
<div class="records_content"></div>
</div>
</div>
</div>

<p class="statusSuccess"></p>
<!-- /Content Section -->


<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title" id="myModalLabel">Add New Record</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
 
<div class="form-group">
<label for="namabara">Nama konsumen</label>
<input type="text" id="namakonsumen"  class="form-control" />
</div>
 
<div class="form-group">
<label for="hargabarang">Alamat konsumen</label>
<input type="text" id="alamatkonsumen"  class="form-control" />
</div>

TTL
  <input class="form-control" type="date" id="tanggal" >
  <br>
 
<!--Jenis Kelamin
     <input id="gender" type="radio" name="gender"  value="laki-laki" checked> Laki-laki
     <input id="gender" type="radio" name="gender"  value="perempuan" > Perempuan
 -->
 <div class="form-group">
                     <label for="update_Gender">Jenis Kelamin</label>
                        <select class="form-control" name="gender" id="gender">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                         
                        </select>
                        </div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
</div>
</div>
</div>
</div>
<!--End Of Modal For Add -->

<!-- Modal Edit-->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 class="modal-title" id="myModalLabel">Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
 
                <div class="form-group">
                    <label for="updatenamabarang">Nama Konsumen</label>
                    <input type="text" id="updatenamakonsumen" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="updatehargabarang">Alamat Konsumen</label>
                    <input type="text"  id="updatealamat" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="update_email">Tanggal Lahir</label>
                    <input class="form-control" type="date" id="updatetanggal" >
                </div>

               <!-- <div class="form-group">
                    <label for="Jenis">Jenis Kelamin</label>
                    <input id="updategender" type="radio" name="updategender"  value="laki-laki" required checked > Laki-laki
                    <input id="updategender" type="radio" name="updategender"  value="perempuan" required> Perempuan
                
                </div>
 -->
                     <div class="form-group">
                     <label for="update_Gender">Jenis Kelamin</label>
                        <select class="form-control" name="updategender" id="updategender">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                         
                        </select>
                        </div>

                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- End Modal edit -->


<!--Modal View-->

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
   <h4 class="modal-title">Detail Konsumen</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
   </div>
   <div class="modal-body" id="employee_detail">

    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<!--End Modal View-->





<?require("Template_bawah.php");?>

<?else:?>
<?header("Location:login/index.php");?>
<?endif?>