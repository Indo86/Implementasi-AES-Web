
<?php 

include("connect.php");
session_start();



$userNIK = $_SESSION['nik'];
if(!isset($_SESSION["login"])){

  header("Location: loginP.php");
  exit;

}

$queri = "SELECT * FROM penduduk WHERE nik = '$userNIK'";
if(isset($_POST["cari"])){
  $keyword = $_POST["keyword"];
  $query = "SELECT * FROM permohonan
            WHERE 
            jenis_permohonan LIKE '%$keyword%' OR
            setatus_permohonan LIKE '%$keyword%' AND nik = '$userNIK' ";
}else{
  $query = "SELECT * FROM permohonan WHERE nik = '$userNIK'";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  </head>

  <style>
    .footer{
  margin-top: 200px;
}

    body{
      overflow-x: hidden;
    }
  </style>
  <body>

  <?php 
  $result = mysqli_query($conn, $queri);
  $datum = mysqli_fetch_assoc($result);
  ?>
    <!-- navbar -->
<nav class="navbar bg-primary fixed-top shadow">
  <div class="container-fluid">
  <a class="navbar-brand">
      <img src="img/konoha2.png" alt="Bootstrap" width="50" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Halo, <?= $datum['nama']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="profilP.php"><i class="bi bi-person-fill" style="font-size: 20px;"></i> Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pengumumanDesa.php"><i class="bi bi-newspaper" style="font-size: 20px;"></i> Pengumuman Desa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page"><i class="bi bi-headset" style="font-size: 20px;"></i> Layanan Mandiri</a>
          </li>
          <a class="mt-5" href="logOut.php" style="text-decoration:none; " onclick="return confirm('Apakah Anda yakin ingin Log Out?');"> 
          <div class="d-grid gap-2 col-10 mx-auto">
          <button class="btn btn-danger text-light" type="button">Keluar</button>
          </div>
          </a>

          </div>
        </ul>
      </div>
    </div>
  </div>
</nav>
    <!-- Akhir Navbar -->
    <figure class="text-center mt-4" style="padding-top: 5rem;">
  <blockquote class="blockquote">
    <p class="fw-bold g-2">Layanan Desa Konoha</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Kami melayani dengan Sepenuh Hati
  </figcaption>
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
        </svg> Cari</button>
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

    <div class="container" style ="margin-top:105px; margin-left:190px;">
      <a href="formPermohonan.php" style="text-decoration:none">
        <button type="button" class="btn btn-outline-primary shadow-sm"><i class="bi bi-clipboard2-plus-fill"></i> Buat Permohonan</button>
        </a>
      </div>

    </div>
  </div>
</div>
<!-- akhir tambah dan cari -->

  <!-- Tabel Request -->



  <div class="container mt-3 justify-text-center">

  <!-- <div class="card">
  <div class="card-body">
    This is some text within a card body.
  </div>
</div> -->
        <table class="table shadow-sm rounded">
        <thead class="table-primary">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jenis Permohonan</th>
            <th scope="col">Setatus Permohonan</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        <?php 
        $i = 1;
        $result = mysqli_query($conn, $query);
        while($data = mysqli_fetch_assoc($result)){
        ?>
        <tbody>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['tanggal']; ?></td>
            <td><?= $data['jenis_permohonan']; ?></td>
            <td>
            <?php if($data['setatus_permohonan'] === 'Diproses'){ ?>
          <p class="fw"><span class="badge bg-primary"><?= $data['setatus_permohonan']; ?></p></span>
          <?php } else if($data['setatus_permohonan'] === 'Selesai') { ?>
            <p class="fw"><span class="badge bg-success"><?= $data['setatus_permohonan']; ?></p></span>
            <?php } else if($data['setatus_permohonan'] === 'Ditolak') {?>
              <p class="fw"><span class="badge bg-danger"><?= $data['setatus_permohonan']; ?></p></span>
              <?php }else{ ?>
                <p class="fw"><?= $data['setatus_permohonan']; ?></p>
                <?php } ?>
            </td>
            <td>

            <?php if($data['setatus_permohonan'] === 'Diproses'){ ?>
            <a href="detailPermohonan.php?id=<?= $data['id_permohonan']?>" style="text-decoration:none">
                <button type="button" class="btn btn-outline-primary">Lihat</button>
            </a>
          <?php } else if($data['setatus_permohonan'] === 'Selesai') { ?>
            <a href="detailPermohonan.php?id=<?= $data['id_permohonan']?>" style="text-decoration:none">
                <button type="button" class="btn btn-outline-primary">Lihat</button>
            </a>
            <a href="hapusPermohonan.php?id=<?= $data['id_permohonan']?>" style="text-decoration:none">
                <button type="button" class="btn btn-outline-danger">Hapus</button>
            </a>
            <?php } else if($data['setatus_permohonan'] === 'Ditolak') {?>
              <a href="detailPermohonan.php?id=<?= $data['id_permohonan']?>" style="text-decoration:none">
                <button type="button" class="btn btn-outline-primary">Lihat</button>
            </a>
            <a href="hapusPermohonan.php?id=<?= $data['id_permohonan']?>" style="text-decoration:none" onclick="return confirm('Apakah Anda yakin ingin menghapus permohonan ini?');">
                <button type="button" class="btn btn-outline-danger">Hapus</button>
            </a>
              <?php }else{ ?>
                <a href="detailPermohonan.php?id=<?= $data['id_permohonan']?>" style="text-decoration:none">
                <button type="button" class="btn btn-outline-primary">Lihat</button>
                </a>
                <a href="editPermohonan.php?id=<?= $data['id_permohonan']?>" style="text-decoration:none">
                    <button type="button" class="btn btn-outline-warning">Edit</button>
                </a>
                <a href="hapusPermohonan.php?id=<?= $data['id_permohonan']?>" style="text-decoration:none" onclick="return confirm('Apakah Anda yakin ingin menghapus permohonan ini?');">
                    <button type="button" class="btn btn-outline-danger">Hapus</button>
                </a>
                <?php } ?>


            </td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
  </div>
  <!-- Akhir Tabel Request -->


  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>