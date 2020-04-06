<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_profile extends CI_Controller 
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
					$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				      $data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				      //print_r($data['user']);exit;
				      // if($data['user'][0]->user_type_id==3)
				      // {
				      // 	$data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				      // }

				      $data['address']=$this->common_model->common($table_name = 'tbl_address', $field = array(), $where = array('user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			
				$this->load->view('common/header');
				$this->load->view('my_profile',$data);
				$this->load->view('common/footer',$foot_data);
			}
	}
	
	

public function change_password()
	{

		 $active_usr=$this->session->userdata('activeuser');
				if($active_usr=='')
				{
					redirect($this->url->link(86));
				}
				else
				{
					$user_id=$active_usr;
					$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					$data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	
					$this->load->view('common/header');
					$this->load->view('change_password',$data);
					$this->load->view('common/footer',$foot_data);
				}

      
	}

	public function change_password_action()
	{
		 $active_usr=$this->session->userdata('activeuser');
				if($active_usr=='')
				{
					redirect($this->url->link(86));
				}
				else
				{
					$oldp=$this->input->post('oldp');
					$newp=$this->input->post('newp');
					$cnewp=$this->input->post('cnewp');

					$password_check = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$active_usr,'login_pass'=>$oldp), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					if(count($password_check)>0 && $newp==$cnewp)
					{
						$data_arr=array('login_pass'=>$newp);
						$this->db->where('id',$active_usr);
						$this->db->update('tbl_user',$data_arr);

						$this->session->set_flashdata('succ_msg','Password has been changed successfully');

						redirect($this->url->link(95));
					}
					else
					{
						$this->session->set_flashdata('err_msg','Sorry!! Wrong data entered');

						redirect($this->url->link(100));
					}
				}
		
	}



public function edit_profile()
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
							$this->load->view('edit_profile',$data);
							$this->load->view('common/footer',$foot_data);

						}
						else
					{
						redirect($this->url->link(86));
					}
					}
					
					



	}	


public function update_profile()
	{

				$active_usr=$this->session->userdata('activeuser');
				if($active_usr=='')
				{
					redirect($this->url->link(86));
				}
				else
				{

					$user_id=$active_usr;

					// $st_name=$this->input->post('u_name');
					// $email=$this->input->post('email');
					// $dob=$this->input->post('dob');
					// $address=$this->input->post('address');
					// $country=$this->input->post('country');
					// $State=$this->input->post('State');
					// $city=$this->input->post('city');
					// $pin_code=$this->input->post('post_code');
					
					// $mobile=$this->input->post('mobile');
					$hid_pro_img=$this->input->post('hid_pro_img');
					
					$current_date=date('Y-m-d,H:i:s');

					$profile=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=> $user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
					$old_img=@$profile[0]->profile_photo;


					if($_FILES['profile_img']['name']==NULL)

			         {
			         	if($hid_pro_img=='')
			         	{

			             $image=NULL;
			         	}
			         	else
			         	{
			         		$image=$hid_pro_img;
			         	}
			         }
			        else
			        {
			            $new_name1 = str_replace(".", "", microtime());
			            $new_name = str_replace(" ", "_", $new_name1);
			            $file_tmp = $_FILES['profile_img']['tmp_name'];
			            $file = $_FILES['profile_img']['name'];
			            $ext = substr(strrchr($file, '.'), 1);
			            if ($ext == "png" || $ext == "PNG" || $ext == "Png" || $ext == "jpg" || $ext == "Jpg" || $ext == "JPG"|| $ext == "jpeg" || $ext == "Jpeg" || $ext == "JPEG" ||  $ext == "bmp" || $ext == "Bmp" || $ext == "BMP")
			            {
			               
			              
			              

			                move_uploaded_file($file_tmp, "assets/uploads/student_pic/" . $new_name . "." . $ext);
			                $image = $new_name . "." . $ext;
			                @unlink("assets/uploads/student_pic/".$old_img);

			                $config['image_library'] = 'gd2';
			                $config['source_image'] = 'assets/uploads/student_pic/' . $image;
			                $config['maintain_ratio'] = FALSE;
			                $config['quality'] = "100%";
			               
			    
			                $config['create_thumb'] = FALSE;
			                $config['maintain_ratio'] = FALSE;
			                $config['new_image'] = 'assets/uploads/student_pic/'.$image;
			                $config['quality'] = "100%";
			                $config['width'] = 169;
			                $config['height']= 169;
			                $config['master_dim'] ="height" ;

			               $this->image_lib->initialize($config);
			               $this->image_lib->resize(); 
			               $this->image_lib->clear();
			                      
			            
			            } }


					     $data_array=array(
						
						'profile_photo'=>$image,
						'modified_on'=>$current_date
					);
					     $this->db->where('id',$user_id);

					$this->db->update('tbl_user',$data_array);


					


				$this->session->set_flashdata('succ_msg','Your profile has been updated successfully');

				redirect($this->url->link(95));
					


				}

	}

public function claim_view()
	{


$set_id=$this->uri->segment(2);
 $user_id=$this->session->userdata('activeuser');
		
		if($user_id=='')
		{
			redirect($this->url->link(1));
		}
		

     $data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['knowledge']=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$data['user_award']=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$data['user_award']=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$data['state']=$this->common_model->common($table_name = 'states', $field = array(), $where = array('country_id'=>'101'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$this->load->view('common/header');
		$this->load->view('claim_view',$data);
		$this->load->view('common/footer',$foot_data);
	}


	public function logout()
	{
		$user_id=$this->session->userdata('activeuser');

		$user_details= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$user_type= $user_details[0]->user_type_id;



		 $this->session->sess_destroy();
		 $current_date= date('Y-m-d');
			
			$this->db->where('user_id',$user_id);
			$this->db->where('created_date',$current_date);
			$this->db->delete('tbl_login_token');

			if($user_type==2)
			{
				redirect($this->url->link(86));  
			}
			else if($user_type==3)
			{
				redirect($this->url->link(142));  
			}
			else{
				redirect($this->url->link(161));
			}
		
	}	

	public function claim_award_con()
	{
		
		 $user_id=$this->session->userdata('activeuser');
		
		if($user_id=='')
		{
			redirect($this->url->link(1));
		}
		

			$set_id=$this->input->post('set_id');
	   

			
			$name=$this->input->post('full_name');
			$father_name=$this->input->post('father_name');
			$address_1=$this->input->post('address_1');
			$address_2=$this->input->post('address_2');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$pincode=$this->input->post('pincode');
			$phone_number=$this->input->post('phone_number');
			$claim_type=$this->input->post('claim_type');
			$examination_code=$this->input->post('examination_code');
			
// echo $claim_type.'okk'.$set_id; exit;

		
          

if($claim_type=='Cheque'){

		$data_cheque=array(
			         'set_id'=>$set_id,
			         'user_id'=>$user_id,

			         'user_name'=>$name,
			         'father_name'=>$father_name,
			         'address_1'=>$address_1,
			         'address_2'=>$address_2,
			         'city'=>$city,
			         'state'=>$state,
			         'pin'=>$pincode,
			         'phone_number'=>$phone_number,
			         'claim_type'=>$claim_type,
			         'examination_code'=>$examination_code,

			         
			         'status'=>'pending',
			         'created_by'=>$user_id,
			         'created_on'=>date('Y-m-d H:i:s')
                     );


// print_r($data_cheque);exit;
		 $this->db->insert('tbl_claim_award',$data_cheque);
    }

    if($claim_type=='NEFT'){

// echo $claim_type.'okk'.$set_id; 

            $name=$this->input->post('full_name1');
			$father_name=$this->input->post('father_name1');
            $phone_number=$this->input->post('phone_number1');
			
			$examination_code=$this->input->post('examination_code1');
			$account_number=$this->input->post('account_number');
            $ifsc_code=$this->input->post('ifsc_code');
            $branch_name=$this->input->post('branch_name');

    		$data_neft=array(
			         'set_id'=>$set_id,
			         'user_id'=>$user_id,

			         'user_name'=>$name,
			         'father_name'=>$father_name,
			         
			         'phone_number'=>$phone_number,
			         'claim_type'=>$claim_type,
			         'examination_code'=>$examination_code,

			         'bank_ac_number'=>$account_number,
			         'ifsc_code'=>$ifsc_code,
			         'bank_branch_name'=>$branch_name,
			         'status'=>'pending',
			         'created_by'=>$user_id,
			         'created_on'=>date('Y-m-d H:i:s')


			     );
 $this->db->insert('tbl_claim_award',$data_neft);


    }


$this->session->set_flashdata('succ_msg','Award Claimed Successfully');
redirect($this->url->link(119),'refresh');

}


public function refund_view()
	{


$set_id=$this->uri->segment(2);
 $user_id=$this->session->userdata('activeuser');
		
		if($user_id=='')
		{
			redirect($this->url->link(1));
		}
		

     $data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['knowledge']=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$data['user_award']=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$data['state']=$this->common_model->common($table_name = 'states', $field = array(), $where = array('country_id'=>'101'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		$this->load->view('common/header');
		$this->load->view('refund_view',$data);
		$this->load->view('common/footer',$foot_data);
	}

public function get_city_by_state()
{
	$state_id=$this->input->post('state_id');
	      $data=$this->common_model->common($table_name = 'cities', $field = array(), $where = array('state_id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);

}


		public function claim_refund_submit()
	{
		
		 $user_id=$this->session->userdata('activeuser');
		
		if($user_id=='')
		{
			redirect($this->url->link(1));
		}
		

			$set_id=$this->input->post('set_id');
	   

			
			$name=$this->input->post('full_name');
			$father_name=$this->input->post('father_name');
			$address_1=$this->input->post('address_1');
			$address_2=$this->input->post('address_2');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$pincode=$this->input->post('pincode');
			$phone_number=$this->input->post('phone_number');
			$claim_type=$this->input->post('claim_type');
			$examination_code=$this->input->post('examination_code');
			
// echo $claim_type.'okk'.$set_id; exit;

		
          

if($claim_type=='Cheque'){

		$data_cheque=array(
			         'set_id'=>$set_id,
			         'user_id'=>$user_id,

			         'user_name'=>$name,
			         'father_name'=>$father_name,
			         'address_1'=>$address_1,
			         'address_2'=>$address_2,
			         'city'=>$city,
			         'state'=>$state,
			         'pin'=>$pincode,
			         'phone_number'=>$phone_number,
			         'claim_type'=>$claim_type,
			         'examination_code'=>$examination_code,

			         
			         'status'=>'pending',
			         'created_by'=>$user_id,
			         'created_on'=>date('Y-m-d H:i:s')
                     );


// print_r($data_cheque);exit;
		 $this->db->insert('tbl_claim_refund',$data_cheque);
    }

    if($claim_type=='NEFT'){

// echo $claim_type.'okk'.$set_id; 

            $name=$this->input->post('full_name1');
			$father_name=$this->input->post('father_name1');
            $phone_number=$this->input->post('phone_number1');
			
			$examination_code=$this->input->post('examination_code1');
			$account_number=$this->input->post('account_number');
            $ifsc_code=$this->input->post('ifsc_code');
            $branch_name=$this->input->post('branch_name');

    		$data_neft=array(
			         'set_id'=>$set_id,
			         'user_id'=>$user_id,

			         'user_name'=>$name,
			         'father_name'=>$father_name,
			         
			         'phone_number'=>$phone_number,
			         'claim_type'=>$claim_type,
			         'examination_code'=>$examination_code,

			         'bank_ac_number'=>$account_number,
			         'ifsc_code'=>$ifsc_code,
			         'bank_branch_name'=>$branch_name,
			         'status'=>'pending',
			         'created_by'=>$user_id,
			         'created_on'=>date('Y-m-d H:i:s')


			     );
 $this->db->insert('tbl_claim_refund',$data_neft);


    }


$this->session->set_flashdata('succ_msg','Refund Claimed Successfully');
redirect($this->url->link(123),'refresh');

}

public function refund_claimed_details_view()
	{


$set_id=$this->uri->segment(2);
 $user_id=$this->session->userdata('activeuser');
		
		if($user_id=='')
		{
			redirect($this->url->link(1));
		}
		

     $data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['knowledge']=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$data['user_award']=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


	$data['user_refund']=$this->common_model->common($table_name = 'tbl_claim_refund', $field = array(), $where = array('set_id'=>$set_id,'user_id'=>@$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$this->load->view('common/header');
		$this->load->view('refund_claim_details_vew',$data);
		$this->load->view('common/footer',$foot_data);
	}


}
?>