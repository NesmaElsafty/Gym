<?php 
session_start();
require_once '../../config/header.php';

    
checkAuth('users','../index.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
</head>
<body>

<?php
require_once 'connect.php';

$supSQL = "SELECT * FROM supplements WHERE best_seller != 'true'";
$get_supSQL = mysqli_query($connect,$supSQL); 
?>
<h2><a href="supplements/index.php">Supplements</a></h2>
<table border="1">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Storage</th>
			<th>Image</th>
		</tr>
	<?php while($rows = mysqli_fetch_assoc($get_supSQL)){ ?>
		<tr>
			<td><?php echo $rows['id']; ?></td>
			<td><?php echo $rows['name']; ?></td>
			<td><?php echo $rows['price']; ?></td>
			<td><?php echo $rows['storage']; ?></td>
			<td><?php echo $rows['image']; ?></td>
		</tr>
	<?php } ?>
</table>


<?php
$supSQL = "SELECT * FROM supplements WHERE best_seller = 'true'";
$get_supSQL = mysqli_query($connect,$supSQL); 
?>
<h2>Best Seller</h2>
<table border="1">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Storage</th>
			<th>Image</th>
		</tr>
	<?php while($rows = mysqli_fetch_assoc($get_supSQL)){ ?>
		<tr>
			<td><?php echo $rows['id']; ?></td>
			<td><?php echo $rows['name']; ?></td>
			<td><?php echo $rows['price']; ?></td>
			<td><?php echo $rows['storage']; ?></td>
			<td><?php echo $rows['image']; ?></td>
		</tr>
	<?php } ?>
</table>


<h2><a href="packages/index.php"> Packages</a></h2>
<?php 
$packSQL = "SELECT * FROM packages WHERE type = 'package'";
$get_packSQL = mysqli_query($connect,$packSQL);

	while($rows = mysqli_fetch_assoc($get_packSQL)){ ?>
		<h3><?php echo $rows['name']; ?></h3>
		<p>Price: <?php echo $rows['price']; ?></p> 
		<p>Phase: <?php echo $rows['phase']; ?></p> 

		<table border="1">
		<tr>
			<th>ID</th>
			<th>Meal Name</th>
			<th>Meal Description</th>
			<th>fats</th>
			<th>calories</th>
			<th>protein</th>
			<th>carbs</th>
		</tr>

		<?php 
		$mealSQL = "SELECT * FROM packages WHERE type = 'package_meal' AND name = '".$rows['name']."'";
		$get_meal_packSQL = mysqli_query($connect,$mealSQL); 
			while($rows = mysqli_fetch_assoc($get_meal_packSQL)){ ?>
		
			<tr>
				<td><?php echo $rows['id']; ?></td>
				<td><?php echo $rows['meal_name']; ?></td>
				<td><?php echo $rows['meal_description']; ?></td>
				<td><?php echo $rows['fats']; ?></td>
				<td><?php echo $rows['calories']; ?></td>
				<td><?php echo $rows['protein']; ?></td>
				<td><?php echo $rows['carbs']; ?></td>
			</tr>
<?php	} ?>

</table>
<?php } ?>


<h2><a href="menu/index.php"> Menu</a></h2>
<?php 
$menuSQL = "SELECT * FROM packages WHERE type = 'menu'";
$get_menuSQL = mysqli_query($connect,$menuSQL);

	while($rows = mysqli_fetch_assoc($get_menuSQL)){ ?>
		<h3><?php echo $rows['name']; ?></h3>

		<table border="1">
		<tr>
			<th>ID</th>
			<th>Meal Name</th>
			<th>Meal Description</th>
			<th>fats</th>
			<th>calories</th>
			<th>protein</th>
			<th>carbs</th>
		</tr>

		<?php 
		$mealSQL = "SELECT * FROM packages WHERE type = 'menu_meal' AND name = '".$rows['name']."'";
		$get_meal_menuSQL = mysqli_query($connect,$mealSQL); 
			while($rows = mysqli_fetch_assoc($get_meal_menuSQL)){ ?>
		
			<tr>
				<td><?php echo $rows['id']; ?></td>
				<td><?php echo $rows['meal_name']; ?></td>
				<td><?php echo $rows['meal_description']; ?></td>
				<td><?php echo $rows['fats']; ?></td>
				<td><?php echo $rows['calories']; ?></td>
				<td><?php echo $rows['protein']; ?></td>
				<td><?php echo $rows['carbs']; ?></td>
			</tr>
<?php	} ?>

</table>
<?php } ?>

</body>
</html>