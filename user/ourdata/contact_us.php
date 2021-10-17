<?php 
require_once '../config/PHPheader.php';

$sql = "SELECT * FROM ourdata";
$get = mysqli_query($connect,$sql);
$contact_us = mysqli_fetch_assoc($get);
$actionLabel = 'Contact Us';
?>

<?php require_once '../config/header.php'; ?>
        <!--end navbar -->
<!--start contact-->
      <!-- <div class="container"> -->
          <div class="row">
            <div class="contact">
              <div class="us" style="margin-left: 45px;">
                  <h2>Contact Us</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud </p>

             <p>
             <strong>Email: </strong><?php echo $contact_us['email'];?><br>
             <strong>phone: </strong> <?php echo $contact_us['phone'];?>
             </p>
              </div>
              <form class="form">
                  <label>name*</label>
                  <input type="text" >
                  <label>email adress*</label>
                  <input type="text" >
                  <label>phone*</label>
                  <input type="text" >
                  <label>message*</label>
                  <textarea></textarea>
                  <input type="submit" value="Contact me">
              </form>
            </div>
          </div>
      <!-- </div> -->
  <!--end contact-->
  <!--start footer-->
<?php require_once '../config/footer.php'; ?>
