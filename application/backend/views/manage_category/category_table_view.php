<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE PRACTICE 
       
        
      </h1>
      <small><?php
            $succ_msg=$this->session->flashdata('succ_msg');
            if($succ_msg){
              ?>
              <br><span style="color:green">
                <?php echo $succ_msg; ?>
              </span>
              <?php
              }
              ?>
              
              </small>
              <small id="msg" style="color:red"></small>
              
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url()?>index.php/manage_category/category_view">Category</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Practice Exam(<?php echo count($category_list);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_category/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add </a></td>

              <td width="50%">
              <!--<span style="padding-left: 80.5%">-->
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

                <!--<a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>-->
            </td>
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                  <th>Status</th>
                  <th>Icon</th>
                  <th>Category</th>
                  <th>Exam id</th>                                                             
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($category_list as $row)
               {


               ?>
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo $row->category_id;?>"></td>
                  <td>
                  <?php if($row->category_status=='active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/images/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/images/inactive.png">
                  <?php
                  }  ?>
                  </td>
                  <td>
                  <?php if($row->category_icon!=''){?>
                  <img src="<?php echo base_url();?>../assets/uploads/cat_icon/<?php echo $row->category_icon;?>" height="50px" width="50px"> <?php } else { ?>
                  <img src="<?php echo base_url();?>../assets/uploads/no_img_icon.png" height="50px" width="50px"> 
                  <?php } ?>
                  </td>
                  <?php 
                  $p1 = $row->parent_category;
                  if($p1 > 0)
                  {
                    $m_cat = $this->common_model->common($table_name = 'tbl_category', $field = array(), $where = array('category_id'=>$p1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                  }
                  
        
                  $p2 = @$m_cat[0]->parent_category;
                  //echo $p2;
                  if($p2 > 0)
                  {
                    $p_cat = $this->common_model->common($table_name = 'tbl_category', $field = array(), $where = array('category_id'=>$p2), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                  }
                  

                  ?>
                  
                 <!--  <td><?php if(@$p_cat[0]->category_name!=''){ echo @$p_cat[0]->category_name." >> "; }?><?php if(@$m_cat[0]->category_name!=''){ echo @$m_cat[0]->category_name." >> "; } ?><?php echo $row->category_name;?></td> -->
                  <td><?php if($p2 > 0){ echo @$p_cat[0]->category_name." >> "; }?><?php if($p1 > 0){ echo @$m_cat[0]->category_name." >> "; } ?><?php echo $row->category_name;?></td>
                 <!--  <td><?php echo $row->category_sort_order;?></td> -->

                 <td><?php echo $row->exam_id;?></td>

                  
                  <td> <a href="<?php echo base_url();?>index.php/manage_category/edit/<?php echo $row->category_id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->category_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button></td>
                </tr>

                <?php
              }
              ?>

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </div>
    </div>
    <script>
function delete_data(id)
{
 
if(confirm("Are you sure ?"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_category/delete/'+id;
}
}
/*function change_popularity(id)
{
if(confirm("Are you sure"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_category/popularity_change/'+id;
}
}*/
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
function check_all()
{
  
   if ($("#all_chk").is(':checked')) {
            $("input[name=record]").each(function () {
                $(this).prop("checked", true);
            });

        } 
        else {
            $("input[name=record]").each(function () {
                $(this).prop("checked", false);
            });
          }
}
  </script>

  <script type="text/javascript">

   function change_sts_active(val)
        {
          
            var cat_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                cat_ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(cat_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_category/change_to_active',
             data:{catid:cat_ids,status:val},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.changedone;

                 if(perform==1)
                 {
                   alert('Status changed successsfully.');
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