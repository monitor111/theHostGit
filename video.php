<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка видео</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        h3 {
            word-wrap: break-word;
        }

        .video-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .video-item a {
            font-weight: bold;
            color: #007bff;
        }

        .video-item a:hover {
            text-decoration: underline;
        }

        .video-item button {
            margin-left: 15px;
        }

        .container {
            max-width: 800px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Загрузка видео</h1>

        <?php
        // Подключение к базе данных
        $mysqli = new mysqli('localhost', 'monitor98', '108Monitor98', 'htdocs_reg');

        // Проверка подключения
        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        // Запрос к базе данных для получения списка загруженных видео
        $result = $mysqli->query("SELECT * FROM videos");

        // Проверка наличия загруженных видео
        if ($result->num_rows > 0) {
            // Вывод списка загруженных видео
            while ($row = $result->fetch_assoc()) {
                $video_url = htmlspecialchars($row['video_url']);
                $video_title = htmlspecialchars($row['video_title']);
                $video_id = $row['id']; // Получаем идентификатор видео
                echo "<div class='video-item'>";
                echo "<h3><a href='{$video_url}' target='_blank'>{$video_title}</a> 
                      <button class='btn btn-danger' onclick='deleteVideo(\"$video_id\")'>Удалить</button></h3>";
                echo "</div>";
            }
        } else {
            echo "<p>Видео не найдено</p>";
        }

        // Закрытие соединения с базой данных
        $mysqli->close();
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Функция для удаления видео
        function deleteVideo(videoId) {
            if (confirm("Вы уверены, что хотите удалить это видео?")) {
                // Отправка запроса на сервер о удалении видео
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Перезагрузка страницы после удаления видео
                        window.location.reload();
                    }
                };
                xhr.send("video_id=" + videoId);
            }
        }
    </script>
</body>

</html>
