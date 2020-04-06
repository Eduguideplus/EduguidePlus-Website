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
          <h6 class="text-center" style="color:#21B6A8;"><strong><?php if($this->session->flashdata('succ_msg')!=''){echo $this->session->flashdata('succ_msg'); }?></strong></h6>

          <div class="col-md-12 register-bx">
             <!-- <ul class="nav nav-pills">
             				    <li class="active"><a data-toggle="pill" href="#home">Student</a></li>
             				    <li><a data-toggle="pill" href="#menu1">Parent</a></li>
             				    <li><a data-toggle="pill" href="#menu2">Job Seeker</a></li>
             				    <li><a data-toggle="pill" href="#menu3">Solver</a></li>
             				  </ul> -->
				  
				  <div class="tab-content">
				    <div id="home" class="tab-pane fade in active">
				    		<h5>Mobile No. verification</h5>

				    	

				    		
				      
					          <form method="post" action="<?php echo base_url();?>Sign_up/student_registration_action" class="login-form creat-form" id="std_form">
					          <div class="form-group">
					              <label>OTP</label>
					              <input type="text" class="form-control" placeholder="Enter 6 digit OTP" name="otp_val" id="otp_val">

					              </div>

					              <input type="hidden" name="hid_user" id="hid_user" value="<?php echo $this->session->userdata('login_mob');?>">
					              
					               


					               <div class="form-group">
					                <button value="" type="button" class="btn read-btn" onclick="otp_validation_submit()">SUBMIT</button>

					               </div>


					          </form>
				    </div>

            <p>Have not recieved the code yet?</p>
            <button value="" type="button" class="btn btn-success" onclick="resend_otp(<?php echo $this->session->userdata('login_mob'); ?>)">Resend otp</button><br>

            <span id="msg" style="color: green"></span>
            <span id="error_msg" style="color: red"></span>




				    
				    
				    
				  </div>
          </div>

         
       <!--    <h5 class="or">OR</h5>
       
                
       
       <div class="clearfix"></div>
       
       
       
       <p>Already have an account?<a href="#"> Signin</a></p> -->

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
    var otp_val = $('#otp_val').val();
      if (!isNull(otp_val)) {
        $('#otp_val').removeClass('black_border').addClass('red_border');
      } else {
      	if(otp_val.length!=6)
      	{
      		 $('#otp_val').removeClass('black_border').addClass('red_border');
      	}
      	else
      	{
      		$('#otp_val').removeClass('red_border').addClass('black_border');
      	}
        
      }

     


       






      
  }
  function otp_validation_submit()
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


<script type="text/javascript">
 
    function resend_otp(value)
    {
       

      $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>Sign_up/resend_otp_registration",
                    data: {user_id: value},
                    async: false,
                    success: function(data)
                    {
                       // console.log(data);
                       // alert(data.result);
                        
                        if(data.result=='1')
                        {
                          alert('Your otp has been resent susseccfully');
                        }

                        if(data.result=='0')
                        {
                          alert('Sorry!! Your OTP Resend Failed');
                        }
                        
                        

                    }
                });
          
    }
  </script>
