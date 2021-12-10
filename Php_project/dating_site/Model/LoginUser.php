<?php
include 'Database.php';

class LoginUser extends Database
{
    public function loginAuthenticate($email, $password) : array|string {
        $query = "select * from users where email = '$email' and password = '$password'";
        $result = $this->execute($query);
        if (count($result) == 0) {
            return "error";
        }
        return $result;
    }
}