
<div class="all_top">
</div>



<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="assets/images/online-exam.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont online_x">
          <h2>Online Exam</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->


<!-- how to exam start here -->

<section class="how_xm_sec">
  <div class="how_xm_part">
    <div class="container">
      <div class="col-md-12">
        <div class="row">

          <div class="courses-area">
            <h2 class="head-title text-center">How to Start Exam</h2>
          </div>

          <div class="exam_cont">
            <ul>
              <li><div class="xm_ic"><i class="fa fa-hand-o-right" aria-hidden="true"></i></div><div class="xm_text">This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.</div></li>

              <li><div class="xm_ic"><i class="fa fa-hand-o-right" aria-hidden="true"></i></div><div class="xm_text">This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.</div></li>

              <li><div class="xm_ic"><i class="fa fa-hand-o-right" aria-hidden="true"></i></div><div class="xm_text">This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.</div></li>

              <li><div class="xm_ic"><i class="fa fa-hand-o-right" aria-hidden="true"></i></div><div class="xm_text">This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.</div></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- how to exam end here -->


 <div class="training" style="background-image: url(<?php echo base_url();?>assets/uploads/training_slider/<?php echo @$slider[0]->slider_image;?>);">
	<div class="container">
		<div class="row">
			<div class="con-md-12 centered">
				
				<div class="training_info text-center">

          <div class="opt_head">
            <h3>Choose Your Exam Option</h3>
            <p>This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.</p>
          </div>

          <div class="exam_course_box">
            <div class="col-md-3">
              <a href="<?php echo $this->url->link(134);?>">
                <div class="career_guide_box">
                  <div class="career_icon">
                    <img src="assets/images/jeemain.png" alt="jeemain">
                  </div>
                  <div class="career_cont">
                    <h3>JEE MAIN</h3>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-3">
              <a href="<?php echo $this->url->link(134);?>">
                <div class="career_guide_box">
                  <div class="career_icon">
                    <img src="assets/images/neet.png" alt="neet">
                  </div>
                  <div class="career_cont">
                    <h3>NEET</h3>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-3">
              <a href="<?php echo $this->url->link(134);?>">
                <div class="career_guide_box">
                  <div class="career_icon">
                    <img src="assets/images/wbjee.png" alt="wbjee">
                  </div>
                  <div class="career_cont">
                    <h3>WB JEE</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
         
					<!-- <div class="training_btn">
						 <a href="<?php echo $this->url->link(134);?>">JEE MAIN</a> 
              <a href="<?php echo $this->url->link(134);?>">NEET</a>
						<a href="<?php echo $this->url->link(134);?>">WB JEE</a>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div> 







<div class="starttest add_sec class_room Partners_sec">

  <div class="container">
    <div class="row">
      <div class="nopad test-app courses-area">
        <h2 class="head-title text-center"> Our Partners</h2>
      </div>
    <div class="modcontent clearfix">    
                    <div id="partner-slider" class="Partners_slider">
                        
                        <?php 
                        foreach($partner_details as $pat)
                        {
                          ?>
                        
                        <div class="item"><a href="#!">
                            <div class="add_img">
                            <img src="<?php echo base_url();?>assets/uploads/manage_partner/<?php echo $pat->partner_photo;?>">
                           </div>
                           <!-- <div class="add_info">
                            <h3>MF Fee <span>Batch</span></h3>
                            <p>NEXT BATCH</p>
                           </div> --></a>
                        </div>
                        <?php
                      }
                      ?>
                        
       
                    </div>
                       </div>
  </div>
</div>

</div>

<script type="text/javascript">
  function go_to_library(){
     var baseurl='<?php echo base_url();?>';
  window.location='<?php echo $this->url->link(97);?>';
  }
</script>