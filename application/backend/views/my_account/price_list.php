<style type="text/css">
  div.dataTables_filter {
    text-align: left;
}
/*.cus-in-p-clas {
        float: right;
    font-size: 15px;
    font-weight: 600;
}
.cus-in-p-clas span {
    padding-left: 20px;
    font-size: 15px;
}
.cus-in-p-clas {
    float: right;
    font-size: 16px;
    font-weight: 600;
}*/
.total-p-sec-area {
    width: 100%;
    float: left;
    background: #dddddd4f;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.12), 0 2px 4px 0 rgba(0,0,0,0.08);
}
.cus-in-p-clas span {
    font-size: 14px;
    padding-left: 15px;
    color: #333;
}
.cus-in-p-clas {
    width: 50%;
    float: left;
    font-size: 18px;
    color: #00a65a;
    font-weight: 700;
}
.cus-in-p-clas {
    width: 50%;
    float: left;
}
.cus-p-full-table-class {
    width: 100%;
    float: left;
    margin-top: 50px;
}
div#example1_wrapper {
    width: 100%;
    float: left;
}
</style>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE ADDED QUESTION  LIST of ( <?php echo @$all_data[0]->user_name;?> )
       
        
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



              <small><?php
            $succ_update=$this->session->flashdata('succ_update');
            if($succ_msg){
              ?>
              <br><span style="color:green">
                <?php echo $succ_update; ?>
              </span>
              <?php
              }
              ?>
              
              </small>


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
              
              </small>
              <small id="msg" style="color:red"></small>
              
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url()?>index.php/manage_retailer/view_retailer">RM</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total Question(<?php echo count($question_data); ?>)</h3>
            </div>
          
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>" class="btn btn-danger btn-action" title="Add"><i class="fa fa-backward"></i>  Back</a>

              <!-- <a href="<?php echo base_url();?>index.php/manage_education/add_education_excel" class="btn btn-primary btn-action" title="Add"><i class="fa fa-file"></i></i> Upload Excel </a> -->

              </td>

              <td width="50%">
              <!--<span style="padding-left: 80.5%">-->
             <!--  <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_status_rm('active')"><i class="fa fa-check-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_status_rm('inactive')"><i class="fa fa-times" ></i> Inactive</a>
 -->

                 <!-- <a href="javascript:void(0)" class="btn btn-warning btn-action" title="Pending" onclick="change_sts_active_education('pending')"><i class="fa fa-exclamation-triangle" ></i> Pending</a> -->

                <!--<a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>-->
            </td>
            </tr>
            </table>
            
            <div class="box-body">
              <div class="total-p-sec-area">

              <div class="cus-in-p-clas">
                <div class="total-amout">Your Total Earnings ( Rs. ):<span><?php $sub_price=0;
for($i=0; $i<count($question_price); $i++) { 
   
   $sub_price=$sub_price+@$question_price[$i]->price_per_question;
 } 
 echo $sub_price; ?></span></div>
                  <div class="net-amout">Paid Amount ( Rs. ) :<span><?php $paid_price=0;
for($i=0; $i<count($subadmin); $i++) { 
   
   $paid_price=$paid_price+@$subadmin[$i]->paid_amount;
 } 
 echo $paid_price; ?></span></div>
                   
                 <div class="sub-amout">Due Amount ( Rs. ) :<span><?php echo @$sub_price-@$paid_price; ?></span></div>
                
              </div>
<!-- <div class="pay-p-area">

  <?php if(@$sub_price-@$paid_price!=0){ ?>
                <a href="<?php echo base_url();?>index.php/manage_rm/pre_payment_page/<?php echo $this->uri->segment(3); ?>" class="btn btn-success btn-action pull-right" title="Make Payment"> Make Payment  <i class="fa fa-forward"> </i> 
                 </a>
               <?php } ?>
              </div>
              -->
            </div>
            <div class="cus-p-full-table-class">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
               
                <!--   <th>Status</th> -->
                 <!--  <th>User Name</th>
                  <th>User Type</th> -->
                  <th>Examination</th>
                  <th>Subject</th>
                  <th>Question </th>
                  <th>Price/Each Question ( Rs. )</th>
                 <!--  <th>Total Amount</th>
 -->                  <th>Question Added On</th>
                                                                                        
                                                                                          
                  
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($question_data as $row)
               {

         $exam_data=$this->common_model->common($table_name = 'tbl_exam_type
', $field = array(), $where = array('id'=>$row->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');  

$subject_data=$this->common_model->common($table_name = 'tbl_question_section
', $field = array(), $where = array('id'=>$row->section_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');       

$question_price_data=$this->common_model->common($table_name = 'tbl_subadmin_question_add_report
', $field = array(), $where = array('subject_id'=>$row->section_id,'exam_name_id'=>$row->exam_id,'question_id'=>$row->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');    

               ?>
                
                <tr>
                
                 
               <!--    <td><?php echo @$all_data[0]->user_name;?></td> 
               
                   
                  
                 <td><?php echo @$user_type_data[0]->type_name;?></td>-->
                  <td><?php echo @$exam_data[0]->exam_name;?></td>

                  <td>
                    <?php echo @$subject_data[0]->section_name;?>
        
                  </td>   

                  <td><?php echo @$row->question;?></td>

                  <td><?php echo @$question_price_data[0]->price_per_question;?></td>

                


                  <td>
                  <?php echo @$row->created_on;?>
                      
                    </td>
                  

                

                  
               <!--    <td> <a href="<?php echo base_url();?>index.php/manage_rm/edit_rm/<?php echo $row->id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>

                 </td> -->
                </tr>

                <?php
              }
              ?>

 

             


              <!-- <tr>
                <td><b>Total Amount : </b> </td> 
              </tr>


              <tr>
                 <td><?php $sub_price=0;
for($i=0; $i<count($question_price); $i++) { 
   
   $sub_price=$sub_price+@$question_price[$i]->price_per_question;
 } 
 echo $sub_price; ?></td> 

              </tr>
<tr>

 <td><b>Net Paid Amount: </b> </td> <td colspan="2" ><b> <?php if($sub_price!=0){ ?> 9 <?php } ?> </b></td> <td><b> Net Due Amount : </b> </td> <td colspan="2"><b> <?php if($sub_price!=0){ ?> 5  <?php } ?></b></td> </tr> -->

       </tbody>
              </table>
            </div>




              





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


    <div class="modal fade" role="dialog" id="myModal1"  aria-hidden="true" style=" padding: 12px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><span style="margin-left: 20% " ><h4 style="color:red"><b>Hot Deals </h4></span></center>
                   
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <form id="login-form" style="text-align: center" action="<?php echo base_url(); ?>index.php/manage_product/add_date" method="post">
                        <div class="modal-body">

                            <div class="row" >
                            <label>Start Date</label> 
                            <input class="form-control"  name="start_date"  id="datepicker" style="margin-left: 50px; margin-right: 50px;     width: 85%;"  type="text"  required="" >
                        </div>
                       
                        

                         <div class="row mt-top">
                           <label>End date</label>
                            <input  class="form-control" name="end_date"  id="datepicker1" style="margin-left: 50px; margin-right: 50px;width: 85%;"    required="">
                        </div>
                            
                        </div>
                        <div class="modal-footer">
                            <!-- <div>
                                <button type="submit" onclick="login_submit()" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div> -->
                            <div class="add-to-cart text-center">
                                       
                                        <button type="submit" class="btn btn-success" onclick="validate()">Submit</button>
                                      
                                    </div>
                            <div>
                                
                            </div>
                        </div>
                        <input type="hidden" name="product_id" id="pro_id" value="">
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
   
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>




    <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
     <script src="<?php echo base_url();?>custom_script/form_validation/admin_validation.js"></script>

     <script>
      function delete_rm(id)
      {
        window.location.href="<?php echo base_url();?>index.php/manage_rm/delete_rm/"+id;
      }
     </script>


     <script type="text/javascript">

          function click_for_deal(id)
          {
            //alert(id);
          
          if(confirm("Are you sure ?"))
          {
          var base_url='<?php echo  base_url();?>';

          $.ajax({
                        
              url:base_url+'index.php/discussion/change_home_status',
              data:{pid:id},
              dataType: "json",
              type: "POST",
              success: function(data){


                var perform= data.changedone;

                      if(perform['status']==1)
                      {
                        
                       var node='<span class="label label-success" onclick="click_for_deal('+id+')" style="cursor: pointer;"><em>Yes</em></span>';

                        $("#deal_pro_"+id).html(node);
                        var product_id= $("#pro_id").val(id);
                        $("#myModal1").modal('show');
                      }
                      else
                      {
                        
                        var node='<span class="label label-danger" onclick="click_for_deal('+id+')" style="cursor: pointer;"><em>No</em></span>';

                        $("#deal_pro_"+id).html(node);
                      }
                
                  }
              });


}
}</script>


<script>
    function validate()
    {
        
        var datepicker=$('#datepicker').val();
        var datepicker1=$('#datepicker1').val();
       
        if(datepicker=="")
        {
            $("#datepicker").addClass("glowing-border-red");
            return false;
        }
        else
        {
            $("#datepicker").removeClass("glowing-border-red");
        }

         if(datepicker1=="")
        {
            $("#datepicker1").addClass("glowing-border-red");
            return false;
        }
        else
        {
            $("#datepicker1").removeClass("glowing-border-red");
        }
    }
</script>
 

