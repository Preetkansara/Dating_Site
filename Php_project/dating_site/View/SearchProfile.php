<?php
session_start();
require('../Controller/userRegistrationList.php');

$cityList = cityList();
sort($cityList);



if(isset($_GET['error']) && $_GET['error'] == "notFound"){ ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            Error Searching your partner
        </div>
    </div><?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Dating </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<section class="h-100">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="my-4">
                    <div class="row">
                        <div class="col">
                            <form action="../Controller/searchUser.php" method="post">
                                <div class="card-body p-md-5 text-black">
                                    <div class="form-outline mb-4">
                                        <input type="text" name="age" id="form3Example99" class="form-control form-control-lg" pattern=".{2}" title="Please enter 2 digit!" required/>
                                        <label class="form-label" for="form3Example99">Age</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <select type="text" name="city[]" id="form3Example97" class="form-control form-control-lg">
                                            <?php foreach ($cityList as $namesOfCity) {
                                                echo "<option value='$namesOfCity' >" . $namesOfCity . "</option> ";
                                            }
                                            ?>
                                        </select>
                                        <label class="form-label" for="form3Example97">City</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <select type="text" name="occupation[]" id="form3Example97" class="form-control form-control-lg">
                                            <?php foreach ($occupationList as $namesOfJobs) {
                                                echo "<option value='$namesOfJobs' >" . $namesOfJobs . "</option> ";
                                            }
                                            ?>
                                        </select>
                                        <label class="form-label" for="form3Example97">Occupation</label>
                                    </div>

                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                        <div class="form-check form-check-inline">
                                            <h6 class="mb-0 me-4">Preference in : </h6>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="preference"
                                                    id="femaleGender"
                                                    value="Female"
                                                    required
                                            />
                                            <label class="form-check-label" for="femaleGender"> Female</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input
                                                    class="form-check-input"
                                                    type="radio"
                                                    name="preference"
                                                    id="maleGender"
                                                    value="Male"
                                                    required
                                            />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-end pt-3">
                                        <input type="submit" name="submit" class="btn btn-outline-dark btn-lg ms-2">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center" id="item_list">
            <?php
            if(isset($_SESSION['searchResult'])){
            foreach ($_SESSION['searchResult'] as $value) {
                ?>
                <div class="col-sm-3">
                    <?php echo "<a href='ViewProfile.php?viewProfileID=". $value['ID'] ."'>" ?>
                    <div class="thumbnail">
                        <img src="<?php echo '../' . $value['filePath'] ?>" class="rounded float-left" style="height: 250px; width: 270px; margin:20px 0 20px 0;" alt="">
                        <div>
                            <p><?php echo  $value['firstName'] . " " . $value['last_name']?></p>
                        </div>
                    </div>
                    <?php echo "</a>" ; ?>
                </div>
                <?php
            }} ?>
        </div>
    </div>
</section>

</body>

</html>
