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



<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript">
        tinymce.init({
              mode : "textareas",

        height:"400px",
        theme : "advanced",
        editor_deselector : "mceNoEditor",
    relative_urls:false,
        plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
         file_browser_callback : "filebrowser",
        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,search,replace,|,styleprops",
        theme_advanced_buttons2 : "styleselect,formatselect,fontselect,fontsizeselect,|,help,code,|,forecolor,backcolor",
        theme_advanced_buttons3 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,|,insertdate,inserttime,preview",
        theme_advanced_buttons4 : "tablecontrols,|,hr,removeformat,visualaid,|,charmap,emotions,iespell,media,advhr,|,print",
        theme_advanced_buttons5 : "insertlayer,moveforward,movebackward,absolute,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,|,sub,sup,|,fullscreen,|,ltr,rtl",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        //theme_advanced_resizing : true,

        // Example content CSS (should be your site CSS)
      
        });
    </script>





<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Financial Planning
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li>Edit Financial Planning</li>
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
                           <!--  <h3 class="box-title">Edit Home Slider</h3> -->
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form name="main" id="add" action="<?php echo base_url(); ?>index.php/manage_financial_planning/edit_submit" role="form" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                
                              


                               <div class="clearfix"></div>


                                <div class="form-group" style="margin-top: 10px">
                                    <label for="email" class="col-sm-2 control-label text-center">Title: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="title" value="<?php echo @$data_info[0]->financial_planning_title;?>" >
                                    </div>
                                </div>
                                 <div class="clearfix"></div>



                              <div class="form-group" style="margin-top: 10px">
                                    <label for="phone" class="col-sm-2 control-label text-center">Content: <span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>
                                    <div class="col-sm-9">
                                         <div id="bottom_content"><textarea class="form-control tinyarea" name="content" id="content" rows="5"><?php echo @$data_info[0]->financial_planning_content;?></textarea></div>
                                    </div>
                                   
                                </div> 

                                  
                               
                                 <div class="clearfix"></div>
                            <div class="form-group" style="margin-top: 10px;">
                                    <label for="img_upload" class="col-sm-2 control-label text-center">Image(600X400 px):</label>
                                    <div class="col-sm-6">
                                        <input type="file"  name="image" id="image" onchange="readURL(this);" style="margin-bottom:8px"><div class="clearfix"></div>
                                        
                                        <input type="hidden" class="form-control" name="old_pic" id="old_pic" value="<?php echo @$data_info[0]->financial_planning_image; ?>">
                                        <input type="hidden" class="form-control" name="slider_id" id="slider_id" value="<?php echo @$data_info[0]->financial_planning_id; ?>">

                                        <?php
                                        if($data_info[0]->financial_planning_image!="")
                                        {
                                            ?>
                                            <img id="prof_pic"
                                                 src="<?php echo base_url() ?>../assets/uploads/financial_planning/<?php echo $data_info[0]->financial_planning_image; ?>"
                                                 alt="User Image" style="width:90px;height:90px;"/>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <img id="prof_pic" src="<?php echo base_url()?>../assets/uploads/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:90px;height:90px;" />
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>



                               
                                 <div class="clearfix"></div>

                                
                                
                               
                               
                                <div class="form-group">
            
                                <div class="clearfix"></div>
                                <div class="box-footer" style="margin-top: 10px">
                                    <button type="submit" class="btn btn-primary" onclick="return form_validation()">Update</button>
                                    <a href="<?php echo base_url();?>index.php/manage_financial_planning/list_view" class="btn btn-danger">Cancel</a>
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
    
    /*  var image = $('#image').val();
      if (!isNull(image)) {
        $('#image').removeClass('black_border').addClass('red_border');
      } else {
        $('#image').removeClass('red_border').addClass('black_border');
      }*/

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




<script>
    function clear_form()
    {
         document.getElementById("main").reset();
    } 

</script>