<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_career extends CI_Controller {
	
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
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$data['career_list']=$this->admin_model->selectAll('tbl_career');

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('career/career_table',$data);
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
    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	
    	$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('career/career_add');
		$this->load->view('template/adminfooter_category');
    }
    function insert()
    {
    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	$job_title=$this->input->post('job_title');
       	$job_location=$this->input->post('job_location');
       	$job_qualification=$this->input->post('job_qualification');
       	$job_min_exp=$this->input->post('min_exp');
       	$job_max_exp=$this->input->post('max_exp');
       	$job_yr_mn_exp=$this->input->post('exp_yr_mn');
       	$job_experience = $job_min_exp ."-".$job_max_exp." ".$job_yr_mn_exp;
       	//echo $job_experience; exit;
       	$job_skill=$this->input->post('job_skill');

       	$current_date = date('Y-m-d H:i:s');
       
    	$data = array(
    					
    					'job_title'=>$job_title,
    					'job_location'=>$job_location,
    					'job_qualification'=>$job_qualification,
    					'job_experience'=>$job_experience,
    					'job_skill'=>$job_skill,
    					'created_by'=>$user_id,
    					'created_on'=>$current_date,

    				 );
    	//print_r($data); exit;
    	$this->db->insert('tbl_career',$data);
    	$this->session->set_flashdata('succ_msg','added successfully');
    	redirect('index.php/manage_career/list_view/','refresh');


    }

function delete()
{
	$id=$this->uri->segment(3);
	
	$this->db->where('id',$id);
	$this->db->delete('tbl_career');			
	$this->session->set_flashdata('succ_msg','deleted successfully');
			
			
	redirect('index.php/manage_career/list_view/','refresh');


}
function edit()

{
		if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
		$edit_id=$this->uri->segment(3);
		$data['career_list'] = $this->admin_model->selectOne('tbl_career','id',$edit_id);
		$exp = $data['career_list'][0]->job_experience;
		$test = explode('-',$exp);
		$data['min_exp'] = @$test[0];
		$test1 = explode(' ',@$test[1]);
		$data['max_exp'] = @$test1[0];
		$data['mn_yr_exp'] = @$test1[1];
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('career/career_edit',$data);
		$this->load->view('template/adminfooter_category');
}
function update()
{

	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$edit_id=$this->input->post('edit_id');

    	$job_title=$this->input->post('job_title');
       	$job_location=$this->input->post('job_location');
       	$job_qualification=$this->input->post('job_qualification');
       	$job_min_exp=$this->input->post('min_exp');
       	$job_max_exp=$this->input->post('max_exp');
       	$job_yr_mn_exp=$this->input->post('exp_yr_mn');
       	$job_experience = $job_min_exp ."-".$job_max_exp." ".$job_yr_mn_exp;
       	//echo $job_experience; exit;
       	$job_skill=$this->input->post('job_skill');

       	$current_date = date('Y-m-d H:i:s');
       
    	$data = array(
    					
    					'job_title'=>$job_title,
    					'job_location'=>$job_location,
    					'job_qualification'=>$job_qualification,
    					'job_experience'=>$job_experience,
    					'job_skill'=>$job_skill,
    					'edited_by'=>$user_id,
    					'edited_on'=>$current_date,

    				 );
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->where('id',$edit_id);
    	$this->db->update('tbl_career',$data);
    	$this->session->set_flashdata('succ_msg','updated successfully');
    	redirect('index.php/manage_career/list_view/','refresh');

}

function change_to_active()
{
	
		$test_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($test_ids);$i++)
		{
			$id=$test_ids[$i];
			$this->db->where('id',$id);

			if($this->db->update('tbl_career',$data))
			{
				$result=1;
			}
			
		}
			
		echo json_encode(array('changedone'=>$result));
		


}


		
		
		
}




