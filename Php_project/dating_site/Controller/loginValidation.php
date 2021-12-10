<?php
session_start();
include '../Model/LoginUser.php';


if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginObj = new LoginUser();
    $result = $loginObj->loginAuthenticate($email, $password);

    if ($result != 'error') {
        foreach ($result as $value) {
            $_SESSION['userID'] = $value['ID'];
        }

        $_SESSION['allUserInformation'] = $result;

        header("Location:../View/Home.php");
        exit();
    } else {
        header("Location:../View/Login.php?error=invalid");
    }
} else {
    header("Location:../View/index.html");
    exit();
}

