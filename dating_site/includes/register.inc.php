<?php
include_once "../model/user.model.php";
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $level= $_POST['level'];
    $password= $_POST['pwd'];
    $passwordRepeat= $_POST['pwd-repeat'];
    $image = $_FILES['image']['name'];

    echo "first Name :".$fname."<br>";
    echo "last Name :".$lname."<br>";
    echo "femail :".$email."<br>";
    echo "level :".$level."<br>";
    echo "pwd :".$password."<br>";
    echo "rpwd :".$passwordRepeat."<br>";
    echo "Image :".$image."<br>";

    $newuser=new User();
    $newuser->defaultCon($fname,$lname,$email,$password,$level);
    // defaultCon
    echo "br";
    print_r($newuser);
    echo "<br>";
    echo $_FILES['image']['name'];
    if($newuser->setUser($fname,$lname,$email,$password,$level,$image)){
        echo "sccessfully inserted the data";
    }
    $target = "../images/".basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        session_start();
        $_SESSION['usn']=$email;  
        header("location: ../views/profile.view.php");
}
else{
    header("location: ../index.php?login=failed");
}