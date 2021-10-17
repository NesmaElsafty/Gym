<?php
// Start session
// session_start();

// Include and initialize DB class

require_once '../../admin/config/connect.php';
require_once '../../admin/config/functions.php';
require_once '../../admin/config/db.php';
$db = new DB();

// Database table name
$tblName = 'articles';

// Set default redirect url
$redirectURL = '../home.php';

if(isset($_POST['userSubmit'])){

    $name     = trim(strip_tags($_POST['name']));
    $description = trim(strip_tags($_POST['description']));
    $type    = trim(strip_tags($_POST['type']));
    $unID    = trim(strip_tags($_POST['unID']));
    $image = $_FILES['image']['name'];
    $tmp = $_FILES["image"]["tmp_name"];
    
    $errorMsg =  '';
    // Submitted form data

    if (empty($image)) {

    $userData = array(
        // 'title' => $title,
        'name' => $name,
        'description' => $description,
        'type' => $type,
        'unID' => $unID,
        'image' => OldImg($tblName,$_POST['id'])
    );
    

    }else{
        $upload = uploadImage($image, $tmp);
        $userData = array(
            // 'title' => $title,
            'name' => $name,
            'description' => $description,
            'type' => $type,
            'unID' => $unID,

            'image' => $image
        );
    }


        if(!empty($_POST['id'])){
            // Update user data
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            if ($update) {
                header('location:../home.php');
                
            }else{
                echo 'failed to update article';
            }


        }else{
            // Insert user data
            $insert = $db->insert($tblName, $userData);
            // die($insert);
            if ($insert) {
                header('location:../home.php');
            }else{
                echo 'failed to insert art';
            }
           
        }
    
    // Store status into the session
}elseif(($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])){
    // Delete data
    $condition = array('id' => $_GET['id']);
    $delete = $db->delete($tblName, $condition);
    
    // Store status into the session

}

// Redirect to the respective page
header("Location:".$redirectURL);
exit();
?>
