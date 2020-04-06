<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 

{	

	 

	 public function __construct()

     {

          parent::__construct();



	 }

	

	public function index()

	{



		$active_usr=$this->session->userdata('activeuser');

		if($active_usr!='')

		{

			redirect($this->url->link(95));

		}

		

   



      



      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



       $data['area_details']=$this->common_model->common($table_name ='tbl_highlight_area', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



//        echo '<pre>';

// print_r($data['area_details']); exit;

	

		$this->load->view('common/header');

		$this->load->view('login',$data);

		$this->load->view('common/footer',$foot_data);

	}



	public function logout_all_device()

	{

		$user_id= $this->uri->segment(2);



		$this->db->where('user_id', $user_id);

		$this->db->delete('tbl_login_token');



		$this->session->set_flashdata('err_msg','You are logged out from all devices');

		

		redirect($this->url->link(86));



	}



	public function check_email_exist()

	{

		$category_id=$this->input->post('category_id');

		      $data=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	        echo json_encode($data);



	}



	public function login_action()

	{

		$email=$this->input->post('email1');

		$pwd=$this->input->post('pwd');



		$data=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email,'login_pass'=>$pwd,'user_type_id'=>'2','status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($data)>0)

		{

				$active_user=$data[0]->id;

				 $current_date= date('Y-m-d');

				

				$check_login_token= $this->common_model->common($table_name = 'tbl_login_token', $field = array(), $where = array('user_id'=>$active_user,'created_date'=>$current_date), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



				if(count($check_login_token)>0)

				{

						$saved_loginToken= $check_login_token[0]->login_token;

				

						$session_loginToken= $this->session->userdata('session_loginToken');

					


							$this->session->set_userdata('activeuser', $active_user);



							$come_form=$this->session->userdata('come_from');

			

							if($come_form=='chapter_join')

							{

								$set_id=$this->session->userdata('set_id');
								$set_slug=$this->session->userdata('set_slug');

								$this->session->unset_userdata('chapterId');

								$this->session->unset_userdata('come_from');

								redirect($this->url->link(141).'/'.$set_id.'/'.$set_slug);

							}

							if($come_form=='comprehensive_join')

							{

								$set_id=$this->session->userdata('set_id');
								$set_slug=$this->session->userdata('set_slug');

								$this->session->unset_userdata('chapterId');

								$this->session->unset_userdata('come_from');

								redirect($this->url->link(141).'/'.$set_id.'/'.$set_slug);

							}

							if($come_form=='demo_join')

							{

								$set_id=$this->session->userdata('set_id');
								$set_slug=$this->session->userdata('set_slug');

								$this->session->unset_userdata('chapterId');

								$this->session->unset_userdata('come_from');

								redirect($this->url->link(141).'/'.$set_id.'/'.$set_slug);

							}



							redirect($this->url->link(95));

					



					

			}

		else{

				$session_loginToken= date('Ymd').'-'.time().'-'.$active_user;



				$tokenData= array(



					'login_token'=>$session_loginToken,

					'user_id'=>$active_user,

					'created_date'=>$current_date

				);



				$this->db->insert('tbl_login_token',$tokenData);



				$this->session->set_userdata('session_loginToken', $session_loginToken);





				$this->session->set_userdata('activeuser', $active_user);

				$come_form=$this->session->userdata('come_from');

			

				if($come_form=='chapter_join')

				{

				$set_id=$this->session->userdata('set_id');
								$set_slug=$this->session->userdata('set_slug');

								$this->session->unset_userdata('chapterId');

								$this->session->unset_userdata('come_from');

								redirect($this->url->link(141).'/'.$set_id.'/'.$set_slug);

				}

				if($come_form=='comprehensive_join')

				{

			$set_id=$this->session->userdata('set_id');
								$set_slug=$this->session->userdata('set_slug');

								$this->session->unset_userdata('chapterId');

								$this->session->unset_userdata('come_from');

								redirect($this->url->link(141).'/'.$set_id.'/'.$set_slug);

				}

				if($come_form=='demo_join')

				{

				$set_id=$this->session->userdata('set_id');
								$set_slug=$this->session->userdata('set_slug');

								$this->session->unset_userdata('chapterId');

								$this->session->unset_userdata('come_from');

								redirect($this->url->link(141).'/'.$set_id.'/'.$set_slug);

				}



				redirect($this->url->link(95));

							

			}

			

		}

		else

		{

			$this->session->set_flashdata('err_msg','Sorry!! Either email id or password does not match');

			redirect($this->url->link(86));

		}



	      



	}

	

	





	

}

?>