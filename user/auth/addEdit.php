<?php
// Start session
// error_reporting(0);
require_once '../config/PHPheader.php';

// Get user data
$userData = array();
if(!empty($_GET['id'])){

  $db = new DB();
  $_SESSION['supId'] = $_GET['id'];

    // Fetch the user data
  $conditions['where'] = array(
    'unID' => $_GET['id'],
  );
  $conditions['return_type'] = 'single';
  $userData = $db->getRows('clients', $conditions);
}


$actionLabel = !empty($_GET['id'])?'Settings':'Sign UP';

// Get status message from session


?>
<?php require_once '../config/header.php'; ?> 
  <!--start registration form-->
  <div class="container container1 " style=" margin-top:50px;margin-bottom: 50px; padding-bottom: 20px; ">
    <form method="post" action="userAction.php">
      <div class="row row1">
        <h4><?php echo $actionLabel; ?></h4>
        <?php if(!empty($_SESSION['msg'])){ ?>
          <div class="col-xs-12">
              <div class="alert alert-info"><?php echo $_SESSION['msg']; ?></div>
          </div>
          <?php unset($_SESSION['msg']);} ?>
        <div class="input-group input-group-icon">
          <input type="text" placeholder="Full Name" name="name" value="<?php echo !empty($userData['name'])?$userData['name']:''; ?>" required />
          <div class="input-icon"><i class="fa fa-user" style="position: relative;top:20px"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="number" placeholder="Phone number"  name="phone" value="<?php echo !empty($userData['phone'])?$userData['phone']:''; ?>"/>
          <div class="input-icon"><i class="fas fa-phone-alt" style="position: relative;top:20px"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" placeholder="Address" name="address" value="<?php echo !empty($userData['address'])?$userData['address']:''; ?>"/>
          <div class="input-icon"><i class="fas fa-map-marker-alt" style="position: relative;top:20px"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="email" placeholder="Email Address" name="email" value="<?php echo !empty($userData['email'])?$userData['email']:''; ?>"/>
          <div class="input-icon"><i class="fa fa-envelope" style="position: relative;top:20px"></i></div>
        </div>
  <?php if (empty($_SESSION['unID'])) { ?>
        <div class="input-group input-group-icon">
        <input type="password" placeholder="Password" name="password" required />
        <div class="input-icon"><i class="fa fa-key" style="position: relative;top:20px"></i></div>
      </div>
    <?php } ?>

      <input type="hidden" name="unID" value="<?php echo !empty($userData['unID'])?$userData['unID']:uniqid(); ?>">
      <input type="hidden" name="id" value="<?php echo !empty($userData['id'])?$userData['id']:''; ?>">
      <div style="font-size:15px;font-weight: bolder;">
        <input type="submit" value="Submit" name="userSubmit" style="width:100px;height: 50px;color:#7ed321;;border-radius: 5px;">
      </div>
    </form>
  </div>
  <?php if (isset($_SESSION['unID'])) { ?>
           <h4 style="margin-left:35px;">Password Update</h4>

    <form action="password.php" method="post" style="margin-left:35px; padding-bottom: 20px;">
      <input type="hidden" name="unID" value="<?php echo $userData['unID']; ?>"> 
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Current Password" name="OldPass" required />
        <div class="input-icon"><i class="fa fa-key" style="position: relative;top:20px"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" placeholder="New Password" name="password"/>
        <div class="input-icon"><i class="fa fa-key" style="position: relative;top:20px"></i></div>
      </div>
    
    <input type="submit" value="Submit" name="passSubmit" style="width:100px;height: 50px;color:#7ed321;;border-radius: 5px;">
  </form>
    
<?php  } ?>
 </div>
</div>

  <!--end registration form-->
  <!--start footer-->
<?php require_once '../config/footer.php'; ?> 
  