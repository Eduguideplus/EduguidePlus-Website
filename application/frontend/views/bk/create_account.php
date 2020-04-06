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
    <div class="col-md-8 col-md-offset-2 text-center log-in">


      <h3>Create account</h3>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="log-section">
          <h6 class="text-center"><strong>You are</strong></h6>

          <div class="col-md-12 register-bx">
             <ul class="nav nav-pills">
				    <li class="active"><a data-toggle="pill" href="#home">Student</a></li>
				    <li><a data-toggle="pill" href="#menu1">Parent</a></li>
				    <li><a data-toggle="pill" href="#menu2">Job Seeker</a></li>
				    <li><a data-toggle="pill" href="#menu3">Solver</a></li>
				  </ul>
				  
				  <div class="tab-content">
				    <div id="home" class="tab-pane fade in active">
				    		<h5>Student Registration</h5>

				    	<ul class="transaction-type hidden-xs hidden-sm">
				    		<li><a href="javascripts:void(0)">Free</a>
					    		<div class="tooltip-bx">
					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Website Examination Notification for lifetime</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Daily GK and English tips for 7 days</span></a></li>
					    				<h6><a href="#">To registered mail and registered mobile number</a></h6>
					    			</ul>


					    		</div>

				    		</li>
				    		<li><a href="javascripts:void(0)">Paid</a>

				    			<div class="tooltip-bx">
					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Website Examination Notification for lifetime</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Daily GK and English tips for subscription period.</span></a></li>
					    				<h6><a href="#">(To registered mail and registered mobile number)</a></h6>
					    			</ul>

					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Practice Test unlimited with respect to class registration for subscription period.</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Chat with solver</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Student to student chat</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Place your question for correct answer</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Challenge friends to attained quiz</span></a></li>
					    				
					    			</ul>


					    		</div>
				    		</li>


				    	</ul>

				    		<ul class="transaction-type hidden-md hidden-lg">
				    		<li><a href="javascripts:void(0)" data-toggle="modal" data-target="#free">Free</a>
					    		

				    		</li>
				    		<li><a href="javascripts:void(0)" data-toggle="modal" data-target="#paid">Paid</a>

				    			<div class="tooltip-bx">
					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Website Examination Notification for lifetime</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Daily GK and English tips for subscription period.</span></a></li>
					    				<h6><a href="#">(To registered mail and registered mobile number)</a></h6>
					    			</ul>

					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Practice Test unlimited with respect to class registration for subscription period.</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Chat with solver</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Student to student chat</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Place your question for correct answer</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Challenge friends to attained quiz</span></a></li>
					    				
					    			</ul>


					    		</div>
				    		</li>


				    	</ul>
				      
					          <form method="post" action="<?php echo @$this->url->link(105);?>" class="login-form creat-form" id="std_form">
					          <div class="form-group">
					              <label>Name</label>
					              <input type="text" class="form-control" placeholder="Your Name" name="st_name" id="st_name">

					              </div>
					              <div class="form-group">
					              <label>Email:</label>
					              <input type="text" class="form-control" placeholder="Your Email" name="email" id="email">

					              </div>

					               <div class="form-group">
					              <label>Password:</label>
					              <input type="password" class="form-control" placeholder="Your Password" name="password" id="password">

					              </div>


					              <div class="form-group">
					              <label>Mobile No.</label>
					              <input type="text" class="form-control" placeholder="Your Mobile Number" name="mobile" id="mobile">

					              </div>

					               <div class="form-group">
					              <label>Address:</label>
					              <textarea  class="form-control" placeholder="Your Address" name="address" id="address">
					              	
					              </textarea>

					              </div>

					              <div class="form-group">
					              <label>Country</label>
					              		<select name="country" class="form-control" onchange="get_state_name(this.value)" id="country">
											<option value="">Select Country</option>
											<?php foreach($countries as $cnt){?>
												<option value="<?php echo $cnt->id; ?>"><?php echo $cnt->name; ?></option>
												<?php } ?>
											</select>

					              </div>

					              <div class="form-group">
					              <label>State</label>
					              		<select name="State" id="state" class="form-control" onchange="get_city(this.value)">
										
													<option value="">--Select State--</option>
													<!-- <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
													<option value="Andhra Pradesh">Andhra Pradesh</option>
													<option value="Arunachal Pradesh">Arunachal Pradesh</option>
													<option value="Assam">Assam</option>
													<option value="Bihar">Bihar</option>
													<option value="Chandigarh">Chandigarh</option>
													<option value="Chhattisgarh">Chhattisgarh</option>
													<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
													<option value="Daman and Diu">Daman and Diu</option>
													<option value="Delhi">Delhi</option>
													<option value="Goa">Goa</option>
													<option value="Gujarat">Gujarat</option>
													<option value="Haryana">Haryana</option>
													<option value="Himachal Pradesh">Himachal Pradesh</option>
													<option value="Jammu and Kashmir">Jammu and Kashmir</option>
													<option value="Jharkhand">Jharkhand</option>
													<option value="Karnataka">Karnataka</option>
													<option value="Kerala">Kerala</option>
													<option value="Lakshadweep">Lakshadweep</option>
													<option value="Madhya Pradesh">Madhya Pradesh</option>
													<option value="Maharashtra">Maharashtra</option>
													<option value="Manipur">Manipur</option>
													<option value="Meghalaya">Meghalaya</option>
													<option value="Mizoram">Mizoram</option>
													<option value="Nagaland">Nagaland</option>
													<option value="Orissa">Orissa</option>
													<option value="Pondicherry">Pondicherry</option>
													<option value="Punjab">Punjab</option>
													<option value="Rajasthan">Rajasthan</option>
													<option value="Sikkim">Sikkim</option>
													<option value="Tamil Nadu">Tamil Nadu</option>
													<option value="Tripura">Tripura</option>
													<option value="Uttaranchal">Uttaranchal</option>
													<option value="Uttar Pradesh">Uttar Pradesh</option>
													<option value="West Bengal">West Bengal</option> -->
													</select>
											
											

					              </div>


					              <div class="form-group">
					              <label>City</label>
					              		<select name="city" id="city" class="form-control">
										
													<option value="">--Select City--</option>
													
													</select>
											
											

					              </div>

					               <div class="form-group">
					              <label>Area Pin Code:</label>
					              <input type="text" class="form-control" placeholder="Pin Code" name="pin_code" id="pin_code">

					              </div>

					              <div class="form-group">
					              <label>Group of Examination</label>
					            	 <select name="exam_group" id="exam_group" class="form-control" onchange="get_exam(this.value)">
										
													<option value="">--Select a Group of Examination--</option>
													<?php foreach($groups as $grp){?>
													<option value="<?php echo @$grp->id;?>"><?php echo @$grp->exam_name;?></option>
													<?php } ?>
													</select>

					              </div>

					              <div class="form-group">
					              <label>Examination</label>
					              <select name="exam_id"  id="exam_id" class="form-control">
										
													<option value="">--Select Examination--</option>
													
													
													
													</select>

					              </div>
					              <div class="form-group">
					              <label>Mobile No.</label>
					              <input type="text" class="form-control" placeholder="Your Mobile Number" name="mobile" id="mobile">

					              </div>

					              <div class="form-group">
					              <label>Language Known</label>
					              <input type="text" class="form-control" placeholder="Languages Known" name="languages" id="languages">

					              </div>

					              <div class="form-group">
						              <label class="terms"><a href="#" target="blank"> Terms and Condition</a>
										  <input type="checkbox" checked="checked" name="terms" id="terms" value="1">
										  <span class="checkmark"></span>
										</label>

					              </div>


					               <div class="form-group">
					                <button value="" type="button" class="btn read-btn" onclick="form_validation_student()">SUBMIT</button>

					               </div>


					          </form>
				    </div>
				    <div id="menu1" class="tab-pane fade">
				      	<h5>Parent Registration</h5>

				    	<ul class="transaction-type hidden-xs hidden-sm">
				    		<li><a href="javascripts:void(0)">Free</a>
					    		<div class="tooltip-bx">
					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Website Examination Notification for lifetime</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Daily GK and English tips for 7 days</span></a></li>
					    				<h6><a href="#">To registered mail and registered mobile number</a></h6>
					    			</ul>


					    		</div>

				    		</li>
				    		<li><a href="javascripts:void(0)">Paid</a>

				    			<div class="tooltip-bx">
					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Website Examination Notification for lifetime</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Daily GK and English tips for subscription period.</span></a></li>
					    				<h6><a href="#">(To registered mail and registered mobile number)</a></h6>
					    			</ul>

					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Practice Test unlimited with respect to class registration for subscription period.</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Chat with solver</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Student to student chat</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Place your question for correct answer</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Challenge friends to attained quiz</span></a></li>
					    				
					    			</ul>


					    		</div>
				    		</li>


				    	</ul>

				    		<ul class="transaction-type hidden-md hidden-lg">
				    		<li><a href="javascripts:void(0)" data-toggle="modal" data-target="#free">Free</a>
					    		

				    		</li>
				    		<li><a href="javascripts:void(0)" data-toggle="modal" data-target="#paid">Paid</a>

				    			<div class="tooltip-bx">
					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Website Examination Notification for lifetime</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Daily GK and English tips for subscription period.</span></a></li>
					    				<h6><a href="#">(To registered mail and registered mobile number)</a></h6>
					    			</ul>

					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Practice Test unlimited with respect to class registration for subscription period.</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Chat with solver</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Student to student chat</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Place your question for correct answer</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Challenge friends to attained quiz</span></a></li>
					    				
					    			</ul>


					    		</div>
				    		</li>


				    	</ul>
				      
				      
					          <form method="post" action="" class="login-form creat-form">
					          <div class="form-group">
					              <label>Name</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>
					              <div class="form-group">
					              <label>Email:</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					               <div class="form-group">
					              <label>Password:</label>
					              <input type="password" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Country</label>
					              		<select name="country" class="form-control" disabled="">
											<option value="">India</option>
											
											</select>

					              </div>

					              <div class="form-group">
					              <label>State</label>
					              		<select name="State" class="form-control">
										
													<option value="">--Select State--</option>
													<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
													<option value="Andhra Pradesh">Andhra Pradesh</option>
													<option value="Arunachal Pradesh">Arunachal Pradesh</option>
													<option value="Assam">Assam</option>
													<option value="Bihar">Bihar</option>
													<option value="Chandigarh">Chandigarh</option>
													<option value="Chhattisgarh">Chhattisgarh</option>
													<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
													<option value="Daman and Diu">Daman and Diu</option>
													<option value="Delhi">Delhi</option>
													<option value="Goa">Goa</option>
													<option value="Gujarat">Gujarat</option>
													<option value="Haryana">Haryana</option>
													<option value="Himachal Pradesh">Himachal Pradesh</option>
													<option value="Jammu and Kashmir">Jammu and Kashmir</option>
													<option value="Jharkhand">Jharkhand</option>
													<option value="Karnataka">Karnataka</option>
													<option value="Kerala">Kerala</option>
													<option value="Lakshadweep">Lakshadweep</option>
													<option value="Madhya Pradesh">Madhya Pradesh</option>
													<option value="Maharashtra">Maharashtra</option>
													<option value="Manipur">Manipur</option>
													<option value="Meghalaya">Meghalaya</option>
													<option value="Mizoram">Mizoram</option>
													<option value="Nagaland">Nagaland</option>
													<option value="Orissa">Orissa</option>
													<option value="Pondicherry">Pondicherry</option>
													<option value="Punjab">Punjab</option>
													<option value="Rajasthan">Rajasthan</option>
													<option value="Sikkim">Sikkim</option>
													<option value="Tamil Nadu">Tamil Nadu</option>
													<option value="Tripura">Tripura</option>
													<option value="Uttaranchal">Uttaranchal</option>
													<option value="Uttar Pradesh">Uttar Pradesh</option>
													<option value="West Bengal">West Bengal</option>
													</select>
											
											

					              </div>

					               <div class="form-group">
					              <label>Area Pin Code:</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Group of Examination</label>
					            	 <select name="exam_group" class="form-control">
										
													<option value="">--Select a Group of Examination--</option>
													<option value="">Engineering</option>
													<option value="">Bank</option>
													<option value="">Railway</option>
													<option value="">Clerkship</option>
													<option value="">Health</option>
													<option value="">Defense</option>

													
													</select>

					              </div>

					              <div class="form-group">
					              <label>Examination</label>
					              <select name="exam_group" class="form-control">
										
													<option value="">--Select Examination--</option>
													<option value="">JEE</option>
													<option value="">Polytechnic</option>
													<option value="">KITTEE</option>
													<option value="">West Bangal Joint</option>
													<option value="">Karnataka Joint</option>
													
													
													</select>

					              </div>
					              <div class="form-group">
					              <label>Mobile No.</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Language Known</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="sd">
					           	   <h6 class="service-detal">Student Details</h6>
					              </div>

					              <div class="form-group">
					              <label>Student Name</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Student E-mail</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Student Mobile Number</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
						              <label class="terms"><a href="#" target="blank"> Terms and Condition</a>
										  <input type="checkbox" checked="checked">
										  <span class="checkmark"></span>
										</label>

					              </div>


					               <div class="form-group">
					                <button value="" type="submit" class="btn read-btn">SUBMIT</button>

					               </div>


					          </form>
				    </div>
				    <div id="menu2" class="tab-pane fade">
				     <h5>Job Seekers Registration</h5>

				    	
				      
					          <form method="post" action="" class="login-form creat-form mt-0">
					          <div class="form-group">
					              <label>Name</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>
					              <div class="form-group">
					              <label>Email:</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					               <div class="form-group">
					              <label>Password:</label>
					              <input type="password" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Country</label>
					              		<select name="country" class="form-control" disabled="">
											<option value="">India</option>
											
											</select>

					              </div>

					              <div class="form-group">
					              <label>State</label>
					              		<select name="State" class="form-control">
										
													<option value="">--Select State--</option>
													<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
													<option value="Andhra Pradesh">Andhra Pradesh</option>
													<option value="Arunachal Pradesh">Arunachal Pradesh</option>
													<option value="Assam">Assam</option>
													<option value="Bihar">Bihar</option>
													<option value="Chandigarh">Chandigarh</option>
													<option value="Chhattisgarh">Chhattisgarh</option>
													<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
													<option value="Daman and Diu">Daman and Diu</option>
													<option value="Delhi">Delhi</option>
													<option value="Goa">Goa</option>
													<option value="Gujarat">Gujarat</option>
													<option value="Haryana">Haryana</option>
													<option value="Himachal Pradesh">Himachal Pradesh</option>
													<option value="Jammu and Kashmir">Jammu and Kashmir</option>
													<option value="Jharkhand">Jharkhand</option>
													<option value="Karnataka">Karnataka</option>
													<option value="Kerala">Kerala</option>
													<option value="Lakshadweep">Lakshadweep</option>
													<option value="Madhya Pradesh">Madhya Pradesh</option>
													<option value="Maharashtra">Maharashtra</option>
													<option value="Manipur">Manipur</option>
													<option value="Meghalaya">Meghalaya</option>
													<option value="Mizoram">Mizoram</option>
													<option value="Nagaland">Nagaland</option>
													<option value="Orissa">Orissa</option>
													<option value="Pondicherry">Pondicherry</option>
													<option value="Punjab">Punjab</option>
													<option value="Rajasthan">Rajasthan</option>
													<option value="Sikkim">Sikkim</option>
													<option value="Tamil Nadu">Tamil Nadu</option>
													<option value="Tripura">Tripura</option>
													<option value="Uttaranchal">Uttaranchal</option>
													<option value="Uttar Pradesh">Uttar Pradesh</option>
													<option value="West Bengal">West Bengal</option>
													</select>
											
											

					              </div>

					               <div class="form-group">
					              <label>Area Pin Code:</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Educational Qualification</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Medium</label>
					              <div class="clearfix"></div>
					              <div class="col-md-4 col-sm-4 col-xs-12">
					              	<label class="terms">English
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
					              </div>
					               <div class="col-md-4 col-sm-4 col-xs-12">
					              	<label class="terms">Hindi
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
					              </div>
					               <div class="col-md-4 col-sm-4 col-xs-12">
					              	<label class="terms">Other
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
					              </div>

					              </div>
					              <div class="form-group">
					              <label>Mobile No.</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Upload Copy of Highest qualification</label>
					              <input type="file" class="form-control" placeholder="">

					              </div>

					              

					              <div class="form-group">
						              <label class="terms"><a href="#" target="blank"> Terms and Condition</a>
										  <input type="checkbox" checked="checked">
										  <span class="checkmark"></span>
										</label>

					              </div>


					               <div class="form-group">
					                <button value="" type="submit" class="btn read-btn">SUBMIT</button>

					               </div>


					          </form>
				    </div>
				    <div id="menu3" class="tab-pane fade">
				     <h5>Solver Registration</h5>

				    	
				      
					          <form method="post" action="" class="login-form creat-form mt-0">
					          <div class="form-group">
					              <label>Name</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>
					              <div class="form-group">
					              <label>Email:</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					               <div class="form-group">
					              <label>Password:</label>
					              <input type="password" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Country</label>
					              		<select name="country" class="form-control" disabled="">
											<option value="">India</option>
											
											</select>

					              </div>

					              <div class="form-group">
					              <label>State</label>
					              		<select name="State" class="form-control">
										
													<option value="">--Select State--</option>
													<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
													<option value="Andhra Pradesh">Andhra Pradesh</option>
													<option value="Arunachal Pradesh">Arunachal Pradesh</option>
													<option value="Assam">Assam</option>
													<option value="Bihar">Bihar</option>
													<option value="Chandigarh">Chandigarh</option>
													<option value="Chhattisgarh">Chhattisgarh</option>
													<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
													<option value="Daman and Diu">Daman and Diu</option>
													<option value="Delhi">Delhi</option>
													<option value="Goa">Goa</option>
													<option value="Gujarat">Gujarat</option>
													<option value="Haryana">Haryana</option>
													<option value="Himachal Pradesh">Himachal Pradesh</option>
													<option value="Jammu and Kashmir">Jammu and Kashmir</option>
													<option value="Jharkhand">Jharkhand</option>
													<option value="Karnataka">Karnataka</option>
													<option value="Kerala">Kerala</option>
													<option value="Lakshadweep">Lakshadweep</option>
													<option value="Madhya Pradesh">Madhya Pradesh</option>
													<option value="Maharashtra">Maharashtra</option>
													<option value="Manipur">Manipur</option>
													<option value="Meghalaya">Meghalaya</option>
													<option value="Mizoram">Mizoram</option>
													<option value="Nagaland">Nagaland</option>
													<option value="Orissa">Orissa</option>
													<option value="Pondicherry">Pondicherry</option>
													<option value="Punjab">Punjab</option>
													<option value="Rajasthan">Rajasthan</option>
													<option value="Sikkim">Sikkim</option>
													<option value="Tamil Nadu">Tamil Nadu</option>
													<option value="Tripura">Tripura</option>
													<option value="Uttaranchal">Uttaranchal</option>
													<option value="Uttar Pradesh">Uttar Pradesh</option>
													<option value="West Bengal">West Bengal</option>
													</select>
											
											

					              </div>

					               <div class="form-group">
					              <label>Area Pin Code:</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Educational Qualification</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Medium</label>
					              <div class="clearfix"></div>
					              <div class="col-md-4 col-sm-4 col-xs-12">
					              	<label class="terms">English
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
					              </div>
					               <div class="col-md-4 col-sm-4 col-xs-12">
					              	<label class="terms">Hindi
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
					              </div>
					               <div class="col-md-4 col-sm-4 col-xs-12">
					              	<label class="terms">Other
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
					              </div>

					              </div>
					              <div class="form-group">
					              <label>Mobile No.</label>
					              <input type="text" class="form-control" placeholder="">

					              </div>

					              <div class="form-group">
					              <label>Upload Copy of Highest qualification</label>
					              <input type="file" class="form-control" placeholder="">

					              </div>

					              

					              <div class="form-group">
						              <label class="terms"><a href="#" target="blank"> Terms and Condition</a>
										  <input type="checkbox" checked="checked">
										  <span class="checkmark"></span>
										</label>

					              </div>


					               <div class="form-group">
					                <button value="" type="submit" class="btn read-btn">SUBMIT</button>

					               </div>


					          </form>
				    </div>
				  </div>
          </div>

         
          <h5 class="or">OR</h5>

         

          <div class="clearfix"></div>



          <p>Already have an account?<a href="#"> Signin</a></p>

        </div>

      </div>

       
      

    </div>
   
   





  </div>
</div>
</div>






<div id="free" class="modal fade create-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="tooltip-bx">
					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Website Examination Notification for lifetime</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Daily GK and English tips for 7 days</span></a></li>
					    				<h6><a href="#">To registered mail and registered mobile number</a></h6>
					    			</ul>


					    		</div>
      </div>
      
    </div>

  </div>
</div>


<div id="paid" class="modal fade create-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="tooltip-bx">
					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Website Examination Notification for lifetime</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Daily GK and English tips for subscription period.</span></a></li>
					    				<h6><a href="#">(To registered mail and registered mobile number)</a></h6>
					    			</ul>

					    			<ul>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Practice Test unlimited with respect to class registration for subscription period.</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Chat with solver</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Student to student chat</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Place your question for correct answer</span></a></li>
					    				<li><a><i class="fa fa-check" aria-hidden="true"></i><span> Challenge friends to attained quiz</span></a></li>
					    				
					    			</ul>


					    		</div>
      </div>
      
    </div>

  </div>
</div>


<script>
	function get_state_name(value)
	{
		//alert(val);

		var html='<option value="">Select State</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/Sign_up/get_states",
                    data: {category_id: value},
                    async: false,
                    success: function(data)
                    {

                        //alert(data[0].category_id);
                        for(var i=0; i<data.length; i++)
                        {
                            html+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        }
                        //alert(html); 
                        $("#state").html(html);

                    }
                });
          }
          else
          {
              $("#state").html(html);
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
                    url:"<?php echo base_url();?>index.php/Sign_up/get_exam_by_group",
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
	function get_city(value)
	{
		var html='<option value="">Select City</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/Sign_up/get_city_by_state",
                    data: {category_id: value},
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


<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>


 <script>
  function validation_student()
  {
    var st_name = $('#st_name').val();
      if (!isNull(st_name)) {
        $('#st_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#st_name').removeClass('red_border').addClass('black_border');
      }

      var email = $('#email').val();
      if (!isNull(email)) {
        $('#email').removeClass('black_border').addClass('red_border');
      } else {
      	if(!isEmail(email))
      	{
      		 $('#email').removeClass('black_border').addClass('red_border');
      	}
      	else
      	{
      		$('#email').removeClass('red_border').addClass('black_border');
      	}
        
      }

      var password = $('#password').val();
      if (!isNull(password)) {
        $('#password').removeClass('black_border').addClass('red_border');
      } else {
        $('#password').removeClass('red_border').addClass('black_border');
      }


        var address = $('#address').val();
      if (!isNull(address)) {
        $('#address').removeClass('black_border').addClass('red_border');
      } else {
        $('#address').removeClass('red_border').addClass('black_border');
      }


       var country = $('#country').val();
      if (!isNull(country)) {
        $('#country').removeClass('black_border').addClass('red_border');
      } else {
        $('#country').removeClass('red_border').addClass('black_border');
      }


       var state = $('#state').val();
      if (!isNull(state)) {
        $('#state').removeClass('black_border').addClass('red_border');
      } else {
        $('#state').removeClass('red_border').addClass('black_border');
      }

       var city = $('#city').val();
      if (!isNull(city)) {
        $('#city').removeClass('black_border').addClass('red_border');
      } else {
        $('#city').removeClass('red_border').addClass('black_border');
      }

       var pin_code = $('#pin_code').val();
      if (!isNull(pin_code)) {
        $('#pin_code').removeClass('black_border').addClass('red_border');
      } else {
        $('#pin_code').removeClass('red_border').addClass('black_border');
      }

       var exam_group = $('#exam_group').val();
      if (!isNull(exam_group)) {
        $('#exam_group').removeClass('black_border').addClass('red_border');
      } else {
        $('#exam_group').removeClass('red_border').addClass('black_border');
      }


 		var exam_id = $('#exam_id').val();
      if (!isNull(exam_id)) {
        $('#exam_id').removeClass('black_border').addClass('red_border');
      } else {
        $('#exam_id').removeClass('red_border').addClass('black_border');
      }


      	var mobile = $('#mobile').val();
      if (!isNull(mobile)) {
        $('#mobile').removeClass('black_border').addClass('red_border');
      } else {
        $('#mobile').removeClass('red_border').addClass('black_border');
      }


      	var languages = $('#languages').val();
      if (!isNull(languages)) {
        $('#languages').removeClass('black_border').addClass('red_border');
      } else {
        $('#languages').removeClass('red_border').addClass('black_border');
      }

       if ($("#terms").prop('checked')!=true) {
        $('#terms').removeClass('black_border').addClass('red_border');
      } else {
        $('#terms').removeClass('red_border').addClass('black_border');
      }







      
  }
  function form_validation_student()
  {
  
   
    $('#std_form').attr('onchange', 'validation_student()');
    $('#std_form').attr('onkeyup', 'validation_student()');

     validation_student();
    //alert($('#contact_form .red_border').size());

    if ($('#std_form .red_border').size() > 0)
    {
      $('#std_form .red_border:first').focus();
      $('#std_form .alert-error').show();
      return false;
    } else {

      $('#std_form').submit();
    }

  }

  </script>