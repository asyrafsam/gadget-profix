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
}


