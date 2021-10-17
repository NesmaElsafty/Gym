<?php

session_start();


require_once '../../admin/config/connect.php';
require_once '../../admin/config/functions.php';
require_once '../../admin/config/db.php';

// checkAuth('doctors','../index.php');

$sql = "SELECT * FROM doctors WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);

$_SESSION['doctor_name'] = $row['name'];
$_SESSION['doctor_unID'] = $row['unID'];

if (isset($_GET['id'])) { 
  $query = 'SELECT * FROM clients WHERE unID = "'.$_GET['id'].'"';
  $run = mysqli_query($connect, $query);
  $cn = mysqli_fetch_assoc($run);

  if (!empty($cn)) {
    $_SESSION['client_name'] = $cn['name'];
    $_SESSION['client_unID'] = $cn['unID'];
    $_SESSION['id'] = $cn['unID'];


  }

}else{
  $_SESSION['msg'] = 'get another one';
  header('location:../index.php');
  exit();
} 


?>


<?php require_once '../config/headerIn.php'; ?>
<link rel="stylesheet" type="text/css" href="">
                <!-- CODE HERE -->


                <section class="msger" style="align-self: center;height: 500px;margin-bottom: 0px;">
                  <header class="msger-header">
                    <div class="msger-header-title">
                      <i class="fas fa-comment-alt"></i> Chat
                    </div>
                  </header>

                  <div class="msger-chat"  onload="ajax();">
                    <div id="chat">

                    </div>
                  </div>

                  <form class="msger-inputarea" method="post" action="">
                    <input type="hidden" id="doctor_name" name="doctor_name" value="<?php echo $row['name'];?>"/>    
                    <input type="hidden" id="doctor_unID" name="doctor_unID" value="<?php echo $_SESSION['doctor_unID'];?>"/>    
                    <input type="hidden" id="client_name" name="client_name" value="<?php echo $_SESSION['client_name'];?>"/>    
                    <input type="hidden" id="client_unID" name="client_unID" value="<?php echo $_SESSION['client_unID'];?>"/>    
                    <input type="hidden" id="sender" name="sender" value="doctor" hidden/>
                    

                    <input type="text" class="msger-input" placeholder="Enter your message..." name="msg" id="msg" required>
                    <button type="submit" id="submit" class="msger-send-btn">Send</button>
                  </form>
                </section>
                <?php require_once '../config/footerIn.php'; ?>