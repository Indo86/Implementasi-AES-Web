<?php
session_start(); 
include('connect.php');

$nik = $_GET['nik'];
if(!isset($_SESSION["loginA"])){

  header("Location: loginAdmin.php");
  exit;

}

$admin = "DELETE FROM admin WHERE nik = $nik";
mysqli_query($conn, $admin);
$penduduk = "DELETE FROM penduduk WHERE hash_nik = $nik";
mysqli_query($conn, $penduduk);


header('Location: halamanDataPenduduk.php')

?>