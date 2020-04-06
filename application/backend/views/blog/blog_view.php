<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Articles List</h1>

         <small><?php
            $succ_add=$this->session->flashdata('succ_add');
            if($succ_add){
              ?>
              <br><span style="color:green">
                <?php echo $succ_add; ?>
              </span>
              <?php
              }
              ?>
              
            <?php
            $succ_delete=$this->session->flashdata('succ_delete');
            if($succ_delete){
              ?>
              <br><span style="color:green">
                <?php echo $succ_delete; ?>
              </span>
              <?php
              }
              ?>
              
              <?php
            $succ_update=$this->session->flashdata('succ_update');
            if($succ_update){
              ?>
              <br><span style="color:green">
                <?php echo $succ_update; ?>
              </span>
              <?php
              }
              ?>
              </small>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboad</a></li>
            <li class="active">Articles List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Articles List</h3>
                    </div>
                    <div class="col-md-12" style="">
                    
                        <a href="<?php echo base_url()?>index.php/manage_blog/add_blog" class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>Add New</a>
                         
                         
                   <!--  <button  class="btn btn-sm btn-danger" onclick="delete_multiple()"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button> -->
                    <button  class="btn btn-sm btn-success" onclick="change_status('Active')"><i class="fa fa-check" aria-hidden="true"></i> Active</button>
                    <button  class="btn btn-sm btn-danger" onclick="change_status('Inactive')"><i class="fa fa-times" aria-hidden="true"></i> Inactive</button>
                    </div>
                    <div class="clearfix"></div>
                    <!-- /.box-header -->
                    <div class="box-body about_booking">
                        <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>
                            <tr class="bg-blue">
                                <th><input type="checkbox" id="checkAll" name="checkAll"></th>
                                <th>Status</th>
                                 <th>Image</th>
                                <th>Articles Title</th>
                                                                                              
                                <th>Articles Author</th> 
                                <th>Articles Description</th>
                                
                                <th>Articles Category</th> 
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($career as $job){ ?>
                                <tr>
                                 <td><input type="checkbox" id="check" name="check" value="<?php echo $job->blog_id; ?>"></td>
                                    <td>
                                        <?php if($job->blog_status=='active')
                                        {
            
                                            ?>
                                            <img src="<?php echo base_url();?>../assets/images/active.png" class="img-responsive" >
                                            <?php 
                                        }
                                        else{
                                            ?>
                                             <img src="<?php echo base_url();?>../assets/images/inactive.png" class="img-responsive">
                                             <?php
                                         }
                                         ?>
                                    </td>
                                    <td><?php if(!empty($job->blog_image)){ ?><img src="<?php echo base_url();?>../assets/uploads/blog/<?php echo $job->blog_image; ?>" height="70" width='90' class="img-responsive"><?php } else{ echo 'N/A';} ?> </td>
                                    <td><?php  echo $job->blog_title; ?></td>
                                    <td><?php  echo $job->blog_author; ?></td>
                                    
                                    <td><?php  echo substr($job->blog_description,0,50); ?></td> 
                                    

                                     <td><?php  

                                    $exp_cat_details= $this->common->select($table_name='tbl_blog_category',$field=array(),
             $where=array('id'=>$job->category_id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

                           echo $exp_cat_details[0]->category_name;


                                      ?></td>
                                    
                                    <td class="last_tr">
                                        <a href="<?php echo base_url()?>index.php/manage_blog/edit_blog/<?php echo $job->blog_id; ?>" class="btn-primary btn-sm" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                         <a href="<?php echo base_url()?>index.php/manage_blog/delete_blog/<?php echo $job->blog_id; ?>" class="btn-danger btn-sm" name="" id="" onclick="return confirm('Are you sure ?')" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                         <!--  <?php   $comment=$this->common->select($table_name = 'tbl_blog_comment', $field = array(), $where = array('blog_id'=>$job->blog_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 

                                    if(count($comment)>0)
                                    {
                                        ?>

                                      <a href="<?php echo base_url();?>index.php/manage_blog/comment_view/<?php echo $job->blog_id;?>" class="btn-sm btn-success btn-" title="View Comments"><i class="fa fa-comment-o" aria-hidden="true"></i> (<?php   $comment=$this->common->select($table_name = 'tbl_blog_comment', $field = array(), $where = array('blog_id'=>$job->blog_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); echo count($comment);
                                        ?>)</a><br>

                                        <?php }else { ?>

                                            <a class="btn-sm btn-info btn-" title="No Comments"><i class="fa fa-comment-o" aria-hidden="true"></i> (<?php   $comment=$this->common->select($table_name = 'tbl_blog_comment', $field = array(), $where = array('blog_id'=>$job->blog_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); echo count($comment);
                                        ?>)</a><br>
                                        <?php } ?> -->


                                    </td>
                                </tr>
                              <?php } ?>



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


<script>
    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    


    function change_status(status)
    {
        
        var favorite = [];
        $.each($("input[name='check']:checked"), function(){
            favorite.push($(this).val());
        });

        var value=favorite;
        // alert(status);
        if(value=="")
        {
            alert('Please select atleast one record');
        }
        else
        {
            $.ajax(
                {
                    type: "POST",
                    //dataType:'json',
                    url:"<?php echo base_url(); ?>index.php/manage_blog/blog_change_status",
                    data: {id:value,status:status},
                    dataType: "json",
                    async: false,
                    success: function(data)
                    {

                        //alert(data);
                      
                     var perform= data.changedone;
                   

                 if(perform==1)
                 {
                   alert('Status changed successsfully');
                   location.reload();
                 }
                
              }
                });
        }

    }
</script>