
<div class="all_top">
</div>


<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="<?php echo base_url(); ?>assets/images/annalysis.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont online_x">
          <h2>Analysis</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->




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
  			<h3>Analysis for the Test</h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">
  			<div class="about-exam faq analysis-block">


  					<div class="panel-group" id="accordion">

 <?php foreach ($quest_list_array as $key=>$row ) {
           ?>

					  <div class="panel panel-default">
					    <div class="panel-heading <?php if($row['answer']=='true'){ ?>correct-bg <?php } else { ?> wrong-bg <?php } ?>">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo @$row['question_id']; ?>">Q <?php echo $key+1; ?>.
					        <?php echo @$row['question']; ?></a>
					      </h4>
					    </div>
					    <div id="collapse<?php echo @$row['question_id']; ?>" class="panel-collapse collapse <?php if($key==0){ echo 'in';} ?>">
					      <div class="panel-body">
                <ul class="option-list">
                    <li><strong>Right Answer :</strong> <?php echo @$row['corrected_answer']; ?></li>
                    <li><strong>Your Answer :</strong> <?php echo @$row['attempted_answer']; ?></li>
                    <li><strong>Explanation :</strong>  <?php echo @$row['explanation']; ?></li>
                   </ul>
								
					     </div>
					    </div>
					  </div>

				   <?php } ?>	

        <!--    <?php foreach ($quest_list_array as $key=>$row ) {
           ?>

            <div class="panel panel-default">
              <div class="panel-heading wrong-bg">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo @$row['question_id']; ?>">Q <?php echo $key+1; ?>.
                  <?php echo @$row['question']; ?></a>
                </h4>
              </div>
              <div id="collapse<?php echo @$row['question_id']; ?>" class="panel-collapse collapse <?php if($key==0){ echo 'in';} ?>">
                <div class="panel-body">
                Ans. <?php echo @$row['answer']; ?>
               </div>
              </div>
            </div>

           <?php } ?> 
					 -->
					</div>

  				
  			</div>




  		</div>
  		 <div class="back-block">
        <a href="javascript:void(0);" onclick="close_win();" class="pull-right gall_back"><i class="fa fa-chevron-right" aria-hidden="true"></i>Close</a> </div>

  </div>
 </div>
</div>
<script type="text/javascript">
    function close_win()
    {
      if(confirm('do you want to close the window?' ))
      {
        window.close();
      }
      
    }
  </script>

<script type="text/javascript">
    document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
 
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }


}
</script> 
 <script type="text/javascript">
$(document).ready(function () {
    
    $("body").on("contextmenu",function(e){
        return false;
    });
    
    
    $("#id").on("contextmenu",function(e){
        return false;
    });
});
</script> 

<script type="text/javascript">
$(document).ready(function () {
    $('body').bind('cut copy', function (e) {
        e.preventDefault();
    });
});
</script> 


<script type="text/javascript">
    document.addEventListener("keyup", function (e) {
    var keyCode = e.keyCode ? e.keyCode : e.which;
            if (keyCode == 44) {
                stopPrntScr();
            }
        });
function stopPrntScr() {

            var inpFld = document.createElement("input");
            inpFld.setAttribute("value", ".");
            inpFld.setAttribute("width", "0");
            inpFld.style.height = "0px";
            inpFld.style.width = "0px";
            inpFld.style.border = "0px";
            document.body.appendChild(inpFld);
            inpFld.select();
            document.execCommand("copy");
            inpFld.remove(inpFld);
        }
       function AccessClipboardData() {
            try {
                window.clipboardData.setData('text', "Access   Restricted");
            } catch (err) {
            }
        }
        setInterval("AccessClipboardData()", 300);
</script>
