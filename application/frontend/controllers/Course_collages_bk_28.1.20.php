<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Course_collages extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   $pageSlug= $this->uri->segment(1);
   $get_route_id= $this->common_model->common($table_name = 'app_routes', $field = array(), $where = array('slug'=>$pageSlug), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   $pageId= @$get_route_id[0]->id;



     $data['pageContent'] = $this->common_model->common($table_name = 'tbl_page_manage', $field = array(), $where = array('routes_id'=>$pageId), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     $data['corseList']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('status'=>'Active','exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $data['partner_details'] = $this->common_model->common($table_name = 'tbl_partner', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
   

	
		$this->load->view('common/header');
		$this->load->view('course_collages_view',$data);
		$this->load->view('common/footer');
	}

	public function course_exams()
	{
		
   $course_id= $this->uri->segment(2);
   if($course_id!='')
   {
   		 $data['courseDetails'] =$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$course_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     $exam_level=$this->common_model->common($table_name = 'tbl_exam_level', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $data['partner_details'] = $this->common_model->common($table_name = 'tbl_partner', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  $examLevel=array();

  foreach($exam_level as $key=>$row)
  {
  		$row_id= $row->id;
  		$get_exam=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>$course_id,'exam_level_id'=>$row_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $$end = '');
  		if(count($get_exam)>0)
  		{
  			$is_exam='Y';
  		}
  		else{
  			$is_exam='N';
  		}
  		$rowarray['level_id']=$row->id;
  		$rowarray['key']=$key+1;
  		$rowarray['level_name']=$row->exam_level;
  		$rowarray['exams']=$get_exam;
  		$rowarray['is_exam']=$is_exam;
  		array_push($examLevel, $rowarray);


  }

  $data['examLevel']=$examLevel;

	
		$this->load->view('common/header');
		$this->load->view('course_exam_view',$data);
		$this->load->view('common/footer');
   }
   else{
   	redirect(base_url(),'refresh');
   }

    
	}

	public function exam_details()
	{
		
   $exam_id= $this->uri->segment(2);

   if($exam_id!='')
   {
   		$data['exam_details']= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   $data['exam_institute']= $this->common_model->common($table_name = 'tbl_course_institute', $field = array(), $where = array('examination_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $data['exam_info']= $this->common_model->common($table_name = 'tbl_exam_info', $field = array(), $where = array('exam_type_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $get_institute_level= $this->common_model->common($table_name = 'tbl_institute_level', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    

     $instituLevel=array();
     foreach($get_institute_level as $row)
     {
     	$inst_level=$row->id;
     	$get_institutes= $this->common_model->get_parti_institute($inst_level, $exam_id);

     	if(count($get_institutes)>0)
     	{
     		$avail_inst='Y';
     	}
     	else{
     		$avail_inst='N';
     	}
     	$rowarray['level_name']=$row->institute_level;
     	$rowarray['level_id']=$inst_level;
     	$rowarray['avail_inst']=$avail_inst;
     	$rowarray['get_institutes']=$get_institutes;

     	array_push($instituLevel, $rowarray);


     }

     $data['instituLevel']=$instituLevel;


    

	
		$this->load->view('common/header');
		$this->load->view('exam_details_view',$data);
		$this->load->view('common/footer');
   }
   else{
   	redirect(base_url(),'refresh');
   }

   
	}

	public function institute_details()
	{
		
   		$institute_id= $this->uri->segment(2);

   		if($institute_id!='')
   		{
   				$data['institute_details'] = $this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array('id'=>$institute_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    	 			$data['institute_info'] = $this->common_model->common($table_name = 'tbl_institute_info', $field = array(), $where = array('institute_id'=>$institute_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    	 			if(count($data['institute_details'])>0)
    	 			{
    	 					$this->load->view('common/header');
							$this->load->view('institute_details_view',$data);
							$this->load->view('common/footer');
    	 			}
    	 			else{
    	 				redirect(base_url(),'refresh');
    	 			}
	
		
   		}
   		else{
   			redirect(base_url(),'refresh');
   		}
    	
    	 
	}
	
	


	
}
?>