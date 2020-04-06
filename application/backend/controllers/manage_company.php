<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_company extends CI_Controller {
	
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
		
}

public function view()
{
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	$data['company_list']=$this->admin_model->selectAll('tbl_company');
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('company/company_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
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
    function add()
    {
    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	

    $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('company/company_add_view');
		$this->load->view('template/adminfooter_category');
    }

    function insert()
    {

      if(get_cookie('session_user_id')!='')
      {
        $user_id= get_cookie('session_user_id');
      }
      else{
        redirect('index.php/login','refresh');
      }
    	
    	$company=$this->input->post('company_name');
      $current_date=date('Y-m-d H:i:s');
    	//$company_slug=$this->create_slug($company);
    	
    	$image=NULL;
        if(($_FILES['company_logo']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/company_logo/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "company_logo"; 
              
          $image=NULL;   
          if($this->upload->do_upload($field_name))
          { 
            
           $file_info = $this->upload->data();
           $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
           $file_size=$file_info['file_size'];
           $this->image_lib->clear();     
           $image =$file_info['raw_name'].$file_info['file_ext']; 
            
          
           
           
           $image_config["image_library"] = "gd2";
           $image_config["source_image"] ='../assets/uploads/company_logo/'.$image;   
           $image_config['create_thumb'] = FALSE;
           $image_config['maintain_ratio'] = TRUE;
           $image_config['new_image'] = '../assets/uploads/company_logo/'.$image; 
           $image_config['quality'] = "100%";
           $image_config['width'] = 150;
           $image_config['height']= 150;
           
           $image_config['master_dim'] = "height";
           $this->image_lib->initialize($image_config);
           $this->image_lib->resize(); 
           $this->image_lib->clear();
          } //end if
        }
    	
    	
    	
    		$data = array(

    				
    				'company_name'=>$company,
    				'company_logo'=>$image,
    				'created_by'=>$user_id,
    				'created_on'=>$current_date,
    				
    				);
    	
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->insert('tbl_company',$data);
    	$this->session->set_flashdata('succ_msg','One Company added successfully');
    	redirect('index.php/manage_company/view/','refresh');


    }

function delete()
{
	$id=$this->uri->segment(3);

	$sub = $this->admin_model->selectOne('tbl_company','id',$id);

	if(count($sub)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_company');
				
				$this->session->set_flashdata('succ_msg','One Company deleted successfully.');
			
			}
			redirect('index.php/manage_company/view/','refresh');

	
}
function edit()

{
		if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$company_id =$this->uri->segment(3);
		

		$data['company']=$this->admin_model->selectone('tbl_company','id',$company_id);

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('company/company_edit_view',$data);
		$this->load->view('template/adminfooter_category');
}
function update()
{

    if(get_cookie('session_user_id')!='')
    {
      $user_id= get_cookie('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }
		  $edit_id=$this->input->post('edit_id');

		
        $company=$this->input->post('company_name');
        $old_image=$this->input->post('old_image');

    	$image=NULL;

        if(($_FILES['company_icon']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/company_logo/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "company_icon"; 
              
          $image=NULL;   
          if($this->upload->do_upload($field_name))
          { 
            
           $file_info = $this->upload->data();
           $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
           $file_size=$file_info['file_size'];
           $this->image_lib->clear();     
           $image =$file_info['raw_name'].$file_info['file_ext']; 
            
          
           
           
           $image_config["image_library"] = "gd2";
           $image_config["source_image"] ='../assets/uploads/company_logo/'.$image;   
           $image_config['create_thumb'] = FALSE;
           $image_config['maintain_ratio'] = FALSE;
           $image_config['new_image'] = '../assets/uploads/company_logo/'.$image; 
           $image_config['quality'] = "100%";
           $image_config['width'] = 252;
           $image_config['height']= 78;
           
           $image_config['master_dim'] = "height";
           $this->image_lib->initialize($image_config);
           $this->image_lib->resize(); 
           $this->image_lib->clear();
          } //end if
        }
          if($image=='')
          {
            $image=$old_image;
          }
          else
          {
            @unlink('../assets/uploads/company_logo/'.$old_image);
          }
    	
    	$current_date=date('Y-m-d H:i:s');
    	$data = array(

            
            'company_name'=>$company,
            'company_logo'=>$image,
            'modified_by'=>$user_id,
            'modified_on'=>$current_date,
            
            );
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->where('id',$edit_id);
    	$this->db->update('tbl_company',$data);
    	$this->session->set_flashdata('succ_msg','One Company updated successfully.');
    	redirect('index.php/manage_company/view/','refresh');

}


function change_to_active()
{
	
		$company_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($company_ids);$i++)
		{
			$id=$company_ids[$i];
			$this->db->where('id',$id);

			if($this->db->update('tbl_company',$data))
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


		
		
		
}




