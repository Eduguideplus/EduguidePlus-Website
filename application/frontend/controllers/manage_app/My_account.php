<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class my_account extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();
           $this->load->library('image_lib');

	}

	public function submit_schedul_meet()
	{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		

					$user_id=$obj->user_id;

					 $schdule_day=$obj->schedule_date;
					 $schdule_time=$obj->schedule_time;
					 $interested_course=$obj->interested_course;
					
					
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
      
echo json_encode(array('result'=>1));

	}
	
	public function reset_action()
	{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$userLoginid = $obj->userLoginid;
		//$userLoginid = 9775653770;
		$user_otp=rand(000000,999999);

		$data=  $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$userLoginid,'status'=>'active','user_type_id'=>'3'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$data_mob=  $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('mobile'=>$userLoginid,'status'=>'active','user_type_id'=>'3'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($data_mob)>0)
 				{
 					$user_id=$data_mob[0]->user_id;
 					$fullname=@$data_mob[0]->first_name;


 					 $otp_data=array(
                    	             'user_id'=>$user_id,
                    	             'user_otp'=>$user_otp
                                    );
						$this->db->insert('tbl_user_otp',$otp_data);

 					if(@$data_mob[0]->first_name=="")
 					{
 						$fullname="Customer";
 					}
 					else
 					{
 						$fullname=$fullname;
 					}

 						$sms_text='Dear '.$fullname.', Your OTP to reset your login password is '.$user_otp.'. Thank you';
		            $msg = urlencode($sms_text);
		            $num=$userLoginid;
		            //$datetime= date('Y-m-d');
		            

		           $route = 4;
				   $senderId = 'MDFRES';
				   $authKey = "269308A2NmER5qcN5c99f1c0";
				   $postData = array(
    						'authkey' => $authKey,
    						'mobiles' => $num,
    						'message' => $msg,
    						'sender' => $senderId,
    						'route' => $route
							);

					$this->common_model->sms_send($postData);

		             

						$result=1;
 				}
	            


	            else if(count($data)>0)
	            {
	            	 $user_login_pass=$data[0]->login_pass;

	            	  $user_fname=$data[0]->first_name;
	            	  $user_lname=$data[0]->last_name;
                       $user_id=$data[0]->user_id;
	            	 $user_email=$data[0]->login_email;

	            	$data['email']=$this->common_model->common($table_name = 'tbl_email', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	            	
                    $admin_from=$data['email'][0]->from_email;

                    $otp_data=array(
                    	             'user_id'=>$user_id,
                    	             'user_otp'=>$user_otp
                                    );
					$this->db->insert('tbl_user_otp',$otp_data);
                     $email_data['mail_data']=array
                                               (
                									'uotp'=>$user_otp,
                									'ufname'=>$user_fname,
                									'ulname'=>$user_lname
               
          										);
 
                  $this->email->set_mailtype("html");  

                  $html_email_user = $this->load->view('mail_template/reset_pass_mail_view',$email_data, true);   

                         // print_r($html_email_user);exit;
                       
                        $this->email->from($admin_from,'My DailyFresh');
			            $this->email->to($user_email);
			            $this->email->subject('My DailyFresh | Forgot password');
			            $this->email->message($html_email_user);
         			    @$reponse=$this->email->send();

         			                 
         			    	$result=1;

	            }
	            else{
	            	$result=0;
	            }

	            echo json_encode(array('result'=>$result));
	}

	public function addnetBalance()
	{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$sessionId = $obj->sessionId;
		
		$addAmount = $obj->addAmount;

		$string = str_shuffle('QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuioplkjhgfdsazxcvbnm');
        $txn_id = substr($string,-10);

		$balanceData= array(
								'user_id'=>$sessionId,
								'txn_amount'=>$addAmount,
								'txn_type'=>'Credit',
								'txn_id'=>$txn_id,
								'txn_date'=>date('Y-m-d H:i:s'),
								'txn_status'=>'Processing'
							);
		$this->db->insert('tbl_user_net_balance_details', $balanceData);
		$insertId= $this->db->insert_id();

		$user_info= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_id'=>$sessionId), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$fullname= @$user_info[0]->first_name;
		$email= @$user_info[0]->login_email;
		$mobile= @$user_info[0]->mobile;

		$amount= $addAmount;
		
		echo json_encode(array('insertId'=>$insertId,'fullname'=>$fullname,'email'=>$email,'mobile'=>$mobile,'amount'=>$amount,'txn_id'=>$txn_id));

	}

	public function password_update_action()
	{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$resetotp = $obj->resetotp;
		
		$newpass = $obj->newpass;

		$check_otp= $this->common_model->common($table_name = 'tbl_user_otp', $field = array(), $where = array('user_otp'=>$resetotp), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($check_otp)>0)
		{
			$user_id= $check_otp[0]->user_id;
			$user_otp_id= $check_otp[0]->id;

			$password_data= array(
									'login_pass'=>$newpass
									);

			$this->db->where('user_id', $user_id);
			$this->db->update('tbl_user', $password_data);

			$this->db->where('id', $user_otp_id);
			$this->db->delete('tbl_user_otp');

			$result= 1;
		}
		else{
			$result= 0;
		}

		echo json_encode(array('result'=>$result));
	}

	public function notificationList()
{
	$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$usersessionId = $obj->usersessionId;
		$notlist_array= array();

		$total_notifications= $this->common_model->common($table_name = 'tbl_client_notifications', $field = array(), $where = array('client_id'=>$usersessionId), $where_or = array(), $like = array(), $like_or = array(), $order = array('notification_id'=>'DESC'), $start = '', $end = '');

		foreach($total_notifications as $row)
		{
			$row_array['not_id']= $row->notification_id;
			$row_array['not_msg']= $row->notifications;
			$row_array['not_date']= $row->added_date;
			array_push($notlist_array, $row_array);

		}

		$update_data= array(
							'is_view'=>'Y'
						);
		$this->db->where('client_id',$usersessionId);
		$this->db->update('tbl_client_notifications',$update_data);

		echo json_encode($notlist_array);


}

	public function notification_list()
	{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$usersessionId = $obj->usersessionId;

		$new_notifications= $this->common_model->common($table_name = 'tbl_client_notifications', $field = array(), $where = array('client_id'=>$usersessionId,'is_view'=>'N'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$total_notifications= $this->common_model->common($table_name = 'tbl_client_notifications', $field = array(), $where = array('client_id'=>$usersessionId), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$new_notify_count= count($new_notifications);
echo json_encode(array('new_notify_count'=>$new_notify_count,'total_notifications'=>$total_notifications));


	}


public function account_details()
{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$usersessionId = $obj->usersessionId;

		$user_info= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_id'=>$usersessionId), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$fullname= @$user_info[0]->first_name;
		$email= @$user_info[0]->login_email;
		$mobile= @$user_info[0]->mobile;
		$pincode= @$user_info[0]->pincode;
		$city= @$user_info[0]->city;
		$state= @$user_info[0]->state;
		$country= @$user_info[0]->country;
		$address= @$user_info[0]->address;
		$wallet_balance= @$user_info[0]->wallet_point;
		$net_balance= @$user_info[0]->net_balance;

		if($wallet_balance=='')
		{
			$wallet_balance='0.00';
		}
		else{
			$wallet_value= $this->common_model->common($table_name = 'tbl_wallet_point_value', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$perpoitvalue=$wallet_value[0]->value_per_point;
			$wallet_balance= $wallet_balance;

		}
		$referral_code= @$user_info[0]->refferal_id;

		 echo json_encode(array('fname'=>$fullname, 'email'=>$email, 'mobile'=>$mobile,'pincode'=>$pincode,'city'=>$city,'state'=>$state,'country'=>$country,'address'=>$address,'wallet_balance'=>$wallet_balance,'referral_code'=>$referral_code,'net_balance'=>$net_balance));
}

public function account_update_action()
{
	$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$usersessionId = $obj->sessionId;
		$fname = $obj->fname;
		$logEmail = $obj->logEmail;
		$logMobile = $obj->logMobile;
		$userpincode = $obj->userpincode;
		$usercity = $obj->usercity;
		$userstate = $obj->userstate;
		$usercountry = $obj->usercountry;
		$useraddress = $obj->useraddress;

		$update_data= array(
								'first_name'=>$fname,
								'login_email'=>$logEmail,
								'mobile'=>$logMobile,
								'pincode'=>$userpincode,
								'city'=>$usercity,
								'state'=>$userstate,
								'country'=>$usercountry,
								'address'=>$useraddress
								);

		$this->db->where('user_id', $usersessionId);
		$this->db->update('tbl_user', $update_data);

		$check_deli_address= $this->common_model->common($table_name = 'tbl_delivery_address', $field = array(), $where = array('user_id'=>$usersessionId), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($check_deli_address)==0)
		{
			$delidata= array(
								'user_id'=>$usersessionId,
								'address_type_id'=>1,
								'user_first_name'=>$fname,
								'user_email'=>$logEmail,
								'user_phone_no'=>$logMobile,
								'user_pincode'=>$userpincode,
								'user_city'=>$usercity,
								'user_state'=>$userstate,
								'user_country'=>$usercountry,
								'user_address'=>$useraddress,
								'is_default'=>'Yes',
								'created_on'=>date('Y-m-d'),
								'created_by'=>$usersessionId
								);

			$this->db->insert('tbl_delivery_address',$delidata);
		}

		echo json_encode(array('fname'=>$fname));

}

public function my_order()
{
	$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$userLoginid = $obj->userLoginid;
}


public function get_address()
{
	$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

   		$address_array= array();
 
		$usersessionId = $obj->usersessionId;

		$get_deli_address=  $this->common_model->common($table_name = 'tbl_delivery_address', $field = array(), $where = array('user_id'=>$usersessionId), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		foreach($get_deli_address as $row)
		{ 
				$row_array['full_name']= $row->user_first_name;
				$row_array['contact_no']= $row->user_phone_no;
				$row_array['email_id']= $row->user_email;
				$row_array['pincode']= $row->user_pincode;
				$row_array['city']= $row->user_city;
				$row_array['state']= $row->user_state;
				$row_array['country']= $row->user_country;
				$row_array['address']= $row->user_address;
				$row_array['is_default']= $row->is_default;
				$row_array['landmark']= $row->address_landmark;
				$row_array['address_id']= $row->address_id;

				array_push($address_array, $row_array);

		}

		echo json_encode($address_array);


}

public function make_default()
{
	$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$addressid = $obj->addrssId;
		$usersessionid = $obj->usersessionid;

		/*$addressid = 133;
		$usersessionid = 192;*/

		$datastatus= array(
			'is_default'=>'No'
							);
		$this->db->where('user_id', $usersessionid);
		$this->db->update('tbl_delivery_address',$datastatus);

		$newdata= array(
			'is_default'=>'Yes'
			);
		
		$this->db->where('address_id', $addressid);
		$this->db->update('tbl_delivery_address',$newdata);

		echo json_encode(array('result'=>'1'));

}

public function delete_address()
{
	$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$addressid = $obj->addrssId;
		$usersessionid = $obj->usersessionid;

		/*$addressid = 133;
		$usersessionid = 192;*/

		
		
		
		$this->db->where('address_id', $addressid);
		$this->db->delete('tbl_delivery_address');

		echo json_encode(array('result'=>'1'));

}

public function get_bid_history()
{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		
		$usersessionid = $obj->usersessionid;

		/*$usersessionid = 4;*/

		$bid_list_array= $this->common_model->get_bid_data($usersessionid);

		echo json_encode(array('bid_list_array'=>$bid_list_array));


}

public function add_new_address()
{
	$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$usersessionId = $obj->sessionId;
		$fname = $obj->fname;
		$logEmail = $obj->logEmail;
		$logMobile = $obj->logMobile;
		$userpincode = $obj->userpincode;
		$usercity = $obj->usercity;
		$userstate = $obj->userstate;
		$usercountry = $obj->usercountry;
		$useraddress = $obj->useraddress;
		$userpost = $obj->userpost;
		$userlandark = $obj->userlandark;


		$delidata= array(
								'user_id'=>$usersessionId,
								'address_type_id'=>1,
								'user_first_name'=>$fname,
								'user_email'=>$logEmail,
								'user_phone_no'=>$logMobile,
								'user_pincode'=>$userpincode,
								'user_city'=>$usercity,
								'user_state'=>$userstate,
								'user_country'=>$usercountry,
								'user_address'=>$useraddress,
								'user_post_office'=>$userpost,
								'address_landmark'=>$userlandark,
								'is_default'=>'No',
								'created_on'=>date('Y-m-d'),
								'created_by'=>$usersessionId
								);

			$this->db->insert('tbl_delivery_address',$delidata);

			echo json_encode(array('result'=>'1'));
}
public function change_password_action()
{
	$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$usersessionId = $obj->sessionId;
		$currPass = $obj->currPass;
		$newPass = $obj->newPass;


		$check_passdetails= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_id'=>$usersessionId,'login_pass'=>$currPass), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($check_passdetails)>0)
		{
			$passdata= array(
				'login_pass'=>$newPass

				);

			$this->db->where('user_id', $usersessionId);
			$this->db->update('tbl_user', $passdata);
			$result=1;
		}
		else{
			$result=0;
		}

		echo json_encode($result);
}

public function get_exam_list()
{
	$json    =  file_get_contents('php://input');
   	$obj     =  json_decode($json);

	$usersessionId = $obj->usersessionId;

	$attempted_test_list=array();

	$attempted_exam_list= $this->common_model->get_all_exam_details($usersessionId);
	$cnt=0;

	foreach($attempted_exam_list as $res)
     {
     	$get_userdetail= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$res->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  $get_setdetail= $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$res->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  $setSlug= @$get_setdetail[0]->set_slug;
                  $setname= @$get_setdetail[0]->set_name;
                   $exam_id= @$get_setdetail[0]->exam_id;
                   $sub_id= @$get_setdetail[0]->subject_id;

                   $get_examdetail= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                     $get_subdetail= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  $cnt++;

                  $examchapter_id= $res->chap_id;
                  $testselectType= $res->test_select_type;

                  if($examchapter_id>0)
                  {
                    $chapter_details= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>$examchapter_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                    $chapterName= @$chapter_details[0]->chap_name;
                  }
                  else{
                    $chapterName='';
                  }


                $totalmarks= $res->total_marks; 
                $obtainedMarks= $res->obtained_marks;

                $percentage= round(($obtainedMarks/$totalmarks)*100);
                

            
                  $rowarray['cnt']=$cnt;
                  $rowarray['cstart_timent']=date('d/m/Y H:i:s', strtotime($res->start_time));
                  $rowarray['test']= @$get_examdetail[0]->exam_name.': '.$setname;
                  $rowarray['subjectName']=  @$get_subdetail[0]->section_name;
                  $rowarray['q_qty']= round($res->q_qty);
                  $rowarray['attempt_count']= round($res->attempt_count);
                   $rowarray['obtained_marks']= round($res->obtained_marks);
                   $rowarray['percentage']= $percentage.'%';

                   array_push($attempted_test_list, $rowarray);



     }
     echo json_encode(array('attempted_test_list'=>$attempted_test_list));
}

public function get_my_order()
{
	$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$usersessionId = $obj->usersessionId;
		//$usersessionId = 196;

	$order_list= array();
	$get_order_list= $this->common_model->common($table_name = 'tbl_order', $field = array(), $where = array('order_customer_id'=>$usersessionId), $where_or = array(), $like = array(), $like_or = array(), $order = array('order_id'=>'DESC'), $start = '', $end = '');

	foreach($get_order_list as $row)
	{
		$get_order_details= $this->common_model->common($table_name = 'tbl_order_details', $field = array(), $where = array('order_id'=>$row->order_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		

		$details_array=array();

		foreach($get_order_details as $res)
		{
			
			$pro_image= $this->common_model->common($table_name = 'tbl_product_image', $field = array(), $where = array('product_id'=>$res->order_product_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$pro_details= $this->common_model->common($table_name = 'tbl_product', $field = array(), $where = array('id'=>$res->order_product_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$unit_info= $this->common_model->common($table_name = 'tbl_weight_class', $field = array(), $where = array('weight_class_id'=>$res->cart_item_pro_unit), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$pro_name= @$pro_details[0]->product_name;
			$pro_image=  @$pro_image[0]->image;

			$res_array['product_id']=$res->order_product_id;
			$res_array['product_image']=base_url().'assets/upload/product/large/'.$pro_image;
			$res_array['product_qty']= $res->order_product_qty;
			$res_array['product_price']= $res->order_product_price;
			$res_array['product_pkg']= $res->cart_item_pro_qty;
			$res_array['pkg_unit']= @$unit_info[0]->weight_class;
			$res_array['product_name']= @$pro_details[0]->product_name;
			$res_array['ttal']= $res->order_product_price*$res->order_product_qty;

			array_push($details_array, $res_array);

		}
		$order_price=$row->order_total_price;
		$order_discount= $row->flat_discount;
		$order_shipping= $row->shipping_charge; 
		if( $row->order_status=='Pending')
		{
			$status='Pending';
		}
		else if($row->order_status=='Order_Confirmed')
		{
			$status='Confirmed';
		}
		else if($row->order_status=='Dispatched')
		{
			$status='Dispatched';

		}
		else if($row->order_status=='Delivered')
		{
			$status='Delivered';

		}
		else if($row->order_status=='Canceled')
		{
			$status='Canceled';

		}
		else{
			$status='';
		}
if($row->order_status=='Dispatched' || $row->order_status=='Canceled' || $row->order_status=='Delivered')
{
	$is_cancel=1;
}
else{
	$is_cancel='';
}

		if( $row->payment_status=='cod')
		{
			$pstatus='Cash on Delivery';
		}
		else if($row->payment_status=='wallet')
		{
			$pstatus='Wallet';
		}
		else if($row->payment_status=='swap_card')
		{
			$pstatus='Card Swipe';

		}
		else if($row->payment_status=='paytm')
		{
			$pstatus='Paytm';

		}
		else if($row->payment_status=='sodexo')
		{
			$pstatus='Sodexo';

		}
		else if($row->payment_status=='unpaid')
		{
			$pstatus='Unpaid';

		}
		else if($row->payment_status=='paid')
		{
			$pstatus='Paid';

		}
		else{
			$pstatus='';
		}



		$row_array['order_id']= $row->order_id;
		$row_array['uni_id']= $row->order_unique_id;
		$row_array['total_price']= $order_price-$order_discount;
		$row_array['flat']= $order_discount;
		$row_array['status']= $status;
		$row_array['pstatus']= $pstatus;
		$row_array['is_cancel']= $is_cancel;
		$row_array['prodlist']= $details_array;
		$row_array['shipping']= $order_shipping;
		$row_array['expshipping']= $row->express_del_charge;;
		$row_array['delivertype']= $row->delivery_type;;
		$row_array['placedon']= date('jS M y, H:i:s', strtotime($row->created_date));

		array_push($order_list, $row_array);

	}

	echo json_encode($order_list);
}

public function wishlist()
{
	$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$usersessionId = $obj->usersessionId;


		$wishlist_array= array();

		$get_wishlist= $this->common_model->common($table_name = 'tbl_wishlist', $field = array(), $where = array('user_id'=>$usersessionId), $where_or = array(), $like = array(), $like_or = array(), $order = array('wish_id'=>'DESC'), $start = '', $end = '');

		foreach($get_wishlist as $row)
		{
				$pro_image= $this->common_model->common($table_name = 'tbl_product_image', $field = array(), $where = array('product_id'=>$row->product_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				$row_array['pro_id']= $row->product_id;
				$row_array['pro_img']= base_url().'assets/upload/product/large/'.@$pro_image[0]->image;
				$row_array['pro_name']= $row->product_name;
				$row_array['pro_price']=  $row->product_net_price;
				$row_array['wish_id']= $row->wish_id;

				array_push($wishlist_array, $row_array);

		}

		echo json_encode(array('wishlist_array'=>$wishlist_array));
}

public function delete_wishlist()
{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$wishid = $obj->wishid;

		$this->db->where('wish_id', $wishid);
		$this->db->delete('tbl_wishlist');
		$result=1;
		echo json_encode($result);
}

public function cancel_order()
{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);
   		$order_id = $obj->order_id;

   		$order_info= $this->common_model->common($table_name='tbl_order',$field=array(),$where=array('order_id'=>$order_id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='',$where_in_array=array());

		$order_unique_id = $order_info[0]->order_unique_id;
		
		$order_date = @$order_info[0]->created_date;
		$customer_id = @$order_info[0]->order_customer_id;

		$total_price= @$order_info[0]->order_total_price;
		$discount= @$order_info[0]->flat_discount;
		$payable_price= $total_price-$discount;
		$payment_method= @$order_info[0]->payment_mode;



   		$customer= $this->common_model->common($table_name='tbl_user',$field=array(),$where=array('user_id'=>$customer_id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='',$where_in_array=array());
			$cust_fst_name = @$customer[0]->first_name;
			$cust_lst_name = @$customer[0]->last_name;
			$cust_email = @$customer[0]->login_email;
			$cust_ph = @$customer[0]->mobile;
			$current_net_balance= @$customer[0]->net_balance;
			$new_net_balance= $payable_price+$current_net_balance;

   		$order_data= array(
   								'order_status'=>'Canceled',
   								'is_view'=>'Y',
   								'canceled_date'=>date('Y-m-d h:i:s')
   							);

   		$this->db->where('order_id',$order_id);
   		$this->db->update('tbl_order',$order_data);

   		$orderpro_data= array(
   								'order_product_status'=>'Canceled'
   							);

   		$this->db->where('order_id',$order_id);
   		$this->db->update('tbl_order_details',$orderpro_data);

   		
   		

		$data['email']=$this->common_model->common($table_name = 'tbl_email', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  				 $admin_from=$data['email'][0]->from_email;

  				  $email_data['mail_data']=array
            (
                'fname'=>$cust_fst_name,
                'lname'=>$cust_lst_name,
                'uemail'=> $cust_email,
                'uphone'=> $cust_ph,
                'uorder_id'=>$order_unique_id,
                'ustatus'=>'Canceled',
                'uorder_date'=>$order_date
               
               
            );

            $this->email->set_mailtype("html");
            $send_user_mail_html=$this->load->view('mail_template/order_status_reply_mail_view',$email_data, true);
			$this->email->from($admin_from, "My Daily Fresh");
            $this->email->to($cust_email);
            $this->email->subject("Order Track of Id ".$order_unique_id." - My Daily Fresh");
            $this->email->message($send_user_mail_html);
            @$this->email->send();



   		$result=1;
		echo json_encode($result);



}
public function clear_wishlist()
{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$usersessionId = $obj->sessionId;

		$this->db->where('user_id', $usersessionId);
		$this->db->delete('tbl_wishlist');
		$result=1;
		echo json_encode($result);
}



public function order_track()
{
		$json    =  file_get_contents('php://input');
   		$obj     =  json_decode($json);

		$orderId = $obj->orderId;

		//$orderId = 9;
		$track_array= array();

		$track_list= $this->common_model->common($table_name = 'tbl_order', $field = array(), $where = array('order_id'=>$orderId), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		foreach($track_list as $row)
		{
			$row_array['order_id']= $row->order_id;
			$row_array['order_unique_id']= $row->order_unique_id;
			$row_array['order_status']= $row->order_status;
			$row_array['created_date']= $row->created_date;
			$row_array['confirmed_date']= $row->confirmed_date;
			$row_array['dispatched_date']= $row->dispatched_date;
			$row_array['delivered_date']= $row->delivered_date;
			$row_array['canceled_date']= $row->canceled_date;


			array_push($track_array, $row_array);

		}
		echo json_encode($track_array);



}

public function time()
{
	$curr_tme= date('Y-m-d h:i:s');
	$newTime= strtotime("+15 minutes", strtotime($curr_tme));
	$newtime= date('Y-m-d h:i:s',$newTime);
	echo 'current time: '.$curr_tme.'<br>'; 
	echo 'after 15 mnutes: '.$newtime.'<br>';
}

public function pay_action()
	{

		/*$booking_id=1;
		$user_id= 196;
		$payable_amt= 2;*/

		$booking_id = $this->uri->segment(4);
		$get_last_order= $this->common_model->common($table_name = 'tbl_user_net_balance_details', $field = array(), $where = array('net_balance_id'=>$booking_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$order_id= @$get_last_order[0]->net_balance_id;
		$user_id= @$get_last_order[0]->user_id;
		$payable_price= @$get_last_order[0]->txn_amount;
		


		$billing_data= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	
		$order_amount= $payable_price;
		$billing_name= $billing_data[0]->first_name	;
		$billing_mail= $billing_data[0]->login_email;
		$billing_mobile= $billing_data[0]->mobile;
	
		$payable_amt= $payable_price;


		
        $paytm_booking_uni_id = @$get_last_order[0]->txn_id;
		//echo $booking_id; exit;        

		

		header("Pragma: no-cache");
		header("Cache-Control: no-cache");
		header("Expires: 0");

		// following files need to be included
		include("Config_paytm.php");
		include("Encdec_paytm.php");

		$checkSum = "";
		$paramList = array();


		$ORDER_ID = $paytm_booking_uni_id;				
		$CUST_ID = $user_id;
		//$MSISDN = $buyer_mobile;
		//$EMAIL = $buyer_email;
		$INDUSTRY_TYPE_ID = 'Retail';
		$CHANNEL_ID = 'WEB';
		$TXN_AMOUNT = $payable_amt;

		// Create an array having all required parameters for creating checksum.
		$paramList["MID"] = 'VIOLPY75530543945155';
		$paramList["ORDER_ID"] = $ORDER_ID;		
		$paramList["CUST_ID"] = $CUST_ID;
		//$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
		//$paramList["EMAIL"] = $EMAIL; //Email ID of customer
		$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
		$paramList["CHANNEL_ID"] = $CHANNEL_ID;
		$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
		$paramList["WEBSITE"] = 'DEFAULT';
		$paramList["CALLBACK_URL"] = base_url()."paytm/net_pgResponse";

		$checkSum = getChecksumFromArray($paramList,'vH8vPcPWy#JV426t');

		?>
		<html>
		<head>
		<title>Merchant Check Out Page</title>
		</head>
		<body>
		  <center><h1>Please do not refresh this page...</h1></center>
		    <form method="post" action="https://securegw.paytm.in/theia/processTransaction" name="f1">
		    <table border="1">
		      <tbody>
		      <?php
		      foreach($paramList as $name => $value) 
		      {
		        echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
		      }
		      ?>
		      <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
		      </tbody>
		    </table>
		    <script type="text/javascript">
		      document.f1.submit();
		    </script>
		  </form>
		</body>
		</html>
		<?php
		 

	}

}
?>