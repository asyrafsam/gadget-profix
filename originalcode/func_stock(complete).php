<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_stock extends CI_Controller {


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
	function add_stock(){
		
		$ptype = $this->input->post('ptype');
	  	$pcode = $this->input->post('pcode');
	  	$pname = $this->input->post('pname');
	  	$pcategory = $this->input->post('pcategory');
	  	$psubcategory = $this->input->post('psubcategory');
	  	$pdetail = $this->input->post('pdetail');
	  	$pimage = $this->input->post('pimage');
	  	$punit = $this->input->post('punit');
	  	$pcost = $this->input->post('pcost');
	  	$pprice = $this->input->post('pprice');
	  	$psupplier = $this->input->post('psupplier');
	  	$pmodel = $this->input->post('pmodel');
	  	$palertquantity = $this->input->post('palertquantity');
	  	$pquantity = $this->input->post('pquantity');
	  	$ptax = $this->input->post('ptax');
	  	$ptaxmethod = $this->input->post('ptaxmethod');
	  	$ubranch = $this->input->post('ubranch');
	  	$holdid = $this->input->post('formid');


		// var_dump($c_file); exit();
		$this->db->select('*');
		$this->db->where('hold_id', $pcategory);
		$query1 =  $this->db->get('tbl_lookup_category')->result();

		// echo $this->db->last_query(); die;
		

		if($query1 == TRUE){
			foreach ($query1 as $data) 
				{
					$check1 = $data->cat_name;
					$check22 = $data->hold_id;
				}
			if($psubcategory != ''){
		  		$datainsubcategory = array(
		  					'subCat_name' => $psubcategory,
		  					'hold_id' => $check22
						);
		  		$query3 = $this->db->insert('tbl_lookup_subcategory', $datainsubcategory);

			}else{
				$this->db->select('*');
				$this->db->where('hold_id', $pcategory);
				$query11 =  $this->db->get('tbl_lookup_category')->result();
				foreach ($query11 as $data2) 
				{
					$check11 = $data2->cat_name;
				}
			}
		}else{
			$dataincategory = array(
						'cat_name' => $pcategory,
						'hold_id' => $holdid
					);

	  		$query2 = $this->db->insert('tbl_lookup_category', $dataincategory);

	  		if($psubcategory != '-'){
		  		$datainsubcategory = array(
		  					'subCat_name' => $psubcategory,
		  					'hold_id' => $holdid
						);
		  		$query3 = $this->db->insert('tbl_lookup_subcategory', $datainsubcategory);

			}else{
				$this->db->select('*');
				$this->db->where('hold_id', $pcategory);
				$query11 =  $this->db->get('tbl_lookup_category')->result();
				foreach ($query11 as $data2) 
				{
					$check11 = $data2->cat_name;
				}
			}
		}
						

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


        if ( ! $this->upload->do_upload('pimage'))
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
					'p_type' => $ptype,
					'p_code' => $pcode,
					'p_name' => $pname,
					// 'p_category' => $pcategory,
					// 'p_subCategory' => $psubcategory,
					'p_detail' => $pdetail,
					'p_image' => $fname,
					'p_unit' => $punit,
					'p_cost' => $pcost,
					'p_price' => $pprice,
					'p_supplier' => $psupplier,
					'p_model' => $pmodel,
					'p_alertQuantity' => $palertquantity,
					'p_quantity' => $pquantity,
					'p_tax' => $ptax,
					'p_taxMethod' => $ptaxmethod,
					'hold_id' => $holdid,
					'u_branch' => $ubranch
					);

				$query = $this->d_post->addproduct($datain,'tbl_product');

				redirect(base_url('admin/stock'));
			
        }
    	
	}

	function edit_client($id){

    	$data['clientt'] = $this->d_get->show_client($id);
    	$data['clientreparation'] = $this->d_get->show_clientReparation($id);
		echo json_encode($data);
    }

	function updateStock(){

		$upid = $this->input->post('upid');
		$uptype = $this->input->post('uptype');
		$upcode = $this->input->post('upcode');
		$upname = $this->input->post('upname');
		$upcategory = $this->input->post('upcategory');
		$upsubcategory = $this->input->post('upsubcategory');
		$updetail = $this->input->post('updetail');
		$upimage = $this->input->post('upimage');
		$upunit = $this->input->post('upunit');
		$upcost = $this->input->post('upcost');
		$upprice = $this->input->post('upprice');
		$upsupplier = $this->input->post('upsupplier');
		$upmodel = $this->input->post('upmodel');
		$upalertquantity = $this->input->post('upalertquantity');
		$upquantity = $this->input->post('upquantity');
		$uptax = $this->input->post('uptax');
		$uptaxmethod = $this->input->post('uptaxmethod');
		$holdid = $this->input->post('hold_id');

		// var_dump($c_file); exit();
		if($upcategory != ''){
		$this->db->select('*');
		$this->db->where('hold_id', $upcategory);
		$query1 =  $this->db->get('tbl_lookup_category')->result();

		// echo $this->db->last_query(); die;
		

			if($query1 == TRUE){
				foreach ($query1 as $data) 
					{
						$check1 = $data->cat_name;
						$check22 = $data->hold_id;
					}
				if($upsubcategory != ''){
			  		$datainsubcategory = array(
			  					'subCat_name' => $upsubcategory,
			  					'hold_id' => $check22
							);
			  		$query3 = $this->db->insert('tbl_lookup_subcategory', $datainsubcategory);

				}else{
					$this->db->select('*');
					$this->db->where('hold_id', $upcategory);
					$query11 =  $this->db->get('tbl_lookup_category')->result();
					foreach ($query11 as $data2) 
					{
						$check11 = $data2->cat_name;
					}
				}
			}else{
				$dataincategory = array(
							'cat_name' => $upcategory,
							'hold_id' => $holdid
						);

		  		$query2 = $this->db->insert('tbl_lookup_category', $dataincategory);

		  		if($upsubcategory != '-'){
			  		$datainsubcategory = array(
			  					'subCat_name' => $upsubcategory,
			  					'hold_id' => $holdid
							);
			  		$query3 = $this->db->insert('tbl_lookup_subcategory', $datainsubcategory);

				}else{
					$this->db->select('*');
					$this->db->where('hold_id', $upcategory);
					$query11 =  $this->db->get('tbl_lookup_category')->result();
					foreach ($query11 as $data2) 
					{
						$check11 = $data2->cat_name;
					}
				}
			}
		}

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


        if ( ! $this->upload->do_upload('upimage'))
        {
                $datain = array(
					'p_type' => $uptype,
					'p_code' => $upcode,
					'p_name' => $upname,
					// 'p_category' => $upcategory,
					// 'p_subCategory' => $upsubcategory,
					'p_detail' => $updetail,
					'p_unit' => $upunit,
					'p_cost' => $upcost,
					'p_price' => $upprice,
					'p_supplier' => $upsupplier,
					'p_model' => $upmodel,
					'p_alertQuantity' => $upalertquantity,
					'p_quantity' => $upquantity,
					'p_tax' => $uptax,
					'p_taxMethod' => $uptaxmethod
				);
	            $where = array(
					'p_id' => $upid
				);

				$this->d_post->updateProduct($where,$datain,'tbl_product');

				redirect(base_url('admin/stock'));
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $fname = $this->upload->data('file_name');
                // $fname = '/uploads/'.$fname;

                $datain = array(
					'p_type' => $uptype,
					'p_code' => $upcode,
					'p_name' => $upname,
					'p_category' => $upcategory,
					'p_subCategory' => $upsubcategory,
					'p_detail' => $updetail,
					'p_image' => $upimage,
					'p_unit' => $upunit,
					'p_cost' => $upcost,
					'p_price' => $upprice,
					'p_supplier' => $upsupplier,
					'p_model' => $upmodel,
					'p_alertQuantity' => $upalertquantity,
					'p_quantity' => $upquantity,
					'p_tax' => $uptax,
					'p_taxMethod' => $uptaxmethod
					);
                $where = array(
					'p_id' => $upid
				);
				$this->d_post->updateProduct($where,$datain,'tbl_product');

				redirect(base_url('admin/stock'));
			
        }
	}

	function updateProduct($id){
		$where = array('c_id' => $id);
		$this->d_post->deleteClient($where,'tbl_client');
		redirect(base_url('admin/stock'));
	}

	function deleteStock($id){
		$where = array('p_id' => $id);
		$this->d_post->deleteProduct($where,'tbl_product');
		redirect(base_url('admin/stock'));
	}

	function getCategoryDetails(){
		$id = $this->input->post('send');
		// $query = $this->d_get->getCategoryDetails($id);
		$this->db->where('hold_id', $id);
		$query =  $this->db->get('tbl_lookup_subcategory')->result();
		$empty = '-';
		if(empty($query)){
			echo '<option value="'.$empty.'">'.$empty.'</option>';
		} else {
			foreach ($query as $data) 
			{
				
				echo '<option value="'.$data->subCat_name.'"></option>';

			}
			

		}
	}		

	function view1()
	{
		$id = $this->input->post('id');

        $data['productdataa'] = $this->d_get->get_productposjoin($id)->result();
		return $this->load->view('admin/body/possubcategory-1',$data);
	}	
}


