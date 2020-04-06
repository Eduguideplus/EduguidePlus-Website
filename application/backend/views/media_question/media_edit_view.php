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
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li>Edit Image</li>
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
                            <h3 class="box-title">Edit Image</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form name="main" id="main" action="<?php echo base_url(); ?>index.php/manage_media_question/media_edit_submit" role="form" method="post" enctype="multipart/form-data">
                            <div class="box-body">


                                <div class="clearfix"></div>


                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="img_upload" class="col-sm-2 control-label text-center"> Media Title</label>
                                    <div class="col-sm-4">
                                        <input type="text"  class="form-control" name="media_title" id="media_title" placeholder="Media Title" value="<?php echo @$media[0]->media_title; ?>">
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>


                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="img_upload" class="col-sm-2 control-label text-center"> Image</label>
                                    <div class="col-sm-7">
                                        <input type="file"  name="img_upload" id="img_upload" class="form-control" onchange="readURL(this);">
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                
                                <div class="clearfix"></div>
                                
                                <?php
                                if($this->session->flashdata('image_error')!="")
                                {
                                    ?>
                                    <span style="color:red"><?php echo $this->session->flashdata('image_error'); ?></span>
                                <?php }?>
                                <div class="clearfix"></div>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="datepicker" class="col-sm-2 control-label text-center"></label>
                                    <div class="col-sm-7">

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="box-footer" style="margin-top: 10px;">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 8px;margin-left:12px">Update</button>

                                     <a href="<?php echo base_url()?>index.php/manage_media/get_media" class="btn btn-danger" style="margin-top: 8px;margin-left:12px">Cancel</a>

                                     <input type="hidden" name="media_id" value="<?php echo @$media[0]->media_id; ?>">

                                     <input type="hidden" name="media_image" value="<?php echo @$media[0]->media_image; ?>">

                                     <input type="hidden" name="media_path" value="<?php echo @$media[0]->media_path; ?>">
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

<script>
    function clear_form()
    {
        document.getElementById("main").reset();
    }

    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prof_pic')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

