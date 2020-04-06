
<div class="all_top">
</div>
<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="<?php echo base_url(); ?>assets/images/jee-main.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont online_x">
          <h2><?php echo @$exam_details[0]->exam_name; ?></h2>
        </div>
      </div>
    </div>
  </div>
</section>



<div class="services_part">
<div class="container main-container-home">
      <div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
   
       <?php echo @$exam_details[0]->description; ?>
      </div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="about-exam faq analysis-block">


            <div class="panel-group" id="accordion">

 <?php
 foreach($exam_info as $key=>$exrow)
  {

    $exam_info_id= $exrow->info_id;
    $get_video= $this->common_model->common($table_name = 'tbl_exam_info_video', $field = array(), $where = array('exam_info_id'=>$exam_info_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
    ?>
            <div class="panel panel-default">
              <div class="panel-heading  wrong-bg color_af <?php if($key==0){ ?>active<?php } ?>">
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $exrow->info_id; ?>" class="taggole-psec"><?php echo $exrow->info_title; ?></a>
                </h4>
              </div>
              <div id="collapse<?php echo $exrow->info_id; ?>" class="panel-collapse collapse <?php if($key==0){ ?>in<?php } ?>">
                <div class="panel-body">
               
<?php
if(count($get_video)>0){
?>
                  <div class="video-tutorial-sec">
                    <h4><?php echo @$get_video[0]->video_title; ?></h4>
                    <div class="o-video">
                      <?php
                      foreach($get_video as $vdorow)
                        {
                          if($vdorow->video!='')
                          {
                          ?>
                      <iframe src="<?php echo $vdorow->video; ?>" allowfullscreen></iframe>
                      <?php
                    }
                    }
                    ?>
                    </div>
                  </div>
                  <?php
                }
                ?>
                  <div class="course-content-section">
                       <h4><?php echo $exrow->info_description_title; ?></h4>
                   <?php echo $exrow->info_description; ?>
                 </div>
              </div>
            </div>
          </div>

         <?php
       }
       ?>  
            

           <?php
           if(count($exam_institute)>0)
            {
              ?>
            

           
            <div class="panel panel-default">
              <div class="panel-heading  wrong-bg color_af ">
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse51ins"><?php echo @$exam_details[0]->exam_name; ?> Participating Institutes</a>
                </h4>
              </div>
              <div id="collapse51ins" class="panel-collapse collapse ">
                <div class="panel-body">
<?php
foreach($instituLevel as $instrow)
{

  ?>
  <?php
  if($instrow['avail_inst']=='Y'){
    ?>
                  <div class="table-exam-detail-p-cus-last">

                  <h4 class="stat-insti"><?php echo $instrow['level_name']; ?></h4>
              
                  <div class="table_des">
                    <span class="search_btn">
                          <input type="search" name="search" placeholder="Search Here">
                        </span>
                        <table>
                          <tbody><tr>
                            <th>Sl. No.</th>
                            <th>Institute Name </th>
                            <th>Management Of College </th>
                            <th>State</th>
                            <th>Total Seat</th>
                          </tr>
                          <?php

                          $listofinst=$instrow['get_institutes'] ;
                          $i=0;
                          foreach($listofinst as $lst)
                            {
                              $i++;

                              $statename= $this->common_model->common($table_name = 'states', $field = array(), $where = array('id'=>$lst->state), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                              ?>
                          <tr>
                            <td>
                              <?php
                              if(strlen($i)==1){ echo '0'.$i; } else{ echo $i; } ?>.
                            </td>
                            <td><a href="<?php echo $this->url->link(153).'/'.$lst->id.'/'.$lst->slug;?>"><?php echo $lst->institute_name; ?></a></td>
                            <td><?php echo $lst->management_of_inst; ?></td>
                            <td><?php if($lst->state>0){ echo @$statename[0]->name; } else{ echo '-'; }?></td>
                            <td><?php echo $lst->total_seat; ?></td>
                          </tr>
                         <?php
                       }
                       ?>
                        </tbody></table>
                      </div>

                    </div>
                    <?php
                  }
                  ?>

<?php
}
?>

            </div>
          </div>
        </div>
            
<?php
}
?>
       
       

          






       <!-- <div class="back-block">
        <a href="http://192.168.0.12/eduguide/site/dashboard" class="pull-right gall_back"><i class="fa fa-chevron-right" aria-hidden="true"></i>Go to Dashboard</a> </div> -->

  </div>
  </div>
</div>
</div>
</div>