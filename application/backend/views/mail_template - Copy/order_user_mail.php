
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>

<body lang=EN-US link="#0563C1" vlink=green style="font-family:'PTS75F', 'ptn57f', 'pt sans regular', 'pt sans narrow bold', 'streamline small cs', 'pt sans italic', 'pt sans bold italic', 'pt sans bold', 'flexslider icon', sans-serif; font-size:11pt">



<a href=""><img src="<?php echo base_url();?>../assets/images/logo-black.png" alt="Scarves and Fabrics" style="float: left;"></a>
<div style="height:90px;width:10px;"></div>
<div>
	<table border="0" cellpadding="0" cellspacing="0" width="50%">
		<tr>
			<td>
				<b>Hello <?php echo @$mail_data['fst_name']; ?>,</b>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 30px 0;">
				Your order has been <b><?php if(@$mail_data['order_status']=='Order_Taken'){ echo 'taken';}else { echo @$mail_data['order_status'];}?></b> today. <br><br>
				Ordered id - <?php echo @$mail_data['order_unique_id']; ?>. <br> 
				Ordered Date - <?php echo @$mail_data['order_date']; ?>.
				
			</td>
		</tr>
		

		<tr>
			<td>
				For more details go to Scarves and Fabrics account.</a><br><br>
				<b>Thanks and Regards,</b><br>
				Scarves and Fabrics

			</td>
		</tr>
	</table>
</div>

<div style="height:70px;width:10px;"></div>
<a href="">Scarves and Fabrics</a><br>

<p style="border-top: #00b0f0 1px dotted; border-bottom: #00b0f0 1px dotted; padding:10px 0; display:inline-block">Please note: This is an auto generated email. Do not reply</p>


</body>

</html>
