<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class redeem extends CI_Controller {
	
public function __construct()
{
	parent::__construct();
	
		
}

function redeem_view()
{

    $data['redeem'] = $this->admin_model->select_all('tbl_redeem');
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('redeem/redeem_view',$data);
        $this->load->view('template/admin_footer');
}

function redeem_view_add()
{
    $redeem_point = $this->input->post('redeem_point');
    $redeem_amount = $this->input->post('redeem_amount');
    $user_ref_point = $this->input->post('user_ref_point');
    $min_redeem_point = $this->input->post('min_redeem_point');

    $data_redeem = $this->admin_model->select_all('tbl_redeem');
    if(count($data_redeem) != 0)
    {
        $data = array('redeem_point'=>$redeem_point,'redeem_amount'=>$redeem_amount,'user_referral_point'=>$user_ref_point,'min_redeem_point'=>$min_redeem_point);
        $this->db->where('id',1);
        $this->db->update('tbl_redeem',$data);
    $this->session->set_flashdata('succ_msg','Updated successfully');
    }
    else
    {
        $data = array('redeem_point'=>$redeem_point,'redeem_amount'=>$redeem_amount,'user_referral_point'=>$user_ref_point,'min_redeem_point'=>$min_redeem_point);
        $this->db->insert('tbl_redeem',$data);
    $this->session->set_flashdata('succ_msg','Added successfully');
    }
    redirect(base_url().'index.php/redeem/redeem_view');
}

function exam_redeem_list()
{
    $data['redeem'] = $this->admin_model->select_all('tbl_exam_redeem');
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('redeem/redeem_exam_list',$data);
        $this->load->view('template/admin_footer');
}
function add_exam_redeem()
{
   
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('redeem/add_exam_redeem');
        $this->load->view('template/admin_footer');
}

function redeem_exam_submit()
{
    $percentage_from = $this->input->post('percentage_from');
    $percentage_to = $this->input->post('percentage_to');
    $redeem_point = $this->input->post('ref_point');

    $data = array('percentage_from'=>$percentage_from,'percentage_to'=>$percentage_to,'redeem_point'=>$redeem_point);
    $this->db->insert('tbl_exam_redeem',$data);
    $this->session->set_flashdata('succ_msg','Added successfully');
    redirect(base_url().'index.php/redeem/exam_redeem_list');
}

function delete_exam_redeem($id)
{
    $this->db->where('id',$id);
    $this->db->delete('tbl_exam_redeem');
     $this->session->set_flashdata('del_msg','Deleted successfully');
    redirect(base_url().'index.php/redeem/exam_redeem_list');
}

function edit_exam_redeem($id)
{
    $data['exam_redeem'] = $this->admin_model->selectOne('tbl_exam_redeem','id',$id);
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('redeem/edit_exam_redeem',$data);
        $this->load->view('template/admin_footer');
}

function redeem_exam_edit_submit()
{
    $percentage_from = $this->input->post('percentage_from');
    $percentage_to = $this->input->post('percentage_to');
    $redeem_point = $this->input->post('ref_point');
    $exam_redeem_id = $this->input->post('exam_redeem_id');

    $data = array('percentage_from'=>$percentage_from,'percentage_to'=>$percentage_to,'redeem_point'=>$redeem_point);
    $this->db->where('id',$exam_redeem_id);
    $this->db->update('tbl_exam_redeem',$data);
    $this->session->set_flashdata('succ_msg','Updated successfully');
    redirect(base_url().'index.php/redeem/exam_redeem_list');
}

}
?>



