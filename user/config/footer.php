<!--start footer-->

<?php 
$sql = "SELECT * FROM ourdata";
$get = mysqli_query($connect,$sql);
$contact_us = mysqli_fetch_assoc($get);
?>
<div class="footer">
	<div class="container">

		<ul>
			<li><a href="<?php echo $about_us['facebook']; ?>">
				<img src="../config/New folder/images/iconimg37077.png" title="facebook">
			</a></li>

			<li><a href="<?php echo $about_us['instagram']; ?>">
				<img src="../config/New folder/images/instagram (1).png" title="instgram">
			</a></li>

			<li><a href="<?php echo $about_us['twitter']; ?>">
				<img src="../config/New folder/images/578614-64.png" title="twitter">
			</a></li>

			<a href="#">
				<li>
					<img src="../config/New folder/images/shopping-cart.png" title="cart" style="height:30px;width:30px;margin-left: 10px;">
				</li>
			</a>
          	<!-- <a href="#">
				<li>
					  <p style="font-size:18px;color: white;">your cart</p>
				</li>
			</a> -->

		</ul>
		copy write &copy; 2019 <a href=""> Coding Squad </a>
	</div>
</div>
<!--end footer-->
			<script src="../config/New folder/js/jquery-3.4.1.min.js"></script>  
            <script src="../config/New folder/js/popper1.min.js"></script>       
            <script src="../config/New folder/js/bootstrap.min.js"></script>
			<!-- <script src="../config/New folder/js/cart.js"></script> -->
			<script src="../config/New folder/js/cart1.js"></script>

			<script src="ajax.js"></script>
            

</body>
</html>