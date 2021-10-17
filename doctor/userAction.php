<?php
// Start session
session_start();

require_once '../admin/config/connect.php';
require_once '../admin/config/functions.php';
require_once '../admin/config/db.php';
$db = new DB();

// Database table name
$tblName = 'doctors';

// Set default redirect url
$redirectURL = 'home.php';

if(isset($_POST['userSubmit'])){
    // Get form fields value
    $id = $_POST['id']; 
    $name     = trim(strip_tags($_POST['name']));
    $summary     = trim(strip_tags($_POST['summary']));
    $address     = trim(strip_tags($_POST['address']));
    $age     = trim(strip_tags($_POST['age']));
    $email     = trim(strip_tags($_POST['email']));
    $cappacity    = trim(strip_tags($_POST['cappacity']));
    
    $image = $_FILES['image']['name'];
    $tmp = $_FILES["image"]["tmp_name"];
    
    // Fields validation
    $errorMsg = '';
    
    if(empty($name) || !filter_var($name, FILTER_SANITIZE_STRING)){
        $errorMsg .= '<p>Please enter a valid name.</p>';
        //Other Condition
    }
    if(empty($summary) || !filter_var($summary, FILTER_SANITIZE_STRING)){
        $errorMsg .= '<p>Please enter a valid summary.</p>';
        //Other Condition
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg .= '<p>Please enter a valid email.</p>';
        //Other Condition
    }
    if (!empty($_POST['id'])) {
        if (CheckEmail($tblName,$email) > 1 || CheckEmail('users',$email) > 0 || CheckEmail('clients',$email) > 0) {
            $errorMsg .= 'this Email is already exists';
        }
    }
// Check if image file is a actual image or fake image

    if (empty($image)) {

    $userData = array(
        'name' => $name,
        'description' => $summary,
        'email' => $email,
        'age' => $age,
        'cappacity' => $cappacity,
        'address' => $address,
        'image' => OldImg($tblName,$_POST['id'])
    );
    

    // Submitted form data
    }else{
        $upload = uploadImage($image, $tmp);
        $userData = array(
            'name' => $name,
            'description' => $summary,
            'email' => $email,
            'age' => $age,
            'cappacity' => $cappacity,
            'address' => $address,
            'image' => $image
        );
    }

    $chat = array('doctor_name' => $name);
    

    $client = array('doctor' => $name);
    
    // Store the submitted field value in the session
    $sessData['userData'] = $userData;
    
    // Submit the form data
    if(empty($errorMsg)){
        if(!empty($_POST['id'])){
            // Update user data
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);

            $sql = "UPDATE chat SET doctor_name='".$name."' WHERE doctor_unID = '".$_POST['unID']."'";
            // die($sql);
            $update_chat = mysqli_query($connect, $sql);

            $sql = "UPDATE clients SET doctor='".$name."' WHERE doctor_unID = '".$_POST['unID']."'";
            $update_client = mysqli_query($connect, $sql);

            $sql = "UPDATE articles SET name='".$name."' WHERE unID = '".$_POST['unID']."'";
            $update_client = mysqli_query($connect, $sql);

            if ($update) {
                echo 'doc name updated';
            }elseif($update_chat == false){
                $_SESSION['msg'] = 'failed to update chat';
            }elseif ($update_client == false) {
              $_SESSION['msg'] = 'failed to update client';
            }else{
               $_SESSION['msg']= 'All updated';
            }
        }
        }
    }
    // Store status into the session


// Redirect to the respective page
header("Location:".$redirectURL);
exit();
?>