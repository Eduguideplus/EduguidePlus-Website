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


 <script type="text/javascript" src="<?php echo base_url();?>assets/tinymce_math/jscripts/tiny_mce/plugins/asciimath/js/ASCIIMathMLwFallback.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/tinymce_math/jscripts/tiny_mce/plugins/equation/editor_plugin.js"></script>
<script type="text/javascript">
var AMTcgiloc = "http://www.imathas.com/cgi-bin/mimetex.cgi";     //change me
</script>

<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo base_url();?>assets/tinymce_math/jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({

    mode : "specific_textareas",
    editor_selector : "tinyarea",
    theme : "advanced",

    relative_urls:false,
    theme_advanced_buttons1 : "fontselect,fontsizeselect,formatselect,bold,italic,underline,strikethrough,separator,sub,sup,separator,cut,copy,paste,undo,redo",
    theme_advanced_buttons2 : "justifyleft,justifycenter,justifyright,justifyfull,separator,numlist,bullist,outdent,indent,separator,forecolor,backcolor,separator,hr,link,unlink,image,media,table,code,separator,asciimath,asciimathcharmap,asciisvg,equation",
    theme_advanced_buttons3 : "",
    theme_advanced_fonts : "Arial=arial,helvetica,sans-serif,Courier New=courier new,courier,monospace,Georgia=georgia,times new roman,times,serif,Tahoma=tahoma,arial,helvetica,sans-serif,Times=times new roman,times,serif,Verdana=verdana,arial,helvetica,sans-serif",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    plugins : 'asciimath,asciisvg,table,inlinepopups,media,equation',
   
    AScgiloc : 'http://www.imathas.com/editordemo/php/svgimg.php',            //change me  
    ASdloc : 'http://www.imathas.com/editordemo/jscripts/tiny_mce/plugins/asciisvg/js/d.svg',  //change me    
        
    content_css : "<?php echo base_url();?>assets/tinymce_math/css/content.css"
});

</script>
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Free & Paid
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li>Edit Free & Paid</li>
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
                            <h3 class="box-title">Edit Free & Paid</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form name="main" id="main" action="<?php echo base_url(); ?>index.php/manage_free_paid/free_paid_submit" role="form" method="post" enctype="multipart/form-data">


                            <div class="box-body">
                                <div class="clearfix"></div>


                            <!--     <div class="form-group" style="margin-top: 10px;">
                                <label for="img_upload" class="col-sm-2 control-label text-center"> For</label>
                                <div class="col-sm-7">
                                  <select class="form-control" name="type_for" id="type_for">
                                            <option value="">Select Type</option>
                                            <?php 
                                            foreach($type_for as $tf){?>
                                            <option value="<?php echo @$tf->id; ?>" ><?php echo @$tf->type_name; ?></option>
                                            <?php } ?>
                                           
                                    </select> 
                                    
                                </div>
                            </div> -->
                                <div class="clearfix"></div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="img_upload" class="col-sm-2 control-label text-center"> free Feature</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control tinyarea" name="free_feature" id="free_feature"><?php echo @$type_for[0]->free_feature;?></textarea>
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="clearfix"></div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <label for="img_upload" class="col-sm-2 control-label text-center"> Paid Feature</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control tinyarea" name="paid_feature" id="paid_feature"><?php echo @$type_for[0]->paid_feature;?></textarea>
                                        
                                    </div>
                                </div>

                                <input type="hidden" name="free_paid_id" id="free_paid_id" value="<?php echo @$type_for[0]->id;?>">
                                
                                
                                <div class="clearfix"></div>
                             
                                <div class="clearfix"></div>
                                <div class="box-footer" style="margin-top: 10px;">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 8px;margin-left:12px">Update</button>

                                     <a href="<?php echo base_url()?>index.php/manage_free_paid/view" class="btn btn-danger" style="margin-top: 8px;margin-left:12px">Cancel</a>

                                    
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

