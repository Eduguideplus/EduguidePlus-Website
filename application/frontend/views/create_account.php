<!-- <section class="breadcumb-wrapper">

      <div class="overlay-color">

        <div class="container">

          <div class="row clearfix">

            

          </div>

        </div>

      </div>

</section> -->







<div class="all_top">

</div>



<div class="login_back Register_cnt">



<div class="container-fluid login_register deximJobs_tabs practice" style="background-image: url(<?php echo base_url(); ?>assets/images/Passion1.jpg);">

 <div class="row">

  <div class="container main-container-home">

    <div class="col-md-8 col-md-offset-2 text-center log-in head_tex">





      <h3>Create account</h3>



      <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="log-section">

        	



					         	 <form method="post" action="<?php echo base_url();?>Sign_up/student_registration" class="login-form creat-form" id="std_form">

					          	 <div class="col-md-6">

					         	 <div class="form-group">

					         	 	<label>Name<span style="color: red">*</span> :</label>

					              <input type="text" class="form-control" placeholder="Your Name" name="name" id="name" value="" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32'>



					              </div></div>

					              <div class="col-md-6">

					         	 <div class=" form_gender">

					         	 	<div><label>Gender<span style="color: red">*</span> :</label></div>

					         	 	

					              <p><input type="radio" value="Male" name="gender" checked> Male</p>

					              <p><input  type="radio" value="Female" name="gender"> Female</p>

					              </div>

					          

					          </div>

					              <div class="col-md-6">

					              <div class="form-group">

					              	<label>Date of Birth<span style="color: red">*</span> :</label>

					              <input type="Date" class="form-control" placeholder="Date of Birth" name="date_of_birth" id="date_of_birth" value="" >



					              </div></div>

					              <div class="col-md-6">

					              <div class="form-group">

					              	<label>Pan Card No. :</label>

					              <input type="text" class="form-control" placeholder="Your Pan Card No" name="pan_no" id="pan_no" value="" >



					              </div></div>

					              <div class="col-md-6">

					              <div class="form-group">

					              	<label>Aadhaar no :</label>

					              <input type="text" class="form-control" placeholder="Aadhaar No" name="aadhar_no" id="aadhar_no" value="<?php echo $this->session->userdata('fb_email_id'); ?>" >



					              </div></div>





					              <div class="col-md-6">

					              <div class="form-group">



					              	<label>Your Mail<span style="color: red">*</span> :</label>

					              <input type="text" class="form-control" placeholder="Your Email" name="email" id="email" value="" onkeyup="chk_email(value)"  oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false"><span style="color:red;display: none;" id="email_error"><b>This Email is already used.</b></span>



					              </div></div>



					              <div class="col-md-6">

					              <div class="form-group">

					              	<label>Mobile No.<span style="color: red">*</span> :</label>

					              <input type="text" class="form-control" placeholder="Your Mobile Number" onblur="chk_phone(value)" name="mobile" id="mobile"  maxlength="10" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false" ><span style="color:red;display: none;" id="phone_error"><b>This Number is already used.</b></span>



					              </div></div>

					              <div class="col-md-6">

					              <div class="form-group">

					              	<label>Country<span style="color: red">*</span> :</label>

					              <select name="country" id="country" onchange="get_state(this.value)" class="form-control">

					              	<option value="">Select Country</option>

					              	<?php

					              	foreach($country as $coutr)

					              		{

					              			?>

					              			<option value="<?php echo $coutr->id;?>"><?php echo $coutr->name;?></option>

					              		<?php

					              	}

					              	?>

					              </select>

					              </div></div>

					              <div class="col-md-6">

					              <div class="form-group">

					              	<label>State<span style="color: red">*</span> :</label>

					              

									<select id="state" name="state" onchange="get_city(this.value)" class="form-control">

					              	<option value="">Select State</option>

					              </select>



					              </div></div>

					              <div class="col-md-6">

					              <div class="form-group">

					              	<label>City<span style="color: red">*</span> :</label>

					             <select name="city" id="city" class="form-control">

					             	<option value="">Select City</option>

					             </select>



					              </div></div>



                      <div class="col-md-6">
                          <div class="form-group">
                            <label>College/School<span style="color: red">*</span> :</label>
                         <!--  <select name="city" id="city" class="form-control">
                         
                          <option value="">School</option>
                          <option value="">College</option>
                          </select> -->
                           <input type="text" class="form-control" placeholder="Enter your Collage or School" name="collage" id="collage">
                        </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Interested Course/Exam<span style="color: red">*</span> :</label>
                          <!-- <select name="city" id="city" class="form-control">
                          
                          <option value="">Interested Course</option>
                          <option value="">Interested Exam</option>
                          </select> -->
                           <input type="text" class="form-control" placeholder="Enter your Interested Course/Exam" name="course" id="course">
                        </div>
                      </div>




					              <div class="col-md-6">

					               <div class="form-group">

					               	<label>Password<span style="color: red">*</span><i class="fa fa-info-circle" aria-hidden="true"  data-toggle="tooltip" data-placement="right" title="Your Password should have one capital letter, one small letter, one digit and 6 characters long"></i> :</label>

					              <input type="password" class="form-control" placeholder="Enter Your Password" name="password" id="password">



					              </div></div>



					               <div class="col-md-6">

					               <div class="form-group">

					               	<label>Confirm Password<span style="color: red">*</span> :</label>

					              <input type="password" class="form-control" placeholder="Enter Your Password" name="conf_password" id="conf_password">



					              </div></div>



					              <div class="col-md-12">

					              <div class="form-group">

					              	<label>Address<span style="color: red">*</span> :</label>

					              <textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>



					              </div></div>

					              



					              <div class="col-md-6">

					               <div class="form-group" id="termDiv">

						              <label class="terms"><a href="<?php echo $this->url->link(81); ?>" target="blank"> I agree Terms and Condition</a>

										  <input type="checkbox"  name="terms" id="terms" value="1">

										  <span class="checkmark"></span>

										</label>



					              </div>

					          	</div>

                      <div class="col-md-6"><p>Already have an account?<a href="<?php echo $this->url->link(86); ?>"> Sign In</a></p></div>



					               



                        <div class="col-md-12 text-center">

					               <div class="form-group">

					                <button value="" type="button" class="btn read-btn" onclick="form_validation_student()">SUBMIT</button>



					               </div>

                       </div>





					          </form>

				    </div>

				   

				  </div>

          </div>



         

          <!-- <h5 class="or">OR</h5>

 -->

         



          <div class="clearfix"></div>







          



        </div>



      </div>



       

      



    </div>

   

   











  </div>

</div>

</div>



</div>





















<script>

	function get_state(country_id)

	{

		//alert(country_id);



		var base_url='<?php echo base_url();?>';

  

         $.ajax(

            { 

                  type: "POST",

                 dataType:'json',  

                 url:base_url+"Sign_up/get_state_by_country",

                 data: {country_id:country_id},

       

        success: function(data)

         { 

           

           // console.log(data.dist_list);



          // alert(data.state_list[0].state_name);

            var html_string='<option value=""> Select State </option>';

              

                var state_list=data.state_list;

                var i=0;

                var k=0;

              

                  for(i=0;i<state_list.length;i++){

                    if(state_list[i].name)

                    {

                    

                  html_string+='<option value="'+state_list[i].id+'">'+state_list[i].name+'</option>';

                  

                }  }     

                    //alert(html_string);

              

            $("#state").html(html_string);



             $("#city").html('<option value=""> Select City </option>');

                      

                  

  

      }  

  });

	}

</script>



<script type="text/javascript">

	function get_city(state_id)

   {

      //alert(state_id);

      var base_url='<?php echo base_url();?>';

  

         $.ajax(

            { 

                  type: "POST",

                 dataType:'json',  

                 url:base_url+"Sign_up/get_city_by_state",

                 data: {state_id:state_id},

       

        success: function(data)

         { 



        //  alert(data.state_list[0].state_name);

           

           // console.log(data.dist_list);



            var html_string='<option value=""> Select City </option>';

              

                var city_list=data.city_list;

                var i=0;

                var k=0;

              

                  for(i=0;i<city_list.length;i++){

                    if(city_list[i].name)

                    {

                    

                  html_string+='<option value="'+city_list[i].id+'">'+city_list[i].name+'</option>';

                  

                }  }     

                    //alert(html_string);

              

            $("#city").html(html_string);

                      

                  

  

      }  

  });

   }

</script>



<script>

  

  function chk_phone(value)

  {



    // alert(value);





       var base_url='<?php echo  base_url();?>';

        if(value!='')

        {

          $.ajax({

                        

              url:'<?php echo  base_url();?>Sign_up/check_phone',

              data:{phone:value},

              dataType: "json",

              type: "POST",

              async: true,

              success: function(data)

              {

                    //alert(data);

                    var perform= data.changedone;

                    if(perform['status']==1)

                      {

                        

                        $("#phone_error").show();

                        

                        $('#mobile').removeClass('black_border').addClass('red_border');

                       

                       

                      }

                      if(perform['status']==0){



                         

                         $('#phone_error').hide();



                       $('#mobile').removeClass('red_border').addClass('black_border');

                      }                    

               }

                                                            

              });

        }

        else

        {

          $("#phone_error").html("");

          

        }

      

  }



</script> 



<script>  



  function chk_email(value)

  {



       var base_url='<?php echo  base_url();?>';

        if(value!='')

        {

          $.ajax({

                        

              url:'<?php echo  base_url();?>Sign_up/check_email',

              data:{email:value},

              dataType: "json",

              type: "POST",

              async: true,

              success: function(data)

              {

                    // alert(data);

                    var perform= data.changedone;

                    if(perform['status']==1)

                      {

                        

                        $("#email_error").show();

                        

                        $('#email').removeClass('black_border').addClass('red_border');

                       

                       

                      }

                      if(perform['status']==0){



                         

                         $('#email_error').hide();



                        $('#email').removeClass('red_border').addClass('black_border');

                      }                    

               }

                                                            

              });

        }

        else

        {

          $("#email_error").html("");

          

        }

      

  }



</script>   

















<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>





 <script>

  function validation_student()

  {

    var name = $('#name').val();

      if (!isNull(name)) {

        $('#name').removeClass('black_border').addClass('red_border');

      } else {

        $('#name').removeClass('red_border').addClass('black_border');

      }



    // var gender = $('#gender').val();

    //   if (!isNull(gender)) {

    //     $('#gender').removeClass('black_border').addClass('red_border');

    //   } else {

    //     $('#gender').removeClass('red_border').addClass('black_border');

    //   }



      var date_of_birth = $('#date_of_birth').val();

      if (!isNull(date_of_birth)) {

        $('#date_of_birth').removeClass('black_border').addClass('red_border');

      } else {

        $('#date_of_birth').removeClass('red_border').addClass('black_border');

      }



      /*var pan_no = $('#pan_no').val();

      if (!isNull(pan_no)) {

        $('#pan_no').removeClass('black_border').addClass('red_border');

      } else {

        $('#pan_no').removeClass('red_border').addClass('black_border');

      }
*/


	var email = $('#email').val();

      if (!isNull(email) || !isEmail(email)) {

        $('#email').removeClass('black_border').addClass('red_border');

      } else {

        $('#email').removeClass('red_border').addClass('black_border');

      }



      var mobile = $('#mobile').val();

      if (!isNull(mobile)) {

        $('#mobile').removeClass('black_border').addClass('red_border');

      } else {

        $('#mobile').removeClass('red_border').addClass('black_border');

      }





      /*var aadhar_no = $('#aadhar_no').val();

      if (!isNull(aadhar_no)) {

        $('#aadhar_no').removeClass('black_border').addClass('red_border');

      } else {

        $('#aadhar_no').removeClass('red_border').addClass('black_border');

      }*/



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



      var address = $('#address').val();

      if (!isNull(address)) {

        $('#address').removeClass('black_border').addClass('red_border');

      } else {

        $('#address').removeClass('red_border').addClass('black_border');

      }

      var collage = $('#collage').val();

      if (!isNull(collage)) {

        $('#collage').removeClass('black_border').addClass('red_border');

      } else {

        $('#collage').removeClass('red_border').addClass('black_border');

      }

      var course = $('#course').val();

      if (!isNull(course)) {

        $('#course').removeClass('black_border').addClass('red_border');

      } else {

        $('#course').removeClass('red_border').addClass('black_border');

      }



      var password = $('#password').val();

      if (!isNull(password)) {

        $('#password').removeClass('black_border').addClass('red_border');

      } else {



      	if(password.length<6)

      	{

      		$('#password').removeClass('black_border').addClass('red_border');

      	}

      	else

      	{

      		var letterNumber = /^[a-z0-9]+$/i;

      		if((password.match(letterNumber))) 

			 {

			 	$('#password').removeClass('red_border').addClass('black_border');

			 }

			 else

			 {

			 	$('#password').removeClass('black_border').addClass('red_border');

			 }

      		

      	}

        

      }



      var conf_password = $('#conf_password').val();

      if (!isNull(conf_password)) {

        $('#conf_password').removeClass('black_border').addClass('red_border');

      } else {

        $('#conf_password').removeClass('red_border').addClass('black_border');

      }





      if(password==conf_password)

              {

                $('#conf_password').removeClass('red_border');

              } 

              else

              {

                $('#conf_password').addClass('red_border');

              }    



      if ($("#terms").prop('checked')!=true) {

        $('#termDiv').removeClass('black_border').addClass('red_border');

        //alert("Please Checked Terms And Condition...!");

      } else {

        $('#termDiv').removeClass('red_border').addClass('black_border');

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





  



  



<!--------------------------------- PARENT REGISTRATION------------------------------------------->





  <script>

function check_valid_input(value)

{

     var x = value.which || value.keyCode;

     //alert(x);

     if ((x > 32 && x < 45) || (x > 47 && x < 65) || (x > 90 && x < 97)){ value.preventDefault();}

     

  



}

</script>





























 









<script>

  function get_exam_grp(value)

{



  //alert(value);



    var html='<option value="">Select</option>';

    if(value>0)

    {

      $.ajax(

          {

              type: "POST",

              dataType:'json',

              url:"<?php echo base_url();?>index.php/Sign_up/get_exam",

              data: {type_id: value},

              async: false,

              success: function(data)

              {



                  // alert(data[0].category_id);

                  for(var i=0; i<data.length; i++)

                  {

                      html+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';

                  }

                  $("#exam_name").html(html);



              }

          });

    }

    else

    {

        $("#exam_name").html(html);

    }





}







  </script>