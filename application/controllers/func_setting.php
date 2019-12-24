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
		$query = array(
					'groupName'=>$name,
					'groupDescription'=>$description
				);
		$this->db->insert('tbl_user_group',$query);
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

		$query = array(
					'statusName'=>$statusname,
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

}
