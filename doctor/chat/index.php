<?php
// Start session
// error_reporting(0);
session_start();

require_once '../../admin/config/connect.php';
require_once '../../admin/config/functions.php';
require_once '../../admin/config/db.php';

checkAuth('doctors','../index.php');

$sql = "SELECT * FROM doctors WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);

// $sql = "SELECT * FROM clients WHERE doctor_unID = '".$_SESSION['unID']."'";
// $result = mysqli_query($connect, $sql);

$query = "SELECT * FROM chat GROUP BY client_name ORDER BY time DESC";
$get_chat = mysqli_query($connect,$query);

?>

<?php require_once '../config/headerIn.php'; ?>

                                <!-- CODE HERE -->
                               <div class="chat-module-body">
                                <div class="media chat-item">
                                    <?php while ($chat = mysqli_fetch_assoc($get_chat)) { 
                                        $client_sql = "SELECT * FROM clients WHERE name = '".$chat['client_name']."'";
                                        $set = mysqli_query($connect,$client_sql);
                                        $client = mysqli_fetch_assoc($set);

                                        $msg_sql = "SELECT * FROM chat WHERE client_name = '".$chat['client_name']."'";
                                        $get_msg = mysqli_query($connect,$msg_sql);
                                        $msgs = mysqli_fetch_All($get_msg,MYSQLI_ASSOC);
                                        $msg = end($msgs);


                                      ?>
                                    <div class="media-body">
                                        <div class="chat-item-title">
                                            <a href="chatroom.php?id=<?php echo $client['unID']; ?>">
                                            <span class="chat-item-author"><?php echo $msg['client_name']; ?></span>
                                            
                                            </a>
                                            <span><?php echo $msg['time']; ?></span>
                                        </div>
                                        <div class="chat-item-body">
                                            <p><?php echo $msg['msg']; ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                                <!-- END CODE -->
                           <?php require_once '../config/footerIn.php'; ?>