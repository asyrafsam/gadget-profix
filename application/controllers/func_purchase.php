<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func_purchase extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('D_post');
		$this->load->model('D_get');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		if(ini_get('date.timezone') == ''){
		    date_default_timezone_set('UTC');
		    
		}
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
						<td><input type="text" name="itemname[itemname][]" value="'.$data->product_name.'">
						</td>
						<td><input type="text" name="itemprice[itemprice][]" id="unit'.$data->id.'" value="'.$data->unit_price.'"></td>
						<td><input type="number" name="itemquantity[itemquantity][]" value="'.$data->quantity.'" id="val'.$data->id.'" onchange="kira('.$data->id.')" placeholder="0"  style="width: 50px;"></td><td>0.00</td>
						<td></td>
						<td><a onclick="deletehold('.$data->id.')"><button type="button">X</button></a></td>
						<input type="hidden" name="kirakira" value="'.$i++.'">
					<tr>'
				     ;


		}
	
	}
	function getDetailsBarcode()
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
						<td><input type="text" name="itemname[itemname][]" value="'.$data->product_name.'">
						</td>
						<td><input type="text" name="itemprice[itemprice][]" id="unit'.$data->id.'" value="'.$data->unit_price.'"></td>
						<td><input type="number" name="itemquantity[itemquantity][]" value="'.$data->quantity.'" id="val'.$data->id.'" onchange="kira('.$data->id.')" placeholder="0"  style="width: 50px;"></td><td>0.00</td>
						<td></td>
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

	function addpurchase(){
		$key = $this->input->post('holdd');
		$test0 = $this->input->post('itemid');
		$test1 = $this->input->post('itemname');
		$test2 = $this->input->post('itemprice');
		$test3 = $this->input->post('itemquantity');

		$kira = $this->input->post('kirakira');
		// echo $kira;
		$branch1 = $this->session->userdata('branch');
		for($i=0;$i<$kira;$i++){
			$item0 =  $test0['itemid'][$i];
			$item1 =  $test1['itemname'][$i];
			$item2 =  $test2['itemprice'][$i];
			$item3 =  $test3['itemquantity'][$i];
			
			$products = array(
				'itemID' => $item0,
				'itemName' => $item1,
				'itemPrice' => $item2,
				'itemQuantity' => $item3,
				'hold_id' => $key,
				'u_branch' => $branch1
			);
			$this->db->insert('tbl_purchase_item',$products);
		}

		$date = $this->input->post('date');
        $refno = $this->input->post('refno');
        $status = $this->input->post('status');
        $file = $this->input->post('file');
        $supplier = $this->input->post('supplier');
        $itemid = $this->input->post('itemid');

        $total = $this->input->post('total');
        $tax = $this->input->post('tax');
        $discount = $this->input->post('discount');
        $ship = $this->input->post('ship');
        $content = $this->input->post('content');
        $alltotal = $this->input->post('alltotal');
        $ubranch = $this->input->post('ubranch');
        

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


        if ( ! $this->upload->do_upload('file'))
        {
                $datain = array(
					'pur_date' => $date,
					'pur_ref' => $refno,
					'pur_status' => $status,
					'purSupplier' => $supplier,
					'hold_id' => $key,
					'pur_total' => $total,
					// 'pur_tax' => $tax,
					'pur_discount' => $discount,
					'pur_ship' => $ship,
					'pur_note' => $content,
					'afterDisc' => $alltotal,
					'u_branch' => $ubranch
					);
				$query = $this->D_post->addpurchase($datain,'tbl_purchase');

				$this->db->where('random_id',$key);
				$this->db->delete('tbl_hold');
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $fname = $this->upload->data('file_name');
                // $fname = base_url().'/uploads/'.$fname;

                $datain = array(
					'pur_date' => $date,
					'pur_ref' => $refno,
					'pur_status' => $status,
					'pur_file' => $fname,
					'purSupplier' => $supplier,
					'hold_id' => $key,
					'pur_total' => $total,
					// 'pur_tax' => $tax,
					'pur_discount' => $discount,
					'pur_ship' => $ship,
					'pur_note' => $content,
					'afterDisc' => $alltotal,
					'u_branch' => $ubranch
					);
				$query = $this->D_post->addpurchase($datain,'tbl_purchase');

				$this->db->where('random_id',$key);
				$this->db->delete('tbl_hold');
				
        }

        $logactivity = 'Add';
        $moduleclient = 'tbl_purchase_item'.'/tbl_purchase';
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
	    redirect(base_url('admin/view_purchase'));
	}
	function updatepurchase(){
		$key = $this->input->post('holdd');
		$test1 = $this->input->post('itemname');
		$test2 = $this->input->post('itemprice');
		$test3 = $this->input->post('itemquantity');

		$kira = $this->input->post('kirakira');
		// echo $kira;
		$branch1 = $this->session->userdata('branch');
		for($i=0;$i<$kira;$i++){
			$item1 =  $test1['itemname'][$i];
			$item2 =  $test2['itemprice'][$i];
			$item3 =  $test3['itemquantity'][$i];
			
			$products = array(
				'itemName' => $item1,
				'itemPrice' => $item2,
				'itemQuantity' => $item3,
				'hold_id' => $key,
				'u_branch' => $branch1
			);
			$this->db->where('hold_id',$id);
			$this->db->update('tbl_purchase_item', $products);
			// $this->db->insert('tbl_purchase_item',$products);
		}


		$date = $this->input->post('date');
        $refno = $this->input->post('refno');
        $status = $this->input->post('status');
        $file = $this->input->post('file');
        $supplier = $this->input->post('supplier');
        $itemid = $this->input->post('itemid');

        $total = $this->input->post('total');
        $tax = $this->input->post('tax');
        $discount = $this->input->post('discount');
        $ship = $this->input->post('ship');
        $content = $this->input->post('content');
        $alltotal = $this->input->post('alltotal');
        $ubranch = $this->input->post('ubranch');
        

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


        if ( ! $this->upload->do_upload('file'))
        {
                $datain = array(
					'pur_date' => $date,
					'pur_ref' => $refno,
					'pur_status' => $status,
					'purSupplier' => $supplier,
					'hold_id' => $key,
					'pur_total' => $total,
					// 'pur_tax' => $tax,
					'pur_discount' => $discount,
					'pur_ship' => $ship,
					'pur_note' => $content,
					'afterDisc' => $alltotal,
					'u_branch' => $ubranch
					);
				// $query = $this->D_post->addpurchase($datain,'tbl_purchase');
				$where = array(
					'hold_id' => $key
				);
				$this->D_post->updatePurchase($where,$datain,'tbl_purchase');
				// redirect(base_url('admin/view_purchase'));
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $fname = $this->upload->data('file_name');
                // $fname = base_url().'/uploads/'.$fname;

                $datain = array(
					'pur_date' => $date,
					'pur_ref' => $refno,
					'pur_status' => $status,
					'pur_file' => $fname,
					'purSupplier' => $supplier,
					'hold_id' => $key,
					'pur_total' => $total,
					// 'pur_tax' => $tax,
					'pur_discount' => $discount,
					'pur_ship' => $ship,
					'pur_note' => $content,
					'afterDisc' => $alltotal,
					'u_branch' => $ubranch
					);
                $where = array(
					'hold_id' => $key
				);
				$this->D_post->updatePurchase($where,$datain,'tbl_purchase');

				
        }
        $logactivity = 'Edit';
        $moduleclient = 'tbl_purchase_item'.'/tbl_purchase';
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

	    redirect(base_url('admin/view_purchase'));
	}
	function getDetailsPurchase(){
		$id = $this->input->post('id');
		$query = $this->D_get->getDetailsPurchase($id);

		if(empty($query)){
			echo 'Tiada Data Ditemui';
		} else {
			foreach ($query as $data) 
			{
			

			}
			echo json_encode($data);

		}
	}
	function storePurchase(){
		$pur_id = $this->input->post('pur_id');
		$hold_value = $this->input->post('hold_value');

		$data = array(
						'pur_id'=>$pur_id,
						'hold_id'=>$hold_value
					 );

		$this->db->insert('tbl_print_purchase', $data);
	}

	function deletePrint()
	{
		$id = $this->input->post('id');
		$hold_value = $this->input->post('hold_value');

		$this->db->where('pur_id',$id);
		$this->db->where('hold_id',$hold_value);

		$this->db->delete('tbl_print_purchase');
	}
	function deletePurchase($id)
	{
		// $this->db->from('tbl_purchase');
		// $this->db->join('tbl_purchase_item', 'tbl_purchase_item.hold_id = tbl_purchase.hold_id');
		// $this->db->where('tbl_purchase.id', $id);
		// $query =  $this->db->get()->result();
		// foreach ($query as $ppp) {
		// 	$holddelete = $ppp->hold_id;
			$this->db->where('hold_id',$id);
			$this->db->delete('tbl_purchase');
		// }
		redirect(base_url('admin/view_purchase'));
	}
	function delete_purchase_check($hold_value){
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_print_purchase', 'tbl_print_purchase.pur_id = tbl_purchase.id');
		$this->db->join('tbl_purchase_item', 'tbl_purchase_item.hold_id = tbl_purchase.hold_id');
		
		$this->db->where('tbl_print_purchase.hold_id', $hold_value);
		$query =  $this->db->get()->result();
		foreach ($query as $pp) {
			$holddelete = $pp->hold_id;
			$this->db->where('hold_id',$holddelete);
		$this->db->delete('tbl_purchase');
		}
		
		$logactivity = 'Delete';
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

		redirect(base_url('admin/view_purchase'));

	}
	function deleteholdpurchase(){
		$holdidd = $this->input->post('holdid');
		$id = $this->input->post('id');
		// var_dump($holdidd);
		$this->db->where('hold_id',$holdidd);
		$this->db->where('itemID',$id);
		$query = $this->db->delete('tbl_purchase_item');
	}
}
