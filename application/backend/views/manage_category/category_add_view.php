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
        CATEGORY ADD
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_category/insert" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
              <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Parent Category</label>

                <div class="col-sm-9">
                    <select name="parent_cat" id="parent_cat" class="form-control" onchange="get_subcategory(this.value)" >
                    <option value="">Select</option>
                     <?php

                      foreach($category_list as $row){
                      ?>
                      <option value="<?php echo $row->category_id; ?>" ><?php echo $row->category_name; ?></option>
                      <?php
                        }
                      ?>

                    </select>
                     <p class="help-block">(No need to select any category to upload Parent Category)</p>
                </div>
                 
              </div> 

              <div class="form-group">
                  <label for="sub_category" class="col-sm-2 control-label">Sub Category</label>

                <div class="col-sm-9">
                    <select name="sub_category" id="sub_category" class="form-control"  >
                        <option value="">Select</option>
                    </select>
                      <p class="help-block">(No need to select category to upload Parent or Sub Category)</p>
                </div>
                 
              </div> 

              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Category Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="" value="" >
                    
                  </div>
                 
              </div>


              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Exam Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <select  name="exam_name" id="exam_name" class="form-control" placeholder="" value="<?php //echo @$category[0]->exam_id;?>" >
                    <option value="">Select Exam Name</option>
                    <?php foreach($practice  as $ptc){?>
                      <option value="<?php echo $ptc->id; ?>"><?php echo $ptc->exam_name; ?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                 
              </div>

             <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Category Icon (40 X 40 pixel)<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="file" name="cat_icon" id="cat_icon" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Category Description</label>

                  <div class="col-sm-9">
                    <textarea type="text" name="cat_desc" id="cat_desc" class="form-control" placeholder="" value="" rows="5"></textarea>
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="meta_tag" class="col-sm-2 control-label">Meta Tag Title</label>

                  <div class="col-sm-9">
                    <input type="text" name="meta_tag" id="meta_tag" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="meta_desc" class="col-sm-2 control-label">Meta Tag Description</label>

                  <div class="col-sm-9">
                    <input type="text" name="meta_desc" id="meta_desc" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="meta_key" class="col-sm-2 control-label">Meta Tag Keyword</label>

                  <div class="col-sm-9">
                    <input type="text" name="meta_key" id="meta_key" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div>

              <!-- <div class="form-group">
                  <label for="sort_order" class="col-sm-2 control-label">Sort Order</label>
              
                  <div class="col-sm-9">
                    <input type="text" name="sort_order" id="sort_order" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div> -->

              <!-- <div class="form-group">
                  <label for="show_in_menu" class="col-sm-2 control-label">Show In Menu</label>
              
                  <div class="col-sm-9">
                    <select class="form-control" name="show_in_menu" id="show_in_menu">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                    </select>
                    
                  </div>
                 
              </div> -->

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
                <a href="<?php echo base_url();?>index.php/manage_category/view" class="btn btn-danger">Cancel</a>
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

      var cat_icon = $('#cat_icon').val();
      if (!isNull(cat_icon)) {
        $('#cat_icon').removeClass('black_border').addClass('red_border');
      } else {
        $('#cat_icon').removeClass('red_border').addClass('black_border');
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

            