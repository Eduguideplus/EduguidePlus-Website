<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_service extends CI_Controller {
	
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
			$this->load->model('admin_model');	
			//START LOGIN CHECK++++++++++++++++++++++++++++++++++++++
			$this->session_check_and_session_data->session_check();
			//END LOGIN CHECK++++++++++++++++++++++++++++++++++++++	
	}
	
function list_view()
	{
		  
		   if($this->session->userdata('session_user_id')!='')
		       {
			     $user_id= $this->session->userdata('session_user_id');
		       }
		   else{
			     redirect('index.php/login','refresh');
		       } 

		   $data['active']='manage_service';
	

           $data['tender']= $this->common->select($table_name='tbl_our_service ',$field=array(),
	    	 $where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

          

	   

	    


		 
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_service/list_view',$data);
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
		  if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$data['active']='manage_service';
		 
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_service/add');
		  $this->load->view('template/admin_footer');	 
			
	}

function add_tender_submit()
	{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}





          $user_id=$this->session->userdata('session_user_id');
        
          $service_title=$this->input->post('service_title');
          $service_description=$this->input->post('service_description');



		  $insert_data= array(
		  	                  'service_title'=>$service_title,
		  	                  'service_description'=>$service_description,
		  	                  'created_date'=>date('Y-m-d H:i:s'),
		  	                  'created_by'=>$user_id);
		  // print_r($insert_data);exit;


		  $this->db->insert('tbl_our_service ', $insert_data);


         


		 $this->session->set_flashdata('succ_add','Successfully added');
		  redirect('index.php/manage_service/list_view','refresh');
	}


function edit_tender()
	{
		  if($this->session->userdata('session_user_id')!='')
		    {
			  $user_id= $this->session->userdata('session_user_id');
		    }
		   else{
			    redirect('index.php/login','refresh');
		       }

		$data['active']='manage_service';

		   $id= $this->uri->segment(3);

		   // print_r($id); exit;
		   
		  $data['tender']=$this->common->select($table_name='tbl_our_service',$field=array(),$where=array('service_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		  

		   $this->load->view('template/admin_header');
		   $this->load->view('template/admin_leftmenu',$data);
		   $this->load->view('manage_service/edit',$data);
		   $this->load->view('template/admin_footer');	
	}
	
function edit_tender_submit()
	{
		if($this->session->userdata('session_user_id')!='')
		    {
		 	  $user_id= $this->session->userdata('session_user_id');
		    }
		else{
			  redirect('index.php/login','refresh');
		    }

		    
		


		   $user_id=$this->session->userdata('session_user_id');
           $service_description = $this->input->post('service_description');
           $service_title=$this->input->post('service_title');
           
          $edit_id=$this->input->post('edit_id');

		  $update_data= array(
		  	                  'service_description'=>$service_description,
			                 
		  	                  'service_title'=>$service_title,
		  	                  'edited_date'=>date('Y-m-d H:i:s'),
		  	                  'edited_by'=>$user_id
		  	              );
		  // print_r($update_data);exit();

	
		  $this->db->where('service_id',$edit_id);
			
          $this->db->update('tbl_our_service',$update_data);
		  $this->session->set_flashdata('succ_update','Successfully updated');
		  redirect('index.php/manage_service/list_view');
	}

function delete_tender()
	{
		if($this->session->userdata('session_user_id')!='')
		   {
			  $user_id= $this->session->userdata('session_user_id');
		   }
		else{
			  redirect('index.php/login','refresh');
		    }
		
		$id= $this->uri->segment(3);


		$desk_details= $this->common->select($table_name='tbl_our_service',$field=array(),
			$where=array('service_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		

		$this->db->where('service_id',$id);
		$this->db->delete('tbl_our_service');

		
		$this->session->set_flashdata('succ_delete','Data has been deleted');
		redirect('index.php/manage_service/list_view');
	}

	function change_to_active()
  {
	
		$test_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($test_ids);$i++)
		{
			$id=$test_ids[$i];
			$this->db->where('service_id',$id);

			if($this->db->update('tbl_our_service',$data))
			{
				$result=1;
			}
			
		}
			
		echo json_encode(array('changedone'=>$result));
		
}


  function change_home_status()
{
    $c_id=$this->input->post('cid');

    $data=$this->admin_model->selectOne('tbl_our_service','id',$c_id);
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
    $this->db->update('tbl_our_service',$data);
    
    echo json_encode(array('changedone'=>$result));

}

}

?>