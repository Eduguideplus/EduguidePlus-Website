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
        EXAM-TYPE EDIT
        
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
              <!-- <h3 class="box-title">EXAM-TYPE EDIT</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_exam_type/update" method="post" id="edit" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
              <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Parent Category</label>

                <div class="col-sm-9">
                    <select name="parent_cat" id="parent_cat" class="form-control" onchange="get_subcategory(this.value)" >
                    <option value="">Select</option>
                     <?php

                      foreach($parent_type as $row){
                      ?>
                      <option value="<?php echo $row->id; ?>"  <?php if($row->id==@$m_cat[0]->id){ echo 'selected';}?> ><?php echo $row->exam_name; ?></option>
                      <?php
                        }
                      ?>

                    </select>
                     <p class="help-block">(No need to select any category to upload Parent Category)</p>
                </div>
                 
              </div> 


              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Category Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="" value="<?php echo @$exam_type[0]->exam_name;?>" >
                    
                  </div>
                 
              </div>
              <input type="hidden" value="<?php echo @$exam_type[0]->id;?>" name="edit_id" >

             <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Category Icon (40 X 40 pixel)<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="file" name="cat_icon" id="cat_icon" class="form-control" placeholder="" value="">
                    <input type="hidden" name="old_image" id="old_image" value="<?php echo @$exam_type[0]->icon;?>" >
                    
                  </div>
                 
              </div>

              

              <div class="form-group">
                  <label for="meta_tag" class="col-sm-2 control-label">Meta Tag Title</label>

                  <div class="col-sm-9">
                    <input type="text" name="meta_tag" id="meta_tag" class="form-control" placeholder="" value="<?php echo @$exam_type[0]->meta_title;?>">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="meta_desc" class="col-sm-2 control-label">Meta Tag Description</label>

                  <div class="col-sm-9">
                    <input type="text" name="meta_desc" id="meta_desc" class="form-control" placeholder="" value="<?php echo @$exam_type[0]->meta_description;?>">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="meta_key" class="col-sm-2 control-label">Meta Tag Keyword</label>

                  <div class="col-sm-9">
                    <input type="text" name="meta_key" id="meta_key" class="form-control" placeholder="" value="<?php echo @$exam_type[0]->meta_keyword;?>">
                    
                  </div>
                 
              </div>

             

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_exam_type/view" class="btn btn-danger">Cancel</a>
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
  function get_subcategory(value)
{

  //alert(value);
    var html='<option value="">Select</option>';
    if(value>0)
    {
      $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_category/get_subcategory",
              data: {category_id: value},
              async: false,
              success: function(data)
              {

                  //alert(data[0].category_id);
                  for(var i=0; i<data.length; i++)
                  {
                      html+='<option value="'+data[i].category_id+'">'+data[i].category_name+'</option>';
                  }
                  $("#sub_category").html(html);

              }
          });
    }
    else
    {
        $("#sub_category").html(html);
    }


}



  </script>
  <script>
  function validation()
  {
    var cat_name = $('#cat_name').val();
      if (!isNull(cat_name)) {
        $('#cat_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#cat_name').removeClass('red_border').addClass('black_border');
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

            