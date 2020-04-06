<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_study_abroad extends CI_Controller {
	
public function __construct()
     {
            parent::__construct();
			$this->load->database();
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->library('datalist');	
			$this->load->library('image_lib');
			
			//$this->load->model('manage_users/common_user_model','common_model');
			$this->load->model('common/common');
			$this->load->model('common/common_model_order_by');
			$this->load->model('admin_model');	
			//START LOGIN CHECK++++++++++++++++++++++++++++++++++++++
			$this->session_check_and_session_data->session_check();
			//END LOGIN CHECK++++++++++++++++++++++++++++++++++++++	
	}
	
function list_view()
	{
		  
		   if(get_cookie('session_user_id')!='')
		       {
			     $user_id= get_cookie('session_user_id');
		       }
		   else{
			     redirect('index.php/login','refresh');
		       } 

		   $data['active']='manage_study_abroad';
	

           $data['tender']= $this->common->select($table_name='tbl_study_abroad ',$field=array(),
	    	 $where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

          

	   

	    


		 
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_study_abroad/list_view',$data);
		  $this->load->view('template/admin_footer');	 
			
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

function add_view()
	{
		  if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$data['active']='manage_study_abroad';

     // $data['country']=$this->common->select($table_name='countries',$field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

	$data['country'] = $this->common_model_order_by->common($table_name = 'countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');


		 
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_study_abroad/add');
		  $this->load->view('template/admin_footer');	 
			
	}

function add_tender_submit()
	{
		if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}





          $user_id=get_cookie('session_user_id');
        
          $country_name=$this->input->post('country_name');
          $course_name=$this->input->post('course_name');
          $college_name=$this->input->post('college_name');



		  $insert_data= array(
		  	                  'country_name'=>$country_name,
		  	                  'course_name'=>$course_name,
		  	                  'college_name'=>$college_name,
		  	                  'created_date'=>date('Y-m-d H:i:s'),
		  	                  'created_by'=>$user_id);
		  // print_r($insert_data);exit;


		  $this->db->insert('tbl_study_abroad ', $insert_data);


         


		 $this->session->set_flashdata('succ_add','Successfully added');
		  redirect('index.php/manage_study_abroad/list_view','refresh');
	}


function edit_tender()
	{
		  if(get_cookie('session_user_id')!='')
		    {
			  $user_id= get_cookie('session_user_id');
		    }
		   else{
			    redirect('index.php/login','refresh');
		       }

		$data['active']='manage_study_abroad';

		   $id= $this->uri->segment(3);

		   // print_r($id); exit;
		   
		  $data['tender']=$this->common->select($table_name='tbl_study_abroad',$field=array(),$where=array('study_abroad_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		  // echo "<pre>";
		  // print_r($data['tender']);
		  // exit();



		  	$data['country'] = $this->common_model_order_by->common($table_name ='countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');


		  

		   $this->load->view('template/admin_header');
		   $this->load->view('template/admin_leftmenu',$data);
		   $this->load->view('manage_study_abroad/edit',$data);
		   $this->load->view('template/admin_footer');	
	}
	
function edit_tender_submit()
	{
		if(get_cookie('session_user_id')!='')
		    {
		 	  $user_id= get_cookie('session_user_id');
		    }
		else{
			  redirect('index.php/login','refresh');
		    }

		    
		


		   $user_id=get_cookie('session_user_id');
           $country_name = $this->input->post('country_name');
           $course_name=$this->input->post('course_name');
           $college_name=$this->input->post('college_name');
           
          $edit_id=$this->input->post('edit_id');

		  $update_data= array(
		  	                  'country_name'=>$country_name,
			                 
		  	                  'course_name'=>$course_name,
		  	                  'college_name'=>$college_name,
		  	                  'edited_date'=>date('Y-m-d H:i:s'),
		  	                  'edited_by'=>$user_id
		  	              );
		   // print_r($update_data);exit();

	
		  $this->db->where('study_abroad_id',$edit_id);
			
          $this->db->update('tbl_study_abroad',$update_data);
		  $this->session->set_flashdata('succ_update','Successfully updated');
		  redirect('index.php/manage_study_abroad/list_view');
	}

function delete_tender()
	{
		if(get_cookie('session_user_id')!='')
		   {
			  $user_id= get_cookie('session_user_id');
		   }
		else{
			  redirect('index.php/login','refresh');
		    }
		
		$id= $this->uri->segment(3);


		$desk_details= $this->common->select($table_name='tbl_study_abroad',$field=array(),
			$where=array('study_abroad_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		

		$this->db->where('study_abroad_id',$id);
		$this->db->delete('tbl_study_abroad');

		
		$this->session->set_flashdata('succ_delete','Data has been deleted');
		redirect('index.php/manage_study_abroad/list_view');
	}

	function change_to_active()
  {
	
		$test_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($test_ids);$i++)
		{
			$id=$test_ids[$i];
			$this->db->where('study_abroad_id',$id);

			if($this->db->update('tbl_study_abroad',$data))
			{
				$result=1;
			}
			
		}
			
		echo json_encode(array('changedone'=>$result));
		
}


  function change_home_status()
{
    $c_id=$this->input->post('cid');

    $data=$this->admin_model->selectOne('tbl_study_abroad','id',$c_id);
    $home_stat=$data[0]->is_new;


    if($home_stat=="Yes")
    {
        $pop="No";
        $result['status']=0;
    }
    if($home_stat=="No")
    {
        $pop="Yes";
        $result['status']=1;
    }
    $data=array('is_new'=>$pop);

    $this->db->where('id',$c_id);
    $this->db->update('tbl_study_abroad',$data);
    
    echo json_encode(array('changedone'=>$result));

}

}

?>