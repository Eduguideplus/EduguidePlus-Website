<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sign_up extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

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
	
	public function index()
	{
		
   
        $active_usr=$this->session->userdata('activeuser');
		if($active_usr!='')
		{
			redirect($this->url->link(95));
		}
      

      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

          $data['country'] = $this->common_model->common($table_name = 'countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         

		$this->load->view('common/header');
		$this->load->view('create_account',$data);
		$this->load->view('common/footer',$foot_data);
	}
   



	public function student_registration()
	{

		// echo "okk";exit;
		$name=$this->input->post('name');
		$gender=$this->input->post('gender');
		$date_of_birth=$this->input->post('date_of_birth');
		$pan_no=$this->input->post('pan_no');
		$aadhar_no=$this->input->post('aadhar_no');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$country=$this->input->post('country');
		$state=$this->input->post('state');
		$city=$this->input->post('city');
		$password=$this->input->post('conf_password');
		$address=$this->input->post('address');
		$terms=$this->input->post('terms');

		$collage=$this->input->post('collage');
		$course=$this->input->post('course');

		$current_date=date('Y-m-d,H:i:s');
		

		if($name!='' && $email!='' && $password!='' && $mobile!='' && $terms!='')
		{

			$email_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$phone_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_mob'=>$mobile,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				if(count($email_check)>0)
					{
						$this->session->set_flashdata('succ_msg','Sorry. Provided Email id already registered.');

						redirect($this->url->link(86));
					}
				else if(count($phone_check)>0)
					{
						$this->session->set_flashdata('succ_msg','Sorry. Provided Mobile number already registered.');

						redirect($this->url->link(86));
					}
				else
					{


				$data_array=array(
				'user_name'=>strtoupper($name),
				'user_type_id'=>'2',
				'batch_id'=>'19',
				'login_email'=>$email,
				'login_pass'=>$password,
				'login_mob'=>$mobile,
				'gender'=>$gender,
				'dob'=>$date_of_birth,
				'user_address'=>strtoupper($address),
				'country'=>$country,
				'state'=>$state,
				'city'=>$city,
				'pan'=>$pan_no,
				'adhar'=>$aadhar_no,
				'collage'=>$collage,
				'course'=>$course,
				'mob_verify'=>'Y',
				'email_verify'=>'Y',
				'status'=>'active',
				'created_on'=>$current_date

				);

			/*$this->db->insert('tbl_user',$data_array);
			 $insert_user_id = $this->db->insert_id();*/
			 $this->session->set_userdata($data_array);


			 $rand_otp= rand(100000,999999);
			 $otp_isert_data= array(
			 	'ph_no'=>$mobile,
			 	'otp'=>$rand_otp,
			 	'created_date'=>date('Y-m-d H:i:s')
			 );

			 $this->db->insert('tbl_otp', $otp_isert_data);

			 $mobileNumber = $mobile;

$senderId = "EDUPLS";

$otp_msg="Dear ".$name." Your Mobile number verification code is:".$rand_otp." Please use the Code to validate your mobile number and create your EDUGUIDEPLUS account.Thank you";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=".$senderId."&route=4&mobiles=".$mobileNumber."&authkey=314839AUIaBRWMh5e2adc2eP1&encrypt=&message=".$otp_msg,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$this->session->set_flashdata('succ_msg','Mobile number verification code has been sent to your provided Mobile number, please check and enter the code');
			 redirect($this->url->link(108));


		/*$type_id_details=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $total_student=count($type_id_details);

          $country_details= $this->common_model->common($table_name = 'countries', $field = array(), $where = array('id'=>$country), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    	 $city_details= $this->common_model->common($table_name = 'cities', $field = array(), $where = array('id'=>$city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


         
    	 
         $city_name= strtoupper($city_details[0]->name);
         $country_name=strtoupper($country_details[0]->sortname);
         $in_year=date('Y');
         $in_month=date('m');
         $in_country=$country_name;
         $in_city=substr($city_name, 0,3);

         $count_num=strlen($total_student);
         
         if($count_num==1)
         {
         	$in_id='0000'.$total_student;
         }
         if($count_num==2)
         {
         	$in_id='000'.$total_student;
         }
         if($count_num==3)
         {
         	$in_id='00'.$total_student;
         }
         if($count_num==4)
         {
         	$in_id='0'.$total_student;
         }
         if($count_num==5)
         {
         	$in_id=$total_student;
         }
          $final_user_code= $in_year.$in_month.$in_country.$in_city.$in_id;
         

    	$data_rel = array(
   							'user_code' => $final_user_code
 						 );

    	$this->db->where('id', $insert_user_id);
  		$this->db->update('tbl_user', $data_rel);

		


		$data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $admin_recive=$data['email'][0]->recieve_email;
                    $admin_from=$data['email'][0]->from_email;
                    
                
                    $email_data['mail_data']=array
                    (
                        'v_name'=> $name,
                        'v_email'=>$email,
                        'phone_no'=>$mobile,
                        'user_code'=>$final_user_code,
                        'v_password'=>$password,
                        'v_date'=> date('Y-m-d')
                        
                    );

                    $this->email->set_mailtype("html");
                    $send_user_mail_html=$this->load->view('mail_template/email_verify_request_mail',$email_data, true);


                   
                    $this->email->from($admin_from,'EDUGUIDEPLUS');
                    $this->email->to($email);
                  	$this->email->subject('Congratulations! You are successfully registered - EDUGUIDEPLUS');
                    $this->email->message($send_user_mail_html);
                    $this->email->send();


         			$this->email->set_mailtype("html");
         			$send_admin_mail_html=$this->load->view('mail_template/email_registration_admin',$email_data, true);


          $this->email->from($admin_from,'EDUGUIDEPLUS');
          $this->email->to($admin_recive);
          $this->email->subject('New Registration ( '.$final_user_code.' ) - EDUGUIDEPLUS');
          $this->email->message($send_admin_mail_html);
          $this->email->send();




		$this->session->set_flashdata('succ_msg','Congratulations! Your account has been successfully created. You can now Log in.');

		redirect($this->url->link(86));*/




		}

			
	}
	else
	{
		redirect($this->url->link(87));

	}
}

function student_registration_action()
{
		$name=$this->session->userdata('user_name');
		$gender=$this->session->userdata('login_mob');
		$date_of_birth=$this->session->userdata('dob');
		$pan_no=$this->session->userdata('pan');
		$aadhar_no=$this->session->userdata('adhar');
		$email=$this->session->userdata('login_email');
		$mobile=$this->session->userdata('login_mob');
		$country=$this->session->userdata('country');
		$state=$this->session->userdata('state');
		$city=$this->session->userdata('city');
		$password=$this->session->userdata('login_pass');
		$address=$this->session->userdata('user_address');
		

		$collage=$this->session->userdata('collage');
		$course=$this->session->userdata('course');

		$current_date=date('Y-m-d,H:i:s');

		$entered_otp= $this->input->post('otp_val');

		$chek_otp= $this->common_model->common($table_name = 'tbl_otp', $field = array(), $where = array('ph_no'=>$mobile,'otp'=>$entered_otp), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

if(count($chek_otp)>0)
{

	$this->db->where('ph_no',$mobile);
	$this->db->delete('tbl_otp');

$data_array=array(
				'user_name'=>strtoupper($name),
				'user_type_id'=>'2',
				'batch_id'=>'19',
				'login_email'=>$email,
				'login_pass'=>$password,
				'login_mob'=>$mobile,
				'gender'=>$gender,
				'dob'=>$date_of_birth,
				'user_address'=>strtoupper($address),
				'country'=>$country,
				'state'=>$state,
				'city'=>$city,
				'pan'=>$pan_no,
				'adhar'=>$aadhar_no,
				'collage'=>$collage,
				'course'=>$course,
				'mob_verify'=>'Y',
				'email_verify'=>'Y',
				'status'=>'active',
				'created_on'=>$current_date

				);

		//echo '<pre>'; print_r($data_array);

			$this->db->insert('tbl_user',$data_array);
			 $insert_user_id = $this->db->insert_id();

			 $type_id_details=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $total_student=count($type_id_details);

          $country_details= $this->common_model->common($table_name = 'countries', $field = array(), $where = array('id'=>$country), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    	 $city_details= $this->common_model->common($table_name = 'cities', $field = array(), $where = array('id'=>$city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


         
    	 
         $city_name= strtoupper($city_details[0]->name);
         $country_name=strtoupper($country_details[0]->sortname);
         $in_year=date('Y');
         $in_month=date('m');
         $in_country=$country_name;
         $in_city=substr($city_name, 0,3);

         $count_num=strlen($total_student);
         
         if($count_num==1)
         {
         	$in_id='0000'.$total_student;
         }
         if($count_num==2)
         {
         	$in_id='000'.$total_student;
         }
         if($count_num==3)
         {
         	$in_id='00'.$total_student;
         }
         if($count_num==4)
         {
         	$in_id='0'.$total_student;
         }
         if($count_num==5)
         {
         	$in_id=$total_student;
         }
          $final_user_code= $in_year.$in_month.$in_country.$in_city.$in_id;
         

    	$data_rel = array(
   							'user_code' => $final_user_code
 						 );

    	$this->db->where('id', $insert_user_id);
  		$this->db->update('tbl_user', $data_rel);

		


		$data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $admin_recive=$data['email'][0]->recieve_email;
                    $admin_from=$data['email'][0]->from_email;
                    
                
                    $email_data['mail_data']=array
                    (
                        'v_name'=> $name,
                        'v_email'=>$email,
                        'phone_no'=>$mobile,
                        'user_code'=>$final_user_code,
                        'v_password'=>$password,
                        'v_date'=> date('Y-m-d')
                        
                    );

                    $this->email->set_mailtype("html");
                    $send_user_mail_html=$this->load->view('mail_template/email_verify_request_mail',$email_data, true);


                   
                    $this->email->from($admin_from,'EDUGUIDEPLUS');
                    $this->email->to($email);
                  	$this->email->subject('Congratulations! You are successfully registered - EDUGUIDEPLUS');
                    $this->email->message($send_user_mail_html);
                    $this->email->send();


         			$this->email->set_mailtype("html");
         			$send_admin_mail_html=$this->load->view('mail_template/email_registration_admin',$email_data, true);


          $this->email->from($admin_from,'EDUGUIDEPLUS');
          $this->email->to($admin_recive);
          $this->email->subject('New Registration ( '.$final_user_code.' ) - EDUGUIDEPLUS');
          $this->email->message($send_admin_mail_html);
          $this->email->send();


$this->session->unset_userdata('user_name');
$this->session->unset_userdata('user_type_id');
$this->session->unset_userdata('login_email');
$this->session->unset_userdata('login_mob');
$this->session->unset_userdata('gender');
$this->session->unset_userdata('dob');
$this->session->unset_userdata('user_address');
$this->session->unset_userdata('country');
$this->session->unset_userdata('state');
$this->session->unset_userdata('city');
$this->session->unset_userdata('pan');

		$this->session->set_flashdata('succ_msg','Congratulations! Your account has been successfully created. You can now Log in.');

		redirect($this->url->link(86));


}

else{
	$this->session->set_flashdata('succ_msg','Invalid Otp');
			 redirect($this->url->link(108));
}
		
}



function check_email()
	{

		$email = $this->input->post('email');

		$email_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

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

function check_phone()
	{

		$phone = $this->input->post('phone');

		$phone_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_mob'=>$phone,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

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

public function registration_otp()
{
	
		$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         

	
		$this->load->view('common/header');
		$this->load->view('registration_otp');
		$this->load->view('common/footer',$foot_data);
	
}


public function registration_otp_submit()
{

	$otp=$this->input->post('otp_val');
	$id=$this->input->post('hid_user');
	//$pwd=$this->input->post('password');

	 $current_time=time();
	 
	 $otp_exist=$this->common_model->common($table_name = 'tbl_reg_otp', $field = array(), $where = array('user_id'=>$id,'reg_otp'=>$otp), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 

	 if(count(@$otp_exist>0))
           {

            		  $validity=@$otp_exist[0]->valid_time;


		            if(@$validity >= $current_time)
		            {

		            	$data_arr=array(
				            'mob_verify'=>'Y',
				            'modified_by'=>$id,
				            'modified_on'=>date('Y-m-d,H:i:s')
				            );
		            	$this->db->where('id',$id);
				        $this->db->update('tbl_user',$data_arr);
		            	
		            	
		            	$this->session->set_userdata('step2user', $id);
							
						$succ_msg="Your Mobile No. has been verified successfully";
		               $this->session->set_flashdata('message', $succ_msg);	
						redirect($this->url->link(110));
		                
		            }
		            else
		            {
		            	$this->db->where('id',$id);
						$this->db->delete('tbl_user',$data_arr);
						$errorMsg="Sorry!! Your Session Expired.Please Try again";
		               	$this->session->set_flashdata('message', $errorMsg);
						redirect($this->url->link(87));

							
		            }
           }
           else
           {
           		$errorMsg="Sorry!! Your OTP Validation Failed";
              	$this->session->set_flashdata('message', $errorMsg);
              	$this->db->where('id',$id);
				$this->db->delete('tbl_user',$data_arr);
				redirect($this->url->link(1));
           }
	 

}



function send_sms($mob_no,$uname,$otp)
{

$mobileNumber = $mob_no;

$senderId = "URSFRM";

$otp_msg="Dear ".$uname." Your OTP for mobile number verification is:".$otp." Please enter OTP to validate your mobile number. This OTP is valid for 5 minutes. Please do not share your OTP with anyone. From:NirnayakFinder";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=".$senderId."&route=4&mobiles=".$mobileNumber."&authkey=248190AoE9UD3CV5bf3b533&encrypt=&message=".$otp_msg,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

/*if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}*/

}

function email_veification()
{
	$validation_code=$this->uri->segment(2);
	// $user_id=$this->uri->segment(3);
	// echo $user_id;exit;
	// $user_id=$this->session->userdata('activeuser');

	$validation=$this->common_model->common($table_name = 'tbl_email_validation_code', $field = array(), $where = array('code'=>$validation_code), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	@$user_id=@$validation[0]->user_id;

	if(count($validation) > 0)
	{
		$data_arr=array('email_verify'=>'Y','modified_by'=>'1','modified_on'=>date('Y-m-d,H:i:s'));

		$this->db->where('id',$user_id);
		$this->db->update('tbl_user',$data_arr);

		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_email_validation_code');


		$this->session->set_userdata('activeuser', $user_id);

		redirect($this->url->link(95));
	}
	else
	{
		echo "This validation link is invalid";
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

		/*$indx_arr=array();

		for($i=0;$i<3;$i++)
 		{
	 		 $indx=rand($start,$limit);

	 		 if (in_array($indx, $indx_arr))
			  {
			  	$indx=rand($start,$limit);
			  }

			  array_push($indx_arr,$indx);
 		}

 		$check=$this->has_dupes($indx_arr);
 		if($check==1)
 		{
 			$this->random_generator($start,$limit);
 		}
 		else
 		{
 			return $indx_arr;
 		}
*/



	}




function get_state_by_country()
{
  $country_id= $this->input->post('country_id');

  

    $state_list= $this->common_model->common($table_name ='states', $field = array(), $where = array('country_id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    //echo "<pre>";print_r($state_list);exit;

    echo json_encode(array('state_list'=>$state_list));
}


public function get_exam_by_group()
{	 $category_id=$this->input->post('category_id');
	      $data=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}

function get_city_by_state()
{
  $state_id= $this->input->post('state_id');


    $city_list= $this->common_model->common($table_name ='cities', $field = array(), $where = array('state_id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    //echo "<pre>";print_r($state_list);exit;

    echo json_encode(array('city_list'=>$city_list));
}





function forget_password_page()
{

	$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

       $data['area_details']=$this->common_model->common($table_name ='tbl_highlight_area', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		$this->load->view('common/header');
		$this->load->view('forget_password',$data);
		$this->load->view('common/footer',$foot_data);
}


public function forget_password_otp()
{

	$user_id=$this->session->userdata('otp_user');

		$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

           $data['user_dtls'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         

	
		$this->load->view('common/header');
		$this->load->view('forget_password_otp',$data);
		$this->load->view('common/footer',$foot_data);
	
}


function reset_pass_email_sent()
{
	// echo "okk";


		$email=$this->input->post('email1');
		// echo $email;exit;
        $user_otp=rand(000000,999999);
	

	            $data=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	            $data_mob=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_mob'=>$email,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	           

 				if(count($data_mob)>0)
 				{
 					@$user_id=$data_mob[0]->id;
 					@$uname=$data_mob[0]->user_name;

 					

$mobileNumber = $email;

$senderId = "EDUPLS";

$otp_msg="Dear ".$uname." Your OTP for Forget password verification is:".$user_otp." Please enter OTP to validate your mobile number. This OTP is valid for 5 minutes.Thank you";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=".$senderId."&route=4&mobiles=".$mobileNumber."&authkey=248190AoE9UD3CV5bf3b533&encrypt=&message=".$otp_msg,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

/*if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}*/
$otp_data=array(
                  'user_id'=>$user_id,
                   'otp_code'=>$user_otp
                );
$this->db->insert('tbl_user_otp',$otp_data);

$this->session->set_userdata('otp_user', $user_id);

		$this->session->set_flashdata('succ_msg','Thank You.OTP has been sent your register mobile no..');
		redirect('Sign_up/forget_password_otp','refresh');

						
 				}

 				


	            elseif(count($data)>0)
	            {
	            	 @$user_id=$data[0]->id;
 					@$uname=$data[0]->user_name;

	            	$data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $admin_recive=$data['email'][0]->recieve_email;
                    $admin_from=$data['email'][0]->from_email;

                    $otp_data=array(
                    	             'user_id'=>$user_id,
                    	             'otp_code'=>$user_otp
                                    );
					$this->db->insert('tbl_user_otp',$otp_data);

                     $email_data['mail_data']=array
                                               (
                									'uotp'=>$user_otp,
                									'uname'=>$uname
                								);
 // print_r($email_data['mail_data']);
                       $this->email->set_mailtype("html");  

                  $html_email_user = $this->load->view('mail_template/password_reset_otp_mail',$email_data, true);   

                         // print_r($html_email_user);exit;
                       
                        $this->email->from($admin_from,'EDUGUIDEPLUS');
			            $this->email->to($email);
			            $this->email->subject('EDUGUIDEPLUS | OTP for reset password');
			            $this->email->message($html_email_user);
         			    @$reponse=$this->email->send();

         			    $this->session->set_userdata('otp_user', $user_id);

         $this->session->set_flashdata('succ_msg','Thank You.OTP has been sent your register Email id..');
		redirect('Sign_up/forget_password_otp','refresh');                 
         			    	

	            }

	            else
 				{
 					$this->session->set_flashdata('error_massage','Invalid your registererd Email or Mobile No. ');
					redirect('Sign_up/forget_password_page','refresh');
 				}
	            
	            


}


public function forget_password_otp_action()
{

	$otp=$this->input->post('otp_val');
	$id=$this->input->post('hid_user');
	$pwd=$this->input->post('new_password');

	 $current_time=time();
	 
	 $otp_exist=$this->common_model->common($table_name = 'tbl_user_otp', $field = array(), $where = array('user_id'=>$id,'otp_code'=>$otp), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 

	 if(count(@$otp_exist) > 0)
           {

            		 

		            	$data_arr=array(
				            'login_pass'=>$pwd,
				            
				            );
		            	$this->db->where('id',$id);
				        $this->db->update('tbl_user',$data_arr);

				        $this->db->where('user_id',$id);
				        $this->db->delete('tbl_user_otp');
		            	
		            	
		            	$this->session->set_userdata('step2user', $id);
							
						$succ_msg="Your password. has been reset successfully";
		               $this->session->set_flashdata('succ_msg', $succ_msg);	
						redirect($this->url->link(86));
		                
		           
           }
           else
           {
           		$errorMsg="Sorry!! Your OTP Validation Failed";
              	$this->session->set_flashdata('message', $errorMsg);
              	$this->db->where('user_id',$id);
				$this->db->delete('tbl_user_otp');
				redirect('sign_up/forget_password_otp');
           }
	 

}

function resend_otp()
{
	$user_id=$this->input->post('user_id');
	$user_otp=rand(000000,999999);

	$data=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	@$user_mobile_no=$data[0]->login_mob;
	@$uname=$data[0]->user_name;

	$mobileNumber = $user_mobile_no;

$senderId = "EDUPLS";

$otp_msg="Dear ".@$uname." Your OTP for Forget password verification is:".$user_otp." Please enter OTP to validate your mobile number. This OTP is valid for 5 minutes. Please do not share your OTP with anyone. Thank you.";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=".$senderId."&route=4&mobiles=".$mobileNumber."&authkey=248190AoE9UD3CV5bf3b533&encrypt=&message=".$otp_msg,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


$otp_data=array(
                  'user_id'=>$user_id,
                   'otp_code'=>$user_otp
                );
$this->db->where('user_id',$user_id);

if($this->db->update('tbl_user_otp',$otp_data))
{
	$result=1;
}
else
{
	$result=0;
}

echo json_encode(array('result'=>$result));




}

function registion_resend_otp()
{
	$user_id=$this->input->post('user_id');
	$user_otp=rand(000000,999999);

	$data=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	@$user_mobile_no=$data[0]->login_mob;
	@$uname=$data[0]->user_name;

	$mobileNumber = $user_mobile_no;

$senderId = "EDUPLS";

$otp_msg="Dear ".@$uname." Your OTP for Forget password verification is:".$user_otp." Please enter OTP to validate your mobile number. This OTP is valid for 5 minutes. Please do not share your OTP with anyone. Thank you.";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=".$senderId."&route=4&mobiles=".$mobileNumber."&authkey=314839AUIaBRWMh5e2adc2eP1&encrypt=&message=".$otp_msg,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


$otp_data=array(
                  'user_id'=>$user_id,
                   'reg_otp'=>$user_otp
                );
$this->db->where('user_id',$user_id);

if($this->db->update('tbl_reg_otp',$otp_data))
{
	$result=1;
}
else
{
	$result=0;
}

echo json_encode(array('result'=>$result));
}


function resend_otp_registration()
{
	$user_id=$this->input->post('user_id');
	$user_otp=rand(000000,999999);

	

	@$user_mobile_no=$user_id;
	@$uname=$this->session->userdata('user_name');

	$mobileNumber = $user_mobile_no;

$senderId = "EDUPLS";

$otp_msg="Dear ".@$uname." Your Mobile number verification code is:".$user_otp." Please use the Code to validate your mobile number and create your EDUGUIDEPLUS account.Thank you";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=".$senderId."&route=4&mobiles=".$mobileNumber."&authkey=314839AUIaBRWMh5e2adc2eP1&encrypt=&message=".$otp_msg,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


$otp_data=array(
                  
                   'otp'=>$user_otp,
                   'created_date'=>date('Y-m-d H:i:s')
                );
$this->db->where('ph_no',$user_id);

if($this->db->update('tbl_otp',$otp_data))
{
	$result=1;
}
else
{
	$result=0;
}

echo json_encode(array('result'=>$result));
}
	
	


	
}
?>