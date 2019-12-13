<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_pos extends CI_Controller {


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
	
	function viewsubpos(){
		$id = $this->input->post('id');

        $data['productdataa'] = $this->d_get->get_productposjoin($id)->result();
		return $this->load->view('admin/body/possubcategory-1',$data);
	}
	function viewsubposproduct(){
		$id = $this->input->post('id');

        $data = array(
        		'productpos' => $this->d_get->get_productposproduct($id)->result(),
        		'posdata' => $this->d_get->get_posdata('tbl_lookup_category')->result()
        	);

		return $this->load->view('admin/body/posproduct-1',$data);
	}
	function backviewsubcat(){
		$id = $this->input->post('id');
		// $data['productdataa'] = $this->d_get->get_backsubcat($id)->result();
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
			// $data['productdataa'] = $this->d_get->get_productposjoin($id)->result();
			// return $this->load->view('admin/body/possubcategory-1',$data);
		}else{
			return $this->backviewsubcat2($holdidd);
		}
		// return $this->load->view('admin/body/possubcategory-1',$data);
	}
	function backviewsubcat2($holdidd){
		$data['productdataa'] = $this->d_get->get_backsubcat2($holdidd)->result();
		// $id = $this->input->post('id');
		// $data['productdataa'] = $this->d_get->get_backsubcat($id)->result();

		return $this->load->view('admin/body/possubcategory-1',$data);
	}
	function backviewcategory(){
		$holdid = $this->input->post('id');
		// var_dump($holdid); exit();
        $data['productdataa'] = $this->d_get->get_productbacktosubcategory($holdid)->result();
		return $this->load->view('admin/body/possubcategory-1',$data);
	}
	function backviewallcat(){
		$data['posdata'] = $this->d_get->get_posdata('tbl_lookup_category')->result();
        return $this->load->view('admin/body/posallcategory-1',$data);
	}
	function getDetailsProduct()
	{
		$id = $this->input->post('id');
		$query = $this->d_get->getDetailsProduct($id);

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
	                <input type="number" name="" style="width: 70px;float: right;" readonly>
	            </div>
	            <div class="total col-lg-6 right" style="">
	                <label>Subtotal :&nbsp;&nbsp;&nbsp;&nbsp;</label>
	                <input type="number" name="allsubtotal" style="width: 70px;float: right;margin-bottom: 10px;" placeholder="0.00" value="'.$data->total.'" readonly>
	            </div>
	            <div class="total col-lg-6 right" style="">
	                <label>Order Tax :&nbsp;&nbsp;&nbsp;&nbsp;</label>
	                <input type="number" name="alltotaltax" style="width: 70px;float: right;" placeholder="0.00" value="'.$data->totaltax.'" readonly>
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

	function deletehold(){
		$id = $this->input->post('id');
		$this->db->where('id',$id);
		$this->db->delete('tbl_holdproduct');
	}

	function addbuying(){
		$holdid = $this->input->post('hold_value');
		$cust = $this->input->post('customerlist');
		$total = $this->input->post('allsubtotal');
		$status = 1;
		$buydata = array(
						'c_id'=>$cust,
						'total'=>$total,
						'hold_id'=>$holdid 
					 );
		// var_dump($buydata); exit();
		$this->db->insert('tbl_pospayment',$buydata);


		$datastatus = array(
					'pro_status'=>$status
				);

		$this->db->where('hold_id',$holdid);
		$this->db->update('tbl_holdproduct',$datastatus);
		return $this->printreceipt($cust,$holdid);
	}

	function printreceipt($cust,$holdid){
		// $where = $this->input->post('reparationID');
		$data = array(
			'custinfo' => $this->d_get->get_custinfo($cust)->result(),
			'productinfo' => $this->d_get->get_productinfo($holdid)->result(),
            'paymentinfo' => $this->d_get->get_paymentinfo($holdid)->result()
            // 'item' => $this->d_get->get_reparationitem($where,'tbl_reparation')->result(),
            // 'reparationdetails' => $this->d_get->get_reparationandpayment($where)->result(),
            // 'client' => $this->d_get->get_client()->result()
        );
	$this->load->view('admin/header/header.php');
	$this->load->view('admin/body/print-pos-receipt.php',$data);
	$this->load->view('admin/footer/footer.php');
	}

}
