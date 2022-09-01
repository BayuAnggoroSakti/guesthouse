<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_error extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template_backend');
    }

    public function index()
    {
    	$this->data['title'] = "Halaman Tidak Ditemukan";
        $this->output->set_status_header('404');
        $this->load->view('404_view',$this->data);
    }
}
/* Location: ./application/controller/My_error.php */