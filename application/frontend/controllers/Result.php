<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Result extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		
   
   $data['result']=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_id'=>'DESC'), $start = '', $end = '');

    $data['result']=array();
      


      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	
		$this->load->view('common/header');
		$this->load->view('result_award',$data);
		$this->load->view('common/footer',$foot_data);
	}
	
	
public function search_data()
{

	$exam_date=$this->input->post('date');
	$test_type=$this->input->post('test_type');

  $knowledge_set_data = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('test_type'=>$test_type,'exam_date'=>$exam_date), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
	 // echo $knowledge_set_data[0]->kq_id;
/*
$rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$knowledge_set_data[0]->kq_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'asc'), $start = '', $end = '');

   */
      $this->db->select('*');
      $this->db->from('tbl_user_rank');
     
	
    $this->db->where('set_id',@$knowledge_set_data[0]->kq_id);
    $this->db->order_by('rank_index','desc');

    $query= $this->db->get();
      $rank_indexing_data= $query->result();


// echo count($rank_indexing_data);
	?>  
  
                 

<?php 
if(count($rank_indexing_data)>0){ ?>
    <?php



     foreach ($rank_indexing_data as $key => $row) {


       $obtained_marks= $row->total_marks;

      $user_data = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


        
  
        
         $test_data = $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>@$knowledge_set_data[0]->test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $exam_data = $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('set_id'=>$row->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    ?>                 

                        <tr>
                        <td><div class="rankers">

                          <?php if(@$user_data[0]->profile_photo!='')
                          {
                            ?>
                          <img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="img" style="max-width: 100%" class="right">
                          <?php
                        }
                        else{
                          ?>
                          <img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="img" style="max-width: 100%" class="right">
                          <?php
                        }
                        ?>

                        </div></td>
                      <td><?php echo date('jS M Y',strtotime(@$exam_date)); ?></td>
                          <td><?php echo @$test_data[0]->test_name; ?></td>
                          <td><?php echo @$user_data[0]->user_name; ?></td>
                          <td><?php echo @$user_data[0]->login_email; ?></td>

                          <td><?php echo $obtained_marks; ?></td>
   <td><?php echo $key+1; ?></td>
                          <td>Award Amount</td>
     <td><a href="<?php echo $this->url->link(94); ?>/<?php echo $row->set_id; ?>/<?php echo $row->exam_id; ?>" class="btn read-btn">Discuss</a></td>
                        </tr>
<?php  } ?>

                    
                  <?php } else{ echo "No data found"; } ?>
                      
                  <?php 
}



public function search_dates()
{
    
  $test_type=$this->input->post('test_type');

 $data['knowledge_set_data'] = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('test_type'=>$test_type,'exam_date <'=>date('Y-m-d')), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$exam_date = array();

for($i=0;$i< count($data['knowledge_set_data']);$i++){
    $exam_date[] =$data['knowledge_set_data'][$i]->exam_date;  
}

echo json_encode($exam_date);
}
	

  public function search_datess()
{
    
  $test_type=$this->input->post('test_type');

 $data['knowledge_set_data'] = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('test_type'=>$test_type,'exam_date <'=>date('Y-m-d')), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


$exam_date = array();

for($i=0;$i< count($data['knowledge_set_data']);$i++){
    $exam_date[] =$data['knowledge_set_data'][$i]->exam_date;  
}

echo json_encode($exam_date);
}

  public function get_dates()
{
    
  $test_type=$this->input->post('test_type');

 $data['knowledge_set_data'] = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('test_type'=>$test_type,'exam_date <'=>date('Y-m-d')), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


// $exam_date = array();?>
 <option value="">Choose Test Date</option> 
 <?php
for($i=0;$i< count($data['knowledge_set_data']);$i++){ ?>

  <option value="<?php echo $data['knowledge_set_data'][$i]->exam_date; ?>"> <?php echo $data['knowledge_set_data'][$i]->exam_date; ?> </option>  

<?php }

// echo json_encode();
}

}
?>