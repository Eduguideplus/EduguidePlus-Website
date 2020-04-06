

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
        SET PATTERN ADD
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_set/insert_pattern" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
             

              <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Exam Type<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <select  name="exam_type_id" id="exam_type_id" class="form-control" onchange="get_exam(this.value)">
                    <option value="">Select Exam Type</option>
                    <?php foreach($type as $typ){?>
                      <option value="<?php echo $typ->id; ?>"><?php echo $typ->exam_name; ?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Exam Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <select  name="exam_id" id="exam_id" class="form-control">
                   <option value="">Select Exam Name</option>
                    </select>
                    
                  </div>
                 
              </div>


               <!-- <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Section Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
               
                  <div class="col-sm-9">
                    <select  name="section_id" id="section_id" class="form-control">
                   <option value="">Select Section Name</option>
                   <?php foreach($section as $sec){?>
                    <option value="<?php echo $sec->id; ?>"><?php echo $sec->section_name; ?></option>
                    <?php } ?>
                    </select>
                    
                  </div>
                 
                             </div>
               
               
                             <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Quantity(No. of Question)<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
               
                  <div class="col-sm-9">
                    <input type="text"  name="qty" id="qty" class="form-control">
                    
                    
                  </div>
                 
                 </div> -->

  <?php if(count($section)>0){

    for($i=1;$i<=count($section);$i++){
    ?>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label"><?php if($i==1){ echo 'Section Name'; }?></label>
               
                  <div class="col-sm-4">
                    <select  name="section_id[]" id="section_id_<?php echo $i;?>" class="form-control chk_duplicate" onchange="chk_duplicate(this.value,'<?php echo $i;?>')">
                   <option value="">Select Section Name</option>
                   <?php foreach($section as $sec){?>
                    <option value="<?php echo $sec->id; ?>"><?php echo $sec->section_name; ?></option>
                    <?php } ?>
                    </select>
                    
                  </div>
                  <input type="hidden" value="" id="hidden_sec_id" >
                   <label for="" class="col-sm-2 control-label"><?php if($i==1){ echo 'Quantity(No. of Question)'; }?></label>
                  <div class="col-sm-3">
                    <input type="text"  name="qty[]" id="qty" class="form-control">
                    
                    
                  </div>
                 
                </div>
               
   <?php } }?>            
                <!-- <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Quantity(No. of Question)<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                               
                  <div class="col-sm-9">
                    <input type="text"  name="qty" id="qty" class="form-control">
                    
                    
                  </div>
                 
                </div> -->




              <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Status<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <select  name="status" id="status" class="form-control">
                   <option value="active" selected>Active</option>
                   <option value="inactive">Inactive</option>
                    </select>
                    
                  </div>
                 
              </div>

             


              

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_set/view_pattern" class="btn btn-danger">Cancel</a>
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
  function chk_duplicate(value,id)
  {
     
      var id = value;
     
      var hidden_id = $('#hidden_sec_id').val();
      var array2 = hidden_id.split(",");
      for(var i=0;i<array2.length;i++)
      {
        if(id==array2[i])
        {
          alert('already selected');
          //$('#section_id_'+id).focus();
         
        }

      }
      var array1 = [];
      array1.push(id);
      array1.toString();
      //alert(array1);
      if(hidden_id=='')
      {
         var str = array1;
      }
      else
      {
        var str = hidden_id+','+array1;
      }
      
      $('#hidden_sec_id').val(str);
      

  }



  </script>

  <script>
  function validation()
  {
    var exam_type_id = $('#exam_type_id').val();
      if (!isNull(exam_type_id)) {
        $('#exam_type_id').removeClass('black_border').addClass('red_border');
      } else {
        $('#exam_type_id').removeClass('red_border').addClass('black_border');
      }

      var exam_id = $('#exam_id').val();
      if (!isNull(exam_id)) {
        $('#exam_id').removeClass('black_border').addClass('red_border');
      } else {
        $('#exam_id').removeClass('red_border').addClass('black_border');
      }


       var section_id = $('#section_id').val();
      if (!isNull(section_id)) {
        $('#section_id').removeClass('black_border').addClass('red_border');
      } else {
        $('#section_id').removeClass('red_border').addClass('black_border');
      }

      var qty = $('#qty').val();
      if (!isNull(qty)) {
        $('#qty').removeClass('black_border').addClass('red_border');
      } else {
        $('#qty').removeClass('red_border').addClass('black_border');
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

            