<?php
session_start();

include("connection.php");
include("functions.php");

$user_data= check_login($con);

?>

<?php


if (isset($_POST['create'])) {

    $randMonumID = random_num(10);
    $id = $user_data['id'];
    $encUserID = encrypt($id);
    $title = $_REQUEST['title'];
    $location = $_REQUEST['location'];
    $description = $_REQUEST['description'];
    $price = $_REQUEST['price'];
    $nbCopies = $_REQUEST['nbCopies'];
    

    $filename = $_FILES["picture"]["name"];
    $filename = str_replace(' ', '_', $filename);
    
    $tempname = $_FILES["picture"]["tmp_name"];

    $folder = "uploads/".$encUserID.'/'.'contributions/'.$filename;


    $sql = "INSERT INTO monuments (id_monument, title, place, description, image, image_path, price, copies, user_id) VALUES ('$randMonumID', '$title', '$location', '$description', '$filename', '$folder', '$price', '$nbCopies','$id')";
    mysqli_query($con, "UPDATE users SET nb_contributions = nb_contributions + 1 WHERE id = $id;");

    if(!mysqli_query($con, $sql)) {
        echo "ERROR: Sorry $sql. "
            . mysqli_error($con);
    };

    if(!file_exists('uploads/'.$encUserID.'/contributions')){
        @mkdir('uploads/'.$encUserID.'/contributions'.'/', 0666, true);
    }

    if (move_uploaded_file($tempname, $folder)) {
        header("Location: store.php");

    }else{
        echo "Failed to upload image";
    }

}
?>