<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <!--<script>tinymce.init({ selector:'textarea' });</script>-->
  <script type="text/javascript">
    tinymce.init({
      selector: ".tinyarea",
      theme: "modern",
      menubar: "edit insert tools",

      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
      ],
      toolbar1: "undo redo | styleselect | bold italic| forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | link preview",
      image_advtab: true
    });
  </script>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      ABOUT US CONTENT 
      </h1>
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
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              
                <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_about_us/update" method="post" id="contact" enctype="multipart/form-data">
              <div class="box-body">
                <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
                
                <!-- <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Image <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span><br>size: (570 X 310 pixel)</label>

                  <div class="col-sm-8">
                    
                    <input type="file" name="image_about" id="image_about" class="form-control" >
                    <input type="hidden" name="old_image" id="old_image" value="<?php echo @$about_us_content[0]->image;?>">

                    <?php if(@$about_us_content[0]->image!='')
                      {
                    ?>
                        <br><img width="250" height="150" src="<?php echo base_url(); ?>../assets/uploads/about_us_image/<?php echo @$about_us_content[0]->image; ?>" alt="">
                  <?php } else { ?>

                        <img width="150" height="100" src="<?php echo base_url(); ?>../assets/uploads/about_us_image/no-image.png; ?>" alt="">
                  <?php   } ?>

                  </div>
                  
                </div> -->
                              
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Content<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    
                    <textarea type="text" name="content" id="content" class="tinyarea" style="resize:none;height:500px"><?php echo @$about_us_content[0]->page_content;?></textarea>
                    
                  </div>
                  
                </div>

                

				
              <input type="hidden" name="edit_id" value="<?php echo @$about_us_content[0]->id;?>">
              
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/dashboard" class="btn btn-danger fa fa-backward"> <b>Back</b></a>
                <button type="submit" class="btn btn-info pull-right" onclick="return office_contact_validation()"><b>Submit</b></button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  </div>
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>
<script type="text/javascript">
function contact()
 {
  
  
  var email = $('#email').val();
    if (!isEmail(email)) {
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

    var address = $('#address').val();
    if (!isNull(address)) {
      $('#address').removeClass('black_border').addClass('red_border');
            
    } else {
      $('#address').removeClass('red_border').addClass('black_border');
            
    }

    
}


    
function office_contact_validation()
{ 
  //alert('ok');
 $('#contact').attr('onchange', 'contact()');
    $('#contact').attr('onkeyup', 'contact()');
    $('#contact').attr('onclick', 'contact()');
  
  var checking= contact();

  if ($('#contact .red_border').size() > 0)  {
    $('#contact .red_border:first').focus();
    $('#contact .alert-error').show();
    return false;
  } else {

    $("#contact").submit();
  }
    
}

</script>
            

            