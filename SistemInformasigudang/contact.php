<?session_start();?>

<?if (isset($_SESSION['username'])):?>
<?require("Template.php");?>
<?require("Koneksi.php");?>

<style>
    .jumbotron {
        background: #E8EBEE;
        color: #black;
        border-radius: 0;
    }
    .jumbotron-sm {
        padding-top: 24px;
        padding-bottom: 24px;
    }
    .jumbotron small {
        color: #grey;
    }
    .h1 small {
        font-size: 24px;
    }
</style>

<?  $Tampil_data = $koneksi->prepare('SELECT * FROM pegawai where idpegawai=:idpegawai');?>

<? $koneksi->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);?>
<?$Tampil_data->bindParam(":idpegawai",$_SESSION['Idpegawai']);?>
<?  $Tampil_data->execute();?>
<? $daftar = $Tampil_data->fetch(PDO::FETCH_OBJ);?>
<?//echo $_SESSION['Idpegawai'];?>
<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us
                    <small>Feel free to contact us</small>
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form action="contactaksi.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <input
                                id="idpegawai"
                                name="idpegawai"
                                type="hidden"
                                value="<?=$daftar->idPegawai;?>">
                            <div class="form-group">

                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="fa fa-envelope-o"></span>
                                    </span>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        placeholder="Enter email"
                                        value="<?=$daftar->email;?>"
                                        readonly/></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subject</label>
                                <select id="subject" name="subject" class="form-control" required="required">
                                    <option value="na" selected="">Choose One:</option>
                                    <option value="service">General Customer Service</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="product">Product Support</option>
                                    <option value="bug">Bug And Error</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Saran dan Keluhan</label>
                                <textarea
                                    name="message"
                                    id="message"
                                    class="form-control"
                                    rows="9"
                                    cols="25"
                                    required="required"
                                    placeholder="Saran dan Keluhan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <legend>
                    <span class="fa fa-globe"></span>
                    Our office</legend>
                <address>
                    <strong>IT Departement</strong><br>
                    Jl. Brigjen H. Hasan Basri<br>
                    Banjarmasin<br>
                    <i class="fa fa-phone" aria-hidden="true">
                        087817671153
                    </i>
                </address>
                <address>
                    <strong>IT Sub-Chief</strong><br>
                    <div class="fa fa-envelope">
                        <a href="mailto:irhammaulani@gmail.com">
                            Irham Maulani</a>
                    </div>
                </address>
            </form>
        </div>
    </div>
</div>
<?require("Template_bawah.php");?>
<?else:?>
<?header('location: login');?>
<?endif?>