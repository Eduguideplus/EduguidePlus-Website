<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <!--<script>tinymce.init({ selector:'textarea' });</script>-->
  <script type="text/javascript">
    tinymce.init({
      selector: ".tinyarea",
      theme: "modern",
      readonly: 1,
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
       BATTERY DETAILS
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
              <h3 class="box-title">Battery Details</h3>
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/battery_product/view" method="post" id="bookadd" enctype="multipart/form-data">
              <div class="box-body">

              <div class="form-group">
                  <label for="product_type" class="col-sm-2 control-label">Product Type</label>

                  <div class="col-sm-6">
                  <input type="text" name="brand" id="brand" class="form-control"  value="2 Wheeler Batteries" readonly>
                  <span id="error_brand" style="color:red"></span>
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="make" class="col-sm-2 control-label">Manufacturer</label>

                  <div class="col-sm-6">
                  <input type="text" name="brand" id="brand" class="form-control"  value="TVS" readonly>
                  <span id="error_brand" style="color:red"></span>
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="model" class="col-sm-2 control-label">Model</label>

                  <div class="col-sm-6">
                  <input type="text" name="brand" id="brand" class="form-control"  value="TVS Apache RTR-ES" readonly>
                  <span id="error_brand" style="color:red"></span>
                  </div>
                 
                </div>
             
              <div class="form-group">
                  <label for="brand" class="col-sm-2 control-label">Brand</label>

                  <div class="col-sm-6">
                  
                  <input type="text" name="brand" id="brand" class="form-control"  value="Exide" readonly>
                 <span id="error_brand" style="color:red"></span>
                  </div>
                 
                </div>

        <div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Product Image</label>

                  <div class="col-sm-6">
                  <img src="<?php echo base_url();?>../assets/images/b-3.jpg" height="100" width="100">
                   
                     <span id="error_image" style="color:red"></span>
                  </div>
                 
                </div>


<div class="form-group">
                  <label for="price" class="col-sm-2 control-label">Title<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                   <input type="text" name="price" class="form-control" id="price" value="Hankook Sport Tubeless" readonly>
                     <span id="error_price" style="color:red"></span>
                  </div>
                 
                </div>
                

        <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">Price</label>

                  <div class="col-sm-6">
                   <input type="text" name="price" class="form-control" id="price" value="22,390" readonly="">
                     <span id="error_price" style="color:red"></span>
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="Discount" class="col-sm-2 control-label">Discount</label>

                  <div class="col-sm-4">
                   <input type="text" name="Discount" class="form-control" id="Discount" value="19.1" readonly="">
                     <span id="error_price" style="color:red"></span>
                  </div>%
                 
                </div>

                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-6">
                   <textarea name="description" class="tinyarea" id="description" >As the name suggests, AC Delco sealed maintenance free batteries come factory sealed which makes them maintenance free. These batteries offer high performance and long life at the most affordable prices. These batteries also have a built in hydrometer.</textarea>
                     <span id="error_desc" style="color:red"></span>
                  </div>
                 
                </div>

                 <div class="form-group">
                  <label for="feature" class="col-sm-2 control-label">Features</label>

                  <div class="col-sm-6">
                   <textarea name="feature" class="tinyarea" id="feature" >- Built in hydrometer- Indicates state of charge.
                    - Factory-sealed- Makes these batteries maintenance free.
                    - Polypropylene case- Made from strong durable material, can withstand road shock and vibration.
                    - Liquid-gas separator area- Returns liquid to reservoir for longer life.</textarea>
                     <span id="error_desc" style="color:red"></span>
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="warrenty" class="col-sm-2 control-label">Warrenty</label>

                  <div class="col-sm-6">
                   <textarea name="warrenty" class="tinyarea" id="warrenty" >Warranty: 60 Months(30 Months Free Of Cost + 30 Months Months Pro Rata)</textarea>
                     <span id="error_speci" style="color:red"></span>
                  </div>
                 
                </div>

                <div class="form-group">
                  <label for="rec" class="col-sm-2 control-label">Recommended For</label>

                  <div class="col-sm-6">
                   <textarea name="rec" class="tinyarea" id="rec" >Mercedes Benz E Class E280 ,Mercedes Benz C200 CDi Petrol,Mercedes Benz M Class ML320 Diesel,Mercedes Benz New M Class ML 350 Petrol,Mercedes Benz GL Class 350 Diesel,Mercedes Benz S Class S500,Mercedes Benz E350 Cabriolet,Mercedes C Class C 200 CDI,Mercedes Benz E Class E250 Diesel,Mercedes Benz S Class 350 Diesel,Mercedes Benz S Class S350 L Petrol,BMW X5 xDrive30d ,BMW 5 Series 520i Petrol,BMW 5 Series 520d Diesel</textarea>
                     <span id="error_speci" style="color:red"></span>
                  </div>
                 
                </div>

          

                <div class="form-group">
                  <label for="inputUsername" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-6">
                  <input type="text" class="form-control" value="Active" readonly>
                    
                    <span id="error_status"></span>
                  </div>
                  
                </div>
               
                
                
              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/battery_product/view" class="btn btn-danger fa fa-backward"> <b>Back</b></a>
                
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
<script src="<?php echo base_url();?>custom_script/validation_form.js"></script>
<script>
/* function addbook_form_validation()
  {
  
   
    var book_img = $("#book_img").get(0).files.length;

      if(book_img=='')
      {
        $('#book_img').removeClass('black_border').addClass('red_border');
      }
		
      else{
        $('#book_img').removeClass('red_border').addClass('black_border');
      }

  }*/
    


  </script>

            