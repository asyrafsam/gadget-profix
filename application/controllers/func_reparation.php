<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func_reparation extends CI_Controller {


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
	
	function getDetails()
	{
		$id = $this->input->post('id');
		$query = $this->D_get->getDetails($id);

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

	}


	function update_store()
	{
		$id = $this->input->post('id');
		$random_id = $this->input->post('hold_value');
		$unit_price = $this->input->post('unit');
		$quantity = $this->input->post('qt');
		$itemid = $this->input->post('itemid');

		$unit_price = $quantity * $unit_price;

		// var_dump($quantity); exit();
		// exit();
		$this->db->select('*');
		// $this->db->from('tbl_product');
		$this->db->where('p_id', $itemid);
		$queryselect = $this->db->get('tbl_product')->result();

		foreach ($queryselect as $getqty) {
			$qtyget = $getqty->p_quantity;
		}

		$calc = $qtyget - $quantity;

		$dataupdateqty = array(
								'p_quantity'=>$calc
							);
		$this->db->where('p_id', $itemid);
		$this->db->update('tbl_product', $dataupdateqty);

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
						<input type="hidden" name="itemid[itemid][]" id="itemid'.$data->id.'" value="'.$data->id_item.'">
						<td><input type="text" name="itemname[itemname][]" value="'.$data->product_name.'"></td>
						<td><input name="itemquantity[itemquantity][]" type="number" value="'.$data->quantity.'" id="val'.$data->id.'" onchange="kira('.$data->id.')" placeholder="0" style="width: 50px;">
						</td>
						<td><input type="text" name="itemprice[itemprice][]" id="unit'.$data->id.'" value="'.$data->unit_price.'"></td>
						<td><a onclick="deletehold('.$data->id.')"><button type="button">X</button></a></td>
						<input type="hidden" name="kirakira" value="'.$i++.'">
					</tr>'
				     ;

		}
	
	}

	function deleteprohold(){
		$id = $this->input->post('id');
		$query = $this->D_get->deleteprohold($id);

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
		// echo $proid; exit();
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
		$this->db->delete('tbl_hold');
	}

	public function add_reparation(){
		$addtype = $this->input->post('addtype');
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
		$branch1 = $this->session->userdata('branch');


		$reparationstatus = 'Pending';
 		
 		$adddate = $this->input->post('adddate');
		$addperiod = $this->input->post('addperiod');
		$addcomment = $this->input->post('addcomment');
		// $addtax = $this->input->post('addtax');
		$hold_id = $this->input->post('hold_value');

		$sig = $this->input->post('sig');
		$subtotal = $this->input->post('subtotal');
		$taxshow = $this->input->post('taxshow');
		$alltotal = $this->input->post('alltotal');
		$uname = $this->input->post('uname');
		$ubranch = $this->input->post('ubranch');

		$id_selected = $this->input->post('id_selected');

		$this->db->select('*');
		$this->db->from('tbl_repair_status');
		$this->db->where('id', $id_selected);
		$querystatus = $this->db->get()->result();
        
		foreach ($querystatus as $statuscheck) {
			$statuscompleted = $statuscheck->status_completed;
			$statusemail = $statuscheck->status_email;
			$statusbg = $statuscheck->statusBGColor;
			$statustext = $statuscheck->statusTextColor;
			$statusTemplate = $statuscheck->statusTemplate;
		}

		// echo $this->db->last_query(); exit();
		$insert = 'Insert New Reparation';
		// hold_id jangan lupa(tbl_reparation_item)
		$itemid = $this->input->post('itemid');
		$itemname = $this->input->post('itemname');
		$itemprice = $this->input->post('itemprice');
		$itemquantity = $this->input->post('itemquantity');
		$kira = $this->input->post('kirakira');

		// for($i=0;$i<$kira;$i++){
		// 	$item0 =  $itemid['itemid'][$i];
		// 	$item1 =  $itemname['itemname'][$i];
		// 	$item2 =  $itemprice['itemprice'][$i];
		// 	$item3 =  $itemquantity['itemquantity'][$i];
			
		// 	$products = array(
		// 		'id_item' => $item0,
		// 		'itemName' => $item1,
		// 		'itemPrice' => $item2,
		// 		'itemQuantity' => $item3,
		// 		'hold_id' => $hold_id
		// 	);
		// 	$this->db->insert('tbl_reparation_item',$products);
		// }
		// hold_id jangan lupa (tbl_repair_details)
		$adddiagnostics = $this->input->post('adddiagnostics');
		$addrepairstatus = $this->input->post('addrepairstatus');
		$addrepairno = $this->input->post('addrepairno');
		$addfile = $this->input->post('addfile');
		$branch1 = $this->session->userdata('branch');
		$payment = array(
				'r_repairno' => $addrepairno,
				'hold_id' => $hold_id,
				'u_branch'=> $branch1
			);
		$this->db->insert('tbl_payment',$payment);

		// Insert new id to refer in tbl_revenue
		$branch1 = $this->session->userdata('branch');
		$paymentrevenue = array(
				'revenue_holdid' => $addrepairno,
				'u_branch' => $branch1
			);
		$this->db->insert('tbl_revenue',$paymentrevenue);

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100000;
        $config['max_width']            = 20024;
        $config['max_height']           = 10068;
        $config['encrypt_name']           = TRUE;
        $config['remove_spaces']           = TRUE;

        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('addfile'))
        {
                // $error = array('error' => $this->upload->display_errors());
                // var_dump($error); exit();

                // echo 'tak jadi';
        	$branch = $this->session->userdata('branch');
                $datarepair = array(
					'hold_id' => $hold_id,
					'r_diagnostics' => $adddiagnostics,
					'r_repairstatus' => $addrepairstatus,
					'r_statusid' => $id_selected,
					'r_statusBGColor' => $statusbg,
					'r_statusTextColor' => $statustext,
					'r_statuscompleted' => $statuscompleted,
					'r_statusemail' => $statusemail,
					'r_repairno' => $addrepairno,
					// 'r_file' => $fname,
					'u_branch' => $branch
				);
			$query0 = $this->D_post->addrepairdetails($datarepair,'tbl_repair_details');
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $fname = $this->upload->data('file_name');
                // $fname = base_url().'/uploads/'.$fname;
                $branch = $this->session->userdata('branch');
                $datarepair = array(
					'hold_id' => $hold_id,
					'r_diagnostics' => $adddiagnostics,
					'r_repairstatus' => $addrepairstatus,
					'r_statusid' => $id_selected,
					'r_statusBGColor' => $statusbg,
					'r_statusTextColor' => $statustext,
					'r_statuscompleted' => $statuscompleted,
					'r_statusemail' => $statusemail,
					'r_repairno' => $addrepairno,
					'r_file' => $fname,
					'u_branch' => $branch
				);
				$query0 = $this->D_post->addrepairdetails($datarepair,'tbl_repair_details');

				// $this->db->where('random_id',$hold_id);
				// $this->db->delete('tbl_hold');
				
        }

        if($clientemail == ''){
	        $datareparation = array(
	        	'hold_id' => $hold_id,
	        	'c_id' => $clientid,
				'r_type' => $addtype,
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
				// 'r_taxtype' => $addtax,
				'r_signature' => $sig,
				'r_subtotal' => $subtotal,
				'r_tax' => $taxshow,
				'r_total' => $alltotal,
				'r_status' => $addrepairstatus,
				'r_statusid' => $id_selected,
				'r_statusBGColor' => $statusbg,
				'r_statusTextColor' => $statustext,
				'r_statuscompleted' => $statuscompleted,
				'r_statusemail' => $statusemail,
				'r_created' => $uname,
				'r_lastmodified' => $uname,
				'u_branch' => $ubranch
			);

			$this->D_post->addreparationall($datareparation,'tbl_reparation');
			$loginsert = array(
					'hold_id' => $hold_id,
					'r_repairno' => $addrepairno,
					'log_date' => $dateopen,
					'log_user' => $uname,
					'log_action' => $insert,
					'u_branch' => $ubranch
				);
			$this->db->insert('tbl_reparation_log',$loginsert);
			redirect(base_url('admin/reparation'));
		}else{
			$datareparation = array(
	        	'hold_id' => $hold_id,
	        	'c_id' => $clientid,
				'r_type' => $addtype,
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
				// 'r_taxtype' => $addtax,
				'r_signature' => $sig,
				'r_subtotal' => $subtotal,
				'r_tax' => $taxshow,
				'r_total' => $alltotal,
				'r_status' => $addrepairstatus,
				'r_statusid' => $id_selected,
				'r_statusBGColor' => $statusbg,
				'r_statusTextColor' => $statustext,
				'r_statuscompleted' => $statuscompleted,
				'r_statusemail' => $statusemail,
				'r_created' => $uname,
				'r_lastmodified' => $uname,
				'u_branch' => $ubranch
			);
			$this->D_post->addreparationall($datareparation,'tbl_reparation');
			$loginsert = array(
					'hold_id' => $hold_id,
					'r_repairno' => $addrepairno,
					'log_date' => $dateopen,
					'log_user' => $uname,
					'log_action' => $insert,
					'u_branch' => $ubranch
				);
			$this->db->insert('tbl_reparation_log',$loginsert);

			$logactivity = 'Add';
	        $moduleclient = 'tbl_reparation';
	        $logid = $this->session->userdata('id');;
	        $loguser = $this->session->userdata('name');
	        $logip = $this->input->ip_address();
	        $branch = $this->session->userdata('branch');
	        $currentdate = date('Y-m-d H:i:s');
	        $datalog = array(
	        			'log_activity' => $logactivity,
	        			'log_module' => $moduleclient,
	        			// 'log_id' => $logid,
	        			'log_user' =>$loguser,
	        			'log_ipaddress' => $logip,
	        			'u_branch' => $branch,
	        			'log_date' => $currentdate
	        		);
		    $this->db->insert('tbl_log_activity', $datalog);

			if($statusemail == 1)
			{
				return $this->sendMailStatus($clientemail,$statusTemplate);
			}
			else
			{
				return $this->sendMail($clientemail);
			}
		}
	}

	public function edit_reparation()
	{
		// $editimei = $this->input->post('editImei');
		$edittype = $this->input->post('editType');
		$editclient = $this->input->post('editName');
		$editclientno = $this->input->post('editTelephone');
		$editclientemail = $this->input->post('editEmail');
		$editclientid = $this->input->post('editClientid');
		$editcategory = $this->input->post('editCategory');
		$editassign = $this->input->post('editAssign');
		$editmanufacturer = $this->input->post('editManufacturer');
		$editmodel = $this->input->post('editModel');
		$editdefect = $this->input->post('editDefect');
		$editservicecharge = $this->input->post('editServicecharge');
		$editdateopen = $this->input->post('editDateopen');


		$reparationstatus = 'Pending';
 		
 		$editdate = $this->input->post('editDate');
		$editperiod = $this->input->post('editPeriod');
		$editcomment = $this->input->post('editComment');
		// $edittax = $this->input->post('editTax');

		$hold_id = $this->input->post('hold_editvalue');

		$editsig = $this->input->post('editSig');
		$editsubtotal = $this->input->post('editSubtotal');
		$editTaxshow = $this->input->post('editTaxshow');
		$editalltotal = $this->input->post('editAlltotal');
		$uname = $this->input->post('uname');
		$ubranch = $this->input->post('ubranch');
		$logupdatereparation = 'Reparation updated';

		$editrepairstatus = $this->input->post('editRepairstatus');
		$id_selected = $this->input->post('id_selectededit');

		
		
        // hold_id jangan lupa(tbl_reparation_item)
		$edititemid = $this->input->post('edititemid');
		$edititemname = $this->input->post('edititemname');
		$edititemprice = $this->input->post('edititemprice');
		$edititemquantity = $this->input->post('edititemquantity');
		$editkira = $this->input->post('editkirakira');

		// for($i=0;$i<$editkira;$i++){
		// 	$item0 =  $edititemid['edititemid'][$i];
		// 	$item1 =  $edititemname['edititemname'][$i];
		// 	$item2 =  $edititemprice['edititemprice'][$i];
		// 	$item3 =  $edititemquantity['edititemquantity'][$i];
			
		// 	$products = array(
		// 		'id_item' => $item0,
		// 		'itemName' => $item1,
		// 		'itemPrice' => $item2,
		// 		'itemQuantity' => $item3,
		// 		'hold_id' => $hold_id
		// 	);
		// 	$this->db->insert('tbl_reparation_item',$products);
		// }
		// hold_id jangan lupa (tbl_repair_details)
		$editdiagnostics = $this->input->post('editDiagnostics');
		
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

        if($id_selected == '')
        {
        	
	        if ( ! $this->upload->do_upload('editFile'))
	        {
	                // $error = array('error' => $this->upload->display_errors());

	                $editdatarepair = array(
						'r_diagnostics' => $editdiagnostics,
						'r_repairstatus' => $editrepairstatus,
						'r_repairno' => $editrepairno
					);


					$this->db->where('hold_id',$hold_id);
					$this->db->update('tbl_repair_details', $editdatarepair);

					// $this->db->where('random_id',$hold_id);
					// $this->db->delete('tbl_hold');
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

					// $this->db->where('random_id',$hold_id);
					// $this->db->delete('tbl_hold');
	        }

			if($editclientemail == ''){
		        $editdatareparation = array(
		        	'c_id' => $editclientid,
					'r_type' => $edittype,
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
					// 'r_taxtype' => $edittax,
					'r_signature' => $editsig,
					'r_subtotal' => $editsubtotal,
					'r_tax' => $editTaxshow,
					'r_total' => $editalltotal,
					'r_lastmodified' => $uname,
				);
				$this->db->where('hold_id',$hold_id);
				$this->db->update('tbl_reparation', $editdatareparation);
				$updatereparation = array(
						'hold_id' => $hold_id,
						'r_repairno' => $editrepairno,
						'log_date' => $editdateopen,
						'log_user' => $uname,
						'log_action' => $logupdatereparation,
						'u_branch' => $ubranch
					);
				$this->db->insert('tbl_reparation_log',$updatereparation);
				redirect(base_url('admin/reparation'));
			}else{
				$editdatareparation = array(
		        	'c_id' => $editclientid,
					'r_type' => $edittype,
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
					// 'r_taxtype' => $edittax,
					'r_signature' => $editsig,
					'r_subtotal' => $editsubtotal,
					'r_tax' => $editTaxshow,
					'r_total' => $editalltotal,
					'r_lastmodified' => $uname,
				);
				$this->db->where('hold_id',$hold_id);
				$this->db->update('tbl_reparation', $editdatareparation);
				$updatereparation = array(
						'hold_id' => $hold_id,
						'r_repairno' => $editrepairno,
						'log_date' => $editdateopen,
						'log_user' => $uname,
						'log_action' => $logupdatereparation,
						'u_branch' => $ubranch
					);
				$this->db->insert('tbl_reparation_log',$updatereparation);
				return $this->sendMailEdit($editclientemail);
			}
		}
		else
		{
			$this->db->select('*');
			$this->db->from('tbl_repair_status');
			$this->db->where('id', $id_selected);
			$querystatus = $this->db->get()->result();
	        
			foreach ($querystatus as $statuscheck) {
				$statuscompleted = $statuscheck->status_completed;
				$statusemail = $statuscheck->status_email;
				$statusbg = $statuscheck->statusBGColor;
				$statustext = $statuscheck->statusTextColor;
				$statusTemplate = $statuscheck->statusTemplate;
			}

			if ( ! $this->upload->do_upload('editFile'))
	        {
	                // $error = array('error' => $this->upload->display_errors());

	                $editdatarepair = array(
						'r_diagnostics' => $editdiagnostics,
						'r_repairstatus' => $editrepairstatus,
						'r_statusid' => $id_selected,
						'r_statusBGColor' => $statusbg,
						'r_statusTextColor' => $statustext,
						'r_statuscompleted' => $statuscompleted,
						'r_statusemail' => $statusemail,
						'r_repairno' => $editrepairno
					);


					$this->db->where('hold_id',$hold_id);
					$this->db->update('tbl_repair_details', $editdatarepair);

					// $this->db->where('random_id',$hold_id);
					// $this->db->delete('tbl_hold');
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

					// $this->db->where('random_id',$hold_id);
					// $this->db->delete('tbl_hold');
	        }

			if($editclientemail == ''){
		        $editdatareparation = array(
		        	'c_id' => $editclientid,
					'r_type' => $edittype,
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
					// 'r_taxtype' => $edittax,
					'r_signature' => $editsig,
					'r_subtotal' => $editsubtotal,
					'r_tax' => $editTaxshow,
					'r_total' => $editalltotal,
					'r_status' => $editrepairstatus,
					'r_statusid' => $id_selected,
					'r_statusBGColor' => $statusbg,
					'r_statusTextColor' => $statustext,
					'r_statuscompleted' => $statuscompleted,
					'r_statusemail' => $statusemail,
					'r_lastmodified' => $uname,
				);
				$this->db->where('hold_id',$hold_id);
				$this->db->update('tbl_reparation', $editdatareparation);
				$updatereparation = array(
						'hold_id' => $hold_id,
						'r_repairno' => $editrepairno,
						'log_date' => $editdateopen,
						'log_user' => $uname,
						'log_action' => $logupdatereparation,
						'u_branch' => $ubranch
					);
				$this->db->insert('tbl_reparation_log',$updatereparation);
				redirect(base_url('admin/reparation'));
			}else{
				$editdatareparation = array(
		        	'c_id' => $editclientid,
					'r_type' => $edittype,
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
					// 'r_taxtype' => $edittax,
					'r_signature' => $editsig,
					'r_subtotal' => $editsubtotal,
					'r_tax' => $editTaxshow,
					'r_total' => $editalltotal,
					'r_status' => $editrepairstatus,
					'r_statusid' => $id_selected,
					'r_statusBGColor' => $statusbg,
					'r_statusTextColor' => $statustext,
					'r_statuscompleted' => $statuscompleted,
					'r_statusemail' => $statusemail,
					'r_lastmodified' => $uname,
				);
				$this->db->where('hold_id',$hold_id);
				$this->db->update('tbl_reparation', $editdatareparation);
				$updatereparation = array(
						'hold_id' => $hold_id,
						'r_repairno' => $editrepairno,
						'log_date' => $editdateopen,
						'log_user' => $uname,
						'log_action' => $logupdatereparation,
						'u_branch' => $ubranch
					);
				$this->db->insert('tbl_reparation_log',$updatereparation);

				$logactivity = 'Edit';
		        $moduleclient = 'tbl_reparation';
		        $logid = $this->session->userdata('id');;
		        $loguser = $this->session->userdata('name');
		        $logip = $this->input->ip_address();
		        $branch = $this->session->userdata('branch');
		        $currentdate = date('Y-m-d H:i:s');
		        $datalog = array(
		        			'log_activity' => $logactivity,
		        			'log_module' => $moduleclient,
		        			// 'log_id' => $logid,
		        			'log_user' =>$loguser,
		        			'log_ipaddress' => $logip,
		        			'u_branch' => $branch,
		        			'log_date' => $currentdate
		        		);
			    $this->db->insert('tbl_log_activity', $datalog);

				if($statusemail == 1)
				{
					return $this->sendMailStatusEdit($editclientemail,$statusTemplate);
				}
				else
				{
					return $this->sendMailEdit($editclientemail);
				}
			}
			
		}
		
	}
	function sendMailStatus($clientemail,$statusTemplate){
		include('assets/php-mailer-master/PHPMailerAutoload.php');
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

	      $mail->setFrom('systemcharity14@gmail.com', 'Gadget Profix');     // Add a recipient
	      $mail->addAddress($clientemail);              // Name is optional
	      //$mail->addReplyTo('info@example.com', 'Information');
	      //$mail->addCC('cc@example.com');
	      //$mail->addBCC('bcc@example.com');

	            // Set email format to HTML

	      $mail->Subject = 'Respond for Your Reparation Status';
	     // $mail->Body    = 'Your new Password is'.$pass;'<br/>;
	      $mail->Body    = ''.$statusTemplate.'.
	      
	      
	      Note:Please remember your closed date';
	      $mail->send();
	      redirect(base_url('admin/reparation'));
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

	      $mail->setFrom('systemcharity14@gmail.com', 'Gadget Profix');     // Add a recipient
	      $mail->addAddress($clientemail);              // Name is optional
	      //$mail->addReplyTo('info@example.com', 'Information');
	      //$mail->addCC('cc@example.com');
	      //$mail->addBCC('bcc@example.com');

	            // Set email format to HTML

	      $mail->Subject = 'Respond for Your Reparation Status';
	     // $mail->Body    = 'Your new Password is'.$pass;'<br/>;
	      $mail->Body    = 'Hi! . Your reparation is in process

	      Do Contact us if you want to know more.
	      
	      
	      Note:Please remember your closed date';
	      $mail->send();
	      $logactivity = 'Send Mail';
	      $moduleclient = 'tbl_reparation';
	      $logid = $this->session->userdata('id');;
	      $loguser = $this->session->userdata('name');
	      $logip = $this->input->ip_address();
	      $branch = $this->session->userdata('branch');
	      $currentdate = date('Y-m-d H:i:s');
	      $datalog = array(
	        			'log_activity' => $logactivity,
	        			'log_module' => $moduleclient,
	        			// 'log_id' => $logid,
	        			'log_user' =>$loguser,
	        			'log_ipaddress' => $logip,
	        			'u_branch' => $branch,
	        			'log_date' => $currentdate
	        		);
		    $this->db->insert('tbl_log_activity', $datalog);
	      redirect(base_url('admin/reparation'));
	}
	function sendMailStatusEdit($clientemail,$statusTemplate){
		include('assets/php-mailer-master/PHPMailerAutoload.php');
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

	      $mail->setFrom('systemcharity14@gmail.com', 'Gadget Profix');     // Add a recipient
	      $mail->addAddress($clientemail);              // Name is optional
	      //$mail->addReplyTo('info@example.com', 'Information');
	      //$mail->addCC('cc@example.com');
	      //$mail->addBCC('bcc@example.com');

	            // Set email format to HTML

	      $mail->Subject = 'Respond for Your Reparation Status';
	     // $mail->Body    = 'Your new Password is'.$pass;'<br/>;
	      $mail->Body    = ''.$statusTemplate.'.
	      
	      
	      Note:Please remember your closed date';
	      $mail->send();
	      $logactivity = 'Send Mail';
          $moduleclient = 'tbl_reparation';
          $logid = $this->session->userdata('id');;
          $loguser = $this->session->userdata('name');
          $logip = $this->input->ip_address();
          $branch = $this->session->userdata('branch');
          $currentdate = date('Y-m-d H:i:s');
          $datalog = array(
        			'log_activity' => $logactivity,
        			'log_module' => $moduleclient,
        			// 'log_id' => $logid,
        			'log_user' =>$loguser,
        			'log_ipaddress' => $logip,
        			'u_branch' => $branch,
        			'log_date' => $currentdate
        		);
	      $this->db->insert('tbl_log_activity', $datalog);
	      redirect(base_url('admin/reparation'));
	}
	function getReparation($id){
		$data = $this->D_get->show_reparation($id);
		echo json_encode($data);
	}
	function changeStatus(){
		$datawhere = $this->input->post('rcode');
		$holdidd = $this->input->post('holdidd');
		$rrepairnoo = $this->input->post('rrepairnoo');
		$datechange = $this->input->post('datechange');
		$data1 = $this->input->post('changeStatus');
		$ubranch = $this->input->post('uubranch');

		$updatestatus = 'Status Update';
		$datain = 'Waiting Customer Approval';
		$statusbg = '#4e73df';
		$statustext = '#fff';
		$statuscompleted = 0;
		$datachange = array(
						'r_status' => $datain,
						'r_statusBGColor' => $statusbg,
						'r_statusTextColor' => $statustext,
						'r_statuscompleted' => $statuscompleted
					);
		$where = array(
						'r_code' => $datawhere
					);
		$this->D_post->changeStatus($where,$datachange,'tbl_reparation');
		$logupdatestatus = array(
					'hold_id' => $holdidd,
					'r_repairno' => $rrepairnoo,
					'log_date' => $datechange,
					'log_user' => $data1,
					'log_action' => $updatestatus,
					'u_branch' => $ubranch
				);
		$this->db->insert('tbl_reparation_log',$logupdatestatus);

		$logactivity = 'Edit Status';
          $moduleclient = 'tbl_reparation';
          $logid = $this->session->userdata('id');;
          $loguser = $this->session->userdata('name');
          $logip = $this->input->ip_address();
          $branch = $this->session->userdata('branch');
          $currentdate = date('Y-m-d H:i:s');
          $datalog = array(
        			'log_activity' => $logactivity,
        			'log_module' => $moduleclient,
        			// 'log_id' => $logid,
        			'log_user' =>$loguser,
        			'log_ipaddress' => $logip,
        			'u_branch' => $branch,
        			'log_date' => $currentdate
        		);
	      $this->db->insert('tbl_log_activity', $datalog);

		redirect(base_url('admin/reparation'));
	}
	function add_payment(){
		$paymentdateadd = $this->input->post('paymentdateadd');
		$paymentholdid = $this->input->post('paymentholdid');
		$paymentbranch = $this->input->post('paymentbranch');
		$paymentmadeby = $this->input->post('paymentmadeby');
		$repairno = $this->input->post('repairno');
		$paydate = $this->input->post('pay_date');
		$payref = $this->input->post('pay_ref');
		$payamount = $this->input->post('pay_amount');
		$paytype = $this->input->post('pay_type');
		$paynote = $this->input->post('pay_note');
		$addpaymentlog = 'Payment Added';
		

		$this->db->select('SUM(pay_amount) as sumall');
		$this->db->from('tbl_payment');
		$this->db->where('r_repairno', $repairno);
		$gettototal = $this->db->get()->result();
		foreach ($gettototal as $alltotaltoplus) {
			$testtotalsum = $alltotaltoplus->sumall;
		}
		// --------------------------------------------------

		$this->db->select('*');
		$this->db->from('tbl_reparation');
		$this->db->where('r_repairno', $repairno);
		$query7 = $this->db->get()->result();
		foreach ($query7 as $totalrepair) {
			$totaltopay = $totalrepair->r_total;
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
		// --------------------------------------------------

		// $testtosum = $testtotalsum + $payamount;
		// echo $paybalance; exit();
		$dataupdatereparation = array(
								'r_paid'=>$paybalance
							);
		$this->db->where('r_repairno', $repairno);
		$this->db->update('tbl_reparation', $dataupdatereparation);
		// --------------------------------------------------------

		$this->db->select('r_paid');
		$this->db->from('tbl_reparation');
		$this->db->where('r_repairno', $repairno);
		$query11 = $this->db->get()->result();
		foreach ($query11 as $totalpaided) {
			$testpaid = $totalpaided->r_paid;
		}
		// // Update Total Revenue and Date in tbl_revenue
		$dataupdaterevenue = array(
								'revenue_date'=>$paydate,
								'revenue_subtotal'=>$testpaid
							);
		$this->db->where('revenue_holdid', $repairno);
		$this->db->update('tbl_revenue', $dataupdaterevenue);
		// -----------------------------------------------------------------

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



		// Asal
		// $testtosum = $testtotalsum + $payamount;
		// Update r_paid in tbl_reparation
		
		
		$branch1 = $this->session->userdata('branch');

		$addpay = array(
						'hold_id' => $paymentholdid,
						'r_repairno' => $repairno,
						'pay_date' => $paydate,
						'pay_ref' => $payref,
						'pay_amount' => $payamount,
						'pay_type' => $paytype,
						'pay_note' => $paynote,
						'u_branch' => $branch1
					);
		$where = array(
					'r_repairno' => $repairno
				);
		$this->db->insert('tbl_payment',$addpay);

		$logaddpayment = array(
					'hold_id' => $paymentholdid,
					'r_repairno' => $repairno,
					'log_date' => $paymentdateadd,
					'log_user' => $paymentmadeby,
					'log_action' => $addpaymentlog,
					'u_branch' => $paymentbranch
				);
		$this->db->insert('tbl_reparation_log',$logaddpayment);

		$logactivity = 'Add';
          $moduleclient = 'tbl_payment';
          $logid = $this->session->userdata('id');;
          $loguser = $this->session->userdata('name');
          $logip = $this->input->ip_address();
          $branch = $this->session->userdata('branch');
          $currentdate = date('Y-m-d H:i:s');
          $datalog = array(
        			'log_activity' => $logactivity,
        			'log_module' => $moduleclient,
        			// 'log_id' => $logid,
        			'log_user' =>$loguser,
        			'log_ipaddress' => $logip,
        			'u_branch' => $branch,
        			'log_date' => $currentdate
        		);
	      $this->db->insert('tbl_log_activity', $datalog);

		?>
		<script type="text/javascript">
            alert("Payment Added");
            window.location.href = '<?php echo base_url();?>admin/reparation';
        </script>
		<?php
	}
	function getPayment($id){
		// $data = $this->D_get->show_payment($id);
		// echo json_encode($data);
		// $id = $this->input->post('id');
		// $this->db->where('r_rcode', $id);
		$query = $this->D_get->show_payment($id,'tbl_reparation')->result();
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
                            <form action='.base_url('func_reparation/delete_payment').' method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="payid" value="'.$data->pay_id.'">
                              <input type="hidden" name="payholddelete">
                              <input type="hidden" name="payholddate"  class="form-control" placeholder="'.date('D-M-Y').'" value="'.date("Y-m-d"). ' ' .date("h:i:sa").'">
                              <input type="hidden" name="payholduser" value="'.$this->session->userdata('name').'">
                              <input type="hidden" name="payholdbranch" value="'.$this->session->userdata('branch').'">
                              <input type="hidden" name="rrepairno" value="'.$data->r_repairno.'">
                              <button class="btn btn-danger" onclick="return confirm(Confirm delete payment?)"><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
					</tr>'
				     ;

		}
	}
	function delete_payment(){
		$holdid = $this->input->post('payholddelete');
		$paydeletedate = $this->input->post('payholddate');
		$paydeleteuser = $this->input->post('payholduser');
		$paydeletebranch = $this->input->post('payholdbranch');
		$paydeleteaction = 'Payment Deleted';
		$data = $this->input->post('payid');
		$data2 = $this->input->post('rrepairno');
		$changedate = '0000-00-00';
		$change = '0.00';
		$change1 = '-';
		
		// ------------------------------------------------------------------------------------------------------------------
		$this->db->select('tbl_reparation.r_total,tbl_payment.r_repairno, tbl_reparation.r_paid, tbl_payment.pay_amount');
		$this->db->from('tbl_payment');
		$this->db->join('tbl_reparation', 'tbl_reparation.r_repairno = tbl_payment.r_repairno');
		$this->db->where('tbl_payment.pay_id',$data);
		$getrepairno = $this->db->get()->result();
		foreach ($getrepairno as $no) {
			$repairjoin = $no->r_repairno;
			$repairpaid = $no->r_paid;
			$paidamount = $no->pay_amount;
			$paytotal = $no->r_total;
		}
		// ---------------------------------------------------------------------------------------------------------------------
		$calc = $repairpaid - $paidamount;

		if($calc < 0){
			$calcreturn = 0;
		}else{
			$calcreturn = $calc;
		}

		// echo $calc; exit();
		// ----------------------------------------------------------------------------------------------------------------
		// Update Total in tbl_reparation

		// Update Total Revenue and Date in tbl_revenue
		$updaterevenue = array(
						'revenue_subtotal'=>$calcreturn
					);
		$this->db->where('revenue_holdid', $repairjoin);
		$this->db->update('tbl_revenue', $updaterevenue);
		// -----------------------------------------------------------------------------------------------------------------
		// $where = array(
		// 			'pay_id' => $data
		// 		);
		$addpay = array(
						'pay_date' => $changedate,
						'pay_amount' => $change,
						'pay_type' => $change1
					);
		$this->db->where('pay_id', $data);
		$this->db->update('tbl_payment', $addpay);
		// ----------------------------------------------------------------------------------------------------------------
		$this->db->select('SUM(pay_amount) as totaltinggal');
		$this->db->from('tbl_payment');
		$this->db->group_by('r_repairno');
		$this->db->where('r_repairno', $repairjoin);
		$query13 = $this->db->get()->result();
		foreach ($query13 as $pengiraan) {
			$tinggal = $pengiraan->totaltinggal;
		}
		// $updatepaid = array(
		// 				'r_paid'=>$calc
		// 			);
		// $this->db->where('r_repairno', $repairjoin);
		// $this->db->update('tbl_reparation', $updatepaid);
		$updatepaid = array(
						'r_paid'=>$tinggal
					);
		$this->db->where('r_repairno', $repairjoin);
		$this->db->update('tbl_reparation', $updatepaid);
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


		$logaddpayment = array(
					'r_repairno' => $data2,//
					'log_date' => $paydeletedate,
					'log_user' => $paydeleteuser,
					'log_action' => $paydeleteaction,
					'u_branch' => $paydeletebranch
				);
		$this->db->insert('tbl_reparation_log',$logaddpayment);

		$logactivity = 'Delete';
          $moduleclient = 'tbl_payment';
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

		redirect(base_url('admin/reparation'));
	}
	function deletereparation(){
		
		$logactivity = 'Delete';
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
		$data = $this->D_get->show_reparation($id);
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
						<input type="hidden" name="edititemid[edititemid][]" id="itemidd'.$data->id.'" value="'.$data->id_item.'">
						<td><input type="text" name="edititemname[edititemname][]" value="'.$data->product_name.'"></td>
						<td><input name="edititemquantity[edititemquantity][]" type="number" value="'.$data->quantity.'" id="vall'.$data->id.'" onchange="kiraa('.$data->id.')" placeholder="0" / style="width: 50px;">
						</td>
						<td><input type="text" name="edititemprice[edititemprice][]" id="unitt'.$data->id.'" value="'.$data->unit_price.'"></td>
						<td><a onclick="deleteholdEdit('.$data->id.')"><button type="button">X</button></a></td>
						<input type="hidden" name="editkirakira" value="'.$i++.'">
					</tr>'
				     ;

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

	      $mail->setFrom('systemcharity14@gmail.com', 'Gadget Profix');     // Add a recipient
	      $mail->addAddress($editclientemail);              // Name is optional
	      //$mail->addReplyTo('info@example.com', 'Information');
	      //$mail->addCC('cc@example.com');
	      //$mail->addBCC('bcc@example.com');

	            // Set email format to HTML

	      $mail->Subject = 'Respond for Your Reparation Status';
	     // $mail->Body    = 'Your new Password is'.$pass;'<br/>;
	      $mail->Body    = 'Hi! . Your reparation is in Process

	      Do Contact us if you want to know more.
	      
	      
	      Note:Please remember your closed date';
	      $mail->send();

	      $logactivity = 'Send Mail';
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

	      redirect(base_url('admin/reparation'));
	}
	// function getReparationLog($id){
	// 	$data = $this->D_get->show_reparationLog($id);
	// 	echo json_encode($data);
	// }
	function getReparationLog(){
		$id = $this->input->post('id');
		$this->db->where('r_repairno', $id);
		$query =  $this->db->get('tbl_reparation_log')->result();
		$i = 1;
		foreach ($query as $data) 
		{
			//echo $data->unit_price;


			echo 
					'<tr>
						<td>'.$data->log_date.'</td>
						<td>'.$data->log_user.'</td>
						<td>'.$data->log_action.'</td>
					</tr>'
				     ;

		}
	}
	function getReparationEditStatus($id){
		$data = $this->D_get->show_status($id);
		echo json_encode($data);
	}
	function download_file($id)
	{

		$this->db->where('r_repairno', $id);
		$query =  $this->db->get('tbl_repair_details')->result();
		foreach ($query as $data) 
		{

			$filename = $data->r_file;

		}

		$filepath = './uploads/'.$filename;
	  	if( headers_sent() )
	    	die('Headers Sent');


	  	if(ini_get('zlib.output_compression'))
	    	ini_set('zlib.output_compression', 'Off');


	  	if( file_exists($filepath) )
	  		{

			    $fsize = filesize($filepath);
			    $path_parts = pathinfo($filepath);
			    $ext = strtolower($path_parts["extension"]);

		    switch ($ext)
		    {
		      case "pdf": $ctype="application/pdf"; break;
		      case "exe": $ctype="application/octet-stream"; break;
		      case "zip": $ctype="application/zip"; break;
		      case "doc": $ctype="application/msword"; break;
		      case "xls": $ctype="application/vnd.ms-excel"; break;
		      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		      case "gif": $ctype="image/gif"; break;
		      case "png": $ctype="image/png"; break;
		      case "jpeg":
		      case "jpg": $ctype="image/jpg"; break;
		      default: $ctype="application/force-download";
		    }

		    header("Pragma: public");
		    header("Expires: 0");
		    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		    header("Cache-Control: private",false);
		    header("Content-Type: $ctype");
		    header("Content-Disposition: attachment; filename=\"".basename($filepath)."\";" );
		    header("Content-Transfer-Encoding: binary");
		    header("Content-Length: ".$fsize);
		    ob_clean();
		    flush();
		    readfile( $filepath );

	  	}
	  	else
	    	die('File Not Found');

	}
	function editStatus()
	{
		$id = $this->input->post('editReparationcodestatus');
		$status = $this->input->post('editReparationstatus');
		
		$holdid = $this->input->post('hold_editvaluestatus');
		$id_selected = $this->input->post('id_selectededitstatus');

		// $datachange = array(
		// 				'r_code' => $id,
		// 				'r_status' => $status,
		// 				'r_statusid' => $id_selected,
		// 				'hold_id' => $holdid
		// 			);

		// var_dump($datachange); exit();
		$this->db->select('*');
		$this->db->from('tbl_repair_status');
		$this->db->where('id', $id_selected);
		$querystatus = $this->db->get()->result();
        if($id_selected == '')
        {
			redirect(base_url('admin/reparation'));
		}else{

			foreach ($querystatus as $statuscheck) {
				$statuscompleted = $statuscheck->status_completed;
				$statusemail = $statuscheck->status_email;
				$statusbg = $statuscheck->statusBGColor;
				$statustext = $statuscheck->statusTextColor;
				$statusTemplate = $statuscheck->statusTemplate;
			}

			$editdatarepair = array(
				'r_statusid' => $id_selected,
				'r_statusBGColor' => $statusbg,
				'r_statusTextColor' => $statustext,
				'r_statuscompleted' => $statuscompleted,
				'r_statusemail' => $statusemail
			);

			$this->db->where('hold_id',$holdid);
			$this->db->update('tbl_repair_details', $editdatarepair);
			$editdatareparation = array(
					'r_status' => $status,
					'r_statusid' => $id_selected,
					'r_statusBGColor' => $statusbg,
					'r_statusTextColor' => $statustext,
					'r_statuscompleted' => $statuscompleted,
					'r_statusemail' => $statusemail
				);
			$this->db->where('hold_id',$holdid);
			$this->db->update('tbl_reparation', $editdatareparation);

			$logactivity = 'Change Status';
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

			redirect(base_url('admin/reparation'));
		}
	}

}
