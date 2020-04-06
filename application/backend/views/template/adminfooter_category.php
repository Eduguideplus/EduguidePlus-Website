 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!--<b>Version</b> 2.3.6-->
    </div>
    <strong>Copyright &copy; <?php echo  date('Y'); ?> <a href="<?php echo base_url();?>index.php/dashboard">Eduguide Plus </a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

   <div class="p-top-down-scrl">

      <div class="scrollup" href="#"><i class="fa fa-angle-double-up" aria-hidden="true"></i></div>
     </div>



</div>
<!-- ./wrapper -->
<script>
    $(function () {
        $(".select2").select2();
    });
</script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>plugins/select2/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- page script -->





   <script>
    // scrolltop
$('.scrollup').click(function (){
$("html,body").animate({
scrollTop: 0
}, 1000);
return false;
});
</script>






<script>
  $(function () {
    $("#example1").DataTable(
      {
        "lengthMenu": [[100, 200, 300, 500, -1], [100, 200, 300, 500, "All"]]
      }
      );
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> 

 <script>


         $(function() {
           
          

            $( "#dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            dateFormat: 'dd-mm-yy'
           
            
        });
         });
      </script>

       <script>


         $(function() {

          var today = new Date();
          var date = today.getDate();
          var month = today.getMonth();
          var year = today.getFullYear();
          /*alert(date);
          alert(month);
          alert(year); */
       
            $("#exam_date").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+10",
            dateFormat: 'yy-mm-dd',
           minDate: new Date(year, month, date+8),
             onSelect: function (dateText, inst) {
        //alert(dateText);
        var dateString = dateText;
        var array = dateString.split('-');
        var new_str=array[1]+'/'+array[2]+'/'+array[0];

        var days=8; // Days you want to subtract
        var date = new Date(new_str);
        var last = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
        var day =last.getDate();
        var month=last.getMonth()+1;
        var year=last.getFullYear();
        var reg_start=year+'-'+month+'-'+day;
        //alert(reg_start);
        $("#reg_start_date").val(reg_start);

        var days=1; // Days you want to subtract
        var date = new Date(new_str);
        var last = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
        var day =last.getDate();
        var month=last.getMonth()+1;
        var year=last.getFullYear();
        var reg_end=year+'-'+month+'-'+day;
        //alert(reg_start);
        $("#reg_end_date").val(reg_end);
       
        }
           
            
        });
         });
      </script> 

      <script>

    $(function() {

      

            $('#exam_time').timepicker({
            timeFormat: 'HH:mm',
            interval: 30,
            minTime: '9',
            maxTime: '11:30pm',
            defaultTime: '9',
            startTime: '9:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
            /*change: function(time) {
               var dateString = $("#exam_date").val();
                    alert(dateString);
            }*/
        });

  });
      </script>

      
 <script>

$("#from_date").datepicker({
        
         dateFormat: 'dd-mm-yy',
         autoclose: true,
         todayHighlight: 1,

    });

$('#to_date').datepicker({
        
        dateFormat: 'dd-mm-yy',
        autoclose: true,
        todayHighlight: 1,
  onSelect: function (dateText) {
        // alert('ok');
    var select_time=new Date(dateText).getTime();
    var frm_dt=$("#from_date").val();
    var frm_dt_time=new Date(frm_dt).getTime();
    if(frm_dt_time > select_time)
    {
      alert('To date should be more  than From date.');
      $("#to_date").val('');
    }
    
    }

    });
</script>

     <!--  <script>
       $('document').ready(function(){
               
               $('#exam_time').on('changeTime', function() {
     
                  var dateString = $("#exam_date").val();
                   alert(dateString);
               });
           });
     </script> -->

      

</body>
</html>
