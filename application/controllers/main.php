<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('m_data');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		$this->load->library('form_validation');
		// $this->load->library('upload');
		// $this->load->model('m_upload');
	}

	public function index()
	{
		// Main Page Here!!!!!
		$this->load->view('public/adminlogin.php');
	}
}
