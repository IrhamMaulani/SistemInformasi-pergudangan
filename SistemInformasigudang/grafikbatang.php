<?require("Koneksi.php");?>

<? $kueri = $koneksi->prepare('SELECT COUNT(jenisbarang) as sembako FROM barang where jenisbarang="sembako"');?>
<? $kueri->execute();?>
<? $jmlhsembako = $kueri->fetch(PDO::FETCH_OBJ);?>

<? $kueri = $koneksi->prepare('SELECT COUNT(jenisbarang) as makananringan FROM barang where jenisbarang="Makanan Ringan"');?>
<? $kueri->execute();?>
<? $jmlhmakanan = $kueri->fetch(PDO::FETCH_OBJ);?>

<? $kueri = $koneksi->prepare('SELECT COUNT(jenisbarang) as minuman FROM barang where jenisbarang="Minuman"');?>
<? $kueri->execute();?>
<? $jmlhminuman = $kueri->fetch(PDO::FETCH_OBJ);?>

<? $kueri = $koneksi->prepare('SELECT COUNT(jenisbarang) as perlengkapan FROM barang where jenisbarang="Perlengkapan Rumah Tangga"');?>
<? $kueri->execute();?>
<? $jmlhperlengkapan = $kueri->fetch(PDO::FETCH_OBJ);?>


<html>
    <head>
        <title>Belajarphp.net - ChartJS</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="chart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("chart");
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Sembako", "Makanan Ringan", "Minuman", "Perlengkapan Rumah Tangga"],
                    datasets: [{
                            label: 'Barang',
                            data: [<?=$jmlhsembako->sembako;?>,<?=$jmlhmakanan->makananringan;?>, <?=$jmlhminuman->minuman;?>,<?=$jmlhperlengkapan->perlengkapan;?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    legend: {
    	display: false
    },
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html>