<?php
require_once 'vendor/autoload.php';
require_once __DIR__.'/lib/Model/User.php';
require_once __DIR__.'/lib/Model/credential.php';
require_once __DIR__.'/lib/Service/UserManager.php';


$configuration = array(
    'db_dsn' => 'mysql:host=localhost;dbname=welcome',
    'db_user' => 'root',
    'db_pass' => '',
);


