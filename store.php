<!--
<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data= check_login($con);

?>
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stores</title>
    <link rel="stylesheet" href="css/store.css">
</head>
<heeder>
    <div class="head">
    <l1>Bienvenue, Zouhir el amraani<br></l1>
    <l2>Store </l2>
</div>
</header>
<body>
    <nav class="side-nav">
        <div class="zoom">

        <ul>
            <li id="store" class="icon"><a href="store.php"><img src="img/store.png" alt="" width="30px"></a></li><div class="icon-store">Store</div>
            <li id="users" class="icon"><a href="users.php"><img src="img/users.png" alt="" width="30px"></a></li><div class="icon-users">Users</div>
            <li id="info" class="icon"><a href="#"><img src="img/info.png" alt="" width="30px"></a></li><div class="icon-info">Logs</div>
            <li id="logout" class="icon"><a href="logout.php"><img src="img/logout.png" alt="" width="30px"></a></li><div class="icon-logout">Logout</div>
        </ul>
    </div>
    </nav>
    <main>
        <div id="box-add">
                <div id="add-image"><img src="img/add.png" width="30px" ></div>
                
                <form action="" id="create-form">
                    <div class="titre-add">
                        <input class="titre-input-add" type="text" placeholder="Titre" name="titre" required>
                    </div>
                    <div class="location-add">
                        <input class="location-input-add" type="text" placeholder="Location" name="location" required>
                    </div>
                    
                    <div class="description-add">
                        <textarea class="description-input-add" name="description" rows="13" cols="48" required>qsjkdfhsdqjfhqsdkjfhqsdlkjfhqslkdqskjdlqksjdlkqsjdlkqsjdlkqsjdlkqsjdlkqsjdlkqjsd</textarea>
                    </div>
                    
                    <div class="image-add">
                        <input class="image-input-add" type="file"  name="image" required>
                    </div>
                    
                    <div class="prix-add">
                        <input class="prix-input-add" type="text" placeholder="Price" name="prix" required>
                    </div>
                    <div class="copies-add">
                        <input class="copies-input-add" type="text" placeholder="Copies" name="copies" required>
                    </div>
                    <button type="submit" name="create" id="create-button">✓</button>
                </form>
        </div>
        <div class="box-monum" style="background-image: url(img/bg.jpg); background-position: center; background-repeat: no-repeat; background-size: auto 400px;">
            <form action="" class="infos">
                <div class="titre">
                    <input class="titre-input" type="text" placeholder="Titre" name="titre" readonly>
                </div>
                <div class="location">
                    <input class="location-input" type="text" placeholder="Location" name="location" readonly>
                </div>
                
                <div class="description">
                    <textarea class="description-input" name="description" rows="15" cols="48" readonly>qsjkdfhsdqjfhqsdkjfhqsdlkjfh</textarea>
                </div>
                <!--
                <div class="image">
                    <input class="image-input" type="file"  name="image" readonly>
                </div>
                -->
                <div class="prix">
                    <input class="prix-input" type="text" placeholder="Price" name="prix" readonly>
                </div>
                <div class="copies">
                    <input class="copies-input" type="text" placeholder="Copies" name="copies" readonly>
                </div>
                </form>
            
        </div>
        <div class="box-monum" style="background-image: url(img/bg.jpg); background-position: center; background-repeat: no-repeat; background-size: auto 400px;">
            <form action="" class="infos">
                <div class="titre">
                    <input class="titre-input" type="text" placeholder="Titre" name="titre" readonly>
                </div>
                <div class="location">
                    <input class="location-input" type="text" placeholder="Location" name="location" readonly>
                </div>
                
                <div class="description">
                    <textarea class="description-input" name="description" rows="15" cols="48" readonly>qsjkdfhsdqjfhqsdkjfhqsdlkjfh</textarea>
                </div>
                <!--
                <div class="image">
                    <input class="image-input" type="file"  name="image" readonly>
                </div>
                -->
                <div class="prix">
                    <input class="prix-input" type="text" placeholder="Price" name="prix" readonly>
                </div>
                <div class="copies">
                    <input class="copies-input" type="text" placeholder="Copies" name="copies" readonly>
                </div>
                </form>
            
        </div>

        <div class="box-monum" style="background-image: url(img/bg.jpg); background-position: center; background-repeat: no-repeat; background-size: auto 400px;">
            <form action="" class="infos">
                <div class="titre">
                    <input class="titre-input" type="text" placeholder="Titre" name="titre" readonly>
                </div>
                <div class="location">
                    <input class="location-input" type="text" placeholder="Location" name="location" readonly>
                </div>
                
                <div class="description">
                    <textarea class="description-input" name="description" rows="15" cols="48" readonly>qsjkdfhsdqjfhqsdkjfhqsdlkjfh</textarea>
                </div>
                
                <div class="prix">
                    <input class="prix-input" type="text" placeholder="Price" name="prix" readonly>
                </div>
                <div class="copies">
                    <input class="copies-input" type="text" placeholder="Copies" name="copies" readonly>
                </div>
                </form>
            
        </div>
    
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
    <script>
        var addButton = document.getElementById('add-image');

        addButton.addEventListener('click', () => {
            var form = document.getElementById('create-form');
            var addBox = document.getElementById('box-add');
            form.style.display = "block";
            addBox.style.backgroundColor = "gray";
            addButton.style.display = "none";
        })
    </script>
    <script>
        $(".box-monum").hover(function(){
        $(this).find(".infos").stop(true,true).css({"left":"20px"}).animate({"top":"-10px", "opacity": "1"},200);
        },function(){
        $(this).find(".infos").animate({"top":"-20px", "opacity": "0"},200, function() {
            $(this).css({"left":"-9999px", "top":"0"});
        });
        });
    </script>
</body>
</html>
