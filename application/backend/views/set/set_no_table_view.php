<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE EXAMINATION SET QUANTITY 
       
        
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
        <li><a href="<?php echo base_url()?>index.php/manage_set/view">Examination Set Quantity</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total Set Quantity(<?php echo count(@$set_no);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_set/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add </a></td>

              <td width="50%">
              <!--<span style="padding-left: 80.5%">-->
             <!--  <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a> -->

                <!--<a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>-->
            </td>
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                  <th>Examination Name</th>
                  <th>Set Name</th>
                  <th>Examination Set Quantity</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($set_no as $row)
               {
                $exam=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$row->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                $set=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('exam_id'=>$row->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
               ?>
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo @$row->id;?>"></td>
                  <!--<td>
                  <?php if($row->status=='Active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/images/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/images/inactive.png">
                  <?php
                  }  ?>
                  </td>-->
                  <td>
                  <?php echo @$exam[0]->exam_name; ?>
                  </td>
                  <td> <?php 
                  for($i=0;$i<count($set);$i++)
                  {
                    echo @$set[$i]->set_name.'<br>';
                  }

                  ?></td>
                  <td> <?php echo count($set); ?></td>
                  <td> <a href="<?php echo base_url();?>index.php/manage_set/edit/<?php echo @$row->exam_id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <!-- <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo @$row->exam_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button> --></td>
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
window.location=baseurl+'index.php/manage_set/delete/'+id;
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
          
            var com_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                com_ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(com_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_company/change_to_active',
             data:{id:com_ids,status:val},
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