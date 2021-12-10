<?php /** @noinspection PhpMultipleClassDeclarationsInspection */
require ('../Model/Database.php');

class UserProfile extends Database
{
    public function userDetails() : array|string {
        $query = "select first_name, last_name, profile_image.file_path from users join profile_image where users.user_id = profile_image.user_id";
        return $this->execute($query);
    }

    public function viewProfile($ID) : array|string {
        $query = "select * from users where user_id = '$ID'";
        $result = $this->execute($query);
        if (count($result) == 0) {
            return "error";
        }
        return $result;
    }

    public function viewPreferredProfile(string $genderPreference) : array|string {
        $query = "select * from users where gender = '$genderPreference'";
        $result = $this->execute($query);
        if (count($result) == 0) {
            return "error";
        }
        return $result;
    }
}