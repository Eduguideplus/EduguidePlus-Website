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
        CUSTOMARIZED-PLANS EDIT
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_plans/update" method="post" id="add" >
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
             
               <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Test Type <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <select name="test_type" id="test_type" class="form-control" disabled>
                      <option value="">Select Test Type</option>
                      <?php foreach($test_type as $tt){
                          if($tt->test_id!=2)
                          {

                           



                        ?>
                      <option value="<?php echo @$tt->test_id;?>" <?php if(@$view[0]->test_type_id==$tt->test_id){ echo 'selected'; }?>><?php echo @$tt->test_name;?></option>
 
                      <?php } } ?>
                    </select>
                    
                  </div>
                 
              </div>
             
              <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Plan Name <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                   <!--  <input type="text" name="plan_name" id="plan_name" class="form-control" placeholder="" value=""> -->
                    <input type="text" name="plan_name" id="plan_name" class="form-control" placeholder="" value="<?php echo @$view[0]->plan_title;?>">
                    
                  </div>
                 
              </div>

             <!--  <div class="form-group">
                 <label for="class" class="col-sm-2 control-label">Plan Cost <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
             
                 <div class="col-sm-8">
                   <input type="text" name="plan_cost" id="plan_cost" class="form-control" placeholder="" value="">
                   
                 </div>
                
             </div> -->

               <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Plan Duration (Month)<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="plan_duration" id="plan_duration" class="form-control" placeholder="" value="<?php echo @$view[0]->plan_month_duration;?>">
                    
                  </div>
                 
              </div>

              

              <!-- <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">No Of Company<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
              
                  <div class="col-sm-8">
                    <input type="text" name="no_of_company" id="no_of_company" class="form-control" placeholder="" value="">
                    
                  </div>
                 
              </div> -->
              <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Price / Test<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="price_per_test" id="price_per_test" class="form-control" placeholder="" value="<?php echo @$view[0]->price_per_set;?>">
                    
                  </div>

<input type="hidden" name="edit_id" value="<?php echo @$view[0]->id;?>" >
<input type="hidden" name="hid_test_type_id" value="<?php echo @$view[0]->test_type_id;?>" >

              <!-- <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Paper / Company<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
              
                  <div class="col-sm-7">
                    <input type="text" name="plan_per_company[]" id="plan_per_company" class="form-control" placeholder="" value="">
                    
                  </div>
              
                   <table>
                          <tr>
                              <td>
                                  <a href="javacript:void(0)" class="btn btn-primary" id="no2" onclick="multiple_paper_per_company('2')"><b>+</b></a></td>
                              <td>
                                  <a href="javacript:void(0)" class="btn btn-primary" id="minus" onclick="hiding_out('2');"><b>-</b></a></td>
                          </tr>
                      </table>
                 
              </div> -->

                  <div id="more_paper_2"></div>
                  <div id="more_paper_3"></div>
                  <div id="more_paper_4"></div>

              

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_plans/view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()">Update</button>
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
    
     

    var plan_name = $('#plan_name').val();
      if (plan_name == 0) {
        $('#plan_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#plan_name').removeClass('red_border').addClass('black_border');
      }
     
      var plan_duration = $('#plan_duration').val();
      if (!isNull(plan_duration)) {
        $('#plan_duration').removeClass('black_border').addClass('red_border');
      } else {
        $('#plan_duration').removeClass('red_border').addClass('black_border');
      }

      var price_per_test = $('#price_per_test').val();
      if (!isNull(price_per_test)) {
        $('#price_per_test').removeClass('black_border').addClass('red_border');
      } else {
        $('#price_per_test').removeClass('red_border').addClass('black_border');
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