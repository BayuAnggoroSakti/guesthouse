<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_backend {	
	protected $_ci;
	function __construct(){
		$this->_ci = &get_instance();
	}
	
	function display($template, $data = null) {		
		$data['content'] 	 = $this->_ci->load->view($template, $data,true);
		$data['sidebar'] 	 = $this->_ci->load->view('template/admin/sidebar', $data,true);
		$data['header'] 	 = $this->_ci->load->view('template/admin/header', $data,true);
		$data['footer'] 	 = $this->_ci->load->view('template/admin/footer', $data,true);
		
		$this->_ci->load->view('/template_backend.php', $data);
	}
}
/* Location: ./application/libraries/Template.php */

