
<?php 
session_start();
include("connect.php");

$nik = $_GET['nik'];
$nip = $_SESSION['nip'];
if(!isset($_SESSION["loginA"])){

  header("Location: loginAdmin.php");
  exit;

}


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
<!-- Judul -->
<!-- Akhir Judul -->
<?php 
$keyAes = 'makanmakanmakanp';
$ivAes = '12345678abcdefgh';;
$chiperAlgo= 'AES-128-CBC';
$options = 0;


  $queri_penduduk = "SELECT * FROM penduduk WHERE hash_nik = '$nik'";
  $result = mysqli_query($conn, $queri_penduduk);
  $data = mysqli_fetch_assoc($result);
  // echo openssl_decrypt($data['nik'], $chiperAlgo, $keyAes, $options, $ivAes);
  $p = 2;
  $x = "SELECT * FROM penduduk JOIN admin ON penduduk.nik = admin.nik WHERE penduduk.hash_nik = '$nik'";
  $pendudukAdmin = mysqli_fetch_assoc(mysqli_query($conn, $x));

  // $y = "SELECT * FROM penduduk JOIN user ON penduduk.nik = user.nik WHERE penduduk.nik = '$nik'";
  // $pendudukUser = mysqli_fetch_assoc(mysqli_query($conn, $y));



if( $pendudukAdmin !== NULL && $pendudukAdmin['password'] !== '' ){

  $query_admin = "SELECT * FROM admin WHERE nik = '$nik'";
  $admin = mysqli_fetch_assoc(mysqli_query($conn, $query_admin));
  $p = 1;

} else  if($pendudukAdmin !== NULL && $pendudukAdmin['password'] === '' ){
  $query_admin = "SELECT * FROM admin WHERE nik = '$nik'";
  $admin = mysqli_fetch_assoc(mysqli_query($conn, $query_admin));
  $p = 3;
}

// else if($pendudukUser !== NULL){

//   $query_user = "SELECT * FROM user WHERE nik = '$nik'";
//   $user = mysqli_fetch_assoc(mysqli_query($conn, $query_user));
//   $p=0;
// }


?>
<!-- Profil User -->

<div class="container mt-4 me-5">
  <div class="row mb-3">
        <a href="HalamanDataAdmin.php">
        <button type="button" class="btn btn-outline-primary content-start"><i class="bi bi-arrow-left"></i> Kembali</button>
        </a>
  </div>
      <div class="row">

        <div class="col-3">
          <div class="card shadow-sm" style="width: 20rem;">

                <img src="Assets/Img/<?= openssl_decrypt(  $data['gambar'],$chiperAlgo, $keyAes, $options,$ivAes ) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <div class="row">
                      <?php if($p === 1){?>
                        
                        <div class="col-4">
                                <p class="fw-bold">NIP</p>
                                <p class="fw-bold">Jabatan</p>
                                <p class="fw-bold">Password</p>
                              </div>
                              <div class="col-8">
                                <p class="fw">: <?= openssl_decrypt(  $pendudukAdmin['nip'],$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
                                <p class="fw">: <?= openssl_decrypt(  $pendudukAdmin['jabatan'],$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
                                <p class="fw">: <?= openssl_decrypt(   $pendudukAdmin['password'],$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
                              </div>
                          
                        <?php } else if( $p === 3){ ?>

                            <p><?= $admin['nama']; ?> belum mempunyai akun admin.

                          <?php } else{ ?>
                            
                            <p><?=  openssl_decrypt(  $data['nama'],$chiperAlgo, $keyAes, $options,$ivAes )  ?> belum punya akun.</p>
                                
                            <?php } ?>
                 
            
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
              <p class="fw">: <?= openssl_decrypt( $data['nik'],$chiperAlgo, $keyAes, $options,$ivAes )   ?></p>
              <p class="fw">: <?= openssl_decrypt($data['nama'],$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $data['ttl'],$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
              <p class="fw">: <?= openssl_decrypt( $data['jenis_kelamin'],$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $data['alamat'],$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $data['rtrw'] ,$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $data['keldesa'] ,$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $data['kecamatan'] ,$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
              <p class="fw">: <?= openssl_decrypt( $data['status_perkawinan'] ,$chiperAlgo, $keyAes, $options,$ivAes ) ?></p>
              <p class="fw">: <?= openssl_decrypt( $data['pekerjaan'] ,$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
              <p class="fw">: <?= openssl_decrypt( $data['kewarganegaraan'] ,$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
              <p class="fw">: <?= openssl_decrypt( $data['golD'] ,$chiperAlgo, $keyAes, $options,$ivAes )  ?></p>
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