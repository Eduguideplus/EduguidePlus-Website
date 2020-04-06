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
       <!--  SOCIAL LINK DETAILS -->
         
        
        
      </h1>
      
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
              <h3 class="box-title">SOCIAL LINK DETAILS
                <span style="padding-right:30px;"></span>
                <small style="color:#008000;"><?php 
        
                  $msg=$this->session->flashdata('succ_msg');
                  if($msg)
                   {
                   echo $msg;
                   }

                ?></small>


              </h3>
                <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/social_site/links_update" method="post" id="link" >
              <div class="box-body">
             <!-- <div class="form-group">
                  <label for="company_name" class="col-sm-2 control-label">Comapany Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="Comp_name" id="Comp_name"class="form-control" id="inputName" placeholder="Company Name" value="<?php echo $contact[0]->company_name; ?>">
                     <span id="error_compname" style="color:red"></span>
                  </div>
                 
                </div>-->                 
                <div class="form-group">
                  <label for="facebook" class="col-sm-2 control-label">Facebook Link</label>

                  <div class="col-sm-10">
                    <!--<textarea name="address" class="tinyarea" id="address" placeholder="Address"><?php echo $contact[0]->address; ?></textarea> -->
                    <input type="text" name="fb" id="fb" class="form-control" value="<?php echo @$site[0]->facebook_link; ?>"> 
                    <span id="error_add" style="color:red"></span>
                  </div>
                  
                </div>

				<div class="form-group">
                  <label for="twitter" class="col-sm-2 control-label">Twitter Link</label>

                  <div class="col-sm-10">
                    <input type="text" name="twt" class="form-control" id="twt"   value="<?php echo @$site[0]->twitter_link; ?>">
                    <span id="error_mobile" style="color:red"></span>
                  </div>
                  
                </div>

         <div class="form-group" >
              <label for="YouTube" class="col-sm-2 control-label">YouTube Link</label>

                  <div class="col-sm-10">
                    <input type="text" name="ytb" class="form-control" id="ytb"  value="<?php echo @$site[0]->youtube_link; ?>">
                    <span id="error_email" style="color:red"></span>
                  </div>
                  
                </div>                                         
              

			

				 <div class="form-group">
					  <label for="pinterest_link" class="col-sm-2 control-label">Linkedin Link</label>

                  <div class="col-sm-10">
                    <input type="text" name="linkedin" class="form-control" id="linkedin"   value="<?php echo @$site[0]->linkedin_link; ?>">
                    <span id="error_email" style="color:red"></span>
                  </div>
                  
                </div>				                                 
             
			<!--   <div class="form-group">
					  <label for="linkedin_link" class="col-sm-2 control-label">Instagram Link</label>

                  <div class="col-sm-10">
                    <input type="text" name="lkd" class="form-control" id="lkd"  value="<?php echo @$site[0]->linkedin_link; ?>">
                    <span id="error_email" style="color:red"></span>
                  </div>
                  
                </div> -->		 		                                 
              



              <input type="hidden" name="edit_id" value="<?php echo @$site[0]->id; ?>">
              <div id="error"></div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/dashboard" class="btn btn-danger fa fa-backward"> <b>Back</b></a>
                <button type="button" class="btn btn-info pull-right" onclick="return social_links_validation()"><b>Update</b></button>
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
<script type="text/javascript">
  
function update()
 {
  
  
  var fb = $('#fb').val();
    if (!isNull(fb)) {
      $('#fb').removeClass('black_border').addClass('red_border');
            
    } else {
      $('#fb').removeClass('red_border').addClass('black_border');
            
    }

    var twt = $('#twt').val();
    if (!isNull(twt)) {
      $('#twt').removeClass('black_border').addClass('red_border');
            
    } else {
      $('#twt').removeClass('red_border').addClass('black_border');
            
    }

    var ytb = $('#ytb').val();
    if (!isNull(ytb)) {
      $('#ytb').removeClass('black_border').addClass('red_border');
            
    } else {
      $('#ytb').removeClass('red_border').addClass('black_border');
            
    }

   

     var linkedin = $('#linkedin').val();
    if (!isNull(linkedin)) {
      $('#linkedin').removeClass('black_border').addClass('red_border');
            
    } else {
      $('#linkedin').removeClass('red_border').addClass('black_border');
            
    }

   
}


    
function social_links_validation()
{ 
  //alert('ok');
 $('#link').attr('onchange', 'update()');
    $('#link').attr('onkeyup', 'update()');
    $('#link').attr('onclick', 'update()');
  
  var checking= update();

  if ($('#link .red_border').size() > 0)  {
    $('#link .red_border:first').focus();
    $('#link .alert-error').show();
    return false;
  } else {
    
    
    $("#link").submit();
    
  }
    
}

</script>
            

            