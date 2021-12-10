<?php
require('../Controller/userRegistrationList.php');


$cityList = cityList();
sort($cityList);

if (isset($_GET['error']) && $_GET['error'] == "invalid") { ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill"/>
        </svg>
        <div>
            Email already exist! Try another one
        </div>
    </div><?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .container {
            padding: 16px;
            background-color: white;
        }
    </style>
</head>

<body>
<section class="h-100">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="my-4">
                    <div class="row g-0">
                        <div class="col-xl-6 d-none d-xl-block">
                            <img
                                    src="../images/couple.jpg"
                                    class="img-fluid w3-round"
                                    style="height:995px;"/>
                        </div>
                        <div class="col-xl-6">
                            <form action="../Controller/insertUser.php" method="post">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5">Registration form</h3>

                                </div>
                                <div class="input-group container">
                                    <label>first_name</label>
                                    <input type="text" name="first_name" ">
                                </div>
                                <div class="input-group container">
                                    <label>last_name</label>
                                    <input type="text" name="last_name"">
                                </div>
                                <div class="input-group container">
                                    <label>Email</label>
                                    <input type="email" name="email">
                                </div>
                                <div class="input-group container">
                                    <label>Password</label>
                                    <input type="password" name="password">
                                </div>
                                <div class="container">
                                    <select type="text" name="city[]" id="form3Example97"
                                            class="form-control form-control-lg">

                                        <?php if (is_array($cityList)) {
                                            foreach ($cityList as $namesOfCity) {
                                                echo "<option value='$namesOfCity' >" . $namesOfCity . "</option> ";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="form-label" for="form3Example97">City</label>
                                </div>

                                <div class="input-group container">
                                    <label>date_of_birth</label>
                                    <input type="date" name="date_of_birth">
                                </div>

                                <div class="form-check">
                                    Gender <br> <input
                                            class="form-check-input"
                                            type="radio"
                                            name="gender"
                                            id="gender"
                                            value="Female"
                                            required
                                    />
                                    <label class="form-check-label" for="femaleGender">Female</label>
                                </div>
                                <div class="form-check">
                                    <input
                                            class="form-check-input"
                                            type="radio"
                                            name="gender"
                                            id="gender"
                                            value="Male"
                                            required
                                    />
                                    <label class="form-check-label" for="femaleGender">Male</label>
                                </div>

                                <div class="input-group">
                                    <button type="submit" class="button" name="submit">Register</button>
                                </div>
                </div>
            </div>
        </div>
    </div>
        </div>
</section>

</body>

</html>
