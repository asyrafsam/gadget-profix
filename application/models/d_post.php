<?php 
 
class d_post extends CI_Model{

	var $table = 'tbl_client';
	var $tablesupplier = 'tbl_supplier';
	var $tablemanufacturer = 'tbl_manufacturer';
	var $tablemodel = 'tbl_model';
	var $tableproduct = 'tbl_product';
	var $tablehold = 'tbl_hold';
	var $tablepurchase = 'tbl_purchase';
	var $tablerepairdetails = 'tbl_repair_details';
	var $tablereparation = 'tbl_reparation';
	var $tablepayment = 'tbl_payment';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// Dashboard Section
	public function add_event($data)
	{
	    $this->db->insert("tbl_calendar_events", $data);
	}
	public function update_event($id, $data)
	{
	    $this->db->where("id", $id)->update("tbl_calendar_events", $data);
	}

	public function delete_event($id)
	{
	    $this->db->where("id", $id)->delete("tbl_calendar_events");
	}

	// Reparation Section------------------
	function view_reparation(){
		$this->db->select('*');
        $this->db->from('tbl_reparation');
		return $this->db->get();
	}
	function deletehold($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tablehold);
	}
	function addrepairdetails($datarepair,$tablerepairdetails){
		$this->db->insert($tablerepairdetails,$datarepair);
	}
	function addreparationall($datareparation,$tablereparation){
		$this->db->insert($tablereparation,$datareparation);
	}
	function changeStatus($where,$datachange,$tablereparation){
		$this->db->where($where);
		$this->db->update($tablereparation,$datachange);
	}
	function changePayment($where,$addpay,$tablepayment){
		$this->db->where($where);
		$this->db->update($tablepayment,$addpay);
	}



	// Stock Section----------------------
	function addproduct($data,$tableproduct){
		$this->db->insert($tableproduct,$data);
	}
	function updateProduct($where,$datain,$tableproduct){
		$this->db->where($where);
		$this->db->update($tableproduct,$datain);
	}
	function deleteProduct($id){
		$this->db->where($id);
		$this->db->delete('tbl_product');
	}

	// Client Section----------------------
	function addclient($data,$table){
		$this->db->insert($table,$data);
	}
	function update_client($where, $data){
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	function updateClients($where,$datain,$table){
		$this->db->where($where);
		$this->db->update($table,$datain);
	}
 	function deleteClient($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	// Supplier Section--------------------
	function addsupplier($data,$tablesupplier){
		$this->db->insert($tablesupplier,$data);
	}
	function updateSuppliers($where,$datainn,$tablesupplier){
		$this->db->where($where);
		$this->db->update($tablesupplier,$datainn);
	}
	function deleteSupplier($where,$tablesupplier){
		$this->db->where($where);
		$this->db->delete($tablesupplier);
	}

	// Manufacturer Section-------------------
	function addmanufacturer($data,$tablemanufacturer){
		$this->db->insert($tablemanufacturer,$data);
	}
	function updateManufacturers($where,$datainn,$tablemanufacturer){
		$this->db->where($where);
		$this->db->update($tablemanufacturer,$datainn);
	}
	function deleteManufacturer($where,$tablemanufacturer){
		$this->db->where($where);
		$this->db->delete($tablemanufacturer);
	}

	// Models Section
	function addmodel($data,$tablemodel){
		$this->db->insert($tablemodel,$data);
	}
	function updateModels($where,$datainn,$tablemodel){
		$this->db->where($where);
		$this->db->update($tablemodel,$datainn);
	}
	function deleteModels($where,$tablemodel){
		$this->db->where($where);
		$this->db->delete($tablemodel);
	}

	// Purchase
	function addpurchase($data,$tablepurchase){
		$this->db->insert($tablepurchase,$data);
	}
	function updatePurchase($where,$datain,$tablepurchase){
		$this->db->where($where);
		$this->db->update($tablepurchase,$datain);
	}
}