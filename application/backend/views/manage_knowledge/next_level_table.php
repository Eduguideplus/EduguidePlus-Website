<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE KNOCKOUT NEXT LEVEL
       
        
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
        <li><a href="<?php echo base_url()?>index.php/manage_subjects/view">Next Level</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total Level(<?php echo count($level);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>

              <?php if($next_level_stu>1){?>
       <td ><a href="<?php echo base_url();?>index.php/manage_knowledge/add_next_level/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" class="btn btn-success pull-right" style="margin: 10px" title="Create Next level"><i class="fa fa-plus"></i> Create Next level </a></td>
<?php }else{ ?>

  <td ><a href="<?php echo base_url();?>index.php/manage_knowledge/winner_view/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" class="btn btn-success pull-right" style="margin: 10px" title="Create Next level"><i class="fa fa-eye"></i> View Winner </a></td>

<?php } ?>
             <?php if($this->uri->segment(3)=='knowledge'){ ?>
                <td width="50%">  <a href="<?php echo base_url();?>index.php/manage_knowledge/knowledge_view/knowledge" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a></td>

                   <?php }else{ ?>
<td width="50%">  <a href="<?php echo base_url();?>index.php/manage_knowledge/knockout_view/knockout" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a></td>

                    <?php } ?>  
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th> 
                  <!-- <th>Status</th> -->
                  <th>Level</th>
                   <th>Created On </th>
                  <th>Action</th>

                 <th>Next Level Student</th>

                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($level as $key=>$row)
               {

$total_user=$this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$row->set_id,'level_id'=>$row->level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$award_dtls = $this->admin_model->selectone('tbl_user_award','set_id',$row->set_id);

// print_r($award_dtls); exit;
$set_details=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$row->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$to_reg_usr= $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$row->set_id,'level_id'=>$row->level_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');   
        
     $n=count($to_reg_usr);   
        
     $next_lel_stu=($n*25)/100; 

// echo $next_lel_stu;

               ?>
                
                <tr>
                   <td><input type="checkbox" name="record" value="<?php echo @$row->id;?>"></td> 
                 
                  <td>
                  <?php echo 'Level '.@$row->level; ?>
                  </td>
                    



                  <td><?php echo @$row->created_on;?></td>
                  <!-- <td><?php echo @$row->test_id;?></td> -->

                  <td>
<?php if($row->level==1){

 ?>
                   <a href="<?php echo base_url();?>index.php/manage_knowledge/nxt_lvl_enrolled_user/<?php echo @$row->set_id;?>/<?php echo @$row->level_id;?>/<?php echo $this->uri->segment(4); ?>" class="btn btn-success btn-action" title=" View Students"><i class="fa fa-eye"></i></a>
<?php }else{

  

 ?>

                   <a href="<?php echo base_url();?>index.php/manage_knowledge/nxt_lvl_enrolled_user/<?php echo @$row->set_id;?>/<?php echo @$row->level_id;?>/<?php echo $this->uri->segment(4); ?>" class="btn btn-success btn-action" title=" View Students"><i class="fa fa-eye"></i></a>
              
<?php  } ?>
  <?php if(@$next_lel_stu<=1 ){ if(@$award_dtls[0]->award_amount=="" ){?>
 <a onclick="gen_award_for_knock(<?php echo @$row->set_id;?>,'<?php echo @$set_details[0]->exam_fees;?>',<?php echo @$row->level_id;?>)" class="btn btn-success btn-action" title="Generate Award"></i>Generate Award</a> 
<?php }if(@$award_dtls[0]->award_amount!=""){ ?>
   <a href="<?php echo base_url();?>index.php/manage_knowledge/award_list_for_knockout/<?php echo @$row->set_id;?>/<?php echo $this->uri->segment(3);  ?>" class="btn btn-success btn-action" title="Award List"></i>Award </a>  
 <?php } }?>

               </td>
          <td>
<?php 

  
if(round($next_lel_stu)>=2){

 ?> 
                      <a href="<?php echo base_url();?>index.php/manage_knowledge/nxt_lvl_qualified_user/<?php echo @$row->set_id;?>/<?php echo @$row->level_id;?>/<?php echo $this->uri->segment(4); ?>" class="btn btn-success btn-action" title="Next Level Qualified Students"><i class="fa fa-eye"></i></a>
<?php } ?>
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
window.location=baseurl+'index.php/manage_passage/delete/'+id;
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
          
            var sec_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                sec_ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(sec_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_section/change_to_active',
             data:{id:sec_ids,status:val},
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
  function gen_award_for_knock(val,reg_fees,level_id)
  {
     // alert("ok"); alert(val); alert(reg_fees);
    var baseurl='<?php echo base_url();?>';
    window.location=baseurl+'index.php/manage_knowledge/generate_award_for_knockout/'+val+'/'+reg_fees+'/'+level_id;
  }
</script>