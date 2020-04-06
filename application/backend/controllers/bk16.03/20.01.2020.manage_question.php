<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_question extends CI_Controller {
	
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
  $this->load->library('excel');
  $this->load->model('set_model');
  $this->load->helper('download');
  $this->load->helper('url');

		
}


function create_slug($string)
  {     
        $replace = '-';         
        $string = strtolower($string);     
 
        //replace / and . with white space     
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

public function view()
{
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

$user_id= $this->session->userdata('session_user_id');

  $data['user_list']=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$user_type_id=$data['user_list'][0]->user_type_id;

if($user_type_id==6){
	$data['question_list']=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('created_by'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');

  }else{
    $data['question_list']=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');
  }
  
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('question/question_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
}



public function exceldataadd() {  

  if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

    $upload_type= $this->input->post('upload_type');

    if($upload_type=='Reset')
    {
      $this->db->truncate('tbl_questions');
      $this->db->truncate('tbl_question_choice');
      $this->db->truncate('tbl_question_test_type');
    }

         $configUpload['upload_path'] = '../assets/uploads/excel/';

         $configUpload['allowed_types'] = 'xls|xlsx|csv';
         $configUpload['max_size'] = '5000';
         $this->load->library('upload', $configUpload);
         $this->upload->do_upload('qfile');  
         $upload_data = $this->upload->data(); 
         $file_name = $upload_data['file_name']; //uploded file name
        $extension=$upload_data['file_ext'];    // uploded file extension
    
 
 $objReader= PHPExcel_IOFactory::createReader('Excel2007'); // For excel 2007     
          //Set to read only
          $objReader->setReadDataOnly(true);      
        //Load excel file
     $objPHPExcel=$objReader->load('../assets/uploads/excel/'.$file_name);    
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0); 
         
         $current_date=date('Y-m-d H:i:s');


          for($i=2;$i<=$totalrows;$i++)
          {
              $question= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();     
           
              $subject= $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
              $exam= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
              $chapter= $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
              $test_type= $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
              $group_id= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
              $option1= $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
              $answer1= $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
              $option2= $objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
              $answer2= $objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
              $option3= $objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
              $answer3= $objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
              $option4= $objWorksheet->getCellByColumnAndRow(12,$i)->getValue();
              $answer4= $objWorksheet->getCellByColumnAndRow(13,$i)->getValue();
              $marks=1;
              $explaination=$objWorksheet->getCellByColumnAndRow(14,$i)->getValue();

        

              $test_type_arr=@explode(',',$test_type);


              if($question!='')
              {
                  $data_user=array(
                                      'question'=>$question,
                                      'section_id'=>$subject,
                                      'exam_id'=>$exam,
                                      'chap_id'=>$chapter,
                                      'marks'=>$marks,
                                      'explanation'=>$explaination,
                                      'created_on'=>$current_date, 
                                      'created_by'=>$user_id
                                      );
        
                              $this->db->insert('tbl_questions',$data_user);
                              $last_id = $this->db->insert_id();

 if($option1!='' && $answer1!='')
    {
                      $data_ans_array=array(

                                    'choice'=>$option1,
                                     'que_id'=>$last_id,
                                      'is_correct'=>$answer1,
                                      'created_by'=>$user_id,
                                        'created_on'=>$current_date, 
               
                                       );
                      $this->db->insert('tbl_question_choice',$data_ans_array);
                  }
if($option2!='' && $answer2!='')
   {
                      $data_ans_array=array(

                                    'choice'=>$option2,
                                     'que_id'=>$last_id,
                                      'is_correct'=>$answer2,
                                      'created_by'=>$user_id,
                                        'created_on'=>$current_date, 
               
                                       );
                      $this->db->insert('tbl_question_choice',$data_ans_array);
                  }
  if($option3!='' && $answer3!='')
      {
                      $data_ans_array=array(

                                    'choice'=>$option3,
                                     'que_id'=>$last_id,
                                      'is_correct'=>$answer3,
                                      'created_by'=>$user_id,
                                        'created_on'=>$current_date, 
               
                                       );
                      $this->db->insert('tbl_question_choice',$data_ans_array);
                  }

   if($option4!='' && $answer4!='')
      {
                      $data_ans_array=array(

                                    'choice'=>$option4,
                                     'que_id'=>$last_id,
                                      'is_correct'=>$answer4,
                                      'created_by'=>$user_id,
                                        'created_on'=>$current_date, 
               
                                       );
                      $this->db->insert('tbl_question_choice',$data_ans_array);
                  }


                        for($j=0; $j<count($test_type_arr); $j++)
                        {
                              $data_array=array(

                                  'question_id'=>$last_id,
                                  'test_type'=>$test_type_arr[$j],
                                  'created_by'=>$user_id,
                                  'created_on'=>$current_date
                   
                                  );

                          //print_r( $data_array);exit;
                          $this->db->insert('tbl_question_test_type',$data_array);
                        }
                 
              
      

        
              
              
          }
         }
             @unlink('../assets/uploads/excel/'.$file_name); //File Deleted After uploading in database .       
             redirect('index.php/manage_question/view/','refresh');
             
       
     }


     function multi_select_delete()
    {
                $q_ids=$this->input->post('id');
                for($i=0;$i<count($q_ids);$i++)
                  {
                    $id=$q_ids[$i];

                      $this->db->where('id', $id);
                      $this->db->delete('tbl_questions');

                      $this->db->where('que_id', $id);
                      $this->db->delete('tbl_question_choice');

                      $this->db->where('question_id', $id);
                      $this->db->delete('tbl_question_test_type');

     


                    }

                    $result=1;
                    echo json_encode(array('result'=>$result));

}


     function single_question_insert()
     {
      
          if($this->session->userdata('session_user_id')!='')
        {
          $user_id= $this->session->userdata('session_user_id');
        }
        else{
          redirect('index.php/login','refresh');
        }

        $current_date=date('Y-m-d H:i:s');
         $exam_type=$this->input->post('exam_type');
        $exam_id=$this->input->post('exam_id');
        $section_id=$this->input->post('question_type');
        $chapter_name=$this->input->post('chapter_name');
        $test_type_practice=$this->input->post('test_type');
        // print_r($test_type_practice);exit;
        $explanation=$this->input->post('explanation');


          $option = $this->input->post('option');
          $answer = $this->input->post('answer');

          $question=$this->input->post('question');

           $marks = $this->input->post('marks');
           $neg_mark = $this->input->post('neg_mark');
           $time = $this->input->post('time');

          $data_array=array(

              'question'=>$question,
              'section_id'=>$section_id,
              'exam_id'=>$exam_id,
              'chap_id'=>$chapter_name,
              'explanation'=>$explanation,
              'created_on'=>$current_date, 
              'marks'=>$marks,
              'neg_mark'=>$neg_mark,
              'time'=>$time,
              'created_by'=>$user_id

            );

        // echo '<pre>'; print_r($data_array); exit;

          $this->db->insert('tbl_questions',$data_array);
          $insert_que_id = $this->db->insert_id();

          for($i=0;$i<count($option);$i++)
          {
            if($option[$i]!='' && $answer[$i]!='')
            {
            $data_ans_array=array(

                'choice'=>$option[$i],
                'que_id'=>$insert_que_id,
                'is_correct'=>$answer[$i],
                'created_by'=>$user_id,
                'created_on'=>$current_date, 
               


              );
            $this->db->insert('tbl_question_choice',$data_ans_array);
            }
          }


          // if(@$test_type_practice[0]!='')
          // {
          //    $test_type=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            



          // }
          // else
          // {
          //   $test_type=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_status'=>'active','test_id !='=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
          // }


           for($j=0;$j<count($test_type_practice);$j++)
             
                  {
                     
                          $data_array=array(

                            'question_id'=>$insert_que_id,
                            'test_type'=>$test_type_practice[$j],
                            'created_by'=>$user_id,
                            'created_on'=>$current_date
                   
                          );

                          //print_r( $data_array);exit;
                          $this->db->insert('tbl_question_test_type',$data_array);
                        
                  }


$usr_type=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_type_id=@$usr_type[0]->user_type_id;
if(@$user_type_id=='6'){

$price_for_subadmin=$this->common_model->common($table_name = 'tbl_subadmin_question_price
', $field = array(), $where = array('exam_group_name'=>$exam_type,'exam_name'=>$exam_id,'subject_name'=>$section_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

@$price_per_question=@$price_for_subadmin[0]->question_price;



           $sub_admin_data=array(

                                'exam_group_id'=>$exam_type,
                                'exam_name_id'=>$exam_id,
                                'subject_id'=>$section_id,
                                'question_id'=>$insert_que_id,
                                'price_per_question'=>@$price_per_question,
                                'added_price'=>@$price_per_question,
                                'created_year'=>date('Y'),
                                'created_month'=>date('m'),
                                'created_date'=>date('d'),
                                'created_by'=>$user_id
                              
                                );
// print_r($sub_admin_data);
            $this->db->insert('tbl_subadmin_question_add_report',$sub_admin_data);
}
    


          
      


           redirect('index.php/manage_question/view/','refresh');

     }



    function add()
    {
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else
    {
			redirect('index.php/login','refresh');
		}
    	

    $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('question/question_add_view');
		$this->load->view('template/adminfooter_category');
    }

    function single_add()
    {
      if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }
     $data['type']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o','status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 
     //$data['section']=$this->admin_model->selectAll('tbl_question_section');
     $data['section']=$this->admin_model->selectOne('tbl_question_section','section_status','active'); 
     $data['passage']=$this->admin_model->selectAll('tbl_passage');

     $data['test_type']=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_status'=>'active','test_id'=>'1'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('question/question_singleadd_view',$data);
    $this->load->view('template/adminfooter_category');

    }


    function single_edit()
    {
      if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

     $edit_id = $this->uri->segment(3);
     $data['edit_single_ques'] = $this->admin_model->selectOne('tbl_questions','id',$edit_id);


     $data['type']=$this->admin_model->selectOne('tbl_exam_type','exam_type_id','o'); 
     //$data['section']=$this->admin_model->selectAll('tbl_question_section');
     $data['section']=$this->admin_model->selectOne('tbl_question_section','section_status','active');
     $data['passage']=$this->admin_model->selectAll('tbl_passage');

     $data['chapter']=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


     $data['test_type']=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


      $data['question_test_type']=$this->common_model->common($table_name = 'tbl_question_test_type', $field = array(), $where = array('question_id'=>$edit_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

       //$data['selected_test_type']=$this->common_model->common($table_name = 'tbl_question_test_type', $field = array(), $where = array('question_id'=>$edit_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('question/question_singleedit_view',$data);
    $this->load->view('template/adminfooter_category');

    }

    function single_question_update()
     {
        if($this->session->userdata('session_user_id')!='')
        {
          $user_id= $this->session->userdata('session_user_id');
        }
        else{
          redirect('index.php/login','refresh');
        }


        $edit_id = $this->input->post('edit_id');       
        $chk_pass = $this->admin_model->selectOne('tbl_questions','id',$edit_id);         
        $psg_id = @$chk_pass[0]->passage_id;

        $current_date=date('Y-m-d H:i:s');
        $exam_id=$this->input->post('exam_id');
        $section_id=$this->input->post('question_type');
        $explanation=$this->input->post('explanation');

        $test_type=$this->input->post('test_type');
          $marks = $this->input->post('marks');
           $neg_mark = $this->input->post('neg_mark');
           $time = $this->input->post('time');
        /*if($psg_id!='' || $section_id==3)
        {
          //echo 'exit'; exit;
          $chk_pass_ques = $this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('passage_id'=>$psg_id,'exam_id'=> $exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
          //
          //echo '<pre>'; print_r($chk_pass_ques); exit;
          for($k=0;$k<count($chk_pass_ques);$k++)
          {
            $qs_id = $chk_pass_ques[$k]->id;
            $this->db->where('que_id',$qs_id);
            $this->db->delete('tbl_question_choice');
          }
          $this->db->where('passage_id',$psg_id);
          $this->db->where('exam_id',$exam_id);
          $this->db->delete('tbl_questions');

          

          $question=$this->input->post('questn');
          $passage=$this->input->post('passage_id');
          for($i=0;$i<count($question);$i++)
          {

            $option = $this->input->post('option_'.$i);
            $answer = $this->input->post('answer_'.$i);

            //echo '<pre>'; print_r($option); exit;

            if($question[$i]!='')
            {
                $data_array=array(
                'question'=>$question[$i],
                'section_id'=>$section_id,
                'exam_id'=>$exam_id,
                'passage_id'=>$passage,
                'marks'=>'1',
                'explanation'=>$explanation,
                'created_on'=>$current_date, 
                'created_by'=>$user_id


              );
            $this->db->insert('tbl_questions',$data_array);
            $insert_que_id = $this->db->insert_id();


            for($j=0;$j<count($option);$j++)
              {
                  if($option[$j]!='')
                  {
                      $data_ans_array=array(

                        'choice'=>$option[$j],
                        'que_id'=>$insert_que_id,
                        'is_correct'=>$answer[$j],
                        'created_by'=>$user_id,
                        'created_on'=>$current_date, 
               
                      );
                      $this->db->insert('tbl_question_choice',$data_ans_array);
                  }
              }

            }
          }

        }*/
       // else
        //{

          $option = $this->input->post('option');
          $answer = $this->input->post('answer');
          //echo '<pre>'; print_r($answer); exit;
          $question=$this->input->post('question');
          $data_array=array(

              'question'=>$question,
              'section_id'=>$section_id,
              'exam_id'=>$exam_id,
              'marks'=>$marks,
              'neg_mark'=>$neg_mark,
              'time'=>$time,
              'explanation'=>$explanation,
              'modified_on'=>$current_date, 
              'modified_by'=>$user_id

            );
          //print_r($data_array); exit;
          $this->db->where('id',$edit_id);
          $this->db->update('tbl_questions',$data_array);

          $chk_ans = $this->admin_model->selectOne('tbl_question_choice','que_id',$edit_id); 
          if(count($chk_ans)>0)
          {
            $this->db->where('que_id',$edit_id);
            $this->db->delete('tbl_question_choice');
          } 

          
          for($i=0;$i<count($option);$i++)
          {
            if($option[$i]!='' && $answer[$i]!='')
            {
            $data_ans_array=array(

                'choice'=>$option[$i],
                'que_id'=>$edit_id,
                'is_correct'=>$answer[$i],
                'created_by'=>$user_id,
                'created_on'=>$current_date, 
               


              );
            $this->db->insert('tbl_question_choice',$data_ans_array);
            }
          }
           $chk_type = $this->admin_model->selectOne('tbl_question_test_type','question_id',$edit_id); 
          if(count($chk_type)>0)
          {
            $this->db->where('question_id',$edit_id);
            $this->db->delete('tbl_question_test_type');
          } 

                for($j=0;$j<count($test_type);$j++)
              {
                  if($test_type[$j]!='')
                  {
                      $data_type_array=array(

                        'question_id'=>$edit_id,
                        'test_type'=>$test_type[$j],
                        'created_by'=>$user_id,
                        'created_on'=>$current_date, 
               
                      );
                      $this->db->insert('tbl_question_test_type',$data_type_array);
                  }
              }



       // }

        redirect('index.php/manage_question/view/','refresh');

     }

    function check_question_type()
    {
        $type_id=$this->input->post('type_id');
        $exm_id=$this->input->post('exm_id');
        if($type_id==3)
        {
          $data['status']=1;
          @$data['passg']=$this->set_model->get_passage($exm_id,$type_id);


        }
        else
        {
          $data['status']=0;
           @$data['passg']=$this->set_model->get_passage($exm_id,$type_id);

        }

         @$data['chapters']=$this->admin_model->selectOne('tbl_chapters','sub_id',$type_id);
      
      

        echo json_encode(array('result'=>$data));

    }


function set_description_val()
    {
        $id=$this->input->post('type_id');

        $data = $this->admin_model->selectOne('tbl_passage','id',$id);
      /*  $data['descpn']= $sub[0]->description;*/
        
      

        echo json_encode($data);

    }

function delete()
{
	$id=$this->uri->segment(3);

	$question = $this->admin_model->selectOne('tbl_questions','id',$id);

	if(count($question)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_questions');
				
				$this->session->set_flashdata('succ_msg','One question deleted successfully.');
			
			}
			redirect('index.php/manage_question/view/','refresh');

	
}

  function download_template()
  { 

    
    $file_name= $this->uri->segment(3);
    //echo $file_name;
    //echo $folder_name.' '.$file_name; exit;
    $data = file_get_contents(base_url()."../assets/uploads/download_template/".$file_name);
    //$ext=substr(strrchr($file_name,'.'),1);
    $name = $file_name;
    force_download($name,$data);    
  }

function edit()

{
		if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

		$company_id =$this->uri->segment(3);
		

		$data['company']=$this->admin_model->selectone('tbl_company','id',$company_id);

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('company/question_edit_view',$data);
		$this->load->view('template/adminfooter_category');
}
function update()
{

    if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }
		  $edit_id=$this->input->post('edit_id');

		
        $company=$this->input->post('company_name');
        $old_image=$this->input->post('old_image');

    	$image=NULL;

        if(($_FILES['company_icon']['name'])!='')
          {
          $new_name =time();      
          $config['upload_path'] ='../assets/uploads/company_logo/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';    
          $config['file_name']=$new_name; 
          
            
          $this->load->library('upload', $config);  
          //==========end:resize body_part image======================   
          $field_name = "company_icon"; 
              
          $image=NULL;   
          if($this->upload->do_upload($field_name))
          { 
            
           $file_info = $this->upload->data();
           $original_image_file_name = $file_info['raw_name'].$file_info['file_ext'];
           $file_size=$file_info['file_size'];
           $this->image_lib->clear();     
           $image =$file_info['raw_name'].$file_info['file_ext']; 
            
          
           
           
           $image_config["image_library"] = "gd2";
           $image_config["source_image"] ='../assets/uploads/company_logo/'.$image;   
           $image_config['create_thumb'] = FALSE;
           $image_config['maintain_ratio'] = FALSE;
           $image_config['new_image'] = '../assets/uploads/company_logo/'.$image; 
           $image_config['quality'] = "100%";
           $image_config['width'] = 252;
           $image_config['height']= 78;
           
           $image_config['master_dim'] = "height";
           $this->image_lib->initialize($image_config);
           $this->image_lib->resize(); 
           $this->image_lib->clear();
          } //end if
        }
          if($image=='')
          {
            $image=$old_image;
          }
          else
          {
            @unlink('../assets/uploads/company_logo/'.$old_image);
          }
    	
    	$current_date=date('Y-m-d H:i:s');
    	$data = array(

            
            'company_name'=>$company,
            'company_logo'=>$image,
            'modified_by'=>$user_id,
            'modified_on'=>$current_date,
            
            );
    	//echo '<pre>'; print_r($data); exit;
    	$this->db->where('id',$edit_id);
    	$this->db->update('tbl_company',$data);
    	$this->session->set_flashdata('succ_msg','One Company updated successfully.');
    	redirect('index.php/manage_company/view/','refresh');

}





function change_to_active()
{
	
		$q_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($q_ids);$i++)
		{
			$id=$q_ids[$i];
			$this->db->where('id',$id);

			if($this->db->update('tbl_questions',$data))
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


function get_subject()
{
        $category_id=$this->input->post('category_id');
      
        $data=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('exam_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
}

public function get_answer_hint()
{
  $id=$this->input->post('id');
    $answer_number=$this->input->post('answer_number');
  $value=$this->input->post('value');
   $pre_data=$this->input->post('pre_data');
  $option=$this->input->post('option');

if($value=='Yes'){


$new_option=$answer_number.' '.$option.',';


}
else{

$option_1=$answer_number.' '.$option.',';
  $new_option=str_replace($option_1," ",$pre_data);
}
echo json_encode($new_option);
}

function export_csv()
{
  // echo "okkk";

  header("Content-type: text/csv");
  header("Content-Disposition: attachment; filename=Question_export.csv");

           $question_details_csv= $this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

          $output = fopen('php://output', 'w');

          fputcsv($output, array('SL NO','Question.','Group_id','Exam_id','Subject_id','Chapter_id','Test_type_id','Optain_1','isCorrect_1(Yes/No)','Optain_2','isCorrect_2(Yes/No)','Optain_3','isCorrect_3(Yes/No)','Optain_4','isCorrect_4(Yes/No)'));

          $count=0;
          
          foreach($question_details_csv as $row)
          {
             $count++;
            
           

          $get_exam= $this->common->select($table_name='tbl_exam_type',$field=array(),$where=array('id'=>@$row->exam_id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

          $get_gourp= $this->common->select($table_name='tbl_exam_type',$field=array(),$where=array('id'=>@$get_exam[0]->exam_type_id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

         
         $optai_details=$this->common->select($table_name='tbl_question_choice',$field=array(),$where=array('que_id'=>@$row->id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

          $test_type_details=$this->common->select($table_name='tbl_question_test_type',$field=array(),$where=array('question_id'=>@$row->id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

          $get_subject=$this->common->select($table_name='tbl_chapters',$field=array(),$where=array('chap_id'=>@$row->chap_id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

        
         $Optain_1=strip_tags(@$optai_details[0]->choice);
         $Optain_2=strip_tags(@$optai_details[1]->choice);
         $Optain_3=strip_tags(@$optai_details[2]->choice);
         $Optain_4=strip_tags(@$optai_details[3]->choice);

         $is_correct_1=strip_tags(@$optai_details[0]->is_correct);
         $is_correct_2=strip_tags(@$optai_details[1]->is_correct);
         $is_correct_3=strip_tags(@$optai_details[2]->is_correct);
         $is_correct_4=strip_tags(@$optai_details[3]->is_correct);
         // print_r($is_correct_3);exit;

  fputcsv($output, array(

        "SL NO"=>$count,
        "Question" =>strip_tags($row->question), 
        "Group_id" =>$get_gourp[0]->id,
        "Exam_id"=>@$row->exam_id,
        'Subject_id' =>@$get_subject[0]->sub_id,
        'Chapter_id' =>@$row->chap_id,
        'Test_type_id'=>@$test_type_details[0]->test_type,
        'Optain_1' =>$Optain_1,
        'isCorrect_1(Yes/No)' =>$is_correct_1,
        'Optain_2'=>$Optain_2,
        'isCorrect_2(Yes/No)'=>$is_correct_2,
        'Optain_3'=>$Optain_3,
        'isCorrect_3(Yes/No)'=>$is_correct_3,
        'Optain_4'=>$Optain_4,
        'isCorrect_4(Yes/No)'=>$is_correct_4
        ));

          }

}

		
		
		
}
?>




