<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>Blog</h3>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboad</a></li>
            <li class="active">Blog List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Blog List</h3>
                    </div>
                    <a href="<?php echo base_url(); ?>index.php/admin_blog/blog_add" class="btn btn-sm btn-success" style="margin-left: 12px;"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                     <button class="btn btn-success btn-sm" type="submit" style="" onclick="change_active(this.value)" value="active" name="change_active" id="change_active"><i class="fa fa-check" aria-hidden="true"></i> active</button>

                    <button class="btn btn-danger btn-sm" type="submit" style="" onclick="change_inactive(this.value)" value="inactive" name="change_inactive" id="change_inactive"><i class="fa fa-times" aria-hidden="true"></i> inactive</button> 

                   <!--  <button  class="btn btn-sm btn-danger" onclick="delete_multiple()" >Delete multiple</button> -->
                    <!-- /.box-header -->
                    <div class="box-body">
                       <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>
                            <tr class="bg-blue">
                                <th><input type="checkbox" id="checkAll" name="checkAll"></th>
                                <th>Added By</th>
                                <th>Blog Name</th>
                               <!--  <th>Author</th> -->
                                <!--  <th>Category Name</th> -->
                                <th>Status</th>
                                <th>Added Date</th>
                                <th>Image</th>
                               <!--  <th>Popular Post</th> -->
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="clearfix"></div>
                            <?php
                                foreach ($blog as $row)
                                {

                                    //$cat_id=$row->category_id;
                                    //$cat_name=$this->admin_model->selectOne('tbl_blog_category','category_id',$cat_id)


                            ?>

                          

                            <tr>
                                <td><input type="checkbox" id="check" name="check" value="<?php echo $row->blog_id; ?>"></td>
                                <?php 
                                $member_id = $row->member_id;
                                $member_details = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('user_id'=>$member_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                                ?>
                                <?php if($member_id == '1'){ ?>
                                <td><span class="label label-warning"><em><?php echo @$member_details[0]->first_name.' '.@$member_details[0]->last_name;?></em></span></td>
                                <?php } else { ?>
                                <td><span class="label label-info"><em><?php echo @$member_details[0]->first_name.' '.@$member_details[0]->last_name;?></em></span></td>
                                <?php } ?>

                                <td><?php echo $row->blog_title; ?></td>
                               <!--  <td><?php echo $row->blog_author; ?></td> -->
                                <!-- <td><?php echo $category_name->category_name; ?></td> -->

                                <td id="status_<?php echo $row->blog_id; ?>">
                                        <?php
                                        if($row->blog_status=="active")
                                        {
                                            ?>
                                            <span class="label label-success"><?php echo $row->blog_status; ?></span>
                                            <?php
                                        }
                                        if($row->blog_status=="inactive")
                                        {
                                            ?>
                                            <span class="label label-danger"><?php echo $row->blog_status; ?></span>
                                        <?php }?>
                                </td>

                                <td><?php echo date('d/m/Y',strtotime($row->blog_added)); ?></td>

                                <td>
                                    <?php
                                        if($row->blog_thumb_big!="")
                                        {
                                            ?>
                                            <img id="prof_pic"
                                                 src="<?php echo base_url() ?>../assets/upload/blog_image/<?php echo $row->blog_thumb_big; ?>"
                                                 alt="User Image" style="width:90px;height:90px;"/>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                              <img id="prof_pic" src="<?php echo base_url()?>../assets/upload/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:90px;height:90px;" />
                                            <?php
                                        }
                                    ?>
                                </td>
                                 <!--  <td id="popular_<?php echo $row->blog_id; ?>">
                         <?php 
                   
                           if($row->popular_post=="Yes")
                               {
                                 ?>
                              <a href="#" class="btn btn-success btn-action" title="Change" onclick="change_post(<?php echo $row->blog_id; ?>)"><i class="fa fa-o" ></i> <?php echo $row->popular_post;?></a>
                               <?php
                             }
                             else
                             {
                               ?>
                                <a href="#" class="btn btn-danger btn-action" title="Change" onclick="change_post(<?php echo $row->blog_id; ?>)"><i class="fa fa-o"></i> <?php echo $row->popular_post;?></a>
                                <?php
                             }
                             ?>
                   </td>  -->
                        
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/admin_blog/blog_edit/<?php echo $row->blog_id; ?>" class="btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                    <a href="<?php echo base_url(); ?>index.php/admin_blog/delete_blog/<?php echo $row->blog_id; ?>" class="btn-sm btn-danger" onclick="return confirm('are you sure ?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                </td>
                            </tr>
                            <?php }  ?>
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
            alert('Please Select Blog..!');
        }
        var i=0;

        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>index.php/admin_blog/change_active",
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
            alert('Please Select Blog..!');
        }
        var i=0;

        $.ajax(
            {
                type: "POST",
                dataType:'json',
                url:"<?php echo base_url();?>index.php/admin_blog/change_inactive",
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
 <script>
function change_post(id)
{
if(confirm("Are you sure"))
{
  //alert(id);
var baseurl='<?php echo  base_url();?>';

$.ajax({
              
              url:baseurl+'index.php/admin_blog/change_post_status',
              data:{pid:id},
              dataType: "json",
              type: "POST",
              success: function(data){


                var perform= data.changedone;

                      if(perform['status']==1)
                      {
                        
                       var node='<a href="#" class="btn btn-success btn-action" title="Change" onclick="change_post('+id+')"><i class="fa fa-o" ></i>Yes</a>';

                        $("#popular_"+id).html(node);
                      }
                      else
                      {
                        
                        var node='<a href="#" class="btn btn-danger btn-action" title="Change" onclick="change_post('+id+')"><i class="fa fa-o" ></i>No</a>';

                        $("#popular_"+id).html(node);
                      }
                
                  }
              });
//window.location=baseurl+'index.php/manage_category/popularity_change/'+id;


}
}
    </script>
