<?php session_start();
require 'vendor/autoload.php';
setcookie(session_name(),'',0,'/');
header('Location: /Login.php');
