<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Media Image
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
            <li class="active">Media Image</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Media Image List</h3>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/manage_media/media_add" class="btn btn-sm btn-success" style="margin-left: 12px;"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    <!--  <button class="btn btn-success btn-sm" type="submit" style="" onclick="change_active(this.value)" value="active" name="change_active" id="change_active"><i class="fa fa-check" aria-hidden="true"></i> active</button>
                    <button class="btn btn-warning btn-sm" type="submit" style="" onclick="change_inactive(this.value)" value="inactive" name="change_inactive" id="change_inactive"><i class="fa fa-times" aria-hidden="true"></i> inactive</button>
                    <button  class="btn btn-sm btn-danger" onclick="delete_multiple()" >Delete multiple</button> -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>
                            <tr class="bg-blue">
                               <!--  <th><input type="checkbox" id="checkAll" name="checkAll"></th> -->
                               <th>Page For</th>
                                <th>Image Path</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="clearfix"></div>
                            <?php
                                foreach ($media as $row)
                                {
                            ?>
                            <tr>
                               
                                <td><?php echo $row->page_name; ?></td>
                                <td><textarea class="form-control" readonly="" cols="80"><?php echo $row->media_path; ?></textarea></td>
                                <td>
                                    <?php
                                        if($row->media_image!="")
                                        {
                                            ?>
                                            <img id="prof_pic"
                                                 src="<?php echo base_url() ?>../assets/uploads/media/<?php echo $row->media_image; ?>"
                                                 alt="User Image" style="width:80px;height:80px;"/>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                              <img id="prof_pic" src="<?php echo base_url()?>../assets/uploads/no_image.jpg"  alt="User Image" style="margin-top: 10px;width:80px;height:80px;" />
                                            <?php
                                        }
                                    ?>
                                </td>
                               
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/manage_media/media_edit/<?php echo $row->media_id; ?>" class="btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

                                    <a href="<?php echo base_url(); ?>index.php/manage_media/media_delete/<?php echo $row->media_id; ?>" class="btn-sm btn-danger" onclick="return confirm('are you sure ?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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

    

