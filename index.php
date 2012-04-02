<?php

require 'inc/auth.php';
require 'inc/info.class.php';

$id = $_SESSION['id'];

$vdir = 'uploads/' . $id . '/';

$i = new info();

?>
<?php require 'inc/header.php'; ?>
<div id="content">
	<div class="container">
		<div id="main">
			<div id="playlist">
				<?php 
				
					$i->getList($vdir);
                    					
				?>
			</div>
		</div>
	</div><!-- container -->
</div>
<!-- <div id="playbar">
    <div class="container">
        <div id="controls">
    			<input type="range" step="0.1" min="0" max="10" id="seekbar"></input>
                <i id="previousbutton" class="icon-fast-backward interactions"></i>
    			<i id="playbutton" class="icon-play interactions"></i>
                <i id="pausebutton" class="icon-pause interactions"></i>
                <i id="nextbutton" class="icon-fast-forward interactions"></i>
        </div>
    </div>
</div> -->

<div class="container">
    <div id="controls">
        <i id="previousbutton" class="icon-fast-backward icon-white interactions"></i>
        <i id="playbutton" class="icon-play icon-white interactions"></i>
        <i id="pausebutton" class="icon-pause icon-white interactions"></i>
        <i id="nextbutton" class="icon-fast-forward icon-white interactions"></i>
        <input type="range" step="0.1" min="0" max="10" id="seekbar"></input>
    </div>
</div>

<!-- Hidden Menu -->
<div id="menu" style="display: none;">
<ul class="nav nav-list">
	<li class="nav-header">List header</li>
	<li class="active"><a href="#"><i class="icon-white icon-home"></i> Home</a></li>
	<li><a href="#"><i class="icon-book"></i> Library</a></li>
	<li><a href="#"><i class="icon-pencil"></i> Applications</a></li>
	<li class="nav-header">Another list header</li>
	<li><a href="#"><i class="icon-user"></i> Profile</a></li>
	<li><a href="#"><i class="icon-cog"></i> Settings</a></li>
	<li class="divider"></li>
	<li><a href="#"><i class="icon-flag"></i> Help</a></li>
</ul>
</div>

<?php require 'inc/footer.php'; ?>
