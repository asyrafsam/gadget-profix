<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func_supplier extends CI_Controller {


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
	function add_supplier(){
		
		$sname = $this->input->post('sname');
		$saddress = $this->input->post('saddress');
		$scountry = $this->input->post('scountry');
		$spostal = $this->input->post('spostal');
		$semail = $this->input->post('semail');
		$scompany = $this->input->post('scompany');
		$scity = $this->input->post('scity');
		$sstate = $this->input->post('sstate');
		$sphone = $this->input->post('sphone');
		$svat = $this->input->post('svat');
		$ubranch = $this->input->post('ubranch');
		
		$where = array(
			's_name' => $sname,
			'u_branch' => $ubranch
			);
		$check = $this->D_get->checkSupplier("tbl_supplier",$where)->num_rows();
		$data['tbl_supplier'] = $this->D_get->checkSupplier("tbl_supplier",$where)->result();
		if($check > 0){

			?>
				<script type="text/javascript">
	                alert("Supplier Already Registered");
	                window.location.href = '<?php echo base_url();?>admin/suppliers';
	            </script>
			<?php
		}else{
			$datain = array(
				's_name' => $sname,
				's_address' => $saddress,
				's_country' => $scountry,
				's_postal' => $spostal,
				's_email' => $semail,
				's_company' => $scompany,
				's_city' => $scity,
				's_state' => $sstate,
				's_phone' => $sphone,
				's_vat' => $svat,
				'u_branch' => $ubranch
				);
			$query = $this->D_post->addsupplier($datain,'tbl_supplier');

			$logactivity = 'Add';
	        $moduleclient = 'tbl_supplier';
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

			redirect(base_url('admin/suppliers'));
		}
		
	}

	function edit_supplier($id){

    	$data = $this->D_get->show_supplier($id);
		echo json_encode($data);
    }

	function update_supplier(){

			$sid = $this->input->post('sid-1');
			$sname = $this->input->post('sname-1');
			$saddress = $this->input->post('saddress-1');
			$scountry = $this->input->post('scountry-1');
			$spostal = $this->input->post('spostal-1');
			$semail = $this->input->post('semail-1');
			$scompany = $this->input->post('scompany-1');
			$scity = $this->input->post('scity-1');
			$sstate = $this->input->post('sstate-1');
			$sphone = $this->input->post('sphone-1');
			$svat = $this->input->post('svat-1');

			// var_dump($c_file); exit();

		    $datainn = array(
				's_name' => $sname,
				's_address' => $saddress,
				's_country' => $scountry,
				's_postal' => $spostal,
				's_email' => $semail,
				's_company' => $scompany,
				's_city' => $scity,
				's_state' => $sstate,
				's_phone' => $sphone,
				's_vat' => $svat
			);
		    $where = array(
				's_id' => $sid
			);
		    $query = $this->D_post->updateSuppliers($where,$datainn,'tbl_supplier');

		    $logactivity = 'Edit';
	        $moduleclient = 'tbl_supplier';
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

			redirect(base_url('admin/suppliers'));
    }
	

	function deleteSupplier($id){
		$logactivity = 'Delete';
        $moduleclient = 'tbl_supplier';
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

		$where = array('s_id' => $id);
		$this->D_post->deleteSupplier($where,'tbl_supplier');
		redirect(base_url('admin/suppliers'));
	}		
}
