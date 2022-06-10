<?php 
session_start();

	include("connection.php");
    include("functions.php");

    $user_data= check_login($con);
   
 	if(isset($_POST['update']) && isset($_GET['did']))
	{

        $monumID = mysqli_real_escape_string($con, $_GET['did']);
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

		if(!empty($title) && !empty($location) && !empty($description) && !empty($filename) && !empty($price) && !empty($nbCopies))
		{

			//save to database
			$query = "update monuments set title = '$title' ,place = '$location' , description = '$description ',image = '$filename',image_path = '$folder', price ='$price' , copies='$nbCopies'  where  id_monument = $monumID ";

			if(!mysqli_query($con, $query)) {
                echo "ERROR: Sorry $query. "
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
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}

?>