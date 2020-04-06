<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            menubar: "edit insert tools",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            toolbar1: "undo redo | styleselect | bold italic| forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | link preview",
            image_advtab: true,
            extended_valid_elements : "span[*],i[*]",
            relative_urls : false,
            remove_script_host : false,
            convert_urls : true
        });
    </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        TESTIMONIAL EDIT
        
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
              <!-- <h3 class="box-title">TESTIMONIAL EDIT</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_testimonials/update" method="post" id="categoryadd_form_validation" enctype="multipart/form-data" >
              <div class="box-body">

                

			           <div class="form-group">
                  <label for="gal_description" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-8">
                   <input type="text" name="testname" class="form-control" placeholder="Name" id="testname" value="<?php echo $test_data[0]->testimonial_name;?>" required>
                     
                  </div>
                 
                </div>
                <input type="hidden" name="testid" value="<?php echo $test_data[0]->testimonial_id; ?>">
               
                  <div class="form-group" id="tutor" >
                    <label for="profession" class="col-sm-2 control-label">Profession</label>

                      <div class="col-sm-8">
                          <input type="text" name="profession" class="form-control"  placeholder="Ex : Math Teacher / Class 9 "  id="profession" value="<?php echo $test_data[0]->testimonial_designation; ?>">

                      </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="gal_description" class="col-sm-2 control-label">Image <br>( 100 X 100 Pixel )</label>

                  <div class="col-sm-8">
                   <input type="file" name="image" class="form-control"  id="image">
                   <input type="hidden" name="old_image" id="old_image" value="<?php echo @$test_data[0]->testimonial_image;?>" >
                   <br>
                    <?php if(@$test_data[0]->testimonial_image  !=''){ ?>
                        <img src="<?php echo base_url();?>../assets/uploads/testimonial/<?php echo @$test_data[0]->testimonial_image; ?>" height="100px" width="100px" style="border-radius: 50%">
                    <?php } else { ?>
                        <img src="<?php echo base_url();?>../assets/uploads/user-image.png" height="50" width="50">
                    <?php }
                    ?>   
                  </div>
                 
                  </div>

                <div class="form-group">
                  <label for="news_details" class="col-sm-2 control-label">Testimonial Content</label>

                  <div class="col-sm-8">
				              <textarea name="content" class="tinyarea"  placeholder="Testimonial Content" rows="10" cols="96" id="content" ><?php echo $test_data[0]->testimonial_content;?></textarea>

                     
                  </div>
                 
                </div>

             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_testimonials/list_view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" >Update</button>
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
 <script type="text/javascript">
  /*function user_change(value)
  {
    //alert();
    if(value=='Tutor')
    {
      $('#tutor').show();
      
    }
    else
    {
      $('#tutor').hide();
      
    }
  }*/
 </script>

