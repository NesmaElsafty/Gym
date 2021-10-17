
<?php 
session_start();
require_once '../../config/header.php';

checkAuth('users','index.php');

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);

$query = "SELECT * FROM chat GROUP BY client_name ORDER BY time DESC";
$get_chat = mysqli_query($connect,$query);


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
                        </div>
                    </div>
                </div>

                    <!-- ============================================================== -->
                    <!-- End Code -->
                    <!-- ============================================================== --> 


           <?php require_once '../../config/footerIn.php'; ?>