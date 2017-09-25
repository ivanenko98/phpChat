<?php
session_start();
?>

<?php
require_once ('header.php');
?>

<title>Вхід</title>

<div class="container">
    <div class="col-xs-5 form-block">
        <form class="form-signin" role="form" method="POST">
            <h1 class="form-signin-heading title">Вхід</h1>
            <input name="login" class="form-control" placeholder="Ім'я" required autofocus>
            <input name="password" type="password" class="form-control" placeholder="Пароль" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit_login">Вхід</button>
        </form>
    </div>
</div>

<?php

$link = mysqli_connect("localhost", "root", "", "data_base")or die("Could not connect: ". mysqli_error()); // соединяемся с базой ,если ошибка то выводим её

if (isset($_POST['submit_login'])){

function txt($var)
    {
        return htmlspecialchars(trim($var));
    }
    
    $login = txt($_POST['login']);

    $password = md5(md5(trim($_POST['password'])));

    $log = $link->query("SELECT * FROM `user` WHERE `user_login` = '".$login."' and `user_password` = '".$password."' LIMIT 1") -> fetch_assoc();

    if (empty($login)){
        $err[] = "Уведіть логін";
    }
    elseif (empty($password)){
        $err[] = "Уведіть пароль";
    }
    elseif ($log == 0){
    	$err[] = "Логін або пароль введено невірно";
    }

    if (count($err) == 0){
    	$_SESSION['user_id'] = $log['user_id'];
    	echo '<script 
                type="text/javascript">window.location = "index.php" 
              </script>';
        echo $_SESSION['id'];
        $_SESSION["loggedIn"]=true;
    }else {
        print "<b>Під час входу виникли такі помилки:</b><br>";
        echo "<div class = 'err'>";
        foreach ($err AS $error) {
            print $error . "<br>";
        }
        echo "</div>";
    }
    }

require_once ('footer.php');
?>

