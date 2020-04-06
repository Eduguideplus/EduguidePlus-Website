
<div class="all_top">
</div>
<!-- about banner section stert here -->


<!-- <section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="<?php echo base_url(); ?>assets/images/jee-main.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont online_x">
          <h2><?php echo @$exam_details[0]->exam_name; ?></h2>
        </div>
      </div>
    </div>
  </div>
</section> -->



<div class="services_part">
<div class="container main-container-home">
      <div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
   
       Top Colleges
      </div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="about-exam faq analysis-block">


            <div class="panel-group" id="accordion">

 <?php

 

 foreach($clg_header as $key=>$exrow)
  {

    
    

    
    ?>
            <div class="panel panel-default">
              <div class="panel-heading  wrong-bg color_af <?php if($key==0){ ?>active<?php } ?>">
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $exrow->header_id; ?>" class="taggole-psec"><?php echo $exrow->header; ?></a>
                </h4>
              </div>
              <div id="collapse<?php echo $exrow->header_id; ?>" class="panel-collapse collapse <?php if($key==0){ ?>in<?php } ?>">
                <div class="panel-body">
               

                  <div class="course-content-section">
                           <div class="table_des">


                    <!-- <span class="search_btn">
                          <input type="search" name="search" id="search_<?php echo $instrow['level_id'] ; ?>" onkeyup="search_level_exam_institute('<?php echo $instrow['level_id'] ; ?>','<?php echo $this->uri->segment(2); ?>');" placeholder="Search Here">


                        </span> -->

                        <?php 


                          $college=$this->common_model->common($table_name = 'tbl_top_colleges', $field = array(), $where = array('header_id'=>$exrow->header_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                          if(count($college)>0)
                          {

                         ?>
                         <!-- <?php echo $exrow->header; ?> -->
                        <table id="tbl" >
                          <tbody><tr>
                            <th>Sl. No.</th>
                            <th>College</th>
                 
               
                              <th>Type</th>
                              <th>Course</th>
                
                                <th>Duration</th>
                          </tr>

                    
<?php 

    $college=$this->common_model->common($table_name = 'tbl_top_colleges', $field = array(), $where = array('header_id'=>$exrow->header_id, 'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                             // echo '<pre>';

                             // print_r($college);
                             $i=0;
                             foreach ($college as $row5) {
                              $i++;
 ?>
                  
                        
                          <tr>
                           
                            <td><?php echo $i; ?></td>

                            <?php 

                            


                            
                               # code...
                             

                             
                         $college_id=$row5->college_id;
                             $course_id=$row5->course;


                             $inst=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array('id'=>$college_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                             $course=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$course_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                             // echo '<pre>';

                             // print_r($inst);



                             ?>

                           
                          
                            <td><?php echo @$inst[0]->institute_name; ?> </td>
                            <td><?php echo @$row5->type; ?> </td>
                            <td>
                              <?php echo @$course[0]->exam_name; ?> 
                              </td>
                            <td><?php echo @$college[0]->duration; ?></td>
                          </tr>

                        <?php } ?>

                        

                       

                       
                        </tbody></table>

                      <?php } else { ?>

                        No College in This List.

                      <?php } ?>


                      </div>
                 </div>
              </div>
            </div>
          </div>

         <?php
       }
       ?>  
            


       
       

          






       <!-- <div class="back-block">
        <a href="http://192.168.0.12/eduguide/site/dashboard" class="pull-right gall_back"><i class="fa fa-chevron-right" aria-hidden="true"></i>Go to Dashboard</a> </div> -->

  </div>
  </div>
</div>
</div>
</div>


<script type="text/javascript">


  function search_level_exam_institute(level_id,exam_id)
  {


     var base_url='<?php echo base_url(); ?>';


    var search_name=  $('#search_'+level_id).val();
    

       $.ajax({
              
             url:base_url+'Course_collages/search_level_exam_institute',
             data:{search_name:search_name,level_id:level_id,exam_id:exam_id},
              dataType: "html",
                type: "POST",

             success: function(data){


             // alert(data);

              $('#tbl_'+level_id).html(data);
                
                  
                
              }
             });
   
     


  }
  

</script>