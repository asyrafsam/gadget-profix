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
	var $table10 = 'tbl_posdetails';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Dashboard
	function get_invoicedetails($branch,$tbl_invoice_details){
		$this->db->select('*');
		$this->db->from('tbl_invoice_details');
		$this->db->where('u_branch', $branch);
		return $this->db->get();
	}
	function getClient($branch){
		$this->db->select('count(*) as kiraclient');
		$this->db->from('tbl_client');
		$this->db->where('u_branch', $branch);
		return $this->db->get();
	}
	function getReparation($branch){
		$this->db->select('count(*) as kirareparation');
		$this->db->from('tbl_reparation');
		$this->db->where('u_branch', $branch);
		return $this->db->get();
	}
	function getRevenue($branch){
		$this->db->select('SUM(revenue_subtotal) as kirarevenue');
		$this->db->from('tbl_revenue');
		$this->db->where('u_branch', $branch);
		return $this->db->get();
	}
	function getRevenuebyMonth($branch){
		$this->db->select('revenue_date,SUM(revenue_subtotal) as kirarevenue');
		$this->db->from('tbl_revenue');
		$this->db->where('MONTH(revenue_date)', date('m'));
		$this->db->where('YEAR(revenue_date)', date('Y'));
		$this->db->where('u_branch', $branch);
		return $this->db->get();
	}
	public function get_events($start, $end, $branch)
	{
	    $this->db->where("start >=", $start);
	    $this->db->where("end <=", $end);
	    $this->db->where("u_branch", $branch);
	    return $this->db->get("tbl_calendar_events");
	}
	public function get_event($id)
	{
	    return $this->db->where("id", $id)->get("tbl_calendar_events");
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
	function view_reparation($branch){
		$this->db->select('*, SUM(DISTINCT(tbl_hold.unit_price)) as creditTotal, SUM(DISTINCT(tbl_payment.pay_amount)) as payTotal');
        $this->db->from('tbl_reparation');
        $this->db->join('tbl_payment', 'tbl_payment.r_repairno = tbl_reparation.r_repairno','LEFT');
        $this->db->join('tbl_hold', 'tbl_hold.random_id = tbl_payment.hold_id','LEFT');
        $this->db->where('tbl_reparation.u_branch', $branch);
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
		$query = $this->db->get('tbl_repair_status')->result();
		//var_dump($query); exit();
		foreach ($query as $data) {
			# code...
			echo '<option value="'.$data->statusName.'">';
		}
	}
	function get_item($branch){
        $this->db->select('*');
        $this->db->from('tbl_lookup_item');
        $this->db->where('u_branch', $branch);
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
	// function get_reparationitem($id){
	// 	$this->db->from($this->table1);
	// 	$this->db->join('tbl_hold', 'tbl_hold.random_id = tbl_reparation.hold_id');
	// 	$this->db->where('tbl_reparation.r_repairno', $id);
	// 	return $this->db->get();
	// }
	function get_reparationitem($id){
		$this->db->select('*, SUM(DISTINCT(tbl_reparation.r_model))as testdisc');
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

	function show_payment($id){
		$this->db->from($this->table1);
        $this->db->join('tbl_payment', 'tbl_payment.hold_id = tbl_reparation.hold_id');
        $this->db->where('tbl_reparation.r_code', $id);
		return $this->db->get();

		// echo $this->db->last_query(); die;
	}

	function show_reparationLog($id){
		$this->db->from($this->table9);
		$this->db->where('tbl_reparation_log.r_repairno', $id);
		$query = $this->db->get();
		return $query->row();
	}


    // Stock Section
    // Add Product
    function get_product($branch){
        $this->db->select('*');
        $this->db->order_by("p_id", "asc");
        $this->db->from('tbl_product');
        $this->db->where('u_branch', $branch);
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
	function get_productcat($branch){
		$this->db->select('*');
        $this->db->order_by("cat_id", "asc");
        $this->db->from('tbl_lookup_category');
        $this->db->where('u_branch', $branch);
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
    function get_client($branch){
        $this->db->select('*');
        $this->db->order_by("c_id", "asc");
        $this->db->from('tbl_client');
        $this->db->where('u_branch', $branch);
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
	function get_supplier($branch){
        $this->db->select('*');
        $this->db->order_by("s_id", "asc");
        $this->db->from('tbl_supplier');
        $this->db->where('u_branch', $branch);
		return $this->db->get();
    }
    function show_supplier($id){
		$this->db->from($this->table2);
		$this->db->where('s_id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	// Manufacturer Section
	function get_manufacturer($branch){
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
	function get_model($branch){
		$this->db->select('*');
        $this->db->order_by("md_id", "asc");
        $this->db->from('tbl_model');
        $this->db->where('u_branch', $branch);
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
	function get_purchase($branch){
		$this->db->select('*');
        $this->db->order_by("id", "asc");
        $this->db->from('tbl_purchase');
        $this->db->where('u_branch', $branch);
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
	function get_posdata($branch, $tbl_lookup_category){
		$this->db->select('*');
		$this->db->from('tbl_lookup_category');
		$this->db->group_by('hold_id');
		$this->db->where('u_branch', $branch);
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
		$this->db->from('tbl_posdetails');
		$this->db->join('tbl_client','tbl_client.c_id = tbl_posdetails.c_id');
		$this->db->group_by('tbl_posdetails.c_id');

		$this->db->where('tbl_posdetails.c_id', $cust);

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
		$this->db->join('tbl_posdetails', 'tbl_posdetails.hold_id = tbl_holdproduct.hold_id');
		// $this->db->group_by('tbl_holdproduct.hold_id');
		$this->db->where('tbl_holdproduct.hold_id', $holdid);
		return $this->db->get();

		// echo $this->db->last_query(); exit();
	}
	function get_paidinfo($holdid){
		$this->db->select('*');
		$this->db->from('tbl_pospayment');
		$this->db->where('hold_id', $holdid);
		return $this->db->get();
	}
	function getDetailsStock($id){
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

	// Report Section

	// function get_financedata(){
	// 	$this->db->select('extract(month from pay_date) as mon, SUM(pay_amount) as totalpaid');
	// 	$this->db->group_by('extract(month from pay_date)');
	//     $result = $this->db->get('tbl_payment');
	//     return $result;
	// }
	// function get_financedata(){
	// 	$this->db->select('pay_date, SUM(pay_amount) as totalpaid');
	// 	$this->db->group_by('r_repairno');
	// 	$this->db->where('MONTH(pay_date)', date('m'));
	// 	$this->db->where('YEAR(pay_date)', date('Y'));
	//     $result = $this->db->get('tbl_payment');
	//     return $result;
	// }
	function get_financedata($branch){
		$this->db->select('revenue_date, SUM(revenue_subtotal) as totalpaid');
		// $this->db->group_by('r_repairno');
		$this->db->where('MONTH(revenue_date)', date('m'));
		$this->db->where('YEAR(revenue_date)', date('Y'));
		$this->db->where('u_branch', $branch);
	    $result = $this->db->get('tbl_revenue');
	    return $result;
	}
	// function get_financedatatotal(){
	// 	$this->db->select('pay_date, SUM(pay_amount) as totalpaid');
	// 	// $this->db->group_by('r_repairno');
	// 	$this->db->where('MONTH(pay_date)', date('m'));
	// 	$this->db->where('YEAR(pay_date)', date('Y'));
	//     $result = $this->db->get('tbl_payment');
	//     // echo $this->db->last_query(); exit();
	//     return $result;
	// }
	function get_financedatatotal($branch){
		$this->db->select('revenue_date, SUM(revenue_subtotal) as totalpaid');
		// $this->db->group_by('r_repairno');
		$this->db->where('MONTH(revenue_date)', date('m'));
		$this->db->where('YEAR(revenue_date)', date('Y'));
		$this->db->where('u_branch', $branch);
	    $result = $this->db->get('tbl_revenue');
	    // echo $this->db->last_query(); exit();
	    return $result;
	}
	// function get_financedataselected($m){
	// 	$this->db->select('pay_date, SUM(pay_amount) as totalpaid');
	// 	$this->db->group_by('r_repairno');
	// 	$this->db->where('MONTH(pay_date)', $m);
	// 	$this->db->where('YEAR(pay_date)', date('Y'));
	//     $result = $this->db->get('tbl_payment');
	//     // echo $this->db->last_query(); exit();
	//     return $result;
	// }
	function get_financedataselected($m,$branch){
		$this->db->select('revenue_date, SUM(revenue_subtotal) as totalpaid');
		$this->db->group_by('revenue_holdid');
		$this->db->where('MONTH(revenue_date)', $m);
		$this->db->where('YEAR(revenue_date)', date('Y'));
		$this->db->where('u_branch', $branch);
	    $result = $this->db->get('tbl_revenue');
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
    function get_salesproduct($m,$branch){
    	$this->db->select('*, SUM(tbl_holdproduct.pro_tax) as totaltax, SUM(DISTINCT(tbl_pospayment.pay_amount)) as totalpaid');
    	$this->db->from('tbl_holdproduct');
    	$this->db->join('tbl_pospayment', 'tbl_pospayment.hold_id = tbl_holdproduct.hold_id');
    	$this->db->join('tbl_posdetails', 'tbl_posdetails.hold_id = tbl_pospayment.hold_id');
    	$this->db->join('tbl_client', 'tbl_client.c_id = tbl_posdetails.c_id');
    	$this->db->where('MONTH(tbl_posdetails.date_pos)', $m);
    	$this->db->where('tbl_posdetails.u_branch', $branch);
    	$this->db->group_by('tbl_pospayment.hold_id');
    	return $this->db->get();
	    // echo $this->db->last_query(); exit();
    }
    function get_drawerreport($m,$branch){
    	$this->db->select('*');
    	$this->db->from('tbl_drawer');
    	$this->db->where('MONTH(tbl_drawer.closedTime)', $m);
    	$this->db->where('u_branch', $branch);
    	return $this->db->get();
	    // echo $this->db->last_query(); exit();
    }
    function show_paymentsales($id){
		$this->db->from('tbl_pospayment');
        // $this->db->join('tbl_pospayment', 'tbl_pospayment.hold_id = tbl_holdproduct.hold_id');
        $this->db->where('tbl_pospayment.transaction_id', $id);
        // $this->db->group_by('tbl_holdproduct.hold_id');
		return $this->db->get();

		// echo $this->db->last_query(); die;
	}
	function show_posdetails($id){
		$this->db->from($this->table10);
		$this->db->join('tbl_holdproduct', 'tbl_holdproduct.hold_id = tbl_posdetails.hold_id');
		$this->db->where('tbl_posdetails.transaction_id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	function getDetailsSales($id){
		$result = array();
        $where = "
        			SELECT *, tbl_client.u_branch as custbranch FROM tbl_holdproduct 
        			JOIN tbl_posdetails ON tbl_posdetails.hold_id = tbl_holdproduct.hold_id 
        			JOIN tbl_client ON tbl_client.c_id = tbl_posdetails.c_id 
        			WHERE tbl_posdetails.id = '$id'

        		 ";

        // var_dump($where); exit();


        $query = $this->db->query($where);
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {

            	//var_dump($data); exit();
                $result[] = $data;
            }
        }

        return $result;
	}

	function get_posdetails($where,$tbl_posdetails){
		$this->db->from($tbl_posdetails);
		$this->db->join('tbl_client', 'tbl_client.c_id = tbl_posdetails.c_id');
		$this->db->where('tbl_posdetails.hold_id', $where);
		return $this->db->get();
		// echo $this->db->last_query(); exit();
	}
	function get_productdetails($where,$tbl_holdproduct){
		$this->db->from($tbl_holdproduct);
		$this->db->join('tbl_product', 'tbl_product.p_id = tbl_holdproduct.pro_id');
		$this->db->where('tbl_holdproduct.hold_id', $where);
		return $this->db->get();
		// echo $this->db->last_query(); exit();
	}
	function get_calculation($where){
		$this->db->select('*, SUM(DISTINCT(tbl_holdproduct.pro_tax)) as totaltax, SUM(DISTINCT(tbl_holdproduct.pro_disc)) as totaldisc, SUM(DISTINCT(tbl_pospayment.pay_amount)) as totalpaid');
    	$this->db->from('tbl_product');
    	$this->db->join('tbl_holdproduct', 'tbl_holdproduct.pro_id = tbl_product.p_id');
    	$this->db->join('tbl_pospayment', 'tbl_pospayment.hold_id = tbl_holdproduct.hold_id');
    	$this->db->join('tbl_posdetails', 'tbl_posdetails.hold_id = tbl_pospayment.hold_id');
    	$this->db->join('tbl_client', 'tbl_client.c_id = tbl_posdetails.c_id');
    	$this->db->where('tbl_posdetails.hold_id', $where);
    	return $this->db->get();
    	// echo $this->db->last_query(); exit();
	}

	// System Setting Section
	function get_users($branch,$tbl_user){
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('u_branch', $branch);
		return $this->db->get();
	}
	function get_usersupdate($id,$tbl_user){
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id', $id);
		return $this->db->get();
	}
	function get_usersgroup($branch,$tbl_user_group){
		$this->db->select('*');
		$this->db->from('tbl_user_group');
		$this->db->where('u_branch', $branch);
		return $this->db->get();
	}
	function getGroup($id){
		$result = array();
        $where = "	SELECT * FROM tbl_user_group
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
		// echo $this->db->last_query(); exit();
	}
	function get_repairstatus($branch,$tbl_repair_status){
		$this->db->select('*');
		$this->db->from('tbl_repair_status');
		$this->db->where('u_branch', $branch);
		$this->db->order_by('position_order', 'asc');
		return $this->db->get();
	}
	function getStatus($id){
		$result = array();
        $where = "	SELECT * FROM tbl_repair_status
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
	function getPermission($name){
		$result = array();
        $where = "	SELECT * FROM tbl_group_permission
        			Where groupId='$name'
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

	// Database Section
	function get_database($branch,$tbl_database){
		$this->db->select('*');
		$this->db->from('tbl_database');
		$this->db->where('u_branch', $branch);
		return $this->db->get();
	}
}