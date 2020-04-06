
 
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
        EDIT ARTICLES CATEGORY
        </h3>
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
              
                <div id="validation" style="color:red;"></div>
                <span style="color: rgb(255, 0, 0); padding-left: 2px;">*Fields are required</span>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/blog_category/blog_update" method="post" 
            id="client_form_validation" enctype="multipart/form-data">
              <div class="box-body">


                 <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Category Name <span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="category" id="category" class="form-control"  placeholder="Enter Category Name" value="<?php echo $blog_details[0]->category_name;?>">
                   </div>
                 <input type="hidden" name="id" value="<?php echo $blog_details[0]->id;?>">
                </div>
            </div>
                 
                            
        <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/blog_category" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return validate()">Update</button>
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
<script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>






<script>

    function add_testimonial_Submit_fm()
    {
      var category = $('#category').val();
        if (!isNull(category)) 
        {
          $('#category').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#category').removeClass('red_border').addClass('black_border');
        }

        
    }


    function validate()
    {
        $('#client_form_validation').attr('onchange', 'branch_Submit_fm()');
        $('#client_form_validation').attr('onkeyup', 'branch_Submit_fm()');

        add_testimonial_Submit_fm();
        //alert($('#contact_form .red_border').size());

        if ($('#client_form_validation .red_border').size() > 0)
        {
            $('#client_form_validation .red_border:first').focus();
            $('#client_form_validation .alert-error').show();
            return false;
        } 
        else 
        {

            $('#client_form_validation').submit();
        }
    }
</script>


