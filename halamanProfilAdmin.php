
<?php 
session_start();
include("connect.php");

$nip = hash('sha256',  $_SESSION["nip"]);
$queri = "SELECT * FROM admin WHERE hash_nip = '$nip'";
$result = mysqli_query($conn, $queri);
$data = mysqli_fetch_assoc($result);
$nikAdmin = $data['nik'];

if(!isset($_SESSION["loginA"])){

  header("Location: loginAdmin.php");
  exit;

}

$keyAes = 'makanmakanmakanp';
$ivAes = '12345678abcdefgh';;
$chiperAlgo= 'AES-128-CBC';
$options = 0;

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
    $queri = "SELECT * FROM admin WHERE hash_nip = '$nip'";
    $result = mysqli_query($conn, $queri);
    $admin = mysqli_fetch_assoc($result);
    
    ?>
    <!-- navbar -->
<nav class="navbar bg-primary shadow fixed-top">
  <div class="container">
  <a class="navbar-brand">
    <img src="Assets/Img/konoha2.png" alt="Bootstrap" width="50" height="50">

    
      
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Halo, admin <?= openssl_decrypt($admin['nama'], $chiperAlgo, $keyAes, $options, $ivAes); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" ><i class="bi bi-person-vcard" style="font-size: 20px;"></i>  Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="halamanDataPenduduk.php" aria-current="page"><i class="bi bi bi-people-fill" style="font-size: 20px;"></i> Data Penduduk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="halamanDataAdmin.php"  ><i class="bi bi-journal-text" style="font-size: 20px;"></i> Data Admin Desa</a>
          </li>
          
          <a class="mt-5" href="logOut.php" style="text-decoration:none; " onclick="return confirm('Apakah Anda yakin ingin Log Out?');"> 
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
  $queri = "SELECT * FROM admin INNER JOIN penduduk ON admin.nik = penduduk.nik WHERE hash_nip = '$nip'";
  $result = mysqli_query($conn, $queri);
  $admin = mysqli_fetch_assoc($result);
?>
<!-- Profil User -->
<div class="container mt-5 me-5">
<div class="row">
  <div class="col-3">
      <div class="card shadow-sm" style="width: 20rem;">
      <img src="Assets/Img/<?= openssl_decrypt($admin['gambar'],$chiperAlgo, $keyAes, $options,$ivAes )  ?>" class="card-img-top" alt="...">
      <div class="card-body">
      <div class="row">
         <div class="col-4">
            <p class="fw-bold">NIP</p>
            <p class="fw-bold">Jabatan</p>
          </div>
          <div class="col-8">
            <p class="fw">: <?= openssl_decrypt(  $admin['nip'],$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
            <p class="fw">: <?= openssl_decrypt(  $admin['jabatan'],$chiperAlgo, $keyAes, $options,$ivAes )   ?></p>
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
        <p class="fw-bold">Status Perkawinan</p>
        <p class="fw-bold">Pekerjaan</p>
        <p class="fw-bold">Kewarganegaraan</p>
        <p class="fw-bold">Gol Darah</p>
       </div>
       <div class="col-7">
       <p class="fw">: <?= openssl_decrypt( $admin['nik'],$chiperAlgo, $keyAes, $options,$ivAes )   ?></p>
              <p class="fw">: <?= openssl_decrypt($admin['nama'],$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $admin['ttl'],$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
              <p class="fw">: <?= openssl_decrypt( $admin['jenis_kelamin'],$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $admin['alamat'],$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $admin['rtrw'] ,$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $admin['keldesa'] ,$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $admin['kecamatan'] ,$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
              <p class="fw">: <?= openssl_decrypt( $admin['status_perkawinan'] ,$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $admin['pekerjaan'] ,$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
              <p class="fw">: <?= openssl_decrypt( $admin['kewarganegaraan'] ,$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
              <p class="fw">: <?= openssl_decrypt( $admin['golD'] ,$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
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