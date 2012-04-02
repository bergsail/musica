<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Musica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/libs/bootstrap.css" rel="stylesheet">
    <link href="css/libs/bootstrap-responsive.css" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">
    
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
       	padding-bottom: 40px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
<!--     <link href="css/main.css" rel="stylesheet"> -->
<!--     <link href="css/libs/responsive.css" rel="stylesheet"> -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <script src="js/libs/bootstrap/jquery.js"></script>

  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div id="title">
          <a class="brand" href="#">Musica</a>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active">
                  <a class="links" href="index.php"><i class="icon-list icon-white"></i> List</a>
              </li>
              <li><a class="links" href="#"><i class="icon-book icon-white"></i> Albums</a></li>
              <li class="divider-vertical"></li>
              <li><a class="links" href="upload.php"><i class="icon-share-alt icon-white"></i> Upload</a></li>
            </ul>
            <ul class="nav pull-right">
                <li class="dropdown" id="menu1">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                    <i class="icon-user icon-white"></i> <?php echo $_SESSION['user'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="account.php">Account</a></li>
                        <li><a href="#">All Songs</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>