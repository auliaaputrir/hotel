<?php
session_start();
require "functions.php";
  if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit;
    }

$kmr= query("SELECT * FROM kamar");

$sql = "SELECT max(idtamu) as maxKode FROM tamu";
$hasil = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($hasil);
var_dump($data);
die;
$idtamu = $data['maxKode'];

$noUrut = (int) substr($idtamu, 3, 3);


$noUrut++;


$char = "HDL";
$idtamu = $char . sprintf("%03s", $noUrut);

?>
<?php 

if(isset($_POST["submit"])){
    $d1 = $_POST['masuk'];
    $d2 = $_POST['keluar'];
    $now = date('Y-m-d');
    if($d1 > $d2 || $d1 < $now){
        echo "<script>
                    alert('Tanggal check in yang anda masukkan salah, masukkan kembali!');
            </script>";
    }

        if(tambah($_POST) > 0){
            
            echo "<script>
                    alert('data sukses ditambahkan');
                    document.location.href = 'transaksi.php?id=$idtamu';
                </script>";
        }else{
            echo (mysqli_error($conn));
            die;
            echo "<script>
                    alert('data gagal ditambahkan');
                </script>";
        }
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
                                <a class="nav-link active" href="order.php">
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
                                <a class="nav-link" href="tamu.php">
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
            </div>
        </div>
                <!-- Content-->
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Order</h1>
                    </div>
                    <form method="POST">
                        <div class="row mb-3">
                            <label for="idtamu" class="col-sm-2 col-form-label">Id Customer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='idtamu' value="<?=$idtamu;?>" id="idtamu" readonly> 
                            </div>
                        </div>             
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='nama' id="nama" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" id="alamat" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_telp" class="col-sm-2 col-form-label">No Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='no_telp' id="no_telp"> 
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="masuk" class="col-sm-2 col-form-label">Check In</label>
                            <div class="col-sm-10">
                                <input type="date" name="masuk" id="masuk" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="keluar" class="col-sm-2 col-form-label">Check Out</label>
                            <div class="col-sm-10">
                                <input type="date" name="keluar" id="keluar" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="idkamar" class="col-sm-2 col-form-label">Room Type</label>
                            <div class="col-sm-10">
                                <select name="idkamar" class="form-control" aria-label=".form-select-lg example" required>
                                    <option disabled selected>Choose...</option>
                                        <?php
                                            foreach ($kmr as $row) { 
                                        ?>
                                    <option value="<?=$row['idkamar']?>"><?=$row['jenis_kamar']?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="note" class="col-sm-2 col-form-label">Notes</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="resize: none;" name="note" id="note" rows="3"></textarea>
                                </div>                    
                        </div>
            <button type="submit" name='submit' class="btn btn-primary"><!-- <a style="color: white;" href="transaksi.php?id=<?=$idtamu?>"> -->Booking<!-- </a> --></button>
        </form>


                </main>
                <!-- End of Content-->
   <?php
        /*if(isset($_POST["edit"])){*/

    ?>

        <!-- Online Boostrap js-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"></script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

        <!--End of Online Boostrap js-->

        <script src="grafik.js"></script></body>


        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    </body>
</html>