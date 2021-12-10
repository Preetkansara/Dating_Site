<?php
require('../Model/userProfile.php');

function viewProfile($profile_id): array
{
    $viewProfileObj = new userProfile();
    $result = $viewProfileObj->viewProfile($profile_id);
    if($result == 'error'){
        header("Location:../View/Index.php");
        exit();
    }
    return $result;
}
