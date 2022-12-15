<?php

session_start();
if (!isset($_SESSION['login_user'])) {
  header("location: login.php");
} else {
  // pie
  $connect = mysqli_connect("localhost", "root", "", "db_pemesanan");
  $query = "SELECT pemesanan_produk.id_menu,produk.nama_menu ,count(*) as total FROM pemesanan_produk INNER JOIN produk ON pemesanan_produk.id_menu=produk.id_menu GROUP by id_menu ORDER by produk.nama_menu ASC";
  $result = mysqli_query($connect, $query);
  // pie
?>

  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Makanan Sehat</title>
  
  </head>

  <body>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">
      <div class="container">
        <h1 class="display-4"><span class="font-weight-bold">MAKANAN SEHAT</span></h1>
        <hr>
        <p class="lead font-weight-bold">Silahkan Pesan Menu Sesuai Keinginan Anda <br>
          Enjoy Your Meal</p>
      </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand text-white" href="admin.php"><strong>Makanan</strong> Sehat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link mr-4" href="admin.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="daftar_menu.php">DAFTAR MENU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="pesanan.php">PESANAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="logout.php">LOGOUT</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Menu -->
    <div class="container">
      <div class="text-center mt-5">
        <h3 class="font-weight-bold">MAKANAN SEHAT</h3>
        <br>Buka Jam <strong>09:00 - 21:00</strong></h5>
      </div>

      <div class="menu">
        <div class="card-margin">
          <div class="card bg-dark text-white border-light">
            <img src="images/background/menu2.jpg" class="card-img" alt="Lihat Daftar Menu">
            <div class="card-img-overlay mt-5 text-center">
              <a href="menu_pembeli.php" class="btn btn-primary">LIHAT DAFTAR MENU</a>
            </div>
          </div>
        </div>

        <div class="card-margin">
          <div class="card bg-dark text-white border-light">
            <img src="images/background/menu3.jpg" class="card-img" alt="Lihat Pesanan">
            <div class="card-img-overlay mt-5 text-center">
              <a href="pesanan_pembeli.php" class="btn btn-primary">LIHAT PESANAN</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Menu -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>

  </html>
<?php } ?>