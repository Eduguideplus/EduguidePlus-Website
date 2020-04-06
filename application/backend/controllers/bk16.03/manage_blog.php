<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_blog extends CI_Controller {
	
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
				
			//START admin_login CHECK++++++++++++++++++++++++++++++++++++++
			$this->session_check_and_session_data->session_check();
			//END admin_login CHECK++++++++++++++++++++++++++++++++++++++	
	}
	
function category_list()
	{
		  
	   	if($this->session->userdata('session_user_id')!='')
	    {
		    $user_id= $this->session->userdata('session_user_id');
	    }
	   	else
	   	{
		    redirect('login','refresh');
	    }

  		$data['active'] = "experience";
       	$data['career_category'] = $this->common->select($table_name='tbl_experience_category',$field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		 
	  	$this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
	  	$this->load->view('experience/cat_view',$data);
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



function blog_list()
	{
		  
	   	if($this->session->userdata('session_user_id')!='')
	    {
		    $user_id= $this->session->userdata('session_user_id');
	    }
	   	else
	   	{
		    redirect('index.php/login','refresh');
	    }

  		$data['active'] = "blog";
       //	$data['career'] = $this->common->select($table_name='tbl_blog',$field=array(),$where=array(),$like=array(),$order=array('blog_id'=>'desc'),$where_or=array(),$like_or_array=array());

        $data['career']=$this->common->select($table_name = 'tbl_blog', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('blog_id'=>'desc'), $start = '', $end = '');


		 
	  $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
	  	$this->load->view('blog/blog_view',$data);
	  	$this->load->view('template/adminfooter_category');
			
	}

function add_blog()
	{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}
		
	    $data['active']="blog";

	    $data['cat_details'] = $this->common->select($table_name='tbl_blog_category',$field=array(),$where=array('status'=>'active'),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		    

   // $data['country_details'] = $this->common->select($table_name='countries',$field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		    


	    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
	    $this->load->view('blog/blog_add_view',$data);
	   $this->load->view('template/adminfooter_category');	 
			
	}

function blog_add_submit()
	{
		 if($this->session->userdata('session_user_id')!='')
		    {
			  $user_id= $this->session->userdata('session_user_id');
		    }
		else{
			  redirect('index.php/login','refresh');


		    }


         $image=NULL;

         if(@$_FILES['slider_image']['name']!="")
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['slider_image']['tmp_name'];
            $file = $_FILES['slider_image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/blog/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/blog/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 841;
                $img_config_4['height'] = 400;
                $img_config_4['new_image'] ='../assets/uploads/blog/large/' . $image; 
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                
                $this->image_lib->clear();

               




                 $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/blog/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 60;
                $img_config_4['height'] = 41;
                $img_config_4['new_image'] ='../assets/uploads/blog/small/' . $image; 
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                
                $this->image_lib->clear();



                  $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/blog/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 405;
                $img_config_4['height'] = 193;
                $img_config_4['new_image'] ='../assets/uploads/blog/' . $image; 
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                
                $this->image_lib->clear();



                /* $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/blog/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 4256;
                $img_config_4['height'] = 2028;
                $img_config_4['new_image'] ='../assets/uploads/blog/large/' . $image; 
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                
                $this->image_lib->clear();*/







            
            }
        }




            
            $job_category = $this->input->post('job_category');

            $blog_title = $this->input->post('blog_title');
            $slug=$this->create_slug($blog_title);
            $blog_author = $this->input->post('blog_author');
            $meta_title = $this->input->post('meta_title');
            $meta_keyword = $this->input->post('meta_keyword');
            $meta_description = $this->input->post('meta_description');
            $description = $this->input->post('description');
           // $job_category = $this->input->post('job_category');


            
		    $insert_data= array( 

		    					'category_id'=>$job_category,
                                'blog_title'=>$blog_title,
                                'blog_title_slug'=>$slug,
                                'blog_author'=>$blog_author,
                                'blog_description'=>$description,
                                'meta_title'=>$meta_title,
                                'meta_keyword'=>$meta_keyword,
                                'meta_description'=>$meta_description,
                                'blog_image'=>$image,

                                'created_by'=>$this->session->userdata('session_user_id'),
                                'created_on'=>date('Y-m-d'),
                                'blog_status'=>'active'
                               
                               );

		  
		    $this->db->insert('tbl_blog', $insert_data);
		    $this->session->set_flashdata('succ_add','Successfully added');
		    redirect('index.php/manage_blog/blog_list','refresh');
	}

function edit_blog()
	{
		     if($this->session->userdata('session_user_id')!='')
		       {
			      $user_id= $this->session->userdata('session_user_id');
		       }
		     else{
			      redirect('index.php/login','refresh');
		         }


		     $id= $this->uri->segment(3);
		     $data['active']="blog";

		     $data['career_details']= $this->common->select($table_name='tbl_blog',$field=array(),
			 $where=array('blog_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());



			  $data['cat_details'] = $this->common->select($table_name='tbl_blog_category',$field=array(),$where=array('status'=>'active'),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		    

   // $data['country_details'] = $this->common->select($table_name='countries',$field=array(),$where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());




//	$data['cat_details']= $this->common->select($table_name='tbl_experience_category',$field=array(),$where=array('status'=>"active"),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());


		     $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
		     $this->load->view('blog/blog_edit_view',$data);
		    $this->load->view('template/adminfooter_category');	
	}
	
function blog_edit_submit()
	{
		if($this->session->userdata('session_user_id')!='')
		{
		 	$user_id= $this->session->userdata('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}

		$edit_id= $this->input->post('edit_id');

		$old_pic=$this->input->post('old_pic');

          $image=NULL;

        if($_FILES['gallery_image']['name']=="")
        {
            $image=$old_pic;
            //echo $image; exit;
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['gallery_image']['tmp_name'];
            $file = $_FILES['gallery_image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg")
            {
                move_uploaded_file($file_tmp, "../assets/uploads/blog/" . $new_name . "." . $ext);
                
                $image = $new_name . "." . $ext;
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/blog/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 841;
                $img_config_4['height'] = 400;
                $img_config_4['new_image'] ='../assets/uploads/blog/large/' . $image; 
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                
                $this->image_lib->clear();

                

                 $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/blog/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 60;
                $img_config_4['height'] = 41;
                $img_config_4['new_image'] ='../assets/uploads/blog/small/' . $image; 
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                
                $this->image_lib->clear();




                 $image = $new_name . "." . $ext;
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/blog/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 405;
                $img_config_4['height'] = 193;
                $img_config_4['new_image'] ='../assets/uploads/blog/' . $image; 
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                
                $this->image_lib->clear();


/*
                 $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/blog/' . $image;
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 4256;
                $img_config_4['height'] = 2028;
                $img_config_4['new_image'] ='../assets/uploads/blog/large/' . $image; 
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                
                $this->image_lib->clear();*/





            
            }

            @unlink('../assets/uploads/blog/'.$old_pic);

            @unlink('../assets/uploads/blog/large/'.$old_pic);

            @unlink('../assets/uploads/blog/small/'.$old_pic);
            
        }
        











          $job_category = $this->input->post('job_category');

            $blog_title = $this->input->post('blog_title');
            $slug=$this->create_slug($blog_title);
            $blog_author = $this->input->post('blog_author');
            $meta_title = $this->input->post('meta_title');
            $meta_keyword = $this->input->post('meta_keyword');
            $meta_description = $this->input->post('meta_description');
            $description = $this->input->post('description');





		    
		$update_data= array( 

                              'category_id'=>$job_category,
                                'blog_title'=>$blog_title,
                                'blog_title_slug'=>$slug,
                                'blog_author'=>$blog_author,
                                'blog_description'=>$description,
                                'meta_title'=>$meta_title,
                                'meta_keyword'=>$meta_keyword,
                                'meta_description'=>$meta_description,
                                'blog_image'=>$image,

                                'created_by'=>$this->session->userdata('session_user_id'),
                                'created_on'=>date('Y-m-d')
                               
                                 
							);

		$this->db->where('blog_id',$edit_id);
        $this->db->update('tbl_blog',$update_data);
		$this->session->set_flashdata('succ_update','updated successfully.');
		redirect('index.php/manage_blog/blog_list');
	}

function delete_blog()
	{
		if($this->session->userdata('session_user_id')!='')
		   {
			  $user_id= $this->session->userdata('session_user_id');
		   }
		else{
			  redirect('index.php/login','refresh');
		    }
		
		$id= $this->uri->segment(3);



      $comment_details= $this->common->select($table_name='tbl_blog_comment',$field=array(),
			 $where=array('blog_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());


            for($i=0;$i<count($comment_details);$i++){

            	$this->db->where('blog_id',$id);
    $this->db->delete('tbl_blog_comment');
            }





		$ex_details= $this->common->select($table_name='tbl_blog',$field=array(),
			 $where=array('blog_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

		// echo $ex_details[0]->blog_image; exit;


		 @unlink('../assets/uploads/blog/'.@$ex_details[0]->blog_image);

          @unlink('../assets/uploads/blog/small/'.@$ex_details[0]->blog_image);
           @unlink('../assets/uploads/blog/large/'.@$ex_details[0]->blog_image);
		
		$this->db->where('blog_id',$id);
		$this->db->delete('tbl_blog');

		$this->session->set_flashdata('succ_delete','blog has been deleted.');
		redirect('index.php/manage_blog/blog_list');
	}

function blog_change_status()
  {
	
		$test_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('blog_status'=>$status);


		for($i=0;$i<count($test_ids);$i++)
		{
			$id=$test_ids[$i];
			$this->db->where('blog_id',$id);

			if($this->db->update('tbl_blog',$data))
			{
				$result=1;
			}
			
		}
		
		echo json_encode(array('changedone'=>$result));
		
}




function comment_view()
{
      

        $id=$this->uri->segment(3);
        $data['active']="blog";
   

    $data['comment']=$this->common->select($table_name = 'tbl_blog_comment', $field = array(), $where = array('blog_id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array('blog_id'=>'DESC'), $start = '', $end = '');

    $data['blog_id']=$id;
  
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('blog/comment_list',$data);
   $this->load->view('template/adminfooter_category'); 

}

function delete_comment()
{

    $id=$this->uri->segment(3);

    $blog_id=$this->common->select($table_name = 'tbl_blog_comment', $field = array(), $where = array('comment_id'=>$id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $blg_id=@$blog_id[0]->blog_id;

    $this->db->where('comment_id',$id);
    $this->db->delete('tbl_blog_comment');
    redirect('index.php/manage_blog/comment_view/'.$blg_id,'refresh');
}


function status_change_comment()
{
        
        $ids=$this->input->post('comment_id');
        $status=$this->input->post('status');
        $data=array('approved'=>$status);


        for($i=0;$i<count($ids);$i++)
        {
            $id=$ids[$i];
            $this->db->where('comment_id',$id);
            if($this->db->update('tbl_blog_comment',$data))
            {
                $result=1;
            }
        }
            
        echo json_encode(array('changedone'=>$result));
        
}







}

?>