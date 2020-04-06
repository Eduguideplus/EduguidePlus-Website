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
        OFFICE ADDRESS 
         
        
        
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
              <h3 class="box-title">CONTACT DETAILS
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/contact/contact_update" method="post" id="contact" >
              <div class="box-body">
              <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
            

				<div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Phone  No.<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile No."  value="<?php echo $contact[0]->contact_phno; ?>">
                    <span id="error_mobile" style="color:red"></span>
                  </div>
                  
                </div>

				

				<div class="form-group">
					  <label for="inputEmail3" class="col-sm-2 control-label">Email Id <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"  value="<?php echo $contact[0]->contact_email; ?>">
                    <span id="error_email" style="color:red"></span>
                  </div>
                  
                </div>

                <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Address <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    
                    <textarea name="address" class="form-control"  placeholder=" Address" rows="5" cols="96" id="address"><?php echo $contact[0]->contact_address; ?></textarea>   
                    <span id="error_email" style="color:red"></span>
                  </div>
                  
                </div>	

                  <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Map Link <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    
                    <textarea name="map_link" class="form-control"  placeholder=" Map Link" rows="5" cols="96" id="map_link"><?php echo $contact[0]->map_link; ?></textarea>   
                    <span id="error_email" style="color:red"></span>
                  </div>
                  
                </div>	

               
                  		                                 
              </div>


              <input type="hidden" name="contact_id" value="<?php echo $contact[0]->contact_id; ?>">
              <div id="error"></div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>" class="btn btn-danger fa fa-backward"> <b>Back</b></a>
                <button type="submit" class="btn btn-info pull-right" onclick="return office_contact_validation()"><b>Update</b></button>
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
            

            