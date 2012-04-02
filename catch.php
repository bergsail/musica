<?php

session_start();

$id = $_SESSION['id'];

require_once('inc/upload.class.php');

$ft = new File_Streamer();
$ft->setDestination('uploads/'.$id.'/');
$ft->receive();

?>