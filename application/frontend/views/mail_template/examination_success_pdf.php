<!doctype html>
<html lang="en">


<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Surajit Pramanick</title>

<style>
body{font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;}
.tbl_pdf {
    border-collapse: collapse;
}
.tbl_pdf th
{
	background-color: #000;
	color: #fff;
	vertical-align: top;
	font-size: 14px;
	padding: 10px 12px;
}
.tbl_pdf thead
{
	border:2px solid;
}
.tbl_pdf_tr td
{
 padding:10px 15px;
}
</style>

</head>

<body style="margin: 0; padding: 0">
<div style="width: 100%; float: left;  margin: 0; padding: 0;">
<div style="max-width: 700px; width: 100%; margin: 0 auto;">
<center>
<table style="width: 100%; float: left; border: 1px solid #000; padding:15px 25px 15px; box-sizing: border-box;" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<table style="width: 100%; float: left;">
			<tr>

					<td style="text-align: center;"><p style="text-align: center;padding: 0;margin:0;font-size: 16px; text-decoration: underline;">This is individual examination evaluation from "Surajit Pramanick"</p>
					</td>
			</tr>		
			</table>

			<table style="width: 100%; float: left; padding: 20px 0;">
                <tr>
                    <td style="font-size: 14px; padding-bottom: 15px;">Name : <?php echo @$mail_data['uname']; ?></td>

                    <td style="font-size: 14px; padding-bottom: 15px;">You Saved time  : <?php echo @$mail_data['time_save']; ?> secs</td>
                    <td style="font-size: 14px; padding-bottom: 15px;">Report Created On  : <?php echo @date('d/m/Y H:i:s'); ?></td>
                </tr>
			<tr>      
				<td style="font-size: 14px; padding-bottom: 15px;">Examination Name : <?php echo @$mail_data['exam_name']; ?></td>
                <td style="font-size: 14px; padding-bottom: 15px;">Subject : <?php echo @$mail_data['sub_name']; ?></td>
                <td style="font-size: 14px; padding-bottom: 15px;">Total Marks : <?php echo round(@$mail_data['t_marks']); ?></td>
            </tr>
			<tr>
			    <td style="font-size: 14px; padding-bottom: 15px;">Exam Date and Time : <?php echo @date('d/m/Y',strtotime($mail_data['exam_date'])); ?> </td>
                <td style="font-size: 14px; padding-bottom: 15px;">Examination Code : <?php echo @$mail_data['test_code']; ?> </td>
                <td style="font-size: 14px; padding-bottom: 15px;"> Marks Obtain : <?php echo @$mail_data['o_marks']; ?> </td>
			</tr>
			
			<tr>
			    
               
                <td style="font-size: 14px; padding-bottom: 15px;">Exam Duration : <?php echo @$mail_data['exam_duration']; ?> secs </td>
                
               </tr>
			
		


			</table>

			<table style="width: 100%; float: left;" class="tbl_pdf">
				  <thead>
                      <tr>
                         <th>Question No</th>
                         <th>Question</th>
                         <th>Correct Answer</th>
                         <th>Your Answer</th>
                         <th>Marks Obtain</th>
                         <!-- <th>Time Taken In Seconds</th> -->
                         <th>Answer Hints</th>
                    </tr>

  <?php foreach ($mail_data['answer_list'] as $key => $row) {


$selected_choice= explode(',', @$row->selected_choice);


    $quest_details=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>@$row->question_master_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     $answer_details=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('id'=>@$row->correct_choice), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

    ?>

    <tr class="tbl_pdf_tr">
      <td><?php echo @$key+1; ?></td>
      <td><?php echo @$quest_details[0]->question; ?></td>
      <td><?php echo @$answer_details[0]->choice; ?></td>
     <td><ul><?php 

for ($i=0; $i <count($selected_choice); $i++) { 

$select_ans_num=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>@$row->question_master_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); 

       $select_ans_det=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('id'=>@$selected_choice[$i]), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); ?>
<li>

	<?php $num='A'; 
for ($j=0; $j < count($select_ans_num) ; $j++) { 
	

	if($select_ans_num[$j]->id==@$selected_choice[$i]){
		echo $num.'.';
	}

$num++;} ?> <?php echo @$select_ans_det[0]->choice;  ?></li>	
<?php } ?>


</ul>      </td> 
      
      <td><?php if($row->is_correct=='Yes'){echo "1";}else{echo "0";} ?></td>
     <!--  <td>58</td> -->
      <td><?php echo @$quest_details[0]->explanation; ?></td>
    </tr>

  <?php } ?>
   
  </thead>
<!-- 				<tr>
					<td><img src="img/rupees.png" alt="rupees" style="width: 15px;"><span style=" height: 30px; font-size: 30px; font-weight: bold; border-bottom: 2px dotted #333; display: inline-block; ">15000/-</span></td>
					<td style="float: right;"><div style="max-width: 250px; display: inline-block; text-align: center;"><h3 style="margin-top: 0;">MEDEFORUM</h3> <h3 style="margin-bottom: 0;">Authorised Signature</h3></div></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center; font-style: italic; font-size: 12px; font-weight: bold;">All Cheque Subject To The Realisation<br/> Website: www.medeforum.com, email: info@medeforum.com</td>
					
				</tr> -->	
			</table>	
					<table style="width: 100%; float: left; margin: 29px 0px 14px 0px;">
			<tr>

					<td style="text-align: center;"><p style="text-align: center;padding: 0;margin:0;font-size: 14px; ">Thank You and See Your Rank </p>
					</td>
			</tr>		
			</table>

			<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
																	<tbody><tr>

																		<td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

																			<em>Thanks and Regards,</em><br>
																			Surajit Pramanick  Team.
																			<br>
																			<a href="https://www.Surajit Pramanick.com/">Surajit Pramanick</a><br>
																			(Please note: This is an auto generated email. Do not reply)
																		</td>
																	</tr>
																	</tbody></table>


		</td>

	</tr>
</table>
</center>
</div>


</body>
</html>


