<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_set_test_question_pattern extends CI_Controller {
	
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




public function view()
{
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

$user_id= get_cookie('session_user_id');

  
  $data['set_pattern_details']=$this->common_model->common($table_name = 'tbl_test_set_pattern', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu');
		  $this->load->view('set_test_question_pattern/question_parttern_view',$data);
		  $this->load->view('template/adminfooter_category');
	
	
	
}

function add_set_test_parrtern()
{
	// echo "okk";

	$data['parent_exam_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');

	 $data['test_type']=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 $data['exam_test_type']=$this->common_model->common($table_name = 'tbl_m_test_type', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	      $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu');
		  $this->load->view('set_test_question_pattern/set_question_add',$data);
		  $this->load->view('template/adminfooter_category');
}

function get_exam()
{
  $category_id=$this->input->post('category_id');
        $data=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}

function insert()
{
	// echo 'okk';
	$user_id= get_cookie('session_user_id');
	$group_name=$this->input->post('group_name');
	$exam_name=$this->input->post('exam_name');
	$test=$this->input->post('test');
	$test_type=$this->input->post('test_type');
	$no_of_question=$this->input->post('no_of_question');
	$marks_of_question=$this->input->post('marks_of_question');
	$total_marks=$this->input->post('total_marks');
	$tim_marks=$this->input->post('tim_marks');
	$total_time=$this->input->post('total_time');
	$current_date=date('Y-m-d H:i:s');

	$data=array(

				'exam_type_id'=>$group_name,
				'exam_id'=>$exam_name,
				'test_type'=>$test,
				'test_select_name'=>$test_type,
				'no_of_question'=>$no_of_question,
				'no_of_marks'=>$marks_of_question,
				'total_marks'=>$total_marks,
				'time_question_second'=>$tim_marks,
				'total_time'=>$total_time,
				'create_date'=>$current_date,
				'crate_by'=>$user_id
			);

	$this->db->insert('tbl_test_set_pattern',$data);
	$this->session->set_flashdata('succ_msg','One Test Set added successfully');
    	redirect('index.php/manage_set_test_question_pattern/view/','refresh');

}

function delete()
{
	$pattern_id=$this->uri->segment(3);
	$this->db->where('pattern_id',$pattern_id);
	$this->db->delete('tbl_test_set_pattern');
	$this->session->set_flashdata('succ_msg','One Test Set Deleted successfully');
    redirect('index.php/manage_set_test_question_pattern/view/','refresh');
}

function edit()
{
	$pattern_id=$this->uri->segment(3);

	$data['parent_exam_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');

	 $data['test_type']=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 $data['exam_test_type']=$this->common_model->common($table_name = 'tbl_m_test_type', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$data['set_pattern_details']=$this->common_model->common($table_name = 'tbl_test_set_pattern', $field = array(), $where = array('pattern_id'=>$pattern_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu');
		  $this->load->view('set_test_question_pattern/set_question_edit',$data);
		  $this->load->view('template/adminfooter_category');
}

function update()
{
	$user_id= get_cookie('session_user_id');
	
	$no_of_question=$this->input->post('no_of_question');
	$marks_of_question=$this->input->post('marks_of_question');
	$total_marks=$this->input->post('total_marks');
	$tim_marks=$this->input->post('tim_marks');
	$total_time=$this->input->post('total_time');
	$current_date=date('Y-m-d H:i:s');
	$pattern_id= $this->input->post('pattern_id');

	$data=array(

				
				'no_of_question'=>$no_of_question,
				'no_of_marks'=>$marks_of_question,
				'total_marks'=>$total_marks,
				'time_question_second'=>$tim_marks,
				'total_time'=>$total_time,
				'modify_date'=>$current_date,
				'modify_by'=>$user_id
			);

	$this->db->where('pattern_id',$pattern_id);
	$this->db->update('tbl_test_set_pattern',$data);

	$this->session->set_flashdata('succ_msg','One Test Set Updated successfully');
    redirect('index.php/manage_set_test_question_pattern/view/','refresh');


}







}

?>