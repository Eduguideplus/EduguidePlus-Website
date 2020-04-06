<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dashboard extends CI_Controller 
{
	 
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
			$this->load->model('dash_board_model');
            $this->load->model('common');
			//START LOGIN CHECK++++++++++++++++++++++++++++++++++++++
			//$this->session_check_and_session_data->session_check();
			//END LOGIN CHECK++++++++++++++++++++++++++++++++++++++
			if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

	}
	
	public function index()
	{

		// $data['category']=$this->admin_model->selectAll('tbl_category');
		
		// $data['plans']=$this->admin_model->selectAll('tbl_subscription_plan');

		/*$user_id= $this->session->userdata('session_user_id');*/
		$user_id= get_cookie('session_user_id');

		//echo $user_id; exit;
		
		 $data['group']=$this->common->select($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
         $data['exam_type']=$this->common->select($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id !='=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	
	   $data['section']=$this->admin_model->selectAll('tbl_question_section');

	    $data['question']=$this->admin_model->selectAll('tbl_questions');


	    $data['plans']= $this->common->select($table_name = 'tbl_plan', $field = array(), $where = array('test_type_id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['user'] = $this->common->select($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');

$data['test'] = $this->common->select($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['institute'] = $this->common->select($table_name = 'tbl_institute', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['service'] = $this->common->select($table_name = 'tbl_our_service', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	    // $data['question']=$this->admin_model->selectAll('tbl_questions');



/*$user_id= $this->session->userdata('session_user_id');*/

  $data['user_list']=$this->common->select($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$user_type_id=$data['user_list'][0]->user_type_id;

if($user_type_id==6){

	$data['question']=$this->common->select($table_name = 'tbl_questions', $field = array(), $where = array('created_by'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	}
	else
	{
		$data['question']=$this->admin_model->selectAll('tbl_questions');
	}

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('dashboard_view',$data);
		$this->load->view('template/adminfooter_category');
	
	}
	
		
}
?>