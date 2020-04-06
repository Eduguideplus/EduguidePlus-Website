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
       JOB CATEGORY EDIT
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_job_category/edit_action" method="post" id="categoryadd_form_validation">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
              

              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Job Category Name : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="category_name" id="cat_name" class="form-control" placeholder="" value="<?php echo @$category_details[0]->job_category_title;?>" >
                    
                  </div>
                 
              </div>

               

              <input type="hidden" value="<?php echo @$category_details[0]->job_category_id;?>" name="category_edit_id" >
             
              
              <div class="form-group">
                  <label for="sort_order" class="col-sm-2 control-label">Sort Order : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="number" name="sort_order" id="sort_order" class="form-control" placeholder="" value="<?php echo $category_details[0]->sort_order;?>">
                    
                  </div>
                 
              </div>

              

              <!-- <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-8">
                    <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                    </select>
                    
                  </div>
                 
              </div> -->

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_job_category/category_list_view" class="btn btn-danger">Cancel</a>
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
  <!-- </div> -->
 
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
  function product_Submit_fm()
  {
    var cat_name = $('#cat_name').val();
      if (!isNull(cat_name)) {
        $('#cat_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#cat_name').removeClass('red_border').addClass('black_border');
      }
      var sort_order = $('#sort_order').val();
        if (sort_order<=0)
        {
          $('#sort_order').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#sort_order').removeClass('red_border').addClass('black_border');
        }

      /*var cat_desc = $('#cat_desc').val();
      if (!isNull(cat_desc)) {
        $('#cat_desc').removeClass('black_border').addClass('red_border');
      } else {
        $('#cat_desc').removeClass('red_border').addClass('black_border');
      }*/
/*
      var meta_tag = $('#meta_tag').val();
      if (!isNull(meta_tag)) {
        $('#meta_tag').removeClass('black_border').addClass('red_border');
      } else {
        $('#meta_tag').removeClass('red_border').addClass('black_border');
      }

      var meta_desc = $('#meta_desc').val();
      if (!isNull(meta_desc)) {
        $('#meta_desc').removeClass('black_border').addClass('red_border');
      } else {
        $('#meta_desc').removeClass('red_border').addClass('black_border');
      }

      var meta_key = $('#meta_key').val();
      if (!isNull(meta_key)) {
        $('#meta_key').removeClass('black_border').addClass('red_border');
      } else {
        $('#meta_key').removeClass('red_border').addClass('black_border');
      }*/
  }
  function form_validation()
    {
        //alert("ok");

        $('#categoryadd_form_validation').attr('onchange', 'product_Submit_fm()');
        $('#categoryadd_form_validation').attr('onkeyup', 'product_Submit_fm()');

        product_Submit_fm();
        //alert($('#contact_form .red_border').size());

        if ($('#categoryadd_form_validation .red_border').size() > 0)
        {
            $('#categoryadd_form_validation .red_border:first').focus();
            $('#categoryadd_form_validation .alert-error').show();
            return false;
        } 
        else 
        {

            $('#categoryadd_form_validation').submit();
        }
    }
 

  </script>

   
            