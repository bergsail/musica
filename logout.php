<?php

session_start();
session_unset();
session_destroy();
echo '<a href="index.php">Login</a>';
echo '<pre>';
print_r(get_defined_vars());
echo '</pre>';

?>
