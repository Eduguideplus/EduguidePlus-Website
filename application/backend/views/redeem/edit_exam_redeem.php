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
        Add Redeem Details
        
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
              <!-- <h3 class="box-title">CATEGORY ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
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
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/redeem/redeem_exam_edit_submit" method="post" id="redeem" >
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
             
              <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Percentage From <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-3">
                    <select class="form-control" id="percentage_from" name="percentage_from">
                      <option value="0">Percentage From</option>
                      <?php for($i = 50; $i <= 100; $i++)
                      {?>
                      <option value="<?php echo $i;?>" <?php if($exam_redeem[0]->percentage_from == $i){echo "selected";}?>><?php echo $i;?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                   <label for="class" class="col-sm-2 control-label">Percentage To <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-3">
                    <select class="form-control" id="percentage_to" name="percentage_to">
                      <option value="0">Percentage To</option>
                       <?php for($i = 50; $i <= 100; $i++)
                      {?>
                      <option value="<?php echo $i;?>" <?php if($exam_redeem[0]->percentage_to == $i){echo "selected";}?>><?php echo $i;?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                 
              </div>

               <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Referral Point<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="ref_point" id="ref_point" class="form-control" placeholder="" value="<?php echo $exam_redeem[0]->redeem_point;?>">
                    
                  </div>
                 
              </div>

              <input type="hidden" name="exam_redeem_id" value="<?php echo $exam_redeem[0]->id;?>">
              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                 <a href="<?php echo base_url();?>index.php/redeem/exam_redeem_list" class="btn btn-info pull-left">Back</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()">Submit</button>
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
  <script>
  function validation()
  {
    var percentage_from = $('#percentage_from').val();
 
      if (percentage_from == 0) {
        $('#percentage_from').removeClass('black_border').addClass('red_border');
      } 
        else {
        $('#percentage_from').removeClass('red_border').addClass('black_border');
      
      }
      
      var percentage_to = $('#percentage_to').val();
      if (percentage_to == 0) {
        $('#percentage_to').removeClass('black_border').addClass('red_border');
      }  else {
        $('#percentage_to').removeClass('red_border').addClass('black_border');
      }
      
     
      var ref_point = $('#ref_point').val();
      if (!isNull(ref_point)) {
        $('#ref_point').removeClass('black_border').addClass('red_border');
      } else {
       if (isNaN(ref_point)) {
        $('#ref_point').removeClass('black_border').addClass('red_border');
      } else {
        $('#ref_point').removeClass('red_border').addClass('black_border');
      }
      }


     
  }
  function form_validation()
  {
  
   
    $('#redeem').attr('onchange', 'validation()');
    $('#redeem').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#redeem .red_border').size() > 0)
    {
      $('#redeem .red_border:first').focus();
      $('#redeem .alert-error').show();
      return false;
    } else {

      $('#redeem').submit();
    }

  }

  </script>

        
 
