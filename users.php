<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data= check_login($con);
    check_admin($con, $user_data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="css/users.css">
</head>
<body>
    <header>
        <div class="head">
        <h2>Bienvenue, Zouhir el amraani</h2>
        <h3>Users</h3>
        </div>
    </header>

    <nav class="side-nav">
        <ul>
            <li id="store" class="icon"><a href="store.php"><img src="img/store.png" alt="" width="30px"><div class="menu-text">Store</div></a></li>
            <li id="users" class="icon"><a href="users.php"><img src="img/users.png" alt="" width="30px"><div class="menu-text">Users</div></a></li>
            <li id="info" class="icon"><a href="#"><img src="img/info.png" alt="" width="30px"><div class="menu-text">Logs</div></a></li>
            <li id="logout" class="icon"><a href="logout.php"><img src="img/logout.png" alt="" width="30px"><div class="menu-text">Logout</div></a></li>
        </ul>
    </nav>

    <main>
        <div class="box-add">
            <form action="add.php" method="POST" enctype="multipart/form-data">
                <div id="picture"><img id="plus-icon" src="img/add.png" alt="" width="30px" style="margin-top: 2.1em;"></div>
                <input type="file" id="mediaFile" name="picture" required/>

                <div id="name-form" class="input-container">
                    <input id="user" class="input-field" type="text" placeholder="Name" name="name" required>
                </div>  

                <div id="email-form" class="input-container">
                    <input id="mail" class="input-field" type="email" placeholder="E-mail" name="email" required>
                </div>

                <div id="password-form" class="input-container">
                    <input id="pass" class="input-field" type="password" placeholder="Password" name="password" required>
                </div>
                <button type="submit" name="add">Add</button>
            </form>
        </div>
        <?php
        
        $records = mysqli_query($con,"select id, fullname, email, picture, nb_contributions, admin_id from users where admin_id = '".$user_data['id']."';");

        while($data = mysqli_fetch_array($records))
        {
        ?>
        <div class="box-user">
            <div class="image"><img src=<?php echo "uploads/".encrypt($data['id']).'/'.$data['picture']; ?> alt="" width="50px"></div>
            <div class="infos">
                <span class="name"><?php echo $data['fullname']; ?></span>
                <span class="email"><?php echo $data['email']; ?></span>
                <span class="nb-contr"><?php echo $data['nb_contributions']; ?> contributions</span>
            </div>
        </div>

        <?php
        }
        ?>
        
        
        
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
    <script>

        $(".icon").hover(function(){
            $(this).find(".menu-text").animate({"opacity": "1"},200);
        },function(){
            $(this).find(".menu-text").animate({"opacity": "0"},100);
        });
        
        $('#picture').on('click', function(e) {
            $('#mediaFile').click();
        });
        
        $('#mediaFile').change(function(e) {

            var input = e.target;
            if (input.files && input.files[0]) {
            var file = input.files[0];

            var reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function(e) {
                $('#picture').css('background-image', 'url(' + reader.result + ')');
                $('#plus-icon').css('display', 'none');
            }
            }
        })
    </script>
</body>
</html>
