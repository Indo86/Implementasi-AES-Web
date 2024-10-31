
<?php 
session_start();
include("connect.php");

$nip = $_SESSION["nip"];
$queri = "SELECT * FROM admin WHERE nip = '$nip'";
$result = mysqli_query($conn, $queri);
$data = mysqli_fetch_assoc($result);
$nikAdmin = $data['nik'];

// if(!isset($_SESSION["loginA"])){

//   header("Location: loginA.php");
//   exit;

// }


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Profil Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  </head>

  <style>
    .footer{
        margin-top: 200px;
      }
  </style>
  <body>
  <?php 
    $queri = "SELECT * FROM admin WHERE nip = '$nip'";
    $result = mysqli_query($conn, $queri);
    $admin = mysqli_fetch_assoc($result);
    
    ?>
    <!-- navbar -->
<nav class="navbar bg-primary shadow fixed-top">
  <div class="container-fluid">
  <a class="navbar-brand">
    <img src="img/konoha2.png" alt="Bootstrap" width="50" height="50">

    
      
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Halo, admin <?= $admin['nama']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" ><i class="bi bi-person-fill" style="font-size: 20px;"></i> Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pengumumanAdmin.php"><i class="bi bi-newspaper" style="font-size: 20px;"></i> Pengumuman Desa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="halamanAdmin.php"><i class="bi bi-headset" style="font-size: 20px;"></i> Layanan Mandiri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="dataPenduduk.php" aria-current="page"><i class="bi bi bi-people-fill" style="font-size: 20px;"></i> Data Penduduk</a>
          </li>
          
          
          <a class="mt-5" href="logOutAdmin.php" style="text-decoration:none; " onclick="return confirm('Apakah Anda yakin ingin Log Out?');"> 
          <div class="d-grid gap-2 col-10 mx-auto">
          <button class="btn btn-danger text-light" type="button">Log Out</button>
          </div>
          </a>

        </ul>
      </div>
    </div>
  </div>
</nav>
<br><br><br>
    <!-- Akhir Navbar -->
<?php 
  $queri = "SELECT * FROM admin INNER JOIN penduduk ON admin.nik = penduduk.nik WHERE nip = '$nip'";
  $result = mysqli_query($conn, $queri);
  $admin = mysqli_fetch_assoc($result);
?>
<!-- Profil User -->
<div class="container mt-5 me-5">
<div class="row">
  <div class="col-3">
      <div class="card shadow-sm" style="width: 20rem;">
      <img src="img/<?= $admin['gambar']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
      <div class="row">
         <div class="col-4">
            <p class="fw-bold">NIP</p>
            <p class="fw-bold">Jabatan</p>
          </div>
          <div class="col-8">
            <p class="fw">: <?= $admin['nip']; ?></p>
            <p class="fw">: <?= $admin['jabatan']; ?></p>
          </div>


          </div>
      </div>
</div>
  </div>
  <div class="col-8">

  <div class="card shadow-sm">
  <div class="card-header bg-primary text-center">
    <h4 class="text-light">Data Kependudukan </h4>
  </div>
  <div class="card-body">
  <div class="col-8">
     <div class="row">
       <div class=" col-5 grid gap-4" >
        <p class="fw-bold">NIK</p>
        <p class="fw-bold">Nama</p>
        <p class="fw-bold">Tempat/Tanggal lahir</p>
        <p class="fw-bold">jenis Kelamin</p>
        <p class="fw-bold">Alamat</p>
        <p class="fw-bold ms-3">RT/RW</p>
        <p class="fw-bold ms-3">Kel/Desa</p>
        <p class="fw-bold ms-3">Kecamatan</p>
        <p class="fw-bold">Setatus Perkawinan</p>
        <p class="fw-bold">Pekerjaan</p>
        <p class="fw-bold">Kewarganegaraan</p>
        <p class="fw-bold">Gol Darah</p>
       </div>
       <div class="col-7">
        <p class="fw">: <?= $admin['nik']; ?></p>
        <p class="fw">: <?= $admin['nama']; ?></p>
        <p class="fw">: <?= $admin['ttl']; ?></p>
        <p class="fw">: <?= $admin['jenis_kelamin']; ?></p>
        <p class="fw">: <?= $admin['alamat']; ?></p>
        <p class="fw">: <?= $admin['rtrw']; ?></p>
        <p class="fw">: <?= $admin['keldesa']; ?></p>
        <p class="fw">: <?= $admin['kecamatan']; ?></p>
        <p class="fw">: <?= $admin['setatus_perkawinan']; ?></p>
        <p class="fw">: <?= $admin['pekerjaan']; ?></p>
        <p class="fw">: <?= $admin['kewarganegaraan']; ?></p>
        <p class="fw">: <?= $admin['golD']; ?></p>
       </div>

       </div>

     </div>
  </div>
</div>





  </div>
</div>











  
        
  
   


  </div>

</div>
<!--Akhir Detail Permohonan -->



<!-- Akhir Profil User -->
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>