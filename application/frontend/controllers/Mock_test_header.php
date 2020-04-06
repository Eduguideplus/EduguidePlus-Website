<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mock_test_header extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();
          $this->load->model('join_model');	

	 }
	
	public function index()
	{
		
   

      $usr=$this->session->userdata('activeuser');

      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


		if($usr!='')
		{
			 $data['mock'] = $this->common_model->common($table_name = 'tbl_dummy_mock_set', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			  $data['groups'] = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
			  //print_r($data['groups']);exit;
	
			$this->load->view('common/header');
			$this->load->view('mock_test_header',$data);
			$this->load->view('common/footer',$foot_data);
		}
		else
		{
			 $data['mock'] = $this->common_model->common($table_name = 'tbl_dummy_mock_set', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

			$this->load->view('common/header');
			$this->load->view('mock_test_header_user',$data);
			$this->load->view('common/footer',$foot_data);
		}

      
	}


	function check_current_option()
	{
		$active_usr=$this->session->userdata('activeuser');
		
		$optn=$this->input->post('optn');
		$qstn=$this->input->post('qstn');
		

		$check_status=$this->join_model->check_option_status_multiple($qstn,$optn);


		$data['status']=$check_status;
		$data['answer']=array();

		$choice_dtls=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$qstn), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		for($i=0;$i<count($choice_dtls);$i++)
		{
			if($choice_dtls[$i]->is_correct=='Yes')
			{
				array_push($data['answer'],$choice_dtls[$i]->id);
			}
		}

		//print_r($data['status']);
		//print_r($data['answer']);

		 echo json_encode($data);

		//echo $check_status;
	}


	function get_exam()
	{
  	$category_id=$this->input->post('category_id');
        $data=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
	}

	function get_subjects()
	{
		$category_id=$this->input->post('category_id');
       $data=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('exam_id'=>$category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        echo json_encode($data);
	}

	public function random_generator($start,$limit)
	{

		$randarray = array(); 
		for($i = 1; $i <= 3; ) 
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

	function get_mock_question_list()
	{
		$usr=$this->session->userdata('activeuser');
		if($usr!='')
		{
			$sec_id=$this->input->post('sec_id');
			$exam_id=$this->input->post('exam');

		 	//$data=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('exam_id'=>$exam_id,'section_id'=>$sec_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		 	$data=$this->join_model->get_selected_type_question('2',$exam_id,$sec_id);

		 	//print_r($data);
		 	if(count($data)>=3)
		 	{
		 		shuffle($data);
		 		$start=0;
		 		$limit=count($data)-1;
		 		$generate_arr=$this->random_generator($start,$limit);
		 		//print_r($generate_arr);
		 		
		 			?>


		 			<div class="col-md-12 col-sm-12 col-xs-12">

                <?php
                $counter=1;
                for($i=0;$i<count($generate_arr);$i++)
		 		{
		 			$indx=$generate_arr[$i];
		 			$q_id=$data[$indx]->id;

                  $qstn_dtls=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                   $option_details=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                   $option_arr=array('A','B','C','D','E');

                  ?>
                  <div class="quaton-bx">
                      <h4>Question: <?php echo @$counter; ?></h4>
                        <div class="setup">
                            <h1><?php echo @$qstn_dtls[0]->question; ?></h1>

                            <div class="clearfix"></div>


                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="ans">
                                    <ul>

                                       <?php $counter1=0;foreach($option_details as $od){?>
                                      <li class="qstnoptn<?php echo @$qstn_dtls[0]->id; ?>" id="opt_<?php echo @$od->id; ?>"><a href="javascript:void(0)" onclick="check_right_wrong('<?php echo @$od->id; ?>','<?php echo @$qstn_dtls[0]->id;?>')"><div class="measure-question"><span><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <?php echo @$option_arr[$counter1]; ?> .</span> <?php echo @$od->choice; ?></div><span id="wrong_<?php echo @$od->id; ?>" class="hideelement"><i class="fa fa-times" aria-hidden="true"></i></span><span id="right_<?php echo @$od->id; ?>" class="hideelement"><i class="fa fa-check" aria-hidden="true"></i></span></a></li>

                                       <?php $counter1++;} ?>


                                      


                                    </ul>



                                </div>



                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="hints text-center hideelement" id="hint<?php echo @$qstn_dtls[0]->id; ?>">
                                      <h5>Hints</h5>

                                        <?php echo @$qstn_dtls[0]->explanation; ?>
                                      <!-- <ul>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                      
                                      </ul> -->



                                </div>
                            </div>

                        </div>


                  </div>

<?php $counter++; } ?>




                   

              </div>



            </div>


		 		<?php }
		 	else
		 	{
		 		echo '0';
		 	}
		}
		else
		{
			echo '0';
		}
		
	}
	
	

	

	
}
?>