<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contatc_us extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}
	



function get_details(){

      $data['contact_details']= $this->common_model->common($table_name = 'tbl_contact', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
      $data['social_link']= $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


       echo json_encode(array('data'=>$data));
}

function submit_mail(){
    // echo "okk";exit;
        $at=0;
       $dt=0;
   // $fname=$this->input->post('fname');
   // $mob=$this->input->post('lname');
   //  $email=$this->input->post('email');
   //  $subject=$this->input->post('subject');
   //  $message=$this->input->post('message');


    $json         =  file_get_contents('php://input');
    $obj          =  json_decode($json);
    $fname = $obj->name;
    $mob = $obj->mobile_number;
    $email = $obj->email_id;
    $subject = $obj->subject;
    $message = $obj->message;

    $enqemailidforvalidationsurajit=$this->input->post('enqemailidforvalidationsurajit');
    $full_name= $fname;
    

    $len=strlen($email);
        for($i=0;$i<$len;$i++)
        {
            if($email[$i]=="@")
            {
                $at=$i;
            }
            if($email[$i]==".")
            {
                $dt=$i;
            }
        }

       
        if($enqemailidforvalidationsurajit!='' && $fname!='' && $email!='')
        {

          $data['email']=$this->common_model->common($table_name ='tblemail', $field = array(), $where = array('email_id'=>1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            $admin_recive=$data['email'][0]->recieve_email;
            $admin_from=$data['email'][0]->from_email;

            $email_data['mail_data']=array
            (
                'uname'=>$full_name,
                'uemail'=> $email,
                'usubject'=>$subject,
                'umsg'=>$message,
                'mob'=>$mob
            );

            $this->email->set_mailtype("html");

            $html_email_user = $this->load->view('mail_template/contact_us_mail_admin',$email_data, true);
            $send_user_mail_html=$this->load->view('mail_template/contact_us_mail_user',$email_data, true);

               // print_r($html_email_user );exit;
               // print_r($send_user_mail_html );exit;


            $this->email->from($admin_from,'EDUGUIDEPLUS');
            $this->email->to($admin_recive);
            $this->email->subject('New Enquiry recieved from your Website');
            $this->email->message($html_email_user);
            @$reponse=$this->email->send();

            $this->email->from($admin_from,'EDUGUIDEPLUS');
            $this->email->to($email);
            $this->email->subject('Reply from EDUGUIDEPLUS');
            $this->email->message($send_user_mail_html);
            @$reponse_reply=$this->email->send();



           
               // $this->session->set_flashdata('msg','You enquiry has been submitted successfully');
            
            //redirect($this->url->link(130));
            echo json_encode(array('You enquiry has been submitted successfully'));
        }

}
}