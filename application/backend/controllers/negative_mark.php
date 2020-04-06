<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class negative_mark extends CI_Controller
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
    $this->load->model('common/common_model');      
}

function mark_view()
{
    if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        $data['mark']=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('negative_mark/negative_table',$data);
    $this->load->view('template/adminfooter_category');
    
}


function edit_negative()
    {
        if(get_cookie('session_user_id')!='')
         {
             $user_id= get_cookie('session_user_id');
         }
         else{
             redirect('index.php/login','refresh');
         }
            $id=$this->uri->segment(3);
        $data['mark']=$this->admin_model->selectOne('tbl_exam_time','exam_id',$id);
        $data['test']=$this->admin_model->selectOne('tbl_test_type','test_id',$id);
        
             /*$data['size']=$this->admin_model->selectAll('tbl_size');
             $data['color']=$this->admin_model->selectAll('tbl_color');
             */
        

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('negative_mark/negative_edit',$data);
        $this->load->view('template/adminfooter_category');
    }
    function mark_update()
{
    $id=$this->input->post('exam_id');
    $test=$this->input->post('test_name');
    $neg_mark=$this->input->post('neg_mark');
   
    $data=array(
       
        'negative_marks'=>$neg_mark,
        );

    // print_r($data); exit;
    $this->db->where('exam_id',$id);
    $this->db->update('tbl_exam_time',$data);
    $this->session->set_flashdata('succ_update','update successfully');
    redirect('index.php/negative_mark/mark_view','refresh');

}

function change_to_active()
{
    
        $pro_ids=$this->input->post('pid');
        $status=$this->input->post('status');
        $data=array('status'=>$status);


        for($i=0;$i<count($pro_ids);$i++)
        {
            $id=$pro_ids[$i];
            $this->db->where('buyer_id',$id);

            if($this->db->update('tbl_buyer',$data))
            {
                $result=1;
            }
            


            }
            
        echo json_encode(array('changedone'=>$result));
        


        }

}