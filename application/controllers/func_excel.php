<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_excel extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('d_post');
		$this->load->model('d_get');
		$this->load->helper('pdf_helper');
	}
	// function send_client(){

	// }

	function excel_client($hold_value)
	{
		// $where = array('hold_id' => $hold_value);
		// $hold_value = $this->input->post('hold_value');
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
		$this->db->from('tbl_print_sales');
		$this->db->join('tbl_posdetails', 'tbl_posdetails.transaction_id = tbl_print_sales.transaction_id');
		$this->db->join('tbl_holdproduct', 'tbl_holdproduct.hold_id = tbl_posdetails.hold_id');
		$this->db->where('tbl_print_sales.hold_id', $hold_value);
		
	    
	    $this->load->library('Excel');
	
		
	    //define column headers
		$headers = array('Transaction ID' => 'string', 'Product' => 'string', 'Customer' => 'string', 'Phone' => 'integer', 'Email' => 'string', 'Quantity' => 'currency', 'Price Nett' => 'currency', 'Tax' => 'currency', 'Discount' => 'currency');
		
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
			$writer->writeSheetRow('Sheet1',array($sf->transaction_id, $sf->pro_name, $sf->custName, $sf->custPhone, $sf->custEmail, $sf->pro_qty, $sf->pro_price, $sf->pro_tax, $sf->pro_disc));
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