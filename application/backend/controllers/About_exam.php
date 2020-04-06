<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_exam extends CI_Controller {

public function __construct()
     {
         parent::__construct();

         $this->load->database();       
         $this->load->model('admin_model');
         $this->load->library('session');
             
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('email');          
            $this->load->library('image_lib');
            $this->load->model('common/common_model');  
        
         
     }

    public function index()
    {
         if(get_cookie('session_user_id')!='')
        {
          $user_id= get_cookie('session_user_id');
        }
        else{
          redirect('index.php/login','refresh');
        }


        $data['exam_details']=$this->common_model->common($table_name ='tbl_about_exam', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('about_exam/exam_list',$data);
    $this->load->view('template/adminfooter_category');

}


function add()
{
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('about_exam/add_exam');
    $this->load->view('template/adminfooter_category');
}


function insert()
{
    $exam_name=$this->input->post('exam_name');
    $eligibility=$this->input->post('eligibility');
    $vacancy=$this->input->post('vacancy');
    $selec_process=$this->input->post('selec_process');
    $hw_to_apply=$this->input->post('hw_to_apply');
    $appl_start_date=$this->input->post('appl_start_date');
    $appl_closing_date=$this->input->post('appl_closing_date');
    $preparation=$this->input->post('preparation');

    $current_date=date('Y-m-d H:i:s');

    $data=array(

            'exam_name'=>$exam_name,
            'eligibility'=>$eligibility,
            'vacancy'=>$vacancy,
            'select_process'=> $selec_process,
            'how_to_apply'=>$hw_to_apply,
            'apply_start_date'=>$appl_start_date,
            'apply_closing_date'=>$appl_closing_date,
            'preparation'=>$preparation,
            'created_date'=>$current_date
        );

    $this->db->insert('tbl_about_exam',$data);

    $this->session->set_flashdata('succ_msg','added successfully');
    redirect('index.php/About_exam','refresh');



}

function edit()
{

    $about_exam_id=$this->uri->segment(3);

    $data['exam_details']=$this->common_model->common($table_name ='tbl_about_exam', $field = array(), $where = array('about_exam_id'=>$about_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('about_exam/edit_exam',$data);
    $this->load->view('template/adminfooter_category');
}

function update()
{

    $exam_name=$this->input->post('exam_name');
    $eligibility=$this->input->post('eligibility');
    $vacancy=$this->input->post('vacancy');
    $selec_process=$this->input->post('selec_process');
    $hw_to_apply=$this->input->post('hw_to_apply');
    $appl_start_date=$this->input->post('appl_start_date');
    $appl_closing_date=$this->input->post('appl_closing_date');
    $preparation=$this->input->post('preparation');
    $about_exam_id=$this->input->post('about_exam_id');

    $current_date=date('Y-m-d H:i:s');

    $data=array(

            'exam_name'=>$exam_name,
            'eligibility'=>$eligibility,
            'vacancy'=>$vacancy,
            'select_process'=> $selec_process,
            'how_to_apply'=>$hw_to_apply,
            'apply_start_date'=>$appl_start_date,
            'apply_closing_date'=>$appl_closing_date,
            'preparation'=>$preparation,
            'edited_date'=>$current_date
        );

    $this->db->where('about_exam_id',$about_exam_id);
    $this->db->update('tbl_about_exam',$data);

    $this->session->set_flashdata('succ_msg','Updated successfully');
    redirect('index.php/About_exam','refresh');
}

function delete_data()
{
    $about_exam_id=$this->uri->segment(3);
    $this->db->where('about_exam_id',$about_exam_id);
    $this->db->delete('tbl_about_exam');
    $this->session->set_flashdata('succ_msg','Deleted successfully');
        redirect('index.php/About_exam','refresh');

}



}

?>
