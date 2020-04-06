
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            menubar: "edit insert tools",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            toolbar1: "undo redo | styleselect | bold italic| forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | link preview",
            
            image_advtab: true,
            extended_valid_elements : "span[*],i[*]",
            relative_urls : false,
            remove_script_host : false,
            convert_urls : true
        });
    </script>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
       EDIT HIGHLIGHT AREA
        
        
      </h3>
      
    </section>

   

 
<section class="content">
      <div class="row">
        <!-- left column -->
        
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
          <div class="box-header with-border">
             
              <div id="validation" style="color:red;"></div>
            </div>
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/Highlight_area/update" method="post" id="add_page" enctype='multipart/form-data'>
           
            
              <div class="box-body">
          
                <div class="form-group">
                  <label for="meta_descpn" class="col-sm-2 control-label">Highlight Area</label>

                  <div class="col-sm-9">
                     <textarea id="area"  name="area"  class="form-control" style="height:100px"><?php echo $area_details[0]->area_content;?></textarea>
                  </div>

                  <input type="hidden" name="highlight_area_id" value="<?php echo $area_details[0]->highlight_area_id;?>">
                 
                </div>



               
                
              </div>
              <div class="box-footer">
                <a href="<?php echo base_url(); ?>index.php/Highlight_area/" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return add_validation()" >Update</button>
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

<!--</div>-->

<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>

<script type="text/javascript">
  function add_validation()
  {
    
  }
</script>



