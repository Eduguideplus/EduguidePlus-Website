<!-- <script src='//cdn.tinymce.com/4/tinymce.min.js'></script> -->
  <!--<script>tinymce.init({ selector:'textarea' });</script>-->
 <!--  <script type="text/javascript">
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
  </script> -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EDIT INSTRUCTION FOR EXAMINATION
         
        
        
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
              <h3 class="box-title">INSTRUCTION DETAILS
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_instruction/update_instruction" method="post" id="instruct" >
              <div class="box-body">
              <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
             <!-- <div class="form-group">
                  <label for="company_name" class="col-sm-2 control-label">Comapany Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="Comp_name" id="Comp_name"class="form-control" id="inputName" placeholder="Company Name" value="<?php echo $contact[0]->company_name; ?>">
                     <span id="error_compname" style="color:red"></span>
                  </div>
                 
                </div>--> 

                <div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Instruction Title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="ins_title" class="form-control" id="ins_title" placeholder="Instruction Title."  value="<?php echo @$instruction[0]->instruction_title;?>">
                    <span id="error_mobile" style="color:red"></span>
                  </div>
                  
                </div>


                <div class="form-group">
                  <label for="mobile" class="col-sm-2 control-label">Instruction Details<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    <!--<textarea name="address" class="tinyarea" id="address" placeholder="Address"><?php echo $contact[0]->address; ?></textarea> -->
                    <textarea type="text" name="ins_dtls" id="ins_dtls" class="form-control tinyarea" value="" style="resize:none;height:90px" ><?php echo @$instruction[0]->instruction_details;?> </textarea>
                    <span id="error_add" style="color:red"></span>
                  </div>
                  
                </div>

     

        

          

         
                                                       
              </div>


               <input type="hidden" name="ins_id" value="<?php echo $instruction[0]->id; ?>">
              <div id="error"></div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>" class="btn btn-danger fa fa-backward"> <b>Back</b></a>
                <button type="submit" class="btn btn-info pull-right" onclick="return instruction_add_validation()"><b>Submit</b></button>
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
function instruction()
 {
  
  
  var ins_title = $('#ins_title').val();
    if (!isNull(ins_title)) {
      $('#ins_title').removeClass('black_border').addClass('red_border');
            
    } else {
      $('#ins_title').removeClass('red_border').addClass('black_border');
            
    }

   /* var inst_dtls = $('#inst_dtls').val();

    if (!isNull(inst_dtls)) {
     $('#inst_dtls').removeClass('black_border').addClass('red_border');
   
            
    } else {
        $('#inst_dtls').removeClass('red_border').addClass('black_border');
       
       
     
    }*/

   

    
}


    
function instruction_add_validation()
{ 
  
 $('#instruct').attr('onchange', 'instruction()');
    $('#instruct').attr('onkeyup', 'instruction()');
    $('#instruct').attr('onclick', 'instruction()');
   
  
  var checking= instruction();
  

  if ($('#instruct .red_border').size() >0) 
   {
    alert('ok');
      $('#instruct .red_border:first').focus();
      $('#instruct .alert-error').show();
      return false;
  } 
  else {
  
        $("#instruct").submit();
      }
    
}

</script> 

            