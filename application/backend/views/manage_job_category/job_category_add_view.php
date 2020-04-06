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
       JOB CATEGORY ADD
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_job_category/insert_category" method="post" id="categoryadd_form_validation" >
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
              

              <div class="form-group">
                  <label for="category_name" class="col-sm-2 control-label">Job Category Title : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="category_name" id="category_name" onkeyup="catname(this.value)" class="form-control" placeholder="Category name" value=""  autocomplete="off">
                    
                  </div>
                 
              </div>

              <div class="clearfix"></div> 
              <div class="form-group">
                  <label for="sort_order" class="col-sm-2 control-label">Job Sort Order : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="number" name="sort_order" id="sort_order"
                     onchange="sort_order(this.value)"
                     class="form-control" placeholder="Sort Order" value="<?php  if($category_details[0]->sort_order!=""){$next_order = $category_details[0]->sort_order+1; echo @$next_order; } 
                                    else {echo "1";} ?>">
                    
                  </div>
                 
              </div>

               

              <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-8">
                    <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                    </select>
                    
                  </div>
                 
              </div>

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_job_category/category_list_view" class="btn btn-danger">Cancel</a>
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
  <!-- </div> -->
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- <script type="text/javascript">
        function sort_order(value1){
        // var sort_order = $('#sort_order').val();
        if (value1<=0 && value1=="") 
        {
          document.getElementById('#sort_order').value = 1;
         
        } }
</script>

 -->
   <script>

    function product_Submit_fm()
    {


        var category = $('#category_name').val();
        if (!isNull(category)) 
        {
          $('#category_name').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#category_name').removeClass('red_border').addClass('black_border');
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

        //    var sort_order = $('#sort_order').val();
        // if (!isNull(sort_order)) 
        // {
        //   $('#sort_order').removeClass('black_border').addClass('red_border');
        //   return false;
        // } 
        // else 
        // {
        //   $('#sort_order').removeClass('red_border').addClass('black_border');
        // }

       

    }

    function form_validation()
    {
        //alert("ok");

        $('#categoryadd_form_validation').attr('onchange', 'product_Submit_fm()');
        $('#categoryadd_form_validation').attr('onkeyup', 'product_Submit_fm()');

        product_Submit_fm();
        //alert($('#categoryadd_form_validation .red_border').size());

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

   <!-- <script>
     function catname(value)
      {
          
          /*$.ajax({

              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_category/category_slug_show",
              data: {slug: value},
              async: false,

               success: function(data)
                {
                    var cat_slug_name= data.slug_name;

                      if(cat_slug_name!='')
                        {
                           $('#cat_slug').val(cat_slug_name);

                        }
                }
          });*/
            var value = value;
            var new_value = value.replace(" ", "-");
            $("#cat_slug").val(new_value);
          
     
      }
   </script> -->

         