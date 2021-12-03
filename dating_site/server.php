<?php

$username = "";
$email    = "";
$errors = array();

$db = mysqli_connect('localhost', 'project', 'project', 'project');

if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);

    if (empty($username)) { array_push($errors, "Please Enter Valid Username"); }
    if (empty($email)) { array_push($errors, "Please Enter Valid Email"); }
    if (empty($password)) { array_push($errors, "Please Enter Valid Password"); }
    if ($password != $confirmPassword) {
        array_push($errors, "Password didn't match. Try Again");
    }

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password);

        $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            header('location: index.php');
        }else {
            array_push($errors, "Wrong Username or Password! Try Again");
        }
    }
}
if(isset($_POST['username'])) {
    $query = "SELECT * FROM users";
    mysqli_query($db, $query);
}

