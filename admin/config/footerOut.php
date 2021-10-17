

</div>
</div>


<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<div class="footer" style="margin-top: 30%">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				Copyright © 2019. All rights reserved. Dashboard by <a href="">Coding Squad</a>. 
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="text-md-right footer-links d-none d-sm-block">
					<a href="ourdata/index.php">About/Contact Us</a>

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
<script src="../config/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="../config/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="../config/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- chart chartist js -->
<script src="../config/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<script src="../config/assets/vendor/charts/chartist-bundle/Chartistjs.js"></script>
<script src="../config/assets/vendor/charts/chartist-bundle/chartist-plugin-threshold.js"></script>
<!-- chart C3 js -->
<script src="../config/assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="../config/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<!-- chartjs js -->
<script src="../config/assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="../config/assets/vendor/charts/charts-bundle/chartjs.js"></script>
<!-- sparkline js -->
<script src="../config/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- dashboard finance js -->
<script src="../config/assets/libs/js/dashboard-finance.js"></script>
<!-- main js -->
<script src="../config/assets/libs/js/main-js.js"></script>
<!-- gauge js -->
<script src="../config/assets/vendor/gauge/gauge.min.js"></script>
<!-- morris js -->
<script src="../config/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="../config/assets/vendor/charts/morris-bundle/morris.js"></script>
<script src="../config/assets/vendor/charts/morris-bundle/morrisjs.html"></script>
<!-- daterangepicker js -->
<script src="../../../../cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="../../../../cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
	$(function() {
		$('input[name="daterange"]').daterangepicker({
			opens: 'left'
		}, function(start, end, label) {
			console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
		});
	});
</script>
</body>
</html>
