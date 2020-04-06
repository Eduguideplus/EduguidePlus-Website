 <!-- <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>tinymce.init({ selector:'textarea' });</script> -->
 <!--<script type="text/javascript">
    tinymce.init({
      selector: ".tinyarea",
      theme: "modern",
     height:"400px",
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
  </script>  -->

  <?php $answer_arr=array('A','B','C','D','E');?>

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
<!-- /TinyMCE -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SUB ADMIN PRICE EDIT
        
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
          <div class="box box-info" style="display:table;">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">COMPANY ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/Subadmin_question_price/update" method="post" id="single_question_add" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
             

            

             <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Exam Group<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <select name="exam_type" id="exam_type" class="form-control" onchange="get_exam(this.value)">
                    <option value="">Select Exam Type</option>
                     <?php foreach($type as $typ){?>
                      <option value="<?php echo $typ->id; ?>"<?php if($typ->id==$price_details[0]->exam_group_name){ echo "selected";} ?>><?php echo $typ->exam_name; ?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                 
              </div>

              <?php 

              $exam=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$price_details[0]->exam_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                @$exam_name_id=$exam[0]->id;
              ?>


             <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Exam Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <select name="exam_id" id="exam_id" class="form-control" onchange="get_subject_name(this.value)">
                    <option value="">Select Exam Name</option>
                    <option value="<?php echo $exam[0]->id;?>"<?php if($exam_name_id==$price_details[0]->exam_name){ echo "selected";}?>><?php echo $exam[0]->exam_name;?></option>
                    </select>
                    
                  </div>
                 
              </div>
              <?php
               $section=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$price_details[0]->subject_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                @$subject_id=$section[0]->id;
                ?>
               <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Subject<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <select name="question_type" id="question_type" class="form-control" onchange="check_type(this.value)" >
                    <option value="">Select Subject</option>
                    <option value="<?php echo $section[0]->id;?>"<?php if($subject_id==$price_details[0]->subject_name){ echo "selected";}?>><?php echo $section[0]->section_name;?></option>
                 
                    </select>
                    
                  </div>
                 
              </div>
              <?php

              $chapter=$this->common_model->common($table_name ='tbl_chapters', $field = array(), $where = array('chap_id'=>@$price_details[0]->chapter_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                @$chapter_id=$chapter[0]->chap_id;
              ?>

<!-- 
                <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Chapter<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <select name="chapter_name" id="chapter_name" class="form-control"  >
                    <option value="">Select Chapter</option>
                    <option value="<?php echo $chapter[0]->chap_id;?>"<?php if($chapter_id==$price_details[0]->chapter_name){ echo "selected";}?>><?php echo $chapter[0]->chap_name;?></option>
                    </select>
                    
                  </div>
                 
              </div> -->



                <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Question Price<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                   <input type="text" name="price" id="price" value="<?php echo $price_details[0]->question_price;?>" class="form-control">
                    <input type="hidden" name="subadmin_question_price_id" value="<?php echo $price_details[0]->subadmin_question_price_id;?>">
                  </div>
                 
              </div>


              </div>
 <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/Subadmin_question_price" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()">Update</button>
              </div>
             </div>

             <div class="clearfix" style="display:none;" id="show_pass">
<div class="col-md-4" ><textarea class="tinyarea" id="des" ></textarea></div>
             
             
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

  <script src="<?php echo base_url()?>plugins/select2/select2.full.min.js"></script>

<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.multiselect.js"></script>


 <script>
    function get_subject_name(value)
    {
       var html='<option value="">Select</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/Subadmin_question_price/get_subject",
                    data: {category_id: value},
                    async: false,
                    success: function(data)
                    {

                        //alert(data[0].category_id);
                        for(var i=0; i<data.length; i++)
                        {
                            html+='<option value="'+data[i].id+'">'+data[i].section_name+'</option>';
                        }
                        //alert(html); 
                        $("#question_type").html(html);

                    }
                });
          }
          else
          {
              $("#question_type").html(html);
          }
    }
  </script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>


<script>
  function get_exam(value)
{

  //alert(value);

    var html='<option value="">Select</option>';
    if(value>0)
    {
      $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/Subadmin_question_price/get_exam",
              data: {type_id: value},
              async: false,
              success: function(data)
              {

                  //alert(data[0].category_id);
                  for(var i=0; i<data.length; i++)
                  {
                      html+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
                  }
                  $("#exam_id").html(html);

              }
          });
    }
    else
    {
        $("#exam_id").html(html);
    }


}



  </script>

  <script>
  function check_type(value)
  {

    var exam_id= $("#exam_id").val();
    //alert(exam_id);

    if(value>0)
    {
      $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/Subadmin_question_price/check_question_type",
              data: {type_id: value,exm_id: exam_id},
              async: true,
              success: function(data)
              {
                console.log(data.result);
                var perform= data.result;
                 var node1='<option value="">Select Chapter</option>';
                  //alert(perform['passg'][0]['title']);
                  if(perform['status']==1)
                  {
                   /* $("#single").css("display", "none");
                    $("#multi").css("display", "block");
                    $("#show_pass").css("display", "block");*/
                    
                    var node='<option value="">Select Passage</option>';
                   
                    for(var i=0;i<perform['passg'].length;i++)
                    {
                      node+='<option value="'+perform['passg'][i]['id']+'">'+perform['passg'][i]['title']+'</option>';

                    }
                    $("#passage_id").html(node);



                  }
                  else
                  {
                    /*$("#single").css("display", "block");
                    $("#multi").css("display", "none");
                     $("#show_pass").css("display", "none");*/
                     var node='<option value="">Select Passage</option>'
                    for(var i=0;i<perform['passg'].length;i++)
                    {
                      node+='<option value="'+perform['passg'][i]['id']+'">'+perform['passg'][i]['title']+'</option>';
                    }
                    $("#passage_id").html(node);
                  }


                    for(var i=0;i<perform['chapters'].length;i++)
                    {
                      node1+='<option value="'+perform['chapters'][i]['chap_id']+'">'+perform['chapters'][i]['chap_name']+'</option>';

                    }

                    $("#chapter_name").html(node1);
                 /* for(var i=0; i<data.length; i++)
                  {
                      html+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
                  }
                  $("#exam_id").html(html);*/

              }
          });
    }
    else
    {
        //$("#exam_id").html(html);
    }


  }
  </script>

  <script>
  function validation()
  {
    var exam_type = $('#exam_type').val();
      if (!isNull(exam_type)) {
        $('#exam_type').removeClass('black_border').addClass('red_border');
      } else {
        $('#exam_type').removeClass('red_border').addClass('black_border');
      }

      var exam_id = $('#exam_id').val();
      if (!isNull(exam_id)) {
        $('#exam_id').removeClass('black_border').addClass('red_border');
      } else {
        $('#exam_id').removeClass('red_border').addClass('black_border');
      }

      var question_type = $('#question_type').val();
      if (!isNull(question_type)) {
        $('#question_type').removeClass('black_border').addClass('red_border');
      } else {
        $('#question_type').removeClass('red_border').addClass('black_border');
      }

      //  var chapter_name = $('#chapter_name').val();
      // if (!isNull(chapter_name)) {
      //   $('#chapter_name').removeClass('black_border').addClass('red_border');
      // } else {
      //   $('#chapter_name').removeClass('red_border').addClass('black_border');
      // }

      var price = $('#price').val();
      if (!isNull(price)) {
        $('#price').removeClass('black_border').addClass('red_border');
      } else {
        $('#price').removeClass('red_border').addClass('black_border');
      }



      
  }
  function form_validation()
  {
  
   
    $('#single_question_add').attr('onchange', 'validation()');
    $('#single_question_add').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#single_question_add .red_border').size() > 0)
    {
      $('#single_question_add .red_border:first').focus();
      $('#single_question_add .alert-error').show();
      return false;
    } else {

      $('#single_question_add').submit();
    }

  }

  </script>

  <script>
  function set_val(value)
  {

    if(value>0)
    {
      $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_question/set_description_val",
              data: {type_id: value},
              async: false,
              success: function(data)
              {

                  //alert();
                  if(data[0].description!='')
                  {
                    
                    
                      tinyMCE.activeEditor.setContent(data[0].description);
                  }
                  else
                  {
                    tinyMCE.activeEditor.setContent();
                  }
                 

              }
          });
    }
    
   

  }

  
  </script>

    <script type="text/javascript">
   
function get_answer_type(value,id) {
 
  var option =tinymce.get('option'+id).getContent();
 
 var pre_data=tinymce.get('explanation').getContent();
 
 // alert(pre_data);

 if(value=='Yes'){

 $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_question/get_answer_hint",
              data: {value: value,id:id, option:option ,pre_data:pre_data},
              async: false,
              success: function(data)
              {

                  
      // alert(data);       
// tinymce.set('explanation').setContent(data);
 
tinyMCE.getInstanceById('explanation').setContent(data+pre_data);

              }
          });


 }
 else{

   $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_question/get_answer_hint",
              data: {value: value,id:id, option:option,pre_data:pre_data},
              async: false,
              success: function(data)
              {

                  
      // alert(data);       
// tinymce.set('explanation').setContent(data);
 
tinyMCE.getInstanceById('explanation').setContent(data);

              }
          });
 }
 
  
}

    </script>        