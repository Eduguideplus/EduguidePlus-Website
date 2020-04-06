<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE DUMMY MOCK SET
       
        
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
        <li><a href="<?php echo base_url()?>index.php/manage_mock/mock_view">Manage Mock</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Questions(<?php echo count($mock);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_mock/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> <?php if(count(@$mock)>0){echo 'Update'; }else{echo 'Add'; }?> </a></td>

              <td width="50%">
              <!--<span style="padding-left: 80.5%">-->
              <!-- <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>
              
                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a> -->

                <!--<a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>-->
            </td>
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                 <!--  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                 <th>Status</th> -->
                  <th>Question</th>
                  
                  <th>Options</th>
                  <!-- <th>Plan Price</th> -->
                  <th>Correct Answer</th>
                 
                  <!-- <th>No of Company</th> -->
                  <!-- <th>Total Paper</th> -->
                  

                 
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($mock as $row)
               {


               ?>
                
                <tr>
                 <!--  <td><input type="checkbox" name="record" value="<?php echo $row->id;?>"></td> -->
                 <!--  <td>
                 <?php if($row->status=='active')
                 {?>
                    <img src="<?php echo base_url();?>../assets/images/active.png">
                 <?php 
                 }
                 else{ ?>
                    <img src="<?php echo base_url();?>../assets/images/inactive.png">
                 <?php
                 }  ?>
                 </td> -->
                 
               	 <td><?php 
               	 	$question_dtls = $this->admin_model->selectone('tbl_questions','id',$row->qstn_id);
               	 echo @$question_dtls[0]->question;?>                   
                 </td>
                  
                  <td><?php 
                    $choice_dtls = $this->admin_model->selectone('tbl_question_choice','que_id',$row->qstn_id);
                    $serial_arr=array('A','B','C','D','E');
                    for($i=0;$i<count($choice_dtls);$i++)
                    {
                      if(@$choice_dtls[$i]->is_correct=='Yes')
                      {
                        $correct_ans='Correct Answer';
                      
                      }
                      else
                      {
                        $correct_ans='Incorrect Answer';
                      }

                    echo @$serial_arr[$i].'.'.@$choice_dtls[$i]->choice.'<br>';
                  }

                  ?></td>
                  <!-- <td>Rs. <?php echo $row->plan_price;?></td> -->
                  <td> <?php 

                   $choice_dtls = $this->admin_model->selectone('tbl_question_choice','que_id',$row->qstn_id);
                    $serial_arr=array('A','B','C','D','E');
                    for($i=0;$i<count($choice_dtls);$i++)
                    {
                      if(@$choice_dtls[$i]->is_correct=='Yes')
                      {
                        $correct_ans=$serial_arr[$i].'.'.@$choice_dtls[$i]->choice;
                         echo $correct_ans.'<br>';
                      
                      }
                      

                   
                  }

                  ?> </td>
             
               <!--  <td>
                 <?php echo @$row->price_per_set;?>
               </td> -->
                <!-- <td><?php echo $row->no_of_company;?></td> -->

               
                <!-- <td>(<?php echo @$plan_details[0]->paper_per_company;?> X <?php echo $row->no_of_company;?>) = <?php echo $row->total_paper;?></td> -->
                  
                  
                  <!-- <td> <a href="<?php echo base_url();?>index.php/manage_plans/edit/<?php echo $row->id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
                  <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button></td> -->
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
window.location=baseurl+'index.php/manage_plans/delete/'+id;
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