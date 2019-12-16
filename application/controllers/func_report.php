<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class func_report extends CI_Controller {


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

		
	function viewgraph()
	{
		$month = $this->input->post('month');
		$time=strtotime($month);
		$m=date("m",$time);
		$y=date("Y",$time);

		// echo $m; exit();
        // $data['productdataa'] = $this->d_get->get_productposjoin($month)->result();

        $data = $this->d_get->get_financedataselected($m)->result();
      	$x['data'] = json_encode($data);

		return $this->load->view('admin/body/chart-finance-1-selected.php', $x);
	}
	function viewgraphtotal(){
		$month = $this->input->post('month');
		$time=strtotime($month);
		$m=date("m",$time);
		$y=date("Y",$time);

		$this->db->select('pay_date, SUM(pay_amount) as totalpaid');
		$this->db->where('MONTH(pay_date)', $m);
		$this->db->where('YEAR(pay_date)', date('Y'));
		$query =  $this->db->get('tbl_payment')->result();
		foreach ($query as $data) 
		{
			// echo $data->unit_price;
			echo $data->totalpaid;
		}
	}
	function viewsalesselected(){
		$start = $this->input->post('start');
		$end = $this->input->post('end');

		$this->db->select('*, SUM(tbl_holdproduct.pro_tax) as totaltax');
    	$this->db->from('tbl_holdproduct');
    	$this->db->join('tbl_posdetails', 'tbl_posdetails.hold_id = tbl_holdproduct.hold_id');
    	$this->db->join('tbl_client', 'tbl_client.c_id = tbl_posdetails.c_id');
    	$this->db->where('tbl_posdetails.date_pos BETWEEN "'.$start.'" and "'.$end.'" ');
    	$this->db->group_by('tbl_holdproduct.hold_id');
    	$query['salesselect'] = $this->db->get()->result();
    	// echo $this->db->last_query(); exit();
    	return $this->load->view('admin/body/viewsalesselected-1',$query);
  //   	foreach ($query as $p) 
		// {
		// 	$balance = $p->total - $p->payment;
		// 	echo '<tr style="background-color: #e3e6f0;">
	 //                  <td><input type="checkbox" name=""></td>
	 //                  <td>'.$p->hold_id.'</td>
	 //                  <td>'.$p->date_pos.'</td>
	 //                  <td>'.$p->c_name.'</td>
	 //                  <td>'.$p->pro_name.'</td>
	 //                  <td>'.$p->total.'</td>
	 //                  <td>'.$p->totaltax.'</td>
	 //                  <td>'.$p->payment.'</td>
	 //                  <td>'.$balance.'</td>
	                  
	 //                  <td><button class="btn btn-success" style="height: 30px;font-size: 12px;">Paid</button></td>
	                  
	 //                  <td>
	 //                  </td>
  //               	</tr>
  //               	'
  //               ;
			
		// }
	}
	function getPaymentSales($id){
		// $data = $this->d_get->show_payment($id);
		// echo json_encode($data);
		// $id = $this->input->post('id');
		// $this->db->where('r_rcode', $id);
		$query = $this->d_get->show_paymentsales($id,'tbl_posdetails')->result();
		$i = 1;

		foreach ($query as $data) 
		{
			//echo $data->unit_price;


			echo 
					'<tr>
						<td>'.$data->date_pos.'</td>
						<td>'.$data->payment.'</td>
						<td>'.$data->payment_type.'</td>
						<td>
                            
                        </td>
					</tr>'
				     ;

		}
	}	
}


