<style>
.tengah{


}

</style>

<?


?>
<?php if (isset($_SESSION['username'])): ?>

<script type="text/javascript" src="changepass.js"></script>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a style=color:blue href="dashboard.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Ganti Password</li>
      </ol>





<br>
<div class=tengah>
<form action="changepass.php" method="POST" role="form" onsubmit="return validationpass()" >
    <legend>Ganti Password</legend>

    <div class="form-group">

   
    <div class="col-sm-5">
    <label for="">Password Lama</label>
        <input type="password" class="form-control" id="lama" name="passlama" placeholder="Password Lama" >
    </div>
    <br>
    <div class="col-sm-5">
        <label for="">Password Baru</label>
        <input type="password" class="form-control" id="baru" name="pass" placeholder="Password Baru" >
        </div>
        <br>
        <div class="col-sm-5">
        <label for="">Confirm Password</label>
        <input type="password" class="form-control" id="confirm" name="confirmpass" placeholder="Confirmation Password" >
        </div>
        <br>
    </div>

    
    <div class="col-sm-5">
    <button  type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>

<?require("Template_bawah.php");?>
<?else:?>
<?header("Location:login");?>
<?endif?>
