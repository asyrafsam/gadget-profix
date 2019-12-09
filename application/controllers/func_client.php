<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_client extends CI_Controller {


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('d_post');
		$this->load->model('d_get');
		$this->load->helper("URL", "DATE", "URI", "FORM","lookup_helper");
		$this->load->library('session','upload');
		// $this->load->library('upload');
		// $this->load->model('m_upload');
	}
	function add_client(){
		
		$ubranch = $this->input->post('ubranch');
		$c_name = $this->input->post('cname');
		$c_geolocate = $this->input->post('clocate');
		$c_city = $this->input->post('ccity');
		$c_telephone = $this->input->post('ctelephone');
		$c_vat = $this->input->post('cvat');
		$c_file = $this->input->post('cfile');
		$c_company = $this->input->post('ccompany');
		$c_address = $this->input->post('caddress');
		$c_postal = $this->input->post('cpostal');
		$c_email = $this->input->post('cemail');
		$c_ssn = $this->input->post('cssn');
		$c_comment = $this->input->post('ccomment');

		// var_dump($c_file); exit();

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['encrypt_name']           = TRUE;
        $config['remove_spaces']           = TRUE;

        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if ( ! $this->upload->do_upload('cfile'))
        {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error); exit();

                echo 'tak jadi';
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $fname = $this->upload->data('file_name');
                // $fname = base_url().'/uploads/'.$fname;

                $datain = array(
					'c_name' => $c_name,
					'c_geolocate' => $c_geolocate,
					'c_city' => $c_city,
					'c_telephone' => $c_telephone,
					'c_vat' => $c_vat,
					'c_file' => $fname,
					'c_company' => $c_company,
					'c_address' => $c_address,
					'c_postal' => $c_postal,
					'c_email' => $c_email,
					'c_ssn' => $c_ssn,
					'c_comment' => $c_comment,
					'u_branch' => $ubranch
					);
				$query = $this->d_post->addclient($datain,'tbl_client');

				redirect(base_url('admin/client'));
        }
    	
	}

	function edit_client($id){

    	$data = $this->d_get->show_client($id);
		echo json_encode($data);
    }
    function viewClient(){
    	$id = $this->input->post('id');
    	$this->db->from('tbl_client');
		$this->db->join('tbl_reparation', 'tbl_reparation.c_id = tbl_client.c_id');
		$this->db->where('tbl_client.c_id', $id);
		$query = $this->db->get()->result();

    	foreach ($query as $data) 
		{

			echo
					'<tr><td>'.$data->r_code.'</td><td>' .$data->r_imei. '</td><td>' .$data->r_defect. '</td><td>' .$data->r_model. '</td><td>' .$data->r_opened. '</td><td>' .$data->r_status. '</td><td>' .$data->r_created. '</td><td>' .$data->r_lastmodified. '</td><td>'  .$data->r_total.  '</td></tr>'
					;


		}
    }
    function viewClientJson(){
    	$id = $this->input->post('id');
    	$data = $this->d_get->getClientJson($id);
		echo json_encode($data);
    }
    function viewClientRepair(){
    	$id = $this->input->post('id');
    	$this->db->from('tbl_client');
		$this->db->join('tbl_reparation', 'tbl_reparation.c_id = tbl_client.c_id');
		$this->db->where('tbl_client.c_id', $id);
		$query = $this->db->get()->result();

		foreach ($query as $data) 
		{
			echo
					'<tr><td>'.$data->r_code.'</td><td>' .$data->r_imei. '</td><td>' .$data->r_defect. '</td><td>' .$data->r_model. '</td><td>' .$data->r_opened. '</td><td>' .$data->r_status. '</td><td>' .$data->r_created. '</td><td>' .$data->r_lastmodified. '</td><td>'  .$data->r_total.  '</td></tr>'
					;


		}
    }



	function updateClient(){
		$c_id = $this->input->post('cid-1');
		$c_name = $this->input->post('cname-1');
		$c_geolocate = $this->input->post('clocate-1');
		$c_city = $this->input->post('ccity-1');
		$c_telephone = $this->input->post('ctelephone-1');
		$c_vat = $this->input->post('cvat-1');
		$c_file = $this->input->post('cfile-1');
		$c_company = $this->input->post('ccompany-1');
		$c_address = $this->input->post('caddress-1');
		$c_postal = $this->input->post('cpostal-1');
		$c_email = $this->input->post('cemail-1');
		$c_ssn = $this->input->post('cssn-1');
		$c_comment = $this->input->post('ccomment-1');

		// var_dump($c_file); exit();

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['encrypt_name']           = TRUE;
        $config['remove_spaces']           = TRUE;

        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if ( ! $this->upload->do_upload('cfile-1'))
        {
                $datain = array(
					'c_name' => $c_name,
					'c_geolocate' => $c_geolocate,
					'c_city' => $c_city,
					'c_telephone' => $c_telephone,
					'c_vat' => $c_vat,
					'c_company' => $c_company,
					'c_address' => $c_address,
					'c_postal' => $c_postal,
					'c_email' => $c_email,
					'c_ssn' => $c_ssn,
					'c_comment' => $c_comment
				);
	            $where = array(
					'c_id' => $c_id
				);
				$this->d_post->updateClients($where,$datain,'tbl_client');

				redirect(base_url('admin/client'));
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $fname = $this->upload->data('file_name');
                // $fname = '/uploads/'.$fname;

                $datain = array(
					'c_name' => $c_name,
					'c_geolocate' => $c_geolocate,
					'c_city' => $c_city,
					'c_telephone' => $c_telephone,
					'c_vat' => $c_vat,
					'c_file' => $fname,
					'c_company' => $c_company,
					'c_address' => $c_address,
					'c_postal' => $c_postal,
					'c_email' => $c_email,
					'c_ssn' => $c_ssn,
					'c_comment' => $c_comment
					);
                $where = array(
					'c_id' => $c_id
				);
				$this->d_post->updateClients($where,$datain,'tbl_client');

				redirect(base_url('admin/client'));
			
        }
	}

	function deleteClient($id){
		$where = array('c_id' => $id);
		$this->d_post->deleteClient($where,'tbl_client');
		redirect(base_url('admin/client'));
	}

	function getDetailsClient(){
		$id = $this->input->post('id');
		$query = $this->d_get->getDetailsClient($id);

		if(empty($query)){
			echo 'Tiada Data Ditemui';
		} else {
			foreach ($query as $data) 
			{
			

			}
			echo json_encode($data);

		}
	}
	function storeClient(){
		$c_id = $this->input->post('c_id');
		$hold_value = $this->input->post('hold_value');

		$data = array(
						'c_id'=>$c_id,
						'hold_id'=>$hold_value
					 );

		$this->db->insert('tbl_print_client', $data);
	}

	function deletePrint()
	{
		$id = $this->input->post('id');
		$hold_value = $this->input->post('hold_value');

		$this->db->where('c_id',$id);
		$this->db->where('hold_id',$hold_value);

		$this->db->delete('tbl_print_client');
	}
			
}
