<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>tiny_mce/tiny_mce.js"></script>
 <!-- <script type="text/javascript">
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
    </script>-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EDIT NOTIFICATION
        
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
              <!-- <h3 class="box-title">FAQ  ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_notification/update_notification" method="post" id="faqadd_form_validation" enctype="multipart/form-data" >
              <div class="box-body">
                <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>

			           <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Notification Text<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                   <input type="text" name="n_text" id="n_text" class="form-control"  value="<?php echo @$notification[0]->notification_text; ?>">
                     <span id="error_catname" style="color:red"></span>
                  </div>
                 
                  </div>


					       <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Notification Link<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
					             <input type="text" name="n_link" class="form-control" id="n_link" value="<?php echo @$notification[0]->notification_link; ?>">

                   
                  </div>
                 
                </div>
<input type="hidden" name="edit_id" value="<?php echo @$notification[0]->notification_id; ?>">



                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Notification Status</label>

                  <div class="col-sm-10">
                  <select class="form-control" name="n_status" id="n_status">
                  <option value="Y" <?php if(@$notification[0]->notification_status=='Y'){echo 'selected';}?>>Active</option>
                  <option value="N" <?php if(@$notification[0]->notification_status=='N'){echo 'selected';}?>>Inactive</option>
                  </select>
                       

                   
                  </div>
                 
                </div>

             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_faq/list_view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return faq_add_validation()" >Submit</button>
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
<script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>
<script type="text/javascript">
  function validation()
  {
    var question = $('#question').val();
      if (!isNull(question)) {
        $('#question').removeClass('black_border').addClass('red_border');
      } else {
        $('#question').removeClass('red_border').addClass('black_border');
      }
      var answer = $('#answer').val();
      if (!isNull(answer)) {
        $('#answer').removeClass('black_border').addClass('red_border');
      } else {
        $('#answer').removeClass('red_border').addClass('black_border');
      }
  }
  function faq_add_validation()
  {
  
   
    $('#faqadd_form_validation').attr('onchange', 'validation()');
    $('#faqadd_form_validation').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#faqadd_form_validation .red_border').size() > 0)
    {
      $('#faqadd_form_validation .red_border:first').focus();
      $('#faqadd_form_validation .alert-error').show();
      return false;
    } else {

      $('#faqadd_form_validation').submit();
    }

  }
</script>



            