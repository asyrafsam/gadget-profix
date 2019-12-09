<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_model extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('d_post');
		$this->load->model('d_get');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		$this->load->library('session','upload');
		// $this->load->library('upload');
		// $this->load->model('m_upload');
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
		$query = $this->d_post->addmodel($datain,'tbl_model');
		
		redirect(base_url('admin/models'));
	}

	function edit_model($id){

    	$data = $this->d_get->show_model($id);
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
		    $query = $this->d_post->updateModels($where,$datainn,'tbl_model');

			redirect(base_url('admin/models'));
    }
	

	function delete_Model($id){
		$where = array('md_id' => $id);
		$this->d_post->deleteModels($where,'tbl_model');
		
		redirect(base_url('admin/models'));
	}		
}
