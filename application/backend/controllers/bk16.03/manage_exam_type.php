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


public function course_view()
{
  
  if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

  $data['active']='manage_exam_type';

 $data['exam_type']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
  

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu',$data);
  $this->load->view('exam_type/course_type_list_view',$data);
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


    $data['active']='manage_exam_type';

	//$data['exam_type']=$this->admin_model->selectAll('tbl_exam_type');
    $data['exam_type']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id !='=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu',$data);
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


    function add_course()
    {

        if($this->session->userdata('session_user_id')!='')
        {
          $user_id= $this->session->userdata('session_user_id');
        }
        else
        {
          redirect('index.php/login','refresh');
        }

        $data['active']='manage_exam_type';

          
          

          //echo '<pre>';print_r($data['category_list']); exit;

          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu',$data);
          $this->load->view('exam_type/course_add_view',$data);
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


      $data['exam_level']=$this->common_model->common($table_name = 'tbl_exam_level', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    	

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


    function course_insert()
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
          // $detail_descpn=$this->input->post('detail_description');
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
                
              
               
               
               // $image_config["image_library"] = "gd2";
               // $image_config["source_image"] ='../assets/uploads/company_logo/'.$image;   
               // $image_config['create_thumb'] = FALSE;
               // $image_config['maintain_ratio'] = TRUE;
               // $image_config['new_image'] = '../assets/uploads/company_logo/'.$image; 
               // $image_config['quality'] = "100%";
               // $image_config['width'] = 70;
               // $image_config['height']= 70;
               
               // $image_config['master_dim'] = "height";

                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/company_logo/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 70;
                $img_config_4['height'] = 70;
                $img_config_4['new_image'] ='../assets/uploads/company_logo/' . $image;

            
               $this->image_lib->initialize($img_config_4);
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
                
                
                'meta_title'=>$meta_tag,
                'meta_description'=>$meta_desc,
                'meta_keyword'=>$meta_key,            
                'created_by'=>$user_id,
                'created_on'=>$current_date,
                

                );
          
          //echo '<pre>'; print_r($data); exit;
          $this->db->insert('tbl_exam_type',$data);
          $this->session->set_flashdata('succ_msg','Course added successfully');
          redirect('index.php/manage_exam_type/course_view/','refresh');

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
     
      $exam_level=$this->input->post('exam_level');

      // print_r($video_link); 
      $descpn=$this->input->post('description');
      
    	$cat_slug=$this->create_slug($cat);
    	$meta_tag=$this->input->post('meta_tag');
    	$meta_desc=$this->input->post('meta_desc');
    	$meta_key=$this->input->post('meta_key');
    
    	
    	$image=NULL;
        if(($_FILES['cat_icon']['name'])!='')
          {
          $new_name =time().'examicon';      
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
           $image_config['width'] = 70;
           $image_config['height']= 70;
           
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
                      
    				'meta_title'=>$meta_tag,
    				'meta_description'=>$meta_desc,
    				'meta_keyword'=>$meta_key,    				
    				'created_by'=>$user_id,
    				'created_on'=>$current_date,
            'exam_level_id'=>$exam_level   				

    				);
    	
    	
    	$this->db->insert('tbl_exam_type',$data);

    
    	$this->session->set_flashdata('succ_msg','added successfully');
    	redirect('index.php/manage_exam_type/view/','refresh');
    }



    function course_delete()
    {
          $id=$this->uri->segment(3);

          $exam_type = $this->admin_model->selectOne('tbl_exam_type','id',$id);

          if(@$exam_type[0]->icon)
          {
              unlink('../assets/uploads/company_logo/'.@$exam_type[0]->icon);

          }

          if(count($exam_type)!=0)
          {
          

          
            $this->db->where('id',$id);

            $this->db->delete('tbl_exam_type');
            
            $this->session->set_flashdata('succ_msg','deleted successfully.');
          
          }
            redirect('index.php/manage_exam_type/course_view/','refresh');
    }

function delete()
{
	$id=$this->uri->segment(3);

	$exam_type = $this->admin_model->selectOne('tbl_exam_type','id',$id);

	if(count($exam_type)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_exam_type');

        $this->db->where('exam_type_id',$id);
        $this->db->delete('tbl_video_link');
				
				$this->session->set_flashdata('succ_msg','deleted successfully.');
			
			}
			redirect('index.php/manage_exam_type/view/','refresh');

	
}


function course_edit()
{
    if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

    $data['active']='manage_exam_type';

    $edit_id =$this->uri->segment(3);
    //++++++++++++++++++++++++++++++++++++++++++PARENT category++++++++++++++++++++++++++++++++++++++++
    //$data['parent_type']=$this->admin_model->selectone('tbl_exam_type','exam_type_id','0');
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


    $data['exam_type']=$this->admin_model->selectone('tbl_exam_type','id',$edit_id);

    $p1 = @$data['exam_type'][0]->exam_type_id;

        
    
    
    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('exam_type/course_edit_view',$data);
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


    $data['exam_level']=$this->common_model->common($table_name = 'tbl_exam_level', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		
		
		
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('exam_type/exam_type_edit_view',$data);
		$this->load->view('template/adminfooter_category');
}

function course_update()
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
            
          
           
           
           // $image_config["image_library"] = "gd2";
           // $image_config["source_image"] ='../assets/uploads/company_logo/'.$image;   
           // $image_config['create_thumb'] = FALSE;
           // $image_config['maintain_ratio'] = TRUE;
           // $image_config['new_image'] = '../assets/uploads/company_logo/'.$image; 
           // $image_config['quality'] = "100%";
           // $image_config['width'] = 50;
           // $image_config['height']= 50;
           
           // $image_config['master_dim'] = "height";

                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/company_logo/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = TRUE;
                $img_config_4['width']  = 70;
                $img_config_4['height'] = 70;
                $img_config_4['new_image'] ='../assets/uploads/company_logo/' . $image;




           $this->image_lib->initialize($img_config_4);
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
      $this->session->set_flashdata('succ_msg','Course updated successfully.');
      redirect('index.php/manage_exam_type/course_view/','refresh');

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
      // $plan_price=$this->input->post('plan_price');
      $exam_level=$this->input->post('exam_level');
      // print_r($video_link); exit;
      $descpn=$this->input->post('description');
      // $detail_descpn=$this->input->post('detail_description');
      $cat_slug=$this->create_slug($cat);
      $meta_tag=$this->input->post('meta_tag');
      $meta_desc=$this->input->post('meta_desc');
      $meta_key=$this->input->post('meta_key');
      $old_image=$this->input->post('old_image');

    	$image=NULL;
        if(($_FILES['cat_icon']['name'])!='')
          {
          $new_name =time().'examicon';      
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
           $image_config['width'] = 70;
           $image_config['height']= 70;
           
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
                    
                    'meta_title'=>$meta_tag,
                    'meta_description'=>$meta_desc,
                    'meta_keyword'=>$meta_key,            
                    
                    'edited_by'=>$user_id,
                    'edited_on'=>$current_date,
                    'exam_level_id'=>$exam_level

                    );
        
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->where('id',$edit_id);
    	$this->db->update('tbl_exam_type',$data);

      // $video=$this->common->select($table_name = 'tbl_video_link', $field = array(), $where = array('exam_type_id'=>$edit_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      // for ($i=0; $i <count($video) ; $i++) { 
      //   if($video[$i]!='')
      //   {
      //     $this->db->where('exam_type_id',$edit_id);
      //     $this->db->delete('tbl_video_link');
      //   }
      // }

      // for ($i=0; $i <count($video_link); $i++) { 


      //    $data1 = array(

                    
      //               'video_link'=>$video_link[$i],
      //               'exam_type_id'=>$edit_id
                   

      //               );
      //    $this->db->insert('tbl_video_link',$data1);
      // }

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


function exam_info()
{
  $id= $this->uri->segment(3);

  $data['exam_info']=$this->common_model->common($table_name = 'tbl_exam_info', $field = array(), $where = array('exam_type_id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  // print_r($data['exam_info']); exit;

      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('exam_type/exam_info',$data);
      $this->load->view('template/adminfooter_category');

}


function add_exam_info()
{

    $exam_id=$this->uri->segment(3);

    $data['exam_id']=$exam_id;

      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('exam_type/exam_info_add',$data);
      $this->load->view('template/adminfooter_category');
}


function insert_exam_info()
{

   if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

  $exam_id=$this->input->post('exam_id');
  $info_title=$this->input->post('info_title');
  $des_title=$this->input->post('des_title');
  $description=$this->input->post('description');
  $video_title=$this->input->post('video_title');
  $video_link=$this->input->post('video_link');

  $data=array(
              'exam_type_id'=>$exam_id,
              'info_title'=>$info_title,
              'info_description_title'=>$des_title,
              'info_description'=>$description,
              'created_by'=>$user_id,
              'created_date'=>date('Y-m-d')


              );
     $this->db->insert('tbl_exam_info',$data);
     $info_id= $this->db->insert_id();

     for ($i=0; $i <count($video_link) ; $i++) { 
       $data2= array(
                     'exam_info_id'=>$info_id,
                     'video_title'=>$video_title,
                     'video'=>$video_link[$i],
                     'created_by'=>$user_id,
                     'created_date'=>date('Y-m-d')

                     );
       $this->db->insert('tbl_exam_info_video ',$data2);
     }

      $this->session->set_flashdata('succ_msg','insert successfully.');
      redirect('index.php/manage_exam_type/exam_info/'.$exam_id,'refresh');
}

function edit_exam_info()
{
  $exam_id=$this->uri->segment(3);
  $edit_id=$this->uri->segment(4);

  // echo $edit_id; exit;

  $data['exam_info']=$this->common_model->common($table_name = 'tbl_exam_info', $field = array(), $where = array('info_id'=>$edit_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $data['exam_id']=$exam_id;

  // print_r($data['exam_info']); exit;

      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('exam_type/exam_info_edit',$data);
      $this->load->view('template/adminfooter_category');

}

function update_exam_info()
{

   if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

  $exam_id=$this->input->post('exam_id');
  $edit_id=$this->input->post('edit_id');
  $info_title=$this->input->post('info_title');
  $des_title=$this->input->post('des_title');
  $description=$this->input->post('description');

  $data=array(
              'info_title'=>$info_title,
              'info_description_title'=>$des_title,
              'info_description'=>$description,
              'edited_by'=>$user_id,
              'edited_date'=>date('Y-m-d')
              );

  $this->db->where('info_id',$edit_id);
  $this->db->update('tbl_exam_info',$data);

  $this->session->set_flashdata('succ_msg','updated successfully.');
  redirect('index.php/manage_exam_type/exam_info/'.$exam_id,'refresh');
  

}


function delete_exam_info()
{
  $exam_id=$this->uri->segment(4);
  $id=$this->uri->segment(3);

  // print_r($exam_id);
  // print_r($id); exit;

  $this->db->where('info_id',$id);
  $this->db->delete('tbl_exam_info');

  $this->db->where('exam_info_id',$id);
  $this->db->delete('tbl_exam_info_video');

  $this->session->set_flashdata('succ_msg','Deleted successfully.');
  redirect('index.php/manage_exam_type/exam_info/'.$exam_id,'refresh');
}


function change_to_active_exam_info()
{
  
    $cat_ids=$this->input->post('catid');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($cat_ids);$i++)
    {
      $id=$cat_ids[$i];


     // $exam_info=$this->common_model->common($table_name = 'tbl_exam_info_video', $field = array(), $where = array('exam_info_id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $this->db->where('exam_info_id',$id);
    //  $this->db->where('exam_info_id',$id);

     $this->db->update('tbl_exam_info_video',$data);



      $this->db->where('info_id',$id);
    //  $this->db->where('exam_info_id',$id);

      if($this->db->update('tbl_exam_info',$data) )
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

function info_video()
{
  $exam_id=$this->uri->segment(3);
  $info_id=$this->uri->segment(4);

  $data['video_info']=$this->common_model->common($table_name = 'tbl_exam_info_video', $field = array(), $where = array('exam_info_id'=>$info_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('exam_type/exam_info_video',$data);
      $this->load->view('template/adminfooter_category');


}

function edit_video()
{

    $edit_id=$this->uri->segment(4);
    $exam_id=$this->uri->segment(3);

    // print_r($exam_id); exit;
   
    $data['video_info']=$this->common_model->common($table_name = 'tbl_exam_info_video', $field = array(), $where = array('video_id'=>$edit_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    // print_r($data['video_info']); exit;

    $data['exam_id']=$exam_id;

      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('exam_type/exam_info_video_edit',$data);
      $this->load->view('template/adminfooter_category');
}

function update_video()
{
  
   if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

  $edit_id=$this->input->post('edit_id');
  $exam_id=$this->input->post('exam_id');
  $video_title=$this->input->post('video_title');
  $video=$this->input->post('video');
  $exam_info_id=$this->input->post('exam_info_id');

  $data=array(
               'video_title'=>$video_title,
               'video'=>$video,
               'edited_by'=>$user_id,
               'edited_date'=>date('Y-m-d')
             );

  $this->db->where('video_id',$edit_id);
  $this->db->update('tbl_exam_info_video',$data);

  $this->session->set_flashdata('succ_msg','Updated successfully.');
  redirect('index.php/manage_exam_type/info_video/'.$exam_id.'/'.$exam_info_id,'refresh');
}


function delete_video()
{
  $exam_id=$this->uri->segment(4);
  $id=$this->uri->segment(3);
  $exam_info_id=$this->uri->segment(5);
  // print_r($exam_info_id);exit;

  

  $this->db->where('video_id',$id);
  $this->db->delete('tbl_exam_info_video');

  $this->session->set_flashdata('succ_msg','Deleted successfully.');
  redirect('index.php/manage_exam_type/info_video/'.$exam_id.'/'.$exam_info_id,'refresh');
}


function change_to_active_video()
{
  
    $cat_ids=$this->input->post('catid');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($cat_ids);$i++)
    {
      $id=$cat_ids[$i];
      $this->db->where('video_id',$id);

      if($this->db->update('tbl_exam_info_video',$data))
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


function edit_video_title()
{
  $edit_id=$this->uri->segment(4);
  $exam_id=$this->uri->segment(3);



  $data['video_title']=$this->common_model->common($table_name = 'tbl_exam_info_video', $field = array(), $where = array('exam_info_id'=>$edit_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


  $data['exam_id']=$exam_id;


  // echo '<pre>';
  // print_r($data['video_title']); exit;

      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('exam_type/edit_video_title',$data);
      $this->load->view('template/adminfooter_category');

}


function update_video_title()
{
  $edit_id=$this->input->post('edit_id');
  $exam_id=$this->input->post('exam_id');
  $video_title=$this->input->post('video_title');

  $data=array(
               'video_title'=>$video_title


            );

  $this->db->where('exam_info_id',$edit_id);
  $this->db->update('tbl_exam_info_video',$data);

  $this->session->set_flashdata('succ_msg','Video Title updated successfully.');
  redirect('index.php/manage_exam_type/info_video/'.$exam_id.'/'.$edit_id,'refresh');
}

function add_single_video()
{
  $exam_id=$this->uri->segment(3);
  $exam_info_id=$this->uri->segment(4);
  // print_r($exam_id); exit;
  $data['exam_id']=$exam_id;
  $data['exam_info_id']=$exam_info_id;

      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('exam_type/add_single_video',$data);
      $this->load->view('template/adminfooter_category');
}

function insert_single_video()
{
  $exam_id=$this->input->post('exam_id');
  $exam_info_id=$this->input->post('exam_info_id');
  // print_r($exam_info_id); exit;
  $video=$this->input->post('video');

  $data=array(
              'video'=>$video,
              'exam_info_id'=>$exam_info_id

              );

  $this->db->insert('tbl_exam_info_video',$data);

  $this->session->set_flashdata('succ_msg','Video Title updated successfully.');
  redirect('index.php/manage_exam_type/info_video/'.$exam_id.'/'.$exam_info_id,'refresh');
}

function online_exam_change()
    {
    $p_id=$this->input->post('pid');

    $data=$this->admin_model->selectOne('tbl_exam_type','id',$p_id);
    $avail=$data[0]->online_exam;


    if($avail=="Yes")
    {
        $pop="No";
        $result['status']=0;
    }
    if($avail=="No")
    {
        $pop="Yes";
        $result['status']=1;
    }
    $data=array('online_exam'=>$pop);

    $this->db->where('id',$p_id);
    $this->db->update('tbl_exam_type',$data);
    
    echo json_encode(array('changedone'=>$result));

    }




		
		
		
}




