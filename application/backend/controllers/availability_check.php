<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class availability_check extends CI_Controller 
{	
	 public function __construct()
     {
             parent::__construct();
			$this->load->database();
			$this->load->library('session');
			 
			$this->load->helper('url');
			$this->load->model('availability_check_model');
			
	}
	
	public function brand_name_availability_check()
	{
		
		
	}
}
?>