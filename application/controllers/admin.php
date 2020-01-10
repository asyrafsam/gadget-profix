<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('M_data');
		$this->load->model('D_get');
		$this->load->helper("URL", "DATE", "URI", "FORM");
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		// $this->load->model('m_upload');
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("main/index"));
		// } else {
		// 	$this->session->sess_destroy();
		// 	//redirect(base_url("main/index"));
		// }
		if(ini_get('date.timezone') == ''){
		    date_default_timezone_set('UTC');
		}
	}
	public function index()
	{
		// $where = $this->session->userdata("name");
		// $data['admin'] = $this->M_data->view_user($where,'admin')->result();

		// var_dump($this->session->userdata('role')); exit;
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$financerevenue = $this->D_get->get_financedata($branch)->result();
			$data = array(
				'data' => json_encode($financerevenue),
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
                'getClient' => $this->D_get->getClient($branch)->result(),
                'getReparation' => $this->D_get->getReparation($branch)->result(),
                'getRevenue' => $this->D_get->getRevenue($branch)->result(),
                'getRevenueMonth' => $this->D_get->getRevenuebyMonth($branch)->result()
            );

			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/dashboard-1.php', $data);
			// $this->load->view('admin/body/dashboard-1.php');
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function reparation()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$currentdate = date('Y-m-d');
			$currentdatetime = date('H');
			// echo $currentdate; exit();
			$this->db->select('openTime');
			$this->db->from('tbl_drawer');
			// $this->db->where('openTime', $currentdate);
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where(array('closedTime' => NULL));
			$this->db->where('u_branch', $branch);
			$query1 = $this->db->get();
			if($query1->num_rows() > 0){
				if($currentdatetime <= 18)
				// if($currentdatetime <= 24)
	            {
					if($this->session->userdata('repairview') > 0){
						$data = array(
							'getNotification' => $this->D_get->getNotification($branch)->result(),
							'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
			                'reparation' => $this->D_get->view_reparation($branch)->result(),
			                'item' => $this->D_get->get_item($branch)->result(),
			                'client' => $this->D_get->get_client($branch)->result()
			            );
						$this->load->view('admin/header/header.php');
						$this->load->view('admin/body/sidebar-1.php');
						$this->load->view('admin/body/topbar-1.php', $data);
						$this->load->view('admin/body/logoutmodal-1.php');
						// $this->load->view('admin/body/dashboard-1.php', $data);
						$this->load->view('admin/body/reparation-1.php',$data);
						$this->load->view('admin/body/reparation-1-view.php',$data);
						$this->load->view('admin/body/reparation-1-payment.php',$data);
						$this->load->view('admin/body/reparation-1-edit.php',$data);
						$this->load->view('admin/body/reparation-1-editStatus.php',$data);
						$this->load->view('admin/body/reparation-1-viewpayment.php',$data);
						$this->load->view('admin/body/reparation-1-log.php',$data);
						$this->load->view('admin/footer/footer.php');
					}else{
						return $this->index();
					}
					}else{
						$data = array(
							'getNotification' => $this->D_get->getNotification($branch)->result(),
							'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
						);
		            	$this->db->select('currentBalance');
						$this->db->from('tbl_drawer');
						// $this->db->where('openTime', $currentdate);
						$this->db->where('DAY(openTime)', date('d'));
						$this->db->where('MONTH(openTime)', date('m'));
						$this->db->where('YEAR(openTime)', date('Y'));
						$this->db->where(array('closedTime' => NULL));
						$this->db->where('u_branch', $branch);
						$query2['drawercurrent'] = $this->db->get()->result();
		            	$this->load->view('admin/header/header.php');
						$this->load->view('admin/body/sidebar-1.php');
						$this->load->view('admin/body/topbar-1.php', $data);
						$this->load->view('admin/body/logoutmodal-1.php');
						$this->load->view('admin/body/close-drawer-1.php', $query2);
						$this->load->view('admin/footer/footer.php');
					}
			}else{
				$data = array(
					'getNotification' => $this->D_get->getNotification($branch)->result(),
					'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				);
				$this->load->view('admin/header/header.php');
				$this->load->view('admin/body/sidebar-1.php');
				$this->load->view('admin/body/topbar-1.php', $data);
				$this->load->view('admin/body/logoutmodal-1.php');
				$this->load->view('admin/body/open-drawer-1.php');
				$this->load->view('admin/footer/footer.php');
			}
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function reparationsearch()
	{
		if($this->session->userdata('status') == "login"){
			$searchby = $this->input->post('searchby');
			$branch = $this->session->userdata('branch');
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$currentdate = date('Y-m-d');
			$currentdatetime = date('H');
			// echo $currentdate; exit();
			$this->db->select('openTime');
			$this->db->from('tbl_drawer');
			// $this->db->where('openTime', $currentdate);
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where(array('closedTime' => NULL));
			$this->db->where('u_branch', $branch);
			$query1 = $this->db->get();
			if($query1->num_rows() > 0){
				// if($currentdatetime <= 18)
				if($currentdatetime <= 24)
	            {
					if($this->session->userdata('repairview') > 0){
						$data = array(
							'getNotification' => $this->D_get->getNotification($branch)->result(),
							'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
			                'reparation' => $this->D_get->view_reparationsearch($branch,$searchby)->result(),
			                'item' => $this->D_get->get_item($branch)->result(),
			                'client' => $this->D_get->get_client($branch)->result(),
			            );
						$this->load->view('admin/header/header.php');
						$this->load->view('admin/body/sidebar-1.php');
						$this->load->view('admin/body/topbar-1.php', $data);
						$this->load->view('admin/body/logoutmodal-1.php');
						// $this->load->view('admin/body/dashboard-1.php', $data);
						$this->load->view('admin/body/reparation-1-search.php',$data);
						$this->load->view('admin/body/reparation-1-view.php',$data);
						$this->load->view('admin/body/reparation-1-payment.php',$data);
						$this->load->view('admin/body/reparation-1-edit.php',$data);
						$this->load->view('admin/body/reparation-1-editStatus.php',$data);
						$this->load->view('admin/body/reparation-1-viewpayment.php',$data);
						$this->load->view('admin/body/reparation-1-log.php',$data);
						$this->load->view('admin/footer/footer.php');
					}else{
						return $this->index();
					}
					}else{
						$data = array(
							'getNotification' => $this->D_get->getNotification($branch)->result(),
							'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
						);
		            	$this->db->select('currentBalance');
						$this->db->from('tbl_drawer');
						// $this->db->where('openTime', $currentdate);
						$this->db->where('DAY(openTime)', date('d'));
						$this->db->where('MONTH(openTime)', date('m'));
						$this->db->where('YEAR(openTime)', date('Y'));
						$this->db->where(array('closedTime' => NULL));
						$this->db->where('u_branch', $branch);
						$query2['drawercurrent'] = $this->db->get()->result();
		            	$this->load->view('admin/header/header.php');
						$this->load->view('admin/body/sidebar-1.php');
						$this->load->view('admin/body/topbar-1.php', $data);
						$this->load->view('admin/body/logoutmodal-1.php');
						$this->load->view('admin/body/close-drawer-1.php', $query2);
						$this->load->view('admin/footer/footer.php');
					}
			}else{
				$data = array(
					'getNotification' => $this->D_get->getNotification($branch)->result(),
					'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				);
				$this->load->view('admin/header/header.php');
				$this->load->view('admin/body/sidebar-1.php');
				$this->load->view('admin/body/topbar-1.php', $data);
				$this->load->view('admin/body/logoutmodal-1.php');
				$this->load->view('admin/body/open-drawer-1.php');
				$this->load->view('admin/footer/footer.php');
			}
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function reparation_completed()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
                'reparation' => $this->D_get->view_reparationcompleted($branch)->result(),
                'item' => $this->D_get->get_item($branch)->result(),
                'client' => $this->D_get->get_client($branch)->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/reparation-2.php',$data);
			$this->load->view('admin/body/reparation-1-view.php',$data);
			$this->load->view('admin/body/reparation-1-payment.php',$data);
			$this->load->view('admin/body/reparation-1-edit.php',$data);
			$this->load->view('admin/body/reparation-1-editStatus.php',$data);
			$this->load->view('admin/body/reparation-1-viewpayment.php',$data);
			$this->load->view('admin/body/reparation-1-log.php',$data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function print_reparation_report(){
		if($this->session->userdata('status') == "login"){
			$logactivity = 'Print';
	        $moduleclient = 'tbl_reparation';
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

			$branch = $this->session->userdata('branch');
			$where = $this->input->post('reparationID');
			$data = array(
                'reparationname' => $this->D_get->get_reparationandhold($where,'tbl_reparation')->result(),
                'item' => $this->D_get->get_reparationitem($where,'tbl_reparation')->result(),
                'reparationdetails' => $this->D_get->get_reparationandpayment($where)->result(),
                'client' => $this->D_get->get_client($branch)->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/print_report_reparation.php',$data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function print_reparation_invoice($id){
		if($this->session->userdata('status') == "login"){
			// $getCode = $this->input->post('reparationID');
			$logactivity = 'Print Invoice';
	        $moduleclient = 'tbl_reparation';
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

			$where = $id;
			$detailsid = 1;
			$branch = $this->session->userdata('branch');
			$data = array(
				'invoicedetails' => $this->D_get->get_invoicedetails($branch,'tbl_invoice_details')->result(),
                'reparationname' => $this->D_get->get_reparationandhold($where,'tbl_reparation')->result(),
                'item' => $this->D_get->get_reparationitem($where,'tbl_reparation')->result(),
                'reparationdetails' => $this->D_get->get_reparationandpayment($where)->result(),
                'client' => $this->D_get->get_client($branch)->result()
            );
			
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/reparation-1-invoice.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function client()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$this->session->set_flashdata('item',"item");
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'client' => $this->D_get->get_client($branch)->result()
			);
			// $data['client'] = $this->D_get->get_client($branch)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/client-1.php',$data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function stock()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'product' => $this->D_get->get_product($branch)->result(),
			);
			// $data['product'] = $this->D_get->get_product($branch)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/stock-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function add_stock()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'productcat' => $this->D_get->get_productcat($branch)->result(),
				'getModels' => $this->D_get->get_models($branch)->result()
			);
			// $data['productcat'] = $this->D_get->get_productcat($branch)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/add-stock-1.php', $data);
			$this->load->view('admin/body/add-stock-1-category.php', $data);
			$this->load->view('admin/body/add-stock-1-subcategory.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function editStock($id)
	{
		if($this->session->userdata('status') == "login"){
			$where = array('p_id' => $id);
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'product2' => $this->D_get->get_productbyid($where,'tbl_product')->result()
			);
			// $data['product2'] = $this->D_get->get_productbyid($where,'tbl_product')->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/updateStock-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function duplicateProduct($id)
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$where = array('p_id' => $id);
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'product2' => $this->D_get->get_productbyid($where,'tbl_product')->result()
			);
			// $data['product2'] = $this->D_get->get_productbyid($where,'tbl_product')->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/duplicateProduct-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function suppliers()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$this->session->set_flashdata('item',"item");
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'supplier' => $this->D_get->get_supplier($branch)->result()
			);
			// $data['supplier'] = $this->D_get->get_supplier($branch)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/suppliers-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function manufacturers()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$this->session->set_flashdata('item',"item");
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'manufacturer' => $this->D_get->get_manufacturer($branch)->result()
			);
			// $data['manufacturer'] = $this->D_get->get_manufacturer($branch)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/manufacturers-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function models()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$this->session->set_flashdata('item',"item");
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'model' => $this->D_get->get_model($branch)->result()
			);
			// $data['model'] = $this->D_get->get_model($branch)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/models-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function pos()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$currentdate = date('Y-m-d');
			$currentdatetime = date('H');
			// echo $currentdate; exit();
			$this->db->select('openTime');
			$this->db->from('tbl_drawer');
			// $this->db->where('openTime', $currentdate);
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where(array('closedTime' => NULL));
			$this->db->where('u_branch', $branch);
			$query1 = $this->db->get();
			// echo $this->db->last_query(); exit();
			$datatopbar = array(
					'getNotification' => $this->D_get->getNotification($branch)->result(),
					'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
			);
			if($query1->num_rows() > 0){
				$data = array(
					'getNotification' => $this->D_get->getNotification($branch)->result(),
					'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
	                // 'posdata' => $this->D_get->get_posdata($branch,'tbl_lookup_category')->result(),
	                'posdata' => $this->D_get->get_posdata($branch, 'tbl_lookup_category')->result()
	            );

	            // if($currentdatetime <= 18)
	            if($currentdatetime <= 24)
	            {
	            	$this->load->view('admin/header/header.php');
					$this->load->view('admin/body/sidebar-1.php');
					$this->load->view('admin/body/topbar-1.php', $datatopbar);
					$this->load->view('admin/body/logoutmodal-1.php');
					$this->load->view('admin/body/pos-1.php', $data);
					$this->load->view('admin/footer/footer.php');
	            }else{
	            	$this->db->select('currentBalance');
					$this->db->from('tbl_drawer');
					// $this->db->where('openTime', $currentdate);
					$this->db->where('DAY(openTime)', date('d'));
					$this->db->where('MONTH(openTime)', date('m'));
					$this->db->where('YEAR(openTime)', date('Y'));
					$this->db->where(array('closedTime' => NULL));
					$this->db->where('u_branch', $branch);
					$query2['drawercurrent'] = $this->db->get()->result();
	            	$this->load->view('admin/header/header.php');
					$this->load->view('admin/body/sidebar-1.php');
					$this->load->view('admin/body/topbar-1.php', $datatopbar);
					$this->load->view('admin/body/logoutmodal-1.php');
					$this->load->view('admin/body/close-drawer-1.php', $query2);
					$this->load->view('admin/footer/footer.php');
	            }
				
			}else{
				$this->load->view('admin/header/header.php');
				$this->load->view('admin/body/sidebar-1.php');
				$this->load->view('admin/body/topbar-1.php', $datatopbar);
				$this->load->view('admin/body/logoutmodal-1.php');
				$this->load->view('admin/body/open-drawer-1.php');
				$this->load->view('admin/footer/footer.php');
			}
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function view_purchase()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'purchase' => $this->D_get->get_purchase($branch)->result()
			);
			// $data['purchase'] = $this->D_get->get_purchase($branch)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/view-purchase-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function add_purchase()
	{
		if($this->session->userdata('status') == "login"){
			// $data = array();
			//     if($this->input->post('submit') != NULL ){ 
						
			// 	$content = $this->input->post('content');
			// 	$data['content'] = $content;
						
			//     }
			$branch = $this->session->userdata('branch');
			$data = array(
				$content = $this->input->post('content'),
                'reparation' => $this->D_get->view_reparation($branch)->result(),
                'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
                'item' => $this->D_get->get_item($branch)->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/add-purchase-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function editPurchase($id)
	{
		if($this->session->userdata('status') == "login"){
			// $where = array('hold_id' => $id);
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
                'purchase' => $this->D_get->get_purchasebyholdid($id)->result(),
                'item' => $this->D_get->get_item($branch)->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/update-purchase-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function purchaseBarcode($id)
	{
		if($this->session->userdata('status') == "login"){
			// $where = array('hold_id' => $id);
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
                'purchase' => $this->D_get->get_purchasebyholdid($id)->result(),
                'select' => $this->D_get->get_item()->result(),
                'item' => $this->D_get->get_purchasebyholditem($id)->result(),
                'itempurchase' => $this->D_get->get_purchasebyholditempurchase($id),
                'hold' => $this->D_get->get_holdiditem($id)->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/print-barcode-purchase-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function stock_chart(){
		if($this->session->userdata('status') == "login"){

			// $monthQuery =  $this->db->query("SELECT SUM(revenue_subtotal) as total_revenue FROM tbl_revenue WHERE YEAR(revenue_date) = '" . date('Y') . "'"); 
			$branch = $this->session->userdata('branch');
			$query1 =  $this->db->query("SELECT SUM(revenue_subtotal) as total_revenue FROM tbl_revenue WHERE u_branch = '".$branch."'"); 
		       
		    $query2 =  $this->db->query("SELECT SUM(p_cost) as product_cost, SUM(p_quantity) as product_quantity FROM tbl_product WHERE u_branch = '".$branch."'"); 
		 
		    $data1 = $query1->result();
		    $data2 = $query2->result();

		    foreach ($data1 as $rev) {
		    	$test1 = $rev->total_revenue;
		    }

		    foreach ($data2 as $pro) {
		    	$test2 = $pro->product_cost;
		    	$test3 = $pro->product_quantity;
		    }

		    // $test4 = array(
		    // 				'total_revenue' => $test1,
		    // 				'product_cost' => $test2,
		    // 				'product_quantity' => $test3
		    // 			);
		    $chartdata = array(
		    				'total_revenue' => $test1,
		    				'product_cost' => $test2,
		    				'product_quantity' => $test3
		    			);
		    $chartdata = [
		    	['name' => 'Revenue', 'total' => $test1],
		    	['name' => 'Cost', 'total' => $test2],
		    	['name' => 'Quantity','total' => $test3]
		   ];


		    // echo $test4; exit();
		    // print_r($chartdata); exit();
		   	// var_dump(json_encode($chartdata));exit();
		   $datato = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'data' => $chartdata,
				'total' => $this->D_get->get_productcount($branch)->result(),
			);
		   
		    // echo "<pre>";
		    // print_r($chartdata);
		    // echo "</pre>";

		    // var_dump($jsonecjo); exit();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $datato);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/chart-stock-1.php', $datato);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function finance_chart(){
		if($this->session->userdata('status') == "login"){
			// $where = array('hold_id' => $id);
			// $data = array(
   //              'purchase' => $this->D_get->get_purchasebyholdid($id)->result(),
   //              'select' => $this->D_get->get_item()->result(),
   //              'item' => $this->D_get->get_purchasebyholditem($id)->result(),
   //              'itempurchase' => $this->D_get->get_purchasebyholditempurchase($id),
   //              'hold' => $this->D_get->get_holdiditem($id)->result()
   //          );
			$branch = $this->session->userdata('branch');
			$data = $this->D_get->get_financedata($branch)->result();
      		$x = array(
      				'getNotification' => $this->D_get->getNotification($branch)->result(),
					'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
      				'data' => json_encode($data),
      				'total' => $this->D_get->get_financedatatotal($branch)->result()
      			);
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $x);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/chart-finance-1.php', $x);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function reportstock()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
                'product' => $this->D_get->get_reportproduct($branch)->result(),
            );
			// $data['product'] = $this->D_get->get_reportproduct()->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/stockreport-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function viewsales()
	{
		if($this->session->userdata('status') == "login"){
			$m = date('m');
			$y = date('Y');
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
                'sales' => $this->D_get->get_salesproduct($m,$y,$branch)->result(),
                // 'cust' => $this->D_get->get_salescustomer($m,$y,$branch)->result(),
            );
			// $data['sales'] = $this->D_get->get_salesproduct($m,$branch)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/salesreport-1.php', $data);
			$this->load->view('admin/body/salesreport-1-viewpayment.php', $data);
			$this->load->view('admin/body/salesreport-1-addpayment.php', $data);
			$this->load->view('admin/body/salesreport-1-viewsalesdetails.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function viewsalesreparation()
	{
		if($this->session->userdata('status') == "login"){
			$m = date('m');
			$y = date('Y');
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
                'sales' => $this->D_get->get_salesreparation($m,$y,$branch)->result(),
                // 'cust' => $this->D_get->get_salescustomer($m,$y,$branch)->result(),
            );
			// $data['sales'] = $this->D_get->get_salesproduct($m,$branch)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/salesreportreparation-1.php', $data);
			$this->load->view('admin/body/salesreportreparation-1-view.php', $data);
			$this->load->view('admin/body/salesreportreparation-1-viewpayment.php', $data);
			$this->load->view('admin/body/salesreportreparation-1-payment.php', $data);
			$this->load->view('admin/body/salesreport-1-addpayment.php', $data);
			$this->load->view('admin/body/salesreport-1-viewsalesdetails.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function print_view_sales($hold_id){
		if($this->session->userdata('status') == "login"){
			// $getCode = $this->input->post('reparationID');
			$where = $hold_id;
			$data = array(
                'getposdetails' => $this->D_get->get_posdetails($where,'tbl_posdetails')->result(),
                'getproductdetails' => $this->D_get->get_productdetails($where,'tbl_holdproduct')->result(),
                'getcalculation' => $this->D_get->get_calculation($where)->result()
            );
			
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/salesreport-1-viewsales.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function viewdrawer()
	{
		if($this->session->userdata('status') == "login"){
			$m = date('m');
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
                'drawer' => $this->D_get->get_drawerreport($m,$branch)->result(),
            );
			// $data['drawer'] = $this->D_get->get_drawerreport($m,$branch)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/drawerreport-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function setting(){
		if($this->session->userdata('status') == "login"){
			// $getCode = $this->input->post('reparationID');
			// $where = $hold_id;
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'invoicedetails' => $this->D_get->get_invoicedetails($branch,'tbl_invoice_details')->result()
            );
			
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/systemsetting-1-invoice.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function userlist(){
		if($this->session->userdata('status') == "login"){
			// $getCode = $this->input->post('reparationID');
			// $where = $hold_id;
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'userdetails' => $this->D_get->get_users($branch,'tbl_user')->result()
            );
			
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/userlist-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function userlist_add(){
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'getBranch' => $this->D_get->getBranchAdd()->result(),
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/userlist-1-add.php');
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function userlist_update($id){
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'userdetails' => $this->D_get->get_usersupdate($id,'tbl_user')->result(),
				'usergroup' => $this->D_get->get_usersgroup($branch,'tbl_user_group')->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/userlist-1-update.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function usergroup(){
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'usergroup' => $this->D_get->get_usersgroup($branch,'tbl_user_group')->result(),
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/grouplist-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function usergroup_permission(){
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'usergroup' => $this->D_get->get_usersgroup($branch,'tbl_user_group')->result(),
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/grouplist-1-changepermission.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function repairstatus(){
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'repairstatus' => $this->D_get->get_repairstatus($branch,'tbl_repair_status')->result(),
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/repairstatus-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function viewdatabase(){
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'viewdatabase' => $this->D_get->get_database($branch,'tbl_database')->result(),
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/viewdatabase-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function logactivity()
	{
		if($this->session->userdata('status') == "login"){
			$branch = $this->session->userdata('branch');
			$id = $this->session->userdata('id');
			$data = array(
				'getNotification' => $this->D_get->getNotification($branch)->result(),
				'getNotificationDetails' => $this->D_get->getNotificationDetails($branch)->result(),
				'viewactivity' => $this->D_get->getActivity($branch,'tbl_log_activity',$id)->result(),
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php', $data);
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/log-activity-1.php', $data);
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function test()
	{
		if($this->session->userdata('status') == "login"){
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/test.php');
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
}
