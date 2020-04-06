<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE SUBJECT/SECTION 
       
        
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
              <h3 class="box-title">Total Subject(<?php echo count($section);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_section/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add </a></td>

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
                  <th>Group Name -> Exam Name -> Subject Name</th>
                  <th>Subject Id</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($section as $row)
               {
                    $check_chapter= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('sub_id'=>$row->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

               ?>
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo @$row->id;?>"></td>
                  <td>
                  <?php if(@$row->section_status=='active')
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

                    $exam_dtls=$this->admin_model->selectone('tbl_exam_type','id',$row->exam_id);

                    $group_id=@$exam_dtls[0]->exam_type_id;

                    $group_dtls=$this->admin_model->selectone('tbl_exam_type','id',$group_id);


                  echo @ $group_dtls[0]->exam_name.'>>'.@$exam_dtls[0]->exam_name.'>>'.@$row->section_name; ?><?php /*if($row->id==3){echo '  (*This Section is reserved for passage only.)'; }*/ ?>
                  </td>
                  <td><?php echo @$row->id;?></td>
                  <td> <a href="<?php echo base_url();?>index.php/manage_section/edit/<?php echo @$row->id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
                 
<?php
if(count($check_chapter)==0)
{
  ?>
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo @$row->id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button>
                    <?php
                  }
                  else{
                    ?>
                  <button type="button" class="btn btn-danger" title="Please delete all chapters under this subject before" disabled><i class="fa fa-trash-o"></i></button>
                  <?php
                }
                ?></td>
              
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
window.location=baseurl+'index.php/manage_section/delete/'+id;
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