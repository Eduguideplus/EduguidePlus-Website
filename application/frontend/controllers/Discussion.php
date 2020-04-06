<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Discussion extends CI_Controller 
{	
	 
	 public function __construct()
     {
          parent::__construct();

	 }
	
	public function index()
	{
		if($this->session->userdata('activeuser')==""){
			redirect($this->url->link(86));
		}
   $user_id=$this->session->userdata('activeuser');

    // $set_id=$this->uri->segment(2); 
      $exam_id=$this->uri->segment(3);  

      $foot_data['social'] = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

       $data['comment_list'] = $this->common_model->common($table_name = 'tbl_knowledge_discuss_cmnt', $field = array(), $where = array('status'=>'active','front_show'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$data['post_question_list'] = $this->common_model->common($table_name = 'tbl_discuss_post_question', $field = array(), $where = array('status'=>'active','front_show'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

	$data['plan_list'] = $this->common_model->common($table_name = 'tbl_user_plan', $field = array(), $where = array('user_id'=>$user_id,'plan_id <'=>'5'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		$this->load->view('common/header');
		$this->load->view('discussion',$data);
		$this->load->view('common/footer',$foot_data);
	}
	

	function comment_submit()

	{ 

	  $user_id=$this->session->userdata('activeuser');
		$comment=$this->input->post('comment');
		$set_id=$this->uri->segment(2); 
        $exam_id=$this->uri->segment(3);  
		$data=array('user_id'=>$user_id,
			         'comment'=>$comment,
			         'status'=>'inactive',
			         'front_show'=>'Yes',
                      'date'=>date('Y-m-d H:i:s')
	                       );
		$this->db->insert("tbl_knowledge_discuss_cmnt",$data);

		$comment_list = $this->common_model->common($table_name = 'tbl_knowledge_discuss_cmnt', $field = array(), $where = array('status'=>'active','front_show'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		foreach ($comment_list as $comment) {
		
 $user_data = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$comment->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		

  if($comment->user_id==$user_id){
		 ?>

		
									<div class="chat-list darker">
														  

<?php
if(@$user_data[0]->profile_photo!='')
{
	?>

					<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="nirnayakfinder" class="right">
					<?php
				}
				else{
					?>
						<img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="nirnayakfinder" class="right">
						<?php
					}
					?>								   <div class="massage-chat">
														  <span class="time-right"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
														  <span class="time-left"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($comment->date)); ?></span>
														  <div class="clearfix"></div>
														  <p><?php echo $comment->comment; ?></p>
														  </div>
														  
														</div>


                         <?php }else{ ?>

      <div class="chat-list">
      	<?php
      	if(@$user_data[0]->profile_photo!='')
      		{
      			?>

		<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="nirnayakfinder">
				
<?php
}
else{
	?>
	<img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="nirnayakfinder">
	<?php
}
?>
				<div class="massage-chat">

		<span class="time-left"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
		<span class="time-right"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($comment->date)); ?></span>
				<div class="clearfix"></div>
		 <p><?php echo $comment->comment; ?></p>
				</div>
														   
			</div>


                           

		<?php } }

	}
	
function post_ques_submit()
	{  

	 $user_id=$this->session->userdata('activeuser');
		$post_ques=$this->input->post('post_qus');

	
		$data=array('user_id'=>$user_id,
			         'posted_question'=>$post_ques,
			          'status'=>'inactive',
			         'front_show'=>'Yes',
                      'date'=>date('Y-m-d H:i:s')
	                       );
		$this->db->insert("tbl_discuss_post_question",$data);

		$post_list = $this->common_model->common($table_name = 'tbl_discuss_post_question', $field = array(), $where = array('status'=>'active','front_show'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		foreach ($post_list as $post) {
		
 $user_data = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$post->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		

  if($post->user_id==$user_id){
		 ?>

		
															<div class="chat-list darker">
														  <img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="Avatar" class="right">
														   <div class="massage-chat">
														  <span class="time-right"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
														  <span class="time-left"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($post->date)); ?></span>
														  <div class="clearfix"></div>
														  <p><?php echo $post->posted_question; ?></p>
														  </div>
														  
														</div>


                         <?php }else{ ?>

                         													<div class="chat-list">
		<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="Avatar">
				<div class="massage-chat">
		<span class="time-left"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
		<span class="time-right"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($post->date)); ?></span>
				<div class="clearfix"></div>
		 <p><?php echo $post->posted_question; ?></p>
				</div>
														   
			</div>


                           

		<?php } }

	}
	

	public function auto_chat_data()
{

 $user_id=$this->session->userdata('activeuser');
		$comment_list = $this->common_model->common($table_name = 'tbl_knowledge_discuss_cmnt', $field = array(), $where = array('status'=>'active','front_show'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		foreach ($comment_list as $comment) {
		
 $user_data = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$comment->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		

  if($comment->user_id==$user_id){
		 ?>

		
		<div class="chat-list darker">

	<?php
if(@$user_data[0]->profile_photo!='')
{
	?>

<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="nirnayakfinder" class="right">
<?php
}
else{
	?>
	<img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="nirnayakfinder" class="right">
	<?php
}
?>
			

			 <div class="massage-chat">
														  <span class="time-right"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
														  <span class="time-left"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($comment->date)); ?></span>
														  <div class="clearfix"></div>
														  <p><?php echo $comment->comment; ?></p>
														  </div>
														  
														</div>


                         <?php }else{ ?>

                         													<div class="chat-list">
		<?php
if(@$user_data[0]->profile_photo!='')
{
	?>

<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="nirnayakfinder">
<?php
}
else{
	?>
	<img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="nirnayakfinder">
	<?php
}
?>
				<div class="massage-chat">
		<span class="time-left"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
		<span class="time-right"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($comment->date)); ?></span>
				<div class="clearfix"></div>
		 <p><?php echo $comment->comment; ?></p>
				</div>
														   
			</div>


                           

		<?php } }

	
}



public function auto_post_data()
{

 $user_id=$this->session->userdata('activeuser');
		$post_list = $this->common_model->common($table_name = 'tbl_discuss_post_question', $field = array(), $where = array('status'=>'active','front_show'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

		foreach ($post_list as $post) {
		
 $user_data = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$post->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
		

  if($post->user_id==$user_id){
		 ?>

		
															<div class="chat-list darker">
														  <img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="Avatar" class="right">
														   <div class="massage-chat">
														  <span class="time-right"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
														  <span class="time-left"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($post->date)); ?></span>
														  <div class="clearfix"></div>
														  <p><?php echo $post->posted_question; ?></p>
														  </div>
														  
														</div>


                         <?php }else{ ?>

                         													<div class="chat-list">
		<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="Avatar">
				<div class="massage-chat">
		<span class="time-left"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
		<span class="time-right"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($post->date)); ?></span>
				<div class="clearfix"></div>
		 <p><?php echo $post->posted_question; ?></p>
				</div>
														   
			</div>




                           

		<?php } }
	
}

public function comment_count()
{

 $user_id=$this->session->userdata('activeuser');
	$comment_list = $this->common_model->common($table_name = 'tbl_knowledge_discuss_cmnt', $field = array(), $where = array('status'=>'active','front_show'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				
echo count($comment_list);

	
}
public function post_count()
{

 $user_id=$this->session->userdata('activeuser');
	$post_list = $this->common_model->common($table_name = 'tbl_discuss_post_question', $field = array(), $where = array('status'=>'active','front_show'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

				
echo count($post_list);

	
}
	


}
?>