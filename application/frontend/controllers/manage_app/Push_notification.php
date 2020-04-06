<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Push_notification extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();

	}

	public function update_token()
	{

		$token= $_GET['token'];

		$this->db->select('*');
		$this->db->from('tbl_push_token');
		$this->db->where('token',$token);
		$query= $this->db->get();
		$result= $query->result();

		if(count($result)>0)
		{
				$token_id=@$result[0]->token_id; 
				$update_data= array(
							'token'=>$token,
							'edited_date'=>date('Y-m-d H:i:s')
						);


		$this->db->where('token_id',$token_id);
		$this->db->update('tbl_push_token',$update_data);
		}
		else{
			$insert_data= array(
							'token'=>$token,
							'created_date'=>date('Y-m-d H:i:s')
						);

		$this->db->insert('tbl_push_token',$insert_data);

		}

		
		echo json_encode(array('result'=>1));

		}


function get_push_notification(){
		$data=$this->common_model->common($table_name = 'tbl_push_notification', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		if(count($data) >0){
			$result =1;
			echo json_encode(array('notification'=>$data,'result'=>$result));
		}else{
			$result =0;
			echo json_encode(array('result'=>$result));

		}

}
}