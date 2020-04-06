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
      EDIT IMAGES
       

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
              <!-- <h3 class="box-title">POST ADD</h3> -->
              <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" name="form" action="<?php echo base_url();?>index.php/home/image_update" method="post" enctype="multipart/form-data" id="buyerAdd_form_validation">
              <div class="box-body">
                 
               

                 <div class="clearfix"></div> 
                             <div class="form-group" style="margin-top: 10px;">
                                    <label for="img_upload" class="col-sm-2 control-label text-center"> Image</label>

                                    <div class="col-sm-7">
                                        <input type="file"  name="img_upload" id="img_upload" onchange="readURL(this);">
                                         <?php
                                        if($slider_image[0]->image!="")
                                        {
                                            ?>
                                            <img id="prof_pic" src="<?php echo base_url() ?>../assets/uploads/slider/<?php echo $slider_image[0]->image; ?>"
                                                 alt=" Image" style="width:90px;height:90px;"/>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                        <img id="prof_pic" src="<?php echo base_url()?>..assets/uploads/no_image.png"  alt=" image" style="margin-top: 10px;width:90px;height:90px;" />
                                           <?php
                                        }
                                        ?>

                                        <input type="hidden" name="slider_id" value="<?php echo $slider_image[0]->slider_id;?>">

                                        <input type="hidden" name="old_image" value="<?php echo $slider_image[0]->image;?>">
                                    </div>
                            </div>

                            <div class="clearfix"></div> 
                  <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Title 1</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $slider_image[0]->title_1 ;?>" name="title_1" id="title_1">
                   <span id="error_status"></span>
                    </div>
                   </div> 

                   <div class="clearfix"></div> 
                  <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Title 2</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $slider_image[0]->title_2; ?>" name="title_2" id="title_2">
                   <span id="error_status"></span>
                    </div>
                   </div> 

                   <div class="clearfix"></div> 
               <!--    <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Button Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" value="<?php echo $slider_image[0]->button_title; ?>" name="button_title" id="button_title">
                   <span id="error_status"></span>
                    </div>
                   </div> --> 

                   <div class="clearfix"></div> 
                  <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Link</label>

                    <div class="col-sm-9">
                      <textarea id="button_link" name="button_link" class="form-control"><?php echo $slider_image[0]->button_link; ?></textarea>
                   <span id="error_status"></span>
                    </div>
                   </div>

                  <div class="clearfix"></div>
                    <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="status" id="status">
                  
                   <option value="active" selected>Active</option>
                   <option value="inactive">Inactive</option>
                   </select>
                   <span id="error_status"></span>
                    </div>
                   </div>  
                 
               

            
            <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/home" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()">Update</button>
            </div>
              <!-- /.box-footer -->
              <!-- <input type="hidden" value="<?php echo $slider_image[0]->slider_id;?>" name="slider_id"> -->
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
 <script src="<?php echo base_url();?>plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.multiselect.js"></script>
             

   <script>
   function buyer_Submit_fm()
    {



        var buyer_name = $('#buyer_name').val();
        if (!isNull(buyer_name)) 
        {
          $('#buyer_name').removeClass('black_border').addClass('red_border');
        
        } 
        else 
        {
          $('#buyer_name').removeClass('red_border').addClass('black_border');
        }

        
        var buyer_account = $('#buyer_account').val();
        if (!isNull(buyer_account)) 
        {
          $('#buyer_account').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#buyer_account').removeClass('red_border').addClass('black_border');
        }

        var order_date = $('#order_date').val();
        if (!isNull(order_date)) 
        {
          $('#order_date').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#order_date').removeClass('red_border').addClass('black_border');
        }

    }

    function form_validation()
    {
        //alert("ok");

        $('#buyerAdd_form_validation').attr('onchange', 'buyer_Submit_fm()');
        $('#buyerAdd_form_validation').attr('onkeyup', 'buyer_Submit_fm()');

        buyer_Submit_fm();
        //alert($('#contact_form .red_border').size());

        if ($('#buyerAdd_form_validation .red_border').size() > 0)
        {
            $('#buyerAdd_form_validation .red_border:first').focus();
            $('#buyerAdd_form_validation .alert-error').show();
            return false;
        } 
        else 
        {

            $('#buyerAdd_form_validation').submit();
        }
    }
     
   </script>              
                 
     <style>
.error {color: #FF0000;}
</style>      



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