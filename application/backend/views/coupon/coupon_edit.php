<link rel="stylesheet" href="<?php echo base_url();?>plugins/select2/select2.min.css">

<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Coupon
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Edit Coupon</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>index.php/coupon/coupon_edit_submit" role="form" method="post" enctype="multipart/form-data" id="form1"> 
                            <div class="box-body">
                            <span id="msg" style="font-weight:bold;color:red"></span>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="fbook" class="col-sm-2 control-label text-center">Coupon Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="coupon_name" id="coupon_name" value="<?php echo $coupon[0]->coupon_name;?>">

                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="fbook" class="col-sm-2 control-label text-center">Coupon Code</label>
                                 <div class="col-sm-7">
                                        <input type="text" class="form-control" name="coupon_code" id="coupon_code" value="<?php echo $coupon[0]->coupon_code;?>">
                                        
                                       
                                       
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                               
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="fbook" class="col-sm-2 control-label text-center">Max User</label>
                                 <div class="col-sm-7">
                                        <input type="text" class="form-control" name="max_user" id="max_user" value="<?php echo $coupon[0]->max_user;?>">
                                        
                                       
                                       
                                    </div>
                                </div>
                                       <div class="clearfix"></div>
                                       <div class="form-group" style="margin-top: 10px">
                                    <label for="fbook" class="col-sm-2 control-label text-center">Min Amount</label>
                                 <div class="col-sm-7">
                                        <input type="text" class="form-control" name="min_amount" id="min_amount" value="<?php echo $coupon[0]->min_amount;?>">
                                        
                                       
                                       
                                    </div>
                                </div>
                                       <div class="clearfix"></div>
                                       <div class="form-group" style="margin-top: 10px">
                                    <label for="fbook" class="col-sm-2 control-label text-center">Discount Amount</label>
                                 <div class="col-sm-3">
                                        <input type="text" class="form-control" name="discount_amount" id="discount_amount" value="<?php echo $coupon[0]->discount_amount;?>">
                                        
                                       
                                       
                                    </div>
                                     <div class="col-sm-1">
                                      <label for="fbook" class="col-sm-2 control-label text-center">or (%)</label>
                                    </div>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="discount_per" id="discount_per" value="<?php echo $coupon[0]->discount_percentage;?>">
                                        
                                       
                                       
                                    </div>
                                </div>
                                       <div class="clearfix"></div>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="fbook" class="col-sm-2 control-label text-center">Valid From</label>
                                 <div class="col-sm-3">
                                        <input type="text" class="form-control" name="valid_from" id="txtFrom" value="<?php echo  date('m/d/Y',strtotime($coupon[0]->valid_from));?>">
                                        
                                      
                                       
                                    </div>
                                     <div class="col-sm-1">
                                      <label for="fbook" class="col-sm-2 control-label text-center">To</label>
                                    </div>
                                      <div class="col-sm-3">
                                        <input type="text" class="form-control" name="valid_to" id="txtTo" value="<?php echo date('m/d/Y',strtotime($coupon[0]->valid_to));?>">
                                        
                                       
                                       
                                    </div>
                                </div>
                               
                                <div class="clearfix"></div>
                                <input type="hidden" name="coupon_id", value="<?php echo $this->uri->segment(3);?>">
                               

                                <div class="box-footer">
                                 <button type="button" class="btn btn-primary"  onclick="window.location='<?php echo base_url().'index.php/coupon/coupon_view/';?>'">Back</button>
                                    <button type="button" onclick="validate_form()" class="btn btn-primary pull-right">Submit</button>
                                    
                                </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
 type="text/javascript"></script>
 <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
 rel="Stylesheet" type="text/css"/>
<script type="text/javascript">


$(function () {
    var date = new Date();
    $("#txtFrom").datepicker({
        numberOfMonths: 1,
         minDate:  date,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() +1);
            $("#txtTo").datepicker("option", "minDate", dt);
        }
    });
   $("#txtTo").datepicker({
        numberOfMonths: 1,
        minDate: '+0d',
        
    });
});


</script>
<script src="<?php echo base_url();?>plugins/select2/select2.full.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.multiselect.js"></script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    
  });
</script>

<script>
function validate_form()
{
    if($('#coupon_name').val() == "")
    {
        $('#msg').html('Enter Coupon Name');
        return false;
    }
     if($('#coupon_code').val() == "")
    {
        $('#msg').html('Enter Coupon Code');
        return false;
    }
    if($('#max_user').val() == "")
    {
        $('#msg').html('Enter Max User');
        return false;
    }
     if($('#min_amount').val() == "")
    {
        $('#msg').html('Enter Min Amount');
        return false;
    }
     if($('#discount_amount').val() == "" && $('#discount_per').val() == "")
    {
        $('#msg').html('Enter Discount Amount');
        return false;
    }
    if($('#txtFrom').val() == "")
    {
        $('#msg').html('Enter From Date');
        return false;
    }
     if($('#txtTo').val() == "")
    {
        $('#msg').html('Enter To Date');
        return false;
    }
     
    else
    {
        $('#form1').submit();
    }


}
</script>
