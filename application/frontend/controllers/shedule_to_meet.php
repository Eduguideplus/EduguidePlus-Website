<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class shedule_to_meet extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();
          $this->load->library('image_lib');

	 }
	
	



public function index()
	{

     $active_usr=$this->session->userdata('activeuser');
				if($active_usr=='')
				{
					redirect($this->url->link(86));
				}
				else
				{

					$user_id=$active_usr;

					if($user_id!='')
					{
						$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				      $data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				      

	
							$this->load->view('common/header');
							$this->load->view('shedule_to_meet_view',$data);
							$this->load->view('common/footer',$foot_data);

						}
						else
					{
						redirect($this->url->link(86));
					}
					}
					
					



	}	


public function insert_data()
	{

		    /* $zero='';
      if(strlen($last_schedule_id)==1){

$zero=rand(00000,99999);
      }
      if(strlen($salon_id)==2){

$zero=rand(0000,9999);
      }
      if(strlen($salon_id)==3){

$zero=rand(000,999);
      }*/

				$active_usr=$this->session->userdata('activeuser');
				if($active_usr=='')
				{
					redirect($this->url->link(86));
				}
				else
				{

					$user_id=$active_usr;

					 $schdule_day=$this->input->post('schdule_day');
					 $schdule_time=$this->input->post('schdule_time');
					 $interested_course=$this->input->post('interested_course');
					
					
					$current_date=date('Y-m-d,H:i:s');

					
					     $data_array=array(

						'schdule_day'=>$schdule_day,
						'user_id'=>$user_id,
						'schdule_time'=>$schdule_time,
						'interested_course'=>$interested_course,
						
						'created_date'=>date('Y-m-d H:i:s'),
					);
					     

					$this->db->insert('tbl_shedule_to_meet',$data_array);
					$last_schedule_id=$this->db->insert_id();


					$zero='';
      if(strlen($last_schedule_id)==1){

$zero='000';
      }
      if(strlen($last_schedule_id)==2){

$zero='00';
      }
      if(strlen($last_schedule_id)==3){

$zero='0';
      }



      $user_unique_id = 'EGP'.$zero.$last_schedule_id;

      $data_rel = array(
                'schedule_unique_id'=>$user_unique_id
             );

      $this->db->where('shedule_to_meet_id', $last_schedule_id);
      $this->db->update('tbl_shedule_to_meet', $data_rel);




					


				$this->session->set_flashdata('succ_msg','Schedule to meet submit successfully');

				redirect('shedule_to_meet');
					


				}

	}



}
?>