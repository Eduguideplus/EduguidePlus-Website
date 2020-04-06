<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Free Paid
             <span style="padding-right: 50px;"></span>
        <?php
            $succ_msg=$this->session->flashdata('succ_msg');
            if($succ_msg){
              ?>
              <small style="color:green">
                <b><?php echo $succ_msg; ?></b>
              </small>
              <?php
              }
              ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboad</a></li>
            <li class="active">Free Paid</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Free & Paid List</h3>
                    </div>
                  <!--   <a href="<?php echo base_url(); ?>index.php/manage_media/media_add" class="btn btn-sm btn-success" style="margin-left: 12px;"><i class="fa fa-plus" aria-hidden="true"></i> Add</a> -->
                    <!--  <button class="btn btn-success btn-sm" type="submit" style="" onclick="change_active(this.value)" value="active" name="change_active" id="change_active"><i class="fa fa-check" aria-hidden="true"></i> active</button>
                    <button class="btn btn-warning btn-sm" type="submit" style="" onclick="change_inactive(this.value)" value="inactive" name="change_inactive" id="change_inactive"><i class="fa fa-times" aria-hidden="true"></i> inactive</button>
                    <button  class="btn btn-sm btn-danger" onclick="delete_multiple()" >Delete multiple</button> -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>
                            <tr class="bg-blue">
                               <!--  <th><input type="checkbox" id="checkAll" name="checkAll"></th> -->
                               <th>Type</th>
                                <th>Free Feature</th>
                                <th>Paid Feature</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="clearfix"></div>
                            <?php
                                foreach ($free_paid as $row)
                                {
                            ?>
                            <tr>
                               
                                <td><?php 
                                $type_dtls=$this->admin_model->selectOne('tbl_user_type','id',$row->user_type);
                                echo @$type_dtls[0]->type_name; ?></td>
                                <td><?php echo $row->free_feature; ?></td>
                                <td><?php echo $row->paid_feature; ?></td>
                               
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/manage_free_paid/free_paid_edit/<?php echo $row->id; ?>" class="btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

                                    <!-- <a href="<?php echo base_url(); ?>index.php/manage_media/media_delete/<?php echo $row->media_id; ?>" class="btn-sm btn-danger" onclick="return confirm('are you sure ?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a> -->
                                </td>
                            </tr>
                            <?php }?>
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

    

