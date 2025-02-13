<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass . "ksjdhdgdgh7363524");

$mysql = new mysqli('localhost', 'monitor98', '108Monitor98', 'htdocs_reg');
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");

$user = $result->fetch_assoc();
if ($user === null) { // Используем строгое сравнение для проверки наличия пользователя
    echo "Такой пользователь не найден";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

$mysql->close();

header("Location: /");

?>


//36XD98NUC5Sx