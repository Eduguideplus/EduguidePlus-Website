<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subadmin_question_price extends CI_Controller {
	
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
  $this->load->library('excel');
  $this->load->model('set_model');
  $this->load->helper('download');
  $this->load->helper('url');

		
}



public function index()
{
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	

  $data['question_list']=$this->common_model->common($table_name = 'tbl_subadmin_question_price', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('subadmin_question_price_id'=>'DESC'), $start = '', $end = '');

  
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('subadmin_price/subadmin_price_table',$data);
	$this->load->view('template/adminfooter_category');
	
	
}

function add()
{
	// echo 'okk';


      if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }
     $data['type']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o','status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 
     //$data['section']=$this->admin_model->selectAll('tbl_question_section');
     $data['section']=$this->admin_model->selectOne('tbl_question_section','section_status','active'); 
     $data['passage']=$this->admin_model->selectAll('tbl_passage');

     $data['test_type']=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_status'=>'active','test_id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('subadmin_price/subadmin_price_add',$data);
    $this->load->view('template/adminfooter_category');
}

function get_exam()
    {
        $type_id=$this->input->post('type_id');
        $data=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>$type_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
    }

function get_subject()
{
  $category_id=$this->input->post('category_id');
        $data=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('exam_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}


function check_question_type()
    {
        $type_id=$this->input->post('type_id');
        $exm_id=$this->input->post('exm_id');
        if($type_id==3)
        {
          $data['status']=1;
          @$data['passg']=$this->set_model->get_passage($exm_id,$type_id);


        }
        else
        {
          $data['status']=0;
           @$data['passg']=$this->set_model->get_passage($exm_id,$type_id);

        }

         @$data['chapters']=$this->admin_model->selectOne('tbl_chapters','sub_id',$type_id);
      
      

        echo json_encode(array('result'=>$data));

    }


    function question_price_insert()
    {
    	// echo "okkk";


    	if($this->session->userdata('session_user_id')!='')
        {
          $user_id= $this->session->userdata('session_user_id');
        }
        else{
          redirect('index.php/login','refresh');
        }

        $current_date=date('Y-m-d H:i:s');
        $exam_type=$this->input->post('exam_type');
        $exam_id=$this->input->post('exam_id');
        $question_type=$this->input->post('question_type');
        $chapter_name=$this->input->post('chapter_name');

        $price=$this->input->post('price');
       

          $data_array=array(

              'exam_group_name'=>$exam_type,
              'exam_name'=>$exam_id,
              'subject_name'=>$question_type,
             
              'question_price'=>$price,
              'created_on'=>$current_date, 
              'created_by'=>$user_id

            );

          $this->db->insert('tbl_subadmin_question_price',$data_array);

         $this->session->set_flashdata('succ_msg','Added successfully.');
    	redirect('index.php/Subadmin_question_price','refresh');
    }


function change_to_active()
{
	
		$q_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($q_ids);$i++)
		{
			$id=$q_ids[$i];
			$this->db->where('subadmin_question_price_id',$id);

			if($this->db->update('tbl_subadmin_question_price',$data))
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

	$this->db->where('subadmin_question_price_id',$id);
	$this->db->delete('tbl_subadmin_question_price');
	$this->session->set_flashdata('succ_msg','deleted successfully.');
	redirect('index.php/Subadmin_question_price','refresh');

	
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


     $data['type']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o','status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 
     //$data['section']=$this->admin_model->selectAll('tbl_question_section');
     $data['section']=$this->admin_model->selectOne('tbl_question_section','section_status','active'); 
     $data['passage']=$this->admin_model->selectAll('tbl_passage');

     $data['test_type']=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_status'=>'active','test_id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     $id=$this->uri->segment(3);

      $data['price_details']=$this->common_model->common($table_name ='tbl_subadmin_question_price', $field = array(), $where = array('subadmin_question_price_id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('subadmin_price/subadmin_price_edit',$data);
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


        $current_date=date('Y-m-d H:i:s');
        $exam_type=$this->input->post('exam_type');
        $exam_id=$this->input->post('exam_id');
        $question_type=$this->input->post('question_type');
        $chapter_name=$this->input->post('chapter_name');
        $subadmin_question_price_id=$this->input->post('subadmin_question_price_id');
        $price=$this->input->post('price');
       

          $data_array=array(

              'exam_group_name'=>$exam_type,
              'exam_name'=>$exam_id,
              'subject_name'=>$question_type,
             
              'question_price'=>$price,
              'edited_on'=>$current_date, 
              'edited_by'=>$user_id

            );
          $this->db->where('subadmin_question_price_id',$subadmin_question_price_id);
          $this->db->update('tbl_subadmin_question_price',$data_array);

         $this->session->set_flashdata('succ_msg','Updated successfully.');
    	redirect('index.php/Subadmin_question_price','refresh');
    }



}

?>