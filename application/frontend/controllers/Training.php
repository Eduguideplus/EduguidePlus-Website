<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Training extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		$pageSlug= $this->uri->segment(1);
   $get_route_id= $this->common_model->common($table_name = 'app_routes', $field = array(), $where = array('slug'=>$pageSlug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   $pageId= @$get_route_id[0]->id;



     $data['pageContent'] = $this->common_model->common($table_name = 'tbl_page_manage', $field = array(), $where = array('routes_id'=>$pageId), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$oot_id= $this->common_model->common($table_name = 'tbl_class_room_training', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');
   

     $data['class_room'] = $this->common_model->common($table_name = 'tbl_class_room_training', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');

     $data['material']=$this->common_model->common($table_name = 'tbl_study_material', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '0', $end = '4');

      $data['partner_details'] = $this->common_model->common($table_name = 'tbl_partner', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    // echo "<pre>;" ; print_r($partner_details);exit;
      $data['slider'] = $this->common_model->common($table_name = 'tbl_training_slider', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


      $data['exam_name_list'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id !='=>'o','status'=>'Active','online_exam'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');





	
		$this->load->view('common/header');
		$this->load->view('training',$data);
		$this->load->view('common/footer');
	}

	public function analysis()
	{

		$exam_id= $this->uri->segment(2);
 		if($this->session->userdata('activeuser')!='')
		 {
			$user_id=$this->session->userdata('activeuser');
		}
		else
	 	{

	 	$this->session->set_flashdata('err_msg','Please login first');
	 	redirect($this->url->link(86));
	 	}
		$chap_id= 1;
		if($exam_id=='')
		{
			echo 'Something wnt wrong!';
		}
		else{

			
			
			$get_all_question= $this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$quest_list_array=array();

			foreach($get_all_question as $row)
			{
					$quest_id= $row->question_master_id;
					$selected_choice= $row->selected_choice;
					$correct_choice= $row->correct_choice;

					$questiondetails= $this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>$quest_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					$selected_choice_details= $this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('id'=>$selected_choice), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					$corrected_choice_details= $this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('id'=>$correct_choice), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					if($selected_choice==$correct_choice)
					{
						$answer="true";
					}
					else{
						$answer="false";
					}

					$rowarray['question_id']=$row->id;
					$rowarray['question']=@$questiondetails[0]->question;
					$rowarray['attempted_answer']=@$selected_choice_details[0]->choice;
					$rowarray['corrected_answer']=@$corrected_choice_details[0]->choice;
					$rowarray['answer']=@$answer;
					$rowarray['explanation']=@$questiondetails[0]->explanation;
					array_push($quest_list_array, $rowarray);

			}

			$data['quest_list_array']=$quest_list_array;
			$this->load->view('common/header_success');
			$this->load->view('analysis_view', $data);
			$this->load->view('common/footer');
		}
	}
	
	


	
}
?>