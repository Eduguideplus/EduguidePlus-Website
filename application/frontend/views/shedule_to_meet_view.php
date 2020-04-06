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
          <h2>Schedule To Meet</h2>
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



                          <h3 class="title">Schedule To Meet</h3>

                          <small><?php
            $succ_msg=$this->session->flashdata('succ_msg');
            if($succ_msg){
              ?>
              <br><span style="color:green">
                <?php echo $succ_msg; ?>
              </span>
              <?php
              }
              ?>
              
            
              </small>



                         







    <form action="<?php echo base_url();?>shedule_to_meet/insert_data" method="post" class="profile-form" enctype="multipart/form-data" id="profile_up">

                         <!--  <div class="col-md-3 col-sm-12 col-xs-12">

                                <div class="profile-pic mar_wid">

                                  <?php if(@$user[0]->profile_photo!=''){?>

                                    <img src="<?php echo base_url(); ?>assets/uploads/student_pic/<?php echo @$user[0]->profile_photo; ?>" alt="" class="img-responsive">

                                    <?php }else{?>

                                      <img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="" class="img-responsive">

                                    <?php } ?>



                                      <input type="file" name="profile_img" id="profile_img" placeholder="" class="form-control">



                                      <input type="hidden" name="hid_pro_img" id="hid_pro_img" value="<?php echo @$user[0]->profile_photo; ?>">


                                </div>



                               



                              



                          </div>

 -->

                          <div class="col-md-9 col-sm-12 col-xs-12 res480-pl-0 res480-pr-0">

                              <div class="myprofile-field">



                                      

                                         <div class="row">

                                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                              <div class="form-group">

                                             <label>Select Day<span>*</span></label>

                                                 
                                                 <input type="date" name="schdule_day" id="schdule_day" placeholder="Select Schedule Date">


                                                 <!--  <select class="form-control" name="schdule_day" id="schdule_day" >
                                                    <option value="">Select Day</option>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                  </select>
 -->





                                              </div>

                                          </div>

                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                          <div class="form-group">

                                              <label>Select Time<span>*</span></label>

                                                  <select class="form-control" name="schdule_time" id="schdule_time" style="margin-bottom:12px">
                                            <option value=""> Select Time </option>
                                              <?php 
                                                  $start_time = strtotime('10:00 AM');
                                                  $end_time = strtotime('6:00 PM');
                                                  for ($i=$start_time;$i<=$end_time;$i = $i + 15*60)
                                                  { ?>
                                              
                                                    <option value="<?php  echo date('g:i A',$i); ?>">
                                                      <?php  echo date('g:i A',$i); ?></option>
                                                    <?php   }  ?>
                                       </select>

                                              </div>

                                          </div>

                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                          <div class="form-group">

                                              <label>Your Interested Course<span>*</span></label>

                                                  <input type="text" name="interested_course" id="interested_course" class="form-control" placeholder="Enter Your Interested Course" value="" >

                                              </div>

                                          </div>




                                          <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">

                                          <button type="button" value="" class="site-button hvr-sweep-to-right" onclick="form_validation_student()">Submit</button>

                                          </div>



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

    var schdule_day = $('#schdule_day').val();

      if (!isNull(schdule_day)) {

        $('#schdule_day').removeClass('black_border').addClass('red_border');

      } else {

        $('#schdule_day').removeClass('red_border').addClass('black_border');

      }






      var schdule_time = $('#schdule_time').val();

      if (!isNull(schdule_time)) {

        $('#schdule_time').removeClass('black_border').addClass('red_border');

      } else {

        $('#schdule_time').removeClass('red_border').addClass('black_border');

      }





        var interested_course = $('#interested_course').val();

      if (!isNull(interested_course)) {

        $('#interested_course').removeClass('black_border').addClass('red_border');

      } else {

        $('#interested_course').removeClass('red_border').addClass('black_border');

      }







      

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