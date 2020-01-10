<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('M_data');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		$this->load->library('form_validation');
		// $this->load->library('upload');
		// $this->load->model('m_upload');
		if(ini_get('date.timezone') == ''){
		    date_default_timezone_set('UTC');
		    
		}
	}

	public function index()
	{
		// Main Page Here!!!!!
		// $this->load->view('public/head.php');
		// $this->load->view('public/navpublic.php');
		$this->load->view('public/body.php');
		// $this->load->view('public/footerpublic.php');
	}
	public function adminlogin()
	{
		$this->load->view('public/adminlogin.php');
	}
	public function forgotpassword()
	{
		// Main Page Here!!!!!
		$this->load->view('public/forgotpassword.php');
	}
	public function forgotpassword2nd()
	{
		// Main Page Here!!!!!
		$this->load->view('public/forgotpassword2.php');
	}
}
