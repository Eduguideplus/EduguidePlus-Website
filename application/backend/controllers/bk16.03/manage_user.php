<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_user extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	 
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');			
	$this->load->library('image_lib');
	$this->load->model('common/common_model');
	$this->load->model('set_model');
		
		
}

public function list_view()
{
	
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$data['user'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id ='=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');
	//echo '<pre>'; print_r($data['user']); exit;
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_user/user_table',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}

function add_student()
    {
		 if($this->session->userdata('session_user_id')!='')
      {
        $user_id= $this->session->userdata('session_user_id');
      }
      else{
        redirect('index.php/login','refresh');
      }
		$data['country'] = $this->common_model->common($table_name = 'countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$data['batch'] = $this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		
    	$this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('manage_user/student_add',$data);
        $this->load->view('template/adminfooter_category');
    }
    function insert()
    {
		 if($this->session->userdata('session_user_id')!='')
      {
        $user_id= $this->session->userdata('session_user_id');
      }
      else{
        redirect('index.php/login','refresh');
      }
        
        $batch=$this->input->post('batch');
    	$full_name=$this->input->post('fname');   
    	$mobile=$this->input->post('mobile');
    	$email=$this->input->post('email');
    	$address=$this->input->post('address');
    	$country=$this->input->post('country');
    	$state=$this->input->post('state');
    	$city=$this->input->post('city');
    	$cp=$this->input->post('cp');
    	$adhar=$this->input->post('adhar');
    	$pan=$this->input->post('pan');
    	$current_date= date('Y:m:d h:i:s');
    	$date= date('Y:m:d');
    	$originaldate = $this->input->post('dob');
        $newdate = date("Y-m-d", strtotime($originaldate));

      $expiry_date = $this->input->post('expiry_date');
        $new_expiry = date("Y-m-d", strtotime($expiry_date)); 


    	    	$image=NULL;


    	if(($_FILES['pro_pic']['name'])!='')
		{
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['pro_pic']['tmp_name'];
            $file = $_FILES['pro_pic']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/student_pic/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/student_pic/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 150;
                $img_config_4['height'] = 150;
                $img_config_4['new_image'] ='../assets/uploads/student_pic/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
        }
            
         
    	

		    	
    		$data=array('user_name'=>strtoupper($full_name),
    			'batch_id'=>$batch,
    			'dob'=>$newdate,
    			'login_mob'=>$mobile,
    			
    			'login_email'=>$email,
    			
    			'user_address'=>strtoupper($address),
    			'country'=>$country,
    			'state'=>$state,
    			'city'=>$city,
    			'profile_photo'=>$image,
    			'user_type_id'=>'2',
    			
    			'modified_on'=>$current_date,
    			'login_pass'=>$cp,
    			'adhar'=>$adhar,
    			'pan'=>$pan,
          'expiry_date'=>$new_expiry,
    		);
        
     //print_r($data);

    	$this->db->insert('tbl_user',$data);
    	$insert_id=$this->db->insert_id();
    		// 201906INKOL00001
    	$type_id_details=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $total_student=count($type_id_details);
         
    	 $country_details= $this->admin_model->selectOne('countries','id',$country);
    	 $city_details= $this->admin_model->selectOne('cities','id',$city);
    	 $city_name= strtoupper(@$city_details[0]->name);
         
         $in_year=date('Y');
         $in_month=date('m');
         $in_country=@$country_details[0]->sortname;
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

    	$this->db->where('id', $insert_id);
  		$this->db->update('tbl_user', $data_rel);

    	$this->session->set_flashdata('succ_msg','One Student added successfully');
    	redirect('index.php/manage_user/list_view/','refresh');
    }

 function edit_view()
 {
 	if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

    $student_id =$this->uri->segment(3);
    


    $data['student'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$student_id,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


    $data['batch'] = $this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $data['country'] = $this->common_model->common($table_name = 'countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $country_id= @$data['student'][0]->country;

	$data['state'] = $this->common_model->common($table_name = 'states', $field = array(), $where = array('country_id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$state_id= @$data['student'][0]->state;

	$data['city'] = $this->common_model->common($table_name = 'cities', $field = array(), $where = array('state_id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('manage_user/student_edit',$data);
    $this->load->view('template/adminfooter_category');
 }

function update()
{
	if($this->session->userdata('session_user_id')!='')
      {
        $user_id= $this->session->userdata('session_user_id');
      }
      else{
        redirect('index.php/login','refresh');
      }
        
      $hidden_id=$this->input->post('hidden_id');
      $batch=$this->input->post('batch');
    	$full_name=$this->input->post('fname');   
    	$address=$this->input->post('address');
    	$country=$this->input->post('country');
    	$state=$this->input->post('state');
    	$city=$this->input->post('city');
    	$adhar=$this->input->post('adhar');
    	$pan=$this->input->post('pan');
    	$current_date= date('Y:m:d h:i:s');
    	$hidden_profile_pic=$this->input->post('hidden_profile_pic');
    	$date= date('Y:m:d');
    	$modified_by= $user_id;
    	$originaldate = $this->input->post('dob');
      $newdate = date("Y-m-d", strtotime($originaldate));

      $expiry_date = $this->input->post('expiry_date');
      $new_expiry = date("Y-m-d", strtotime($expiry_date));


    	   if(($_FILES['pro_pic']['name'])=='')
        {
            $image=$hidden_profile_pic;
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['pro_pic']['tmp_name'];
            $file = $_FILES['pro_pic']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif")
            {
                if($hidden_profile_pic!='')
                {
                    @unlink('../assets/uploads/student_pic/'.@$hidden_profile_pic);
                }
                move_uploaded_file($file_tmp, "../assets/uploads/student_pic/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/student_pic/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 150;
                $img_config_4['height'] = 150;
                $img_config_4['new_image'] ='../assets/uploads/student_pic/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
        } 
            
         
    	

		    	
    		$data=array(
          'user_name'=>strtoupper($full_name),
    			'batch_id'=>$batch,
    			'dob'=>$newdate,
    			'user_address'=>strtoupper($address),
    			'country'=>$country,
    			'state'=>$state,
    			'city'=>$city,
    			'profile_photo'=>$image,
    			'modified_on'=>$current_date,
    			'modified_by'=>$modified_by,
    			'adhar'=>$adhar,
    			'pan'=>$pan,
          'expiry_date'=>$new_expiry,
    		);
        

    	$this->db->where('id',$hidden_id);
    	$this->db->update('tbl_user',$data);
    	

    	$this->session->set_flashdata('succ_msg','One Student Updated successfully');
    	redirect('index.php/manage_user/list_view/','refresh');
}

public function details_view()
{
	
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$user_id = $this->uri->segment(3);
	$data['user_details'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	$batch_id= @$data['user_details'][0]->batch_id;

		$data['batch'] = $this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array('batch_id'=>$batch_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $country_id= @$data['user_details'][0]->country;
	$data['country'] = $this->common_model->common($table_name = 'countries', $field = array(), $where = array('id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$state_id= @$data['user_details'][0]->state;
	$data['state'] = $this->common_model->common($table_name = 'states', $field = array(), $where = array('id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$city_id= @$data['user_details'][0]->city;
	$data['city'] = $this->common_model->common($table_name = 'cities', $field = array(), $where = array('id'=>$city_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	// $data['user_add']=$this->common_model->common($table_name = 'tbl_address', $field = array(), $where = array('user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_user/user_details',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}

  
function change_to_active()
{
	
		$user_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($user_ids);$i++)
		{
			$id=$user_ids[$i];
			$this->db->where('id',$id);

			if($this->db->update('tbl_user',$data))
			{
				$result=1;
			}
			else
			{
				$result=0;
			}


			}
			
		echo json_encode(array('changedone'=>$result));
		


}

function verify_email()
{
	$user_id = $this->uri->segment(3);
	$data_arr=array('email_verify'=>'Y','modified_by'=>'1','modified_on'=>date('Y-m-d,H:i:s'));
	//exit;
	$this->db->where('id',$user_id);
	$this->db->update('tbl_user',$data_arr);
	redirect(base_url().'index.php/manage_user/list_view');
}


public function user_plan_list()
{
	
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$user_id = $this->uri->segment(4);
	$data['user_plan_details'] = $this->common_model->common($table_name = 'tbl_user_plan', $field = array(), $where = array('user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	//echo '<pre>'; print_r($data['user_plan_details']); exit;

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_user/user_plan_details',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}

public function plan_filter()
{
	
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

	$plan_type = $this->uri->segment(3);
	$user_id = $this->uri->segment(4);
	//echo $user_id; exit;
	$data['user_plan_details'] = $this->set_model->plan_by_type($plan_type,$user_id);
	//echo '<pre>'; print_r($data['user_plan_details']); exit;

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_user/user_plan_details',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}

function delete_data()
{
	$user_id=$this->uri->segment(3);

	$student= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	
	$image=	$student[0]->profile_photo;

    if($image!='')
    {
          @unlink('../assets/uploads/student_pic/'.$image);
      }

	$this->db->where('id',$user_id);
	$this->db->delete('tbl_user');

	$this->db->where('user_id',$user_id);
	$this->db->delete('tbl_user_award');

	$this->db->where('user_id',$user_id);
	$this->db->delete('tbl_user_exam_type');

	$this->db->where('user_id',$user_id);
	$this->db->delete('tbl_user_knowledge_quiz');

	$this->db->where('user_id',$user_id);
	$this->db->delete('tbl_user_payment_report');

	$this->db->where('user_id',$user_id);
	$this->db->delete('tbl_user_plan');

	$this->db->where('user_id',$user_id);
	$this->db->delete('tbl_user_plan_details');

	$this->db->where('user_id',$user_id);
	$this->db->delete('tbl_user_rank');

	$this->db->where('user_id',$user_id);
	$this->db->delete('tbl_user_redeem');

	$this->db->where('user_id',$user_id);
	$this->db->delete('tbl_user_referral');

	$this->db->where('user_id',$user_id);
	$this->db->delete('tbl_user_referral');



	$this->session->set_flashdata('succ_msg','Deleted successfully');
    	redirect('index.php/manage_user/list_view/','refresh');

}

function get_state()
{
  $country_id= $this->input->post('id');
  $state_list = $this->common_model->common($table_name = 'states', $field = array(), $where = array('country_id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  ?>
  <option value="">Select State</option>
 <?php foreach ($state_list as $row) { ?>
  	<option value="<?php echo $row->id;?>"><?php echo $row->name; ?></option>
  	<?php 
  }
}

function get_city()
{
  $state_id= $this->input->post('id');
  $city_list = $this->common_model->common($table_name = 'cities', $field = array(), $where = array('state_id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  ?>
  <option value="">Select City</option>
 <?php foreach ($city_list as $row) {
  	?>
  	<option value="<?php echo $row->id;?>"><?php echo $row->name; ?></option>
  	<?php 
  }
}

function view_password()
{
   if($this->session->userdata('session_user_id')!='')
	{
		$user_id= $this->session->userdata('session_user_id');
	}
	else
	{
		redirect('index.php/login','refresh');
	}
	$student_id = $this->uri->segment(3);
	$data['student'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$student_id,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu',$data);
	$this->load->view('manage_user/password_change',$data);
	$this->load->view('template/adminfooter_category');
}

function update_password()
{
	$new_password=$this->input->post('np');
	$con_password=$this->input->post('cp');
	$edit_id=$this->input->post('edit_id');

	$data=array('login_pass'=>$con_password);
	$this->db->where('id',$edit_id);
	$this->db->update('tbl_user',$data);

	$this->session->set_flashdata('succ_msg','Password Changed successfully');
    redirect('index.php/manage_user/list_view/','refresh');

}


function check_exist_mail()
{
  $email=$this->input->post('email');
  $check_mail = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  if(count($check_mail)>0)
  {
    $result='Y';
  }
  else
  {
    $result='N';
  }
  echo json_encode($result);

}

function check_exist_mobile()
{
  $mobile=$this->input->post('mobile');
  $check_mobile = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_mob'=>$mobile,'user_type_id'=>'2'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  if(count($check_mobile)>0)
  {
    $result='Y';
  }
  else
  {
    $result='N';
  }
  echo json_encode($result);

}









}




