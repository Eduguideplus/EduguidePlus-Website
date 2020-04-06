<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_media_question extends CI_Controller {
	
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
	$this->load->model('login_model');	
		
}

function get_media()
	{
		if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}
	
	$data['media']=$this->admin_model->selectAll("tbl_media_question");
    //print_r($data['media']);

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('media_question/media_view',$data);
	$this->load->view('template/adminfooter_category');
	}


    function media_add()
    {
        if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}

        //$data['active']="media";
        //$data['media']=$this->admin_model->fetch_all('tbl_midea');
         
        $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('media_question/media_add_view');
		$this->load->view('template/adminfooter_category');
    }

    function media_add_submit()
    {
    	$media_title = $this->input->post('media_title');

        if($_FILES['img_upload']['name']==NULL)
        {
            $image=NULL;
        }
        else
        {
             $new_name1 = str_replace(".", "", microtime());
             $new_name = str_replace(" ", "_", $new_name1);
             $file_tmp = $_FILES['img_upload']['tmp_name'];
             $file = $_FILES['img_upload']['name'];
             $ext = substr(strrchr($file, '.'), 1);

           /* if ($ext == "png" || $ext == "jpg" || $ext == "jpeg")
            {*/
                move_uploaded_file($file_tmp, "../assets/uploads/media_question/" . $new_name . "." . $ext);
                    $image= $new_name . "." . $ext;

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = '../assets/uploads/media_question/' . $image;
                    //$config['new_image'] = '../uploads/company_logo_big/'.$image_big;
    

               
                    


                  /*$config['wm_type']       = 'overlay';    
                        
                    $config['wm_overlay_path'] = '../assets/images/watermark/success-img.png';

                     $config['wm_opacity'] = 100;
                    $config['wm_vrt_alignment'] = 'middle';*/
                    //$config['wm_hor_alignment'] = 'right';
                    //$config['width'] = 261;
                    //$config['height'] = 199;
                    //$config['master_dim'] = 'height';

                    /*$config['wm_text'] = 'Your Success Forum';
                    $config['wm_type'] = 'text';
                    $config['wm_font_path'] = '../assets/watermark_font/Xerox Sans Serif Narrow Bold.ttf';
                    $config['wm_font_size'] = '10';
                    $config['wm_font_color'] = '03a9f4';
                    $config['wm_vrt_alignment'] = 'middle';
                    $config['wm_hor_alignment'] = 'right';*/
                    //$config['wm_padding'] = '30';
                    $this->load->library('image_lib',$config);
                    //$this->image_lib->resize();
                    $this->image_lib->initialize($config);
                        
                    $this->image_lib->watermark(); 

                    $path="https://www.eduguideplus.com/assets/uploads/media_question/".$image;
                    $ar=explode("/admin",$path);
                    $ar1=$ar[0];
                    $ar2=$ar[1];
                    $new_path=$ar1.$ar2;

                   $data=array(
                    'media_path'=>$new_path,
                    'media_filename'=>$image,
                    'media_title'=>$media_title
                    );

                   $this->db->insert('tbl_media_question',$data);
            /*}
            else
            {
                $this->session->set_flashdata('image_error','please upload an image..!');
                redirect('index.php/manage_media/get_media');
            }*/
            $this->session->set_flashdata('succ_msg','added successfully.');
            redirect('index.php/manage_media_question/get_media');
        }
    }


    function media_edit($id)
    {
        if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}

        //$data['active']="media";
        $data['media']=$this->admin_model->selectOne('tbl_media_question','media_id',$id);
       
        $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('media_question/media_edit_view',$data);
		$this->load->view('template/adminfooter_category'); 
    }

    function media_edit_submit()
    {
        $id=$this->input->post('media_id');
        if($_FILES['img_upload']['name']=="")
        {
             $old_img=$this->input->post('media_image');
             $old_path=$this->input->post('media_path');
             $media_title = $this->input->post('media_title');

             

             $data=array(
                    'media_path'=>$old_path,
                    'media_filename'=>$old_img,
                    'media_title'=>$media_title
                    );

            $this->db->where('media_id',$id);
            $this->db->update('tbl_media',$data);
             $this->session->set_flashdata('succ_msg','updated successfully.');
            redirect('index.php/manage_media_question/get_media');
        }
        else
        {
        	 $media_title = $this->input->post('media_title');
             $new_name1 = str_replace(".", "", microtime());
             $new_name = str_replace(" ", "_", $new_name1);
             $file_tmp = $_FILES['img_upload']['tmp_name'];
             $file = $_FILES['img_upload']['name'];
             $ext = substr(strrchr($file, '.'), 1);

            /*if ($ext == "png" || $ext == "jpg" || $ext == "jpeg")
            {*/
                $old_img=$this->input->post('media_image');
                @unlink('../assets/uploads/media_question/'.$old_img);

                move_uploaded_file($file_tmp, "../assets/uploads/media_question/" . $new_name . "." . $ext);
                    $image= $new_name . "." . $ext;

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = '../assets/uploads/media_question/' . $image;
                    //$config['new_image'] = '../uploads/company_logo_big/'.$image_big;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "100%";
                    //$config['width'] = 261;
                    //$config['height'] = 199;
                    $config['master_dim'] = 'height';
                    $this->load->library('image_lib',$config);
                    $this->image_lib->resize();

                    $path="https://www.eduguideplus.com/assets/uploads/media_question/".$image;
                    $ar=explode("/admin",$path);
                    $ar1=$ar[0];
                    $ar2=$ar[1];
                    $new_path=$ar1.$ar2;

                

                    $data=array(
                    'media_path'=>$new_path,
                    'media_filename'=>$image,
                    'media_title'=>$media_title
                    );
                   $this->db->where('media_id',$id);
            		$this->db->update('tbl_media_question',$data);

                    $this->session->set_flashdata('succ_msg','updated successfully.');
            		redirect('index.php/manage_media_question/get_media');
           /* }
            else
            {
                $this->session->set_flashdata('image_error','please upload an image..!');
                redirect('index.php/manage_media/media_edit/'.$id);
            }*/
            
            //redirect('index.php/manage_media/get_media');
        }
    }

    function media_delete($id)
    {
        $data=$this->admin_model->selectOne('tbl_media_question','media_id',$id);
        $image=$data[0]->media_filename;
        @unlink('../assets/uploads/media_question/'.$image);
        $this->db->where('media_id',$id);
        $this->db->delete('tbl_media_question');
        $this->session->set_flashdata('succ_msg','deleted successfully.');
        redirect('index.php/manage_media_question/get_media');
    }




}



