<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('m_data');
		$this->load->model('d_get');
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
	}
	public function index()
	{
		// $where = $this->session->userdata("name");
		// $data['admin'] = $this->m_data->view_user($where,'admin')->result();

		// var_dump($this->session->userdata('role')); exit;
		$branch = $this->session->userdata('branch');

		if($this->session->userdata('status') == "login"){
			$financerevenue = $this->d_get->get_financedata($branch)->result();
			$data = array(
				'data' => json_encode($financerevenue),
                'getClient' => $this->d_get->getClient()->result(),
                'getReparation' => $this->d_get->getReparation()->result(),
                'getRevenue' => $this->d_get->getRevenue()->result(),
                'getRevenueMonth' => $this->d_get->getRevenuebyMonth()->result()
            );

			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			if($this->session->userdata('repairview') > 0){
				$data = array(
	                'reparation' => $this->d_get->view_reparation()->result(),
	                'item' => $this->d_get->get_item()->result(),
	                'client' => $this->d_get->get_client()->result()
	            );
				$this->load->view('admin/header/header.php');
				$this->load->view('admin/body/sidebar-1.php');
				$this->load->view('admin/body/topbar-1.php');
				$this->load->view('admin/body/logoutmodal-1.php');
				// $this->load->view('admin/body/dashboard-1.php', $data);
				$this->load->view('admin/body/reparation-1.php',$data);
				$this->load->view('admin/body/reparation-1-view.php',$data);
				$this->load->view('admin/body/reparation-1-payment.php',$data);
				$this->load->view('admin/body/reparation-1-edit.php',$data);
				$this->load->view('admin/body/reparation-1-viewpayment.php',$data);
				$this->load->view('admin/body/reparation-1-log.php',$data);
				$this->load->view('admin/footer/footer.php');
			}else{
				return $this->index();
			}
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function reparation_completed()
	{
		if($this->session->userdata('status') == "login"){
			$data = array(
                'reparation' => $this->d_get->view_reparation()->result(),
                'item' => $this->d_get->get_item()->result(),
                'client' => $this->d_get->get_client()->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/reparation-2.php',$data);
			$this->load->view('admin/body/reparation-1-view.php',$data);
			$this->load->view('admin/body/reparation-1-payment.php',$data);
			$this->load->view('admin/body/reparation-1-edit.php',$data);
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
			$where = $this->input->post('reparationID');
			$data = array(
                'reparationname' => $this->d_get->get_reparationandhold($where,'tbl_reparation')->result(),
                'item' => $this->d_get->get_reparationitem($where,'tbl_reparation')->result(),
                'reparationdetails' => $this->d_get->get_reparationandpayment($where)->result(),
                'client' => $this->d_get->get_client()->result()
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
			$where = $id;
			$detailsid = 1;
			$branch = $this->session->userdata('branch');
			$data = array(
				'invoicedetails' => $this->d_get->get_invoicedetails($branch,'tbl_invoice_details')->result(),
                'reparationname' => $this->d_get->get_reparationandhold($where,'tbl_reparation')->result(),
                'item' => $this->d_get->get_reparationitem($where,'tbl_reparation')->result(),
                'reparationdetails' => $this->d_get->get_reparationandpayment($where)->result(),
                'client' => $this->d_get->get_client()->result()
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
			$this->session->set_flashdata('item',"item");
			$data['client'] = $this->d_get->get_client()->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$data['product'] = $this->d_get->get_product()->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$data['productcat'] = $this->d_get->get_productcat()->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$data['product2'] = $this->d_get->get_productbyid($where,'tbl_product')->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$where = array('p_id' => $id);
			$data['product2'] = $this->d_get->get_productbyid($where,'tbl_product')->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$this->session->set_flashdata('item',"item");
			$data['supplier'] = $this->d_get->get_supplier()->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$this->session->set_flashdata('item',"item");
			$data['manufacturer'] = $this->d_get->get_manufacturer()->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$this->session->set_flashdata('item',"item");
			$data['model'] = $this->d_get->get_model()->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			if($query1->num_rows() > 0){
				$data = array(
	                'posdata' => $this->d_get->get_posdata('tbl_lookup_category')->result(),
	                'posdata' => $this->d_get->get_posdata('tbl_lookup_category')->result()
	            );

	            if($currentdatetime <= 18)
	            {
	            	$this->load->view('admin/header/header.php');
					$this->load->view('admin/body/sidebar-1.php');
					$this->load->view('admin/body/topbar-1.php');
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
					$this->load->view('admin/body/topbar-1.php');
					$this->load->view('admin/body/logoutmodal-1.php');
					$this->load->view('admin/body/close-drawer-1.php', $query2);
					$this->load->view('admin/footer/footer.php');
	            }
				
			}else{
				$this->load->view('admin/header/header.php');
				$this->load->view('admin/body/sidebar-1.php');
				$this->load->view('admin/body/topbar-1.php');
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
			$data['purchase'] = $this->d_get->get_purchase()->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$data = array(
				$content = $this->input->post('content'),
                'reparation' => $this->d_get->view_reparation()->result(),
                'item' => $this->d_get->get_item()->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$data = array(
                'purchase' => $this->d_get->get_purchasebyholdid($id)->result(),
                'item' => $this->d_get->get_item()->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$data = array(
                'purchase' => $this->d_get->get_purchasebyholdid($id)->result(),
                'select' => $this->d_get->get_item()->result(),
                'item' => $this->d_get->get_purchasebyholditem($id)->result(),
                'itempurchase' => $this->d_get->get_purchasebyholditempurchase($id),
                'hold' => $this->d_get->get_holdiditem($id)->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
		    $jsonecjo['data'] = $chartdata;
		    // echo "<pre>";
		    // print_r($chartdata);
		    // echo "</pre>";

		    // var_dump($jsonecjo); exit();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/chart-stock-1.php', ['jsonecjo' => $chartdata]);
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
   //              'purchase' => $this->d_get->get_purchasebyholdid($id)->result(),
   //              'select' => $this->d_get->get_item()->result(),
   //              'item' => $this->d_get->get_purchasebyholditem($id)->result(),
   //              'itempurchase' => $this->d_get->get_purchasebyholditempurchase($id),
   //              'hold' => $this->d_get->get_holdiditem($id)->result()
   //          );
			$branch = $this->session->userdata('branch');
			$data = $this->d_get->get_financedata($branch)->result();
      		$x = array(
      				'data' => json_encode($data),
      				'total' => $this->d_get->get_financedatatotal($branch)->result()
      			);
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			$data['product'] = $this->d_get->get_reportproduct()->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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

			$data['sales'] = $this->d_get->get_salesproduct($m)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
	public function print_view_sales($hold_id){
		if($this->session->userdata('status') == "login"){
			// $getCode = $this->input->post('reparationID');
			$where = $hold_id;
			$data = array(
                'getposdetails' => $this->d_get->get_posdetails($where,'tbl_posdetails')->result(),
                'getproductdetails' => $this->d_get->get_productdetails($where,'tbl_holdproduct')->result(),
                'getcalculation' => $this->d_get->get_calculation($where)->result()
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

			$data['drawer'] = $this->d_get->get_drawerreport($m)->result();
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
				'invoicedetails' => $this->d_get->get_invoicedetails($branch,'tbl_invoice_details')->result()
            );
			
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
				'userdetails' => $this->d_get->get_users($branch,'tbl_user')->result()
            );
			
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
			
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
				'userdetails' => $this->d_get->get_usersupdate($id,'tbl_user')->result(),
				'usergroup' => $this->d_get->get_usersgroup('tbl_user_group')->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
				'usergroup' => $this->d_get->get_usersgroup('tbl_user_group')->result(),
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
				'usergroup' => $this->d_get->get_usersgroup('tbl_user_group')->result(),
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
				'repairstatus' => $this->d_get->get_repairstatus($branch,'tbl_repair_status')->result(),
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
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
				'viewdatabase' => $this->d_get->get_database($branch,'tbl_database')->result(),
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/viewdatabase-1.php', $data);
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
