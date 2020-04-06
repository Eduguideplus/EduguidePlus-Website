<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_cart extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();
          $this->load->model('join_model');

	 }
	
	public function index()
	{
		
   
		$usr=$this->session->userdata('activeuser');
		if($usr!='')
		{
				$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$data['test_type']=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id !='=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$data['groups']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$data['practices']=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('test_type_id'=>'1','status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$data['knowledge']=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('test_type_id'=>'3','status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$data['knock']=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('test_type_id'=>'4','status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$data['qzt1']=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('test_type_id'=>'5','status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$data['qzt2']=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('test_type_id'=>'6','status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


				//$data['groups']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				//print_r($data['test_type']);exit;

	
				$this->load->view('common/header');
				$this->load->view('cart_view',$data);
				$this->load->view('common/footer',$foot_data);
		}
		else
		{
			$step='gotocart';
			$this->session->set_userdata('come_from',$step);
			redirect($this->url->link(86));
		}

   
      
	}




	public function get_exam_by_group()
{	 

	$usr=$this->session->userdata('activeuser');

	$category_id=$this->input->post('category_id');

	$data=$this->join_model->get_plan_exam_available($category_id,$usr);
	      //$data=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}

	public function get_plan_details()
{	 $category_id=$this->input->post('category_id');
	      $data=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('test_type_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}

public function cart_submit()
{
	$usr=$this->session->userdata('activeuser');
		if($usr!='')
		{

			 $data_cart=$this->common_model->common($table_name = 'tbl_cart', $field = array(), $where = array('user_id'=>$usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			 if(count($data_cart)>0)
			 {
			 	$this->db->where('id',$data_cart[0]->id);
			 	$this->db->delete('tbl_cart');
			 }



			$plan_id=$this->input->post('selected_plan');
			$test_qty=$this->input->post('selected_plan_test_qty');
			$validity=$this->input->post('selected_plan_validity');
			$amount=$this->input->post('selected_plan_amount');
			$code=$this->input->post('selected_plan_code');
			$exam_id=$this->input->post('exam_id');
			$current_date=date('Y-m-d,H:i:s');


			$data_arr=array(
				'plan_id'=>$plan_id,
				'user_id'=>$usr,
				'price'=>$amount,
				'plan_validity'=>$validity,
				'test_qty'=>$test_qty,
				'plan_code'=>$code,
				'exam_id'=>$exam_id,
				'created_by'=>$usr,
				'created_on'=>$current_date

			);
			$this->db->insert('tbl_cart',$data_arr);

			$this->session->set_flashdata('succ_msg','Thank You.Plan has been added to your cart.');
			redirect($this->url->link(114));
		}
		else
		{
			$step='gotocart';
			$this->session->set_userdata('come_from',$step);
			redirect($this->url->link(86));
		}	

}
	
Public function confirm()
{
	$usr=$this->session->userdata('activeuser');
		if($usr!='')
		{		$data['cart_dtls']=$this->common_model->common($table_name = 'tbl_cart', $field = array(), $where = array('user_id'=>$usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$data['userDetails'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




				if(count($data['cart_dtls'])>0)
				{
					$this->load->view('common/header');
					$this->load->view('cart_confirm_view',$data);
					$this->load->view('common/footer',$foot_data);
				}
				else
				{
					redirect($this->url->link(103));
				}
				
		}
		else
		{
			$step='gotocart';
			$this->session->set_userdata('come_from',$step);
			redirect($this->url->link(86));
		}
}	

public function confirm_action()
{
	$usr=$this->session->userdata('activeuser');

		if($usr!='')
		{
				$val=$this->uri->segment(2);
				if($val!='')
				{
					$cart_id=$val;
				}
				else
				{
					$cart_id=$this->input->post('cart_id');
				}
				

				$cart_dtls=$this->common_model->common($table_name = 'tbl_cart', $field = array(), $where = array('id'=>$cart_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$plan_id=@$cart_dtls[0]->plan_id;

				$plan_dtls=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('id'=>$plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				$test_type_id=@$plan_dtls[0]->test_type_id;



				$plan_name=@$plan_dtls[0]->plan_title;
				$plan_validity=@$cart_dtls[0]->plan_validity;
				$test_qty=@$cart_dtls[0]->test_qty;
				$plan_code=@$cart_dtls[0]->plan_code;
				$exam_id=@$cart_dtls[0]->exam_id;
				$plan_amount=@$cart_dtls[0]->price;
				$current_date=date('Y-m-d,H:i:s');

				$exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$group_id=$exam_dtls[0]->exam_type_id;

				if($test_type_id==1)
				{
						$data_arr=array(
							'user_id'=>$usr,
							'plan_id'=>$plan_id,
							'plan_validity'=>$plan_validity,
							
							'plan_code'=>$plan_code,
							'exam_id'=>$exam_id,
							'plan_amount'=>$plan_amount,
							'created_on'=>$current_date

					);

						$user_exam_type=$this->common_model->common($table_name = 'tbl_user_exam_type', $field = array(), $where = array('user_id'=>$usr,'exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

						if(count($user_exam_type)==0)
						{
								$data_exam=array(

								'user_id'=>$usr,
								'group_id'=>$group_id,
								'exam_id'=>$exam_id,
								'created_by'=>$usr,
								'created_on'=>date('Y-m-d,H:i:s')

							);

							$this->db->insert('tbl_user_exam_type',$data_exam);
						}



						//---------To make all plan expired when one new plan entered with same exam id and same user id--->
						$data_stat=array('status'=>'expired');

						$this->db->where('user_id',$usr);
						$this->db->where('exam_id',$exam_id);
						$this->db->update('tbl_user_plan',$data_stat);

						//----End---------------------------

						
				}
				else
				{
					$data_arr=array(
							'user_id'=>$usr,
							'plan_id'=>$plan_id,
							'plan_validity'=>$plan_validity,
							'test_qty'=>$test_qty,
							'plan_code'=>$plan_code,
							'remaining_qty'=>$test_qty,
							'plan_amount'=>$plan_amount,
							'created_on'=>$current_date

					);
				}


				
				$this->db->insert('tbl_user_plan',$data_arr);
				$user_plan_id=$this->db->insert_id();

$data_payment_report=array(
	                       'user_id'=>$usr,
                           'payment_amount'=>$plan_amount,
                           'payment_for'=>'Plan Purchase of '.$plan_code,
                           'payment_done_on'=>date('Y-m-d H:i:s')
                           );

$this->db->insert('tbl_user_payment_report',$data_payment_report);



				$this->db->where('id',$cart_id);
				$this->db->delete('tbl_cart');

				if($test_type_id==1)
				{
					
					$subject_list=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					$first_sub=@$subject_list[0]->id;

					$chapter_list=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('sub_id'=>$first_sub), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					$first_chap_id=@$chapter_list[0]->chap_id;

					$first_set_exist=$chapter_list=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('user_id'=>$usr,'chap_id'=>$first_chap_id,'user_plan_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					if(count($first_set_exist)>0)
					{
						$up_arr=array('user_plan_id'=>$user_plan_id);
						$this->db->where('id',$first_set_exist[0]->id);
						$this->db->update('tbl_set',$up_arr);

						$first_set_user_exam_exist=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>$usr,'set_id'=>$first_set_exist[0]->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

						if(count($first_set_user_exam_exist)>0)
						{
							$up_arr=array('user_plan_id'=>$user_plan_id);
							$this->db->where('set_id',$first_set_exist[0]->id);
							$this->db->where('user_id',$usr);
							$this->db->update('tbl_user_exam',$up_arr);
						}



						for($s=0;$s<count($subject_list);$s++)
						{

							$chapter_list=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('sub_id'=>$subject_list[$s]->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


							for($i=0;$i<count($chapter_list);$i++)
							{
								if($i==0 && $s==0)
								{
									for($j=2;$j<=3;$j++)
									{
										$chap_id=@$chapter_list[$i]->chap_id;
										$chap_name=@$chapter_list[$i]->chap_name;
										$set_name=$chap_name.$usr.'-Practice Set'.$j;
										$set_slug=$this->create_slug($set_name);
										$cuurent_date_time=date('Y-m-d,H:i:s');


										$exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

										$exam_name=@$exam_dtls[0]->exam_name;

										$actual_name=$chap_name.' ('.$exam_name.') -Practice Set'.$j;

										$data_arr=array(
										'user_id'=>$usr,
										'set_name'=>$actual_name,
										'set_slug'=>$set_slug,
										'test_type_id'=>$test_type_id,
										'chap_id'=>$chap_id,
										'user_plan_id'=>$user_plan_id,
										'created_on'=>$cuurent_date_time,
										'created_by'=>$usr



										);

										

										$this->db->insert('tbl_set',$data_arr);
										$insert_set_id = $this->db->insert_id();

										$question_all=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('chap_id'=>$chap_id,'section_id'=>$subject_list[$s]->id,'exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
										 $no_of_question=count($question_all);
										 $start=0;
										 $limit=$no_of_question-1;
										 $random_indx=array();

										 $random_indx=$this->random_generator($start,$limit);

										for($q=0;$q<count($random_indx);$q++)
										{
											$current_indx=$random_indx[$q];
											$data_set_dtls=array(
												'set_id'=>$insert_set_id,
												'question_id'=>$question_all[$current_indx]->id,
												'created_by'=>$usr,
												'created_on'=>$cuurent_date_time


											);
											
											$this->db->insert('tbl_question_set',$data_set_dtls);
										}

									}
								}

								else
								{//exit;
									for($j=1;$j<=3;$j++)
									{
										$chap_id=@$chapter_list[$i]->chap_id;
										$chap_name=@$chapter_list[$i]->chap_name;
										$set_name=$chap_name.$usr.'-Practice Set'.$j;
										$set_slug=$this->create_slug($set_name);
										$cuurent_date_time=date('Y-m-d,H:i:s');


										$exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

										$exam_name=@$exam_dtls[0]->exam_name;

										$actual_name=$chap_name.' ('.$exam_name.') -Practice Set'.$j;

										$data_arr=array(
										'user_id'=>$usr,
										'set_name'=>$actual_name,
										'set_slug'=>$set_slug,
										'test_type_id'=>$test_type_id,
										'chap_id'=>$chap_id,
										'user_plan_id'=>$user_plan_id,
										'created_on'=>$cuurent_date_time,
										'created_by'=>$usr



										);

										$this->db->insert('tbl_set',$data_arr);
										$insert_set_id = $this->db->insert_id();

										$question_all=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('chap_id'=>$chap_id,'section_id'=>$subject_list[$s]->id,'exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
										 $no_of_question=count($question_all);
										 $start=0;
										 $limit=$no_of_question-1;
										 $random_indx=array();

										 $random_indx=$this->random_generator($start,$limit);

										for($q=0;$q<count($random_indx);$q++)
										{
											$current_indx=$random_indx[$q];
											$data_set_dtls=array(
												'set_id'=>$insert_set_id,
												'question_id'=>$question_all[$current_indx]->id,
												'created_by'=>$usr,
												'created_on'=>$cuurent_date_time


											);
											
											$this->db->insert('tbl_question_set',$data_set_dtls);
										}

									}
								}
								
							}
						}	
						







					}


					else
					{		
						for($s=0;$s<count($subject_list);$s++)
						{

							$chapter_list=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('sub_id'=>$subject_list[$s]->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


							for($i=0;$i<count($chapter_list);$i++)
							{
								for($j=1;$j<=3;$j++)
								{
									$chap_id=@$chapter_list[$i]->chap_id;
									$chap_name=@$chapter_list[$i]->chap_name;
									$set_name=$chap_name.$usr.'-Practice Set'.$j;
									$set_slug=$this->create_slug($set_name);
									$cuurent_date_time=date('Y-m-d,H:i:s');


									$exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

									$exam_name=@$exam_dtls[0]->exam_name;

									$actual_name=$chap_name.' ('.$exam_name.') -Practice Set'.$j;

									$data_arr=array(
									'user_id'=>$usr,
									'set_name'=>$actual_name,
									'set_slug'=>$set_slug,
									'test_type_id'=>$test_type_id,
									'chap_id'=>$chap_id,
									'user_plan_id'=>$user_plan_id,
									'created_on'=>$cuurent_date_time,
									'created_by'=>$usr



									);

									$this->db->insert('tbl_set',$data_arr);
									$insert_set_id = $this->db->insert_id();

									$question_all=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('chap_id'=>$chap_id,'section_id'=>$subject_list[$s]->id,'exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
										 $no_of_question=count($question_all);
										 $start=0;
										 $limit=$no_of_question-1;
										 $random_indx=array();

										 $random_indx=$this->random_generator($start,$limit);

										for($q=0;$q<count($random_indx);$q++)
										{
											$current_indx=$random_indx[$q];
											$data_set_dtls=array(
												'set_id'=>$insert_set_id,
												'question_id'=>$question_all[$current_indx]->id,
												'created_by'=>$usr,
												'created_on'=>$cuurent_date_time


											);
											
											$this->db->insert('tbl_question_set',$data_set_dtls);
										}



								}
							}
						}


					}



				}
				/*else
				{

				}*/

				

			$data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$user_mail=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    @$admin_recive=$data['email'][0]->recieve_email;
                    @$admin_from=$data['email'][0]->from_email;
                    @$email=$user_mail[0]->login_email;


                    
                
                    $email_data['mail_data']=array
                    (
                        'plan_name'=> @$plan_name,
                        'plan_code'=>@$plan_code,
                        'plan_validity'=>@$plan_validity,
                        'plan_amount'=>@$plan_amount
                        
                       );


                    // print_r($email_data['mail_data']);exit;
                    $this->email->set_mailtype("html");

                   // $html_email_user = $this->load->view('mail_template/admin_enquiry_registration_mail',$email_data, true);
                   // $send_admin_mail_html=$this->load->view('mail_template/email_verify_request_mail',$email_data, true);

                     $send_user_mail_html=$this->load->view('mail_template/plan_success_mail',$email_data, true);


                   //print_r($send_user_mail_html );exit;

                    /*$this->email->from($admin_from,'Digital Bharat Service');
                    $this->email->to($admin_recive);
                  	$this->email->subject('Reply from Digital Bharat Service');
                    $this->email->message($send_admin_mail_html);
                    @$reponse_reply=$this->email->send();*/

                    $this->email->from(@$admin_from,'NirnayakFinder');
                    $this->email->to(@$email);
                  	$this->email->subject('Reply from NirnayakFinder');
                    $this->email->message($send_user_mail_html);
                    @$reponse_reply=$this->email->send();
                   


				$this->session->set_flashdata('succ_msg','Thank You.Plan has been activated to your Account.');
				redirect($this->url->link(104));

		}
		else
		{
			$step='gotocart';
			$this->session->set_userdata('come_from',$step);
			redirect($this->url->link(86));
		}		
}


public function random_generator($start,$limit)
	{
		$randarray = array(); 
		for($i = 1; $i <= 3; ) 
		{ 
		    unset($rand); 
		    $rand = rand($start, $limit); 
		    if(!in_array($rand, $randarray)) 
		    { 
		        $randarray[] = $rand; 
		        $i++; 
		    } 
		} 

		return $randarray;




	}


	function create_slug($string)
  {     
        $replace = '-';         
        $string = strtolower($string);     
 
        //replace / and . with white space     
        $string = preg_replace("/[\/\.]/", " ", $string);     
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
 
        //remove multiple dashes or whitespaces     
        $string = preg_replace("/[\s-]+/", " ", $string);     
 
        //convert whitespaces and underscore to $replace     
        $string = preg_replace("/[\s_]/", $replace, $string);     
 
        //limit the slug size     
        $string = substr($string, 0, 100);     
 
        //slug is generated     
        return $string; 
    }


	
}
?>