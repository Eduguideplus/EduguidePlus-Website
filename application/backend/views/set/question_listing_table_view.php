

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       QUESTION LISTING FOR <?php echo $set_dtls[0]->set_name; ?> 
       
        
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
              
     <!--  <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url()?>index.php/manage_set/view">Question Listing</a></li>
        
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total Question(<?php echo $total_question;?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              

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
                <!-- <tr>
                 
                  <th>Question No.</th>
                  <th>Question<th>
                  <th>Answer<th>
                  
                 
                </tr> -->
                </thead>
                <tbody>

              
               <?php
               
              
                for($i=0;$i<count($section);$i++)
                {

                  ?>
                  <tr>
                
                  <td colspan="5" style="font-size:20px; font-weight:bold;text-align:center;">
                  <?php echo $section[$i]->section_name; ?>
                  </td>

                 
                  
                </tr>
                <tr>
                <th>No.</th>
                <th colspan="3">Question</th>
                 <th>Option 1</th>
                  <th>Option 2</th>
                   <th>Option 3</th>
                    <th>Option 4</th>
                     <th>Option5</th>
                      <th>Correct Option</th>
                </tr>
               <?php
               if($section[$i]->id==3)
                  {
                    for($p=0;$p<count($passage_list);$p++)
                    {
                      $passage=$this->common_model->common($table_name = 'tbl_passage', $field = array(), $where = array('id'=>$passage_list[$p]->passage_id,), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                      //print_r($passage);
                      $questn=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('passage_id'=>$passage_list[$p]->passage_id,), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                      $cnt=$p+1;

                      ?>
                      <tr>
                      <td></td>
                      <td colspan="5"><b>Please read the passage carefully and answer the following question.</b>
                      </td></tr>

                  <tr>

                  <td><?php echo '<b>Passage No.'.$cnt.'</b>'; ?></td>
                
                  <td colspan="5" >
                  <?php echo $passage[0]->description; ?>
                  </td>
                  </tr>


                      <?php
                      for($q=0;$q<count($questn);$q++)
                      {

                        ?>

                        <tr>

                  <td><?php echo $q+1; ?></td>
                
                  <td colspan="5" >
                  <?php echo $questn[$q]->question; ?>
                  </td>

                  <?php 
                   $answer_dtls_passage= $this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$questn[$q]->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                  ?>
                  <td><?php if(@$answer_dtls_passage[0]->choice!=''){echo @$answer_dtls_passage[0]->choice;}else{ echo 'NA';}?></td>
                  <td><?php if(@$answer_dtls_passage[1]->choice!=''){echo @$answer_dtls_passage[1]->choice;}else{ echo 'NA';}?></td>
                  <td><?php if(@$answer_dtls_passage[2]->choice!=''){echo @$answer_dtls_passage[2]->choice;}else{ echo 'NA';}?></td>
                  <td><?php if(@$answer_dtls_passage[3]->choice!=''){echo @$answer_dtls_passage[3]->choice;}else{ echo 'NA';}?></td>
                  <td><?php if(@$answer_dtls_passage[4]->choice!=''){echo @$answer_dtls_passage[4]->choice;}else{ echo 'NA';}?></td>
                  <td><?php for($a=0;$a<count(@$answer_dtls_passage);$a++){ if(@$answer_dtls_passage[$a]->is_correct=='Yes'){echo @$answer_dtls_passage[$a]->choice; }}?></td>
                  </tr> 
                        <?php
                      }


                    }
                    
                  }
                  else
                  {
                    $count=1;
                   foreach($set_dtls as $row)
                   {
                    if($row->section_id==$section[$i]->id)
                    {
               ?>
                <tr>

                  <td><?php echo $count; ?></td>
                
                  <td colspan="3" >
                  <?php echo $row->question; ?>
                  </td>
                  <?php 
                   $answer_dtls= $this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$row->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                  ?>
                  <td><?php if(@$answer_dtls[0]->choice!=''){echo @$answer_dtls[0]->choice;}else{ echo 'NA';}?></td>
                  <td><?php if(@$answer_dtls[1]->choice!=''){echo @$answer_dtls[1]->choice;}else{ echo 'NA';}?></td>
                  <td><?php if(@$answer_dtls[2]->choice!=''){echo @$answer_dtls[2]->choice;}else{ echo 'NA';}?></td>
                  <td><?php if(@$answer_dtls[3]->choice!=''){echo @$answer_dtls[3]->choice;}else{ echo 'NA';}?></td>
                  <td><?php if(@$answer_dtls[4]->choice!=''){echo @$answer_dtls[4]->choice;}else{ echo 'NA';}?></td>
                  <td><?php for($a=0;$a<count(@$answer_dtls);$a++){ if(@$answer_dtls[$a]->is_correct=='Yes'){echo @$answer_dtls[$a]->choice; }}?></td>
                  </tr>
                  <?php $count++;}} ?>

               <?php } }
                //$exam=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$row->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                //$set=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('exam_id'=>$row->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
               ?>
                
                
</tbody>
               <tfoot></tfoot> 
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