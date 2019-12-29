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
 				$id = $data->id; 
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


 			#var_dump($Jawatan); exit();

			$this->db->where("groupId", $role);

			$query =  $this->db->get('tbl_group_permission')->result();
			foreach ($query as $data) 
			{
				$repairview = $data->reparation_view;
 				$repairadd = $data->reparation_add;
 				$repairedit = $data->reparation_edit;
 				$repairdelete = $data->reparation_delete;

 				$clientview = $data->clients_view;
 				$clientadd = $data->clients_add;
 				$clientedit = $data->clients_edit;
 				$clientdelete = $data->clients_delete; 

 				$stockview = $data->stock_view;
 				$stockadd = $data->stock_add;
 				$stockedit = $data->stock_edit;
 				$stockdelete = $data->stock_delete; 

 				$supplierview = $data->suppliers_view;
 				$supplieradd = $data->suppliers_add;
 				$supplieredit = $data->suppliers_edit;
 				$supplierdelete = $data->suppliers_delete; 

 				$modelview = $data->models_view;
 				$modeladd = $data->models_add;
 				$modeledit = $data->models_edit;
 				$modeldelete = $data->models_delete; 

 				$purchaseview = $data->purchases_view;
 				$purchaseadd = $data->purchases_add;
 				$purchaseedit = $data->purchases_edit;
 				$purchasedelete = $data->purchases_delete; 

 				$userview = $data->users_view;
 				$useradd = $data->users_add;
 				$useredit = $data->users_edit;
 				$userdelete = $data->users_delete; 

 				$groupview = $data->group_view;
 				$groupadd = $data->group_add;
 				$groupedit = $data->group_edit;
 				$groupdelete = $data->group_delete;

 				$taxview = $data->tax_view;
 				$taxadd = $data->tax_add;
 				$taxedit = $data->tax_edit;
 				$taxdelete = $data->tax_delete;

 				$categoryview = $data->categories_view;
 				$categoryadd = $data->categories_add;
 				$categoryedit = $data->categories_edit;
 				$categorydelete = $data->categories_delete;

 				$manufacturerview = $data->manufacturers_view;
 				$manufactureradd = $data->manufacturers_add;
 				$manufactureredit = $data->manufacturers_edit;
 				$manufacturerdelete = $data->manufacturers_delete;

 				$reportstock = $data->reports_stock;
 				$reportfinance = $data->reports_finance;
 				$reportquantity = $data->reports_quantity;
 				$reportsale = $data->reports_sales;  
 				$reportdrawer = $data->reports_drawer;

 				$databaseview = $data->database_view;
 				$databasebackup = $data->database_backup;
 				$databaserestore = $data->database_restore;  
 				$databaseremove = $data->database_remove;

 				$miscellanousemail = $data->miscellanous_email;
			}

			$data_session = array(
				'repairview'=>$repairview,
 				'repairadd'=>$repairadd,
 				'repairedit'=>$repairedit,
 				'repairdelete'=>$repairdelete,
 				
 				'clientview'=>$clientview,
 				'clientadd'=>$clientadd,
 				'clientedit'=>$clientedit,
 				'clientdelete'=>$clientdelete, 

 				'stockview'=>$stockview,
 				'stockadd'=>$stockadd,
 				'stockedit'=>$stockedit,
 				'stockdelete'=>$stockdelete, 

 				'supplierview'=>$supplierview,
 				'supplieradd'=>$supplieradd,
 				'supplieredit'=>$supplieredit,
 				'supplierdelete'=>$supplierdelete,

 				'modelview'=>$modelview,
 				'modeladd'=>$modeladd,
 				'modeledit'=>$modeledit,
 				'modeldelete'=>$modeldelete,

 				'purchaseview'=>$purchaseview,
 				'purchaseadd'=>$purchaseadd,
 				'purchaseedit'=>$purchaseedit,
 				'purchasedelete'=>$purchasedelete,

 				'userview'=>$userview,
 				'useradd'=>$useradd,
 				'useredit'=>$useredit,
 				'userdelete'=>$userdelete,

 				'groupview'=>$groupview,
 				'groupadd'=>$groupadd,
 				'groupedit'=>$groupedit,
 				'groupdelete'=>$groupdelete,

 				'taxview'=>$taxview,
 				'taxadd'=>$taxadd,
 				'taxedit'=>$taxedit,
 				'taxdelete'=>$taxdelete,

 				'categoryview'=>$categoryview,
 				'categoryadd'=>$categoryadd,
 				'categoryedit'=>$categoryedit,
 				'categorydelete'=>$categorydelete,

 				'manufacturerview'=>$manufacturerview,
 				'manufactureradd'=>$manufactureradd,
 				'manufactureredit'=>$manufactureredit,
 				'manufacturerdelete'=>$manufacturerdelete,

 				'reportstock'=>$reportstock,
 				'reportfinance'=>$reportfinance,
 				'reportquantity'=>$reportquantity,
 				'reportsale'=>$reportsale, 
 				'reportdrawer'=>$reportdrawer,

 				'databaseview'=>$databaseview,
 				'databasebackup'=>$databasebackup,
 				'databaserestore'=>$databaserestore, 
 				'databaseremove'=>$databaseremove,

 				'miscellanousemail'=>$miscellanousemail
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
