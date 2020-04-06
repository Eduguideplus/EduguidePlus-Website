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
        BATCH UPDATE
        
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
              <!-- <h3 class="box-title">COMPANY ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_batch/update" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
              <div id="all_sub">
              <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Partner<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <select name="faculty" id="faculty" class="form-control">
                      <option value="">Select Partner</option>
                      <?php 
                      foreach($faculty_details as $row)
                        {
                          ?>
                          <option value="<?php echo $row->id;?>" <?php if($row->id==@$batch[0]->faculty_id){echo 'selected'; } ?>><?php echo $row->user_name;?></option>
                          <?php
                        }
                        ?>
                    </select>
                    
                  </div>

                  <!-- <div class="col-sm-6">
                    <?php
           $faculty_details=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>@$batch[0]->faculty_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                     ?>
                    <input type="text" name="faculity" readonly=""  class="form-control" value="<?php echo @$faculty_details[0]->user_name;?>">
                    
                  </div> -->
                </div>

                <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Batch City<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                   <div class="col-sm-6">
                    <?php

                  $city_list= $this->common_model->common($table_name ='cities', $field = array(), $where = array('id'=>$batch[0]->batch_city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
           ?>
                    <input type="text" name="city" readonly=""  class="form-control" value="<?php echo @$city_list[0]->name;?>">
                    
                  </div>

                 
                </div>

                <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Batch Year<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                 
                     <div class="col-sm-6">
                  
                    <input type="text" name="faculiy" readonly=""  class="form-control" value="<?php echo @$batch[0]->batch_year;?>">
                    
                  </div>
                    
                 
                </div>

                <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Batch Month<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <!-- <select name="batch_month" disabled="" id="batch_month" class="form-control">
                      <option value="">Select Batch Month</option>
                      <?php

                      for ($i = 1; $i <= 12; $i++)
                      {
                          $month_name = date('F', mktime(0, 0, 0, $i, 1, 2019));
                          // echo '<option value="'.$month_name.'"'.$month_name.'></option>';
                      ?>
                      <option value="<?php echo $i;?>"<?php if($i==@$batch[0]->batch_month){ echo "selected"; }?>><?php echo $month_name;?></option>
                      <?php
                    }
                    ?>
                    </select> -->
                    <?php
                     for ($i = 1; $i <= 12; $i++)
                      {
                          $month_name = date('F', mktime(0, 0, 0, @$batch[0]->batch_month, 1, 2019));
                          // echo '<option value="'.$month_name.'"'.$month_name.'></option>';
                      }
                      ?>

                    <input type="text" name="faculiy" readonly=""  class="form-control" value="<?php echo $month_name ;?>">
                    
                  </div>
                </div>

                <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Batch Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <textarea id="batch_description" name="batch_description"  class="form-control"><?php echo @$batch[0]->batch_description;?></textarea>
                    
                  </div>
                  <input type="hidden" name="batch_id" value="<?php echo @$batch[0]->batch_id;?>">
                </div>

            </div>

             </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_batch/batch" class="btn btn-danger">Cancel</a>
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
  </div>
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>




  <script>
  function validation()
  {
   
      // var faculty = $('#faculty').val();
      // if (!isNull(faculty)) {
      //   $('#faculty').removeClass('black_border').addClass('red_border');
      // } else {
      //   $('#faculty').removeClass('red_border').addClass('black_border');
      // }

      // var batch_city = $('#batch_city').val();
      // if (!isNull(batch_city)) {
      //   $('#batch_city').removeClass('black_border').addClass('red_border');
      // } else {
      //   $('#batch_city').removeClass('red_border').addClass('black_border');
      // }

      // var batch_year = $('#batch_year').val();
      // if (!isNull(batch_year)) {
      //   $('#batch_year').removeClass('black_border').addClass('red_border');
      // } else {
      //   $('#batch_year').removeClass('red_border').addClass('black_border');
      // }

      // var batch_month = $('#batch_month').val();
      // if (!isNull(batch_month)) {
      //   $('#batch_month').removeClass('black_border').addClass('red_border');
      // } else {
      //   $('#batch_month').removeClass('red_border').addClass('black_border');
      // }

      // var batch_description = $('#batch_description').val();
      // if (!isNull(batch_description)) {
      //   $('#batch_description').removeClass('black_border').addClass('red_border');
      // } else {
      //   $('#batch_description').removeClass('red_border').addClass('black_border');
      // }

      
  }
  function form_validation()
  {
  
   
  //   $('#add').attr('onchange', 'validation()');
  //   $('#add').attr('onkeyup', 'validation()');

  //    validation();
  //   //alert($('#contact_form .red_border').size());

  //   if ($('#add .red_border').size() > 0)
  //   {
  //     $('#add .red_border:first').focus();
  //     $('#add .alert-error').show();
  //     return false;
  //   } else {

  //     $('#add').submit();
  //   }

  // }

  </script>


  

            