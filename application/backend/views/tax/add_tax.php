<link rel="stylesheet" href="<?php echo base_url();?>plugins/select2/select2.min.css">

<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Tax
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Add Tax</li>
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
                            <h3 class="box-title">Add Tax</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>index.php/manage_tax/tax_submit" role="form" method="post" enctype="multipart/form-data" id="form1"> 
                            <div class="box-body">
                            <span id="msg" style="font-weight:bold;color:red"></span>



                                <div class="form-group" style="margin-top: 10px">
                                    <label for="fbook" class="col-sm-2 control-label text-center">Tax Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tax_name" id="tax_name">

                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group" style="margin-top: 10px">
                                    <label for="fbook" class="col-sm-2 control-label text-center">Tax Percentage</label>
                                 <div class="col-sm-7">
                                        <input type="text" class="form-control" name="tax_percentage" id="tax_percentage">
                                        
                                       
                                       
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                
                                
                                  
                            
                                       
                                        <div class="form-group" style="margin-top: 10px">
                                    <label for="fbook" class="col-sm-2 control-label text-center">Tax Status</label>
                                 <div class="col-sm-7">
                                        
                                        <select name="tax_status" id="tax_status" class="form-control">
                                        <option value="active" selected >Active</option>
                                        <option value="inactive">Inactive</option>
                                        </select>
                                        
                                       
                                       
                                    </div>
                                </div>
                                
   <div class="clearfix"></div>

                              

                                <div class="box-footer">
                                 <button type="button" class="btn btn-primary"  onclick="window.location='<?php echo base_url().'index.php/manage_tax/tax_view/';?>'">Back</button>
                                    <button type="button" onclick="validate_form()"  class="btn btn-primary pull-right">Submit</button>
                                    
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
function myFunction()
{
    var discount = $('#discount').val();
    if(discount == 'fixed')
    {
        $('#discount_amount').show();
        $('#discount_per').hide();
    }
    else if(discount == 'percentage')
    {
        $('#discount_amount').hide();
        $('#discount_per').show();
    }

}
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
