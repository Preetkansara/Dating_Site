<?php
include '../Model/RegisterUser.php';
{
    $registerObj = new RegisterUser();

    if (isset($_POST['submit'])) {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $date_of_birth = $_POST['date_of_birth'];
        $gender = $_POST['gender'];

        foreach ($_POST['city'] as $arrayValue) {
            $city = $arrayValue;
        }

        function userAge($date_of_birth): int
        {
            return floor((time() - strtotime($date_of_birth)) / 31556926);
        }

        if($registerObj->checkEmail($email) == 0){
            $userDetails = ['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email,
                'password' => $password, 'city' => $city, 'gender' => $gender, 'date_of_birth' => $date_of_birth];

            if ($registerObj->enterUser($userDetails) == 1) {
                header("Location:../View/Home.php");
            }
        }
        else{
            header("Location:../View/Register.php?error=invalid");
        }
    }else{
        header("Location:../View/index.html");
        exit();
    }
}