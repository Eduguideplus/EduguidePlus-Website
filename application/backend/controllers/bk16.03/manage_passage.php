<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_passage extends CI_Controller {
	
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
	$this->load->model('common/common_model');	
		
}

public function view()
{
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$data['passage']=$this->admin_model->selectAll('tbl_passage');
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('passage/passage_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
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
    	
//$data['type']=$this->admin_model->selectOne('tbl_exam_type','exam_type_id','o');
//print_r($data['type']);exit;
    $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('passage/passage_add_view');
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
    	
    	$passage_title=$this->input->post('passage_title');
      $passage_descpn=$this->input->post('passage_description');
    	
      $current_date=date('Y-m-d H:i:s');
    	
    	
    
    	
    	
    	
    		$data = array(

    				
    				'title'=>$passage_title,
            'description'=>$passage_descpn,
    				'created_by'=>$user_id,
    				'created_on'=>$current_date,
    				
    				);
    	
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->insert('tbl_passage',$data);
    	$this->session->set_flashdata('succ_msg','One passage added successfully');
    	redirect('index.php/manage_passage/view/','refresh');


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

    $passage_id =$this->uri->segment(3);
    

    $data['passage']=$this->admin_model->selectone('tbl_passage','id',$passage_id);

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('passage/passage_edit_view',$data);
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
      $edit_id=$this->input->post('edit_id');

    
       $passage_title=$this->input->post('passage_title');
      $passage_descpn=$this->input->post('passage_description');
      
      $current_date=date('Y-m-d H:i:s');
        $data = array(

            
            'title'=>$passage_title,
            'description'=>$passage_descpn,
            'modified_on'=>$current_date,
            'modified_by'=>$user_id
            
            );
      //echo '<pre>'; print_r($data); exit;
      $this->db->where('id',$edit_id);
      $this->db->update('tbl_passage',$data);
      $this->session->set_flashdata('succ_msg','One Passage updated successfully.');
      redirect('index.php/manage_passage/view/','refresh');

}


function change_to_active()
{
  
    $sec_ids=$this->input->post('id');
    $status=$this->input->post('status');
    $data=array('section_status'=>$status);


    for($i=0;$i<count($sec_ids);$i++)
    {
      $id=$sec_ids[$i];
      $this->db->where('id',$id);

      if($this->db->update('tbl_question_section',$data))
      {
        $result=1;
      }
      else
      {
        $result=0;
      }


      }
      
    echo json_encode(array('changedone'=>$result));
    


}

function delete()
{
	$id=$this->uri->segment(3);

	$sub = $this->admin_model->selectOne('tbl_passage','id',$id);

	if(count($sub)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_passage');
				
				$this->session->set_flashdata('succ_msg','One passage deleted successfully.');
			
			}
			redirect('index.php/manage_passage/view/','refresh');

	
}





		
		
		
}




