<?php 
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_id = $_POST['movie_id'];
    $hastag = trim($_POST['hastag']);
    $hastags_id = null; // Переменная для ID хэштега

    if (!empty($hastag)) {
        // Проверка, существует ли хэштег
        $stmt = mysqli_prepare($link, "SELECT id FROM hastags WHERE name = ?");
        mysqli_stmt_bind_param($stmt, 's', $hastag);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $hastags_id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Если хэштега нет, добавляем его
        if ($hastags_id === null) {
            $stmt = mysqli_prepare($link, "INSERT INTO hastags(name) VALUES(?)");
            mysqli_stmt_bind_param($stmt, 's', $hastag);
            mysqli_stmt_execute($stmt);
            $hastags_id = mysqli_insert_id($link); // Получаем ID нового хэштега
            mysqli_stmt_close($stmt);
        }
    }

    if (!empty($hastags_id)) {
        // Добавление связи между фильмом и хэштегом
        $stmt = mysqli_prepare($link, "INSERT INTO movie_hastags(movie_id, hastags_id) VALUES(?, ?)");
        mysqli_stmt_bind_param($stmt, "ii", $movie_id, $hastags_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo "Tag Created for films";
    } else {
        echo "Error: Invalid tag";
    }
} else {
    echo 'Create tags';
}
?>

<form method="POST">
    <input type="number" name='movie_id' placeholder='create id film'>
    <input type="text" name="hastag" placeholder="create tags">
    <button type="submit">Create</button>
</form>
