<?php require 'inc/auth.php'; ?>

<?php require 'inc/header.php'; ?>
<div id="content">
	<div class="container">
		<div id="wrap">

            <h1>Choose (multiple) files or drag them onto drop zone below</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" id="fileField" name="fileField" multiple webkitdirectory/>
            </form>

            <div id="fileDrop">
                <p>Drop files here</p>
            </div>

            <div id="files">
                <h2>File list</h2>
                <a id="reset" href="#" title="Remove all files from list">Clear list</a>
                <ul id="fileList"></ul>
                <a id="upload" href="#" title="Upload all files in list">Upload files</a>
            </div>
        </div>
    <script src="js/upload.js"></script>
	</div><!-- container -->
</div>
<?php require 'inc/footer.php'; ?>
