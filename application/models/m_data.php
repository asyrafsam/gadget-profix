<?php 
 
class M_data extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function check_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function check_login_2($table,$where){		
		return $this->db->get_where($table,$where);
	}

	// function view_user($where,$table){
		
	// 	$useremail = $this->session->userdata("name");
	// 	$this->db->select('*');
 //        $this->db->from($table);
 //        $this->db->where('ad_uname', $where);
 //        // $query = $this->db->get();
	// 	return $this->db->get();
	// }

	// function view_trainer(){
	// 	$this->db->select('*');
 //        $this->db->from('trainer');
	// 	return $this->db->get();
	// }		
}