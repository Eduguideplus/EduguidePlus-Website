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
          <h2><?php echo @$pageContent[0]->page_headline; ?></h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->






<!-- why us section start here -->

<section id="career_guide_sec">
  <div class="career_guide_part">
    <div class="container">
      <div class="col-md-12">
        <div class="row">

           <div class="courses-area courses-and-coll-p-cus">
         <!--    <h2 class="head-title text-center"> Our Courses and Colleges</h2> -->
             <?php echo @$pageContent[0]->page_content; ?>
          </div>

<?php
foreach($corseList as $row)
{
  ?>

          <div class="col-md-3 col-xs-6">
            <a href="<?php echo $this->url->link(138).'/'.$row->id.'/'.$row->slug;?>">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="<?php echo base_url(); ?>assets/uploads/company_logo/<?php echo $row->icon; ?>" alt="icon1">
                </div>
                <div class="career_cont">
                  <h3><?php echo $row->exam_name; ?></h3>
                </div>
              </div>
            </a>
          </div>

          

         
<?php
}
?>
         


         


          


         



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