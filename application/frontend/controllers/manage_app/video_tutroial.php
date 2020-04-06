<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Video_tutroial extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}

public function get_all_video_cat()
  {
  	$video_cat_list=[];

 	 $video_cat=$this->common_model->common($table_name ='tbl_video_tutorial_category', $field = array(), $where = array(), $where_or = array('status'=>'active'), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     foreach ($video_cat as  $cat) 
    {

      $video_catArr['category_id'] = $cat->category_id;
      $video_catArr['category_name'] = $cat->category_name;
      $video_catArr['content'] = $cat->content;
      $video_catArr['image'] = base_url().'assets/uploads/video_tutorial_category/'.$cat->image;

     
      array_push($video_cat_list,$video_catArr);
      
    }

    echo json_encode(array('video_cat_list'=>$video_cat_list));




}
public function video_by_category()
  {
  	

		$json    			=  file_get_contents('php://input');
		$obj     			=  json_decode($json);



		$cat_id = $obj->cat_id;

 	 $video_list=$this->common_model->common($table_name ='tbl_video_tutorial', $field = array(), $where = array('category_id'=>$cat_id), $where_or = array('status'=>'active'), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

   
 	 if(count($video_list)>0){
 	 	$result =1;

 	 	echo json_encode(array('video_list'=>$video_list,'result'=>$result));

 	 }else{
 	 	$result =0;
		echo json_encode(array('result'=>$result));
 	 }
    


}
}