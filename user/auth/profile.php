<?php 
require_once '../config/PHPheader.php';

    
checkAuth('clients','login.php');


// Retrieve session data
// Include and initialize DB class
$db = new DB();

// Fetch the users data

   $conditions['where'] = array(
        'unID' => $_SESSION['unID']
    );
   $conditions['return_type'] = 'single';
    $users = $db->getRows('clients', $conditions);
$actionLabel = 'Profile';

// Get status message from session

?>
<?php require_once '../config/header.php'; ?> 

      <!--start registration form-->
      <div class="container container1 " style=" margin-top:50px;margin-bottom: 50px;padding-bottom:20px; ">
        <form>
          <div class="row row1">
            <h4>Account</h4>
            <div class="input-group input-group-icon">
              <input type="text" value="<?php echo $users['name']; ?>" readonly/>
              <div class="input-icon"><i class="fa fa-user" style="position: relative;top:20px"></i></div>
            </div>
            <div class="input-group input-group-icon">
              <input type="text" value="<?php echo $users['phone']; ?>" readonly/>
              <div class="input-icon"><i class="fas fa-phone-alt" style="position: relative;top:20px"></i></div>
            </div>
            <div class="input-group input-group-icon">
              <input type="text" value="<?php echo $users['address']; ?>" readonly/>
              <div class="input-icon"><i class="fas fa-map-marker-alt" style="position: relative;top:20px"></i></div>
            </div>
            <div class="input-group input-group-icon">
              <input type="email" value="<?php echo $users['email']; ?>" readonly/>
              <div class="input-icon"><i class="fa fa-envelope" style="position: relative;top:20px"></i></div>
            </div>
            <div class="input-group input-group-icon">
              <input type="text" value="<?php echo $users['age']; ?>" readonly/>
              <div class="input-icon"><i class="fas fa-birthday-cake" style="position: relative;top:20px"></i></div>
            </div>

            <div class="input-group input-group-icon">
              <input type="text" value="<?php echo !empty($users['doctor'])?$users['doctor']:'you didnt assign doctor yet'; ?>" readonly/>
              <div class="input-icon"><p style="font-weight: bold;">Dr</p></div>
            </div>
          </div>
          <div class="row">
            <div class="col-half">
              <h4>Other Data</h4>
              <div class="input-group">
                <div class="col-third">
                  <input type="text" value="<?php echo $users['weight']. ' KG'; ?>" readonly/>
                </div>
                <div class="col-third">
                  <input type="text" value="<?php echo $users['height']. ' CM'; ?>" readonly/>
                </div>
                <div class="col-third">
                  <input type="text" value="<?php echo $users['result']. ' Cal'; ?>" readonly/>
                </div>
              </div>
            </div>
            <?php if (!empty($users['gender'])) { ?>
            <div class="col-half">
              <h4>Gender</h4>
              <div class="input-group">
                <?php if ($users['gender'] == 'male'){ ?>
                <input type="radio" name="gender" value="male" id="gender-male" />
                <label for="gender-male">Male</label>
                <?php }else{ ?>
                <input type="radio" name="gender" value="female" id="gender-female"/>
                <label for="gender-female">Female</label>
              <?php } ?>
              </div>
            </div>
            <?php } ?>

          </div>
          <div class="row" style="font-size:15px;font-weight: bolder;">
            <a href="addEdit.php?id=<?php echo $users['unID']; ?>"><input type="button" value="Edit Profile" style="width:100px;height: 50px;color:#7ed321;;border-radius: 5px;"></a>
          </div>
        </form>
      </div>
<!--end registration form-->
<?php require_once '../config/footer.php'; ?> 
      