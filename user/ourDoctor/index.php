 <?php 
 require_once '../config/PHPheader.php';

// checkAuth('clients','../../index.php');
// $auth = true;
 $sql = "SELECT * FROM doctors";
 $get = mysqli_query($connect,$sql);

 if(empty($_SESSION['unID'])){
   $auth = false;
 }
 $actionLabel = 'Our Doctors'
 ?>
 <?php require_once '../config/header.php'; ?>

 <!--end navbar -->
 <!--start doctor section-->
 <div class="container" style="padding-bottom: 20%;">
  <?php if (isset($_SESSION['msg'])) { ?>
    <div class="alert alert-success" style="text-align: center;" role="alert">
      <?php echo $_SESSION['msg'];  ?>
    </div>
    <?php 
  // exit();
    unset($_SESSION['msg']);
  } ?>
  <?php while ($doctor= mysqli_fetch_assoc($get)){ 
      if (!empty($doctor['image']) || $doctor['description']) {
        
    ?>

   <div class="row" style="padding-bottom: 30px;">
    <img src="../../doctor/images/<?php echo $doctor['image']; ?>"style="width:80px;height:80px;margin-top:30px; border-radius:100%;">

     <h4 style="color: white; margin-top:35px; font-weight: bold;"><?php echo $doctor['name']; ?> - <?php echo $doctor['type']; ?></h4>
     <p style="color: white; margin-left: 100px; margin-top: -50px;"><?php echo $doctor['description']; ?></p>
     <div style="margin-left: 100px;">

     <a href="articles.php?id=<?php echo $doctor['unID']; ?>">Show Articles</a>
     <span>||</span>
     <?php if (empty($data['doctor_name'])) { ?>
       <a href="assign.php?id=<?php echo $doctor['id']; ?>">Assign Doctor</a>
     <?php }else{  ?>
       <a href="../chat/chatroom.php?id=<?php echo $doctor['unID']; ?>"> Contact Doctor</a>
       <span>||</span>
       <a href="unfollow.php?id=<?php echo $data['id']; ?>"> UnFollow </a>
     <?php } ?>
     <hr>
   </div>
   </div>
 <?php } } ?>
</div>
<!--start doctor section-->
<?php require_once '../config/footer.php'; ?>
