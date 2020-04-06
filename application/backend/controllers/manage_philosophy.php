<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manage_philosophy extends CI_Controller 
{
	 
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
			$this->load->model('admin_model');
			$this->load->model('dash_board_model');
            $this->load->model('common');
			//START LOGIN CHECK++++++++++++++++++++++++++++++++++++++
			$this->session_check_and_session_data->session_check();
			//END LOGIN CHECK++++++++++++++++++++++++++++++++++++++
	}
	
	public function philosophy_view()
	{


    $data['philosophy']=$this->common->select($table_name = 'tbl_philosophy', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'desc'), $start = '', $end = '');

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_philosophy/philosophy_view',$data);
		$this->load->view('template/admin_footer');
	
	}
	public function philosophy_add()
	{

		
		
		 

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_philosophy/philosophy_add_view');
		$this->load->view('template/admin_footer');
	
	}
	public function philosophy_insert()
	{

		 if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        // $service_title=$this->input->post('service_title');      
        // $mat_type=$this->input->post('material_type');
        // $video=$this->input->post('video_link');
       

        $title=$this->input->post('title');
        $content=$this->input->post('content');

            
        $created_date=date('Y-m-d H:i:s');
        $created_by=$user_id;

        $data = array(   
                        'created_date'=>$created_date,
                        'created_by'=>$user_id,
                        'title'=>$title,
                        'content'=>$content


                    );
        //echo '<pre>'; print_r($data); exit;
        $this->db->insert('tbl_philosophy',$data);
        $this->session->set_flashdata('succ_msg','Added successfully');
        redirect('index.php/manage_philosophy/philosophy_view/','refresh');

	}

  public function philosophy_edit()
  {

     $id=$this->uri->segment(3);
    
     $data['philosophy']=$this->admin_model->selectone('tbl_philosophy','id',$id);
     


    
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('manage_philosophy/philosophy_edit_view',$data);
    $this->load->view('template/admin_footer');
  
  }

  public function philosophy_update()
  {
   
     if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $id =$this->input->post('hidden_id');
            
        $edited_date=date('Y-m-d H:i:s');
        $edited_by=$user_id;

        $title=$this->input->post('title');
        $content=$this->input->post('content');

        
        $data = array(
                        
                        
                        
                       
                        
                        
                        'edited_date'=>$edited_date,
                        'edited_by'=>$user_id,
                        'title'=>$title,
                        'content'=>$content,

                         
                    );
        
      
        $this->db->where('id',$id);
        $this->db->update('tbl_philosophy',$data);
      //  $this->db->insert('tbl_study_material',$data);
       $this->session->set_flashdata('success','Our philosophy updated successfully');
        redirect('index.php/manage_philosophy/philosophy_view/','refresh');
  }

  public function delete_philosophy()
  {
     $id =$this->uri->segment(3);

     $this->db->where('id',$id);
     $this->db->delete('tbl_philosophy');
     $this->session->set_flashdata('delete_success','one Our philosophy deleted successfully');
      redirect('index.php/manage_philosophy/philosophy_view/','refresh');
  }
function change_to_active()
{
  
    $service_ids=$this->input->post('id');
    $status=$this->input->post('status');
    $data=array('status'=>$status);


    for($i=0;$i<count($service_ids);$i++)
    {
      $id=$service_ids[$i];
      $this->db->where('id',$id);

      if($this->db->update('tbl_philosophy',$data))
      {
        $result=1;
      }
      
    }
      
    echo json_encode(array('changedone'=>$result));
    

}
	
		

}
?>