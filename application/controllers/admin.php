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
		if($this->session->userdata('status') == "login"){
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
			$this->load->view('admin/body/logoutmodal-1.php');
			// $this->load->view('admin/body/dashboard-1.php', $data);
			$this->load->view('admin/body/dashboard-1.php');
			$this->load->view('admin/footer/footer.php');
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}
	public function reparation()
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
			// $this->load->view('admin/body/dashboard-1.php', $data);
			$this->load->view('admin/body/reparation-1.php',$data);
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
			$data = array(
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
			$data = array(
                'posdata' => $this->d_get->get_posdata('tbl_lookup_category')->result(),
                'posdata' => $this->d_get->get_posdata('tbl_lookup_category')->result()
            );
			$this->load->view('admin/header/header.php');
			$this->load->view('admin/body/sidebar-1.php');
			$this->load->view('admin/body/topbar-1.php');
			$this->load->view('admin/body/logoutmodal-1.php');
			$this->load->view('admin/body/pos-1.php', $data);
			$this->load->view('admin/footer/footer.php');
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
			$data = $this->d_get->get_financedata()->result();
      		$x = array(
      				'data' => json_encode($data),
      				'total' => $this->d_get->get_financedatatotal()->result()
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
