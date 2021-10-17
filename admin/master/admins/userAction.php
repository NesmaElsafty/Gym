<?php
// Start session
session_start();

// Include and initialize DB class
require_once '../../config/header.php';

$db = new DB();

// Database table name
$tblName = 'users';
// $tbl = str_replace("'"," ",$tblName);
// Set default redirect url
$redirectURL = 'index.php';

if(isset($_POST['userSubmit'])){
    // Get form fields value
    $name     = trim(strip_tags($_POST['name']));
    $unID     = $_POST['unID'];
    $email    = trim(strip_tags($_POST['email']));
 
    $password = trim(strip_tags($_POST['password']));
    $type     = trim(strip_tags($_POST['type']));
    
    // Fields validation
    $errorMsg = '';
    if(empty($name)){
        $errorMsg .= '<p>Please enter your name.</p>';
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg .= '<p>Please enter a valid email.</p>';
        //Other Condition
    }
    if (CheckEmail($tbl,$email) > 0 || CheckEmail('doctors',$email) > 0 || CheckEmail('clients',$email) > 0) {
        $errorMsg .= "<p>this Email is already exists.</p>";
        
    }
    if(unIDCheck($tbl, $unID) > 0){
        $errorMsg .= "<p>Try Again</p>";
    }

    if (!empty($_POST['id'])) {
        if (CheckEmail($tbl,$email) > 1 || CheckEmail('doctors',$email) > 0 || CheckEmail('clients',$email) > 0) {
            $errorMsg .= 'this Email is already exists';
        }
    }
    // Submitted form data
    
        $userData = array(
        'name' => $name,
        'email' => $email,
        'password' => trim(strip_tags(password_hash($_POST['password'] , PASSWORD_DEFAULT))),
        'unID' => $unID,
        'type' => $type
    );
    
    
    
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
                $redirectURL = 'addEdit.php?id='.$_SESSION['unID'].'';
            }
        }else{
            // Insert user data
            $insert = $db->insert($tblName, $userData);
            // die($insert);
            
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'User data has been added successfully.';
                
                // Remote submitted fields value from session
                unset($sessData['userData']);
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                
                // Set redirect url
                $redirectURL = 'addEdit.php';
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = '<p>Please fill all the mandatory fields.</p>'.$errorMsg;
        
        // Set redirect url
        $redirectURL = 'addEdit.php';
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