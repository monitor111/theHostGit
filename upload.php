<?php
// Подключение к базе данных
$mysqli = new mysqli('localhost', 'monitor98', '108Monitor98', 'htdocs_reg');

// Проверка подключения
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

// Получение данных из формы загрузки видео
$video_url = $mysqli->real_escape_string($_POST['video_url']);
$video_title = $mysqli->real_escape_string($_POST['video_title']);

// Запись данных в базу данных
$query = "INSERT INTO videos (video_url, video_title) VALUES ('$video_url', '$video_title')";
if (!$mysqli->query($query)) {
    echo "Ошибка: " . $mysqli->error;
}

// Закрытие соединения с базой данных
$mysqli->close();

// Перенаправление обратно на страницу загрузки видео
header("Location: video.php");
?>
//36XD98NUC5Sx