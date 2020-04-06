<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_exam_level extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	 
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');			
	$this->load->library('image_lib');
	$this->load->model('common/common_model');	
		
}


public function exam_level_view()
{
  
  if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

$data['active']='manage_exam_level';

 $data['exam_level']=$this->common_model->common($table_name = 'tbl_exam_level', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
  

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu',$data);
  $this->load->view('manage_exam_level/exam_level_list_view',$data);
  $this->load->view('template/adminfooter_category');
  
  
}




 function create_slug($string)
  {     
        $replace = '-';         
        $string = strtolower($string);     
 
        //replace / and . with white space     
        $string = preg_replace("/[\/\.]/", " ", $string);     
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
 
        //remove multiple dashes or whitespaces     
        $string = preg_replace("/[\s-]+/", " ", $string);     
 
        //convert whitespaces and underscore to $replace     
        $string = preg_replace("/[\s_]/", $replace, $string);     
 
        //limit the slug size     
        $string = substr($string, 0, 100);     
 
        //slug is generated     
        return $string; 
    }


    function add_exam_level()
    {

        if($this->session->userdata('session_user_id')!='')
        {
          $user_id= $this->session->userdata('session_user_id');
        }
        else
        {
          redirect('index.php/login','refresh');
        }

         $data['active']='manage_exam_level'; 
          

          

          $this->load->view('template/admin_header');
          $this->load->view('template/admin_leftmenu',$data);
          $this->load->view('manage_exam_level/exam_level_add_view',$data);
          $this->load->view('template/adminfooter_category');

    }


  


    function exam_level_insert()
    {

          if($this->session->userdata('session_user_id')!='')
          {
            $user_id= $this->session->userdata('session_user_id');
          }
          else
          {
            redirect('index.php/login','refresh');
          }

              
          $exam_level=$this->input->post('exam_level');
        
          $current_date=date('Y-m-d H:i:s');
          
            $data = array(

                
                
                'exam_level'=>$exam_level,
                'created_date'=>$current_date,
                'created_by'=>$user_id
                
                

                );
          
          //echo '<pre>'; print_r($data); exit;
          $this->db->insert('tbl_exam_level',$data);
          $this->session->set_flashdata('succ_msg','New Exam Level added successfully');
          redirect('index.php/manage_exam_level/exam_level_view/','refresh');

    }

   
  


    function exam_level_delete()
    {
          $id=$this->uri->segment(3);

          $this->db->where('id',$id);

        $this->db->delete('tbl_exam_level');
            
        $this->session->set_flashdata('succ_msg','deleted successfully.');
          
          
            redirect('index.php/manage_exam_level/exam_level_view/','refresh');
    }



function exam_level_edit()
{
    if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

    $data['active']='manage_exam_level';

    $edit_id =$this->uri->segment(3);
    


    $data['exam_level']=$this->admin_model->selectone('tbl_exam_level','id',$edit_id);

   

        
    
    
    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('manage_exam_level/exam_level_edit_view',$data);
    $this->load->view('template/adminfooter_category');
}

function exam_level_update()
{

     if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

      $edit_id=$this->input->post('edit_id');

      $exam_level=$this->input->post('exam_level');
     
      $current_date=date('Y-m-d H:i:s');
      
            $data = array(

                    
                   
                    'exam_level'=>$exam_level,
                    'edited_by'=>$user_id,
                    'edited_date'=>$current_date,
                    

                    );
        
      //echo '<pre>'; print_r($data); exit;
      $this->db->where('id',$edit_id);
      $this->db->update('tbl_exam_level',$data);
      $this->session->set_flashdata('succ_msg','One Exam Level updated successfully.');
      redirect('index.php/manage_exam_level/exam_level_view/','refresh');

}



function change_to_active()
{
	
		$cat_ids=$this->input->post('catid');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($cat_ids);$i++)
		{
			$id=$cat_ids[$i];
			$this->db->where('id',$id);

			if($this->db->update('tbl_exam_level',$data))
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




