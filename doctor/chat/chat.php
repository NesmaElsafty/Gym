<?php
session_start();

require_once '../../admin/config/connect.php';
require_once '../../admin/config/functions.php';
require_once '../../admin/config/db.php';
checkAuth('doctors','../index.php');	

if (isset($_SESSION['client_unID'])) {
	$query = "SELECT * FROM clients WHERE unID = '".$_SESSION['client_unID']."'";
			// die($query);
	$do = mysqli_query($connect,$query);
	$data = mysqli_fetch_assoc($do);
	
	
	$sql = "SELECT * FROM chat WHERE client_name = '".$data['name']."' AND doctor_name = '".$_SESSION['doctor_name']."'";
	
	$run = mysqli_query($connect, $sql);

	?> 
	
	<?php
	
	while ($chat = mysqli_fetch_assoc($run)){
		if ($chat['sender'] == 'doctor') { ?>
			
			<div class="msger-chat">                                    
				<div class="msg right-msg">

					<div class="msg-bubble">
						<div class="msg-info">
							<div class="msg-info-name"><?php echo $chat['doctor_name']; ?></div>
							<div class="msg-info-time"><?php echo $chat['time']; ?></div>
						</div>
						
						<div class="msg-text">
							<?php echo $chat['msg']; ?>
						</div>
					</div>
				</div>
			</div>
		<?php }else{ ?>
			
			<div class="msger-chat">
				<div class="msg left-msg">
					
					<div class="msg-bubble">
						<div class="msg-info">
							<div class="msg-info-name"><?php echo $chat['client_name']; ?></div>
							<div class="msg-info-time"><?php echo $chat['time']; ?></div>
						</div>
						
						<div class="msg-text">
							<?php echo $chat['msg']; ?>
						</div>
					</div>
				</div>
			</div>
		<?php }	?>
		
	<?php	 }	} ?>
	