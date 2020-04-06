<?php 
 $CI= & get_instance();
 $admin_details=$CI->session_check_and_session_data->admin_session_data();
 
        $sess_user_id = $this->session->userdata('session_user_id');
        $user_data = $this->common_model->common($table_name='tbl_user',$field=array(), $where=array('id'=>$sess_user_id), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

        $user_role = $user_data[0]->role_id;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
     
              <small id="msg" style="color:red"></small>
              <p style='color:green'>
              <?php

                 if ($this->session->flashdata('subscription_plan_message') != "") {
                    echo $this->session->flashdata('subscription_plan_message');
                 }

                 if ($this->session->flashdata('doctor_inserted_msg') != "") {
                    echo $this->session->flashdata('doctor_inserted_msg');
                 }

                 if ($this->session->flashdata('message') != "") {
                    echo $this->session->flashdata('message');
                 }

              ?>
              </p>

              <p style="color: green;">
                <?php
                 if ($this->session->flashdata('flash_msg') != "") {
                    echo $this->session->flashdata('flash_msg');
                 }
                ?>
              </p>
              
              <p style="color: red;">
                <?php
                 if ($this->session->flashdata('error_msg') != "") {
                    echo $this->session->flashdata('error_msg');
                 }
                ?>
              </p>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url()?>index.php/renewal_list">Docotor list</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->







        <table class="table table-striped table-bordered bootstrap-datatable ">
          <tr>
            <td>
              <form method="post" action="<?php echo base_url('index.php/renewal_list/renewal_doctor_search');?>" id="search_form">
                <center>
                  
                  
                    <!-- <select name="renew_type" id="renew_type" class="col-lg-2" style="height: 33px;>
                      <option value="0">---Select renew type---</option>
                      <option value="upcoming_renewed">Upcoming Renewal</option>
                      <option value="renewed" selected>Renewed</option>
                    </select> -->
                    <input type="hidden" name="renew_type" value="renewed">

                    <select name="search_month" id="search_month" class="col-lg-2" style="height: 33px;">
                      <option value="0">---Select Month---</option>
                      <?php
                      for($i = 1 ; $i <= 12; $i++)
                      {
                        ?>
                        <option value='<?php  echo date("F",mktime(0,0,0,$i,1,date("Y")));?>' <?php if( isset($_GET['search_month']) && $search_month==date("F",mktime(0,0,0,$i,1,date("Y"))) ) { echo "selected"; } ?> ><?php echo date("F",mktime(0,0,0,$i,1,date("Y")));?></option>
                        <br />
                        <?php
                      }
                      ?>
                    </select>

                    <select name="search_year" id="search_year" class="col-lg-2" style="height: 33px;">
                      <option value="0">---Select Year---</option>
                      <?php
                      $current_year = date('Y');
                      //echo $current_year;
                      for($i = $current_year+10 ; $i >= $current_year-20; $i--)
                      {
                        ?>
                        <option value='<?php echo $i;?>'><?php echo $i;?></option>
                        <br />
                        <?php
                      }
                      ?>
                    </select>


                    <input type="submit"  value="Search"  onclick="return validate_search_form()" class="btn btn-success col-lg-1">
                  

                </center>


                <span style="padding-left:1%;" ><a style="font-size: 0.9em;" class="btn btn btn-success" href="<?php echo base_url('index.php/renewal_list/renewal_list_with_incomplete_document?ref=renewal_list') ?>" title="Renewal doctors with incomplete document">Doctors with incomplete document</a></span>

                <span style="padding-left:4px;" ><a class="btn btn btn-success" href="#" title="Print All" onclick="print_data();return false;"> <i class="fa fa-print" aria-hidden="true"></i>  </a></span>

                <span style="padding-left:4px;" ><a class="btn btn btn-success" href="<?php echo base_url('index.php/renewal_list/renewal_list_csv_report'); ?>" title="Export CSV">Export CSV</a></span>
                
              </form>
            </td>
          </tr>
        </table>




        <script>

          function print_data()
          {
            var divToPrint=document.getElementById("print_content");
            //table.border = "1";
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
          }
          $('button').on('click',function(){
            printData();
          })
        </script>




            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Doctor List (<?php echo count($doctor_list);?>)</h3>
              <?php 

              if ($this->session->flashdata('doctor_renewed_msg') != "") {
                echo "<br/>".$this->session->flashdata('doctor_renewed_msg');
              } 

              ?>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <!--<td width="50%"><a href="<?php echo base_url();?>index.php/manage_category/add_category" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Category</a></td>-->

              <td width="50%">
              <span style="padding-left: 10px">

              <!--<a href="#" onclick="openAddModel()" class="btn btn-primary btn-action" title="Active"  ><i class="fa fa-pencil-square-o" ></i>Add Plan</a>-->


                <!--<a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>-->
            </td>
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-blue" style="font-size: 0.85em;">
                 <!-- <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>-->
                  <th>SL No</th>
                  
                  <!--<th style="font-size: 0.8em;">SL No</th>-->
                  <th>Name/Phone No</th>
                  
                  <th>Speciality<br/>& Plan</th>
                  <th>Degree &<br/> Reg/Year</th>
                  <th>Policy No/<br/>Membership No</th>
                  <th>Insurance Cov/<br/>Legal Service</th>
                  <th>Insurance<br/>amount</th>
                  <th>Medeforum<br/>Amount</th>
                  <th>Last<br/>Renewed<br/>DT</th>
                  <th>Next<br/>Renewal<br/>DT</th>
                  <th>Marketing staff<br/>name/Phone No.</th> 

                 <?php
                   if(
                     @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('email_settings/send_mail_action',$this->session->userdata('session_user_id'))=='Y' || 
                   $admin_details[0]->role_id==1)
                   { ?>
                  <th>Auto email</th> 
                  <th>Auto SMS</th>
                  <?php } ?> 
                  <th>Action</th>                                     
                 <!--  <th>State</th>
                  <th>City</th>
                  <th>Address</th> -->
                </tr>
                </thead>
                <tbody>

              <?php
              // echo "<pre>"; print_r($doctor_list); echo "</pre>";
              $sl_no = 1;

              foreach($doctor_list as $row)
              {


              ?>
              
                <tr style="font-size: 0.85em;">
                 <!-- <td><input type="checkbox" name="record" value="<?php echo $row->user_id;?>"></td>-->
                  <td><b><?php echo $sl_no++; ?></b></td>
                  
                  <td><b>

                  <a href="<?php echo base_url('index.php/doctor_list/doctor_details'); ?>/<?php echo $row->user_id; ?>/renewal" target="_blank"><?php echo $row->full_name; ?></a>
                 
                  /<?php echo $row->mobile_no; ?></b>
                  <?php
                  if($row->renew_count>0){
                    ?>
                    <?php
                    if($row->renewal_date>date('Y-m-d')){
                      ?>
                  <label style="background-color: #8bc34a; padding: 3px; color:#fff">Renewal</label>
                  <?php
                }
                else{
                  ?>
                   <label style="background-color: #d6180a; padding: 3px; color:#fff">Lapsed</label>
                   <?php
                 }

                }
                else{
                  if($row->renewal_date>date('Y-m-d'))
                  {
                  ?>
                <label style="background-color: #3f51b5; padding: 3px; color:#fff">Enrolled</label>
                <?php
                  }
              else{
                ?>
                 <label style="background-color: #d6180a; padding: 3px; color:#fff">Lapsed</label>
                <?php
                  }
                }
              ?></td>
                 
                  <td><b>
                  <?php

                    $spe_id = $row->specilality_id; 
                    $spec_name = @$this->common_model->common($table_name='specialization',$field=array(), $where=array('id'=>$spe_id), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='0',$end='1')[0]->role;
                    echo str_replace("(", "<br/>(", $spec_name) ."/<br/>";

                    switch ($row->plan_id) {
                      case 1:
                          echo "Normal";
                        break;

                      case 2:
                          echo "High Risk";
                        break;

                      case 3:
                          echo "Combo";
                        break;
                      
                      default:
                          echo "";
                        break;
                    }

                  ?></b>
                  </td>
                  <td><b><?php echo $row->qualification."/<br/>".$row->medical_reg_no."/<br/>".$row->medical_reg_year; ?></b></td>

                  <td><b><?php if($row->policy_no!="") {echo $row->policy_no;} else {echo "NA";};  ?>/<br><?php echo $row->membership_no; ?></b></td>
                  <td><b><?php echo $row->legal_service." Lakh"; ?></b></td>
                  <td style="max-width: 80px;word-break: break-all;"><b><?php
                  if ($row->insurance_amount == "" || $row->insurance_amount == 0) {
                    echo "N/A";
                  } else {
                     

                   echo "Rs." .$row->insurance_amount."/-"; 
                     

                   }
                    ?></b></td>
                  
                                                                   
                  <td><b><?php
                  if ($row->medeforum_amount != "") {
                     echo "Rs." .$row->medeforum_amount."/-";
                  } else {echo "N/A";}
                    ?>
                    <?php // echo "Rs." .$row->medeforum_amount."/-"; ?></b></td>

                    <td>
                      <?php 
                        $renew_history_data = $this->common_model->common($table_name='tbl_renew_history',$field=array(), $where=array('renew_doctor_id'=>$row->user_id), $where_or=array(),$like=array(),$like_or=array(),$order=array('id'=>'DESC'),$start='0',$end='1');
                        //echo "<pre>"; print_r($renew_history_data); echo "</pre>";
                        //echo $renew_history_data[0]->renewed_date;

                        $renewed_dt_obj = @$renew_history_data[0]->renewed_date;
                        $renewed_dt = date("d/m/Y", strtotime(@$renew_history_data[0]->renewed_date));
                        if($renewed_dt_obj!=''){
                          echo '<b>'.$renewed_dt.'</b>';
                        }
                        else{
                         echo "N/A";
                        }
                        
                      ?>
                   </td>

                  <td><b><?php
                  
                 // $myDateTime = DateTime::createFromFormat('Y-m-d', $row->renewal_date);
                  //$newDateString = $myDateTime->format('d/m/Y');
                 $originalDate = $row->renewal_date;
                 $newDate = date("d/m/Y", strtotime($originalDate));

                  echo $newDate;
                  
                   //echo $newDateString; ?></b></td>
                  <td><b>
                   <?php


                   $created_by_id = $row->created_by;
                   if ($row->agent_name!="") {
                       $created_by_name = $row->agent_name;
                   } else {
                      $created_by_name = $this->common_model->common($table_name='tbl_user',$field=array(), $where=array('id'=>$created_by_id), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='0',$end='1')[0]->full_name;
                   }



                   if ($row->agent_phone!="") {
                      $created_by_phone = $row->agent_phone;
                   } else {
                      $created_by_phone = $this->common_model->common($table_name='tbl_user',$field=array(), $where=array('id'=>$created_by_id), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='0',$end='1')[0]->mobile_no;
                   }


                   echo  $created_by_name."/<br/>".$created_by_phone;

                   ?>
                   </b></td>




                 <?php
                   if(
                     @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('email_settings/send_mail_action',$this->session->userdata('session_user_id'))=='Y' || 
                   $admin_details[0]->role_id==1)
                   { ?>

                   <td>
                      <span id="auto_mail-<?php echo $row->user_id; ?>" onclick="change_auto_mail_status(<?php echo $row->user_id; ?>);">
                     <?php
                     if ($row->auto_email_send == 'Y') { ?>
                         <i style="color: green;font-size: 2.4em;cursor: pointer;" class="fa fa-check-circle" aria-hidden="true"></i>
                      <?php } else if($row->auto_email_send == 'N') { ?>
                         
                      <i style="color: red;font-size: 2.4em;cursor: pointer; " class="fa fa-close" aria-hidden="true"></i>
                     <?php } ?>
                      </span>
                   </td> 

                   <td>
                      <span id="auto_sms-<?php echo $row->user_id; ?>" onclick="change_auto_sms_status(<?php echo $row->user_id; ?>);">
                     <?php
                     if ($row->auto_sms == 'yes') { ?>
                         <i style="color: green;font-size: 2.4em;cursor: pointer;" class="fa fa-check-circle" aria-hidden="true"></i>
                      <?php } else if($row->auto_sms == 'no') { ?>
                      <i style="color: red;font-size: 2.4em;cursor: pointer; " class="fa fa-close" aria-hidden="true"></i>
                     <?php } ?>
                      </span>
                  </td>

                   <?php } ?>
                   <td>


                    <a class="btn btn-success btn-sm" title="View" href="<?php echo base_url('/index.php/doctor_list/doctor_details/'.$row->user_id.'/renewal') ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>


                    
                    <?php
                     if(
                      @$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('doctor_list/edit_doctor',$this->session->userdata('session_user_id'))=='Y' ||
                      $user_role == 1)
                    { ?>
                    <a class="btn btn-success btn-sm" title="Edit" href="<?php echo base_url(); ?>index.php/doctor_list/edit_doctor/<?php echo $row->user_id;?>"><i class="fa fa-pencil-square-o"></i></a>
                    <?php } ?>
                    

                    
                  
                  <?php
                    $doc_by_uid_photo = $this->common_model->common($table_name='tbl_doctor_document',$field=array(), $where=array('user_id'=>$row->user_id,'document_type_id'=>1), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

                    $doc_by_uid_bond = $this->common_model->common($table_name='tbl_doctor_document',$field=array(), $where=array('user_id'=>$row->user_id,'document_upload_year'=>date('Y'),'document_type_id'=>2), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

                    $doc_by_uid_cheque = $this->common_model->common($table_name='tbl_doctor_document',$field=array(), $where=array('user_id'=>$row->user_id,'document_upload_year'=>date('Y'),'document_type_id'=>4), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

                    $doc_by_uid_form = $this->common_model->common($table_name='tbl_doctor_document',$field=array(), $where=array('user_id'=>$row->user_id,'document_type_id'=>6), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

                    $doc_by_uid_cons = $this->common_model->common($table_name='tbl_doctor_document',$field=array(), $where=array('user_id'=>$row->user_id,'document_upload_year'=>date('Y'),'document_type_id'=>7), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');
                    
                  ?>
                  
                  
                  
                  <?php
                  if (count($doc_by_uid_bond) == 0 || count($doc_by_uid_cheque) == 0 || count($doc_by_uid_form) == 0 || count($doc_by_uid_cons) == 0) { ?>
                      <a id="blinkbtn" target="_blank" href="<?php echo base_url('/index.php/doctor_list/doctor_details/'.$row->user_id.'?tab=doctor_documents') ?>" class="btn btn-primary btn-sm" title="Document"><i class="fa fa-file" aria-hidden="true"></i></a><br/>
                 <?php  } else { ?>

                    <a  target="_blank" href="<?php echo base_url('/index.php/doctor_list/doctor_details/'.$row->user_id.'?tab=doctor_documents') ?>" class="btn btn-primary btn-sm" title="Document"><i class="fa fa-file" aria-hidden="true"></i></a><br/>
                    <?php }
                    ?>
                     


                    <?php
                     if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('renewal_list/renew_doctor',$this->session->userdata('session_user_id'))=='Y' || $user_role == 1)
                    { ?>
                    <a class="btn btn-danger btn-sm" title="Renew" href="<?php echo base_url('/index.php/renewal_list/renewal/'.$row->user_id.'/renewal') ?>" ><b style="font-size: 1.2em;">R</b></a>
                    <?php }  else { ?>
                         <a style="cursor: not-allowed; opacity: 0.5;" href="#" onclick="return false;" class="btn btn-danger btn-sm" title="Not allowed"><b style="font-size: 1.2em;">R</b></a>
                    <?php } ?>

                   

                    <a class="btn btn-info btn-sm" title="Send mail" href="javascript:void(0);"  onclick="sendmail(<?php echo $row->user_id; ?>);"><span style="font-size: 0.8em;"><i class="fa fa-envelope" aria-hidden="true"></i></span></a>

                    <a class="btn btn-info btn-sm" title="Send SMS" href="javascript:void(0);"  onclick="sendsms(<?php echo $row->user_id; ?>);"><span style="font-size: 0.8em;"><i class="fa fa-comment" aria-hidden="true"></i></span></a>


                   
                    <a class="btn btn-success btn-sm" title="Resend bond" href="javascript:void(0);" id="resend_bond_<?php echo $row->user_id; ?>" onclick="resend_bond(<?php echo $row->user_id; ?>,'<?php echo $row->email; ?>');"><span style="font-size: 0.8em;"><i class="fa fa-paper-plane" aria-hidden="true"></i></span></a>

                    <a class="btn btn-primary btn-sm" title="Resend money reciept" href="javascript:void(0);" id="resend_money_reciept_<?php echo $row->user_id; ?>" onclick="resend_money_reciept(<?php echo $row->user_id; ?>,'<?php echo $row->email; ?>');"><span style="font-size: 0.8em;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></span></a>

                   

                   </td>
                </tr>
<?php } ?>


           <thead>
                <tr>
                  
                  <th style="font-size: 0.85em;"></th>
                  
                  <th style="font-size: 0.85em"></th>
                  <th style="font-size: 0.85em;"></th>
                  <th style="font-size: 0.85em;"></th>
                  <th style="font-size: 0.85em;"></th>

                  <th style="font-size: 0.85em;">Total</th>
                  <th style="font-size: 0.85em;">

                  <?php

                  //echo "<pre>"; print_r($doctor_list[0]); echo "</pre>";
                  $ins = 0;
                  $medf_amnt = 0;
                  foreach ($doctor_list as $doctor) {
                    //echo "<pre>"; print_r($doctor->insurance_amount); echo "</pre>";
                    $ins+= $doctor->insurance_amount;
                    $medf_amnt+= $doctor->medeforum_amount;
                  }

                  echo "Rs. ".$ins."/-";

                  ?>

                  </th>
                  <th style="font-size: 0.85em;">

                  <?php

                  echo "Rs. ".$medf_amnt."/-";

                  ?>

                  </th>

                  <th style="font-size: 0.85em;"></th>
                  <th style="font-size: 0.85em;"></th>  
                  <th style="font-size: 0.85em;"></th>                                     
                 <!--  <th>State</th>
                  <th>City</th>
                  <th>Address</th> -->
                </tr>
                </thead>
               



                </tfoot>
              </table>




            
              <!-- Content to be print -->
              <div id="print_content">


              <style type="text/css">
                #print_content td {
                   max-width: 120px; word-break: break-all;border: solid 1px #777;
                }
              </style>

              <h3 class="box-title">Renewal List (<?php echo count($doctor_list);?>)</h3>
              <table id="tbltoprint" class="table table-bordered table-striped">
                <thead>
                <tr style="font-size: 0.85em;border: solid 1px #777;">
                  <th>SL No</th>
                  
                  <!--<th style="font-size: 0.8em;">SL No</th>-->
                  <th>Name/Phone No</th>
                  
                  <th>Speciality<br/>& Plan</th>
                  <th>Degree &<br/> Reg/Year</th>
                  <th>Policy No/<br/>Membership No</th>
                  <th>Insurance Cov/<br/>Legal Service</th>
                  <th>Insurance<br/>amount</th>
                  <th>Medeforum<br/>Amount</th>
                  
                  <th>Last<br/>Renewed<br/>DT</th>
                  <th>Next<br/>Renewal<br/>DT</th>
                  <th>Marketing staff<br/>name/Phone No.</th>  
                                                     
                 <!--  <th>State</th>
                  <th>City</th>
                  <th>Address</th> -->
                </tr>
                </thead>
                <tbody>

              <?php
              // echo "<pre>"; print_r($doctor_list); echo "</pre>";
              $sl_no = 1;

              foreach($doctor_list as $row)
              {


              ?>
              
                <tr style="font-size: 0.85em; margin: 2px;">
                   <td><b><?php echo $sl_no++; ?></b></td>
                  
                  <td style="max-width: 150px;"><b><?php echo $row->full_name; ?>/<br/><?php echo $row->mobile_no; ?></b></td>
                 
                  <td><b>
                  <?php

                    $spe_id = $row->specilality_id; 
                    $spec_name = @$this->common_model->common($table_name='specialization',$field=array(), $where=array('id'=>$spe_id), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='0',$end='1')[0]->role;
                    echo $spec_name."/<br/>";

                    switch ($row->plan_id) {
                      case 1:
                          echo "Normal";
                        break;

                      case 2:
                          echo "High Risk";
                        break;

                      case 3:
                          echo "Combo";
                        break;
                      
                      default:
                          echo "";
                        break;
                    }

                  ?></b>
                  </td>
                  <td><b><?php echo $row->qualification."/<br/>".$row->medical_reg_no."/<br/>".$row->medical_reg_year; ?></b></td>

                  <td><b><?php if($row->policy_no!="") {echo $row->policy_no;} else {echo "NA";};  ?>/<br><?php echo $row->membership_no; ?></b></td>
                  <td><b><?php echo $row->legal_service." Lakh"; ?></b></td>
                  <td><b><?php
                  if ($row->insurance_amount == "" || $row->insurance_amount == 0) {
                    echo "N/A";
                  } else {
                     echo "Rs." .$row->insurance_amount."/-";
                   }
                    ?></b></td>
                  
                                                                   
                  <td><b><?php
                  if ($row->medeforum_amount != "") {
                     echo "Rs." .$row->medeforum_amount."/-";
                  } else {echo "N/A";}
                    ?>
                    <?php // echo "Rs." .$row->medeforum_amount."/-"; ?></b></td>





                    <td>
                      <?php 
                        $renew_history_data = $this->common_model->common($table_name='tbl_renew_history',$field=array(), $where=array('renew_doctor_id'=>$row->user_id), $where_or=array(),$like=array(),$like_or=array(),$order=array('id'=>'DESC'),$start='0',$end='1');
                        //echo "<pre>"; print_r($renew_history_data); echo "</pre>";
                        //echo $renew_history_data[0]->renewed_date;

                        $renewed_dt_obj = $renew_history_data[0]->renewed_date;
                        $renewed_dt = date("d/m/Y", strtotime($renew_history_data[0]->renewed_date));
                        echo '<b>'.$renewed_dt.'</b>';
                      ?>
                   </td>




                  <td><b><?php
                  
                 // $myDateTime = DateTime::createFromFormat('Y-m-d', $row->renewal_date);
                  //$newDateString = $myDateTime->format('d/m/Y');
                 $originalDate = $row->renewal_date;
                 $newDate = date("d/m/Y", strtotime($originalDate));

                  echo $newDate;
                  
                   //echo $newDateString; ?></b></td>
                  <td><b>
                   <?php


                   $created_by_id = $row->created_by;
                   if ($row->agent_name!="") {
                       $created_by_name = $row->agent_name;
                   } else {
                      $created_by_name = $this->common_model->common($table_name='tbl_user',$field=array(), $where=array('id'=>$created_by_id), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='0',$end='1')[0]->full_name;
                   }



                   if ($row->agent_phone!="") {
                      $created_by_phone = $row->agent_phone;
                   } else {
                      $created_by_phone = $this->common_model->common($table_name='tbl_user',$field=array(), $where=array('id'=>$created_by_id), $where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='0',$end='1')[0]->mobile_no;
                   }



                   echo  $created_by_name."/<br/>".$created_by_phone;

                   ?>
                   </b></td>
                   
                </tr>
<?php } ?>


           <thead>
                <tr>
                  
                  <th style="font-size: 0.85em;"></th>
                  
                  <!--<th style="font-size: 0.8em;">SL No</th>-->
                  <th style="font-size: 0.85em;"></th>
                  
                  <th style="font-size: 0.85em;"></th>
                  <th style="font-size: 0.85em;"></th>
                  <th style="font-size: 0.85em;"></th>

                  <th style="font-size: 0.85em;">Total</th>
                  <th style="font-size: 0.85em;margin: 4px; border: solid 1px #777;">

                  <?php

                  //echo "<pre>"; print_r($doctor_list[0]); echo "</pre>";
                  $ins = 0;
                  $medf_amnt = 0;
                  foreach ($doctor_list as $doctor) {
                    //echo "<pre>"; print_r($doctor->insurance_amount); echo "</pre>";
                    $ins+= $doctor->insurance_amount;
                    $medf_amnt+= $doctor->medeforum_amount;
                  }

                  echo "Rs. ".$ins."/-";

                  ?>

                  </th>
                  <th style="font-size: 0.85em;margin: 4px; border: solid 1px #777;">

                  <?php

                  echo "Rs. ".$medf_amnt."/-";

                  ?>

                  </th>

                  <th style="font-size: 0.85em;"></th>
                  <th style="font-size: 0.85em;"></th>  
                  <th style="font-size: 0.85em;"></th>                                     
                 <!--  <th>State</th>
                  <th>City</th>
                  <th>Address</th> -->
                </tr>
                </thead>
               



                </tfoot>
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
    


<!---Edit Subscription Modal -->
<!-- Modal -->
  <div class="modal fade" id="myEditModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-body">
          




  <?php echo form_open_multipart('index.php/normal_plan/edit_subscription_plan', array('class' => 'form-horizontal', 'id' => 'adduserrole_frm')); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Edit Subscription </h3>
      </div>
          <div class="modal-body">
              <div>
              <fieldset>   
                <input type="hidden" name="edit_subscription_id" id="edit_subscription_id" />       
                  <div class="control-group" id="edit_subscription_control"><span class="control-label">Coverage</span>
                    <div class="controls">
                    
                      <input type="text" id="edit_subscription_plan_name" class="form-control" name="edit_coverage" onblur="edit_subscription_plan_name_onblur()"/> Lakh
                     <br> <span class="help-inline" id="edit_subscription_plan_message" style="display:none; color:red"></span> </div>
                  </div> 
                   
                   
                   <div class="control-group" id="edit_discount_control">
                     <label class="control-label" for="inputSuccess2">Yearly Amount</label>
                     <div class="controls">
                      <input type="text" id="edit_discount_percentage" class="form-control" name="edit_yearly_amount" onblur="edit_discount_percentage_onblur()"/>
                     <br> <span class="help-inline" id="edit_discount_percentage_message" style="display:none; color:red"></span> </div>
                  </div>

                  
                                     
                </fieldset>
               </div>
          </div>
          <div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary" onclick="return editplan()" >Update</button>
          </div>
      </form>





        </div>
      </div>
      
    </div>
  </div>






<!---Add specialization Modal -->
<!-- Modal -->
  <div class="modal fade" id="myAddModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-body">





  <?php echo form_open_multipart('index.php/normal_plan/add_subscription_plan', array('class' => 'form-horizontal', 'id' => 'adduserrole_frm')); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Add Subscription </h3>
      </div>
          <div class="modal-body">
              <div>
              <fieldset>          
                  <div class="control-group" id="subscription_plan_control">
                   
                  </div>
                  
                  <div class="control-group" id="price_control">
                    <label class="control-label" for="inputSuccess">Coverage</label>
                    <div class="controls">
                      <input type="text" id="price" class="form-control" name="coverage" onblur="price_onblur()"/>&nbsp&nbsp;Lakh
                     <br> <span class="help-inline" id="price_message" style="display:none; color:red"></span> </div>
                  </div>                   
                 
                  <div class="control-group" id="resume_download_control">
                    <label class="control-label" for="inputSuccess">Yearly Amount</label>
                    <div class="controls">
                      <input type="text" id="plan_period" class="form-control" name="yearly_amount" onblur=""/>
                   <br> <span class="help-inline" id="sub_message" style="display:none; color:red"></span></div>
                  </div>
                </fieldset>
               </div>
          </div>
          <div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary" onclick=" return addplan()">Add</button>
          </div>
      </form>







        </div>
      </div>
      
    </div>
  </div>



















<!-- Modal -->
<div id="mailModal" class="modal fade" role="dialog">
        

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="sendmail_title"></h4>
      </div>

      <div class="modal-body test_response_mail">

      </div>
      <div class="modal-body send_mail_body">


              <div>
              <fieldset>   
                <input type="hidden" name="edit_subscription_id" id="edit_subscription_id" />       
                  <div class="control-group" id="edit_subscription_control">
                  <label class="control-label" for="inputSuccess2">Mail to:</label>
                    <div class="controls">
                    
                        <span class="form-control" id="display_email"></span>
                        <input type="hidden" id="email" name="email"></input>
                      
                    </div>
                  </div> 
                   
                   
                   <div class="control-group" id="edit_discount_control">
                     <label class="control-label" for="inputSuccess2">Message:</label>
                     <div class="controls">
                      <textarea class="form-control" id="message" name="message"></textarea>
                     <br> <span class="help-inline" id="edit_discount_percentage_message" style="display:none; color:red"></span> </div>
                  </div>

                  
                                     
                </fieldset>
               </div>
         

      </div>

      <div class="modal-body send_mail_success" style="display: none;text-align: center; color: #1e73a5;">

           
      </div>
      
          <div class="modal-footer send_mail_footer">
            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary" onclick="sendmail_action()" >Send mail</button>
          </div>

    </div>

  </div>


</div>








<!-- Modal -->
<div id="smsModal" class="modal fade" role="dialog">
        

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="sendsms_title"></h4>
      </div>

      <div class="modal-body test_response_sms">

      </div>
      <div class="modal-body send_sms_body">


              <div>
              <fieldset>   
                <input type="hidden" name="edit_subscription_id" id="edit_subscription_id" />       
                  <div class="control-group" id="edit_subscription_control">
                  <label class="control-label" for="inputSuccess2">SMS to:</label>
                    <div class="controls">
                    
                        <span class="form-control" id="display_mobile_no"></span>
                        <input type="hidden" id="sms_mobile_no" name="sms_mobile_no"></input>
                        <input type="hidden" id="sms_full_name" name="sms_full_name"></input>
                      
                    </div>
                  </div> 
                   
                   
                   <div class="control-group" id="edit_discount_control">
                     <div class="controls">
                      
                     <br> <span class="help-inline" id="edit_discount_percentage_message" style="display:none; color:red"></span> </div>
                  </div>

                  
                                     
                </fieldset>
               </div>
         

      </div>

      <div class="modal-body send_sms_success" style="display: none;text-align: center; color: #1e73a5;">

           
      </div>
      
          <div class="modal-footer send_sms_footer">
            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary" onclick="sendsms_action()" >Send SMS</button>
          </div>

    </div>

  </div>


</div>









<script language="javascript" type="text/javascript">




function sendmail(id)
{
  //alert(id);
  var base_url='<?php echo base_url();?>';
    //var dataString = 'id='+ id ;
    
  
    $.ajax(
    {   
        type: "POST",
        dataType:'json',  
        url:base_url+"index.php/email_settings/user_mail_from_id/"+id,  
        //data: dataString,
        async: false,  
        success: function(data)
        {                     
         console.log(data.full_name+" "+data.email);
         //var value = data.subscription[0].sub_status;

         $('.send_mail_success').css('display','none');
         $('.send_mail_body').css('display','block');
        
          $("#display_email").text(data.email);
          $("#sendmail_title").text('Send mail to '+data.full_name);
          $("#email").val(data.email);
          $("#message").val('Dear '+data.full_name+', ');
          $('.modal-footer').css('display','block');
         // $("#edit_credit_value").val(data.subscription[0].credit_value);

          $('#mailModal').modal('show');
         }
  });
    return false;

}


function sendmail_action()
{



  var base_url='<?php echo base_url();?>';
    //var dataString = 'id='+ id ;
    var email = $("#email").val();
    var message = $("#message").val();
    //console.log(email+" "+message);
  
    $.ajax(
    {   
        type: "POST",
        //dataType:'json',  
        url:base_url+"index.php/email_settings/send_mail_action/",  
        data: {email:email,message:message},
        //async: false,  

                  beforeSend: function(){
                    $('.send_mail_success').html('<i class="fa fa-spinner" style="font-size: 5em;" aria-hidden="true"></i><h4>Sending...</h4>');
                    $('.send_mail_success').css('display','block');
                    $('.send_mail_body').css('display','none');
                    $('.modal-footer').css('display','none');
                    //$('#ajax_loader_for_plan').css('display','block');
                   // console.log('Ajax start');
                  },

        success: function(data)
        {                     
         console.log(data);
           $('.send_mail_success').html('<i class="fa fa-thumbs-up" style="font-size:5em;" aria-hidden="true"></i><h4>Email was sent successfully</h4><a href="#" class="btn btn-success" data-dismiss="modal">Close</a>');
          //$('.test_response_mail').html(data);
         }
  });


}




// SEND SMS



function sendsms(id)
{
  //alert(id);
  var base_url='<?php echo base_url();?>';
    //var dataString = 'id='+ id ;
    
  
    $.ajax(
    {   
        type: "POST",
        dataType:'json',  
        url:base_url+"index.php/email_settings/user_mail_from_id/"+id,  
        //data: dataString,
        async: false,  
        success: function(data)
        {                     
         console.log(data);
         //var value = data.subscription[0].sub_status;

         $('.send_sms_success').css('display','none');
         $('.send_sms_body').css('display','block');
        
          $("#display_mobile_no").text(data.mobile_no);
          $("#sendsms_title").text('Send SMS to '+data.full_name);
          $("#sms_mobile_no").val(data.mobile_no);
          $("#sms_full_name").val(data.first_name);
          $('.send_sms_footer').css('display','block');
         // $("#edit_credit_value").val(data.subscription[0].credit_value);

          $('#smsModal').modal('show');
         }
  });
    return false;

}


function sendsms_action()
{



  var base_url='<?php echo base_url();?>';
    //var dataString = 'id='+ id ;
    var mobile_no = $("#sms_mobile_no").val();
    var name = $("#sms_full_name").val();
    //console.log(email+" "+message);
  
    $.ajax(
    {   
        type: "POST",
        //dataType:'json',  
        url:base_url+"index.php/email_settings/send_sms_action/",  
        data: {mobile_no:mobile_no,name:name},
        //async: false,  

                  beforeSend: function(){
                    $('.send_sms_success').html('<i class="fa fa-spinner" style="font-size: 5em;" aria-hidden="true"></i><h4>Sending...</h4>');
                    $('.send_sms_success').css('display','block');
                    $('.send_sms_body').css('display','none');
                    $('.send_sms_footer').css('display','none');
                    //$('#ajax_loader_for_plan').css('display','block');
                    // console.log('Ajax start');
                  },

        success: function(data)
        {                     
         console.log(data);
           $('.send_sms_success').html('<i class="fa fa-thumbs-up" style="font-size:5em;" aria-hidden="true"></i><h4>Email was sent successfully</h4><a href="#" class="btn btn-success" data-dismiss="modal">Close</a>');
          //$('.test_response_mail').html(data);
         }
  });


}




function change_auto_mail_status(id)
{
  //alert(id+" "+yn);
   var base_url='<?php echo base_url();?>';

    $.ajax(
    {   
        type: "POST",
        //dataType:'json',  
        url:base_url+"index.php/email_settings/set_auto_mail/",  
        data: {id:id},
        //async: false,  

                  beforeSend: function(){
                    $('#auto_mail-'+id).html('<i style="color: #3c8dbc;font-size: 2.4em;cursor: pointer;" class="fa fa-spinner" aria-hidden="true"></i>');
                  },

        success: function(data)
        {                     
         console.log(data);

         if (data == 'Y') {
            $('#auto_mail-'+id).html('<i style="color: green;font-size: 2.4em;cursor: pointer;" class="fa fa-check-circle" aria-hidden="true"></i>');
         } else if (data == 'N') {
            $('#auto_mail-'+id).html('<i style="color: red;font-size: 2.4em;cursor: pointer;" class="fa fa-close" aria-hidden="true"></i>');
         }

          
        
           
         }
  });






}

</script>
    






<script language="javascript" type="text/javascript">

function openedit_model(id)
{

  var base_url='<?php echo base_url();?>';
    var dataString = 'id='+ id ;
    
  
    $.ajax(
    {   
        type: "POST",
        dataType:'json',  
        url:base_url+"index.php?/normal_plan/getSubscriptionPlan",  
        data: dataString,
        async: false,  
        success: function(data)
        {                     
         console.log(data.subscription);
         var value = data.subscription[0].sub_status;
        
          $("#edit_subscription_id").val(id);
          $("#edit_subscription_plan_name").val(data.subscription[0].coverage);
         // $("#edit_credit_value").val(data.subscription[0].credit_value);
          $("#edit_price").val(data.subscription[0].monthly_plan);
          $("#edit_discount_percentage").val(data.subscription[0].yearly_plan);
                  $("#edit_two_year").val(data.subscription[0].two_year);
                  $("#edit_three_year").val(data.subscription[0].three_year);
                  $("#edit_four_year").val(data.subscription[0].four_year);
                  $("#edit_five_year").val(data.subscription[0].five_year);
          //$("#edit_job_post_number").val(data.subscription[0].jobpost_number);
          //$("#edit_resume_download_number").val(data.subscription[0].resume_download_number);
          //$("#edit_sub_expiry").val(data.subscription[0].subscription_period);
          //$("#edit_sub_status_active").prop('checked',true);  
          $('#myEditModal').modal('show');
         }
  });
    return false;

}
function openAddModel()
{
  $('#myAddModal').modal('show');
}
function delete_data(id)
{ 
  if(confirm('Are you sure do you want to delete it?')){
    window.location =   '<?php echo base_url(); ?>index.php/doctor_list/delete_doctor/'+id;
  } 
} 
</script>


    <script>

function change_type(id)
{
  if(confirm("Are you sure ??"))
  {
    var baseurl='<?php echo  base_url();?>';
    window.location=baseurl+'index.php/manage_user/user_type_change/'+id;
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





<script>
    function addplan()
    {
        var coverage=$("#price").val();
        //alert(coverage);
        var yearly_amount= $("#plan_period").val();
       // alert(yearly_amount);
        if(coverage==''||coverage=='0')
        {
            $("#price_message").text('Please Enter Coverage Amount');
            $("#price_message").show();
            $("#price").focus();
            return false;
        }
        else{
            $("#price_message").text('');
            $("#price_message").hide();
        }

        if(yearly_amount==''||yearly_amount=='0')
        {
            $("#sub_message").text('Please Enter Yearly Amount');
            $("#sub_message").show();
            $("#plan_period").focus();
            return false;
        }
        else{
            $("#sub_message").text('');
            $("#sub_message").hide();
        }

    }



    function editplan()
    {
        var coverage=$("#edit_subscription_plan_name").val();
        //alert(coverage);
        var yearly_amount= $("#edit_discount_percentage").val();
        // alert(yearly_amount);
        if(coverage==''|| coverage=='0')
        {
            $("#edit_subscription_plan_message").text('Please enter your value');
            $("#edit_subscription_plan_message").show();
            $("#edit_subscription_plan_name").focus();
            return false;
        }
        else{
            $("#edit_subscription_plan_message").text('');
            $("#edit_subscription_plan_message").hide();
        }

        if(yearly_amount==''||yearly_amount=='0')
        {
            $("#edit_discount_percentage_message").text('Please enter your value');
            $("#edit_discount_percentage_message").show();
            $("#edit_discount_percentage").focus();
            return false;
        }
        else{
            $("#edit_discount_percentage_message").text('');
            $("#edit_discount_percentage_message").hide();
        }

    }
</script>





  <script type="text/javascript">

   function change_sts_active(val)
        {
            //alert(val);
            var user_ids =[];


            $.each($("input[name='record']:checked"), function()
            {            
                user_ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(confirm("Are you sure?"))
              {
            if(user_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_user/change_to_active',
             data:{uid:user_ids,status:val},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.changedone;

                 if(perform==1)
                 {
                   alert('Status changed successsfully');
                   location.reload();
                 }
                if(perform==2)
                 {
                   alert('due to having product,');
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
}
  
        </script>


<script type="text/javascript">
  
  function in_active_doctor()
  { //alert("hi");
    var checkboxValue =[];
    var checkboxId=[];

    $.each($("input[name='record']:checked"), function()
    {
      checkboxValue.push($(this).val());
      checkboxId.push(this.id);
      //alert($(this).val());
    });
    var checkboxId=checkboxId.join(", ");
    var checkboxValue=checkboxValue.join(", ");
    if(checkboxValue!='')
    {
      

     

      if (confirm("Delete checked listing?")){
      //alert(checkboxValue);
      $.post('<?php echo base_url(); ?>index.php/user_management/delete_user_more_than_one/',
        {
          sub_admin_id:checkboxValue
        },
        function(data,status)
        {
          
          var split=checkboxId.split(',');
          var length=split.length;
          var i=0;
          for(i=0;i<length;i++)
          {
            //var status_id=split[i];

            //$('#status_'+split[i]).html('tgreye');
            //alert(status_id);
          }
          //$.post(base_url+'index.php/user_management/doctor_list','refresh');
          //alert('Unit has been Successfully Inactivated.');
          location.reload();
        });

    }




    }
    else
    {
      alert('Please Select at least one check box.');
    }

  }





function change_auto_sms_status(id)
{
  //alert(id+" "+yn);
   var base_url='<?php echo base_url();?>';

    $.ajax(
    {   
        type: "POST",
        //dataType:'json',  
        url:base_url+"index.php/doctor_list/set_auto_sms/",  
        data: {id:id},
        //async: false,  

                  beforeSend: function(){
                    $('#auto_sms-'+id).html('<i style="color: #3c8dbc;font-size: 2.4em;cursor: pointer;" class="fa fa-spinner" aria-hidden="true"></i>');
                  },

        success: function(data)
        {                     
         console.log(data);

         if (data == 'yes') {
            $('#auto_sms-'+id).html('<i style="color: green;font-size: 2.4em;cursor: pointer;" class="fa fa-check-circle" aria-hidden="true"></i>');
         } else if (data == 'no') {
            $('#auto_sms-'+id).html('<i style="color: red;font-size: 2.4em;cursor: pointer;" class="fa fa-close" aria-hidden="true"></i>');
         }

          
        
           
         }
  });



}








function resend_bond(id,email)
{
  //alert(id+" "+yn);
   var base_url='<?php echo base_url();?>';

    $.ajax(
    {   
        type: "POST",
        //dataType:'json',  
        url:base_url+"index.php/doctor_list/resend_renewal_bond/",  
        data: {id:id,email:email},
        //async: false,  

                  beforeSend: function(){
                    $('#resend_bond_'+id).html('<i style="color: #fff;cursor: pointer;" class="fa fa-spinner" aria-hidden="true"></i>');
                  },

        success: function(data)
        {                     
         console.log(data);
         $('#resend_bond_'+id).html('<i style="color: #fff;cursor: pointer;" class="fa fa-check-circle-o" aria-hidden="true"></i>');
           
         }
  });


}








function resend_money_reciept(id,email)
{
  //alert(id+" "+yn);
   var base_url='<?php echo base_url();?>';

    $.ajax(
    {   
        type: "POST",
        //dataType:'json',  
        url:base_url+"index.php/doctor_list/resend_renewal_money_reciept/",  
        data: {id:id},
        //async: false,  

                  beforeSend: function(){
                    $('#resend_money_reciept_'+id).html('<i style="color: #fff;cursor: pointer;" class="fa fa-spinner" aria-hidden="true"></i>');
                  },

        success: function(data)
        {                     
         console.log(data);
         $('#resend_money_reciept_'+id).html('<i style="color: #fff;cursor: pointer;" class="fa fa-check-circle-o" aria-hidden="true"></i>');
        }
  });


}



function search_validation()
{
  var renew_type = $('#renew_type').val();

      if (renew_type == "0") {
        $('#renew_type').removeClass('black_border').addClass('red_border');
        alert("Please select the renew type");
         // $('#search_by').css('border','#aaaaaa');
      } else {
        $('#renew_type').removeClass('red_border').addClass('black_border');
         // $('#search_by').css('border','red');
      }

}


function validate_search_form()
{

    $('#search_form').attr('onchange', 'search_validation()');
    $('#search_form').attr('onkeyup', 'search_validation()');

     search_validation();
    //alert($('#contact_form .red_border').size());

    if ($('#search_form .red_border').size() > 0)
    {
      $('#search_form .red_border:first').focus();
      $('#search_form .alert-error').show();
      return false;
    } else {
      $('#search_form').submit();
    }

}

</script>


