<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupon extends CI_Controller {

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

    public function coupon_view()
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
    $this->load->view('coupon/coupon_view');
  $this->load->view('template/admin_footer');
  }

   public function coupon_edit()
  {
   

    if ($this->session->userdata('session_id') == "")
        {
            redirect(base_url() . 'index.php/login');
        }
       
    $data['controller']="coupon";
    $coupon_id = $this->uri->segment(3);
    $data['coupon'] = $this->admin_model->select_data('tbl_coupon','id',$coupon_id);
   $admin_id=$this->session->userdata('session_id');
    $data['prof_name']=$this->admin_model->select_data('tbl_user','id',$admin_id);
    //echo '<pre>';print_r($data['order_detail']);exit;
    $this->load->view('template/admin_header',$data);
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('coupon/coupon_edit',$data);
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
  

  public function add_coupon()
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
    $this->load->view('coupon/add_coupon');
    $this->load->view('template/admin_footer');

  }

  function coupon_submit()
  {
    $current_date = date('Y-m-d H:i:s');
    $lab_id=$this->session->userdata('session_id');
    $coupon_name = $this->input->post('coupon_name');
    $coupon_code = $this->input->post('coupon_code');
    $max_user = $this->input->post('max_user');
    $min_amount = $this->input->post('min_amount');
    $discount_amount = $this->input->post('discount_amount');
    $valid_from = date('Y-m-d',strtotime($this->input->post('valid_from')));
    $valid_to = date('Y-m-d',strtotime($this->input->post('valid_to')));

    $discount_percentage = $this->input->post('discount_per');
   

    $data = array('coupon_name'=>$coupon_name,'coupon_code'=>$coupon_code,'max_user'=>$max_user,'min_amount'=>$min_amount,'discount_amount'=>$discount_amount,'discount_percentage'=>$discount_percentage,'valid_from'=>$valid_from,'valid_to'=>$valid_to,'created_by'=>$lab_id,'created_on'=>$current_date);
    //var_dump($data);exit;
    $this->db->insert('tbl_coupon',$data);
    
    redirect(base_url().'index.php/coupon/coupon_view/','refresh');
  }

 function coupon_edit_submit()
 {
    $coupon_id = $this->input->post('coupon_id');
    $current_date = date('Y-m-d H:i:s');
    $lab_id=$this->session->userdata('session_id');
    $coupon_name = $this->input->post('coupon_name');
    $coupon_code = $this->input->post('coupon_code');
    $max_user = $this->input->post('max_user');
    $min_amount = $this->input->post('min_amount');
    $discount_amount = $this->input->post('discount_amount');
    $valid_from =date('Y-m-d',strtotime($this->input->post('valid_from')));
      //print_r($valid_from);exit;
    $valid_to = date('Y-m-d',strtotime($this->input->post('valid_to')));
   
    $discount_percentage = $this->input->post('discount_per');

    $data = array('coupon_name'=>$coupon_name,'coupon_code'=>$coupon_code,'max_user'=>$max_user,'min_amount'=>$min_amount,'discount_amount'=>$discount_amount,'discount_percentage'=>$discount_percentage,'valid_from'=>$valid_from,'valid_to'=>$valid_to,'modified_by'=>$lab_id,'modified_on'=>$current_date);

    $this->db->where('id',$coupon_id);
    $this->db->update('tbl_coupon',$data);

    
     redirect(base_url().'index.php/coupon/coupon_view/','refresh');
 }

 function coupon_delete($id)
 {
  $this->db->where('id',$id);
  $this->db->delete('tbl_coupon');
  $this->db->where('coupon_id',$id);
  $this->db->delete('tbl_coupon_test_exclude');
  redirect(base_url().'index.php/coupon/coupon_view/','refresh');
 }

  function used_coupon_delete($id)
 {
  $this->db->where('id',$id);
  $this->db->delete('tbl_coupon_user');
  
  redirect(base_url().'index.php/coupon/user_coupon_view/','refresh');
 }

   function change_active()
    {
        $status=$this->input->post('id');
        //$btn_status=$this->input->post('btn_value');

        for($i=0;$i<count($status);$i++)
        {
            $data=array(
                'status'=>$this->input->post('btn_value')
            );
            $this->admin_model->update_data($data,'tbl_coupon','id',$status[$i]);
        }
        echo json_encode(array('status'=>"active"));
    }


    function change_inactive()
    {
        $status=$this->input->post('id');
        //$btn_status=$this->input->post('btn_value');

        for($i=0;$i<count($status);$i++)
        {
            $data=array(
                'status'=>$this->input->post('btn_value')
            );
            $this->admin_model->update_data($data,'tbl_coupon','id',$status[$i]);
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