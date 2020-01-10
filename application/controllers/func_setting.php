<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func_setting extends CI_Controller {


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
	function updateInvoice(){
		$result1 = $this->input->post('name');
		$result2 = $this->input->post('email');
		$result3 = $this->input->post('addr');
		$result4 = $this->input->post('phone');
		$result5 = $this->input->post('disclaimer');
		$result6 = $this->input->post('image');
		$ubranch = $this->input->post('ubranch');

		date_default_timezone_set("Asia/Kuala_Lumpur");
		$currentdate = date('Y-m-d H:i:s');
		$id = 1;
		

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 20024;
        $config['max_height']           = 10068;
        $config['encrypt_name']           = TRUE;
        $config['remove_spaces']           = TRUE;

        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('image'))
        {
                $datain = array(
						'invoiceName' => $result1,
						'invoiceEmail' => $result2,
						'invoiceAddr' => $result3,
						'invoiceTel' => $result4,
						'invoiceDisclaimer' => $result5
					);
				$this->db->where('u_branch', $ubranch);
				$this->db->update('tbl_invoice_details', $datain);
				// echo $this->db->last_query();exit();
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $fname = $this->upload->data('file_name');
                // $fname = base_url().'/uploads/'.$fname;

                $datain = array(
						'invoiceName' => $result1,
						'invoiceEmail' => $result2,
						'invoiceAddr' => $result3,
						'invoiceTel' => $result4,
						'invoiceDisclaimer' => $result5,
						'invoiceLogo' => $fname
					);
				$this->db->where('u_branch', $ubranch);
				$this->db->update('tbl_invoice_details', $datain);

				// echo $this->db->last_query();exit();
        }

        $logactivity = 'Edit';
        $moduleclient = 'tbl_invoice_details';
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

		redirect(base_url('admin/setting'));
	}
	function adduser(){
		$firstname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$company = $this->input->post('company');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$pass = $this->input->post('pass');
		$image = $this->input->post('image');
		$ubranch = $this->input->post('ubranch');

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 20024;
        $config['max_height']           = 10068;
        $config['encrypt_name']           = TRUE;
        $config['remove_spaces']           = TRUE;

        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('image'))
        {
                
			?>
			<script type="text/javascript">
	            alert("Failed to insert, Image not selected");
	            window.location.href = '<?php echo base_url();?>admin/userlist_add';
	        </script>
			<?php
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $fname = $this->upload->data('file_name');
                // $fname = base_url().'/uploads/'.$fname;
                $status = 'Active';
                $datain = array(
						'u_name' => $firstname,
						'ul_name' => $lname,
						'u_company' => $company,
						'u_email' => $email,
						'u_image' => $fname,
						'u_phone' => $phone,
						'u_pass' => $pass,
						'u_status' => $status,
						'u_branch' => $ubranch
					);
				// $this->db->where('u_branch', $ubranch);
				$this->db->insert('tbl_user', $datain);
				$logactivity = 'Edit';
		        $moduleclient = 'tbl_invoice_details';
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

				?>
			<script type="text/javascript">
	            alert("Insert Success");
	            window.location.href = '<?php echo base_url();?>admin/userlist_add';
	        </script>
			<?php
				// echo $this->db->last_query();exit();
        }
	}
	function updateuser(){
		$userid = $this->input->post('userid');
		$firstname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$company = $this->input->post('company');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$pass = $this->input->post('pass');
		$image = $this->input->post('image');
		$ubranch = $this->input->post('ubranch');
		$grouprole = $this->input->post('usergroup');

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 20024;
        $config['max_height']           = 10068;
        $config['encrypt_name']           = TRUE;
        $config['remove_spaces']           = TRUE;

        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('image'))
        {
            if($grouprole == '')
            {
            	$status = 'Active';
	            $datain = array(
						'u_name' => $firstname,
						'ul_name' => $lname,
						'u_company' => $company,
						'u_email' => $email,
						'u_phone' => $phone,
						'u_pass' => $pass,
						'u_status' => $status,
						'u_branch' => $ubranch
					);
				$this->db->where('id', $userid);
				$this->db->update('tbl_user', $datain);
            }else{
            	$status = 'Active';
	            $datain = array(
						'u_name' => $firstname,
						'ul_name' => $lname,
						'u_company' => $company,
						'u_email' => $email,
						'u_phone' => $phone,
						'u_pass' => $pass,
						'u_role' => $grouprole,
						'u_status' => $status,
						'u_branch' => $ubranch
					);
				$this->db->where('id', $userid);
				$this->db->update('tbl_user', $datain);
            }
            
            $logactivity = 'Edit';
	        $moduleclient = 'tbl_user';
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

			?>
			<script type="text/javascript">
	            alert("Update Successfully without Image");
	            window.location.href = '<?php echo base_url();?>admin/userlist';
	        </script>
			<?php
        }
        else
        {
        		if($grouprole == '')
        		{
        			$data = array('upload_data' => $this->upload->data());
	                $fname = $this->upload->data('file_name');
	                // $fname = base_url().'/uploads/'.$fname;
	                $status = 'Active';
	                $datain = array(
							'u_name' => $firstname,
							'ul_name' => $lname,
							'u_company' => $company,
							'u_email' => $email,
							'u_image' => $fname,
							'u_phone' => $phone,
							'u_pass' => $pass,
							'u_status' => $status,
							'u_branch' => $ubranch
						);
					$this->db->where('id', $userid);
					$this->db->update('tbl_user', $datain);
        		}else{
        			$data = array('upload_data' => $this->upload->data());
	                $fname = $this->upload->data('file_name');
	                // $fname = base_url().'/uploads/'.$fname;
	                $status = 'Active';
	                $datain = array(
							'u_name' => $firstname,
							'ul_name' => $lname,
							'u_company' => $company,
							'u_email' => $email,
							'u_image' => $fname,
							'u_phone' => $phone,
							'u_pass' => $pass,
							'u_role' => $grouprole,
							'u_status' => $status,
							'u_branch' => $ubranch
						);
					$this->db->where('id', $userid);
					$this->db->update('tbl_user', $datain);
        		}
                
                $logactivity = 'Edit';
		        $moduleclient = 'tbl_user';
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

				?>
			<script type="text/javascript">
	            alert("Update Successfully with Image");
	            window.location.href = '<?php echo base_url();?>admin/userlist';
	        </script>
			<?php
				// echo $this->db->last_query();exit();
        }
	}
	function userlist_delete($id){
		$where = array(
					'id' => $id
				);
		
		$this->db->delete('tbl_user', $where);
		?>
			<script type="text/javascript">
	            alert("Success Deleted");
	            window.location.href = '<?php echo base_url();?>admin/userlist';
	        </script>
			<?php
	}
	function creategroup(){
		$name = $this->input->post('groupname');
		$description = $this->input->post('groupdescription');
		$branch = $this->session->userdata('branch');
		$query = array(
					'groupName'=>$name,
					'groupDescription'=>$description,
					'u_branch'=>$branch
				);
		$this->db->insert('tbl_user_group',$query);

		$query1 = array(
					'groupId'=>$name,
					'u_branch'=>$branch
				);
		$this->db->insert('tbl_group_permission',$query1);

		$logactivity = 'Add';
        $moduleclient = 'tbl_group';
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

		redirect(base_url('admin/usergroup'));
	}
	function getgroup(){
		$id = $this->input->post('id');

		$query = $this->D_get->getGroup($id);

		if(empty($query)){
			echo 'Tiada Data Ditemui';
		} else {
			foreach ($query as $data) 
			{
			

			}
			echo json_encode($data);

		}
	}
	function editgroup(){
		$editid = $this->input->post('editid');
		$groupname = $this->input->post('editgroupname');
		$groupdescription = $this->input->post('editgroupdescription');

		$where = array(
					'id' => $editid
				);
		$datain = array(
					'groupName' => $groupname,
					'groupDescription' => $groupdescription,
				);

		$this->D_post->updateGroup($where,$datain,'tbl_user_group');

		$logactivity = 'Edit';
        $moduleclient = 'tbl_group';
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
		redirect(base_url("admin/usergroup"));
	}
	function orderby(){
		$position = $this->input->post('position');
		$i=1;

		
		foreach($position as $k=>$v){
		    // $sql = "Update tbl_repair_status SET position_order=".$i." WHERE id=".$v;
		    // $mysqli->query($sql);
			$datachange = array(
					'position_order'=>$i
				);
			$query = $this->db->query("UPDATE tbl_repair_status SET position_order='".$i."' WHERE id='".$v."'");
		    // $this->db->where('id', $v);
		    // $this->db->update('tbl_repair_status',$datachange);
		    // $this->db->get();


			$i++;
		}
	}
	function createstatus(){
		$statusname = $this->input->post('statusname');
		$statusbgcolor = $this->input->post('statusbgcolor');
		$statustextcolor = $this->input->post('statustextcolor');
		$ubranch = $this->input->post('ubranch');

		// $content = '<button class="btn" style="background-color:'.$statusbgcolor.';color: '.$statustextcolor.';font-weight: bold;">'.$statusname.'</button>';
		$query = array(
					'statusName'=>$statusname,
					'statusBGColor'=>$statusbgcolor,
					'statusTextColor'=>$statustextcolor,
					'u_branch'=>$ubranch
				);
		$this->db->insert('tbl_repair_status', $query);

		$logactivity = 'Add';
        $moduleclient = 'tbl_repair_status';
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

		redirect(base_url("admin/repairstatus"));
	}
	function getstatus(){
		$id = $this->input->post('id');

		$query = $this->D_get->getStatus($id);

		if(empty($query)){
			echo 'Tiada Data Ditemui';
		} else {
			foreach ($query as $data) 
			{
			

			}
			echo json_encode($data);

		}
	}
	function editstatus(){
		$editid = $this->input->post('editid');
		$editstatusname = $this->input->post('editstatusname');
		$editstatusbgcolor = $this->input->post('editstatusbgcolor');
		$editstatustextcolor = $this->input->post('editstatustextcolor');

		$where = array(
					'id' => $editid
				);
		$datain = array(
					'statusName' => $editstatusname,
					'statusBGColor' => $editstatusbgcolor,
					'statusTextColor' => $editstatustextcolor
				);

		$this->D_post->updateGroup($where,$datain,'tbl_repair_status');

		$logactivity = 'Edit';
        $moduleclient = 'tbl_repair_status';
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

		redirect(base_url("admin/repairstatus"));
	}
	function deletestatus($id){
		$this->db->where('id', $id);
		$this->db->delete('tbl_repair_status');

		$logactivity = 'Delete';
        $moduleclient = 'tbl_repair_status';
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

		redirect(base_url("admin/repairstatus"));
	}
	function getpermission(){
		$id = $this->input->post('id');
		$branch = $this->session->userdata('branch');
		$this->db->select('*');
		$this->db->from('tbl_user_group');
		$this->db->where('id', $id);
		$this->db->where('u_branch', $branch);
		$select = $this->db->get()->result();
		foreach ($select as $getName) {
			$name = $getName->groupName;
		}
		// echo $this->db->last_query();exit();
		$query = $this->D_get->getPermission($name);

		if(empty($query)){
			echo 'Tiada Data Ditemui';
		} else {
			foreach ($query as $data) 
			{
			

			}
			echo json_encode($data);
			
		}
	}
	function getpermissionview(){
		$name = $this->input->post('name');

		return $this->load->view('admin/body/grouplist-1-changepermission.php');
	}
	function changepermission(){
		$branch = $this->session->userdata('branch');
		$groupId = $this->input->post('groupId');

		$repairview = $this->input->post('repairview');
		$repairadd = $this->input->post('repairadd');
		$repairedit = $this->input->post('repairedit');
		$repairdelete =$this->input->post('repairdelete');

		$clientview = $this->input->post('clientview');
		$clientadd = $this->input->post('clientadd');
		$clientedit = $this->input->post('clientedit');
		$clientdelete = $this->input->post('clientdelete');

		$stockview = $this->input->post('stockview');
		$stockadd = $this->input->post('stockadd');
		$stockedit = $this->input->post('stockedit');
		$stockdelete = $this->input->post('stockdelete');

		$supplierview = $this->input->post('supplierview');
		$supplieradd = $this->input->post('supplieradd');
		$supplieredit = $this->input->post('supplieredit');
		$supplierdelete = $this->input->post('supplierdelete');

		$modelview = $this->input->post('modelview');
		$modeladd = $this->input->post('modeladd');
		$modeledit = $this->input->post('modeledit');
		$modeldelete = $this->input->post('modeldelete');

		$purchaseview = $this->input->post('purchaseview');
		$purchaseadd = $this->input->post('purchaseadd');
		$purchaseedit = $this->input->post('purchaseedit');
		$purchasedelete = $this->input->post('purchasedelete');

		$userview = $this->input->post('userview');
		$useradd = $this->input->post('useradd');
		$useredit = $this->input->post('useredit');
		$userdelete = $this->input->post('userdelete');

		$groupview = $this->input->post('groupview');
		$groupadd = $this->input->post('groupadd');
		$groupedit = $this->input->post('groupedit');
		$groupdelete = $this->input->post('groupdelete');

		$taxview = $this->input->post('taxview');
		$taxadd = $this->input->post('taxadd');
		$taxedit = $this->input->post('taxedit');
		$taxdelete = $this->input->post('taxdelete');

		$categoryview = $this->input->post('categoryview');
		$categoryadd = $this->input->post('categoryadd');
		$categoryedit = $this->input->post('categoryedit');
		$categorydelete = $this->input->post('categorydelete');

		$manufacturerview = $this->input->post('manufacturerview');
		$manufactureradd = $this->input->post('manufactureradd');
		$manufactureredit = $this->input->post('manufactureredit');
		$manufacturerdelete = $this->input->post('manufacturerdelete');

		$reportstock = $this->input->post('reportstock');
		$reportfinance = $this->input->post('reportfinance');
		$reportquantity = $this->input->post('reportquantity');
		$reportsales = $this->input->post('reportsales');
		$reportdrawer = $this->input->post('reportdrawer');

		$databaseview = $this->input->post('databaseview');
		$databasebackup = $this->input->post('databasebackup');
		$databaserestore = $this->input->post('databaserestore');
		$databaseremove = $this->input->post('databaseremove');
		$miscellanousemail = $this->input->post('miscellanousemail');

		$changedata = array(
				'reparation_view'=>$repairview,
 				'reparation_add'=>$repairadd,
 				'reparation_edit'=>$repairedit,
 				'reparation_delete'=>$repairdelete,

 				'clients_view'=>$clientview,
 				'clients_add'=>$clientadd,
 				'clients_edit'=>$clientedit,
 				'clients_delete'=>$clientdelete, 

 				'stock_view'=>$stockview,
 				'stock_add'=>$stockadd,
 				'stock_edit'=>$stockedit,
 				'stock_delete'=>$stockdelete, 

 				'suppliers_view'=>$supplierview,
 				'suppliers_add'=>$supplieradd,
 				'suppliers_edit'=>$supplieredit,
 				'suppliers_delete'=>$supplierdelete,

 				'models_view'=>$modelview,
 				'models_add'=>$modeladd,
 				'models_edit'=>$modeledit,
 				'models_delete'=>$modeldelete,

 				'purchases_view'=>$purchaseview,
 				'purchases_add'=>$purchaseadd,
 				'purchases_edit'=>$purchaseedit,
 				'purchases_delete'=>$purchasedelete,

 				'users_view'=>$userview,
 				'users_add'=>$useradd,
 				'users_edit'=>$useredit,
 				'users_delete'=>$userdelete,

 				'group_view'=>$groupview,
 				'group_add'=>$groupadd,
 				'group_edit'=>$groupedit,
 				'group_delete'=>$groupdelete,

 				'tax_view'=>$taxview,
 				'tax_add'=>$taxadd,
 				'tax_edit'=>$taxedit,
 				'tax_delete'=>$taxdelete,

 				'categories_view'=>$categoryview,
 				'categories_add'=>$categoryadd,
 				'categories_edit'=>$categoryedit,
 				'categories_delete'=>$categorydelete,

 				'manufacturers_view'=>$manufacturerview,
 				'manufacturers_add'=>$manufactureradd,
 				'manufacturers_edit'=>$manufactureredit,
 				'manufacturers_delete'=>$manufacturerdelete,

 				'reports_stock'=>$reportstock,
 				'reports_finance'=>$reportfinance,
 				'reports_quantity'=>$reportquantity,
 				'reports_sales'=>$reportsales, 
 				'reports_drawer'=>$reportdrawer,

 				'database_view'=>$databaseview,
 				'database_backup'=>$databasebackup,
 				'database_restore'=>$databaserestore, 
 				'database_remove'=>$databaseremove,

 				'miscellanous_email'=>$miscellanousemail
				);
		// var_dump($changedata); exit();
		$this->db->where('groupId', $groupId);
		$this->db->where('u_branch', $branch);
		$this->db->update('tbl_group_permission', $changedata);


		$logactivity = 'Edit';
        $moduleclient = 'tbl_group_permission';
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

		redirect(base_url("admin/usergroup"));
	}
	function backup(){
		$this->load->helper('url');
	    $this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');

		//load database
		$this->load->dbutil();
		$branch = $this->session->userdata('branch');
		$id = 1;
		$currentdate = date('Y-m-d');
		$this->other_db = $this->load->database();
		$this->myutil = $this->load->dbutil($this->other_db, TRUE);
			$prefs = array(
					'format'      => 'zip',  
					'filename' => 'backup-on-'.date('Y-m-d') . '.sql'
				);
			$backup = $this->myutil->backup($prefs);
			$db_name = 'backup-on-' . date('Y-m-d') . '.zip' ;
			$pathtorestore = 'backup-on-' . date('Y-m-d') . '.sql' ;
			$save = './database/' . $db_name;

			$this->load->helper('file');
			write_file($save, $backup);


			// var_dump($backup); exit();

			// $prefs = array(     
			//     'format'      => 'zip',             
			//     'filename'    => 'my_db_backup.sql'
			//     );


			// $backup =& $this->dbutil->backup($prefs); 

			// $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
			// $save = 'database/'.$db_name;

			// $this->load->helper('file');
			// write_file($save, $backup); 
		$filename = $db_name;
		$zip = new ZipArchive;
        $res = $zip->open("./database/".$filename);
        if ($res === TRUE) {

               // Unzip path
               $extractpath = "./database/";

               // Extract file
               $zip->extractTo($extractpath);
               $zip->close();
        }

		$datain = array(
						'file_name' => $pathtorestore,
						'version' => $currentdate,
						'u_branch' => $branch
					);
		$this->db->where('id', $id);
		$this->db->update('tbl_database', $datain);

		$logactivity = 'Backup';
        $moduleclient = 'tbl_database';
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

		redirect(base_url("admin/viewdatabase"));
	}
	// function restoreDB(){
	// 	// $this->load->helper('url');
	//  //    $this->load->helper('file');
	// 	// $this->load->helper('download');
	// 	// $this->load->library('zip');

	// 	// //load database
	// 	// $this->load->dbutil();
	// 	// $branch = $this->session->userdata('branch');
	// 	// $id = 1;
	// 	// $currentdate = date('Y-m-d');
	// 	// $this->other_db = $this->load->database();
	// 	// $this->myutil = $this->load->dbutil($this->other_db, TRUE);
	// 	// 	$prefs = array(
	// 	// 			'filename' => date('Y-m-d') . '.sql'
	// 	// 		);
	// 	// 	$backup = $this->myutil->backup($prefs);
	// 	// 	$db_name = 'backup-on-' . date('Y-m-d') . '.sql' ;
	// 	// 	$save = './database/' . $db_name;

	// 	// 	$this->load->helper('file');
	// 	// 	write_file($save, $backup);

	// 	// $datain = array(
	// 	// 				'file_name' => $save,
	// 	// 				'version' => $currentdate,
	// 	// 				'u_branch' => $branch
	// 	// 			);
	// 	// $this->db->where('id', $id);
	// 	// $this->db->update('tbl_database', $datain);

	// 	// redirect(base_url("admin/viewdatabase"));
		

	// 	$this->db->select('*');
	// 	$this->db->from('tbl_database');
	// 	$query11 = $this->db->get()->result();
	// 	//var_dump($query11); exit();
	// 	foreach ($query11 as $pathrow) {
	// 		$filename = $pathrow->file_name;
	// 	}

	// 	#var_dump($filename); exit();

	// 	// $sql = 'DROP DATABASE profix';
	// 	// $query = $this->db->query($sql);
	// 	// if ($query) {
	// 	//     echo "Database profix was successfully dropped\n";
	// 	// } else {
	// 	//     echo "Error dropping database";
	// 	// }
		
	// 	// $sql = 'CREATE DATABASE profix';
	// 	// $query = $this->db->query($sql);
	// 	// if ($query) {
	// 	//     echo "Database profix was successfully created\n";
	// 	// } else {
	// 	//     echo "Error creating database";
	// 	// }
	// 	// $path = 'database/';
	// 	// $sql_filename = 'backup-on-2019-12-30.sql';
		


	// 	$path = './database/';
	// 	#var_dump($path);
	// 	#var_dump($filename);
	// 	$sql_contents = file_get_contents($path.$filename);
	// 	$sql_contents = explode(";", $sql_contents);


	// 	#$sql_contents = 'CREATE DATABASE profix'.$sql_contents;

	// 	$x = 0;
	// 	foreach($sql_contents as $query)
	// 	{
	// 		#var_dump($sql_contents); 
	// 		#exit();
			
	// 		if($x==0){
	// 			$sql = 'CREATE DATABASE profix12';
	// 			$this->db->query($sql);
	// 		}


	// 		$pos = strpos($query,'ci_sessions');
	// 		#var_dump($pos);
	// 		if($pos == false)
	// 		{
	// 			$result = $this->db->query($query);
	// 		}
	// 		else 
	// 		{
	// 			continue;
	// 		}
	// 		$x++;
	// 	}
	// 	echo "Successfully restore";
	// }




	function changeEmailstatus(){
		$id = $this->input->post('id');
		$statusemail = 1;
		$datain = array(
						'status_email' => $statusemail
						);
		$this->db->where('id', $id);
		$this->db->update('tbl_repair_status', $datain);
	}
	function changeEmailstatus0(){
		$id = $this->input->post('id');
		$statusemail = 0;
		$datain = array(
						'status_email' => $statusemail
						);
		$this->db->where('id', $id);
		$this->db->update('tbl_repair_status', $datain);
	}
	function changeCompletedstatus(){
		$id = $this->input->post('id');
		$statuscompleted = 1;
		$datain = array(
						'status_completed' => $statuscompleted
						);
		$this->db->where('id', $id);
		$this->db->update('tbl_repair_status', $datain);
	}
	function changeCompletedstatus0(){
		$id = $this->input->post('id');
		$statuscompleted = 0;
		$datain = array(
						'status_completed' => $statuscompleted
						);
		$this->db->where('id', $id);
		$this->db->update('tbl_repair_status', $datain);
	}



}
