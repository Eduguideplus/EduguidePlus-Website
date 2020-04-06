<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Training extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function get_exam_list()
	{
		

		$exam_list=array();


      $exam_name_list= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id !='=>'o','status'=>'Active','online_exam'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      foreach($exam_name_list as $row)
      {

      			if($row->icon !='')
      			{
      				$icon= base_url().'assets/uploads/company_logo/'.$row->icon;
      			}
      			else{
      					$icon= base_url().'assets/uploads/no-image.jpg';
      				}
      		$rowarray['exam_id']=$row->id;
      		$rowarray['icon']=$icon;
      		$rowarray['exam_name']=$row->exam_name;

      		array_push($exam_list, $rowarray);
      }

      echo json_encode(array('exam_list'=>$exam_list));



	
		
	}

	public function analysis()
	{

		$json    			=  file_get_contents('php://input');
		$obj     			=  json_decode($json);



		$user_id = $obj->user_id;
		$exam_id = $obj->user_exam_id;
		
		$quest_list_array=array();
		
 		
		
		if($exam_id=='')
		{
			$result=0;
		}
		else{

			
			
			$get_all_question= $this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			
$qno=0;
			foreach($get_all_question as $row)
			{
				$qno++;
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
					$rowarray['qno']=$qno;
					array_push($quest_list_array, $rowarray);

			}

			$result=1;

			
			
		}

		echo json_encode(array('result'=>$result,'analysis_report'=>$quest_list_array));
	}
	
	


	
}
?>