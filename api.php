<?php

require_once 'core/class.db.php';
require_once 'core/class.user.php';
$errors = array();
 
/**
 *  This function generate result respose , if the was a problem in procces  , we send back the status code to zero , this method will die after end iof the function
 * @param type $result the string ( may be json) of output
 * @param type $statuscode (-1: tokan not valid, 0 : unsuccess , 1 : success )
 * @param type $statustext (if status code is zero , return the message containing the error message)
 */
function generateMobileResponse($result, $statuscode = 1, $statustext = "") {

    $item = new stdClass();
    $item->result = $result;
    $item->statuscode = $statuscode;

    if (is_array($statustext)) {

        $item->statustext = trim(implode("\n", $statustext));
    } else {
        $item->statustext = $statustext;
    }


    echo json_encode($item);
    die();
}

// check for username and password
$username = $_POST["username"];
$password = $_POST["password"];
$loginResult = UserManager::Login($errors, $username, $password);
if (!$loginResult) {
    $errors[] = "خطا در ورود به سامانه";
    generateMobileResponse(null, 0, $errors);
}


// check if the user want to check for the version
if (isset($_POST["request"]) && $_POST["request"] == "search") {

    $type = $_POST["type"];
    $for = $_POST["for"];
    $bedsstart = $_POST["bedsstart"];
    $bedsend = $_POST["bedsend"];
    $bathstart = $_POST["bathstart"];
    $bedsend = $_POST["bedsend"];

    $results = UserManager::Search($errors, $type, $for, $bedsstart, $bedsend, $bathstart, $bedsend);

    // send request
    if (count($errors) > 0) {
        // Not Success 
        generateMobileResponse(null, 0, $errors);
    } else {
        // Success
        generateMobileResponse(json_encode($results));
    }
}


// fetch all
if (isset($_POST["request"]) && $_POST["request"] == "fetchall") {

    $includesold = $_POST["includesold"];

    $results = UserManager::FetchAll($includesold);

    // send request
    if (count($errors) > 0) {
        // Not Success 
        generateMobileResponse(null, 0, $errors);
    } else {
        // Success
        generateMobileResponse(json_encode($results));
    }
}