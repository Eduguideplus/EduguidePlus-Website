<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social_login extends CI_Controller {

	public function __construct()
    {
          		parent::__construct();
          		
           		$this->load->database();
             	$this->load->library('image_lib');
		        $this->load->model('common/admin_model');
		        $this->load->helper('download');
		        // $this->load->library('dompdf_gen');

	}

	function index()
	{

		


		
		$this->load->view('common/header');
		$this->load->view('client_registration_through_fb');
		$this->load->view('common/footer');
	}
	

      function fb_login_action()
	   {

				$f_name= trim($this->input->post('user_first_name'));
				$l_name= trim($this->input->post('user_last_name'));
				$email_id= trim($this->input->post('user_email'));
				$gender= trim($this->input->post('user_gender'));
				
				$mid_name="";

				

		        $created_on=date('Y-m-d H:i:s');

		        $email_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		       // print_r($email_check);

		      
		             
		        if(count($email_check)>0)
		        {


		    

		        	$active_user=@$email_check[0]->id;

		    //     	  $login_avail=  $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_id'=>$in_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


					 // $user_email= @$login_avail[0]->login_email; 
					 // $user_ph= @$login_avail[0]->mobile;
					 // $fname= @$login_avail[0]->first_name; 
					 // $user_type= @$login_avail[0]->user_type_id;
					 // $authorised= @$login_avail[0]->admin_approved; 

		    //     	$log_session = array(					  
				   
				  //  'user_email'=>$user_email,
				  //  'user_session_id'=>$in_id,
				  //  'user_fname'=>$fname,
				  //  'user_contact'=>$user_ph,
				  //  'authorised'=>$authorised,
				  //  'user_type'=>$user_type,
				  //  'logged_in' => TRUE
			   // 						);
		           $this->session->set_userdata('activeuser', $active_user);


		        	$result['status']=0;
				   
		        }
		        else
		        {
		        		//$this->db->insert('tbl_user',$user_data);
				       // $inserted_id = $this->db->insert_id();

		        	$data_session=array(
		        							'fb_first_name'=>$f_name,
		        							'fb_last_name'=>$l_name,
		        							'fb_email_id'=>$email_id,
		        							'fb_gender'=>$gender
		        		               );

		        	$this->session->set_userdata($data_session);

				   

				   

				    $active_user="";

				    $result['status']=1;

				   
		        }

		        echo json_encode(array('changedone'=>$result,'activeuser'=>$active_user));

		      

   }

     	function check_phone()
	{

		$phone = $this->input->post('phone');

		$phone_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('mobile'=>$phone,'user_id !='=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($phone_check) > 0)
		{
			$result['status']=1;
			echo json_encode(array('changedone'=>$result));
		}
		else
		{
			$result['status']=0;
			echo json_encode(array('changedone'=>$result));
		}

	}

	function check_dob()
	{

		$dob = $this->input->post('dob');
	
		
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dob), date_create($today));
		$year = $diff->format('%y'); 
		if($year < 18)
		{
			$result['status']=1;
			echo json_encode(array('changedone'=>$result));
		}
		else
		{
			$result['status']=0;
			echo json_encode(array('changedone'=>$result));
		}

	}

	function check_userid()
	{

		$userid=$this->input->post('userid');

		$userid_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_unique_id'=>$userid,'user_id !='=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($userid_check) > 0)
		{
			$result['status']=1;
			echo json_encode(array('changedone'=>$result));
		}
		else
		{
			$result['status']=0;
			echo json_encode(array('changedone'=>$result));
		}

	}

	function check_email()
	{

		$email = $this->input->post('email');

		$email_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email,'user_id !='=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($email_check) > 0)
		{
			$result['status']=1;
			echo json_encode(array('changedone'=>$result));
		}
		else
		{
			$result['status']=0;
			echo json_encode(array('changedone'=>$result));
		}

	}



     	function registration_submit()
     	{

     		    //$inserted_id=$this->input->post('inserted_id');

		     	$user_unique_id=trim($this->input->post('user_id'));		
				$password=trim($this->input->post('password'));		
				$confirm_password=trim($this->input->post('confirm_password'));
				$f_name=trim($this->input->post('f_name'));
				$mid_name=trim($this->input->post('mid_name'));
				$l_name=trim($this->input->post('l_name'));
				$email_id=trim($this->input->post('email_id'));
				$dob=trim($this->input->post('dob'));
				$date = str_replace('/', '-', $dob);
				$gender=trim($this->input->post('gender'));
				$com_address=trim($this->input->post('com_address'));
				$country=trim($this->input->post('country'));
				$city=trim($this->input->post('city'));
				$coun_code=$this->input->post('coun_code');
				$phone_number=trim($this->input->post('phone_number'));

				       $full_name= $f_name.' '.$mid_name.' '.$l_name;
		               $phn_con=$coun_code.' '.$phone_number;

		               $created_on=date('Y-m-d H:i:s');


$mobile_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('mobile'=>$phone_number), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

if(count($mobile_check)>0){



	$this->session->set_flashdata('suc_msg','Mobile number already exist, please use another one .');
		 	 redirect($this->url->link(79), 'refresh');

}


		               if($_FILES['profile_picture']['name']=="")
			        {
			            $profile_picture="";
			            
			        }
			        else
			        {
			            $new_name1 = str_replace(".", "", microtime());
			            $new_name = str_replace(" ", "_", $new_name1);
			            $file_tmp = $_FILES['profile_picture']['tmp_name'];
			            $file = $_FILES['profile_picture']['name'];
			            $ext = substr(strrchr($file, '.'), 1);
			            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "bmp")
			            {
			                move_uploaded_file($file_tmp, "assets/upload/client/" . $new_name . "." . $ext);
			                $profile_picture = $new_name . "." . $ext;
			                //--------MAIN IAMGE-----//
			                $config['image_library'] = 'gd2';
			                $config['source_image'] = 'assets/upload/client/' . $profile_picture;   
			                $config['maintain_ratio'] = FALSE;
			               // $config['quality'] = "100%";
			                
			                    //--------MEDIUM IAMGE-----//
			                $config['create_thumb'] = FALSE;
			                $config['maintain_ratio'] = FALSE;
			                $config['new_image'] = 'assets/upload/client/'.$profile_picture;
			                $config['quality'] = "60%";
			                $config['width'] = 254;                        
			                $config['height']= 265;
			                $config['master_dim'] ="height" ;  


			               $this->image_lib->initialize($config);
			               $this->image_lib->resize(); 
			               $this->image_lib->clear();
			     
			            }
			 

			        }

			        if($_FILES['id_proof']['name']=="")
			        {
			            $id_proof_img="";
			            
			        }
			        else
			        {
			            $new_name1 = str_replace(".", "", microtime());
			            $new_name = str_replace(" ", "_", $new_name1);
			            $file_tmp = $_FILES['id_proof']['tmp_name'];
			            $file = $_FILES['id_proof']['name'];
			            $ext = substr(strrchr($file, '.'), 1);
			            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "doc" || $ext == "pdf")
			            {
			                move_uploaded_file($file_tmp, "assets/upload/client/" . $new_name . "." . $ext);
			                $id_proof_img = $new_name . "." . $ext;
			                //--------MAIN IAMGE-----//
			                $config['image_library'] = 'gd2';
			                $config['source_image'] = 'assets/upload/client/' . $id_proof_img;   
			                $config['maintain_ratio'] = FALSE;
			               // $config['quality'] = "100%";
			                
			                    //--------MEDIUM IAMGE-----//
			                $config['create_thumb'] = FALSE;
			                $config['maintain_ratio'] = FALSE;
			                $config['new_image'] = 'assets/upload/client/'.$id_proof_img;
			                $config['quality'] = "60%";
			                //$config['width'] = 254;                        
			                //$config['height']= 265;
			                $config['master_dim'] ="height" ;  


			               $this->image_lib->initialize($config);
			               $this->image_lib->resize(); 
			               $this->image_lib->clear();
			     
			            }
			 

			       }
 

				$user_data = array(

							'user_type_id'=>'4',							
							'user_unique_id'=>$user_unique_id,
							'login_pass'=>$password,
							'first_name'=>$f_name,
							'middle_name'=>$mid_name,
							'last_name'=>$l_name,
							'login_email'=>$email_id,
							'dob'=>date("Y-m-d", strtotime($date) ),
							'gender'=>$gender,
							'address'=>$com_address,
							'country'=>$country,
							'city'=>$city,
							'id_proof'=>$id_proof_img,
							'image'=>$profile_picture,
							'country_code'=>$coun_code,
							'mobile'=>$phone_number,
							'status'=>'active',
							'admin_approve'=>'No',
							'created_on'=>date('Y-m-d'),
							
							

							);

				 $data_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				

				 if(count($data_check)>0)
				 {
				 		
				 		$this->db->insert('tbl_user',$user_data);
				 		$inserted_id=$this->db->insert_id();
				 }
				 else
				 {
				 	   $this->db->insert('tbl_user',$user_data);
				 	   $inserted_id=$this->db->insert_id();
				 }

				  $reward_data = $this->common_model->common($table_name = 'tbl_reward', $field = array(), $where = array('id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				
                 $activity=@$reward_data[0]->activity;

				 $reward_data = array(
										'activity'=>$activity,
										'client_id'=>$inserted_id,
										'point'=>@$reward_data[0]->reward_point,
										'created_date'=>date('Y-m-d'),
									);

				$this->db->insert('tbl_client_reward',$reward_data);


				$total_client = $this->admin_model->selectOne('tbl_user','user_type_id','4');

				

              	if(strlen(count($total_client))==1)
              	{
                	$auto_id = 'TXLC00000'.$inserted_id;
              	}
              	if(strlen(count($total_client))==2)
              	{
                	$auto_id = 'TXLC0000'.$inserted_id;
              	}
              	if(strlen(count($total_client))==3)
              	{
                	$auto_id = 'TXLC000'.$inserted_id;
              	}
              	if(strlen(count($total_client))==4)
              	{
                	$auto_id = 'TXLC00'.$inserted_id;
              	}
$ip_address=$_SERVER['REMOTE_ADDR'];

              	// $uni_code= 'TXLC'.rand(000,999).$inserted_id;
				


	            $refer_data = array('referral_id'=>$auto_id,'ip_address'=>$ip_address);
	            $this->db->where('user_id',$inserted_id);
	            $this->db->update('tbl_user',$refer_data);

	            //******************************** Mail Sent To customer******************************************//


		           $data['email']=$this->common_model->common($table_name = 'tbl_email', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		            $admin_recive=$data['email'][0]->recieve_email;
		            $admin_from=$data['email'][0]->from_email;
		           
		        
		            $email_data['mail_data']=array
		            (
		               'uname'=>$full_name,
		               'uphn'=>$phn_con,
		                'uemail'=> $email_id,
		                
		                'upass'=>$password
		                
		            );

		            $this->email->set_mailtype("html");

		            $html_email_user = $this->load->view('mail_template/client_admin_registration_mail',$email_data, true);
		            $send_user_mail_html=$this->load->view('mail_template/client_registration_reply_mail_view',$email_data, true);

		           
		           // print_r($html_email_user);
		           // print_r($send_user_mail_html); 

		            $this->email->from($admin_from, 'TRIXLORECOM');
		            $this->email->to($admin_recive);
		            $this->email->subject('New Client Registration - TRIXLORECOM');
		            $this->email->message($html_email_user);
		            @$reponse=$this->email->send();

		            $this->email->from($admin_from,'TRIXLORE');
		            $this->email->to($email_id);
		            $this->email->subject('New Client Registration - TRIXLORECOM');
		            $this->email->message($send_user_mail_html);
		            @$reponse_reply=$this->email->send();

		           /* $login_avail=  $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_id'=>$inserted_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


					 $user_email= @$login_avail[0]->login_email; 
					 $user_ph= @$login_avail[0]->mobile;
					 $fname= @$login_avail[0]->first_name; 
					 $user_type= @$login_avail[0]->user_type_id;
					 $authorised= @$login_avail[0]->admin_approved; 

		        	$log_session = array(					  
				   
				   'user_email'=>$user_email,
				   'user_session_id'=>$inserted_id,
				   'user_fname'=>$fname,
				   'user_contact'=>$user_ph,
				   'authorised'=>$authorised,
				   'user_type'=>$user_type,
				   'logged_in' => TRUE
			   						);
		           $this->session->set_userdata($log_session);*/

			$this->session->unset_userdata('fb_first_name');
			$this->session->unset_userdata('fb_last_name');
			$this->session->unset_userdata('fb_last_name');
			$this->session->set_flashdata('suc_msg','Details successfully submitted, Please wait for admin approval.');
		 	 redirect($this->url->link(79), 'refresh');
	          
 }

 function google_login()
    {
       include_once APPPATH."third_party/google-api-php-client/Google_Client.php";
       include_once APPPATH."third_party/google-api-php-client/contrib/Google_Oauth2Service.php";

         // Google Project API Credentials
        $clientId = '788846769115-ea7o9q1qn5192amsrr204s4cqiftt360.apps.googleusercontent.com';
 $clientSecret = 'kkfJ_A8HAEpXz0DyFAGDRCus';

        $created_on=date('Y-m-d');
         
          $redirectUrl1 = base_url() . 'Social_login/google_login';

         // Google Client Configuration
         $gClient = new Google_Client();
         $gClient->setApplicationName('Login to nirnayakfinder.com');
         $gClient->setClientId($clientId);
         
         $gClient->setClientSecret($clientSecret);
         $gClient->setRedirectUri($redirectUrl1);
         $google_oauthV2 = new Google_Oauth2Service($gClient);
         $authUrl1 = $gClient->createAuthUrl();


         //echo $_GET['code']; exit;
        if (isset($_GET['code'])) {
             @$gClient->authenticate();
             $this->session->set_userdata('token', $gClient->getAccessToken());
             redirect($redirectUrl1);
         }

        $token = $this->session->userdata('token');
         if (!empty($token)) {
             $gClient->setAccessToken($token);
         }

         if ($gClient->getAccessToken())
         {
             $userProfile = $google_oauthV2->userinfo->get();
             // Preparing data for database insertion
             $userData['oauth_provider'] = 'google';
             $userData['oauth_uid'] = $userProfile['id'];
             $userData['first_name'] = $userProfile['given_name'];
             $userData['last_name'] = $userProfile['family_name'];
             $userData['email'] = $userProfile['email'];
             $userData['gender'] = @$userProfile['gender'];
             $userData['locale'] = $userProfile['locale'];
             //$userData['profile_url'] = $userProfile['link'];
             $userData['picture_url'] = $userProfile['picture'];

              $email_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$userData['email']), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		       // print_r($email_check);

		      
		             
		        if(count($email_check)>0)
		        {


		    

		        	$active_user=@$email_check[0]->id;

		        	  $this->session->set_userdata('activeuser', $active_user);


		        	redirect($this->url->link(95),'refresh');
				   
		        }
		        else
		        {
		        		//$this->db->insert('tbl_user',$user_data);
				       // $inserted_id = $this->db->insert_id();

		        	$data_session=array(
		        							'fb_first_name'=>$userData['first_name'],
		        							'fb_last_name'=>$userData['last_name'],
		        							'fb_email_id'=> $userData['email'],
		        							'fb_gender'=>$userData['gender'],
		        		               );

		        	$this->session->set_userdata($data_session);

				   

				   redirect($this->url->link(87),'refresh');

				   

				   
		        }



     	 }

     	}
  }
 
	
	

	   


?>