<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class About_us extends CI_Controller 
{	
	 
	public function __construct()
    {
          parent::__construct();
           $this->load->database();

	}

public function get_about_us()
  {

    //src="http://192.168.0.12/eduguide/site/assets/uploads/slider/053165100_1573916563.jpg"

$about_us_arr=[];

    $aboutUs= $this->common_model->common($table_name = 'tbl_why_us',$field = array(), $where = array('status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    foreach ($aboutUs as  $abt) 
    {
      $abtArr['title'] = $abt->title;
      $abtArr['content'] = $abt->content;
      $abtArr['images'] = base_url().'assets/uploads/whyus/'.$abt->image;
     

     
     
     

      array_push($about_us_arr,$abtArr);
      
    }
     
    echo json_encode(array('about_us'=>$about_us_arr));

    
  }
}