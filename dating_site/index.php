<!DOCTYPE html>
<html>
<title>MATCHER</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}


@font-face{
    font-family: "p1";
    src: url("views/assets/fonts/28 days later.ttf");
}
.ll{
  font-family:p1;
  color:yellow;
}
.lm{
  
  font-family:p1;
  color:white;

}
</style>
<body class="w3-black">

<h1></h1>
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <img src="img/logo.jpg" style="width:100%">
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-sign-in w3-xxlarge"></i>
    <p>LOGIN</p>
  </a>
  <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
  <i class="fa fa-user-plus w3-xxlarge"></i>
    <p>REGISTER</p>
  </a>
  <a href="#price" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
  <i class="fa fa-usd w3-xxlarge"></i>
    <p>Price</p>
  </a>
</nav>

<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="#photos" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
  </div>
</div>

<div class="w3-padding-large" id="main">
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small"><span  class="ll">LOVE</span> <span class="lm">FINDER</span> </h1>
    <p style="font-size: 25px;"> <span class="lm">Find your </span> <span class="ll">partner</span> <span class="lm">here</span></p>
    <img src="img/main.jpg" alt="boy" class="w3-image" width="900" height="600">
  </header>

  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Please enter your credentials</h2>
    <hr style="width:200px" class="w3-opacity">
    <form action="includes/login.inc.php" method="post">

    <input type="text" name="mailuid" class="w3-input w3-padding-16" placeholder="Email"/><br>

    <input type="password" name="pwd" class="w3-input w3-padding-16"  placeholder="password"/><br>
    <button class="w3-button w3-light-grey w3-padding-large" type="submit">
          <i class="fa fa-paper-plane"></i> Login
        </button>
</form> 

  <div class="w3-padding-64 w3-content" id="photos">
    <form action="includes/register.inc.php" method="post" class="form_sign" enctype="multipart/form-data">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <input type="text"class="w3-input w3-padding-16" placeholder="Enter First Name" name="fname" required><br>
        <input type="text" class="w3-input w3-padding-16" placeholder="Enter Last Name" name="lname" required><br>
        <input type="text" class="w3-input w3-padding-16"placeholder="Enter Email" name="email" required><br>
        <select name="level" class="w3-input w3-padding-16" id="level">
        <option class="w3-input w3-padding-16" value="1">invited</option>
        <option class="w3-input w3-padding-16" value="2">regular</option>
        <option class="w3-input w3-padding-16" value="3">premium</option>
        </select><br>
        <input type="password" class="w3-input w3-padding-16" placeholder="Enter Password" name="pwd" required><br>
        <!-- <input type="password" class="w3-input w3-padding-16" placeholder="Repeat Password" name="pwd-repeat" required><br> -->
        <hr>
        <input type="hidden" name="size" value="1000000">
  	    <div>
        <label for=" ">Please choose a profile pic : </label>
  	    <input type="file" name="image">
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <button type="submit"  name="signup-submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="#about">Sign in</a>.</p>
    </div>
</form>
  <!-- End Portfolio Section -->
  </div>

      <!-- Grid for pricing tables -->
      <h3 class="w3-padding-16 w3-text-light-grey" id="price">Our Price</h3>
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-half w3-margin-bottom">
        <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-dark-grey w3-xlarge w3-padding-32"><a href="views/login.view.php">Regular</a></li>
          <li class="w3-padding-16">10 Favrites</li>
          <li class="w3-padding-16">10 winks </li>
          <li class="w3-padding-16">
            <h2>$ 10</h2>
            <span class="w3-opacity">per month</span>
          </li>
        </ul>
      </div>

      <div class="w3-half">
        <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-dark-grey w3-xlarge w3-padding-32">Premium</li>
          <li class="w3-padding-16">Unlimited Fvorites</li>
          <li class="w3-padding-16">Unlimited Winks</li>
          <li class="w3-padding-16">Invite others</li>
          <li class="w3-padding-16">Endless Support</li>
          <li class="w3-padding-16">
            <h2>$ 25</h2>
            <span class="w3-opacity">per month</span>
          </li>
        </ul>
      </div>
    <!-- End Grid/Pricing tables -->
    </div>
  
    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <!-- <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p> -->
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
</div>

</body>
</html>
