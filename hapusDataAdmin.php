<?php
session_start(); 
include('connect.php');

$nip = $_GET['nip'];
if(!isset($_SESSION["loginA"])){

  header("Location: loginAdmin.php");
  exit;

}

$admin = "DELETE FROM admin WHERE hash_nip = '$nip'";
mysqli_query($conn, $admin);

header('Location: halamanDataAdmin.php');

?>