<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" href="css/fontawesome/font-awesome.min.css">
</head>
<body>
<header>
    <div class="content">
    <div class="header clearfix">
        <div class="logo">
            <a href="index.php">Чат</a>
        </div>
        <?php
        if (count($user) > 0){
            echo "<div class = 'username'>".$user['user_login']."</a></div>"."<div class='exit'><a href = 'exit_user.php'>Вихід</a></div>";
        }else{
            echo '<a href = "register.php"><button type="button" class="btn btn-default reg-btn">Реєстрація</button></a><a href = "login.php"><button type="button" class="btn btn-default login-btn">Вхід</button></a></div>';
        }
        ?>
    </div>
</header>