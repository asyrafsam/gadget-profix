<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// function lookup_r_imei()
// {
	// $ci = & get_instance();
	// $ci->load->model('d_get','lookup');
	// $ci->lookup->lookup_r_imei();
// }

if ( ! function_exists('lookup_r_imei'))
{
    function lookup_r_imei($var = '')
    {
		$ci = & get_instance();
		$ci->load->model('d_get','lookup');
		$ci->lookup->lookup_r_imei();
    }   
}
if ( ! function_exists('lookup_r_model'))
{
    function lookup_r_model($var = '')
    {
		$ci = & get_instance();
		$ci->load->model('d_get','lookup');
		$ci->lookup->lookup_r_model();
    }   
}
if ( ! function_exists('lookup_r_item'))
{
    function lookup_r_item($var = '')
    {
		$ci = & get_instance();
		$ci->load->model('d_get','lookup');
		$ci->lookup->lookup_r_item();
    }   
}
if ( ! function_exists('lookup_r_defect'))
{
    function lookup_r_defect($var = '')
    {
		$ci = & get_instance();
		$ci->load->model('d_get','lookup');
		$ci->lookup->lookup_r_defect();
    }   
}
if ( ! function_exists('lookup_p_supplier'))
{
    function lookup_p_supplier($var = '')
    {
		$ci = & get_instance();
		$ci->load->model('d_get','lookup');
		$ci->lookup->lookup_p_supplier();
    }   
}
if ( ! function_exists('lookup_reparation_status'))
{
    function lookup_reparation_status($var = '')
    {
		$ci = & get_instance();
		$ci->load->model('d_get','lookup');
		$ci->lookup->lookup_reparation_status();
    }   
}
if ( ! function_exists('lookup_r_client'))
{
    function lookup_r_client($var = '')
    {
		$ci = & get_instance();
		$ci->load->model('d_get','lookup');
		$ci->lookup->lookup_r_client();
    }   
}
if ( ! function_exists('lookup_rr_client'))
{
    function lookup_rr_client($var = '')
    {
		$ci = & get_instance();
		$ci->load->model('d_get','lookup');
		$ci->lookup->lookup_rr_client();
    }   
}
if ( ! function_exists('lookup_p_category'))
{
    function lookup_p_category($var = '')
    {
		$ci = & get_instance();
		$ci->load->model('d_get','lookup');
		$ci->lookup->lookup_p_category();
    }   
}

?>