<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>









<div class="container-fluid login_register deximJobs_tabs practice">
 <div class="row">
  <div class="container main-container-home">
  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
  			<h3>Library</h3>
  		</div>

  		<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
  			<div class="rank-bx">
  					 <div class="col-lg-12 app-ar">
              <?php 
              foreach($exam_type as $row)
            {

              $parent_exam_type=$this->common_model->common($table_name ='tbl_exam_type', $field = array(), $where = array('id'=>$row->library_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
              ?>
            
            <div class="courses-block library-list">
              <h2><img src="<?php echo base_url(); ?>assets/images/pdf1.png"> <?php echo $parent_exam_type[0]->exam_name;?></h2>
              
              <a <?php if($this->session->userdata('activeuser')!=""){ ?> href="<?php echo base_url();?>assets/uploads/library/<?php echo $row->upload_file;?>" download <?php }else{  ?> href="<?php echo $this->url->link(86); ?>" <?php } ?>  ><img src="<?php echo base_url(); ?>assets/images/download1.png" class="pdf-down"></a>
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