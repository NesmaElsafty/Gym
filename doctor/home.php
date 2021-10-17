<?php
// Start session
error_reporting(0);
session_start();
require_once '../admin/config/connect.php';
require_once '../admin/config/functions.php';
require_once '../admin/config/db.php';

checkAuth('doctors','index.php');

$sql = "SELECT * FROM doctors WHERE email = '".$_SESSION['email']."'";
$get = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($get);
$title = 'TimeLine';

$db = new DB();

// Fetch the users data
$conditions['where'] = array(
    
    'unID' => $_SESSION['unID']
);
$users = $db->getRows('articles', $conditions);

?>
<?php require_once 'config/headerOut.php'; ?>

<!-- CODE HERE -->
<?php
if (isset($_SESSION['msg'])) {?>
    <div class="alert alert-success" role="alert" style="text-align: center;">
        <?php echo $_SESSION['msg']; ?>
    </div>
    <?php unset($_SESSION['msg']); } ?>
    <div class="row">
        <?php if(!empty($users)){ $count = 0; foreach($users as $rows){ $count++; 
            if(!empty($rows['image'])){
                ?>

                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="articles/images/<?php echo $rows['image']; ?>" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text"><?php echo $rows['description']; ?></p>
                    <span><?php echo $rows['modified']; ?></span>

                    <a href="articles/userAction.php?action_type=delete&id=<?php echo $rows['id']; ?>" onclick="return confirm('Are you sure to delete?');" style="float: right;">
                        <li class="la la-trash-o"></li>
                    </a>

                    <a href="articles/addEdit.php?id=<?php echo $rows['id']; ?>" style="float: right;"><li class="la la-gear"></li></a>
                </div>
            </div>

            <?php 
        }else{ ?>
            <div class="card" style="width: 18rem;">
              <!-- <img class="card-img-top" src="articles/images/<?php echo $rows['image']; ?>" alt="Card image cap"> -->
              <div class="card-body">
                <p class="card-text"><?php echo $rows['description']; ?></p>
                <span><?php echo $rows['modified']; ?></span>

                <a href="articles/userAction.php?action_type=delete&id=<?php echo $rows['id']; ?>" style="float: right;"><li class="la la-trash-o"></li></a>
                <a href="articles/addEdit.php?id=<?php echo $rows['id']; ?>" style="float: right;"><li class="la la-gear"></li></a>
            </div>
        </div>
    <?php    }  } } ?>
</div>
<!-- END CODE -->
<?php require_once 'config/footerOut.php'; ?>
