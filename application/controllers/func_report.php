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
	function viewgraphtotal(){
		$month = $this->input->post('month');
		$time=strtotime($month);
		$m=date("m",$time);
		$y=date("Y",$time);

		$this->db->select('pay_date, SUM(pay_amount) as totalpaid');
		$this->db->where('MONTH(pay_date)', $m);
		$this->db->where('YEAR(pay_date)', date('Y'));
		$query =  $this->db->get('tbl_payment')->result();
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

		// $testtosum = $testtotalsum + $payamount;
		$dataupdateposdetails = array(
								'total_paid'=>$testtotalsum
							);
		$this->db->where('transaction_id', $transactionID);
		$this->db->update('tbl_posdetails', $dataupdateposdetails);
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
		

		$this->db->select('tbl_pospayment.transaction_id, tbl_posdetails.total_paid, tbl_pospayment.pay_amount');
		$this->db->from('tbl_pospayment');
		$this->db->join('tbl_posdetails', 'tbl_posdetails.transaction_id = tbl_pospayment.transaction_id');
		$this->db->where('tbl_pospayment.id',$data);
		$getrepairno = $this->db->get()->result();
		foreach ($getrepairno as $no) {
			$posjoin = $no->transaction_id;
			$pospaid = $no->total_paid;
			$paidamount = $no->pay_amount;
		}

		$calc = $pospaid - $paidamount;

		// echo $calc; exit();
		$updatepaid = array(
						'total_paid'=>$calc
					);
		$this->db->where('transaction_id', $posjoin);
		$this->db->update('tbl_posdetails', $updatepaid);
		
		$where = array(
					'id' => $data
				);
		$addpay = array(
						'pay_date' => $changedate,
						'pay_amount' => $change,
						'pay_type' => $change1
					);

		$this->db->delete('tbl_pospayment', $where);
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

}


