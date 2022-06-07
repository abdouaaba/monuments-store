<!--<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_mail = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($user_mail) && !empty($password) )
		{

			//read from database
			$query = "select * from admins where email = '$user_mail' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['id'] = $user_data['id'];
						header("Location: users.php");
						die;
					}
                    else
                    {
                        echo "wrong username or password!";
                    }   
				}
			}
	
		}
	}

?>
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="css/login.css" rel="stylesheet">

</head>

<body>
        <img class="bg" src="img/bg.jpg" alt="bg">
        <div class="container">
                <p>Monument Catalog Login</p>
                <div class="container2">
                <form method="post">

                        <div class="set_info"><label class="label"><span class="detail">E-mail</span></label><input
                                name="email" type="email" class="inputcls" placeholder="example.mail@gmail.com"></div>
                        <div class="set_info"><label class="label"><span class="detail">Password</span></label><input
                                name="password" type="password" class="inputcls" id="mypswrd1" placeholder="Only you know it.">
                            <div class="show_hide_pswd">
                                <span id="sh_p1" onclick="myFunction3()">Show password</span>
                                <span id="hi_p1" onclick="myFunction4()" style="display: none;">Hide password</span>
                            </div>
                        </div>
                        <button type="submit">Log in</button>
                </form>
                </div>
        </div>
    <script>
        function myFunction3() {
            var x = document.getElementById("mypswrd1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction4() {
            var x = document.getElementById("mypswrd1");
            if (x.type === "text") {
                x.type = "password";
            } else {
                x.type = "text";
            }
        }
        document.getElementById("sh_p1").addEventListener("click",
            function () {
                document.getElementById("sh_p1").style.display = "none";
                document.getElementById("hi_p1").style.display = "inline";

            }
        );

        document.getElementById("hi_p1").addEventListener("click",
            function () {
                document.getElementById("sh_p1").style.display = "inline";
                document.getElementById("hi_p1").style.display = "none";

            }
        );
    </script>
</body>