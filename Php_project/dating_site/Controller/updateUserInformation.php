<?php
include '../Model/UpdateuserInformation.php';
$updateUserInformationObj = new UpdateuserInformation();

if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password  = $_POST['password'];

    $updatedInformation = ['first_name' => $firstName, 'last_name' => $lastName, 'email' => $email,  'password' => $password];

    if($updateUserInformationObj->updateDetails($updatedInformation) == 1){
        header("Location:../View/Profile.php");
    }
}
