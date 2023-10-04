<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

    <title>welcome.com</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Welcome</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/contact.php">Contact</a></li>

                </ul>

                <div class="navbar-form navbar-right">
                    <?php
                    if (isset($_SESSION['role'])) {
                        if ($_SESSION['role'] != null && $_SESSION['role'] != "") {
                            echo '<a type="button" class="btn btn-success" href="/Logout.php">Log out</a>';
                        }
                    }
                    else{
                        echo '<a type="button" class="btn btn-success" href="/Login.php">Log in</a>';
                    }
                    if (!isset($_SESSION['role'])) {
//                        if ($_SESSION['role'] != "user" && $_SESSION != "admin") {
                            echo '<a type="button" class="btn btn-success" href="/Register.php">Register</a>';
//                        }
                    }

                    ?>


                </div>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>