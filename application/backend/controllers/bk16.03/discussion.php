<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class discussion extends CI_Controller {
	
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

public function discussion_view()
{
	
	    if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

	$data['discussion']=$this->admin_model->selectAll('tbl_knowledge_discuss_cmnt');

	$this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
	$this->load->view('discussion/discussion_table_view',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}



 
   
function discussion_insert()
{
	
	    if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
		$reason_for_cancellation=$this->input->post('discuss');
    	$discussion_id=$this->input->post('discussion_id');
    	$user_id=$this->input->post('user_id');           
		 
	
    $this->db->select('*');
$this->db->from('tbl_user');
$this->db->where('id',$user_id);
$query=$this->db->get();
$user_data=$query->result();


$this->db->select('*');
$this->db->from('tbl_knowledge_discuss_cmnt');

$this->db->where('comment_id',$discussion_id);
$this->db->where('user_id',$user_id);
$query=$this->db->get();
$comment_data=$query->result();

$mobile_number=@$user_data[0]->login_mob;
$user_name=@$user_data[0]->user_name;

$comment=@$comment_data[0]->comment;

$this->send_sms($mobile_number,$user_name,$reason_for_cancellation,$comment);

    

        
        
            
        $this->session->set_flashdata('succ_msg','Notification successfully sent to the user');
        redirect('index.php/discussion/discussion_view/','refresh'); 
			   
}




function delete_data()
{
    $title_id=$this->uri->segment(3);
    $this->db->where('comment_id',$title_id);
    $this->db->delete('tbl_knowledge_discuss_cmnt');

    $this->session->set_flashdata('succ_msg','Deleted successfully');
        redirect('index.php/discussion/discussion_view/','refresh');
}



function change_home_status()
{
    $c_id=$this->input->post('cid');
    $user_id=$this->input->post('user_id');


    $data=$this->admin_model->selectOne('tbl_knowledge_discuss_cmnt','comment_id',$c_id);
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

    $this->db->where('comment_id',$c_id);
    $this->db->update('tbl_knowledge_discuss_cmnt',$data);
    
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
            $this->db->where('comment_id',$id);

            if($this->db->update('tbl_knowledge_discuss_cmnt',$data))
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

function send_sms($mob_no,$uname,$reason,$comment)
{

$mobileNumber = $mob_no;

$senderId = "URSFRM";

$otp_msg="Dear ".$uname." Your posted comment ' ".$comment." ' not accepted for following reason ".$reason." Thank you for your comment.";

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
