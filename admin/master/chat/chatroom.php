
<?php 
session_start();
require_once '../../config/header.php';

checkAuth('users','../index.php');

 if (isset($_GET['id']) && $_GET['id'] != '') { 
$query = 'SELECT * FROM clients WHERE unID = "'.$_GET['id'].'"';
$run = mysqli_query($connect, $query);
$cn = mysqli_fetch_assoc($run);

if (!empty($cn)) {
$_SESSION['client_name'] = $cn['name'];
$_SESSION['id'] = $cn['unID'];
}
}else{
    header('location:index.php');
}
?>  

<?php require_once '../../config/headerIn.php'; ?>
                    <!-- ============================================================== -->
                    <!-- Code -->
                    <!-- ============================================================== -->
                   <div class="content-container">
                    <div class="chat-module">
                        <div class="chat-module-top">
                            
                            <div class="chat-module-body">
                                <div class="media chat-item">
                                    <div id="chat" class="w-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- ============================================================== -->
                    <!-- End Code -->
                    <!-- ============================================================== --> 

                </div>
            </div>

           
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2019. All rights reserved. Dashboard by <a href="">Coding Squad</a>. 
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="../ourdata/index.php">About/Contact Us</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- jquery 3.3.1  -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- chart chartist js -->
    <script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <script src="../assets/vendor/charts/chartist-bundle/Chartistjs.js"></script>
    <script src="../assets/vendor/charts/chartist-bundle/chartist-plugin-threshold.js"></script>
    <!-- chart C3 js -->
    <script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <!-- chartjs js -->
    <script src="../assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="../assets/vendor/charts/charts-bundle/chartjs.js"></script>
    <!-- sparkline js -->
    <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- dashboard finance js -->
    <script src="../assets/libs/js/dashboard-finance.js"></script>
    <!-- main js -->
    <script src="../assets/libs/js/main-js.js"></script>
    <!-- gauge js -->
    <script src="../assets/vendor/gauge/gauge.min.js"></script>
    <!-- morris js -->
    <script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="../assets/vendor/charts/morris-bundle/morrisjs.html"></script>
    <!-- daterangepicker js -->
    <script src="../../../../../cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="../../../../../cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

            <script src="ajax.js"></script>
            <script type="text/javascript">
              function ajax(){
                var req = new XMLHttpRequest();
                req.onreadystatechange = function(){
                  if (req.readyState == 4 && req.status == 200) { //4 -> all validation steps are done 200 -> request is done successfully
                    document.getElementById('chat').innerHTML = req.responseText; // we can target any html tag to change dynamicly
                  }
                }

                req.open('POST', 'chat.php', true);
                req.send();
              }

              setInterval(function(){ajax();}, 1000);
            </script>
</body>
</html>

