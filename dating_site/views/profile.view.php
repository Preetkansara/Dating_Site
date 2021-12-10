<?php
session_start();
include_once "../model/user.model.php";
include_once "../model/fav.model.php";
include_once "../model/wink.model.php";
$userName=$_SESSION['usn'];
// $uid=$_SESSION['uid'];
$selected=new User();
$user=$selected->selectUser($userName);
print_r($user);
$allUsers=$selected->selectAllUser($userName);
$fav=new Fav();
$favlist=$fav->selectAllfavs($user[0]['uid'],$userName);
$wink=new Wink();
$winklist=$wink->selectWinks($userName);
?>


<!DOCTYPE html>
<html>
<title>Love Finder</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
    .w3-circle{
        height:106px;
        width:106px;
    }
    .w3-dropdown-content w3-card-4 w3-bar-block{

        margin:4px 4px:
        padding:4px;
        background-color: green;
        width: 500px;
        height: 110px;
        overflow-x: hidden;
        overflow-y: auto;
        text-align:justify;

    }
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a>
        <div class="w3-dropdown-hover w3-hide-small">
            <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-gratipay"></i><span class="w3-badge w3-right w3-small w3-green"><?php echo sizeof($favlist)?></span></button>
            <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
                <?php
                foreach($favlist as $x){
                    echo $x['femail'];
                    echo "<button type='button'";
                    echo "onclick=window.location=";
                    echo "'../includes/removefav.inc.php?fname=".$x['femail']."'";
                    echo " class='w3-button w3-theme'><i class='fa fa-trash'></i> Remove from fav </button> ";
                    echo "<hr>";
                }
                ?>
            </div>
        </div>
        <div class="w3-dropdown-hover w3-hide-small">
            <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-cogs"></i><span class="w3-badge w3-right w3-small w3-green"></span></button>
            <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
                <input type="checkbox" id="emailrecive" name="emailrecive"class="w3-button w3-padding-large">
                <label for="vehicle1" class="w3-button w3-padding-large"> I want email notificaton</label><br>
            </div>
        </div>
        <!-- <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a> -->
        <div class="w3-dropdown-hover w3-hide-small">
            <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-eye"></i><span class="w3-badge w3-right w3-small w3-green"><?php echo sizeof($winklist)?></span></button>
            <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
                <?php
                foreach($winklist as $x){
                    echo $x['semail'];
                    echo "<br>";
                    echo "<button type='button'";
                    echo "onclick=window.location=";
                    echo "'../includes/setwink.inc.php?fname=".$x['semail']."'";
                    echo " class='w3-button w3-theme'><i class='fa fa-eye'></i> wink Back </button> ";
                    echo "<button type='button'";
                    echo "onclick=window.location=";
                    echo "'../includes/removewink.inc.php?fname=".$x['wid']."'";
                    echo " class='w3-button w3-theme'><i class='fa fa-trash'></i> remove</button> ";
                    echo "<hr>";
                }
                ?>
            </div>
        </div>
        <a href="../includes/logout.inc.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
            <img src="../img/logout2.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
        </a>
    </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large"><?php echo $user[0]['fname']." ".$user[0]['lname'] ?></a>
</div>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <div class="w3-row">
        <div class="w3-col m3">
            <div class="w3-card w3-round w3-white">
                <div class="w3-container">
                    <h4 class="w3-center"><?php echo $user[0]['fname']." ".$user[0]['lname'] ?></h4>
                    <p class="w3-center"><img <?php
                        echo "src='../images/".$user[0]['img']."'"?> class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                    <form action="update.view.php"method="post">
                        <button class="w3-button w3-theme" type="submit">Update Profile</button>
                    </form>
                    <hr>

                </div>
            </div>
            <br>

            <div class="w3-card w3-round">
                <div class="w3-white">
                    <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
                    <div id="Demo1" class="w3-hide w3-container">
                        <p>Some text..</p>
                    </div>
                    <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
                    <div id="Demo2" class="w3-hide w3-container">
                        <p>Some other text..</p>
                    </div>
                    <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
                    <div id="Demo3" class="w3-hide w3-container">
                        <div class="w3-row-padding">
                            <br>
                            <div class="w3-half">
                                <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
                            </div>
                            <div class="w3-half">
                                <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
                            </div>
                            <div class="w3-half">
                                <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
                            </div>
                            <div class="w3-half">
                                <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
                            </div>
                            <div class="w3-half">
                                <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
                            </div>
                            <div class="w3-half">
                                <img src="/w3images/snow.jpg" style="width:100%" class="w3-margin-bottom">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="w3-card w3-round w3-white w3-hide-small">
                <div class="w3-container">
                    <p>Interests</p>
                    <p>
                        <span class="w3-tag w3-small w3-theme-d5">News</span>
                        <span class="w3-tag w3-small w3-theme-d3">Labels</span>
                        <span class="w3-tag w3-small w3-theme-d2">Games</span>
                        <span class="w3-tag w3-small w3-theme-d1">Friends</span>
                        <span class="w3-tag w3-small w3-theme">Games</span>
                        <span class="w3-tag w3-small w3-theme-l1">Friends</span>
                        <span class="w3-tag w3-small w3-theme-l2">Food</span>
                        <span class="w3-tag w3-small w3-theme-l3">Design</span>
                        <span class="w3-tag w3-small w3-theme-l4">Art</span>
                        <span class="w3-tag w3-small w3-theme-l5">Photos</span>
                    </p>
                </div>
            </div>
            <br>

            <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
                <p><strong>Hey!</strong></p>
                <p>People are looking at your profile. keep on winking.</p>
            </div>

        </div>

        <div class="w3-col m7">

            <div class="w3-row-padding">
                <div class="w3-col m12">
                    <div class="w3-card w3-round w3-white">
                        <div class="w3-container w3-padding">
                            <h6 class="w3-opacity">Users</h6>
                            <p contenteditable="true" class="w3-border w3-padding">Search users here</p>
                            <?php
                            foreach($allUsers as $x){
                                echo $x['fname']." ".$x['lname']."<br>";
                                echo "<br>";
                                echo "<img src=";
                                echo "../images/".$x['img'];
                                echo " class='w3-circle' >";
                                echo "<button type='button'";
                                echo "onclick=window.location=";
                                echo "'../includes/setwink.inc.php?fname=".$x['email']."'";
                                echo " class='w3-button w3-theme'><i class='fa fa-eye'></i> Wink </button> ";
                                echo "<button type='button'";
                                echo "onclick=window.location=";
                                echo "'../includes/addfav.inc.php?fname=".$x['email']."'";
                                echo " class='w3-button w3-theme'><i class='fa fa-plus'></i> Add to fav </button> ";
                                echo "<hr>";

                                echo "<br>";
                            }

                            ?>

                            <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Add to fav </button>
                            <button type="button" class="w3-button w3-theme"><i class="fa fa-eye"></i> Winnk</button>
                        </div>
                    </div>
                </div>
            </div>


            <br>

            <footer class="w3-container w3-theme-d3 w3-padding-16">
                <h5>Footer</h5>
            </footer>

            <footer class="w3-container w3-theme-d5">
                <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">umbrella corporation</p>
            </footer>

            <script>
                function myFunction(id) {
                    var x = document.getElementById(id);
                    if (x.className.indexOf("w3-show") == -1) {
                        x.className += " w3-show";
                        x.previousElementSibling.className += " w3-theme-d1";
                    } else {
                        x.className = x.className.replace("w3-show", "");
                        x.previousElementSibling.className =
                            x.previousElementSibling.className.replace(" w3-theme-d1", "");
                    }
                }

                function openNav() {
                    var x = document.getElementById("navDemo");
                    if (x.className.indexOf("w3-show") == -1) {
                        x.className += " w3-show";
                    } else {
                        x.className = x.className.replace(" w3-show", "");
                    }
                }
                function myFunction(x) {

                    <?php

                    ?>
                }
            </script>

</body>
</html>