 
  <?php $answer_arr=array('A','B','C','D','E');?>

 <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<!-- <script>tinymce.init({ selector:'textarea' });</script> -->
 <!-- <script type="text/javascript">
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
    remove_script_host: false,
   document_base_url : "https://www.eduguideplus.com",
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
        
    content_css : "<?php echo base_url();?>assets/tinymce_math/css/content.css",
  
});

</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SINGLE QUESTION EDIT
        
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
          <div class="box box-info" style="display:table">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">COMPANY ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_question/single_question_update" method="post" id="single_question_add" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
             <?php

                $exam_id =  @$edit_single_ques[0]->exam_id;
                $exam_tbl_chk = $this->admin_model->selectOne('tbl_exam_type','id',$exam_id); 
                $exam_type_id = @$exam_tbl_chk[0]->exam_type_id;
                $exam_type_tbl = $this->admin_model->selectOne('tbl_exam_type','exam_type_id',$exam_type_id); 

             ?>

            

             <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Exam Type<!-- <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span> --></label>

                  <div class="col-sm-8">
                    <select  id="exam_type" class="form-control" onchange="get_exam(this.value)" disabled>
                    <option value="">Select Exam Type</option>
                     <?php foreach($type as $typ){?>
                      <option value="<?php echo $typ->id; ?>" <?php if($exam_type_id==$typ->id){ echo 'selected'; } ?> ><?php echo $typ->exam_name; ?></option>
                      <?php } ?>
                    </select>
                    <input type="hidden" name="exam_type" value="<?php echo $exam_type_id; ?>" >
                  </div>
                 
              </div>


             <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Exam Name<!-- <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span> --></label>

                  <div class="col-sm-8">
                    <select id="exam_id" class="form-control" disabled="">
                    <?php foreach($exam_type_tbl as $ex){?>
                    <option value="<?php echo $ex->id;?>" <?php if($ex->id==$exam_id){ echo 'selected'; } ?>><?php echo $ex->exam_name;?></option> 
                    <?php } ?>
                    </select>
                    <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>" >
                    
                  </div>
                 
              </div>


               <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Subject<!-- <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span> --></label>

                  <div class="col-sm-8">
                    <select id="question_type" class="form-control" onchange="check_type(this.value)" disabled="">
                    <option value="">Select Question Type</option>
                   <?php foreach($section as $sec){?>
                      <option value="<?php echo $sec->id;?>" <?php if(@$edit_single_ques[0]->section_id==$sec->id){ echo 'selected'; }?>><?php echo $sec->section_name;?></option>
                      <?php } ?>
                    </select>
                    <input type="hidden" name="question_type" value="<?php echo @$edit_single_ques[0]->section_id; ?>" >
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Chapter<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <select name="chapter_name" id="chapter_name" class="form-control"  disabled>
                    <option value="">Select Chapter</option>
                     <?php foreach($chapter as $chap){?>
                      <option value="<?php echo $chap->chap_id;?>" <?php if(@$edit_single_ques[0]->chap_id==$chap->chap_id){ echo 'selected'; }?>><?php echo $chap->chap_name;?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                 
              </div>



                <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Test Type<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <select name="test_type[]" id="test_type" class="form-control select2" onchange="check_type(this.value)" multiple >
                    <option value="">Select Test Type</option>
                   <?php foreach($test_type as $test){?>
                      <option value="<?php echo $test->test_id;?>" <?php for($i=0;$i<count($question_test_type);$i++){if(@$question_test_type[$i]->test_type==$test->test_id){ echo 'selected'; }}?>><?php echo $test->test_name;?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                 
              </div>


   <div id="single" style="display:<?php //if(@$edit_single_ques[0]->section_id=='3'){ echo 'none'; }?>"> 

             <!--    <div class="form-group" id="single" >
                  <label for="sub_name" class="col-sm-2 control-label">Question<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="question" id="question" class="form-control qstn" value="<?php echo @$edit_single_ques[0]->question;?>">
                   
                    
                  </div>
                 
              </div>
 -->

 <div class="form-group" id="single">
                  <label for="sub_name" class="col-sm-2 control-label">Question<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <!-- <input type="text" name="question" id="question" class="form-control qstn" value=""> -->
                   <textarea type="text" name="question" id="question" class="form-control qstn tinyarea" placeholder="" value="" cols="5" rows="8"><?php echo @$edit_single_ques[0]->question;?></textarea>
                    
                  </div>
                 
              </div>
       <?php 
        
        $q_id = @$edit_single_ques[0]->id;
        $answer = $this->admin_model->selectOne('tbl_question_choice','que_id',$q_id);

       ?>       
              <?php 
              $i=0;
              foreach ($answer as $val) {
               $i++; 
             ?>

              <div class="form-group" >
                  <label for="sub_name" class="col-sm-2 control-label">option<?php echo $i;?>(<?php echo $answer_arr[$i-1];?>)<!--<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span>--></label>

                  <div class="col-sm-5">
                    <!-- <input type="text" name="question" id="question" class="form-control qstn" value=""> -->
                   <textarea type="text" name="option[]" id="option<?php echo $i?>" class="form-control qstn tinyarea" placeholder="" ><?php echo $val->choice;?></textarea>
                    
                  </div>

                  <label for="sub_name" class="col-sm-2 control-label">Answer<!--<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span>--></label>
                    <div class="col-sm-3">
                    <!-- <input type="text" name="question" id="question" class="form-control qstn" value=""> -->
                   <select class="form-control qstn"  value=""  name="answer[]" onchange="get_answer_type(this.value,<?php echo $i;?>);">
                     <option value="No" <?php if($val->is_correct=='No'){ echo 'selected'; } ?>>No</option>
                     <option value="Yes" <?php if($val->is_correct=='Yes'){ echo 'selected'; } ?>>Yes</option>
                   </select>
                    
                  </div>
                 
              </div>
              <?php } ?>
              <?php for($i=1;$i<(5-(count($answer)));$i++){?>

              <div class="form-group" >
                  <label for="sub_name" class="col-sm-2 control-label">option<?php echo (count($answer))+$i;?><!--<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span>--></label>

                  <div class="col-sm-5">
                    <!-- <input type="text" name="question" id="question" class="form-control qstn" value=""> -->
                   <input type="text" name="option[]" id="question" class="form-control qstn tinyarea" placeholder="" value="" >
                    
                  </div>

                  <label for="sub_name" class="col-sm-2 control-label">Answer<!--<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span>--></label>
                    <div class="col-sm-3">
                    <!-- <input type="text" name="question" id="question" class="form-control qstn" value=""> -->
                   <select class="form-control qstn"  value=""  name="answer[]">
                     <option value="No" selected>No</option>
                     <option value="Yes">Yes</option>
                   </select>
                    
                  </div>
                 
              </div>
              <?php } ?>

</div>

         
             
<!-- <div id="multi" style="display:none;"> -->
<div id="multi" style="display:none;<?php //if(@$edit_single_ques[0]->section_id!='3'){ echo 'none'; }?>">

              <div class="form-group" >
                  <label for="sub_name" class="col-sm-2 control-label">Passage_title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10" >
                    <select id="passage_id" class="form-control" onchange="set_val(this.value)"  disabled="">
                    <option value="">Select Passage Title</option>
                   <?php foreach($passage as $pas){?>
                      <option value="<?php echo $pas->id;?>" title="" <?php if($pas->id==@$edit_single_ques[0]->passage_id){ echo 'selected'; } ?>><?php echo $pas->title.'( id = '.$pas->id.')';?></option>
                      <?php } ?>
                    </select>
                    <input type="hidden" name="passage_id" value="<?php echo @$edit_single_ques[0]->passage_id; ?>" >
                  </div>
                 
              </div>
<?php 
  $passage_id = @$edit_single_ques[0]->passage_id;
  $edit_id = @$edit_single_ques[0]->id;
  //echo $exam_id;
 //echo $edit_id;
  $passage_question = $this->admin_model->selectOne('tbl_questions','passage_id',$passage_id);
  $passage_question = $this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('passage_id'=>$passage_id,'exam_id'=> $exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = $passage_id, $end = '');

?>

          <?php for($i=0;$i<5;$i++){?>

               <div class="form-group" >
                  <label for="sub_name" class="col-sm-2 control-label">Question No. <?php echo $i+1; ?><span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="questn[]" id="questn<?php echo $i; ?>" class="form-control qstn" placeholder="" value="<?php echo @$passage_question[$i]->question;?>">
                    
                  </div>
                 
              </div>

                <?php 
                  $pass_ques_id = @$passage_question[$i]->id;
                  $answer = $this->admin_model->selectOne('tbl_question_choice','que_id',$pass_ques_id);
                  //echo $pass_ques_id;
                  //print_r($answer); 
                ?>
                    <?php 

                    $j=0;
                    foreach($answer as $ans){
                    $j++;
                    
                    ?>
                    
                <div class="form-group" >
                  <label for="sub_name" class="col-sm-2 control-label">option<?php echo $j;?><!--<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span>--></label>

                  <div class="col-sm-5">
                    <!-- <input type="text" name="question" id="question" class="form-control qstn" value=""> -->
                   <input type="text" name="option_<?php echo $i; ?>[]" id="question" class="form-control qstn" placeholder="" value="<?php echo $ans->choice;?>" >
                    
                  </div>

                  <label for="sub_name" class="col-sm-2 control-label">Answer<!--<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span>--></label>
                    <div class="col-sm-3">
                    <!-- <input type="text" name="question" id="question" class="form-control qstn" value=""> -->
                   <select class="form-control qstn"  value=""  name="answer_<?php echo ($i); ?>[]">
                     <option value="No" <?php if($ans->is_correct=='No'){ echo 'selected'; }?>>No</option>
                     <option value="Yes" <?php if($ans->is_correct=='Yes'){ echo 'selected'; } ?>>Yes</option>
                   </select>
                    
                  </div>
                 
              </div>
              <?php } ?>

                <?php for($j=1;$j<=(5-(count($answer)));$j++){?>
              
                            <div class="form-group" >
                <label for="sub_name" class="col-sm-2 control-label">option<?php echo count($answer)+$j;?><span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
              
                <div class="col-sm-5">
                 
                 <input type="text" name="option_<?php echo ($i); ?>[]" id="question" class="form-control qstn" placeholder="" value="" >
                  
                </div>
              
                <label for="sub_name" class="col-sm-2 control-label">Answer<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                  <div class="col-sm-3">
                 
                 <select class="form-control qstn"  value=""  name="answer_<?php echo ($i); ?>[]">
                   <option value="No" selected>No</option>
                   <option value="Yes">Yes</option>
                 </select>
                  
                </div>
               
                            </div>
                    <?php } ?> 

          <?php } ?>

          <!-- <?php for($i=1;$i<=(5-(count($passage_question)));$i++){?>
          
               <div class="form-group" >
                  <label for="sub_name" class="col-sm-2 control-label">Question No. <?php echo $i; ?><span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
          
                  <div class="col-sm-9">
                    <input type="text" name="questn[]" id="questn<?php echo $i; ?>" class="form-control qstn" placeholder="" value="">
                    
                  </div>
                 
              </div>
          
          <?php } ?> -->




              </div>

<input type="hidden" value="<?php echo @$edit_single_ques[0]->id?>" name="edit_id">
<div class="form-group" id="single">
                  <label for="sub_name" class="col-sm-2 control-label">Explanation</label>

                  <div class="col-sm-10">
                    <!-- <input type="text" name="question" id="question" class="form-control qstn" value=""> -->
                   <textarea type="text" name="explanation" id="explanation" class="form-control qstn tinyarea" placeholder="" value="" cols="5" rows="8"><?php echo @$edit_single_ques[0]->explanation;?></textarea>
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Time/Question(Seconds) <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
              
                  <div class="col-sm-9">
                  <input type="text" name="time" id="time" class="form-control" placeholder="Enter time in seconds" value="<?php echo @$edit_single_ques[0]->time; ?>">
                    
                  </div>
                 
              </div>

               <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Marks/Question <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
              
                  <div class="col-sm-9">
                  <input type="text" name="marks" id="marks" class="form-control" placeholder="Enter Marks/Question" value="<?php echo @$edit_single_ques[0]->marks; ?>">
                    
                  </div>
                 
              </div>
              <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Negative Marks/Question <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
              
                  <div class="col-sm-9">
                  <input type="text" name="neg_mark" id="neg_mark" class="form-control" placeholder="Enter Negative Marks/Question" value="<?php echo @$edit_single_ques[0]->neg_mark; ?>">
                    
                  </div>
                 
              </div>

              </div>
 <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_question/view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()">Update</button>
              </div>
             </div>

             <div class="clearfix" style="display:none;<?php //if(@$edit_single_ques[0]->section_id!='3'){ echo 'none'; }?>" id="show_pass">
             <?php 
              $passage_id = @$edit_single_ques[0]->passage_id;
              $passage = $this->admin_model->selectOne('tbl_passage','id',$passage_id); 
             ?>
            <div class="col-md-4" ><textarea class="tinyarea" id="des" ><?php echo @$passage[0]->description;?></textarea></div>
             
             
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



 <script src="<?php echo base_url()?>plugins/select2/select2.full.min.js"></script>

<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.multiselect.js"></script>


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
              url:"<?php echo base_url();?>index.php/manage_set/get_exam",
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


    if(value>0)
    {
      $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_question/check_question_type",
              data: {type_id: value},
              async: false,
              success: function(data)
              {

                  //alert(data['status']);
                  if(data['status']==1)
                  {
                    $("#single").css("display", "none");
                    $("#multi").css("display", "block");
                    $("#show_pass").css("display", "block");
                  }
                  else
                  {
                    $("#single").css("display", "block");
                    $("#multi").css("display", "none");
                     $("#show_pass").css("display", "none");
                  }
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

var time = $('#time').val();
      if (time=="") {
        $('#time').removeClass('black_border').addClass('red_border');
      } else {
        $('#time').removeClass('red_border').addClass('black_border');
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