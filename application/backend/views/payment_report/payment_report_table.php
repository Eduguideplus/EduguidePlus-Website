<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       PAYMENT REPORT LIST
       
        
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
        <li><a href="<?php echo base_url()?>index.php/manage_category/category_view">Payment List</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
            <td>
              

<form action="<?php echo base_url();?>index.php/payment_report/export_csv" role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group" >

                                            <label for="from_date" class="col-sm-1 control-label">From Date:<span style="color:red">*</span></label>
                                            <div class="col-sm-3">
                                                <input class="form-control" type="text" name="from_date" id="from_date" style="margin-bottom:12px" autocomplete="off" required>
                                                <i class="fa fa-calendar form-control-feedback" style="margin-right:12px"></i>
                                            </div>
                                      

                                         <div class="form-group" >
                                            <label for="to_date" class="col-sm-1 control-label">To Date:<span style="color:red">*</span></label>
                                            <div class="col-sm-3">
                                                <input class="form-control" type="text" name="to_date" id="to_date" style="margin-bottom:12px" autocomplete="off" required>
                                                 <i class="fa fa-calendar form-control-feedback" style="margin-right:12px"></i>
                                            </div>
                                        </div>         
        
              <button class="btn btn-warning " type="submit">
                                          <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                        </i>Payment Report</button>

 <!-- <button class="btn btn-warning " onclick="return booking_search();" type="button">Search booking list</button> -->
            
                                      </form>

            </td>
              <td>
              <!--<span style="padding-left: 80.5%">-->
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

                <!--<a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>-->
            </td>
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                 
                  <th>Status</th>
                  <th>User Name</th>
                  <th>Payment Amount ( Rs. )</th> 
                  <th>Payment For</th>
                  <th>Paid On</th>
                <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>

                  <?php foreach($payment_report as $row)
                  {
                    ?>

              
              
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo $row->id;?>"></td>
                  <td>
                  <?php if($row->status=='active')
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
                  <?php 
                   $name=$this->common->select($table_name ='tbl_user', $field = array(), $where = array('id'=>$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                   echo @$name[0]->user_name;
                  ?>
                  </td>
                  <td><?php echo $row->payment_amount;?></td>
                  <td><?php echo $row->payment_for;?></td>
                  <td><?php echo $row->payment_done_on;?></td>
                  <!-- <td> <a href="<?php echo base_url();?>index.php/vocabulary/edit/<?php echo $row->title_id; ?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->title_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button> </td> -->
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
window.location=baseurl+'index.php/vocabulary/delete_data/'+id;
}
}

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
              
             url:base_url+'index.php/payment_report/change_to_active',
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

 <!--        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   

 <script>

$("#from_date").datepicker({
        
         dateFormat: 'dd-mm-yy',
         autoclose: true,
         todayHighlight: 1,

    });

$('#to_date').datepicker({
        
        dateFormat: 'dd-mm-yy',
        autoclose: true,
        todayHighlight: 1,
  onSelect: function (dateText) {
        // alert('ok');
    var select_time=new Date(dateText).getTime();
    var frm_dt=$("#from_date").val();
    var frm_dt_time=new Date(frm_dt).getTime();
    if(frm_dt_time > select_time)
    {
      alert('To date should be more  than From date.');
      $("#to_date").val('');
    }
    
    }

    });
</script> -->