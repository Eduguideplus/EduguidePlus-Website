<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class sign_in extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}
	

	function registration_submit()
	{



		$json    			=  file_get_contents('php://input');
		$obj     			=  json_decode($json);



		$address = $obj->address;
$country_id = $obj->country;

		// echo $address;
		// exit;
		$adhar_number = @$obj->adhar_number;
		$city = $obj->city;
		
		$course = $obj->course;
		// //exit;
		$date = $obj->date;
		$email_id = $obj->email_id;
		$full_name = $obj->full_name;
		$gender = $obj->gender;
		$mobile_number = $obj->mobile_number;
		$pan_number = @$obj->pan_number;
		$password = $obj->password;
		$school_clg = $obj->school_clg;
		$state_id = $obj->state;


	 $created_on=date('Y-m-d');
    //$user_code='MECH-'.rand('0000','9999');



$counntry_list=$this->common_model->common($table_name = 'countries', $field = array(), $where = array(
	'id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$state_list=$this->common_model->common($table_name = 'states', $field = array(), $where = array('id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$state=$state_list[0]->name;
$country=$counntry_list[0]->name;
//$currency=$counntry_list[0]->currency_code;



$mobile_checking=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_mob'=>$mobile_number,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$email_checking=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email_id,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


	
 
		   if(count($mobile_checking)>0){
	            $result = "number_exist";
		   		echo json_encode(array('result'=>$result));                    
		   }else if(count($email_checking)>0){
		   	 $result = "email_exist";
		   	echo json_encode(array('result'=>$result));  

		   }else{

		   	



				$data=array(
				'user_name'=>$full_name,
				'user_type_id'=>'2',
				'batch_id'=>'19',
				'login_email'=>$email_id,
				'login_pass'=>$password,
				'login_mob'=>$mobile_number,
				'gender'=>$gender,
				'dob'=>$date,
				'user_address'=>$address,
				'country'=>$country_id,
				'state'=>$state_id,
				'city'=>$city,
				'pan'=>$pan_number,
				'adhar'=>$adhar_number,
				'collage'=>$school_clg,
				'course'=>$course,
				'mob_verify'=>'Y',
				'email_verify'=>'Y',
				'status'=>'active',
				'created_on'=>$created_on

				);



				$this->db->insert('tbl_user',$data);

				 $insert_user_id = $this->db->insert_id();

			 $type_id_details=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $total_student=count($type_id_details);

          $country_details= $this->common_model->common($table_name = 'countries', $field = array(), $where = array('id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
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

			   

		$result=1;
echo json_encode(array('result'=>$result));
		   }
				
	
						
}


	public function login_action()
	{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$userLoginid = $obj->username;
		$userLoginpass = $obj->password;
		//$cartsessionId = $obj->password;
		//$last_login_time=date('Y-m-d H:i:s');
		//$isCheckout=0;

		$login_avail1=  $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_mob'=>$userLoginid,'login_pass'=>$userLoginpass,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$login_avail2=  $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$userLoginid,'login_pass'=>$userLoginpass,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($login_avail1)>0)
		{
			$result=1;
			$user_id= $login_avail1[0]->id;
			$user_email= $login_avail1[0]->login_email;
			$user_fname= $login_avail1[0]->user_name;
			$profile_photo= base_url().'assets/uploads/student_pic/'.$login_avail1[0]->profile_photo;

			  echo json_encode(array('user_id'=>$user_id,'profile_photo'=>$profile_photo,'user_fname'=>$user_fname,'result'=>$result));
		
		}else if(count($login_avail2)>0){

			$result=1;
			$user_id= $login_avail2[0]->id;
			$user_email= $login_avail2[0]->login_email;
			$user_fname= $login_avail2[0]->user_name;
			$profile_photo= base_url().'assets/uploads/student_pic/'.$login_avail2[0]->profile_photo;

			//$user_mobile= $login_avail[0]->mobile;
			//$status= $login_avail[0]->status;
			//$currency= $login_avail[0]->currency;
			


			  echo json_encode(array('profile_photo'=>$profile_photo,'user_id'=>$user_id,'user_fname'=>$user_fname,'result'=>$result));
		}else{
			$result=0;
			 echo json_encode(array('result'=>$result));
		}

	}





function myaccount(){

	$json    =  file_get_contents('php://input');

	$obj     =  json_decode($json);

	$user_id     				=  $obj->user_id;



$userprofile=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id,), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');





if(count($userprofile)>0){

	 $result =1;

	 echo json_encode(array('user_perofile'=>$userprofile,'result'=>$result));



}else{

     $result =0;

	 echo json_encode(array('result'=>$result));

}

}



function user_profile_update()

	{

		$json    =  file_get_contents('php://input');

      $obj     =  json_decode($json);

      $user_id     =  $obj->user_id;
      $name     =  $obj->name;
      $location     =  $obj->location;
      $country     =  $obj->country;
      $state     =  $obj->state;
      $city     =  $obj->city;
      $grage_name     =  $obj->grage_name;
      $mobile_number     =  $obj->mobile_number;

      

      $data=array(

      						'first_name'=>$name,
 							'address'=>$location,
							'country '=>$country,
							'garage_name'=>$grage_name,
							'state '=>$state,
							'city '=>$city,
							'mobile'=>$mobile_number,


			);

		/*echo '<pre>';

		print_r($data); exit;*/

		$this->db->where('user_id',$user_id);

		$this->db->update('tbl_user',$data);

		$result=1;

					echo json_encode(array('result'=>$result));

 }


public function update_profile_pic()
{

	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
	
$posted        = file_get_contents("php://input");
   $obj           =  json_decode($posted);

   $fileName      =  strip_tags($obj->image);
   $fileData      =  strip_tags($obj->_SUFFIX);
   $id     =  $obj->user_id;
           

          /* echo $fileName;
           echo $fileData;
           echo $id;*/
  
$filenmae= time().$fileData;
                
 $uri           =  substr($fileName,strpos($fileName,",")+1);


   // Replace any spaces in the formatted base64 URI string with pluses to avoid corrupted file data
   $encodedData   = str_replace(' ','+',$uri);


   // Decode the formatted base64 URI string
   $decodedData   = base64_decode($encodedData);


   try {

      // Write the base64 URI data to a file in a sub-directory named uploads
      if(!file_put_contents('assets/upload/student_pic/' . $filenmae, $decodedData))
      {
         // Uh-oh! Something went wrong - inform the user
         echo json_encode(array('message' => 'Error! The supplied data was NOT written '));
      }


               
                        
                        

                 
                $image =$filenmae;

              //  $insert_data['file_name'] = $data['file_name'];

                $data_arr = array('profile_photo' =>$image );
                $this->db->where("id",$id);
                $this->db->update('tbl_user', $data_arr);

             

      // Everything went well - inform the user :)
      echo json_encode(array('message' => 'The file was successfully uploaded'));

   }
   catch(Exception $e)
   {
      // Uh-oh! Something went wrong - inform the user
      echo json_encode(array('message' => 'Fail!'));
   }
                

}








function check_password()
{

		$json    			=  file_get_contents('php://input');
		$obj     			=  json_decode($json);  
	  	$user_id          =  $obj->user_id;
	  	$password          =  $obj->oldPassword;
 
	  	$data=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id,'login_pass'=>$password), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	  		if(count($data)>0){
	  			$result=1;
	  			echo json_encode(array('result'=>$result));

	  		}else{
	  			$result =0;
	  			echo json_encode(array('result'=>$result));
	  		}

	}


	function change_password_action()
	{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

   		$user_id = $obj->user_id;
   		$new_password = $obj->newpassword;



							$data=array(

									'login_pass'=>$new_password
								);

							$this->db->where('id',$user_id);
		                    $this->db->update('tbl_user',$data);
		                  
		                   // $this->db->where('user_id',$user_id);
                            
                         $result=1;		                  
		             

echo json_encode(array('result'=>$result));
}




function checkmobile_number()
{
	// echo "okk";


		$email=$this->input->post('email1');

		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

   		$email = $obj->mobileNumber;

		// echo $email;exit;
        $user_otp=rand(000000,999999);
	


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

		 		$result=1;
 				echo json_encode(array('result'=>$result,'user_id'=>$user_id));	
						
 				}else{
 			   $result=0;
 				echo json_encode(array('result'=>$result));		
 				}

}


public function forget_password_otp_action()
{


		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

   		$otp = $obj->otp;
   		$id = $obj->user_id;
   		$pwd = $obj->newpassowrd;
	




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
		            	 $result=1;
 				echo json_encode(array('result'=>$result));		
		
		                
		           
           }
           else
           {

           	 $result=0;
 				echo json_encode(array('result'=>$result));		
           }
	 

}





function otp_verification_register()
{
	// echo "okk";


		
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

   		$email = $obj->mobile_number;

		// echo $email;exit;
        $user_otp=$obj->otp_number;;

	            // $data_mob=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_mob'=>$email,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	           

 				// if(count($data_mob)>0)
 				// {
 				// 	@$user_id=$data_mob[0]->id;
 				// 	@$uname=$data_mob[0]->user_name;

 					

$mobileNumber = $email;

$senderId = "EDUPLS";

$otp_msg="Dear user your OTP for registation verification is:".$user_otp." Please enter OTP to validate your mobile number. This OTP is valid for 5 minutes.Thank you";

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
$result=1;
echo json_encode(array('result'=>$result));

/*if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}*/
// $otp_data=array(
//                   'user_id'=>$user_id,
//                    'otp_code'=>$user_otp
//                 );
// $this->db->insert('tbl_user_otp',$otp_data);

// 		 		$result=1;
//  				echo json_encode(array('result'=>$result,'user_id'=>$user_id));	
						
//  				}else{
//  			   $result=0;
//  				echo json_encode(array('result'=>$result));		
//  				}

}

































// function user_bank_details(){

// 	$json    =  file_get_contents('php://input');

// 	$obj     =  json_decode($json);

// 	$user_id =  $obj->user_id;



// $bank_details=$this->common_model->common($table_name = 'tbl_bank', $field = array(), $where = array('party_name'=>$user_id,), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');





// if(count($bank_details)>0){

// 	 $result =1;

// 	 echo json_encode(array('user_bank_details'=>$bank_details,'result'=>$result));



// }else{

//      $result =0;

// 	 echo json_encode(array('result'=>$result));

// }

// }

// function user_update_bank_details()

// 	{

// 		$json    =  file_get_contents('php://input');

//       $obj     =  json_decode($json);

//       $user_id     =  $obj->user_id;
//       $bank_name=$obj->bank_name;
//       $IFSC=$obj->IFSC;
//       $MICR=$obj->MICR;
//       $account_no=$obj->account_no;
//       $account_name=$obj->account_name;


      

//       $data=array(

      						
//  							'bank_name'=>$bank_name,
// 							'IFSC'=>$IFSC,
// 							'MICR'=>$MICR,
// 							'account_no'=>$account_no,
// 							'account_name'=>$account_name,


// 			);

// 		/*echo '<pre>';

// 		print_r($data); exit;*/

// 		$this->db->where('party_name',$user_id);

// 		$this->db->update('tbl_bank',$data);

// 		$result=1;

// 					echo json_encode(array('result'=>$result));

//  }


// function check_password()
// {

// 		$json    			=  file_get_contents('php://input');
// 		$obj     			=  json_decode($json);  
// 	  	$user_id          =  $obj->user_id;
// 	  	$password          =  $obj->password;

// 	  	$data=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_id'=>$user_id,'login_pass'=>$password), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

// 	  		if(count($data)>0){
// 	  			$result=1;
// 	  			echo json_encode(array('result'=>$result));

// 	  		}else{
// 	  			$result =0;
// 	  			echo json_encode(array('result'=>$result));
// 	  		}

// 	}



// 	function change_password_action()
// 	{
// 		$json    =  file_get_contents('php://input');
//    		$obj     =  json_decode($json);

//    		$user_id = $obj->user_id;
//    		$new_password = $obj->new_password;

// 							$data=array(

// 									'login_pass'=>$new_password
// 								);

// 							$this->db->where('user_id',$user_id);
// 		                    $this->db->update('tbl_user',$data);
		                  
// 		                   $this->db->where('user_id',$user_id);
                            
//                          $result=1;		                  
		             

// echo json_encode(array('result'=>$result));
// }

// 	function user_imageUpdate()
// 	{
// 		$json    =  file_get_contents('php://input');
//    		$obj     =  json_decode($json);

//    		$user_id = $obj->user_id;
//    		$user_img = $obj->user_img;

// 							$data=array(

// 									'image'=>$user_img
// 								);

// 							$this->db->where('user_id',$user_id);
// 		                    $this->db->update('tbl_user',$data);
		                  
// 		                   $this->db->where('user_id',$user_id);
                            
//                          $result=1;		                  
		             

// echo json_encode(array('result'=>$result));
// }

}

