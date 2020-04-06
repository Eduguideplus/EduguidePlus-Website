<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       PAYMENT HISTORY LIST
       
        
      </h1>
      <small><?php
            $succ_msg=$this->session->flashdata('succ_msg');
            if($succ_msg){
              ?>
              <br><span style="color:green">
                <?php echo $succ_msg; ?>
              </span>
              <?php
              }
              ?>
              
              </small>
              <small id="msg" style="color:red"></small>
              
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url()?>index.php/manage_category/category_view">Payment History List</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            
           <form class="form-horizontal" action="<?php echo base_url();?>index.php/admin_payment_history/payment_history_search" method="Get" id="record_form_validation" enctype="multipart/form-data" >
              <div class="box-body">

              <div class="form-group">
                 <label for="inputUsername" class="col-sm-2 control-label"><center>Select Month: <span style="color:#F00">*</span> </center></label>
           
                 <div class="col-sm-3">
                   <select class="form-control" name="month" id="month">
                  
                   <option value="" >Select Month</option>
                   <option value="01">January</option>
                   <option value="02">February</option>
                   <option value="03">March</option>
                   <option value="04">April</option>
                   <option value="05">May</option>
                   <option value="06">June</option>
                   <option value="07">July</option>
                   <option value="08">August</option>
                   <option value="09">Septembor</option>
                   <option value="10">Octobor</option>
                   <option value="11">Novembor</option>
                   <option value="12">Decembor</option>
                   </select>
                   <span id="error_status"></span>
                 </div>
                 
             </div>




               <div class="form-group">
                  <label for="year" class="col-sm-2 control-label"><center>Type Year : <span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-3">
                   <input type="text" name="year" autocomplete="off" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="4" minlength="4" placeholder="Enter Year (YYYY)"  id="year"  >                   
                  </div>
                 
                </div>


                <div class="form-group">
                  <label for="" class="col-sm-2 control-label"><center>Select User : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span> </center></label>

                  <div class="col-sm-3">
                    <select  name="user_id" id="user_id" class="form-control" onchange="return check_pattern_exist(this.value)">
                         <option value="">Select User</option>
                    <?php foreach($user as $typ){?>
                    <option value="<?php echo $typ->id; ?>"><?php echo $typ->user_name; ?></option>
                      <?php } ?>
                    </select><span id="msg" style="color:red;"></span>
                    
                  </div>
                 
              </div>
                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label"></label>
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-success" onclick="return form_validation()">Search</button>
                  </div>
                 
              </div>
 
 
         
    
      </form>


            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
               <!-- <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th> -->
                  <th>User Name</th>
                  <th>Paid Amount</th>
                  <th>Payment Method</th> 
                  <th>Receipt Number</th>
                  <th>Receipt File</th>
                  <th>Cheque No</th>
                  <th>Bank Name</th>
                  <th>Transaction Id</th>
                  <th>Payment Date</th>
                  <th>Payment By</th>
                 
                <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>

                  <?php  foreach($payment_history as $row)
                  {
                    ?>

              
              
                
                <tr>
                 <!--  <td><input type="checkbox" name="record" value="<?php echo $row->title_id;?>"></td>
                  <td>
                  <?php if($row->status=='active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/images/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/images/inactive.png">
                  <?php
                  }  ?>
                  </td> -->

                  <td>
                  <?php
                   $name=$this->common->select($table_name ='tbl_user', $field = array(), $where = array('id'=>$row->paid_to_user_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                   echo @$name[0]->user_name;
                  ?>
                  </td>
                  <td><?php echo $row->paid_amount;?></td>

                   <td><?php if(!empty($row->payment_method)){ echo $row->payment_method; } else{ echo 'N/A'; } ?></td>

                   <td><?php if(!empty($row->receipt_number)){ echo $row->receipt_number; } else{ echo 'N/A'; } ?></td>

                    <td><?php if(!empty($row->receipt_file)){ ?> <a href="<?php echo base_url();?>../assets/uploads/subadmin_reciept/<?php echo $row->receipt_file; ?>"   download> <img src="<?php echo base_url();?>../assets/uploads/subadmin_reciept/<?php echo $row->receipt_file; ?>"  height="70" width='90' class="img-responsive"><?php } else{ echo 'N/A';} ?></a> </td>

                <td><?php if(!empty($row->cheque_no)){ echo $row->cheque_no; } else{ echo 'N/A'; } ?></td>

                   <td><?php if(!empty($row->bank_name)){ echo $row->bank_name; } else{ echo 'N/A'; } ?></td>

                  <td><?php if(!empty($row->transaction_id)){ echo $row->transaction_id; } else{ echo 'N/A'; } ?></td>
                  
                  <td><?php echo $row->payment_date;?></td>
                  <td>
                  <?php 
                   $payment_by=$this->common->select($table_name ='tbl_user', $field = array(), $where = array('id'=>$row->payment_by), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                  echo @$payment_by[0]->user_name;
                  ?>
                  </td>
                  
                 <!--  <td> <a href="<?php echo base_url();?>index.php/vocabulary/edit/<?php echo $row->title_id; ?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->title_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button> </td> -->
                </tr>

                <?php

              }
              ?>

          

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </div>
    </div>
    <script>
function delete_data(id)
{
 
if(confirm("Are you sure ?"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/vocabulary/delete_data/'+id;
}
}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
function check_all()
{
  
   if ($("#all_chk").is(':checked')) {
            $("input[name=record]").each(function () {
                $(this).prop("checked", true);
            });

        } 
        else {
            $("input[name=record]").each(function () {
                $(this).prop("checked", false);
            });
          }
}
  </script>

  <script type="text/javascript">

   function change_sts_active(val)
        {
          
            var cat_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                cat_ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(cat_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/vocabulary/change_to_active',
             data:{catid:cat_ids,status:val},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.changedone;

                 if(perform==1)
                 {
                   alert('Status changed successsfully.');
                   location.reload();
                 }
                
              }
             });
          }
          else
          {
            alert('Sorry!! please select any records');
          }
}
  
        </script>



<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>custom_script/record_validation.js"></script>
<script>   
</script>

<script>

     function record_Submit_fm()
    {

        var month = $('#month').val();
        if (!isNull(month)) 
        {
          $('#month').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#month').removeClass('red_border').addClass('black_border');
        }


        var year = $('#year').val();
        if (!isNull(year) || year.length<4) 
        {
          $('#year').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#year').removeClass('red_border').addClass('black_border');
        }

   var user_id = $('#user_id').val();
        if (!isNull(user_id)) 
        {
          $('#user_id').removeClass('black_border').addClass('red_border');
         
        } 
        else 
        {
          $('#user_id').removeClass('red_border').addClass('black_border');
        }

    }

    function form_validation()
    {
        //alert("ok");

        $('#record_form_validation').attr('onchange', 'record_Submit_fm()');
        $('#record_form_validation').attr('onkeyup', 'record_Submit_fm()');

        record_Submit_fm();
        //alert($('#contact_form .red_border').size());

        if ($('#record_form_validation .red_border').size() > 0)
        {
            $('#record_form_validation .red_border:first').focus();
            $('#record_form_validation .alert-error').show();
            return false;
        } 
        else 
        {

            $('#record_form_validation').submit();
        }
    }
</script>
<style>
.error {color: #FF0000;}
</style>        