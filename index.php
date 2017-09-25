<?php
session_start(); // соединяемся с базой ,если ошибка то выводим её
$link = mysqli_connect("localhost", "root", "", "data_base")or die("Could not connect: " . mysqli_error());
$sid = $_SESSION['user_id'];
$user = $link->query("SELECT * FROM `user` WHERE `user_id` = '".$sid."' LIMIT 1") -> fetch_assoc();
?>

<?php
require_once ('header.php');

?>
<title>Головна</title>
<div class="content">
    <img class="ua" src="images/Outline_of_Ukraine.svg" alt="">
    <?php
    require_once ('db_msg.php');
    ?>
    <?php
    if (isset($_POST['submit_msg'])) { //если нажата кнопка отправить
        $database = "data_base"; // имя базы данных
        $table = "chat"; // имя таблицы
        $msg = $_POST['msg'];
        $err = array();

        if (empty($sid)){
            $err[] = "Увійдіть в систему";
        }
        else{
            if (empty($msg)){
                $err[] = "Уведіть повідомлення";
            }
        }
        if (count($err) == 0){
            $link = mysqli_connect("localhost", "root", "", "data_base")or die("Could not connect: ". mysqli_error());
            $query1 = "INSERT INTO $table (`msg`, `user_login`, `user_id`) VALUES ('$msg', '$a[user_login]', '$a[user_id]')";
            $msg_q = mysqli_query($link, $query1);
            echo '<script type="text/javascript">window.location = "index.php"</script>';
        }else{
            foreach ($err as $error) {
            echo "<div class='alert alert-danger container'>$error</div>";
            }
        }
    }
    mysqli_close($link);
    ?>
    <div class="form-block">
        <form action="index.php" name="message"  method="post">
            <h1 class="form-signin-heading title">Ваше повідомлення</h1>
            <textarea class="form-control send-form" rows="3" name="msg"></textarea>
            <button class="btn btn-md btn-primary btn-send" type="submit" name="submit_msg">Відправити</button>
        </form>
    </div>
</div>

<?php
require_once ('footer.php');




