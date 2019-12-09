<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_function extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		// $this->load->model('d_post', 'dp');
		$this->load->model('m_data', 'md');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		// $this->load->library('form_validation');
		// $this->load->library('upload');
		// $this->load->model('m_upload');
	}
	// Need to continue, public/tr_registerpublic
	public function validatelogin(){
		$username = $this->input->post('u_email');
		$password = $this->input->post('u_pass');
		$where = array(
			'u_email' => $username,
			'u_pass' => $password
			);
		$check = $this->md->check_login("tbl_user",$where)->num_rows();
		$data['tbl_user'] = $this->md->check_login("tbl_user",$where)->result();
		if($check > 0){


			$this->db->where("u_email",$username);
			$this->db->where("u_pass",$password);
 			$query = $this->db->get('tbl_user')->result();

 			foreach ($query as $data) {
 				$role = $data->u_role;
 				$branch = $data->u_branch;
 				$name = $data->u_name;
 				$id = $data->u_id; 
 			}

			$data_session = array(
				'email' => $username,
				'name' => $name,
				'role' => $role,
				'branch' => $branch,
				'id' => $id,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			// $where = array(
			// 'tr_email' => $username,
			// 'tr_password' => $password
			// );
			// $check2 = $this->md->check_login_2("trainer",$where)->num_rows();
			// $data2['trainer'] = $this->md->check_login_2("trainer",$where)->result();
			// if($check2 > 0){


				// foreach ($data['admin'] as $u) {
				// 	echo $u->username;
				// 	echo '';
				// 	echo $u->password;
				// }
	 
			// 	$data_session = array(
			// 		'name' => $username,
			// 		'status' => "login"
			// 		);
	 
			// 	$this->session->set_userdata($data_session);
	 	// 		// progress kena set trainer page!!!
			// 	redirect(base_url("admin"));
			

			// }else{
				echo '<script language="javascript">';
	    		echo 'alert("Username or Password Wrong !");';
				echo '</script>';
				$this->load->view('public/adminlogin.php');
			// }
		}
	}
	public function adminlogout(){
		$this->session->sess_destroy();
		redirect(base_url('main/index'));
	}
}
