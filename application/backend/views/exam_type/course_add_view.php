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
        COURSE ADD
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_exam_type/course_insert" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
         


              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Course Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="" value="" >
                    
                  </div>
                 
              </div>

        <!--       <div class="form-group">
            <label for="cat_name" class="col-sm-2 control-label">Price For Plan<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
        
            <div class="col-sm-9">
              <input type="text" name="plan_price" id="plan_price" class="form-control" placeholder="" value="" >
              
            </div>
           
        </div> -->
<!-- 
              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Type<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <select class="form-control" name="type" id="type">
                      <option value="service">Service</option>
                      <option value="product">Product</option>
                      <option value="practice">practice</option>
                    </select>
                    
                  </div>
                 
              </div> -->

             <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Course Icon (70 X 70 pixel)<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="file" name="cat_icon" id="cat_icon" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div>


                  <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Course Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <textarea type="text" name="description" id="description" class="form-control" ></textarea>
                      
                  <span id="message_error" style="color: red"></span>
                                     
                  </div>
                 
              </div>

            <!--      <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Detail Group Description</label>

                  <div class="col-sm-9">
                    <textarea type="text" name="detail_description" id="detail_description" class="form-control " ></textarea>
                    
                  </div>
                 
              </div> -->


              <div class="form-group">
                  <label for="meta_tag" class="col-sm-2 control-label">Meta Tag Title</label>

                  <div class="col-sm-9">
                    <input type="text" name="meta_tag" id="meta_tag" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="meta_desc" class="col-sm-2 control-label">Meta Tag Description</label>

                  <div class="col-sm-9">
                    <input type="text" name="meta_desc" id="meta_desc" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="meta_key" class="col-sm-2 control-label">Meta Tag Keyword</label>

                  <div class="col-sm-9">
                    <input type="text" name="meta_key" id="meta_key" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div>

             

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_exam_type/course_view" class="btn btn-danger">Cancel</a>
                <button type="button" class="btn btn-info pull-right" onclick="return form_validation()">Submit</button>
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

      // var description = $('#description').val();
      // if (!isNull(description)) {
      //   $('#description').removeClass('black_border').addClass('red_border');
      // } else {
      //   $('#description').removeClass('red_border').addClass('black_border');
      // }


       if ((tinymce.EditorManager.get('description').getContent()) == '') {



           $("#message_error").html('Description can not be empty.');

            $('#description').addClass('red_border');

            // return false;

          }

          else

          {

             $("#message_error").html('');

             $('#description').removeClass('red_border');

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

            