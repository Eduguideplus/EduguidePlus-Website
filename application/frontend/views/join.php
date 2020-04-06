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
  			<h3>Join Test</h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">
  			<div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
  				<div class="test-cnt">
  					<h4><?php echo @$test_type_dtls[0]->test_name;?></h4>

  					

            <div class="friend" id="friend">

            <h4>Your Details</h4>

            <form method="post" action="" class="friend-details" id="friend-detls">
               <div class="form-group">
                  <label>Name:</label>
                  <input type="text" placeholder="" class="form-control">
               </div>
               <div class="form-group">
                  <label>Mobile No:</label>
                  <input type="text" placeholder="" class="form-control">
               </div>
               <div class="form-group">
                  <label>Email:</label>
                  <input type="text" placeholder="" class="form-control">
               </div>
            </form>

            </div>



           <!--  <h4>Test Details</h4> -->

            <form method="post"  class="friend-details" id="your-detls" action="<?php echo $this->url->link(116);?>">
              <!--  <div class="form-group">
                 <label>Name:</label>
                 <input type="text" placeholder="" class="form-control">
              </div>
              <div class="form-group">
                 <label>Mobile No:</label>
                 <input type="text" placeholder="" class="form-control">
              </div>
              <div class="form-group">
                 <label>Email:</label>
                 <input type="text" placeholder="" class="form-control">
              </div>
              <div class="form-group">
                 <label>Password:</label>
                 <input type="password" placeholder="" class="form-control">
              </div> -->

              <input type="hidden" name="set_id" id="set_id" value="<?php echo @$set_dtls[0]->kq_id; ?>">
               <input type="hidden" name="plan_id" id="plan_id" value="">

              <table class="table table-bordered">
                  
                  <tbody>
                    <tr>
                      <th scope="row">Examination Date</th>
                      <td><?php echo date("d/m/Y", strtotime(@$set_dtls[0]->exam_date)); ?></td>
                     
                    </tr>
                    <tr>
                      <th scope="row">Examination Time</th>
                      <td><?php echo @$set_dtls[0]->exam_time;$arr_tm=explode(":",$set_dtls[0]->exam_time);if(@$arr_tm[0]>=12){echo ' PM';}else{echo ' AM'; } ?></td>
                     
                    </tr>
                    <tr>
                      <th scope="row">Examination Fees</th>
                      <td ><?php echo number_format(@$set_dtls[0]->exam_fees,2); ?></td>
                      
                    </tr>
                  </tbody>
                </table>




               <h4>Plan Details</h4>

               <?php if(count(@$user_plan)>0){?>

            <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Select Plan</th>
                <th scope="col">Plan Code</th>
                <th scope="col">Plan Validity</th>
                <th scope="col">Total Test</th>
                <th scope="col">Remaining Test</th>
                <th scope="col">Plan Amount</th>
              </tr>
            </thead>
            <tbody>
<?php 
foreach($user_plan as $up){

$user_plan_id=@$up->id;
$created_on=@$up->created_on;
$validity=@$up->plan_validity;

$start_dt = new DateTime($created_on);

$date = $start_dt->format('Y-m-d');
          //echo $date;
            //$lastdate= date('Y-m-d', strtotime("+12 months", strtotime($date)));
          
          
$lastdate= date('Y-m-d', strtotime("+".$validity." months", strtotime($date)));
            //echo $lastdate;exit;
$current_date=date('Y-m-d');
            //echo strtotime($lastdate).'<br>'.strtotime($current_date);exit;

if(strtotime($lastdate)>=strtotime($current_date))
{
            


  ?>

              <tr>
               <td><input type="radio" name="select_plan" id="plan_<?php echo @$up->id; ?>" class="plancls form-control"  value="<?php echo @$up->id; ?>" onclick="get_plan_data(this.value)"></td>
                <td><?php echo @$up->plan_code; ?></td>
                <td><?php echo @$up->plan_validity; ?></td>
                <td><?php echo @$up->test_qty; ?></td>
                <td><?php echo @$up->remaining_qty; ?></td>
                <td><?php echo number_format(@$up->plan_amount,2); ?></td>
              </tr>

<?php }} ?>

             <!--  <tr>
               <td>Mark</td>
               <td>Jacob</td>
               <td>Thornton</td>
               <td>@fat</td>
             
               <td>Otto</td>
               <td>@mdo</td>
             </tr>
             <tr>
                <td>Mark</td>
               <td colspan="2">Larry the Bird</td>
               <td>@twitter</td>
               <td>Otto</td>
               <td>@mdo</td>
             </tr> -->
            </tbody>
          </table>

          <?php }else{ ?>

          <p>Sorry!! No Active Plan Available</p>

          <a type="button" class="btn read-btn" href="<?php echo $this->url->link(103);?>">Purchase plan</a>

          <?php } ?>
               <!-- <div class="form-group">
                  <label>Name:</label>
                  <input type="text" placeholder="" class="form-control">
               </div>
               <div class="form-group">
                  <label>Mobile No:</label>
                  <input type="text" placeholder="" class="form-control">
               </div>
               <div class="form-group">
                  <label>Email:</label>
                  <input type="text" placeholder="" class="form-control">
               </div> -->


<?php if(count(@$user_plan)>0){?>

            <h5 class="question res-f-18">Enroll Examination Under This Plan ?</h5>
            <ul class="answer">
              <li><a  href="javascript:void(0)" onclick="validate_form_join()">YES</a></li>
                <li><a id="no">NO</a></li>

            </ul>
   <?php } ?>       


            </form>

  

            
           

            <!-- <div class="col-md-12">
                <label class="check-bx res-check">I agree ( Terms & conditions )
                      <input type="checkbox" checked="checked">
                      <span class="checkmark checkmark-lft check-1200"></span>
                    </label>
            
            </div>
            
                        <button type="button" class="btn read-btn">Register</button>
            
            
            <p class="new_link">If You Have Account? <a href="#">Click Here</a></p> -->

  				</div>

  			</div>
  			







  		</div>

  </div>
 </div>
</div>

<script>
  function get_plan_data(value)
  {
    //alert(value);
    $("#plan_id").val(value);
  }
 </script>

 <script>

  function validation_join_exam()
  {
     var set_id = $('#set_id').val();
              if (!isNull(set_id)) {

                $('#set_id').removeClass('black_border').addClass('red_border');
                
              } else {
                $('#set_id').removeClass('red_border').addClass('black_border');

              }

              var plan_id = $('#plan_id').val();
              if (!isNull(plan_id)) {

                $('.plancls ').removeClass('black_border').addClass('red_border');
                alert('Please Choose a plan to enroll Examination');
               
              } else {
                $('.plancls ').removeClass('red_border').addClass('black_border');

              }
  }
  function validate_form_join()
  {
    //alert();
    

      $('#your-detls').attr('onchange', 'validation_join_exam()');
      $('#your-detls').attr('onkeyup', 'validation_join_exam()');

          validation_join_exam();


          

        if ($('#your-detls .red_border').size() > 0)
        {
          $('#your-detls .red_border:first').focus();
          $('#your-detls .alert-error').show();

          return false;
        } else {

          $('#your-detls').submit();
        }
  }
 </script>