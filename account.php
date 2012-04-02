<?php

require 'inc/auth.php';
require 'inc/info.class.php';

$id = $_SESSION['id'];

$dir = 'uploads/' . $id . '/';

$i = new info();

?>
<?php require 'inc/header.php'; ?>
<pre>
<?php
$i->createFiles($dir, $id);
?></pre>
<?php require 'inc/footer.php'; ?>