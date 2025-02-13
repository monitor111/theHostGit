<?php
// Подключение к базе данных
$mysqli = new mysqli('localhost', 'monitor98', '108Monitor98', 'htdocs_reg');

// Проверка подключения
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Получение идентификатора видео, которое нужно удалить
if(isset($_POST['video_id'])) {
    $videoId = $_POST['video_id'];
    echo "ID видео для удаления: " . $videoId; // Вывод значения идентификатора для отладки
} else {
    echo "ID видео не передано в POST запросе";
    exit; // Прерываем выполнение скрипта, так как идентификатор не получен
}

// Запрос на удаление видео из базы данных
$query = "DELETE FROM videos WHERE id = '$videoId'";
if (!$mysqli->query($query)) {
    echo "Ошибка при удалении видео: " . $mysqli->error;
} else {
    echo "Видео успешно удалено";
}

// Закрытие соединения с базой данных
$mysqli->close();
?>

//36XD98NUC5Sx
