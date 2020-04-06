<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage_set extends CI_Controller {
	
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
  $this->load->model('set_model');
  
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
	$data['set_no']=$this->set_model->pattern_unique('tbl_set');

	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('set/set_no_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
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

public function view_pattern()
{
	
	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
	//$data['pattern']=$this->admin_model->selectAll('tbl_set_pattern');
  $data['pattern'] = $this->set_model->pattern_unique('tbl_set_pattern');
	

	$this->load->view('template/admin_header');
	$this->load->view('template/admin_leftmenu');
	$this->load->view('set/set_pattern_table_view',$data);
	$this->load->view('template/adminfooter_category');
	
	
}


function set_view()
{

  if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

  //$data['type']=$this->admin_model->selectOne('tbl_exam_type','exam_type_id','o');
  $data['type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o','status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu');
  $this->load->view('set/selection_to_view',$data);
  $this->load->view('template/adminfooter_category');

}

function show_set_details()
{


  if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }
  $exam_id=$this->input->post('exam_id');
  $data['set_list']=$this->admin_model->selectOne('tbl_set','exam_id',$exam_id);
  $data['exam_type']=$this->admin_model->selectOne('tbl_exam_type','id',@$exam_id);
  /*echo '<pre>';
  print_r($data['set_list']);exit;*/

  $this->load->view('template/admin_header');
  $this->load->view('template/admin_leftmenu');
  $this->load->view('set/set_listing_table_view',$data);
  $this->load->view('template/adminfooter_category');

}

function view_details()
{
  if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

    $set_id =$this->uri->segment(3);
    $set=$this->admin_model->selectOne('tbl_set','id',$set_id);
    $exam_id=@$set[0]->exam_id;

    
    $data['section']=$this->set_model->get_set_pattern(@$exam_id);

      $data['set_dtls']=$this->set_model->get_set_details(@$set_id);

      $data['passage_list']=$this->set_model->get_passage_details(@$set_id);
      //echo '<pre>';
      //print_r($data['set_dtls']);
     // print_r( $data['section']);
      //exit;
      $total=0;
      for($t=0;$t<count($data['section']);$t++)
      {
        $total=$total+$data['section'][$t]->quantity;

      }
      $data['total_question']=$total;



      $this->load->view('template/admin_header');
      $this->load->view('template/admin_leftmenu');
      $this->load->view('set/question_listing_table_view',$data);
      $this->load->view('template/adminfooter_category');


}



    function add()
    {
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}

    $data['type']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o','status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    	
//$this->admin_model->selectOne('tbl_exam_type','exam_type_id','o');
//print_r($data['type']);exit;
    $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('set/set_quantity_add_view',$data);
		$this->load->view('template/adminfooter_category');
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

    $exam_id =$this->uri->segment(3);
    

    $data['set']=$this->admin_model->selectone('tbl_set','exam_id',$exam_id);

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('set/set_quantity_edit_view',$data);
    $this->load->view('template/adminfooter_category');
}

     function add_pattern()
    {
    	if($this->session->userdata('session_user_id')!='')
		{
			$user_id= $this->session->userdata('session_user_id');
		}
		else{
			redirect('index.php/login','refresh');
		}
    	

      $data['type']=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o','status'=>'Active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $data['section']=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('section_status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


//print_r($data['type']);exit;
    $this->load->view('template/admin_header');
		$this->load->view('template/admin_leftmenu');
		$this->load->view('set/set_pattern_add_view',$data);
		$this->load->view('template/adminfooter_category');
    }


    function get_exam()
    {
        $type_id=$this->input->post('type_id');
        $data=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>$type_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
    }

    function check_pattern_available()
    {
        $exam_id=$this->input->post('exm_id');
      
        $data=$this->common_model->common($table_name = 'tbl_set_pattern', $field = array(), $where = array('exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        echo json_encode($data);

    }

    function insert_quantity()
    {

      if($this->session->userdata('session_user_id')!='')
      {
        $user_id= $this->session->userdata('session_user_id');
      }
      else{
        redirect('index.php/login','refresh');
      }
    	
    	$exam_id=$this->input->post('exam_id');
    	$qty=$this->input->post('qty');
      $current_date=date('Y-m-d H:i:s');
    	//$company_slug=$this->create_slug($company);





    	
     $pattern=$this->common_model->common($table_name = 'tbl_set_pattern', $field = array(), $where = array('exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     $question_lst=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
     $ttl_q=0;
     for($p=0;$p<count($pattern);$p++)
     {
       $ttl_q=$ttl_q+$pattern[$p]->quantity;
     }

     if(count(@$question_lst)>0)
     {


              $avail_question=0;
             for($j=0;$j<count($pattern);$j++)
                  {

                      $pat_id=$pattern[$j]->section_id;
                      if($pat_id==3)
                      {
                            $question_list=$this->set_model->get_passage_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);


                      }
                      else
                      {

                          $question_list=$this->set_model->get_question_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);

                      }
                        $avail_question=  $avail_question+count($question_list);


                    }


if($avail_question< $ttl_q)
{
  $this->session->set_flashdata('err_msg','sufficient question not found to make Question Set.');
    redirect('index.php/manage_set/add/','refresh');

}






     if(count($pattern)>0)
     {
      /*$data = array(

            
            'exam_id'=>$exam_id,
            'quantity'=>$qty,
            'created_by'=>$user_id,
            'created_on'=>$current_date,
            
            );
      
      //echo '<pre>'; print_r($data); exit;
      $this->db->insert('tbl_set_quantity',$data);*/

 $set_list=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


 if(count(@$set_list)>0)
 {
    $start=count(@$set_list)+1;
    $limit=$qty;

        for($i=$start;$i<=$limit;$i++)
        {
          $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

          $set_name=$exam_dtls[0]->exam_name.'-Set'.$i;
          $slug=$this->create_slug($set_name);
          $set_data=array(

                  'set_name'=>$set_name,
                  'exam_id'=>$exam_id,
                  'set_slug'=>$slug,
                  'created_by'=>$user_id,
                  'created_on'=>$current_date


            );
          $this->db->insert('tbl_set',$set_data);
          $set_id=$this->db->insert_id();

            for($j=0;$j<count($pattern);$j++)
            {
              $pat_id=$pattern[$j]->section_id;
              if($pat_id==3)
              {
                $question_list=$this->set_model->get_passage_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);
                for($q=0;$q<count($question_list);$q++)
                      {
                        $data_question=array(
                          'set_id'=>$set_id,
                          'passage_id'=>$question_list[$q]->passage_id,
                          'created_by'=>$user_id,
                          'created_on'=>$current_date

                          );

                        $this->db->insert('tbl_question_set',$data_question);
                      }
                

              
               
              
              }
              else
              {
                   $question_list=$this->set_model->get_question_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);

                      for($q=0;$q<count($question_list);$q++)
                      {
                        $data_question=array(
                          'set_id'=>$set_id,
                          'question_id'=>$question_list[$q]->id,
                          'created_by'=>$user_id,
                          'created_on'=>$current_date

                          );

                        $this->db->insert('tbl_question_set',$data_question);
                      }

              }

            }

        }
 }
 else
 {
      for($i=1;$i<=$qty;$i++)
        {

            $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                $set_name=$exam_dtls[0]->exam_name.'-Set'.$i;
                $slug=$this->create_slug($set_name);
                $set_data=array(

                        'set_name'=>$set_name,
                        'exam_id'=>$exam_id,
                        'set_slug'=>$slug,
                        'created_by'=>$user_id,
                        'created_on'=>$current_date


                  );
                $this->db->insert('tbl_set',$set_data);
                $set_id=$this->db->insert_id();
                for($j=0;$j<count($pattern);$j++)
                  {

                      $pat_id=$pattern[$j]->section_id;
                      if($pat_id==3)
                      {
                            $question_list=$this->set_model->get_passage_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);

                            for($q=0;$q<count($question_list);$q++)
                            {
                              $data_question=array(
                                'set_id'=>$set_id,
                                'passage_id'=>$question_list[$q]->passage_id,
                                'created_by'=>$user_id,
                                'created_on'=>$current_date

                                );

                              $this->db->insert('tbl_question_set',$data_question);
                            }

                      }
                      else
                      {

                          $question_list=$this->set_model->get_question_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);

                          for($q=0;$q<count($question_list);$q++)
                          {
                            $data_question=array(
                              'set_id'=>$set_id,
                              'question_id'=>$question_list[$q]->id,
                              'created_by'=>$user_id,
                              'created_on'=>$current_date

                              );

                            $this->db->insert('tbl_question_set',$data_question);
                          }
                      }

                    
                      




                  }


        }
 	}
      



		      $this->session->set_flashdata('succ_msg',$qty.' set created successfully.');
		      redirect('index.php/manage_set/view/','refresh');
		     }

		     else
		     {
		       $this->session->set_flashdata('err_msg','Sorry!! Before wanting a no. of set, you need to submit pattern of that set.');
		       redirect('index.php/manage_set/edit/','refresh');
		     }
}
else
{
	 $this->session->set_flashdata('err_msg','No question found to make Question Set.');
	  redirect('index.php/manage_set/add/','refresh');

}

    	
    	
    	
    	
    	


    }


    function update_quantity()
{

    if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }
      $exam_id=$this->input->post('edit_id');

    
        $qty=$this->input->post('qty');

         $current_date=date('Y-m-d H:i:s');


          $set_list=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('exam_id'=>@$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


          $pattern=$this->common_model->common($table_name = 'tbl_set_pattern', $field = array(), $where = array('exam_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');




           $ttl_q=0;
           for($p=0;$p<count($pattern);$p++)
           {
             $ttl_q=$ttl_q+$pattern[$p]->quantity;
           }



          $avail_question=0;
             for($j=0;$j<count($pattern);$j++)
                  {

                      $pat_id=$pattern[$j]->section_id;
                      if($pat_id==3)
                      {
                            $question_list=$this->set_model->get_passage_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);


                      }
                      else
                      {

                          $question_list=$this->set_model->get_question_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);

                      }
                        $avail_question=  $avail_question+count($question_list);


                    }


if($avail_question< $ttl_q)
{
  $this->session->set_flashdata('err_msg','Sorry!! sufficient question not found to make Question Set.');
    redirect('index.php/manage_set/add/','refresh');

}









    if($qty>count(@$set_list))
    {
         if(count(@$set_list)>0)
         {
            $start=count(@$set_list)+1;
            $limit=@$qty;

                for($i=$start;$i<=$limit;$i++)
                {
                  $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  $set_name=$exam_dtls[0]->exam_name.'-Set'.$i;
                  $slug=$this->create_slug($set_name);
                  $set_data=array(

                          'set_name'=>$set_name,
                          'set_slug'=>$slug,
                          'exam_id'=>$exam_id,
                          'created_by'=>$user_id,
                          'created_on'=>$current_date


                    );
                  $this->db->insert('tbl_set',$set_data);
                  $set_id=$this->db->insert_id();

                    for($j=0;$j<count($pattern);$j++)
                    {

                    	$pat_id=$pattern[$j]->section_id;
                    	
			              if($pat_id==3)
			              {
			                $question_list=$this->set_model->get_passage_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);
			                for($q=0;$q<count($question_list);$q++)
			                      {
			                        $data_question=array(
			                          'set_id'=>$set_id,
			                          'passage_id'=>$question_list[$q]->passage_id,
			                          'created_by'=>$user_id,
			                          'created_on'=>$current_date

			                          );

			                        $this->db->insert('tbl_question_set',$data_question);
			                      }
			                

			              
			               
			              
			              }
			              else
			              {
			                   $question_list=$this->set_model->get_question_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);

                         //print_r($question_list);exit;

			                      for($q=0;$q<count($question_list);$q++)
			                      {
			                        $data_question=array(
			                          'set_id'=>$set_id,
			                          'question_id'=>$question_list[$q]->id,
			                          'created_by'=>$user_id,
			                          'created_on'=>$current_date

			                          );

			                        $this->db->insert('tbl_question_set',$data_question);
			                      }

			              }




                      /*
                        $question_list=$this->set_model->get_question_by_section($pattern[$j]->section_id,$exam_id,$pattern[$j]->quantity);

                          for($q=0;$q<count($question_list);$q++)
                          {
                            $data_question=array(
                              'set_id'=>$set_id,
                              'question_id'=>$question_list[$q]->id,
                              'created_by'=>$user_id,
                              'created_on'=>$current_date

                              );

                            $this->db->insert('tbl_question_set',$data_question);
                          }*/
                      /*print_r($question_list);exit;*/

                    }

                }
         }
         $this->session->set_flashdata('succ_msg','Set quantity updated successfully.');
        redirect('index.php/manage_set/view/','refresh');

       }

       else
       {
         $this->session->set_flashdata('err_msg','Set quantity cant be lesser than or equal to existing quantity.');
          redirect('index.php/manage_set/edit/'.$exam_id,'refresh');
       }


       
      

}



    function insert_pattern()
    {

      if($this->session->userdata('session_user_id')!='')
      {
        $user_id= $this->session->userdata('session_user_id');
      }
      else{
        redirect('index.php/login','refresh');
      }
    	

    	  $data['section']=$this->admin_model->selectAll('tbl_question_section');
      
    
        $exam_id=$this->input->post('exam_id');
        $section_id=$this->input->post('section_id');
        $qty=$this->input->post('qty');
        $current_date=date('Y-m-d H:i:s');
        for($i=0;$i<count($section_id);$i++)
        {
          if($section_id[$i]!='' && $qty[$i]!='')
          {
              $data = array(

            
            'exam_id'=>$exam_id,
            'section_id'=>$section_id[$i],
            'quantity'=>$qty[$i],
            'created_by'=>$user_id,
            'created_on'=>$current_date,
            
            );

            $this->db->insert('tbl_set_pattern',$data);

          }

        }

        
   
      /*  print_r($section_id);
        echo '<br>';
        print_r($qty);
        exit;*/
    	$this->session->set_flashdata('succ_msg','One section of pattern added successfully');
    	redirect('index.php/manage_set/view_pattern/','refresh');


    }

  function edit_pattern()

  {
    if($this->session->userdata('session_user_id')!='')
    {
      $user_id= $this->session->userdata('session_user_id');
    }
    else{
      redirect('index.php/login','refresh');
    }

    $pattern_id = $this->uri->segment(3);

    
    //echo $exam_id; exit;
    $data['type']=$this->admin_model->selectOne('tbl_exam_type','exam_type_id','o');
    $data['edit_pattern']=$this->admin_model->selectOne('tbl_set_pattern','id',$pattern_id);
    $exam_id = $data['edit_pattern'][0]->exam_id;

    $data['edit_pattern_section'] = $this->admin_model->selectOne('tbl_set_pattern','exam_id',$exam_id);

    //echo '<pre>'; print_r($data['edit_pattern_section']); exit;

    //echo '<pre>'; print_r($data['edit_pattern']); exit;
    $data['section']=$this->admin_model->selectAll('tbl_question_section');

   

    $this->load->view('template/admin_header');
    $this->load->view('template/admin_leftmenu');
    $this->load->view('set/set_pattern_edit_view',$data);
    $this->load->view('template/adminfooter_category');
  }


  function update_pattern()
    {

      if($this->session->userdata('session_user_id')!='')
      {
        $user_id= $this->session->userdata('session_user_id');
      }
      else{
        redirect('index.php/login','refresh');
      }
      
      $edit_id = $this->input->post('edit_id');
      //echo $edit_id; exit;
      $data['edit_pattern']=$this->admin_model->selectOne('tbl_set_pattern','id',$edit_id);
      $edit_exam_id = @$data['edit_pattern'][0]->exam_id;
      //echo $exam_id; exit;

      $chk_data = $this->admin_model->selectOne('tbl_set_pattern','exam_id',$edit_exam_id);
      //print_r($chk_data); exit;
      if(count($chk_data)>0)
      {
        //echo 'exist'; exit;
        $this->db->where('exam_id',$edit_exam_id);
        $this->db->delete('tbl_set_pattern');

        $data['section']=$this->admin_model->selectAll('tbl_question_section');
      
    
        $exam_id=$this->input->post('exam_id');
        $section_id=$this->input->post('section_id');
        $qty=$this->input->post('qty');
        $current_date=date('Y-m-d H:i:s');
        for($i=0;$i<count($section_id);$i++)
        {
          if($section_id[$i]!='' && $qty[$i]!='')
          {
              $data = array(

            
            'exam_id'=>$exam_id,
            'section_id'=>$section_id[$i],
            'quantity'=>$qty[$i],
            'created_by'=>$user_id,
            'created_on'=>$current_date,
            
            );
              //echo '<pre>'; print_r($data); exit;
            $this->db->insert('tbl_set_pattern',$data);

          }

        }




      }
      else
      {
        //echo 'no data'; exit;
      $data['section']=$this->admin_model->selectAll('tbl_question_section');
      
    
        $exam_id=$this->input->post('exam_id');
        $section_id=$this->input->post('section_id');
        $qty=$this->input->post('qty');
        $current_date=date('Y-m-d H:i:s');
        for($i=0;$i<count($section_id);$i++)
        {
          if($section_id[$i]!='' && $qty[$i]!='')
          {
              $data = array(

            
            'exam_id'=>$exam_id,
            'section_id'=>$section_id[$i],
            'quantity'=>$qty[$i],
            'created_by'=>$user_id,
            'created_on'=>$current_date,
            
            );
             // echo '<pre>'; print_r($data); exit;
            $this->db->insert('tbl_set_pattern',$data);

          }

        }


      }
   
      /*  print_r($section_id);
        echo '<br>';
        print_r($qty);
        exit;*/
      $this->session->set_flashdata('succ_msg','One section of pattern added successfully');
      redirect('index.php/manage_set/view_pattern/','refresh');


    }

function delete()
{

  
  $id=$this->uri->segment(3);

  $sub = $this->admin_model->selectOne('tbl_company','id',$id);

  if(count($sub)!=0)
      {
      

      
        $this->db->where('id',$id);

        $this->db->delete('tbl_company');
        
        $this->session->set_flashdata('succ_msg','One Company deleted successfully.');
      
      }
      redirect('index.php/manage_company/view/','refresh');

  
}


/*function delete()
{
	$id=$this->uri->segment(3);

	$sub = $this->admin_model->selectOne('tbl_company','id',$id);

	if(count($sub)!=0)
			{
			

			
				$this->db->where('id',$id);

				$this->db->delete('tbl_company');
				
				$this->session->set_flashdata('succ_msg','One Company deleted successfully.');
			
			}
			redirect('index.php/manage_company/view/','refresh');

	
}




function change_to_active()
{
	
		$company_ids=$this->input->post('id');
		$status=$this->input->post('status');
		$data=array('status'=>$status);


		for($i=0;$i<count($company_ids);$i++)
		{
			$id=$company_ids[$i];
			$this->db->where('id',$id);

			if($this->db->update('tbl_company',$data))
			{
				$result=1;
			}
			else
			{
				$result=0;
			}


			}
			
		echo json_encode(array('changedone'=>$result));
		


}*/


		
		
		
}




