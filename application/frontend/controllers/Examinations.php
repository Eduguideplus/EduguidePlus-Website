<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Examinations extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   

      			/*$active_usr=$this->session->userdata('activeuser');
				if($active_usr=='')
				{
					redirect($this->url->link(86));
				}
				else
				{

				}*/

					$exam_id=$this->uri->segment(3);



					 $data['exam_dtls'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					 $group_id=$data['exam_dtls'][0]->exam_type_id;

					 $data['group_dtls'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$group_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					  $data['subjects'] = $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


					 $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


			/* $groups_all = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			echo '<pre>';
            print_r($groups_all);exit;
                */

					$active_usr=$this->session->userdata('activeuser');
					if($active_usr=='')
					{
						$this->load->view('common/header');
						$this->load->view('examination_inactive', $data);
						$this->load->view('common/footer',$foot_data);
					}
					else
					{
						/*$data['plan_dtls'] = $this->common_model->common($table_name = 'tbl_user_plan', $field = array(), $where = array('user_id'=>$active_usr,'status'=>'active','exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

						$validity=@$data['plan_dtls'][0]->validity;
						$start_date=@$data['plan_dtls'][0]->created_on;
						if(count($data['plan_dtls'])>0)
						{
							$this->load->view('common/header');
							$this->load->view('examination_active', $data);
							$this->load->view('common/footer',$foot_data);
						}
						else
						{
							echo 'No Plan Available.Please Subscribe Plan.';
						}*/


						/*$data['user_dtls'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$active_usr,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

						$user_alloted_exam_id=@$data['user_dtls'][0]->exam_id;

						if($user_alloted_exam_id)*/


						$data['plan_dtls'] = $this->common_model->common($table_name = 'tbl_user_plan', $field = array(), $where = array('user_id'=>$active_usr,'status'=>'active','exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


					$userexamtype= $this->common_model->common($table_name = 'tbl_user_exam_type', $field = array(), $where = array('user_id'=>$active_usr,'exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					if(count($userexamtype)>0)
					{
							$this->load->view('common/header');
							$this->load->view('examination_active', $data);
							$this->load->view('common/footer',$foot_data);
					}
					else{
						$this->session->set_flashdata('errMsg','Please buy Plan for the Test');
						redirect($this->url->link(103),'refresh');
					}

							

						
					}

	
					
				

     
	}
	
	


	
}
?>