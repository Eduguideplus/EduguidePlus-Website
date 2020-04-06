

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
        
       EDIT IMAGE
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Edit Image</li>    
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
              <h3 class="box-title">Edit Image</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <div style="padding-left: 12px;"><?php echo $this->session->flashdata('msg'); ?></div>
            
            <form id="add" name="form" class="form-horizontal" action="<?php echo base_url();?>index.php/manage_gallery/edit_img" method="post" enctype='multipart/form-data'>
              <div class="box-body">
              
                                     <div class="form-group">
                  <label class="col-sm-2 control-label">Choose  Image:<span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>
                  <div class="col-sm-6">
                                        <input type="file"  name="edit_gallery_image" id="edit_gallery_image" onchange="readURL(this);" style="margin-bottom:8px"><div class="clearfix"></div>
<input type="hidden" name="category_id" value="<?php echo $this->uri->segment(4); ?>">
                                        <?php
                                        if($gallery_details[0]->image!="")
                                        {
                                            ?>
                                            <img id="prof_pic"
                                                 src="<?php echo base_url() ?>../assets/upload/category/gallery/<?php echo $gallery_details[0]->image; ?>"
                                                 alt="User Image" style="width:90px;height:90px;"/>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <img id="prof_pic" src="<?php echo base_url()?>../assets/upload/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:60px;height:60px;" />
                                            <?php
                                        }
                                        ?>

                                 <input type="hidden" id="old_image" name="old_image" value="<?php echo $gallery_details[0]->image;?>" >
                    <input type="hidden" id="edited_id" name="edited_id" value="<?php echo $gallery_details[0]->id;?>" >
                    <input type="hidden" name="gallery_id" value="<?php echo $gallery_details[0]->gallery_id;?>">
                                    </div>
                                </div>
                              </div>
                  
                

              <span style="color: rgb(255, 0, 0); padding-left: 2px;">* fields are required</span>
              </div>
              <!-- /.box-body -->

 <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
 <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>


              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_gallery/gallery_view/<?php echo $gallery_details[0]->gallery_id;?>" class="btn btn-danger fa fa-backward"> <b>Back</b></a>
                <button type="submit" class="btn btn-info pull-right" onclick=""><b>Update</b></button>
              </div>
              <!-- /.box-footer -->
            </form>
          <!-- </div> -->
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

  