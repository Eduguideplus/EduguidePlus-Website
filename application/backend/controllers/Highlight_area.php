<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Highlight_area extends CI_Controller {

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


        $data['area_details']=$this->common_model->common($table_name ='tbl_highlight_area', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('highlight_area_id'=>'desc'), $start = '', $end = '');
    

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('highlight_area/highlight_area_list',$data);
    $this->load->view('template/adminfooter_category');

}


function add()
{
    // echo "ok";

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('highlight_area/add_area');
    $this->load->view('template/adminfooter_category');
}

function insert()
{
    $area=$this->input->post('area');
     $current_date=date('Y-m-d H:i:s');

     $data=array(
                'area_content'=>$area,
                'created_date'=>$current_date
                );

     $this->db->insert('tbl_highlight_area',$data);

    $this->session->set_flashdata('succ_msg','added successfully');
        redirect('index.php/Highlight_area','refresh');
}

function edit()
{
    $highlight_area_id=$this->uri->segment(3);

    $data['area_details']=$this->common_model->common($table_name ='tbl_highlight_area', $field = array(), $where = array('highlight_area_id'=>$highlight_area_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('highlight_area/edit_area',$data);
    $this->load->view('template/adminfooter_category');
}

function update()
{
    $area=$this->input->post('area');
     $current_date=date('Y-m-d H:i:s');
     $highlight_area_id=$this->input->post('highlight_area_id');

     $data=array(
                'area_content'=>$area,
                'edited_date'=>$current_date
                );

     $this->db->where('highlight_area_id',$highlight_area_id);
     $this->db->update('tbl_highlight_area',$data);

     $this->session->set_flashdata('succ_msg','Updated successfully');
        redirect('index.php/Highlight_area','refresh');


}

function delete_data()
{
    $highlight_area_id=$this->uri->segment(3);
    $this->db->where('highlight_area_id',$highlight_area_id);
    $this->db->delete('tbl_highlight_area');

    $this->session->set_flashdata('succ_msg','Deleted successfully');
        redirect('index.php/Highlight_area','refresh');
}

function change_to_active()
{
        $cat_ids=$this->input->post('catid');
        $status=$this->input->post('status');
        $data=array('status'=>$status);


        for($i=0;$i<count($cat_ids);$i++)
        {
            $id=$cat_ids[$i];
            $this->db->where('highlight_area_id',$id);

            if($this->db->update('tbl_highlight_area',$data))
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

?>
