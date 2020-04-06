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
        Edit Expert
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_our_experties/update" method="post" id="testiadd_form_validation" enctype="multipart/form-data" >
              <div class="box-body">

                

			           <div class="form-group">
                  <label for="gal_description" class="col-sm-2 control-label">Expert Name</label>

                  <div class="col-sm-8">
                   <input type="text" name="testname" class="form-control" placeholder="Name" id="testname" value="<?php echo $test_data[0]->name;?>">
                     
                  </div>
                 
                </div>
                <input type="hidden" name="testid" value="<?php echo $test_data[0]->our_experties_id; ?>">
               
                  <div class="form-group" id="tutor" >
                    <label for="profession" class="col-sm-2 control-label">Expert Designation</label>

                      <div class="col-sm-8">
                          <input type="text" name="profession" class="form-control"  placeholder="Designation"  id="profession" value="<?php echo $test_data[0]->designation; ?>">

                      </div>
                 
                  </div>

                  <div class="form-group">
                  <label for="gal_description" class="col-sm-2 control-label">Image <br>( 100 X 100 Pixel )</label>

                  <div class="col-sm-8">
                   <input type="file" name="image" class="form-control"  id="image" onchange="readURL(this);" >
                   <input type="hidden" name="old_image" id="old_image" value="<?php echo @$test_data[0]->image;?>" >
                   <br>
                    <?php if(@$test_data[0]->image  !=''){ ?>
                        <img id="prof_pic" src="<?php echo base_url();?>../assets/uploads/our_experties/<?php echo @$test_data[0]->image; ?>" height="100px" width="100px" style="border-radius: 50%">
                    <?php } else { ?>
                        <img id="prof_pic" src="<?php echo base_url();?>../assets/uploads/user-image.png" height="50" width="50">
                    <?php }
                    ?>   
                  </div>
                 
                  </div>

                <div class="form-group">
                  <label for="news_details" class="col-sm-2 control-label">About Expert</label>

                  <div class="col-sm-8">
				              <textarea name="content" class="tinyarea"  placeholder="Testimonial Content" rows="10" cols="96" id="content" ><?php echo $test_data[0]->content;?></textarea>

                     
                  </div>
                 
                </div>

             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_our_experties/list_view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return testi_add_validation()" >Update</button>
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


<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prof_pic')
                    .attr('src', e.target.result)
                    .width(90)
                    .height(90);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>


  <script>
  $(function() {
    $( "#datepicker" ).datepicker(
    {
    autoclose: true
    });
  } );

  /*function user_change(value)
  {
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

  <script type="text/javascript">
  function validation()
  {
    var testname = $('#testname').val();
      if (!isNull(testname)) {
        $('#testname').removeClass('black_border').addClass('red_border');
      } else {
        $('#testname').removeClass('red_border').addClass('black_border');
      }
      var profession = $('#profession').val();
      if (!isNull(profession)) {
        $('#profession').removeClass('black_border').addClass('red_border');
      } else {
        $('#profession').removeClass('red_border').addClass('black_border');
      }

      /*var image = $('#image').val();
      if (!isNull(image)) {
        $('#image').removeClass('black_border').addClass('red_border');
      } else {
        $('#image').removeClass('red_border').addClass('black_border');
      }*/

     
      
  }
  function testi_add_validation()
  {
  
   
    $('#testiadd_form_validation').attr('onchange', 'validation()');
    $('#testiadd_form_validation').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#testiadd_form_validation .red_border').size() > 0)
    {
      $('#testiadd_form_validation .red_border:first').focus();
      $('#testiadd_form_validation .alert-error').show();
      return false;
    } else {

      $('#testiadd_form_validation').submit();
    }

  }
</script>
