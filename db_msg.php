<?php
session_start(); // соединяемся с базой ,если ошибка то выводим её
$link = mysqli_connect("localhost", "root", "", "data_base")or die("Could not connect: " . mysqli_error());
$sid = $_SESSION['user_id'];
$a = $link->query("SELECT * FROM `user` WHERE `user_id` = '".$sid."' LIMIT 1") -> fetch_assoc();


$query = "SELECT * FROM `chat`";

$res = mysqli_query($link, $query);

$b = $link->query("SELECT * FROM `user`")->fetch_assoc();

$delid = intval($_GET['del']);

if(!empty($delid)) {
    $quer = "DELETE FROM `chat` WHERE `id_msg` = '".$_GET['del']."' "; //запрос заключаем в переменную для удобства
    $msg_q = mysqli_query($link, $quer); //а теперь мы выполняем запрос передав в аргументы сам запрос и подключение к БД
    echo '<script type="text/javascript">window.location = "index.php"</script>';
}


while ($row = mysqli_fetch_array($res)) {
    $username = $row['user_login'];
    $id_user = $row['user_id'];
    ?>
    <div class='message-block clearfix'>
        <div class='user-name'><?=$username;?></div>
        <?php
        if ($username == $a[user_login])
        {
        echo "<div class='delete'><a href = 'db_msg.php?del=".$row['id_msg']."'><i class='fa fa-trash' aria-hidden='true'></i></a></div>";

        }
        ?>
        <div class='time'><?=$row['date'];?></div>
        <div class='message'><?=$row['msg'];?></div>
    </div>
<?php }

?>
