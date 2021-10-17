<?php 
require_once '../config/PHPheader.php';

    

if (empty($_SESSION['unID'])) {
  
  header('location:index.php');
}

$actionLabel = 'result';
?>
<?php require_once '../config/header.php'; ?>

        <!--end navbar -->
 <div class="tab">
   <div class="container">
    <div class="row" style="margin: 150px 5px 10px 5px; padding-bottom: 150px; ">
          <?php   if ($data['result'] == 0 ) { ?>
                  <div class="" style="margin: 10px 5px 10px 5px; text-align: center;">
                    <p style="color: blue;  font-size: 22px;font-family: sans-serif;">You Didn't Calculate your calories yet.. do you wan't to Calculate it now ?
                    <a href="index.php">Yes</a>
                    <a href="../index.php">No</a>
                  </p>
                </div>

          <?php }else{ ?>
            <div class="row" style="margin-top: -50px; margin-left:100px;">
            <span style="color: blue;font-size: 22px;font-family: sans-serif;">&nbsp Calories you need per day:</span><p style="color: blue;font-size: 22px;font-family: sans-serif;"> <?php echo $data['result']; ?> calories</p>
          </div>

        <div class="row" style="margin: 10px 5px 10px 5px;"><p style="color: blue;font-size: 22px;font-family: sans-serif; text-align: center;">This number of calories will be added to your profile to help you with your meals.</p>
        </div>
        
        </div>
        
      <?php } ?>

    </div>
</div>

<?php require_once '../config/footer.php'; ?>
