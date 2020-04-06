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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/redeem/redeem_view_add" method="post" id="redeem" >
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
             
              <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Redeem Point <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="redeem_point" id="redeem_point" class="form-control" placeholder="" value="<?php echo @$redeem[0]->redeem_point;?>">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Redeem Amount <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="redeem_amount" id="redeem_amount" class="form-control" placeholder="" value="<?php echo @$redeem[0]->redeem_amount;?>">
                    
                  </div>
                 
              </div>

               <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">User Referral Point<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="user_ref_point" id="user_ref_point" class="form-control" placeholder="" value="<?php echo @$redeem[0]->user_referral_point;?>">
                    
                  </div>
                 
              </div>

                 <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Minimum Redeem Point<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="min_redeem_point" id="min_redeem_point" class="form-control" placeholder="" value="<?php echo @$redeem[0]->min_redeem_point;?>">
                    
                  </div>
                 
              </div>

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                
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
    var redeem_point = $('#redeem_point').val();
      if (!isNull(redeem_point)) {
        $('#redeem_point').removeClass('black_border').addClass('red_border');
      } else {
        if (isNaN(redeem_point)) {
        $('#redeem_point').removeClass('black_border').addClass('red_border');
      } else {
        $('#redeem_point').removeClass('red_border').addClass('black_border');
      }
      }
      
      var redeem_amount = $('#redeem_amount').val();
      if (!isNull(redeem_amount)) {
        $('#redeem_amount').removeClass('black_border').addClass('red_border');
      } else {
        if (isNaN(redeem_amount)) {
        $('#redeem_amount').removeClass('black_border').addClass('red_border');
      } else {
        $('#redeem_amount').removeClass('red_border').addClass('black_border');
      }
      }
     
      var user_ref_point = $('#user_ref_point').val();
      if (!isNull(user_ref_point)) {
        $('#user_ref_point').removeClass('black_border').addClass('red_border');
      } else {
       if (isNaN(user_ref_point)) {
        $('#user_ref_point').removeClass('black_border').addClass('red_border');
      } else {
        $('#user_ref_point').removeClass('red_border').addClass('black_border');
      }
      }

      var min_redeem_point = $('#min_redeem_point').val();
      if (!isNull(min_redeem_point)) {
        $('#min_redeem_point').removeClass('black_border').addClass('red_border');
      } else {
       if (isNaN(min_redeem_point)) {
        $('#min_redeem_point').removeClass('black_border').addClass('red_border');
      } else {
        $('#min_redeem_point').removeClass('red_border').addClass('black_border');
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

        
 
