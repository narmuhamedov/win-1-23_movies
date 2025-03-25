<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/users.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h1><a href="/">На главную</a></h1>
    <div class='container mt-4'>
        <h1>Форма авторизации</h1>
        <form action="auth.php" method="POST">
            <input type="text" class='form-control' name='login' id='login' placeholder='Введите логин'><br>
            <input type="password" class='form-control' name='pass' id='pass' placeholder='Введите пароль'><br>
            <button type='submit' class='btn btn-success'>Регистрация</button>
        </form>
        <a href="main_page.php">Регистрация</a>
    </div>
</body>
</html>