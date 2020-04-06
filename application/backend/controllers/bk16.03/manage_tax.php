<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_tax extends CI_Controller {

public function __construct()
     {
         parent::__construct();

         $this->load->database();       
         $this->load->model('admin_model');
         
     }

    public function index()
    {
        if($this->session->userdata('session_id')!='') 
        {
            redirect(base_url().'index.php/login');
        }

    }

    public function tax_view()
  {
     

    if ($this->session->userdata('session_id') == "")
        {
            redirect(base_url() . 'index.php/login');
        }
       
    $data['controller']="manage_tax";
   
    $admin_id=$this->session->userdata('session_id');

    $data['tax_all']=$this->admin_model->select_all('tbl_tax_master');
    
    //echo '<pre>';print_r($data['order_detail']);exit;
    $this->load->view('template/admin_header',$data);
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('tax/tax_view');
  $this->load->view('template/admin_footer');
  }

   public function tax_edit()
  {
   

    if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
       
    $data['controller']="coupon";
    $tax_id = $this->uri->segment(3);
    $data['tax_dtls'] = $this->admin_model->select_data('tbl_tax_master','tax_id',$tax_id);
 
    
    //echo '<pre>';print_r($data['order_detail']);exit;
    $this->load->view('template/admin_header',$data);
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('tax/edit_tax',$data);
   $this->load->view('template/admin_footer');

  }

   public function user_coupon_view()
  {
    

    if ($this->session->userdata('session_id') == "")
        {
            redirect(base_url() . 'index.php/login');
        }
       
    $data['controller']="coupon";
   
   $admin_id=$this->session->userdata('session_id');
$data['prof_name']=$this->admin_model->select_data('tbl_user','id',$admin_id);
    //echo '<pre>';print_r($data['order_detail']);exit;
    $this->load->view('template/admin_header',$data);
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('coupon/user_coupon_view');
    $this->load->view('template/admin_footer');

  }
  

  public function add_tax()
  {
   
    
    if ($this->session->userdata('session_id') == "")
        {
            redirect(base_url() . 'index.php/login');
        }
       
    $data['controller']="manage_tax";
   
   $admin_id=$this->session->userdata('session_id');
$data['prof_name']=$this->admin_model->select_data('tbl_user','id',$admin_id);
    //echo '<pre>';print_r($data['order_detail']);exit;
    $this->load->view('template/admin_header',$data);
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('tax/add_tax');
    $this->load->view('template/admin_footer');

  }

  function tax_submit()
  {

      if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
    $current_date = date('Y-m-d H:i:s');
   
    $tax_name = $this->input->post('tax_name');
    $tax_percentage = $this->input->post('tax_percentage');
    $status=$this->input->post('tax_status');
   
   

    $data = array(
          'tax_name'=>$tax_name,
          'tax_percentage'=>$tax_percentage,
          'tax_status'=>$status,
          'created_by'=>$user_id,
          'created_on'=>$current_date
          );
    //var_dump($data);exit;
    $this->db->insert('tbl_tax_master',$data);
    
    redirect(base_url().'index.php/manage_tax/tax_view/','refresh');
  }

 function tax_edit_submit()
 {

    if($this->session->userdata('session_user_id')!='')
        {
            $user_id= $this->session->userdata('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }

        $tax_id=$this->input->post('tax_id');

        $current_date = date('Y-m-d H:i:s');
   
   
        $tax_name = $this->input->post('tax_name');
        $tax_percentage = $this->input->post('tax_percentage');
        $status=$this->input->post('tax_status');
   
   

        $data = array(
          'tax_name'=>$tax_name,
          'tax_percentage'=>$tax_percentage,
          'tax_status'=>$status,
          'created_by'=>$user_id,
          'created_on'=>$current_date
          );

    $this->db->where('tax_id',$tax_id);
    $this->db->update('tbl_tax_master',$data);

    
     redirect(base_url().'index.php/manage_tax/tax_view/','refresh');
 }

 function tax_delete($id)
 {
  $this->db->where('tax_id',$id);
  $this->db->delete('tbl_tax_master');
 
  redirect(base_url().'index.php/manage_tax/tax_view/','refresh');
 }

  function used_coupon_delete($id)
 {
  $this->db->where('id',$id);
  $this->db->delete('tbl_coupon_user');
  
  redirect(base_url().'index.php/coupon/user_coupon_view/','refresh');
 }

   function change_active()
    {
        $ids=$this->input->post('id');
        $btn_status=$this->input->post('btn_value');

        for($i=0;$i<count($ids);$i++)
        {
            $data_arr=array(
                'tax_status'=> 'Y'
            );
            $this->db->where('tax_id',$ids[$i]);
            $this->db->update('tbl_tax_master',$data_arr);
           // $this->admin_model->update_data($data,'tbl_tax_master','tax_id',$status[$i]);
        }
        echo json_encode(array('status'=>"active"));
    }


    function change_inactive()
    {
        $ids=$this->input->post('id');
        //$btn_status=$this->input->post('btn_value');

        for($i=0;$i<count($ids);$i++)
        {
            $data_arr=array(
                'tax_status'=>'N'
            );
            //$this->admin_model->update_data($data,'tbl_tax_master','tax_id',$status[$i]);
             $this->db->where('tax_id',$ids[$i]);
            $this->db->update('tbl_tax_master',$data_arr);
        }
        echo json_encode(array('status'=>"inactive"));
    }

    function change_display()
    {
        $display=$this->input->post('id');
        //$btn_status=$this->input->post('btn_value');

        for($i=0;$i<count($display);$i++)
        {
            $data=array(
                'is_display'=>$this->input->post('btn_value')
            );
            $this->admin_model->update_data($data,'tbl_coupon','id',$display[$i]);
        }
        echo json_encode(array('display'=>"Yes"));
    }


 function change_hide()
    {
        $display=$this->input->post('id');
        //$btn_status=$this->input->post('btn_value');

        for($i=0;$i<count($display);$i++)
        {
            $data=array(
                'is_display'=>$this->input->post('btn_value')
            );
            $this->admin_model->update_data($data,'tbl_coupon','id',$display[$i]);
        }
        echo json_encode(array('display'=>"No"));
    }

}
?>