public function print_reparation_invoice($id){
		$this->load->library('ciqrcode');
		if($this->session->userdata('status') == "login"){
			// $getCode = $this->input->post('reparationID');
			$config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = './uploads/'; //string, the default is application/cache/
	        $config['errorlog']     = './uploads/'; //string, the default is application/logs/
	        $config['imagedir']     = './uploads/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '1024'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name='Test'.'.png'; //buat name dari qr code sesuai dengan nim
	 
	        $params['data'] = 'Test'; //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);
		}else{
			$this->session->sess_destroy();
			redirect(base_url("main/index"));
		}
	}