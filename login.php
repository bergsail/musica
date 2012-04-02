<?php

require 'inc/db.class.php';

require 'inc/register.php';

require 'inc/process_oauth.php';

if(isset($_GET['msg'])){

    $msg = $_GET['msg'];

    if($msg == 1){
        $message = "You have been successfully logged out!";
    }
    
}

/*Always place this code at the top of the Page
session_start();
if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
    header("location: index.php");
}

if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'twitter') {
        header("Location: login-twitter.php");
    } else if ($oauth_provider == 'facebook') {
        header("Location: login-facebook.php");
    }*/


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Under Construction</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/libs/jquery.js" ></script>

</head>

<body>
    <div id="top">
        <div class="login">
            <button id="login" type="button">Login</button>
            <button id="register" type="button">Register</button>
        </div>
        <div class="notice">
            <p><?php if(isset($message)){ echo $message; } ?></p>
        </div>
    </div>
<div id="main">
    <div id="header">
        <img src="img/assets/logo_small.png" class="logo" alt="Logo" />
    </div><!-- End Header -->
    <div id="container">
        <div class="info">
            <h1>Free Your Music.</h1>
    </div><!-- End Info -->
    <div class="register" id="login-form">
        <form action="login.php" method="post">
            <input type="hidden" name="login" value="true"/>
            <input type="text" name="username" placeholder="Username" required="required"/>
            <input type="password" name="password" placeholder="Password" required="required"/>
            <input id="log" type="submit" value="Login"/>
        </form>
    </div>
    <div class="register" id="register-form">
        <form action="login.php" method="post">
            <input type="hidden" name="login" value="false"/>
            <input type="email" name="email" placeholder="Your e-mail address" required="required"/>
            <input type="text" name="username" placeholder="Desired Username" required="required"/>
            <input type="password" name="password" placeholder="Strong Password" required="required"/>
            <input id="reg" type="submit" value="Register"/>
        </form>
    </div><!-- End Register/Login -->
    <div class="line" style="align: center;"></div>
    <div class="login">
        <div class="social">
            <div class="info"><p id="r"> or register with: </p></div>
            <a class="facebook" href="login-facebook.php"><button id="facebook" type="button">Facebook</button></a>
            <a class="twitter" href="login-twitter.php"><button id="twitter" type="button">Twitter</button></a>
        </div><!--- End Social -->
    <div class="clear"></div>
    </div><!-- End login -->
    <div id="footer">
        <small>&copy; Ignatius Fernandes</small>
    </div>
    </div><!-- End Container -->
</div><!-- End Main -->
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>