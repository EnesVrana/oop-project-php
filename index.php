<?php
//session_start();
require 'bootstrap.php';

require 'layout/header.php'; ?>

    <div class="jumbotron">
        <div class="container">
            <h1><?php
//                dd($_SESSION['role']);
                if (isset($_SESSION['role'])) {
                    if (($_SESSION['role'] != null && $_SESSION['role'] != "")) { //not null or empty
                        echo 'Welcome ' . $_SESSION['role'];
                    }
                }
                else {
                        echo 'Welcome stranger,<br>would you like to <a href="Login.php">Login</a>?';
                    }
//                dd($_SESSION['role']);
                ?></h1>


        </div>
        <hr>

<?php require 'layout/footer.php'; ?>
