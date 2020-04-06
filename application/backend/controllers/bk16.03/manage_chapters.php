<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_chapters extends CI_Controller {
	
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
	$data['chapters']=$this->admin_model->selectAll('tbl_chapters');
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('chapters/chapters_table_view',$data);
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

    $data['parent_exam_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');
//print_r($data['type']);exit;
    //$data['subjects']=$this->admin_model->selectone('tbl_question_section','section_status','active');
    $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('chapters/chapters_add_view',$data);
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

      $chap_name=$this->input->post('chap_name');
    	
    	$sub_name=$this->input->post('sub_name');
      $chap_descpn=$this->input->post('chap_descpn');
    	
      $current_date=date('Y-m-d H:i:s');
    	
    	
    
    	
    	for($i=0;$i<count($chap_name);$i++)
      {

        if($chap_descpn[$i]!='')
        {
            $data = array(

            
            'sub_id'=>$sub_name,
            'chap_name'=>$chap_name[$i],
            'chap_descpn'=>$chap_descpn[$i],
            'created_by'=>$user_id,
            'created_on'=>$current_date,
            
            );
          
        }
        else
        {
            $data = array(

            
            'sub_id'=>$sub_name,
            'chap_name'=>$chap_name[$i],
            'created_by'=>$user_id,
            'created_on'=>$current_date,
            
            );
        }
      
      //echo '<pre>'; print_r($data); exit;
      $this->db->insert('tbl_chapters',$data);
      }
    	
    		
    	$this->session->set_flashdata('succ_msg','One chapters added successfully');
    	redirect('index.php/manage_chapters/view/','refresh');


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

    $chap_id =$this->uri->segment(3);

    $data['chapters']=$this->admin_model->selectone('tbl_chapters','chap_id',$chap_id);

    $edit_chapter_subject_details= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$data['chapters'][0]->sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $exam_id=@$edit_chapter_subject_details[0]->exam_id;

     $exam_dtls=$this->admin_model->selectone('tbl_exam_type','id',$exam_id);

      $group_id=@$exam_dtls[0]->exam_type_id;


     $data['subjects']=$this->admin_model->selectone('tbl_question_section','exam_id',$exam_id);

     $data['examList']= $this->admin_model->selectone('tbl_exam_type','exam_type_id',$group_id);

    $data['parent_exam_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');

    $data['edit_exam_id']=$exam_id;
    $data['edit_group_id']=$group_id;
   
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('chapters/chapters_edit_view',$data);
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

     $chapter=$this->admin_model->selectone('tbl_chapters','chap_id',$edit_id);
      $chap_name=$this->input->post('chap_name');
      $sub_name=$this->input->post('sub_name');
      
      
      // $sub_name=$chapter[0]->sub_id;
      $chap_descpn=$this->input->post('chap_descpn');
      
      $current_date=date('Y-m-d H:i:s');
        $data = array(

            
              
            'sub_id'=>$sub_name,
            'chap_name'=>$chap_name,
            'chap_descpn'=>$chap_descpn,
            'modified_on'=>$current_date,
            'modified_by'=>$user_id
            
            );
      /*echo '<pre>'; print_r($data); exit;*/
      $this->db->where('chap_id',$edit_id);
      $this->db->update('tbl_chapters',$data);
      $this->session->set_flashdata('succ_msg','One Chapters updated successfully.');
      redirect('index.php/manage_chapters/view/','refresh');

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

public function delete()
{
	$id=$this->uri->segment(3);

	$this->db->where('chap_id',$id);
  $this->db->delete('tbl_chapters');

  $this->session->flashdata('succ_msg','Chapter successfully deleted');

	redirect('index.php/manage_chapters/view/','refresh');

	
}


function get_subject()
{
  $category_id=$this->input->post('category_id');
        $data=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('exam_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}





		
		
		
}




