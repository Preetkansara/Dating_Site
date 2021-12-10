<?php
require('../Controller/viewProfile.php');

$viewPersonID = $_GET['viewProfileID'];

if (isset($viewPersonID)) {
    $dir_name = "../profileImages/";
    $profileImage = glob($dir_name . $viewPersonID . "_profile.jpg");

    //get details of person in array
    $viewProfile = viewProfile($viewPersonID);
} elseif (isset($_GET['error']) && $_GET['error'] == 'notLogin') {
    header("Location:../View/Index.php?error=notLogin");
} else {
    header("Location:../View/Index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Dating </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/CSS/profilestyle.css" rel="stylesheet">
</head>

<body>
<?php
if (is_array($viewProfile)) {
    foreach ($viewProfile as $viewProfileValue) {
        ?>
        <div class="container" style="margin-top:100px">
            <div class="row">
                <div class="col">
                    <div class="portlet light profile-sidebar-portlet bordered">
                        <div class="profile-userpic" style="margin-left:170px;">
                            <?php foreach ($profileImage as $image) { ?>
                                <img src="<?php echo $image ?>" class="img-responsive" alt="">
                            <?php } ?>
                            <div class="profile-usertitle-name"> <?php echo $viewProfileValue["firstName"] . " " . $viewProfileValue["last_name"]; ?></div>
                            <div class="profile-usertitle-job"> <?php echo $viewProfileValue["occupation"] . " ," . $viewProfileValue["age"]; ?> </div>
                        </div>
                        <div class="profile-userbuttons">
                            <a href="ChatBox.php?personID=<?php echo $viewPersonID; ?>"
                               class="btn btn-info  btn-sm">Message</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $viewProfileValue["firstName"] . " " . $viewProfileValue["last_name"]; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $viewProfileValue["email"]; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Number</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $viewProfileValue["contact_number"]; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $viewProfileValue["city"]; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Birth Date</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $viewProfileValue["birth_date"]; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php echo "<a class='btn btn-info' href='ViewGallery.php?viewGalleryID=" . $viewPersonID . "'>" ?>
                                    Gallery <?php echo "</a>" ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
</body>

</html>
