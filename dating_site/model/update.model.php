<?php /** @noinspection PhpMultipleClassDeclarationsInspection */
include_once 'Database.php';
class update extends Database
{
    public function updateDetails($updatedInformation): bool
    {
        $userId = $_SESSION['uid'];
        $firstName =  $updatedInformation['firstName'];
        $lastName = $updatedInformation['lastName'];
        $email =  $updatedInformation['email'];
        $type = $updatedInformation['type'];
        $password = $updatedInformation['pwd'];

        $query = "UPDATE users SET fname = '$firstName', lname = '$lastName', email = '$email',ulevel = '$type' pwd = '$password' where uid= '$userId'" ;
        $result = $this->execute($query);
        if (count($result) == 0) {
            return true;
        }
        return false;
    }
}