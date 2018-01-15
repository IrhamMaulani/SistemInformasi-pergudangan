
<?php require("koneksi.php");?>
<?php  $Tampil_data = $koneksi->prepare('SELECT count(jenis_kelamin) AS perempuan FROM konsumen where jenis_kelamin="perempuan";');?>


<?php  $Tampil_data->execute();?>
<?php $daftar = $Tampil_data->fetch(PDO::FETCH_OBJ);?>

<?php  $Tampil_data = $koneksi->prepare('SELECT count(jenis_kelamin) AS laki FROM konsumen where jenis_kelamin="laki-laki";');?>


<?php  $Tampil_data->execute();?>
<?php $daftar2 = $Tampil_data->fetch(PDO::FETCH_OBJ);?>
<?php  ?>
<html>
    <head>
        <title>Belajarphp.net - ChartJS</title>
        
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Perempuan", "Laki-Laki"],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php echo $daftar->perempuan;?>, <?php echo$daftar2->laki;?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                               
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {

                    }
                }
            });
        </script>
    </body>
</html>
