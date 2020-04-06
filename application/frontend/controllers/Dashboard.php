<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

          $this->load->library('datalist');


          @$this->load->library('dompdf_gen');
         // $this->load->library('m_pdf');
           $this->load->helper('download');



	 }

	 public function export_student_list()
	 {
	 	$get_branch_id= $this->input->get('excelbatch_id');
	 	$active_usr=$this->session->userdata('activeuser');
	 	$user_details= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



	 	$batch_list= $this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array('batch_status'=>'active','batch_id'=>$get_branch_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	 	$user_type_id= $user_details[0]->user_type_id;


if($get_branch_id=='')
{
$batch_name='all batches report';
}
else{
	$batch_name= $batch_list[0]->batch_name;
}
	 	 

	 	$newbatch_name= str_replace(' ', '-', $batch_name);

	 	$currdat= date('Ymd');
	 	$filename=$currdat.'-'.$newbatch_name;


if($user_type_id==4){
	if($get_branch_id=='')
	{
		$total_student_list= $this->common_model->get_all_student_of_partner($active_usr);
	}
	else{
		$total_student_list= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>2,'batch_id'=>$get_branch_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	}

	
}
else{

	
		$total_student_list= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>2,'batch_id'=>$get_branch_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	

}
	 	

	 	header("Content-type: text/csv");
  		header("Content-Disposition: attachment; filename=batch-".$filename.".csv");

          

          $output = fopen('php://output', 'w');

          fputcsv($output, array('SL No.','Batch','Full Name','User Code','Email Id','Contact No.','Test attempted'));

          $count=0;

          foreach($total_student_list as $res)
          {
             $count++;

             /*$get_total_exam= $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>$res->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');*/

             $get_total_exam= $this->common_model->get_all_exam_details($res->id);

                    $get_batch_details= $this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array('batch_id'=>$res->batch_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $get_city_details= $this->common_model->common($table_name = 'cities', $field = array(), $where = array('id'=>$res->city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
            
           
              


  fputcsv($output, array(

        "SL No."=>$count,
        "Batch" => $get_batch_details[0]->batch_name, 
        "Full Name" => $res->user_name,
        "User Code"=>$res->user_code,
        "Email Id"=>$res->login_email,
        'Contact No.' =>$res->login_mob,
        'Test attempted' =>count($get_total_exam)
       
       
        ));

          }




	 }
	
	public function index()
	{
		
   			
   			
		$active_usr=$this->session->userdata('activeuser');
		$get_branch_id= $this->input->get('batch_id');
		if($active_usr=='')	
		{
			redirect(base_url());
		}
		else
		{

			$user_id=$active_usr;


			$user_details= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$exam_date_expired='N';
		$curr_date= date('Y-m-d');




		$exam_expiry= $user_details[0]->expiry_date;
		if($exam_expiry!='')
		{
				if($exam_expiry<$curr_date)
				{
					$exam_date_expired='Y';
				}
				else{
					$exam_date_expired='N';
				}
		}
			$data['exam_date_expired']=$exam_date_expired;

			$data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		     $data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		      $data['address']= $this->common_model->common($table_name = 'tbl_address', $field = array(), $where = array('user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


			$data['attempted_exam_list']= $this->common_model->get_all_exam_details($user_id);

		if($data['user'][0]->user_type_id==3)
		{
			$data['attempted_exam_list']= $this->common_model->get_all_exam_details_by_principal();

			$data['batch_list']= $this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array('batch_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			if($get_branch_id!='')
			{
				$data['total_student_list']= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>2,'batch_id'=>$get_branch_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			}
			else{
				$data['total_student_list']= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>2), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			}

			$data['get_branch_id']=$get_branch_id;

			

				$this->load->view('common/header');
				$this->load->view('dashboard_principal',$data);
				$this->load->view('common/dash_footer',$data);
		}

		else if($data['user'][0]->user_type_id==4)
		{
			$data['attempted_exam_list']= $this->common_model->get_all_exam_details_by_principal();

			$data['batch_list']= $this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array('batch_status'=>'active','faculty_id'=>$active_usr), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			if($get_branch_id!='')
			{
				$data['total_student_list']= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_type_id'=>2,'batch_id'=>$get_branch_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			}
			else{
				$data['total_student_list']= $this->common_model->get_all_student_of_partner($active_usr);
			}

			

			$data['get_branch_id']=$get_branch_id;

				$this->load->view('common/header');
				$this->load->view('dashboard_partner',$data);
				$this->load->view('common/dash_footer',$data);
		}

		else{

				$this->load->view('common/header');
				$this->load->view('dashboard',$data);
				$this->load->view('common/dash_footer',$data);

		}

			

			
				
		}
      

     
	}
	
	public function get_student_exam()
	{
		$student_id= $this->uri->segment(2);

		$active_usr=$this->session->userdata('activeuser');
		if($active_usr=='')	
		{
			redirect(base_url());
		}
		else{
			$user_id= $active_usr;
			if($student_id=='')
			{
				redirect($this->url->link(93),'refresh');
			}
			else{

				  $data['user']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
				   $data['studentdetails']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$student_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				  $data['attempted_exam_list']= $this->common_model->get_all_exam_details($student_id);

				  $data['student_id']=$student_id;

				  $this->load->view('common/header');
				$this->load->view('studentdashboard',$data);
				$this->load->view('common/dash_footer',$data);

			}
		}

	}

public function download_csv()
{
	$active_usr=$this->session->userdata('activeuser');
		if($active_usr=='')	
		{
			redirect(base_url());
		}
		else
		{

		$user_id=$this->uri->segment(2);

		$mail_data['userArray']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$student_name= $mail_data['userArray'][0]->user_name;
			$student_name= str_replace(' ', '-', $student_name);
			$currentdata= date('Ymd');

			$filenae=$currentdata.'-'.$student_name;


		$attempted_exam_list= $this->common_model->get_all_exam_details($user_id);



				header("Content-type: text/csv");
  header("Content-Disposition: attachment; filename=".$filenae.".csv");

          

          $output = fopen('php://output', 'w');

          fputcsv($output, array('SL No.','Candidate Name','Date & Time','Test','Subject','Total Questions','Question Attempted','Marks','%'));

          $count=0;
          
          foreach($attempted_exam_list as $res)
          {
             $count++;
            
           

         $get_userdetail= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$res->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $get_setdetail= $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$res->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  $setSlug= @$get_setdetail[0]->set_slug;
                  $setname= @$get_setdetail[0]->set_name;
                   $exam_id= @$get_setdetail[0]->exam_id;
                   $sub_id= @$get_setdetail[0]->subject_id;

                    $get_examdetail= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                     $get_subdetail= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                   $examchapter_id= $res->chap_id;
                  $testselectType= $res->test_select_type;

                  if($examchapter_id>0)
                  {
                    $chapter_details= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>$examchapter_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                    $chapterName= @$chapter_details[0]->chap_name;
                  }
                  else{
                    $chapterName='';
                  }

                $totalmarks= $res->total_marks; 
                $obtainedMarks= $res->obtained_marks;
				$percentage= round(($obtainedMarks/$totalmarks)*100);
              


  fputcsv($output, array(

        "SL No."=>$count,
        "Candidate Name" => $get_userdetail[0]->user_name, 
        "Date & Time" => date('d/m/Y H:i:s', strtotime($res->start_time)),
        "Test"=>@$get_examdetail[0]->exam_name.': '.$setname,
        "Subject"=>@$get_subdetail[0]->section_name,
        'Total Questions' =>round($res->q_qty),
        
        'Question Attempted'=>round($res->attempt_count),
       
        'Marks' =>round($res->obtained_marks),
        '%'=>$percentage
       
        ));

          }

		
		

			

			
				
		}
}





public function download_student_details_pdf()
{
	

	         $active_usr=$this->session->userdata('activeuser');
            
          // $active_usr=$this->uri->segment(3);

         //  echo $active_usr;exit;
		if($active_usr=='')	
		{
			redirect(base_url());
		}
		else
		{

			$user_id=$active_usr;

		

			$mail_data['userArray']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$student_name= $mail_data['userArray'][0]->user_name;
			$student_name= str_replace(' ', '-', $student_name);
			$currentdata= date('Ymd');


			$mail_data['attempted_exam_list']= $this->common_model->get_all_exam_details($user_id);



         }

          $invoice_no= $currentdata.'-'.$student_name;

 




      $this->load->view('mail_template/student_details',$mail_data); 
 
     $html = $this->output->get_output();

    // echo $html;exit;

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper('A4', 'portrait');
    $dompdf->render();
    $output = $dompdf->output();
            
    $i = $invoice_no;
    $file_to_save = 'assets/uploads/invoice/'.$i.'.pdf';
    file_put_contents($file_to_save,$output);

    $data_file = file_get_contents($file_to_save);
        
    $name = $i.'.pdf';
    force_download($name,$data_file);





                 

 }

public function download_details_pdf()
{
	
            


           $active_usr=$this->uri->segment(3);

         //  echo $active_usr;exit;
		if($active_usr=='')	
		{
			redirect(base_url());
		}
		else
		{

			$user_id=$active_usr;

		

			

$mail_data['userArray']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			$mail_data['attempted_exam_list']= $this->common_model->get_all_exam_details($user_id);

			$student_name= $mail_data['userArray'][0]->user_name;
			$student_name= str_replace(' ', '-', $student_name);
			$currentdata= date('Ymd');



         }

          $invoice_no= $currentdata.'-'.$student_name;

 





      $this->load->view('mail_template/student_details',$mail_data); 
 
     $html = $this->output->get_output();

    // echo $html;exit;

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper('A4', 'portrait');
  

    $dompdf->render();
    $output = $dompdf->output();
            
    $i = $invoice_no;
    $file_to_save = 'assets/uploads/invoice/'.$i.'.pdf';
    file_put_contents($file_to_save,$output);

    $data_file = file_get_contents($file_to_save);
        
    $name = $i.'.pdf';
    force_download($name,$data_file);

}

}
?>