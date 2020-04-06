<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE PRACTICE TEST PLANS 
       
        
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
        <li><a href="<?php echo base_url()?>index.php/manage_plans/general_view">Plans</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Practice Test Plan(<?php echo count($plans);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%">
<?php if(count($plans)==0){?>
                <a href="<?php echo base_url();?>index.php/manage_plans/general_add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add </a>
<?php } ?>
              </td>

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
                <thead class="bg-blue">
                <tr>
                  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                  <th>Status</th>
                  <th>Test Type</th>
                  <th>Plan Title</th>
                  <th>Plan Code</th>
                  <th>Plan Price</th>
                  <th>Plan Duration</th>
                 
                 <!--  <th>No of Company</th> -->
                  <!-- <th>Total Paper</th> -->
                  

                  <th rowspan="4" >Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
               $counter=1;
               $ids="";
               for($i=0;$i<count($plans);$i++)
               {
                if($i==0)
                {
                  $ids=$plans[$i]->id;
                }
                else
                {
                  $ids=$ids.'-'.$plans[$i]->id;
                }
                
              
                  
               }
                
               foreach($plans as $row)
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
                 
               <td><?php 
                  $test_details = $this->admin_model->selectone('tbl_test_type','test_id',$row->test_type_id);
                 echo @$test_details[0]->test_name;?></td>
                  
                  <td><?php echo @$row->plan_title;?></td>

                   <td><?php echo $row->plan_code;?></td>


                  <td>Rs. <?php echo $row->plan_price;?></td>
                  <td> <?php echo $row->plan_month_duration;?> Months</td>
                
              <!--   <td><?php echo $row->no_of_company;?></td> -->

               
                <!-- <td>(<?php echo @$plan_details[0]->paper_per_company;?> X <?php echo $row->no_of_company;?>) = <?php echo $row->total_paper;?></td> -->
                  <?php if($counter==1){?>
                  
                  <td  > <a href="<?php echo base_url();?>index.php/manage_plans/general_edit/<?php echo $ids;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <!-- <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button> -->
                  </td>
                  <?php } ?>


                </tr>

                <?php
              $counter++;}
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
window.location=baseurl+'index.php/manage_plans/general_delete/'+id;
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
          
            var ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_plans/change_to_active',
             data:{id:ids,status:val},
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