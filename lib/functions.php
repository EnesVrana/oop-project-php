<?php
require 'vendor/autoload.php';
require_once 'credential.php';
require_once 'user.php';


function save_user($userToSave)
{

    $conn = require 'config.php';
    $query = "INSERT INTO user (firstName, lastName, birthday, gender, emailAddress, password, role)  VALUES (
                    '".$userToSave->getFirstName()."',
                    '".$userToSave->getLastName()."',
                    '".$userToSave->getBirthday()."',
                    '".$userToSave->getGender()."',
                    '".$userToSave->getEmailAddress()."',
                    '".$userToSave->getPassword()."',
                    '".$userToSave->getRole()."'
                    )";

    $query_run = mysqli_query($conn,$query);
    if ($query_run){
        $_SESSION['role']=$userToSave->getRole();

        header('Location: /Logout.php');
        die;
    }
    else{
        $_SESSION['display']='UNSUCCESSUL! Please fill in the form currectly!';

        header('Location: Register.php');
    }
}

function checkUserExist($loginUser){
    $conn = require 'config.php';

    $query = "SELECT role,id,firstName,lastName FROM user Where emailAddress = '".$loginUser->getEmailAddress()."' AND password = '".$loginUser->getPassword()."'" ;
    $query_run = mysqli_query($conn, $query);


    $rolearr = mysqli_fetch_assoc($query_run);

    if (isset($rolearr)){
        $_SESSION['role'] = $rolearr['role'];
        $_SESSION['id'] = $rolearr['id'];
        $_SESSION['firstName'] = $rolearr['firstName'];
        $_SESSION['lastName'] = $rolearr['lastName'];

        header('Location: Index.php');
        die;

    }
    else{
        unset($_SESSION['role']);
        $_SESSION['loginDisplay'] = 'You do not have an account. Try again or register.';
    }
}
function get_messages(){
    $messagesJson = file_get_contents('data/chat.json');
    $messages = json_decode($messagesJson,true);
    return $messages;
}
function save_messages($messagesToSave)
{
    $json = json_encode($messagesToSave, JSON_PRETTY_PRINT);
    file_put_contents('data/chat.json', $json);
}


