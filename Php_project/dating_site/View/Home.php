<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header("Location:../View/Index.php?error=notLogin");
    exit();
}

require('../Controller/userProfiles.php');

$profileDetails = userProfiles();

if (isset($_GET['error']) && $_GET['error'] == "notLogin") { ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill"/>
        </svg>
        <div>
            Login for more access.
        </div>
    </div><?php
}


require ('header.php');
?>

<div class="backgroundImageHome text-center text-white">
    <nav class="navbar navbar-expand-lg navbar-light" style="float: right;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2">
                    <li>
                        <a class="navbar_link" href="Profile.php">Profile</a>
                    </li>
                    <li>
                        <a class="navbar_link" href="SearchProfile.php">Search</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row text-center" id="item_list">
        <?php
        if (is_array($profileDetails))
            foreach ($profileDetails as $value) {
                if ($value['profile_id'] != $_SESSION['userID']) {
                    ?>
                    <div class="col-sm-3">
                        <?php echo "<a href='ViewProfile.php?viewProfileID=" . $value['profile_id'] . "'>" ?>
                        <div class="thumbnail">
                            <img src="<?php echo '../' . $value['file_path'] ?>" class="rounded float-left"
                                 style="height: 250px; width: 270px; margin:20px 0 20px 0;" alt="">
                            <div>
                                <p><?php echo $value['firstName'] . " " . $value['last_name'] ?></p>
                            </div>
                        </div>
                        <?php echo "</a>"; ?>
                    </div>
                    <?php
                }
            } ?>
    </div>
</div>


</body>

</html>
