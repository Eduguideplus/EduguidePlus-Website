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
        EXAM-TYPE ADD
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_exam_type/group_insert" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
         


              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Group Name<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

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
                  <label for="sub_name" class="col-sm-2 control-label">Group Icon (226 X 70 pixel)<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="file" name="cat_icon" id="cat_icon" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div>


                  <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Group Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <textarea type="text" name="description" id="description" class="form-control " ></textarea>
                    
                  </div>
                 
              </div>

                 <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Detail Group Description</label>

                  <div class="col-sm-9">
                    <textarea type="text" name="detail_description" id="detail_description" class="form-control " ></textarea>
                    
                  </div>
                 
              </div>


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
                <a href="<?php echo base_url();?>index.php/manage_exam_type/group_view" class="btn btn-danger">Cancel</a>
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

            