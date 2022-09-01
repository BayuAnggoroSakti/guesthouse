<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_frontend {	
	protected $_ci;
	function __construct(){
		$this->_ci = &get_instance();
	}
	
	function display($template, $data = null) {		
		$data['content'] 	 = $this->_ci->load->view($template, $data,true);
		$data['sidebar'] 	 = $this->_ci->load->view('template/frontend/sidebar', $data,true);
		$data['main_header'] 	 = $this->_ci->load->view('template/frontend/main_header', $data,true);
		$data['main_footer'] 	 = $this->_ci->load->view('template/frontend/main_footer', $data,true);
		
		$this->_ci->load->view('/template_frontend.php', $data);
	}
}
/* Location: ./application/libraries/Template.php */

