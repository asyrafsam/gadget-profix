<?php 
 
class d_get extends CI_Model{
	var $table = 'tbl_client';
	var $table1 = 'tbl_reparation';
	var $table2 = 'tbl_supplier';
	var $table3 = 'tbl_manufacturer';
	var $table4 = 'tbl_model';
	var $table5 = 'tbl_product';
	var $table6 = 'tbl_purchase';
	var $table7 = 'tbl_purchase_item';
	var $table8 = 'tbl_payment';
	var $table9 = 'tbl_reparation_log';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Reparation Section
	function show_reparation($id){
		$this->db->from($this->table1);
		$this->db->join('tbl_repair_details', 'tbl_repair_details.hold_id = tbl_reparation.hold_id');
		$this->db->where('tbl_reparation.r_code', $id);
		$query = $this->db->get();
		return $query->row();
	}
	// function view_reparation(){
	// 	$this->db->select('*');
	// 	$this->db->select('SUM(tbl_reparation_item.itemPrice) as creditTotal');
 //        $this->db->from('tbl_reparation');
 //        $this->db->join('tbl_payment', 'tbl_payment.r_repairno = tbl_reparation.r_repairno');
 //        $this->db->join('tbl_reparation_item', 'tbl_reparation_item.hold_id = tbl_payment.hold_id');
 //        $this->db->group_by('tbl_reparation_item.hold_id');
	// 	return $this->db->get();
	// }		
	function view_reparation(){
		$this->db->select('*, SUM(DISTINCT(tbl_hold.unit_price)) as creditTotal, SUM(DISTINCT(tbl_payment.pay_amount)) as payTotal');
        $this->db->from('tbl_reparation');
        $this->db->join('tbl_payment', 'tbl_payment.r_repairno = tbl_reparation.r_repairno','LEFT');
        $this->db->join('tbl_hold', 'tbl_hold.random_id = tbl_payment.hold_id','LEFT');
        $this->db->group_by('tbl_hold.random_id');
		return $this->db->get();
	}	

	function lookup_r_imei()
	{
		$query = $this->db->get('tbl_lookup_imei')->result();
		//var_dump($query); exit();
		foreach ($query as $data) {
			# code...
			echo '<option value="'.$data->imei.'">';
		}
	}
	function lookup_r_model()
	{
		$query = $this->db->get('tbl_lookup_model')->result();
		//var_dump($query); exit();
		foreach ($query as $data) {
			# code...
			echo '<option value="'.$data->m_name.'">';
		}
	}
	function lookup_r_item()
	{
		$query = $this->db->get('tbl_lookup_item')->result();
		//var_dump($query); exit();
		foreach ($query as $data) {
			# code...
			echo '<option value="'.$data->i_name.'">';
		}
	}
	function lookup_r_defect()
	{
		$query = $this->db->get('tbl_reparation')->result();
		//var_dump($query); exit();
		foreach ($query as $data) {
			# code...
			echo '<option value="'.$data->r_defect.'">';
		}
	}
	function lookup_reparation_status()
	{
		$query = $this->db->get('tbl_reparation_status')->result();
		//var_dump($query); exit();
		foreach ($query as $data) {
			# code...
			echo '<option value="'.$data->statusName.'">';
		}
	}
	function get_item(){
        $this->db->select('*');
        $this->db->from('tbl_lookup_item');
		return $this->db->get();
    }
    function getDetails($id)
	{
		$result = array();
        $where = "	SELECT * FROM tbl_lookup_item
        			Where id='$id'
        		 ";

        //var_dump($where); exit();


        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	//var_dump($data); exit();
                $result[] = $data;
            }
        }

        return $result;
	}

	function getDetailsHold($hold_id)
	{
		$result = array();
        $where = "	SELECT * FROM tbl_hold
        			Where random_id='$hold_id'
        		 ";

        //var_dump($where); exit();


        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	//var_dump($data); exit();
                $result[] = $data;
            }
        }

        return $result;
	}
	function lookup_r_client()
	{
		$query = $this->db->get('tbl_client')->result();
		//var_dump($query); exit();
		foreach ($query as $data) {
			# code...
			echo '<option value="'.$data->c_name.'">';
		}
	}
	function lookup_rr_client()
	{
		$query = $this->db->get('tbl_client')->result();
		//var_dump($query); exit();
		foreach ($query as $data) {
			# code...
			echo '<option value="'.$data->c_id.'">'.$data->c_name.'</option>';
		}
	}
	function get_reparationcode($where,$table1){
		return $this->db->get_where($table1,$where);
	}
	function get_reparationandhold($id){
		$this->db->from($this->table1);
		$this->db->join('tbl_hold', 'tbl_hold.random_id = tbl_reparation.hold_id');
		$this->db->where('tbl_reparation.r_repairno', $id);
		$this->db->group_by('tbl_hold.random_id');
		return $this->db->get();
	}
	function get_reparationitem($id){
		$this->db->from($this->table1);
		$this->db->join('tbl_hold', 'tbl_hold.random_id = tbl_reparation.hold_id');
		$this->db->where('tbl_reparation.r_repairno', $id);
		return $this->db->get();
	}
	function get_reparationandpayment($where){
		$this->db->select('*, SUM(DISTINCT(tbl_hold.unit_price)) as creditTotal, SUM(DISTINCT(tbl_payment.pay_amount)) as payTotal');
        $this->db->from('tbl_reparation');
        $this->db->join('tbl_payment', 'tbl_payment.r_repairno = tbl_reparation.r_repairno','LEFT');
        $this->db->join('tbl_hold', 'tbl_hold.random_id = tbl_payment.hold_id','LEFT');
        $this->db->where('tbl_reparation.r_repairno', $where);
		return $this->db->get();
	}

	// function show_payment($id){
	// 	$this->db->from($this->table1);
 //        $this->db->join('tbl_payment', 'tbl_payment.hold_id = tbl_reparation.hold_id');
 //        $this->db->where('tbl_reparation.r_code', $id);
	// 	return $this->db->get();

	// 	echo $this->db->last_query(); die;
	// }

	function show_reparationLog($id){
		$this->db->from($this->table9);
		$this->db->where('tbl_reparation_log.r_repairno', $id);
		$query = $this->db->get();
		return $query->row();
	}


    // Stock Section
    // Add Product
    function get_product(){
        $this->db->select('*');
        $this->db->order_by("p_id", "asc");
        $this->db->from('tbl_product');
		return $this->db->get();
    }
    function lookup_p_supplier()
	{
		$query = $this->db->get('tbl_supplier')->result();
		//var_dump($query); exit();
		foreach ($query as $data) {
			# code...
			echo '<option value="'.$data->s_name.'">';
		}
	}
	function get_productbyid($where,$table5)
	{
		return $this->db->get_where($table5,$where);
	}
	function lookup_p_category()
	{
		$query = $this->db->get('tbl_lookup_category')->result();
		//var_dump($query); exit();
		foreach ($query as $data) {
			# code...
			echo '<option value="'.$data->cat_id.'">'.$data->cat_name.'</option>';
		}
	}
	function getCategoryDetails($id){
		$this->db->select('*');
        $this->db->from('tbl_lookup_subcategory');
        $this->db->where('cat_id', $id);
		return $this->db->get();
	}
	function get_productcat(){
		$this->db->select('*');
        $this->db->order_by("cat_id", "asc");
        $this->db->from('tbl_lookup_category');
		return $this->db->get();
	}
	function get_categorydetails($id){
		$this->db->from('tbl_lookup_category');
		$this->db->where('cat_id', $id);
		$query = $this->db->get();
		return $query->row();

		// echo $this->db->last_query();
	}






    // Client Section
    function get_client(){
        $this->db->select('*');
        $this->db->order_by("c_id", "asc");
        $this->db->from('tbl_client');
		return $this->db->get();
    }
    function get_clientDetails($id)
    {
    	$result = array();
        $where = "	SELECT * FROM tbl_client
        			Where c_id='$id'
        		 ";

        //var_dump($where); exit();


        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	//var_dump($data); exit();
                $result[] = $data;
            }
        }

        return $result;
    }
    function show_client($id){
		$this->db->from($this->table);
		$this->db->where('c_id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	function show_clientReparation($id){
		$this->db->from($this->table);
		$this->db->join('tbl_reparation', 'tbl_reparation.c_id = tbl_client.c_id');
		$this->db->where('tbl_client.c_id', $id);
		$query = $this->db->get();

		return $query->row();
	}
	function getClientJson($id){
		$this->db->from($this->table);
		$this->db->where('c_id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	// Supplier Section
	function checkSupplier($table2,$where){		
		return $this->db->get_where($table2,$where);
	}
	function get_supplier(){
        $this->db->select('*');
        $this->db->order_by("s_id", "asc");
        $this->db->from('tbl_supplier');
		return $this->db->get();
    }
    function show_supplier($id){
		$this->db->from($this->table2);
		$this->db->where('s_id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	// Manufacturer Section
	function get_manufacturer(){
        $this->db->select('*');
        $this->db->order_by("m_id", "asc");
        $this->db->from('tbl_manufacturer');
		return $this->db->get();
    }
    function show_manufacturer($id){
		$this->db->from($this->table3);
		$this->db->where('m_id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	// Models Section
	function get_model(){
		$this->db->select('*');
        $this->db->order_by("md_id", "asc");
        $this->db->from('tbl_model');
		return $this->db->get();
	}
	function show_model($id){
		$this->db->from($this->table4);
		$this->db->where('md_id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	function getDetailsClient($id)
	{
		$result = array();
        $where = "	SELECT * FROM tbl_client
        			Where c_id='$id'
        		 ";

        //var_dump($where); exit();


        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	//var_dump($data); exit();
                $result[] = $data;
            }
        }

        return $result;
	}

	//purchase
	function get_purchase(){
		$this->db->select('*');
        $this->db->order_by("id", "asc");
        $this->db->from('tbl_purchase');
		return $this->db->get();
	}
	function get_purchasebyholdid($id){
		$this->db->from($this->table6);
		// $this->db->join('tbl_purchase_item', 'tbl_purchase_item.hold_id = tbl_purchase.hold_id');
		$this->db->where('hold_id', $id);
		return $this->db->get();
	}
	function get_purchasebyholditem($id){
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_purchase_item', 'tbl_purchase_item.hold_id = tbl_purchase.hold_id');
		$this->db->where('tbl_purchase.hold_id', $id);
		return $this->db->get();
	}
	function get_purchasebyholditempurchase($id){
		$this->db->from('tbl_purchase_item');
		$this->db->join('tbl_purchase', 'tbl_purchase.hold_id = tbl_purchase_item.hold_id');
		$this->db->where('tbl_purchase_item.hold_id', $id);
		return $this->db->get();
	}
	function getDetailsPurchase($id)
	{
		$result = array();
        $where = "	SELECT * FROM tbl_purchase
        			Where id='$id'
        		 ";

        //var_dump($where); exit();


        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	//var_dump($data); exit();
                $result[] = $data;
            }
        }

        return $result;
	}
	function get_holdiditem($id){
		// $hold_id = $this->input->post('hold_value');
		$this->db->from('tbl_hold');
		$this->db->where('random_id', $id);
		return $this->db->get();
	}

	// POS Section

	// function get_productpos(){
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_product');
	// 	$this->db->group_by('p_category');
	// 	return $this->db->get();
	// }
	function get_posdata(){
		$this->db->select('*');
		$this->db->from('tbl_lookup_category');
		$this->db->group_by('hold_id');
		return $this->db->get();
	}
	// function get_productposjoin($id){
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_product');
	// 	$this->db->join('tbl_lookup_category', 'tbl_lookup_category.hold_id = tbl_product.hold_id');
	// 	$this->db->join('tbl_lookup_subcategory', 'tbl_lookup_subcategory.hold_id = tbl_lookup_category.hold_id');
	// 	// $this->db->group_by('hold_id');
	// 	$this->db->where('tbl_product.hold_id', $id);
	// 	return $this->db->get();
	// }
	function get_productposjoin($id){
		$this->db->select('*');
		$this->db->from('tbl_lookup_subcategory');
		// $this->db->group_by('hold_id');
		$this->db->where('hold_id', $id);
		return $this->db->get();
	}
	function get_backsubcat($id){
		$this->db->select('tbl_lookup_subcategory.hold_id');
		$this->db->from('tbl_product');
		// $this->db->group_by('hold_id');
		$this->db->join('tbl_lookup_subcategory', 'tbl_lookup_subcategory.sub_id = tbl_product.p_subCategory');
		$this->db->where('tbl_lookup_subcategory.sub_id', $id);
		$this->db->group_by('tbl_lookup_subcategory.hold_id');
		return $this->db->get();
		// echo $this->db->last_query(); exit();
	}
	function get_backsubcat2($holdidd){
		$this->db->select('*');
		$this->db->from('tbl_lookup_subcategory');
		$this->db->where('hold_id', $holdidd);
		return $this->db->get();
	}
	function get_productbacktosubcategory($holdid){
		$this->db->select('*');
		$this->db->from('tbl_lookup_subcategory');
		// $this->db->group_by('hold_id');
		$this->db->where('hold_id', $holdid);
		return $this->db->get();
	}
	function get_productposproduct($id){
		$this->db->select('*');
		$this->db->from('tbl_product');
		// $this->db->group_by('hold_id');
		$this->db->where('p_subCategory', $id);
		return $this->db->get();
	}
	function getDetailsProduct($id)
	{
		$result = array();
        $where = "	SELECT * FROM tbl_product
        			Where p_id='$id'
        		 ";

        //var_dump($where); exit();


        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	//var_dump($data); exit();
                $result[] = $data;
            }
        }

        return $result;
	}
	function get_custinfo($cust){
		$this->db->select('*');
		$this->db->from('tbl_pospayment');
		$this->db->join('tbl_client','tbl_client.c_id = tbl_pospayment.c_id');
		$this->db->group_by('tbl_pospayment.c_id');

		$this->db->where('tbl_pospayment.c_id', $cust);

		return $this->db->get();
		// echo $this->db->last_query(); exit();
	}
	function get_productinfo($holdid){
		$this->db->select('*');
		$this->db->from('tbl_holdproduct');
		$this->db->where('hold_id', $holdid);
		return $this->db->get();
	}
	function get_paymentinfo($holdid){
		$this->db->select('*, SUM(pro_price) as alltotal, SUM(pro_tax) as sumtax, SUM(pro_disc) as sumdisc');
		$this->db->from('tbl_holdproduct');
		$this->db->join('tbl_pospayment', 'tbl_pospayment.hold_id = tbl_holdproduct.hold_id');
		// $this->db->group_by('tbl_holdproduct.hold_id');
		$this->db->where('tbl_holdproduct.hold_id', $holdid);
		return $this->db->get();

		// echo $this->db->last_query(); exit();
	}

	// Chart Section

	// function get_financedata(){
	// 	$this->db->select('extract(month from pay_date) as mon, SUM(pay_amount) as totalpaid');
	// 	$this->db->group_by('extract(month from pay_date)');
	//     $result = $this->db->get('tbl_payment');
	//     return $result;
	// }
	function get_financedata(){
		$this->db->select('pay_date, SUM(pay_amount) as totalpaid');
		$this->db->group_by('r_repairno');
		$this->db->where('MONTH(pay_date)', date('m'));
		$this->db->where('YEAR(pay_date)', date('Y'));
	    $result = $this->db->get('tbl_payment');
	    return $result;
	}
	function get_financedatatotal(){
		$this->db->select('pay_date, SUM(pay_amount) as totalpaid');
		// $this->db->group_by('r_repairno');
		$this->db->where('MONTH(pay_date)', date('m'));
		$this->db->where('YEAR(pay_date)', date('Y'));
	    $result = $this->db->get('tbl_payment');
	    // echo $this->db->last_query(); exit();
	    return $result;
	}
	function get_financedataselected($m){
		$this->db->select('pay_date, SUM(pay_amount) as totalpaid');
		$this->db->group_by('r_repairno');
		$this->db->where('MONTH(pay_date)', $m);
		$this->db->where('YEAR(pay_date)', date('Y'));
	    $result = $this->db->get('tbl_payment');
	    // echo $this->db->last_query(); exit();
	    return $result;
	}
	function get_financedataselectedtotal($m){
		$this->db->select('pay_date, SUM(pay_amount) as totalpaid');
		// $this->db->group_by('r_repairno');
		$this->db->where('MONTH(pay_date)', $m);
		$this->db->where('YEAR(pay_date)', date('Y'));
	    $result = $this->db->get('tbl_payment');
	    // echo $this->db->last_query(); exit();
	    return $result;
	}
	function get_reportproduct(){
        $this->db->select('*');
        $this->db->order_by("p_id", "asc");
        $this->db->from('tbl_product');
		return $this->db->get();
    }
}