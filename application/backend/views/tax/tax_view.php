<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Tax Details</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboad</a></li>
            <li class="active">Tax Details</li>
        </ol>
    </section>
    
   
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tax Details</h3>
                    </div>
                   <!-- <button data-toggle="modal"  class="btn btn-primary btn-action"  onclick="add_discount()"></i>Add Collector</button> -->
                   <a href="<?php echo base_url();?>index.php/manage_tax/add_tax" class="btn btn-success btn-sm" ><i class="fa fa-share-square" aria-hidden="true"></i>&nbsp;<span>Add Tax</span> </a>

                       <button type="submit" class="btn btn-info btn-sm" onclick="change_active('Y')" value="Y" name="change_active" id="change_active"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;<span>Active</span> </button>

                           <button type="submit" class="btn btn-danger btn-sm" onclick="change_inactive('N')" value="N" name="change_inactive" id="change_inactive"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;<span>Inactive</span> </button>

                          <!--  <button type="submit" class="btn btn-info btn-sm" onclick="change_display(this.value)" value="yes" name="change_display" id="change_display"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;<span>Display</span> </button>
                           <button type="submit" class="btn btn-danger btn-sm" onclick="change_hide(this.value)" value="no" name="change_hide" id="change_hide"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;<span>Hide</span> </button> -->
                     
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>
                                <tr class="bg-blue">
                                   <th>Sl no</th>
                                   <th>Tax Name</th>
                                    <th>Tax Percentage(%)</th>
                                     
                                    <th>Status</th>
                                
                                     <th>Created By</th>
                                <th>Created On</th>
                              
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                          
                          <?php 
                          $sl =1;
                         /* $coupon = $this->admin_model->select_coupon('tbl_coupon');*/
                          foreach ($tax_all as $tax) {

                                    $created_by  =$tax->created_by;
                                    $create = $this->admin_model->select_data('tbl_user','id',$created_by);
                                    $created_name = @$create[0]->first_name.' '.@$create[0]->last_name;

                                     $modified_by  = $tax->modified_by;
                                    $modify = $this->admin_model->select_data('tbl_user','id',$modified_by);
                                    
                                    $modify_name = @$modify[0]->first_name.' '.@$modify[0]->last_name;
                            
                          ?>
                                
                                <td><input type="checkbox" id="check" name="check" value="<?php echo $tax->tax_id;?>"></td>
                                <td><p style="color: #6495ed"><?php echo $tax->tax_name;?></p></td>
                                
                                
                                 <td><?php echo $tax->tax_percentage;?></td>
                                
                                 <?php if($tax->tax_status == "Y"){?>
                                <td id="status_<?php echo $tax->tax_id; ?>"><span class="label label-success">Active</span></td>
                                <?php } else { ?>
                               <td id=status_<?php echo $tax->tax_id; ?>><span class="label label-danger">Inactive</span></td>
                               <?php } ?>

                                <td><?php echo @$created_name;?></td>
                                <td><?php echo date('jS M,Y',strtotime($tax->created_on)); ?></td>
                             

                                <td><a href="<?php echo base_url();?>index.php/manage_tax/tax_edit/<?php echo $tax->tax_id; ?>" class="btn btn-primary btn-action" title="Edit"><i class="fa fa-share-square" aria-hidden="true"></i></a>
                                <a href="<?php echo base_url();?>index.php/manage_tax/tax_delete/<?php echo $tax->tax_id; ?>" class="btn btn-danger btn-action" onclick="return confirm('are you sure ? ')" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                               
            
                                   
                                </tr>
                               <?php $sl=$sl+1; } ?>
                              
                             
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>


<div id="req-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form action="<?php echo base_url();?>index.php/order/cancel_submit" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div> -->
      <div class="modal-body">
        <p>Are you sure?</p>
      </div>
      <div class="modal-footer">
      <input type="hidden" name="order" value="<?php echo $order_detail[0]->order_id;?>">
      <input type="hidden" name="order_id" value="" id="order_id">
        <button type="submit" class="btn btn-info back-btn">Ok</button>
        <button type="button" class="btn btn-info back-btn" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>

<script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<script>
    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    function change_active(bvalue)
    {

        var favorite = [];
        $.each($("input[name='check']:checked"), function(){
            favorite.push($(this).val());
        });

        var value=favorite;

        if(value=="")
        {
            alert('Please Select tax..!');
        }
        var i=0;

        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>index.php/manage_tax/change_active",
                data: {id: value,btn_value:bvalue},
                async: false,
                success: function(data)
                {
                    for(i=0;i<favorite.length;i++)
                    {
                        $('#status_'+favorite[i]).html('<span class="label label-success">'+data.status+'</span>');
                    }

                }
            });
    }

    function change_inactive(bvalue)
    {
        var favorite = [];
        $.each($("input[name='check']:checked"), function(){
            favorite.push($(this).val());
        });

        var value=favorite;
        if(value=="")
        {
            alert('Please Select Coupon..!');
        }
        var i=0;

        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>index.php/manage_tax/change_inactive",
                data: {id: value,btn_value:bvalue},
                async: false,
                success: function(data)
                {
                    for(i=0;i<favorite.length;i++)
                    {
                        $('#status_'+favorite[i]).html('<span class="label label-danger">'+data.status+'</label>');
                    }
                }
            });
    }
</script>
<script type="text/javascript">
     function change_display(bvalue)
    {
        var favorite = [];
        $.each($("input[name='check']:checked"), function(){
            favorite.push($(this).val());
        });

        var value=favorite;
        if(value=="")
        {
            alert('Please Select Coupon..!');
        }
        var i=0;

        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>index.php/coupon/change_display",
                data: {id: value,btn_value:bvalue},
                async: false,
                success: function(data)
                {
                    for(i=0;i<favorite.length;i++)
                    {
                        $('#display_'+favorite[i]).html('<span class="label label-success">'+data.display+'</label>');
                    }
                }
            });
    }

      function change_hide(bvalue)
    {
        var favorite = [];
        $.each($("input[name='check']:checked"), function(){
            favorite.push($(this).val());
        });

        var value=favorite;
        if(value=="")
        {
            alert('Please Select Coupon..!');
        }
        var i=0;

        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>index.php/coupon/change_hide",
                data: {id: value,btn_value:bvalue},
                async: false,
                success: function(data)
                {
                    for(i=0;i<favorite.length;i++)
                    {
                        $('#display_'+favorite[i]).html('<span class="label label-danger">'+data.display+'</label>');
                    }
                }
            });
    }
</script>

