<?php
session_start();

include("connection.php");
include("functions.php");

$user_data= check_login($con);

?>

<?php

$msg = ""; 

// check if the user has clicked the button "UPLOAD" 

if (isset($_POST['add'])) {

    $randUserID = random_num(10);
    $encUserID = encrypt($randUserID);
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $admin_id = $user_data['id'];

    $filename = $_FILES["picture"]["name"];

    $tempname = $_FILES["picture"]["tmp_name"];  

        $folder = "uploads/".$encUserID.'/'.$filename;

        // query to insert the submitted data

        $sql = "INSERT INTO users (id, fullname, email, password, picture, nb_contributions, admin_id) VALUES ('$randUserID', '$name', '$email', '$password', '$filename', '0', '$admin_id')";

        // function to execute above query

        if(!mysqli_query($con, $sql)) {
            echo "ERROR: Sorry $sql. "
                . mysqli_error($con);
        };       

        // Add the image to the "image" folder"

        if(!file_exists('uploads/'.$encUserID)){        
            @mkdir('uploads/'.$encUserID.'/', 0666, true);  // Create non-executable upload folder(s) if needed.
        }

        if (move_uploaded_file($tempname, $folder)) {
            header("Location: users.php");

        }else{

            $msg = "Failed to upload image";

    }

}
?>