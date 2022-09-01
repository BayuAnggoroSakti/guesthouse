<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function _ip(){
	    if (preg_match( "/^([d]{1,3}).([d]{1,3}).([d]{1,3}).([d]{1,3})$/", getenv('HTTP_X_FORWARDED_FOR'))){
	    	 return getenv('HTTP_X_FORWARDED_FOR');
	    } else {
	    	return getenv('REMOTE_ADDR');
		}
	}	
?>