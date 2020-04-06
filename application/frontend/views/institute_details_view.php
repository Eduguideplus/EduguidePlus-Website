
<div class="all_top">
</div>
<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img only-for-institue-imgage">
      <img src="<?php echo base_url(); ?>assets/uploads/institute/<?php echo @$institute_details[0]->image;?>" alt="about-b">
      <div class="overlay"></div>
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont online_x">
          <h2><?php echo @$institute_details[0]->institute_name;?></h2>
        </div>
      </div>
    </div>
  </div>
</section>


 
<div class="about-section-bac-p-us">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="insti-about-heade">About Institute</h4>
       <?php echo @$institute_details[0]->about_institute; ?>
      </div>
    </div>
  </div>

</div>





<?php
if(count($institute_info)>0){
?>


<div class="services_part">
<div class="container main-container-home">
      <div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
   




        <div class="table-section-about-institue">
          <h4 class="ins-abt-cour">Institute Information</h4>
          <div class="table_des">
               
                        <table>
                          <tbody>
                         <?php
                         foreach($institute_info as $resinfo)
                          {
                            ?>
                          <tr>
                            <td><?php echo $resinfo->info_content_1; ?></td>
                            <td><?php echo $resinfo->info_content_2; ?></td>
                            <td><?php echo $resinfo->info_content_3; ?></td>
                           
                          </tr>
                          <?php
                        }
                        ?>
                        
                        </tbody></table>
                      </div>
        </div>
      </div>

    
</div>
</div>
<?php
}
?>