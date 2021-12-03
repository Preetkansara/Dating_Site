<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>

        .content {
            background: #E5FFE5;
        }

        .header {
            width: 30%;
            margin: 50px auto 0px;
            color: white;
            background: #8490FC;
            text-align: center;
            border: 1px solid #B0C4DE;
            border-bottom: none;
            border-radius: 10px 10px 0px 0px;
            padding: 20px;
        }
    </style>
</head>
<body class="content">

<div class="header">
    <img src="images/dating.png" height="100" width="100">
    <h2>Successfully Logged In</h2>
</div>
<div>
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

        <?php  if (isset($_SESSION['username'])) : ?>
        <div>
            <p align="center">Welcome <strong><?php echo $_SESSION['username']; ?></strong> to the Dating Site
                <a href="home_page.php" style="color: #8490FC;">Find your Dating Partner</a>
            </p>
        </div>
    <?php endif ?>
</div>
</form>
</body>
</html>