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
        SUBJECT EDIT
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_section/update" method="post" id="edit" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
              <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Course:<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <select name="parent_cat" id="parent_cat" class="form-control"  onchange="get_exam_name(this.value)">
                    <option value="">Select Course</option>
                     <?php

                      foreach($parent_exam_type as $row){
                      ?>
                      <option value="<?php echo $row->id; ?>" <?php if(@$grp_id==$row->id){echo 'selected'; }?>><?php echo $row->exam_name; ?></option>
                      <?php
                        }
                      ?>

                    </select>
                    
                </div>
                 
              </div> 



              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Exam Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                 <select name="exam_name" id="exam_name" class="form-control"  >
                    <option value="">Select</option>
                     
                      <?php

                      foreach($exam_list as $row){
                      ?>
                      <option value="<?php echo $row->id; ?>" <?php if(@$section[0]->exam_id==$row->id){echo 'selected'; }?>><?php echo $row->exam_name; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                    
                  </div>
                 
              </div>


            

              <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Subject Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="section_name" id="section_name" class="form-control" placeholder="Input Subject Name" value="<?php echo $section[0]->section_name;?>" >
                    
                  </div>
                 
              </div>




              <input type="hidden" value="<?php echo @$section[0]->id;?>" name="edit_id" >


              <!-- <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>
              
                  <div class="col-sm-9">
                    <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                    </select>
                    
                  </div>
                 
              </div> -->

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_section/view" class="btn btn-danger">Cancel</a>
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
    var section_name = $('#section_name').val();
      if (!isNull(section_name)) {
        $('#section_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#section_name').removeClass('red_border').addClass('black_border');
      }

      var parent_cat = $('#parent_cat').val();
      if (!isNull(parent_cat)) {
        $('#parent_cat').removeClass('black_border').addClass('red_border');
      } else {
        $('#parent_cat').removeClass('red_border').addClass('black_border');
      }


      var exam_name = $('#exam_name').val();
      if (!isNull(exam_name)) {
        $('#exam_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#exam_name').removeClass('red_border').addClass('black_border');
      }


      
  }
  function form_validation()
  {
  
   
    $('#edit').attr('onchange', 'validation()');
    $('#edit').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#edit .red_border').size() > 0)
    {
      $('#edit .red_border:first').focus();
      $('#edit .alert-error').show();
      return false;
    } else {

      $('#edit').submit();
    }

  }

  </script>


   <script>

    function get_exam_name(value)
    {
      //alert(value);
          var html='<option value="">Select</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/manage_section/get_exam",
                    data: {category_id: value},
                    async: false,
                    success: function(data)
                    {

                        //alert(data[0].category_id);
                        for(var i=0; i<data.length; i++)
                        {
                            html+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
                        }
                        //alert(html); 
                        $("#exam_name").html(html);

                    }
                });
          }
          else
          {
              $("#exam_name").html(html);
          }
    }
  </script>

            