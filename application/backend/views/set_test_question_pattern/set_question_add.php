<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <!--<script>tinymce.init({ selector:'textarea' });</script>-->
  <script type="text/javascript">
    tinymce.init({
      selector: ".tinyarea",
      theme: "modern",
      menubar: "edit insert tools",
      readonly : 1,
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
      ],
      toolbar1: "undo redo | styleselect | bold italic| forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | link preview",
      image_advtab: true
    });
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         TEST SET PATTERN ADD<?php //echo $timestamp = date("g:i", time());?>
        
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
              <!-- <h3 class="box-title">CATEGORY ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_set_test_question_pattern/insert" method="post" id="add_know" >
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>


                 <div class="form-group">
                  

                    <label for="class" class="col-sm-2 control-label">Examination Group <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <select name="group_name" id="group_name" class="form-control" onchange="get_exam_name(this.value)">
                      <option value="">---Select Examination Group---</option>

                       <?php

                      foreach($parent_exam_type as $row){
                      ?>
                      <option value="<?php echo $row->id; ?>" ><?php echo $row->exam_name; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                    
                    
                  </div>
                 
              </div>

                

                  <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Examination Name <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <select name="exam_name" id="exam_name" class="form-control" onchange="get_subject_name(this.value)">
                      <option value="">---Select Examination---</option>
                    </select>
                    
                    
                  </div>
               </div>

               <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Test <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <select name="test" id="test" onchange="get_test(this.value)" class="form-control">
                      <option value="">---Select Test---</option>
                      <?php
                      foreach($test_type as $row)
                      {
                        ?>
                        <option value="<?php echo $row->test_name;?>"><?php echo $row->test_name;?></option>
                        <?php
                        }
                        ?>
                      
                    </select>
                    
                    
                  </div>
               </div>

               <div id="mock_test_id" style="display: none;">
                 <div class="form-group" >
                  
                  <label for="class" class="col-sm-2 control-label">Test Type </label>

                  <div class="col-sm-4">
                    
                    <select class="form-control" name="test_type" id="test_type">
                      <option value="">Select Test Type</option>
                      <?php 
                      foreach($exam_test_type as $test)
                      {
                        ?>
                        <option value="<?php echo $test->test_name;?>"><?php echo $test->test_name;?></option>
                        <?php
                      }
                      ?>
                  
                    </select>
                    
                  </div>
                 
              </div>
               </div>
               


                <div class="form-group" >
                  
                  <label for="class" class="col-sm-2 control-label">No. Of Question <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="no_of_question" id="no_of_question" class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false">
                    
                  </div>
                 
              </div>

              <div class="form-group" >
                  
                  <label for="class" class="col-sm-2 control-label">Marks Of Question <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input  class="form-control" type="text" id="marks_of_question" onblur="calculate_marks(value)"  name="marks_of_question" maxlength="10" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false">
                    
                  </div>
                 
              </div>

              <div class="form-group" id="chap_section">
                <label for="class" class="col-sm-2 control-label">Total Marks <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="total_marks" id="total_marks" class="form-control" readonly>
                    
                  </div>
                 
              </div>


              <div class="form-group" >
                  <label for="class" class="col-sm-2 control-label">Time/Question(Second) <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="tim_marks" id="tim_marks" class="form-control" onblur="calculate_duration(value)">
                    
                  </div>

              </div>

              <div class="form-group" id="chap_section">
                <label for="class" class="col-sm-2 control-label">Total Time<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="total_time" id="total_time" class="form-control" readonly>
                    
                  </div>
                 
              </div>

              <div class="box-footer">
  
                <a href="<?php echo base_url();?>index.php/manage_set_test_question_pattern/view" class="btn btn-danger">Cancel</a>
              
                
                     
                <button type="button" class="btn btn-info pull-right" onclick="return know_form_validation()">Create Set</button>
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

<script type="text/javascript">
  
  function get_test(val)
  {
    // alert(val);
    if(val=='Mock Test')
    {
      $("#mock_test_id").css('display','block');
    }
    else
    {
      $("#mock_test_id").css('display','none');
    }
  }
</script>
  
  <script>
    function get_subject_name(value)
    {
       var html='<option value="">---Select Subject---</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/manage_set_test_question_pattern/get_subject",
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
                        $("#sub_name").html(html);

                    }
                });
          }
          else
          {
              $("#sub_name").html(html);
          }
    }
  </script>


   <script>

    function get_exam_name(value)
    {
      //alert(value);
          var html='<option value="">---Select Examination---</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/manage_set_test_question_pattern/get_exam",
                    data: {category_id: value},
                    async: false,
                    success: function(data)
                    {

                        //alert(data[0].category_id);
                        for(var i=0; i<data.length; i++)
                        {
                            html+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
                        }
                        //alert(html); 
                        $("#exam_name").html(html);

                    }
                });
          }
          else
          {
              $("#exam_name").html(html);
          }
    }
  </script>

  <script>
    function secondsToHms(d) {
    d = Number(d);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);

    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
    var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
    return hDisplay + mDisplay + sDisplay; 
}
  </script>

  <script>
    function calculate_marks(value)
    {
      // alert('ok');
      var no_of_question=$("#no_of_question").val();

      if(value!='' && no_of_question!='')
      {
        // alert(no_of_question);

        var marks=no_of_question*value;
        $("#total_marks").val(marks);

      }
    }
  </script>

  <script>
    function calculate_duration(value)
    {
      var total_marks=$("#total_marks").val();
       // alert(value);
      if(total_marks!='' && value!=='')
      {
        var duration=value*total_marks;
        
         var dur_str=secondsToHms(duration);
         $("#total_time").val(dur_str);
      }
    }
  </script>

  
 
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>

<script>
  function form_validation()
  {

    


                 var group_name = $('#group_name').val();
                  if (!isNull(group_name)) {
                    $('#group_name').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#group_name').removeClass('red_border').addClass('black_border');
                  }

                  var exam_name = $('#exam_name').val();
                  if (!isNull(exam_name)) {
                    $('#exam_name').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#exam_name').removeClass('red_border').addClass('black_border');
                  }

                  var test = $('#test').val();
                  if (!isNull(test)) {
                    $('#test').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#test').removeClass('red_border').addClass('black_border');
                  }

                   var no_of_question = $('#no_of_question').val();
                  if (!isNull(no_of_question)) {
                    $('#no_of_question').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#no_of_question').removeClass('red_border').addClass('black_border');
                  }

                   var marks_of_question = $('#marks_of_question').val();
                  if (!isNull(marks_of_question)) {
                    $('#marks_of_question').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#marks_of_question').removeClass('red_border').addClass('black_border');
                  }

                  var tim_marks = $('#tim_marks').val();
                  if (!isNull(tim_marks)) {
                    $('#tim_marks').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#tim_marks').removeClass('red_border').addClass('black_border');
                  }

  }
  function know_form_validation()
  {
  
   
    $('#add_know').attr('onchange', 'form_validation()');
    $('#add_know').attr('onkeyup', 'form_validation()');

     form_validation();
    //alert($('#contact_form .red_border').size());

     if ($('#add_know .red_border').size() > 0)
    {
      $('#add_know .red_border:first').focus();
      $('#add_know .alert-error').show();
      return false;
    } else {

      $('#add_know').submit();
    }

  }

  </script>

   

       

         