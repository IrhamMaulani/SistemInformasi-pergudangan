<!DOCTYPE html>
<html lang="en">

<head>
<style>
#tab { display:inline-block; 
       margin-left: 33px; }


</style>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Informasi</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Sistem Informasi SixMart</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profil">
          <a class="nav-link" href="Pegawai.php">
            <i class="fa fa-fw fa-user-o"></i>
            <span class="nav-link-text">Profil </span>
          </a>
        </li>
        <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.html">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
        </li>-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Setting">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Setting</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="changepass.php">Change Password</a>
            </li>
            <li>
              <a href="contact.php">Contact Admin!</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Masukkan Data">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Masukan Data</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="konsumen.php">Konsumen</a>
            </li>
            <li>
              <a href="barang.php">Barang</a>
            </li>
           <!-- <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>-->
           <!-- <li>
              <a href="blank.html">Blank Page</a>
            </li>-->
          </ul>
        </li>
      <!--  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Cara Penggunaan</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-bars"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      
            

            
<ul class="navbar-nav">
   

   <!-- Dropdown -->
   <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      <?=$_SESSION["username"];?>
     </a>
     <div class="dropdown-menu">
       <a class="dropdown-item"  href="pegawai.php"><i class="fa fa-fw fa-user"></i>Profil</a>
       <a class="dropdown-item" href="#" id="log"><i class="fa fa-fw fa-sign-out"></i>Logout</a></a>
       <form id="out" method="post" action="Login/logout.php">
          <input type="hidden" name="logout">
          </form>
     </div>
   </li>
 </ul>
 <span id="tab">
 
 <li class="nav-item">
      <a class="nav-link"  id="toggleNavColor">
        <i class="fa fa-lightbulb-o"></i></a>
    </li>
       <!-- <li class="nav-item">
          <a class="nav-link" href="#" id="log">
            <i class="fa fa-fw fa-sign-out"></i>      Logout</a>
        </li>
        <form id="out" method="post" action="login/logout.php">
          <input type="hidden" name="logout">
          </form>
      </ul>
    </div>
    -->
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">

    <script src="Asset\js\jquery-3.2.1.js"></script>
    <script type="text/javascript">
    
    $('#log').click(function() {
      $('#out').submit();
    });
</script>
      <!-- Breadcrumbs-->
      <!--<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Navbar</li>
      </ol>-->

      <!--tombol lampu-->
      <!--<a class="btn btn-primary" href="#" id="toggleNavColor">Toggle Navbar Color</a>-->
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
     