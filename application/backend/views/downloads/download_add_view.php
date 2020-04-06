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
       Add New File
        
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
             
              </span>

              <?php
            $succ_msg1=$this->session->flashdata('success');
            if($succ_msg1){
              ?>
              <br><span style="color:green">
                <?php echo $succ_msg1; ?>
              </span>
              <?php
              }
              ?>

               <?php
            $succ_msg2=$this->session->flashdata('delete_success');
            if($succ_msg2){
              ?>
              <br><span style="color:green">
                <?php echo $succ_msg2; ?>
              </span>
              <?php
              }
              ?>
             
              </span>
              </small>
              <small id="msg" style="color:red"></small>
      
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
              <!-- <h3 class="box-title">CATEGORY ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_documents/downloads_insert" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
             
              <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Title <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="material_name" id="material_name" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div>

              

              

              <div class="form-group" id="fl">
                  <label for="class" class="col-sm-2 control-label">File(PDF)<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8" >
                    <input type="file" name="material_file" id="material_file" class="form-control" >
                    
                  </div>

                 
              </div>



              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url()?>index.php/manage_documents/view_downloads" class="btn btn-danger">Cancel</a>
                <button type="button" class="btn btn-info pull-right" onclick="return form_validation()" >Submit</button>
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
 <script>
 function get_effect(val)
 {
    if(val==7)
    {
        $("#fl").hide();
        $("#vid").show();
    }
    else
    {
      $("#fl").show();
        $("#vid").hide();
    }
 }
 </script>
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>

<script>
  function validation()
  {
    
      var material_name = $('#material_name').val();
      if (!isNull(material_name)) {
        $('#material_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#material_name').removeClass('red_border').addClass('black_border');
      }

      var material_file = $('#material_file').val();
      if (!isNull(material_file)) {
        $('#material_file').removeClass('black_border').addClass('red_border');
      } else {
        $('#material_file').removeClass('red_border').addClass('black_border');
      }
  }
  function form_validation()
  {
  
   
    $('#add').attr('onchange', 'validation()');
    $('#add').attr('onkeyup', 'validation()');
    $('#add').attr('onclick', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#add .red_border').size() > 0)
    {
      $('#add .red_border:first').focus();
      $('#add .alert-error').show();
      return false;
    } else {

      $('#add').submit();
    }

  }

  </script>

        