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
      <h3>
       WELCOME CONTENT DETAILS
         
        
        
      </h3>
      
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
              <h3 class="box-title">
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/welcome_content/content_update" method="post" id="welcome_content_form" enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
                  <label for="company_name" class="col-sm-2 control-label"><center>Title<span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo @$welcome[0]->title; ?>">
                     <span id="error_compname" style="color:red"></span>
                  </div>
                 
                </div>                 
                

            <!-- <div class="form-group">
                  <label for="company_name" class="col-sm-2 control-label"><center>Second Title<span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                    <input type="text" name="second_title" class="form-control" id="second_title"  value="<?php echo @$home_content[0]->second_title; ?>">
                     <span id="error_compname" style="color:red"></span>
                  </div>
                 
                </div> -->  

                <!--  <div class="form-group" >
                         <label for="clinic" class="col-sm-2 control-label text-center">Image</label>
                      <div class="col-sm-8">
                       <input class="form-control" type="file" name="image" id="image" style="margin-bottom:12px">
                       <img style="height: 100px;width: 150px;" src="<?php echo base_url(); ?>../assets/uploads/home_content/<?php echo @$home_content[0]->image; ?>">
                          <span id="error_video" style="color:red"></span>
                      </div>

                                        </div> -->

                <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label"><center>Contents<span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10" >
                   
                  <textarea name="content" class="tinyarea"   rows="5" cols="96" id="content"><?php echo @$welcome[0]->content; ?></textarea>

                    <span id="error_add" style="color:red"></span>

                  </div>
                  
                </div> 

				<span style="color:#F00">*Fields Are Required</span>

				


              <input type="hidden" name="hidden_id" value="<?php echo @$welcome[0]->id; ?>">
              <!-- <input type="hidden" name="hidden_image" value="<?php echo @$home_content[0]->image; ?>"> -->
              <div id="error"></div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/welcome_content/content_view" class="btn btn-danger">Cancel</a>
                <button type="button" onclick="return form_validation()" class="btn btn-info pull-right" >Update</button>
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
<script src="<?php echo base_url();?>custom_script/mission_validation.js"></script>

<script type="text/javascript">
  function validation()
  {     


      if ($('#title').val()== "") 
      {
        $('#title').addClass('red_border');
      }
      else 
      {
        $('#title').removeClass('red_border');
      }

      

      

              
  }

    function form_validation()
    {
         $('#welcome_content_form').attr('onchange', 'validation()');
         $('#welcome_content_form').attr('onkeyup', 'validation()');
         $('#welcome_content_form').attr('onfocus', 'validation()');
         

              validation();

              if ($('#welcome_content_form .red_border').size() > 0)
              {
                $('#welcome_content_form .red_border:first').focus();
                return false;
              }
              else 
              {
                
              var content = tinymce.get('content').getContent();
              if (!isNull(content)) 
                        {
          
              alert('Please Enter Contents');
              return false;
              } 
              else 
              {
              $('#welcome_content_form').submit();
              }
              }
  }
 </script>            

            