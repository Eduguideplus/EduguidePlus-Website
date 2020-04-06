
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>

<body lang=EN-US link="#0563C1" vlink=green style="font-family:'PTS75F', 'ptn57f', 'pt sans regular', 'pt sans narrow bold', 'streamline small cs', 'pt sans italic', 'pt sans bold italic', 'pt sans bold', 'flexslider icon', sans-serif; font-size:11pt">



 <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo2.png" alt="Scarves and Febrics" style="float: left;"></a> 
<div style="height:90px;width:10px;"></div>
<div>
	<table border="0" cellpadding="0" cellspacing="0" width="50%">
		<tr>
			<td>
				<b>Hello Admin,</b><br>
                One Applicant applied for a post . Please check the details below:&nbsp;
			</td>
		</tr>

		<tr>
			<td style="padding: 20px 0 30px 0;">
				<b>Applicant Details : 	</b> 
			</td>

		</tr>
		<tr>
			<td style="padding: 0px 30px;">Name : <?php echo @$mail_data['name']; ?></td>
		</tr>
		<tr>
			<td style="padding: 0px 30px;">Email : <?php echo @$mail_data['email']; ?></td>
		</tr>
		<tr>
			<td style="padding: 0px 30px;">Contact No : <?php echo @$mail_data['ph']; ?></td>
		</tr>
		<tr>
			<td style="padding: 0px 30px;">Expected Salary : <?php echo @$mail_data['exp_sal']; ?></td>
		</tr>

		<tr>
			<td style="padding: 20px 30px;"><b>Applied Date :</b> <?php echo @$mail_data['date']; ?></td>
		</tr>


		<tr>
			<td style="padding: 20px 0 30px 0;">
				<b>Applied For : 	</b> <?php echo @$mail_data['career_details']; ?>
			</td>

		</tr>
		
		


		<!-- <tr>
		<td style="padding: 20px 0 30px 0;">
			<b>User Email : 	</b><?php echo @$mail_data['email']; ?>
		</td>
		</tr> -->
		<tr>
			<td>
				<b>Thanks & Regards,</b><br>
				<br>Surajit Pramanick <br>
				
				

			</td>
		</tr>
	</table>
</div>

<div style="height:70px;width:10px;"></div>
<a href="https://www.Surajit Pramanick.com/">Surajit Pramanick</a><br>

<p style="border-top: #00b0f0 1px dotted; border-bottom: #00b0f0 1px dotted; padding:10px 0; display:inline-block">Please note: This is an auto generated email. Do not reply</p>


</body>

</html>
