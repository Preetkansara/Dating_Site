<?php 
include_once "../model/user.model.php";
$userName=$_POST['mailuid'];
$pwd=$_POST['pwd'];
$selected=new User();
$user=$selected->selectUser($userName);
// print_r($user);
if(isset($user) and $user[0]['pwd']==$pwd and $user[0]['email']==$userName){
    session_start();
    $_SESSION['usn']=$userName;  
    $_SESSION['test']=$user[0]['img'];   
    $_SESSION['uid']=$user[0]['uid'];
    // echo "hiiii".$_SESSION['test'];
    header("location: ../views/profile.view.php");
}
else{
    header("location: ../index.php?login=failed");
}