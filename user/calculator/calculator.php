<?php 
require_once '../config/PHPheader.php';

// error_reporting(0);

if (isset($_SERVER['REQUEST_METHOD'])) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {


					
$gender = $_POST['gender'];
$activity_level = $_POST['activity_level'];
$routine = $_POST['routine'];
$goal = $_POST['goal'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$food=implode(', ', $_POST['food']);
$routine_issues=implode(', ', $_POST['routine_issues']);
 
$bmr = '';
$result = '';

if ($gender == 'male') {
	$bmr .= 13.75 * $weight;
	$bmr += 5 * $height;
	$bmr -= 6.76 * $age;
	$bmr += 66;

	// echo 'BMR = ' . $bmr. '<br>';

}elseif ($gender == 'female') {
	$bmr .= 9.56 * $weight;
	$bmr += 1.85 * $height;
	$bmr -= 4.68 * $age;
	$bmr += 655;

	// echo 'BMR = ' . $bmr. '<br>';
}else{
	// echo 'No Gender Selected';
}


switch ($activity_level) {
    case "1":
        $result = $bmr * 1.2;
        break;
    case "2":
        $result = $bmr * 1.375;
        break;
    case "3":
        $result = $bmr * 1.55;
        break;
    case "4":
        $result = $bmr * 1.725;
        break;
    case "5":
    $result = $bmr * 1.9;
    break;
    default:
        // echo "No Level Selected";
}

// echo 'Result: ' . $result;

if ($gender == '' || $activity_level == '' || $routine == '' || $goal == '' || $age == '' || $height == '' || $weight == '' || $food == '' || $routine_issues == '') {
	$_SESSION['cal_err'] = 'Please Fill The Empty Values';
	// echo $_SESSION['cal_err'];
	header('location:index.php');
}else{

//store and edit cal data;

if(getData('clients') != null){
	$sql = 'UPDATE clients
			SET gender = "'.$gender.'", 
				activity_level = "'.$activity_level.'", 
				routine = "'.$routine.'", 
				goal = "'.$goal.'", 
				age = "'.$age.'", 
				height = "'.$height.'", 
				weight = "'.$weight.'", 
				food = "'.$food.'", 
				routine_issues = "'.$routine_issues.'", 
				result = "'.$result.'"  
			WHERE "'.$_SESSION['unID'].'"';
	$setData = mysqli_query($connect,$sql);
	if ($setData) {
		header('location:result.php');
	}
}else{
	$_SESSION['cal_err'] = 'Failed To Update Your Data Try Again Later OR <a href="../ourdata/contact_us.php"> Contact us </a>';
		header('location:index.php');
		
}

}
	}else{
	echo 'no requests';
	header('location:../../index.php');
}
}
?>