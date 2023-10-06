<?php
require_once 'bootstrap.php';

class Validator
{

    function isValidDate($date, $format = 'Y-m-d') {
        $dateTime = DateTime::createFromFormat($format, $date);
        return $dateTime && $dateTime->format($format) === $date;
    }

    public function validate(User $userToRegister)
    {
        $isThereErr = new User();

        if (!ctype_alpha($userToRegister->getFirstName())){
            $isThereErr->setFirstName('yes');
        }
        if (!ctype_alpha($userToRegister->getLastName())){
            $isThereErr->setLastName('yes');
        }




        if ($this->isValidDate($userToRegister->getBirthday())) {
//            dd($userToRegister->getBirthday());
            $date1 = "2023-10-06";
            $date2 = "1900-01-01";
//            dd($date1,$date2,$userToRegister->getBirthday());
            if ($userToRegister->getBirthday() >$date1 || $userToRegister->getBirthday() < $date2) {
                $isThereErr->setBirthday('yes');
            }
        }

        if (!filter_var($userToRegister->getEmailAddress(), FILTER_VALIDATE_EMAIL)) {
            $isThereErr->setEmailAddress('yes');

        }


        $uppercase = preg_match('@[A-Z]@', $userToRegister->getPassword());
        $lowercase = preg_match('@[a-z]@', $userToRegister->getPassword());
        $number    = preg_match('@[0-9]@', $userToRegister->getPassword());
        $specialChars = preg_match('@[^\w]@', $userToRegister->getPassword());

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($userToRegister->getPassword()) < 8) {

            $atleast = 0;

            if (strlen($userToRegister->getPassword()) < 8) {
                if (!isset($passErr)) {
                    $passErr = "Password should include";
                }
                $passErr .= " at least 8 characters";
                $atleast += $atleast;
            }
            if (!$uppercase) {
                if (!isset($passErr)) {
                    $passErr = "Password should include";
                }
                if ($atleast > 0) {
                    $passErr .= ", one upper case letter";
                } elseif ($atleast == 0) {
                    $passErr .= " at least one upper case letter";
                    $atleast = $atleast + 1;
                }
            }
            if (!$lowercase) {
                if (!isset($passErr)) {
                    $passErr = "Password should include";
                }
                if ($atleast > 0) {
                    $passErr .= ", one lower case letter";
                } elseif ($atleast == 0) {
                    $passErr .= " at least one lower case letter";
                    $atleast = $atleast + 1;
                }
            }
            if (!$number) {
                if (!isset($passErr)) {
                    $passErr = "Password should include";
                }
                if ($atleast > 0) {
                    $passErr .= ", one number";
                } elseif ($atleast == 0) {
                    $passErr .= " at least one number";
                    $atleast = $atleast + 1;
                }
            }
            if (!$specialChars) {
                if (!isset($passErr)) {
                    $passErr = "Password should include";
                }
                if ($atleast > 0) {
                    $passErr .= ", and one special character";
                } elseif ($atleast == 0) {
                    $passErr .= " at least one special character";
                    $atleast = $atleast + 1;
                }
            }
            $passErr .= ".";
            $isThereErr->setPassword($passErr);

        }

        if ($isThereErr->getFirstName() == null && $isThereErr->getLastName() == null && $isThereErr->getBirthday() == null && $isThereErr->getEmailAddress() == null &&
            $isThereErr->getPassword() == null){
            $isThereErr = true;
        }
        return $isThereErr;

    }
}