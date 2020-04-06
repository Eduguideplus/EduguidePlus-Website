
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
        
       ADD PAYMENT PAGE
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Add Payment Page</li>    
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////-->
      <div class="row">
        
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Add Slider</h3> -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <div style="padding-left: 12px;"><?php echo $this->session->flashdata('msg'); ?></div>
            
            <form id="pre_payment_form_validation" name="form" class="form-horizontal" action="<?php echo base_url();?>index.php/manage_rm/insert_paid_amount" method="post" enctype='multipart/form-data'>

           
<?php $sub_price=0;
for($i=0; $i<count(@$question_price); $i++) { 
   
   $sub_price=$sub_price+@$question_price[$i]->price_per_question;
 } 

 $paid_price=0;
for($i=0; $i<count(@$subadmin); $i++) { 
   
   $paid_price=$paid_price+@$subadmin[$i]->paid_amount;
 } 

 ?>
              <div class="form-group">
                  <label for="payble_amount" class="col-sm-2 control-label">Available Amount : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="payble_amount" id="payble_amount" value="<?php echo @$sub_price-@$paid_price; ?>" readonly="">
                    </div>
                 
                </div>
                <div class="form-group">
                  <label for="paid_amount" class="col-sm-2 control-label">Amount To Be Paid : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="paid_amount" id="paid_amount" onblur="check_payment_amount(this.value)" placeholder="Amount To Be Paid" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                      <span style="color: red" id="error_amount"></span>
                    </div>
                 
                </div>
               

              <div class="box-body">

               <input type="hidden" name="subadmin_id" id="subadmin_id" value="<?php echo $this->uri->segment(3); ?>">

            <!--  <div class="clearfix"></div> 
                             <div class="form-group" style="margin-top: 10px;">
                                    <label for="slider_image" class="col-sm-2 control-label text-center">Choose Slider Image( 1920 X 627 px ) : <span style="color:#F00">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="file"  name="slider_image" id="slider_image" onchange="readURL(this);" >
                                        <img id="prof_pic" src="<?php echo base_url()?>../assets/uploads/no_image.png"  alt="User Image" style="margin-top: 10px;width:90px;height:90px;" />
                                    </div>
                            </div> -->
               
                

                <div class="form-group">
                 <label for="inputUsername" class="col-sm-2 control-label">Choose Payment Method : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
           
                 <div class="col-sm-8">
                   <select class="form-control" name="payment_method" id="payment_method" onchange="get_method(this.value)">
                  <option value="">Choose Payment Method</option>
                   <!-- <option value="Cash" >Cash</option> -->
                   <option value="Cheque">Cheque</option>
                   <option value="NEFT">NEFT</option>
                   </select>
                   <span id="error_status"></span>
                 </div>
                 
             </div>

               <div id="put_method"></div>

              <!-- <span style="color: rgb(255, 0, 0); padding-left: 2px;">* fields are required</span> -->
              </div>
              <!-- /.box-body -->

             <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
             <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>


              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_rm/question_price_list/<?php echo $this->uri->segment(3); ?>" class="btn btn-danger fa fa-backward"><b> Back </b></a>
                <button type="button" class="btn btn-info pull-right" onclick="return form_validation()"><b> Submit 
                </b></button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (right) -->
      </div>
      <!-- ////////////////////////////////////////////////////////////////////////////////// -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
   <script type="text/javascript">
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
<script type="text/javascript"> 
function product_Submit_fm()
    {


        var payble_amount = $('#payble_amount').val();
        if (!isNull(payble_amount)) 
        {
          $('#payble_amount').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#payble_amount').removeClass('red_border').addClass('black_border');
        }
        
           var paid_amount = $('#paid_amount').val();
        if (!isNull(paid_amount)) 
        {
          $('#paid_amount').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#paid_amount').removeClass('red_border').addClass('black_border');
        }

    


    
       var payment_method = $('#payment_method').val();
        if (!isNull(payment_method)) 
        {
          $('#payment_method').removeClass('black_border').addClass('red_border');
          
        } 
        else 
        {
          $('#payment_method').removeClass('red_border').addClass('black_border');
        }

        // if(payment_method=='Cash'){

        //    var reciept_number = $('#reciept_number').val();
        // if (!isNull(reciept_number)) 
        // {
        //   $('#reciept_number').removeClass('black_border').addClass('red_border');
          
        // } 
        // else 
        // {
        //   $('#reciept_number').removeClass('red_border').addClass('black_border');
        // }

        // }


        if(payment_method=='NEFT'){

           var transact_id = $('#transact_id').val();
        if (!isNull(transact_id)) 
        {
          $('#transact_id').removeClass('black_border').addClass('red_border');
          
        } 
        else 
        {
          $('#transact_id').removeClass('red_border').addClass('black_border');
        }

        }


        if(payment_method=='Cheque'){

           var cheque_no = $('#cheque_no').val();
        if (!isNull(cheque_no)) 
        {
          $('#cheque_no').removeClass('black_border').addClass('red_border');
          
        } 
        else 
        {
          $('#cheque_no').removeClass('red_border').addClass('black_border');
        }
   var bank_name = $('#bank_name').val();
        if (!isNull(bank_name)) 
        {
          $('#bank_name').removeClass('black_border').addClass('red_border');
          
        } 
        else 
        {
          $('#bank_name').removeClass('red_border').addClass('black_border');
        }

        }




    }

    function form_validation()
    {
        //alert("ok");

        $('#pre_payment_form_validation').attr('onchange', 'product_Submit_fm()');
        $('#pre_payment_form_validation').attr('onkeyup', 'product_Submit_fm()');

        product_Submit_fm();
        //alert($('#contact_form .red_border').size());

        if ($('#pre_payment_form_validation .red_border').size() > 0)
        {
            $('#pre_payment_form_validation .red_border:first').focus();
            $('#pre_payment_form_validation .alert-error').show();
            return false;
        } 
        else 
        {

            $('#pre_payment_form_validation').submit();
        }
    }
   </script>


   <script type="text/javascript">
  
  function get_method(value){

    var subadmin_id=$('#subadmin_id').val();
var base_url='<?php echo base_url(); ?>';
     $.ajax({
              
             url:base_url+'index.php/manage_rm/get_method',
             data:{payment_method:value,subadmin_id:subadmin_id},
             dataType: "html",
             type: "POST",
             success: function(data){


              $("#put_method").html(data);
               
                
              }
             });

  }

  function check_payment_amount(value) {
    
    var total_amount=$('#payble_amount').val();
    var entered_amount=$('#paid_amount').val();


    if(parseInt(entered_amount) > parseInt(total_amount)){
      // alert(entered_amount); alert(total_amount); 

      $('#paid_amount').val('');
      $('#error_amount').html('Please enter a valid amount');
    }
    else{
      $('#error_amount').html('');
    }
  }
</script>
<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#reciept_pic')
                    .attr('src', e.target.result)
                    .width(90)
                    .height(90);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
  
  function chk_cheque_no(value)
  {

    // alert(value);


       var base_url='<?php echo  base_url();?>';
        if(value!='')
        {
          $.ajax({
                        
              url:'<?php echo  base_url();?>index.php/manage_rm/check_cheque_no',
              data:{cheque_no:value},
              dataType: "json",
              type: "POST",
              async: true,
              success: function(data)
              {
                    // alert(data);
                    var perform= data.changedone;
                    if(perform['status']==1)
                      {
                        
                        $("#cheque_no_error").html('Please Enter Valid Cheque Number.');
                        
                        $('#cheque_no').removeClass('black_border').addClass('red_border');
                       
                       
                      }
                      if(perform['status']==0){

                         
                         $('#cheque_no_error').html('');

                        $('#cheque_no').removeClass('red_border').addClass('black_border');
                      }                    
               }
                                                            
              });
        }
        else
        {
          $("#cheque_no_error").html("");
          
        }
      
  }

</script>