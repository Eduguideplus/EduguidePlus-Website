

<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>









<div class="container-fluid login_register deximJobs_tabs practice">
 <div class="row">
  <div class="container main-container-home">
  	<?php if($this->session->flashdata('succ_msg')!=''){?>
  				<p style="color:#47f547;font-weight: bold;text-align: center;"><?php echo $this->session->flashdata('succ_msg'); ?></p>
  				<?php } ?>
  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
  			<h3>Your Claim List</h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">
  			<div class="my-account-wrapper">
  			
  			<?php $this->load->view('account_sidebar',$user); ?>


  			  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 res480-pl-0 res480-pr-0">

                        <div class="myaccount-field myaccount-widget">

                          <h3 class="title">Your Claim List</h3>


                           <fieldset class="listar-statisticsarea">

                           			<div class="table-responsive">
                           								<div class="col-md-12 your-order-list">
                           									<h5>Your Claim List <span class="pull-right"></span></h5>
                           								</div>
									      				<table class="table dashboard-table table-bordered">
														    <thead>
														      <tr>
														           <th>Sl NO</th> 
                   <th>Award Claim Status</th>
                  <th>Type of Test</th>
                 
                  <th>Examination Name</th>
                  <th>Subject Name</th>
                  <th>Examination Code</th>
                   <th>Rank Index</th>
                  <th>Awarded Amount</th>
                   <th>Claim Type</th>
                 
                  <th>Image</th>
                  <th>Name</th>
                  <th>User Code</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>User Name(As bank ) </th>
                  <th>Father Name</th>
                  <th>Address_1</th>
                   <th>Address_2</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Pincode</th>
                  <th>Bank Account Number</th>
                  <th>IFSC Code</th>
                  <th>Bank Branch Name</th>
                  <th>Phone Number</th>
														         
														          
														           
														            
														      </tr>
														    </thead>
														    <tbody>

	<?php  $i=0; foreach($claim as $row){

$user_id=$this->session->userdata('activeuser');

		$knowledge_test_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$row->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
$test_dtls=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>@$knowledge_test_dtls[0]->test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
 
 $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$knowledge_test_dtls[0]->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 $subject_dtls=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$knowledge_test_dtls[0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  $rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$row->set_id,'user_id'=>@$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

  $user_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$row->set_id,'user_id'=>@$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
    $user_details= $this->common_model->common($table_name='tbl_user', $field = array(), $where = array('id'=>@$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
 $i++;
    ?>

  <tr>
   <td><?php echo $i; ?></td>
                       <td><?php if($row->status=='pending'){ echo 'Pending';}if($row->status=='approved'){ echo 'Approved';} if(@$row->status=='cancel'){ echo 'Canceled';} ?></td>

                        <td><?php echo @$test_dtls[0]->test_name; ?></td>
   
    
           <td><?php echo @$exam_dtls[0]->exam_name; ?></td>
           <td><?php echo @$subject_dtls[0]->section_name; ?></td>
           <td><?php echo $row->examination_code;?></td>
                   

      <td><?php echo @$rank_indexing_data[0]->rank_index;?></td>
                      
                     <td><?php if(@$user_award[0]->award_amount=='refund'){echo '0';}else{ echo @$user_award[0]->award_amount;}?></td>
 <td><?php echo $row->claim_type;?></td>

                      <td>
                        <?php if(@$user_details[0]->profile_photo!=''){ ?><img src="<?php echo base_url();?>assets/uploads/profile_image/<?php echo @$user_details[0]->profile_photo;?>" height="80px" width="80px" style="border-radius: 50%"></img>
                        <?php } else { ?> 
                        <img src="<?php echo base_url();?>assets/uploads/user/no-img-profile.png" height="  80px" width="80px" style="border-radius: 50%">
                        <?php } ?>
                    </td>
                     <td><?php echo @$user_details[0]->user_name;?></td>
                     <td><?php echo @$user_details[0]->user_code;?></td>
                     <td><?php echo @$user_details[0]->login_email;?></td>
                     <td><?php echo @$user_details[0]->login_mob;?></td> 
                   
                    
                     <td><?php echo $row->user_name;?></td>
                     <td><?php echo $row->father_name;?></td>
                     <td><?php echo $row->address_1;?></td>
                     <td><?php echo $row->address_2;?></td>
                     <td><?php echo $row->city;?></td>
                     <td><?php echo $row->state;?></td>
                     <td><?php echo $row->pin;?></td>
                     <td><?php echo $row->bank_ac_number;?></td>
                     <td><?php echo $row->ifsc_code;?></td>
                     <td><?php echo $row->bank_branch_name;?></td>
                     <td><?php echo $row->phone_number;?></td>
                    
    
  </tr>
  <?php } ?>
      
 
</tbody>
</table>



									      		</div>
                           		





                           </fieldset>

                     

                     









                          




                         


                        </div>
                  </div>

  			</div>

  		</div>

  </div>
 </div>
</div>