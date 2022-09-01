<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	function valid_email($email) {
      return !!filter_var($email, FILTER_VALIDATE_EMAIL);
   }
?>
