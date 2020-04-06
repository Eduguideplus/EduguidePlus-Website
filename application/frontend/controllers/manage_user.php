<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_user extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();
          $this->load->library('form_validation');
          $this->load->library('email');
          $this->load->library('session');
          $this->load->library('image_lib');

	 }
	
	public function index()
	{
		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}
		
   
      

        $user_data['user'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        //print_r( $home_data['blog']);exit;

        $user_data['sets'] = $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        //print_r($user_data['sets']);exit;


      	$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


      	 $plan_data=$this->join_model->get_user_activated_plan(@$user_id);
         //print_r($plan_data);
        $paper_qty=0;
         for($i=0;$i<count($plan_data);$i++)
         {
         	
         	$paper_qty=$paper_qty+$plan_data[$i]->total_paper;

         }
         $user_data['total_remaining_paper']=$paper_qty;


      	$user_data['completed_exam']=$this->join_model->get_completed_exam_except_practice(@$user_id);
        // print_r( $user_data['completed_exam']);exit;
          $user_data['incomplete_exam']=$this->join_model->get_completed_exam_except_practice_incomplete(@$user_id);
         $user_data['practice_exam']=$this->join_model->get_completed_exam_practice(@$user_id);

         $user_data['general'] = $this->home_model->select_general_plan();
         $user_data['company'] = $this->home_model->selectOne('tbl_exam_type','type','product');
        

	
		$this->load->view('common/header');
		$this->load->view('manage_user/dashboard_view',$user_data);
		$this->load->view('common/footer',$foot_data);
	}

	public function user_profile()
	{
		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}

		$user_data['user'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		 $user_data['sets'] = $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			$user_data['plan'] = $this->home_model->select_user_plan(@$user_id);

			 $plan_data=$this->join_model->get_user_activated_plan(@$user_id);
         //print_r($plan_data);
        $paper_qty=0;
         for($i=0;$i<count($plan_data);$i++)
         {
         	
         	$paper_qty=$paper_qty+$plan_data[$i]->total_paper;

         }
         $user_data['total_remaining_paper']=$paper_qty;


      	$user_data['completed_exam']=$this->join_model->get_completed_exam_except_practice(@$user_id);
        // print_r( $user_data['completed_exam']);exit;
          $user_data['incomplete_exam']=$this->join_model->get_completed_exam_except_practice_incomplete(@$user_id);
         $user_data['practice_exam']=$this->join_model->get_completed_exam_practice(@$user_id);
		
		$this->load->view('common/header');
		$this->load->view('manage_user/profile_view',$user_data);
		$this->load->view('common/footer',$foot_data);

	}

	public function user_setting()
	{
		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}


		$user_data['user'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        //print_r( $home_data['blog']);exit;

        $user_data['sets'] = $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        //print_r($user_data['sets']);exit;


      	$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      	 $plan_data=$this->join_model->get_user_activated_plan(@$user_id);
         //print_r($plan_data);
        $paper_qty=0;
         for($i=0;$i<count($plan_data);$i++)
         {
         	
         	$paper_qty=$paper_qty+$plan_data[$i]->total_paper;

         }
         $user_data['total_remaining_paper']=$paper_qty;


      	$user_data['completed_exam']=$this->join_model->get_completed_exam_except_practice(@$user_id);
        // print_r( $user_data['completed_exam']);exit;
          $user_data['incomplete_exam']=$this->join_model->get_completed_exam_except_practice_incomplete(@$user_id);
         $user_data['practice_exam']=$this->join_model->get_completed_exam_practice(@$user_id);
		
		$this->load->view('common/header');
		$this->load->view('manage_user/setting_view',$user_data);
		$this->load->view('common/footer',$foot_data);

	}
	public function user_wallet()
	{

		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}


		$user_data['user'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        //print_r( $home_data['blog']);exit;

        $user_data['sets'] = $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        //print_r($user_data['sets']);exit;


      	$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

       $plan_data=$this->join_model->get_user_activated_plan(@$user_id);
         //print_r($plan_data);
        $paper_qty=0;
         for($i=0;$i<count($plan_data);$i++)
         {
         	
         	$paper_qty=$paper_qty+$plan_data[$i]->total_paper;

         }
         $user_data['total_remaining_paper']=$paper_qty;


      	$user_data['completed_exam']=$this->join_model->get_completed_exam_except_practice(@$user_id);
        // print_r( $user_data['completed_exam']);exit;
          $user_data['incomplete_exam']=$this->join_model->get_completed_exam_except_practice_incomplete(@$user_id);
         $user_data['practice_exam']=$this->join_model->get_completed_exam_practice(@$user_id);
		
		$this->load->view('common/header');
		$this->load->view('manage_user/wallet_view',$user_data);
		$this->load->view('common/footer',$foot_data);

	}


	

	public function exam_details()
	{
		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}
			$user_data['user'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        //print_r( $home_data['blog']);exit;

        $user_data['sets'] = $this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        //print_r($user_data['sets']);exit;


         //$user_data['completed_exam'] = $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>@$user_id,'exam_result'=>'complete'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $user_data['completed_exam']=$this->join_model->get_completed_exam_except_practice(@$user_id);
        // print_r( $user_data['completed_exam']);exit;
          $user_data['incomplete_exam']=$this->join_model->get_completed_exam_except_practice_incomplete(@$user_id);
         $user_data['practice_exam']=$this->join_model->get_completed_exam_practice(@$user_id);
         //print_r( $user_data['incomplete_exam']);exit;
         $user_data['plan']=$this->join_model->get_user_activated_plan(@$user_id);
         $plan_data=$this->join_model->get_user_activated_plan(@$user_id);
         //print_r($plan_data);
         $user_data['exam_list']=array();
         for($i=0;$i<count($plan_data);$i++)
         {
         	$user_data['exam_list'][$i]['exam_type']=$plan_data[$i]->company_id;
         	$user_data['exam_list'][$i]['paper_qty']=$plan_data[$i]->total_paper;
         	$user_data['exam_list'][$i]['validity_date']=$plan_data[$i]->validity_date;
         	$user_data['exam_list'][$i]['user_plan_id']=$plan_data[$i]->user_plan_id;

         }
/*echo '<pre>';
       print_r($plan_data);
         echo count($user_data['practice_exam']);

         exit;*/



      	$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      	$user_data['instruct']=$this->common_model->common($table_name = 'tbl_instruction', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		
		$this->load->view('common/header');
		$this->load->view('manage_user/examination_view',$user_data);
		$this->load->view('common/footer',$foot_data);

	}

	public function profile_change()
	{
		$data['status']=0;
		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}

		$name=$this->input->post('nm');
		$email=$this->input->post('eml');
		$phno=$this->input->post('phn');
		$dob=$this->input->post('dtb');
		$education=$this->input->post('edu');
		$category=$this->input->post('cat');
		$location=$this->input->post('loc');
		$current_date = date('Y/m/d H:i:s');
		$data_arr=array(
			'first_name'=>$name,
			'login_email'=>$email,
			'login_mob'=>$phno,
			'user_education'=>$education,
			'user_category'=>$category,
			'user_address'=>$location,
			'modified_on'=>$current_date,
			'modified_by'=>$user_id
			);
		$this->db->where('id',$user_id);
		$this->db->update('tbl_user',$data_arr);
		
			$data['status']=1;
		

			
		
		 echo json_encode(array('workdone'=>$data));

		


	}

	public function profile_image_save()
	{
		$data['status']=0;
		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}

		$photo=$this->input->post('photo');
		$current_date = date('Y/m/d H:i:s');

		$profile_data = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$old_img=@$profile_data[0]->profile_photo;

			if(@$_FILES['photo']['tmp_name']!='')
		    	{
		    	$profile_img= $this->image_upload();
		    	@unlink('assets/uploads/user/'.$old_img);
		    	}
			    elseif($old_img!='')
			    {
			    	$profile_img=$old_img;
			    }
			    else
			    {
			    	$profile_img='';
			    }
			    
		
			
				$data_photo=array(
					
					'profile_photo'=>$profile_img,
					'modified_on'=>$current_date,
					'modified_by'=>$user_id

				
					);
				$this->db->where('id',$user_id);
				if($this->db->update('tbl_user',$data_photo))
				{
					$data['status']=1;
				}
				else
				{
					$data['status']=0;
				}

				$profile_data_after = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				$data['pro_pic']=@$profile_data_after[0]->profile_photo;
				

				echo json_encode(array('workdone'=>$data));

			


	}
	public function profile_image_delete()
	{
		$data['status']=0;
		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}

		$c_photo=$this->input->post('c_pic');
		$current_date = date('Y/m/d H:i:s');

		
		if($c_photo!='')
		{
			$data_arr=array(

				'profile_photo'=>'',
				'modified_on'=>$current_date,
				'modified_by'=>$user_id
				);
			$this->db->where('id',$user_id);
			$this->db->update('tbl_user',$data_arr);
			@unlink("assets/uploads/user/".$c_photo);
			$data['status']=1;
		}
		else
		{
			$data['status']=0;
		}

		echo json_encode(array('workdone'=>$data));

	}

	public function setting_change()
	{
		$eml=$this->input->post('eml');
		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}
		$data_arr=array('login_email'=>$eml);
		$this->db->where('id',$user_id);
		$this->db->update('tbl_user',$data_arr);
		$data['status']=1;
		echo json_encode(array('workdone'=>$data));


		
	}
	public function password_change()
	{
		$eml=$this->input->post('eml');
		$np=$this->input->post('np');
		$cp=$this->input->post('cp');
		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}
		if($cp==$np)
		{
			$data_arr=array('login_email'=>$eml,'login_pass'=>$np);
			$this->db->where('id',$user_id);
			$this->db->update('tbl_user',$data_arr);
			$data['status']=1;

		}
		else
		{
			$data['status']=0;
		}

		
		echo json_encode(array('workdone'=>$data));

	}

	 function image_upload()
	{
		//echo $abc;exit;
		$this->load->library('upload');		
		//print_r($_FILES['user_images']['name']);exit;	
		$files = $_FILES;
		//$cpt = count($_FILES['cat_img']['name']);
		//$count = 0;
	/*	$image_array = array();
		for($i=0; $i<$cpt; $i++)
		{*/	
			$_FILES['userfile']['name']= $files['photo']['name'];
        	$_FILES['userfile']['type']= $files['photo']['type'];
        	$_FILES['userfile']['tmp_name']= $files['photo']['tmp_name'];
        	$_FILES['userfile']['error']= $files['photo']['error'];
        	$_FILES['userfile']['size']= $files['photo']['size'];    

        	$this->upload->initialize($this->set_upload_options());
			if($this->upload->do_upload())
			{
				$file_info = $this->upload->data();
				
				$img_config_4['image_library'] = 'gd2';
				$img_config_4['source_image'] = 'assets/uploads/user/'.$file_info['orig_name'];
				$img_config_4['create_thumb'] = FALSE;
				$img_config_4['maintain_ratio'] = FALSE;
				$img_config_4['width']	= 274;
				$img_config_4['height']	= 274;
				$img_config_4['new_image'] ='assets/uploads/user/'.$file_info['orig_name'];
				//echo '<pre>';print_r($img_config_4);
				$this->image_lib->initialize($img_config_4);
				$this->image_lib->resize();
				$this->image_lib->clear();

				
				//echo '<pre>';print_r($file_info);
				$image = $file_info['orig_name'];
				//$count++;
			}
		//}	

		
		//echo '<pre>';print_r($image_array);
		//exit;
		return $image;      
	}

	 private function set_upload_options()
	{   
    //upload an image options
    	$new_name = str_replace(".","",microtime());						
		$config['upload_path'] ='assets/uploads/user/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';				
		$config['file_name']=$new_name;
		
		//echo '<pre>';print_r($config);exit;
		
    	return $config;
	}   


	
	function renew_plan($id)
	{
		$user_plan = $this->home_model->selectOne('tbl_user_plan_details','id',$id);

		$total = $user_plan[0]->plan_price;

		$plan_duration = $this->home_model->selectOne('tbl_plan','id',$user_plan[0]->plan_id);
        $duration = $plan_duration[0]->plan_month_duration;

        $d = date('Y-m-d');
        $vd = date('Y-m-d', strtotime("+".$duration." months", strtotime($d)));

        $paper = $this->home_model->selectOne('tbl_user_plan_paper','user_plan_id',$user_plan[0]->id);
        $total_paper = $paper[0]->total_paper;
       
        $data = array('validity_date'=>$vd,'total_paper'=>$total_paper);
        $this->db->where('id',$id);
        $this->db->update('tbl_user_plan_details',$data);

        $user_id = $user_plan[0]->user_id;
        $order_id = $id;

        $user = $this->home_model->selectOne('tbl_user','id',$user_id);

        $user_name = $user[0]->first_name;
        $user_email = $user[0]->login_email;
        $user_mobile = $user[0]->login_mob;

        $data['pay_del'] = array(
					'amount'=>$total,
					'firstname'=>$user_name,					
					'email'=>$user_email,
					'phone'=>$user_mobile,
					'productinfo'=>$order_id,
					'surl'=>base_url().'success',
					'furl'=>base_url().'failure',
					'service_provider'=>'payu_paisa',
				);
			
			$this->session->set_userdata('pay_del_array',$data['pay_del']);


			$this->load->view('payu/payment_method_view',$data);

	}



	public function send_email_verify()
	{
		$user_id=$this->input->post('user');

		$user_dtls = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$user_email=$user_dtls[0]->login_email;
		$user_name=$user_dtls[0]->first_name;
		$user_code=$user_dtls[0]->user_code;
		$created_on=$user_dtls[0]->created_on;


		$time=time();
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$randstring = str_shuffle(@$characters);
    	

    	$verify_link=$time.'/'.$user_code.'/'.$randstring;
    	

    	
    	




		 $data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            
            $admin_recive=@$data['email'][0]->recieve_email;
            $admin_from=@$data['email'][0]->from_email;

             $email_data['mail_data']=array
            (
                'user_name'=>@$user_name ,
                'user_email'=>@$user_email,
                'user_code'=>@$user_code,
                'created_on'=>@$created_on,
                'verify_link'=>@$verify_link
                
            );



            $this->email->set_mailtype("html");
            
          
            $html_email_user=$this->load->view('mail_template/emailverify_mail_user',$email_data, true);

            $this->email->from($admin_from);
            $this->email->to($user_email);
            $this->email->subject('Email Verification From P2Exam');
            $this->email->message($html_email_user);
            @$reponse=$this->email->send();


             if(@$reponse)
            {
                
                $data['status']=1;
            }
            else
            {
                
                $data['status']=4;
            }
           
           

            echo json_encode(array('workdone'=>$data));




	}


	public function verify_email()
	{
		$user_code = $this->uri->segment(3);

		$user_dtls = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_code'=>$user_code,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		if(count(@$user_dtls)>0)
		{
			if(@$user_dtls[0]->email_verify=='N')
			{
				$user_id=$user_dtls[0]->id;
				$data_arr=array('email_verify'=>'Y');
				$this->db->where('id',$user_id);
				$this->db->update('tbl_user',$data_arr);
				$this->session->set_userdata('user_identity',$user_id);
				$this->session->set_flashdata('success_msg','your Email Address has been verified.');
				redirect($this->url->link(8));
			}
			if(@$user_dtls[0]->email_verify=='Y')
			{
				$this->session->set_userdata('user_identity',$user_id);
				$this->session->set_flashdata('success_msg','your Email Address is already verified.');
				redirect($this->url->link(8));

			}

		}
		else
		{
			redirect($this->url->link(38));
		}

		

		



	}

	public function check_mail()
	{
		$email=$this->input->post('eml');
		$email_exist=array();
		$email_exist = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>@$email), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		if(count(@$email_exist)>0)
		{
			$data['status']=0;
		}
		else
		{
			$data['status']=1;
		}

		echo json_encode(array('workdone'=>$data));

	}

	public function send_referral()
	{
		$email=$this->input->post('eml');

		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}

		$user_dtls = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>@$user_id, 'status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		if(count(@$user_dtls))
		{
			$user_code=@$user_dtls[0]->user_code;
			$user_name=@$user_dtls[0]->first_name;
			$created_on=@$user_dtls[0]->created_on;

			$user_referral = $this->common_model->common($table_name = 'tbl_user_referral', $field = array(), $where = array('user_id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			if(count(@$user_referral)>0)
			{
				$ref_code=@$user_referral[0]->ref_code;
			}

			$time=time();
	        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    	$randstring = str_shuffle(@$characters);

			$ref_link=@$user_code.'/'.@$ref_code.'/'.$randstring;

			$data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            
            $admin_recive=@$data['email'][0]->recieve_email;
            $admin_from=@$data['email'][0]->from_email;

             $email_data['mail_data']=array
            (
                'user_name'=>@$user_name,
                
                'created_on'=>@$created_on,
                'ref_link'=>@$ref_link,
                'refer_code'=>@$ref_code
                
            );



            $this->email->set_mailtype("html");
            
          
            $html_email_user=$this->load->view('mail_template/refer_mail_user',$email_data, true);

            $this->email->from($admin_from);
            $this->email->to($email);
            $this->email->subject('Referral From P2Exam');
            $this->email->message($html_email_user);
            @$reponse=$this->email->send();


             if(@$reponse)
            {
                
                $data['status']=1;
            }
            else
            {
                
                $data['status']=4;
            }


		}
		else
		{
			$data['status']=4;
		}

		//$data['status']=$ref_link;
		

		    echo json_encode(array('workdone'=>$data));
		

	}
	public function get_amount_value()
	{
		$point=$this->input->post('point');
		$redeem=$this->common_model->common($table_name = 'tbl_redeem', $field = array(), $where = array('id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$redm_point=@$redeem[0]->redeem_point;
		$redm_amt=@$redeem[0]->redeem_amount;
		$amt_per_point=@$redm_amt/@$redm_point;
		$data['result_amt']=@$amt_per_point*$point;
		$data['status']=1;
		echo json_encode(array('workdone'=>$data));
	}

	public function get_point_value()
	{
		$amount=$this->input->post('amount');
		$redeem=$this->common_model->common($table_name = 'tbl_redeem', $field = array(), $where = array('id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$redm_point=@$redeem[0]->redeem_point;
		$redm_amt=@$redeem[0]->redeem_amount;
		$point_per_amt=@$redm_point/@$redm_amt;
		$data['result_pnt']=@$point_per_amt*$amount;
		$data['status']=1;
		echo json_encode(array('workdone'=>$data));
	}




	function set_livetest_session()
	{
		$lt_key='proceed';
		
		$this->session->set_userdata('livetest',$lt_key);
		

		 $data['status']=1;
		 $data['lt'] = $this->session->userdata('livetest');

        echo json_encode(array('workdone'=>$data));
	}


	function deactivate_account()
	{
		if($this->session->userdata('user_identity')!='')
		{
			$user_id=$this->session->userdata('user_identity');
		}
		else
		{
			redirect($this->url->link(1));
		}
		$current_date = date('Y/m/d H:i:s');
		$data_up=array(

			'status'=>'Inactive',
			'modified_by'=>$user_id,
			'modified_on'=>$current_date
			);
		$this->db->where('id',$user_id);
		$this->db->update('tbl_user',$data_up);

            $this->session->unset_userdata('user_identity');
            $this->session->unset_userdata('practiceexam_id');
            $this->session->unset_userdata('practicecat_slug');
            //$this->session->sess_destroy();
            redirect($this->url->link(1));


	}

	


	
}
?>