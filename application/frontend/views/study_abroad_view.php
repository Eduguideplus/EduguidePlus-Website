<div class="all_top">
</div>


<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="assets/images/study-abroad.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont online_x">
          <h2>Study Abroad</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->

<div class="services_part study_sec">
<div class="container main-container-home">
      <div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
       <!--  <h3>Study Abroad Services Click will Open</h3> -->
        <p>This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.</p>
      </div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="about-exam faq analysis-block">


            <div class="panel-group" id="accordion">

<?php foreach ($study_abroad as $key => $value) { ?>

 
            <div class="panel panel-default">
              <div  class="panel-heading  wrong-bg color_af <?php if($key==0){ ?> active <?php }  ?>">
                <h4 class="panel-title color_c">
                
                 <?php 
                                        $country = $this->common_model->common($table_name ='countries', $field = array(), $where = array('id'=>$value->country_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                                        foreach ($country as $con) {
                                 ?>



                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>"><?php  echo $con->name; ?></a>
                  <?php } ?>
                </h4>
              </div>
              <div id="collapse<?php echo $key; ?>" <?php if(@$key==0){?> class="panel-collapse collapse in" <?php } else { ?>class="panel-collapse collapse" <?php } ?>>
                <div class="panel-body">
                <ul class="option-list">
                    <li>
                      <p>Courses Name</p>
                      <ul>
                        <li><?php echo $value->course_name; ?></li>
                        
                      </ul>
                    </li>
                    <li>
                      <p>List Of Colleges</p>
                      <ul>
                        <li><?php echo $value->college_name; ?></li>
                        
                      </ul>
                    </li>
                    <li>
                      <p>Fees Structure</p>
                      <ul class="cour-cus">
                        <li>
                          <div class="table_des">
                              <table>
                              <tr>
<th>Institute</th>
                                <th>Course Name</th>
                                
                                <th>Fees</th>
                              </tr>

                               <?php 
                                        $fees = $this->common_model->common($table_name = 'tbl_abroad_fees', $field = array(), $where = array('study_abroad_id'=>$value->study_abroad_id,'status'=>'active'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                                        foreach ($fees as $value) {
                                 ?>
                              <tr>
                                 <td><?php echo $value->college_name; ?></td>
                                <td><?php echo $value->course_name; ?></td>
                               
                                <td><?php echo $value->fees; ?></td>
                              </tr>

                            <?php } ?>
                             
                             
                             
                            </table>
                          </div> 
                        </li>
                      </ul>
                    </li>
                   </ul>
              </div>
            </div>
          </div>

        <?php } ?>

           
            <!-- <div class="panel panel-default">
              <div class="panel-heading  wrong-bg color_af ">
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse49">02. Philippines</a>
                </h4>
              </div>
              <div id="collapse49" class="panel-collapse collapse ">
                <div class="panel-body">
                <ul class="option-list">
                    <li>
                      <p>Courses Name</p>
                      <ul>
                        <li>01. MBBS (Bachelor of Medicine and Bachelor of Surgery)</li>
                        <li>02. BAMS ( Bachelor of Ayurvedic Medicine and Surgery)</li>
                        <li>03. BHMS (Bachelor of Homeopathic Medicine & Surgery)</li>
                        <li>04. BDS (Bachelor of Dental Sciences)</li>
                      </ul>
                    </li>
                    <li>
                      <p>List Of Colleges</p>
                      <ul>
                        <li>01. This is Demo College Name</li>
                        <li>02. This is Demo College Name</li>
                        <li>03. This is Demo College Name</li>
                        <li>04. This is Demo College Name</li>
                      </ul>
                    </li>
                    <li>
                      <p>Fees Structure</p>
                      <ul>
                        <li>
                          <div class="table_des">
                            <table>
                              <tr>
                                <th>Course Name</th>
                                <th>Institute</th>
                                <th>Fees</th>
                              </tr>
                              <tr>
                                <td>MBBS</td>
                                <td>Calcutta National Medical College</td>
                                <td>20,000,00</td>
                              </tr>
                              <tr>
                                <td>BAMS</td>
                                <td>KPC Medical College</td>
                                <td>15,000,00</td>
                              </tr>
                              <tr>
                                <td>BHMS</td>
                                <td>Institute of Post Graduate Medical Education</td>
                                <td>25,000,00</td>
                              </tr>
                              <tr>
                                <td>BDS</td>
                                <td>Christian Medical College</td>
                                <td>30,000,00</td>
                              </tr>
                            </table>
                          </div>
                        </li>
                      </ul>
                    </li>
                   </ul>
                <strong>Your Answer:</strong> A passive fund matches the performance of the Index.               </div>
              </div>
            </div> -->
          

           
            <!-- <div class="panel panel-default">
              <div class="panel-heading  wrong-bg color_af ">
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse50">03. Nepal</a>
                </h4>
              </div>
              <div id="collapse50" class="panel-collapse collapse ">
                <div class="panel-body">
                <ul class="option-list">
                    <li>
                      <p>Courses Name</p>
                      <ul>
                        <li>01. MBBS (Bachelor of Medicine and Bachelor of Surgery)</li>
                        <li>02. BAMS ( Bachelor of Ayurvedic Medicine and Surgery)</li>
                        <li>03. BHMS (Bachelor of Homeopathic Medicine & Surgery)</li>
                        <li>04. BDS (Bachelor of Dental Sciences)</li>
                      </ul>
                    </li>
                    <li>
                      <p>List Of Colleges</p>
                      <ul>
                        <li>01. This is Demo College Name</li>
                        <li>02. This is Demo College Name</li>
                        <li>03. This is Demo College Name</li>
                        <li>04. This is Demo College Name</li>
                      </ul>
                    </li>
                    <li>
                      <p>Fees Structure</p>
                      <ul>
                        <li>
                          <div class="table_des">
                            <table>
                              <tr>
                                <th>Course Name</th>
                                <th>Institute</th>
                                <th>Fees</th>
                              </tr>
                              <tr>
                                <td>MBBS</td>
                                <td>Calcutta National Medical College</td>
                                <td>20,000,00</td>
                              </tr>
                              <tr>
                                <td>BAMS</td>
                                <td>KPC Medical College</td>
                                <td>15,000,00</td>
                              </tr>
                              <tr>
                                <td>BHMS</td>
                                <td>Institute of Post Graduate Medical Education</td>
                                <td>25,000,00</td>
                              </tr>
                              <tr>
                                <td>BDS</td>
                                <td>Christian Medical College</td>
                                <td>30,000,00</td>
                              </tr>
                            </table>
                          </div> 
                        </li>
                      </ul>
                    </li>
                   </ul>
                <strong>Your Answer:</strong> Rs. 10,00,000/-              </div>
              </div>
            
          </div> -->

           
        <!--     <div class="panel panel-default">
              <div class="panel-heading  wrong-bg color_af ">
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse51">04. Bangladesh</a>
                </h4>
              </div>
              <div id="collapse51" class="panel-collapse collapse ">
                <div class="panel-body">
                <ul class="option-list">
                    <li>
                      <p>Courses Name</p>
                      <ul>
                        <li>01. MBBS (Bachelor of Medicine and Bachelor of Surgery)</li>
                        <li>02. BAMS ( Bachelor of Ayurvedic Medicine and Surgery)</li>
                        <li>03. BHMS (Bachelor of Homeopathic Medicine & Surgery)</li>
                        <li>04. BDS (Bachelor of Dental Sciences)</li>
                      </ul>
                    </li>
                    <li>
                      <p>List Of Colleges</p>
                      <ul>
                        <li>01. This is Demo College Name</li>
                        <li>02. This is Demo College Name</li>
                        <li>03. This is Demo College Name</li>
                        <li>04. This is Demo College Name</li>
                      </ul>
                    </li>
                    <li>
                      <p>Fees Structure</p>
                      <ul>
                        <li>
                          <div class="table_des">
                            <table>
                              <tr>
                                <th>Course Name</th>
                                <th>Institute</th>
                                <th>Fees</th>
                              </tr>
                              <tr>
                                <td>MBBS</td>
                                <td>Calcutta National Medical College</td>
                                <td>20,000,00</td>
                              </tr>
                              <tr>
                                <td>BAMS</td>
                                <td>KPC Medical College</td>
                                <td>15,000,00</td>
                              </tr>
                              <tr>
                                <td>BHMS</td>
                                <td>Institute of Post Graduate Medical Education</td>
                                <td>25,000,00</td>
                              </tr>
                              <tr>
                                <td>BDS</td>
                                <td>Christian Medical College</td>
                                <td>30,000,00</td>
                              </tr>
                            </table>
                          </div>
                        </li>
                      </ul>
                    </li>
                   </ul>
                <strong>Your Answer:</strong> Custodian keeps the custody of asset of the Funds.               </div>
              </div>
            </div>  -->      
          


        <!--   <div class="panel panel-default">
              <div class="panel-heading  wrong-bg color_af ">
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse52">05. Krigsthan</a>
                </h4>
              </div>
              <div id="collapse51" class="panel-collapse collapse ">
                <div class="panel-body">
                <ul class="option-list">
                    <li>
                      <p>Courses Name</p>
                      <ul>
                        <li>01. MBBS (Bachelor of Medicine and Bachelor of Surgery)</li>
                        <li>02. BAMS ( Bachelor of Ayurvedic Medicine and Surgery)</li>
                        <li>03. BHMS (Bachelor of Homeopathic Medicine & Surgery)</li>
                        <li>04. BDS (Bachelor of Dental Sciences)</li>
                      </ul>
                    </li>
                    <li>
                      <p>List Of Colleges</p>
                      <ul>
                        <li>01. This is Demo College Name</li>
                        <li>02. This is Demo College Name</li>
                        <li>03. This is Demo College Name</li>
                        <li>04. This is Demo College Name</li>
                      </ul>
                    </li>
                    <li>
                      <p>Fees Structure</p>
                      <ul>
                        <li>
                          <div class="table_des">
                            <table>
                              <tr>
                                <th>Course Name</th>
                                <th>Institute</th>
                                <th>Fees</th>
                              </tr>
                              <tr>
                                <td>MBBS</td>
                                <td>Calcutta National Medical College</td>
                                <td>20,000,00</td>
                              </tr>
                              <tr>
                                <td>BAMS</td>
                                <td>KPC Medical College</td>
                                <td>15,000,00</td>
                              </tr>
                              <tr>
                                <td>BHMS</td>
                                <td>Institute of Post Graduate Medical Education</td>
                                <td>25,000,00</td>
                              </tr>
                              <tr>
                                <td>BDS</td>
                                <td>Christian Medical College</td>
                                <td>30,000,00</td>
                              </tr>
                            </table>
                          </div>
                        </li>
                      </ul>
                    </li>
                   </ul>
                <strong>Your Answer:</strong> Custodian keeps the custody of asset of the Funds.               </div>
              </div>
            
          </div> -->

          
        </div>




      </div>
       <!-- <div class="back-block">
        <a href="http://192.168.0.12/eduguide/site/dashboard" class="pull-right gall_back"><i class="fa fa-chevron-right" aria-hidden="true"></i>Go to Dashboard</a> </div> -->

  </div>
  </div>
</div>