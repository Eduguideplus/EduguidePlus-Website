<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_career extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();
          $this->load->library('image_lib');

	 }
	
	public function index()
	{
		
   
      

        $career_data['career'] = $this->common_model->common($table_name = 'tbl_career', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        //print_r( $home_data['blog']);exit;


      	$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	
		$this->load->view('common/header');
		$this->load->view('job_seeker',$career_data);
		$this->load->view('common/footer',$foot_data);

	}

public function solver_view()
	{
		
   
      

        $career_data['career'] = $this->common_model->common($table_name = 'tbl_career', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        //print_r( $home_data['blog']);exit;


      	$foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	
		$this->load->view('common/header');
		$this->load->view('solver',$career_data);
		$this->load->view('common/footer',$foot_data);

	}
	public function requirment_mail()
	{
		
		
		$career_id = $this->input->post('hidden_career_id');

		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$ph = $this->input->post('ph');
		$exp_sal = $this->input->post('exp_sal');

		$admin_details_array = $this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$admin_recive=$admin_details_array[0]->recieve_email;
		$admin_from=$admin_details_array[0]->from_email;

		//echo $admin_recive; exit;
		$career_details = $admin_details_array = $this->common_model->common($table_name = 'tbl_career', $field = array(), $where = array('id'=>$career_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		$date	 	=	date('d-m-Y H:i:s');
		$job_title = @$career_details[0]->job_title;

		if(@$_FILES['cv']['name']!="")
        {
        	//echo 'hi'; exit;
            
           
            $file_tmp =$_FILES['cv']['tmp_name'];
            $file=$_FILES['cv']['name'];
            $ext=substr(strrchr($file,'.'),1);
            if($ext=="txt" || $ext=="doc" || $ext=="docx" || $ext=="xlx")
            {
            	//echo $file_tmp; exit;
                $target_path="assets/uploads/career_cv/";
				$target_Path = $target_path.basename( $_FILES['cv']['name'] );
				move_uploaded_file( $_FILES['cv']['tmp_name'], $target_Path );
               
            }


        }

			$email_data['mail_data']= array
			(
				'name'=>$name,
				'email'=>$email,
				'ph'=>$ph,
				'exp_sal'=>$exp_sal,
				'date'=>$date,
				
				'career_details'=>$job_title,
				
			);
		
		
			
			$this->email->set_mailtype("html");
			$html_email_user = $this->load->view('mail_template/career_mail_view',$email_data, true);

			//$send_user_mail_html=$this->load->view('mail_template/reply_mail_view',$email_data, true);
			// print_r($html_email_user); exit;
			
			$this->email->from($admin_from);
			$this->email->to($admin_recive);
			$this->email->subject('P2Exam | Job Application Mail');
			$this->email->message($html_email_user);
			$this->email->attach('assets/uploads/career_cv/'.$file);
			@$reponse=$this->email->send();

			

		if(@$reponse)
			{
				$this->session->set_flashdata('success_msg','You');
			}
		else{
				$this->session->set_flashdata('error_msg','Something went wrong. Message can not be sent!');
			}

		//redirect($this->url->link(5) ,'refresh');
		
	}
	
	
	


	
}
?>