<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Course_collages extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   //echo 'working'; exit;
  

     $corseList=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('status'=>'Active','exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      

      $course_list= array();

      foreach($corseList as $row)
      {
          $rowarray['id']=$row->id;
          $rowarray['exam_name']=$row->exam_name;
          $rowarray['icon']=base_url().'assets/uploads/company_logo/'.$row->icon;
          array_push($course_list, $rowarray);

        
		  }
      echo json_encode(array('course_list'=>$course_list));
	}

	public function course_exams()
	{
		$json         =  file_get_contents('php://input');
    $obj          =  json_decode($json);



    $course_id = $obj->corse_id;
 
   if($course_id!='')
   {
   		 $courseDetails=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$course_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     $exam_level=$this->common_model->common($table_name = 'tbl_exam_level', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     
  $examLevel=array();

  foreach($exam_level as $key=>$row)
  {
  		$row_id= $row->id;
  		$get_exam=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>$course_id,'exam_level_id'=>$row_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $$end = '');

      $examList= array();

      foreach($get_exam as $res)
      {
          $resarray['exam_id']= $res->id;
          $resarray['exam_name']= $res->exam_name;

          array_push($examList, $resarray);
      }
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
  		$rowarray['exams']=$examList;
  		$rowarray['is_exam']=$is_exam;
  		array_push($examLevel, $rowarray);


  }
      echo json_encode(array('course_name'=>$courseDetails[0]->exam_name,'examLevel'=>$examLevel));

}
   
}

	public function exam_details()
	{
		$json         =  file_get_contents('php://input');
    $obj          =  json_decode($json);
   $exam_id= $obj->exam_id;

   if($exam_id!='')
   {
   		$exam_details= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   $exam_institute= $this->common_model->common($table_name = 'tbl_course_institute', $field = array(), $where = array('examination_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $exam_info= $this->common_model->common($table_name = 'tbl_exam_info', $field = array(), $where = array('exam_type_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $get_institute_level= $this->common_model->common($table_name = 'tbl_institute_level', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


    

     $instituLevel=array();
     $examinfoList= array();

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

      $institute_array= array();
      $i=0;
      foreach($get_institutes as $lst)
      {
          $i++;
           $statename= $this->common_model->common($table_name = 'states', $field = array(), $where = array('id'=>$lst->state), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

           $lstarray['sl']=$i;
           $lstarray['id']=$lst->id;
           $lstarray['institute_name']=$lst->institute_name;
           $lstarray['management_of_inst']=$lst->management_of_inst;
           $lstarray['statename']=@$statename[0]->name;
           $lstarray['total_seat']=$lst->total_seat;

           array_push($institute_array, $lstarray);

      }
     	$rowarray['level_name']=$row->institute_level;
     	$rowarray['level_id']=$inst_level;
     	$rowarray['avail_inst']=$avail_inst;
     	$rowarray['get_institutes']=$institute_array;

     	array_push($instituLevel, $rowarray);


     }

  foreach($exam_info as $key=>$exrow)
  {

    $exam_info_id= $exrow->info_id;
    $get_video= $this->common_model->common($table_name = 'tbl_exam_info_video', $field = array(), $where = array('exam_info_id'=>$exam_info_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $rowinfo['info_title']= $exrow->info_title;
    $rowinfo['info_id']= $exrow->info_id;
    $rowinfo['info_description_title']= $exrow->info_description_title;
    $rowinfo['info_description']= $exrow->info_description;
      array_push($examinfoList, $rowinfo);

  }


echo json_encode(array('exam_name'=>$exam_details[0]->exam_name,'examinfoList'=>$examinfoList,'instituLevel'=>$instituLevel));

  
   }
   

   
	}

  public function exam_details_search()
  {
    $json         =  file_get_contents('php://input');
    $obj          =  json_decode($json);
   $exam_id= $obj->exam_id;
   $levelid= $obj->levelid;
   $searchkey= $obj->searchkey;

   if($exam_id!='')
   {
      $exam_details= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   $exam_institute= $this->common_model->common($table_name = 'tbl_course_institute', $field = array(), $where = array('examination_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $exam_info= $this->common_model->common($table_name = 'tbl_exam_info', $field = array(), $where = array('exam_type_id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $get_institute_level= $this->common_model->common($table_name = 'tbl_institute_level', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


    

     $instituLevel=array();
     $examinfoList= array();

     foreach($get_institute_level as $row)
     {
      $inst_level=$row->id;

      $get_institutes=array();
      $get_institutestotal= $this->common_model->get_parti_institute($inst_level, $exam_id);

      if($levelid==$inst_level){
         $get_institutes= $this->common_model->get_parti_institute_search_app($inst_level, $exam_id,$searchkey);
       if(count($get_institutes)==0){

            $stateid= $this->common_model->common($table_name = 'states', $field = array(), $where = array(), $where_or = array(), $like = array('name'=>$searchkey), $like_or = array(), $order = array(), $start = '', $end = '');

            $state_id=array();

            foreach($stateid as $srow)
            {
                array_push($state_id, $srow->id);
            }



            $get_institutes= $this->common_model->get_parti_institute_bystate_app($inst_level, $exam_id,$state_id);

         }
        
      }
      else{
       $get_institutes= $this->common_model->get_parti_institute($inst_level, $exam_id);
      }
     

      if(count($get_institutestotal)>0)
      {
        $avail_inst='Y';
      }
      else{
        $avail_inst='N';
      }

      $institute_array= array();
      $i=0;
      foreach($get_institutes as $lst)
      {
          $i++;
           $statename= $this->common_model->common($table_name = 'states', $field = array(), $where = array('id'=>$lst->state), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

           $lstarray['sl']=$i;
           $lstarray['id']=$lst->id;
           $lstarray['institute_name']=$lst->institute_name;
           $lstarray['management_of_inst']=$lst->management_of_inst;
           $lstarray['statename']=@$statename[0]->name;
           $lstarray['total_seat']=$lst->total_seat;

           array_push($institute_array, $lstarray);

      }
      $rowarray['level_name']=$row->institute_level;
      $rowarray['level_id']=$inst_level;
      $rowarray['avail_inst']=$avail_inst;
      $rowarray['get_institutes']=$institute_array;

      array_push($instituLevel, $rowarray);


     }

  foreach($exam_info as $key=>$exrow)
  {

    $exam_info_id= $exrow->info_id;
    $get_video= $this->common_model->common($table_name = 'tbl_exam_info_video', $field = array(), $where = array('exam_info_id'=>$exam_info_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $rowinfo['info_title']= $exrow->info_title;
    $rowinfo['info_id']= $exrow->info_id;
    $rowinfo['info_description_title']= $exrow->info_description_title;
    $rowinfo['info_description']= $exrow->info_description;
      array_push($examinfoList, $rowinfo);

  }


echo json_encode(array('exam_name'=>$exam_details[0]->exam_name,'examinfoList'=>$examinfoList,'instituLevel'=>$instituLevel));

  
   }
   

   
  }

  function statetestss()
  {

    $searchkey='punjab';
       $stateid= $this->common_model->common($table_name = 'states', $field = array(), $where = array(), $where_or = array(), $like = array('name'=>$searchkey), $like_or = array(), $order = array(), $start = '', $end = '');

            $state_array=array();

            foreach($stateid as $srow)
            {
                array_push($state_array, $srow->id);
            }

            echo '<pre>'; print_r($state_array);
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



  public function search_level_exam_institute()
  {

    $exam_id=$this->input->post('exam_id');
    $level_id=$this->input->post('level_id');
    $search_name=$this->input->post('search_name');

   // echo $exam_id.' '.$level_id.' '.$search_name;
    
   
      $get_institutes= $this->common_model->search_level_exam_institute($level_id, $exam_id,$search_name);

      ?>



      <tbody><tr>
                            <th>Sl. No.</th>
                            <th>Institute Name </th>
                            <th>Management Of College </th>
                            <th>State</th>
                            <th>Total Seat</th>
                          </tr>
                          <?php

                          if(count(@$get_institutes)>0){

                          $listofinst=$get_institutes;
                          $i=0;
                          foreach($listofinst as $lst)
                            {
                              $i++;

                              $statename= $this->common_model->common($table_name = 'states', $field = array(), $where = array('id'=>$lst->state), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                              ?>
                          <tr>
                            <td>
                              <?php
                              if(strlen($i)==1){ echo '0'.$i; } else{ echo $i; } ?>.
                            </td>
                            <td><a href="<?php echo $this->url->link(153).'/'.$lst->id.'/'.$lst->slug;?>"><?php echo $lst->institute_name; ?></a></td>
                            <td><?php echo $lst->management_of_inst; ?></td>
                            <td><?php if($lst->state>0){ echo @$statename[0]->name; } else{ echo '-'; }?></td>
                            <td><?php echo $lst->total_seat; ?></td>
                          </tr>
                         <?php
                       } } else{ 
                        echo '<tr>
                            <td colspan="5">Institute not found..</td></tr>';
                     }
                       ?>
                        </tbody>




<?php
      
   
  }



	
	


	
}
?>