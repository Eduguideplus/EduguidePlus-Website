<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_career extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();
 
	   }
	
	 
  public function index()
  {
    
   
      

        $career_data['job_details'] = $this->common_model->common($table_name = 'tbl_career', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        //print_r( $home_data['blog']);exit;


        $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $career_data['job_cat']=$this->common_model->common($table_name = 'tbl_job_category', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   


    $this->load->view('common/header');
    $this->load->view('job_seeker',$career_data);
    $this->load->view('common/footer',$foot_data);

  }

public function solver_view()
  {
    
   
      

        $career_data['career'] = $this->common_model->common($table_name = 'tbl_career', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

          $career_data['subject'] = $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('section_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        //print_r( $home_data['blog']);exit;


        $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  
    $this->load->view('common/header');
    $this->load->view('solver',$career_data);
    $this->load->view('common/footer',$foot_data);

  }
	
function career_email()
	{
	     $name=$this->input->post('fname');
       $email=$this->input->post('email');
       $phone=$this->input->post('phone');
       $msg=$this->input->post('message');
       $subject=$this->input->post('subject');
       $file=$this->input->post('upload');



if($_FILES['img_upload']['name']=="")
        {
            $image="";
            
        }
        else
        {
            $new_name1 = str_replace(".", "", microtime());
            $new_name = str_replace(" ", "_", $new_name1);

       $file_tmp = $_FILES['img_upload']['tmp_name'];
            $file = $_FILES['img_upload']['name'];
            $ext = substr(strrchr($file, '.'), 1);
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext="pdf" ||  $ext="docs" )
            {
                move_uploaded_file($file_tmp, "assets/uploads/career_cv/" . $new_name . "." . $ext);
                $image=$new_name . "." . $ext;
            }
        }


         // echo $image;

     $application_id=$this->input->post('application');


     $job_career=$this->common_model->common($table_name = 'tbl_career', $field = array(), $where = array('job_alert_id'=>$application_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   


$job_name=@$job_career[0]->job_title;
$job_contact=$this->common_model->common($table_name = 'tbl_contact', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['email']=$this->common_model->common($table_name = 'tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$admin_recive=@$data['email'][0]->recieve_email;
$admin_from=@$data['email'][0]->from_email;

$career_email=@$job_contact[0]->career_email;
$job_name=@$job_career[0]->job_title;
 

$data_career=array(
                      'candidate_name'=>$name,
                      'email'=>$email,
                      'phone_number'=>$phone,
                      'subject'=>$subject,
                      'message'=>$msg,
                      'job_id'=>$application_id,
                      'candidate_resume'=>$image,
                      'created_on'=>date('Y-m-d')
                  );

$this->db->insert('tbl_job_seeker',$data_career);

  $email_data['mail_data']=array
            (
                'uname'=>$name,
                'uemail'=> $email,
                'uphone'=> $phone,
                'subject'=> $subject,
                'umsg'=>$msg,
                'ujobname'=>$job_name
            );

           // print_r($email_data['mail_data']);
            $this->email->set_mailtype("html");

            $html_email_user = $this->load->view('mail_template/admin_enquiry_career_mail',$email_data, true);
            $send_user_mail_html=$this->load->view('mail_template/career_reply_mail_view',$email_data, true);

 
   
// print_r($html_email_user); 
     // print_r($send_user_mail_html); exit;    
            

            $this->email->from($admin_from);
            $this->email->to($career_email);
            $this->email->subject($name.' applied for '.$job_name);
            $this->email->message($html_email_user);
            $this->email->attach('assets/uploads/career_cv/'.$image);
					
            @$reponse=$this->email->send();

            $this->email->from($admin_from);
            $this->email->to($email);
            $this->email->subject('Reply from Surajit Pramanick');
            $this->email->message($send_user_mail_html);
            @$reponse_reply=$this->email->send();


             $this->session->set_flashdata('msg','Your application has been submitted successfully');
           
             redirect(base_url().$this->url->slug(28));
   


       
	}

public function solver_submit()
{
       $name=$this->input->post('fname');
       $email=$this->input->post('email');
       $phone=$this->input->post('phone');
       $qualification=$this->input->post('qualification');

       $expert_sub=$this->input->post('expert_sub');
// print_r($expert_sub);
         $data=array
            (
                'user_name'=>$name,
                'login_email'=> $email,
                'login_mob'=> $phone,
                'qualification'=> $qualification,
                'user_type_id'=>'6'
               
                
            );
        $this->db->insert('tbl_user',$data);
        $last_insert_id=$this->db->insert_id();

            for ($i=0; $i <count($expert_sub) ; $i++) { 
               $expert_data=array(
                                  'user_id'=>$last_insert_id,
                                  'subject_expert_in'=>$expert_sub[$i],
                                  'created_on'=>date('Y-m-d H:i:s')
                                 );

               $this->db->insert('tbl_user_expert_in',$expert_data);
             }

              $this->session->set_flashdata('msg','You have successfully registered..');
              redirect(base_url().$this->url->slug(120)); 
}


  function check_email()
  {

    $email = $this->input->post('email');

    $email_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_email'=>$email,'user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    if(count($email_check) > 0)
    {
      $result['status']=1;
      echo json_encode(array('changedone'=>$result));
    }
    else
    {
      $result['status']=0;
      echo json_encode(array('changedone'=>$result));
    }

  }





  function check_phone()
  {

    $phone = $this->input->post('phone');

    $phone_check=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('login_mob'=>$phone,'user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    if(count($phone_check) > 0)
    {
      $result['status']=1;
      echo json_encode(array('changedone'=>$result));
    }
    else
    {
      $result['status']=0;
      echo json_encode(array('changedone'=>$result));
    }

  }

	
}
?>