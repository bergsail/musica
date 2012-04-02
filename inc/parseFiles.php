<?php

session_start();

require 'getid3/getid3.php';
require 'inc/info.class.php';


$dir = "uploads/" . $_SESSION['user'];

$info = new info();

$info->makeImages($dir);

?>