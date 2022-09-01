<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function scriptHTMLtags($str) { // Remove HTML, XSS Filtering
	$t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
	$xt = htmlentities($t, ENT_QUOTES, "UTF-8");
	return $xt;
}
/* Location: ./application/helpers/string.php */
?>