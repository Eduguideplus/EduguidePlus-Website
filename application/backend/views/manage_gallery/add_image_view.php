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
      <h3>
        
       ADD NEW IMAGE
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Add Image</li>    
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////-->
      <div class="row">
        
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Image</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <div style="padding-left: 12px;"><?php echo $this->session->flashdata('msg'); ?></div>
            
            <form id="add" name="form" class="form-horizontal" action="<?php echo base_url();?>index.php/manage_gallery/insert_gallery_image" method="post" enctype='multipart/form-data'>
              <div class="box-body">
              
           <div class="clearfix"></div> 
                             <div class="form-group" style="margin-top: 10px;">
                                    <label for="image" class="col-sm-2 control-label text-center">Choose Image:<span style="color:#F00">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="file"  name="image" id="image" onchange="readURL(this);">
                                        <img id="prof_pic" src="<?php echo base_url()?>../assets/upload/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:90px;height:90px;" />
                                    </div>
                            </div>

           <?php $id=$this->uri->segment(4); ?>  
             
                                    
<input type="hidden" name="category_id" value="<?php echo $this->uri->segment(4); ?>">
                                 

                <input type="hidden" name="gallery_id" value="<?php echo $gallery_id;?>">
               
             
             <span style="color: rgb(255, 0, 0); padding-left: 2px;">* fields are required</span>
              
              </div>

              <!-- /.box-body -->
               
             <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
             <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>

            
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_gallery/gallery_view/<?php echo $gallery_id;?>/<?php echo $id;?>" class="btn btn-danger fa fa-backward"><b>Back</b></a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()"><b>Submit</b></button>
              </div>
              <!-- /.box-footer -->

            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (right) -->
      </div>
      <!-- ////////////////////////////////////////////////////////////////////////////////// -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
 <script type="text/javascript"> 
function product_Submit_fm()
    {


        var image = $('#image').val();
        if (!isNull(image)) 
        {
          $('#image').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#image').removeClass('red_border').addClass('black_border');
        }
}
  
function form_validation()
    {
        //alert("ok");

        $('#add').attr('onchange', 'product_Submit_fm()');
        $('#add').attr('onkeyup', 'product_Submit_fm()');

        product_Submit_fm();
        //alert($('#contact_form .red_border').size());

        if ($('#add .red_border').size() > 0)
        {
            $('#add .red_border:first').focus();
            $('#add .alert-error').show();
            return false;
        } 
        else 
        {

            $('#add').submit();
        }
    }
   </script>
    