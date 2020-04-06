<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE EXAMINATION
       
        
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
        <li>Exam-Type</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Examination(<?php echo count($exam_type);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_exam_type/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add </a></td>

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
                  <th>Icon</th>
                  <th>Online Exam</th>


                  <th>Examination</th>
                  <!-- <th>Type</th>
                  <th>Price</th> -->
                   <th>Description</th>
                   <!-- <th>Detail Description</th> -->
                   <th>Exam Id</th>                                                           
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($exam_type as $row)
               {

                    $check_child_subject= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('exam_id'=>$row->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
               ?>
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo $row->id;?>"></td>
                  <td>
                  <?php if($row->status=='Active')
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
                  <?php if($row->icon!=''){?>
                  <img src="<?php echo base_url();?>../assets/uploads/company_logo/<?php echo $row->icon;?>" height="30px" width="30px"> <?php } else { echo 'No Image'; }?>
                   
                 
                  </td>



                  <td id="pro_trending_<?php echo $row->id; ?>">

                                        <?php
                                          if($row->online_exam=="Yes")
                                          {
                                        ?>
                                            <span class="label label-success" onclick="change_online_exam(<?php echo $row->id; ?>)" style="cursor: pointer;"><em>Yes</em></span>
                                        <?php
                                          }
                                          if($row->online_exam=="No")
                                          {
                                        ?>
                                            <span class="label label-danger" onclick="change_online_exam(<?php echo $row->id; ?>)" style="cursor: pointer;"><em>No</em></span>
                                        <?php }?>
                                  </td> 







                  <?php 
                  $p1 = $row->exam_type_id;
                  if($p1 > 0)
                  {
                    $m_cat = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$p1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                  }                  
                  

                  ?>
                  
                
                  <td><?php if($p1 > 0){ echo @$m_cat[0]->exam_name." >> "; } ?><?php echo $row->exam_name;?></td>
                 <!--  <td><?php echo @$row->type;?></td>
                 <td><?php echo @$row->price;?></td> -->
                  <td><?php echo @$row->description;?></td>
                  <!-- <td><?php echo @$row->detail_description;?></td> -->
                 <td><?php echo @$row->id;?></td>

                  
                  <td> <a href="<?php echo base_url();?>index.php/manage_exam_type/edit/<?php echo $row->id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>

                    <?php
                    if(count($check_child_subject)==0)
                      {
                        ?>
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button> 
                    <?php
                  }
                  else{
                    ?>

                 <button type="button" class="btn btn-danger"  title="Please delete Subjects under this Examination before" disabled><i class="fa fa-trash-o"></i></button>
                    <?php
                  }
                  ?>

                   
                   <a href="<?php echo base_url();?>index.php/manage_exam_type/exam_info/<?php echo $row->id;?>" class="btn btn-success" title="Exam Info"><i class="fa fa-graduation-cap"></i></a>


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
window.location=baseurl+'index.php/manage_exam_type/delete/'+id;
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
              
             url:base_url+'index.php/manage_exam_type/change_to_active',
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




        <script type="text/javascript">

          function change_online_exam(id)
          {
            //alert(id);
          
          if(confirm("Are you sure ?"))
          {
          var base_url='<?php echo  base_url();?>';

          $.ajax({
                        
              url:base_url+'index.php/manage_exam_type/online_exam_change',
              data:{pid:id},
              dataType: "json",
              type: "POST",
              success: function(data){


                var perform= data.changedone;

                      if(perform['status']==1)
                      {
                        
                       var node ='<span class="label label-success" onclick="change_online_exam('+id+')" style="cursor: pointer;"><em>Yes</em></span>';

                        $("#pro_trending_"+id).html(node);
                      }
                      else
                      {
                        
                        var node ='<span class="label label-danger" onclick="change_online_exam('+id+')" style="cursor: pointer;">No</em></span>';

                        $("#pro_trending_"+id).html(node);
                      }
                
                  }
              });


}
}
</script>