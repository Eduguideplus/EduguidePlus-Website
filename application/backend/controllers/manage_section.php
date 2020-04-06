<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_section extends CI_Controller {
	
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
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$data['section']=$this->admin_model->selectAll('tbl_question_section');
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('section/section_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
}



    public function add()
    {
    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	
$data['parent_exam_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');
//print_r($data['type']);exit;
    $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('section/section_add_view',$data);
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
    	
    	$section_name=$this->input->post('section_name');
      $exam_name=$this->input->post('exam_name');
    	
      $current_date=date('Y-m-d H:i:s');
    	
    	
    
    	
    	for($i=0;$i<count($section_name);$i++)
      {
        if($section_name[$i]!='')
        {
            $data = array(

            'exam_id'=>$exam_name,
            'section_name'=>$section_name[$i],
            'created_by'=>$user_id,
            'created_on'=>$current_date,
            
            );
      
      //echo '<pre>'; print_r($data); exit;
            $this->db->insert('tbl_question_section',$data);
        }

          

      }
    	
    		
    	$this->session->set_flashdata('succ_msg','One Subject added successfully');
    	redirect('index.php/manage_section/view/','refresh');


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

    $section_id =$this->uri->segment(3);
    

    $data['section']=$this->admin_model->selectone('tbl_question_section','id',$section_id);

   // print_r( $data['section']);exit;

    $exam_id=@$data['section'][0]->exam_id;

    $exam_dtls=$this->admin_model->selectone('tbl_exam_type','id',$exam_id);

    $group_id=@$exam_dtls[0]->exam_type_id;


    $data['grp_id']= $group_id;


    $data['exam_list']=$this->admin_model->selectone('tbl_exam_type','exam_type_id',$group_id);

    $data['parent_exam_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('section/section_edit_view',$data);
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

      $exam_name=$this->input->post('exam_name');

    
        $section=$this->input->post('section_name');
        $current_date=date('Y-m-d H:i:s');
        $data = array(

            'exam_id'=>$exam_name,
            'section_name'=>$section,
            'modified_by'=>$user_id,
            'modified_on'=>$current_date,
            
            );
      //echo '<pre>'; print_r($data); exit;
      $this->db->where('id',$edit_id);
      $this->db->update('tbl_question_section',$data);
      $this->session->set_flashdata('succ_msg','One Subject updated successfully.');
      redirect('index.php/manage_section/view/','refresh');

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

	$sub = $this->admin_model->selectOne('tbl_question_section','id',$id);

	if(count($sub)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_question_section');
				
				$this->session->set_flashdata('succ_msg','One subject deleted successfully.');
			
			}
			redirect('index.php/manage_section/view/','refresh');

	
}


function get_exam()
{
  $category_id=$this->input->post('category_id');
        $data=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}





		
		
		
}




