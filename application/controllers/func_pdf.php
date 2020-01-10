<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func_pdf extends CI_Controller {
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

	function pdf_client($hold_value)
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
		
	    
	    $this->load->library('Pdf');
	
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://www.roytuts.com');
		$pdf->SetTitle('Client Information/Report');
		$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
		$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		$pdf->SetFont('times', 'BI', 12);
		
		// ---------------------------------------------------------
		
		
		//Generate HTML table data from MySQL - start
		$template = array(
			'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
		);

		$this->table->set_template($template);

		$this->table->set_heading('Name', 'Geolocate', 'City', 'Phone No', 'Company', 'Address', 'Email', 'Branch');
		
		// $salesinfo = $this->product_model->get_salesinfo();
		$query = $this->db->get()->result();

		foreach ($query as $sf):
			$this->table->add_row($sf->c_name, $sf->c_geolocate, $sf->c_city, $sf->c_telephone, $sf->c_company, $sf->c_address, $sf->c_email, $sf->u_branch);
		endforeach;
		
		$html = $this->table->generate();
		//Generate HTML table data from MySQL - end
		
		// add a page
		$pdf->AddPage();
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		
		//Close and output PDF document
		$pdf->Output(md5(time()).'.pdf', 'D');
		
		// return $this->deleteHoldClient($hold_value);
	    // $this->load->view('admin/body/testpdf.php', $query);
	    
	}
	function pdf_purchase_unit($hold_value){
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
		$this->db->join('tbl_purchase_item', 'tbl_purchase.hold_id = tbl_purchase_item.hold_id');
		$this->db->where('tbl_purchase.hold_id', $hold_value);
		
		$this->load->library('PdfPurchase');
	
		$pdf = new PdfPurchase(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://www.roytuts.com');
		$pdf->SetTitle('Client Information/Report');
		$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
		$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		$pdf->SetFont('times', 'BI', 12);
		
		// ---------------------------------------------------------
		
		
		//Generate HTML table data from MySQL - start
		$template = array(
			'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
		);

		$this->table->set_template($template);

		$this->table->set_heading('Date', 'Reference', 'Status', 'Item Name', 'Unit Price', 'Quantity', 'Note', 'Branch');
		
		// $salesinfo = $this->product_model->get_salesinfo();
		$query = $this->db->get()->result();

		foreach ($query as $sf):
			$this->table->add_row($sf->pur_date, $sf->pur_ref, $sf->pur_status, $sf->itemName, $sf->itemPrice, $sf->itemQuantity, $sf->pur_note, $sf->u_branch);
		endforeach;
		
		$html = $this->table->generate();
		//Generate HTML table data from MySQL - end
		
		// add a page
		$pdf->AddPage();
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		
		//Close and output PDF document
		$pdf->Output(md5(time()).'.pdf', 'D');
	}
	function pdf_purchase($hold_value){
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
		// echo $hold_value;
		// SELECT * FROM `tbl_purchase` JOIN tbl_purchase_item ON tbl_purchase_item.hold_id = tbl_purchase.hold_id JOIN tbl_print_purchase ON tbl_print_purchase.pur_id = tbl_purchase.id WHERE tbl_purchase.hold_id = '1711842569'
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_print_purchase', 'tbl_print_purchase.pur_id = tbl_purchase.id');
		$this->db->join('tbl_purchase_item', 'tbl_purchase_item.hold_id = tbl_purchase.hold_id');
		
		$this->db->where('tbl_print_purchase.hold_id', $hold_value);
		
	    
	    $this->load->library('PdfPurchase');
	
		$pdf = new PdfPurchase(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://www.roytuts.com');
		$pdf->SetTitle('Client Information/Report');
		$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
		$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		$pdf->SetFont('times', 'BI', 12);
		
		// ---------------------------------------------------------
		
		
		//Generate HTML table data from MySQL - start
		$template = array(
			'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
		);

		$this->table->set_template($template);

		$this->table->set_heading('Name', 'Purchase ID', 'Supplier', 'Item', 'Unit Price', 'Quantity', 'Total', 'Note', 'Branch');
		
		// $salesinfo = $this->product_model->get_salesinfo();
		$query = $this->db->get()->result();

		foreach ($query as $sf):
			$this->table->add_row($sf->pur_date, $sf->hold_id, $sf->purSupplier, $sf->itemName, $sf->itemPrice, $sf->itemQuantity, $sf->pur_total, $sf->pur_note, $sf->u_branch);
		endforeach;
		
		$html = $this->table->generate();
		//Generate HTML table data from MySQL - end
		
		// add a page
		$pdf->AddPage();
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		
		//Close and output PDF document
		$pdf->Output(md5(time()).'.pdf', 'D');
	}
	function print_reparation_invoice(){
		$logactivity = 'Print';
        $moduleclient = 'tbl_invoice_details';
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

		include('assets/fpdf18/fpdf.php');
		$pdf = new FPDF('P','mm','A4');

		$pdf->AddPage();

		//set font to arial, bold, 14pt
		$pdf->SetFont('Arial','',12);//step 1

		//Cell(width , height , text , border , end line , [align] )


		$pdf->Cell(59	,5,'Penasihat,',0,0);
		$pdf->Cell(59	,5,'',0,1);//end of line

		$pdf->Cell(130	,5,'Kelab Badan Kebajikan Universiti Teknikal Malaysia,',0,0);
		$pdf->Cell(59	,5,'',0,1);//end of line
		//set font to arial, regular, 12pt
		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(59	,5,'Tingkat 2,',0,1);//end of line

		$pdf->Cell(59	,5,'Hang Tuah Jaya,',0,1);
		$pdf->Cell(130	,5,'76100 Durian Tunggal,',0,0);
		$pdf->Cell(25	,5,'',0,0);
		// date_default_timezone_set('Asia/Kuala_Lumpur');
		$pdf->Cell(34	,5, '',0,1);//end of line

		$pdf->Cell(130	,5,'Melaka.',0,0);
		$pdf->Cell(25	,5,'',0,0);
		$pdf->Cell(34	,5,'',0,1);//end of line

		$pdf->Cell(130 ,30,'Tuan,',0,0);
		$pdf->Cell(25	,5,'',0,0);
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$pdf->Cell(34	,30, '',0,1,'R');//data insert

		$pdf->SetFont('Arial','BU',14);//step 3 Bold and Underline
		$pdf->Cell(98,10,'MEMOHON KEBENARAN MENGADAKAN ',0,1);
		$pdf->Cell(12 ,5,'' ,0,1);

		// $pdf->SetFont('Arial','B',14);//step 3
		// $pdf->Cell(60	,80,'Title: ITEM TRANSACTION INFORMATION REPORT' ,0,1);

		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12	,5,'Saya',0,0);//end of line
		$pdf->Cell(73	,5,'',0,0,'L');//data name
		$pdf->Cell(35	,5,'mewakili program',0,0,'L');
		$pdf->Cell(62	,5,'',0,1,'L');
		// $pdf->Cell(62	,5,ucwords($row['title']),0,1,'L');//data program
		$pdf->Cell(61	,5,'Lawatan ini melibatkan komuniti ',0,0,'L');
		$pdf->Cell(85	,5,'universiti serta orang awam secara sukarelawan.',0,1,'L');
		$pdf->Cell(12 ,5,'' ,0,1);

		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(12 ,5,'2.' ,0,0);
		$pdf->Cell(171,5,'Untuk pengetahuan pihak tuan, lawatan tersebut akan diadakan sepertimana yang berikut:',0,1);//end of line
		$pdf->Cell(12 ,5,'' ,0,0);
		$pdf->Cell(10	,5,'',0,0,'L');
		$pdf->Cell(10	,5,'',0,1,'L');

		// $pdf->Cell(59	,5,'Hang Tuah Jaya,',0,1);
		// $pdf->Cell(130	,5,'76100 Durian Tunggal,',0,0);

		$pdf->SetFont('Arial','',12);//step 3 Bold and Underline
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(12 ,5,'' ,0,0);
		$pdf->Cell(30	,5,'Tarikh ',0,0,'L');//data eventdate
		$pdf->Cell(3 ,5,':',0,0);
		$pdf->Cell(30	,5, '',0,1,'L');
		$pdf->Cell(12 ,5,'' ,0,0);
		$pdf->Cell(30	,5,'Tempat ',0,0,'L');//data place
		$pdf->Cell(3 ,5,':' ,0,0);
		$pdf->Cell(30	,5,'',0,1,'L');
		$pdf->Cell(12 ,5,'' ,0,0);
		$pdf->Cell(30	,5,'Anjuran ',0,0,'L');//data club_id
		$pdf->Cell(3 ,5,':' ,0,0);
		$pdf->Cell(30	,5,'Kelab Badan Kebajikan UTeM',0,1,'L');//join table get club name
		$pdf->Cell(12 ,5,'' ,0,0);
		$pdf->Cell(30	,5,'Penglibatan ',0,0,'L');//data scope
		$pdf->Cell(3 ,5,':' ,0,0);
		$pdf->Cell(30	,5,'Pelajar dan Orang Awam',0,1,'L');


		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(12 ,5,'3.' ,0,0);
		$pdf->MultiCell(165,5,'Program ini bertujuan bagi ',0,1);//end of line
		// $pdf->Cell(135,5,'',0,1);//data description
		$pdf->Cell(10	,5,'',0,0,'L');
		$pdf->Cell(10	,5,'',0,0,'L');

		// $pdf->Cell(100	,15,'TITLE: ITEM TRANSACTION INFORMATION REPORT' ,1,1,'L');
		// date_default_timezone_set('Asia/Kuala_Lumpur');
		$pdf->Cell(34	,5, '',0,0);
		// $pdf->SetFont('Arial','',12);
		// $pdf->Cell(60	,-50,'This Report is refer from Date:' ,0,0);
		// $pdf->Cell(25	,-50,$start,0,0);
		// $pdf->Cell(5	,-50,'-' ,0,0);
		// $pdf->Cell(10	,-50,$end ,0,1);

		//end of line

		//make a dummy empty cell as a vertical spacer
		$pdf->Cell(187	,17,'',0,0);//end of line

		//make a dummy empty cell as a vertical spacer
		$pdf->Cell(187,17,'',0,1);//end of line
		$pdf->Cell(187,17,'',0,1);
		$pdf->Cell(187,17,'',0,1);
		$pdf->Cell(187,17,'',0,1);
		// $pdf->Cell(187,13,'',0,1);

		//invoice contents
		// $pdf->SetFont('Arial','B',10);
		//
		// $pdf->Cell(100	,5,'Item Name',1,0);
		// $pdf->Cell(25	,5,'Category',1,0);
		// $pdf->Cell(17	,5,'Add QTY',1,0);
		// $pdf->Cell(23	,5,'Deduct QTY',1,0);
		// $pdf->Cell(20	,5,'Date',1,1);//end of line

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(57,5,'"Berkhidmat untuk pelajar"',0,1);//end of line
		$pdf->Cell(12 ,5,'' ,0,1);



		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(57,5,'Yang menjalankan tugas,',0,0);//end of line
		$pdf->Cell(10	,5,'',0,0,'L');
		$pdf->Cell(10	,5,'',0,1,'L');

		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(100,5,'',0,0);//data nama
		$pdf->Cell(10	,5,'',0,0,'L');
		$pdf->Cell(10	,5,'',0,1,'L');
		// $pdf->SetFont('Arial','',10);

		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(100,5,'Setiausaha Kelab Kebajikan UTeM.',0,0);
		$pdf->Cell(10	,5,'',0,0,'L');
		$pdf->Cell(10	,5,'',0,0,'L');
		//Numbers are right-aligned so we give 'R' after new line parameter

		//items
		//display the items
		// if(mysqli_num_rows($query) > 0 )
		// {
		// while($row = mysqli_fetch_assoc($query)){
		//
		//
		// 	$pdf->Cell(100	,5,$row['item_name'],1,0);
		// 	$pdf->Cell(25	,5,$row['category'],1,0);
		// 	$pdf->Cell(17	,5,$row['add_quantity'],1,0);
		// 	$pdf->Cell(23	,5,$row['deduct_quantity'],1,0);
		// 	$pdf->Cell(20	,5,$row['date'],1,1);//end of line
		// 	//accumulate tax and amount
		// }}
		//
		//
		//  $sql = "SELECT COUNT(1) FROM transaction Where date Between '$start' and '$end' ORDER BY date ";
		// $result = mysqli_query($conn,$sql);
		// $row = mysqli_fetch_array($result);
		// $total=$row[0];
		//
		// $pdf->SetFont('Arial','',12);
		// $pdf->Cell(40	,15,'Total Transaction is:' ,0,0);
		// $pdf->Cell(25	,15,$total,0,0);


		$pdf->Output();

	}
	function print_reparation_report(){
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

		include('assets/fpdf18/fpdf.php');
		$pdf = new FPDF('P','mm','A4');

		$pdf->AddPage();

		//set font to arial, bold, 14pt
		$pdf->SetFont('Arial','',12);//step 1

		//Cell(width , height , text , border , end line , [align] )


		$pdf->Cell(59	,5,'Penasihat,',0,0);
		$pdf->Cell(59	,5,'',0,1);//end of line

		$pdf->Cell(130	,5,'Kelab Badan Kebajikan Universiti Teknikal Malaysia,',0,0);
		$pdf->Cell(59	,5,'',0,1);//end of line
		//set font to arial, regular, 12pt
		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(59	,5,'Tingkat 2,',0,1);//end of line

		$pdf->Cell(59	,5,'Hang Tuah Jaya,',0,1);
		$pdf->Cell(130	,5,'76100 Durian Tunggal,',0,0);
		$pdf->Cell(25	,5,'',0,0);
		// date_default_timezone_set('Asia/Kuala_Lumpur');
		$pdf->Cell(34	,5, '',0,1);//end of line

		$pdf->Cell(130	,5,'Melaka.',0,0);
		$pdf->Cell(25	,5,'',0,0);
		$pdf->Cell(34	,5,'',0,1);//end of line

		$pdf->Cell(130 ,30,'Tuan,',0,0);
		$pdf->Cell(25	,5,'',0,0);
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$pdf->Cell(34	,30, '',0,1,'R');//data insert

		$pdf->SetFont('Arial','BU',14);//step 3 Bold and Underline
		$pdf->Cell(98,10,'MEMOHON KEBENARAN MENGADAKAN ',0,1);
		$pdf->Cell(12 ,5,'' ,0,1);

		// $pdf->SetFont('Arial','B',14);//step 3
		// $pdf->Cell(60	,80,'Title: ITEM TRANSACTION INFORMATION REPORT' ,0,1);

		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12	,5,'Saya',0,0);//end of line
		$pdf->Cell(73	,5,'',0,0,'L');//data name
		$pdf->Cell(35	,5,'mewakili program',0,0,'L');
		$pdf->Cell(62	,5,'',0,1,'L');
		// $pdf->Cell(62	,5,ucwords($row['title']),0,1,'L');//data program
		$pdf->Cell(61	,5,'Lawatan ini melibatkan komuniti ',0,0,'L');
		$pdf->Cell(85	,5,'universiti serta orang awam secara sukarelawan.',0,1,'L');
		$pdf->Cell(12 ,5,'' ,0,1);

		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(12 ,5,'2.' ,0,0);
		$pdf->Cell(171,5,'Untuk pengetahuan pihak tuan, lawatan tersebut akan diadakan sepertimana yang berikut:',0,1);//end of line
		$pdf->Cell(12 ,5,'' ,0,0);
		$pdf->Cell(10	,5,'',0,0,'L');
		$pdf->Cell(10	,5,'',0,1,'L');

		// $pdf->Cell(59	,5,'Hang Tuah Jaya,',0,1);
		// $pdf->Cell(130	,5,'76100 Durian Tunggal,',0,0);

		$pdf->SetFont('Arial','',12);//step 3 Bold and Underline
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(12 ,5,'' ,0,0);
		$pdf->Cell(30	,5,'Tarikh ',0,0,'L');//data eventdate
		$pdf->Cell(3 ,5,':',0,0);
		$pdf->Cell(30	,5, '',0,1,'L');
		$pdf->Cell(12 ,5,'' ,0,0);
		$pdf->Cell(30	,5,'Tempat ',0,0,'L');//data place
		$pdf->Cell(3 ,5,':' ,0,0);
		$pdf->Cell(30	,5,'',0,1,'L');
		$pdf->Cell(12 ,5,'' ,0,0);
		$pdf->Cell(30	,5,'Anjuran ',0,0,'L');//data club_id
		$pdf->Cell(3 ,5,':' ,0,0);
		$pdf->Cell(30	,5,'Kelab Badan Kebajikan UTeM',0,1,'L');//join table get club name
		$pdf->Cell(12 ,5,'' ,0,0);
		$pdf->Cell(30	,5,'Penglibatan ',0,0,'L');//data scope
		$pdf->Cell(3 ,5,':' ,0,0);
		$pdf->Cell(30	,5,'Pelajar dan Orang Awam',0,1,'L');


		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(12 ,5,'3.' ,0,0);
		$pdf->MultiCell(165,5,'Program ini bertujuan bagi ',0,1);//end of line
		// $pdf->Cell(135,5,'',0,1);//data description
		$pdf->Cell(10	,5,'',0,0,'L');
		$pdf->Cell(10	,5,'',0,0,'L');

		// $pdf->Cell(100	,15,'TITLE: ITEM TRANSACTION INFORMATION REPORT' ,1,1,'L');
		// date_default_timezone_set('Asia/Kuala_Lumpur');
		$pdf->Cell(34	,5, '',0,0);
		// $pdf->SetFont('Arial','',12);
		// $pdf->Cell(60	,-50,'This Report is refer from Date:' ,0,0);
		// $pdf->Cell(25	,-50,$start,0,0);
		// $pdf->Cell(5	,-50,'-' ,0,0);
		// $pdf->Cell(10	,-50,$end ,0,1);

		//end of line

		//make a dummy empty cell as a vertical spacer
		$pdf->Cell(187	,17,'',0,0);//end of line

		//make a dummy empty cell as a vertical spacer
		$pdf->Cell(187,17,'',0,1);//end of line
		$pdf->Cell(187,17,'',0,1);
		$pdf->Cell(187,17,'',0,1);
		$pdf->Cell(187,17,'',0,1);
		// $pdf->Cell(187,13,'',0,1);

		//invoice contents
		// $pdf->SetFont('Arial','B',10);
		//
		// $pdf->Cell(100	,5,'Item Name',1,0);
		// $pdf->Cell(25	,5,'Category',1,0);
		// $pdf->Cell(17	,5,'Add QTY',1,0);
		// $pdf->Cell(23	,5,'Deduct QTY',1,0);
		// $pdf->Cell(20	,5,'Date',1,1);//end of line

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(57,5,'"Berkhidmat untuk pelajar"',0,1);//end of line
		$pdf->Cell(12 ,5,'' ,0,1);



		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(57,5,'Yang menjalankan tugas,',0,0);//end of line
		$pdf->Cell(10	,5,'',0,0,'L');
		$pdf->Cell(10	,5,'',0,1,'L');

		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(100,5,'',0,0);//data nama
		$pdf->Cell(10	,5,'',0,0,'L');
		$pdf->Cell(10	,5,'',0,1,'L');
		// $pdf->SetFont('Arial','',10);

		$pdf->SetFont('Arial','',12);//step 2
		$pdf->Cell(12 ,5,'' ,0,1);//untuk menjarakkan kebawah
		$pdf->Cell(100,5,'Setiausaha Kelab Kebajikan UTeM.',0,0);
		$pdf->Cell(10	,5,'',0,0,'L');
		$pdf->Cell(10	,5,'',0,0,'L');
		//Numbers are right-aligned so we give 'R' after new line parameter

		//items
		//display the items
		// if(mysqli_num_rows($query) > 0 )
		// {
		// while($row = mysqli_fetch_assoc($query)){
		//
		//
		// 	$pdf->Cell(100	,5,$row['item_name'],1,0);
		// 	$pdf->Cell(25	,5,$row['category'],1,0);
		// 	$pdf->Cell(17	,5,$row['add_quantity'],1,0);
		// 	$pdf->Cell(23	,5,$row['deduct_quantity'],1,0);
		// 	$pdf->Cell(20	,5,$row['date'],1,1);//end of line
		// 	//accumulate tax and amount
		// }}
		//
		//
		//  $sql = "SELECT COUNT(1) FROM transaction Where date Between '$start' and '$end' ORDER BY date ";
		// $result = mysqli_query($conn,$sql);
		// $row = mysqli_fetch_array($result);
		// $total=$row[0];
		//
		// $pdf->SetFont('Arial','',12);
		// $pdf->Cell(40	,15,'Total Transaction is:' ,0,0);
		// $pdf->Cell(25	,15,$total,0,0);


		$pdf->Output();

	}
	function pdf_stock($hold_value)
	{
		$logactivity = 'Print';
        $moduleclient = 'tbl_product';
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

		// $where = array('hold_id' => $hold_value);
		// $hold_value = $this->input->post('hold_value');
    	$this->db->from('tbl_print_stock');
		// $this->db->join('tbl_print_client', 'tbl_print_client.c_id = tbl_client.c_id');
		$this->db->where('tbl_print_stock.hold_id', $hold_value);
		
	    
	    $this->load->library('PdfStock');
	
		$pdf = new PdfStock(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://www.roytuts.com');
		$pdf->SetTitle('Client Information/Report');
		$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
		$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		$pdf->SetFont('times', 'BI', 12);
		
		// ---------------------------------------------------------
		
		
		//Generate HTML table data from MySQL - start
		$template = array(
			'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
		);

		$this->table->set_template($template);

		$this->table->set_heading('Product ID', 'Name', 'Code', 'Cost', 'Price', 'Quantity', 'Alert', 'Branch');
		
		// $salesinfo = $this->product_model->get_salesinfo();
		$query = $this->db->get()->result();

		foreach ($query as $sf):
			$this->table->add_row($sf->p_id, $sf->p_name, $sf->p_code, $sf->p_cost, $sf->p_price, $sf->p_quantity, $sf->p_alertQuantity, $sf->u_branch);
		endforeach;
		
		$html = $this->table->generate();
		//Generate HTML table data from MySQL - end
		
		// add a page
		$pdf->AddPage();
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		
		//Close and output PDF document
		$pdf->Output(md5(time()).'.pdf', 'D');
		
		// return $this->deleteHoldClient($hold_value);
	    // $this->load->view('admin/body/testpdf.php', $query);
	    
	}
	function pdf_sales($hold_value)
	{
		$logactivity = 'Print';
        $moduleclient = 'tbl_revenue';
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

		// $where = array('hold_id' => $hold_value);
		// $hold_value = $this->input->post('hold_value');
    	$this->db->from('tbl_print_sales');
		$this->db->join('tbl_posdetails', 'tbl_posdetails.transaction_id = tbl_print_sales.transaction_id');
		$this->db->join('tbl_holdproduct', 'tbl_holdproduct.hold_id = tbl_posdetails.hold_id');
		$this->db->where('tbl_print_sales.hold_id', $hold_value);
		
	    
	    $this->load->library('PdfSales');
	
		$pdf = new PdfSales(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://www.roytuts.com');
		$pdf->SetTitle('Client Information/Report');
		$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
		$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		$pdf->SetFont('times', 'BI', 12);
		
		// ---------------------------------------------------------
		
		
		//Generate HTML table data from MySQL - start
		$template = array(
			'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
		);

		$this->table->set_template($template);

		$this->table->set_heading('Transaction ID', 'Product', 'Customer', 'Phone', 'Email', 'Quantity', 'Price Nett', 'Tax', 'Discount');
		
		// $salesinfo = $this->product_model->get_salesinfo();
		$query = $this->db->get()->result();

		foreach ($query as $sf):
			$this->table->add_row($sf->transaction_id, $sf->pro_name, $sf->custName, $sf->custPhone, $sf->custEmail, $sf->pro_qty, $sf->pro_price, $sf->pro_tax, $sf->pro_disc);
		endforeach;
		
		$html = $this->table->generate();
		//Generate HTML table data from MySQL - end
		
		// add a page
		$pdf->AddPage();
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		
		//Close and output PDF document
		$pdf->Output(md5(time()).'.pdf', 'D');
		
		// return $this->deleteHoldClient($hold_value);
	    // $this->load->view('admin/body/testpdf.php', $query);
	    
	}
	function pdf_sales_reparation($hold_value)
	{
		$logactivity = 'Print';
        $moduleclient = 'tbl_revenue';
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

		// $where = array('hold_id' => $hold_value);
		// $hold_value = $this->input->post('hold_value');
    	$this->db->from('tbl_print_sales_repair');
		$this->db->join('tbl_reparation', 'tbl_reparation.r_repairno = tbl_print_sales_repair.r_repairno');
		$this->db->join('tbl_hold', 'tbl_hold.random_id = tbl_reparation.hold_id');
		$this->db->where('tbl_print_sales_repair.hold_id', $hold_value);
		
	    
	    $this->load->library('PdfSales');
	
		$pdf = new PdfSales(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('https://www.roytuts.com');
		$pdf->SetTitle('Client Information/Report');
		$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
		$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		$pdf->SetFont('times', 'BI', 12);
		
		// ---------------------------------------------------------
		
		
		//Generate HTML table data from MySQL - start
		$template = array(
			'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
		);

		$this->table->set_template($template);

		$this->table->set_heading('Repair No', 'Product', 'Customer', 'Phone', 'Email', 'Quantity', 'Price Nett');
		
		// $salesinfo = $this->product_model->get_salesinfo();
		$query = $this->db->get()->result();

		foreach ($query as $sf):
			$this->table->add_row($sf->r_repairno, $sf->product_name, $sf->custName, $sf->custPhone, $sf->custEmail, $sf->quantity, $sf->unit_price);
		endforeach;
		
		$html = $this->table->generate();
		//Generate HTML table data from MySQL - end
		
		// add a page
		$pdf->AddPage();
		
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		// reset pointer to the last page
		$pdf->lastPage();

		
		//Close and output PDF document
		$pdf->Output(md5(time()).'.pdf', 'D');
		
		// return $this->deleteHoldClient($hold_value);
	    // $this->load->view('admin/body/testpdf.php', $query);
	    
	}
}
?>