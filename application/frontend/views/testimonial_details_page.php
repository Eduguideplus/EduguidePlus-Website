<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>


<div class="all_top">
</div>


<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="assets/images/testimionals-b.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont online_x">
          <h2>Testimionals</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->



<div class="testimonial-block-three test-block-content">
	<div class="container ">
        <div class="col-sm-12 col-xs-12 nopad test ">
          <h2 class="text-center testimonial-heading"> What People Say About Us</h2>
        </div>
		<div class="row">

            <?php foreach($testimonial as $test)
                 {
                   ?>  
		<div class="col-md-12 testimonial_item">
            <div class="client-infos">
                <div class="col-md-3">
                <div class="img-box">
                 <?php if($test->testimonial_image !=''){?> <img src="<?php echo base_url()?>assets/uploads/testimonial/<?php echo $test->testimonial_image;?>" alt="" class="img-responsive auth1 sprites"> <?php } else{?>
                  <img src="<?php echo base_url()?>assets/uploads/no_image.png" alt="" class="img-responsive auth1 sprites"> <?php }?>
                            </div>

                            <div class="text-holder block-name">
                                <h3><?php echo $test->testimonial_name;?></h3>
                                <span><?php echo $test->testimonial_designation;?></span>
                                
                            </div>
                        </div>
                        <div class="col-md-9">
                        <div class="text-box" id="style-5">
                           <p><span> <?php echo strip_tags($test->testimonial_content);?></span></p>
                        </div>
                        </div>
                </div>
                    </div>
                    <?php
                }
                ?>


              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="write_review">
                <h2>Write Your Review</h2>


                <small >

                      <?php
                              $succ_add=$this->session->flashdata('msg');
                              if($succ_add){
                                ?>
                                <br><h3  style="color:green;">
                                  <?php echo $succ_add; ?>
                                </h3>
                                <?php
                                  }
                        ?>
                                           </small>



                  <form action="<?php echo base_url();?>Testimonial_review/data_submit" id="testimonial_form" method="post" enctype="multipart/form-data" >
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Name: <span class="txt-red">*</span></label>
                        <input type="text" class="form-control" name="test_name" id="test_name" onkeypress='return event.charCode >= 65 && event.charCode <= 122 || event.charCode == 32'>
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="designation">Designation: <span class="txt-red">*</span></label>
                        <input type="text" class="form-control" name="designation" id="designation">
                      </div>
                      </div>
                       <div class="col-md-12">
                        <label class="choose-cuss">Choose File <span class="txt-red">*</span></label>
                      <div class='file-input'>
                        <label class='button'>Choose</label>
                       <input type='file'>
                       <span class='label' data-js-label>No file selected</span>
                        </div>
                    </div>
                      <div class="col-md-12">
                       <div class="form-group">
                                      <label>Message <span class="txt-red">*</span></label>
                                        <textarea class="form-control" name="test_emsg" id="test_emsg" ></textarea>
                      </div>
                      </div>

                      <button type="submit" class="btn btn-default testimonial-button" onclick="return form_validation()" >Submit</button>
                  </form>
                </div>
              </div>
                </div>

                    </div>
                    </div>



</body>
</html>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script>
    function readURL(input)
    { // alert(input);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prof_pic')
                    .attr('src', e.target.result)
                    .width(90)
                    .height(90);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script type="text/javascript">
    function validation()
    {
        var test_name = $('#test_name').val();
      if (!isNull(test_name)) {
        $('#test_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#test_name').removeClass('red_border').addClass('black_border');
      }

       var designation = $('#designation').val();
      if (!isNull(designation)) {
        $('#designation').removeClass('black_border').addClass('red_border');
      } else {
        $('#designation').removeClass('red_border').addClass('black_border');
      }

      

      var test_emsg = $('#test_emsg').val();
      if (!isNull(test_emsg)) {
        $('#test_emsg').removeClass('black_border').addClass('red_border');
      } else {
        $('#test_emsg').removeClass('red_border').addClass('black_border');
      }

    


    }





    function form_validation()
    {
        $('#testimonial_form').attr('onchange', 'validation()');
        $('#testimonial_form').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());
    if ($('#testimonial_form .red_border').size() > 0)
    {
      $('#testimonial_form .red_border:first').focus();
      $('#testimonial_form .alert-error').show();
      return false;
    } else {

      $('#testimonial_form').submit();
    }

    }
</script>