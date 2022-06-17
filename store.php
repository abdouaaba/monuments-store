<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data= check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stores</title>
    <link rel="stylesheet" href="css/store.css">
</head>

<body>
    <header>
        <div class="head">
        <l1>Bienvenue, Zouhir el amraani<br></l1>
        <l2>Store </l2>
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
        <?php
        if($_SESSION['type'] == "user") {
        ?>
        <div id="box-add">
                <div id="add-image"><img src="img/add.png" width="50px" ></div>
                
                <form action="create.php" method="POST" id="create-form" enctype="multipart/form-data">
                    <div class="titre-add">
                        <input class="titre-input-add" type="text" placeholder="Titre" name="title" required>
                    </div>
                    <div class="location-add">
                        <input class="location-input-add" type="text" placeholder="Location" name="location" required>
                    </div>
                    
                    <div class="description-add">
                        <textarea class="description-input-add" name="description" rows="13" cols="48" required></textarea>
                    </div>
                    
                    <div class="image-add">
                        <input class="image-input-add" type="file"  name="picture" required>
                    </div>
                    
                    <div class="prix-add">
                        <input class="prix-input-add" type="text" placeholder="Price" name="price" required>
                    </div>
                    <div class="copies-add">
                        <input class="copies-input-add" type="text" placeholder="Number of Copies" name="nbCopies" required>
                    </div>
                    <button type="submit" name="create" id="create-button"><img src="img/submit.png" alt="" width="20px"></button>
                </form>
        </div>
        <?php
        }
        ?>

        <?php
        if($_SESSION['type'] == "user") {
            $records = mysqli_query($con,"select id_monument, title, place, description, image, image_path, price, copies from monuments where user_id = '".$user_data['id']."';");
        } else {
            $records = mysqli_query($con,"select id_monument, title, place, description, image, image_path, price, copies from monuments where user_id in (select id from users where admin_id = '".$user_data['id']."');");
        }
        
        while($data = mysqli_fetch_array($records))
        {
            $title = $data['title'];
            $location = $data['place'];
        
        ?>

        <div id=<?php echo $data['id_monument']; ?> class="box-monum" style="background-image: url(<?php echo $data['image_path']; ?>); background-position: center; background-repeat: no-repeat; background-size: auto 400px;">
            <form action=<?php echo "update.php?did=".$data['id_monument']; ?> method="POST" class="infos" enctype="multipart/form-data">
                <div class="titre">
                    <input class="titre-input input-field" type="text" value=<?php echo "'$title'"; ?> name="title" readonly>
                </div>
                <div class="location">
                    <input class="location-input input-field" type="text" value=<?php echo "'$location'"; ?> name="location" readonly>
                </div>
                
                <div class="description">
                    <textarea class="description-input input-field" name="description" rows="13" cols="48" readonly><?php echo $data['description']; ?></textarea>
                </div>
                
                <div class="image">
                    <input class="image-input" type="file"  name="picture" readonly>
                </div>
                
                <div class="prix">
                    <input class="prix-input input-field" type="text" value=<?php echo $data['price'].'$';?> name="price" readonly>
                </div>
                <div class="copies">
                    <input class="copies-input input-field" type="text" value=<?php echo $data['copies']; ?> name="nbCopies" readonly>
                </div>
                <div class="edit-button"><img src="img/edit.png" alt="" width="20px"></div>
                <div class="delete-button"><img src="img/delete.png" alt="" width="20px"></div>
                <button type="submit" name="update" class="confirm-button"><img src="img/submit.png" alt="" width="20px"></button>
            </form>
        </div>

        <?php
        }
        ?>
        
        
    
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        $(".icon").hover(function(){
            $(this).find(".menu-text").animate({"opacity": "1"},200);
        },function(){
            $(this).find(".menu-text").animate({"opacity": "0"},100);
        });

        //hover effect
        $(".box-monum").hover(function(){
        $(this).find(".infos").animate({"opacity": "1"},200);
        },function(){
        $(this).find(".infos").animate({"opacity": "0"},100);
        });


        //edit button
        $(".edit-button").on('click', function(e){
            $(this).hide();

            var deleteButton = $(this).siblings('.delete-button');
            var confirmButton = $(this).siblings('.confirm-button');
            var imageInput = $(this).siblings('.image');
            deleteButton.css("left", "17.5em");
            confirmButton.show();
            imageInput.show();

            var formParent = $(this).parent();

            var inputFields = formParent.find(".input-field")
            inputFields.css({"text-shadow": "none", "cursor": "text"});
            inputFields.attr("readonly", false).css("background", "rgb(175, 175, 175)").focus(function() {
                $(this).css("background", "#7049bd");
            }).blur(function() {
                $(this).css("background", "rgb(175, 175, 175)");
            });

        });

        //delete button with confirmation
        $('.delete-button').on('click', function(e) {
            e.preventDefault();
            var self = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var boxParent = $(this).parent().parent();
                        var id = boxParent.attr('id');

                        $.ajax({
                            url: 'delete.php',
                            type: 'POST',
                            dataType: 'JSON',
                            data: {id : id},
                            fail: function(response) {
                                alert(response.message);
                            }
                        });

                        boxParent.fadeOut("fast");
                        Swal.fire(
                        'Deleted!',
                        'Deleted succefully.',
                        'success'
                        )
                    }
            })
        })
    </script>
    
</body>
</html>
