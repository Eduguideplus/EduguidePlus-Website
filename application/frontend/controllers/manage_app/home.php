<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}

public function all_data()
  {

    //src="http://192.168.0.12/eduguide/site/assets/uploads/slider/053165100_1573916563.jpg"

$sliders=[];
$our_expart=[];
$newsList= array();
$eventList= array();

    $silder= $this->common_model->common($table_name = 'tbl_slider',$field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    foreach ($silder as  $images) 
    {

      $categoryArr['images'] = base_url().'assets/uploads/slider/'.$images->image;
       $categoryArr['title_1'] = $images->title_1;
        $categoryArr['title_2'] = $images->title_2;
     
      array_push($sliders,$categoryArr);
      
    }
     $news_notice_list=$this->common_model->common($table_name ='tbl_news_notice', $field = array(), $where = array(), $where_or = array('status'=>'active'), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');
     $i=0;

      foreach($news_notice_list as $row)
      {
        $i++;


          $rownewsarray['sl']= $i;
          $rownewsarray['description']= $row->description;
          $rownewsarray['is_new']= $row->is_new;
          $rownewsarray['image']= $row->image;

          array_push($newsList, $rownewsarray);

      }

     $events_list=$this->common_model->common($table_name ='tbl_events', $field = array(), $where = array(), $where_or = array('status'=>'active'), $like = array(), $like_or = array(), $order = array('id'=>'DESC'), $start = '', $end = '');

      $j=0;

      foreach($events_list as $res)
      {
          $j++;


          $resnewsarray['sl']= $j;
          $resnewsarray['description']= $res->description;
          $resnewsarray['is_new']= $res->is_new;
          $resnewsarray['image']= $res->image;

          array_push($eventList, $resnewsarray);
      }

     $our_experties_list=$this->common_model->common($table_name ='tbl_our_experties', $field = array(), $where = array(), $where_or = array('status'=>'active'), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    foreach ($our_experties_list as  $experties) 
    {

      $our_expertiesArr['our_experties_id'] = $experties->our_experties_id;
      $our_expertiesArr['name'] = $experties->name;
      $our_expertiesArr['designation'] = $experties->designation;
      $our_expertiesArr['content'] = $experties->content;
      $our_expertiesArr['images'] = base_url().'assets/uploads/our_experties/'.$experties->image;

     
      array_push($our_expart,$our_expertiesArr);
      
    }

    $home_content=$this->common_model->common($table_name ='tbl_welcome_content', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    echo json_encode(array($result='1','sliders'=>$sliders,'our_expart'=>$our_expart,'news_notice_list'=>$newsList,'eventList'=>$eventList,'home_content'=>$home_content));

    
  }

  function get_topcollage_list()
  {
    $clg_header= $this->common_model->common($table_name = 'tbl_top_college_header', $field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    $top_collage_array=array();
    foreach($clg_header as $row)
    {
        $header_id= $row->header_id;
        $institute_list= $this->common_model->common($table_name = 'tbl_top_colleges', $field = array(), $where = array('header_id'=>$header_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

        if(count($institute_list)>0)
        {
          $avail_inst='y';
        }
        else{
          $avail_inst='n';
        }

        $inst_array=array();
        $sl_no=0;
        foreach($institute_list as $res)
        {
          $sl_no++;
           $inst=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array('id'=>$res->college_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


              $course=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$res->course), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

              $resarray['sl_no']=$sl_no;
              $resarray['institute_name']=@$inst[0]->institute_name;
              $resarray['exam_name']=@$course[0]->exam_name;
              $resarray['duration']=$res->duration;
               $resarray['type']=$res->type;

               array_push($inst_array, $resarray);

        }

        $rowarray['avail_inst']=$avail_inst;
          $rowarray['header_id']=$row->header_id;
        $rowarray['header']=$row->header;
        $rowarray['inst_array']=$inst_array;
        array_push($top_collage_array, $rowarray);
    }
    echo json_encode(array('top_collage_array'=>$top_collage_array));
  }
}