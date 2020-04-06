<!--   <link href="<?php //echo base_url();?>galleryp/css/style.css" rel="stylesheet"> -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />

<div class="padT100 padB100 latest-ss gallery-page-sec">
           <div class="mix-default container" >
            <div class="row">
                 <h2 class="head-title text-center"><?php echo @$gallery_cat_details[0]->cat_name; ?></h2>
                  <div class="media-block portfolioContainer diff_gallery gallery_title">
    <div class="col-md-12">
            <h2 class="head-title text-center">Photo Section</h2>
          </div>
  </div>
                <div class="media-block portfolioContainer diff_gallery">



                            <?php foreach($gallery_image_list as $row){?>

                      <div class="gallery-box logos isotope-item col-md-4 over_ini" style="margin: 0 !important;">
                          <a href="<?php echo base_url();?>assets/uploads/category/gallery/<?php echo @$row->gallery_cover_image;?>" data-fancybox="preview">
                          <div class="gallery-img-wrap">
                         <?php if(@$row->gallery_cover_image !=''){ ?> <img src="<?php echo base_url();?>assets/uploads/category/gallery/<?php echo @$row->gallery_cover_image;?>" /> <?php }?>
                          </div>
                          <div class="zoom-item"><i class="fa fa-plus"></i></div>
                          </a>
                    
                      
                      </div>  





                    <?php }?>

</div> 
<?php
if(count($gallery_video_list)>0)
{
  ?>
  <div class="media-block portfolioContainer diff_gallery gallery_title">
    <div class="col-md-12">
            <h2 class="head-title text-center">Video Section</h2>
          </div>
  </div>
<div class="media-block portfolioContainer diff_gallery">
                    
                      
                       
                      
                      <?php foreach($gallery_video_list as $row){






                           $string=Null;
                            if($row->video_link!='')
                              {
                              
                                $string     = $row->video_link;
                                                $search     = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';       //show & play video in the list...
                                                $replace    = "youtube.com/embed/$1";    
                                                $url = preg_replace($search,$replace,$string);
                            ?>









                        
                       
                      <div class="gallery-box ui isotope-item col-md-4">
                       <iframe width="100%" height="300" src="<?php echo @$url;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          
                      </div>

                    <?php }}?>


                     
                    
                  
       
                    </div>
                   <?php
                 }
                 ?>

                  <div class="back-block">
                           <a href="<?php echo $this->url->link(147);?>" class="pull-right gall_back"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                         </div>
                </div>
            </div>  

        </div> 


 

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>




