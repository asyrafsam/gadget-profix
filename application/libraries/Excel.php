<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

require_once('assets/excel/xlsxwriter.class.php');

class Excel extends XLSXWriter { 
	
	function __construct() { 
		parent::__construct(); 
	}
	
}

/* End of file Excel.php */
/* Location: ./application/libraries/Excel.php */