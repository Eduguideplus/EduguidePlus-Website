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
       Edit Marks
       

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
              <!-- <h3 class="box-title">POST ADD</h3> -->
              <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" name="form" action="<?php echo base_url(); ?>index.php/negative_mark/mark_update" method="post" enctype="multipart/form-data" id="buyerAdd_form_validation">
              <div class="box-body">
                 
                <div class="form-group">
                  <label for="test_type" class="col-sm-2 control-label">Test Type:</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="test_type" id="test_type" value="<?php echo $test[0]->test_name;?>" readonly>
                    </div>
                   </div>

   
                 <input type="hidden" name="exam_id" value="<?php echo $this->uri->segment(3); ?>">


                          <div class="form-group">
                  <label for="neg_mark" class="col-sm-2 control-label">Negative Mark:</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="neg_mark" id="neg_mark" value="<?php echo $mark[0]->negative_marks;?>">
                    </div>
                  </div>
               
                
                 
                 
               

             <!-- <span style="color: rgb(255, 0, 0); padding-left: 2px;">* Fields are Required</span> -->
              <!-- /.box-body -->
            <div class="box-footer">
                <!-- <a href="<?php echo base_url();?>index.php/manage_buyer/buyer_view" class="btn btn-danger">Cancel</a> -->
                <button type="submit" class="btn btn-info pull-right" onclick="">Update</button>
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
 <script src="<?php echo base_url();?>plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.multiselect.js"></script>
             

   <script>
   function buyer_Submit_fm()
    {



        var buyer_name = $('#buyer_name').val();
        if (!isNull(buyer_name)) 
        {
          $('#buyer_name').removeClass('black_border').addClass('red_border');
        
        } 
        else 
        {
          $('#buyer_name').removeClass('red_border').addClass('black_border');
        }

        
        var buyer_account = $('#buyer_account').val();
        if (!isNull(buyer_account)) 
        {
          $('#buyer_account').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#buyer_account').removeClass('red_border').addClass('black_border');
        }

        var order_date = $('#order_date').val();
        if (!isNull(order_date)) 
        {
          $('#order_date').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#order_date').removeClass('red_border').addClass('black_border');
        }

    }

    function form_validation()
    {
        //alert("ok");

        $('#buyerAdd_form_validation').attr('onchange', 'buyer_Submit_fm()');
        $('#buyerAdd_form_validation').attr('onkeyup', 'buyer_Submit_fm()');

        buyer_Submit_fm();
        //alert($('#contact_form .red_border').size());

        if ($('#buyerAdd_form_validation .red_border').size() > 0)
        {
            $('#buyerAdd_form_validation .red_border:first').focus();
            $('#buyerAdd_form_validation .alert-error').show();
            return false;
        } 
        else 
        {

            $('#buyerAdd_form_validation').submit();
        }
    }
     
   </script>              
                 
     <style>
.error {color: #FF0000;}
</style>      



<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prof_pic')
                    .attr('src', e.target.result)
                    .width(90)
                    .height(90);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>