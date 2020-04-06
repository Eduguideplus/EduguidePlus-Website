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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
        
       Edit News And Notice
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Edit News And Notice</li>    
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
              <!-- <h3 class="box-title">Add Notice</h3> -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <div style="padding-left: 12px;"><?php echo $this->session->flashdata('msg'); ?></div>
            
            <form id="add" name="form" class="form-horizontal" action="<?php echo base_url();?>index.php/manage_new_notice/edit_tender_submit" method="post" enctype='multipart/form-data'>
              <div class="box-body">
              


 


                  <div class="form-group">
                  <label for="branch_address" class="col-sm-2 control-label">Title :<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                    <div class="col-sm-9" >
                      
                      
                       <textarea class="form-control" name="desc" id="desc" placeholder="" ><?php echo @$tender[0]->description; ?></textarea>
                      
                    </div>
                 
                </div>


                <div class="form-group">
                  <label for="branch_address" class="col-sm-2 control-label">File (.jpg, .jpeg, .png, .pdf):<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                    <div class="col-sm-9" >
                      
                       <input type="file" name="image" id="image" class="form-control">
                      
                       
<?php
if(@$tender[0]->image!='')
{
  ?>
                       <embed style="height: 50px; width: 60px;" src="<?php echo base_url() ?>../assets/uploads/news_notice/<?php echo @$tender[0]->image ?>"></embed><?php
                     }
                     else{
                      echo "Previously no file uploaded"; 
                    }
                    ?>

                    <input type="hidden" id="old_image" name="old_image"  value="<?php echo @$tender[0]->image; ?>">
                      
                    </div>
                 
                </div>
            

                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo @$tender[0]->id; ?>">
             

             
               
             
             
             <span style="color: rgb(255, 0, 0); padding-left: 2px;">* fields are required</span>
              
              </div>

              <!-- /.box-body -->
               
            
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_new_notice/list_view" class="btn btn-danger fa fa-backward"><b>  Back</b></a>
                <button type="submit" class="btn btn-info pull-right"><b>Submit</b></button>
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
   <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
             <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>

            
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

        $("#notice_date").datepicker({
         startDate: new Date(),
         dateFormat: 'yy-mm-dd',
         autoclose:true,
         todayHighlight:1
    });

</script>



<script type="text/javascript">
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
 
<script>

     function product_Submit_fm()
    {



        /*var notice_description= $('#notice_description').val();
        if (!isNull(notice_description)) 
        {
          $('#notice_description').removeClass('black_border').addClass('red_border');

          $("#notice_description").attr("data-toggle", "tooltip");
                $("#notice_description").attr("data-placement", "bottom");
                document.getElementById('notice_description').title = 'Name Is Required';
                $('#notice_description').tooltip('show');
          
         
        } 
        else 
        {
          $('#notice_description').removeClass('red_border').addClass('black_border');
          document.getElementById('notice_description').title = '';
                $('#notice_description').tooltip('destroy');
        }*/



    var notice_description= tinymce.get('notice_description').getContent();
        if (!isNull(notice_description)) 
        {
          
          $('#notice_description').removeClass('black_border').addClass('red_border');

           $("#notice_description").attr("data-toggle", "tooltip");
                $("#notice_description").attr("data-placement", "bottom");
                document.getElementById('notice_description').title = 'Notice Details Is Required';
                $('#notice_description').tooltip('show'); 
         
        } 
        else 
         {
           $('#notice_description').removeClass('red_border').addClass('black_border');
            document.getElementById('notice_description').title = '';
                $('#notice_description').tooltip('destroy');
         }








    
/*
       var image= $('#image').val();
        if (!isNull(image)) 
        {
          $('#image').removeClass('black_border').addClass('red_border');

          $("#image").attr("data-toggle", "tooltip");
                $("#image").attr("data-placement", "bottom");
                document.getElementById('image').title = 'Image Is Required';
                $('#image').tooltip('show');
          
         
        } 
        else 
        {
          $('#image').removeClass('red_border').addClass('black_border');
          document.getElementById('image').title = '';
                $('#image').tooltip('destroy');
        }



        var notice_date = $('#notice_date').val();
        if (!isNull(notice_date)) 
        {
          $('#notice_date').removeClass('black_border').addClass('red_border');

           $("#notice_date").attr("data-toggle", "tooltip");
                $("#notice_date").attr("data-placement", "bottom");
                document.getElementById('notice_date').title = 'Notice Date Is Required';
                $('#notice_date').tooltip('show'); 
         
        } 
        else 
        {
          $('#notice_date').removeClass('red_border').addClass('black_border');

           document.getElementById('notice_date').title = '';
                $('#notice_date').tooltip('destroy');
        }


        
  /* var notice_image = $('#notice_image').val();
        if (!isNull(notice_image)) 
        {
          $('#notice_image').removeClass('black_border').addClass('red_border');
        

         $("#notice_image").attr("data-toggle", "tooltip");
                $("#notice_image").attr("data-placement", "bottom");
                document.getElementById('notice_image').title = 'Notice Image Is Required';
                $('#notice_image').tooltip('show');   
        } 
        else 
        {
          $('#notice_image').removeClass('red_border').addClass('black_border');
           document.getElementById('notice_image').title = '';
                $('#notice_image').tooltip('destroy');
        }



        var notice_details= tinymce.get('notice_details').getContent();
        if (!isNull(notice_details)) 
        {
          
          $('#notice_details').removeClass('black_border').addClass('red_border');

           $("#notice_details").attr("data-toggle", "tooltip");
                $("#notice_details").attr("data-placement", "bottom");
                document.getElementById('notice_details').title = 'Notice Details Is Required';
                $('#notice_details').tooltip('show'); 
         
        } 
        else 
         {
           $('#notice_details').removeClass('red_border').addClass('black_border');
            document.getElementById('notice_details').title = '';
                $('#notice_details').tooltip('destroy');
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
    