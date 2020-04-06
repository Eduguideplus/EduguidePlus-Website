<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;}
  </style>
</head>

<body style="margin: 0; padding: 0">
  <div style="width: 100%; float: left;  margin: 0; padding: 0;">
    <center>
      <h3>Score Report for <?php echo $userArray[0]->user_name.' ( '.$userArray[0]->user_code.' ) ';?></h3>
      <table style="width: 100%; float: left;  color:#333; padding: 25px; box-sizing: border-box;" cellpadding="0" cellspacing="0">
        <thead style="">
          <tr>
            <th style="font-size:14px;  padding: 13px 0; font-weight: bold; color: #333; text-align: center;border:1px solid #ddd;">SL No.</th>
            <th style="font-size:14px;  padding: 13px 0; font-weight: bold; color: #333; text-align: center;border:1px solid #ddd;">Candidate's Name</th>
            
            <th style="font-size:14px;  padding: 13px 0; font-weight: bold; color: #333; text-align: center;border:1px solid #ddd;">Date &amp; Time</th>
            <th style="font-size:14px;  padding: 13px 0; font-weight: bold; color: #333; text-align: center;width: 90px;border:1px solid #ddd;">Test</th>
            <th style="font-size:14px;  padding: 13px 0; font-weight: bold; color: #333; text-align: center;border:1px solid #ddd;">Subject</th>
            <th style="font-size:14px;  padding: 13px 0; font-weight: bold; color: #333; text-align: center;border:1px solid #ddd;">Total Questions</th>
            <th style="font-size:14px;  padding: 13px 0; font-weight: bold; color: #333; text-align: center;border:1px solid #ddd;">Question Attempted</th>
            <th style="font-size:14px; padding: 13px 0; font-weight: bold; color: #333; text-align: center;border:1px solid #ddd;">Marks</th>
            <!--  <th>Wrong Answer</th> -->
            <th style="font-size:14px;  padding: 13px 0; font-weight: bold; color: #333; text-align: center;border:1px solid #ddd;">%</th>
          </tr>
        </thead>
        <tbody>
        



          <?php
            if(count($attempted_exam_list)>0)
              {
                $cnt=0;
                foreach($attempted_exam_list as $res)
                {
                  $get_userdetail= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$res->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                   $get_setdetail= $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$res->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  $setSlug= @$get_setdetail[0]->set_slug;
                  $setname= @$get_setdetail[0]->set_name;
                   $exam_id= @$get_setdetail[0]->exam_id;
                   $sub_id= @$get_setdetail[0]->subject_id;

                    $get_examdetail= $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                     $get_subdetail= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                     
                  $cnt++;

                  $examchapter_id= $res->chap_id;
                  $testselectType= $res->test_select_type;

                  if($examchapter_id>0)
                  {
                    $chapter_details= $this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>$examchapter_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                    $chapterName= @$chapter_details[0]->chap_name;
                  }
                  else{
                    $chapterName='';
                  }


                ?>
            <tr>
              <td style="font-size:14px; padding: 8px 0; color: #333; text-align: center;border: 1px solid #ddd;border-right: none;border-bottom: none;"><?php echo $cnt; ?></td>
              <td style="font-size:14px; padding: 8px 0; color: #333; text-align: center;border: 1px solid #ddd;border-right: none;border-bottom: none;"><?php echo $get_userdetail[0]->user_name; ?></td>
              <td style="font-size:14px; padding: 8px 0; color: #333; text-align: center;border: 1px solid #ddd;border-right: none;border-bottom: none;"><?php echo date('d/m/Y H:i:s', strtotime($res->start_time)); ?></td>
              <td style="font-size:14px; padding: 8px 0; color: #333; text-align: center;border: 1px solid #ddd;border-right: none;border-bottom: none;"><?php echo @$get_examdetail[0]->exam_name.': '.$setname; ?></td>
              <td style="font-size:14px; padding: 8px 0; color: #333; text-align: center;border: 1px solid #ddd;border-right: none;border-bottom: none;"><?php echo @$get_subdetail[0]->section_name ; ?></td>
              <td style="font-size:14px; padding: 8px 0; color: #333; text-align: center;border: 1px solid #ddd;border-right: none;border-bottom: none;"><?php echo round($res->q_qty); ?></td>
              <td style="font-size:14px; padding: 8px 0; color: #333; text-align: center;border: 1px solid #ddd;border-right: none;border-bottom: none;"><?php echo round($res->attempt_count); ?></td>
              <td style="font-size:14px; padding: 8px 0; color: #333; text-align: center;border: 1px solid #ddd;border-right: none;border-bottom: none;"><?php echo round($res->obtained_marks); ?></td>
              
              <td style="font-size:14px; padding: 8px 0; color: #333; text-align: center;border: 1px solid #ddd;border-right: none;border-bottom: none;"><?php 
                $totalmarks= $res->total_marks; 
                $obtainedMarks= $res->obtained_marks;

                $percentage= round(($obtainedMarks/$totalmarks)*100);
                echo $percentage.'%';

              ?></td>
            <!--   <td><?php echo round(($res->attempt_count)-($res->obtained_marks)); ?></td> -->
             <!--  <td style="font-size:14px; padding: 8px 0; color: #333; text-align: center;border: 1px solid #ddd;border-bottom: none;"><?php echo round($res->obtained_marks); ?></td> -->
             <!--  <td>
                <?php 
                $totalmarks= $res->total_marks; 
                $obtainedMarks= $res->obtained_marks;

                $percentage= round(($obtainedMarks/$totalmarks)*100);
                echo $percentage.'%';

              ?></td>
              <td>
                <?php
                if($res->is_notify=='Yes')
                  {
                    ?>
                    <span style="color:green; font-weight: bold">Done</span>
                    <?php
                  }
                  else{
                        if($testselectType=='Chapterwise')
                        {


                    ?>
                         <a class="pdf" href="<?php echo  $this->url->link(117).'/'.$res->set_id.'/'.$setSlug; ?>">Re-attempt</a>
                    <?php
                  }
                  else{
                    ?>
                     <a class="pdf" href="<?php echo  $this->url->link(143).'/'.$res->set_id.'/'.$setSlug; ?>">Re-attempt</a>
                    <?php
                  }
                  }
                  ?>

              </td> -->
            </tr>
           <?php
         }
       }
         else{
          ?>

           <tr>
              <td colspan="9">You didn't appear any Test yet</td>
              
            </tr>
            <?php
          }
          ?>




         



        </tbody>
      </table>
    </center>
    <!--end of .table-responsive-->
  </div>
</body>

</html>