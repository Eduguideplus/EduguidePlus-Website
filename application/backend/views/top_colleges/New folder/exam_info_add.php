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
      <h1>
        EXAMINATION INFORMATION ADD
        
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
              <!-- <h3 class="box-title">EXAM-TYPE ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_exam_type/insert_exam_info" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
            

             <!--  <div class="form-group">
                  <label for="sub_category" class="col-sm-2 control-label">Sub Category</label>
              
                <div class="col-sm-9">
                    <select name="sub_category" id="sub_category" class="form-control"  >
                        <option value="">Select</option>
                    </select>
                      <p class="help-block">(No need to select category to upload Parent or Sub Category)</p>
                </div>
                 
              </div> --> 

             <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $exam_id; ?>">


              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Info Title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="info_title" id="info_title" class="form-control" placeholder="Information Title" >
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Description Title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="des_title" id="des_title" class="form-control" placeholder="Description Title">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    

                    <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                    
                  </div>
                 
              </div>


              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Video Title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="video_title" id="video_title" class="form-control" placeholder="Video Title" >
                    
                  </div>
                 
              </div>



                 <div id="multi_doc_div">
                 <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Youtube Video<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9 positon_n">
                    <input type="text" name="video_link[]" id="video_link" class="form-control" placeholder="Youtube Video Embed Link" value="" >

                    <input type="hidden" name="hidden_video_count" id="hidden_video_count" class="form-control" placeholder="" value="1" >


                    <i class="fa fa-plus" aria-hidden="true" onclick="add_document()"></i>
                  </div>
                 <!--  <div class="col-sm-9 col-sm-offset-2 positon_n positon_m">
                    <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="" value="" >
                    <i class="fa fa-minus" aria-hidden="true"></i>
                  </div> -->
                 
              </div>
            </div>


             

<!-- 

                  <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Exam Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <textarea type="text" name="description" id="description" class="form-control " ></textarea>
                    
                  </div>
                 
              </div> -->

              <!--    <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Detail Exam Description</label>

                  <div class="col-sm-9">
                    <textarea type="text" name="detail_description" id="detail_description" class="form-control " ></textarea>
                    
                  </div>
                 
              </div> -->


          

             

           

             

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_exam_type/exam_info/<?php echo $this->uri->segment(3); ?>" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()">Submit</button>
              </div>
              <!-- /.box-footer -->
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
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>



  <script>
  function validation()
  {

    var parent_cat = $('#parent_cat').val();
      if (!isNull(parent_cat)) {
        $('#parent_cat').removeClass('black_border').addClass('red_border');
      } else {
        $('#parent_cat').removeClass('red_border').addClass('black_border');
      }


    var cat_name = $('#cat_name').val();
      if (!isNull(cat_name)) {
        $('#cat_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#cat_name').removeClass('red_border').addClass('black_border');
      }


       var cat_icon = $('#cat_icon').val();
       
      if (!isNull(cat_icon)) {
        $('#cat_icon').removeClass('black_border').addClass('red_border');
      } else {
        $('#cat_icon').removeClass('red_border').addClass('black_border');
      }


       var description = $('#description').val();
      if (!isNull(description)) {
        $('#description').removeClass('black_border').addClass('red_border');
      } else {
        $('#description').removeClass('red_border').addClass('black_border');
      }

     

      
  }
  function form_validation()
  {
  
   
    $('#add').attr('onchange', 'validation()');
    $('#add').attr('onkeyup', 'validation()');

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

  <script type="text/javascript">
  function add_document()
  {
    // alert(ok);
    var cunt= $('#multi_doc_div').children('.append_doc_div').length;


    var cunt = cunt+1;
    var num=cunt+1;



    var sum=0;
   var v_count= $('#hidden_video_count').val();


   sum = parseInt(v_count)+ 1;

$('#hidden_video_count').val(sum);
  //  alert(sum);
    
    

    // var html='<div class="append_doc_div" id="append_doc_div'+cunt+'"><div class="form-group"><label for="cat_name" class="col-sm-2 control-label">Video Link</label><input placeholder="Price" type="text" name="slider_image[]" id="slider_image_'+cunt+'" class="form-control"><i class="fa fa-plus" aria-hidden="true" onclick="add_document()"></i><i class="fa fa-minus" aria-hidden="true" onclick="remove_document('+cunt+')"></i></div>';



    var html=' <div id="append_doc_div'+cunt+'"><div class="form-group"><label for="cat_name" class="col-sm-2 control-label">Video '+sum+'<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label><div class="col-sm-9 positon_n"><input type="text" name="video_link[]" id="video_link" class="form-control" placeholder="Youtube Video Embed Link" value="" ><i class="fa fa-minus" aria-hidden="true" onclick="remove_document('+cunt+')" ></i> </div></div></div>';




      $('#multi_doc_div').append(html);

  }
   function remove_document(value)
  {
    $("#append_doc_div"+value).remove();
  }
</script>

            