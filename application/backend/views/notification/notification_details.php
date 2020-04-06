<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     NOTIFICATION LIST
       
        
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
             
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Notification</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All NOTIFICATION(<?php echo count($notification); ?>)</h3>
            </div>
            <!-- /.box-header -->
            
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_notification/add_notification" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Notification</a></td>

              <td width="50%">
              <!--<span style="padding-left: 80.5%">-->
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('Y')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('N')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

                <!-- <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a> -->
            </td>
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>
				          <th>Status</th>
				          <th>Notification Text</th>
                  <th>Notification Link</th>	
                  <th>Action</th>
                   </tr>
                </thead>
                <tbody>

               <?php
                
                foreach($notification as $row)
                {
					
                ?>
               
                <tr>
				
                <td><input type="checkbox" name="record" value="<?php echo @$row->notification_id;?>"></td>
				        <td><img src="<?php 

                  $sts=$row->notification_status;
                  if($sts=="Y")
                                    {
                  echo base_url()."images/active.png";
                  }
                  else
                  {
                    echo base_url()."images/inactive.png";
                  }?>">

                </td>
				        
                <td><?php echo $row->notification_text;?></td>
                <td><?php echo $row->notification_link;?></td>
                
				 
				 <td> 
					<a href="<?php echo base_url();?>index.php/manage_notification/edit/<?php echo $row->notification_id;  ?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-danger" onclick="delete_data(<?php echo $row->notification_id;  ?>)" title="Delete"><i class="fa fa-trash-o"></i></button>
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
  if(confirm("Are you sure"))
  {
  var baseurl='<?php echo  base_url();?>';
  window.location=baseurl+'index.php/manage_notification/delete/'+id;
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
          
            var test_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                test_ids.push($(this).val());
            });

            //alert(test_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(test_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_notification/change_to_active',
             data:{id:test_ids,status:val},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.changedone;

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
function delete_selected()
{
	 var gal_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                gal_ids.push($(this).val());
            });

           //alert(gal_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(gal_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/testimonial/delete_selected',
             data:{galid:gal_ids},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.deletedone;

                 if(perform==1)
                 {
                   alert('Selected Items deleted successsfully');
                   location.reload();
                 }
                
                if(perform==2)
                 {
                   alert('Selected Items deleted successsfully');
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