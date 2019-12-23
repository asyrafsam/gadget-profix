<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_report extends CI_Controller {


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

		
	function viewgraph()
	{
		$month = $this->input->post('month');
		$time=strtotime($month);
		$m=date("m",$time);
		$y=date("Y",$time);

		// echo $m; exit();
        // $data['productdataa'] = $this->d_get->get_productposjoin($month)->result();

        $data = $this->d_get->get_financedataselected($m)->result();
      	$x['data'] = json_encode($data);

		return $this->load->view('admin/body/chart-finance-1-selected.php', $x);
	}
	// function viewgraphtotal(){
	// 	$month = $this->input->post('month');
	// 	$time=strtotime($month);
	// 	$m=date("m",$time);
	// 	$y=date("Y",$time);

	// 	$this->db->select('pay_date, SUM(pay_amount) as totalpaid');
	// 	$this->db->where('MONTH(pay_date)', $m);
	// 	$this->db->where('YEAR(pay_date)', date('Y'));
	// 	$query =  $this->db->get('tbl_payment')->result();
	// 	foreach ($query as $data) 
	// 	{
	// 		// echo $data->unit_price;
	// 		echo $data->totalpaid;
	// 	}
	// }
	function viewgraphtotal(){
		$month = $this->input->post('month');
		$time=strtotime($month);
		$m=date("m",$time);
		$y=date("Y",$time);

		$this->db->select('revenue_date, SUM(revenue_subtotal) as totalpaid');
		$this->db->where('MONTH(revenue_date)', $m);
		$this->db->where('YEAR(revenue_date)', date('Y'));
		$query =  $this->db->get('tbl_revenue')->result();
		foreach ($query as $data) 
		{
			// echo $data->unit_price;
			echo $data->totalpaid;
		}
	}
	function viewsalesselected(){
		$start = $this->input->post('start');
		$end = $this->input->post('end');

		$this->db->select('*, SUM(tbl_holdproduct.pro_tax) as totaltax, SUM(tbl_pospayment.pay_amount) as totalpaid');
    	$this->db->from('tbl_holdproduct');
    	$this->db->join('tbl_pospayment', 'tbl_pospayment.hold_id = tbl_holdproduct.hold_id');
    	$this->db->join('tbl_posdetails', 'tbl_posdetails.hold_id = tbl_pospayment.hold_id');
    	$this->db->join('tbl_client', 'tbl_client.c_id = tbl_posdetails.c_id');
    	$this->db->where('tbl_posdetails.date_pos BETWEEN "'.$start.'" and "'.$end.'" ');
    	$this->db->group_by('tbl_holdproduct.hold_id');
    	$query['salesselect'] = $this->db->get()->result();
    	// echo $this->db->last_query(); exit();
    	return $this->load->view('admin/body/viewsalesselected-1',$query);
  //   	foreach ($query as $p) 
		// {
		// 	$balance = $p->total - $p->payment;
		// 	echo '<tr style="background-color: #e3e6f0;">
	 //                  <td><input type="checkbox" name=""></td>
	 //                  <td>'.$p->hold_id.'</td>
	 //                  <td>'.$p->date_pos.'</td>
	 //                  <td>'.$p->c_name.'</td>
	 //                  <td>'.$p->pro_name.'</td>
	 //                  <td>'.$p->total.'</td>
	 //                  <td>'.$p->totaltax.'</td>
	 //                  <td>'.$p->payment.'</td>
	 //                  <td>'.$balance.'</td>
	                  
	 //                  <td><button class="btn btn-success" style="height: 30px;font-size: 12px;">Paid</button></td>
	                  
	 //                  <td>
	 //                  </td>
  //               	</tr>
  //               	'
  //               ;
			
		// }
	}
	function getPaymentSales($id){
		// $data = $this->d_get->show_payment($id);
		// echo json_encode($data);
		// $id = $this->input->post('id');
		// $this->db->where('r_rcode', $id);
		$query = $this->d_get->show_paymentsales($id,'tbl_pospayment')->result();
		$i = 1;

		foreach ($query as $data) 
		{
			//echo $data->unit_price;


			echo 
					'<tr>
						<td>'.$data->pay_date.'</td>
						<td>'.$data->pay_amount.'</td>
						<td>'.$data->pay_type.'</td>
						<td>
							<form action='.base_url('func_report/delete_payment').' method="POST" enctype="multipart/form-data">
							<input type="hidden" name="payid" value="'.$data->id.'">
	                        <input type="hidden" name="payholddelete">
	                        <input type="hidden" name="payholddate"  class="form-control" placeholder="'.date('D-M-Y').'" value="'.date("Y-m-d"). ' ' .date("h:i:sa").'">
	                        <input type="hidden" name="payholduser" value="'.$this->session->userdata('name').'">
	                        <input type="hidden" name="payholdbranch" value="'.$this->session->userdata('branch').'">
	                        <input type="hidden" name="transactionID" value="'.$data->transaction_id.'">
                            <button class="btn btn-danger" onclick="return confirm(Confirm delete payment?)"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
					</tr>'
				     ;

		}
	}
	function getPosDetails($id){
		$data = $this->d_get->show_posdetails($id);
		echo json_encode($data);
	}
	function add_payment(){
		$paymentdateadd = $this->input->post('paymentdateadd');
		$paymentholdid = $this->input->post('paymentholdid');
		$paymentbranch = $this->input->post('paymentbranch');
		$paymentmadeby = $this->input->post('paymentmadeby');

		$transactionID = $this->input->post('transactionID');
		$paydate = $this->input->post('pay_date');
		$payref = $this->input->post('pay_ref');
		$payamount = $this->input->post('pay_amount');
		$paytype = $this->input->post('pay_type');
		$paynote = $this->input->post('pay_note');
		$addpaymentlog = 'Payment Added';
		

		// $logaddpayment = array(
		// 			'hold_id' => $paymentholdid,
		// 			'r_repairno' => $repairno,
		// 			'log_date' => $paymentdateadd,
		// 			'log_user' => $paymentmadeby,
		// 			'log_action' => $addpaymentlog,
		// 			'u_branch' => $paymentbranch
		// 		);
		// $this->db->insert('tbl_reparation_log',$logaddpayment);

		$this->db->select('SUM(pay_amount) as sumall');
		$this->db->from('tbl_pospayment');
		$this->db->where('transaction_id', $transactionID);
		$gettototal = $this->db->get()->result();
		foreach ($gettototal as $alltotaltoplus) {
			$testtotalsum = $alltotaltoplus->sumall;
		}
		// ---------------------------------------------------------------

		$this->db->select('*');
		$this->db->from('tbl_posdetails');
		$this->db->where('transaction_id', $transactionID);
		$query7 = $this->db->get()->result();
		foreach ($query7 as $totalpos) {
			$totaltopay = $totalpos->total;
		}
		$needtopay = $totaltopay - $testtotalsum;
		// $lastresultpay = $needtopay - $payamount;
		$balance2 = $needtopay - $payamount;
		if($balance2 < 0)
		{
			$paybalance = $totaltopay;
		}else{
			$paybalance = $payamount + $testtotalsum;
		}
		// -------------------------------------------------------------------


		// $testtosum = $testtotalsum + $payamount;
		// echo $paybalance; exit();
		$dataupdateposdetails = array(
								'total_paid'=>$paybalance
							);
		$this->db->where('transaction_id', $transactionID);
		$this->db->update('tbl_posdetails', $dataupdateposdetails);
		// -------------------------------------------------------------------

		$this->db->select('total_paid');
		$this->db->from('tbl_posdetails');
		$this->db->where('transaction_id', $transactionID);
		$query11 = $this->db->get()->result();
		foreach ($query11 as $totalpaided) {
			$testpaid = $totalpaided->total_paid;
		}
		// -------------------------------------------------------------------

		$dataupdaterevenue = array(
								'revenue_date'=>$paydate,
								'revenue_subtotal'=>$testpaid
							);
		$this->db->where('revenue_holdid', $transactionID);
		$this->db->update('tbl_revenue', $dataupdaterevenue);
		// ---------------------------------------------------------------------

		$balance3 = $needtopay - $payamount;
		if($balance3 < 0)
		{
			$cashreturn = abs($balance3);
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$currentdate = date('Y-m-d');
			$this->db->select('currentBalance');
			$this->db->from('tbl_drawer');
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where('u_branch', $paymentbranch);
			$query5 = $this->db->get()->result();
			foreach ($query5 as $drawer) {
				$cash = $drawer->currentBalance;
			}
			$dataindrawer = $cash - $cashreturn;
			$totaldrawer =  $dataindrawer + $needtopay;
			// echo $dataindrawer;
			// echo $totaldrawer; exit();
			$changebalance = array(
								'currentBalance'=>$dataindrawer
							);
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where('u_branch', $paymentbranch);
			$this->db->update('tbl_drawer', $changebalance);

			$changebalanceadd = array(
								'currentBalance'=>$totaldrawer
							);
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where('u_branch', $paymentbranch);
			$this->db->update('tbl_drawer', $changebalanceadd);
			// echo $this->db->last_query(); exit();
		}else{

			date_default_timezone_set("Asia/Kuala_Lumpur");
			$currentdate = date('Y-m-d');
			$this->db->select('currentBalance');
			$this->db->from('tbl_drawer');
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where('u_branch', $paymentbranch);
			$query5 = $this->db->get()->result();
			// echo $this->db->last_query(); exit();
			foreach ($query5 as $drawer) {
				$cash = $drawer->currentBalance;
			}
			$dataindrawer = $cash + $payamount;
			// echo $dataindrawer; exit();
			$changebalance = array(
								'currentBalance'=>$dataindrawer
							);
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where('u_branch', $paymentbranch);
			$this->db->update('tbl_drawer', $changebalance);

			// echo $this->db->last_query(); exit();
		}
		// Lek lu
		$addpay = array(
						'hold_id' => $paymentholdid,
						'transaction_id' => $transactionID,
						'pay_date' => $paydate,
						'pay_ref' => $payref,
						'pay_amount' => $payamount,
						'pay_type' => $paytype,
						'u_branch' => $paymentbranch,
						'pay_note' => $paynote
					);
		// $where = array(
		// 			'r_repairno' => $repairno
		// 		);
		$this->db->insert('tbl_pospayment',$addpay);
		?>
		<script type="text/javascript">
            alert("Payment Added");
            window.location.href = '<?php echo base_url();?>admin/viewsales';
        </script>
		<?php
	}
	function delete_payment(){
		$holdid = $this->input->post('payholddelete');
		$paydeletedate = $this->input->post('payholddate');
		$paydeleteuser = $this->input->post('payholduser');
		$paydeletebranch = $this->input->post('payholdbranch');
		$paydeleteaction = 'Payment Deleted';
		$data = $this->input->post('payid');
		$data2 = $this->input->post('transactionID');
		$changedate = '0000-00-00';
		$change = '0.00';
		$change1 = '-';
		
		// -------------------------------------------------------------------------------------------------------
		$this->db->select('tbl_posdetails.total,tbl_pospayment.transaction_id, tbl_posdetails.total_paid, tbl_pospayment.pay_amount');
		$this->db->from('tbl_pospayment');
		$this->db->join('tbl_posdetails', 'tbl_posdetails.transaction_id = tbl_pospayment.transaction_id');
		$this->db->where('tbl_pospayment.id',$data);
		$getrepairno = $this->db->get()->result();
		foreach ($getrepairno as $no) {
			$posjoin = $no->transaction_id;
			$pospaid = $no->total_paid;
			$paidamount = $no->pay_amount;
			$paytotal = $no->total;
		}
		// ---------------------------------------------------------------------------------------------------------

		// echo $pospaid;
		// echo $paidamount; exit();
		$calc = $pospaid - $paidamount;

		if($calc < 0){
			$calcreturn = 0;
		}else{
			$calcreturn = $calc;
		}
		// echo $calc; exit();
		
		// echo $this->db->last_query(); exit();
		// -------------------------------------------------------------------------------------------------------------

		$updaterevenue = array(
						'revenue_subtotal'=>$calcreturn
					);
		$this->db->where('revenue_holdid', $posjoin);
		$this->db->update('tbl_revenue', $updaterevenue);
		// echo $this->db->last_query(); exit();
		// -------------------------------------------------------------------------------------------------------------

		// $where = array(
		// 			'id' => $data
		// 		);
		$addpay = array(
						'pay_date' => $changedate,
						'pay_amount' => $change,
						'pay_type' => $change1
					);
		$this->db->where('id', $data);
		$this->db->update('tbl_pospayment', $addpay);
		// echo $this->db->last_query(); exit();
		// ---------------------------------------------------------------------------------------------------------------

		$this->db->select('SUM(pay_amount) as totaltinggal');
		$this->db->from('tbl_pospayment');
		$this->db->group_by('transaction_id');
		$this->db->where('transaction_id', $posjoin);
		$query13 = $this->db->get()->result();
		foreach ($query13 as $pengiraan) {
			$tinggal = $pengiraan->totaltinggal;
		}
		
		// -----------------------------------------------------------------------------------------------------------------
		$updatepaid = array(
						'total_paid'=>$tinggal
					);
		$this->db->where('transaction_id', $posjoin);
		$this->db->update('tbl_posdetails', $updatepaid);
		// -----------------------------------------------------------------------------------------------------------------
		
		$alltinggal = $paytotal - $tinggal;
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$currentdate = date('Y-m-d');
		$this->db->select('currentBalance');
		$this->db->from('tbl_drawer');
		$this->db->where('DAY(openTime)', date('d'));
		$this->db->where('MONTH(openTime)', date('m'));
		$this->db->where('YEAR(openTime)', date('Y'));
		$this->db->where('u_branch', $paydeletebranch);
		$query5 = $this->db->get()->result();
		// echo $this->db->last_query(); exit();
		foreach ($query5 as $drawer) {
			$cash = $drawer->currentBalance;
		}
		$dataindrawer = $cash - $alltinggal;
		// echo $dataindrawer; exit();
		$changebalance = array(
							'currentBalance'=>$dataindrawer
						);
		$this->db->where('DAY(openTime)', date('d'));
		$this->db->where('MONTH(openTime)', date('m'));
		$this->db->where('YEAR(openTime)', date('Y'));
		$this->db->where('u_branch', $paydeletebranch);
		$this->db->update('tbl_drawer', $changebalance);
		// echo $this->db->last_query(); exit();
		// $logaddpayment = array(
		// 			'r_repairno' => $data2,//
		// 			'log_date' => $paydeletedate,
		// 			'log_user' => $paydeleteuser,
		// 			'log_action' => $paydeleteaction,
		// 			'u_branch' => $paydeletebranch
		// 		);
		// $this->db->insert('tbl_reparation_log',$logaddpayment);

		redirect(base_url('admin/viewsales'));
	}

	function getDetailsSales(){
		$id = $this->input->post('id');
		$query = $this->d_get->getDetailsSales($id);

		if(empty($query)){
			echo 'Tiada Data Ditemui';
		} else {
			foreach ($query as $data) 
			{
			

			}
			echo json_encode($data);

		}
	}
	function deletePrint()
	{
		$id = $this->input->post('id');
		$hold_value = $this->input->post('hold_value');
		// echo $id; exit();
		$this->db->where('p_details_id',$id);
		$this->db->where('hold_id',$hold_value);

		$this->db->delete('tbl_print_sales');
	}
	function storeSales(){
		$id = $this->input->post('detailsid');
		$transactionid = $this->input->post('transactionid');
		$custname = $this->input->post('custname');
		$custaddress = $this->input->post('custaddress');
		$custphone = $this->input->post('custphone');
		$custemail = $this->input->post('custemail');
		$custbranch = $this->input->post('custbranch');
		$proname = $this->input->post('proname');
		$proqty = $this->input->post('proqty');
		$proprice = $this->input->post('proprice');

		$protax = $this->input->post('protax');
		$userincharge = $this->input->post('userincharge');
		$ubranch = $this->input->post('ubranch');
		$hold_value = $this->input->post('hold_value');

		$data = array(
						'transaction_id'=>$transactionid,
						'p_details_id'=>$id,
						'custName'=>$custname,
						'custAddress'=>$custaddress,
						'custPhone'=>$custphone,
						'custEmail'=>$custemail,
						'custBranch'=>$custbranch,
						'proName'=>$proname,
						'proQty'=>$proqty,
						'proPrice'=>$proprice,
						'proTax'=>$protax,
						'user_incharge'=>$userincharge,
						'u_branch'=>$ubranch,
						'hold_id'=>$hold_value
					 );

		$this->db->insert('tbl_print_sales', $data);
	}
	function sendMailSales($hold_id){

		$this->db->select('*');
		$this->db->from('tbl_posdetails');
		$this->db->join('tbl_client', 'tbl_client.c_id = tbl_posdetails.c_id');
		$this->db->where('tbl_posdetails.hold_id', $hold_id);
		$reparationname = $this->db->get()->result();
		// echo $this->db->last_query(); exit();

		$this->db->select('*');
		$this->db->from('tbl_holdproduct');
		$this->db->where('tbl_holdproduct.hold_id', $hold_id);
		$item = $this->db->get()->result();
		// echo $this->db->last_query(); exit();

		$this->db->select('*, SUM(tbl_holdproduct.pro_tax) as totaltax, SUM(DISTINCT(tbl_pospayment.pay_amount)) as totalpaid');
    	$this->db->from('tbl_holdproduct');
    	$this->db->join('tbl_pospayment', 'tbl_pospayment.hold_id = tbl_holdproduct.hold_id');
    	$this->db->join('tbl_posdetails', 'tbl_posdetails.hold_id = tbl_pospayment.hold_id');
    	$this->db->join('tbl_client', 'tbl_client.c_id = tbl_posdetails.c_id');
    	$this->db->where('tbl_posdetails.hold_id', $hold_id);
		$reparationdetails = $this->db->get()->result();

		// echo $this->db->last_query(); exit();
		include('assets/php-mailer-master/PHPMailerAutoload.php');
		foreach($reparationname as $name) 
		{
			$editclientemail = 'asyrafsam14@gmail.com';
		}
		$mail = new PHPMailer;

                   //$mail->SMTPDebug = 2;                               // Enable verbose debug output

	      $mail->IsSMTP();                                      // Set mailer to use SMTP
	      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	      $mail->SMTPAuth = true;
	      // $mail->SMTPDebug = 2;
	      $mail->SMTPAutoTLS = false;
	      $mail->Host = gethostbyname('tls://smtp.gmail.com');                               // Enable SMTP authentication
	      $mail->Username = 'systemcharity14@gmail.com';                 // SMTP username
	      $mail->Password = 'systemcharity1996';
	      $mail->IsHTML(true);                           // SMTP password
	      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	      $mail->Port = 587;                                    // TCP port to connect to

	      $mail->setFrom('systemcharity14@gmail.com', 'Gadget Profix');     // Add a recipient
	      $mail->addAddress($editclientemail);              // Name is optional
	      //$mail->addReplyTo('info@example.com', 'Information');
	      //$mail->addCC('cc@example.com');
	      //$mail->addBCC('bcc@example.com');

	            // Set email format to HTML

	      $mail->Subject = 'Order Receipt';
	      // $data_collect = 'asdasd';
			foreach($reparationname as $name) 
			{
			$data_collect .=  "<h2 style='font-size: 0.9em;'>Customer Name: ".$name->c_name ."&nbsp;". $name->transaction_id."</h2>";
			}

			foreach ($item as $product) 
			{
				$data_collect2 .= "<tr class='service' style='border-bottom: 1px solid #EEE;'>
						<td colspan='3' class='tableitem'><p class='itemtext' style='font-size: .9em;line-height: 1.2em;font-size: .7em;'>
							<strong>".$product->pro_name."</strong>&nbsp;
							<strong style='float:right;margin-right:10px;'>Quantity:&nbsp;".$product->pro_qty."</strong>
						</p></td>
					</tr>";
			}

			foreach ($reparationdetails as $details) 
			{
				$balance = $details->total - $details->total_paid;

				$data_collect3 .= '<tr class="tabletitle" style="font-size: .7em;background: #EEE;">
						<td></td>
						<td class="Rate"><h2 style="font-size: .9em;">Service Charges</h2></td>
						<td class="payment"><h2 style="font-size: .9em;">'.$details->totaltax.'</h2></td>
					</tr>

					<tr class="tabletitle" style="font-size: .7em;background: #EEE;">
						<td></td>
						<td class="Rate"><h2 style="font-size: .9em;">Grand Total</h2></td>
						<td class="payment"><h2 style="font-size: .9em;">'.$details->total.'</h2></td>
					</tr>

					<tr class="tabletitle" style="font-size: .7em;background: #EEE;">
						<td></td>
						<td class="Rate"><h2 style="font-size: .9em;">Paid</h2></td>
						<td class="payment"><h2 style="font-size: .9em;">'.$details->total_paid.'</h2></td>
					</tr>

					<tr class="tabletitle" style="font-size: .7em;background: #EEE;">
						<td></td>
						<td class="Rate"><h2 style="font-size: .9em;">Balance</h2></td>
						<td class="payment"><h2 style="font-size: .9em;">'.$balance.'.00</h2></td>
					</tr>';
			}
	     // $mail->Body    = 'Your new Password is'.$pass;'<br/>;
	      $mail->Body    = " 

	      <body style='font-family: 'Arial', sans-serif; font-weight: bold;'>
			  <div id='invoice-POS' style='box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);padding: 2mm;margin: 0 auto;width:80mm;background:#FFF;'>
			    
			    <center id='top' style='border-bottom: 1px solid #EEE;min-height: 100px;''>
			      <div class='logo'>
			      	<img src=".base_url('images/ProfixLogin.png')." style='height: 60px;'>
			      </div>
			      <div class='info' style='display: block;margin-left: 0;'> 
			        <h2 style='font-size: .9em;line-height: 1.2em;'>GADGET PROFIX</h2>
			        <p style='font-size: .7em;color: #666;'> 
			            Address : No.2B Bandar Pasir Puteh, Jalan Kota Bha</br>
			            Email   : gadgetprofix@gmail.com</br>
			            Telephone   : 017 999 0009</br>
			        </p>
			      </div>
			    </center>
				<div class='clearfix'></div>
			    
			    <div id='mid' style='border-bottom: 1px solid #EEE;min-height: 80px;'>
			      <div class='info' style='display: block;margin-left: 0;'>
			      	<h2 style='font-size: 0.9em;''></h2>
			      	<center>
				    	<div id='' style='margin-left: -10px; margin-top: -3px;margin-bottom: 9px;line-height: 1.2em;'>
					        <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJoAAAAqCAIAAADEV9U1AAAACXBIWXMAAA7EAAAOxAGVKw4bAAABUklEQVR4nO2c0Q6DIAxFy7L//+XuwYR0pWgdDvV6zxOyAs4zAZfUoqrSp5QiIqpaSlkia6EG1EMbvNTUso1x5UN6aCNdOewzHKINdr3Zc7CFtjdXGTZpv7s9tG1dQMhr5TNyO6gTCuqEgjqhoE4oqBMK6oSCOqGgTiioEwrqhII6oaBOKKgTCuqEgjqhoE4oqBMK6oSCOqGgTiioEwrqhII6oaBOKKgTCuqEgjqhoE4oqBOKsp5gRu7Fe/6QYZ6iTbhc6GU0hpG7hnPJnZkT22ze63MyV5lsVbVeBVseiZTIfdXj0mzbyHzzXp/zuYrOf+ASxfdG5ptv/qqmccJkO438JQ4j85VymckWWWfIsiQPzofuzQnyvYjmb+vDeZxO6exf8mReOXEWyGtnyOCt2dv9nrj9sZwwLaw8k/xcmR9IonVufPSLrJ38GwGKx0222HwAsHIUSuAus3EAAAAASUVORK5CYII=' alt='LILI 191123' class='bcimg' />		    
					    </div>
					</center>
					 ".$data_collect."

					 
					<div class='clearfix'></div>
			      </div>

			    </div>
			   
			    <div id='bot' style='border-bottom: 1px solid #EEE;min-height: 50px;'>
					<div id='table'>
						<table style='width: 100%;border-collapse: collapse;'>
							
							<tr class='tabletitle' style='font-size: 0.7em;background: #EEE;'>
								<td class='item' style='width: 47mm;'><h2 style='font-size: 0.9em;'>Repair Details</h2></td>
								<td class='Hours'></td>
								<td class='Rate price'></h2></td>
							</tr>
							
							".$data_collect2."
								
								
							
							".$data_collect3."
						</table>

						<small style='text-align: right !important;'></small>
					</div>

					<div id='legalcopy' style='margin-top: 5mm;'>
						<p class='legal' style='font-size: .9em;line-height: 1.2em;'> 
						</p>


					</div>
						<center>
							<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAABCAQMAAADZmpKrAAAABlBMVEUAAAD///+l2Z/dAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAA40lEQVQokV3SMYpFMQhAUSGtkK0ItgG3LtgGshXBVshkhvcnvm91qlyRADRWR4Iz/5KgYONdRTx6n9zesmgeX5rA+paEWDzvfXRqZ57uo73RRGVrkTMnMjgUaQIYmFWlm25B16I2xBuYQhEEDsw5tCgknTICioBZMjC1SEb0MD21qx6AsFO0KDK3Tz67XRnoQknSIup9rNlP7GrDDo+JVTLQHX+3uqKQpZaqVcuIl7zEMXgMkKq9qQ8RgSJoCZMYtEjCt6v8/YiPiEl4wXiLI9dqX5JJdk5+JZEtcL50ahbeZ9EPspQSxvqg2t0AAAAASUVORK5CYII=' alt='https://gadgettrading.net/repairs/' class='qrimg' />			</center>
						<div class='clearfix'></div>


			        
				</div>
		  </div>
		</body>

		"
	      ;
	      $mail->send();
	      redirect(base_url('admin/viewsales'));
	}
	function getDetailsModal($hold_id){
		$where = $hold_id;
		$data = array(
					'productdataa' => $this->d_get->get_posdetails($where,'tbl_posdetails')->result(),
					'getproductdetails' => $this->d_get->get_productdetails($where,'tbl_holdproduct')->result(),
					'getcalculation' => $this->d_get->get_calculation($where)->result()
				);
		return $this->load->view('admin/body/salesreport-1-viewsalesdetailstable.php', $data);
	}

}


