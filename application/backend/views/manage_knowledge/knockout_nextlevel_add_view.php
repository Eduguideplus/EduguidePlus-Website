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
        KNOCKOUT NEXT LEVEL SET CREATION<?php //echo $timestamp = date("g:i", time());?>
        
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
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_knowledge/create_next_level/<?php echo $this->uri->segment(3); ?>" method="post" id="add_know" >
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>



<?php


 $set_details = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$this->uri->segment(3)), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 


?>



<input type="hidden" name="set_id" id="set_id" value="<?php echo $this->uri->segment(3); ?>">
<input type="hidden" name="test_type" id="test_type" value="<?php echo $set_details[0]->test_type; ?>">

  <input type="hidden" name="sub_name" id="sub_name" value="<?php echo $set_details[0]->subject_id; ?>">

<input type="hidden" name="qstn_qty" id="qstn_qty" value="<?php echo $set_details[0]->q_qty; ?>">

                 <div class="form-group">
                 
                    <label for="class" class="col-sm-2 control-label">Examination Date <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="exam_date" id="exam_date" class="form-control" autocomplete="off" >
                    
                  </div>
               
                 
              </div>


               <div class="form-group" >
                


                  <label for="class" class="col-sm-2 control-label">Examination Time <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="exam_time" id="exam_time" class="form-control" autocomplete="off" ><span id="error_time"></span>
                    
                  </div>
</div>

                
             <!-- <input type="hidden" name="qlist" id="qlist" value="<?php echo @$str; ?>"> -->
             
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_knowledge/next_level_list/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" class="btn btn-danger">Cancel</a>
                <button type="button" class="btn btn-info pull-right" onclick="return know_form_validation()">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          

<div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  <th>Sl NO</th> 
                  <th>Image</th>
                  <th>Name</th>
                  <th>User Code</th>
                  <th>Obtained Marks</th>
                  <th>Rank Index</th>
                  <th>Email</th>
                  <th>Phone No</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                  $i=0;
                  foreach($enroll_details as $row)
                  {
                      $user_details= $this->common_model->common($table_name='tbl_user', $field = array(), $where = array('id'=>@$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $i++;
                    ?>

                    <tr>

                      <td><?php echo $i; ?></td>
                      <td>
                        <?php if($user_details[0]->profile_photo!=''){ ?><img src="<?php echo base_url();?>../assets/uploads/profile_image/<?php echo $user_details[0]->profile_photo;?>" height="80px" width="80px" style="border-radius: 50%"></img>
                        <?php } else { ?> 
                        <img src="<?php echo base_url();?>../assets/uploads/user/no-img-profile.png" height="  80px" width="80px" style="border-radius: 50%">
                        <?php } ?>
                    </td>
                    <td><?php echo $user_details[0]->user_name;?></td>
                     <td><?php echo $user_details[0]->user_code;?></td>
                     <td><?php echo @$row->total_marks;?></td>
                     <td><?php echo @$row->rank_index;?></td>
                     <td><?php echo $user_details[0]->login_email;?></td>
                     <td><?php echo $user_details[0]->login_mob;?></td> 

                    </tr>
                    <?php
                  }
                  ?>
                  

              
               
                
               

                </tfoot>
              </table>
            </div>
          
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
  function form_validation()
  {

   

                   var exam_date = $('#exam_date').val();
                  if (!isNull(exam_date)) {

                    // alert(exam_date);
                    $('#exam_date').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#exam_date').removeClass('red_border').addClass('black_border');
                  }

                  var exam_time = $('#exam_time').val();
                  if (!isNull(exam_time)) {
                    $('#exam_time').removeClass('black_border').addClass('red_border');
                  }else{
              
              $('#exam_time').removeClass('red_border').addClass('black_border');
            }     
            

               
     
      
  }
  function know_form_validation()
  {
  
   
    $('#add_know').attr('onchange', 'form_validation()');
    $('#add_know').attr('onkeyup', 'form_validation()');

     form_validation();

    // alert($('#add_know .red_border').size());

      

    if ($('#add_know .red_border').size() > 0)
    {
      $('#add_know .red_border:first').focus();
      $('#add_know .alert-error').show();
      return false;
    } else {

      $('#add_know').submit();
    }

  }

  </script>
