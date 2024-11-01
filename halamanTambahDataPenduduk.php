<?php 
session_start();
include('connect.php');

if(!isset($_SESSION["loginA"])){

  header("Location: loginAdmin.php");
  exit;

}


if(isset($_POST["submit"])){
function upload(){
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // mengecek apakah yang diupload itu adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
   
 //cek ekstensi gambar
  if(!in_array($ekstensiGambar, $ekstensiGambarValid)){

    echo "
    <script>
      alert('File yang anda upload bukan gambar!');
    </script>
    ";
    return false;
  }

  // cek ukuran file
  if($ukuranFile > 1000000){
    echo "
    <script>
      alert('Ukuran file terlalu besar!');
    </script>
    ";

    return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .='.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'Assets/Img/'.$namaFileBaru);

  return $namaFileBaru;
}
$keyAes = 'makanmakanmakanp';
$ivAes = '12345678abcdefgh';;
$chiperAlgo= 'AES-128-CBC';
$options = 0;
    $nik = openssl_encrypt($_POST['nik'], $chiperAlgo, $keyAes, $options, $ivAes);
    $nama = openssl_encrypt($_POST['nama'],$chiperAlgo, $keyAes, $options, $ivAes );
    $ttl = openssl_encrypt($_POST['ttl'],$chiperAlgo, $keyAes, $options, $ivAes );
    $jenis_kelamin = openssl_encrypt($_POST['jenis_kelamin'], $chiperAlgo, $keyAes, $options, $ivAes );
    $alamat = openssl_encrypt($_POST['alamat'],  $chiperAlgo, $keyAes, $options, $ivAes );
    $rtw = openssl_encrypt($_POST['rt/rw'], $chiperAlgo, $keyAes, $options, $ivAes );
    $kelDes = openssl_encrypt($_POST['kel/desa'],  $chiperAlgo, $keyAes, $options, $ivAes );
    $kecamatan = openssl_encrypt( $_POST['kecamatan'], $chiperAlgo, $keyAes, $options, $ivAes);
    $status_perkawinan = openssl_encrypt($_POST['status_perkawinan'], $chiperAlgo, $keyAes, $options, $ivAes );
    $pekerjaan = openssl_encrypt($_POST['pekerjaan'],  $chiperAlgo, $keyAes, $options, $ivAes );
    $kewarganegaraan = openssl_encrypt($_POST['kewarganegaraan'], $chiperAlgo, $keyAes, $options, $ivAes);
    $golD = openssl_encrypt($_POST['golD'],  $chiperAlgo, $keyAes, $options, $ivAes );
    $gambar =  openssl_encrypt(upload(),$chiperAlgo, $keyAes, $options, $ivAes );
    $hash_nik = hash('sha256', $_POST['nik']);
   




$query = "INSERT INTO penduduk 
VALUES 
('$nik', '$nama', '$ttl', '$jenis_kelamin',
'$alamat', '$rtw', '$kelDes', '$kecamatan',
'$status_perkawinan', '$pekerjaan',
'$kewarganegaraan', '$golD', '$gambar', '$hash_nik')";

mysqli_query($conn, $query);

header('Location: halamanDataPenduduk.php');
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

        <a href="HalamanDataPenduduk.php">
        <button type="button" class="btn btn-outline-light content-start"><i class="bi bi-arrow-left"></i> Kembali</button>
        </a>

    </div>
  
    <div class="col-4">

      <h3 class="text-light text-center">Form Data Kependudukan</h3>

    </div>
    <div class="col-4">

      </div>
 </div>

    
  </div>
</div>

</div>
<!-- Akhir Judul -->
<!-- form Permohonan -->
<div class="container mt-2 mb-3">

      <div class="card shadow-sm">
        <div class="card-body">


        <form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3 row">
    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nik" name="nik">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="ttl" class="col-sm-2 col-form-label">Tempat/Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="ttl" name="ttl">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
          <option selected>Pilih Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
      </select>
    </div>
  </div>

  <div class="mb-3 row">
  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <select class="form-select" aria-label="Default select example" name="alamat">
          <option selected>Pilih Alamat</option>
          <option value="Depok">Depok</option>
          <option value="Sayangan">Sayangan</option>
          <option value="Semondo">Semondo</option>
          <option value="Celuluk">Celuluk</option>
      </select>
    </div>
  </div>

  <div class="mb-3 row">
  <label for="kel/desa" class="col-sm-2 col-form-label">Kel/Desa</label>
    <div class="col-sm-10">
      <select class="form-select" aria-label="Default select example" name="kel/desa">
          <option selected>Pilih Alamat</option>
          <option value="Konoha">Konoha</option>
      </select>
    </div>
  </div>

  <div class="mb-3 row" rows="5">
    <label for="keterangan" class="col-sm-2 col-form-label">RT/RW</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="rt/rw">
          <option selected>Pilih RT/RW</option>
          <option value="09/02">09/02</option>
          <option value="08/03">08/03</option>
          <option value="07/04">07/04</option>
          <option value="Sayidan">06/05</option>
      </select>
    </div>
  </div>


  <div class="mb-3 row">
    <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="kecamatan">
          <option selected>Pilih Kecamatan</option>
          <option value="Konoha">Konoha</option>
          <option value="Suna">Suna</option>
          <option value="Bulu">Bulu</option>
          <option value="Sayidan">Sayidan</option>
      </select>
    </div>
  </div>


  <div class="mb-3 row">
    <label for="status_perkawinan" class="col-sm-2 col-form-label">Setatus Perkawinan</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="status_perkawinan">
          <option selected>Pilih Status Perkawinan</option>
          <option value="Belum Kawin">Belum Kawin</option>
          <option value="Kawin">Kawin</option>
          <option value="Cerai Hidup">Cerai Hidup</option>
          <option value="Cerai Mati">Cerai Mati</option>
      </select>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="kewarganegaraan" class="col-sm-2 col-form-label">Kewarganegaraan</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="kewarganegaraan">
          <option selected>Pilih Kewarganegaraan</option>
          <option value="WNI">WNI</option>
          <option value="WNA">WNA</option>
      </select>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="golD" class="col-sm-2 col-form-label">Golongan Darah</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="golD">
          <option selected>Pilih Golongan Darah</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="O">O</option>
          <option value="AB">AB</option>
      </select>
    </div>
  </div>
  
  <div class="mb-3 row">
  <label for="gambar" class=" col-sm-2 form-label">Foto</label>
  <div class="col-sm-10">
     <input class="form-control" type="file" id="gambar" name="gambar" required> 
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