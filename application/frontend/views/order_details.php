

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
  			<h3>Your Plans</h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">
  			<div class="my-account-wrapper">
  			
  			<?php $this->load->view('account_sidebar',$user); ?>


  			  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 res480-pl-0 res480-pr-0">

                        <div class="myaccount-field myaccount-widget">

                          <h3 class="title">Plan List</h3>


                           <fieldset class="listar-statisticsarea">

                           			<div class="table-responsive">
                           								<div class="col-md-12 your-order-list">
                           									<h5>Your Plan <span class="pull-right">Today <?php echo date('d/m/Y');?></span></h5>
                           								</div>
									      				<table class="table dashboard-table table-bordered">
														    <thead>
														      <tr>
														        <th>Type of Test</th>
														       <!--  <th>Plan name</th> -->
														         <th>Plan Code</th>
														          <th>Examination Name</th>
														          <th>No. of Test</th>
														          <th>Remaining Test</th>
														         <th>Amount</th>
														         <th>Plan Start Date</th>
														          <th>Plan End Date</th>
														          
														           
														            
														      </tr>
														    </thead>
														    <tbody>
														    	<?php foreach($plans as $pl){
																	$plan_dtls=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('id'=>$pl->plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
														        $test_type_id=@$plan_dtls[0]->test_type_id;
														        $test_dtls=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>$test_type_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



														         $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$pl->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

														          if($pl->exam_id!=0 || $pl->exam_id!='')
														        {
														        	$exam_name=@$exam_dtls[0]->exam_name;
														        }
														        else
														        {

														    		$exam_name='All Subject';
														        }

														        ?>

														      <tr>
														        <td><?php 
														        

														        echo @$test_dtls[0]->test_name; ?></td>
														        <!-- <td><?php echo @$plan_dtls[0]->plan_title; ?></td> -->
														        <td><?php echo @$pl->plan_code; ?></td>
														        <td><?php  echo @$exam_name; ?></td>
														        <td><?php 
														        if(@$pl->test_qty!=0)
														        {
														        	 echo @$pl->test_qty;
														        }
														        else
														        {
														        	echo 'N/A';
														        }
														        ?></td>
														         <td><?php 
														        if(@$pl->remaining_qty!=0)
														        {
														        	 echo @$pl->remaining_qty;
														        }
														        else
														        {
														        	echo 'N/A';
														        }
														        ?></td>
														        <td><?php echo number_format(@$pl->plan_amount,2); ?></td>
														        <td><?php

														        	$time = strtotime($pl->created_on);

																	$newformat = date('d/m/Y',$time);

																	echo $newformat;


														         ?></td>
														        <td><?php 

														        $time = strtotime($pl->created_on);
                                                               echo  $final = date("d/m/Y", strtotime("+".$pl->plan_validity." month", $time));

														        //echo @$pl->plan_validity; ?></td>
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