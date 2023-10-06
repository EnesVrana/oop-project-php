<?php

require 'layout/header.php';
require 'bootstrap.php';

//require 'vendor/autoload.php';
//require 'lib/functions.php';
//require_once 'lib/Model/credential.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['emailAddress'])) {
        $emailAddress = $_POST['emailAddress'];
    } else {
        $emailAddress = '';
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $password = '';
    }


    $loginUser = new Credential();
    $loginUser->setEmailAddress($emailAddress);
    $loginUser->setPassword($password);
    $userManager = new UserManager();
    $userManager->checkUserExist($loginUser);

}

?>

<div class="div">
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                         class="img-fluid" alt="Sample image">
                </div>
                <?php

                if (isset($_SESSION['loginDisplay'])){
                    if ($_SESSION['loginDisplay'] != null && $_SESSION['loginDisplay'] != ''){ ?>
                    <h2>
                        <?php echo $_SESSION['loginDisplay']; ?>
                    </h2>
                <?php
                    }
                }
                ?>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="Login.php" method="POST">

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email address</label>
                            <input type="email" id="form3Example3" name="emailAddress" class="form-control form-control-lg"
                                   placeholder="Enter a valid email address" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Password</label>
                            <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
                                   placeholder="Enter password" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <br>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <?php unset($_SESSION['loginDisplay']); ?>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/Register.php" class="link-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>
</div>


<?php require 'layout/footer.php'; ?>

