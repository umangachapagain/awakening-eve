<!DOCTYPE html>
<html lang="en">
<?php
	include_once 'dbconnect.php';
	if(isset($_SESSION['user'])!=""){
	$uname=$_SESSION['user'];
	}
	else
	$uname=NULL;
?>
<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title><?php if(isset($title))echo $title ?> -Awakening Eve</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
  <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
  <link href="./css/animate.css" rel="stylesheet">
  <link href="./css/jssocials.css" rel="stylesheet">
  <link href="./css/jssocials-theme-flat.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"/>
  <link href="./css/main.css" rel="stylesheet">
  
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Awakening Eve<i class="fa fa-eye fa-3x animated zoomIn" aria-hidden="true" style="float:left; margin:-20px 10px 0 0;"></i>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="main-nav">

        <ul class="nav navbar-nav navbar-right">
          <li class="<?= ($activePage == 'articles') ? 'active':''; ?>"><a href="articles.php">Articles</a></li>
          <li class="<?= ($activePage == 'events') ? 'active':''; ?>"><a href="events.php">Events</a></li>
          <li class="<?= ($activePage == 'gallery') ? 'active':''; ?>"><a href="gallery.php">Gallery</a></li>
          <li class="<?= ($activePage == 'about') ? 'active':''; ?>"><a href="about.php">About Us</a></li>
          <?php if(isset($uname))
			{
			  include 'modules/user_pill.php';
			}
			  else{ ?>
 <li class="<?= ($activePage == 'logPage') ? 'active':''; ?>"><a href="logPage.php" >Log In/Sign Up</a></li>
				 <?php }
			?>
        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  
