<?php

namespace App\Helper;


class Validate 
{
    public static function validateEmail($email)
    {
        return  preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email);
    }
     
    public static function validatePhone($phone)
    {
        return ($phone[0] == '5' && strlen($phone) == 9 && preg_match("/^[0-9]*$/i", $phone));
    }

    public static function validateId($user_id)
    {
        return (strlen($user_id) == 11 && preg_match("/^[0-9]*$/i", $user_id));
    }

    public static function validateAge($birthDate)
    {
        $birthDate = explode("/", $birthDate);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));
        //return ($birthDate);
        return ($age > 18 || $age == 18);
    }
}