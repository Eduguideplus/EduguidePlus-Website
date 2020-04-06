<?php
class login_model extends CI_Model 
{

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
	    $this->load->model('custom_model');	
    }
    
	/*function login_availability($username,$password)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin U');
		$this->db->join('tblemail E','E.email_id=U.id','left');
		$this->db->where('U.username',$username);
		$this->db->where('U.password',$password);
		$this->db->where('status','active');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}*/
	function login_availability($username,$password,$user_type_id)
	{
		if($user_type_id==1){
		$this->db->select('U.id,U.login_email,U.login_pass');
		$this->db->from('tbl_user U');
		$this->db->join('tbl_user_type UT','UT.id=U.user_type_id','left');
		$this->db->where('U.login_email',$username);
		$this->db->where('U.login_pass',$password);

		
		$this->db->where('U.user_type_id',$user_type_id);
	    
	

		$this->db->where('status','Active');
		$query=$this->db->get();
		$result=$query->result();
		//print_r($result); exit;
		return $result;
		}
		if($user_type_id==6){
		$this->db->select('U.id,U.login_email,U.login_pass');
		$this->db->from('tbl_user U');
		$this->db->join('tbl_user_type UT','UT.id=U.user_type_id','left');
		$this->db->where('U.login_email',$username);
		$this->db->where('U.login_pass',$password);

		
		$this->db->where('U.user_type_id',$user_type_id);
	    
	

		$this->db->where('status','Active');
		$query=$this->db->get();
		$result=$query->result();
		//print_r($result); exit;
		return $result;
}
	}
	
}
?>