
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
  				<?php if($this->session->flashdata('succ_msg')!=''){?>
  				<p style="color:#47f547;font-weight: bold;"><?php echo $this->session->flashdata('succ_msg'); ?></p>
  				<?php } ?>
  			<h3 id="chead">Plan Confirmation</h3>
  			<h5 id="ctext">(After checking plan details,click on 'Pay & Save' button to buy this plan)</h5>
  		</div>


  		<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 cart-form">
  			<div class="rank-bx about-exam">
  				
  				
  						<div class="about-exam-text p-20">
	  							<form class="cart-formfield" action="<?php echo $this->url->link(115);?>" method="post" id="cart_form">


	  									


									 <table class="table table-bordered">
									    <thead>
									      <tr>
									        <th>Plan Name</th>
									        <th>Examination</th>
									        <th>No. of Test</th>
									         <th>Plan Code</th>
									        <th>Validity</th>
									        <th>Amount(INR)</th>
									       
									      </tr>
									    </thead>
									    <tbody>

										<?php 
										$payableAmout=0;
										foreach($cart_dtls as $cd){
											$payableAmout=$payableAmout+$cd->price;
											?>
									      <tr>
									        <td><?php 
									        $plan = $this->home_model->selectOne('tbl_plan','id',$cd->plan_id);
									        echo $plan[0]->plan_title;?></td>
									        <td><?php 
									        if($cd->exam_id!=0)
									        {
									        	$exam = $this->home_model->selectOne('tbl_exam_type','id',$cd->exam_id);
									        	echo @$exam[0]->exam_name;
									        }
									        else
									        {
									        	echo 'N/A';
									        }
									        ?></td>
									        <td><?php if(@$cd->test_qty!=0){ echo @$cd->test_qty;}else{
									        	echo 'N/A'; }?></td>
									         <td><?php echo $cd->plan_code;?></td>
									        <td><?php echo $cd->plan_validity;?> Months</td>
									        <td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $cd->price;?></td>
									      
									      </tr>
									      <?php } ?>


									      
									    </tbody>
									  </table>

	  									

               
               <input type="hidden" name="cart_id" id="cart_id" value="<?php echo @$cart_dtls[0]->id;?>">










                            </div>
	  									</div>






	  										
	  										<div class="clearfix"></div>


	  										











	  							</form>

	  							<div class="form-group text-center">

											


	  											<button type="buton" value="" class="save-pay" onclick="submitform();">Confirm & Pay</button>



	  										</div>

  						</div>
  					
  				

        
  			


  			</div>




  		</div>

<a href="<?php echo $this->url->link(103);?>" value="" class="btn btn-danger text-left" style="float:left;margin-bottom: 10px;">Back</a>



	  											



	  										</div>


  </div>
  </div>
  </div>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

  <script type="text/javascript">
    

    function submitform()
    {
      var payable_amount='<?php echo $payableAmout; ?>';
      var prefill_email='<?php echo $userDetails[0]->login_email; ?>';
      var prefill_contact='<?php echo $userDetails[0]->login_mob; ?>';
      var user_id='<?php echo $userDetails[0]->id; ?>';
      var amount = parseFloat(payable_amount);
      var total = parseFloat(amount*100);
   


    var options = {
    "key": "rzp_live_sJt0PNYWKssHDo",
    "amount": total,
  
    "name": "Surajit Pramanick",
    "description": 'Plan Payment',


    "image": "<?php echo base_url();?>assets/images/site-logo.png",
    "handler": function (response){

      $("#cart_form").submit();

    },
    "prefill": {
        "contact": prefill_contact,
        "email": prefill_email
    },

    
};


var rzp1 = new Razorpay(options);
   $('#rzp-button1').html('Pay ');
                         rzp1.open();
                         e.preventDefault();
    }
  </script>

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

                        
                        for(var i=0; i<data.length; i++)
                        {
                            html+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
                        }
                        //alert(html); 
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