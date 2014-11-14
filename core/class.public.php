<?php

require_once 'class.config.php';
 
class PublicFunction {

    public static function LoginWithMobile(&$errors, $username, $password, $deviceid) {
        // check if user exist first
        $result = self::validateUserLogin($username, $password);
        if ($result == true) {
            // success login, we have to create new session in database
            $randomToken = self::generateRandomString(Config::getUserTokenLength());

            // store the key in database
            $userid = self::getUserIDFromUserName($username);
            if (DB::MobileToken_Insert($userid, $randomToken, $deviceid)) {
                // we have successfully inserted new token in database, send back the token to database
                return $randomToken;
            } else {
                // unable to create token`
                $errors[] = "خطا در ایجاد کد ورود";
                return false;
            }
        } else {
            $errors[] = "نام کاربری یا رمز عبور شما معتبر نمباشد";
            return false;
        }
    }

    public static function validateUserLogin($username, $password) {

        // load the user pass
        $hashedpass = DB::User_GetPassword($username);

        if (!isset($hashedpass)) {
            // user is not exist
            return false;
        }

        // check for password
        if ($hashedpass == md5($password)) {
            // valid request
            return true;
        } else {
            // invalid password
            return false;
        }
    }

    public static function generateRandomString($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function getUserIDFromUserName($username) {
        return DB::User_GetUserID($username);
    }

    public static function loadStatesForMobile() {
        return DB::GetStatesForMobile();
    }

    public static function loadCitiesForMobile($stateid) {
        return DB::Cities_LoadFromState($stateid);
    }

}
