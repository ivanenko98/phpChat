<?php
require_once ('header.php');
?>
<title>Реєстрація</title>
<div class="container">
    <?php
    $link = mysqli_connect("localhost", "root", "", "data_base")or die("Could not connect: ". mysqli_error());

    $login = $_POST['login'];
    $password = md5(md5(trim($_POST['password'])));
    $email = $_POST['email'];

    if (isset($_POST['submit_reg'])) {
        if(mysqli_num_rows(mysqli_query($link,"SELECT `user_login` FROM `user` WHERE `user_login` = '$login'")) == true) {
            echo '<div class="alert alert-danger">Користувач з таким логіном вже зареєстрований</div>';
        }elseif (mysqli_num_rows(mysqli_query($link,"SELECT `user_email` FROM `user` WHERE `user_email` = '$email'")) == true) {
            echo '<div class="alert alert-danger">Користувач з таким email вже зареєстрований</div>';

        }elseif (mysqli_query($link, "INSERT INTO user SET user_login='" . $login . "', user_password='" . $password . "', user_email='" . $email . "'")){
            echo '<div class="alert alert-success">Реєстрація пройшла успішно</div>';
            echo '<script type="text/javascript">function func() {window.location = "login.php"} setTimeout(func, 2000);</script>';
            }else{
                echo '<div class="alert alert-danger">Виникла помилка!</div>';
            }
    }
    ?>
    <div class="col-xs-5 form-block">
        <form class="form-signin" role="form" method="POST">
            <h1 class="form-signin-heading title">Реєстрація</h1>
            <input name="login" class="form-control" placeholder="Ім'я" required autofocus>
            <input name="password" type="password" class="form-control" placeholder="Пароль" required>
            <input name="email" type="email" class="form-control" placeholder="Email адрес" required autofocus>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit_reg">Sign in</button>
        </form>
    </div>
</div>
<?php
require_once ('footer.php');
?>
