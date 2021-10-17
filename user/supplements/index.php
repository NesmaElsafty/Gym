<?php 
require_once '../config/PHPheader.php';


$sql = "SELECT * FROM supplements";
$get = mysqli_query($connect,$sql);
$actionLabel = 'Supplements';

?>
<?php require_once '../config/header.php'; ?>
        <!--end navbar -->
      <!--start cart-->
      <section class="container content-section">
        <div class="shop-items">
        	<?php while($row=mysqli_fetch_assoc($get)){ ?>
            <div class="shop-item">
                <span class="shop-item-title"><?php echo $row['name']; ?></span>
                <img class="shop-item-image" src="../../admin/master/products/supplements/images/<?php echo $row['image']; ?>" style="width:260px;border: 2px solid gray;">
                <div class="shop-item-details">
                    <span class="shop-item-price"><?php echo $row['price']; ?> L.E</span>
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
<?php require_once '../config/footer.php'; ?>
