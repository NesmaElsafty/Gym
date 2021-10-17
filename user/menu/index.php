<?php require_once '../config/PHPheader.php'; 
$actionLabel = 'Menu';

$sql = "SELECT * FROM packages WHERE type = 'menu'";
$get = mysqli_query($connect, $sql);
?>

<?php require_once '../config/header.php'; ?>

        <!-- <div class="row" style="padding-bottom: 50px;"> -->
        	<section class="container content-section" style="padding-bottom: 50px; margin-top: -60px;">
          <div class="shop-items">
          <table>
              <?php while ($menu = mysqli_fetch_assoc($get)){ ?>
                 
            <tr>
              <td style="text-align: center;font-weight: bold;font-size: 30px;padding:20px 0 30px 0; color: skyblue;">
                <?php echo $menu['name']; ?>
              </td>
            </tr>
              <?php 
              $sql = "SELECT * FROM packages WHERE type = 'menu_meal' AND  name = '".$menu['name']."'";
              // die($sql);
              $gett = mysqli_query($connect, $sql);
              while ($meals = mysqli_fetch_assoc($gett)) {
             ?>
             <div class="shop-item">
            <tr>
              <td style="border-bottom:1px solid;padding-top:15px">
                <h4 class="shop-item-title" style="font-weight: bold; color: skyblue;text-align: left;s"><?php echo $meals['meal_name']; ?></h4>
                <p style="font-size: 17px;"><?php echo $meals['meal_description']; ?></p>
                <p style="font-size: 17px;">
                	<span style="color: skyblue; font-size:20; font-weight: bold;">Cal </span>
                	<span style="color:; font-weight: bold;"><?php echo $meals['calories']; ?> </span>
                	<span style="color: skyblue; font-size:20; font-weight: bold;">Fats </span>
                	<span style="color:;font-weight: bold;"><?php echo $meals['fats']; ?> </span>
                	<span style="color: skyblue; font-size:20; font-weight: bold;">Protein </span>
                	<span style="color:;font-weight: bold;"><?php echo $meals['protein']; ?> </span> 
                	<span style="color: skyblue; font-size:20; font-weight: bold;">Carbs </span>
                	<span style="color:;font-weight: bold;"><?php echo $meals['carbs']; ?> </span>
                </p>
                <div class="shop-item-details" style="margin-top:-50px;">
                    <span class="shop-item-price" style="color: skyblue;font-size:20px;text-align: right; margin-right: 20px;font-weight: bold; "><?php echo $meals['price']; ?></span>
                    <button class="btn btn-primary shop-item-button"  style="border-radius:100%;" type="button">
                      <!-- <i style="color: white;" class="fas fa-arrows-alt"></i> -->
                      ADD TO CART
                    </button>
                </div>
              </td>
            </tr>
              </div>
              
          <?php } }  ?>
          </table>
              </div>
    	</section>
        <!-- </div> -->
    
        <section class="container content-section">
      <h2 class="section-header" style="color: skyblue;">CART</h2>
      <div class="cart-row">
          <span class="cart-item cart-header cart-column">ITEM</span>
          <span class="cart-price cart-header cart-column">PRICE</span>
          <span class="cart-quantity cart-header cart-column">QUANTITY</span>
      </div>
      <div class="cart-items" id="cart-items">
      </div>
      <div class="cart-total">
          <strong class="cart-total-title">Total</strong>
          <span class="cart-total-price">$0</span>
      </div>
      <button class="btn btn-primary btn-purchase" id="purchase" type="button">PURCHASE</button>
  </section>

      <!--end menu -->
<?php require_once '../config/footer.php'; ?>

