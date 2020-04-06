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
                Add
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li>Add Image</li>
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
                            <h3 class="box-title">Add Image</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form name="main" id="main" action="<?php echo base_url(); ?>index.php/manage_media_question/media_add_submit" role="form" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="clearfix"></div>

                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="img_upload" class="col-sm-2 control-label text-center"> Media Title</label>
                                    <div class="col-sm-4">
                                        <input type="text"  class="form-control" name="media_title" id="media_title" placeholder="Media Title">
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="img_upload" class="col-sm-2 control-label text-center"> Media</label>
                                    <div class="col-sm-7">
                                        <input type="file"  class="form-control" name="img_upload" id="img_upload" onchange="readURL(this);">
                                        
                                    </div>
                                </div>
                                
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
                                    <button type="submit" class="btn btn-primary" onclick="return validate()" style="margin-top: 8px;margin-left:12px">Submit</button>

                                     <a href="<?php echo base_url()?>index.php/manage_media/get_media" class="btn btn-danger" style="margin-top: 8px;margin-left:12px">Cancel</a>
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

<script>
    function validate()
    {
        var img_upload=$('#img_upload').val();


        if(img_upload=="")
        {
            $("#img_upload").addClass("glowing-border-red");
            return false;
        }
        else
        {
            $("#img_upload").removeClass("glowing-border-red");
        }
    }
</script>