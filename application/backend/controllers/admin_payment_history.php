<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_payment_history extends CI_Controller {
	
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

public function payment_history_view()
{
	
	    if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

	$data['payment_history']=$this->admin_model->selectAll('tbl_subadmin_payment_history');

	 $data['user'] = $this->common->select($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
	$this->load->view('manage_rm/payment_history_table',$data);
	$this->load->view('template/adminfooter_category');
	//redirect('profile/profile_show');

	//$this->load->view('profile_edit',$user);
	
}



 
   
function payment_history_search()
{
	
	    if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
		$month=$this->input->get('month');
    	$year=$this->input->get('year');
    	$user=$this->input->get('user_id');           
		
    	


$this->db->select('*');
$this->db->from('tbl_subadmin_payment_history');
$this->db->where('payment_year',$year);
$this->db->where('payment_month',$month);
$this->db->where('paid_to_user_name',$user);
$query=$this->db->get();

$data['payment_history']=$query->result();
   


		// $data=array('month'=>$month,    
		// 			'year'=>$year,
		// 			'user'=>$user, 
		// 			);


	
	// print_r($data);	
	
		
 $data['user'] = $this->common->select($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>'6'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('manage_rm/payment_history_table',$data);
    $this->load->view('template/adminfooter_category');		
	        
		// $this->session->set_flashdata('succ_update','Vocabulary Added successfully');
		// redirect('index.php/vocabulary/vocabulary_view/','refresh');
       
			   
}

function edit()
{
    $title_id=$this->uri->segment(3);

    $data['vocabulary']=$this->common->select($table_name ='tbl_english_vocabulary', $field = array(), $where = array('title_id'=>$title_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('vocabulary/vocabulary_edit_view',$data);
    $this->load->view('template/adminfooter_category');
}


function vocabulary_update()
{
    if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
		$title1=$this->input->post('title1');
    	$description1=$this->input->post('description1');
    	$title2=$this->input->post('title2');           
		$description2=$this->input->post('description2');	
		$title3=$this->input->post('title3');	
		$description3=$this->input->post('description3'); 
		$rec_id=$this->input->post('recid'); 
		
    	

    


		$data=array('title1'=>$title1,    
					'description1'=>$description1,
					'title2'=>$title2, 
					'description2'=>$description2,
					'title3'=>$title3,
					'description3'=>$description3,
					);
  
   $this->db->where('title_id',$rec_id);
    $this->db->update('tbl_english_vocabulary',$data);
     $this->session->set_flashdata('succ_msg','Updated successfully');
        redirect('index.php/vocabulary/vocabulary_view/','refresh');


}
function delete_data()
{
    $title_id=$this->uri->segment(3);
    $this->db->where('title_id',$title_id);
    $this->db->delete('tbl_english_vocabulary');

    $this->session->set_flashdata('succ_msg','Deleted successfully');
        redirect('index.php/vocabulary/vocabulary_view/','refresh');
}

function change_to_active()
{
        $cat_ids=$this->input->post('catid');
        $status=$this->input->post('status');
        $data=array('status'=>$status);


        for($i=0;$i<count($cat_ids);$i++)
        {
            $id=$cat_ids[$i];
            $this->db->where('title_id',$id);

            if($this->db->update('tbl_english_vocabulary',$data))
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

}
