<div class="all_top">
</div>

<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="assets/images/course-college.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont">
          <h2>Video Tutorials</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->






<!-- why us section start here -->

<section id="career_guide_sec">
  <div class="career_guide_part video_cata">
    <div class="container">
      <div class="col-md-12">
        <div class="row">

           <div class="courses-area courses-and-coll-p-cus">
         <!--    <h2 class="head-title text-center"> Our Courses and Colleges</h2> -->
             <!-- <p>Eduguideplus is a renowned and established educational consultant in India. We enable students to pursue their career in medical, engineering, BBA, MBA, nursing by studying in India and abroad. Education is the key to a bright and successful future. we believe in the motto "Education for all" keeping strictly to this motto our team of experts guide young aspiring students towards a brighter prospect. It endeavours to treat every student as an individual, to recognized their potential an to ensure that they receive the best preparation and training to get admission in world class institute for achieving their career ambitions and life goals.</p> -->


             <?php if(@$about_us[0]->page_content){ echo @$about_us[0]->page_content;}?>


          </div>

          <?php 

          if(count(@$category_list)>0){

          foreach( $category_list as $row){?>


          <div class="col-md-3 col-xs-6">
            <a href="<?php echo $this->url->link(145);?>/<?php echo @$row->category_id;?>/<?php echo @$row->category_slug;?>">
              <div class="career_guide_box">
                <div class="career_icon">

                  <?php if(@$row->image !='') {?>


                  <img src="<?php echo base_url();?>assets/uploads/video_tutorial_category/<?php echo @$row->image;?>" alt="icon1">

                <?php } else{?>

                   <img src="<?php echo base_url();?>assets/uploads/no-image.jpg" alt="icon1">

                <?php } ?>


                </div>
                <div class="career_cont">
                  <h3><?php echo @$row->category_name;?></h3>
                </div>
              </div>
            </a>
          </div>

        <?php } }else{ echo '<h1>No Category Added</h1>';} ?>

          <!-- <div class="col-md-3">
            <a href="<?php echo base_url();?>Video_tutorials/video_list">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/mediacl-p.png" alt="icon2">
                </div>
                <div class="career_cont">
                  <h3>NEET</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3">
            <a href="<?php echo base_url();?>Video_tutorials/video_list">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/management-p.png" alt="icon3">
                </div>
                <div class="career_cont">
                  <h3>WBJEE</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3">
            <a href="<?php echo base_url();?>Video_tutorials/video_list">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/nursing-p.png" alt="icon4">
                </div>
                <div class="career_cont">
                  <h3>Nursing</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3">
            <a href="<?php echo base_url();?>Video_tutorials/video_list">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/media-jour-p.png" alt="icon4">
                </div>
                <div class="career_cont">
                  <h3>Practical</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3">
            <a href="<?php echo base_url();?>Video_tutorials/video_list">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/pharmacy-p.png" alt="icon4">
                </div>
                <div class="career_cont">
                  <h3>Chemistry</h3>
                </div>
              </div>
            </a>
          </div>


          <div class="col-md-3">
            <a href="<?php echo base_url();?>Video_tutorials/video_list">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/secience-p.png" alt="icon4">
                </div>
                <div class="career_cont">
                  <h3>Physics</h3>
                </div>
              </div>
            </a>
          </div>


          <div class="col-md-3">
            <a href="<?php echo base_url();?>Video_tutorials/video_list">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/law-p.png" alt="icon4">
                </div>
                <div class="career_cont">
                  <h3>Law</h3>
                </div>
              </div>
            </a>
          </div> -->



        </div>
      </div>
    </div>
  </div>
</section>


<!-- why us section end here -->



<!-- <div class="about_sec about_read_more last">
  <div class="container">
    <div class="row">
      
      <div class="col-md-12 p-no">
        <div class="col-sm-12">
          <div class="about_info">
            
            <div class="Education">
              <h4>Vision</h4>
              
              <p>The most difficult aspects of life is not earning but to manage our life within our earning, and also secure our future. This is the vision which inspired Mr. Surajit to develop insight in this field. Here he plan for your secured future and also secure your dream.</p>
              <P>He incorporates your lifestyle, retirement and so on. It is a common trend of common people that we often get over ambitious and loss our fund in way to get more return. So in his vision, it is most important to settle your fund in proper manner to secure your sound sleep for rest of life.</P>
          
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
    
  </div>
</div> -->





<!-- <section class="why_details">
  <div class="container">
    <div class="row">
      <div id="sp-why-us" class="col-sm-12 col-md-12">
        <div class="sp-column ">
          <div class="sp-module ">
            <h3 class="custom-module-heading">Our Services Approach</h3>
            <div class="sp-module-content">

              <div class="custom">
                <div class="sppb-section-title sppb-text-center">
                  
                  <?php if(@$our_services_approach_content[0]->content!=''){ echo @$our_services_approach_content[0]->content; }?>
              </div>


                 <?php foreach($our_services_approach as $row){?>
              <div class="sppb-col-sm-6">
                  <div class="sppb-media">
                      <div class="pull-left">
                          <div class="sppb-icon">
                            <img class="sppb-img-responsive" src="<?php echo base_url()?>assets/uploads/our_services_approach/<?php  echo @$row->image; ?>" alt="rich-product-basket" width="60" height="60">
                          </div>
                      </div>
                        <div class="sppb-media-body">
                          <h3 class="why_sub_title"><?php if(@$row->title!=''){ echo @$row->title; }?></h3>
                          <div class="sppb-addon-text">
                              <div style="text-align: left;">
                                <?php if(@$row->content!=''){ echo @$row->content; }?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <?php }?>



              



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->