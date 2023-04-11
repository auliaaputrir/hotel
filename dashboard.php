<?php
    require('functions.php');
    session_start();
    if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit;
    }
        
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Admin Panel Hotel Reservation </title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- End of boostrap link -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="Chart.bundle.js"></script>

    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Hotel Del Luna</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <font class="ml-auto" color="white"><?php echo "Hai, ".$_SESSION['username']?></font> 
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="logout.php">Sign out</a>
                </li>
            </ul>
        </nav>
        <!-- End of navbar-->

        <!-- Side bar-->
    <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">
                                    <span data-feather="home"></span>
                                        Dashboard <span class="sr-only">(current)</span>
                                    </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="order.php">
                                    <span data-feather="file"></span>
                                        Orders
                                    </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="room.php">
                                <span data-feather="shopping-cart"></span>
                                    Room
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="tamu.php">
                                    <span data-feather="users"></span>
                                        Customers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="report.php">
                                    <span data-feather="bar-chart-2"></span>
                                        Reports
                                </a>
                            </li>
                        </ul>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Saved reports</span>
                            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="current.php">
                                    <span data-feather="file-text"></span>
                                        Current month
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="year.php">
                                    <span data-feather="file-text"></span>
                                        Current year
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of side bar-->
            <!-- End of side bar-->
         <!-- Content-->
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Dashboard</h1>
                    </div>

                <canvas class="my-4 w-80" id="myChart" width="900" height="380"></canvas>
        
                </main>
                <!-- End of Content-->
         
</div>
</div>
               
        <!-- Online Boostrap js-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

        <!--End of Online Boostrap js-->
        <script>
            'use strict'

            feather.replace()
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"],
                    datasets: [{
                            label: 'Grafik',
                            data: [
                            <?php $jan = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '01' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($jan));
                            ?>,
                            <?php $feb = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '02' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($feb));
                            ?>,
                            <?php $mar = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '03' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($mar));
                            ?>,
                            <?php $apr = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '04' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($apr));
                            ?>,
                            <?php $mei = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '05' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($mei));
                            ?>,
                            <?php $jun = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '06' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($jun));
                            ?>,
                            <?php $jul = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '07' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($jul));
                            ?>,
                            <?php $aug = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '08' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($aug));
                            ?>,
                            <?php $sep = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '09' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($sep));
                            ?>,
                            <?php $okt = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '10' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($okt));
                            ?>,
                            <?php $nov = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '11' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($nov));
                            ?>,
                            <?php $des = mysqli_query($conn, "SELECT * FROM transaksi WHERE MONTH(tgl_transaksi) = '12' AND YEAR(tgl_transaksi) = YEAR(CURRENT_DATE())");
                            echo (mysqli_num_rows($des));
                            ?>

                            ],
                            lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: false
                                }
                            }]
                    }
                }
            });
        </script>


        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    </body>
</html>