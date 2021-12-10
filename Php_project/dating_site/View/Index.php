<?php
require('../Controller/userProfiles.php');


if(isset($_GET['error']) && $_GET['error'] == "notLogin"){ ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            Login for more access.
        </div>
    </div><?php
}

require ('header.php');
?>
<div class="backgroundImage text-center text-white">
    <nav class="navbar navbar-expand-lg navbar-light" style="float: right;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse w3-right w3-hide-small" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2">
                    <li>
                        <a class="w3-bar-item w3-button" href="Login.php">Login</a>
                    </li>
                    <li>
                        <a class="class="w3-bar-item w3-button" href="Register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <img src="../images/date.jpg" style="width:100%">
    </div>
</div>

</body>

</html>
