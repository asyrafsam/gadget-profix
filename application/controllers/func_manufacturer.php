<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func_manufacturer extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('D_post');
		$this->load->model('D_get');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		$this->load->library('session','upload');
		// $this->load->library('upload');
		// $this->load->model('m_upload');
		if(ini_get('date.timezone') == ''){
		    date_default_timezone_set('UTC');
		    
		}
	}
	function add_manufacturer(){
		$ubranch = $this->input->post('ubranch');
		$mname = $this->input->post('mname');
		
        $datain = array(
			'm_name' => $mname,
			'u_branch' => $ubranch
			);
		$query = $this->D_post->addmanufacturer($datain,'tbl_manufacturer');
		
		$logactivity = 'Add';
        $moduleclient = 'tbl_manufacturer';
        $logid = $this->session->userdata('id');
        $loguser = $this->session->userdata('name');
        $logip = $this->input->ip_address();
        $branch = $this->session->userdata('branch');
        $currentdate = date('Y-m-d H:i:s');
        $datalog = array(
        			'log_activity' => $logactivity,
        			'log_module' => $moduleclient,
        			'log_id' => $logid,
        			'log_user' =>$loguser,
        			'log_ipaddress' => $logip,
        			'u_branch' => $branch,
        			'log_date' => $currentdate
        		);
	    $this->db->insert('tbl_log_activity', $datalog);

		redirect(base_url('admin/manufacturers'));
	}

	function edit_manufacturer($id){

    	$data = $this->D_get->show_manufacturer($id);
		echo json_encode($data);
    }

	function update_manufacturer(){

			$mid = $this->input->post('mid-1');
			$mname = $this->input->post('mname-1');

			// var_dump($c_file); exit();

		    $datainn = array(
				'm_name' => $mname,
			);
		    $where = array(
				'm_id' => $mid
			);
		    $query = $this->D_post->updateManufacturers($where,$datainn,'tbl_manufacturer');

		    $logactivity = 'Edit';
	        $moduleclient = 'tbl_manufacturer';
	        $logid = $this->session->userdata('id');
	        $loguser = $this->session->userdata('name');
	        $logip = $this->input->ip_address();
	        $branch = $this->session->userdata('branch');
	        $currentdate = date('Y-m-d H:i:s');
	        $datalog = array(
	        			'log_activity' => $logactivity,
	        			'log_module' => $moduleclient,
	        			'log_id' => $logid,
	        			'log_user' =>$loguser,
	        			'log_ipaddress' => $logip,
	        			'u_branch' => $branch,
	        			'log_date' => $currentdate
	        		);
		    $this->db->insert('tbl_log_activity', $datalog);

			redirect(base_url('admin/manufacturers'));
    }
	

	function delete_Manufacturer($id){
		$where = array('m_id' => $id);
		$this->D_post->deleteManufacturer($where,'tbl_manufacturer');

		$logactivity = 'Delete';
        $moduleclient = 'tbl_manufacturer';
        $logid = $this->session->userdata('id');
        $loguser = $this->session->userdata('name');
        $logip = $this->input->ip_address();
        $branch = $this->session->userdata('branch');
        $currentdate = date('Y-m-d H:i:s');
        $datalog = array(
        			'log_activity' => $logactivity,
        			'log_module' => $moduleclient,
        			'log_id' => $logid,
        			'log_user' =>$loguser,
        			'log_ipaddress' => $logip,
        			'u_branch' => $branch,
        			'log_date' => $currentdate
        		);
	    $this->db->insert('tbl_log_activity', $datalog);

		redirect(base_url('admin/manufacturers'));
	}		
}
