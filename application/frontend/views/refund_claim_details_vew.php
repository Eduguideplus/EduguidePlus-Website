

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

                          <h3 class="title mt-10">Claimed Refund Details</h3>

                       <!--    <p>(Notification for last date of claim if users rank but not yet claim)</p> -->

                         




                         

                          <div class="col-md-12 col-sm-12 col-xs-12 res480-pl-0 res480-pr-0">
                              <div class="myprofile-field claim-field">
                              			<h4>Welcome <?php echo @$user[0]->user_name; ?></h4>
                              			<!-- <h6>Congratulations! We're all so proud of you!</h6> -->
 
                              			 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0">
                                              <div class="form-group award-check">
                                             <label>Refund Received by :</label>
                                             <div class="clearfix"></div>

                                             	<ul class="award-ul">

                            <?php if(@$user_refund[0]->claim_type=='Cheque'){ ?>                    
                                <li>
                          <label class="award-label"> Cheque
														  <input type="radio" name="radio" value="Cheque" id="chkPassport1" onclick="get_claim_type(this.value);" checked>
														  <span class="checkmark"></span>
														</label></li> <?php } if(@$user_refund[0]->claim_type=='NEFT'){ ?>

														<li>
															<label class="award-label"> Bank Transfer (NEFT)
															  <input type="radio" name="radio" id="chkPassport" value="NEFT" onclick="get_claim_type(this.value);" <?php if(@$user_award[0]->award_amount>1000){ echo "checked"; } ?> checked>
															  <span class="checkmark"></span>
															</label>
															
														</li>

                          <?php } ?>
                                             	</ul>

                                             	<div class="clearfix"></div>

                                             	<!--<p>If Cheque Full Address of corresponding</p>-->
                                                 
                                              </div>
                                          </div>










                            <?php if(@$user_refund[0]->claim_type=='Cheque'){ ?>   

                                  <form action="<?php echo base_url();?>My_profile/claim_refund_submit" method="post" class="profile-form awerd-form " id="dvPassport1">   
                                         <div class="row">
                                       
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Refund Status</label>
                                                  <input type="text"  value="<?php echo @$user_refund[0]->status; ?>" readonly>
                                              </div>
                                          </div>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                         


<input type="hidden" name="claim_type" id="claim_type" value="">
<input type="hidden" name="set_id" value="<?php echo $this->uri->segment(2); ?>">
                                          <div class="form-group">
                                              <label>Name</label>
                                                  <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter Your Name" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32' value="<?php echo @$user_refund[0]->user_name; ?>" readonly>
                                              </div>
                                          </div>
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Father Name</label>
                                                  <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter Your Father Name" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32' value="<?php echo @$user_refund[0]->father_name; ?>" readonly>
                                              </div>
                                          </div>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group ">
                                              <label>Address 1</label>
                                                  <textarea class="" name="address_1" id="address_1" cols="60" rows="5" placeholder="Enter Your Address 1"><?php echo @$user_refund[0]->address_1; ?></textarea>
                                              </div>
                                          </div>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group ">
                                              <label>Address 2</label>
                                                  <textarea class=""  name="address_2" id="address_2" cols="60" rows="5" placeholder="Enter Your Address 2"> <?php echo @$user_refund[0]->address_2; ?> </textarea>
                                              </div>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Mobile No</label>
                                                  <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Enter Your Mobile No" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" value="<?php echo @$user_refund[0]->phone_number; ?>" readonly>
                                              </div>
                                          </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadd-left">
                                          <div class="form-group ">
                                             <label>City</label>
                                                   <select name="city" id="city" class="form-control" readonly>
													   <option value="">------------Select City------------</option>
															  <option value="Ahmedabad" <?php if(@$user_refund[0]->city=='Ahmedabad'){ echo 'selected';} ?>>Ahmedabad</option> 
																<option value="Bengaluru/Bangalore" <?php if(@$user_refund[0]->city=='Bengaluru/Bangalore'){ echo 'selected';} ?>>Bengaluru/Bangalore</option>
																<option value="Chandigarh"<?php if(@$user_refund[0]->city=='Chandigarh'){ echo 'selected';} ?>>Chandigarh</option>
																<option value="Chennai" <?php if(@$user_refund[0]->city=='Chennai'){ echo 'selected';} ?>>Chennai</option>
																<option value="Delhi" <?php if(@$user_refund[0]->city=='Delhi'){ echo 'selected';} ?>>Delhi</option>
																<option value="Gurgaon" <?php if(@$user_refund[0]->city=='Gurgaon'){ echo 'selected';} ?>>Gurgaon</option>
																<option value="Hyderabad/Secunderabad" <?php if(@$user_refund[0]->city=='Hyderabad/Secunderabad'){ echo 'selected';} ?>>Hyderabad/Secunderabad</option>
																<option value="Kolkata" <?php if(@$user_refund[0]->city=='Kolkata'){ echo 'selected';} ?>>Kolkata</option>
																<option value="Mumbai" <?php if(@$user_refund[0]->city=='Mumbai'){ echo 'selected';} ?>>Mumbai</option>
																<option value="Noida" <?php if(@$user_refund[0]->city=='Noida'){ echo 'selected';} ?>>Noida</option>
																<option value="Pune" <?php if(@$user_refund[0]->city=='Pune'){ echo 'selected';} ?>>Pune</option>
													</select>
                                              </div>
                                          </div>
                                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadd-left">
                                          <div class="form-group ">
                                             <label>State</label>
                                                  <select name="state" id="state" class="form-control" readonly>
													  <option value="">------------Select State------------</option>
															<option value="Andaman and Nicobar Islands"  <?php if(@$user_refund[0]->state=='Andaman and Nicobar Islands'){ echo 'selected';} ?>>Andaman and Nicobar Islands</option>
															<option value="Andhra Pradesh" <?php if(@$user_refund[0]->state=='Andhra Pradesh'){ echo 'selected';} ?>>Andhra Pradesh</option>
															<option value="Arunachal Pradesh" <?php if(@$user_refund[0]->state=='Arunachal Pradesh'){ echo 'selected';} ?>>Arunachal Pradesh</option>
															<option value="Assam" <?php if(@$user_refund[0]->state=='Assam'){ echo 'selected';} ?>>Assam</option>
															<option value="Bihar" <?php if(@$user_refund[0]->state=='Bihar'){ echo 'selected';} ?>>Bihar</option>
															<option value="Chandigarh" <?php if(@$user_refund[0]->state=='Chandigarh'){ echo 'selected';} ?>>Chandigarh</option>
															<option value="Chhattisgarh" <?php if(@$user_refund[0]->state=='Chhattisgarh'){ echo 'selected';} ?>>Chhattisgarh</option>
															<option value="Dadra and Nagar Haveli" <?php if(@$user_refund[0]->state=='Dadra and Nagar Haveli'){ echo 'selected';} ?>>Dadra and Nagar Haveli</option>
															<option value="Daman and Diu" <?php if(@$user_refund[0]->state=='Daman and Diu'){ echo 'selected';} ?>>Daman and Diu</option>
															<option value="Delhi" <?php if(@$user_refund[0]->state=='Delhi'){ echo 'selected';} ?>>Delhi</option>
															<option value="Goa" <?php if(@$user_refund[0]->state=='Goa'){ echo 'selected';} ?>>Goa</option>
															<option value="Gujarat" <?php if(@$user_refund[0]->state=='Gujarat'){ echo 'selected';} ?>>Gujarat</option>
															<option value="Haryana" <?php if(@$user_refund[0]->state=='Haryana'){ echo 'selected';} ?>>Haryana</option>
															<option value="Himachal Pradesh" <?php if(@$user_refund[0]->state=='Himachal Pradesh'){ echo 'selected';} ?>>Himachal Pradesh</option>
															<option value="Jammu and Kashmir" <?php if(@$user_refund[0]->state=='Jammu and Kashmir'){ echo 'selected';} ?>>Jammu and Kashmir</option>
															<option value="Jharkhand" <?php if(@$user_refund[0]->state=='Jharkhand'){ echo 'selected';} ?>>Jharkhand</option>
															<option value="Karnataka" <?php if(@$user_refund[0]->state=='Karnataka'){ echo 'selected';} ?>>Karnataka</option>
															<option value="Kerala" <?php if(@$user_refund[0]->state=='Kerala'){ echo 'selected';} ?>>Kerala</option>
															<option value="Lakshadweep" <?php if(@$user_refund[0]->state=='Lakshadweep'){ echo 'selected';} ?>>Lakshadweep</option>
															<option value="Madhya Pradesh" <?php if(@$user_refund[0]->state=='Madhya Pradesh'){ echo 'selected';} ?>>Madhya Pradesh</option>
															<option value="Maharashtra" <?php if(@$user_refund[0]->state=='Maharashtra'){ echo 'selected';} ?>>Maharashtra</option>
															<option value="Manipur" <?php if(@$user_refund[0]->state=='Manipur'){ echo 'selected';} ?>>Manipur</option>
															<option value="Meghalaya" <?php if(@$user_refund[0]->state=='Meghalaya'){ echo 'selected';} ?>>Meghalaya</option>
															<option value="Mizoram" <?php if(@$user_refund[0]->state=='Mizoram'){ echo 'selected';} ?>>Mizoram</option>
															<option value="Nagaland" <?php if(@$user_refund[0]->state=='Nagaland'){ echo 'selected';} ?>>Nagaland</option>
															<option value="Orissa" <?php if(@$user_refund[0]->state=='Orissa'){ echo 'selected';} ?>>Orissa</option>
															<option value="Pondicherry" <?php if(@$user_refund[0]->state=='Pondicherry'){ echo 'selected';} ?>>Pondicherry</option>
															<option value="Punjab" <?php if(@$user_refund[0]->state=='Punjab'){ echo 'selected';} ?>>Punjab</option>
															<option value="Rajasthan" <?php if(@$user_refund[0]->state=='Rajasthan'){ echo 'selected';} ?>>Rajasthan</option>
															<option value="Sikkim" <?php if(@$user_refund[0]->state=='Sikkim'){ echo 'selected';} ?>>Sikkim</option>
															<option value="Tamil Nadu" <?php if(@$user_refund[0]->state=='Tamil Nadu'){ echo 'selected';} ?>>Tamil Nadu</option>
															<option value="Tripura" <?php if(@$user_refund[0]->state=='Tripura'){ echo 'selected';} ?>>Tripura</option>
															<option value="Uttaranchal" <?php if(@$user_refund[0]->state=='Uttaranchal'){ echo 'selected';} ?>>Uttaranchal</option>
															<option value="Uttar Pradesh" <?php if(@$user_refund[0]->state=='Uttar Pradesh'){ echo 'selected';} ?>>Uttar Pradesh</option>
															<option value="West Bengal" <?php if(@$user_refund[0]->state=='West Bengal'){ echo 'selected';} ?>>West Bengal</option>
													</select>
                                              </div>
                                          </div>
                                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                             <label>Pin Code</label>
                                                  <input type="text" name="pincode" id="pincode" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="6" placeholder="Enter Your Pin Code" value="<?php echo @$user_refund[0]->pin; ?>" readonly>
                                              </div>
                                          </div>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                             <label>Examination Code</label>
                                                  <input type="text" name="examination_code" id="examination_code" class="form-control" placeholder="Enter Your Examination Code"  value="<?php echo @$knowledge[0]->set_code; ?>" readonly>
                                              </div>
                                          </div>
                                         

                                         <!--  <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">
                                          <button type="button" onclick="return  cheque_validation()" class="site-button hvr-sweep-to-right">Submit</button>
                                          </div> -->

                                         </div>
                                      </form>
<?php } if(@$user_refund[0]->claim_type=='NEFT'){ ?>
                                      <form action="<?php echo base_url();?>My_profile/claim_refund_submit" method="post" class="profile-form awerd-form " id="dvPassport">
                                       

                                         <div class="row">
                                                                                 
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Refund Status</label>
                                                  <input type="text"  value="<?php echo @$user_refund[0]->status; ?>" readonly>
                                              </div>
                                          </div>
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Name (As Per Bank A/c)</label>
                                                  <input type="text" name="full_name1" id="full_name1" class="form-control" placeholder="Enter Your Name (As Per Bank A/c)" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32' value="<?php echo @$user_refund[0]->user_name; ?>" readonly >
                                              </div>
                                          </div>

<input type="hidden" name="claim_type" id="claim_type1" value="">
<input type="hidden" name="set_id" value="<?php echo $this->uri->segment(2); ?>">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Father / Mother Name</label>
                                                  <input type="text" name="father_name1" id="father_name1" class="form-control" placeholder="Enter Your Father / Mother Name" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32' value="<?php echo @$user_refund[0]->father_name; ?>" readonly>
                                              </div>
                                          </div>

                                        
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                              <label>Bank a/c Number</label>
                                                  <input type="text" name="account_number"  id="account_number" class="form-control" placeholder="Enter Your Bank a/c Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo @$user_refund[0]->bank_ac_number; ?>" readonly>
                                              </div>
                                          </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadd-left">
                                          <div class="form-group ">
                                             <label>IFSC code</label>
                                                  <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" placeholder="Enter Your IFSC code" value="<?php echo @$user_refund[0]->ifsc_code; ?>" readonly>
                                              </div>
                                          </div>
                                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadd-left">
                                          <div class="form-group ">
                                             <label>Branch</label>
                                                  <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Your Brach" value="<?php echo @$user_refund[0]->bank_branch_name; ?>" readonly>
                                              </div>
                                          </div>
                                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                             <label>Mobile No</label>
                                                  <input type="text" name="phone_number1" id="phone_number1" class="form-control" placeholder="Enter Your Mobile No" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" value="<?php echo @$user_refund[0]->phone_number; ?>" readonly>
                                              </div>
                                          </div>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                             <label>Examination Code</label>
                                                  <input type="text" name="examination_code1" id="examination_code1" class="form-control" placeholder="Enter Your Examination Code" value="<?php echo @$knowledge[0]->set_code; ?>" readonly>
                                              </div>
                                          </div>
                                         

                                          <!-- <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">
                                          <button type="button" onclick="return neft_validation();"  class="site-button hvr-sweep-to-right">Apply</button>
                                          </div> -->

                                         </div>
                                      </form>

<?php } ?>

                              </div>
                          </div>


                        </div>
                  </div>

  			</div>

  		</div>

  </div>
 </div>
</div>

<script src="<?php echo base_url();?>assets/custom_script/validation_rulse.js"></script>
<script type="text/javascript">
 

  function get_claim_type(value){

   $('#claim_type').val(value);
    $('#claim_type1').val(value);
  }



</script>


