<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_setting extends CI_Controller {


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
		redirect(base_url('admin/usergroup'));
	}
	function getgroup(){
		$id = $this->input->post('id');

		$query = $this->d_get->getGroup($id);

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

		$this->d_post->updateGroup($where,$datain,'tbl_user_group');
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

		$content = '<button class="btn" style="background-color:'.$statusbgcolor.';color: '.$statustextcolor.';font-weight: bold;">'.$statusname.'</button>';
		$query = array(
					'statusName'=>$content,
					'statusBGColor'=>$statusbgcolor,
					'statusTextColor'=>$statustextcolor,
					'u_branch'=>$ubranch
				);
		$this->db->insert('tbl_repair_status', $query);

		redirect(base_url("admin/repairstatus"));
	}
	function getstatus(){
		$id = $this->input->post('id');

		$query = $this->d_get->getStatus($id);

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

		$this->d_post->updateGroup($where,$datain,'tbl_repair_status');
		redirect(base_url("admin/repairstatus"));
	}
	function deletestatus($id){
		$this->db->where('id', $id);
		$this->db->delete('tbl_repair_status');
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
		$query = $this->d_get->getPermission($name);

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

		redirect(base_url("admin/usergroup"));
	}
	function backup(){
		$this->load->helper('url');
	    $this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');

		//load database
		$this->load->dbutil();

		//create format
		$db_format=array('format'=>'zip','filename'=>'backup.sql');

		$backup=& $this->dbutil->backup($db_format);

		// file name

		$dbname='backup-on-'.date('d-m-y H:i').'.zip';
		$save='assets/db_backup/'.$dbname;
		$save='./database/'.$dbname;

		// write file

		write_file($save,$backup);

		// and force download
		force_download($dbname,$backup);
	}

}
