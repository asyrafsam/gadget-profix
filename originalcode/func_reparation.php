<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_reparation extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('d_post');
		$this->load->model('d_get');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		// $this->load->library('form_validation');
		// $this->load->library('upload');
		// $this->load->model('m_upload');
	}
	
	function getClientDetails(){
		$id = $this->input->post('send');
		$query = $this->d_get->get_clientDetails($id);

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
		$data['item'] = $this->d_get->get_item()->result();
		$this->load->view('reparation-1.php',$data);
	}
	
	function getDetails()
	{
		$id = $this->input->post('id');
		$query = $this->d_get->getDetails($id);

		if(empty($query)){
			echo 'Tiada Data Ditemui';
		} else {
			foreach ($query as $data) 
			{
			

			}
			echo json_encode($data);

		}
	}


	function saveValue()
	{
		$id = $this->input->post('id');
		$random_id = $this->input->post('hold_value');
		$product_name = $this->input->post('name');
		$unit_price = $this->input->post('price');
		$quantity = 1;

		$data = array(
						'id_item'=>$id,
						'random_id'=>$random_id,
						'product_name'=>$product_name,
						'quantity '=>$quantity,
						'unit_price  '=>$unit_price 
					 );

		$this->db->insert('tbl_hold', $data);
	}


	function update_store()
	{
		$id = $this->input->post('id');
		$random_id = $this->input->post('hold_value');
		$unit_price = $this->input->post('unit');
		$quantity = $this->input->post('qt');


		$unit_price = $quantity * $unit_price;

		var_dump($quantity);
		// exit();

		$data = array(
						'quantity '=>$quantity,
						'unit_price '=>$unit_price 
					 );

		$this->db->where('id',$id);
		$this->db->update('tbl_hold', $data);
	}


	function getTotal()
	{
		$random_id = $this->input->post('hold_value');
		$test1 = 1.00;
		$this->db->select('*, SUM(unit_price) AS unit_price');
		$this->db->where('random_id', $random_id);
		$query =  $this->db->get('tbl_hold')->result();
		foreach ($query as $data) 
		{
			// echo $data->unit_price;
			echo $data->unit_price;
		}
	}

	function getDetailsHold()
	{
		$hold_id = $this->input->post('hold_value');
		$this->db->where('random_id', $hold_id);
		$query =  $this->db->get('tbl_hold')->result();
		$i = 1;
		foreach ($query as $data) 
		{
			//echo $data->unit_price;


			echo 
					'<tr>
						<input type="hidden" name="itemid[itemid][]" value="'.$data->id_item.'">
						<td><input type="text" name="itemname[itemname][]" value="'.$data->product_name.'"></td>
						<td><input name="itemquantity[itemquantity][]" type="number" value="'.$data->quantity.'" id="val'.$data->id.'" onchange="kira('.$data->id.')" placeholder="0" / style="width: 50px;">
						</td>
						<td><input type="text" name="itemprice[itemprice][]" id="unit'.$data->id.'" value="'.$data->unit_price.'"></td>
						<td><a onclick="deletehold('.$data->id.')"><button type="button">X</button></a></td>
						<input type="hidden" name="kirakira" value="'.$i++.'">
					</tr>'
				     ;

		}
	
	}

	function deletehold(){
		$id = $this->input->post('id');
		$this->db->where('id',$id);
		$this->db->delete('tbl_hold');
	}

	public function add_reparation(){
		$addimei = $this->input->post('addimei');
		$addclient = $this->input->post('addclient');
		$addclientno = $this->input->post('addclientno');
		$clientemail = $this->input->post('clientemail');
		$clientid = $this->input->post('clientid');
		$addcategory = $this->input->post('addcategory');
		$addassign = $this->input->post('addassign');
		$addmanufacturer = $this->input->post('addmanufacturer');
		$addmodel = $this->input->post('addmodel');
		$adddefect = $this->input->post('adddefect');
		$addservicecharge = $this->input->post('addservicecharge');
		$dateopen = $this->input->post('dateopen');


		$reparationstatus = 'Pending';
 		
 		$adddate = $this->input->post('adddate');
		$addperiod = $this->input->post('addperiod');
		$addcomment = $this->input->post('addcomment');
		$addtax = $this->input->post('addtax');

		$hold_id = $this->input->post('hold_value');

		$sig = $this->input->post('sig');
		$subtotal = $this->input->post('subtotal');
		$taxshow = $this->input->post('taxshow');
		$alltotal = $this->input->post('alltotal');
		$uname = $this->input->post('uname');
		$ubranch = $this->input->post('ubranch');

		
        

		// hold_id jangan lupa(tbl_reparation_item)
		$itemid = $this->input->post('itemid');
		$itemname = $this->input->post('itemname');
		$itemprice = $this->input->post('itemprice');
		$itemquantity = $this->input->post('itemquantity');
		$kira = $this->input->post('kirakira');

		for($i=0;$i<$kira;$i++){
			$item0 =  $itemid['itemid'][$i];
			$item1 =  $itemname['itemname'][$i];
			$item2 =  $itemprice['itemprice'][$i];
			$item3 =  $itemquantity['itemquantity'][$i];
			
			$products = array(
				'id_item' => $item0,
				'itemName' => $item1,
				'itemPrice' => $item2,
				'itemQuantity' => $item3,
				'hold_id' => $hold_id
			);
			$this->db->insert('tbl_reparation_item',$products);
		}
		// hold_id jangan lupa (tbl_repair_details)
		$adddiagnostics = $this->input->post('adddiagnostics');
		$addrepairstatus = $this->input->post('addrepairstatus');
		$addrepairno = $this->input->post('addrepairno');
		$addfile = $this->input->post('addfile');

		$payment = array(
				'r_repairno' => $addrepairno,
				'hold_id' => $hold_id
			);
		$this->db->insert('tbl_payment',$payment);

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 2024;
        $config['max_height']           = 1068;
        $config['encrypt_name']           = TRUE;
        $config['remove_spaces']           = TRUE;

        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('addfile'))
        {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error); exit();

                echo 'tak jadi';
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $fname = $this->upload->data('file_name');
                // $fname = base_url().'/uploads/'.$fname;

                $datarepair = array(
					'hold_id' => $hold_id,
					'r_diagnostics' => $adddiagnostics,
					'r_repairstatus' => $addrepairstatus,
					'r_repairno' => $addrepairno,
					'r_file' => $fname
				);
				$query0 = $this->d_post->addrepairdetails($datarepair,'tbl_repair_details');

				$this->db->where('random_id',$hold_id);
				$this->db->delete('tbl_hold');
				
        }

        if($clientemail == ''){
	        $datareparation = array(
	        	'hold_id' => $hold_id,
	        	'c_id' => $clientid,
				'r_imei' => $addimei,
				'r_name' => $addclient,
				'r_telephone' => $addclientno,
				'r_category' => $addcategory,
				'r_assigned' => $addassign,
				'r_repairno' => $addrepairno,
				'r_manufacturer' => $addmanufacturer,
				'r_model' => $addmodel,
				'r_defect' => $adddefect,
				'r_servicecharge' => $addservicecharge,
				'r_opened' => $dateopen,
				'r_closedate' => $adddate,
				'r_period' => $addperiod,
				'r_comment' => $addcomment,
				'r_taxtype' => $addtax,
				'r_signature' => $sig,
				'r_subtotal' => $subtotal,
				'r_tax' => $taxshow,
				'r_total' => $alltotal,
				'r_status' => $reparationstatus,
				'r_created' => $uname,
				'r_lastmodified' => $uname,
				'u_branch' => $ubranch
			);
			$this->d_post->addreparationall($datareparation,'tbl_reparation');
			redirect(base_url('admin/reparation'));
		}else{
			$datareparation = array(
	        	'hold_id' => $hold_id,
	        	'c_id' => $clientid,
				'r_imei' => $addimei,
				'r_name' => $addclient,
				'r_email' => $clientemail,
				'r_telephone' => $addclientno,
				'r_category' => $addcategory,
				'r_assigned' => $addassign,
				'r_repairno' => $addrepairno,
				'r_manufacturer' => $addmanufacturer,
				'r_model' => $addmodel,
				'r_defect' => $adddefect,
				'r_servicecharge' => $addservicecharge,
				'r_opened' => $dateopen,
				'r_closedate' => $adddate,
				'r_period' => $addperiod,
				'r_comment' => $addcomment,
				'r_taxtype' => $addtax,
				'r_signature' => $sig,
				'r_subtotal' => $subtotal,
				'r_tax' => $taxshow,
				'r_total' => $alltotal,
				'r_status' => $reparationstatus,
				'r_created' => $uname,
				'r_lastmodified' => $uname,
				'u_branch' => $ubranch
			);
			$this->d_post->addreparationall($datareparation,'tbl_reparation');
			return $this->sendMail($clientemail);
		}
	}
	function sendMail($clientemail){

		include('assets/php-mailer-master/PHPMailerAutoload.php');
		$test = 'asyrafsam14@gmail.com';
		$mail = new PHPMailer;

                   //$mail->SMTPDebug = 2;                               // Enable verbose debug output

	      $mail->IsSMTP();                                      // Set mailer to use SMTP
	      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	      $mail->SMTPAuth = true;
	      // $mail->SMTPDebug = 2;
	      $mail->SMTPAutoTLS = false;
	      $mail->Host = gethostbyname('tls://smtp.gmail.com');                               // Enable SMTP authentication
	      $mail->Username = 'systemcharity14@gmail.com';                 // SMTP username
	      $mail->Password = 'systemcharity1996';                           // SMTP password
	      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	      $mail->Port = 587;                                    // TCP port to connect to

	      $mail->setFrom('systemcharity14@gmail.com', 'UTeM Charity Management System');     // Add a recipient
	      $mail->addAddress($clientemail);              // Name is optional
	      //$mail->addReplyTo('info@example.com', 'Information');
	      //$mail->addCC('cc@example.com');
	      //$mail->addBCC('bcc@example.com');

	            // Set email format to HTML

	      $mail->Subject = 'Respond for Your Application Registration';
	     // $mail->Body    = 'Your new Password is'.$pass;'<br/>;
	      $mail->Body    = 'Hi! . Your login information: -

	      Your Default Password : 
	      
	      
	      Note:Please Login to the system and change your password';
	      $mail->send();
	      redirect(base_url('admin/reparation'));
	}
	function getReparation($id){
		$data = $this->d_get->show_reparation($id);
		echo json_encode($data);
	}
	function changeStatus(){
		$datawhere = $this->input->post('rcode');
		$data1 = $this->input->post('changeStatus');
		$datain = 'Approved by '.$data1;
		$datachange = array(
						'r_status' => $datain
					);
		$where = array(
						'r_code' => $datawhere
					);
		$this->d_post->changeStatus($where,$datachange,'tbl_reparation');
		redirect(base_url('admin/reparation'));
	}
	function add_payment(){
		$repairno = $this->input->post('repairno');
		$paydate = $this->input->post('pay_date');
		$payref = $this->input->post('pay_ref');
		$payamount = $this->input->post('pay_amount');
		$paytype = $this->input->post('pay_type');
		$paynote = $this->input->post('pay_note');

		$addpay = array(
						'pay_date' => $paydate,
						'pay_ref' => $payref,
						'pay_amount' => $payamount,
						'pay_type' => $paytype,
						'pay_note' => $paynote
					);
		$where = array(
					'r_repairno' => $repairno
				);
		$this->d_post->changePayment($where,$addpay,'tbl_payment');
		?>
		<script type="text/javascript">
            alert("Payment Added");
            window.location.href = '<?php echo base_url();?>admin/reparation';
        </script>
		<?php
	}
	function getPayment($id){
		$data = $this->d_get->show_payment($id);
		echo json_encode($data);
	}
	function delete_payment(){
		$data = $this->input->post('rrepairno');
		$change = '0.00';
		$change1 = '-';
		$where = array(
					'r_repairno' => $data
				);
		$addpay = array(
						'pay_amount' => $change,
						'pay_type' => $change1
					);

		$this->d_post->changePayment($where,$addpay,'tbl_payment');
		redirect(base_url('admin/reparation'));
	}
	function deletereparation(){
		$id = $this->input->post('id');
		$this->db->where('r_repairno',$id);
		$this->db->delete('tbl_reparation');

		return $this->deletePaymentbyid($id);
	}
	function deletePaymentbyid($id){
		$this->db->where('r_repairno',$id);
		$this->db->delete('tbl_payment');

		return $this->deleteRepairbyid($id);
	}
	function deleteRepairbyid($id){
		$this->db->where('r_repairno',$id);
		$this->db->delete('tbl_repair_details');
	}
	function getReparationEdit($id){
		$data = $this->d_get->show_reparation($id);
		echo json_encode($data);
	}
	function getDetailsHoldEdit()
	{
		$hold_id = $this->input->post('hold_value');
		$this->db->where('random_id', $hold_id);
		$query =  $this->db->get('tbl_hold')->result();
		$i = 1;
		foreach ($query as $data) 
		{
			//echo $data->unit_price;


			echo 
					'<tr>
						<input type="hidden" name="edititemid[edititemid][]" value="'.$data->id_item.'">
						<td><input type="text" name="edititemname[edititemname][]" value="'.$data->product_name.'"></td>
						<td><input name="edititemquantity[edititemquantity][]" type="number" value="'.$data->quantity.'" id="vall'.$data->id.'" onchange="kira('.$data->id.')" placeholder="0" / style="width: 50px;">
						</td>
						<td><input type="text" name="edititemprice[edititemprice][]" id="unitt'.$data->id.'" value="'.$data->unit_price.'"></td>
						<td><a onclick="deleteholdEdit('.$data->id.')"><button type="button">X</button></a></td>
						<input type="hidden" name="editkirakira" value="'.$i++.'">
					</tr>'
				     ;

		}
	}
	public function edit_reparation()
	{
		echo $editimei = $this->input->post('editImei');
		echo $editclient = $this->input->post('editName');
		echo $editclientno = $this->input->post('editTelephone');
		echo $editclientemail = $this->input->post('editEmail');
		echo $editclientid = $this->input->post('editClientid');
		echo $editcategory = $this->input->post('editCategory');
		echo $editassign = $this->input->post('editAssign');
		echo $editmanufacturer = $this->input->post('editManufacturer');
		echo $editmodel = $this->input->post('editModel');
		echo $editdefect = $this->input->post('editDefect');
		echo $editservicecharge = $this->input->post('editServicecharge');
		echo $editdateopen = $this->input->post('editDateopen');


		$reparationstatus = 'Pending';
 		
 		echo $editdate = $this->input->post('editDate');
		echo $editperiod = $this->input->post('editPeriod');
		echo $editcomment = $this->input->post('editComment');
		echo $edittax = $this->input->post('editTax');

		echo $hold_id = $this->input->post('hold_editvalue');

		$editsig = $this->input->post('editSig');
		echo $subtotal = $this->input->post('editSubtotal');
		echo $taxshow = $this->input->post('editTaxshow');
		echo $alltotal = $this->input->post('editAlltotal');
		$uname = $this->input->post('uname');
		// $ubranch = $this->input->post('ubranch');

		
        // hold_id jangan lupa(tbl_reparation_item)
		$edititemid = $this->input->post('edititemid');
		$edititemname = $this->input->post('edititemname');
		$edititemprice = $this->input->post('edititemprice');
		$edititemquantity = $this->input->post('edititemquantity');
		$editkira = $this->input->post('editkirakira');

		for($i=0;$i<$editkira;$i++){
			$item0 =  $edititemid['edititemid'][$i];
			$item1 =  $edititemname['edititemname'][$i];
			$item2 =  $edititemprice['edititemprice'][$i];
			$item3 =  $edititemquantity['edititemquantity'][$i];
			
			$products = array(
				'id_item' => $item0,
				'itemName' => $item1,
				'itemPrice' => $item2,
				'itemQuantity' => $item3,
				'hold_id' => $hold_id
			);
			$this->db->insert('tbl_reparation_item',$products);
		}
		// hold_id jangan lupa (tbl_repair_details)
		$editdiagnostics = $this->input->post('editDiagnostics');
		$editrepairstatus = $this->input->post('editRepairstatus');
		$editrepairno = $this->input->post('editRepairno');
		$editfile = $this->input->post('editFile');

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 2024;
        $config['max_height']           = 1068;
        $config['encrypt_name']           = TRUE;
        $config['remove_spaces']           = TRUE;

        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('editFile'))
        {
                $error = array('error' => $this->upload->display_errors());

                $editdatarepair = array(
					'r_diagnostics' => $editdiagnostics,
					'r_repairstatus' => $editrepairstatus,
					'r_repairno' => $editrepairno
				);


				$this->db->where('hold_id',$hold_id);
				$this->db->update('tbl_repair_details', $editdatarepair);

				$this->db->where('random_id',$hold_id);
				$this->db->delete('tbl_hold');
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $fname = $this->upload->data('file_name');
                // $fname = base_url().'/uploads/'.$fname;

                $editdatarepairall = array(
					'r_diagnostics' => $editdiagnostics,
					'r_repairstatus' => $editrepairstatus,
					'r_repairno' => $editrepairno,
					'r_file' => $fname
				);

				$this->db->where('hold_id',$hold_id);
				$this->db->update('tbl_repair_details', $editdatarepairall);

				$this->db->where('random_id',$hold_id);
				$this->db->delete('tbl_hold');
        }

		if($editclientemail == ''){
	        $editdatareparation = array(
	        	'c_id' => $editclientid,
				'r_imei' => $editimei,
				'r_name' => $editclient,
				'r_telephone' => $editclientno,
				'r_category' => $editcategory,
				'r_assigned' => $editassign,
				'r_repairno' => $editrepairno,
				'r_manufacturer' => $editmanufacturer,
				'r_model' => $editmodel,
				'r_defect' => $editdefect,
				'r_servicecharge' => $editservicecharge,
				'r_opened' => $editdateopen,
				'r_closedate' => $editdate,
				'r_period' => $editperiod,
				'r_comment' => $editcomment,
				'r_taxtype' => $edittax,
				'r_signature' => $editsig,
				'r_subtotal' => $editsubtotal,
				'r_tax' => $edittaxshow,
				'r_total' => $editalltotal,
				'r_lastmodified' => $uname,
			);
			$this->db->where('hold_id',$hold_id);
			$this->db->update('tbl_reparation', $editdatareparation);
			redirect(base_url('admin/reparation'));
		}else{
			$datareparation = array(
	        	'c_id' => $editclientid,
				'r_imei' => $editimei,
				'r_name' => $editclient,
				'r_email' => $editclientemail,
				'r_telephone' => $editclientno,
				'r_category' => $editcategory,
				'r_assigned' => $editassign,
				'r_repairno' => $editrepairno,
				'r_manufacturer' => $editmanufacturer,
				'r_model' => $editmodel,
				'r_defect' => $editdefect,
				'r_servicecharge' => $editservicecharge,
				'r_opened' => $editdateopen,
				'r_closedate' => $editdate,
				'r_period' => $editperiod,
				'r_comment' => $editcomment,
				'r_taxtype' => $edittax,
				'r_signature' => $editsig,
				'r_subtotal' => $editsubtotal,
				'r_tax' => $edittaxshow,
				'r_total' => $editalltotal,
				'r_lastmodified' => $uname,
			);
			$this->db->where('hold_id',$hold_id);
			$this->db->update('tbl_reparation', $editdatareparation);
			return $this->sendMailEdit($editclientemail);
		}
		
	}
	function sendMailEdit($editclientemail){

		include('assets/php-mailer-master/PHPMailerAutoload.php');
		$test = 'asyrafsam14@gmail.com';
		$mail = new PHPMailer;

                   //$mail->SMTPDebug = 2;                               // Enable verbose debug output

	      $mail->IsSMTP();                                      // Set mailer to use SMTP
	      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	      $mail->SMTPAuth = true;
	      // $mail->SMTPDebug = 2;
	      $mail->SMTPAutoTLS = false;
	      $mail->Host = gethostbyname('tls://smtp.gmail.com');                               // Enable SMTP authentication
	      $mail->Username = 'systemcharity14@gmail.com';                 // SMTP username
	      $mail->Password = 'systemcharity1996';                           // SMTP password
	      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	      $mail->Port = 587;                                    // TCP port to connect to

	      $mail->setFrom('systemcharity14@gmail.com', 'UTeM Charity Management System');     // Add a recipient
	      $mail->addAddress($editclientemail);              // Name is optional
	      //$mail->addReplyTo('info@example.com', 'Information');
	      //$mail->addCC('cc@example.com');
	      //$mail->addBCC('bcc@example.com');

	            // Set email format to HTML

	      $mail->Subject = 'Respond for Your Application Registration';
	     // $mail->Body    = 'Your new Password is'.$pass;'<br/>;
	      $mail->Body    = 'Hi! . Your login information: -

	      Your Default Password : 
	      
	      
	      Note:Please Login to the system and change your password';
	      $mail->send();
	      redirect(base_url('admin/reparation'));
	}

}
