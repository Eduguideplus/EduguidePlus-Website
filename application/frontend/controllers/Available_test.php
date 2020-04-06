<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Available_test extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}

	public function index()
	{

		
	     

	    $this->load->view('common/header');
		$this->load->view('available_test_view');
		
		$this->load->view('common/footer');

	}

}
?>