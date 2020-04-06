<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_gallery extends CI_Controller {
	
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
	
function list_view()
	{
		  
		   if(get_cookie('session_user_id')!='')
		       {
			     $user_id= get_cookie('session_user_id');
		       }
		   else{
			     redirect('index.php/login','refresh');
		       } 
	  $data['active']="gallery";
	       $data['gallery_details']=$this->admin_model->get_gallery_details();
		 
		 $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_gallery/gallery_list_view',$data);
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

function add_view()
	{
		  if(get_cookie('session_user_id')!='')
		    {
			  $user_id= get_cookie('session_user_id');
		    }
		else{
			  redirect('index.php/login','refresh');
		    }
$data['active']="gallery";
		    $data['cat_details']= $this->common->select($table_name='tbl_gallery_category',$field=array(),
	    	$where=array('status'=>'active'),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		 
		   $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
		   $this->load->view('manage_gallery/gallery_add_view',$data);
		  $this->load->view('template/adminfooter_category');	 
			
	}

function insert_gallery()
	{
		 if(get_cookie('session_user_id')!='')
		    {
			  $user_id= get_cookie('session_user_id');
		    }
		else{
			  redirect('index.php/login','refresh');
		    }

		  /* if($_FILES['gallery_image']['name']=="")
        {
            $image="";
            
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
                move_uploaded_file($file_tmp, "../assets/uploads/category/gallery/" . $new_name . "." . $ext);
                $image = $new_name . "." . $ext;
                //--------MAIN IAMGE-----//
                $config['image_library'] = 'gd2';
                $config['source_image'] = '../assets/uploads/category/gallery/' . $image;   
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = "100%";
                
                    //--------MEDIUM IAMGE-----//
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = '../assets/uploads/category/gallery/'.$image;
                $config['quality'] = "100%";
                $config['width'] = 788;                        
                $config['height']= 543;
                $config['master_dim'] ="height" ;  


               $this->image_lib->initialize($config);
               $this->image_lib->resize(); 
               $this->image_lib->clear();
                      
}
 else
            {
              

              $this->session->set_flashdata('succ_add','Insert Proper Image');
		    redirect('index.php/manage_gallery/list_view','refresh');


            }



            }*/




            $user_id=get_cookie('session_user_id');
            $status = $this->input->post('status');
             //echo $status; exit;
		    $gallery_title=$this->input->post('gallery_title');

		   $category=$this->input->post('category');

		    $type=$this->input->post('type');
		    $video_link=$this->input->post('video_link');

		    $slug=$this->create_slug($gallery_title);
            $gallery_year=$this->input->post('gallery_year');
            $meta_title=$this->input->post('meta_title');
            $meta_keyword=$this->input->post('meta_keyword');
            $meta_description=$this->input->post('meta_description');
            $id=$this->input->post('gallery_id');
             //echo $id; exit;
             $pro_image_org= $this->image_upload_pro('gallery_image','category/gallery',$category);

		   /* $insert_data= array( 'gallery_year'=>$gallery_year,
                                 'gallery_title'=>$gallery_title,
                                 'cat_id'=>$category,
							  	 'gallery_cover_image'=>$image,
							  	 'status'=>$status,

							  	 'type'=>$type,
							  	 'video_link'=>$video_link,

							  	 'slug'=>$slug,
				                 'meta_title'=>$meta_title,
							  	 'meta_keyword'=>$meta_keyword,
							  	 'meta_description'=>$meta_description,
							  	 'created_by'=>$user_id,
							  	 'created_on'=>date('Y-m-d:H:i:s'));

		   // print_r($insert_data); exit;
		    $this->db->insert('tbl_gallery', $insert_data);*/







		     //  $product_id = $this->db->insert_id();




		  if($type=='image')
                {  

        if(count($pro_image_org)>0)
                {
                    for($x=0;$x<count($pro_image_org);$x++)
                    {
                        
                        $insert_image_array = array(

                                                    
                                 'gallery_cover_image'=>$pro_image_org[$x]['product_image'],

                                 'cat_id'=>$category,
							  	// 'gallery_cover_image'=>$image,
							  	 'status'=>$status,

							  	 'type'=>$type,
							  	// 'video_link'=>$video_link,

							  	 'slug'=>$slug,
				                 'meta_title'=>$meta_title,
							  	 'meta_keyword'=>$meta_keyword,
							  	 'meta_description'=>$meta_description,
							  	 'created_by'=>$user_id,
							  	 'created_on'=>date('Y-m-d:H:i:s'));
                                                                                                        
                                                    

                    // echo "<pre>";                        
                    // print_r($product_image_array);

                    
                       // $this->db->insert('tbl_childrens_day_image',$product_image_array);
                        $this->db->insert('tbl_gallery', $insert_image_array);

                    }
                    // echo "<pre>";
                    // print_r($product_image_array);
                }


              } 
              else{

                if(count($video_link)>0)
                {
                    for($x=0;$x<count($video_link);$x++)
                    {
                        
                        $insert_video_link_array = array(

                                                    
                                 'video_link'=>$video_link[$x],

                                 'cat_id'=>$category,
							  	// 'gallery_cover_image'=>$image,
							  	 'status'=>$status,

							  	 'type'=>$type,
							  	// 'video_link'=>$video_link,

							  	 'slug'=>$slug,
				                 'meta_title'=>$meta_title,
							  	 'meta_keyword'=>$meta_keyword,
							  	 'meta_description'=>$meta_description,
							  	 'created_by'=>$user_id,
							  	 'created_on'=>date('Y-m-d:H:i:s'));
                                                                                                        
                                                    

                    

                    
                       // $this->db->insert('tbl_childrens_day_image',$product_image_array);
                        $this->db->insert('tbl_gallery', $insert_video_link_array);

                    }
                    
                }






              }












		    $this->session->set_flashdata('succ_add','gallery Successfully added');
		    redirect('index.php/manage_gallery/list_view','refresh');
	}

function get_edit_details()
	{
		     if(get_cookie('session_user_id')!='')
		       {
			      $user_id= get_cookie('session_user_id');
		       }
		     else{
			      redirect('index.php/login','refresh');
		         }
		     $id= $this->uri->segment(3);
		     $data['active']="gallery";
		     $data['gallery_details']= $this->common->select($table_name='tbl_gallery',$field=array(),
			 $where=array('gallery_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

			  $data['cat_details']= $this->common->select($table_name='tbl_gallery_category',$field=array(),
	    	$where=array('status'=>'active'),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		      //print_r($data['get_details']); exit;

		    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
		     $this->load->view('manage_gallery/gallery_edit_view',$data);
		    $this->load->view('template/adminfooter_category');	
	}
	
function edit_action()
	{
		     if(get_cookie('session_user_id')!='')
		       {
		 	     $user_id= get_cookie('session_user_id');
		       }
		   else{
			     redirect('index.php/login','refresh');
		       }

		    $gallery_id= $this->input->post('edited_id');
		    $old_image= $this->input->post('old_image');

		    $category=$this->input->post('category');
		    //echo $old_image; exit;
		 if($_FILES['gallery_image']['name']=="")
        {
            $image=$this->input->post('old_image');
            
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['gallery_image']['tmp_name'];
            $file = $_FILES['gallery_image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "gif" || $ext == "jpg" || $ext == "jpeg")
            {
                $image=$this->input->post('old_image');
                @unlink('../assets/uploads/category/gallery/'.$image);
                // @unlink('../assets/upload/category/gallery/'.$image);
                // @unlink('../assets/upload/category/gallery/'.$image);

              

                move_uploaded_file($file_tmp, "../assets/uploads/category/gallery/" . $new_name . "." . $ext);
                $image = $new_name . "." . $ext;

                $config['image_library'] = 'gd2';
                $config['source_image'] = '../assets/uploads/category/gallery/' . $image;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = "100%";

				  $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = '../assets/uploads/category/gallery/'.$image;
                $config['quality'] = "100%";

			if($category!=28)
				{
				$config['width'] = 788;                        
                $config['height']= 543;
				}
				else{
					$config['width'] = 711;                        
                	$config['height']= 1280;
				}
                


                $config['master_dim'] ="height" ;  


             $this->image_lib->initialize($config);
               $this->image_lib->resize(); 
               $this->image_lib->clear();
                      
		    } //end if

          else
            {
              

              $this->session->set_flashdata('succ_update','Insert Proper Image');
		    redirect('index.php/manage_gallery/list_view','refresh');


            }




            }//end if

		     
           $user_id=get_cookie('session_user_id');
                 $status = $this->input->post('status');
             //echo $status; exit;
		    $gallery_title=$this->input->post('gallery_title');
           $category=$this->input->post('category');


            $type=$this->input->post('type');
		    $video_link=$this->input->post('video_link');

		   

		    $slug=$this->create_slug($gallery_title);
            
            $meta_title=$this->input->post('meta_title');
            $meta_keyword=$this->input->post('meta_keyword');
            $meta_description=$this->input->post('meta_description');
            $gallery_year=$this->input->post('gallery_year');
          
		 


		 $update_data= array( 
                                 'gallery_year'=>$gallery_year,
		 	                     'slug'=>$slug,
                                 'gallery_title'=>$gallery_title,
                                  'cat_id'=>$category,
							  	 'gallery_cover_image'=>$image,

							  	  'type'=>$type,
							  	 'video_link'=>$video_link,


				                 'meta_title'=>$meta_title,
							  	 'meta_keyword'=>$meta_keyword,
							  	 'meta_description'=>$meta_description,
							  	 'modified_by'=>$user_id,
							  	 'modified_on'=>date('Y-m-d:H:i:s'));


		  // print_r($update_data); exit;

		  $this->db->where('gallery_id',$gallery_id);
				//print_r($update_data); exit;
          $this->db->update('tbl_gallery',$update_data);
		  $this->session->set_flashdata('succ_update','Gallery has been updated');
		  redirect('index.php/manage_gallery/list_view');
	}

function delete_gallery()
	{
		if(get_cookie('session_user_id')!='')
		   {
			  $user_id= get_cookie('session_user_id');
		   }
		else{
			  redirect('index.php/login','refresh');
		    }
		
		$id= $this->uri->segment(3);
		//echo $id;
		$gallery_details= $this->common->select($table_name='tbl_gallery',$field=array(),
			$where=array('gallery_id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		$image = $gallery_details[0]->gallery_cover_image;


        @unlink("../assets/uploads/category/gallery/".@$image);
		@unlink("../assets/uploads/category/gallery/small/".@$image);


		/* $gallery_img= $this->common->select($table_name='tbl_gallery_image',
		     	                $field=array(),$where=array('gallery_id'=>$id),$like=array(),
		     	                $order=array(),$where_or=array(),$like_or_array=array()
		     	                );

		 $old_image=$gallery_img[0]->image;
		    
		     @unlink("../assets/uploads/category/gallery/".@$old_image);
		      @unlink("../assets/uploads/category/gallery/small/".@$old_image);
		
		

		$this->db->where('gallery_id',$id);
		$this->db->delete('tbl_gallery_image');*/

		$this->db->where('gallery_id',$id);
		$this->db->delete('tbl_gallery');

		$this->session->set_flashdata('succ_delete','Gallery Album has been deleted');
		redirect('index.php/manage_gallery/list_view');
	}

	function change_to_active()
  {
	
		$test_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($test_ids);$i++)
		{
			$id=$test_ids[$i];
			$this->db->where('gallery_id',$id);

			if($this->db->update('tbl_gallery',$data))
			{
				$result=1;
			}
			
		}
			
		echo json_encode(array('changedone'=>$result));
		
}
	/*        -- multiple   --          */





  function file_box_show()
    {
            $id=$this->input->post('num');
            $next=$id+1;
            ?>
      
                <div class="clearfix"></div> 
                             <div class="form-group" style="margin-top: 10px;" id="image_link_show<?php echo $next; ?>"  >
                                    <label for="gallery_image" class="col-sm-2 control-label text-center">Gallery Image <?php echo $next; ?>(788 X 543 px):<span style="color:#F00">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="file"  name="gallery_image[]" id="gallery_image" onchange="readURL(this,<?php echo $next; ?>);" >
                                        <img id="prof_pic<?php echo $next; ?>" src="<?php echo base_url()?>../assets/uploads/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:90px;height:90px;" />
                                    </div>
                            <table>
                                    <tr>
                                        <td>
                                            <?php if($next!=5){ ?><a href="javacript:void(0)" class="btn btn-primary" id="img_no_<?php echo $next; ?>" onclick="produce_file_box('<?php echo $next; ?>')"><b>+</b></a><?php } ?></td>
                                        <td>
                                            <a href="javacript:void(0)" class="btn btn-primary" id="img_minus" onclick="hiding_out('<?php echo $next; ?>');"><b>-</b></a></td>
                                    </tr>
                            </table>                                           
                </div>
        <?php
      }


    function file_box_show_video()
    {
            $id=$this->input->post('num');
            $next=$id+1;
            ?>
      
                <div class="clearfix"></div> 
                             <div class="form-group" id="video_link_show<?php echo $next; ?>" >
                  <label for="branch_name" class="col-sm-2 control-label">Video Link <?php echo $next; ?><span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="video_link[]" id="video_link" placeholder="Enter Video Link">
                    </div>
                            <table>
                                    <tr>
                                        <td>
                                            <?php if($next!=5){ ?><a href="javacript:void(0)" class="btn btn-primary" id="video_no_<?php echo $next; ?>" onclick="produce_file_box_video('<?php echo $next; ?>')"><b>+</b></a><?php } ?></td>
                                        <td>
                                            <a href="javacript:void(0)" class="btn btn-primary" id="video_minus" onclick="hiding_out_video('<?php echo $next; ?>');"><b>-</b></a></td>
                                    </tr>
                            </table>                                           
                </div>
        <?php
      }




 function image_upload_pro($fieldname,$folder_name,$cat_id)
    {
        // echo $fieldname." ".$folder_name."<br>";
          
        $this->load->library('upload');     
            
        $files = $_FILES;
        $cpt = count($_FILES[$fieldname]['name']);
        $count = 0;
        $image_array = array();
        for($i=0; $i<$cpt; $i++)
        {   
            $_FILES['userfile']['name']= $files[$fieldname]['name'][$i];
            $_FILES['userfile']['type']= $files[$fieldname]['type'][$i];
            $_FILES['userfile']['tmp_name']= $files[$fieldname]['tmp_name'][$i];
            $_FILES['userfile']['error']= $files[$fieldname]['error'][$i];
            $_FILES['userfile']['size']= $files[$fieldname]['size'][$i];    

            $this->upload->initialize($this->set_upload_options());
            if($this->upload->do_upload())
            {
                $file_info = $this->upload->data();
                
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/uploads/'.$folder_name.'/'.$file_info['orig_name'];


                $config['maintain_ratio'] = FALSE;
                $config['quality'] = "100%";



                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
               /* $img_config_4['width'] = 788;
                $img_config_4['height']= 543;*/
                $img_config_4['new_image'] ='../assets/uploads/'.$folder_name.'/'.$file_info['orig_name'];

                 $config['quality'] = "100%";
                 if($cat_id!=28)
                 {
                 		 $img_config_4['width'] = 788;
                 		 $img_config_4['height']= 543;
                 }
                 else{
                 	 $img_config_4['width'] = 711;
                 	 $img_config_4['height']= 1280;
                 }
                
                 $config['master_dim'] ="height" ; 
                
                //$image_config['quality'] = "100%";
                //$image_config['master_dim'] = "height";
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
                
           
/*
                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/upload/'.$folder_name.'/'.$file_info['orig_name'];
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 266;
                $img_config_4['height'] = 266;
                $img_config_4['new_image'] ='../assets/upload/'.$folder_name.'/small/'.$file_info['orig_name'];
                
                //$image_config['quality'] = "100%";
                //$img_config_4['master_dim'] = "height";
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();

                $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/upload/'.$folder_name.'/'.$file_info['orig_name'];
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width']  = 84;
                $img_config_4['height'] = 84;
                $img_config_4['new_image'] ='../assets/upload/'.$folder_name.'/small_'.$file_info['orig_name'];
                
                //$image_config['quality'] = "100%";
                //$img_config_4['master_dim'] = "height";
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();

                 $img_config_4['image_library'] = 'gd2';
                $img_config_4['source_image'] = '../assets/upload/'.$folder_name.'/'.$file_info['orig_name'];
                $img_config_4['create_thumb'] = FALSE;
                $img_config_4['maintain_ratio'] = FALSE;
                $img_config_4['width'] = 1000;
                $img_config_4['height']= 1000;
                $img_config_4['new_image'] ='../assets/upload/'.$folder_name.'/base/'.$file_info['orig_name'];
                
                //$image_config['quality'] = "100%";
                //$image_config['master_dim'] = "height";
                $this->image_lib->initialize($img_config_4);
                $this->image_lib->resize();
                $this->image_lib->clear();
*/
                $image_array[$count]['product_image'] = $file_info['orig_name'];
                $count++;
            }
        }   

        
        
        return $image_array;      
    }




  private function set_upload_options()
    {   
    //upload an image options
        $new_name = str_replace(".","",microtime());                        
        $config['upload_path'] ='../assets/uploads/category/gallery/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';              
        $config['file_name']=$new_name;
        
        
        
        return $config;
    } 








}

?>