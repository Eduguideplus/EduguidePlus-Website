<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_faq extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	 
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');			
	$this->load->library('image_lib');
	$this->load->model('admin_model');	
		
}

public function list_view()
{
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$data['faq_list']=$this->admin_model->selectAll('tbl_faq');

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_faq/faq_table',$data);
	$this->load->view('template/adminfooter_category');
	
	
}


 function create_slug($string)
  {     
        $replace = '-';         
        $string = strtolower($string);     
 
        //replace / and . with white space     
        $string = preg_replace("/[\/\.]/", " ", $string);     
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
 
        //remove multiple dashes or whitespaces     
        $string = preg_replace("/[\s-]+/", " ", $string);     
 
        //convert whitespaces and underscore to $replace     
        $string = preg_replace("/[\s_]/", $replace, $string);     
 
        //limit the slug size     
        $string = substr($string, 0, 100);     
 
        //slug is generated     
        return $string; 
    }
    function add()
    {
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	
    	$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_faq/faq_add');
		$this->load->view('template/adminfooter_category');
    }
    function insert()
    {
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	$question=$this->input->post('question');
       	$answer=$this->input->post('answer');
       	$current_date = date('Y-m-d H:i:s');
       
    	$data = array(
    					
    					'faq_question'=>$question,
    					'faq_answer'=>$answer,
    					'created_on'=>$current_date,
    					'created_by'=>$user_id,

    				 );
    	//print_r($data); exit;
    	$this->db->insert('tbl_faq',$data);
    	$this->session->set_flashdata('succ_msg','added successfully');
    	redirect('index.php/manage_faq/list_view/','refresh');


    }

function delete()
{
	$id=$this->uri->segment(3);
	
	$this->db->where('faq_id',$id);
	$this->db->delete('tbl_faq');			
	$this->session->set_flashdata('succ_msg','deleted successfully');
			
			
	redirect('index.php/manage_faq/list_view/','refresh');


}
function edit()

{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$faq_id=$this->uri->segment(3);
		$data['faq_data'] = $this->admin_model->selectOne('tbl_faq','faq_id',$faq_id);
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_faq/faq_edit',$data);
		$this->load->view('template/adminfooter_category');
}
function update()
{

	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$faq_id=$this->input->post('faq_id');
    	$question=$this->input->post('question');
       	$answer=$this->input->post('answer');
       	$current_date = date('Y-m-d H:i:s');
    	$data = array(
    					
    					'faq_question'=>$question,
    					'faq_answer'=>$answer,
    					'edited_on'=>$current_date,
    					'edited_by'=>$user_id,
    				 );
    	//print_r($data); exit;
    	$this->db->where('faq_id',$faq_id);
    	$this->db->update('tbl_faq',$data);
    	$this->session->set_flashdata('succ_msg','updated successfully');
    	redirect('index.php/manage_faq/list_view/','refresh');

}

function change_to_active()
{
	
		$test_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('faq_status'=>$status);


		for($i=0;$i<count($test_ids);$i++)
		{
			$id=$test_ids[$i];
			$this->db->where('faq_id',$id);

			if($this->db->update('tbl_faq',$data))
			{
				$result=1;
			}
			
		}
			
		echo json_encode(array('changedone'=>$result));
		


}


		
		
		
}




