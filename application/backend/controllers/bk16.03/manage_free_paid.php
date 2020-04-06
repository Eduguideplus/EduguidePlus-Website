<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_free_paid extends CI_Controller {
	
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
	$this->load->model('custom_model');

		
}

function view()
{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}

        //$data['active']="media";
        //$data['media']=$this->admin_model->fetch_all('tbl_midea');


        $data['free_paid']=$this->admin_model->selectAll('tbl_free_paid');
        // print_r( $data['type_for']);
         
        $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('free_paid/free_paid_view',$data);
		$this->load->view('template/adminfooter_category');
}


function free_paid_edit()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}

		$id=$this->uri->segment(3);

        //$data['active']="media";
        //$data['media']=$this->admin_model->fetch_all('tbl_midea');
		$data['type_for']=$this->admin_model->selectOne('tbl_free_paid','id',$id);
		//print_r($data['type_for']);exit;

         //$data['type_for']=$this->custom_model->get_selected_type();
        // print_r( $data['type_for']);
         
        $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('free_paid/free_paid_update_view',$data);
		$this->load->view('template/adminfooter_category');
}

/*function view()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}

        //$data['active']="media";
        //$data['media']=$this->admin_model->fetch_all('tbl_midea');


         $data['type_for']=$this->custom_model->get_selected_type();
        // print_r( $data['type_for']);
         
        $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('free_paid/free_paid_update_view',$data);
		$this->load->view('template/adminfooter_category');
}*/

function free_paid_submit()
{
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}

		$free_paid_id = $this->input->post('free_paid_id');
		$free_feature = $this->input->post('free_feature');
		$paid_feature = $this->input->post('paid_feature');
		$data_arr=array(
			'free_feature'=>$free_feature,
			'paid_feature'=>$paid_feature,
			'modified_on'=>date('y-m-d,H:i:s'),
			'modified_by'=>$user_id

		);
		$this->db->where('id',$free_paid_id);
		$this->db->update('tbl_free_paid',$data_arr);
		$this->session->set_flashdata('succ_msg','updated successfully.');
        redirect('index.php/manage_free_paid/view');

}

function get_media()
	{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}
	
	$data['media']=$this->admin_model->selectAll("tbl_media");

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('media/media_view',$data);
	$this->load->view('template/adminfooter_category');
	}


    function media_add()
    {
        if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}

        //$data['active']="media";
        //$data['media']=$this->admin_model->fetch_all('tbl_midea');
         
        $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('media/media_add_view');
		$this->load->view('template/adminfooter_category');
    }

    function media_add_submit()
    {
    	$page = $this->input->post('page');

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
                move_uploaded_file($file_tmp, "../assets/uploads/media/" . $new_name . "." . $ext);
                    $image= $new_name . "." . $ext;

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = '../assets/uploads/media/' . $image;
                    //$config['new_image'] = '../uploads/company_logo_big/'.$image_big;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "100%";
                    //$config['width'] = 261;
                    //$config['height'] = 199;
                    //$config['master_dim'] = 'height';
                    $this->load->library('image_lib',$config);
                    $this->image_lib->resize();

                    $path=base_url()."assets/uploads/media/".$image;
                    $ar=explode("/admin",$path);
                    $ar1=$ar[0];
                    $ar2=$ar[1];
                    $new_path=$ar1.$ar2;

                   $data=array(
                    'media_path'=>$new_path,
                    'media_image'=>$image,
                    'page_name'=>$page
                    );

                   $this->db->insert('tbl_media',$data);
            /*}
            else
            {
                $this->session->set_flashdata('image_error','please upload an image..!');
                redirect('index.php/manage_media/get_media');
            }*/
            $this->session->set_flashdata('succ_msg','added successfully.');
            redirect('index.php/manage_media/get_media');
        }
    }


    function media_edit($id)
    {
        if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else
		{
			redirect('index.php/login','refresh');
		}

        //$data['active']="media";
        $data['media']=$this->admin_model->selectOne('tbl_media','media_id',$id);
       
        $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('media/media_edit_view',$data);
		$this->load->view('template/adminfooter_category'); 
    }

    function media_edit_submit()
    {
        $id=$this->input->post('media_id');
        if($_FILES['img_upload']['name']=="")
        {
             $old_img=$this->input->post('media_image');
             $old_path=$this->input->post('media_path');
             $page_name = $this->input->post('page');

             $data=array(
                    'media_path'=>$old_path,
                    'media_image'=>$old_img,
                    'page_name'=>$page_name
                    );
//echo '<pre>'; print_r($data); exit;

            $this->db->where('media_id',$id);
            $this->db->update('tbl_media',$data);
             $this->session->set_flashdata('succ_msg','updated successfully.');
            redirect('index.php/manage_media/get_media');
        }
        else
        {
        	 $page_name = $this->input->post('page');
             $new_name1 = str_replace(".", "", microtime());
             $new_name = str_replace(" ", "_", $new_name1);
             $file_tmp = $_FILES['img_upload']['tmp_name'];
             $file = $_FILES['img_upload']['name'];
             $ext = substr(strrchr($file, '.'), 1);

            /*if ($ext == "png" || $ext == "jpg" || $ext == "jpeg")
            {*/
                $old_img=$this->input->post('media_image');
                @unlink('../assets/uploads/media/'.$old_img);

                move_uploaded_file($file_tmp, "../assets/uploads/media/" . $new_name . "." . $ext);
                    $image= $new_name . "." . $ext;

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = '../assets/uploads/media/' . $image;
                    //$config['new_image'] = '../uploads/company_logo_big/'.$image_big;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "100%";
                    //$config['width'] = 261;
                    //$config['height'] = 199;
                    $config['master_dim'] = 'height';
                    $this->load->library('image_lib',$config);
                    $this->image_lib->resize();

                    $path=base_url()."assets/uploads/media/".$image;
                    $ar=explode("/admin",$path);
                    $ar1=$ar[0];
                    $ar2=$ar[1];
                    $new_path=$ar1.$ar2;

                   $data=array(
                    'media_path'=>$new_path,
                    'media_image'=>$image,
                    'page_name'=>$page_name
                    );
//echo '<pre>'; print_r($data); exit;
                   $this->db->where('media_id',$id);
            		$this->db->update('tbl_media',$data);

                    $this->session->set_flashdata('succ_msg','updated successfully.');
            		redirect('index.php/manage_media/get_media');
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
        $data=$this->admin_model->selectOne('tbl_media','media_id',$id);
        $image=$data[0]->media_image;
        @unlink('../assets/uploads/media/'.$image);
        $this->db->where('media_id',$id);
        $this->db->delete('tbl_media');
        $this->session->set_flashdata('succ_msg','deleted successfully.');
        redirect('index.php/manage_media/get_media');
    }




}



