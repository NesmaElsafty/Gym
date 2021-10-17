<?php
require_once '../config/PHPheader.php';

// Database table name
$tblName = 'clients';
$db = new DB();

if(isset($_POST['userSubmit'])){
    // Get form fields value
    $name     = trim(strip_tags($_POST['name']));
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'] , PASSWORD_DEFAULT);
    }
    $address     = trim(strip_tags($_POST['address']));
    $email     = trim(strip_tags($_POST['email']));
    $phone    = trim(strip_tags($_POST['phone']));
    $unID = $_POST['unID'];
   
    
    // Fields validation
    $errorMsg = '';
    
    if(empty($name) || !filter_var($name, FILTER_SANITIZE_STRING)){
        $errorMsg .= '<p>Please enter a valid name.</p>';
        $_SESSION['msg'] = 'Please enter a valid name.';
    }
        if(empty($address) || !filter_var($address, FILTER_SANITIZE_STRING)){
        $errorMsg .= '<p>Please enter a valid address.</p>';
        $_SESSION['msg'] = 'Please enter a valid address.';
    }

    
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg .= '<p>Please enter a valid email.</p>';
        $_SESSION['msg'] = 'Please enter a valid email..';

    }  
     if(!empty($_POST['id'])){
        if (unRepeatable('clients', $unID , $phone , $email) > 1) {
        $errorMsg .= '<p>Your Data is Already exists</p>';
    }
     }
    
    // Submitted form data

    $userData = array(
        'name' => $name,
        'password' => $password,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'unID' => $unID
    );

    $client_name = array('client_name' => $name);

    // Store the submitted field value in the session
    $sessData['userData'] = $userData;
    
    // Submit the form data
    if(empty($errorMsg)){
        if(!empty($_POST['id'])){
            // Update user data
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            
            $condition = array('client_unID' => $_POST['unID']);
            $chat = $db->update('chat', $client_name, $condition);
            


            if ($update) {
                echo 'doc name updated';
            }elseif($chat){
                echo 'chat name updated';
            }else{
               echo 'problem occured';
            }


        }else{
            $insert = $db->insert($tblName, $userData);
            if ($insert) {
                echo 'data inserted';
                header("location:../index.php");
            }else{
                echo 'failed to insert';
            }

        }
    } 
}

// Redirect to the respective page
// header("Location:addEdit.php?id=".$_POST['unID']);
exit();

?>