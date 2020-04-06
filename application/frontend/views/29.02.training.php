
<div class="all_top">
</div>



<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="<?php echo base_url();?>assets/images/online-exam.jpg" alt="about-b">
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
            <h2 class="head-title text-center"><?php echo @$pageContent[0]->page_headline; ?></h2>
          </div>

          <div class="exam_cont">
            <?php echo @$pageContent[0]->page_content; ?>
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
			<div class="col-md-12 centered">
				
				<div class="training_info text-center">

          <div class="opt_head">
            <p class="choose-cus">Choose Your Exam Option</p>
            <p style="color: black">This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here.  This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.</p>
          </div>
        </div>
      </div>

          <div class="">


            <?php 

            if(count(@$exam_name_list)>0){

            foreach($exam_name_list as $row){?>
           

            <div class="col-md-3 col-xs-6">
              <a href="<?php echo $this->url->link(134);?>/<?php echo @$row->id;?>/<?php echo @$row->slug;?>">
                <div class="career_guide_box">
                  <div class="career_icon">

                    <?php if(@$row->icon !=''){?>


                    <img src="<?php echo base_url();?>assets/uploads/company_logo/<?php echo @$row->icon;?>" alt="jeemain">
                  <?php } else{ ?>

                    <img src="<?php echo base_url();?>assets/uploads/no-image.jpg" alt="jeemain">

                  <?php } ?>



                  </div>
                  <div class="career_cont">
                    <h3><?php echo @$row->exam_name;?></h3>
                  </div>
                </div>
              </a>
            </div>


          <?php } } else{ echo 'No Exam Added..'; }?>




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