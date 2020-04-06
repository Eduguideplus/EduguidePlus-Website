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
        
       EDIT GALLERY
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Edit Gallery</li>    
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <!-- ////////////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Gallery</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <div style="padding-left: 12px;"><?php echo $this->session->flashdata('msg'); ?></div>
            
            <form id="add" name="form" class="form-horizontal" action="<?php echo base_url();?>index.php/manage_gallery/edit_action" method="post" enctype='multipart/form-data'>
              <div class="box-body">
        

              <div class="form-group">
                  <label for="blog_category" class="col-sm-2 control-label">Choose Album</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="category" id="category">

                        <option value="">select Album
                                  </option>

                      
                               <?php
                              for($i=0; $i<count(@$cat_details); $i++){




                                 ?>
                                <option value="<?php echo @$cat_details[$i]->cat_id;
                                ?>"
                                  <?php if($cat_details[$i]->cat_id==$gallery_details[0]->cat_id) { echo 'selected'; } 
                                  ?>
                                  >
                        <?php echo @$cat_details[$i]->cat_name;?></option>

                                <?php } ?> 
                     
                             </select>
                     
                    </div>
                 
                </div>
               <!--  <div class="form-group">
                  <label for="branch_name" class="col-sm-2 control-label">Choose Year:</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="gallery_year" id="gallery_year" >
                             
                          <?php
                               $cuur_date=date('Y');
                               for($i=$cuur_date; $i>=2010; $i--)
                               {
                                ?>
                                <option value="<?php echo $i;?>" <?php if($gallery_details[0]->gallery_year==$i){ echo 'selected'; } ?>><?php echo $i;?></option>
                                <?php
                               }
                               ?>
                             </select>
                     
                    </div>
                 
                </div>
<div class="clearfix"></div>

              <div class="form-group">
                  <label for="gallery_title" class="col-sm-2 control-label">Gallery Title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="gallery_title" id="gallery_title" placeholder="Gallery Title" value="<?php echo $gallery_details[0]->gallery_title; ?>">
                    </div>
                 
                </div>
                -->




                   <div class="form-group">
                 <label for="gallery_year" class="col-sm-2 control-label">Gallery Type:<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
           
                 <div class="col-sm-9">
                   <select class="form-control" name="type" id="type" onchange="gallery_type_show(this.value);" >
                         <!-- <option value="">select type</option> -->
                         <option value="image" <?php if($gallery_details[0]->type=='image'){echo 'selected';}?> >Image</option>
                         <option value="video" <?php if($gallery_details[0]->type=='video'){echo 'selected';}?> >Video</option>



                          
                             </select>
                   <span id="error_status"></span>
                 </div>
                 
             </div> 


             


              <div class="clearfix"></div> 
              <div class="form-group" id="video_link_show" <?php if($gallery_details[0]->type=='image'){?> style="display: none;"<?php } ?> >
                  <label for="branch_name" class="col-sm-2 control-label">Video Link<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="video_link" id="video_link" value="<?php echo $gallery_details[0]->video_link;?>" placeholder="Enter Video Link">
                    </div>
                 
                </div>

             









                                     <div class="form-group" id="image_link_show" <?php if($gallery_details[0]->type=='video'){?> style="display: none;"<?php } ?>>
                  <label class="col-sm-2 control-label">Choose Image(788 X 543 px):<span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>
                  <div class="col-sm-6">
                                        <input type="file"  name="gallery_image" id="edit_gallery_image" onchange="readURL(this);" style="margin-bottom:8px"><div class="clearfix"></div>

                                        <?php
                                        if($gallery_details[0]->gallery_cover_image !="")
                                        {
                                            ?>
                                            <img id="prof_pic"
                                                 src="<?php echo base_url() ?>../assets/uploads/category/gallery/<?php echo $gallery_details[0]->gallery_cover_image ; ?>"
                                                 alt="User Image" style="width:90px;height:90px;"/>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <img id="prof_pic" src="<?php echo base_url()?>../assets/uploads/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:60px;height:60px;" />
                                            <?php
                                        }
                                        ?>

                                 <input type="hidden" id="old_image" name="old_image" value="<?php echo $gallery_details[0]->gallery_cover_image;?>" >

                    <input type="hidden" id="edited_id" name="edited_id" value="<?php echo $gallery_details[0]->gallery_id;?>">
                                    
                                    </div>
                                </div>

                             

                               <input type="hidden" id="edited_id" name="edited_id" value="<?php echo $gallery_details[0]->gallery_id;?>">



           
               <!--  <div class="form-group">
                  <label for="branch_name" class="col-sm-2 control-label">Meta Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="meta_title" id="branch_name" placeholder=" Meta Title" value="<?php echo $gallery_details[0]->meta_title; ?>">
                    </div>
                 
                </div>
                
                <div class="form-group">
                  <label for="branch_name" class="col-sm-2 control-label">Meta Keyword</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="meta_keyword" id="branch_name" placeholder="Meta Keyword" value="<?php echo $gallery_details[0]->meta_keyword; ?>">
                    </div>
                 </div>
                <div class="form-group">
                  <label for="branch_address" class="col-sm-2 control-label">Meta Description</label>

                    <div class="col-sm-9" >
                      <div id="branch_address_area"><textarea class="form-control" rows="5" name="meta_description" id="branch_address" placeholder=" Meta Description" ><?php echo $gallery_details[0]->meta_description; ?></textarea></div>
                    </div>
                 
                </div>
 -->


                

              <span style="color: rgb(255, 0, 0); padding-left: 2px;">* fields are required</span>
              </div>
              <!-- /.box-body -->

 <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
 <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>


              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_gallery/list_view" class="btn btn-danger fa fa-backward"> <b>Back</b></a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()"><b>Update</b></button>
              </div>
              <!-- /.box-footer -->
            </form>
          <!-- </div> -->
          <!-- /.box -->
</div>
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




     function gallery_type_show(type)
    {

     // alert(type);
        if (type=='image') {
            

            $('#image_link_show').show();
           $('#video_link_show').hide();

            
        }

        else{

         $('#video_link_show').show();
         $('#image_link_show').hide();

        }




    }




 </script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

        $("#event_date").datepicker({
         startDate: new Date(),
         dateFormat:'yy-mm-dd',
         autoclose: true,
         todayHighlight: 1
    });

</script>
 

  <!-- <script type="text/javascript">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

        $("#event_date").datepicker({
         startDate: new Date(),
         dateFormat: 'yy-mm-dd',
         autoclose: true,
         todayHighlight: 1
    });
  </script> -->
  <script>

     function product_Submit_fm()
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


        /*  var type = $('#type').val();
     
         if(type=='video'){

            var video_link = $('#video_link').val();
        if (!isNull(video_link)) 
        {
          $('#video_link').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#video_link').removeClass('red_border').addClass('black_border');
        }




         }
        else{



          var gallery_image = $('#gallery_image').val();
        if (!isNull(gallery_image)) 
        {
          $('#gallery_image').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#gallery_image').removeClass('red_border').addClass('black_border');
        }

  
  }
        */



        

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
<style>
.error {color: #FF0000;}
</style>