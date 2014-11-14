<?php

require_once 'class.function.php';
require_once 'class.jdate.php'; 


//$db_host = "localhost"; //Host address (most likely localhost)
//$db_name = "amlakg_db"; //Name of Database
//$db_user = "amlakg_user"; //Name of database user
//$db_pass = "T*#TGbjt#FGVHJF#VUV7rfY#R&F&#fvkjht3g56"; //Password for database user 

$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "realcon"; //Name of Database 
$db_user = "root"; //Name of database user
$db_pass = ""; //Password for database user


/* Create a new mysqli object with database connection parameters */
$mysqliu = new mysqli($db_host, $db_user, $db_pass, $db_name);
$mysqliu->set_charset('utf8');
GLOBAL $mysqliu;


if (mysqli_connect_errno()) {
    echo "Connection Failed: " . mysqli_connect_errno();
    exit();
}

/**
 * Database Classroom
 *
 * @author ataalla
 */
class DB {

    private static function _getConnection() {
        global $mysqliu;
        return $mysqliu;
    }

    public static function SearchForProperty($type, $for, $bedsstart, $bedsend, $bathstart, $bedsend) {
        $sql = DB::_getConnection();
        $stm = $sql->prepare("SELECT id FROM dbc_posts WHERE estate_condition = 'DBC_CONDITION_AVAILABLE' AND type = ? AND purpose = ? AND bedroom > ? AND bedroom < ? AND bath > ? AND bath < ? LIMIT 200");
        $stm->bind_param("ssiiii", $type, $for, $bedsstart, $bedsend, $bathstart, $bedsend);

        if ($stm->execute()) {
            $stm->bind_result($id);
            $results = array();
            while ($stm->fetch()) {
                $results[] = $id;
            }
            return $results;
        }

        return array();
    }

    public static function Property_GetByID($id) {
        $sql = DB::_getConnection();
        $stm = $sql->prepare("SELECT
             address,
            `id`,
            `unique_id`,
            `type`,
            `purpose`,
            `estate_condition`, 
            `home_size`,
            `lot_size`,
            `total_price`,
            `price_per_unit`,
            `rent_price`,
            `bedroom`,
            `bath`,
            `city`,
            `latitude`, 
            `longitude`,
            `featured_img`,
            `status` ,
            `rent_pricerahn`, 
            `adddate`,
            `private_phone`,
            `private_mobile`,
            `private_address` FROM `dbc_posts` WHERE id = ? LIMIT 1");
        $stm->bind_param("i", $id);

        if ($stm->execute()) {
            $stm->bind_result($address, $id, $uniqid, $type, $purpose, $estate_condition, $home_size, $lotsize, $totalprice, $priceperunit, $rent_price, $bedroom, $bath, $city, $latitude, $logitude, $featured_img, $status, $rent_pricerahn, $adddate, $private_phone, $private_mobile, $private_address);
            if ($stm->fetch()) {
                $item = new stdClass();
                $item->ID = $id;
                $item->UniqID = $uniqid;
                $item->Type = $type;
                $item->Purpose = $purpose;
                $item->EstateCondition = $estate_condition;
                $item->HomeSize = $home_size;
                $item->LotSize = $lotsize;
                $item->TotalPrice = $totalprice;
                $item->PricePerUnit = $priceperunit;
                $item->RentPrice = $rent_price;
                $item->Bedroom = $bedroom;
                $item->Bath = $bath;
                $item->City = $city;
                $item->Latitude = $latitude;
                $item->Logitude = $logitude;
                $item->FeatureImage = $featured_img;
                $item->Status = $status;
                $item->RentPriceRahn = $rent_pricerahn;
                $item->AddDate = $adddate;
                $item->PrivatePhone = $private_phone;
                $item->PrivateMobile = $private_mobile;
                $item->PrivateAddress = $private_address;
                $item->Address = $address;
                return $item;
            }
        }


        return null;
    }

    public static function FetchAll($includesold) {

        $sql = DB::_getConnection();
        if ($includesold) {
            $stm = $sql->prepare("SELECT id FROM dbc_posts");
        } else {
            $stm = $sql->prepare("SELECT id FROM dbc_posts WHERE estate_condition = 'DBC_CONDITION_AVAILABLE'");
        }

        if ($stm->execute()) {
            $stm->bind_result($id);
            $results = array();
            while ($stm->fetch()) {
                $results[] = $id;
            }
            return $results;
        }

        return array();
    }

    public static function Password_Get($username) {
        $sql = DB::_getConnection();
        $stm = $sql->prepare("SELECT password FROM dbc_users WHERE user_name = ? LIMIT 1");
        $stm->bind_param("s", $username);

        if ($stm->execute()) {
            $stm->bind_result($password);
            if ($stm->fetch()) {
                return $password;
            }
        }

        return null;
    }

}
