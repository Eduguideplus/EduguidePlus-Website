<div class="all_top">
</div>

<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="<?php echo base_url(); ?>assets/images/course-exam.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont">


          <?php 

           $category_details = $this->common_model->common($table_name = 'tbl_video_tutorial_category', $field = array(), $where = array('category_id'=>$this->uri->segment(2),'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

          ?>


          <h2><?php echo @$category_details[0]->category_name;?></h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->





<!-- video list section start here -->

<div class="video_list_part">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <div class="video_box_prt">


          <div class="courses-area courses-and-coll-p-cus">
         <!--    <h2 class="head-title text-center"> Our Courses and Colleges</h2> -->
            <!--  <p>Eduguideplus is a renowned and established educational consultant in India. We enable students to pursue their career in medical, engineering, BBA, MBA, nursing by studying in India and abroad. Education is the key to a bright and successful future. we believe in the motto "Education for all" keeping strictly to this motto our team of experts guide young aspiring students towards a brighter prospect. It endeavours to treat every student as an individual, to recognized their potential an to ensure that they receive the best preparation and training to get admission in world class institute for achieving their career ambitions and life goals.</p> -->

            <?php echo @$category_details[0]->content;?>
          </div>

            <div class="o-video">


              <?php 

          if(count(@$video_list)>0){

          foreach( $video_list as $row){?>


              <div class="video_yt">

                <?php if(@$row->video_link !=''){?>
                <iframe src="<?php echo @$row->video_link;?>" allowfullscreen></iframe>
              <?php } ?>
                <h4><?php echo @$row->title;?></h4>
              </div>

            <?php } } else{ echo '<h1>No Video Added</h1>';  }?>



              <!-- <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div>
              <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div>
              <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div> -->
            </div>

              <!-- <div class="o-video">
              <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div>
              <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div>
              <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div>
              <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div>
            </div>

            <div class="o-video">
              <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div>
              <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div>
              <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div>
              <div class="video_yt">
                <iframe src="https://www.youtube.com/embed/Kch8n4tcOZQ" allowfullscreen></iframe>
                <h4>This ic Demo Title</h4>
              </div>
            </div> -->
           
         </div>        
      </div>
    </div>
  </div>
</div>

<!-- video list section end here -->