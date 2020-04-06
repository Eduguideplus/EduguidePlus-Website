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
        ENGLISH VOCABULARY
         
        
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/vocabulary/vocabulary_update" method="post" id="record_form_validation" enctype="multipart/form-data" >
              <div class="box-body">

      <input type="hidden" name="recid" value="<?php echo @$vocabulary[0]->title_id; ?>">

      <div class="form-group">
                  <label for="title1" class="col-sm-2 control-label"><center>Title1 : <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="title1" class="form-control"  placeholder="Title1"  id="title1" value="<?php echo @$vocabulary[0]->title1;?>">                   
                  </div>
                 
                </div>

      <div class="form-group">
                  <label for="description1" class="col-sm-2 control-label"><center>Description1: <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="description1" class="form-control"  placeholder="Description1"  id="description1" value="<?php echo @$vocabulary[0]->description1;?>">  
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="title2" class="col-sm-2 control-label"><center>Title2 : <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="title2" class="form-control"  placeholder="Title2"  id="title2" value="<?php echo @$vocabulary[0]->title2;?>">                   
                  </div>
                 
                </div>

      <div class="form-group">
                  <label for="description2" class="col-sm-2 control-label"><center>Description2 : <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="description2" class="form-control"  placeholder="Description2"  id="description2" value="<?php echo @$vocabulary[0]->description2;?>">  
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="title3" class="col-sm-2 control-label"><center>Title3 : <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="title3" class="form-control"  placeholder="Title3"  id="title3" value="<?php echo @$vocabulary[0]->title3;?>">                   
                  </div>
                 
                </div>

      <div class="form-group">
                  <label for="description3" class="col-sm-2 control-label"><center>Description3 :<span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-10">
                   <input type="text" name="description3" class="form-control"  placeholder="Description3"  id="description3" value="<?php echo @$vocabulary[0]->description3;?>">  
                  </div>
                 
                </div>

              <!--   <div class="form-group">
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
 -->
                
               
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

        var title1 = $('#title1').val();
        if (!isNull(title1)) 
        {
          $('#title1').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#title1').removeClass('red_border').addClass('black_border');
        }

        var description1 = $('#description1').val();
        if (!isNull(description1)) 
        {
          $('#description1').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#description1').removeClass('red_border').addClass('black_border');
        }

        var title2 = $('#title2').val();
        if (!isNull(title2)) 
        {
          $('#title2').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#title2').removeClass('red_border').addClass('black_border');
        }

        var description2 = $('#description2').val();
        if (!isNull(description2)) 
        {
          $('#description2').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#description2').removeClass('red_border').addClass('black_border');
        }

        var title3 = $('#title3').val();
        if (!isNull(title3)) 
        {
          $('#title3').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#title3').removeClass('red_border').addClass('black_border');
        }

        var description3 = $('#description3').val();
        if (!isNull(description3)) 
        {
          $('#description3').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#description3').removeClass('red_border').addClass('black_border');
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