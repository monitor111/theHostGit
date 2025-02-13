<!-- <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">

<?php /* if(empty($_COOKIE['user'])): */ ?>

       <div class="row">
           <div class="col">
                <h1>Форма регистрации</h1>
        <form action="validation-form/check.php" method="post">
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
            <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"><br>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
            <button class="btn btn-success" type="submit">Зарегистрировать</button>
        </form>
           </div>
             <div class="col">
                <h1>Форма авторизации</h1>
        <form action="validation-form/auth.php" method="post">
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
            <button class="btn btn-success" type="submit">Авторизоватся</button>
        </form>
           </div>
       </div>

<?php /* else: */?>
    <p>Привет <?/*=$_COOKIE['user']?>. Что бы выйти нажмите <a href="/exit.php">здесь</a>.</p>

<?php /* endif; */?>

    </div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка видео</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Загрузка видео</h1>

        <form id="uploadForm" action="upload.php" method="post">
            <div>
                <label for="video_url">Введите адрес видео на YouTube:</label><br>
                <input type="text" class="form-control" id="video_url" name="video_url" value=""><br>
            </div>
            <div>
                <label for="video_title">Введите название видео:</label><br>
                <input type="text" class="form-control" id="video_title" name="video_title" value=""><br>
            </div>
            <button class="btn btn-success mb-2 mb-md-0" type="submit">Загрузить видео</button>
            <button class="btn btn-secondary mb-2 mb-md-0" type="button" onclick="reloadPage()">Очистить форму</button>
        </form>
    </div>

    <script>
        // Функция для перезагрузки страницы
        function reloadPage() {
            window.location.reload(); // Перезагрузка страницы
        }
    </script>
</body>
</html>

