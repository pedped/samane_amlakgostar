<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Jalali (Shamsi) DateTime Class. Supports years higher than 2038.
 *
 * Copyright (c) 2012 Sallar Kaboli <sallar.kaboli@gmail.com>
 * http://sallar.me
 *
 * The MIT License (MIT)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * 1- The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 * 
 * 2- THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 * Original Jalali to Gregorian (and vice versa) convertor:
 * Copyright (C) 2000  Roozbeh Pournader and Mohammad Toossi
 *
 * List of supported timezones can be found here:
 * http://www.php.net/manual/en/timezones.php
 *
 *
 * @package    jDateTime
 * @author     Sallar Kaboli <sallar.kaboli@gmail.com>
 * @author     Omid Pilevar <omid.pixel@gmail.com>
 * @copyright  2003-2012 Sallar Kaboli
 * @license    http://opensource.org/licenses/mit-license.php The MIT License
 * @link       https://github.com/sallar/jDateTime
 * @see        DateTime
 * @version    2.2.0
 */
class jDateTime {

    /**
     * Defaults
     */
    private static $jalali = true; //Use Jalali Date, If set to false, falls back to gregorian
    private static $convert = true; //Convert numbers to Farsi characters in utf-8
    private static $timezone = null; //Timezone String e.g Asia/Tehran, Defaults to Server Timezone Settings
    private static $temp = array();

    /**
     * jDateTime::Constructor
     *
     * Pass these parameteres when creating a new instance
     * of this Class, and they will be used as defaults.
     * e.g $obj = new jDateTime(false, true, 'Asia/Tehran');
     * To use system defaults pass null for each one or just
     * create the object without any parameters.
     *
     * @author Sallar Kaboli
     * @param $convert bool Converts numbers to Farsi
     * @param $jalali bool Converts date to Jalali
     * @param $timezone string Timezone string
     */
    public function __construct($convert = null, $jalali = null, $timezone = null) {
        if ($jalali !== null)
            self::$jalali = (bool) $jalali;
        if ($convert !== null)
            self::$convert = (bool) $convert;
        if ($timezone !== null)
            self::$timezone = $timezone;
    }

    /**
     * jDateTime::Date
     *
     * Formats and returns given timestamp just like php's
     * built in date() function.
     * e.g:
     * $obj->date("Y-m-d H:i", time());
     * $obj->date("Y-m-d", time(), false, false, 'America/New_York');
     *
     * @author Sallar Kaboli
     * @param $format string Acceps format string based on: php.net/date
     * @param $stamp int Unix Timestamp (Epoch Time)
     * @param $convert bool (Optional) forces convert action. pass null to use system default
     * @param $jalali bool (Optional) forces jalali conversion. pass null to use system default
     * @param $timezone string (Optional) forces a different timezone. pass null to use system default
     * @return string Formatted input
     */
    public static function date($format, $stamp = false, $convert = null, $jalali = null, $timezone = null) {
        //Timestamp + Timezone
        $stamp = ($stamp !== false) ? $stamp : time();
        $timezone = ($timezone != null) ? $timezone : ((self::$timezone != null) ? self::$timezone : date_default_timezone_get());
        $obj = new DateTime('@' . $stamp, new DateTimeZone($timezone));
        $obj->setTimezone(new DateTimeZone($timezone));

        if ((self::$jalali === false && $jalali === null) || $jalali === false) {
            return $obj->format($format);
        } else {

            //Find what to replace
            $chars = (preg_match_all('/([a-zA-Z]{1})/', $format, $chars)) ? $chars[0] : array();

            //Intact Keys
            $intact = array('B', 'h', 'H', 'g', 'G', 'i', 's', 'I', 'U', 'u', 'Z', 'O', 'P');
            $intact = self::filterArray($chars, $intact);
            $intactValues = array();

            foreach ($intact as $k => $v) {
                $intactValues[$k] = $obj->format($v);
            }
            //End Intact Keys
            //Changed Keys
            list($year, $month, $day) = array($obj->format('Y'), $obj->format('n'), $obj->format('j'));
            list($jyear, $jmonth, $jday) = self::toJalali($year, $month, $day);

            $keys = array('d', 'D', 'j', 'l', 'N', 'S', 'w', 'z', 'W', 'F', 'm', 'M', 'n', 't', 'L', 'o', 'Y', 'y', 'a', 'A', 'c', 'r', 'e', 'T');
            $keys = self::filterArray($chars, $keys, array('z'));
            $values = array();

            foreach ($keys as $k => $key) {

                $v = '';
                switch ($key) {
                    //Day
                    case 'd':
                        $v = sprintf('%02d', $jday);
                        break;
                    case 'D':
                        $v = self::getDayNames($obj->format('D'), true);
                        break;
                    case 'j':
                        $v = $jday;
                        break;
                    case 'l':
                        $v = self::getDayNames($obj->format('l'));
                        break;
                    case 'N':
                        $v = self::getDayNames($obj->format('l'), false, 1, true);
                        break;
                    case 'S':
                        $v = 'ام';
                        break;
                    case 'w':
                        $v = self::getDayNames($obj->format('l'), false, 1, true) - 1;
                        break;
                    case 'z':
                        if ($jmonth > 6) {
                            $v = 186 + (($jmonth - 6 - 1) * 30) + $jday;
                        } else {
                            $v = (($jmonth - 1) * 31) + $jday;
                        }
                        self::$temp['z'] = $v;
                        break;
                    //Week
                    case 'W':
                        $v = is_int(self::$temp['z'] / 7) ? (self::$temp['z'] / 7) : intval(self::$temp['z'] / 7 + 1);
                        break;
                    //Month
                    case 'F':
                        $v = self::getMonthNames($jmonth);
                        break;
                    case 'm':
                        $v = sprintf('%02d', $jmonth);
                        break;
                    case 'M':
                        $v = self::getMonthNames($jmonth, true);
                        break;
                    case 'n':
                        $v = $jmonth;
                        break;
                    case 't':
                        if ($jmonth >= 1 && $jmonth <= 6)
                            $v = 31;
                        else if ($jmonth >= 7 && $jmonth <= 11)
                            $v = 30;
                        else if ($jmonth == 12 && $jyear % 4 == 3)
                            $v = 30;
                        else if ($jmonth == 12 && $jyear % 4 != 3)
                            $v = 29;
                        break;
                    //Year
                    case 'L':
                        $tmpObj = new DateTime('@' . (time() - 31536000));
                        $v = $tmpObj->format('L');
                        break;
                    case 'o':
                    case 'Y':
                        $v = $jyear;
                        break;
                    case 'y':
                        $v = $jyear % 100;
                        break;
                    //Time
                    case 'a':
                        $v = ($obj->format('a') == 'am') ? 'ق.ظ' : 'ب.ظ';
                        break;
                    case 'A':
                        $v = ($obj->format('A') == 'AM') ? 'قبل از ظهر' : 'بعد از ظهر';
                        break;
                    //Full Dates
                    case 'c':
                        $v = $jyear . '-' . sprintf('%02d', $jmonth) . '-' . sprintf('%02d', $jday) . 'T';
                        $v .= $obj->format('H') . ':' . $obj->format('i') . ':' . $obj->format('s') . $obj->format('P');
                        break;
                    case 'r':
                        $v = self::getDayNames($obj->format('D'), true) . ', ' . sprintf('%02d', $jday) . ' ' . self::getMonthNames($jmonth, true);
                        $v .= ' ' . $jyear . ' ' . $obj->format('H') . ':' . $obj->format('i') . ':' . $obj->format('s') . ' ' . $obj->format('P');
                        break;
                    //Timezone
                    case 'e':
                        $v = $obj->format('e');
                        break;
                    case 'T':
                        $v = $obj->format('T');
                        break;
                }
                $values[$k] = $v;
            }
            //End Changed Keys
            //Merge
            $keys = array_merge($intact, $keys);
            $values = array_merge($intactValues, $values);

            //Return
            $ret = strtr($format, array_combine($keys, $values));
            return
                    ($convert === false ||
                    ($convert === null && self::$convert === false) ||
                    ( $jalali === false || $jalali === null && self::$jalali === false )) ? $ret : self::convertNumbers($ret);
        }
    }

    /**
     * jDateTime::gDate
     *
     * Same as jDateTime::Date method
     * but this one works as a helper and returns Gregorian Date
     * in case someone doesn't like to pass all those false arguments
     * to Date method.
     *
     * e.g. $obj->gDate("Y-m-d") //Outputs: 2011-05-05
     *      $obj->date("Y-m-d", false, false, false); //Outputs: 2011-05-05
     *      Both return the exact same result.
     *
     * @author Sallar Kaboli
     * @param $format string Acceps format string based on: php.net/date
     * @param $stamp int Unix Timestamp (Epoch Time)
     * @param $timezone string (Optional) forces a different timezone. pass null to use system default
     * @return string Formatted input
     */
    public static function gDate($format, $stamp = false, $timezone = null) {
        return self::date($format, $stamp, false, false, $timezone);
    }

    /**
     * jDateTime::Strftime
     *
     * Format a local time/date according to locale settings
     * built in strftime() function.
     * e.g:
     * $obj->strftime("%x %H", time());
     * $obj->strftime("%H", time(), false, false, 'America/New_York');
     *
     * @author Omid Pilevar
     * @param $format string Acceps format string based on: php.net/date
     * @param $stamp int Unix Timestamp (Epoch Time)
     * @param $convert bool (Optional) forces convert action. pass null to use system default
     * @param $jalali bool (Optional) forces jalali conversion. pass null to use system default
     * @param $timezone string (Optional) forces a different timezone. pass null to use system default
     * @return string Formatted input
     */
    public static function strftime($format, $stamp = false, $convert = null, $jalali = null, $timezone = null) {
        $str_format_code = array(
            '%a', '%A', '%d', '%e', '%j', '%u', '%w',
            '%U', '%V', '%W',
            '%b', '%B', '%h', '%m',
            '%C', '%g', '%G', '%y', '%Y',
            '%H', '%I', '%l', '%M', '%p', '%P', '%r', '%R', '%S', '%T', '%X', '%z', '%Z',
            '%c', '%D', '%F', '%s', '%x',
            '%n', '%t', '%%'
        );

        $date_format_code = array(
            'D', 'l', 'd', 'j', 'z', 'N', 'w',
            'W', 'W', 'W',
            'M', 'F', 'M', 'm',
            'y', 'y', 'y', 'y', 'Y',
            'H', 'h', 'g', 'i', 'A', 'a', 'h:i:s A', 'H:i', 's', 'H:i:s', 'h:i:s', 'H', 'H',
            'D j M H:i:s', 'd/m/y', 'Y-m-d', 'U', 'd/m/y',
            '\n', '\t', '%'
        );

        //Change Strftime format to Date format
        $format = str_replace($str_format_code, $date_format_code, $format);

        //Convert to date
        return self::date($format, $stamp, $convert, $jalali, $timezone);
    }

    /**
     * jDateTime::Mktime
     *
     * Creates a Unix Timestamp (Epoch Time) based on given parameters
     * works like php's built in mktime() function.
     * e.g:
     * $time = $obj->mktime(0,0,0,2,10,1368);
     * $obj->date("Y-m-d", $time); //Format and Display
     * $obj->date("Y-m-d", $time, false, false); //Display in Gregorian !
     *
     * You can force gregorian mktime if system default is jalali and you
     * need to create a timestamp based on gregorian date
     * $time2 = $obj->mktime(0,0,0,12,23,1989, false);
     *
     * @author Sallar Kaboli
     * @param $hour int Hour based on 24 hour system
     * @param $minute int Minutes
     * @param $second int Seconds
     * @param $month int Month Number
     * @param $day int Day Number
     * @param $year int Four-digit Year number eg. 1390
     * @param $jalali bool (Optional) pass false if you want to input gregorian time
     * @param $timezone string (Optional) acceps an optional timezone if you want one
     * @return int Unix Timestamp (Epoch Time)
     */
    public static function mktime($hour, $minute, $second, $month, $day, $year, $jalali = null, $timezone = null) {
        //Defaults
        $month = (intval($month) == 0) ? self::date('m') : $month;
        $day = (intval($day) == 0) ? self::date('d') : $day;
        $year = (intval($year) == 0) ? self::date('Y') : $year;

        //Convert to Gregorian if necessary
        if ($jalali === true || ($jalali === null && self::$jalali === true)) {
            list($year, $month, $day) = self::toGregorian($year, $month, $day);
        }

        //Create a new object and set the timezone if available
        $date = $year . '-' . sprintf('%02d', $month) . '-' . sprintf('%02d', $day) . ' ' . $hour . ':' . $minute . ':' . $second;

        if (self::$timezone != null || $timezone != null) {
            $obj = new DateTime($date, new DateTimeZone(($timezone != null) ? $timezone : self::$timezone));
        } else {
            $obj = new DateTime($date);
        }

        //Return
        return $obj->format('U');
    }

    /**
     * jDateTime::Checkdate
     *
     * Checks the validity of the date formed by the arguments.
     * A date is considered valid if each parameter is properly defined.
     * works like php's built in checkdate() function.
     * Leap years are taken into consideration.
     * e.g:
     * $obj->checkdate(10, 21, 1390); // Return true
     * $obj->checkdate(9, 31, 1390);  // Return false
     *
     * You can force gregorian checkdate if system default is jalali and you
     * need to check based on gregorian date
     * $check = $obj->checkdate(12, 31, 2011, false);
     *
     * @author Omid Pilevar
     * @param $month int The month is between 1 and 12 inclusive.
     * @param $day int The day is within the allowed number of days for the given month.
     * @param $year int The year is between 1 and 32767 inclusive.
     * @param $jalali bool (Optional) pass false if you want to input gregorian time
     * @return bool
     */
    public static function checkdate($month, $day, $year, $jalali = null) {
        //Defaults
        $month = (intval($month) == 0) ? self::date('n') : intval($month);
        $day = (intval($day) == 0) ? self::date('j') : intval($day);
        $year = (intval($year) == 0) ? self::date('Y') : intval($year);

        //Check if its jalali date
        if ($jalali === true || ($jalali === null && self::$jalali === true)) {
            $epoch = self::mktime(0, 0, 0, $month, $day, $year);

            if (self::date('Y-n-j', $epoch, false) == "$year-$month-$day") {
                $ret = true;
            } else {
                $ret = false;
            }
        } else { //Gregorian Date
            $ret = checkdate($month, $day, $year);
        }

        //Return
        return $ret;
    }

    /**
     * System Helpers below
     * ------------------------------------------------------
     */

    /**
     * Filters out an array
     */
    private static function filterArray($needle, $heystack, $always = array()) {
        return array_intersect(array_merge($needle, $always), $heystack);
    }

    /**
     * Returns correct names for week days
     */
    private static function getDayNames($day, $shorten = false, $len = 1, $numeric = false) {
        $days = array(
            'sat' => array(1, 'شنبه'),
            'sun' => array(2, 'یکشنبه'),
            'mon' => array(3, 'دوشنبه'),
            'tue' => array(4, 'سه شنبه'),
            'wed' => array(5, 'چهارشنبه'),
            'thu' => array(6, 'پنجشنبه'),
            'fri' => array(7, 'جمعه')
        );

        $day = substr(strtolower($day), 0, 3);
        $day = $days[$day];

        return ($numeric) ? $day[0] : (($shorten) ? self::substr($day[1], 0, $len) : $day[1]);
    }

    /**
     * Returns correct names for months
     */
    private static function getMonthNames($month, $shorten = false, $len = 3) {
        // Convert
        $months = array(
            'فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'
        );
        $ret = $months[$month - 1];

        // Return
        return ($shorten) ? self::substr($ret, 0, $len) : $ret;
    }

    /**
     * Converts latin numbers to farsi script
     */
    private static function convertNumbers($matches) {
        $farsi_array = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $english_array = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        return str_replace($english_array, $farsi_array, $matches);
    }

    /**
     * Division
     */
    private static function div($a, $b) {
        return (int) ($a / $b);
    }

    /**
     * Substring helper
     */
    private static function substr($str, $start, $len) {
        if (function_exists('mb_substr')) {
            return mb_substr($str, $start, $len, 'UTF-8');
        } else {
            return substr($str, $start, $len * 2);
        }
    }

    /**
     * Gregorian to Jalali Conversion
     * Copyright (C) 2000  Roozbeh Pournader and Mohammad Toossi
     */
    public static function toJalali($g_y, $g_m, $g_d) {

        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);

        $gy = $g_y - 1600;
        $gm = $g_m - 1;
        $gd = $g_d - 1;

        $g_day_no = 365 * $gy + self::div($gy + 3, 4) - self::div($gy + 99, 100) + self::div($gy + 399, 400);

        for ($i = 0; $i < $gm; ++$i)
            $g_day_no += $g_days_in_month[$i];
        if ($gm > 1 && (($gy % 4 == 0 && $gy % 100 != 0) || ($gy % 400 == 0)))
            $g_day_no++;
        $g_day_no += $gd;

        $j_day_no = $g_day_no - 79;

        $j_np = self::div($j_day_no, 12053);
        $j_day_no = $j_day_no % 12053;

        $jy = 979 + 33 * $j_np + 4 * self::div($j_day_no, 1461);

        $j_day_no %= 1461;

        if ($j_day_no >= 366) {
            $jy += self::div($j_day_no - 1, 365);
            $j_day_no = ($j_day_no - 1) % 365;
        }

        for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i)
            $j_day_no -= $j_days_in_month[$i];
        $jm = $i + 1;
        $jd = $j_day_no + 1;

        return array($jy, $jm, $jd);
    }

    /**
     * Jalali to Gregorian Conversion
     * Copyright (C) 2000  Roozbeh Pournader and Mohammad Toossi
     *
     */
    public static function toGregorian($j_y, $j_m, $j_d) {

        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);

        $jy = $j_y - 979;
        $jm = $j_m - 1;
        $jd = $j_d - 1;

        $j_day_no = 365 * $jy + self::div($jy, 33) * 8 + self::div($jy % 33 + 3, 4);
        for ($i = 0; $i < $jm; ++$i)
            $j_day_no += $j_days_in_month[$i];

        $j_day_no += $jd;

        $g_day_no = $j_day_no + 79;

        $gy = 1600 + 400 * self::div($g_day_no, 146097);
        $g_day_no = $g_day_no % 146097;

        $leap = true;
        if ($g_day_no >= 36525) {
            $g_day_no--;
            $gy += 100 * self::div($g_day_no, 36524);
            $g_day_no = $g_day_no % 36524;

            if ($g_day_no >= 365)
                $g_day_no++;
            else
                $leap = false;
        }

        $gy += 4 * self::div($g_day_no, 1461);
        $g_day_no %= 1461;

        if ($g_day_no >= 366) {
            $leap = false;

            $g_day_no--;
            $gy += self::div($g_day_no, 365);
            $g_day_no = $g_day_no % 365;
        }

        for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++)
            $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
        $gm = $i + 1;
        $gd = $g_day_no + 1;

        return array($gy, $gm, $gd);
    }

}

if (!function_exists('get_location_name_by_id')) {

    function get_location_name_by_id($id) {
        if ($id == 0)
            return 'No parent';

        $CI = get_instance();
        $query = $CI->db->get_where('locations', array('id' => $id));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->name;
        } else {
            return 'N/A';
        }
    }

}



if (!function_exists('getPhoneSetting')) {

    function getPhoneSetting($name) {
        $CI = get_instance();
        $row = $CI->db->get_where("phonesetting", array("name" => $name))->row_array();
        return $row["value"];
    }

}


if (!function_exists('sendsms')) {

    function sendsms($phones, $message) {

        function getPhoneSettings($name) {
            $CI = get_instance();
            $row = $CI->db->get_where("phonesetting", array("name" => $name))->row_array();
            return $row["value"];
        }

        function insertSendMessage($phones, $message) {
            $CI = get_instance();
            $items = array();
            foreach ($phones as $value) {
                $items[] = array(
                    "message" => $message,
                    "phone" => $value,
                    "date" => time(),
                    "fromnumber" => getPhoneSettings("smsnumber"),
                );
            }
            $CI->db->insert_batch("sentmessage", $items);
        }

        $ph = array();
        if (is_array($phones)) {
            $ph = $phones;
        } else {
            $ph[] = $phones;
        }


        $soapClient = new SoapClient("http://login.irpayamak.com/API/Send.asmx?wsdl");
        $info = $soapClient->SendSms(array(
            "username" => getPhoneSettings("username"),
            "password" => getPhoneSettings("password"),
            "text" => $message,
            "to" => $ph,
            "from" => getPhoneSettings("smsnumber"),
            "flash" => false,
        ));


        // insert item in database
        insertSendMessage($ph, $message);
    }

}

if (!function_exists('getestatedate')) {

    function getestatedate($date) {

        return jDateTime::date("Y/m/d", $date);
    }

}

if (!function_exists('show_price')) {

    function show_price($price) {

        if ($price == 0) {
            // should be hezar toman
            return "0";
        } else if ($price < 1) {
            // should be hezar toman
            return number_format($price * 1000) . " " . "هزار تومان";
        } else if ($price == 1) {
            return "یک میلیون تومان";
        } else if ($price > 1 && $price < 1000) {
            return number_format($price) . " " . "میلیون تومان";
        } else {
            return number_format($price / 1000, 2) . " " . "میلیارد تومان";
        }

//        $CI = get_instance();
//        $currency_placing = get_settings('realestate_settings', 'currency_placing', 'before_with_no_gap');
//        if ($currency_placing == 'before_with_no_gap') {
//            return "میلیون تومان" . number_format($price, 2);
//            //return $CI->session->userdata('system_currency') . '' . number_format($price);
//        } else if ($currency_placing == 'before_with_gap') {
//            return "میلیون تومان" . " " . number_format($price, 2);
//            // return $CI->session->userdata('system_currency') . ' ' . number_format($price);
//        } else if ($currency_placing == 'after_with_no_gap') {
//            return number_format($price, 2) . "میلیون تومان";
//            //return number_format($price) . '' . $CI->session->userdata('system_currency');
//        } else {
//            return number_format($price, 2) . " " . "میلیون تومان";
//            //return number_format($price) . ' ' . $CI->session->userdata('system_currency');
//        }
    }

}

if (!function_exists('is_user_package_expired')) {

    function is_user_package_expired($user_id) {

        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('users', array('id' => $user_id));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->user_type == 1)
                return 0;#admin will have no expire date
        }

        $expirtion_date = get_user_meta($user_id, 'expirtion_date', '');
        if ($expirtion_date == '')
            return 1;
        elseif (strtotime($expirtion_date) < time()) {
            return 1;
        } else
            return 0;
    }

}

if (!function_exists('get_package_name_by_id')) {

    function get_package_name_by_id($id) {
        $CI = get_instance();
        $query = $CI->db->get_where('packages', array('id' => $id));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->title;
        } else {
            return 'N/A';
        }
    }

}

if (!function_exists('get_user_properties_count')) {

    function get_user_properties_count($user_id) {
        $CI = get_instance();
        $CI->load->database();
        $CI->db->where('created_by', $user_id);
        $query = $CI->db->get_where('posts', array('status !=' => 0));
        return $query->num_rows();
    }

}

if (!function_exists('get_all_currencies')) {

    function get_all_currencies($key = 0) {
        $currencies = array(
            "ALL" => array("Albania, Leke", "4c, 65, 6b"),
            "AFN" => array("Afghanistan, Afghanis", "60b"),
            "ARS" => array("Argentina, Pesos", "24"),
            "AWG" => array("Aruba, Guilders (also called Florins)", "192"),
            "AUD" => array("Australia, Dollars", "24"),
            "AZN" => array("Azerbaijan, New Manats", "43c, 430, 43d"),
            "BSD" => array("Bahamas, Dollars", "24"),
            "BBD" => array("Barbados, Dollars", "24"),
            "BYR" => array("Belarus, Rubles", "70, 2e"),
            "BZD" => array("Belize, Dollars", "42, 5a, 24"),
            "BMD" => array("Bermuda, Dollars", "24"),
            "BOB" => array("Bolivia, Bolivianos", "24, 62"),
            "BAM" => array("Bosnia and Herzegovina, Convertible Marka", "4b, 4d"),
            "BWP" => array("Botswana, Pulas", "50"),
            "BGN" => array("Bulgaria, Leva", "43b, 432"),
            "BRL" => array("Brazil, Reais", "52, 24"),
            "BND" => array("Brunei Darussalam, Dollars", "24"),
            "KHR" => array("Cambodia, Riels", "17db"),
            "CAD" => array("Canada, Dollars", "24"),
            "KYD" => array("Cayman Islands, Dollars", "24"),
            "CLP" => array("Chile, Pesos", "24"),
            "CNY" => array("China, Yuan Renminbi", "a5"),
            "COP" => array("Colombia, Pesos", "24"),
            "CRC" => array("Costa Rica, Colón", "20a1"),
            "HRK" => array("Croatia, Kuna", "6b, 6e"),
            "CUP" => array("Cuba, Pesos", "20b1"),
            "CZK" => array("Czech Republic, Koruny", "4b, 10d"),
            "DKK" => array("Denmark, Kroner", "6b, 72"),
            "DOP" => array("Dominican Republic, Pesos", "52, 44, 24"),
            "XCD" => array("East Caribbean, Dollars", "24"),
            "EGP" => array("Egypt, Pounds", "a3"),
            "SVC" => array("El Salvador, Colones", "24"),
            "EEK" => array("Estonia, Krooni", "6b, 72"),
            "EUR" => array("Euro", "20ac"),
            "FKP" => array("Falkland Islands, Pounds", "a3"),
            "FJD" => array("Fiji, Dollars", "24"),
            "GHC" => array("Ghana, Cedis", "a2"),
            "GIP" => array("Gibraltar, Pounds", "a3"),
            "GTQ" => array("Guatemala, Quetzales", "51"),
            "GGP" => array("Guernsey, Pounds", "a3"),
            "GYD" => array("Guyana, Dollars", "24"),
            "HNL" => array("Honduras, Lempiras", "4c"),
            "HKD" => array("Hong Kong, Dollars", "24"),
            "HUF" => array("Hungary, Forint", "46, 74"),
            "ISK" => array("Iceland, Kronur", "6b, 72"),
            "INR" => array("India, Rupees", "20a8"),
            "IDR" => array("Indonesia, Rupiahs", "52, 70"),
            "IRR" => array("Iran, Rials", "fdfc"),
            "IMP" => array("Isle of Man, Pounds", "a3"),
            "ILS" => array("Israel, New Shekels", "20aa"),
            "JMD" => array("Jamaica, Dollars", "4a, 24"),
            "JPY" => array("Japan, Yen", "a5"),
            "JEP" => array("Jersey, Pounds", "a3"),
            "KZT" => array("Kazakhstan, Tenge", "43b, 432"),
            "KES" => array("Kenyan Shilling", "4b, 73, 68, 73"),
            "KGS" => array("Kyrgyzstan, Soms", "43b, 432"),
            "LAK" => array("Laos, Kips", "20ad"),
            "LVL" => array("Latvia, Lati", "4c, 73"),
            "LBP" => array("Lebanon, Pounds", "a3"),
            "LRD" => array("Liberia, Dollars", "24"),
            "LTL" => array("Lithuania, Litai", "4c, 74"),
            "MKD" => array("Macedonia, Denars", "434, 435, 43d"),
            "MYR" => array("Malaysia, Ringgits", "52, 4d"),
            "MUR" => array("Mauritius, Rupees", "20a8"),
            "MXN" => array("Mexico, Pesos", "24"),
            "MNT" => array("Mongolia, Tugriks", "20ae"),
            "MZN" => array("Mozambique, Meticais", "4d, 54"),
            "NAD" => array("Namibia, Dollars", "24"),
            "NPR" => array("Nepal, Rupees", "20a8"),
            "ANG" => array("Netherlands Antilles, Guilders (also called Florins)", "192"),
            "NZD" => array("New Zealand, Dollars", "24"),
            "NIO" => array("Nicaragua, Cordobas", "43, 24"),
            "NGN" => array("Nigeria, Nairas", "20a6"),
            "KPW" => array("North Korea, Won", "20a9"),
            "NOK" => array("Norway, Krone", "6b, 72"),
            "OMR" => array("Oman, Rials", "fdfc"),
            "PKR" => array("Pakistan, Rupees", "20a8"),
            "PAB" => array("Panama, Balboa", "42, 2f, 2e"),
            "PYG" => array("Paraguay, Guarani", "47, 73"),
            "PEN" => array("Peru, Nuevos Soles", "53, 2f, 2e"),
            "PHP" => array("Philippines, Pesos", "50, 68, 70"),
            "PLN" => array("Poland, Zlotych", "7a, 142"),
            "QAR" => array("Qatar, Rials", "fdfc"),
            "RON" => array("Romania, New Lei", "6c, 65, 69"),
            "RUB" => array("Russia, Rubles", "440, 443, 431"),
            "SHP" => array("Saint Helena, Pounds", "a3"),
            "SAR" => array("Saudi Arabia, Riyals", "fdfc"),
            "RSD" => array("Serbia, Dinars", "414, 438, 43d, 2e"),
            "SCR" => array("Seychelles, Rupees", "20a8"),
            "SGD" => array("Singapore, Dollars", "24"),
            "SBD" => array("Solomon Islands, Dollars", "24"),
            "SOS" => array("Somalia, Shillings", "53"),
            "ZAR" => array("South Africa, Rand", "52"),
            "KRW" => array("South Korea, Won", "20a9"),
            "LKR" => array("Sri Lanka, Rupees", "20a8"),
            "SEK" => array("Sweden, Kronor", "6b, 72"),
            "CHF" => array("Switzerland, Francs", "43, 48, 46"),
            "SRD" => array("Suriname, Dollars", "24"),
            "SYP" => array("Syria, Pounds", "a3"),
            "TWD" => array("Taiwan, New Dollars", "4e, 54, 24"),
            "THB" => array("Thailand, Baht", "e3f"),
            "TTD" => array("Trinidad and Tobago, Dollars", "54, 54, 24"),
            "TRY" => array("Turkey, Lira", "54, 4c"),
            "TRL" => array("Turkey, Liras", "20a4"),
            "TVD" => array("Tuvalu, Dollars", "24"),
            "UAH" => array("Ukraine, Hryvnia", "20b4"),
            "GBP" => array("United Kingdom, Pounds", "a3"),
            "USD" => array("United States of America, Dollars", "24"),
            "UYU" => array("Uruguay, Pesos", "24, 55"),
            "UZS" => array("Uzbekistan, Sums", "43b, 432"),
            "VEF" => array("Venezuela, Bolivares Fuertes", "42, 73"),
            "VND" => array("Vietnam, Dong", "20ab"),
            "YER" => array("Yemen, Rials", "fdfc"),
            "ZWD" => array("Zimbabwe, Zimbabwe Dollars", "5a, 24"));

        return $currencies;
    }

}

if (!function_exists('get_currency_icon')) {

    function get_currency_icon($currency = null) {
        $currencies = get_all_currencies();
        $currencySymbol = '';

        if ($currency == null) {
            return 'N/A';
        }

        $symbol = $currencies[$currency][1];
        $symbols = explode(', ', $symbol);
        if (is_array($symbols)) {
            $symbol = "";
            foreach ($symbols as $temp) {
                $symbol .= '&#x' . $temp . ';';
            }
        } else {
            $symbol = '&#x' . $symbol . ';';
        }

        return $symbol;
    }

}

if (!function_exists('get_payment_status_title_by_value')) {

    function get_payment_status_title_by_value($key = 0) {
        $types = array("DBC_DELETED", "DBC_ACTIVE", "DBC_PENDING");
        return (isset($types[$key])) ? lang_key($types[$key]) : 'N/A';
    }

}

if (!function_exists('get_status_title_by_value')) {

    function get_status_title_by_value($key = 0) {
        $types = array("DBC_DELETED", "DBC_ACTIVE", "DBC_PENDING", "DBC_REPORTED");
        return (isset($types[$key])) ? lang_key($types[$key]) : 'N/A';
    }

}

if (!function_exists('get_all_countries')) {

    function get_all_countries() {
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('locations', array('type' => 'country', 'status' => 1));
        return $query;
    }

}

if (!function_exists('add_user_meta')) {

    function add_user_meta($user_id, $key, $value) {
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('user_meta', array('user_id' => $user_id, 'key' => $key));
        if ($query->num_rows() > 0) {
            $CI->db->update('user_meta', array('value' => $value), array('user_id' => $user_id, 'key' => $key));
        } else {
            $CI->db->insert('user_meta', array('user_id' => $user_id, 'key' => $key, 'value' => $value));
        }
    }

}

if (!function_exists('get_user_meta')) {

    function get_user_meta($user_id, $key, $default = 'n/a') {
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('user_meta', array('user_id' => $user_id, 'key' => $key));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->value;
        } else {
            return $default;
        }
    }

}

#-----------------

if (!function_exists('add_post_meta')) {

    function add_post_meta($post_id, $key, $value) {
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('post_meta', array('post_id' => $post_id, 'key' => $key));
        if ($query->num_rows() > 0) {
            $CI->db->update('post_meta', array('value' => $value), array('post_id' => $post_id, 'key' => $key));
        } else {
            $CI->db->insert('post_meta', array('post_id' => $post_id, 'key' => $key, 'value' => $value));
        }
    }

}

if (!function_exists('get_post_meta')) {

    function get_post_meta($post_id, $key, $default = 'n/a') {
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('post_meta', array('post_id' => $post_id, 'key' => $key));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->value;
        } else {
            return $default;
        }
    }

}

#----------------

if (!function_exists('get_featured_photo_by_id')) {

    function get_featured_photo_by_id($img = '') {
        if ($img == '')
            return base_url('assets/admin/img/preview.jpg');
        else
            return base_url('uploads/thumbs/' . $img);
    }

}


if (!function_exists('get_all_facilities')) {

    function get_all_facilities() {
        $CI = get_instance();
        $CI->load->database();
        $CI->db->order_by('title', 'asc');
        $query = $CI->db->get_where('facilities', array('status' => 1));
        return $query;
    }

}

if (!function_exists('get_title_for_edit_by_id_lang')) {

    function get_title_for_edit_by_id_lang($id, $lang) {
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('post_meta', array('post_id' => $id, 'key' => 'title', 'status' => 1));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = ($row->value == '') ? array() : (array) json_decode($row->value);
            if (isset($data[$lang]) && $data[$lang] != '')
                return $data[$lang];
            else {
                $text = '';
                foreach ($data as $key => $value) {
                    $text = $value;
                    break;
                }
                return $text;
            }
        } else
            return 'N/A';

        return $query;
    }

}

if (!function_exists('get_description_for_edit_by_id_lang')) {

    function get_description_for_edit_by_id_lang($id, $lang) {
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('post_meta', array('post_id' => $id, 'key' => 'description', 'status' => 1));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data = ($row->value == '') ? array() : (array) json_decode($row->value);
            if (isset($data[$lang]) && $data[$lang] != '')
                return $data[$lang];
            else {
                $text = '';
                foreach ($data as $key => $value) {
                    $text = $value;
                    break;
                }
                return $text;
            }
        } else
            return 'N/A';

        return $query;
    }

}



if (!function_exists('create_square_thumb')) {

    function create_square_thumb($img, $dest) {
        $seg = explode('.', $img);
        $thumbType = 'jpg';
        $thumbSize = 300;
        $thumbPath = $dest;
        $thumbQuality = 100;

        $last_index = count($seg);
        $last_index--;

        if ($seg[$last_index] == 'jpg' || $seg[$last_index] == 'jpeg') {
            if (!$full = imagecreatefromjpeg($img)) {
                return 'error';
            }
        } else if ($seg[$last_index] == 'png') {
            if (!$full = imagecreatefrompng($img)) {
                return 'error';
            }
        } else if ($seg[$last_index] == 'gif') {
            if (!$full = imagecreatefromgif($img)) {
                return 'error';
            }
        }

        $width = imagesx($full);
        $height = imagesy($full);

        /* work out the smaller version, setting the shortest side to the size of the thumb, constraining height/wight */
        if ($height > $width) {
            $divisor = $width / $thumbSize;
        } else {
            $divisor = $height / $thumbSize;
        }

        $resizedWidth = ceil($width / $divisor);
        $resizedHeight = ceil($height / $divisor);

        /* work out center point */
        $thumbx = floor(($resizedWidth - $thumbSize) / 2);
        $thumby = floor(($resizedHeight - $thumbSize) / 2);

        /* create the small smaller version, then crop it centrally to create the thumbnail */
        $resized = imagecreatetruecolor($resizedWidth, $resizedHeight);
        $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
        imagecopyresized($resized, $full, 0, 0, 0, 0, $resizedWidth, $resizedHeight, $width, $height);
        imagecopyresized($thumb, $resized, 0, 0, $thumbx, $thumby, $thumbSize, $thumbSize, $thumbSize, $thumbSize);

        $name = name_from_url($img);

        imagejpeg($thumb, $thumbPath . str_replace('_large.jpg', '_thumb.jpg', $name), $thumbQuality);
    }

}

if (!function_exists('humanTiming')) {

    function humanTiming($time) {

        $time = time() - $time; // to get the time since that moment

        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit)
                continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '') . ' ago';
        }
    }

}

if (!function_exists('next_post_by_id')) {

    function next_post_by_id($id) {
        $CI = get_instance();
        $CI->load->database();
        $CI->db->where('id >', $id);
        $query = $CI->db->get_where('posts', array('status' => 1), 1, 0);
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        } else
            return array('error' => 'not_found');
    }

}

if (!function_exists('prev_post_by_id')) {

    function prev_post_by_id($id) {
        $CI = get_instance();
        $CI->load->database();
        $CI->db->where('id <', $id);
        $CI->db->order_by('id', 'desc');
        $query = $CI->db->get_where('posts', array('status' => 1), 1, 0);
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        } else
            return array('error' => 'not_found');
    }

}


if (!function_exists('social_sharing_meta_tags_for_post')) {

    function social_sharing_meta_tags_for_post($post = '') {
        if ($post != '' && $post->num_rows() > 0) {
            $CI = get_instance();
            $post = $post->row();
            $curr_lang = ($CI->uri->segment(1) != '') ? $CI->uri->segment(1) : 'en';
            $site_title = get_settings('site_settings', 'site_title', 'Memento');
            $title = get_title_for_edit_by_id_lang($post->id, $curr_lang);
            $detail_link = site_url('show/detail/' . $post->unique_id . '/' . url_title($title));

            $meta = '<meta name="twitter:card" content="photo" />' . "\n" .
                    '<meta name="twitter:site" content="' . $site_title . '" />' . "\n" .
                    '<meta name="twitter:image" content="' . get_featured_photo_by_id($post->featured_img) . '" />' . "\n" .
                    '<meta property="og:title" content="' . $title . '" />' . "\n" .
                    '<meta property="og:site_name" content="' . $site_title . '" />' . "\n" .
                    '<meta property="og:url" content="' . $detail_link . '" />' . "\n" .
                    '<meta property="og:description" content="Click to view detail..." />' . "\n" .
                    '<meta property="og:type" content="article" />' . "\n" .
                    '<meta property="og:image" content="' . get_featured_photo_by_id($post->featured_img) . '" />' .
                    '<meta property="fb:app_id" content="' . get_settings('memento_settings', 'fb_app_id', 'none') . '" />';

            return $meta;
        } else
            return '';
    }

}

if (!function_exists('fileinfo_from_url')) {

    function fileinfo_from_url($filePath) {
        $fileParts = pathinfo($filePath);

        if (!isset($fileParts['filename'])) {
            $fileParts['filename'] = substr($fileParts['basename'], 0, strrpos($fileParts['basename'], '.'));
        }

        return $fileParts;
    }

}

if (!function_exists('name_from_url')) {

    function name_from_url($filePath) {
        $fileParts = pathinfo($filePath);

        if (!isset($fileParts['filename'])) {
            $fileParts['filename'] = substr($fileParts['basename'], 0, strrpos($fileParts['basename'], '.'));
        }

        return $fileParts['basename'];
    }

}


if (!function_exists('image_from_url')) {

    function image_from_url($url, $name = '') {
        if ($name == '')
            $name = name_from_url($url);
        $ch = curl_init($url);
        $fp = fopen('uploads/url/' . $name, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        return base_url('uploads/url/' . $name);
    }

}


if (!function_exists('gif2jpeg')) {

    function gif2jpeg($p_fl, $p_new_fl = '', $bgcolor = false) {
        list($wd, $ht, $tp, $at) = getimagesize($p_fl);
        $img_src = imagecreatefromgif($p_fl);
        $img_dst = imagecreatetruecolor($wd, $ht);
        $clr['red'] = 255;
        $clr['green'] = 255;
        $clr['blue'] = 255;

        if (is_array($bgcolor))
            $clr = $bgcolor;
        $kek = imagecolorallocate($img_dst, $clr['red'], $clr['green'], $clr['blue']);
        imagefill($img_dst, 0, 0, $kek);
        imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $wd, $ht, $wd, $ht);
        $draw = true;
        if (strlen($p_new_fl) > 0) {
            if ($hnd = fopen($p_new_fl, 'w')) {
                $draw = false;
                fclose($hnd);
            }
        }

        if (true == $draw) {
            header("Content-type: image/jpeg");
            imagejpeg($img_dst);
        } else
            imagejpeg($img_dst, $p_new_fl);

        imagedestroy($img_dst);
        imagedestroy($img_src);
    }

}


if (!function_exists('resized_to_fixed_width')) {

    function resized_to_fixed_width($img, $width = 500) {
        $CI = get_instance();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $img;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;

        $CI->load->library('image_lib', $config);

        $CI->image_lib->resize();
    }

}

if (!function_exists('create_rect_thumb')) {

    function create_rect_thumb($img, $dest, $ratio = 3) {

        $seg = explode('.', $img); //explde the source to get the image extension
        $thumbType = 'jpg';  //generated thumb will be of type jpg
        $thumbPath = $dest; //destination path of the thumb -- original image name will be appended
        $thumbQuality = 80;    //quality of the thumbnail (in percent)
        //chech the image type and create image accordingly
        if ($seg[2] == 'jpg' || $seg[2] == 'jpeg') {
            if (!$full = imagecreatefromjpeg($img)) {
                return 'error';
            }
        } else if ($seg[2] == 'png') {
            if (!$full = imagecreatefrompng($img)) {
                return 'error';
            }
        } else if ($seg[2] == 'gif') {
            if (!$full = imagecreatefromgif($img)) {
                return 'error';
            }
        }

        $width = imagesx($full);
        $height = imagesy($full);

        /* wourk out the thumbnail size */
        $resizedHeight = min($width * $ratio / 8, $height);
        $resizedWidth = $width;

        /* work out starting point */
        $thumbx = 0; // x always starts at zero -- the thumbnail gets the same width as the source image
        $extra_height = $height - $resizedHeight;
        $thumby = floor(($extra_height) / 2);

        /* create the small smaller version, then crop it centrally to create the thumbnail */
        $resized = imagecreatetruecolor($resizedWidth, $resizedHeight);
        imagecopy($resized, $full, 0, 0, $thumbx, $thumby, $resizedWidth, $resizedHeight);

        $name = name_from_url($img);

        imagejpeg($resized, $thumbPath . str_replace('_large.jpg', '_thumb.jpg', $name), $thumbQuality);
    }

}



if (!function_exists('put_watermark')) {

    function put_watermark($src, $text = '') {
        $CI = get_instance();
        $CI->load->library('image_lib');
        $config['source_image'] = $src;
        $config['wm_text'] = $text;
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './system/fonts/texb.ttf';
        $config['wm_font_size'] = '16';
        $config['wm_font_color'] = 'ffffff';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '0';

        $CI->image_lib->initialize($config);

        $CI->image_lib->watermark();
    }

}

if (!function_exists('filePath')) {

    function filePath($filePath) {
        $fileParts = pathinfo($filePath);

        if (!isset($fileParts['filename'])) {
            $fileParts['filename'] = substr($fileParts['basename'], 0, strrpos($fileParts['basename'], '.'));
        }

        return $fileParts;
    }

}


if (!function_exists('is_animated')) {

    function is_animated($filename) {
        $filecontents = file_get_contents($filename);

        $str_loc = 0;
        $count = 0;
        while ($count < 2) { # There is no point in continuing after we find a 2nd frame
            $where1 = strpos($filecontents, "\x00\x21\xF9\x04", $str_loc);
            if ($where1 === FALSE) {
                break;
            } else {
                $str_loc = $where1 + 1;
                $where2 = strpos($filecontents, "\x00\x2C", $str_loc);
                if ($where2 === FALSE) {
                    break;
                } else {
                    if ($where1 + 8 == $where2) {
                        $count++;
                    }
                    $str_loc = $where2 + 1;
                }
            }
        }

        if ($count > 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

if (!function_exists('videoType')) {

    function videoType($url) {
        if (strpos($url, 'youtube') > 0) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
            return 'vimeo';
        } else {
            return 'unknown';
        }
    }

}


if (!function_exists('render_widgets')) {

    function render_widgets($position = '') {
        $CI = get_instance();
        $CI->load->helper('inflector');
        $CI->load->helper('file');
        $widgets = get_widgets_by_position($position);
        foreach ($widgets as $row) {
            $query = $CI->db->get_where('widgets', array('alias' => $row));
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if ($row->status == 1) {
                    if (read_file('./application/modules/widgets/' . $row->alias . '.php') != FALSE)
                        require_once'./application/modules/widgets/' . $row->alias . '.php';
                }
                else if ($row->status == 0)
                    echo 'Module not published';
                else
                    echo 'Module not found';
            }
            else {
                echo 'module not found';
            }
        }
    }

}

if (!function_exists('load_view')) {

    function load_view($view = '', $data = array(), $buffer = FALSE, $theme = '') {
        $CI = get_instance();
        if ($theme == '')
            $theme = get_active_theme();
        if ($buffer == FALSE) {
            if (@file_exists(APPPATH . "modules/themes/views/" . $theme . "/" . $view . ".php"))
                $CI->load->view('themes/' . $theme . '/' . $view, $data);
            else
                $CI->load->view('themes/default/' . $view, $data);
        }
        else {
            if (@file_exists(APPPATH . "modules/themes/views/" . $theme . "/" . $view . ".php"))
                $view_data = $CI->load->view('themes/' . $theme . '/' . $view, $data, TRUE);
            else
                $view_data = $CI->load->view('themes/default/' . $view, $data, TRUE);
            return $view_data;
        }
    }

}

if (!function_exists('load_template')) {

    function load_template($data = array(), $theme = '', $tmpl = 'template_view') {
        $row = get_option('site_settings');
        if (is_array($row) && isset($row['error'])) {
            echo 'Site settings not found.error on : epbase_helper';
            die();
        } else {
            $values = json_decode($row->values);
            $data['title'] = $values->site_title;
        }

        load_view($tmpl, $data);
    }

}

if (!function_exists('get_active_theme')) {

    function get_active_theme() {
        $row = get_option('active_theme');
        if (is_array($row) && isset($row['error'])) {
            return 'default';
        } else
            return $row->values;
    }

}

if (!function_exists('get_option')) {

    function get_option($key = '') {
        $CI = get_instance();
        $query = $CI->db->get_where('options', array('key' => $key, 'status' => 1));
        if ($query->num_rows() > 0)
            return $query->row();
        else
            return array('error' => 'Key not found');
    }

}

if (!function_exists('update_option')) {

    function update_option($key = '', $values = array()) {
        $CI = get_instance();
        $data['values'] = json_encode($values);
        echo $key;
        print_r($data);
        $query = $CI->db->update('options', $data, array('key' => $key));
    }

}


if (!function_exists('get_plugins')) {

    function get_plugins() {
        $CI = get_instance();
        $query = $CI->db->get_where('plugins', array('status' => 1));
        return $query;
    }

}

if (!function_exists('get_widgets_by_position')) {

    function get_widgets_by_position($pos = '') {
        $CI = get_instance();
        $positions = get_option('positions');
        $positions = json_decode($positions->values);
        $widgets = array();
        foreach ($positions as $position) {
            if ($position->name == $pos) {
                if (isset($position->widgets))
                    $widgets = $position->widgets;
            }
        }
        return $widgets;
    }

}

if (!function_exists('configPagination')) {

    function configPagination($url, $total_rows, $segment, $per_page = 10) {
        $CI = get_instance();
        $CI->load->library('pagination');
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = $segment;
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_links'] = 5;
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "</li>";

        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $CI->pagination->initialize($config);

        return $CI->pagination->create_links();
    }

}


if (!function_exists('get_category_title_by_id')) {

    function get_category_title_by_id($id = '') {
        if ($id == 0)
            return 'No parent';
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('categories', array('id' => $id));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->title;
        } else
            return 'N/A';
    }

}

if (!function_exists('get_profile_photo_by_id')) {

    function get_profile_photo_by_id($id = '', $type = '') {
        if ($id == 0)
            return 'No found';

        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('users', array('id' => $id));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->profile_photo == '')
                return base_url() . 'uploads/profile_photos/nophoto-' . strtolower($row->gender) . '.jpg';

            if ($type == 'thumb')
                return base_url() . 'uploads/profile_photos/thumb/' . $row->profile_photo;
            else
                return base_url() . 'uploads/profile_photos/' . $row->profile_photo;
        }
        else {

            return base_url() . 'uploads/profile_photos/nophoto-female.jpg';
        }
    }

}

if (!function_exists('get_profile_photo_name_by_username')) {

    function get_profile_photo_name_by_username($username = '', $type = 'thumb') {
        if ($username == '')
            return 'Not found';

        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('users', array('user_name' => $username));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->profile_photo != '')
                return $row->profile_photo;
            else
                return 'nophoto-' . strtolower($row->gender) . '.jpg';
        } else
            return 'nophoto-.jpg';
    }

}

if (!function_exists('get_profile_photo_by_username')) {

    function get_profile_photo_by_username($username = '', $type = 'thumb') {
        if ($username == '')
            return 'Not found';

        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('users', array('user_name' => $username));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->profile_photo != '')
                return base_url() . 'uploads/profile_photos/' . $type . '/' . $row->profile_photo;
            else
                return base_url() . 'uploads/profile_photos/nophoto-' . strtolower($row->gender) . '.jpg';
        } else
            return base_url() . 'uploads/profile_photos/nophoto-female.jpg';
    }

}

if (!function_exists('get_comment_count')) {

    function get_comment_count($post_id) {
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('post_meta', array('post_id' => $post_id, 'choice' => 'comments'));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->value == '')
                return 0;
            else
                return count(json_decode($row->value));
        } else
            return 0;
    }

}


if (!function_exists('get_view_count')) {

    function get_view_count($post_id, $from = 'all') {
        if (isset($_COOKIE['viewcookie' . $post_id]) == FALSE && $from == 'detail') {
            $CI = get_instance();
            $CI->load->database();

            $query = $CI->db->get_where('posts', array('id' => $post_id));
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $total_view = $row->total_view;
                $total_view++;
            } else
                $total_view = 0;
            $CI->db->update('posts', array('total_view' => $total_view), array('id' => $post_id));
            setcookie("viewcookie" . $post_id, 1, time() + 1800);
            return $total_view;
        }
        else {
            $CI = get_instance();
            $CI->load->database();

            $query = $CI->db->get_where('posts', array('id' => $post_id));
            if ($query->num_rows() > 0) {
                $row = $query->row();
                return $row->total_view;
            } else
                $total_view = 0;
        }
    }

}

if (!function_exists('is_reported')) {

    function is_reported($post_id) {
        $CI = get_instance();
        $user_name = $CI->session->userdata('user_name');
        if ($user_name == '')
            return '';

        $key = '"post_' . $post_id . '"';
        $CI->load->database();
        $CI->db->like('reported', $key);
        $query = $CI->db->get_where('users', array('user_name' => $user_name));
        if ($query->num_rows() > 0) {
            return 'reported';
        } else
            return '';
    }

}

if (!function_exists('is_liked')) {

    function is_liked($post_id) {
        $CI = get_instance();
        $user_name = $CI->session->userdata('user_name');
        if ($user_name == '')
            return '';

        $key = '"post_' . $post_id . '"';
        $CI->load->database();
        $CI->db->like('liked', $key);
        $query = $CI->db->get_where('users', array('user_name' => $user_name));
        if ($query->num_rows() > 0) {
            return 'liked';
        } else
            return '';
    }

}

if (!function_exists('is_disliked')) {

    function is_disliked($post_id) {
        $CI = get_instance();
        $user_name = $CI->session->userdata('user_name');
        if ($user_name == '')
            return '';

        $key = '"post_' . $post_id . '"';
        $CI->load->database();
        $CI->db->like('disliked', $key);
        $query = $CI->db->get_where('users', array('user_name' => $user_name));
        if ($query->num_rows() > 0) {
            return 'disliked';
        } else
            return '';
    }

}

if (!function_exists('get_all_properties_map_data')) {

    function get_all_properties_map_data($curr_lang) {
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->get_where('posts', array('status !=' => 0), 100, 0);
        $data = array();
        $estates = array();

        foreach ($query->result() as $row) {
            $title = get_title_for_edit_by_id_lang($row->id, $curr_lang);

            $estate = array();
            $estate['estate_id'] = $row->id;
            $estate['estate_title'] = $title;
            $estate['featured_image_url'] = get_featured_photo_by_id($row->featured_img);
            $estate['latitude'] = $row->latitude;
            $estate['longitude'] = $row->longitude;
            $estate['estate_type'] = $row->type;
            $estate['estate_type_lang'] = lang_key($row->type);
            $estate['estate_status'] = $row->status;
            $estate['estate_price'] = $row->total_price;
            $estate['estate_short_address'] = get_location_name_by_id($row->city) . ',' . get_location_name_by_id($row->state) . ',' . get_location_name_by_id($row->country);
            $estate['detail_link'] = site_url('show/detail/' . $row->unique_id . '/' . url_title($title));
            array_push($estates, $estate);
        }

        $data['estates'] = $estates;
        return $data;
    }

}


/* End of file array_helper.php */
/* Location: ./system/helpers/array_helper.php */