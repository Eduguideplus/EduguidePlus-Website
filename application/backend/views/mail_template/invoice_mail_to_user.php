
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>

<body lang=EN-US link="#0563C1" vlink=green style="font-family:'PTS75F', 'ptn57f', 'pt sans regular', 'pt sans narrow bold', 'streamline small cs', 'pt sans italic', 'pt sans bold italic', 'pt sans bold', 'flexslider icon', sans-serif; font-size:11pt">



<!-- <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>../assets/images/logo-black.png" alt="Scarves And Febrics" style="float: left;"></a>
 --><div style="height:90px;width:10px;"></div>
<div>
	
		<table style="border-left: 2px solid black;height: auto;width:800px;border-top: 2px solid;">
        <tbody>
            <tr>
                <td colspan="7" style="border-bottom:2px solid black;font-size:17px;height:40px;border-right: 2px solid;">
                    <b><img src="<?php echo base_url();?>../assets/images/logo-black.png" alt="Scarves And Febrics" style="float: left;"></b>
                </td>
            </tr>
            <tr style="border-bottom:2px solid black;height:150px;padding-bottom:20%">
                <td style="border-right:2px solid black;border-bottom: 2px solid;" rowspan="3" colspan="3">
                    <b>Exporter<br><br>
					<?php echo @$ofc_address[0]->contact_address;?><br>
                    PH. NO: <?php echo @$ofc_address[0]->contact_phno;?><br>
                    EMAIL: <?php echo @$ofc_address[0]->contact_email;?></b>
                </td>
                <td style="border-right:2px solid black;text-align: center;width:23%;border-bottom: 2px solid;">
                    <b>Invoice no. &amp; Date</b>
                    <br>
                    <?php 
                    $order_id = $order_details[0]->order_id;
                    if(strlen($order_id)==1)
                    {
                        $inv_order_id='0000'.$order_id;

                    }

                    else if(strlen($order_id)==2)
                    {
                        $inv_order_id='000'.$order_id;
  
                    }
                    else if(strlen($order_id)==3)
                    {
                        $inv_order_id='00'.$order_id;
  
                    }
                    else if(strlen($order_id)==4)
                    {
                        $inv_order_id='0'.$order_id;
  
                    }
                    
                    else if(strlen($order_id)>=7)
                    {
                        $inv_order_id=$order_id;
                    }
                    ?>
                    <br>INV-<?php echo date('dmY').'-'.$inv_order_id;?> <br>DT- <?php $time = strtotime(@$order_details[0]->created_date);
                                    $myFormatForView = date("d.m.y", $time); echo $myFormatForView;?>

                </td>
                <td style="border-right:2px solid black;text-align: center;border-bottom: 2px solid;" colspan="3">
                    <b>Exporter’s Ref.</b>
                    <br>
                    <br>IEC NO. - 0512001936

                </td>
            </tr>
            <tr style="border-bottom:2px solid black;">

                <td style="border-right:2px solid black;" colspan="4">
                    <b>Buyer’s Order No. &amp; Date : </b> <?php echo @$order_details[0]->order_unique_id; ?> , DT - <?php $time = strtotime(@$order_details[0]->created_date);
                                    $myFormatForView = date("d.m.y", $time); echo $myFormatForView;?>
                </td>

            </tr>
            <tr style="border-bottom:2px solid black;">

                <td style="border-right:2px solid black;border-bottom: 2px solid;border-top: 2px solid;" colspan="4">
                    <b>Other Reference(s)</b>
                    <br>Group : 1718101
                </td>

            </tr>
            <tr style="border-bottom:2px solid black;">
                <td style="border-right:2px solid black;height:150px;border-bottom: 2px solid;" rowspan="2" colspan="4">
                    <b>Consignee:<br><br>

						<?php echo @$customer_details[0]->first_name; ?> <?php echo @$customer_details[0]->last_name; ?><br>
                        <?php echo @$customer_details[0]->address_1; ?> , <?php echo @$customer_details[0]->pin_code; ?><br>
                        <?php echo @$u_city[0]->name; ?> , <?php echo @$u_state[0]->name; ?> , <?php echo @$u_country[0]->name; ?><br>
                        PHONE NO: <?php echo @$customer_details[0]->ph_no; ?><br>
                        EMAIL ID: <?php echo @$customer_details[0]->email_id; ?></b>
                    <br>

                </td>
                <td style="border-right:2px solid black;border-bottom: 2px solid;height: 103px;" colspan="3">
                    <b>Buyer (if other than consignee):<br><br>
                        <?php echo @$shipping_add[0]->deli_first_name; ?> <?php echo @$shipping_add[0]->deli_lst_name; ?><br>
                    <?php echo @$shipping_add[0]->deli_add_line_1; ?> , <?php echo @$shipping_add[0]->deli_pin; ?><br>
                    <?php echo @$city[0]->name; ?> , <?php echo @$state[0]->name; ?> , <?php echo @$country[0]->name; ?><br>
                    PHONE NO: <?php echo @$shipping_add[0]->deli_phone; ?><br>
                    EMAIL ID: <?php echo @$shipping_add[0]->deli_mail; ?></b>
                </td>

            </tr>
            <tr style="border-bottom:2px solid black;">

                <td style="border-right:2px solid black;text-align: center;border-bottom: 2px solid;">
                    Country of Origin of Goods
                    <br>
                    <b><?php echo @$dispatch_data[0]->origin_country;?></b>
                </td>
                <td style="border-right:2px solid black;text-align: center;border-bottom: 2px solid;" colspan="2">
                    Country of Final Destination
                    <br>
                   <b><?php echo @$dispatch_data[0]->desti_country;?></b>
                </td>
            </tr>
            <tr style="border-bottom:2px solid black;">
                <td style="border-right:2px solid black;border-bottom: 2px solid;" colspan="2">
                    Pre-Carriage by
                </td>
                <td style="border-right:2px solid black;border-bottom: 2px solid;" colspan="2">
                    Place of receipt by Pre-Carrier
                </td>
                <td style="border-right:2px solid black;border-bottom: 2px solid;" colspan="3" rowspan="3">
                    Terms of Delivery and Payment
                </td>


            </tr>
            <tr style="border-bottom:2px solid black;">

                <td style="border-right:2px solid black;border-bottom: 2px solid;" colspan="2">
                    Vessel/<br>Flight no. : <b><?php echo @$dispatch_data[0]->flight_no;?></b>
                </td>
                <td style="border-right:2px solid black;border-bottom: 2px solid;" colspan="2">
                    Port of Loading:
                    
                    <b><?php echo @$dispatch_data[0]->loading_port;?></b>

                </td>



            </tr>
            <tr style="border-bottom:2px solid black;">

                <td style="border-right:2px solid black;border-bottom: 2px solid;" colspan="2">
                    Port of Discharge:<br>
                    <b><?php echo @$dispatch_data[0]->dischrge_port;?></b>
                </td>
                <td style="border-right:2px solid black;border-bottom: 2px solid;" colspan="2">
                    Final destination:
                    
                    <b><?php echo @$dispatch_data[0]->desti_country;?></b>

                </td>

            </tr>
            <tr style="border-bottom:2px solid black;height:50px;">

                <td style="border-right:2px solid black;width:10%;border-bottom: 2px solid;">

                    Container No. 


                </td>

                <td style="border-right:2px solid black;width:10%;border-bottom: 2px solid;">

                    No. &amp; Kind of Package

                </td>

                <td style="border-right:2px solid black;width:20%;border-bottom: 2px solid;">

                    Description Of Goods

                </td>
                <td style="border-right:2px solid black;width:20%;border-bottom: 2px solid;">

                    Style

                </td>

                <td style="border-right:2px solid black;width:10%;border-bottom: 2px solid;">
                    Quantity

                </td>
                <td style="border-right:2px solid black;width:10%;border-bottom: 2px solid;">
                    Rate

                </td>
                <td style="border-right:2px solid black;width:10%;border-bottom: 2px solid;">
                    Amount

                </td>



            </tr>
            <?php
                
                if(count($total_order)>0)
                  {
                     $i=0;
                     foreach($total_order as $row)
                      {

                          $i++; 
                          $p_id = $row->order_product_id;

                                                
                                               
                          $product = $this->common->select($table_name='tbl_product',$field=array(),$where=array('product_id'=>$p_id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='',$where_in_array=array());

                                          
                          $name = $product[0]->p_name;
                          $price = $product[0]->price;

                          $order_id =  $row->order_id;                      
                          $orders = $this->common->select($table_name='tbl_order',$field=array(),$where=array('order_id'=>$order_id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='',$where_in_array=array());
                          $currency_to= @$orders[0]->currency;
                          if($currency_to=='USD')
                                            {
                                                $currency_sign='<i class="fa fa-usd" aria-hidden="true"></i>';
                                            }
                                            if($currency_to=='INR')
                                            {
                                                $currency_sign='<i class="fa fa-inr" aria-hidden="true"></i>';
                                            }
                                            if($currency_to=='EUR')
                                            {
                                                $currency_sign='<i class="fa fa-eur" aria-hidden="true"></i>';
                                            }
                                            if($currency_to=='GBP')
                                            {
                                                $currency_sign='<i class="fa fa-gbp" aria-hidden="true"></i>';
                                            }
                          
                            

                            ?>
                                                 
            <tr style="border-bottom:2px solid black;height:300px;">

                <td style="border-right:2px solid black;width:10%;border-bottom: 2px solid;text-align: center;">

                    <b><?php echo @$dispatch_data[0]->container_no;?></b>

                </td>

                <td style="border-right:2px solid black;width:10%;border-bottom: 2px solid;text-align: center;">

                    <b><?php echo @$dispatch_data[0]->no_of_package;?></b>

                </td>

                <td style="border-right:2px solid black;width:20%;border-bottom: 2px solid;text-align: center;">

                <b><?php echo $product[0]->p_info;?></b>

                </td>
                <td style="border-right:2px solid black;width:20%;border-bottom: 2px solid;text-align: center;">

                 <b><?php echo $product[0]->p_name;?></b>

                </td>

                <td style="border-right:2px solid black;width:10%;border-bottom: 2px solid;text-align: center;">
                  <b><?php echo $row->order_product_qty;?></b> 
                </td>
                <td style="border-right:2px solid black;width:10%;border-bottom: 2px solid;text-align: center;">
                    <b><?php echo $currency_to .' '.round($row->order_product_price);?></b>

                </td>
                <td style="border-right:2px solid black;width:10%;border-bottom: 2px solid;text-align: center;">
                   
                <b><?php echo $currency_to .' '.(round($row->order_product_price) * ($row->order_product_qty));?></b>

                </td>



            </tr>
            <?php }
            } ?>
            <tr style="border-bottom:2px solid black;height:100px">

                <td style="/* border-right:2px solid black; */width:80%;" colspan="4">

                   <b>AMOUNT IN WORDS:</b>
                  <?php echo $this->numbertowords->convert_number($orders[0]->order_sub_total);?>
                  



                </td>

                <td style="border-right:2px solid black;width:20%;border-bottom: 2px solid;text-align: center;" colspan="3">

                    Total : <b><?php echo $currency_to .' '.round(@$orders[0]->order_sub_total);?></b>



                </td>




            </tr>
            <tr style="border-bottom:2px solid black;height:100px">

                <td style="width:80%;border-bottom: 2px solid;" colspan="4">

                    Declaration: We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct


                </td>

                <td style="border-right:2px solid black;width:20%;border-left: 2px solid;text-align: center;border-bottom: 2px solid;" colspan="3">

                    Signature:



                </td>




            </tr>




        </tbody>
    </table>
</div>

<div style="height:70px;width:10px;"></div>
<a href="<?php echo base_url();?>">Scarves and Febrics</a><br>

<p style="border-top: #00b0f0 1px dotted; border-bottom: #00b0f0 1px dotted; padding:10px 0; display:inline-block">Please note: This is an auto generated email. Do not reply</p>


</body>

</html>
