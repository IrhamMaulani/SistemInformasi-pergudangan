<?session_start();
require('koneksi.php');

?>





<?php if (isset($_SESSION['username'])   ): ?>
<?require('Template.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
<head>
 
</head>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>

     

      <?  $Tampil_data = $koneksi->prepare('SELECT COUNT(idbarang) AS jumlahbarang FROM barang;');?>


<?  $Tampil_data->execute();?>
<? $daftar = $Tampil_data->fetch(PDO::FETCH_OBJ);?>


<?  $Tampil_data = $koneksi->prepare('SELECT COUNT(idkonsumen) AS jumlahkonsumen FROM konsumen;');?>


<?  $Tampil_data->execute();?>
<? $konsumen = $Tampil_data->fetch(PDO::FETCH_OBJ);?>

<?  $Tampil_data = $koneksi->prepare('SELECT COUNT(idpegawai) as jumlahpegawai FROM pegawai where stat="ON";');?>


<?  $Tampil_data->execute();?>
<? $pegawaion = $Tampil_data->fetch(PDO::FETCH_OBJ);?>

<style>
.ukuran{

  width:130px;
height:130px;
}

</style>



  <h3>Halo <?= $_SESSION['username'] ?></h3>
 
  <br>

  
  <div class="row">
  
  <span style="display:inline-block; width:50px;"></span>
        <div class="col-xl-3 col-sm-6 mb-3">
      
       <div class="card text-white bg-success o-hidden h-100">
         <div class="card-body">
           <div class="card-body-icon">
             <i class="fa fa-fw fa-shopping-cart"></i>
           </div>
           
           <div class="mr-5"><?="$daftar->jumlahbarang";?> Barang tersimpan
     </div>
         </div>
         <a class="card-footer text-white clearfix small z-1" href="barang.php">
           <span class="float-left">View Details</span>
           <span class="float-right">
             <i class="fa fa-angle-right"></i>
           </span>
         </a>
       </div>
     </div>
     <span style="display:inline-block; width:0px;"></span>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5"><?="$konsumen->jumlahkonsumen";?> Jumlah Pelanggan!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="konsumen.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <span style="display:inline-block; width:0px;"></span>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-address-book"></i>
              </div>
              <div class="mr-5"><?="$pegawaion->jumlahpegawai";?> Pegawai Online!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#pegawai">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        
        
        
      </div>
    </div>
    <br><br><br>

    <!--
    <form action="" method="POST" role="form">
      <legend>Form title</legend>
     <div style="position:relative;bottom:10px;left:50px;">
      <div class="form-group">
        <label for="">label</label>
       
        <input  type="text" class="form-control" id="" placeholder="Input field">
       
      </div>
    
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    -->

<!--position:relative;bottom:10px;left:0.00000000001px;-->

<div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Pie Chart Konsumen</div>
            <div class="card-body">
            <div id="Grafik" style=" width:700px; height: 300px; position:relative;bottom:0.0001px;right :100px; " >
            <?require("grafikPie.php");?>
            </div>
              <canvas id="myPieChart" width="479" height="10"></canvas>
              
            </div>
            <div class="card-footer small text-muted">Konsumen Berdasarkan Jenis Kelamin</div>
          </div>
          </div>
          <br>
          <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3"style="  position:relative;bottom:520px;left :700px; "  >
            <div class="card-header">
              <i class="fa fa-bar-chart"></i>Grafik Barang</div>
            <div class="card-body">
            <div id="Grafik"  style=" width:800px; height: 175px; position:relative; text-align:center;  right :160px; bottom:10px "  >
            <?require("grafikbatang.php");?>
            </div>
              <canvas id="myPieChart" height: "10";  ></canvas>
              
            </div>
            <div class="card-footer small text-muted">Jumlah Barang Berdasarkan Jenis Barang</div>
          </div>
          </div>
          <br>
          

          
          



        <p id="pegawai"></p>
    <?  $Tampil_data = $koneksi->prepare('SELECT *FROM pegawai where stat="ON";');?>
    <?  $Tampil_data->execute();?>
    <? $pegawai = $Tampil_data->fetchall(PDO::FETCH_OBJ);?>

    <div  align="left"> 
    <table class="table" style="width:30%;">
    <tr>
    <td > User</td>
    <td >alamat email</td>
    </tr>
     <?foreach ($pegawai as $data):?>
        <tr  class="table-success">
        <td> <?=$data->NamaPegawai?></td>
        <td><?=$data->stat;?></td>
        </tr>
        
       
        <?endforeach?>
        </table>
      </div>

  

 
  <?php else: ?>
  <?header("Location:login");?>
<?php endif; ?>
<?require('Template_bawah.php');?>