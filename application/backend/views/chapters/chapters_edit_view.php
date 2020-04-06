<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <!--<script>tinymce.init({ selector:'textarea' });</script>-->
  <script type="text/javascript">
    tinymce.init({
      selector: ".tinyarea",
      theme: "modern",
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
        CHAPTER EDIT
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_chapters/update" method="post" id="edit" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>


               <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Groups:<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <select name="parent_cat" id="parent_cat" class="form-control"  onchange="get_exam_name(this.value)">
                    <option value="">Select</option>
                     <?php

                      foreach($parent_exam_type as $row){
                      ?>
                      <option value="<?php echo $row->id; ?>" <?php if($row->id==$edit_group_id){ echo 'selected'; } ?>><?php echo $row->exam_name; ?></option>
                      <?php
                        }
                      ?>

                    </select>
                    
                </div>
                 
              </div> 


              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Exam Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                 <select name="exam_name" id="exam_name" class="form-control" onchange="get_subject_name(this.value)" >
                    <option value="">Select</option>
                     <?php
                     foreach($examList as $res)
                      {
                        ?>
                        <option value="<?php echo $res->id; ?>" <?php if($res->id==$edit_exam_id){ echo 'selected'; } ?>><?php echo $res->exam_name; ?></option>
                        <?php
                      }
                      ?>

                    </select>
                    
                  </div>
                 
              </div>
               
             
            
            

              <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Subject Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
             
                  <div class="col-sm-9">
                    <select name="sub_name" id="sub_name" class="form-control">
                      <option value="">Select Subject</option>
                      <?php foreach($subjects as $sub){?>
                       <option value="<?php echo $sub->id; ?>" <?php if($chapters[0]->sub_id==$sub->id){echo 'selected';}?>><?php echo $sub->section_name; ?></option>
                       <?php } ?>
                    </select>
                  
                    
                  </div>
                 
              </div> 
               
             

            

              <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Chapter Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="chap_name" id="chap_name" class="form-control" placeholder="Name of the Chapter" value="<?php echo @$chapters[0]->chap_name; ?>" >
                    
                  </div>
                 
              </div>


                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Chapter Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <textarea  name="chap_descpn" id="chap_descpn" class="form-control tinyarea" required="true"><?php echo @$chapters[0]->chap_descpn; ?></textarea>
                    
                  </div>
                 
              </div>


              <input type="hidden" value="<?php echo @$chapters[0]->chap_id;?>" name="edit_id" >


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
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>


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
  function validation()
  {
   var chap_name = $('#chap_name').val();
      if (!isNull(chap_name)) {
        $('#chap_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#chap_name').removeClass('red_border').addClass('black_border');
      }
        

      
  }
  function form_validation()
  {
  

    $('#edit').attr('onchange', 'validation()');
    $('#edit').attr('onkeyup', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#edit .red_border').size() > 0)
    {
      $('#edit .red_border:first').focus();
      $('#edit .alert-error').show();
      return false;
    } else {

      $('#edit').submit();
    }

  }

  </script>

            