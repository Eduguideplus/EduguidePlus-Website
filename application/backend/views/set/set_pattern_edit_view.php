

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
        SET PATTERN EDIT
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_set/update_pattern" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
             <?php 
             $exam_id = $edit_pattern[0]->exam_id;
             $exam = $this->admin_model->selectOne('tbl_exam_type','id',$exam_id);
             $ex_type_id = @$exam[0]->exam_type_id;
             $exam_name = $this->admin_model->selectOne('tbl_exam_type','id',$ex_type_id);
             $sub_exam_type = $this->admin_model->selectOne('tbl_exam_type','exam_type_id',$ex_type_id);





             ?>

              <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Exam Type<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <select  name="exam_type_id" id="exam_type_id" class="form-control" onchange="get_exam(this.value)">
                    <option value="">Select Exam Type</option>
                    <?php foreach($type as $typ){?>
                      <option value="<?php echo $typ->id; ?>" <?php if($ex_type_id>0){ if($typ->id==$ex_type_id){ echo 'selected'; } } else if($typ->id==$exam_id){ echo 'selected'; }?>><?php echo $typ->exam_name; ?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                 
              </div>

              <!-- <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Exam Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
              
                  <div class="col-sm-9">
                    <select  name="exam_id" id="exam_id" class="form-control">
                    <?php foreach($exam as $name){?>
                   <option value="<?php echo $name->id; ?>"><?php if($ex_type_id>0){ echo @$exam[0]->exam_name; } else { echo @$exam_name[0]->exam_name; } ?></option>
                   <?php } ?>
                    </select>
                    
                  </div>
                 
              </div> -->
              <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Exam Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <select  name="exam_id" id="exam_id" class="form-control">
                    <?php foreach($sub_exam_type as $name){?>
                   <option value="<?php echo $name->id; ?>" <?php if($ex_type_id>0){ if($name->id==@$exam[0]->id){ echo 'selected';}}?>><?php echo $name->exam_name; ?></option>
                   <?php } ?>
                    </select>
                    
                  </div>
                 
              </div>

  <input type="hidden" name="edit_id" value="<?php echo @$edit_pattern[0]->id;?>" >

  <!-- <?php if(count($section)>0){
              
                for($i=1;$i<=count($section);$i++){
              
              
                ?>
                            <div class="form-group">
                              <label for="" class="col-sm-2 control-label"><?php if($i==1){ echo 'Section Name'; }?></label>
                           
                              <div class="col-sm-4">
                                <select  name="section_id[]" id="section_id" class="form-control">
                               <option value="">Select Section Name</option>
                               <?php foreach($section as $sec){
                                  
                                ?>
                                <option value="<?php echo $sec->id; ?>" <?php foreach($edit_pattern_section as $edit_sec){ if($edit_sec->section_id==$sec->id){ echo 'selected';} break;}?>><?php echo $sec->section_name; ?></option>
                                <?php }  ?>
                                </select>
                                
                              </div>
                               <label for="" class="col-sm-2 control-label"><?php if($i==1){ echo 'Quantity(No. of Question)'; }?></label>
                              <div class="col-sm-3">
                                <input type="text"  name="qty[]" id="qty" class="form-control">
                                
                                
                              </div>
                             
                            </div>
                           
               <?php } }?>   -->


     <?php if(count($edit_pattern_section)>0){
           
           for($i=0;$i<count($edit_pattern_section);$i++){
           
           
           ?>
                       <div class="form-group">
                         <label for="" class="col-sm-2 control-label"><?php if($i==0){ echo 'Section Name'; }?></label>
                      
                         <div class="col-sm-4">
                           <select  name="section_id[]" id="section_id" class="form-control">
                          <option value="">Select Section Name</option>
                          <?php foreach($section as $sec){
                             
                           ?>
                           <option value="<?php echo $sec->id; ?>" <?php if($edit_pattern_section[$i]->section_id==$sec->id){ echo 'selected';}?>><?php echo $sec->section_name; ?></option>
                           <?php }  ?>
                           </select>
                           
                         </div>
                          <label for="" class="col-sm-2 control-label"><?php if($i==0){ echo 'Quantity(No. of Question)'; }?></label>
                         <div class="col-sm-3">
                           <input type="text"  name="qty[]" id="qty" class="form-control" value="<?php echo $edit_pattern_section[$i]->quantity;?>">
                           
                           
                         </div>
                        
                       </div>
                      
              <?php } }?>  

              <?php if(count($section)>0){
           
           for($j=1;$j<=(count($section)-count($edit_pattern_section));$j++){
           
           
           ?>
                       <div class="form-group">
                         <label for="" class="col-sm-2 control-label"></label>
                      
                         <div class="col-sm-4">
                           <select  name="section_id[]" id="section_id" class="form-control">
                          <option value="">Select Section Name</option>
                          <?php foreach($section as $sec){
                             
                           ?>
                           <option value="<?php echo $sec->id; ?>" ><?php echo $sec->section_name; ?></option>
                           <?php }  ?>
                           </select>
                           
                         </div>
                          <label for="" class="col-sm-2 control-label"></label>
                         <div class="col-sm-3">
                           <input type="text"  name="qty[]" id="qty" class="form-control" value="">
                           
                           
                         </div>
                        
                       </div>
                      
              <?php } }?>         
                

              <!-- <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Status<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
              
                  <div class="col-sm-9">
                    <select  name="status" id="status" class="form-control">
                   <option value="active" <?php if(@$edit_pattern[0]->pattern_status=='active'){ echo 'selected'; }?>>Active</option>
                   <option value="inactive" <?php if(@$edit_pattern[0]->pattern_status=='inactive'){ echo 'selected'; }?>>Inactive</option>
                    </select>
                    
                  </div>
                 
              </div> -->

             


              

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_set/view_pattern" class="btn btn-danger">Cancel</a>
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
  function get_exam(value)
{

  //alert(value);

    var html='<option value="">Select</option>';
    if(value>0)
    {
      $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_set/get_exam",
              data: {type_id: value},
              async: false,
              success: function(data)
              {

                  //alert(data[0].category_id);
                  for(var i=0; i<data.length; i++)
                  {
                      html+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
                  }
                  $("#exam_id").html(html);

              }
          });
    }
    else
    {
        $("#exam_id").html(html);
    }


}



  </script>

  <script>
  function validation()
  {
    var exam_type_id = $('#exam_type_id').val();
      if (!isNull(exam_type_id)) {
        $('#exam_type_id').removeClass('black_border').addClass('red_border');
      } else {
        $('#exam_type_id').removeClass('red_border').addClass('black_border');
      }

      var exam_id = $('#exam_id').val();
      if (!isNull(exam_id)) {
        $('#exam_id').removeClass('black_border').addClass('red_border');
      } else {
        $('#exam_id').removeClass('red_border').addClass('black_border');
      }


       var section_id = $('#section_id').val();
      if (!isNull(section_id)) {
        $('#section_id').removeClass('black_border').addClass('red_border');
      } else {
        $('#section_id').removeClass('red_border').addClass('black_border');
      }

      var qty = $('#qty').val();
      if (!isNull(qty)) {
        $('#qty').removeClass('black_border').addClass('red_border');
      } else {
        $('#qty').removeClass('red_border').addClass('black_border');
      }

      
  }
  function form_validation()
  {
  
   
    $('#add').attr('onchange', 'validation()');
    $('#add').attr('onkeyup', 'validation()');

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

            