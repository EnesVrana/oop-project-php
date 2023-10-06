<?php
require 'layout/header.php';
require 'bootstrap.php';

$userManager = new UserManager();
$validator = new Validator();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $newUser = new User();
    $newUser->setFirstName("$_POST[firstName]");
    $newUser->setLastName("$_POST[lastName]");
    $newUser->setBirthday("$_POST[birthday]");
    $newUser->setGender("$_POST[gender]");
    $newUser->setEmailAddress("$_POST[emailAddress]");
    $newUser->setPassword("$_POST[password]");
    $newUser->setRole("$_POST[role]");

    $validationErr = $validator->validate($newUser);

    if ($validationErr === true){
        $emailExists = $userManager->save_user($newUser);
         $validationErr = new User();
    }
}
if (!isset($validationErr)){
    $validationErr = new User;
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
                                            <?php
                                            if (!empty($validationErr->getFirstName())){ ?>
                                                <label class="form-label" for="firstName" style="color: red">Invalid Fisrt Name! It must include only letters.</label><br>
                                            <?php } ?>
                                            <label class="form-label" for="firstName">First Name</label>
                                            <input type="text" id="firstName" name="firstName" class="form-control form-control-lg" />
                                        </div>
                                        <br>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <?php
                                            if (!empty($validationErr->getLastName())){ ?>
                                                <label class="form-label" for="firstName" style="color: red">Invalid Last Name! It must include only letters.</label><br>
                                            <?php } ?>                                            <label class="form-label" for="lastName">Last Name</label>
                                            <input type="text" id="lastName" name="lastName" class="form-control form-control-lg" />
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <?php
                                            if (!empty($validationErr->getBirthday())){ ?>
                                                <label class="form-label" for="firstName" style="color: red">Invalid Birthday! We don't Allow ghosts or unborn babies here.</label><br>
                                            <?php } ?>                                            <label for="birthday" class="form-label">Birthday</label>
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
                                            <?php
                                            if (!empty($validationErr->getEmailAddress())){ ?>
                                                <label class="form-label" for="firstName" style="color: red">Invalid email address!</label><br>
                                            <?php } ?>
                                            <?php
                                            if (isset($emailExists)){ ?>
                                                <label class="form-label" for="firstName" style="color: red"><?php echo $emailExists ?></label><br>
                                            <?php } ?>
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <input type="email" id="emailAddress" name="emailAddress" class="form-control form-control-lg" />
                                        </div>
                                        <br>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <?php
                                            if (!empty($validationErr->getPassword())){ ?>
                                                <label class="form-label" for="firstName" style="color: red"><?php echo $validationErr->getPassword() ?></label><br>
                                            <?php } ?>                                                <label class="form-label" for="password">Password</label>
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

