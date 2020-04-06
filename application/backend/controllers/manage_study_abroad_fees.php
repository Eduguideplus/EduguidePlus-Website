<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_study_abroad_fees extends CI_Controller {
	
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

		   $data['active']='manage_study_abroad_fees';
	
         $id=$this->uri->segment(3);
           $data['tender']= $this->common->select($table_name='tbl_abroad_fees ',$field=array(),
	    	 $where=array('study_abroad_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

          

	   

	    


		 
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_study_abroad_fees/list_view',$data);
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

		$data['active']='manage_study_abroad_fees';
		$id=$this->uri->segment(3);

     // $data['country']=$this->common->select($table_name='countries',$field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

	$data['country'] = $this->common_model_order_by->common($table_name = 'countries', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');


		 
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_study_abroad_fees/add');
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



          // $id=$this->uri->segment(4);

          $user_id=get_cookie('session_user_id');
        
          $fees=$this->input->post('fees');
          $course_name=$this->input->post('course_name');
          $college_name=$this->input->post('college_name');
          $study_abroad_id=$this->input->post('study_abroad_id');




		  $insert_data= array(
		  	                   'study_abroad_id'=>$study_abroad_id,
		  	                  'fees'=>$fees,
		  	                  'course_name'=>$course_name,
		  	                  'college_name'=>$college_name,
		  	                  'created_date'=>date('Y-m-d H:i:s'),
		  	                  'created_by'=>$user_id);
		  // print_r($insert_data);exit;


		  $this->db->insert('tbl_abroad_fees ', $insert_data);


         


		 $this->session->set_flashdata('succ_add','Successfully added');
		  redirect('index.php/manage_study_abroad_fees/list_view/'.$study_abroad_id,'refresh');
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

		$data['active']='manage_study_abroad_fees';

		   $id= $this->uri->segment(3);
		   $study_abroad_id= $this->uri->segment(4);


		    // print_r($id); exit;
		   
$data['tender']=$this->common->select($table_name='tbl_abroad_fees',$field=array(),$where=array('abroad_fee_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		  // echo "<pre>";
		  // print_r($data['tender']);
		  // exit();





		  

		   $this->load->view('template/admin_header');
		   $this->load->view('template/admin_leftmenu',$data);
		   $this->load->view('manage_study_abroad_fees/edit',$data);
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

		    
		
           
           // $id=$this->uri->segment(3);
		   $user_id=get_cookie('session_user_id');
           $fees = $this->input->post('fees');
           $course_name=$this->input->post('course_name');
           $college_name=$this->input->post('college_name');
           $study_abroad_id=$this->input->post('study_abroad_id');

           // echo $study_abroad_id;exit();
          $edit_id=$this->input->post('edit_id');

		  $update_data= array(
		  	                  'fees'=>$fees,
			                 
		  	                  'course_name'=>$course_name,
		  	                  'college_name'=>$college_name,
		  	                  'edited_date'=>date('Y-m-d H:i:s'),
		  	                  'edited_by'=>$user_id
		  	              );
		   // print_r($update_data);exit();

	
		  $this->db->where('abroad_fee_id',$edit_id);
			
          $this->db->update('tbl_abroad_fees',$update_data);
		  $this->session->set_flashdata('succ_update','Successfully updated');
		  redirect('index.php/manage_study_abroad_fees/list_view/'.$study_abroad_id,'refresh');
		  // redirect('index.php/manage_study_abroad_fees/list_view/'.$abroad_fee_id);
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
		$abroad_id= $this->uri->segment(4);


		$desk_details= $this->common->select($table_name='tbl_abroad_fees',$field=array(),
			$where=array('abroad_fee_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		

		$this->db->where('abroad_fee_id',$id);
		$this->db->delete('tbl_abroad_fees');

		
		$this->session->set_flashdata('succ_delete','Data has been deleted');
		redirect('index.php/manage_study_abroad_fees/list_view/'.$abroad_id);
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

			if($this->db->update('tbl_abroad_fees',$data))
			{
				$result=1;
			}
			
		}
			
		echo json_encode(array('changedone'=>$result));
		
}


  function change_home_status()
{
    $c_id=$this->input->post('cid');

    $data=$this->admin_model->selectOne('tbl_abroad_fees','id',$c_id);
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
    $this->db->update('tbl_abroad_fees',$data);
    
    echo json_encode(array('changedone'=>$result));

}

}

?>