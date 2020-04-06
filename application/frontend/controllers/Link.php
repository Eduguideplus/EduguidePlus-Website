<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Link extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}

	public function index()
	{

		
	     

	    $this->load->view('common/header');
		$this->load->view('link_view');
		
		$this->load->view('common/footer');

	}

}
?>