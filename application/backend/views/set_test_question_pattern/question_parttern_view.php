<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>SET TEST QUESTION PATTERN
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
            <li class="active">SET TEST QUESTION PATTERN</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">SET TEST QUESTION PATTERN LIST</h3>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/manage_set_test_question_pattern/add_set_test_parrtern" class="btn btn-sm btn-success" style="margin-left: 12px;"><i class="fa fa-plus" aria-hidden="true"></i> ADD SET</a>
                    <!--  <button class="btn btn-success btn-sm" type="submit" style="" onclick="change_active(this.value)" value="active" name="change_active" id="change_active"><i class="fa fa-check" aria-hidden="true"></i> active</button>
                    <button class="btn btn-warning btn-sm" type="submit" style="" onclick="change_inactive(this.value)" value="inactive" name="change_inactive" id="change_inactive"><i class="fa fa-times" aria-hidden="true"></i> inactive</button>
                    <button  class="btn btn-sm btn-danger" onclick="delete_multiple()" >Delete multiple</button> -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>
                            <tr class="bg-blue">
                               <!--  <th><input type="checkbox" id="checkAll" name="checkAll"></th> -->
                               <th>Sl NO</th>
                                <th>Test Type</th>
                                <th>No Of Question</th>
                                <th>Total Marks</th>
                                <th>Total Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                foreach($set_pattern_details as $row)
                                    {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo @$row->test_type;?><?php if($row->test_select_name!=''){?> ( <?php echo $row->test_select_name;?> )<?php } ?> </td>
                                            <td>
                                            <?php
                                             echo $row->no_of_question;
                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                            echo $row->total_marks;
                                            ?>    
                                            </td>
                                            <td>
                                              <?php
                                              echo $row->total_time;
                                            ?>   
                                            </td>
                                            <td>
                         <a href="<?php echo base_url();?>index.php/manage_set_test_question_pattern/edit/<?php echo $row->pattern_id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>

                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->pattern_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
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

<script>
function delete_data(id)
{
 
if(confirm("Are you sure ?"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_set_test_question_pattern/delete/'+id;
}
}

</script>

    

