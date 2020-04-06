<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testimonial_review extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

           $this->load->library('image_lib');

	}
	
	public function data_submit()
	{
		              


					



                $user_id=$this->session->userdata('activeuser');
                $name=$this->input->post('test_name');
       
             	$content=$this->input->post('test_emsg');
           	    $profession=$this->input->post('designation');




					$image=NULL;

		if(($_FILES['test_image']['name'])!='')
		  {
		  $new_name =time();      
		  $config['upload_path'] ='assets/uploads/testimonial/';
		  $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
		  $config['file_name']=$new_name; 
		  
		    
		  $this->load->library('upload', $config);  
		  //==========end:resize body_part image======================   
		  $field_name = "test_image"; 
		      
		  $image=NULL;   
		  if($this->upload->do_upload($field_name))
		  { 
		    
		   $file_info = $this->upload->data();
		   $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
		   $file_size=$file_info['file_size'];
		   $this->image_lib->clear();     
		   $image =$file_info['raw_name'].$file_info['file_ext']; 
		    
		  
		   
		   
		   $image_config["image_library"] = "gd2";
		   $image_config["source_image"] ='assets/uploads/testimonial/'.$image;   
		   $image_config['create_thumb'] = FALSE;
		   $image_config['maintain_ratio'] = FALSE;
		   $image_config['new_image'] = 'assets/uploads/testimonial/'.$image; 
		   $image_config['quality'] = "100%";
		   $image_config['width'] = 100;
		   $image_config['height']= 100;
		   
		   $image_config['master_dim'] = "height";
		   $this->image_lib->initialize($image_config);
		   $this->image_lib->resize(); 
		   $this->image_lib->clear();
		  } //end if
		}
    	$data = array(
    					
    					
    					'testimonial_name'=>$name,
    					'testimonial_image'=>$image,
    					'testimonial_content'=>$content,
    					'testimonial_designation'=>$profession,
    					'testimonial_status'=>'inactive',
    					'created_by'=>$user_id,
    					'created_on'=>$current_date,
    				);











		 $this->db->insert('tbl_testimonial',$data);


		 $data['email']=$this->common_model->common($table_name ='tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            $admin_recive=$data['email'][0]->recieve_email;
            $admin_from=$data['email'][0]->from_email;

            $this->email->set_mailtype("html");

            $html_email_user = $this->load->view('mail_template/submit_review_mail_admin',$data, true);
           

               


            $this->email->from($admin_from,'SURAJITPRAMANICK.COM');
            $this->email->to($admin_recive);
            $this->email->subject('New Testimonial recieved from your Website');
            $this->email->message($html_email_user);
            @$reponse=$this->email->send();

         $this->session->set_flashdata('msg','Review Successfully Submited');
         redirect($this->url->link(136));

	}


	

	
	


	
}
?>