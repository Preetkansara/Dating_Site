<?php
include '../Model/userProfile.php';

function userProfiles() : array
{
    $profileDetails = new userProfile();
    return $profileDetails->userDetails();
}

