<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Open Software License version 3.0
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is
 * bundled with this package in the files license.txt / license.rst.  It is
 * also available through the world wide web at this URL:
 * http://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['email_must_be_array'] = 'متد تعیین صلاحیت (validation) باید آرایه بر گرداند.';
$lang['email_invalid_address'] = 'آدرس ایمیل %s اشتباه است.';
$lang['email_attachment_missing'] = 'این الحاقیه: %s پیدا نشد.';
$lang['email_attachment_unreadable'] = 'این الحاقیه : %s باز نشد.';
$lang['email_no_recipients'] = 'نام گیرنده را در گیرنده (To) یا کپی (CC) یا کپی نامرئی (BCC) معین کنید.';
$lang['email_send_failure_phpmail'] = 'امکان ارسال ایمیل با PHP mail() نیست. ممکن است این گزینه در سرویس دهنده ایمیل شما غیر فعال شده باشد.';
$lang['email_send_failure_sendmail'] = 'امکان ارسال ایمیل با PHP Sendmail نیست. ممکن است این گزینه در سرویس دهنده ایمیل شما غیر فعال شده باشد.';
$lang['email_send_failure_smtp'] = 'امکان ارسال ایمیل با PHP SMTP نیست. ممکن است این گزینه در سرویس دهنده ایمیل شما غیر فعال شده باشد.';
$lang['email_sent'] = 'نامه شما با موفقیت ارسال شد پروتکل استفاده شده: %s';
$lang['email_no_socket'] = 'امکان باز کردن درگاه (سوکت) به Sendmail نیست. لطفا تنظیمات را بازنگری کنید.';
$lang['email_no_hostname'] = 'نام سرویس دهنده (hostname) SMTP تعیین نشده.';
$lang['email_smtp_error'] = 'خطای SMTP رخ داده است : %s';
$lang['email_no_smtp_unpw'] = 'خطا: نام کاربری و رمز عبور SMTP را وارد کنید.';
$lang['email_failed_smtp_login'] = 'خطای ارسال دستور AUTH LOGIN، خطا: %s';
$lang['email_smtp_auth_un'] = 'خطای زمان ورود از نام کاربری، خطا: %s';
$lang['email_smtp_auth_pw'] = 'خطای زمان ورود از رمز عبور، خطا: %s';
$lang['email_smtp_data_failure'] = 'امکان ارسال دیتا نیست : %s';
$lang['email_exit_status'] = 'كد وضعیت خروج: %s';

/* End of file email_lang.php */
/* Location: ./system/language/persian/email_lang.php */