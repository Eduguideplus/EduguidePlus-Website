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
        Create New Test
        
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

            <?php
            $err_msg=$this->session->flashdata('err_msg');
            if($err_msg){
              ?>
              <br><span style="color:red">
                <?php echo $err_msg; ?>
              </span>
              <?php
              }
              ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_knowledge/manual_add_action" method="post" id="add_know" >
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>


                 <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Test Type <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <select name="test_type" id="test_type" class="form-control" onchange="make_effect(this.value)">
                      <option value="">Select Test Type</option>

                      <?php
                      foreach($test_type_list as $res)
                        {
                          ?>
                      <option value="<?php echo $res->test_id; ?>"><?php echo $res->test_name; ?></option>
                     <?php }
                     ?>
                    </select>
                    
                    
                  </div>

                  <label for="class" class="col-sm-2 control-label">Test Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="test_name" id="test_name" class="form-control" placeholder="Enter Test Name">
                    
                  </div>

                  
                 
              </div>

                

                  <div class="form-group">
                      <label for="class" class="col-sm-2 control-label">Course <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <select name="group_name" id="group_name" class="form-control" onchange="get_exam_name(this.value)">
                      <option value="">Select Course</option>

                       <?php

                      foreach($parent_exam_type as $row){
                      ?>
                      <option value="<?php echo $row->id; ?>" ><?php echo $row->exam_name; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                    
                    
                  </div>
                  <label for="class" class="col-sm-2 control-label">Examination<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <select name="exam_name" id="exam_name" class="form-control" onchange="get_subject_name(this.value)">
                      <option value="">Select Examination</option>
                    </select>
                    
                    
                  </div>

                 
                 
              </div>

               


                <div class="form-group" >
                    <label for="class" class="col-sm-2 control-label">Subject<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <select name="sub_name" id="sub_name" class="form-control" onchange="get_chapter_name(this.value)">
                      <option value="">Select Subject</option>
                    </select>
                    
                    
                  </div>
                  <div id="chap_section">


                  <label for="class" class="col-sm-2 control-label">Chapter<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <select name="chap_name" id="chap_name" class="form-control">
                      <option value="">Select Chapter</option>

                    </select>
                    
                    
                  </div>
                </div>
                
                 
              </div>


              <div class="form-group" >
                 <!--  <label for="class" class="col-sm-2 control-label">No. of Questions <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-10">
                    
                    <input type="text" name="qstn_qty" id="qstn_qty" class="form-control" onblur="calculate_marks(this.value)" placeholder="Enter No. of Questions">
                    
                  </div> -->
                 <!--  <label for="class" class="col-sm-2 control-label">Time/marks(Second) <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="tim_marks" id="tim_marks" class="form-control" onblur="calculate_duration(this.value)">
                    
                  </div> -->
                  

                    <!-- <label for="class" class="col-sm-2 control-label">Examination Date <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="exam_date" id="exam_date" class="form-control" readonly>
                    
                  </div> -->
               
                 
              </div>


              



               <!-- <div class="form-group" >
                


                  <label for="class" class="col-sm-2 control-label">Examination Time <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="exam_time" id="exam_time" class="form-control" autocomplete="off" ><span id="error_time"></span>
                    
                  </div>


                  <label for="class" class="col-sm-2 control-label">Registration Start date <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="reg_start_date" id="reg_start_date" class="form-control" readonly>
                    
                  </div>
                 
              </div> -->


             

               <!--  <div class="form-group" id="chap_section">
                  


                  <label for="class" class="col-sm-2 control-label">Registration End Date <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="reg_end_date" id="reg_end_date" class="form-control" readonly>
                    
                  </div>

                    <label for="class" class="col-sm-2 control-label">Total Marks <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="exam_marks" id="exam_marks" class="form-control" readonly>
                    
                  </div>
                 
              </div> -->


                <!--  <div class="form-group" id="chap_section">
                   <label for="class" class="col-sm-2 control-label">Total Marks <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="exam_marks" id="exam_marks" class="form-control" readonly>
                    
                  </div>
                

                   <label for="class" class="col-sm-2 control-label">Exam Duration <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-4">
                    
                    <input type="text" name="exam_duration" id="exam_duration" class="form-control" readonly>
                     <input type="hidden" name="exam_duration_hid" id="exam_duration_hid" class="form-control" readonly>
                    
                  </div>

                   

                 
              </div> 
 -->
               
<div class="form-group">
  

                    <label for="class" class="col-sm-2 control-label">Exam Instructions : <span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>

                  <div class="col-sm-10">
                    <div id="instruction">
                    <textarea name="instruction" id="instruction" class="form-control"></textarea>
                  </div>  
                  </div>

</div>

                
             <!-- <input type="hidden" name="qlist" id="qlist" value="<?php echo @$str; ?>"> -->
             
             
             
              <!-- /.box-body -->
              <div class="box-footer">
   <?php if($this->uri->segment(3)=='knowledge'){ ?>
                <a href="<?php echo base_url();?>index.php/manage_knowledge/knowledge_view/<?php echo $this->uri->segment(3); ?>" class="btn btn-danger">Cancel</a>
              <?php }else{ ?>
                <a href="<?php echo base_url();?>index.php/manage_knowledge/knockout_view/<?php echo $this->uri->segment(3); ?>" class="btn btn-danger">Cancel</a>
                  <?php } ?>     
                <button type="button" class="btn btn-info pull-right" onclick="return know_form_validation()">Select Questions</button>
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


  <script>
    function make_changes()
    {
      var dateString = $("#exam_date").val();
            alert(dateString);
    }
  </script>


  <script>
    function make_effect(value)
    {
      
     
        if(value==3 || value==4)
        {
          $("#chap_section").css('display','block');
        }
        else
        {
          $("#chap_section").css('display','block');
        }

        if(value!='')
        {
           $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/manage_knowledge/get_plan_details",
                    data: {category_id: value},
                    async: false,
                    success: function(data)
                    {
                      var price=data['plan'][0].price_per_set;
                        $("#exam_fees").val(price);
                      var len_sets=data['sets'].length;

                      if(len_sets>0)
                      {
                          var indx=len_sets-1;
                          var last_exam_date=data['sets'][indx].exam_date;
                          var last_date = new Date(last_exam_date);


                          var new_exam_date = new Date(new Date(last_exam_date).getTime()+(8*24*60*60*1000));

                          var current_dt = new Date();
                          if(new_exam_date<current_dt)
                          {
                            //alert('ok');
                          new_exam_date=new Date(new Date(current_dt).getTime()+(8*24*60*60*1000));
                          //alert(new_exam_date);
                          }

                          var day =new_exam_date.getDate();
                          var month=new_exam_date.getMonth()+1;
                          var year=new_exam_date.getFullYear();
                          var new_dt_str=year+'-'+month+'-'+day;
                          $("#exam_date").val(new_dt_str);
                        }

                            
                      else
                      {
                          var new_exam_date = new Date(new Date().getTime()+(8*24*60*60*1000));

                          var day =new_exam_date.getDate();
                          var month=new_exam_date.getMonth()+1;
                          var year=new_exam_date.getFullYear();
                          var new_dt_str=year+'-'+month+'-'+day;
                          $("#exam_date").val(new_dt_str);
                      }

                      var array = new_dt_str.split('-');
                            var new_str=array[1]+'/'+array[2]+'/'+array[0];

                            var days=8; // Days you want to subtract
                            var date = new Date(new_str);
                            var last = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
                            var day =last.getDate();
                            var month=last.getMonth()+1;
                            var year=last.getFullYear();
                            var reg_start=year+'-'+month+'-'+day;
                            //alert(reg_start);
                            $("#reg_start_date").val(reg_start);

                            var days=1; // Days you want to subtract
                            var date = new Date(new_str);
                            var last = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
                            var day =last.getDate();
                            var month=last.getMonth()+1;
                            var year=last.getFullYear();
                            var reg_end=year+'-'+month+'-'+day;
                            //alert(reg_start);
                            $("#reg_end_date").val(reg_end);
                    
                      
                      


                            //alert(new_dt_str);

                    }
                });
        }
      
    }
</script>


<script>
    function get_chapter_name(value)
    {
       var html='<option value="">Select Chapter</option><option value="0">All Chapters</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/manage_knowledge/get_chapter",
                    data: {category_id: value},
                    async: false,
                    success: function(data)
                    {

                        //alert(data[0].category_id);
                        for(var i=0; i<data.length; i++)
                        {
                            html+='<option value="'+data[i].chap_id+'">'+data[i].chap_name+'</option>';
                        }
                        //alert(html); 
                        $("#chap_name").html(html);

                    }
                });
          }
          else
          {
              $("#chap_name").html(html);
          }
    }
  </script>


  <script>
    function get_subject_name(value)
    {
       var html='<option value="">Select Subject</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/manage_knowledge/get_subject",
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
          var html='<option value="">Select Examination</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/manage_knowledge/get_exam",
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
      if(value!='')
      {

        var test_type=$("#test_type").val();
        var sub_name=$("#sub_name").val();

        $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/manage_knowledge/check_available_question",
                    data: {type: test_type,s_name:sub_name},
                    async: false,
                    success: function(data)
                    {
                      var qty=data.length;
                      if(qty<value)
                      {
                        $("#qstn_qty").removeClass('black_border').addClass('red_border');
                        alert('Please input no.of question bellow '+qty);
                      }
                      else
                      {
                        $("#qstn_qty").removeClass('red_border').addClass('black_border');
                      }

                        var marks=value*1;
                        $("#exam_marks").val(marks);

                    }
                });

       
        /*var duration=value*33;
         $("#exam_duration_hid").val(duration);
         var dur_str=secondsToHms(duration);
         $("#exam_duration").val(dur_str);*/
      }
    }
  </script>

  <script>
    function calculate_duration(value)
    {
      var exam_marks=$("#exam_marks").val();
      if(exam_marks!='' && value!=='')
      {
        var duration=value*exam_marks;
         $("#exam_duration_hid").val(duration);
         var dur_str=secondsToHms(duration);
         $("#exam_duration").val(dur_str);
      }
    }
  </script>

  <script>
    function get_start_end_date(value)
    {
      alert(value);
    }
  </script>
 
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>

<script>
  function form_validation()
  {

    var test_type = $('#test_type').val();
      if (!isNull(test_type)) {
        $('#test_type').removeClass('black_border').addClass('red_border');
      } else {

                if(test_type==5 || test_type==6)
                {
                  var chap_name = $('#chap_name').val();
                  if (!isNull(chap_name)) {
                    $('#chap_name').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#chap_name').removeClass('red_border').addClass('black_border');
                  }

                }
                 

        $('#test_type').removeClass('red_border').addClass('black_border');
      }

       var test_name = $('#test_name').val();
                  if (!isNull(test_name)) {
                    $('#test_name').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#test_name').removeClass('red_border').addClass('black_border');
                  }


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

                   var sub_name = $('#sub_name').val();
                  if (!isNull(sub_name)) {
                    $('#sub_name').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#sub_name').removeClass('red_border').addClass('black_border');
                  }

                 /*  var qstn_qty = $('#qstn_qty').val();
                  if (!isNull(qstn_qty)) {
                    $('#qstn_qty').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#qstn_qty').removeClass('red_border').addClass('black_border');
                  }
*/
                 /* var tim_marks = $('#tim_marks').val();
                  if (!isNull(tim_marks)) {
                    $('#tim_marks').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#tim_marks').removeClass('red_border').addClass('black_border');
                  }*/

                  /* var exam_date = $('#exam_date').val();
                  if (!isNull(exam_date)) {
                    $('#exam_date').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#exam_date').removeClass('red_border').addClass('black_border');
                  }*/

                  /*var exam_time = $('#exam_time').val();
                  if (!isNull(exam_time)) {
                    $('#exam_time').removeClass('black_border').addClass('red_border');
                  } else {

                    $.ajax({
              
             url:'<?php echo base_url(); ?>index.php/manage_knowledge/get_know_time',
             data:{time:exam_time,date:exam_date,test_type:test_type},
             dataType: "html",
             type: "POST",
             success: function(data){

if(data==1){
 $('#error_time').text('Please Select Another time');
            $('#exam_time').removeClass('black_border').addClass('red_border');
return false;
            }else{
              $('#error_time').text('');
              $('#exam_time').removeClass('red_border').addClass('black_border');
            }     
                
              }
             }); 
                    
                    
                  }*/

                 /* var reg_start_date = $('#reg_start_date').val();
                  if (!isNull(reg_start_date)) {
                    $('#reg_start_date').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#reg_start_date').removeClass('red_border').addClass('black_border');
                  }

                  var reg_end_date = $('#reg_end_date').val();
                  if (!isNull(reg_end_date)) {
                    $('#reg_end_date').removeClass('black_border').addClass('red_border');
                  } else {
                  
                    $('#reg_end_date').removeClass('red_border').addClass('black_border');
                  }*/

                  /*var exam_marks = $('#exam_marks').val();
                  if (!isNull(exam_marks)) {
                    $('#exam_marks').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#exam_marks').removeClass('red_border').addClass('black_border');
                  }

                   var exam_duration = $('#exam_duration').val();
                  if (!isNull(exam_duration)) {
                    $('#exam_duration').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#exam_duration').removeClass('red_border').addClass('black_border');
                  }*/

                  // var exam_duration = $('#exam_duration').val();
                  // if (!isNull(exam_duration)) {
                  //   $('#exam_duration').removeClass('black_border').addClass('red_border');
                  // } else {
                    
                  //   $('#exam_duration').removeClass('red_border').addClass('black_border');
                  // }

                     /*var exam_fees = $('#exam_fees').val();
                  if (!isNull(exam_fees)) {
                    $('#exam_fees').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#exam_fees').removeClass('red_border').addClass('black_border');
                  }*/
    /*var instruction = tinyMCE.get('instruction').getContent();;
                  if (!isNull(instruction)) {

                    $('#instruction').removeClass('black_border').addClass('red_border');
                  } else {
                    
                    $('#instruction').removeClass('red_border').addClass('black_border');
                  }*/

  
     
      
  }
  function know_form_validation()
  {
  
   
    $('#add_know').attr('onchange', 'form_validation()');
    $('#add_know').attr('onkeyup', 'form_validation()');

     form_validation();
    //alert($('#contact_form .red_border').size());

        var test_type=$("#test_type").val();
        var sub_name=$("#sub_name").val();
        var qstn_qty=$("#qstn_qty").val();
        var exam_name= $("#exam_name").val();

        if(exam_name!='' && sub_name!='' && qstn_qty!='')
        {

            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/manage_knowledge/check_available_question",
                    data: {type: test_type,s_name:sub_name},
                    async: false,
                    success: function(data)
                    {
                      var qty=data.length;
                      if(qty<qstn_qty)
                      {
                        $("#qstn_qty").removeClass('black_border').addClass('red_border');
                        alert('Please input no.of question bellow '+qty);
                      }
                      else
                      {
                        $("#qstn_qty").removeClass('red_border').addClass('black_border');
                      }

                       

                    }
                });

        }

        

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

   <script type="text/javascript">
     function multiple_paper_per_company(id)
    {
         
        var val=id;
         //alert(val);   
            if(val==2)
                {
                     $("#no_2").hide();
                      $("#minus").hide();
                }
            var base_url='<?php echo base_url(); ?>';
            if(val==3)
                {
                    $("#no_"+val).hide();
                   
                }
            if(val==4)
                {
                    $("#no_"+val).hide();
                }
                if(val==5)
                {
                    $("#no_"+val).hide();
                }
                if(val==6)
                {
                    $("#no_"+val).hide();
                }
                if(val==7)
                {
                    $("#no_"+val).hide();
                }
           

            $.ajax({
              
             url:base_url+'index.php/manage_plans/box_show',
             data:{num:val},
             dataType: "html",
             type: "POST",
             success: function(data){
//alert();

              $("#more_paper_"+id).html(data);
              $("#more_paper_"+id).show();

                 
                
              }
             });

    }

    function hiding_out(val)
    {
   
          var current_div=val-1;          
          $("#more_paper_"+current_div).html('');
          $("#more_paper_"+current_div).hide();
      
    }
   </script> 


   <!-- <script>
          $(".checkbox").change(function() {
          if(this.checked) {
            var q_id=$(this)
              //Do stuff
          }
         });
         </script>   -->      

         <script type="text/javascript">
           
function get_time(value) {
  alert(value);
  
}

         </script>