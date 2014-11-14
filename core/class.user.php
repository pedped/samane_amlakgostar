<?php

require_once 'class.config.php';
  
class UserManager {

    public static function Search($errors, $type, $for, $bedsstart, $bedsend, $bathstart, $bedsend) {

        $items = DB::SearchForProperty($type, $for, $bedsstart, $bedsend, $bathstart, $bedsend);
        $results = array();
        foreach ($items as $id) {

            $item = DB::Property_GetByID($id);
            if (isset($item)) {
                $results[] = $item;
            }
        }

        return $results;
    }

    public static function FetchAll($includesold) {

        $items = DB::FetchAll($includesold);
        $results = array();
        foreach ($items as $id) {

            $item = DB::Property_GetByID($id);
            if (isset($item)) {
                $results[] = $item;
            }
        }

        return $results;
    }

    public static function Login(&$errors, $username, $password) {
        $hashedPage = sha1($password);
        $dbPassword = DB::Password_Get($username);
        if ($dbPassword == $hashedPage) {
            return true;
        }

        return false;
    }

}
