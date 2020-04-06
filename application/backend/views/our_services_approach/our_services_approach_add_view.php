<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datepicker/datepicker3.css">
<style>
    .glowing-border-red{
        outline: none;
        border-color: #ff3333;
        box-shadow: 0 0 10px #ff3333;
    }
    .glowing-border-green{
        outline: none;
        border-color: #4dff4d;
        box-shadow: 0 0 10px #4dff4d;
    }
</style>


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





<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Our Services Approach
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li>Add Our Services Approach</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title">Add Home Slider</h3> -->
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form name="main" id="add" action="<?php echo base_url(); ?>index.php/manage_our_services_approach/add_submit" role="form" method="post" enctype="multipart/form-data">
                            <div class="box-body">




                             
                                 




                             <div class="form-group" style="margin-top: 10px;">
                                    <label for="image" class="col-sm-2 control-label text-center">Image(125X125 px): <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="file"  name="slider_image" id="slider_image" onchange="readURL(this);" >
                                        <img id="prof_pic" src="<?php echo base_url()?>../assets/uploads/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:150px;height:90px;" />
                                    </div>
                            </div>
                              <div class="clearfix"></div>

                               <div class="form-group" style="margin-top: 10px">
                                    <label for="email" class="col-sm-2 control-label text-center">Title: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="title" value="" >
                                    </div>
                                </div>
                                 <div class="clearfix"></div>



                              <div class="form-group" style="margin-top: 10px">
                                    <label for="phone" class="col-sm-2 control-label text-center">Content: <span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>
                                    <div class="col-sm-9">
                                         <div id="bottom_content"><textarea class="form-control tinyarea" name="content" id="content" rows="15"></textarea></div>
                                    </div>
                                   
                                </div> 


                               
                                 <div class="clearfix"></div>



                               
                                 <div class="clearfix"></div>



                                
                               
                               
                               
                                <div class="form-group">
            
                                <div class="clearfix"></div>
                                <div class="box-footer" style="margin-top: 10px">
                                    <button type="submit" class="btn btn-primary" onclick="return form_validation()">Submit</button>
                                    <a href="<?php echo base_url();?>index.php/manage_our_services_approach/list_view" class="btn btn-danger">Cancel</a>
                                </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>

<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
  <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



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
  function validation()
  {
    
      var slider_image = $('#slider_image').val();
      if (!isNull(slider_image)) {
        $('#slider_image').removeClass('black_border').addClass('red_border');
      } else {
        $('#slider_image').removeClass('red_border').addClass('black_border');
      }

      var title = $('#title').val();
      if (!isNull(title)) {
        $('#title').removeClass('black_border').addClass('red_border');
      } else {
        $('#title').removeClass('red_border').addClass('black_border');
      }


      
       




  }
  function form_validation()
  {
  
   
    $('#add').attr('onchange', 'validation()');
    $('#add').attr('onkeyup', 'validation()');
    $('#add').attr('onclick', 'validation()');

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




<script src="<?php echo base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>

        $("#coupon_add").datepicker({
         startDate: new Date(),
         autoclose: true,
         todayHighlight: 1
    });

    $('#coupon_end').datepicker({
        startDate: new Date(),
        autoclose: true,
        todayHighlight: 1
    });
</script>
<script>
    function clear_form()
    {
         document.getElementById("main").reset();
    } 
</script>