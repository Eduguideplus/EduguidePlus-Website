<?php $tp=@$order[0]->total_price;
$stat=@$order[0]->status;

 $redm_amt=@$order[0]->redeem_amount;

 $coupon_amt=@$order_coupon[0]->coupon_price;

//print_r(@$order_coupon);

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pdf.css" />
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
        <tr class="top status">
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="title">
                               
                            </td>
                            
                            <td>
                                <?php
                                    if(@$order[0]->status=='paid') 
                                    {
                                ?>
                                    <span class="bg-green">PAID</span>
                                <?php 
                                  }
                                     else
                                     {
                                ?>
                                    <span class="bg-red">UNPAID</span>
                                <?php }?>   
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="top">
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?php echo base_url(); ?>assets/images/logo2.png" style="width:70%; max-width:200px;">
                            </td>
                            
                            <td>
                            <b>Invoice No</b> : <?php echo @$inv_name; ?><br>
                                <b>Order Id</b> : <?php echo @$order[0]->order_id; ?><br>
                                Date: <?php echo date('d M, Y'); ?><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="7">
                    <table>
                        <tr>
                            <td>
                            <b>wbcsforum </b><br>
                                <?php echo @$contact[0]->contact_address; ?><br>
                                <?php echo $contact[0]->contact_email; ?><br>
                                <?php echo $contact[0]->contact_phno; ?>
                            </td>
                            
                            <td>
                            <b>Bill To.</b><br>
                                <?php echo @$billing[0]->first_name; ?><br>
                                <?php echo @$billing[0]->login_email; ?><br>
                                 <?php echo @$billing[0]->user_address; ?><br>
                                  <?php echo @$billing[0]->login_mob; ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Plan Name
                </td>
                <td></td>
                <td>
                    Examination Name
                </td>
                <td>
                    No. of Papers
                </td>
               
                <td>
                   Plan Validity
                </td>
             
                <td> Plan Type</td>
                <td>
                    Amount (₹)
                </td>

            </tr>
           <?php 

           
           $plan_ids=array();
           $ids=0;
for($i=0;$i<count($order_dtls);$i++)
{
    $plan_ids[$ids]=$order_dtls[$i]->plan_id;
    $ids=$ids+1;

}

$total_papaer=array();
$idx=0;
for($i=0;$i<count($order_dtls);$i++)
{
    $total_papaer[$idx]=$order_dtls[$i]->total_paper;
    $idx=$idx+1;
}
//print_r($total_papaer);

$order_row_id=$order_dtls[0]->order_id;
$pp_ids=array_unique($plan_ids);
$p_ids=array_values($pp_ids);
$actual_sub_total=0;
for($p=0;$p<count($p_ids);$p++)
{

    $plan_id=$p_ids[$p];
//echo $plan_id;
      $plan_dtls=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('id'=>$plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
       $user_plan=$this->common_model->common($table_name = 'tbl_user_plan_details', $field = array(), $where = array('order_id'=>$order_row_id,'user_id'=>$user_id,'plan_id'=>$plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

         $plan_type=$plan_dtls[0]->plan_type;

         $company_id=$plan_dtls[0]->company_id;
         //echo  $company_id;

          $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$company_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
//print_r($exam_dtls);

           if($plan_type=='Customarized')
            {
                $price_each=$exam_dtls[0]->price;

                $paper_per_plan=$this->common_model->common($table_name = 'tbl_plan_details', $field = array(), $where = array('plan_id'=>$plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                $total_paper=$total_papaer[$p];
//echo $total_paper;
                $sub_total= $price_each*$total_paper;
                $sub_total=$sub_total-($sub_total*(5*$total_paper)/100);
                $actual_sub_total=$actual_sub_total+$sub_total;
                
            }
            else
            {
                
                $order_dtls_gen=$this->common_model->common($table_name = 'tbl_order_detail', $field = array(), $where = array('order_id'=>$order_row_id,'plan_id'=>$plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                $total_paper=0;
                  for($k=0;$k<count($order_dtls_gen);$k++)
                 {
                     $total_paper=$total_paper+ $order_dtls_gen[$k]->total_paper;

                 }
                    $company_count=$plan_dtls[0]->no_of_company;
                    $sub_total= $plan_dtls[0]->plan_price;
                     $sub_total=$sub_total-($sub_total*(10*$company_count)/100);
                    $actual_sub_total=$actual_sub_total+$sub_total;
                


            }


            
/*echo '<pre>';
         print_r($plan_dtls);*/

//}

           /*for($i=0;$i<count($order_dtls);$i++){





            $plan_id=$order_dtls[$i]->plan_id;
            $company_id=$order_dtls[$i]->company_id;
            $total_paper=$order_dtls[$i]->total_paper;

            $plan_dtls=$this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('id'=>$plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



            $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$company_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            $user_plan=$this->common_model->common($table_name = 'tbl_user_plan_details', $field = array(), $where = array('order_id'=>$order_row_id,'user_id'=>$user_id,'plan_id'=>$plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

           

              $plan_type=$plan_dtls[0]->plan_type;
            if($plan_type=='Customarized')
            {
                $price_each=$exam_dtls[0]->price;
                $sub_total= $price_each*$total_paper;
                
            }
            else
            {
                $sub_total= $plan_dtls[0]->plan_price;
            }*/

            

            ?>

          
            <tr class="item">
                <td class="lowfonttxt" >
                    <?php echo @$plan_dtls[0]->plan_title; ?>
                </td>
                <td></td>
                <td class="lowfonttxt">
                  <?php 
                  
                    if($plan_type=='Customarized')
                    {
                        echo @$exam_dtls[0]->exam_name;


                    }
                    else
                    {
                        $order_dtls_gen=$this->common_model->common($table_name = 'tbl_order_detail', $field = array(), $where = array('order_id'=>$order_row_id,'plan_id'=>$plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                        for($j=0;$j<count($order_dtls_gen);$j++)
                        {
                             $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$order_dtls_gen[$j]->company_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                             echo $exam_dtls[0]->exam_name.', ';
                        }
                    }
                   ?>
                   

                </td>
                <td class="lowfonttxt">
               <?php 

               if($plan_type=='Customarized')
            {
                 echo @$total_paper;

            }
            else
            {
                 echo @$total_paper.'(1 Each)';
            }

               ?>
                    

                 
                </td>
                <td class="lowfonttxt">

                <?php echo @$user_plan[0]->validity_date; ?>
                  
                </td>
               
               

                   <td class="lowfonttxt">
                 <?php echo @$plan_type; ?>
                   
                </td>
                <td class="lowfonttxt"> <?php echo number_format(@$sub_total,2); ?></td>
            </tr>

              <?php } ?>


              

                 <tr class="item">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Sub Total:</td>
                <td>
                   <?php echo number_format(@$actual_sub_total,2); ?>
                </td>
            </tr>



            
            
           
         <?php if(count(@$order_tax)>0){

            for($t=0;$t<count(@$order_tax);$t++)
            {
                $tax_id=@$order_tax[$t]->tax_id;
                $tax_amt=@$order_tax[$t]->tax_amount;
                $tax_dtls=$this->common_model->common($table_name = 'tbl_tax_master', $field = array(), $where = array('tax_id'=>$tax_id,'tax_status'=>'Y'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            ?>


            <tr class="item">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo @$tax_dtls[0]->tax_name.'(+'. number_format(@$tax_dtls[0]->tax_percentage,2).'%)';?>:</td>
                <td>
                   <?php echo number_format(@$tax_amt,2); ?>
                </td>
            </tr>

            <?php  }} ?>



            <?php if(@$redm_amt!='' && @$redm_amt!=0){

            

            ?>


            <tr class="item">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Redeem Amount(-):</td>
                <td>
                   <?php echo number_format(@$redm_amt,2); ?>
                </td>
            </tr>

            <?php  } ?>


            <?php if(@$coupon_amt!='' && @$coupon_amt!=0){

            

            ?>


            <tr class="item">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Copupon Applied(-):</td>
                <td>
                   <?php echo number_format(@$coupon_amt,2); ?>
                </td>
            </tr>

            <?php  } ?>

            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total:</b></td>
                <td>
                   <b><?php echo number_format(@$tp,2); ?></b>
                </td>
            </tr>
            <tr class="item">
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr class="item">
                <td>
                    <b>Transaction</b>
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td></td>
                <td></td>
            </tr>

            <tr class="heading">
            <td>
                    Payment Method
                </td>
                <td></td>
                <td>Amount(₹)</td>
                <td></td>
                <td>
                    Status
                </td>
                <td></td>
                <td>
                    Payment Date
                </td>

            </tr>
            
            <tr class="details">
                <td>
                    Online Payment
                </td>
                <td></td>
                <td>
                 <?php echo number_format(@$tp,2); ?>
                </td>
                <td></td>
                <td>
                    <?php echo @$stat; ?>
                </td>
                <td></td>
                <td>
                    <?php echo  date('d/m/Y');?>
                </td>
            </tr>
            
            
        </table>
    </div>
</body>
</html>
