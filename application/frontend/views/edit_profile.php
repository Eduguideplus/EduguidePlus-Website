<div class="all_top">
</div>



<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="<?php echo base_url(); ?>assets/images/ins1.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont online_x">
          <h2>Edit Profile</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->



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

  			<!-- <h3>Edit Profile</h3> -->

  		</div>



  		<div class="col-md-12 col-sm-12 col-xs-12">

  			<div class="my-account-wrapper">

  			

  			<?php $this->load->view('account_sidebar',$user); ?>





  			   <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 res480-pl-0 res480-pr-0 ">



                        <div class="myaccount-field myaccount-widget">



                          <h3 class="title">Edit Profile</h3>



                         







    <form action="<?php echo $this->url->link(9);?>" method="post" class="profile-form" enctype="multipart/form-data" id="profile_up">

                          <div class="col-md-3 col-sm-12 col-xs-12">

                                <div class="profile-pic mar_wid">

                                  <?php if(@$user[0]->profile_photo!=''){?>

                                    <img src="<?php echo base_url(); ?>assets/uploads/student_pic/<?php echo @$user[0]->profile_photo; ?>" alt="" class="img-responsive">

                                    <?php }else{?>

                                      <img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="" class="img-responsive">

                                    <?php } ?>



                                      <input type="file" name="profile_img" id="profile_img" placeholder="" class="form-control">



                                      <input type="hidden" name="hid_pro_img" id="hid_pro_img" value="<?php echo @$user[0]->profile_photo; ?>">



 <!-- <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">

                                          <button type="button" value="" class="site-button hvr-sweep-to-right" onclick="form_validation_student()">Submit</button>

                                          </div> -->



                                </div>



                               



                              



                          </div>



                          <div class="col-md-9 col-sm-12 col-xs-12 res480-pl-0 res480-pr-0">

                              <div class="myprofile-field">



                                      

                                         <div class="row">

                                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                              <div class="form-group">

                                             <label>Full Name<span>*</span></label>

                                                  <input type="text" disabled="" name="u_name" id="u_name" class="form-control" placeholder="Enter Your Full Name" value="<?php echo @$user[0]->user_name;?>">

                                              </div>

                                          </div>

                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                          <div class="form-group">

                                              <label>Email<span>*</span></label>

                                                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" value="<?php echo @$user[0]->login_email;?>" <?php if(@$user[0]->email_verify=='Y'){echo 'readonly'; }?>>

                                              </div>

                                          </div>

                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                          <div class="form-group">

                                              <label>Phone Number<span>*</span></label>

                                                  <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Your Phone Number" value="<?php echo @$user[0]->login_mob;?>" <?php if(@$user[0]->mob_verify=='Y'){echo 'readonly'; }?>>

                                              </div>

                                          </div>



                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                          <div class="form-group">

                                           <?php  

                                                

                                                



                                                $country_list= $this->common_model->common($table_name ='countries', $field = array(), $where = array('id'=>@$user[0]->country), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                                                

                                                ?>

                                              <label>Country<span>*</span></label>

                                                  <input type="text" value="<?php echo  @$country_list[0]->name;?>" disabled="" class="form-control" id="" name="">

                                              </div>

                                          </div>

                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                          <div class="form-group">

                                            <?php  

                                               $state_list= $this->common_model->common($table_name ='states', $field = array(), $where = array('id'=>@$user[0]->state), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                                                

                                                ?>

                                              <label>State<span>*</span></label>

                                                 <input type="text" value="<?php echo  @$state_list[0]->name;?>" id="" class="form-control" disabled="" name="">

                                              </div>

                                          </div>

                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                          <div class="form-group">

                                             <?php  

                                               

                                                $city_list= $this->common_model->common($table_name ='cities', $field = array(), $where = array('id'=>@$user[0]->city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                                               

                                                ?>

                                              <label>City<span>*</span></label>

                                            <input type="text" value="<?php  echo  @$city_list[0]->name;?>" disabled="" name="" id="" class="form-control">

                                                  

                                              </div>

                                          </div>

                                           <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                          <div class="form-group">

                                             <label>Pin Code<span>*</span></label>

                                                  <input type="text" name="post_code" id="post_code" class="form-control" placeholder="Enter Your Pin Code" value="<?php echo @$address[0]->post_code;?>">

                                              </div>

                                          </div> -->

                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                          <div class="form-group ">

                                              <label>Date of Birth<span>*</span></label>

                                                <input type="text" disabled="" name="dob" id="datepicker_dob" placeholder="Enter Your Date of Birth" class="form-control"  id="datepicker" value="<?php echo @$user[0]->dob;?>">

                                              </div>

                                          </div>

                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                          <div class="form-group ">

                                              <label>Address<span>*</span></label>

                                                  <textarea class="" disabled="" cols="60" rows="5" placeholder="Enter Your Address" name="address" id="address"><?php echo @$user[0]->user_address;?></textarea>

                                              </div>

                                          </div>







                                          <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">

                                          <button type="button" value="" class="site-button hvr-sweep-to-right" onclick="form_validation_student()">Submit</button>

                                          </div



                                         </div>

                                      







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





<script>

  function validation_student()

  {

    var u_name = $('#u_name').val();

      if (!isNull(u_name)) {

        $('#u_name').removeClass('black_border').addClass('red_border');

      } else {

        $('#u_name').removeClass('red_border').addClass('black_border');

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





      //  var country = $('#country').val();

      // if (!isNull(country)) {

      //   $('#country').removeClass('black_border').addClass('red_border');

      // } else {

      //   $('#country').removeClass('red_border').addClass('black_border');

      // }





      //  var state = $('#state').val();

      // if (!isNull(state)) {

      //   $('#state').removeClass('black_border').addClass('red_border');

      // } else {

      //   $('#state').removeClass('red_border').addClass('black_border');

      // }



      //  var city = $('#city').val();

      // if (!isNull(city)) {

      //   $('#city').removeClass('black_border').addClass('red_border');

      // } else {

      //   $('#city').removeClass('red_border').addClass('black_border');

      // }



      //  var post_code = $('#post_code').val();

      // if (!isNull(post_code)) {

      //   $('#post_code').removeClass('black_border').addClass('red_border');

      // } else {



      //   if(isNaN(post_code))

      //   {

      //     $('#post_code').removeClass('black_border').addClass('red_border');

      //   }

      //   else

      //   {

      //     if(post_code.length!=6)

      //     {

      //       $('#post_code').removeClass('black_border').addClass('red_border');

      //     }

      //     else

      //     {

      //       $('#post_code').removeClass('red_border').addClass('black_border');

      //     }

          

      //   }

        

      // }



    





      //   var mobile = $('#mobile').val();

      // if (!isNull(mobile)) {

      //   $('#mobile').removeClass('black_border').addClass('red_border');

      // } else {



      //   if(isNaN(mobile))

      //   {

      //     $('#mobile').removeClass('black_border').addClass('red_border');

      //   }

      //   else

      //   {

      //     if(mobile.length!=10)

      //     {

      //       $('#mobile').removeClass('black_border').addClass('red_border');

      //     }

      //     else

      //     {

      //       $('#mobile').removeClass('red_border').addClass('black_border');

      //     }

      //   }

        

      // }





      //   var datepicker_dob = $('#datepicker_dob').val();

      // if (!isNull(datepicker_dob)) {

      //   $('#datepicker_dob').removeClass('black_border').addClass('red_border');

      // } else {

      //   $('#datepicker_dob').removeClass('red_border').addClass('black_border');

      // }



     















      

  }

  function form_validation_student()

  {

  

   

    $('#profile_up').attr('onchange', 'validation_student()');

    $('#profile_up').attr('onkeyup', 'validation_student()');



     validation_student();

    //alert($('#contact_form .red_border').size());



    if ($('#profile_up .red_border').size() > 0)

    {

      $('#profile_up .red_border:first').focus();

      $('#profile_up .alert-error').show();

      return false;

    } else {



      $('#profile_up').submit();

    }



  }



  </script>