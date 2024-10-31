<?php 
session_start();
include("connect.php");

// login admin
if(isset($_POST["loginA"])){

  $nip = $_POST["nip"];
  $password = $_POST["password"];

  $queri = "SELECT * FROM admin WHERE nip = '$nip' AND password = '$password'";
  $result = mysqli_query($conn, $queri);

  if(mysqli_num_rows($result) > 0){

    $_SESSION["loginA"] = true;
    $_SESSION["nip"] = $_POST["nip"];
  
    header("Location: halamanAdmin.php");
    exit;
  }
  $error = true;
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <style>
     .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
      }
      .h-custom {
      height: calc(100% - 73px);
      }
      @media (max-width: 450px) {
      .h-custom {
      height: 100%;
      }
      }

      .bg-foto{
        background-image: url(img/sawah.jpg);
        background-size: cover;
      }

      body {

        overflow-y: hidden; 
        }

   @keyframes animasiColor {
      0%{
        background-position:  left;
      }
      100%{
        background-position:  right;
      }
    }

      body{
        height: 100vh;
        background-size: 200%;
        background-color: #0093E9;
        background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);  
        background-repeat: no-repeat;
        animation: animasiColor 2s infinite alternate;
        transition: all ease;
        overflow-y: hidden; 
      }

    </style>
  <body>
  <section class="vh-100 bg-foto">
    
  <form action="" method="post">
  <div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100 ">
    
        
     
      <div class="col-lg-6 mb-5 mb-lg-0">
      <div class="row">
      <a href="home.php">
          <button type="button" class="btn btn-outline-light"><i class="bi bi-arrow-left"></i> Kembali</button>
            </a>
     </div>
          <h1 class="my-4 display-3 fw-bold text-light">
            Kami Melayani <br />
            <span class="text-light">Dengan Sepenuh Hati</span>
          </h1>
          <p class="text-light">
            <h3 class="text-light">Selamat Datang Admin</h3>
            <p class="text-light">Silakan log in untuk layanan mandiri. 
              Apabila belum mempunyai akun, silakan lakukan registrasi terlebih dahulu.</p>
          </p>
        </div>

      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class=" card shadow-2-strong" style="border-radius: 1rem;">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link" aria-current="true" href="loginP.php">Penduduk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" >Admin</a>
              </li>
            </ul>
          </div>
          <div class="card-body p-5">
            <h3 class="mb-4 text-center">Masuk</h3>
              <?php if(isset($error)){ ?>
                <p style="color: red; font-style: itaitalic ; "> NIP / Password salah!! </p>
                <?php } ?>

            <div class="form-outline mb-4">
            <label class="form-label" for="nip">NIP</label>
              <input type="text" id="nip" name="nip" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-5">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg" />
            </div>

            <!-- Checkbox -->
            <div class="text-center">
            <button class="btn btn-primary btn-lg btn-block d-grip col-12 mx-auto text-center-round" name="loginA">Login</button>
            
            <hr class="my-4">
            <p>Belum punya akun admin? Registrasi <a href="registerA.php" class="link-info">di sini</a></p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </form>
</section>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>