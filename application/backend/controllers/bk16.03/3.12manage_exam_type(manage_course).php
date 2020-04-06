<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_exam_type extends CI_Controller {
	
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


public function group_view()
{
  
  if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

 $data['exam_type']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
  

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu');
  $this->load->view('exam_type/group_type_list_view',$data);
  $this->load->view('template/adminfooter_category');
  
  
}

public function view()
{
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

	//$data['exam_type']=$this->admin_model->selectAll('tbl_exam_type');
    $data['exam_type']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id !='=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('exam_type/exam_type_list_view',$data);
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


    function add_groups()
    {

        if($this->session->userdata('session_user_id')!='')
        {
          $user_id= $this->session->userdata('session_user_id');
        }
        else
        {
          redirect('index.php/login','refresh');
        }

          $data['parent_exam_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');
          

          //echo '<pre>';print_r($data['category_list']); exit;

          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu');
          $this->load->view('exam_type/group_add_view',$data);
          $this->load->view('template/adminfooter_category');

    }
    function add()
    {
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	$data['parent_exam_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');
    	

    	//echo '<pre>';print_r($data['category_list']); exit;

    	$this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu');
		  $this->load->view('exam_type/exam_type_add_view',$data);
		  $this->load->view('template/adminfooter_category');
    }

    function get_subcategory()
    {
        $category_id=$this->input->post('category_id');
        $data=$this->common_model->common($table_name = 'tbl_category', $field = array(), $where = array('parent_category'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
    }


    function group_insert()
    {

          if($this->session->userdata('session_user_id')!='')
          {
            $user_id= $this->session->userdata('session_user_id');
          }
          else
          {
            redirect('index.php/login','refresh');
          }

              
          $cat=$this->input->post('cat_name');
          $descpn=$this->input->post('description');
          $detail_descpn=$this->input->post('detail_description');
          $cat_slug=$this->create_slug($cat);
          $meta_tag=$this->input->post('meta_tag');
          $meta_desc=$this->input->post('meta_desc');
          $meta_key=$this->input->post('meta_key');
        
          
          $image=NULL;
            if(($_FILES['cat_icon']['name'])!='')
              {
              $new_name =time();      
              $config['upload_path'] ='../assets/uploads/company_logo/';
              $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
              $config['file_name']=$new_name; 
              
                
              $this->load->library('upload', $config);  
              //==========end:resize body_part image======================   
              $field_name = "cat_icon"; 
                  
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
               $image_config['width'] = 50;
               $image_config['height']= 50;
               
               $image_config['master_dim'] = "height";
               $this->image_lib->initialize($image_config);
               $this->image_lib->resize(); 
               $this->image_lib->clear();
              } //end if
            }
          
          $current_date=date('Y-m-d H:i:s');
          
            $data = array(

                
                'exam_type_id'=>'0',
                'exam_name'=>$cat,
                'slug'=>$cat_slug,
                'icon'=>$image,
                'description'=>$descpn,
                'detail_description'=>$detail_descpn,
                
                'meta_title'=>$meta_tag,
                'meta_description'=>$meta_desc,
                'meta_keyword'=>$meta_key,            
                'created_by'=>$user_id,
                'created_on'=>$current_date,
                

                );
          
          //echo '<pre>'; print_r($data); exit;
          $this->db->insert('tbl_exam_type',$data);
          $this->session->set_flashdata('succ_msg','Group added successfully');
          redirect('index.php/manage_exam_type/group_view/','refresh');

    }

   
    function insert()
    {

      if($this->session->userdata('session_user_id')!='')
      {
        $user_id= $this->session->userdata('session_user_id');
      }
      else
      {
        redirect('index.php/login','refresh');
      }

    	$parent_cat=$this->input->post('parent_cat');    	
    	$cat=$this->input->post('cat_name');
      $plan_price=$this->input->post('plan_price');
      $type=$this->input->post('type');
      $descpn=$this->input->post('description');
      $detail_descpn=$this->input->post('detail_description');
    	$cat_slug=$this->create_slug($cat);
    	$meta_tag=$this->input->post('meta_tag');
    	$meta_desc=$this->input->post('meta_desc');
    	$meta_key=$this->input->post('meta_key');
    
    	
    	$image=NULL;
        if(($_FILES['cat_icon']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/company_logo/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "cat_icon"; 
              
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
           $image_config['width'] = 50;
           $image_config['height']= 50;
           
           $image_config['master_dim'] = "height";
           $this->image_lib->initialize($image_config);
           $this->image_lib->resize(); 
           $this->image_lib->clear();
          } //end if
        }
    	
    	$current_date=date('Y-m-d H:i:s');
    	
    		$data = array(
    				
    				'exam_type_id'=>$parent_cat,
    				'exam_name'=>$cat,
    				'slug'=>$cat_slug,
    				'icon'=>$image,
            'description'=>$descpn,
            'detail_description'=>$detail_descpn,           
    				'meta_title'=>$meta_tag,
    				'meta_description'=>$meta_desc,
    				'meta_keyword'=>$meta_key,    				
    				'created_by'=>$user_id,
    				'created_on'=>$current_date,    				

    				);
    	
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->insert('tbl_exam_type',$data);
    	$this->session->set_flashdata('succ_msg','added successfully');
    	redirect('index.php/manage_exam_type/view/','refresh');
    }


    function group_delete()
    {
          $id=$this->uri->segment(3);

          $exam_type = $this->admin_model->selectOne('tbl_exam_type','id',$id);

          if(count($exam_type)!=0)
          {
          

          
            $this->db->where('id',$id);

            $this->db->delete('tbl_exam_type');
            
            $this->session->set_flashdata('succ_msg','deleted successfully.');
          
          }
            redirect('index.php/manage_exam_type/group_view/','refresh');
    }

function delete()
{
	$id=$this->uri->segment(3);

	$exam_type = $this->admin_model->selectOne('tbl_exam_type','id',$id);

	if(count($exam_type)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_exam_type');
				
				$this->session->set_flashdata('succ_msg','deleted successfully.');
			
			}
			redirect('index.php/manage_exam_type/view/','refresh');

	
}

function group_edit()
{
    if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

    $edit_id =$this->uri->segment(3);
    //++++++++++++++++++++++++++++++++++++++++++PARENT category++++++++++++++++++++++++++++++++++++++++
    //$data['parent_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


    $data['exam_type']=$this->admin_model->selectone('tbl_exam_type','id',$edit_id);

    $p1 = @$data['exam_type'][0]->exam_type_id;

        
    
    
    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('exam_type/group_edit_view',$data);
    $this->load->view('template/adminfooter_category');
}
function edit()

{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$edit_id =$this->uri->segment(3);
		//++++++++++++++++++++++++++++++++++++++++++PARENT category++++++++++++++++++++++++++++++++++++++++
		$data['parent_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


		$data['exam_type']=$this->admin_model->selectone('tbl_exam_type','id',$edit_id);

		$p1 = @$data['exam_type'][0]->exam_type_id;

        if($p1>0)
        {
            $m_cat = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$p1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            $data['m_cat'] = $m_cat;
         
		    }
		
		
		
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('exam_type/exam_type_edit_view',$data);
		$this->load->view('template/adminfooter_category');
}

function group_update()
{

     if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

      $edit_id=$this->input->post('edit_id');

    
      $cat=$this->input->post('cat_name');
     
      $descpn=$this->input->post('description');
      $detail_descpn=$this->input->post('detail_description');
      $cat_slug=$this->create_slug($cat);
      $meta_tag=$this->input->post('meta_tag');
      $meta_desc=$this->input->post('meta_desc');
      $meta_key=$this->input->post('meta_key');
      $old_image=$this->input->post('old_image');

      $image=NULL;
        if(($_FILES['cat_icon']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/company_logo/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "cat_icon"; 
              
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
           $image_config['width'] = 50;
           $image_config['height']= 50;
           
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

                    
                   
                    'exam_name'=>$cat,
                    'slug'=>$cat_slug,
                    'icon'=>$image,
                    'description'=>$descpn,
                    'detail_description'=>$detail_descpn,
                    'meta_title'=>$meta_tag,
                    'meta_description'=>$meta_desc,
                    'meta_keyword'=>$meta_key,            
                    'created_by'=>$user_id,
                    'created_on'=>$current_date,
                    'edited_by'=>$user_id,
                    'edited_on'=>$current_date,

                    );
        
      //echo '<pre>'; print_r($data); exit;
      $this->db->where('id',$edit_id);
      $this->db->update('tbl_exam_type',$data);
      $this->session->set_flashdata('succ_msg','Group updated successfully.');
      redirect('index.php/manage_exam_type/group_view/','refresh');

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

		  $edit_id=$this->input->post('edit_id');

		  $parent_cat=$this->input->post('parent_cat');     
      $cat=$this->input->post('cat_name');
      $plan_price=$this->input->post('plan_price');
      $type=$this->input->post('type');
      $descpn=$this->input->post('description');
      $detail_descpn=$this->input->post('detail_description');
      $cat_slug=$this->create_slug($cat);
      $meta_tag=$this->input->post('meta_tag');
      $meta_desc=$this->input->post('meta_desc');
      $meta_key=$this->input->post('meta_key');
      $old_image=$this->input->post('old_image');

    	$image=NULL;
        if(($_FILES['cat_icon']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/company_logo/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "cat_icon"; 
              
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
           $image_config['width'] = 50;
           $image_config['height']= 50;
           
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

                    
                    'exam_type_id'=>$parent_cat,
                    'exam_name'=>$cat,
                    'slug'=>$cat_slug,
                    'icon'=>$image,
                    
                    'description'=>$descpn,
                    'detail_description'=>$detail_descpn,
                    'meta_title'=>$meta_tag,
                    'meta_description'=>$meta_desc,
                    'meta_keyword'=>$meta_key,            
                    'created_by'=>$user_id,
                    'created_on'=>$current_date,
                    'edited_by'=>$user_id,
                    'edited_on'=>$current_date,

                    );
        
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->where('id',$edit_id);
    	$this->db->update('tbl_exam_type',$data);
    	$this->session->set_flashdata('succ_msg','updated successfully.');
    	redirect('index.php/manage_exam_type/view/','refresh');

}


function change_to_active()
{
	
		$cat_ids=$this->input->post('catid');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($cat_ids);$i++)
		{
			$id=$cat_ids[$i];
			$this->db->where('id',$id);

			if($this->db->update('tbl_exam_type',$data))
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




