<?php
session_start();
include_once "../model/user.model.php";
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $level= $_POST['level'];
    $password= $_POST['pwd'];
    $image = $_FILES['image']['name'];
    $uid=$_SESSION['uid'];

    echo "first Name :".$fname."<br>";
    echo "last Name :".$lname."<br>";
    echo "femail :".$email."<br>";
    echo "level :".$level."<br>";
    echo "pwd :".$password."<br>";
    echo "Image :".$image."<br>";

    $newuser=new User();
    print_r($newuser);
    echo "<br>";
    echo $_FILES['image']['name'];
    if($newuser->updateuser($fname,$lname,$email,$password,$level,$image,$uid)){
        echo "sccessfully inserted the data";
    }
    $target = "../images/".basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        session_start();
        $_SESSION['usn']=$email;  
        header("location: ../views/profile.view.php");
}
else{
    header("location: ../index.php?update=failed");
}