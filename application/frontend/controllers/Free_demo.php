<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Free_demo extends CI_Controller {		 	 public function __construct()     {          parent::__construct();          $this->load->model('join_model');          $this->load->model('common/custom_model');	 }	public function demo_instruction_view(){	 $set_id=$this->uri->segment(2);	if($this->session->userdata('activeuser')!='')				{					$user_id=$this->session->userdata('activeuser');				}				else				{										$this->session->set_flashdata('err_msg','Please login first');	 				redirect($this->url->link(86));				}	$usr=$this->session->userdata('activeuser');		 $data['set_dtls']=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');	 $exam_date=@$data['set_dtls'][0]->exam_date;	 $slug=@$data['set_dtls'][0]->set_slug;	 	$data['test_type'] = $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>$data['set_dtls'][0]->test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');$data['exam_type'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$data['set_dtls'][0]->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');$data['subject'] = $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$data['set_dtls'][0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');$data['user_knw_plan'] = $this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('user_id'=>$usr,'set_id'=>@$data['set_dtls'][0]->kq_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 	  $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');	  $time=time();        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';    	$randstring = str_shuffle(@$characters);    	    	$token_char="a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9";    	$token_arr=explode(",",$token_char);    	$token = '';    			for ($i = 0; $i<5; $i++) 		{			$indx=mt_rand(0,35);		    $token .= @$token_arr[$indx];		    		   		}		$this->session->set_userdata('token',$token);		$exam_link=$slug.'/'.$token.'/'.$time.$randstring;		$data['exam_ready']=@$exam_link;	$this->load->view('common/header');	$this->load->view('demo_instruction',$data);	$this->load->view('common/footer',$foot_data);}	function create_slug($string)  {             $replace = '-';                 $string = strtolower($string);              //replace /995 995and . with white space             $string = preg_replace("/[\/\.]/", " ", $string);             $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);              //remove multiple dashes or whitespaces             $string = preg_replace("/[\s-]+/", " ", $string);              //convert whitespaces and underscore to $replace             $string = preg_replace("/[\s_]/", $replace, $string);              //limit the slug size             $string = substr($string, 0, 100);              //slug is generated             return $string;     }				}?>