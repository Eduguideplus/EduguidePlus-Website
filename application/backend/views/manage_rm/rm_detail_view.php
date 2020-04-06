<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<style>
    th
    {
        width:300px;
    }
    /*table{
        border-color: #8f6e6e !important;
    }
    .table-bordered td, .table-bordered th{
        border-color: #8f6e6e !important;
    }*/
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>RM Details</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/manage_rm/rm_detail_view"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a></li>
            <li class="active">RM Details</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="box">
                    <!-- <div class="box-header">
                        <h3 class="box-title">Student Details</h3>
                    </div> -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-responsive table-hover">
                            <tbody>

                            <tr>
                                <td><strong>Full Name: </strong></td>
                                <td>:</td>
                                <td><strong>
                                 <?php 
                                    if(@$all_data[0]->user_name == "")
                                    {
                                        echo "N/A";
                                    }
                                    else
                                    {
                                        echo @$all_data[0]->user_name;
                                    }
                                                 
                                ?>
                                    </strong>
                                </td>
                            </tr>

                        <!--     <tr>
                            <td><strong>Last Name: </strong></td>
                            <td>:</td>
                            <td><strong>
                             <?php 
                                if(@$all_data[0]->last_name == "")
                                {
                                    echo "N/A";
                                }
                                else
                                {
                                    echo @$all_data[0]->last_name;
                                }
                                             
                            ?>
                                </strong>
                            </td>
                        </tr> -->
                                
                                <tr>
                                <td><strong>Date Of Birth: </strong></td>
                                <td>:</td>
                                <td><strong>
                                 <?php 
                                    if(@$all_data[0]->dob == "")
                                    {
                                        echo "N/A";
                                    }
                                    else
                                    {
                                        echo @$all_data[0]->dob;
                                    }
                                                 
                                ?>
                                    </strong>
                                </td>
                            </tr>


                              <tr>
                                <td><strong>Address: </strong></td>
                                <td>:</td>
                                <td><strong>
                                <?php
                                
                                ?>
                                 <?php 
                                    if(@$all_data[0]->user_address=="")
                                    {
                                        echo "N/A";
                                    }
                                   else
                                   {
                                    echo @$all_data[0]->user_address;
                                   }
                                                 
                                ?>
                                    </strong>
                                </td>
                            </tr>

                            <tr>
                                <td><strong>Profile image: </strong></td>
                                <td>:</td>
                                <td><strong>
                                 <?php 
                                 
                                    if(@$all_data[0]->profile_photo=="")
                                    {
                                        echo "N/A";
                                    }
                                    else
                                    {
                                        ?>

                                        <img src="<?php echo base_url();?>../assets/uploads/profile_image/<?php echo @$all_data[0]->profile_photo; ?>">
                                   <?php  }
                                                 
                                ?>
                                    </strong>
                                </td>
                            </tr>

                            

                            
                             
                            </td>
                            </tr>
                            </tbody>
                        </table>
                            <a href="<?php echo base_url(); ?>index.php/manage_rm/view_rm" class="btn btn-sm btn-primary" style="margin-top: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
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
