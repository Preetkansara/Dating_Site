<?php
require ('../Controller/viewProfile.php');
session_start();
if(isset($_SESSION['userID'])) {
    if (isset($_GET['viewGalleryID'])) {
        $dir_name = "../feedImages/";
        $feedImages = glob($dir_name . $_GET['viewGalleryID'] . "*.jpg");
    }
}else {
    header("Location:../View/Index.php?error=notLogin");
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Dating </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="container">
     <div class="row">
        <?php foreach ($feedImages as $image) { ?>
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src = "<?php echo $image ?>" class="w-100 shadow-1-strong rounded mb-4"  alt=""/>
            </div>
        <?php }?>
    </div>
</div>

</body>

</html>
