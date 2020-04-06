
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>

<body lang=EN-US link="#0563C1" vlink=green style="font-family:'PTS75F', 'ptn57f', 'pt sans regular', 'pt sans narrow bold', 'streamline small cs', 'pt sans italic', 'pt sans bold italic', 'pt sans bold', 'flexslider icon', sans-serif; font-size:11pt">



<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo-black.png" alt="Tyre and Battery" style="float: left;"></a>
<div style="height:90px;width:10px;"></div>
<div>
	<table border="0" cellpadding="0" cellspacing="0" width="50%">
		<tr>
			<td>
				Hello Admin,
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 30px 0;">
				A new order is placed of order id <?php echo @$mail_data['order_uniq_id']; ?> by <?php echo @$mail_data['first_name'].' '.@$mail_data['last_name']; ?> on <?php echo @$mail_data['order_date']; ?>.
				The details are given below.
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 30px 0;">
				Customer Name: <?php echo @$mail_data['first_name'].' '.@$mail_data['last_name']; ?>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 30px 0;">
				Email: <?php echo @$mail_data['email']; ?>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 30px 0;">
				Contact No.: <?php echo @$mail_data['mobile']; ?>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 30px 0;">
				Total Amount: <?php echo 'Rs. '.@$mail_data['order_total_price']; ?>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 30px 0;">
				Order Date: <?php echo @$mail_data['order_date']; ?>
			</td>
		</tr>

		<tr>
			<td style="padding: 20px 0 30px 0;">
				<b>Billing Address</b><br>
				Name:  <?php echo @$mail_data['billing_name']; ?><br>
				email:  <?php echo @$mail_data['billing_mail']; ?><br>
				phone:  <?php echo @$mail_data['billing_phone']; ?><br>
				Address:  <?php echo @$mail_data['bil_addrs']; ?><br>
				Pincode:  <?php echo @$mail_data['bil_pin']; ?><br>
				
			</td>
		</tr>

		<tr>
			<td style="padding: 20px 0 30px 0;">
				<b>Delivery Address</b><br>
				Name:  <?php echo @$mail_data['deli_name']; ?><br>
				email:  <?php echo @$mail_data['deli_mail']; ?><br>
				phone:  <?php echo @$mail_data['deli_phone']; ?><br>
				Address:  <?php echo @$mail_data['deli_add']; ?><br>
				Pincode:  <?php echo @$mail_data['deli_pin']; ?><br>
				
			</td>
		</tr>

		<tr>
			<td>
				For more details go to tyre and battery admin panel <a href="<?php echo base_url();?>admin">Tyre and Battery</a><br>
				Thanks and Regards,<br>
				<br>Tyre and Battery

			</td>
		</tr>
	</table>
</div>

<div style="height:70px;width:10px;"></div>
<a href="<?php echo base_url();?>admin">Tyre and Battery</a><br>

<p style="border-top: #00b0f0 1px dotted; border-bottom: #00b0f0 1px dotted; padding:10px 0; display:inline-block">Please note: This is an auto generated email. Do not reply</p>


</body>

</html>
