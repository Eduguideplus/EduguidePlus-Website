<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_faculty extends CI_Controller {
	
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
	if(get_cookie('session_user_id')!='')
	{
		$user_id= get_cookie('session_user_id');
	}
	else
	{
		redirect('index.php/login','refresh');
	}

	$data['faculty_list'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id ='=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');
    $data['active']='faculty';
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu',$data);
	$this->load->view('manage_faculty/faculty_table',$data);
	$this->load->view('template/adminfooter_category');
}

function add_view()
{
    if(get_cookie('session_user_id')!='')
    {
      $user_id= get_cookie('session_user_id');
    }
    else
    {
      redirect('index.php/login','refresh');
    }
    $data['active']='faculty';
	$data['country'] = $this->common_model->common($table_name = 'countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$data['head_faculty_list'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'5'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_faculty/faculty_add',$data);
    $this->load->view('template/adminfooter_category');
}
function insert()
{
		
        $admin_id= get_cookie('session_user_id');
        $head_faculty_id=$this->input->post('head_faculty_id');
    	$full_name=$this->input->post('fname');
      $business_name=$this->input->post('business_name');   
    	$mobile=$this->input->post('mobile');
    	$email=$this->input->post('email');
    	$gender=$this->input->post('gender');
    	$address=$this->input->post('address');
    	$country=$this->input->post('country');
    	$state=$this->input->post('state');
    	$city=$this->input->post('city');
    	$con_pass=$this->input->post('con_pass');
    	$password=$this->input->post('password');
    	$adhar=$this->input->post('adhar');
    	$pan=$this->input->post('pan');
    	$current_date= date('Y:m:d h:i:s');
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
                move_uploaded_file($file_tmp, "../assets/uploads/faculty/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/faculty/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 150;
                $img_config_4['height'] = 150;
                $img_config_4['new_image'] ='../assets/uploads/faculty/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
        }
            
		    	
    	$data=array(
    			'user_type_id'=>'6',
    			'parent_id'=>$head_faculty_id,
    		    'user_name'=>strtoupper($full_name),
    		    'gender'=>$gender,
    		    'user_address'=>strtoupper($address),
    			'country'=>$country,
    			'state'=>$state,
    			'city'=>$city,
    			'profile_photo'=>$image,
    			'adhar'=>$adhar,
    			'pan'=>$pan,
          'business_name'=>strtoupper($business_name),
    			'login_mob'=>$mobile,
    			'login_email'=>$email,
    			'login_pass'=>$con_pass,
    			'status'=>'Active',
    			'created_by'=>$admin_id,
    			'created_on'=>date('Y-m-d h:i:s'),
    		);
        
    	$this->db->insert('tbl_user',$data);
    	$insert_id=$this->db->insert_id();
  
    	
        $type_id_details=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        $total_student=count($type_id_details);
        $count_num=strlen((string)$total_student);
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
        $final_user_code='FCLT'.$in_id;
    	$data_code = array('user_code' => $final_user_code);
        // print_r($final_user_code); exit;
    	$this->db->where('id', $insert_id);
  		$this->db->update('tbl_user', $data_code);

    	$this->session->set_flashdata('succ_msg','One Faculty added successfully');
    	redirect('index.php/manage_faculty/list_view/','refresh');
}

function edit_view()
{
 	if(get_cookie('session_user_id')!='')
    {
      $user_id= get_cookie('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

    $faculty_id =$this->uri->segment(3);
    
    $data['faculty_details'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$faculty_id,'user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $data['head_faculty_list'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'5'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $data['country_list'] = $this->common_model->common($table_name = 'countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $country_id= @$data['faculty_details'][0]->country;
	$data['state_list'] = $this->common_model->common($table_name = 'states', $field = array(), $where = array('country_id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$state_id= @$data['faculty_details'][0]->state;
	$data['city_list'] = $this->common_model->common($table_name = 'cities', $field = array(), $where = array('state_id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
   
    $data['active']='faculty';
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_faculty/faculty_edit',$data);
    $this->load->view('template/adminfooter_category');
 }


 function update()
{
		
        $admin_id= get_cookie('session_user_id');
        $head_faculty_id=$this->input->post('head_faculty_id');
    	$full_name=$this->input->post('fname');  
      $business_name=$this->input->post('business_name'); 
    	$gender=$this->input->post('gender');
    	$address=$this->input->post('address');
    	$country=$this->input->post('country');
    	$state=$this->input->post('state');
    	$city=$this->input->post('city');
    	$adhar=$this->input->post('adhar');
    	$pan=$this->input->post('pan');
    	$hidden_image=$this->input->post('hidden_image');
    	$edit_id=$this->input->post('edit_id');
    	$current_date= date('Y:m:d h:i:s');
    	

    	if(($_FILES['pro_pic']['name'])=='')
		{
			$image=$hidden_image;
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
            	if(@$hidden_image!='')
            	{
            		unlink('../assets/uploads/faculty/'.@$hidden_image);
            	}
                move_uploaded_file($file_tmp, "../assets/uploads/faculty/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/faculty/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 150;
                $img_config_4['height'] = 150;
                $img_config_4['new_image'] ='../assets/uploads/faculty/' . $image;
                

                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
              }
        }
            
		    	
    	$data=array(
    		    'parent_id'=>$head_faculty_id,
    		    'user_name'=>strtoupper($full_name),
    		    'gender'=>$gender,
    		    'user_address'=>strtoupper($address),
    			'country'=>$country,
    			'state'=>$state,
    			'city'=>$city,
    			'profile_photo'=>$image,
    			'adhar'=>$adhar,
    			'pan'=>$pan,
          'business_name'=>strtoupper($business_name),
    			'modified_by'=>$admin_id,
    			'modified_on'=>date('Y-m-d h:i:s'),
    		);
        
    	$this->db->where('id', $edit_id);
  		$this->db->update('tbl_user', $data);

    	$this->session->set_flashdata('succ_msg','One Faculty updated successfully');
    	redirect('index.php/manage_faculty/list_view/','refresh');
}



public function details_view()
{
	if(get_cookie('session_user_id')!='')
	{
		$user_id= get_cookie('session_user_id');
	}
	else
	{
		redirect('index.php/login','refresh');
	}
	$faculty_id = $this->uri->segment(3);
	$data['user_details'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$faculty_id,'user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$head_faculty_id= @$data['user_details'][0]->parent_id;
	$data['head_faculty'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$head_faculty_id,'user_type_id'=>'5'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $country_id= @$data['user_details'][0]->country;
	$data['country'] = $this->common_model->common($table_name = 'countries', $field = array(), $where = array('id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$state_id= @$data['user_details'][0]->state;
	$data['state'] = $this->common_model->common($table_name = 'states', $field = array(), $where = array('id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$city_id= @$data['user_details'][0]->city;
	$data['city'] = $this->common_model->common($table_name = 'cities', $field = array(), $where = array('id'=>$city_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $data['active']='faculty';
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu',$data);
	$this->load->view('manage_faculty/faculty_details',$data);
	$this->load->view('template/adminfooter_category');
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


function delete_data()
{
	$user_id=$this->uri->segment(3);
    $user_detail= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id ='=>'6','id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    if(@$user_detail[0]->profile_photo!='')
    {
    	unlink("../assets/uploads/faculty/".@$user_detail[0]->profile_photo);
    }
	$this->db->where('id',$user_id);
	$this->db->delete('tbl_user');

	$this->session->set_flashdata('succ_msg','Deleted successfully');
    redirect('index.php/manage_faculty/list_view/','refresh');

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

function change_password_view()
{
   if(get_cookie('session_user_id')!='')
	{
		$user_id= get_cookie('session_user_id');
	}
	else
	{
		redirect('index.php/login','refresh');
	}
	$faculty_id = $this->uri->segment(3);
	$data['faculty_details'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$faculty_id,'user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $data['active']='faculty';
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu',$data);
	$this->load->view('manage_faculty/password_change',$data);
	$this->load->view('template/adminfooter_category');
}

function update_password()
{
	$new_password=$this->input->post('new_pass');
	$con_password=$this->input->post('con_pass');
	$edit_id=$this->input->post('edit_id');

	$data=array('login_pass'=>$con_password);
	$this->db->where('id',$edit_id);
	$this->db->update('tbl_user',$data);

	$this->session->set_flashdata('succ_msg','Password updated successfully');
    redirect('index.php/manage_faculty/list_view/','refresh');

}

function check_exist_mail()
{
  $email=$this->input->post('email');
  $check_mail = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email,'user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

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
  $check_mobile = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_mob'=>$mobile,'user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

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
?>


