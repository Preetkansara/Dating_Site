<?php
require 'server.php';

function allUsers() : array

{
    $query = "SELECT * FROM users where username = '$userName'";
    return mysqli_fetch_array($query);
}