<?php

if(isset($_GET['error']) && $_GET['error'] == "invalidType"){ ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
           File type is invalid.Please use jpg.
        </div>
    </div><?php
}

if(isset($_GET['error']) && $_GET['error'] == "invalidSize"){ ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            File size is to long.
        </div>
    </div><?php
}

if(isset($_GET['error']) && $_GET['error'] == "problemWithSQL"){ ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            Something went wrong Please try again.
        </div>
    </div><?php
}

session_start();

require ('../Controller/viewProfile.php');

$allInformation = viewProfile($_SESSION['userID']);

$dir_name = "../profileImages/";

$profileImage = glob($dir_name.$_SESSION['userID']."*_profile.jpg");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Dating </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/CSS/profilestyle.css" rel="stylesheet">
</head>

<body>
<?php
foreach ($allInformation as $value) {
?>
<div class="container">
    <div class="row">
        <div class="col" style="margin-left:350px;">
            <div class="profile-sidebar-portlet" >
                <form action="../Controller/uploadProfileImage.php" method="post" enctype="multipart/form-data">
                    <div class="profile-userpic">
                        <?php foreach ($profileImage as $image) { ?>
                            <img src = "<?php echo $image ?>"   class="img-responsive" alt = "" style="margin-left:50px;">
                        <?php }?>
                    </div>
                    <div>
                        <input type="file" name="profilePicToUpload"/>
                        <input type="submit" class="btn btn-info" name="submit" value="Edit Profile Picture" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="margin-left:260px; margin-top:30px;">
            <form action="../Controller/updateUserInformation.php" method="post">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">First name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" value="<?php echo $value["firstName"];?>" name="firstName" pattern="[A-Za-z]{1,15}" title="please enter alphabets!">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text"  value="<?php echo  $value["last_name"];?>" name="lastName" pattern="[A-Za-z]{1,15}" title="please enter alphabets!">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" value="<?php echo  $value["email"];?>"  name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="please enter valid email!">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Number</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" value="<?php echo  $value["contact_number"];?>"  name="contact_number" pattern=".{10}" title="Please enter 10 digit!" >
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="password" value="<?php echo  $value["password"];?>"  name="password">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" name="submit">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
}
?>
</body>

</html>
