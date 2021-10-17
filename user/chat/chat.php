<?php
require_once '../config/PHPheader.php';

checkAuth('clients','../index.php');			
?>

<?php	


$sql = "SELECT * FROM chat WHERE client_name = '".$_SESSION['client_name']."'";
$run = mysqli_query($connect, $sql);
				// die($sql);

?> 

	<?php
	$chat = mysqli_fetch_all($run,MYSQLI_ASSOC);
	$count = mysqli_num_rows($run);

	for ($i=0; $i < $count; $i++) { 
		if ($chat[$i]['sender'] == 'client') { ?> 
			<main class="msger-chat">
				<div class="msg right-msg">
					<div class="msg-img"
					style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
					></div>

					<div class="msg-bubble">
						<div class="msg-info">
							<div class="msg-info-name"><?php echo $chat[$i]['client_name']; ?></div>
							<div class="msg-info-time"><?php echo $chat[$i]['time']; ?></div>
						</div>

						<div class="msg-text">
							<?php echo $chat[$i]['msg']; ?>
						</div>
					</div>
				</div>
			</main>
				 		
					 	
					 <?php }else{ ?>
					 	<main class="msger-chat">
					 		<div class="msg left-msg">
					 			<div
					 			class="msg-img"
					 			style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
					 			></div>

					 			<div class="msg-bubble">
					 				<div class="msg-info">
					 					<div class="msg-info-name"><?php echo $chat[$i]['doctor_name']; ?></div>
					 					<div class="msg-info-time"><?php echo $chat[$i]['time']; ?></div>
					 				</div>

					 				<div class="msg-text">
					 					<?php echo $chat[$i]['msg']; ?>
					 				</div>
					 			</div>
					 		</div>
					 	</main>

				 		
					 <?php }	?>

					<?php	 }	?>