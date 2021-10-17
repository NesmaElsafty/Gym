<?php 
require_once '../config/PHPheader.php';

checkAuth('clients','../index.php');

// echo $_SESSION['email'];
// if (isset($_SESSION['admin'])) {
//  $_SESSION['user'] = $_GET['name'];

if (isset($_SESSION['email'])) {
  $sql = 'SELECT * FROM clients WHERE email = "'.$_SESSION['email'].'"';
  $get = mysqli_query($connect,$sql);
  $data = mysqli_fetch_assoc($get);
  // echo $data['name'];

  $_SESSION['client_name'] = $data['name'];
  $_SESSION['client_unID'] = $data['unID'];
}

if (isset($_GET['id'])) {
  $query = "SELECT * FROM doctors WHERE unID = '".$_GET['id']."'";
  $gett = mysqli_query($connect,$query);
  $doctor = mysqli_fetch_assoc($gett);
}else{
  header('location:../ourdoctor/index.php');
}

?>
<?php require_once '../config/header.php'; ?>

      <!--start chat-->
      
      <section class="msger" >
        <header class="msger-header">
          <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i> Chat
          </div>
        </header>
      
        <main class="msger-chat" onload="ajax();">
          <div id="chat">
          </div>
          
        </main>
      
        <form class="msger-inputarea" method="post" action="send.php">
          <input type="hidden" id="client_name" name="client_name" value="<?php echo $_SESSION['client_name'];?>"/>   
          <input type="hidden" id="client_unID" name="client_unID" value="<?php echo $_SESSION['client_unID'];?>"/>   
          <input type="hidden" id="sender" name="sender" value="client"/>
          <input type="hidden" id="doctor_name" name="doctor_name" value="<?php echo $doctor['name']; ?>"/>
          <input type="hidden" id="doctor_unID" name="doctor_unID" value="<?php echo $doctor['unID']; ?>"/>
          <input type="text" id="msg" class="msger-input" name="msg" placeholder="Enter your message..." required="">
          <button type="submit" name="send" class="msger-send-btn" id="submit">Send</button>
        </form>
      </section>
<!--end chat-->
     <?php require_once '../config/footer.php'; ?>