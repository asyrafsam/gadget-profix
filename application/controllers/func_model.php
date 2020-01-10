<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func_model extends CI_Controller {


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
	function add_model(){
		$ubranch = $this->input->post('ubranch');
		$mdname = $this->input->post('mdname');
		$mdmanufacturer = $this->input->post('mdmanufacturer');

        $datain = array(
			'md_name' => $mdname,
			'md_manufacturer' => $mdmanufacturer,
			'u_branch' => $ubranch
			);
		$query = $this->D_post->addmodel($datain,'tbl_model');
		
		$logactivity = 'Add';
        $moduleclient = 'tbl_models';
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

		redirect(base_url('admin/models'));
	}

	function edit_model($id){

    	$data = $this->D_get->show_model($id);
		echo json_encode($data);
    }

	function update_model(){

			$mdid = $this->input->post('mdid-1');
			$mdname = $this->input->post('mdname-1');
			$mdmanufacturer = $this->input->post('mdmanufacturer-1');

			// var_dump($c_file); exit();

		    $datainn = array(
		    	'md_name' => $mdname,
				'md_manufacturer' => $mdmanufacturer
			);
		    $where = array(
				'md_id' => $mdid
			);
		    $query = $this->D_post->updateModels($where,$datainn,'tbl_model');

		    $logactivity = 'Edit';
	        $moduleclient = 'tbl_models';
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

			redirect(base_url('admin/models'));
    }
	

	function delete_Model($id){
		$where = array('md_id' => $id);
		$this->D_post->deleteModels($where,'tbl_model');
		
		$logactivity = 'Delete';
        $moduleclient = 'tbl_models';
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
	    
		redirect(base_url('admin/models'));
	}		
}
