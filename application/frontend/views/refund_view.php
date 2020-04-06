

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
  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
  			<h3>Claim</h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">
  			<div class="my-account-wrapper">
  			
  			<?php $this->load->view('account_sidebar'); ?>


  			   <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 res480-pl-0 res480-pr-0 ">

                        <div class="myaccount-field myaccount-widget">

                          <h3 class="title mt-10">Claim Refund</h3>

                       <!--    <p>(Notification for last date of claim if users rank but not yet claim)</p> -->

                         




                         

                          <div class="col-md-12 col-sm-12 col-xs-12 res480-pl-0 res480-pr-0">
                              <div class="myprofile-field claim-field">
                              			<h4>Welcome <?php echo @$user[0]->user_name; ?></h4>
                              			<!-- <h6>Congratulations! We're all so proud of you!</h6> -->
 
                              			 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0">
                                              <div class="form-group award-check">
                                             <label>Refund Receive by :</label>
                                             <div class="clearfix"></div>

                                             	<ul class="award-ul">
                                             		<li>
                                             		<label class="award-label"> Cheque
														  <input type="radio" name="radio" value="Cheque" id="chkPassport1" onclick="get_claim_type(this.value);">
														  <span class="checkmark"></span>
														</label></li>

														<li>
															<label class="award-label"> Bank Transfer (NEFT)
															  <input type="radio" name="radio" id="chkPassport" value="NEFT" onclick="get_claim_type(this.value);" <?php if(@$user_award[0]->award_amount>1000){ echo "checked"; } ?> >
															  <span class="checkmark"></span>
															</label>
															
														</li>
                                             	</ul>

                                             	<div class="clearfix"></div>

                                             	<!--<p>If Cheque Full Address of corresponding</p>-->
                                                 
                                              </div>
                                          </div>










                                  <form action="<?php echo base_url();?>My_profile/claim_refund_submit" method="post" class="profile-form awerd-form awerd" id="dvPassport1">   
                                         <div class="row">
                                       
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                         


<input type="hidden" name="claim_type" id="claim_type" value="">
<input type="hidden" name="set_id" value="<?php echo $this->uri->segment(2); ?>">
                                          <div class="form-group">
                                              <label>Name</label>
                                                  <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter Your Name" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32'>
                                              </div>
                                          </div>
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Father Name</label>
                                                  <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter Your Father Name" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32'>
                                              </div>
                                          </div>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group ">
                                              <label>Address 1</label>
                                                  <textarea class="" name="address_1" id="address_1" cols="60" rows="5" placeholder="Enter Your Address 1"></textarea>
                                              </div>
                                          </div>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group ">
                                              <label>Address 2</label>
                                                  <textarea class=""  name="address_2" id="address_2" cols="60" rows="5" placeholder="Enter Your Address 2"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Mobile No</label>
                                                  <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Enter Your Mobile No" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                                              </div>
                                          </div>

                          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadd-left">
                            <div class="form-group ">
                              <label>State</label>
                              <select name="state" id="state" onchange="get_city_by_state(this.value);" class="form-control">
													   <option value="">Select State</option>
                             <?php 
                             foreach($state as $row)
                              {
                                ?>
                        <option value="<?php echo $row->id?>"><?php echo $row->name?></option>
														  
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadd-left">
                            <div class="form-group ">
                              <label>City</label>
                              <select name="city" id="city" class="form-control">
                             <option value="">Select City</option>
                              </select>
                          </div>
                        </div>


                                           
                                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                             <label>Pin Code</label>
                                                  <input type="text" name="pincode" id="pincode" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="6" placeholder="Enter Your Pin Code">
                                              </div>
                                          </div>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                             <label>Examination Code</label>
                                                  <input type="text" name="examination_code" id="examination_code" class="form-control" placeholder="Enter Your Examination Code"  value="<?php echo @$knowledge[0]->set_code; ?>" readonly>
                                              </div>
                                          </div>
                                         

                                          <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">
                                          <button type="button" onclick="return  cheque_validation()" class="site-button hvr-sweep-to-right">Submit</button>
                                          </div>

                                         </div>
                                      </form>

                                      <form action="<?php echo base_url();?>My_profile/claim_refund_submit" method="post" class="profile-form awerd-form awerd1" id="dvPassport">
                                       

                                         <div class="row">
                                          
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Name (As Per Bank A/c)</label>
                                                  <input type="text" name="full_name1" id="full_name1" class="form-control" placeholder="Enter Your Name (As Per Bank A/c)" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32'>
                                              </div>
                                          </div>

<input type="hidden" name="claim_type" id="claim_type1" value="">
<input type="hidden" name="set_id" value="<?php echo $this->uri->segment(2); ?>">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Father / Mother Name</label>
                                                  <input type="text" name="father_name1" id="father_name1" class="form-control" placeholder="Enter Your Father / Mother Name" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32'>
                                              </div>
                                          </div>

                                        
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Bank a/c Number</label>
                                                  <input type="text" name="account_number"  id="account_number" class="form-control" placeholder="Enter Your Bank a/c Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                                              </div>
                                          </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadd-left">
                                          <div class="form-group ">
                                             <label>IFSC code</label>
                                                  <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" placeholder="Enter Your IFSC code">
                                              </div>
                                          </div>
                                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadd-left">
                                          <div class="form-group ">
                                             <label>Brach</label>
                                                  <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Your Brach">
                                              </div>
                                          </div>
                                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                             <label>Mobile No</label>
                                                  <input type="text" name="phone_number1" id="phone_number1" class="form-control" placeholder="Enter Your Mobile No" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
                                              </div>
                                          </div>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                             <label>Examination Code</label>
                                                  <input type="text" name="examination_code1" id="examination_code1" class="form-control" placeholder="Enter Your Examination Code" value="<?php echo @$knowledge[0]->set_code; ?>" readonly>
                                              </div>
                                          </div>
                                         

                                          <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">
                                          <button type="button" onclick="return neft_validation();"  class="site-button hvr-sweep-to-right">Apply</button>
                                          </div>

                                         </div>
                                      </form>



                              </div>
                          </div>


                        </div>
                  </div>

  			</div>

  		</div>

  </div>
 </div>
</div>

<script type="text/javascript">
  function get_city_by_state(value)
  {

    var html='<option value="">Select City</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/My_profile/get_city_by_state",
                    data: {state_id: value},
                    async: false,
                    success: function(data)
                    {

                        
                        for(var i=0; i<data.length; i++)
                        {
                            html+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        }
                        //alert(html); 
                        $("#city").html(html);

                    }
                });
          }
          else
          {
              $("#city").html(html);
          }

  }
</script>

<script src="<?php echo base_url();?>assets/custom_script/validation_rulse.js"></script>
<script type="text/javascript">
 

  function get_claim_type(value){

   $('#claim_type').val(value);
    $('#claim_type1').val(value);
  }



</script>


<script type="text/javascript">

  function data_Submit_fm()
  {

  /*  alert('ok');*/
        var full_name=$("#full_name").val();       
        if (full_name=="") 
        {
            $('#full_name').removeClass('black_border').addClass('red_border');
        } 
        else 
        {
            $('#full_name').removeClass('red_border').addClass('black_border');               
        }

        var father_name=$("#father_name").val();
        if (father_name=="" ) 
        {
            $('#father_name').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#father_name').removeClass('red_border').addClass('black_border');
        }

        

     
        var address_1=$("#address_1").val();
        if (address_1=="") 
        {
            $('#address_1').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#address_1').removeClass('red_border').addClass('black_border');
        }

     var address_2=$("#address_2").val();
        if (address_2=="") 
        {
            $('#address_2').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#address_2').removeClass('red_border').addClass('black_border');
        }


        var phone_number=$("#phone_number").val();
        if (phone_number=="") 
        {
            $('#phone_number').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#phone_number').removeClass('red_border').addClass('black_border');
        }

        var city=$("#city").val();
 if (city=="")         {
            $('#city').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#city').removeClass('red_border').addClass('black_border');
        }

   

  var state=$("#state").val();
        if (state=="") 
        {
            $('#state').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#state').removeClass('red_border').addClass('black_border');
        }
  
        var pincode=$("#pincode").val();
        if (pincode=="") 
        {
            $('#pincode').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#pincode').removeClass('red_border').addClass('black_border');
        }
       var examination_code=$("#examination_code").val();
        if (examination_code=="") 
        {
            $('#examination_code').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#examination_code').removeClass('red_border').addClass('black_border');
        }
  
      
      
        

  }
  function cheque_validation()
  {
     
   
        $('#dvPassport1').attr('onchange', 'data_Submit_fm()');
        $('#dvPassport1').attr('onkeypress', 'data_Submit_fm()');

        data_Submit_fm();

        if ($('#dvPassport1 .red_border').size() > 0)
        {

            $('#dvPassport1 .red_border:first').focus();
            $('#dvPassport1 .alert-error').show();
            return false;
        } 

        

        else {

        $("#dvPassport1").submit();
      }
        

  }
 
 </script>

 <script type="text/javascript">

  function data_Submit_fm1()
  {

  /*  alert('ok');*/
        var full_name1=$("#full_name1").val();       
        if (full_name1=="") 
        {
            $('#full_name1').removeClass('black_border').addClass('red_border');
        } 
        else 
        {
            $('#full_name1').removeClass('red_border').addClass('black_border');               
        }

        var father_name1=$("#father_name1").val();
        if (father_name1=="" ) 
        {
            $('#father_name1').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#father_name1').removeClass('red_border').addClass('black_border');
        }

             var account_number=$("#account_number").val();
 if (account_number=="")         {
            $('#account_number').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#account_number').removeClass('red_border').addClass('black_border');
        }

   

  var ifsc_code=$("#ifsc_code").val();
        if (ifsc_code=="") 
        {
            $('#ifsc_code').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#ifsc_code').removeClass('red_border').addClass('black_border');
        }
  
        var branch_name=$("#branch_name").val();
        if (branch_name=="") 
        {
            $('#branch_name').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#branch_name').removeClass('red_border').addClass('black_border');
        }  

     


        var phone_number1=$("#phone_number1").val();
        if (phone_number1=="") 
        {
            $('#phone_number1').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#phone_number1').removeClass('red_border').addClass('black_border');
        }

 
       var examination_code1=$("#examination_code1").val();
        if (examination_code1=="") 
        {
            $('#examination_code1').removeClass('black_border').addClass('red_border');            
        } 
        else 
        {
            $('#examination_code1').removeClass('red_border').addClass('black_border');
        }
  
      
      
        

  }
  function neft_validation()
  {
     
   
        $('#dvPassport').attr('onchange', 'data_Submit_fm1()');
        $('#dvPassport').attr('onkeypress', 'data_Submit_fm1()');

        data_Submit_fm1();

        if ($('#dvPassport .red_border').size() > 0)
        {

            $('#dvPassport .red_border:first').focus();
            $('#dvPassport .alert-error').show();
            return false;
        } 

        

        else {

        $("#dvPassport").submit();
      }
        

  }
 
 </script>
