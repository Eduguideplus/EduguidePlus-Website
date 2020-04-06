<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class parent_list_managment extends CI_Controller {
	
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
		else{
			redirect('index.php/login','refresh');
		}
	 $data['parent'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id '=>'4'), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');
	//echo '<pre>'; print_r($data['user']); exit;
	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('list_managment/managment_table',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}

public function details_view()
{
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$user_id = $this->uri->segment(3);
	$data['user_details'] = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	$data['user_add']=$this->common_model->common($table_name = 'tbl_address', $field = array(), $where = array('user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	

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
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
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
	
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
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

}




