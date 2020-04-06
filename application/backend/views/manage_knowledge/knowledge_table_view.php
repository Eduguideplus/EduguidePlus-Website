<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

     
      <h1>
         <?php if($this->uri->segment(3)=='knowledge'){ ?>
       Manage Test
       <?php }else{ ?>
       Manage Test
      <?php } ?>
      </h1>
      <small><?php
            $succ_msg=$this->session->flashdata('succ_msg');
            if($succ_msg){
              ?>
              <br><span style="color:green; font-weight: bold">
                <?php echo $succ_msg; ?>
              </span>
              <?php
              }
              ?>
              
              </small>
              
              
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="">Manage Test</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Tests(<?php echo count($kqtest);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
               
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_knowledge/add/<?php echo $this->uri->segment(3);  ?> " class="btn btn-primary btn-action" title="Add"><i class="fa fa-plus-square-o"></i> Create New Test </a>

                <a href="<?php echo base_url();?>index.php/manage_knowledge/add_manual_test/knowledge" class="btn btn-success btn-action" title="Add"><i class="fa fa-plus-square-o"></i> Create Test Manually</a>

              <a href="javascript:void(0)" class="btn btn-warning btn-action" title="Delete" onclick="delete_mult_test()"><i class="fa fa-trash"></i> Delete</a></td>


              <td width="50%">
           
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>
              
                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a> 

                <a href="javascript:void(0)" class="btn btn-warning btn-action" title="Pending" onclick="change_sts_active('pending')"><i class="fa fa-pencil-square-o"></i> Pending</a>
            </td>
            </tr>
            </table>
            
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                 <th>Status</th> 
                  <th>Test Name</th>
                 <!--  <th>TEst Code</th> -->
                  
                  <th>Course->Examination->Subject->Chapter</th>
                 
               <!--    <th>Examination Date & Time</th> -->


                 <!--  <th>Registration Start Date</th>
                  <th>Registration End Date</th> -->
                  <th>No. Of Question</th>
                  <th>Total Marks</th>
                  <th>Total Duration</th>
                 <!--  <th>Examination Fees</th> -->
                  <th>Created On</th>
                  <th>Created By</th>
                  <th>Action</th>
                  
                 
                  

                 
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($kqtest as $row)
               {


$count_enrolled_user= $this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>@$row->kq_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$award_dtls = $this->admin_model->selectone('tbl_user_award','set_id',$row->kq_id);

               ?>
                
                <tr>
                 <td><input type="checkbox" name="record" value="<?php echo @$row->kq_id;?>"></td> 
                  <td>
                 <?php if(@$row->status=='active')
                 {?>
                    <img src="<?php echo base_url();?>../assets/images/active.png">
                 <?php 
                 }
                 elseif(@$row->status=='inactive'){ ?>
                    <img src="<?php echo base_url();?>../assets/images/inactive.png">
                 <?php
                 }else{  ?>

                 <img style="width:35px; height:35px;" src="<?php echo base_url();?>../assets/images/pending1.png">

                 <?php } ?>
                 </td> 
                 
               	 <td><?php echo @$row->set_name;?></td>
                 <!--  <td><?php echo @$row->set_code;?></td> -->
                  
                  <td><?php 
                    $group_dtls = $this->admin_model->selectone('tbl_exam_type','id',$row->group_id);
                    $exam_dtls = $this->admin_model->selectone('tbl_exam_type','id',$row->exam_id);
                    $subject_dtls = $this->admin_model->selectone('tbl_question_section','id',$row->subject_id);
                     $chap_dtls = $this->admin_model->selectone('tbl_chapters','chap_id',$row->chap_id);
                     @$str=@$group_dtls[0]->exam_name.' => '.@$exam_dtls[0]->exam_name.' => '.@$subject_dtls[0]->section_name;
                     if(count($chap_dtls)>0)
                     {
                       $str=$str.' => '.$chap_dtls[0]->chap_name;
                     }
                     echo $str;
                   

                  ?></td>
                
         <!--<td> Date:<?php echo @$row->exam_date;?><br> Time:<?php echo @$row->exam_time;?></td> -->
           <!--<td><?php echo @$row->reg_start_date;?></td>
            <td><?php echo @$row->reg_closing_date;?></td> -->
            <td><a href="<?php echo base_url();?>index.php/manage_knowledge/test_questionlist/<?php echo $row->kq_id; ?>" target="_blank"><?php echo @$row->q_qty;?></a></td>
            <td><?php echo @$row->total_marks;?></td>
            <td><?php echo @$row->exam_duration;?> Seconds</td>
           <!--<td><?php echo @$row->exam_fees;?></td> -->
            <td><?php echo @$row->created_on;?></td>
            <td>
                <?php $user_dtls = $this->admin_model->selectone('tbl_user','id',$row->created_by);
                         echo @$user_dtls[0]->user_name;?></td>
                         <td>
                         <!-- <a href="javascript:void(0)" onclick="enrolled_user(<?php echo @$row->kq_id;?>)" class="btn btn-success btn-action" title="Enrolled User"></i>Enrolled User (<?php echo count($count_enrolled_user); ?>)</a> -->

                         <a href="javascript:void(0)" onclick="enrolled_user(<?php echo @$row->kq_id;?>)" class="btn btn-success btn-action" title="Enrolled User">Enrolled User (<?php echo count($count_enrolled_user); ?>)</a>

                         <a href="javascript:void(0)" onclick="delete_test(<?php echo @$row->kq_id;?>)" class="btn btn-danger btn-action" title="Delete Test"></i>Delete</a>

<!-- <?php if($row->exam_date < date('Y-m-d') && $row->test_type!=4){ 

if(@$award_dtls[0]->award_amount=="" && count($count_enrolled_user)>0){
  ?>

 <a onclick="gen_award(<?php echo @$row->kq_id;?>,'<?php echo @$row->exam_fees;?>')" class="btn btn-success btn-action" title="Generate Award"></i>Generate Award</a> 
<?php }if(@$award_dtls[0]->award_amount!=""){ ?>
   <a href="<?php echo base_url();?>index.php/manage_knowledge/award_list/<?php echo @$row->kq_id;?>/<?php echo $this->uri->segment(3);  ?>" class="btn btn-success btn-action" title="Award List"></i>Award List</a>  
 <?php } }?> -->

<!-- <?php  if(@$row->test_type==4 ){ ?>

 <a href="<?php echo base_url();?>index.php/manage_knowledge/next_level_list/<?php echo @$row->kq_id;?>/<?php echo $this->uri->segment(3);  ?>" class="btn btn-primary btn-action" title="View Level"><i class="fa fa-eye"></i> View Level</a>

<?php } ?> -->
              </td>

                        
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

<script type="text/javascript">
  function enrolled_user(id)
  {
    // alert("ok");
    var baseurl='<?php echo  base_url();?>';
    window.location=baseurl+'index.php/manage_knowledge/enrolled_user/'+id+'/'+'<?php echo $this->uri->segment(3);  ?>';
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
              
             url:base_url+'index.php/manage_knowledge/change_to_active',
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


        function delete_mult_test()
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
              if(confirm('Once you delete the Test all datas related this Test will be removed from Database. Are you sure?'))
                {



            $.ajax({
              
             url:base_url+'index.php/manage_knowledge/delete_multi_test',
             data:{id:ids},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.response;

                 if(perform==1)
                 {
                   alert('Deleted');
                   location.reload();
                 }
                
              }
             });
          }
          }
          else
          {
            alert('Sorry!! please select any Test');
          }
        }
  
        </script>

        <!--  <script type="text/javascript">

   function gen_award(val,reg_fees)
        {
          
            
            $.ajax({
              
             url:'<?php echo base_url(); ?>index.php/manage_knowledge/generate_award',
             data:{set_id:val,reg_fees:reg_fees},
             dataType: "json",
             type: "POST",
             success: function(data){


              
                
              }
             });
        }
  
        </script> -->
<script type="text/javascript">
  function gen_award(val,reg_fees)
  {
    // alert("ok");
    var baseurl='<?php echo base_url();?>';
    window.location=baseurl+'index.php/manage_knowledge/generate_award/'+val+'/'+reg_fees;
  }

  function delete_test(id)
  {
    var baseurl='<?php echo base_url();?>';
    if(confirm('Once you delete the Test all datas related this Test will be removed from Database. Are you sure?'))
    {
      window.location=baseurl+'index.php/manage_knowledge/delete_test/'+id;
    }
  }
</script>
