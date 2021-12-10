<?php
session_start();
require ('../Model/SearchUser.php');

    $age = $_POST['age'];
    $preference = $_POST['preference'];

    foreach ($_POST['city'] as $arrayValue) {
        $city = $arrayValue;
    }

    $preferencesOfUser = ['city' => $city];

    $preferencesOfUserObj = new SearchUser();
    $result = $preferencesOfUserObj->SearchPreferences($preferencesOfUser);

    if ($result != 'error') {
        $_SESSION['searchResult'] = $result;
        header("Location:../View/SearchProfile.php");
    }else{
        header("Location:../View/SearchProfile.php?error=notFound");
    }


