<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func_excel extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('D_post');
		$this->load->model('D_get');
		$this->load->helper('pdf_helper');
		if(ini_get('date.timezone') == ''){
		    date_default_timezone_set('UTC');
		    
		}
	}
	// function send_client(){

	// }

	function excel_client($hold_value)
	{
		// $where = array('hold_id' => $hold_value);
		// $hold_value = $this->input->post('hold_value');
		$logactivity = 'Print';
        $moduleclient = 'tbl_client';
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

    	$this->db->from('tbl_client');
		$this->db->join('tbl_print_client', 'tbl_print_client.c_id = tbl_client.c_id');
		$this->db->where('tbl_print_client.hold_id', $hold_value);
		
	    
	    $this->load->library('Excel');
	
		
	    //define column headers
		$headers = array('Name' => 'string', 'Geolocate' => 'string', 'City' => 'string', 'Phone No' => 'integer', 'Company' => 'string', 'Address' => 'string', 'Email' => 'string', 'Branch' => 'string');
		
		//fetch data from database
		$query = $this->db->get()->result();
		
		//create writer object
		$writer = new Excel();
		
	        //meta data info
		$keywords = array('xlsx','MySQL','Codeigniter');
		$writer->setTitle('Client Information/Report');
		$writer->setSubject('Report generated using Codeigniter and XLSXWriter');
		$writer->setAuthor('https://www.roytuts.com');
		$writer->setCompany('https://www.roytuts.com');
		$writer->setKeywords($keywords);
		$writer->setDescription('Sales information for products');
		$writer->setTempDir(sys_get_temp_dir());
		
		//write headers
		$writer->writeSheetHeader('Sheet1', $headers);
		
		//write rows to sheet1
		foreach ($query as $sf):
			$writer->writeSheetRow('Sheet1',array($sf->c_name, $sf->c_geolocate, $sf->c_city, $sf->c_telephone, $sf->c_company, $sf->c_address, $sf->c_email, $sf->u_branch));
		endforeach;
		
		$fileLocation = md5(time()).'.xlsx';
		
		//write to xlsx file
		$writer->writeToFile($fileLocation);
		//echo $writer->writeToString();
		
		//force download
		header('Content-Description: File Transfer');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment; filename=".basename($fileLocation));
		header("Content-Transfer-Encoding: binary");
		header("Expires: 0");
		header("Pragma: public");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Length: ' . filesize($fileLocation)); //Remove

		ob_clean();
		flush();

		readfile($fileLocation);
		unlink($fileLocation);
		exit(0);
	    
	}
	function excel_purchase($hold_value)
	{
		// $where = array('hold_id' => $hold_value);
		// $hold_value = $this->input->post('hold_value');
		$logactivity = 'Print';
        $moduleclient = 'tbl_purchase';
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

    	$this->db->from('tbl_purchase');
		$this->db->join('tbl_print_purchase', 'tbl_print_purchase.pur_id = tbl_purchase.id');
		$this->db->join('tbl_purchase_item', 'tbl_purchase_item.hold_id = tbl_purchase.hold_id');
		
		$this->db->where('tbl_print_purchase.hold_id', $hold_value);
		
	    
	    $this->load->library('Excel');
	
		
	    //define column headers
		$headers = array('Name' => 'string', 'Purchase ID' => 'string', 'Supplier' => 'string', 'Item' => 'string', 'Unit Price' => 'integer', 'Quantity' => 'integer', 'Total' => 'integer', 'Note' => 'string', 'Branch' => 'string');

		//fetch data from database
		$query = $this->db->get()->result();
		
		//create writer object
		$writer = new Excel();
		
	        //meta data info
		$keywords = array('xlsx','MySQL','Codeigniter');
		$writer->setTitle('Client Information/Report');
		$writer->setSubject('Report generated using Codeigniter and XLSXWriter');
		$writer->setAuthor('https://www.roytuts.com');
		$writer->setCompany('https://www.roytuts.com');
		$writer->setKeywords($keywords);
		$writer->setDescription('Sales information for products');
		$writer->setTempDir(sys_get_temp_dir());
		
		//write headers
		$writer->writeSheetHeader('Sheet1', $headers);
		
		//write rows to sheet1
		foreach ($query as $sf):
			$writer->writeSheetRow('Sheet1',array($sf->pur_date, $sf->hold_id, $sf->purSupplier, $sf->itemName, $sf->itemPrice, $sf->itemQuantity, $sf->pur_total, $sf->pur_note, $sf->u_branch));
		endforeach;
		
		$fileLocation = md5(time()).'.xlsx';
		
		//write to xlsx file
		$writer->writeToFile($fileLocation);
		//echo $writer->writeToString();
		
		//force download
		header('Content-Description: File Transfer');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment; filename=".basename($fileLocation));
		header("Content-Transfer-Encoding: binary");
		header("Expires: 0");
		header("Pragma: public");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Length: ' . filesize($fileLocation)); //Remove

		ob_clean();
		flush();

		readfile($fileLocation);
		unlink($fileLocation);
		exit(0);
	    
	}
	function excel_stock($hold_value)
	{
		// $where = array('hold_id' => $hold_value);
		// $hold_value = $this->input->post('hold_value');
		$logactivity = 'Print';
        $moduleclient = 'tbl_stock';
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


    	$this->db->from('tbl_print_stock');
		// $this->db->join('tbl_print_client', 'tbl_print_client.c_id = tbl_client.c_id');
		$this->db->where('tbl_print_stock.hold_id', $hold_value);
		
	    
	    $this->load->library('Excel');
	
		
	    //define column headers
		$headers = array('Product ID' => 'string', 'Name' => 'string', 'Code' => 'integer', 'Cost' => 'currency', 'Price' => 'currency', 'Quantity' => 'integer', 'Alert' => 'integer', 'Branch' => 'string');
		
		//fetch data from database
		$query = $this->db->get()->result();
		
		//create writer object
		$writer = new Excel();
		
	        //meta data info
		$keywords = array('xlsx','MySQL','Codeigniter');
		$writer->setTitle('Client Information/Report');
		$writer->setSubject('Report generated using Codeigniter and XLSXWriter');
		$writer->setAuthor('https://www.roytuts.com');
		$writer->setCompany('https://www.roytuts.com');
		$writer->setKeywords($keywords);
		$writer->setDescription('Sales information for products');
		$writer->setTempDir(sys_get_temp_dir());
		
		//write headers
		$writer->writeSheetHeader('Sheet1', $headers);
		
		//write rows to sheet1
		foreach ($query as $sf):
			$writer->writeSheetRow('Sheet1',array($sf->p_id, $sf->p_name, $sf->p_code, $sf->p_cost, $sf->p_price, $sf->p_quantity, $sf->p_alertQuantity, $sf->u_branch));
		endforeach;
		
		$fileLocation = md5(time()).'.xlsx';
		
		//write to xlsx file
		$writer->writeToFile($fileLocation);
		//echo $writer->writeToString();
		
		//force download
		header('Content-Description: File Transfer');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment; filename=".basename($fileLocation));
		header("Content-Transfer-Encoding: binary");
		header("Expires: 0");
		header("Pragma: public");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Length: ' . filesize($fileLocation)); //Remove

		ob_clean();
		flush();

		readfile($fileLocation);
		unlink($fileLocation);
		exit(0);
	    
	}
	function excel_sales($hold_value)
	{
		$logactivity = 'Print';
        $moduleclient = 'tbl_sales';
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

		$this->db->from('tbl_print_sales');
		$this->db->join('tbl_posdetails', 'tbl_posdetails.transaction_id = tbl_print_sales.transaction_id');
		$this->db->join('tbl_holdproduct', 'tbl_holdproduct.hold_id = tbl_posdetails.hold_id');
		$this->db->where('tbl_print_sales.hold_id', $hold_value);
		
	    
	    $this->load->library('Excel');
	
		
	    //define column headers
		$headers = array('Transaction ID' => 'string', 'Product' => 'string', 'Customer' => 'string', 'Phone' => 'integer', 'Email' => 'string', 'Quantity' => 'currency', 'Price Nett' => 'currency');
		
		//fetch data from database
		$query = $this->db->get()->result();
		
		//create writer object
		$writer = new Excel();
		
	        //meta data info
		$keywords = array('xlsx','MySQL','Codeigniter');
		$writer->setTitle('Client Information/Report');
		$writer->setSubject('Report generated using Codeigniter and XLSXWriter');
		$writer->setAuthor('https://www.roytuts.com');
		$writer->setCompany('https://www.roytuts.com');
		$writer->setKeywords($keywords);
		$writer->setDescription('Sales information for products');
		$writer->setTempDir(sys_get_temp_dir());
		
		//write headers
		$writer->writeSheetHeader('Sheet1', $headers);
		
		//write rows to sheet1
		foreach ($query as $sf):
			$writer->writeSheetRow('Sheet1',array($sf->transaction_id, $sf->pro_name, $sf->custName, $sf->custPhone, $sf->custEmail, $sf->pro_qty, $sf->pro_price));
		endforeach;
		
		$fileLocation = md5(time()).'.xlsx';
		
		//write to xlsx file
		$writer->writeToFile($fileLocation);
		//echo $writer->writeToString();
		
		//force download
		header('Content-Description: File Transfer');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment; filename=".basename($fileLocation));
		header("Content-Transfer-Encoding: binary");
		header("Expires: 0");
		header("Pragma: public");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Length: ' . filesize($fileLocation)); //Remove

		ob_clean();
		flush();

		readfile($fileLocation);
		unlink($fileLocation);
		exit(0);
	    
	}
	function excel_sales_reparation($hold_value)
	{
		$logactivity = 'Print';
        $moduleclient = 'tbl_print_sales_reparation';
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

		$this->db->from('tbl_print_sales_repair');
		$this->db->join('tbl_reparation', 'tbl_reparation.r_repairno = tbl_print_sales_repair.r_repairno');
		$this->db->join('tbl_hold', 'tbl_hold.random_id = tbl_reparation.hold_id');
		$this->db->where('tbl_print_sales_repair.hold_id', $hold_value);
		
	    
	    $this->load->library('Excel');
	
		
	    //define column headers
		$headers = array('Repair No' => 'string', 'Product' => 'string', 'Customer' => 'string', 'Phone' => 'integer', 'Email' => 'string', 'Quantity' => 'currency', 'Price Nett' => 'currency');
		
		//fetch data from database
		$query = $this->db->get()->result();
		
		//create writer object
		$writer = new Excel();
		
	        //meta data info
		$keywords = array('xlsx','MySQL','Codeigniter');
		$writer->setTitle('Reparation Sales');
		$writer->setSubject('Report generated using Codeigniter and XLSXWriter');
		$writer->setAuthor('https://www.roytuts.com');
		$writer->setCompany('https://www.roytuts.com');
		$writer->setKeywords($keywords);
		$writer->setDescription('Sales information for reparation');
		$writer->setTempDir(sys_get_temp_dir());
		
		//write headers
		$writer->writeSheetHeader('Sheet1', $headers);
		
		//write rows to sheet1
		foreach ($query as $sf):
			$writer->writeSheetRow('Sheet1',array($sf->r_repairno, $sf->product_name, $sf->custName, $sf->custPhone, $sf->custEmail, $sf->quantity, $sf->unit_price));
		endforeach;
		
		$fileLocation = md5(time()).'.xlsx';
		
		//write to xlsx file
		$writer->writeToFile($fileLocation);
		//echo $writer->writeToString();
		
		//force download
		header('Content-Description: File Transfer');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment; filename=".basename($fileLocation));
		header("Content-Transfer-Encoding: binary");
		header("Expires: 0");
		header("Pragma: public");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Length: ' . filesize($fileLocation)); //Remove

		ob_clean();
		flush();

		readfile($fileLocation);
		unlink($fileLocation);
		exit(0);
	    
	}
}
?>