<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* 
 Email Config	
*/


$config['protocol']		= "smtp";
$config['smtp_host']	= "smtp.gmail.com";
$config['smtp_port']	= 465;
$config['smtp_timeout'] = "30";
$config['smtp_user']	= "vgrkpcs@gmail.com";
$config['smtp_pass']	= "pamapersada123";
$config['smtp_crypto']	= "ssl";
$config['charset']		= "utf-8";
$config['newline']		= "\r\n"; 
$config['crlf']			= "\r\n";
$config['mailtype']		= "html";

// $config['protocol']		= "smtp";
// // $config['smtp_host']		= "ssl://mail.smtp2go.com";
// // $config['smtp_port']		= "465";
// $config['smtp_host'] 	= 'mail.smtp2go.com';
// $config['smtp_port'] 	= '587'; // 8025, 587 and 25 can also be used. 
// $config['smtp_crypto']  = "tls";
// $config['smtp_timeout'] = "30";
// $config['smtp_user']		= "?";
// $config['smtp_pass']		= "?";
// $config['charset']		= "utf-8";
// $config['newline']		= "\r\n";
// $config['mailtype']		= "html";

/* End of file email.php */
/* Location: ./application/config/ */