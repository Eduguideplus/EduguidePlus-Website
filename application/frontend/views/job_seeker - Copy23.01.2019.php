<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>

<section class="job_seekar">
    <div class="container">
        <div class="row">

	        <div class="col-md-4 col-sm-4 col-12 career-sidetab">

			        <ul class="nav nav-pills " role="">
					     <li class="nav-item active" id="click_1">
					      	<a class="nav-link active show" data-toggle="pill" href="#home" ><i class="fa fa-globe" aria-hidden="true"></i> Current Opening</a>
					    </li>

					      <?php foreach ($job_cat as $key => $row) {  ?>
				    	<li class="nav-item" id="click_2">
				     		 <a class="nav-link" data-toggle="pill" href="#menu<?php echo $key; ?>"><i class="fa fa-chrome" aria-hidden="true"></i>   <?php echo $row->job_category_title; ?></a>
				   		 </li>
                           <?php } ?>
			   			<!--  <li class="nav-item" id="click_3">
			     			 <a class="nav-link" data-toggle="pill"><i class="fa fa-chrome" aria-hidden="true"></i>   Web Developer</a>
			    		</li>

			    		<li class="nav-item" id="click_4">
			     			 <a class="nav-link" data-toggle="pill"><i class="fa fa-chrome" aria-hidden="true"></i>   Web Designer</a>
			    		</li>

			    		<li class="nav-item" id="click_5">
			     			 <a class="nav-link" data-toggle="pill"><i class="fa fa-chrome" aria-hidden="true"></i>   Management</a>
			   			 </li>

			    		<li class="nav-item" id="click_6">
			     			 <a class="nav-link" data-toggle="pill"><i class="fa fa-chrome" aria-hidden="true"></i>   Support</a>
			   			 </li>
 -->
			   
			  		</ul>

	        </div>

			<div class="col-md-8 col-sm-8 col-12">
<span style="color:green"><?php echo $this->session->flashdata('msg'); ?></span>
					        		<div class="tab-content">



										<div  class="container tab-pane active show"  id="home">



  <?php   

      foreach ($job_details as $key=>$row) {  ?>

								           <div class="jobs text-left">
								                                   
								                 <h5><?php echo $row->job_title; ?>  <a class="btn btn-info btn-lg pull-right" data-toggle="modal" onclick="apply(<?php echo $row->job_alert_id; ?>);">Apply</a></h5>
								                  <div class="col-md-11">
								                       <p><b>Work Location :</b>  <?php echo $row->work_location; ?> </p>                                          
								                        <p><b>Vacancy :</b> <?php echo $row->vacancy; ?>  </p>                                          
								                        <p><strong>Qualification :</strong> <?php echo $row->requisite_qualification; ?> </p>                                          



								                       <p> <b>Experience :</b> <?php echo $row->experience; ?></p>  
								                    </div>


								                     <div class="col-md-12">

								                           <p><strong>Requirements :</strong>
								                            </p>
								                            <?php
echo $row->job_requirment; ?>  
                                        <br>
								                          
								                      </div>
								            </div> 
								        <?php  } ?>
                                       </div>





								    <?php  foreach ($job_cat as $key => $row) {



    $job_det=$this->common_model->common($table_name = 'tbl_career', $field = array(), $where = array('status'=>'active','job_category_id'=>$row->job_category_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 
// echo '<pre>';
// print_r($job_det); exit;
     ?>

    <div id="menu<?php echo $key; ?>" class="container tab-pane">

        <?php if(count($job_det)!=""){ foreach ($job_det as $key=>$row) {  ?>

        				          <div class="jobs text-left" >
								                                   
								                 <h5><?php echo $row->job_title; ?><a class="btn btn-info btn-lg pull-right" data-toggle="modal" onclick="apply(<?php echo $row->job_alert_id; ?>);">Apply</a></h5>
								                  <div class="col-md-11">
								                       <p><b>Work Location :</b> <?php echo $row->work_location; ?> </p>                                          
								                        <p><b>Vacancy :</b> <?php echo $row->vacancy; ?>  </p>                                          
								                        <p><strong>Qualification :</strong>  <?php echo $row->requisite_qualification; ?> </p>                                          



								                       <p> <b>Experience :</b> <?php echo $row->experience; ?></p>

								                        
								                    </div>


								                     <div class="col-md-12">

								                           <p><strong>Requirements :</strong>
								                            </p>

								                            <?php
echo $row->job_requirment; ?>  
                                        <br>
								                        
								                                       
								                      </div>
								            </div>
								         <?php } }else { echo "no job found"; } ?>

								     </div>

								       <?php }  ?>
								         
									</div>
	        </div>
 		 </div> 
 	 </div>
</section>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content job_model">
       
        <div class="modal-body">
          <form method="post" id="career_id"  class="field_form" action="<?php echo base_url(); ?>index.php/Manage_career/career_email" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6 animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.4s" style="animation-delay: 0.4s; opacity: 1;">
                                    <input type="text" placeholder="Enter Name *" id="first-name" class="form-control" name="fname">
                                 </div>
                                <div class="form-group col-md-6 animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.6s" style="animation-delay: 0.6s; opacity: 1;">
                                    <input type="email" placeholder="Enter Email *" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-group col-md-6 animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.8s" style="animation-delay: 0.8s; opacity: 1;">
                                    <input type="text" placeholder="Enter Subject" id="subject" class="form-control" name="subject">
                                </div>
                          <div class="form-group col-md-6 animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="1s" style="animation-delay: 1s; opacity: 1;">
                        <input type="text" placeholder="Enter Phone No." id="phone" class="form-control" name="phone">
                                </div>
                   <div class="form-group col-md-12 animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="1s" style="animation-delay: 1s; opacity: 1;">
                      <label><b>upload CV</b></label>
                     <input type="file" placeholder="upload CV" class="form-control" id="img_upload" name="img_upload">
                     </div>
                                <div class="form-group col-md-12 animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="1.2s" style="animation-delay: 1.2s; opacity: 1;">
                                    <textarea placeholder="Message *" id="description" class="form-control job_messages" name="message" rows="3"></textarea>
                                </div>

                                <input type="hidden" name="application" value="" id="application">
                                <div class="col-md-12 text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="1.4s" style="animation-delay: 1.4s; opacity: 1;">
                                    <button type="button" title="Submit Your Message!" onclick="return apply_submit();" class="btn btn-default btn-radius job_submit">Submit <i class="ion-ios-arrow-thin-right"></i></button>
                                </div>
                               <!--  <div class="col-md-12">
                                    <div id="alert-msg" class="alert-msg text-center"></div>
                                </div> -->
                            </div>
                        </form>
        </div>
        
          <button type="button" class="btn btn-default close_btn" data-dismiss="modal">X</button>
        
      </div>
      
    </div>
  </div>

<script>
$(document).ready(function(){
	 
	   $("#click_1").click(function(){
    
     $("#home1").show();
      $("#home2").show();
   	$("#home3").show();
   
  });
  $("#click_2").click(function(){
    
     
      $("#home1").hide();
   	$("#home3").hide();
   	
  });
  $("#click_3").click(function(){
     $("#home3").show();
     
   
  });
});
</script>

<script type="text/javascript">
    
    function apply(value,name) {

// alert('okk');

$('#application').val(value);

$('#exampleModal').modal('show');



    }
</script>



 <script src="<?php echo base_url();?>assets/custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>assets/custom_script/setting_validation.js"></script>

<script type="text/javascript">
    function reg_Submit_fm()
{

    // alert('ok');
    var fname = $('#first-name').val();
// alert(fname);

    if (!isNull(fname)) {
        $('#first-name').removeClass('black_border').addClass('red_border');
    } else {
        $('#first-name').removeClass('red_border').addClass('black_border');
    }
 

    var email = $('#email').val();
    if (!isEmail(email)) {
        $('#email').removeClass('black_border').addClass('red_border');
    } else {
        $('#email').removeClass('red_border').addClass('black_border');
    }
   var subject = $('#subject').val();
    if (!isNull(subject)) {
        $('#subject').removeClass('black_border').addClass('red_border');
    } else {
        $('#subject').removeClass('red_border').addClass('black_border');
    }
    var phone = $('#phone').val();
    if (!isNull(phone) || isNaN(phone) || phone.length<10) {
        $('#phone').removeClass('black_border').addClass('red_border');
    } else {
        $('#phone').removeClass('red_border').addClass('black_border');
    }
 var img_upload = $('#img_upload').val();
    if (!isNull(img_upload)) {
        $('#img_upload').removeClass('black_border').addClass('red_border');
    } else {
        $('#img_upload').removeClass('red_border').addClass('black_border');
    }

 var description = $('#description').val();
    if (!isNull(description)) {
        $('#description').removeClass('black_border').addClass('red_border');
    } else {
        $('#description').removeClass('red_border').addClass('black_border');
    }

   /* var reg_password = $('#reg_password').val();
    if (!isNull(reg_password) || reg_password.length< 4) {
        $('#reg_password').removeClass('black_border').addClass('red_border');
    } else {
        $('#reg_password').removeClass('red_border').addClass('black_border');
    }
    var cpassword = $('#cpassword').val();
    if (!isNull(cpassword) || reg_password!=cpassword) {
        $('#cpassword').removeClass('black_border').addClass('red_border');
    } else {
        $('#cpassword').removeClass('red_border').addClass('black_border');
    }

    var term_check= $("#rememberme").is(":checked");
    if(!term_check)
    {
         $('#div_check').removeClass('black_border').addClass('red_border');
         alert("Please agree Terms and Conditions");
    }
    else{
        $('#div_check').removeClass('red_border').addClass('black_border');
    }*/
    

    
}



function apply_submit()
{
    //alert("ok");

    $('#career_id').attr('onchange', 'reg_Submit_fm()');
    $('#career_id').attr('onkeyup', 'reg_Submit_fm()');

    reg_Submit_fm();
 // alert($('#career_id .red_border').size());

    if ($('#career_id .red_border').size() > 0)
    {
        $('#career_id .red_border:first').focus();
        $('#career_id .alert-error').show();
        return false;
    } else {

        $('#career_id').submit();
    }
}
</script>   
