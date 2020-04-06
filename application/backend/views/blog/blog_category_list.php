<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Articles Category List </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboad</a></li>
            <li class="active">Articles Category List</li>
        </ol>
        <small>
        <?php
            $success_msg=$this->session->flashdata('success_msg');
            if($success_msg){
              ?>
              <br><div align="center" style="color: green;">
                <?php echo $success_msg; ?>
                    
                </div>
                
              
              <?php
              }
              ?>
              </small>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="box">
                    <div class="box-header">
                         <h3 class="box-title">All Articles Category (<?php echo count($category_details);?>)</h3>
                    </div>

                    <div class="col-md-12" style="">
                        <a href="<?php echo base_url()?>index.php/blog_category/add_category" class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>

                        <a href="javascript:void(0)" class="btn btn-success btn-sm" title="Active"  onclick="change_sts_active('Active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Inactive" onclick="change_sts_active('Inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

                   </div>
               <div class="clearfix"></div>
                    <!-- /.box-header -->
                    <div class="box-body about_booking">
                        <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>
                            <tr class="bg-blue">
                             <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>
                             <th>Status</th>
                                  <th>Category Name</th>
                                    <th class="col-md-2">Action</th>
                            </tr>
                            </thead>

                            <?php 
                            foreach($category_details as $row){
                              ?>
                   <tr>

                    <td><input type="checkbox" name="record" value="<?php echo $row->id;?>"></td>

                    <td>
                            <?php
                            if($row->status=='Active')
                            { ?>

                            <img src="<?php echo base_url();?>../assets/images/active.png">
                            <?php  

                            } else { ?>

                            <img src="<?php echo base_url();?>../assets/images/inactive.png">

                            <?php   } ?>
                            
                    </td>

                    <td><?php echo $row->category_name?></td>

                   <td>
                          
                    <a href="<?php echo base_url();?>index.php/blog_category/edit_blog/<?php echo $row->id;?>" class="btn btn-info" ><i class="fa fa-pencil-square-o"></i></a>

                     <?php   $blog_count=$this->common->select($table_name = 'tbl_blog', $field = array(), $where = array('category_id'=>$row->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 

                                    if(count($blog_count)==0)
                                    {
                                        ?>

                    <a type="button" class="btn btn-danger" onclick="return delete_data('<?php echo $row->id;?>')" ><i class="fa fa-trash-o"></i></a> <?php }?>

                    </td>


                    </tr>
                    <?php
                  }
                    ?>


                            
                           
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript">
  function check_all()
  {
  
      if ($("#all_chk").is(':checked')) {
            $("input[name=record]").each(function () {
                $(this).prop("checked", true);
            });

        } 
        else 
        {
            $("input[name=record]").each(function () {
                $(this).prop("checked", false);
            });
        }
  }
  </script>


    <script type="text/javascript">

       function change_sts_active(val)
        {
          //alert(val);
          
            var pro_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                pro_ids.push($(this).val());
            });

            //alert(pro_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(pro_ids.length>0)
            {

                $.ajax({
              
                url:base_url+'index.php/blog_category/change_to_active',
                data:{pid:pro_ids,status:val},
                dataType: "json",
                type: "POST",
                success: function(data){


                var perform= data.changedone;

                    if(perform==1)
                    {
                      alert('status successfully changed');
                        
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

    <script type="text/javascript">
      function delete_data(id)
      {
        //alert(val);
        if(confirm("Are You Sure.?"))
        {
             window.location='<?php echo base_url();?>index.php/blog_category/delete_data/'+id;
        }

       
      }
    </script>

 
