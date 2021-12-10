<?php 
include_once "../model/wink.model.php";
session_start();
$user=$_SESSION['usn'];
$fname=$_GET['fname'];
$wink=new Wink();
$wink->setWink($user,$fname);
header("location: ../views/profile.view.php");
?>