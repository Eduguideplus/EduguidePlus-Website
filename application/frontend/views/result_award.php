
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
  			<h3>Rank & Award</h3>
  		</div>

  		<div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1">

  				<div class="rank-bx">

            <form method="post" action="" class="rank-form">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>Type of Test :</label>
                   <select class="form-control" name="test_type" id="test_type" onchange="get_test_dates(this.value)">
                    <option value="">Choose Test</option>
                      <option value="3">Knowledge Test</option>
                      <option value="5">Quiz Test 1</option>
                      <option value="6">Quiz Test 2</option>
                      <option value="4">Knockout Test</option>
                    </select>

                </div>


              </div>


               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label>Date of Test :</label>
                   <!--  <input type="text" class="form-control" placeholder="Enter Test Date" id="datepicker10" autocomplete="off"> -->
<select class="form-control" name="test_date" id="test_date" onchange="get_test_data(this.value)" >
                      <option value="">Choose Test Date</option>
                      
                     
                    </select>

                </div>


              </div>



              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="table-responsive" >          
                    <table class="table award-table"  >
                      <thead>
                        <tr>
                        <th>Image</th>
                          <th>Date of Test</th>
                          <th>Type of Test</th>
                          <th>Name</th>
                          <th>Email</th>
                        <th>Score</th>
                          <th>Rank</th>
                          <th>Award</th>
                          <th>Discussion</th>
                        </tr>
                      </thead>
                      <tbody id="put_data" >
    <?php

    if(count($result)>0)
    {

    

$rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>@$result[0]->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '', $end = '');

     foreach ($rank_indexing_data as $key => $row) {

      $obtained_marks= $row->total_marks; 

      $user_data = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


        
        $knowledge_set_data = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$row->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
        
         $test_data = $this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>@$knowledge_set_data[0]->test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

      $exam_data = $this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('set_id'=>$row->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$row->set_id,'user_id'=>@$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


    ?>                 

                        <tr>
                        <td><div class="rankers">
                          <?php if(@$user_data[0]->profile_photo!='')
                          {
                            ?>
                          <img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="Surajit Pramanick" style="max-width: 100%" class="right">
                          <?php
                        }
                        else{
                          ?>
                          <img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="Surajit Pramanick" style="max-width: 100%" class="right">
                          <?php
                        }
                        ?>
                        </div></td>
                      <td><?php echo date('jS M Y',strtotime(@$knowledge_set_data[0]->exam_date)); ?></td>
                          <td><?php echo @$test_data[0]->test_name; ?></td>
                          <td><?php echo @$user_data[0]->user_name; ?></td>
                          <td><?php echo @$user_data[0]->login_email; ?></td>

                         <td><?php echo $obtained_marks; ?></td>
                          <td><?php echo $key+1; ?></td> 
                         <td><?php if(@$user_award[0]->award_amount!=""){echo @$user_award[0]->award_amount; }else{echo 'Try Next';} ?></td>
                          <td><a href="<?php echo $this->url->link(94); ?>/<?php echo $row->set_id; ?>/<?php echo $row->exam_id; ?>" class="btn read-btn">Discuss</a></td>
                        </tr>
                      <?php } 
                    }
                    else{
                      ?>

                          <tr>
                          
                          <td colspan="9" style="color: #21B6A8"><strong>Please filter Test to get the Result</strong></td>
                        </tr>
<?php
}
?>


                        <!--   <tr>
                          <td><div class="rankers"><img src="<?php echo base_url(); ?>assets/images/job-admin.png" alt="Avatar" class="right">
                          <td>01- Nov - 2018</td>
                          <td>Knowledge Test</td>
                          <td>ABCDE</td>
                          <td>@nbdf.com</td>
                          <td>1</td>
                          <td>1</td>
                          <td>Award Amount</td>
                          <td><a href="#" class="btn read-btn">Discuss</a></td>
                        </tr>


                          <tr>
                          <td><div class="rankers"><img src="<?php echo base_url(); ?>assets/images/job-admin.png" alt="Avatar" class="right">
                          <td>01- Nov - 2018</td>
                          <td>Knowledge Test</td>
                          <td>ABCDE</td>
                          <td>@nbdf.com</td>
                          <td>-0.952</td>
                          <td>4</td>
                          <td>Try next</td>
                          <td><a href="#" class="btn read-btn">Discuss</a></td>
                        </tr>


                          <tr>
                          <td><div class="rankers"><img src="<?php echo base_url(); ?>assets/images/job-admin.png" alt="Avatar" class="right">
                          <td>01- Nov - 2018</td>
                          <td>Knowledge Test</td>
                          <td>ABCDE</td>
                          <td>@nbdf.com</td>
                          <td>.8765</td>
                          <td>2</td>
                          <td>Award Amount</td>
                          <td><a href="#" class="btn read-btn">Discuss</a></td>
                        </tr> -->
                      </tbody>
                    </table>
                    </div>


              </div>


             <!--  <div class="col-md-12 col-sm-12 col-xs-12">
                  <ul class="pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                  </ul>
              </div> -->

              </form>




  					



  				</div>

  			


        

        
  			







  		</div>

  </div>
 </div>
</div>
 <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
  <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
<style>

.ui-state-highlight,
.ui-widget-content .ui-state-highlight,
.ui-widget-header .ui-state-highlight {
  background-color: #981010!important;
  color: #000 !important;
  padding: 3px;
 /* border-top-left-radius: 1.5em;
  border-bottom-right-radius: 1.5em;*/
}
/*.ui-datepicker .ui-datepicker-calendar a.ui-state-hover {
    border: 1px solid #999;
    background-color: #b79d1b;
    color: #444;
}*/
.ui-datepicker .ui-widget-content {
    background: #ffffff none;
}
 
.event a {
    background-color: #42B373 !important;
    background-image :none !important;
    color: #ffffff !important;
}

.event1 a {
    background-color: #f7d116 !important;
    background-image :none !important;
    color: #ffffff !important;
}
.event2 a {
    background-color: #f7d116 !important;
    background-image :none !important;
    color: #ffffff !important;
}
</style>

 <script>

$(document).ready(function() { 

<?php   $knowledge_set_data = $this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('test_type'=>'3','exam_date <'=>date('Y-m-d')), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


?>
 
 var eventDates = {};


<?php for ($i=0; $i < count($knowledge_set_data) ; $i++) { 
 
 ?>
  eventDates[ new Date( '<?php echo str_replace('-', '/', $knowledge_set_data[$i]->exam_date); ?>' )] = new Date( '<?php echo str_replace('-', '/', $knowledge_set_data[$i]->exam_date); ?>' );
  <?php } ?>




        
       

$('#datepicker10').datepicker({
        
        dateFormat: 'yy-mm-dd',
        autoclose: true,
        todayHighlight: 1,
         beforeShowDay: function( date ) {
                var knowledge = eventDates[date];
               

                if( knowledge ) {
                      return [true,'event','Knowledge Test'];
                }else {
                     return [true, '', ''];
                }
             },

     onSelect: function (dateText) {
 
 var test_type=$('#test_type').val();

$.ajax({
    type: "post",
    url: '<?php echo base_url(); ?>Result/search_data',
    data: {test_type: test_type, date: dateText},
    success: function(data){
        // alert(data);
        $('#put_data').html(data);
    }
});
   
    
    }


    });


});
</script>

<script type="text/javascript">
  function get_calender_color(value) {

$.ajax({
    type: "post",
    url: '<?php echo base_url(); ?>Result/search_dates',
    data: {test_type: value},
    success: function(data){
        // alert(data);
        $('#put_data').html(data);
    }
});

}
</script>

<script type="text/javascript">
  function get_test_dates(value) {


   $.ajax({
    type:'post',
    datatype:'html',
    url:'<?php echo base_url(); ?>Result/get_dates',
    data:{test_type: value},
    success:function(data) {

      // alert(data);
      $('#test_date').html(data);
    }
   });
  }

</script>


<script type="text/javascript">
  function get_test_data(value) {

var test_type=$('#test_type').val();
   $.ajax({
    type:'post',
    datatype:'html',
    url:'<?php echo base_url(); ?>Result/search_data',
    data:{test_type: test_type, date: value},
    success:function(data) {

      // alert(data);
      $('#put_data').html(data);
    }
   });
  }

</script>