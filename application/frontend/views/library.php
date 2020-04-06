<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>

<div class="container-fluid login_register deximJobs_tabs practice library_section">
 <div class="row">
  <div class="container main-container-home">
  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
  			<h3>Student's Kit</h3>
  		</div>

  		<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
  			<div class="rank-bx">
  					 <div class="col-lg-12 app-ar">
              <?php 
              foreach($material as $row)
            {

              ?>
            
            <div class="courses-block library-list">
              <table>
                <tr>
                  <td class="imaghes-td">
              <h2 class="imgh-width"><img src="<?php echo base_url(); ?>assets/images/pdf1.png"> </h2></td>

              <td class="file-info-td-class"><?php echo $row->material_name;?></td>
              
              <td><a <?php if($this->session->userdata('activeuser')!=""){ ?> href="<?php echo base_url(); ?>assets/uploads/material/<?php echo $row->material_file; ?>" download <?php }else{  ?> href="<?php echo $this->url->link(86); ?>" <?php } ?>  ><img src="<?php echo base_url(); ?>assets/images/download1.png" class="pdf-down"></a></td>
            </tr>
              </table>
            </div>

            <?php
          }
          ?>

            
           
             
           
           

           

          

          </div>

  			

        
  			


  			</div>




  		</div>

  </div>
 </div>
</div>