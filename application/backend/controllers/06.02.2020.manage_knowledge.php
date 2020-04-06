<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_knowledge extends CI_Controller {
	
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
    $this->load->model('custom_model');	
		
}



public function knowledge_view()
{
	
	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	//$data['degree']=$this->admin_model->selectAll('tbl_degree');
	$data['kqtest']= $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('kq_id'=>'desc'), $start = '', $end = '');
	//echo '<pre>'; print_r($data['plans']); exit;
	$data['active']="knowledge";
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
	$this->load->view('manage_knowledge/knowledge_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
}

public function knockout_view()
{
    
    if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
    //$data['degree']=$this->admin_model->selectAll('tbl_degree');
    $data['kqtest']= $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('test_type'=>'4'), $where_or = array(), $like = array(), $like_or = array(), $order = array('kq_id'=>'desc'), $start = '', $end = '');
    //echo '<pre>'; print_r($data['plans']); exit;

    $data['active']="knockout";
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_knowledge/knowledge_table_view',$data);
    $this->load->view('template/adminfooter_category');
    
    
}

function enrolled_user()
{
    $kq_id=$this->uri->segment(3);

    $data['enroll_details']= $this->common_model->common($table_name='tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$kq_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    // $user_id=@$user_details[0]->user_id;
// echo '<pre>'; echo $kq_id;
  // print_r($data['enroll_details']); exit;

 $data['active']="knowledge";
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_knowledge/enrolled_user_table_view',$data);
    $this->load->view('template/adminfooter_category');
}



 function create_slug($string)
  {     
        $replace = '-';         
        $string = strtolower($string);     
 
        //replace /995 995and . with white space     
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


    public function random_generator($start,$limit,$qty)
    {

        $randarray = array(); 
        for($i = 1; $i <= $qty; ) 
        { 
            unset($rand); 
            $rand = rand($start, $limit); 
            if(!in_array($rand, $randarray)) 
            { 
                $randarray[] = $rand; 
                $i++; 
            } 
        } 

        return $randarray;

        


    }
    function add()
    {
    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	/*$data['category']=$this->admin_model->selectone('tbl_category','parent_category_id','0');*/
    	//$data['subject']=$this->admin_model->selectAll('tbl_category');

        //$data['question']=$this->custom_model->get_selected_type_question('2');

         // $data['question']= $this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('test_id !='=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        //print_r($data['question']);exit;

        //$data['mock']= $this->common_model->common($table_name = 'tbl_dummy_mock_set', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $data['parent_exam_type']= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

          $data['test_type_list']= $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id !='=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
          $data['active']="knowledge";

    	$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('manage_knowledge/knowledge_add_view',$data);
		$this->load->view('template/adminfooter_category');
    }

    function add_manual_test()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
       

        $data['parent_exam_type']= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

          $data['test_type_list']= $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id !='=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
          $data['active']="knowledge";

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('manage_knowledge/manual_add_view',$data);
        $this->load->view('template/adminfooter_category');
    }

function get_exam()
{
  $category_id=$this->input->post('category_id');
        $data=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}
function get_subject()
{
  $category_id=$this->input->post('category_id');
        $data=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('exam_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}
function get_chapter()
{

  $category_id=$this->input->post('category_id');
        $data=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('sub_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}

function get_plan_details()
{
        $category_id=$this->input->post('category_id');

        $data['plan']=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('test_type_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        
        $data['sets']=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('test_type'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        echo json_encode($data);
}

function check_available_question()
{
     $type=$this->input->post('type');
     $s_name=$this->input->post('s_name');
        $data_qz= $this->custom_model->get_question_by_type_subject($type,$s_name);
        echo json_encode($data_qz);
}

   
    function insert()
    {

    	if(get_cookie('session_user_id')!='')
		{
			$user_id= get_cookie('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	
    	$test_type=$this->input->post('test_type');
        $group_name=$this->input->post('group_name');
        $exam_name=$this->input->post('exam_name');
        $sub_name=$this->input->post('sub_name');
        $chap_name=$this->input->post('chap_name');
        $qstn_qty=$this->input->post('qstn_qty');
        $tim_marks=$this->input->post('tim_marks');
        $exam_date=$this->input->post('exam_date');
        $exam_time=$this->input->post('exam_time');
        $reg_start_date=$this->input->post('reg_start_date');
        $reg_end_date=$this->input->post('reg_end_date');
        $exam_marks=$this->input->post('exam_marks');
        $exam_duration=$this->input->post('exam_duration_hid');
        $exam_fees=$this->input->post('exam_fees');
        $instruction=$this->input->post('instruction');

        $test_name=$this->input->post('test_name');

        // echo $instruction; exit; 
        $current_date=date('Y-m-d H:i:s');

        $group_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$group_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $sub_dtls=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $data_qs= $this->custom_model->get_question_by_type_subject($test_type,$sub_name);
        $exam_marks=0.00;
        $exam_duration=0;



        if($chap_name>0)
        {
    
            $data_qs= $this->custom_model->get_question_by_type_chapter($test_type,$sub_name,$chap_name);
        
        }
        else
        {
   
            $data_qs= $this->custom_model->get_question_by_type_subject($test_type,$sub_name);    
        }
        shuffle($data_qs);
        $start=0;
        $limit=count($data_qs)-1;
        $indx_arr=$this->random_generator($start,$limit,$qstn_qty);


         for($i=0;$i<count($indx_arr);$i++)
        {
            $indx=$indx_arr[$i];
            $que_id= $data_qs[$indx]->id;
            $get_question_details= $this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>$que_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            $marks_per_quest= @$get_question_details[0]->marks;
            $time_per_quest= @$get_question_details[0]->time;


            $exam_marks= $exam_marks+$marks_per_quest;
            $exam_duration= $exam_duration+$time_per_quest;
            
        }


       
       
            $set_name=$test_name;
            $set_slug=$this->create_slug($set_name);
            $actual_name=$set_name;
            $exam_code='TEST'.time().$test_name;

        $check_test_availablity= $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_name'=>$set_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




    if(count($check_test_availablity)==0)
    {
                $data_set=array(
                
                            'set_name'          =>$actual_name,
                            'set_slug'          =>$set_slug,
                            'test_type'         =>$test_type,
                            'group_id'          =>$group_name,
                            'exam_id'           =>$exam_name,
                            'subject_id'        =>$sub_name,
                            'q_qty'             =>$qstn_qty,
                            'exam_date'         =>$exam_date,
                            'exam_time'         =>$exam_time,
                            'total_marks'       =>$exam_marks,
                            'exam_duration'     =>$exam_duration,
                            'reg_start_date'    =>$reg_start_date,
                            'reg_closing_date'  =>$reg_end_date,
                            'exam_fees'         =>$exam_fees,
                            'exam_instruction'  =>$instruction,
                            'set_code'          =>$exam_code,
                            'created_on'        =>$current_date,
                            'created_by'        =>$user_id
                         );

            
            $this->db->insert('tbl_knowledge_qiuz_set', $data_set);
            $set_id=$this->db->insert_id();



        



        for($i=0;$i<count($indx_arr);$i++)
        {
            $indx=$indx_arr[$i];
            $data_dtls=array(

                'set_id'    =>$set_id,
                'que_id'    =>$data_qs[$indx]->id,
                'created_by'=>$user_id,
                'created_on'=>$current_date

            );
            $this->db->insert('tbl_knowledge_quiz_set_dtls',$data_dtls);
        }



        $this->session->set_flashdata('succ_msg','Set created successfully');
        redirect('index.php/manage_knowledge/knowledge_view/','refresh');

}
else{
    $this->session->set_flashdata('err_msg','Set already exists');
        redirect('index.php/manage_knowledge/add/knowledge','refresh');
}

            

    }


     function manual_add_action()
    {

        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        
        $test_type=$this->input->post('test_type');
        $group_name=$this->input->post('group_name');
        $exam_name=$this->input->post('exam_name');
        $sub_name=$this->input->post('sub_name');
        $chap_name=$this->input->post('chap_name');
        $qstn_qty=$this->input->post('qstn_qty');
        $tim_marks=$this->input->post('tim_marks');
        $exam_date=$this->input->post('exam_date');
        $exam_time=$this->input->post('exam_time');
        $reg_start_date=$this->input->post('reg_start_date');
        $reg_end_date=$this->input->post('reg_end_date');
        $exam_marks=$this->input->post('exam_marks');
        $exam_duration=$this->input->post('exam_duration_hid');
        $exam_fees=$this->input->post('exam_fees');
        $instruction=$this->input->post('instruction');

        $test_name=$this->input->post('test_name');

        // echo $instruction; exit; 
        $current_date=date('Y-m-d H:i:s');

        $group_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$group_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $sub_dtls=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $data_qs= $this->custom_model->get_question_by_type_subject($test_type,$sub_name);
        $exam_marks=0.00;
        $exam_duration=0;



        if($chap_name>0)
        {
    
            $data_qs= $this->custom_model->get_question_by_type_chapter($test_type,$sub_name,$chap_name);
        
        }
        else
        {
   
            $data_qs= $this->custom_model->get_question_by_type_subject($test_type,$sub_name);    
        }
        shuffle($data_qs);
        $start=0;
        $limit=count($data_qs)-1;
        $indx_arr=$this->random_generator($start,$limit,$qstn_qty);


        /* for($i=0;$i<count($indx_arr);$i++)
        {
            $indx=$indx_arr[$i];
            $que_id= $data_qs[$indx]->id;
            $get_question_details= $this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>$que_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            $marks_per_quest= @$get_question_details[0]->marks;
            $time_per_quest= @$get_question_details[0]->time;


            $exam_marks= $exam_marks+$marks_per_quest;
            $exam_duration= $exam_duration+$time_per_quest;
            
        }*/


       
       
            $set_name=$test_name;
            $set_slug=$this->create_slug($set_name);
            $actual_name=$set_name;
            $exam_code='TEST'.time().$test_name;

        $check_test_availablity= $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_name'=>$set_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




    if(count($check_test_availablity)==0)
    {
                $data_set_sess=array(
                
                            'set_name'          =>$actual_name,
                            'set_slug'          =>$set_slug,
                            'test_type'         =>$test_type,
                            'group_id'          =>$group_name,
                            'exam_id'           =>$exam_name,
                            'subject_id'        =>$sub_name,
                          
                            
                            'exam_instruction'  =>$instruction,
                            'set_code'          =>$exam_code,
                            'created_on'        =>$current_date,
                            'created_by'        =>$user_id
                         );

            
           $this->session->set_userdata($data_set_sess);
$data['question_list']= $data_qs;

 $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu');
        $this->load->view('manage_knowledge/question_table_view',$data);
        $this->load->view('template/adminfooter_category');
        



       /* for($i=0;$i<count($indx_arr);$i++)
        {
            $indx=$indx_arr[$i];
            $data_dtls=array(

                'set_id'    =>$set_id,
                'que_id'    =>$data_qs[$indx]->id,
                'created_by'=>$user_id,
                'created_on'=>$current_date

            );
            $this->db->insert('tbl_knowledge_quiz_set_dtls',$data_dtls);
        }*/



       /* $this->session->set_flashdata('succ_msg','Set created successfully');
        redirect('index.php/manage_knowledge/knowledge_view/','refresh');*/

}
else{
    $this->session->set_flashdata('err_msg','Set already exists');
        redirect('index.php/manage_knowledge/add/knowledge','refresh');
}

            

    }

    function manual_test_create_submit()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        
        $test_type=$this->session->userdata('test_type');
        $group_name=$this->session->userdata('group_id');
        $exam_name=$this->session->userdata('exam_id');
        $sub_name=$this->session->userdata('subject_id');
        $chap_name='';
        $qstn_qty=0;
        $tim_marks=0;
        $exam_date='';
        $exam_time='';
        $reg_start_date='';
        $reg_end_date='';
        $exam_marks=0;
        $exam_duration=0;
        $exam_fees=0;
        $instruction=$this->session->userdata('exam_instruction');

        $test_name=$this->session->userdata('set_name');

        // echo $instruction; exit; 
        $current_date=date('Y-m-d H:i:s');

        $group_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$group_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $sub_dtls=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

       
        $exam_marks=0.00;
        $exam_duration=0;
        $q_ids=$this->input->post('id');
        $qstn_qty=count($q_ids);




         for($i=0;$i<count($q_ids);$i++)
        {
            
            $que_id=$q_ids[$i];;
            $get_question_details= $this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>$que_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            $marks_per_quest= @$get_question_details[0]->marks;
            $time_per_quest= @$get_question_details[0]->time;


            $exam_marks= $exam_marks+$marks_per_quest;
            $exam_duration= $exam_duration+$time_per_quest;
            
        }


       
       
            $set_name=$test_name;
            $set_slug=$this->create_slug($set_name);
            $actual_name=$set_name;
            $exam_code='TEST'.time().$test_name;

        $check_test_availablity= $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_name'=>$set_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




    if(count($check_test_availablity)==0)
    {
               $data_set=array(
                
                            'set_name'          =>$actual_name,
                            'set_slug'          =>$set_slug,
                            'test_type'         =>$test_type,
                            'group_id'          =>$group_name,
                            'exam_id'           =>$exam_name,
                            'subject_id'        =>$sub_name,
                            'q_qty'             =>$qstn_qty,
                            'exam_date'         =>$exam_date,
                            'exam_time'         =>$exam_time,
                            'total_marks'       =>$exam_marks,
                            'exam_duration'     =>$exam_duration,
                            'reg_start_date'    =>$reg_start_date,
                            'reg_closing_date'  =>$reg_end_date,
                            'exam_fees'         =>$exam_fees,
                            'exam_instruction'  =>$instruction,
                            'set_code'          =>$exam_code,
                            'created_on'        =>$current_date,
                            'created_by'        =>$user_id
                         );

            
            $this->db->insert('tbl_knowledge_qiuz_set', $data_set);
            $set_id=$this->db->insert_id();

 



        for($i=0;$i<count($q_ids);$i++)
        {
           
            $data_dtls=array(

                'set_id'    =>$set_id,
                'que_id'    =>$q_ids[$i],
                'created_by'=>$user_id,
                'created_on'=>$current_date

            );
            $this->db->insert('tbl_knowledge_quiz_set_dtls',$data_dtls);
        }


echo json_encode(array('result'=>1));

}
else{
    echo json_encode(array('result'=>0));
}
}

function delete_test()
{
    $test_id= $this->uri->segment(3);

    $this->db->where('kq_id', $test_id);
    $this->db->delete('tbl_knowledge_qiuz_set');


     $this->db->where('set_id', $test_id);
     $this->db->delete('tbl_knowledge_quiz_set_dtls');

     $this->db->where('set_id', $test_id);
     $this->db->delete('tbl_user_knowledge_quiz');

     $this->db->where('set_id', $test_id);
     $this->db->delete('tbl_user_exam');

     $this->session->set_flashdata('succ_msg','Test has been deleted');
      redirect('index.php/manage_knowledge/knowledge_view/knowledge','refresh');
}

function delete_multi_test()
{
    $ids=$this->input->post('id');
    for($i=0;$i<count($ids);$i++)
        {

            $test_id=$ids[$i];

            $this->db->where('kq_id', $test_id);
            $this->db->delete('tbl_knowledge_qiuz_set');


            $this->db->where('set_id', $test_id);
            $this->db->delete('tbl_knowledge_quiz_set_dtls');

            $this->db->where('set_id', $test_id);
            $this->db->delete('tbl_user_knowledge_quiz');

            $this->db->where('set_id', $test_id);
            $this->db->delete('tbl_user_exam');
        }

        echo json_encode(array('response'=>1));
}

   


function change_to_active()
{
	
		$ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($ids);$i++)
		{
			$id=$ids[$i];
			$this->db->where('kq_id',$id);

			if($this->db->update('tbl_knowledge_qiuz_set',$data))
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


public function generate_award()
{


   $set_id=$this->uri->segment(3);
   $reg_fees=$this->uri->segment(4);


   $total_examinee=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

if(count($total_examinee)==1){

$award='refund';
    
  $rank_knw_data = $this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $data_award=array( 
                      'set_id' =>$set_id,
                      'user_id'=>@$rank_knw_data[0]->user_id,
                      'award_amount'=>$award,
                      'created_on'=>date('Y-m-d H:i:s'),
                      'created_by'=>get_cookie('session_user_id'));

   $this->db->insert('tbl_user_award',$data_award);   
}

 if(count($total_examinee)==2 || count($total_examinee)<=10){

    $award=$reg_fees*(60/100)+$reg_fees;

$rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '0', $end = '1');
 }


 if(count($total_examinee)==11 || count($total_examinee)<=25){

    $award=2*$reg_fees;

    $rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '0', $end = '3');

 }


if(count($total_examinee)==26 || count($total_examinee)<=50){

    $award=2*$reg_fees;

    $rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '0', $end = '10');

 }

if(count($total_examinee)==51 || count($total_examinee)<=75){

    $award=2*$reg_fees;

    $rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '0', $end = '15');

 }

 if(count($total_examinee)==76 || count($total_examinee)<=100){

    $award=2*$reg_fees;

    $rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '0', $end = '20');

 }

  if(count($total_examinee)==101 || count($total_examinee)<=150){

    $award=2*$reg_fees;

    $rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '0', $end = '25');

 }

 if(count($total_examinee)==76 || count($total_examinee)<=100){

    $award=2*$reg_fees;

    $rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '0', $end = '40');

 }
for ($i=0; $i <count($rank_indexing_data) ; $i++) { 

$data_award=array(
                  'set_id'=>$set_id,
                  'user_id'=>@$rank_indexing_data[$i]->user_id,
                  'award_amount'=>$award,
                  'created_on'=>date('Y-m-d H:i:s'),
                  'created_by'=>get_cookie('session_user_id'));

   $this->db->insert('tbl_user_award',$data_award); 
}

$this->session->set_flashdata('succ_msg','Award created successfully');
redirect('index.php/manage_knowledge/knowledge_view/','refresh');
}

public function award_list()
{
   

    $set_id=$this->uri->segment(3);

    $data['rank_data'] = $this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('manage_knowledge/award_table_view',$data);
    $this->load->view('template/adminfooter_category');

}

public function award_list_for_knockout()
{
   

    $set_id=$this->uri->segment(3);

    $data['rank_data'] = $this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('manage_knowledge/award_table_view_for_knockout',$data);
    $this->load->view('template/adminfooter_category');

}
public function award_claim_list()
{
   

    $set_id=$this->uri->segment(3);

    $data['rank_data'] = $this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['claim_data'] = $this->common_model->common($table_name = 'tbl_claim_award', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



     $data['active']="knowledge";
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_knowledge/award_claim_list_view',$data);
    $this->load->view('template/adminfooter_category');

}
		
	
function change_to_approve()
{
    
        $ids=$this->input->post('id');
        $status=$this->input->post('status');
        $data=array('status'=>$status);


        for($i=0;$i<count($ids);$i++)
        {
            $id=$ids[$i];
            $this->db->where('claim_id',$id);

            if($this->db->update('tbl_claim_award',$data))
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

function change_to_approve_refund()
{
    
        $ids=$this->input->post('id');
        $status=$this->input->post('status');
        $data=array('status'=>$status);


        for($i=0;$i<count($ids);$i++)
        {
            $id=$ids[$i];
            $this->db->where('claim_id',$id);

            if($this->db->update('tbl_claim_refund',$data))
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

public function get_know_time()
{
     $exam_time=$this->input->post('time');
     $exam_date=$this->input->post('date');
     $test_type=$this->input->post('test_type');



 $sets=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('test_type'=>3,'exam_date'=>$exam_date,'exam_time'=>$exam_time), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
if(count($sets)>0){
    echo "1";
}


}


public function refund_claim_list()
{
   

    $set_id=$this->uri->segment(3);

    $data['rank_data'] = $this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['claim_data'] = $this->common_model->common($table_name = 'tbl_claim_refund', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


     $data['active']="knowledge";
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_knowledge/refund_claim_list_view',$data);
    $this->load->view('template/adminfooter_category');

}

 function add_next_level()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        
        $data['parent_exam_type']= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$set_id=$this->uri->segment(3);

$data['level'] = $this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$next_level= $this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('level'=>'desc'), $start = '', $end = '');

$level_id=@$next_level[0]->level_id;

  $total_reg_user= $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   
        
     $n=count($total_reg_user);   
      
     // echo count($total_reg_user); exit;


     $next_level_stu=($n*25)/100; 

if($next_level_stu<1){
   $next_level_stu=1; 
}


$data['enroll_details']=$this->common_model->common($table_name='tbl_user_rank',$field = array(),$where=array('set_id'=>$set_id,'level_id'=>$level_id),$where_or=array(),$like=array(),$like_or=array(),$order=array('rank_index'=>'desc'),$start='0',$end=round($next_level_stu)); 

        $data['active']="knockout";
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
        $this->load->view('manage_knowledge/knockout_nextlevel_add_view',$data);
        $this->load->view('template/adminfooter_category');
    }


public function next_level_list()
{
   

$set_id=$this->uri->segment(3);

$data['level'] = $this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$next_level= $this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('level'=>'desc'), $start = '', $end = '');

$level_id=@$next_level[0]->level_id;
  
  $total_reg_user= $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   
        
     $n=count($total_reg_user);   
        
     $data['next_level_stu']=($n*25)/100; 




    $data['active']="knockout";
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_knowledge/next_level_table',$data);
    $this->load->view('template/adminfooter_category');

}

function nxt_lvl_enrolled_user()
{
    $kq_id=$this->uri->segment(3);
    $level_id=$this->uri->segment(4);

     $data['level_details']= $this->common_model->common($table_name='tbl_knockout_level', $field = array(), $where = array('set_id'=>$kq_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

if($data['level_details'][0]->level==1){

      $data['enroll_details']= $this->common_model->common($table_name='tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$kq_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 
}else{



//      $total_reg_user= $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   
        
//      $n=count($total_reg_user);   
      
//      // echo count($total_reg_user); exit;


//      $next_level_stu=($n*25)/100; 

// if($next_level_stu<1){
//    $next_level_stu=1; 
// }


// $data['enroll_details']=$this->common_model->common($table_name='tbl_user_rank',$field = array(),$where=array('set_id'=>$kq_id,'level_id'=>$level_id),$where_or=array(),$like=array(),$like_or=array(),$order=array('rank_index'=>'desc'),$start='0',$end=round($next_level_stu)); 

    $data['enroll_details']=$this->common_model->common($table_name='tbl_student_knockout_level
',$field = array(),$where=array('set_id'=>$kq_id,'level_id'=>$level_id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end=''); 
}

 

     // print_r($data['enroll_details']); exit;

  

     $data['active']="knockout";
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_knowledge/nxt_lvl_enrolled_user_table_view',$data);
    $this->load->view('template/adminfooter_category');
}


function nxt_lvl_qualified_user()
{
    $kq_id=$this->uri->segment(3);
    $level_id=$this->uri->segment(4);

     $data['level_details']= $this->common_model->common($table_name='tbl_knockout_level', $field = array(), $where = array('set_id'=>$kq_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




    $total_reg_user=$this->common_model->common($table_name='tbl_user_rank
',$field = array(),$where=array('set_id'=>$kq_id,'level_id'=>$level_id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end=''); 

 $n=count($total_reg_user);   
      
     // echo count($total_reg_user); exit;


     $next_level_stu=($n*25)/100; 

if($next_level_stu<1){
   $next_level_stu=1; 
}

 $data['enroll_details']=$this->common_model->common($table_name='tbl_user_rank
',$field = array(),$where=array('set_id'=>$kq_id,'level_id'=>$level_id),$where_or=array(),$like=array(),$like_or=array(),$order=array('rank_index'=>'desc'),$start='0',$end=round($next_level_stu)); 

   

     $data['active']="knockout";
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_knowledge/nxt_lvl_enrolled_user_table_view',$data);
    $this->load->view('template/adminfooter_category');
}



public function create_next_level()
{

$user_id= get_cookie('session_user_id');
$set_id=$this->input->post('set_id');

$exam_date=$this->input->post('exam_date');

// echo $exam_date;exit;

$exam_time=$this->input->post('exam_time');

$current_date=date('Y-m-d H:i:s');







$next_level= $this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('level'=>'desc'), $start = '', $end = '');

$level_id=@$next_level[0]->level_id;
  
  $total_reg_user= $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   
        
     $n=count($total_reg_user);   
        
    
     $next_level_stu=($n*25)/100; 

if($next_level_stu<1){
   $next_level_stu=1; 
}

$enroll_details=$this->common_model->common($table_name='tbl_user_rank',$field = array(),$where=array('set_id'=>$set_id,'level_id'=>$level_id),$where_or=array(),$like=array(),$like_or=array(),$order=array('rank_index'=>'desc'),$start='0',$end=round($next_level_stu)); 




$set_details = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$data['level'] = $this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('level'=>'DESC'), $start = '', $end = '');

$level=@$data['level'][0]->level;
$level_id=@$data['level'][0]->level_id;

$test_type=$set_details[0]->test_type;
$sub_name=$set_details[0]->subject_id;
$qstn_qty=@$set_details[0]->q_qty;
   

    $data_next_level=array(
                            'level' =>$level+1,
                            'set_id'=>$set_id,
                            'created_on'=>$current_date,
                            'created_by'=>$user_id
                           );

$this->db->insert('tbl_knockout_level', $data_next_level);
$last_level_id=$this->db->insert_id();
     
for ($i=0; $i <round($next_level_stu); $i++) { 

    $student_data=array(
                            'level_id' =>$last_level_id,
                            'set_id'=>$set_id,
                            
                            'user_id'=>$enroll_details[$i]->user_id,
                            'created_date'=>$current_date
                           );


$this->db->insert('tbl_student_knockout_level', $student_data);

@$user_id=@$enroll_details[$i]->user_id;

$user_details = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$set_details = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



@$uname=@$user_details[0]->user_name;
@$mobileNumber = @$user_details[0]->login_mob;
@$set_name=@$set_details[0]->set_name;


$senderId = "URSFRM";

$msg="Congratulation! Dear ".$uname.", You are qualified for the next level of knockout test: ".$set_name." Please Login to your dashboard and check .  https://www.nirnayakfinder.com/";
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=".$senderId."&route=4&mobiles=".$mobileNumber."&authkey=248190AoE9UD3CV5bf3b533&encrypt=&message=".$msg,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

}





   
  $data_qs= $this->custom_model->get_question_by_type_subject($test_type,$sub_name);    

        shuffle($data_qs);
        $start=0;
        $limit=count($data_qs)-1;
        $indx_arr=$this->random_generator($start,$limit,$qstn_qty);

        for($i=0;$i<count($indx_arr);$i++)
        {
            $indx=$indx_arr[$i];
            $data_dtls=array(

                'set_id'    =>$set_id,
                'que_id'    =>$data_qs[$indx]->id,
                'level_id'  =>$last_level_id,
                'created_by'=>$user_id,
                'created_on'=>$current_date

            );
            $this->db->insert('tbl_knowledge_quiz_set_dtls',$data_dtls);
        }

$new_data_set= array(
                'exam_time_for_knockout_next_level' =>$exam_time,
                'exam_date_for_knockout_next_level'=> date('Y-m-d', strtotime($exam_date))
                  );

$this->db->where('kq_id',$set_id);
$this->db->update('tbl_knowledge_qiuz_set',$new_data_set);

//      $total_reg_user= $this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   
        
//      $n=count($total_reg_user);   
        
//      $next_level_stu=($n*25)/100; 



// if($level==1){


// $rank_for_next= $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>""), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '0', $end = $next_level_stu); 



//      for ($i=0; $i <$next_level_stu ; $i++) { 
      
//       $next_id= $rank_for_next[$i]->user_id;

// $data_array=array('level_id' =>$last_level_id);

// $this->db->where('user_id'=>$next_id);
// $this->db->update('tbl_user_rank',$data_array);
//      }

// }else{

//   $total_reg_user= $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   
        
//      $n=count($total_reg_user);   
        
//      $next_level_stu=($n*25)/100; 



// $rank_for_next= $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '0', $end = $next_level_stu); 



//      for ($i=0; $i <$next_level_stu ; $i++) { 
      
//       $next_id= $rank_for_next[$i]->user_id;

// $data_array=array('level_id' =>$last_level_id);

// $this->db->where('user_id'=>$next_id);
// $this->db->update('tbl_user_rank',$data_array);
// }
// }

  $this->session->set_flashdata('succ_msg',' Set created for Next Level successfully..');
        redirect('index.php/manage_knowledge/next_level_list/'.$set_id.'/'.'knockout','refresh');
}


 function winner_view()
    {
        if(get_cookie('session_user_id')!='')
        {
            $user_id= get_cookie('session_user_id');
        }
        else{
            redirect('index.php/login','refresh');
        }
        
        

$set_id=$this->uri->segment(3);

$data['level'] = $this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$next_level= $this->common_model->common($table_name = 'tbl_knockout_level', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('level'=>'desc'), $start = '', $end = '');

$level_id=@$next_level[0]->level_id;

  $total_reg_user= $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   
        
     $n=count($total_reg_user);   
      
     // echo count($total_reg_user); exit;


     $next_level_stu=($n*25)/100; 

if($next_level_stu<1){
   $next_level_stu=1; 
}


$data['enroll_details']=$this->common_model->common($table_name='tbl_user_rank',$field = array(),$where=array('set_id'=>$set_id,'level_id'=>$level_id),$where_or=array(),$like=array(),$like_or=array(),$order=array('rank_index'=>'desc'),$start='0',$end=round($next_level_stu)); 

        $data['active']="knockout";
   
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_leftmenu',$data);
        $this->load->view('manage_knowledge/knockout_testwinner_view',$data);
        $this->load->view('template/adminfooter_category');
    }




    public function generate_award_for_knockout()
{


   $set_id=$this->uri->segment(3);
   $reg_fees=$this->uri->segment(4);
$level_id=$this->uri->segment(5);

   $total_examinee=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

if(count($total_examinee)==1){

$award='refund';
    
  $rank_knw_data = $this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $data_award=array( 
                      'set_id' =>$set_id,
                      'user_id'=>@$rank_knw_data[0]->user_id,
                      'award_amount'=>$award,
                      'created_on'=>date('Y-m-d H:i:s'),
                      'created_by'=>get_cookie('session_user_id'));

   $this->db->insert('tbl_user_award',$data_award);   
}

 if(count($total_examinee)>1 && count($total_examinee)<=4){

    $award=$reg_fees*1.5;

$rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '0', $end = '1');
 }


 if(count($total_examinee)>4 || count($total_examinee)<1000){

    $award=(20*$reg_fees*count($total_examinee))/100;

   $rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '0', $end = '1');

 }


if(count($total_examinee)>1000){

    $award=(30*$reg_fees*count($total_examinee))/100;

   $rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$set_id,'level_id'=>$level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '0', $end = '1');
 }


for ($i=0; $i <count($rank_indexing_data) ; $i++) { 

$data_award=array(
                  'set_id'=>$set_id,
                  'user_id'=>@$rank_indexing_data[$i]->user_id,
                  'award_amount'=>$award,
                  'created_on'=>date('Y-m-d H:i:s'),
                  'created_by'=>get_cookie('session_user_id'));

   $this->db->insert('tbl_user_award',$data_award); 
}

$this->session->set_flashdata('succ_msg','Award created successfully');
redirect('index.php/manage_knowledge/next_level_list/'.$set_id.'/'.'knockout','refresh');
}

public function test_questionlist()
{
     $id=$this->uri->segment(3);
     if($id!='')
     {
            $data['question_list']= $this->custom_model->get_testquestion_list($id);
            /*echo '<pre>';
            print_r($data['question_list']);*/

            $data['active']="knowledge";
    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu',$data);
    $this->load->view('manage_knowledge/view_question_table_view',$data);
    $this->load->view('template/adminfooter_category');
     }
     else{
        echo "Invalid link.";
     }
}


		
}




