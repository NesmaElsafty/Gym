<?php
session_start();
require_once '../../config/header.php';

checkAuth('users','../index.php');

if (isset($_SESSION['id'])) {
			$query = "SELECT * FROM clients WHERE unID = '".$_SESSION['id']."'";
			// die($query);
			$do = mysqli_query($connect,$query);
			$data = mysqli_fetch_assoc($do);
			
			
				$sql = "SELECT * FROM chat WHERE client_name = '".$data['name']."'";
				
				$run = mysqli_query($connect, $sql);

				?> 
				
				 <?php 
				  
				 while ($chat = mysqli_fetch_assoc($run)){
				 	if ($chat['sender'] == 'doctor') { ?>
				 		<div class="media chat-item">
                                    
                                    <div class="media-body">
                                        <div class="chat-item-title">
                                            <span class="chat-item-author"><?php echo $chat['doctor_name']; ?></span> 
                                            <span><?php echo $chat['time']; ?></span>
                                        </div>
                                        <div class="chat-item-body">
                                            <p><?php echo $chat['msg']; ?></p>
                                        </div>
                                    </div>
                                </div>
				 	<?php }else{ ?>
				 		<div class="media chat-item">
                                    
                                    <div class="media-body">
                                        <div class="chat-item-title">
                                            <span class="chat-item-author"><?php echo $chat['client_name'];?></span>
                                            <span class="ml-auto"><?php echo $chat['time'];?></span>
                                        </div>
                                        <div class="chat-item-body">
                                            <p><?php echo $chat['msg'];?></p>
                                        </div>
                                    </div>
                                </div>
				 	<?php }	?>
				 	
			<?php	 }	} ?>
	