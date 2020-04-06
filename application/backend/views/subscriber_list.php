<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
    SUBSCRIBER LIST
        
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
        <li><a href="">Customer</a></li>
        
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
              <h3 class="box-title">All Subscriber(<?php echo count($subscriber);?>)</h3>
            </div>
            <!-- /.box-header -->
            <div style="padding-left: 12px;padding-top: 12px;">
           <!-- <button type="button" class="btn btn-primary" onClick="window.location='<?php echo base_url();?>index.php/testimonial/add_testimonial';"><span class="glyphicon glyphicon-plus"></span>Add Testimonial</button>-->
             <span style="float: right;padding-right: 12px;">
              
               <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Subscribe</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> UnSubscribe</a>

                
             </span>
            </div>
            
           <!-- <table width="100%">
            <tr>
              <td width="50%" style="padding-right: 12px;"><a href="<?php echo base_url();?>index.php/testimonial/add_testimonial" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Testimonial</a></td>

              <td width="50%" style="float: right;padding-right: 12px;">
              <!--<span style="padding-left: 80.5%">-->
           <!--   <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

               <!-- <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
            </tr>
            </table>-->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" name="all" id="all_chk" onclick="check_all()"></th>
				          <th>Subscribe</th>
                  
				          <th>Email</th>
                       	
                 
                  <th>Action</th>
                   </tr>
                </thead>
                <tbody>

               
                 <?php foreach($subscriber as $row)
                  {
                  ?>
                <tr>
				
                 
				
                  <td><input type="checkbox" name="record" value="<?php echo $row->id;?>"></td>
                  <td>
                          <?php
                          if($row->status=='active')
                            {
                              ?>
                          <img src="<?php echo base_url();?>images/active.png" alt="active">
                        <?php
                      }
                      else
                        {
                          ?>
                          <img src="<?php echo base_url();?>images/inactive.png" alt="inactive">
                          <?php
                        }
                        ?>
                  </td>
                 
                  <td><?php echo $row->email;?></td>
                  
				          
                  
         <td> 
					<!--<a href="<?php echo base_url();?>index.php/customer/customer_details/<?php echo $row->id; ?>" title="View Details" class="btn btn-success" ><i class="fa fa-eye" aria-hidden="true"></i></a>-->
          <button type="button" class="btn btn-danger" onclick="delete_data(<?php echo $row->id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button>
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
if(confirm("Are you sure"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/subscriber/delete/'+id;
}
}
/*function change_status(id)
{
if(confirm("Are you sure"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/testimonial/change_to_active/'+id;
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

          
            var ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                ids.push($(this).val());
            });

            //alert(ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/subscriber/status_change',
             data:{id:ids,status:val},
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