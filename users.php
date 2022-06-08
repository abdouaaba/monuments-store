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
    <title>Usres</title>
    <link rel="stylesheet" href="css/users.css">
</head>
<body>
    <nav class="side-nav">
        <ul>
            <li id="store" class="icon"><a href="store.php"><img src="img/store.png" alt="" width="30px"></a></li><div class="icon-store">Store</div>
            <li id="users" class="icon"><a href="users.php"><img src="img/users.png" alt="" width="30px"></a></li><div class="icon-users">Users</div>
            <li id="info" class="icon"><a href="#"><img src="img/info.png" alt="" width="30px"></a></li><div class="icon-info">Logs</div>
            <li id="logout" class="icon"><a href="logout.php"><img src="img/logout.png" alt="" width="30px"></a></li><div class="icon-logout">Logout</div>
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
                <button type="submit">Add</button>
            </form>
        </div>
        <div class="box-user">
            <div class="image"><img src="img/bg.jpg" alt="" width="50px"></div>
            <div class="infos">
                <span class="name">Zouhair Elamrani</span>
                <span class="email">zozoamrani@gmail.com</span>
                <span class="nb-contr">0 contributions</span>
            </div>
        </div>
        <div class="box-user">
            <div class="image"><img src="img/bg.jpg" alt="" width="50px"></div>
            <div class="infos">
                <span class="name">Zouhair Elamrani</span>
                <span class="email">zozoamrani@gmail.com</span>
                <span class="nb-contr">0 contributions</span>
            </div>
        </div>
        
        
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
    <script>
        $(function() {
            $('#picture').addClass('dragging').removeClass('dragging');
        });

        $('#picture').on('dragover', function() {
            $('#picture').addClass('dragging')
        }).on('dragleave', function() {
            $('#picture').removeClass('dragging')
        }).on('drop', function(e) {
        $('#picture').removeClass('dragging hasImage');

        if (e.originalEvent) {
            var file = e.originalEvent.dataTransfer.files[0];
            console.log(file);

            var reader = new FileReader();

            //attach event handlers here...

            reader.readAsDataURL(file);
            reader.onload = function(e) {
                console.log(reader.result);
                $('#picture').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
                $('#plus-icon').css('display', 'none');
            }

        }
        })
        $('#picture').on('click', function(e) {
            console.log('clicked')
            $('#mediaFile').click();
        });
        window.addEventListener("dragover", function(e) {
            e = e || event;
            e.preventDefault();
        }, false);
        window.addEventListener("drop", function(e) {
            e = e || event;
            e.preventDefault();
        }, false);
        $('#mediaFile').change(function(e) {

            var input = e.target;
            if (input.files && input.files[0]) {
            var file = input.files[0];

            var reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function(e) {
                console.log(reader.result);
                $('#picture').css('background-image', 'url(' + reader.result + ')');
                $('#plus-icon').css('display', 'none');
            }
            }
        })
    </script>
</body>
</html>
