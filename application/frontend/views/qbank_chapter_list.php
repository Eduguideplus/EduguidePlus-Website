<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>





<div class="why_us go_for_test">
  <div class="container">
    <div class="row">
      <!-- <div class="col-md-12 text-center">
        <h2>Chapter wise Test</h2>
      </div> -->
      <div class="col-md-10 p-no col-md-offset-1">
        <div class="tab_menu">
          <div class="text-center"><h2>Question Bank For <br><br><?php echo $subject_list[0]->section_name; ?></h2> 
           
          </div>
          <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#subject1" data-toggle="tab">Select Chapter for Questions</a></li>
                           <!--  <li><a href="#Mini" data-toggle="tab">Mini Comprehensine</a></li>
                            <li><a href="#Mega" data-toggle="tab">Mega Comprehensine</a></li> -->

                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="subject1">
                          <ul>
                            <?php
                            $count=0;
                            foreach($chapter_list as $row)
                              {
                                $count++;

                              
                                ?>
                            <li><a href="<?php echo $this->url->link(157);?>/<?php echo $row->chap_id; ?>"> <?php echo $count; ?>. <?php echo $row->chap_name; ?> <i class="fa fa-angle-right pull-right"></i></a></li>
                            
<?php
}
?>
                          </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
  function showMsg()
  {
    alert('Sorry! Currently not Available. Comming Soon');
  }
</script>