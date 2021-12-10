<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

include 'Database.php';

class RegisterUser extends Database
{
    public function enterUser($userDetails) : bool{
        $query = "INSERT INTO users (first_name, last_name, email, password, city, date_of_birth, gender) VALUES (?)";
        $result = $this->registerUser($query, $userDetails);
        if (count($result) == 0) {
            return true;
        }
        return false;
    }

    public function checkEmail($email) : bool{
        $query = "select * from users where email = '$email'";
        $result = $this->execute($query);

        if (count($result) == 0) {
            return false;
        }
        return true;
    }
}