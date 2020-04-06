<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class post_question extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	 
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');			
	
		
}

public function post_question_view()
{
	
	    if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

	$data['post_question']=$this->admin_model->selectAll('tbl_discuss_post_question');

	$this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
	$this->load->view('post_question/post_question_table',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}


   
function post_question_insert()
{
	
	    if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
		
    	$reason_for_cancellation=$this->input->post('reason_for_cancellation');
        $post_id=$this->input->post('post_id');
        $user_id=$this->input->post('user_id');           
    

$this->db->select('*');
$this->db->from('tbl_user');
$this->db->where('id',$user_id);
$query=$this->db->get();
$user_data=$query->result();


$this->db->select('*');
$this->db->from('tbl_discuss_post_question');

$this->db->where('post_id',$post_id);
$this->db->where('user_id',$user_id);
$query=$this->db->get();
$question_data=$query->result();

$mobile_number=@$user_data[0]->login_mob;
$user_name=@$user_data[0]->user_name;

$question=@$question_data[0]->posted_question;

$this->send_sms($mobile_number,$user_name,$reason_for_cancellation,$question);

	

		
   		
	        
		$this->session->set_flashdata('succ_msg','Notification successfully sent to the user');
		redirect('index.php/post_question/post_question_view/','refresh');
       
			   
}



function change_home_status()
{
    $c_id=$this->input->post('cid');
    $user_id=$this->input->post('user_id');
    $data=$this->admin_model->selectOne('tbl_discuss_post_question','post_id',$c_id);
    $home_stat=$data[0]->front_show;


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
    $data=array('front_show'=>$pop);

    $this->db->where('post_id',$c_id);
    $this->db->update('tbl_discuss_post_question',$data);
    
    echo json_encode(array('changedone'=>$result,'user_id'=>$user_id));

}

function change_to_active()
{
        $cat_ids=$this->input->post('catid');
        $status=$this->input->post('status');
        $data=array('status'=>$status);


        for($i=0;$i<count($cat_ids);$i++)
        {
            $id=$cat_ids[$i];
            $this->db->where('post_id',$id);

            if($this->db->update('tbl_discuss_post_question',$data))
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

function send_sms($mob_no,$uname,$reason,$question)
{

$mobileNumber = $mob_no;

$senderId = "URSFRM";

$otp_msg="Dear ".$uname." Your posted question ' ".$question." ' not accepted for following reason ".$reason." Thank you for your effort.";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=".$senderId."&route=4&mobiles=".$mobileNumber."&authkey=248190AoE9UD3CV5bf3b533&encrypt=&message=".$otp_msg,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

/*if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}*/

}

}
