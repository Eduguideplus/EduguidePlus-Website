
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

  			<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in cart-form">
  				<?php
  				if($this->session->flashdata('errMsg')!='')
  					{
  						?>
  				<h5 style="color: red"><?php echo $this->session->flashdata('errMsg'); ?></h5>
  				<?php
  			}
  			?>
  			<h3 id="phead">CART</h3>
  			<h5 id="ptext">(If users have account then login or fill the fields )</h5>

  			
  		</div>


  		<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 cart-form">
  			<div class="rank-bx about-exam">
  				
  				
  						<div class="about-exam-text p-20">
	  							<form class="cart-formfield" action="<?php echo $this->url->link(113);?>" method="post" id="cart_form">
	  									<div class="form-group notlogin">
	  										<label>Name :</label>
	  										<input type="text" placeholder="Enter Your Name" class="form-control" name="u_name" id="u_name">
	  									</div>

	  									<div class="form-group notlogin">
	  										<label>Email ID :</label>
	  										<input type="email" placeholder="Enter Your Email ID" class="form-control" name="email" id="email">
	  									</div>


	  									<div class="form-group notlogin">
	  										<label>Mobile Number :</label>
	  										<input type="text" placeholder="Enter Your Mobile Number" class="form-control" name="mobile" id="mobile">
	  									</div>

	  									<div class="form-group notlogin">
	  										<label>Password :</label>
	  										<input type="password" placeholder="Enter Your Password" class="form-control" name="password" id="password">
	  									</div>




	  									<div class="form-group">
	  										<label>Select Type of Test:</label>
	  										<div class="tab-container">
  
                              <div class="tab-navigation">              
                                <select id="select-box" class="form-control" name="test_type" onchange="make_effect(this.value)">
                                  <option value="">Select Type of Test</option>
                                  <?php foreach($test_type as $tt){?>
                                  <option value="<?php echo @$tt->test_id; ?>"><?php echo @$tt->test_name; ?></option>
                                  <?php } ?>
                                 <!--  <option value="3">Knowledge Test</option>
                                 <option value="4">Knock out Test</option>
                                 <option value="5">Quiz 1</option>
                                 <option value="6">Quiz 2</option> -->

                                  
                                </select>
                              </div>
                          </div>
                      </div>

               <input type="hidden" name="selected_plan" id="selected_plan" value="">
               <input type="hidden" name="selected_plan_test_qty" id="selected_plan_test_qty" value="">
               <input type="hidden" name="selected_plan_validity" id="selected_plan_validity" value="">
               <input type="hidden" name="selected_plan_amount" id="selected_plan_amount" value="">
               <input type="hidden" name="selected_plan_code" id="selected_plan_code" value="">

                

               <input type="hidden" name="agree_check" id="agree_check" value="">


<div id="for_practice" style="display:none;">

	  									<div class="form-group">
	  										<label>Select Group:</label>
	  										<div class="tab-container">
  
                              <div class="tab-navigation">              
                                <select  class="form-control" name="group_id" id="group_id" onchange="get_exam(this.value)">
                                  <option value="">Select Group</option>
                                  <?php foreach($groups as $gp){?>
                                  <option value="<?php echo @$gp->id; ?>"><?php echo @$gp->exam_name; ?></option>
                                  <?php } ?>
                               

                                  
                                </select>
                            </div>
                        </div>
                    </div>


                        	<div class="form-group">
	  										<label>Select Examination:</label>
	  										<div class="tab-container">
  
                              <div class="tab-navigation">              
                                <select  class="form-control" name="exam_id" id="exam_id">
                                  <option value="">Select Examination</option>
                                  
                               

                                  
                                </select>
                            </div>
                        </div>
                    </div>

</div>



<div id="for_others" style="display:none;">

	  									<div class="form-group">
	  										<label>Select No of Test:</label>
	  										<div class="tab-container">
  
                              <div class="tab-navigation">              
                                <select  class="form-control" name="no_test" id="no_test" onchange="get_current_plan_value_other(this.value,'<?php echo $knowledge[0]->plan_month_duration; ?>','<?php echo $knowledge[0]->price_per_set; ?>','<?php echo $knowledge[0]->plan_code; ?>','<?php echo date("d-m-Y");?>')">
                                  <option value="">Select No. of Test</option>
                                  <?php for($i=1;$i<=10;$i++){?>
                                  <option value="<?php echo @$i; ?>"><?php echo @$i; ?></option>
                                  <?php } ?>
                               

                                  
                                </select>
                            </div>
                        </div>
                    </div>


                        

</div>
	  									



                              <div class="exam-plan" id="practice" style="display:none;">		
	                           			<h4>Practice Test</h4>

	                           			<div class="col-sm-12">
	                           			<div class="col-sm-4">

	                           			<?php foreach($practices as $pract){?>

	                           			<div class="clearfix"></div>

	                           			<label class="radio-container"> <?php echo $pract->plan_title; ?> 
										  <input type="radio"  name="radio" value="<?php echo @$pract->id?>" onclick="get_current_plan_value_practice(this.value,'<?php echo $pract->plan_month_duration; ?>','<?php echo $pract->plan_price; ?>','<?php echo $pract->plan_code; ?>','<?php echo date("d-m-Y");?>')">
										  <span class="checkmark"></span>
										</label>

										<?php } ?>
									</div>
									<div class="col-sm-8 text-center">

										<div id="plan_details_practice" style="display:none;">
										<h5> Plan Details</h5>
										<table class="table bkcolor">
										    <thead>
										      <tr>
										        <th>Validity(Months)</th>
										        <th>Amount(INR)</th>
										        <th>Code</th>
										      </tr>
										    </thead>
										    <tbody>
										      <tr>
										        <td id="validity_plan_practice">xxx</td>
										        <td id="amount_plan_practice">xxx</td>
										        <td id="code_plan_practice">xxxxx</td>
										      </tr>
										      
										    </tbody>
										  </table>
									</div>
									</div>

									</div>

										<!-- <div class="clearfix"></div>
										
										<label class="radio-container"> 9 th Months 
										  <input type="radio" checked="" name="radio">
										  <span class="checkmark"></span>
										</label>
										
										<div class="clearfix"></div>
										<label class="radio-container"> 6 th Months 
										  <input type="radio" checked="" name="radio">
										  <span class="checkmark"></span>
										</label>
										
										<div class="clearfix"></div>
										
										<label class="radio-container"> 3 th Months
										  <input type="radio" checked="" name="radio">
										  <span class="checkmark"></span>
										</label> -->
									</div>


									<div class="exam-plan" id="knowledge" style="display:none;">		
	                           			<h4>Knowledge Test</h4>

	                           			<div class="col-sm-12">
	                           			<div class="col-sm-4">
									<?php foreach($knowledge as $knw){?>

	                           			<div class="clearfix"></div>

	                           			<label class="radio-container"> <?php echo $knw->plan_title; ?>
										  <input type="radio"  name="radio" value="<?php echo @$knw->id?>" onclick="get_plan_value_other(this.value)">
										  <span class="checkmark"></span>
										</label>

										<?php } ?>

									</div>

									<div class="col-sm-8 text-center">

										<div id="plan_details_3" style="display:none;">
										<h5> Plan Details</h5>
										<table class="table bkcolor">
										    <thead>
										      <tr>
										        <th>Validity(Months)</th>
										        <th>Amount(INR)</th>
										        <th>Code</th>
										      </tr>
										    </thead>
										    <tbody>
										      <tr>
										        <td id="validity_plan_3">xxx</td>
										        <td id="amount_plan_3">xxx</td>
										        <td id="code_plan_3">xxxxx</td>
										      </tr>
										      
										    </tbody>
										  </table>
									</div>
									</div>

								</div>

										<!-- <div class="clearfix"></div>
										
										<label class="radio-container"> 9 Knowledge Test
										  <input type="radio" checked="" name="radio">
										  <span class="checkmark"></span>
										</label>
										
										<div class="clearfix"></div>
										<label class="radio-container"> 6 Knowledge Test
										  <input type="radio" checked="" name="radio">
										  <span class="checkmark"></span>
										</label>
										
										<div class="clearfix"></div>
										
										<label class="radio-container"> 3 Knowledge Test
										  <input type="radio" checked="" name="radio">
										  <span class="checkmark"></span>
										</label> -->
									</div>



									<div class="exam-plan" id="knock_out" style="display:none;">		
		                           			<h4>Knock out Test</h4>

		                           			<div class="col-sm-12">
	                           			<div class="col-sm-4">
									<?php foreach($knock as $knk){?>
		                           			<div class="clearfix"></div>

		                           			<label class="radio-container"> <?php echo $knk->plan_title; ?>
											  <input type="radio"  name="radio" value="<?php echo @$knk->id?>" onclick="get_plan_value_other(this.value)">
											  <span class="checkmark"></span>
											</label>

									<?php } ?>

									</div>	

									<div class="col-sm-8 text-center">

										<div id="plan_details_4" style="display:none;">
										<h5> Plan Details</h5>
										<table class="table bkcolor">
										    <thead>
										      <tr>
										        <th>Validity(Months)</th>
										        <th>Amount(INR)</th>
										        <th>Code</th>
										      </tr>
										    </thead>
										    <tbody>
										      <tr>
										        <td id="validity_plan_4">xxx</td>
										        <td id="amount_plan_4">xxx</td>
										        <td id="code_plan_4">xxxxx</td>
										      </tr>
										      
										    </tbody>
										  </table>
									</div>
									</div>
									</div>	

											<!-- <div class="clearfix"></div>
											
											<label class="radio-container"> 9 Knock out test
											  <input type="radio" checked="" name="radio">
											  <span class="checkmark"></span>
											</label>
											
											<div class="clearfix"></div>
											<label class="radio-container"> 6 Knock out test
											  <input type="radio" checked="" name="radio">
											  <span class="checkmark"></span>
											</label>
											
											<div class="clearfix"></div>
											
											<label class="radio-container"> 3 knock out test
											  <input type="radio" checked="" name="radio">
											  <span class="checkmark"></span>
											</label> -->
										</div>


										<div class="exam-plan" id="qt1" style="display:none;">		
		                           			<h4>Quiz 1 Test</h4>

											<div class="col-sm-12">
	                           			<div class="col-sm-4">
		                           				<?php foreach($qzt1 as $qz){?>

		                           			<div class="clearfix"></div>

		                           			<label class="radio-container"> <?php echo $qz->plan_title; ?>
											  <input type="radio"  name="radio" value="<?php echo @$qz->id?>" onclick="get_plan_value_other(this.value)">
											  <span class="checkmark"></span>
											</label>
											<?php } ?>
										</div>

										<div class="col-sm-8 text-center">

										<div id="plan_details_5" style="display:none;">
										<h5> Plan Details</h5>
										<table class="table bkcolor">
										    <thead>
										      <tr>
										        <th>Validity(Months)</th>
										        <th>Amount(INR)</th>
										        <th>Code</th>
										      </tr>
										    </thead>
										    <tbody>
										      <tr>
										        <td id="validity_plan_5">xxx</td>
										        <td id="amount_plan_5">xxx</td>
										        <td id="code_plan_5">xxxxx</td>
										      </tr>
										      
										    </tbody>
										  </table>
									</div>
									</div>
								</div>

											<!-- <div class="clearfix"></div>
											
											<label class="radio-container"> 9 Quiz 1Test
											  <input type="radio" checked="checked" checked="" name="radio">
											  <span class="checkmark"></span>
											</label>
											
											<div class="clearfix"></div>
											<label class="radio-container"> 6 Quiz 1Test
											  <input type="radio" checked="" name="radio">
											  <span class="checkmark"></span>
											</label>
											
											<div class="clearfix"></div>
											
											<label class="radio-container"> 3 Quiz 1Test
											  <input type="radio" checked="" name="radio">
											  <span class="checkmark"></span>
											</label> -->
										</div> 


										<div class="exam-plan" id="qt2" style="display:none;">		
		                           			<h4>Quiz 2 Test</h4>

		                           			<div class="col-sm-12">
	                           				<div class="col-sm-4">
											<?php foreach($qzt2 as $qz){?>
		                           			<div class="clearfix"></div>

		                           			<label class="radio-container"> <?php echo $qz->plan_title; ?>
											  <input type="radio"  name="radio" value="<?php echo @$qz->id?>" onclick="get_plan_value_other(this.value)">
											  <span class="checkmark"></span>
											</label>
											<?php } ?>
											</div>

											<div class="col-sm-8 text-center">

										<div id="plan_details_6" style="display:none;">
										<h5> Plan Details</h5>
										<table class="table bkcolor">
										    <thead>
										      <tr>
										        <th>Validity(Months)</th>
										        <th>Amount(INR)</th>
										        <th>Code</th>
										      </tr>
										    </thead>
										    <tbody>
										      <tr>
										        <td id="validity_plan_6">xxx</td>
										        <td id="amount_plan_6">xxx</td>
										        <td id="code_plan_6">xxxxx</td>
										      </tr>
										      
										    </tbody>
										  </table>
									</div>
									</div>
								</div>

											<!-- <div class="clearfix"></div>
											
											<label class="radio-container"> 9 Quiz 2 Test
											  <input type="radio" checked="" name="radio">
											  <span class="checkmark"></span>
											</label>
											
											<div class="clearfix"></div>
											<label class="radio-container"> 6 Quiz 2 Test
											  <input type="radio" checked="" name="radio">
											  <span class="checkmark"></span>
											</label>
											
											<div class="clearfix"></div>
											
											<label class="radio-container"> 3 Quiz 2 Test
											  <input type="radio" checked="" name="radio">
											  <span class="checkmark"></span>
											</label> -->
										</div>



                              
                              <!-- <div id="tab-1" class="tab-content1 mt-0" style="display: block;">
                               
                              </div>
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                                                         <div id="tab-2" class="tab-content1 mt-0" style="display: block;">
                              
                                                         			<div class="exam-plan">		
                              	                           			<h4>Practice Test</h4>
                              
                              	                           			<div class="clearfix"></div>
                              
                              	                           			<label class="radio-container"> One Year 
                              										  <input type="radio" checked="checked" name="radio">
                              										  <span class="checkmark"></span>
                              										</label>
                              
                              										<div class="clearfix"></div>
                              
                              										<label class="radio-container"> 9 th Months 
                              										  <input type="radio" checked="" name="radio">
                              										  <span class="checkmark"></span>
                              										</label>
                              
                              										<div class="clearfix"></div>
                              										<label class="radio-container"> 6 th Months 
                              										  <input type="radio" checked="" name="radio">
                              										  <span class="checkmark"></span>
                              										</label>
                              
                              										<div class="clearfix"></div>
                              
                              										<label class="radio-container"> 3 th Months
                              										  <input type="radio" checked="" name="radio">
                              										  <span class="checkmark"></span>
                              										</label>
                              									</div>
                              
                              
                                                          
                                                 			 </div>
                              
                              
                              
                              
                              
                              			                    <div id="tab-3" class="tab-content1 mt-0" style="display: none;">
                              			                      		<div class="exam-plan">		
                              	                           			<h4>Knowledge Test</h4>
                              
                              	                           			<div class="clearfix"></div>
                              
                              	                           			<label class="radio-container"> 12 Knowledge Test
                              										  <input type="radio" checked="checked" name="radio">
                              										  <span class="checkmark"></span>
                              										</label>
                              
                              										<div class="clearfix"></div>
                              
                              										<label class="radio-container"> 9 Knowledge Test
                              										  <input type="radio" checked="" name="radio">
                              										  <span class="checkmark"></span>
                              										</label>
                              
                              										<div class="clearfix"></div>
                              										<label class="radio-container"> 6 Knowledge Test
                              										  <input type="radio" checked="" name="radio">
                              										  <span class="checkmark"></span>
                              										</label>
                              
                              										<div class="clearfix"></div>
                              
                              										<label class="radio-container"> 3 Knowledge Test
                              										  <input type="radio" checked="" name="radio">
                              										  <span class="checkmark"></span>
                              										</label>
                              									</div>
                              			                                 
                              			                   	</div>
                              
                              
                              
                                                          <div id="tab-4" class="tab-content1 mt-0" style="display: none;">
                               			<div class="exam-plan">		
                              		                           			<h4>Knock out Test</h4>
                              
                              		                           			<div class="clearfix"></div>
                              
                              		                           			<label class="radio-container"> 12 Knock out test
                              											  <input type="radio" checked="checked" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              
                              											<div class="clearfix"></div>
                              
                              											<label class="radio-container"> 9 Knock out test
                              											  <input type="radio" checked="" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              
                              											<div class="clearfix"></div>
                              											<label class="radio-container"> 6 Knock out test
                              											  <input type="radio" checked="" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              
                              											<div class="clearfix"></div>
                              
                              											<label class="radio-container"> 3 knock out test
                              											  <input type="radio" checked="" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              										</div> 
                              
                                     
                              
                              
                                                          </div>
                              
                              <div id="tab-5" class="tab-content1 mt-0" style="display: none;">
                               			<div class="exam-plan">		
                              		                           			<h4>Quiz 1 Test</h4>
                              
                              		                           			<div class="clearfix"></div>
                              
                              		                           			<label class="radio-container"> 12 Quiz 1 Test
                              											  <input type="radio" checked="checked" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              
                              											<div class="clearfix"></div>
                              
                              											<label class="radio-container"> 9 Quiz 1Test
                              											  <input type="radio" checked="" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              
                              											<div class="clearfix"></div>
                              											<label class="radio-container"> 6 Quiz 1Test
                              											  <input type="radio" checked="" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              
                              											<div class="clearfix"></div>
                              
                              											<label class="radio-container"> 3 Quiz 1Test
                              											  <input type="radio" checked="" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              										</div> 
                              
                                     
                              
                              
                                                          </div>
                              
                              
                              
                              
                              <div id="tab-6" class="tab-content1 mt-0" style="display: none;">
                              
                              			<div class="exam-plan">		
                              		                           			<h4>Quiz 2 Test</h4>
                              
                              		                           			<div class="clearfix"></div>
                              
                              		                           			<label class="radio-container"> 12 Quiz 2 Test
                              											  <input type="radio" checked="checked" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              
                              											<div class="clearfix"></div>
                              
                              											<label class="radio-container"> 9 Quiz 2 Test
                              											  <input type="radio" checked="" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              
                              											<div class="clearfix"></div>
                              											<label class="radio-container"> 6 Quiz 2 Test
                              											  <input type="radio" checked="" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              
                              											<div class="clearfix"></div>
                              
                              											<label class="radio-container"> 3 Quiz 2 Test
                              											  <input type="radio" checked="" name="radio">
                              											  <span class="checkmark"></span>
                              											</label>
                              										</div> 
                              
                                                          
                              
                              </div> -->






                              <div class="form-group">

	  											<label class="tick-container"> I Agree (Terms and Conditions).
													  <input type="checkbox" name="agree" id="agree" onclick="put_value('1')" class="">
													  <span class="checkmark"></span>
													</label>



	  										</div>
                            </div>
	  									</div>






	  										
	  										<div class="clearfix"></div>


	  										<div class="form-group text-center">

	  											<button type="button" value="" class="save-pay" onclick="return cart_form_validation()">Add To Cart</button>



	  										</div>











	  							</form>

  						</div>
  					
  				

        
  			


  			</div>




  		</div>




  </div>
  </div>
  </div>
  <script>
  	function put_value(value)
  	{
  		$("#agree_check").val(value);
  	}
  </script>

<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
  <script>

  	function validation_cart()
  	{
  		  var selectbox = $('#select-box').val();
	      if (!isNull(selectbox)) {
	        $('#select-box').removeClass('black_border').addClass('red_border');
	      } else {
	        $('#select-box').removeClass('red_border').addClass('black_border');

	        	if(selectbox==1)
	        	{
		        	var group_id = $('#group_id').val();
				      if (!isNull(group_id)) {
				        $('#group_id').removeClass('black_border').addClass('red_border');
				      } else {
				        $('#group_id').removeClass('red_border').addClass('black_border');

				      }

				      	var exam_id = $('#exam_id').val();
				      if (!isNull(exam_id)) {
				        $('#exam_id').removeClass('black_border').addClass('red_border');
				      } else {
				        $('#exam_id').removeClass('red_border').addClass('black_border');

				      }

				       var selected_plan = $('#selected_plan').val();
				      if (!isNull(selected_plan)) {
				        $('#practice').removeClass('black_border').addClass('red_border');
				      } else {
				        $('#practice').removeClass('red_border').addClass('black_border');

				      }

				      var selected_plan_validity = $('#selected_plan_validity').val();
				      if (!isNull(selected_plan_validity)) {
				        $('#practice').removeClass('black_border').addClass('red_border');
				      } else {
				        $('#practice').removeClass('red_border').addClass('black_border');

				      }

				      var selected_plan_amount = $('#selected_plan_amount').val();
				      if (!isNull(selected_plan_amount)) {
				        $('#practice').removeClass('black_border').addClass('red_border');
				      } else {
				        $('#practice').removeClass('red_border').addClass('black_border');

				      }


				      var selected_plan_code = $('#selected_plan_code').val();
				      if (!isNull(selected_plan_code)) {
				        $('#practice').removeClass('black_border').addClass('red_border');
				      } else {
				        $('#practice').removeClass('red_border').addClass('black_border');

				      }

				      	$('#no_test').removeClass('red_border').addClass('black_border');
				      	$('#knowledge').removeClass('red_border').addClass('black_border');
						$('#knock_out').removeClass('red_border').addClass('black_border');
						$('#qt1').removeClass('red_border').addClass('black_border');
						$('#qt2').removeClass('red_border').addClass('black_border');


	        	}


	        	if(selectbox==3)
	        	{
		        	var no_test = $('#no_test').val();
				      if (!isNull(no_test)) {
				        $('#no_test').removeClass('black_border').addClass('red_border');
				      } else {
				        $('#no_test').removeClass('red_border').addClass('black_border');

				      }

				       var selected_plan = $('#selected_plan').val();
				       var selected_plan_test_qty = $('#selected_plan_test_qty').val();
				       var selected_plan_validity = $('#selected_plan_validity').val();
				       var selected_plan_amount = $('#selected_plan_amount').val();
				       var selected_plan_code = $('#selected_plan_code').val();

				        if (!isNull(selected_plan) || !isNull(selected_plan_test_qty) || !isNull(selected_plan_validity) || !isNull(selected_plan_amount) || !isNull(selected_plan_amount)) {
				        	$('#knowledge').removeClass('black_border').addClass('red_border');
				        }
				        else
				        {
				        	 $('#knowledge').removeClass('red_border').addClass('black_border');
				        }
				      	

				     

				      	$('#group_id').removeClass('red_border').addClass('black_border');
				      	$('#exam_id').removeClass('red_border').addClass('black_border');
				      	$('#practice').removeClass('red_border').addClass('black_border');
						$('#knock_out').removeClass('red_border').addClass('black_border');
						$('#qt1').removeClass('red_border').addClass('black_border');
						$('#qt2').removeClass('red_border').addClass('black_border');

	        	}



	        	if(selectbox==4)
	        	{
		        	var no_test = $('#no_test').val();
				      if (!isNull(no_test)) {
				        $('#no_test').removeClass('black_border').addClass('red_border');
				      } else {
				        $('#no_test').removeClass('red_border').addClass('black_border');

				      }

				      var selected_plan = $('#selected_plan').val();
				       var selected_plan_test_qty = $('#selected_plan_test_qty').val();
				       var selected_plan_validity = $('#selected_plan_validity').val();
				       var selected_plan_amount = $('#selected_plan_amount').val();
				       var selected_plan_code = $('#selected_plan_code').val();


				       if (!isNull(selected_plan) || !isNull(selected_plan_test_qty) || !isNull(selected_plan_validity) || !isNull(selected_plan_amount) || !isNull(selected_plan_amount)) {
				        	$('#knock_out').removeClass('black_border').addClass('red_border');
				        }
				        else
				        {
				        	 $('#knock_out').removeClass('red_border').addClass('black_border');
				        }

				      	

				       


				      	$('#group_id').removeClass('red_border').addClass('black_border');
				      	$('#exam_id').removeClass('red_border').addClass('black_border');
				      	$('#practice').removeClass('red_border').addClass('black_border');
						$('#knowledge').removeClass('red_border').addClass('black_border');
						$('#qt1').removeClass('red_border').addClass('black_border');
						$('#qt2').removeClass('red_border').addClass('black_border');

	        	}


	        	if(selectbox==5)
	        	{
		        	var no_test = $('#no_test').val();
				      if (!isNull(no_test)) {
				        $('#no_test').removeClass('black_border').addClass('red_border');
				      } else {
				        $('#no_test').removeClass('red_border').addClass('black_border');

				      }

				      var selected_plan = $('#selected_plan').val();
				       var selected_plan_test_qty = $('#selected_plan_test_qty').val();
				       var selected_plan_validity = $('#selected_plan_validity').val();
				       var selected_plan_amount = $('#selected_plan_amount').val();
				       var selected_plan_code = $('#selected_plan_code').val();


				        if (!isNull(selected_plan) || !isNull(selected_plan_test_qty) || !isNull(selected_plan_validity) || !isNull(selected_plan_amount) || !isNull(selected_plan_amount)) {
				        	$('#qt1').removeClass('black_border').addClass('red_border');
				        }
				        else
				        {
				        	 $('#qt1').removeClass('red_border').addClass('black_border');
				        }

				      	

				       



				      	$('#group_id').removeClass('red_border').addClass('black_border');
				      	$('#exam_id').removeClass('red_border').addClass('black_border');
				      	$('#practice').removeClass('red_border').addClass('black_border');
						$('#knowledge').removeClass('red_border').addClass('black_border');
						$('#knock_out').removeClass('red_border').addClass('black_border');
						$('#qt2').removeClass('red_border').addClass('black_border');

	        	}



	        	if(selectbox==6)
	        	{
		        	var no_test = $('#no_test').val();
				      if (!isNull(no_test)) {
				        $('#no_test').removeClass('black_border').addClass('red_border');
				      } else {
				        $('#no_test').removeClass('red_border').addClass('black_border');

				      }

				      var selected_plan = $('#selected_plan').val();
				       var selected_plan_test_qty = $('#selected_plan_test_qty').val();
				       var selected_plan_validity = $('#selected_plan_validity').val();
				       var selected_plan_amount = $('#selected_plan_amount').val();
				       var selected_plan_code = $('#selected_plan_code').val();


				        if (!isNull(selected_plan) || !isNull(selected_plan_test_qty) || !isNull(selected_plan_validity) || !isNull(selected_plan_amount) || !isNull(selected_plan_amount)) {
				        	$('#qt2').removeClass('black_border').addClass('red_border');
				        }
				        else
				        {
				        	 $('#qt2').removeClass('red_border').addClass('black_border');
				        }

				      	

				     


				      	$('#group_id').removeClass('red_border').addClass('black_border');
				      	$('#exam_id').removeClass('red_border').addClass('black_border');
				      	$('#practice').removeClass('red_border').addClass('black_border');
						$('#knowledge').removeClass('red_border').addClass('black_border');
						$('#knock_out').removeClass('red_border').addClass('black_border');
						$('#qt1').removeClass('red_border').addClass('black_border');

	        	}

	        	


			 }

			 






	      }
	 


  	function cart_form_validation()
  	{ //alert();

		  		$('#cart_form').attr('onchange', 'validation_cart()');
		    	$('#cart_form').attr('onkeyup', 'validation_cart()');

		     	validation_cart();


		     	 var agree_check = $('#agree_check').val();
				      if (!isNull(agree_check)) {

				        $('#agree_check').removeClass('black_border').addClass('red_border');
				        alert('Please Click on I Agree to proceed.');
				      } else {
				        $('#agree_check').removeClass('red_border').addClass('black_border');

				      }

		  	if ($('#cart_form .red_border').size() > 0)
		    {
		      $('#cart_form .red_border:first').focus();
		      $('#cart_form .alert-error').show();

		      return false;
		    } else {

		      $('#cart_form').submit();
		    }
  	}
  </script>
<script>
	function get_exam(value)
	{
		var html='<option value="">Select Examination</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/Manage_cart/get_exam_by_group",
                    data: {category_id: value},
                    async: false,
                    success: function(data)
                    {
                    	console.log(data);

                    	if(data.length>0)
                    	{
                    		for(var i=0; i<data.length; i++)
	                        {
	                            html+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
	                        }
                    	}
                        
                        
                        
                        $("#exam_id").html(html);

                    }
                });
          }
          else
          {
              $("#exam_id").html(html);
          }

	}
</script>	

<script>

	function make_effect(val)
	{
		
			if(val!='')
			{


				$('#selected_plan').val('');
				$('#selected_plan_test_qty').val('');
				$('#selected_plan_validity').val('');
				$('#selected_plan_amount').val('');
				$('#selected_plan_code').val('');

				$("#no_test").val($("#no_test option:first").val());

				if(val==1)
				{
					$(".exam-plan").css('display','none');
					$("#for_practice").css('display','block');
					$("#for_others").css('display','none');
					$("#practice").css('display','block');	
				}
				else if(val==3)
				{
					$(".exam-plan").css('display','none');
					$("#for_practice").css('display','none');
					$("#for_others").css('display','block');
					$("#knowledge").css('display','block');	
				}
				else if(val==4)
				{
					$(".exam-plan").css('display','none');
					$("#for_practice").css('display','none');
					$("#for_others").css('display','block');
					$("#knock_out").css('display','block');	
				}
				else if(val==5)
				{
					$(".exam-plan").css('display','none');
					$("#for_practice").css('display','none');
					$("#for_others").css('display','block');
					$("#qt1").css('display','block');	
				}
				else if(val==6)
				{
					$(".exam-plan").css('display','none');
					$("#for_practice").css('display','none');
					$("#for_others").css('display','block');
					$("#qt2").css('display','block');	
				}
				else
				{
					$(".exam-plan").css('display','none');
					$("#for_practice").css('display','none');
					$("#for_others").css('display','none');

				}


						
			          




			}
			else
				{

					$(".exam-plan").css('display','none');
					$("#for_practice").css('display','none');

				}


				if(val!='' && val!=1)
			          {
			            $.ajax(
			                {
			                    type: "POST",
			                    dataType:'json',
			                    url:"<?php echo base_url();?>index.php/Manage_cart/get_plan_details",
			                    data: {category_id: val},
			                    async: false,
			                    success: function(data)
			                    {
			                    	var validity=data[0].plan_month_duration;
			                    	var amount=data[0].price_per_set;
			                    	var code=data[0].plan_code;

			                    	var d = new Date();

									var month = d.getMonth()+1;
									var day = d.getDate();

									 var c_date= (day<10 ? '0' : '') + day+'-'+ (month<10 ? '0' : '') + month+'-'+d.getFullYear(); 

			                        $("#no_test").attr("onchange","get_current_plan_value_other(this.value,'"+validity+"','"+amount+"','"+code+"','"+c_date+"')");
			                        /*for(var i=0; i<data.length; i++)
			                        {
			                            html+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
			                        }
			                        //alert(html); 
			                        $("#exam_id").html(html);*/

			                    }
			                });
			          }



			
	}

</script>

<script>

	function get_current_plan_value_practice(value,validity,amount,code,current_date)
	{
		var generated_code=code+'-'+validity+'-'+amount+'-'+current_date;
			
			$("#plan_details_practice").css('display','block');
			$("#validity_plan_practice").text(validity);
			$("#amount_plan_practice").text(amount);
			$("#code_plan_practice").text(generated_code);

			$("#selected_plan").val(value);
			$("#selected_plan_validity").val(validity);
			$("#selected_plan_amount").val(amount);
			$("#selected_plan_code").val(generated_code);
	}

</script>

<script>
	function get_current_plan_value_other(value,validity,amount,code,current_date)
	{

		var test_type=$("#select-box").val();

		//alert(test_type);

		var amount=amount*value;

		var generated_code=code+'-'+value+'-'+validity+'-'+amount+'-'+current_date;

			$("#plan_details_"+test_type).css('display','block');
			$("#validity_plan_"+test_type).text(validity);
			$("#amount_plan_"+test_type).text(amount);
			$("#code_plan_"+test_type).text(generated_code);

			$("#selected_plan_test_qty").val(value);
			$("#selected_plan_validity").val(validity);
			$("#selected_plan_amount").val(amount);
			$("#selected_plan_code").val(generated_code);	
	}
</script>

<script>
	function get_plan_value_other(value)
	{

			$("#selected_plan").val(value);
			
	}
</script>