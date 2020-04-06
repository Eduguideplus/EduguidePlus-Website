 <?php
    $role_id= $this->session->userdata('session_role_id');
 ?>      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         HELP DESK DOCUMENT
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Help Desk Document</li>
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <form>

           <div style="padding-left: 12px;"><?php echo $this->session->flashdata('msg'); ?> </div>
            <div class="box-body table-responsive">

           
              <table id="example1" class="table table-bordered table-striped myTable1">
              
               <thead>
                <tr>
                  <th width="50px;">Sl No</th>
                  <th>Tittle</th>
                  <th>Help File</th>
                  <?php
                    if($role_id==1)
                   {
                  ?>
                  <th>Action</th>
                  <?php } ?>
                </tr>
               </thead>

               <tbody>
                <?php
                if(count($help) > 0)
                {
                  $i=1;
                  foreach($help as $row)
                  {
                     
                ?>
                  
                    <tr>
                        <td><?php echo $i;?>.</td>
                        <td><?php echo $row->tittle;?></td>
                        <td>
                      <?php
                      if($row->help_file!='') {
                      ?>                                            
                      <embed src="<?php echo base_url();?>uploads/helpdesk/<?php echo $row->help_file;?>" alt="Photo" height="100px;" width="100px;"></embed><br>

                       <a class="btn btn-success" target="_blank" href="<?php echo base_url();?>uploads/helpdesk/<?php echo $row->help_file;?>" title="View" ><i class="fa fa-eye"></i></a>
                         <a class="btn btn-primary" href="<?php echo base_url().'index.php/helpdesk/download_document/'.$row->help_file;?>" title="Download" ><i class="fa fa-download"></i></a>
                      <?php  } 
                      else{
                        echo "<font color='red'>Not Available</font>";
                      }
                      ?>

                        </td>
                        <?php
                          if($role_id==1)
                           {
                          ?>
                        <td>
                          
                             <a href="<?php echo base_url(); ?>index.php/helpdesk/edit/<?php echo $row->id; ?>" class="btn btn-info" ><i class="fa fa-pencil-square-o"></i></a>
                             <a type="button" class="btn btn-danger" onclick="delete_data('<?php echo $row->id; ?> ')" href="#" ><i class="fa fa-trash-o"></i></a>

                        </td>
                        <?php } ?> 
                     </tr>
                      <?php
                   $i++; } } 
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- ////////////////////////////////////////////////////////////////////////////////// -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$("#checkAll").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
<script type="text/javascript">

  
function client_active() {
  var checkboxValue = [];
            $.each($("input[name='check[]']:checked"), function(){            
                checkboxValue.push($(this).val());
            });
 
  
    var value=checkboxValue.join(",");
    

 var dataString = { 'id': value };
   
    

     $.ajax(
     {  
     
         type: "POST",  
         url:"<?php echo base_url();?>index.php/client/client_active",  
         data: dataString,
         async: false,  
         success: function(data)
          { 
             //alert(data);
             alert('Status changed successsfully');
             location.reload();
          }

  
 
     });
        
  return false;
}

function client_in_active() {
  var checkboxValue = [];
            $.each($("input[name='check[]']:checked"), function(){            
                checkboxValue.push($(this).val());
            });
 
  
    var value=checkboxValue.join(",");
    

 var dataString = { 'id': value };
   
    

     $.ajax(
     {  
     
         type: "POST", 
         url:"<?php echo base_url();?>index.php/client/client_in_active",  
         data: dataString,
         async: false,  
         success: function(data)
          { 
             //alert(data);
             alert('Status changed successsfully');
             location.reload();
          }

  
 
     });
        
  return false;
}

function delete_data(id)
{
  if(confirm('are you sure ?'))
{
  window.location='<?php echo base_url(); ?>index.php/helpdesk/delete_data/'+id ;
}
}


function delete_selected() {
  var favorite = [];
            $.each($("input[name='check[]']:checked"), function(){            
                favorite.push($(this).val());
            });
 //alert(favorite.join(","));
  
    var value=favorite.join(",");
    //var value=favorite;

 var dataString = { 'id': value };
   
    //alert(dataString);

     $.ajax(
     {  
     
         type: "POST",
         dataType:'text',  
         url:"<?php echo base_url();?>index.php/course_details/multi_delete",  
         data: dataString,
         async: false,  
         success: function(data)
          { 
             //alert(data);
             alert('Deleted successsfully');
             location.reload();
           }

  
 
     });
        
  return false;

}



</script>

  