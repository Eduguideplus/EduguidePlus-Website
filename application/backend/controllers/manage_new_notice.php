<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_new_notice extends CI_Controller {
	
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
		  
		   if(get_cookie('session_user_id')!='')
		       {
			     $user_id= get_cookie('session_user_id');
		       }
		   else{
			     redirect('index.php/login','refresh');
		       } 

		   $data['active']='manage_new_notice';
	

           $data['tender']= $this->common->select($table_name='tbl_news_notice ',$field=array(),
	    	 $where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

          

	   

	    


		 
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_new_notice/list_view',$data);
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

		$data['active']='manage_new_notice';
		 
		  $this->load->view('template/admin_header');
		  $this->load->view('template/admin_leftmenu',$data);
		  $this->load->view('manage_new_notice/add');
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
          $desc = $this->input->post('desc');


          if($_FILES['image']['name']==NULL)

         {
             $image=NULL;
         }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['image']['tmp_name'];
            $file = $_FILES['image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "gif" || $ext == "jpg" || $ext == "jpeg" || $ext == "pdf")
            {
                
              

                move_uploaded_file($file_tmp, "../assets/uploads/news_notice/" . $new_name . "." . $ext);
                $image = $new_name . "." . $ext;

                $config['image_library'] = 'gd2';
                $config['source_image'] = '../assets/uploads/news_notice/' . $image;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = "100%";
               
    
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = '../assets/uploads/news_notice/small/'.$image;
                $config['quality'] = "100%";
                $config['width'] = 271;
                $config['height']= 186;
                $config['master_dim'] ="height" ;

               $this->image_lib->initialize($config);
               $this->image_lib->resize(); 
               $this->image_lib->clear();
                      
            
            }


            else
            {
                $this->session->set_flashdata('msg','please upload an image or Pdf..!');
                 redirect('index.php/manage_new_notice/list_view','refresh');
            }


           }
         
         
         
          

		  $insert_data= array(
		  	                  'description'=>$desc,
		  	                  'image'=>$image,
			                 
		  	                  'is_new'=>'Yes',
		  	                  'created_on'=>date('Y-m-d H:i:s'),
		  	                  'created_by'=>$user_id);


		  $this->db->insert('tbl_news_notice ', $insert_data);


         


		 $this->session->set_flashdata('succ_add','Successfully added');
		  redirect('index.php/manage_new_notice/list_view','refresh');
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

		$data['active']='manage_new_notice';

		   $id= $this->uri->segment(3);

		   // print_r($id); exit;
		   
		  $data['tender']=$this->common->select($table_name='tbl_news_notice',$field=array(),$where=array('id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		  

		   $this->load->view('template/admin_header');
		   $this->load->view('template/admin_leftmenu',$data);
		   $this->load->view('manage_new_notice/edit',$data);
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
          $desc = $this->input->post('desc');
           
		  

          $edit_id=$this->input->post('edit_id');


          $old_image= $this->input->post('old_image');
		    //echo $old_image; exit;
		
		       if($_FILES['image']['name']=="")
        {
            $image=$old_image;
            
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);
            $file_tmp = $_FILES['image']['tmp_name'];
            $file = $_FILES['image']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "gif" || $ext == "jpg" || $ext == "jpeg" || $ext == "pdf")
            {
                $image=$old_image;
                @unlink('../assets/uploads/news_notice/'.@$image);
                 @unlink('../assets/uploads/news_notice/small/'.@$image);
               // @unlink('../assets/upload/aboutus/'.@$image);
                
                // @unlink('../assets/upload/category/'.'medium_'.$image);

              

                move_uploaded_file($file_tmp, "../assets/uploads/news_notice/" . $new_name . "." . $ext);
                $image = $new_name . "." . $ext;

                // $config['image_library'] = 'gd2';
                // $config['source_image'] = '../assets/upload/category/' . $image;
                // $config['maintain_ratio'] = FALSE;
                // $config['quality'] = "100%";
               
    




                 $img_config_4['image_library'] = 'gd2';
                    $img_config_4['source_image'] = '../assets/uploads/news_notice/' . $image;
                    $img_config_4['create_thumb'] = FALSE;
                    $img_config_4['maintain_ratio'] = FALSE;
                    $img_config_4['width']  = 271;
                    $img_config_4['height'] = 186;
                    $img_config_4['new_image'] ='../assets/uploads/news_notice/small/' . $image;
                    
                    $this->image_lib->initialize($img_config_4);
                    $this->image_lib->resize();
                    $this->image_lib->clear();




                      
            
            }
            else
            {
                $this->session->set_flashdata('msg','please upload an image or Pdf..!');
                 redirect('index.php/manage_new_notice/list_view','refresh');
            }
        }
         

		  $update_data= array(
		  	                  'description'=>$desc,
			                 
		  	                  'image'=>$image,
		  	                  'edited_on'=>date('Y-m-d H:i:s'),
		  	                  'edited_by'=>$user_id
		  	              );

	
		  $this->db->where('id',$edit_id);
			
          $this->db->update('tbl_news_notice',$update_data);
		  $this->session->set_flashdata('succ_update','Successfully updated');
		  redirect('index.php/manage_new_notice/list_view');
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


		$desk_details= $this->common->select($table_name='tbl_news_notice',$field=array(),
			$where=array('id'=>$id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());
		$image = $desk_details[0]->image;
		//echo $image; exit;
		//$count = count($get_details);
		//echo $count; exit;
		@unlink("../assets/uploads/news_notice/".@$image);
		@unlink("../assets/uploads/news_notice/small/".@$image);
		//echo $id;
		

		$this->db->where('id',$id);
		$this->db->delete('tbl_news_notice');

		
		$this->session->set_flashdata('succ_delete','Data has been deleted');
		redirect('index.php/manage_new_notice/list_view');
	}

	function change_to_active()
  {
	
		$test_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($test_ids);$i++)
		{
			$id=$test_ids[$i];
			$this->db->where('id',$id);

			if($this->db->update('tbl_news_notice',$data))
			{
				$result=1;
			}
			
		}
			
		echo json_encode(array('changedone'=>$result));
		
}


  function change_home_status()
{
    $c_id=$this->input->post('cid');

    $data=$this->admin_model->selectOne('tbl_news_notice','id',$c_id);
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
    $this->db->update('tbl_news_notice',$data);
    
    echo json_encode(array('changedone'=>$result));

}

}

?>