<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <!--<script>tinymce.init({ selector:'textarea' });</script>-->
  <script type="text/javascript">
  tinymce.init({
    selector: ".tinyarea",
    theme: "modern",
    height:"100px",
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
</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CHAPTER ADD
        
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
              <!-- <h3 class="box-title">COMPANY ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_chapters/insert" method="post" id="passage_add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>



                  <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Groups:<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-6">
                    <select name="parent_cat" id="parent_cat" class="form-control"  onchange="get_exam_name(this.value)">
                    <option value="">Select</option>
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
                  <label for="cat_name" class="col-sm-2 control-label">Exam Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                 <select name="exam_name" id="exam_name" class="form-control" onchange="get_subject_name(this.value)" >
                    <option value="">Select</option>
                     

                    </select>
                    
                  </div>
                 
              </div>



                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Subject Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <select name="sub_name" id="sub_name" class="form-control" >
                      <option value="">Select Subject</option>
                      <?php foreach($subjects as $sub){?>
                       <option value="<?php echo $sub->id; ?>"><?php echo $sub->section_name; ?></option>
                       <?php } ?>
                    </select>
                  
                    
                  </div>
                 
              </div>
               
             

             <div id="all_chap">
              <div class="chaplst">
              <div class="form-group ">
                  <label for="" class="col-sm-2 control-label">Chapter Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <input type="text" name="chap_name[]" id="chap_name1" class="form-control chapt" placeholder="Name of the Chapter" value="" >
                    
                  </div>

                    <div class="col-sm-2" id="action1">
                    <a href="javascript:void(0)" id="add1" class="btn btn-primary" style="margin-right:5px;" onclick="get_next_subject('1')">+</a>
                   
                    
                  </div>
                 
              </div>


                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Chapter Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <textarea  name="chap_descpn[]" id="chap_descpn1" class="form-control tinyarea chaptdesc" required="true"></textarea>
                    
                  </div>
                 
              </div>

            </div>

            </div>

             


              <!-- <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>
              
                  <div class="col-sm-9">
                    <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                    </select>
                    
                  </div>
                 
              </div> -->

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_chapters/view" class="btn btn-danger">Cancel</a>
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
                    url:"<?php echo base_url();?>index.php/manage_chapters/get_subject",
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
          var html='<option value="">Select</option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/manage_section/get_exam",
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
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>

<script>
  function get_next_subject(qty)
  {
    var next=parseFloat(qty)+1;
    var node='<div class="chaplst"  id="chap'+next+'"><div class="form-group "><label for="" class="col-sm-2 control-label">Chapter Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label><div class="col-sm-6"><input type="text" name="chap_name[]" id="chap_name'+next+'" class="form-control chapt" placeholder="Name of the Chapter" value="" ></div><div id="action'+next+'"> <a href="javascript:void(0)" id="add'+next+'" class="btn btn-primary" style="margin-right:5px;" > + </a><a href="javascript:void(0)" id="delete'+next+'" style="margin-left:5px;" class="btn btn-danger">-</a></div></div><div class="form-group"><label for="" class="col-sm-2 control-label">Chapter Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label><div class="col-sm-6"><textarea  name="chap_descpn[]" id="chap_descpn1" class="form-control tinyarea chaptdesc" required="true"></textarea></div></div></div>';


    $("#all_chap").append(node);
    $("#add"+qty).remove();

    $("#add"+next).attr("onclick","get_next_subject('"+next+"')");
    $("#delete"+next).attr("onclick","delete_current_subject('"+next+"')");

  }


    function delete_current_subject(current)
  {
      $("#chap"+current).remove();
      var numItems = $('.chaplst').length;
      /*var before=parseFloat(current)-1;
      var node='<a href="javascript:void(0)" id="add'+before+'" class="btn btn-primary" style="margin-right:5px;">+</a>';
      $("#action"+before).append();
      $("#add"+before).attr("onclick","get_next_subject('"+before+"')");*/

      if(numItems==1)
      {
        var node='<a href="javascript:void(0)" id="add1" class="btn btn-primary" style="margin-right:5px;" >+</a>';
        $("#action1").append(node);
        $("#add1").attr("onclick","get_next_subject('1')");
        
      }

       if(numItems==current)
      {

      var before=parseFloat(current)-1;
      var node='<a href="javascript:void(0)" id="add'+before+'" class="btn btn-primary" style="margin-right:5px;">+</a>';
      $("#action"+before).append();
      $("#add"+before).attr("onclick","get_next_subject('"+before+"')");


      }


  }

  /*function delete_current_subject(current)
  {
      $("#sub"+current).remove();
      var numItems = $('.sublst').length;
    

      if(numItems==1)
      {
        var node='<a href="javascript:void(0)" id="add1" class="btn btn-primary" style="margin-right:5px;" >+</a>';
        $("#action1").append(node);
        $("#add1").attr("onclick","get_next_subject('1')");
        
      }

       if(numItems==current)
      {

      var before=parseFloat(current)-1;
      var node='<a href="javascript:void(0)" id="add'+before+'" class="btn btn-primary" style="margin-right:5px;">+</a>';
      $("#action"+before).append();
      $("#add"+before).attr("onclick","get_next_subject('"+before+"')");


      }


  }*/
</script>



  <script>
  function validation()
  {


     var parent_cat = $('#parent_cat').val();
      if (!isNull(parent_cat)) {
        $('#parent_cat').removeClass('black_border').addClass('red_border');
      } else {
        $('#parent_cat').removeClass('red_border').addClass('black_border');
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


      //var chap_len=$(".chapt").length;

      $('.chapt').each(function () { 

        
 var chap_name = $(this).val();


      var chap_name = $(this).val();
      if (!isNull(chap_name)) {
        $(this).removeClass('black_border').addClass('red_border');
      } else {
        $(this).removeClass('red_border').addClass('black_border');
      } 
        

  
});

       

      

      
  }
  function form_validation()
  {
  
   
    $('#passage_add').attr('onchange', 'validation()');
    $('#passage_add').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#passage_add .red_border').size() > 0)
    {
      $('#passage_add .red_border:first').focus();
      $('#passage_add .alert-error').show();
      return false;
    } else {

      $('#passage_add').submit();
    }

  }

  </script>

            