<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func_pos extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('D_post');
		$this->load->model('D_get');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		// $this->load->library('form_validation');
		// $this->load->library('upload');
		// $this->load->model('m_upload');
		if(ini_get('date.timezone') == ''){
		    date_default_timezone_set('UTC');
		    
		}
	}
	function openDrawer(){
		$result1 = $this->input->post('result1');
		$result2 = $this->input->post('result2');
		$result3 = $this->input->post('result3');
		$result4 = $this->input->post('result4');
		$result5 = $this->input->post('result5');
		$result6 = $this->input->post('result6');
		$result7 = $this->input->post('result7');
		$result8 = $this->input->post('result8');
		$result9 = $this->input->post('result9');
		$result10 = $this->input->post('result10');
		$uname = $this->input->post('uname');
		$ubranch = $this->input->post('ubranch');
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$currentdate = date('Y-m-d H:i:s');

		$total = $result1 + $result2 + $result3 + $result4 + $result5 + $result6 + $result7 + $result8 + $result9 + $result10;

		$datain = array(
						'openTime' => $currentdate,
						'openingCash' => $total,
						'currentBalance' => $total,
						'openBy' => $uname,
						'u_branch' => $ubranch
					);

		$this->db->insert('tbl_drawer', $datain);

		$logactivity = 'Open';
        $moduleclient = 'tbl_drawer';
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

		redirect(base_url('admin/pos'));
	}
	function closeDrawer(){
		$result1 = $this->input->post('result1');
		$result2 = $this->input->post('result2');
		$result3 = $this->input->post('result3');
		$result4 = $this->input->post('result4');
		$result5 = $this->input->post('result5');
		$result6 = $this->input->post('result6');
		$result7 = $this->input->post('result7');
		$result8 = $this->input->post('result8');
		$result9 = $this->input->post('result9');
		$result10 = $this->input->post('result10');
		$currentBalance = $this->input->post('currentBalance');
		$uname = $this->input->post('uname');
		$ubranch = $this->input->post('ubranch');
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$currentdate = date('Y-m-d H:i:s');
		$currentdatewhere = date('Y-m-d');

		$total = $result1 + $result2 + $result3 + $result4 + $result5 + $result6 + $result7 + $result8 + $result9 + $result10;
		if($total != $currentBalance)
		{
			?>
			<script type="text/javascript">
	            alert("Sorry, Not Equal to Current Balance");
	            window.location.href = '<?php echo base_url();?>admin/pos';
	        </script>
			<?php
		}
		else
		{
			$this->db->select('*');
			$this->db->from('tbl_drawer');
			// $this->db->where('openTime', $currentdate);
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where(array('closedTime' => NULL));
			$this->db->where('u_branch', $ubranch);
			$query11 = $this->db->get()->result();
			foreach ($query11 as $getid) {
				$idtorefer = $getid->id;
			}
			$datain = array(
						'closedTime' => $currentdate,
						'closingCash' => $total,
						'closedBy' => $uname,
						'u_branch' => $ubranch
					);
			$this->db->where('id', $idtorefer);
			$this->db->where('u_branch', $ubranch);
			$this->db->update('tbl_drawer', $datain);
			// echo $this->db->last_query(); exit();
			$logactivity = 'Closed';
	        $moduleclient = 'tbl_drawer';
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

			?>
			<script type="text/javascript">
	            alert("Shift Closed");
	            window.location.href = '<?php echo base_url();?>admin/pos';
	        </script>
			<?php
			// redirect(base_url('admin/pos'));
		}
	}
	// function clearpos(){
	// 	$holdid = $this->input->post('id');

	// 	redirect(base_url('admin/pos'));
	// }
	function viewsubpos(){
		$id = $this->input->post('id');

        $data['productdataa'] = $this->D_get->get_productposjoin($id)->result();
		return $this->load->view('admin/body/possubcategory-1',$data);
	}
	function viewsubposproduct(){
		$id = $this->input->post('id');
		$branch = $this->session->userdata('branch');
        $data = array(
        		'productpos' => $this->D_get->get_productposproduct($id)->result(),
        		'posdata' => $this->D_get->get_posdata($branch,'tbl_lookup_category')->result()
        	);

		return $this->load->view('admin/body/posproduct-1',$data);
	}
	function backviewsubcat(){
		$id = $this->input->post('id');
		// $data['productdataa'] = $this->D_get->get_backsubcat($id)->result();
		// $this->db->where('r_repairno', $id);
		$this->db->select('*');
		// $this->db->join('tbl_lookup_subcategory', 'tbl_lookup_subcategory.sub_id = tbl_product.p_subCategory');
		$this->db->where('sub_id', $id);
		$this->db->group_by('hold_id');
		$query =  $this->db->get('tbl_lookup_subcategory')->result();

		foreach ($query as $hold) {
			$holdidd = $hold->hold_id;
		}
		if(empty($holdidd)){
			// $data['productdataa'] = $this->D_get->get_productposjoin($id)->result();
			// return $this->load->view('admin/body/possubcategory-1',$data);
		}else{
			return $this->backviewsubcat2($holdidd);
		}
		// return $this->load->view('admin/body/possubcategory-1',$data);
	}
	function backviewsubcat2($holdidd){
		$data['productdataa'] = $this->D_get->get_backsubcat2($holdidd)->result();
		// $id = $this->input->post('id');
		// $data['productdataa'] = $this->D_get->get_backsubcat($id)->result();

		return $this->load->view('admin/body/possubcategory-1',$data);
	}
	function backviewcategory(){
		$holdid = $this->input->post('id');
		// var_dump($holdid); exit();
        $data['productdataa'] = $this->D_get->get_productbacktosubcategory($holdid)->result();
		return $this->load->view('admin/body/possubcategory-1',$data);
	}
	function backviewallcat(){
		$branch = $this->input->post('ubranch');
		$branch = $this->session->userdata('branch');
		$data['posdata'] = $this->D_get->get_posdata($branch,'tbl_lookup_category')->result();
        return $this->load->view('admin/body/posallcategory-1',$data);
	}
	function getDetailsProduct()
	{
		$id = $this->input->post('id');
		$query = $this->D_get->getDetailsProduct($id);

		if(empty($query)){
			echo 'Tiada Data Ditemui';
		} else {
			foreach ($query as $data) 
			{
			
			}
			echo json_encode($data);
		}
	}
	function getClientDetails(){
		$id = $this->input->post('send');
		$query = $this->D_get->get_clientDetails($id);

		if(empty($query)){
			echo 'Tiada Data Ditemui';
		} else {
			foreach ($query as $data) 
			{
			

			}
			echo json_encode($data);

		}
	}
	function dropdown_item_drop(){
		$data['item'] = $this->D_get->get_item()->result();
		$this->load->view('reparation-1.php',$data);
	}
	
	


	function saveValue()
	{
		$id = $this->input->post('id');
		$random_id = $this->input->post('hold_value');
		$product_name = $this->input->post('name');
		$unit_price = $this->input->post('price');
		$p_tax = $this->input->post('p_tax');
		$quantity = 1;
		$tax = 0.00;
		$discount = 0.00;
		$status = 0;

		$data = array(
						'pro_id'=>$id,
						'hold_id'=>$random_id,
						'pro_name'=>$product_name,
						'pro_qty'=>$quantity,
						'pro_price '=>$unit_price,
						'pro_disc'=>$discount,
						'pro_tax'=>$tax,
						'pro_status'=>$status
					 );
		// var_dump($data); exit();
		$this->db->insert('tbl_holdproduct', $data);

		$this->db->select('*');
		// $this->db->from('tbl_product');
		$this->db->where('p_id', $id);
		$queryselect = $this->db->get('tbl_product')->result();

		foreach ($queryselect as $getqty) {
			$qtyget = $getqty->p_quantity;
		}

		$calc = $qtyget - $quantity;

		$dataupdateqty = array(
								'p_quantity'=>$calc
							);
		$this->db->where('p_id', $id);
		$this->db->update('tbl_product', $dataupdateqty);

		// echo $this->db->last_query(); exit();
	}


	function update_store()
	{
		$id = $this->input->post('id');
		$random_id = $this->input->post('hold_value');
		$unit_price = $this->input->post('unit');
		$quantity = $this->input->post('qt');

		// echo $quantity; exit();
		$unit_price = $quantity * $unit_price;

		// var_dump($quantity);
		// exit();

		$data = array(
						'pro_qty '=>$quantity,
						'pro_price '=>$unit_price 
					 );

		$this->db->where('id',$id);
		$this->db->update('tbl_holdproduct', $data);

		$this->db->select('*');
		$this->db->where('id', $id);
		$queryselect = $this->db->get('tbl_holdproduct')->result();

		foreach ($queryselect as $getidpro) {
			$proget = $getidpro->pro_id;
		}

		$this->db->select('*');
		// $this->db->from('tbl_product');
		$this->db->where('p_id', $proget);
		$queryselectpro = $this->db->get('tbl_product')->result();

		foreach ($queryselectpro as $getqty) {
			$qtyget = $getqty->p_quantity;
		}

		// echo $qtyget; exit();
		$calcone = $qtyget + 1;
		$calc = $calcone - $quantity;

		$dataupdateqty = array(
								'p_quantity'=>$calc
							);
		$this->db->where('p_id', $proget);
		$this->db->update('tbl_product', $dataupdateqty);

		echo $this->db->last_query(); exit();
	}

	function update_storetax()
	{
		$id = $this->input->post('id');
		$random_id = $this->input->post('hold_value');
		$unit_price = $this->input->post('unit');
		$tax = $this->input->post('tax');

		// echo $quantity; exit();
		$unit_price = $tax + $unit_price;

		// var_dump($quantity);
		// exit();

		$data = array(
						'pro_tax'=>$tax,
						'pro_price '=>$unit_price 
					 );

		$this->db->where('id',$id);
		$this->db->update('tbl_holdproduct', $data);
	}
	function update_storedisc()
	{
		$id = $this->input->post('id');
		$random_id = $this->input->post('hold_value');
		$unit_price = $this->input->post('unit');
		$disc = $this->input->post('disc');

		// echo $quantity; exit();
		$unit_price = $unit_price - $disc;

		// var_dump($quantity);
		// exit();

		$data = array(
						'pro_disc'=>$disc,
						'pro_price '=>$unit_price 
					 );

		$this->db->where('id',$id);
		$this->db->update('tbl_holdproduct', $data);
	}



	function getTotal()
	{
		$random_id = $this->input->post('hold_value');
		$test1 = 1.00;
		$this->db->select('*, SUM(pro_price) AS total, SUM(pro_tax) AS totaltax, SUM(pro_disc) AS totaldisc');
		$this->db->where('hold_id', $random_id);
		$query =  $this->db->get('tbl_holdproduct')->result();
		foreach ($query as $data) 
		{
			// echo $data->unit_price;
			echo '
                <div class="total col-lg-6 right" style="float: right;">
	                <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
	            </div>
	            <div class="total col-lg-6 right" style="">
	                <label>Subtotal :&nbsp;&nbsp;&nbsp;&nbsp;</label>
	                <input type="number" name="allsubtotal" id="allsubtotal" style="width: 70px;float: right;margin-bottom: 10px;" placeholder="0.00" value="'.$data->total.'" readonly>
	            </div>
	            <div class="total col-lg-6 right" style="">
	                <label>Order Tax :&nbsp;&nbsp;&nbsp;&nbsp;</label>
	                <input type="number" name="alltotaltax" id="alltotaltax" style="width: 70px;float: right;" placeholder="0.00" value="'.$data->totaltax.'" readonly>
	            </div>
	            <div class="total col-lg-6 right" style="">
	                <label>Discount :&nbsp;&nbsp;&nbsp;&nbsp;</label>
	                <input type="number" name="alltotaldisc" style="width: 70px;float: right;" placeholder="0.00" value="'.$data->totaldisc.'" readonly>
	            </div>

				'
				;
		}
	}

	function getDetailsHold()
	{
		$hold_id = $this->input->post('hold_value');
		$this->db->where('hold_id', $hold_id);
		$query =  $this->db->get('tbl_holdproduct')->result();
		$i = 1;
		foreach ($query as $data) 
		{
			//echo $data->unit_price;


			// echo 
			// 		'<tr>
			// 			<input type="hidden" name="itemid[itemid][]" value="'.$data->pro_id.'">
			// 			<td width="80"><input type="text" name="itemname[itemname][]" value="'.$data->pro_name.'"></td>
			// 			<td width="45"><input name="itemquantity[itemquantity][]" type="number" value="'.$data->pro_qty.'" id="val'.$data->pro_id.'" onchange="kira('.$data->pro_id.')" placeholder="0" / style="width: 50px;">
			// 			</td>
			// 			<td width="50"><input type="text" name="itemprice[itemprice][]" id="unit'.$data->pro_id.'" value="'.$data->pro_price.'"></td>
			// 			<td width="50"><a onclick="deletehold('.$data->pro_id.')"><button type="button">X</button></a></td>
			// 			<input type="hidden" name="kirakira" value="'.$i++.'">
			// 			<td width="65"></td>
			// 			<td width="105"></td>
			// 		</tr>'
			// 	     ;
			echo '<tr>
                    <td width="80" style="overflow:hidden;"><input type="text" name="proname[proname][]" value="'.$data->pro_name.'"></td>
                    <td width="45" style="overflow:hidden;"><input name="proqty[proqty][]" type="number" value="'.$data->pro_qty.'" id="val'.$data->id.'" onchange="kira('.$data->id.')" placeholder="0"></td>
                    <td width="50" style="overflow:hidden;"><input type="text" name="proprice[proprice][]" id="unit'.$data->id.'" value="'.$data->pro_price.'"></td>
                    <td width="50" style="overflow:hidden;"><input name="protax[protax][]" type="number" value="'.$data->pro_tax.'" id="valtax'.$data->id.'" onchange="kiratax('.$data->id.')" placeholder="0"></td>
                    <td width="65" style="overflow:hidden;"><input name="prodisc[prodisc][]" type="number" value="'.$data->pro_disc.'" id="valdisc'.$data->id.'" onchange="kiradisc('.$data->id.')" placeholder="0"></td>
                    <td width="65" style="overflow:hidden;"><a onclick="deletehold('.$data->id.')"><button type="button">X</button></a></td><input type="hidden" name="kirakira" value="'.$i++.'"></td>
                </tr>
                '
                ;

		}
	
	}
	function deleteprohold(){
		$id = $this->input->post('id');
		$query = $this->D_get->deleteproholdpos($id);
		// $this->db->select('pro_price');
		// $this->db->from('tbl_holdproduct');
		// $this->db->where('id', $id);
		// $query1 = $this->db->get()->result();

		// foreach ($query1 as $get) {
		// 	echo $get->pro_price;
		// }
		if(empty($query)){
			echo 'Tiada Data Ditemui';
		} else {
			foreach ($query as $data) 
			{
			

			}
			echo json_encode($data);

		}
	}

	function deletehold(){
		$id = $this->input->post('id');
		$proid = $this->input->post('proid');
		$proqty = $this->input->post('proqty');

		$this->db->select('*');
		// $this->db->from('tbl_product');
		$this->db->where('p_id', $proid);
		$queryselect = $this->db->get('tbl_product')->result();

		foreach ($queryselect as $getqty) {
			$qtyget = $getqty->p_quantity;
		}

		$calc = $qtyget + $proqty;
		// echo $calc; exit();
		$dataupdateqty = array(
								'p_quantity'=>$calc
							);
		$this->db->where('p_id', $proid);
		$this->db->update('tbl_product', $dataupdateqty);
		
		$this->db->where('id',$id);
		$this->db->delete('tbl_holdproduct');
	}

	function addbuying(){
		$holdid = $this->input->post('hold_value');

		$cust = $this->input->post('id_selected');

		$total = $this->input->post('allsubtotal');
		$uname = $this->input->post('uname');
		$branch = $this->input->post('ubranch');
		$transactionid = $this->input->post('transactionid');
		// Payment Section
		$payref = $this->input->post('pay_ref');
		$payamount = $this->input->post('pay_amount');
		$paytype = $this->input->post('pay_type');
		$paynote = $this->input->post('pay_note');
		
		$status = 1;
		date_default_timezone_set('Asia/Kuala_lumpur');
		$date = date('Y-m-d H:i:s');
		
		$balance = $total - $payamount;
		if ($balance < 0)
		{
			$positive = abs($balance);
		}else{
			$positive = $balance;
		}

		$datastatus = array(
					'pro_status'=>$status
				);

		$this->db->where('hold_id',$holdid);
		$this->db->update('tbl_holdproduct',$datastatus);

		$branch1 = $this->session->userdata('branch');

		$balance2 = $total - $payamount;
		if($balance2 < 0)
		{
			$revenuebalance = $total;
		}else{
			$revenuebalance = $payamount;
		}
		$paymentrevenue = array(
				'revenue_date'=>$date,
				'revenue_holdid' => $transactionid,
				'revenue_subtotal'=>$revenuebalance,
				'u_branch'=>$branch1
			);
		$this->db->insert('tbl_revenue',$paymentrevenue);

		// $this->db->select('*');
		// $this->db->from('tbl_client');
		// $queryclient = $this->db->get();
		// foreach ($queryclient as $getclientid) {
		// 	$getclientid->c_id;
		// }
		$buydata = array(
						'c_id'=>$cust,
						'total'=>$total,
						'date_pos'=>$date,
						'total_paid'=>$revenuebalance,
						'user_incharge'=>$uname,
						'u_branch'=>$branch,
						'transaction_id'=>$transactionid,
						'hold_id'=>$holdid 
					 );
		// var_dump($buydata); exit();
		$this->db->insert('tbl_posdetails',$buydata);

		$balance3 = $total - $payamount;
		if($balance3 < 0)
		{
			$cashreturn = abs($balance3);
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$currentdate = date('Y-m-d');
			$this->db->select('openingCash');
			$this->db->from('tbl_drawer');
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where('u_branch', $branch);
			$query5 = $this->db->get()->result();
			foreach ($query5 as $drawer) {
				$cash = $drawer->openingCash;
			}
			$dataindrawer = $cash - $cashreturn;
			$changebalance = array(
								'currentBalance'=>$dataindrawer
							);
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where('u_branch', $branch);
			$this->db->update('tbl_drawer', $changebalance);
			// echo $this->db->last_query(); exit();
		}else{

			date_default_timezone_set("Asia/Kuala_Lumpur");
			$currentdate = date('Y-m-d');
			$this->db->select('openingCash');
			$this->db->from('tbl_drawer');
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where('u_branch', $branch);
			$query5 = $this->db->get()->result();
			// echo $this->db->last_query(); exit();
			foreach ($query5 as $drawer) {
				$cash = $drawer->openingCash;
			}
			$dataindrawer = $cash + $payamount;
			$changebalance = array(
								'currentBalance'=>$dataindrawer
							);
			$this->db->where('DAY(openTime)', date('d'));
			$this->db->where('MONTH(openTime)', date('m'));
			$this->db->where('YEAR(openTime)', date('Y'));
			$this->db->where('u_branch', $branch);
			$this->db->update('tbl_drawer', $changebalance);

			// echo $this->db->last_query(); exit();
		}
		// Insert new pos item in tbl_pospayment
		$paydetails = array(
						'pay_ref' => $payref,
						'pay_amount' => $payamount,
						'u_branch' => $branch,
						'pay_note' => $paynote,
						'pay_date'=>$date,
						'transaction_id'=>$transactionid,
						'hold_id'=>$holdid
					 );
		// var_dump($buydata); exit();
		$this->db->insert('tbl_pospayment',$paydetails);

		$logactivity = 'Add';
        $moduleclient = 'tbl_pospayment'.'/tbl_posdetails'.'/tbl_holdproduct';
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
		// return $this->addpaymentpos($date,$transactionid,$holdid,$positive,$payref,$payamount,$paytype,$paynote);
		return $this->printreceipt($cust,$holdid);
	}

	function printreceipt($cust,$holdid){
		// $where = $this->input->post('reparationID');
		$logactivity = 'Print';
        $moduleclient = 'tbl_pospayment'.'/tbl_posdetails';
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

		$data = array(
			'custinfo' => $this->D_get->get_custinfo($cust)->result(),
			'productinfo' => $this->D_get->get_productinfo($holdid)->result(),
            'paymentinfo' => $this->D_get->get_paymentinfo($holdid)->result(),
            'paidinfo' => $this->D_get->get_paidinfo($holdid)->result()
        );
	$this->load->view('admin/header/header.php');
	$this->load->view('admin/body/print-pos-receipt.php',$data);
	$this->load->view('admin/footer/footer.php');
	}

}
