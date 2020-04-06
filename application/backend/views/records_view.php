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
        LIVE STATUS DETAILS
         
        
        
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
              
                <span style="padding-right:30px;"></span>
                <small style="color:#008000;"><?php 
        
                  $msg=$this->session->flashdata('succ_update');
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/records/records_update" method="post" id="record_form_validation" enctype="multipart/form-data" >
              <div class="box-body">

      <input type="hidden" name="recid" value="<?php echo @$records[0]->records_id; ?>">

      <div class="form-group">
                  <label for="record_1_title" class="col-sm-2 control-label"><center>Record 1 title : <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="record_1_title" class="form-control"  placeholder="Record 1 title"  id="record_1_title" value="<?php echo @$records[0]->record_1_title;?>">                   
                  </div>
                 
                </div>

      <div class="form-group">
                  <label for="record_1_count" class="col-sm-2 control-label"><center>Record 1 count : <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="record_1_count" class="form-control"  placeholder="Record 1 count"  id="record_1_count" value="<?php echo @$records[0]->record_1_count;?>">  
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="record_2_title" class="col-sm-2 control-label"><center>Record 2 title : <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="record_2_title" class="form-control"  placeholder="Record 2 title"  id="record_2_title" value="<?php echo @$records[0]->record_2_title;?>">                   
                  </div>
                 
                </div>

      <div class="form-group">
                  <label for="record_2_count" class="col-sm-2 control-label"><center>Record 2 count : <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="record_2_count" class="form-control"  placeholder="Record 2 count"  id="record_2_count" value="<?php echo @$records[0]->record_2_count;?>">  
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="record_3_title" class="col-sm-2 control-label"><center>Record 3 title : <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="record_3_title" class="form-control"  placeholder="Record 3 title"  id="record_3_title" value="<?php echo @$records[0]->record_3_title;?>">                   
                  </div>
                 
                </div>

      <div class="form-group">
                  <label for="record_3_count" class="col-sm-2 control-label"><center>Record 3 count :<span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="record_3_count" class="form-control"  placeholder="Record 3 count"  id="record_3_count" value="<?php echo @$records[0]->record_3_count;?>">  
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="record_4_title" class="col-sm-2 control-label"><center>Record 4 title:<span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="record_4_title" class="form-control"  placeholder="Record 4 title"  id="record_4_title" value="<?php echo @$records[0]->record_4_title;?>">                   
                  </div>
                 
                </div>

      <div class="form-group">
                  <label for="record_4_count" class="col-sm-2 control-label"><center>Record 4 count:<span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="record_4_count" class="form-control"  placeholder="Record 4 count"  id="record_4_count" value="<?php echo @$records[0]->record_4_count;?>">  
                  </div>
                 
                </div>

                
               
             <span style="color:#F00">*Fields Are Required</span>
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()">Update</button>
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
  <!-- </div> -->
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>custom_script/record_validation.js"></script>
<script>   
</script>

<script>

     function record_Submit_fm()
    {

        var record_1_title = $('#record_1_title').val();
        if (!isNull(record_1_title)) 
        {
          $('#record_1_title').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#record_1_title').removeClass('red_border').addClass('black_border');
        }

        var record_1_count = $('#record_1_count').val();
        if (!isNull(record_1_count)) 
        {
          $('#record_1_count').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#record_1_count').removeClass('red_border').addClass('black_border');
        }

        var record_2_title = $('#record_2_title').val();
        if (!isNull(record_2_title)) 
        {
          $('#record_2_title').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#record_2_title').removeClass('red_border').addClass('black_border');
        }

        var record_2_count = $('#record_2_count').val();
        if (!isNull(record_2_count)) 
        {
          $('#record_2_count').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#record_2_count').removeClass('red_border').addClass('black_border');
        }

        var record_3_title = $('#record_3_title').val();
        if (!isNull(record_3_title)) 
        {
          $('#record_3_title').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#record_3_title').removeClass('red_border').addClass('black_border');
        }

        var record_3_count = $('#record_3_count').val();
        if (!isNull(record_3_count)) 
        {
          $('#record_3_count').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#record_3_count').removeClass('red_border').addClass('black_border');
        }
/*
        var record_4_title = $('#record_4_title').val();
        if (!isNull(record_4_title)) 
        {
          $('#record_4_title').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#record_4_title').removeClass('red_border').addClass('black_border');
        }

        var record_4_count = $('#record_4_count').val();
        if (!isNull(record_4_count)) 
        {
          $('#record_4_count').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#record_4_count').removeClass('red_border').addClass('black_border');
        }
        */
        

    }

    function form_validation()
    {
        //alert("ok");

        $('#record_form_validation').attr('onchange', 'record_Submit_fm()');
        $('#record_form_validation').attr('onkeyup', 'record_Submit_fm()');

        record_Submit_fm();
        //alert($('#contact_form .red_border').size());

        if ($('#record_form_validation .red_border').size() > 0)
        {
            $('#record_form_validation .red_border:first').focus();
            $('#record_form_validation .alert-error').show();
            return false;
        } 
        else 
        {

            $('#record_form_validation').submit();
        }
    }
</script>
<style>
.error {color: #FF0000;}
</style>        