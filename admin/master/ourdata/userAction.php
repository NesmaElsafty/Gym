<?php
// Start session
// session_start();

// Include and initialize DB class
require_once '../../config/header.php';

$db = new DB();

// Database table name
$tblName = 'ourdata';

// Set default redirect url
$redirectURL = 'index.php';

if(isset($_POST['userSubmit'])){
    // Get form fields value
    $description = trim(strip_tags($_POST['description']));
    $email = trim(strip_tags($_POST['email']));
    $facebook = trim(strip_tags($_POST['facebook']));
    $twitter = trim(strip_tags($_POST['twitter']));
    $instagram = trim(strip_tags($_POST['instagram']));
    $phone = trim(strip_tags($_POST['phone']));
   
    $image = $_FILES['image']['name'];
    $tmp = $_FILES["image"]["tmp_name"];


    $errorMsg = '';
    if(empty($description)){
        $errorMsg .= '<p>Please enter your description.</p>';
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg .= '<p>Please enter a valid email.</p>';
        //Other Condition
    }
 
    if(empty($phone) || !preg_match("/^[-+0-9]{6,20}$/", $phone)){
        $errorMsg .= '<p>Please enter a valid phone number.</p>';
    }
    
    if (empty($image)) {

         $userData = array(
        'description' => $description,
        'phone' => $phone,
        'email' => $email,
        'facebook' => $facebook,
        'twitter' => $twitter,
        'instagram' => $instagram,
        'image' => OldImg($tblName,$_POST['id'])
        );
     }else{
        $upload = uploadImage($image, $tmp);
        $userData = array(
        'description' => $description,
        'phone' => $phone,
        'email' => $email,
        'facebook' => $facebook,
        'twitter' => $twitter,
        'instagram' => $instagram,
        'image' => $image
        );
     }

    
    
    // Store the submitted field value in the session
    $sessData['userData'] = $userData;
    
    // Submit the form data
    if(empty($errorMsg)){
        if(!empty($_POST['id'])){
            // Update user data
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'User data has been updated successfully.';
                
                // Remote submitted fields value from session
                unset($sessData['userData']);
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                
                // Set redirect url
                $redirectURL = 'index.php';
            }
        }else{
            // Insert user data
            $insert = $db->insert($tblName, $userData);
            
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'User data has been added successfully.';
                
                // Remote submitted fields value from session
                unset($sessData['userData']);
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                
                // Set redirect url
                $redirectURL = 'index.php';
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = '<p>Please fill all the mandatory fields.</p>'.$errorMsg;
        
        // Set redirect url
        $redirectURL = 'index.php';
    }
    
    // Store status into the session
    $_SESSION['sessData'] = $sessData;
}elseif(($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])){
    // Delete data
    $condition = array('id' => $_GET['id']);
    $delete = $db->delete($tblName, $condition);
    
    if($delete){
        $sessData['status']['type'] = 'success';
        $sessData['status']['msg'] = 'User data has been deleted successfully.';
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Some problem occurred, please try again.';
    }
    
    // Store status into the session
    $_SESSION['sessData'] = $sessData;
}

// Redirect to the respective page
header("Location:".$redirectURL);
exit();
?>