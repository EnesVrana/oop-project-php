<?php
require_once 'bootstrap.php';
class UserManager
{

    public function save_user($userToSave)
    {
        $configuration = require 'bootstrap.php';
        $container = new Container($configuration);
        $pdo = $container->getPDO();

        if ($this->checkEmailAddressExist($userToSave->getEmailAddress())){
            return "Email address already in use.<br> Please Login or register with another email address.";
        }


        $pdo->exec("INSERT INTO user (firstName, lastName, birthday, gender, emailAddress, password, role)  VALUES (
                    '" . $userToSave->getFirstName() . "',
                    '" . $userToSave->getLastName() . "',
                    '" . $userToSave->getBirthday() . "',
                    '" . $userToSave->getGender() . "',
                    '" . $userToSave->getEmailAddress() . "',
                    '" . $userToSave->getPassword() . "',
                    '" . $userToSave->getRole() . "'
                    )");



        if ($pdo) {
            $_SESSION['role'] = $userToSave->getRole();

            header('Location: /Logout.php');
            die;
        } else {
            $_SESSION['display'] = 'UNSUCCESSUL! Please fill in the form currectly!';

            header('Location: Register.php');
        }
    }


    public function checkEmailAddressExist($checkEmailAddress)
    {
        $configuration = require 'bootstrap.php';

        $container = new Container($configuration);
        $pdo = $container->getPDO();

        $query = "SELECT emailAddress FROM user Where emailAddress = '" . $checkEmailAddress . "'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $emailExist = $stmt->fetch();

        if ($emailExist == null) {
            return false;

        } else {
        return true;
        }
    }


    public function checkUserExist($loginUser)
    {
        $configuration = require 'bootstrap.php';

        $container = new Container($configuration);
        $pdo = $container->getPDO();

        $query = "SELECT role,id,firstName,lastName FROM user Where emailAddress = '" . $loginUser->getEmailAddress() . "' AND password = '" . $loginUser->getPassword() . "'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $loggedInUserInfo = $stmt->fetch();

        if (isset($loggedInUserInfo)) {
            $_SESSION['role'] = $loggedInUserInfo['role'];
            $_SESSION['id'] = $loggedInUserInfo['id'];
            $_SESSION['firstName'] = $loggedInUserInfo['firstName'];
            $_SESSION['lastName'] = $loggedInUserInfo['lastName'];

            header('Location: Index.php');
            die;

        } else {
            unset($_SESSION['role']);
            $_SESSION['loginDisplay'] = 'You do not have an account. Try again or register.';
        }
    }

    function get_messages()
    {
        $messagesJson = file_get_contents('data/chat.json');
        $messages = json_decode($messagesJson, true);
        return $messages;
    }

    function save_messages($messagesToSave)
    {
        $json = json_encode($messagesToSave, JSON_PRETTY_PRINT);
        file_put_contents('data/chat.json', $json);
    }
}