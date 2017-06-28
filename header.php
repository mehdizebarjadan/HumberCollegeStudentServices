<?php
//get file path constants
require 'config.php';
$constant = new config();
?>
<!DOCTYPE html>
<!-- /*BY PHILIP JAMES DE VRIES */> -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>%TITLE%</title>
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <link   href="style.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <div id="wrap">
        <div class="container">
        <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="index.php"><img class="nav-logo img-responsive" src="<?php echo config::IMGCONSTANT; ?>logo-med.png" alt=""></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="news.php">News</a></li>
        <li><a href="#">Events</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Classifieds <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="classifieds.php">View Classifieds</a></li>
            <li><a href="classifiedPost.php">Post an Ad</a></li>
          </ul>
        </li>
        <li><a href="#">Reviews</a></li>
        <li><a href="#">Forum</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>