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
        BATCH ADD
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_batch/insert" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
              <div id="all_sub">
              <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Partner<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <select name="faculty" id="faculty" class="form-control">
                      <option value="">Select Partner</option>
                      <?php 
                      foreach($faculty_details as $row)
                        {
                          ?>
                          <option value="<?php echo $row->id;?>"><?php echo $row->user_name;?></option>
                          <?php
                        }
                        ?>
                    </select>
                    
                  </div>
                </div>
      <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Batch Country<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <select class="form-control" id="country" onchange="get_state_by_country(this.value)" name="country">
            
              <option value="">Select Country </option>
              <?php
              foreach($country as $row)
              {
                ?>
              <option value="<?php echo $row->id; ?>"><?php echo $row->name ; ?></option>
              <?php
            }
            ?>
            </td>

               </select>
                    
                  </div>
                </div>
                <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Batch State<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <select class="form-control" onchange="get_city(this.value)" id="state" name="state">
            
              <option value="">Select State </option></td>
               </select>
                    
                  </div>
                </div>

                <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Batch City<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                      <td>
            <select class="form-control" id="city" name="city">
            
              <option value="">Select City </option></td>
               </select>
                    
                  </div>
                </div>

                <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Batch Year<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <select name="batch_year" id="batch_year" class="form-control">
                      <option value="">Select Batch Year</option>
                      <?php 
                        for($i=2021; $i >= date('Y') ; $i--){
                        // echo "<option >$i</option>";
                          ?>
                          <option value="<?php echo $i;?>"><?php echo $i;?></option>
                          <?php
                        }
                        ?>

                    </select>
                    
                  </div>
                </div>

                <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Batch Month<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <select name="batch_month" id="batch_month" class="form-control">
                      <option value="">Select Batch Month</option>
                      <?php

                      for ($i = 1; $i <= 12; $i++)
                      {
                          $month_name = date('F', mktime(0, 0, 0, $i, 1, 2019));
                          // echo '<option value="'.$month_name.'"'.$month_name.'></option>';
                      ?>
                      <option value="<?php echo $i;?>"><?php echo $month_name;?></option>
                      <?php
                    }
                    ?>
                    </select>
                    
                  </div>
                </div>

                <div class="form-group sublst" id="sub1">
                  <label for="" class="col-sm-2 control-label">Batch Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-6">
                    <textarea id="batch_description" name="batch_description" class="form-control"></textarea>
                    
                  </div>
                </div>

            </div>

             </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_batch/batch" class="btn btn-danger">Cancel</a>
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
   
      var faculty = $('#faculty').val();
      if (!isNull(faculty)) {
        $('#faculty').removeClass('black_border').addClass('red_border');
      } else {
        $('#faculty').removeClass('red_border').addClass('black_border');
      }

      var batch_city = $('#batch_city').val();
      if (!isNull(batch_city)) {
        $('#batch_city').removeClass('black_border').addClass('red_border');
      } else {
        $('#batch_city').removeClass('red_border').addClass('black_border');
      }

      var batch_year = $('#batch_year').val();
      if (!isNull(batch_year)) {
        $('#batch_year').removeClass('black_border').addClass('red_border');
      } else {
        $('#batch_year').removeClass('red_border').addClass('black_border');
      }

      var batch_month = $('#batch_month').val();
      if (!isNull(batch_month)) {
        $('#batch_month').removeClass('black_border').addClass('red_border');
      } else {
        $('#batch_month').removeClass('red_border').addClass('black_border');
      }

      var batch_description = $('#batch_description').val();
      if (!isNull(batch_description)) {
        $('#batch_description').removeClass('black_border').addClass('red_border');
      } else {
        $('#batch_description').removeClass('red_border').addClass('black_border');
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

  <script type="text/javascript">
  function get_state_by_country(country_id)
  {
   
    var base_url='<?php echo base_url();?>';
  
         $.ajax(
            { 
                  type: "POST",
                 dataType:'json',  
                 url:base_url+"index.php/manage_batch/get_state_by_country",
                 data: {country_id:country_id},
       
        success: function(data)
         { 
           // console.log(data.dist_list);
            var html_string='<option value=""> Select State </option>';
              
                var state_list=data.state_list;
                var i=0;
                var k=0;
              
                  for(i=0;i<state_list.length;i++){
                    if(state_list[i].name)
                    {
                    
                  html_string+='<option value="'+state_list[i].id+'">'+state_list[i].name+'</option>';
                  
                } 

             }
              
            $("#state").html(html_string);

             $("#city").html('<option value=""> Select City </option>');
                      
                  
  
      }  
  });
  }
</script>
<script type="text/javascript">
  function get_city(state_id)
   {
    
      var base_url='<?php echo base_url();?>';
  
         $.ajax(
            { 
                  type: "POST",
                 dataType:'json',  
                 url:base_url+"index.php/manage_batch/get_city_by_state",
                 data: {state_id:state_id},
       
        success: function(data)
         { 

        //  alert(data.state_list[0].state_name);
           
           // console.log(data.dist_list);

            var html_string='<option value=""> Select City </option>';
              
                var city_list=data.city_list;
                var i=0;
                var k=0;
              
                  for(i=0;i<city_list.length;i++){
                    if(city_list[i].name)
                    {
                    
                  html_string+='<option value="'+city_list[i].id+'">'+city_list[i].name+'</option>';
                  
                }  }     
                    //alert(html_string);
              
            $("#city").html(html_string);
                      
                  
  
      }  
  });
   }
</script>



 

            