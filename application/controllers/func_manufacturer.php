<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_manufacturer extends CI_Controller {


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
	function add_manufacturer(){
		$ubranch = $this->input->post('ubranch');
		$mname = $this->input->post('mname');
		
        $datain = array(
			'm_name' => $mname,
			'u_branch' => $ubranch
			);
		$query = $this->d_post->addmanufacturer($datain,'tbl_manufacturer');
		
		redirect(base_url('admin/manufacturers'));
	}

	function edit_manufacturer($id){

    	$data = $this->d_get->show_manufacturer($id);
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
		    $query = $this->d_post->updateManufacturers($where,$datainn,'tbl_manufacturer');

			redirect(base_url('admin/manufacturers'));
    }
	

	function delete_Manufacturer($id){
		$where = array('m_id' => $id);
		$this->d_post->deleteManufacturer($where,'tbl_manufacturer');
		
		redirect(base_url('admin/manufacturers'));
	}		
}
