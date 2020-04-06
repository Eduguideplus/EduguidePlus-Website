<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Used Coupon Details</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboad</a></li>
            <li class="active">Used Coupon Details</li>
        </ol>
    </section>
    

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Used Coupon Details</h3>
                    </div>
                   <!-- <button data-toggle="modal"  class="btn btn-primary btn-action"  onclick="add_discount()"></i>Add Collector</button> -->
                   
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>
                                <tr class="bg-blue">
                                   <th>Sl no</th>
                                   <th>Name</th>
                                    <th>Coupon Code</th>
                                    <th>Order Id</th>
                                    <th>Used Date</th>
                                    <th></th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                          
                          <?php 
                          $sl =1;
                          $this->db->select('*');
                          $this->db->order_by('created_date','desc');
                          $this->db->from('tbl_coupon_user');
                          $coupon = $this->db->get();
                          $coupon = $coupon->result();
                          //$coupon = $this->lab_model->select_all('tbl_coupon_user');
                          foreach ($coupon as $cpn) {
                            $coupon_id = $cpn->coupon_id;
                            $coupon_detail = $this->admin_model->select_data('tbl_coupon','id',$coupon_id);
                            $coupon_code = $coupon_detail[0]->coupon_code;
                            $user_id = $cpn->user_id;
                            $user = $this->admin_model->select_data('tbl_user','id',$user_id);
                            $user_name = $user[0]->first_name.' '.$user[0]->last_name;

                          ?>
                                
                                <td><?php echo $sl;?></td>
                                  <td><?php echo $user_name;?></td>
                                <td><p style="color: #6495ed"><?php echo $coupon_code;?></p></td>
                               
                                 <td><?php echo $cpn->order_id;?></td>
                                <td><?php echo date('l,jS M Y',strtotime($cpn->created_date));?></td>
                                <td><a href="<?php echo base_url();?>index.php/coupon/used_coupon_delete/<?php echo $cpn->id; ?>" class="btn btn-danger btn-action" onclick="return confirm('are you sure ? ')" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                
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

