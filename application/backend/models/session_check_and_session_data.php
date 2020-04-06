<?php
class session_check_and_session_data extends CI_Model 
{

    
    function __construct()
    {
        //Call the Model constructor
        parent::__construct();
	   
    }
	function admin_session_data()
	{
		/*$session_user_id=$this->session->userdata('session_user_id');*/
		$session_user_id=get_cookie('session_user_id');
		$response=$this->admin_details($session_user_id);
		return $response;
		
		
	}
	
	function session_check()
	{
		$session_user_id=get_cookie('session_user_id');
		//echo $session_user_id;
		$response=$this->admin_details($session_user_id);
		$count=count($response);
		if($count>0)
		{
			return true;
		}
		else
		{
			redirect('index.php/login');
		}
		
	}
	
	/*function admin_details($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin U');
		$this->db->join('tblemail E','E.email_id=U.id','left');
		$this->db->where('U.id',$id);
		$this->db->where('status','active');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}*/
	function admin_details($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_user U');
		$this->db->join('tbl_user_type UT','UT.id=U.user_type_id','left');
		$this->db->join('tblemail E','E.email_id=U.id','left');
		$this->db->where('U.id',$id);
		$this->db->where('status','active');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}
	
	function user_id()
	{
		@$userdata=$this->session_check_and_session_data->admin_session_data();
		@$user_id=$userdata[0]->id;
		return @$user_id;
	}
	
	
}
?>