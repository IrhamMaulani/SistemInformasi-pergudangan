<?session_start();
require('koneksi.php');

?>

<head>

</head>

<?php if (isset($_SESSION['username'])): ?>
<?require('Template.php');?>

<?require("pegawaiaksi.php");?>

<?require("pegawaieditprofil.php");?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a style=color:blue href="dashboard.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Profil</li>
      </ol>




      <style>
      body {font-family: Arial;}
 
      .tengah{   width: 30%;

}

      .bulat{
border-radius:100em;

width:130px;
height:130px;
}
      
      /* Style the tab */
      .tab {
          overflow: hidden;
          background-color: #white;
          
          
      }
      
      /* Style the buttons inside the tab */
      .tab button {
          background-color: inherit;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          transition: 0.3s;
         
         
      }
      
      /* Change background color of buttons on hover */
      .tab button:hover {
          background-color: #ddd;
      }
      
      /* Create an active/current tablink class */
      .tab button.active {
          background-color: #ccc;
      }
      
      /* Style the tab content */
      .tabcontent {
          display: none;
          padding: 6px 12px;
         
          border-top: none;
      }
      
      /* Style the close button */
      .topright {
          float: right;
          cursor: pointer;
          font-size: 20px;
      }
      
      .topright:hover {color: red;}

      .kanan{text-align:right;
      
      
      }
      </style>
      </head>
      <body>
      <?  $Tampil_data = $koneksi->prepare('SELECT * FROM pegawai where username=:username');?>

<? $koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);?>
<?$Tampil_data->bindParam(":username",$_SESSION['username']);?>
<?  $Tampil_data->execute();?>
<? $daftar = $Tampil_data->fetch(PDO::FETCH_OBJ);?>

<?$image=$daftar->image;?>

<?if($image==NULL):?>
<div class="tengah"><img class="bulat" src="Pic/kosong.png"></a></div>
    <?else:?>

<div class="tengah"><img class="bulat" src="<?echo"$daftar->image"?>"></a></div>
<?endif?>
<br>
    
      
      <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Profil</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Edit Profil</button>
        
      </div>
      
      <div id="London" class="tabcontent">
       
        
     <table  style="width:800px;"  class="table table-hover ">
 
 <tbody>
 
 <br>
<?// foreach ($daftar as $data):?>


<tr>
<th  width="30%" ><label>Nama pegawai</label></th>
<td width="50%"><?="$daftar->NamaPegawai";?></td>
</tr>
<tr>
<th  width="30%"><label>Alamat</label></th>
<td  width="50%"><?="$daftar->Alamat";?></td>

</tr>
<tr>
<th width="30%"><label>Alamat E-mail</label></th>
<td  width="50%"><?="$daftar->email";?></td>

</tr>
<tr>
<th width="30%"><label>Jenis Kelamin</label></th>
<td  width="50%"><?="$daftar->Jenis_kelamin";?></td>

</tr>
<?//endforeach?>
</tbody>
</table>
      </div>
      
      <div id="Paris" class="tabcontent">
        
       
       <form  method="POST"  enctype="multipart/form-data">
              
                
               <div   style="width:700px;" class="form-group" >

               <input id="prodId" name="id" type="hidden" value="<?=$daftar->idPegawai;?>">

                       <label for="">Nama Pegawai</label>
                       <input type="text" class="form-control" name="namapegawai" placeholder="Input field" value="<?="$daftar->NamaPegawai";?>  "required >
                       <br>
                       <label for="">Alamat Pegawai</label>
                       <input type="text" class="form-control" name="alamat" placeholder="Input field" value="<?=$daftar->Alamat;?>"required>
                       <br>
                       <label for="">Alamat Email</label>
                       <input type="email" class="form-control" name="email" placeholder="Input field" value="<?=$daftar->email;?>"required>
                       <br>
                       Jenis Kelamin
                       <input type="radio" name="gender"  value="Laki-laki"  <?if  ($daftar->Jenis_kelamin=="Laki-laki"):?>   checked <?endif?> required > Laki-laki
                       <input type="radio" name="gender" value="Perempuan"  <?if  ($daftar->Jenis_kelamin=="Perempuan"):?>  checked <?endif?>  > Perempuan
                       <br><br>
                       
                      


               </div>
               <button type="submit" name="input" class="btn btn-primary">Submit</button>
               <p style="position:relative;bottom:250px;left:1100px;">Upload Gambar Profil : <br/><input type="file" name="image" /> <button type="submit" name="submit" class="btn btn-info">Upload</button></p>
       </form>
      
       
      </div>
      
      
      
      <script>
      function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
      }
      
      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
      </script>
           
      </body>


<?else:?>
<?header('location: login');?>
<?endif?>
<?require("Template_bawah.php");?>