<?php 
include_once "../model/fav.model.php";
session_start();
$user=$_SESSION['usn'];
$fname=$_GET['fname'];
$fav=new Fav();

// echo $fname;
// echo $user;
$fav->removeFavs($user,$fname);
header("location: ../views/profile.view.php");
// header("location: ../views/profile.view.php");
?>