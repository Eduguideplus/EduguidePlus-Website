<div class="all_top">
</div>

<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="assets/images/about-b.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont">
          <h2>About Us</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->
<?php 
if(@$whyus[1]->title!='')
{
  ?>
<div class="about_sec about_read_more">
  <div class="container border">
    <div class="row">
      
      <div class="col-md-12 p-no border">
        <div class="col-md-7 col-xs-12">
          <div class="about_info">
            <h4><?php echo @$whyus[1]->title; ?></h4>
            <p><?php echo @$whyus[1]->content; ?></p>
          </div>
        </div>
        <div class="col-md-5 col-xs-12">
            <div class="about_fimg">
              <img src="<?php echo base_url() ?>/assets/uploads/whyus/<?php echo @$whyus[1]->image; ?>">
          </div>
        </div>
      </div>
      
    </div>
    
  </div>
</div>

<?php
}
?>


<!-- why us section start here -->

<?php 
if(@$whyus[0]->title!='')
{
  ?>
<section id="why_us_sec">
  <div class="why_us_part">
    <div class="container">
      <div class="col-md-12">
        <div class="row">

          <div class="why_us_box">
            <div class="col-md-6">
              <div class="why_img">
               <img src="<?php echo base_url() ?>/assets/uploads/whyus/<?php echo @$whyus[0]->image; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="why_us_cont">
                <h4><?php echo @$whyus[0]->title; ?></h4>
                <p><?php echo @$whyus[0]->content; ?></p>
            </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}
?>

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