<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_category extends CI_Controller {
	
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
	$data['category_list']=$this->admin_model->selectAll('tbl_category');
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('manage_category/category_table_view',$data);
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
    	$data['category_list']=$this->admin_model->selectone('tbl_category','parent_category','0');
    	

    	//echo '<pre>';print_r($data['category_list']); exit;


      $data['practice'] =$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('type'=>'practice','exam_type_id !='=>0), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    	$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_category/category_add_view',$data);
		$this->load->view('template/adminfooter_category');
    }

    function get_subcategory()
    {
        $category_id=$this->input->post('category_id');
        $data=$this->common_model->common($table_name = 'tbl_category', $field = array(), $where = array('parent_category'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
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
    	$parent_cat=$this->input->post('parent_cat');
    	$sub_cat=$this->input->post('sub_category');
    	$cat=$this->input->post('cat_name');
    	$cat_slug=$this->create_slug($cat);


    	$cat_desc=$this->input->post('cat_desc');
    	$meta_tag=$this->input->post('meta_tag');
    	$meta_desc=$this->input->post('meta_desc');
    	$meta_key=$this->input->post('meta_key');
    	$sort_order=$this->input->post('sort_order');
    	$show_in_menu=$this->input->post('show_in_menu');

       $exam_id=$this->input->post('exam_name');
    	/*$status=$this->input->post('status');*/
    	//$slug=$this->create_slug($sub_name);
    	$image=NULL;
        if(($_FILES['cat_icon']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/cat_icon/';
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
           $image_config["source_image"] ='../assets/uploads/cat_icon/'.$image;   
           $image_config['create_thumb'] = FALSE;
           $image_config['maintain_ratio'] = FALSE;
           $image_config['new_image'] = '../assets/uploads/cat_icon/'.$image; 
           $image_config['quality'] = "100%";
           $image_config['width'] = 30;
           $image_config['height']= 30;
           
           $image_config['master_dim'] = "height";
           $this->image_lib->initialize($image_config);
           $this->image_lib->resize(); 
           $this->image_lib->clear();
          } //end if
        }
    	
    	$current_date=date('Y-m-d H:i:s');
    	if($sub_cat=='')
    	{
    		$data = array(

    				
    				'parent_category'=>$parent_cat,
    				'category_name'=>$cat,
    				'category_slug'=>$cat_slug,
             'exam_id'=>$exam_id,
    				'category_sort_order'=>$sort_order,
    				'category_meta_title'=>$meta_tag,
    				'category_meta_description'=>$meta_desc,
    				'category_meta_keyword'=>$meta_key,
    				/*'category_status'=>$status,*/
    				'category_description'=>$cat_desc,
    				'show_menu'=>$show_in_menu,
    				'category_description'=>$cat_desc,
            'category_icon'=>$image,
            'created_by'=>$user_id,
            'created_on'=>$current_date,

    				);
    	}
    	else
    	{
    		$data = array(

    				
    				'parent_category'=>$sub_cat,
    				'category_name'=>$cat,
    				'category_slug'=>$cat_slug,
             'exam_id'=>$exam_id,
    				'category_sort_order'=>$sort_order,
    				'category_meta_title'=>$meta_tag,
    				'category_meta_description'=>$meta_desc,
    				'category_meta_keyword'=>$meta_key,
    				/*'category_status'=>$status,*/
    				'category_description'=>$cat_desc,
    				'show_menu'=>$show_in_menu,
    				'category_description'=>$cat_desc,
            'category_icon'=>$image,
            'created_by'=>$user_id,
            'created_on'=>$current_date,

    				);
    	}
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->insert('tbl_category',$data);
    	$this->session->set_flashdata('succ_msg','One category added successfully');
    	redirect('index.php/manage_category/view/','refresh');


    }

function delete()
{
	$id=$this->uri->segment(3);

	$sub = $this->admin_model->selectOne('tbl_category','category_id',$id);

	if(count($sub)!=0)
			{
			

			
				$this->db->where('category_id',$id);

				$this->db->delete('tbl_category');
				
				$this->session->set_flashdata('succ_msg','One Category deleted successfully.');
			
			}
			redirect('index.php/manage_category/view/','refresh');

	
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

		$category_id =$this->uri->segment(3);
		//++++++++++++++++++++++++++++++++++++++++++PARENT category++++++++++++++++++++++++++++++++++++++++
		$data['parent_category_list']=$this->admin_model->selectone('tbl_category','parent_category','0');
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


		$data['category']=$this->admin_model->selectone('tbl_category','category_id',$category_id);

		$p1 = @$data['category'][0]->parent_category;

        if($p1>0)
        {
            $m_cat = $this->common_model->common($table_name = 'tbl_category', $field = array(), $where = array('category_id'=>$p1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            $data['m_cat'] = $m_cat;
        	
                  
        
        $p2 = @$m_cat[0]->parent_category;

               
        //echo $p2; exit;
        if($p2>0)
        {
            $p_cat = $this->common_model->common($table_name = 'tbl_category', $field = array(), $where = array('category_id'=>$p2), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            $data['p_cat'] = $p_cat;
            $data['sub_cat'] = $m_cat;
        }
		}
		
		
		$data['practice'] =$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('type'=>'practice','exam_type_id !='=>0), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_category/category_edit_view',$data);
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
		$cat_id=$this->input->post('cat_edit_id');

		$parent_cat=$this->input->post('parent_cat');
        $sub_cat=$this->input->post('sub_category');
        $cat=$this->input->post('cat_name');
        $cat_slug=$this->create_slug($cat);
        $cat_desc=$this->input->post('cat_desc');
        $meta_tag=$this->input->post('meta_tag');
        $meta_desc=$this->input->post('meta_desc');
        $meta_key=$this->input->post('meta_key');
        $sort_order=$this->input->post('sort_order');
        $show_in_menu=$this->input->post('show_in_menu');
        $status=$this->input->post('status');
        $old_image=$this->input->post('old_image');
        $exam_id=$this->input->post('exam_name');

    	$image=NULL;

        if(($_FILES['category_icon']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/cat_icon/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "category_icon"; 
              
          $image=NULL;   
          if($this->upload->do_upload($field_name))
          { 
            
           $file_info = $this->upload->data();
           $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
           $file_size=$file_info['file_size'];
           $this->image_lib->clear();     
           $image =$file_info['raw_name'].$file_info['file_ext']; 
            
          
           
           
           $image_config["image_library"] = "gd2";
           $image_config["source_image"] ='../assets/uploads/cat_icon/'.$image;   
           $image_config['create_thumb'] = FALSE;
           $image_config['maintain_ratio'] = FALSE;
           $image_config['new_image'] = '../assets/uploads/cat_icon/'.$image; 
           $image_config['quality'] = "100%";
           $image_config['width'] = 30;
           $image_config['height']= 30;
           
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
            @unlink('../assets/uploads/cat_icon/'.$old_image);
          }
    	
    	$current_date=date('Y-m-d H:i:s');
    	if($sub_cat=='')
        {
            $data = array(

                    
                    'parent_category'=>$parent_cat,
                    'category_name'=>$cat,
                    'category_slug'=>$cat_slug,
                    'exam_id'=>$exam_id,
                    'category_sort_order'=>$sort_order,
                    'category_meta_title'=>$meta_tag,
                    'category_meta_description'=>$meta_desc,
                    'category_meta_keyword'=>$meta_key,
                    'category_status'=>$status,
                    'category_description'=>$cat_desc,
                    'show_menu'=>$show_in_menu,
                    'category_description'=>$cat_desc,
                    'category_icon'=>$image,
                    'edited_by'=>$user_id,
                    'edited_on'=>$current_date,

                    );
        }
        else
        {
            $data = array(

                    
                    'parent_category'=>$sub_cat,
                    'category_name'=>$cat,
                    'category_slug'=>$cat_slug,
                    'exam_id'=>$exam_id,
                    'category_sort_order'=>$sort_order,
                    'category_meta_title'=>$meta_tag,
                    'category_meta_description'=>$meta_desc,
                    'category_meta_keyword'=>$meta_key,
                    'category_status'=>$status,
                    'category_description'=>$cat_desc,
                    'show_menu'=>$show_in_menu,
                    'category_description'=>$cat_desc,
                    'category_icon'=>$image,
                    'edited_by'=>$user_id,
                    'edited_on'=>$current_date,

                    );
        }
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->where('category_id',$cat_id);
    	$this->db->update('tbl_category',$data);
    	$this->session->set_flashdata('succ_msg','One Category updated successfully.');
    	redirect('index.php/manage_category/view/','refresh');

}

function popularity_change()
{
	$cat_id=$this->uri->segment(3);
	$data=$this->admin_model->selectOne('tbl_category','category_id',$cat_id);
	$popularity=$data[0]->popularity;

	if($popularity=="yes")
	{
		$pop="no";
	}
	if($popularity=="no")
	{
		$pop="yes";
	}
	$data=array('popularity'=>$pop);

	$this->db->where('category_id',$cat_id);
   	$this->db->update('tbl_category',$data);
	redirect('index.php/manage_category/category_view/','refresh');

}
function change_to_active()
{
	
		$cat_ids=$this->input->post('catid');
		$status=$this->input->post('status');
		$data=array('category_status'=>$status);


		for($i=0;$i<count($cat_ids);$i++)
		{
			$id=$cat_ids[$i];
			$this->db->where('category_id',$id);

			if($this->db->update('tbl_category',$data))
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




