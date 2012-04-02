<?php

require 'inc/auth.php';
require 'inc/info.class.php';

$id = $_SESSION['id'];

$vdir = 'uploads/' . $id . '/';

$i = new info();

?>
<?php require 'inc/header.php'; ?>

	<div class="container">
		<div id="main">
		<?php $i->albumView($vdir) ?>
		</div>
	</div><!-- container -->

<?php require 'inc/footer.php'; ?>
