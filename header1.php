<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("connect.php");
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A Survey Application</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

</head>

<body>
    <?php
    $script = basename($_SERVER['PHP_SELF']);
    if(($script == "index.php")||($script == "contact.php")||($script == "about.php")){ ?>
    <div class="brand">USurvey</div>
       <?php }
       else if(($script != "login.php")&&($script != "register.php")){
        if(!isset($_SESSION['username'])){
            header("Location: index.php");
        }   
       }
       else if(($script == "login.php")&&($script == "register.php")){
        if(isset($_SESSION['username'])){
            header("Location: index.php");
        }   
       }
       ?>   
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">USurvey</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li id="index" class="active">
                    <a href="index.php">Home</a>
                </li>
                <li id="surveyers">
                    <a href="surveyers.php">Top Surveyers</a>
                </li>
                <?php
                if(isset($_SESSION['username'])){?>
                <li class="dropdown" id="results"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Results<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="mysurveys.php">My Surveys</a></li>
                      <li><a href="analyse.php">Analyse</a></li>
                    </ul>
                </li>
                <?php
                }
                ?>
                <li id="about">
                    <a href="about.php">Contact</a>
                </li>
                <?php
                if(isset($_SESSION['username'])){?>
                <li>
                    <a href="logout.php">Logout</a>
                </li><?php
                }
                else{
                ?>
                <li  id="login">
                    <a href="login.php">Login</a>
                </li>
                <li id="register">
                    <a href="register.php">Signup</a>
                </li>
                <?php 
            }?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
