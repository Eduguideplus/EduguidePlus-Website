<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Manage Negative Mark
        
      </h1>
      <small><?php
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
            $err_delete=$this->session->flashdata('err_delete');
            if($err_delete){
              ?>
              <br><span style="color:red">
                <?php echo $err_delete; ?>
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
              <?php
            $succ_add=$this->session->flashdata('succ_add');
            if($succ_add){
              ?>
              <br><span style="color:green">
                <?php echo $succ_add; ?>
              </span>
              <?php
              }
              ?>
              </small>
              <small id="msg" style="color:red"></small>
              
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Negative Mark(<?php echo count($mark);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
             <!--  <td width="50%"><a href="<?php echo base_url();?>index.php/manage_buyer/add_buyer" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Buyer</a></td> -->

              <td width="50%">
              
          <!--     <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>
 -->
                
            </td>
            </tr>
            </table>
            
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped ">
                <thead class="bg-blue">
                  <tr>
                      <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>
                      <!-- <th>Status</th> -->
                      <th>Test Type</th>
                      <th>Negative Mark (%)</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>

            <?php
              foreach($mark as $row)
              {

                 $id=$row->id;
              
                 $test=$this->common_model->common($table_name ='tbl_test_type', $field = array(), $where = array('test_id'=>$row->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 

            ?> 
               
                
                  <tr>
                      <td><input type="checkbox" name="buyer_check" value="<?php echo $row->id;?>"></td>
                      <!-- <td>
                        <?php
                        if($row->status=='active')
                        { ?>

                          <img src="<?php echo base_url();?>../assets/image/active.png">
                        <?php  

                        } else { ?>

                          <img src="<?php echo base_url();?>../assets/image/inactive.png">

                      <?php   } ?>
                        
                 
                      </td> -->
                                            
                      <td>
                      <?php
                       

                        echo $test[0]->test_name;
                        ?>
                      </td>
                     
                                      
                      <td><?php echo $row->negative_marks;?></td>

                      
                                  
                      <td> <a href="<?php echo base_url();?>index.php/negative_mark/edit_negative/<?php echo $row->exam_id;?>"  class="btn btn-info btn-action" title="Edit"><i class="fa fa-pencil-square-o"></i></a>

                    

                      <!-- <button type="button" class="btn btn-danger" onclick="" title="Delete"><i class="fa fa-trash-o"></i></button> --></td>

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
      //alert(id);
    if(confirm("Are you sure"))
    {
      var baseurl='<?php echo  base_url();?>';
      window.location=baseurl+'index.php/manage_buyer/delete_buyer/'+id;
    }
  }

  </script>
  <script type="text/javascript">

  function check_all()
  {
  
      if ($("#all_chk").is(':checked')) {
            $("input[name=buyer_check]").each(function () {
                $(this).prop("checked", true);
            });

        } 
        else 
        {
            $("input[name=buyer_check]").each(function () {
                $(this).prop("checked", false);
            });
        }
  }
  </script>

  <script type="text/javascript">

       function change_sts_active(val)
        {
          //alert(val);
          
            var pro_ids =[];

            $.each($("input[name='buyer_check']:checked"), function()
            {            
                pro_ids.push($(this).val());
            });

            //alert(pro_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(pro_ids.length>0)
            {

              $.ajax({
              
              url:base_url+'index.php/manage_buyer/change_to_active',
              data:{pid:pro_ids,status:val},
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

    </script>
