<?php
require 'layout/header.php';
require 'lib/functions.php';
require 'vendor/autoload.php';
require_once 'lib/Model/user.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['firstName'])){
        $firstName = $_POST['firstName'];
    }
    else{
        $firstName = '';
    }
    if (isset($_POST['lastName'])){
        $lastName = $_POST['lastName'];
    }
    else{
        $lastName = '';
    }
    if (isset($_POST['birthday'])){
        $birthday = $_POST['birthday'];
    }
    else{
        $birthday = '';
    }
    if (isset($_POST['gender'])){
        $gender = $_POST['gender'];
    }
    else{
        $gender = '';
    }
    if (isset($_POST['emailAddress'])){
        $emailAddress = $_POST['emailAddress'];
    }
    else{
        $emailAddress = '';
    }
    if (isset($_POST['password'])){
        $password = $_POST['password'];
    }
    else{
        $password = '';
    }
    if (isset($_POST['role'])){
        $role = $_POST['role'];
    }
    else{
        $role = '';
    }

    $newUser = new User();
    $newUser->setFirstName($firstName);
    $newUser->setLastName($lastName);
    $newUser->setBirthday($birthday);
    $newUser->setGender($gender);
    $newUser->setEmailAddress($emailAddress);
    $newUser->setPassword($password);
    $newUser->setRole($role);

    save_user($newUser);

}

?>

<div class="div">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form action="/Register.php" method="POST">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="firstName">First Name</label>
                                            <input type="text" id="firstName" name="firstName" class="form-control form-control-lg" />
                                        </div>
                                        <br>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">Last Name</label>
                                            <input type="text" id="lastName" name="lastName" class="form-control form-control-lg" />
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <input type="date" name="birthday" class="form-control form-control-lg" id="birthday" />
                                        </div>


                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <h3 class="mb-2 pb-1">Gender: </h3>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                                   value="Female" checked />

                                            <label class="form-check-label" for="maleGender">Male</label>
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                                   value="Male" />
                                        </div>
                                        <br>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <input type="email" id="emailAddress" name="emailAddress" class="form-control form-control-lg" />
                                        </div>
                                        <br>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                                <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">

                                    <h3 class="mb-2 pb-1">Role: </h3>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="femaleGender">User</label>
                                        <input class="form-check-input" type="radio" name="role" id="femaleGender"
                                               value="user" checked />

                                        <label class="form-check-label" for="maleGender">Admin</label>
                                        <input class="form-check-input" type="radio" name="role" id="maleGender"
                                               value="admin" />
                                    </div>
                                    <br>

                                </div>

                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                </div>
                                <br>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php require 'layout/footer.php'; ?>

