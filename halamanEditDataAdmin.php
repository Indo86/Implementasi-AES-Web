<?php 
session_start();
include('connect.php');
$nik = $_GET['nik'];
if(!isset($_SESSION["loginA"])){

  header("Location: loginAdmin.php");
  exit;

}

if(isset($_POST["submit"])){
$keyAes = 'makanmakanmakanp';
$ivAes = '12345678abcdefgh';;
$chiperAlgo= 'AES-128-CBC';
$options = 0;
    $nip =  openssl_encrypt($_POST['nip'], $chiperAlgo, $keyAes, $options, $ivAes);
    $nik = openssl_encrypt($_POST['nik'], $chiperAlgo, $keyAes, $options, $ivAes);
    $nama = openssl_encrypt($_POST['nama'],$chiperAlgo, $keyAes, $options, $ivAes );
    $jabatan = openssl_encrypt($_POST['jabatan'],$chiperAlgo, $keyAes, $options, $ivAes );
    $password = openssl_encrypt($_POST['password'],$chiperAlgo, $keyAes, $options, $ivAes );
    $hash_nip = hash('sha256', $_POST['nip']);
    $hash_nik = hash('sha256', $_POST['nik']);
   

$query = "INSERT INTO admin 
VALUES 
('$nip','$nik', '$nama', '$jabatan','$password', '$hash_nip', '$hash_nik')";

mysqli_query($conn, $query);

header('Location: halamanDataAdmin.php');
}


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Permohonan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
<!-- Judul -->
<div class="container mt-2 mb-2">
<div class="card shadow-sm bg-primary">
  <div class="card-body">
  <div class="row">
    <div class="col-4">

        <a href="HalamanDataAdmin.php">
        <button type="button" class="btn btn-outline-light content-start"><i class="bi bi-arrow-left"></i> Kembali</button>
        </a>

    </div>
  
    <div class="col-4">

      <h3 class="text-light text-center">Form Edit Data Admin</h3>

    </div>
    <div class="col-4">

      </div>
 </div>

    
  </div>
</div>

</div>
<?php 
$keyAes = 'makanmakanmakanp';
$ivAes = '12345678abcdefgh';;
$chiperAlgo= 'AES-128-CBC';
$options = 0;

$query = "SELECT * FROM admin WHERE hash_nik = '$nik'";
$result = mysqli_query($conn, $query);

$datum = mysqli_fetch_assoc($result);
// echo $datum['nama'];
// echo openssl_decrypt( $datum["nik"],$chiperAlgo,$keyAes, $options, $ivAes);
?>
<!-- Akhir Judul -->
<!-- form Permohonan -->
<div class="container mt-2 mb-3">
      <div class="card shadow-sm">
        <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3 row">
    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nip" name="nip" value="<?= openssl_decrypt( $datum["nip"],$chiperAlgo,$keyAes, $options, $ivAes)?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
    <div class="col-sm-10">
        <select class="form-select" aria-label="Default select example" name="nik" >
                <option value="<?= openssl_decrypt($datum["nik"], $chiperAlgo, $keyAes, $options, $ivAes) ?>"><?= openssl_decrypt($datum["nik"], $chiperAlgo, $keyAes, $options, $ivAes) ?></option>
        </select>
    </div>
</div>


  <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" value="<?= openssl_decrypt( $datum["nama"],$chiperAlgo,$keyAes, $options, $ivAes)?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= openssl_decrypt( $datum["jabatan"],$chiperAlgo,$keyAes, $options, $ivAes)?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="password" name="password" value="<?= openssl_decrypt( $datum["password"],$chiperAlgo,$keyAes, $options, $ivAes)?>">
    </div>
  </div>

    <div class="mt-4">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      <button type="reset"  name="reset" class="btn btn-danger">Reset</button>
    </div>
  </form>

        </div>
      </div>
  </div>
  

<!-- Akhir Form Permohonan -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>