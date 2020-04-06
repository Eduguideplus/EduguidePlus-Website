<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
    Comment List For <?php   $blg_name=$this->common->select($table_name = 'tbl_blog', $field = array(), $where = array('blog_id'=>$blog_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); echo @$blg_name[0]->blog_title;  ?>
        
      </h3>
      <small><?php
            $succ_add=$this->session->flashdata('succ_add');
            if($succ_add){
              ?>
              <br><span style="color:green">
                <?php echo $succ_add; ?>
              </span>
              <?php
              }
              ?>
              
            <?php
            $succ_delete=$this->session->flashdata('succ_delete');
            if($succ_delete){
              ?>
              <br><span style="color:green">
                <?php echo $succ_delete; ?>
              </span>
              <?php
              }
              ?>
              
              <?php
            $succ_update=$this->session->flashdata('succ_update');
            if($succ_update){
              ?>
              <br><span style="color:green">
                <?php echo $succ_update; ?>
              </span>
              <?php
              }
              ?>
              </small>
             
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <!--   <li><a href=""></a></li> -->
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
           <form> 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Comments(<?php echo count($comment);?>)</h3>
            </div>
            <!-- /.box-header -->
            <div style="padding-left: 12px;padding-top: 12px;">
           <!-- <button type="button" class="btn btn-primary" onClick="window.location='<?php echo base_url();?>index.php/testimonial/add_testimonial';"><span class="glyphicon glyphicon-plus"></span>Add Testimonial</button>-->
             <span style="padding-right: 12px;">
              
               <a href="javascript:vocomment_id(0)" class="btn btn-success btn-action" title="Approved"  onclick="change_sts_active('yes')"><i class="fa fa-pencil-square-o" ></i> Approved</a>

                <a href="javascript:vocomment_id(0)" class="btn btn-danger btn-action" title="Cancelled" onclick="change_sts_active('no')"><i class="fa fa-pencil-square-o" ></i> Cancelled</a>

                
             </span>
            </div>
            
           <!-- <table wcomment_idth="100%">
            <tr>
              <td wcomment_idth="50%" style="padding-right: 12px;"><a href="<?php echo base_url();?>index.php/testimonial/add_testimonial" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Testimonial</a></td>

              <td wcomment_idth="50%" style="float: right;padding-right: 12px;">
              <!--<span style="padding-left: 80.5%">-->
           <!--   <a href="javascript:vocomment_id(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:vocomment_id(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

               <!-- <a href="javascript:vocomment_id(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
            </tr>
            </table>-->
            
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-blue">
                  <th><input type="checkbox" name="all" id="all_chk" onclick="check_all()"></th>
				          <th>Approval</th>
                  <th>Name</th>
                   <th>Email Id</th>
                   <th>Website</th>
                  <th>Comment</th>
				          
                       	
                 
                  <th>Action</th>
                   </tr>
                </thead>
                <tbody>

               
                 <?php foreach($comment as $row)
                  {
                  ?>
                <tr>
				
                 
				
                  <td><input type="checkbox" name="record" value="<?php echo $row->comment_id;?>"></td>
                  <td>
                          <?php
                          if($row->approved=='yes')
                            {
                              ?>
                         <span class="label label-success">Approved</span>
                        <?php
                      }
                      else
                        {
                          ?>
                          <span class="label label-danger">Not Approved</span>
                          <?php
                        }
                        ?>
                  </td>
                   <td><?php echo $row->name;?></td>
                    <td><?php echo $row->email;?></td>
                    <td><?php echo $row->website;?></td>
                 <td><?php echo $row->msg;?></td>
                 
                  
				          
                  
         <td> 
					<!--<a href="<?php echo base_url();?>index.php/customer/customer_details/<?php echo $row->comment_id; ?>" title="View Details" class="btn btn-success" ><i class="fa fa-eye" aria-hcomment_idden="true"></i></a>-->
          <button type="button" class="btn btn-danger" onclick="delete_data(<?php echo $row->comment_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button>

        <!--   <a href="<?php echo base_url(); ?>index.php/manage_comment/comment_reply/<?php echo @$row->comment_id; ?>" class="btn-sm btn-primary"><i class="fa fa-pencil" aria-hcomment_idden="true"></i>Reply</a> -->

         <!--  <a href="<?php echo base_url(); ?>index.php/manage_comment/comment_reply_edit/<?php echo @$comment[0]->comment_id; ?>" class="btn-sm btn-primary"><i class="fa fa-pencil" aria-hcomment_idden="true"></i>Edit Reply</a> -->



				 </td>
            </tr>
                <?php
              }
                ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
             </form>

             <a href="<?php echo base_url(); ?>index.php/manage_blog/blog_list" class="btn-sm btn-primary">Back</a>
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
function delete_data2(comment_id)
{
if(confirm("Are you sure"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_comment/delete/'+comment_id;
}
}
/*function change_status(comment_id)
{
if(confirm("Are you sure"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/testimonial/change_to_active/'+comment_id;
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

          
            var comment_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                comment_ids.push($(this).val());
            });

           
            var base_url='<?php echo base_url(); ?>';
            if(comment_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_blog/status_change_comment',
             data:{comment_id:comment_ids,status:val},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform = data.changedone;

                 if(perform==1)
                 {
                   alert('Status changed successsfully');
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

        <script>

  function delete_data(id)
  {
      //alert(id);
    if(confirm("Are you sure"))
    {
      var baseurl='<?php echo  base_url();?>';
      window.location=baseurl+'index.php/manage_blog/delete_comment/'+id;
    }
  }

  </script>