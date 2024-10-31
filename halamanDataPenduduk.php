
<?php 
session_start();
include("connect.php");

$nip = $_SESSION["nip"];
if(!isset($_SESSION["loginA"])){

  header("Location: loginAdmin.php");
  exit;

}


if(isset($_POST["cari"])){
  $keyword = $_POST["keyword"];
  $query = "SELECT * FROM penduduk WHERE 
  nama LIKE '%$keyword%'OR
  jenis_kelamin LIKE '%$keyword%' OR
  alamat LIKE '%$keyword%'";
}else{
  $query = "SELECT * FROM penduduk";
}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  </head>

  <style>
  body {

overflow-x: hidden; 
}
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
  <div class="container">
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
            <a class="nav-link" aria-current="page" href="halamanProfilAdmin.php"><i class="bi bi-person-fill" style="font-size: 20px;"></i> Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page"><i class="bi bi bi-people-fill" style="font-size: 20px;"></i> Data Penduduk</a>
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
    <!-- Akhir Navbar -->
    <figure class="text-center mt-4" style="padding-top: 5rem;">
    <blockquote class="blockquote">
    <p class="fw-bold g-2">Data Penduduk Desa Konoha</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Kami melayani dengan spenuh hati 
</figure>

<!-- tambah dan cari -->
<div class="tambah-cari">
  <div class="row">
    <div class="col-4">
    <form action="" method="post">
    <div class="container ms-3" style="margin-top: 90px;" >
      <div class=" row g-3 justify-content-center" style="margin-top:80px;" >

      <div class="col-auto">

        <button type="submit" class="btn btn-outline-primary shadow-sm" name="cari"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>Cari</button>
        </div>

        <div class="col-auto">
          <input type="text" id="cari" class="form-control shadow-sm" aria-describedby="passwordHelpInline" name="keyword" required>
        </div>
      </form>
      </div>
    </div>
    
    </div>

    <div class="col-4">

    </div>

    <div class="col-4">

    <div class="container" style ="margin-top:105px; margin-left:220px;">
      <a href="halamanTambahDataPenduduk.php" style="text-decoration:none">
        <button type="button" class="btn btn-outline-primary shadow-sm"><i class="bi bi-person-plus-fill"></i> Tambah Data</button>
        </a>
      </div>




    </div>
  </div>
</div>
<!-- akhir tambah dan cari -->

  <!-- Tabel Request -->
  <div class="container  mt-3 justify-text-center">
        <table class="table shadow-sm rounded">
        <thead class="table-primary">
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Pekerjaan</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $i = 1;
        $result = mysqli_query($conn, $query);
        while($data = mysqli_fetch_assoc($result)){
        ?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= $data['nik']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['jenis_kelamin']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td><?= $data['pekerjaan']; ?></td>
            <td>
            <a href="halamanLihatDataPenduduk.php?nik=<?=$data['nik']?>" style="text-decoration:none">
            <button type="button" class="btn btn-outline-primary">Lihat</button>
            </a>
            <a href="halamanEditDataPenduduk.php?nik=<?=$data['nik']?>" style="text-decoration:none">
             <button type="button" class="btn btn-outline-warning">Edit</button>
             </a>
          <?php 
           $nik_cek = $data['nik'];
           $x = "SELECT * FROM penduduk JOIN admin ON penduduk.nik = admin.nik WHERE penduduk.nik = '$nik_cek'";
           $cek = mysqli_query($conn, $x);
           if(mysqli_fetch_assoc($cek) === NULL){    
          ?>
             <a href="hapusDataPenduduk.php?nik=<?=$data['nik']?>" style="text-decoration:none" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
             <button type="button" class="btn btn-outline-danger">Hapus</button>
             </a>
          <?php }else{ ?>
            
            <?php } ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>
  <!-- Akhir Tabel Request -->


  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>