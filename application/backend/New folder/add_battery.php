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
       ADD NEW BATTERY
        
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
              <h3 class="box-title">ADD NEW BATTERY</h3>
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/battery_product/view" method="post" id="form" enctype="multipart/form-data">
              <div class="box-body">

              <div class="form-group">
                  <label class="col-sm-3 control-label">Product Type<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                  <select class="form-control" id="p_type" onchange="get_make_by_type(this.value); get_brand_by_type(this.value);">
                   <option value="">-Select Product Type-</option>
                      <?php
                        foreach($product_type as $row)
                          {
                            ?>
                            <option value="<?php echo $row->pro_type_id; ?>"><?php echo $row->pro_type_name; ?></option>
                            <?php
                          }
                          ?>
                  </select>
                   
                     <span id="error_product_type" style="color:red"></span>
                  </div>
                 
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Manufacturer<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                  <select class="form-control" id="make" name="make">
                    <option value="">-Select Manufacturer-</option>
                    
                  </select>
                   
                     <span id="error_make" style="color:red"></span>
                  </div>
                 
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Model<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                  <select class="form-control" id="model" name="model">
                    <option value="">Select A Model</option>
                    
                  </select>
                   
                     <span id="error_model" style="color:red"></span>
                  </div>
                 
                </div>

              <div class="form-group">
                  <label class="col-sm-3 control-label"> Battery Brand<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                  <select class="form-control" id="brand" name="brand">
                    <option value="">-Select Brand-</option>
                  </select>
                   
                     <span id="error_brand" style="color:red"></span>
                  </div>
                 
                </div>

                

                
             
              

				        <div class="form-group">
                  <label for="image" class="col-sm-3 control-label">Image(270x330 px)<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                   <input type="file" name="image" class="form-control" id="image" >
                     <span id="error_image" style="color:red"></span>
                  </div>
                 
                </div>


                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">Title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                   <input type="text" name="price" class="form-control" id="title" placeholder="Enter Battery Title">
                     <span id="error_title" style="color:red"></span>
                  </div>
                 
                </div>
                

				      <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">Price<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                   <input type="text" name="price" class="form-control" id="price" placeholder="Enter The Battery Price">
                     <span id="error_price" style="color:red"></span>
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="Discount" class="col-sm-3 control-label">Discount</label>

                  <div class="col-sm-4">
                   <input type="text" name="Discount" class="form-control" id="Discount" placeholder="Enter The Discount Percentage">
                     <span id="error_discount" style="color:red"></span>
                  </div>%
                 
                </div>

                <div class="form-group">
                  <label for="description" class="col-sm-3 control-label">Description</label>

                  <div class="col-sm-6">
                   <textarea name="description" class="tinyarea" rows="10" cols="96" id="description" ></textarea>
                     <span id="error_desc" style="color:red"></span>
                  </div>
                 
                </div>

                 <div class="form-group">
                  <label for="feature" class="col-sm-3 control-label">Features</label>

                  <div class="col-sm-6">
                   <textarea name="feature" class="tinyarea" id="feature" rows="10" cols="96"></textarea>
                     <span id="error_desc" style="color:red"></span>
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="warrenty" class="col-sm-3 control-label">Warrenty</label>

                  <div class="col-sm-6">
                   <textarea name="warrenty" class="tinyarea" id="warrenty" rows="10" cols="96"></textarea>
                     <span id="error_speci" style="color:red"></span>
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="rec" class="col-sm-3 control-label">Recommended For</label>

                  <div class="col-sm-6">
                   <textarea name="rec" class="tinyarea" id="rec" rows="10" cols="96"></textarea>
                     <span id="error_speci" style="color:red"></span>
                  </div>
                 
                </div>

				      

                

                <div class="form-group">
                  <label for="inputUsername" class="col-sm-3 control-label">Status</label>

                  <div class="col-sm-6">
                    <select class="form-control" name="status" id="stats">
                   
                    <option value="active" selected>Active</option>
                    <option value="inactive">Inactive</option>
                    </select>
                    <span id="error_status"></span>
                  </div>
                  
                </div>
               
                <span style="color: rgb(255, 0, 0); padding-left: 2px;">* fields are required</span>
                
              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/battery_product/view" class="btn btn-danger fa fa-backward"> <b>Back</b></a>
                <button type="submit" class="btn btn-info pull-right" onclick="return battery_validation()"><b>Submit</b></button>
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
<script>
  function get_make_by_type(value)
  {
    //alert(value);

     var base_url='<?php echo base_url(); ?>';
   
    var dataString = 'type=' + value;
    $.ajax(
        {

            type: "POST",
            dataType: 'json',
            url: base_url + "index.php/battery_product/get_make_by_type",
            data: dataString,
            async: false,
            success: function (data) { 


                 

              console.log(data.make);
                 
               var html_string = '<option value="">Select Manufacturer</option>';
                // console.log(data.area);
                var make_list = data.make;
                var i = 0;
                var k = 0;
               
                for (i = 0; i < make_list.length; i++) {

                    html_string += '<option value="' + make_list[i].battery_make_id + '">' + make_list[i].battery_make_name + '</option>';

                }
                
                $("#make").html(html_string);

               


            }
          
            
        });
          
  }



function get_brand_by_type(value)
  {
    //alert(value);

     var base_url='<?php echo base_url(); ?>';
   
    var dataString = 'type=' + value;
    $.ajax(
        {

            type: "POST",
            dataType: 'json',
            url: base_url + "index.php/battery_product/get_brand_by_type",
            data: dataString,
            async: false,
            success: function (data) {
               
              
               console.log(data.brand);
               
                var html_string = '<option value="">Select Brand</option>';
                // console.log(data.area);
                var brand_list = data.brand;
                var i = 0;
                var k = 0;

                for (i = 0; i < brand_list.length; i++) {

                    html_string += '<option value="' + brand_list[i].battery_brand_id + '">' + brand_list[i].battery_brand_name + '</option>';

                }
                
                $("#brand").html(html_string);


            }
            
        });
  }

</script>
            