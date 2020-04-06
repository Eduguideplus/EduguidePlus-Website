<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    Exam Redeem List
       
        
      </h1>
      
             
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Exam Redeem List</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Exam Redeem List</h3>
              <span><?php
            $succ_msg=$this->session->flashdata('succ_msg');
            if($succ_msg){
              ?>
              <br><span style="color:green">
                <?php echo $succ_msg; ?>
              </span>
              <?php
              }
              ?>
            
      </span>
      <span><?php
            $del_msg=$this->session->flashdata('del_msg');
            if($del_msg){
              ?>
              <br><span style="color:red">
                <?php echo $del_msg; ?>
              </span>
              <?php
              }
              ?>
            
      </span>
            </div>
            
            <!-- /.box-header -->
            
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/redeem/add_exam_redeem" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Exam Redeem</a></td>

          
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
				          <th>Percentage From</th>
                  <th>Percentage To</th>	
                  <th>Redeem Point</th>
                  <th>Action</th>
                   </tr>
                </thead>
                <tbody>

               <?php
                
                foreach($redeem as $row)
                {
					
                ?>
               
                <tr>
				
                <td><?php echo $row->percentage_from;?></td>
                <td><?php echo $row->percentage_to;?></td>
                  <td><?php echo $row->redeem_point;?></td>
                
				 
				 <td> 
					<a href="<?php echo base_url();?>index.php/redeem/edit_exam_redeem/<?php echo $row->id;  ?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
          <button type="button" class="btn btn-danger" onclick="delete_data(<?php echo $row->id;  ?>)" title="Delete"><i class="fa fa-trash-o"></i></button>
				 </td>
            </tr>
                <?php
              
                }
                ?>
              </tbody>
               
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
  window.location=baseurl+'index.php/redeem/delete_exam_redeem/'+id;
  }
}

</script>
