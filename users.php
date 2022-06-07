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
            <form action="">
                <div class="image"><img src="img/add.png" alt="" width="30px" style="margin-top: 2.1em;"></div>

                <label for="name">
                    <input id="user" type="text" placeholder="Name" name="name" required>
                </label>  

                <label for="email">
                    <input id="mail" type="email" placeholder="E-mail" name="email" required>
                </label>

                <label for="password">
                    <input id="pass" type="password" placeholder="Password" name="password" required>
                </label>
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
</body>
</html>