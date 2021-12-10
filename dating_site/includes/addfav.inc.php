<?php 
include_once "../model/fav.model.php";
session_start();
$user=$_SESSION['usn'];
$fname=$_GET['fname'];
$fav=new Fav();
$fav->setFavs($user,$fname);
header("location: ../views/profile.view.php");
// header("location: ../views/profile.view.php");
?>