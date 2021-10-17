<?php  

require_once '../config/PHPheader.php';

$query = "SELECT * FROM packages where type = 'package'";
$gett = mysqli_query($connect,$query);
$actionLabel = 'Packages';
?>
<?php require_once '../config/header.php'; ?>
<!--start popup-->
      <!--start popup-->
      
    <!--end popup-->
      <!--start cart-->
      <section class="container content-section">
        <div class="shop-items">
            
            
            <?php while($package = mysqli_fetch_assoc($gett)){ ?>
              <div id="<?php echo $package['name']; ?>" class="overlay">
                  <div class="popup">
                      <h2 style="text-align: center;"><?php echo $package['name']; ?></h2>
                      <a class="close" href="#">&times;</a>
                      <div class="content">
                        <?php 
                        $sql = "SELECT * FROM packages WHERE name = '".$package['name']."' AND type = 'package_meal'";
                        $gettt = mysqli_query($connect, $sql);
                        while ($meal = mysqli_fetch_assoc($gettt)) { ?>
                        <h5><?php echo $meal['meal_name']; ?></h5>
                          <p><?php echo $meal['meal_description']; ?></p>
                          <p> Carbs: <?php echo $meal['carbs']; ?> , Calories: <?php echo $meal['calories']; ?> , Fats: <?php echo $meal['fats']; ?> , Protein: <?php echo $meal['protein']; ?></p>
                          <hr>
                          <?php } ?>
                      </div>
                  </div>
              </div>

            <div class="shop-item">
                <span class="shop-item-title"><?php echo $package['name'];?></span>
                <a class="button" href="#<?php echo $package['name']; ?>">
                  <img class="shop-item-image" src="../../admin/master/products/packages/images/<?php echo $package['image'];?>" style="width:260px; border: 2px solid gray;"></a>
                <div class="shop-item-details">
                    <span class="shop-item-price"><?php echo $package['price'];?></span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>

            <?php } ?>
        </div>
    </section>
    
    <section class="container content-section">
      <h2 class="section-header">CART</h2>
      <div class="cart-row">
          <span class="cart-item cart-header cart-column">ITEM</span>
          <span class="cart-price cart-header cart-column">PRICE</span>
          <span class="cart-quantity cart-header cart-column">QUANTITY</span>
      </div>
      <div class="cart-items">
      </div>
      <div class="cart-total">
          <strong class="cart-total-title">Total</strong>
          <span class="cart-total-price">$0</span>
      </div>
      <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
  </section>
      <!--end cart-->
<?php require_once '../config/footer.php';?>