<?php
session_start();

include("connection.php");
include("functions.php");

$user_data= check_login($con);

if(isset($_POST['id'])) {
    $msg = '';
    $monumID = mysqli_real_escape_string($con, $_POST['id']);

    $data = mysqli_fetch_array(mysqli_query($con, "select user_id from monuments where id_monument = '$monumID' ;"));
    $userID = $data['user_id'];

    mysqli_query($con, "UPDATE users SET nb_contributions = nb_contributions - 1 WHERE id = $userID;");

    mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0;");
    
    $sql = mysqli_query($con, "delete from monuments where id_monument = '".$monumID."';");

    mysqli_query($con, "SET FOREIGN_KEY_CHECKS=1;");
    if($sql) {
        $msg = "Deleted Succesufully";
    } else {
        $msg = "Error";
        echo json_encode(array('message' => $msg));
    }

    exit;
}

?>
