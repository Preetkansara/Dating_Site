<?php
include 'Database.php';

class SearchUser extends Database
{
    public function SearchPreferences(array $searchInput): array|string
    {
        $gender = $searchInput['gender'];
        $city = $searchInput['city'];

        $query = "select user_id, first_name, last_name from users
        join profile_image on users.user_id = profile_image.user_id where users.gender = '$gender' and users.city = '$city';";
        $result = $this->execute($query);
        if (count($result) == 0) {
            return "error";
        }
        return $result;
    }
}