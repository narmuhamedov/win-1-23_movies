<?php  include ('db.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Подробнее о фильме</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9RaqWhNrT68sVwQFo4ZAs1VRsUZImppmaqg&s">
    <link rel="stylesheet" href="css/show_detail.css">
</head>
<body>

<?php 
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM films WHERE id=$id");
$myrow = mysqli_fetch_array($result);
?>

<!-- Навигационная панель -->
<?php include ('components/navigation.php'); ?>

<!-- Контент с информацией о фильме -->
<div class="container mt-4">
    <div class="movie-card">
        <div class="card">
            <img src="<?php echo $myrow['image']  ?>" class="card-img-top" alt="Фильм">
            <div class="card-body">
                <h5 class="card-title"><?php echo $myrow['title']  ?></h5>
                <p class="card-text"><?php echo $myrow['description']  ?></p>
                <p><strong>Цена билета: </strong><?php echo $myrow['price']?>$</p>
                <p><strong>Дата выхода:</strong><?php echo $myrow['created_at']  ?></p>
                <p><strong>Жанр:</strong><?php echo $myrow['genre']  ?></p>
                <p><strong>Время:</strong><?php echo $myrow['time_watch']  ?></p>
                <p><strong>Режиссер:</strong><?php echo $myrow['director']  ?></p>
                <iframe width="100%" height="315" src="<?php echo $myrow['trailer']  ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Блок для комментариев -->
    <div class="comment-section">
        <!-- TODO Форма для коментариев  -->
        <form action="add_comment.php" method='POST'>
            <input type="hidden" name='film_id' value="<?php echo $id; ?>">

            <div class='mb-3'>
                <label for="author" class='form-label'>Ваше имя:</label>
                <input type="text" class='form-control' id='author' name='author' required>
            </div>


            <div class='mb-3'>
                <label for="comment" class='form-label'>Комментарии:</label>
                <textarea class='form-control' name="comment" id="comment" required></textarea>
            </div>

            <div class='mb-3'>
                <label for="rating" class='form-label'>Оценка(1-5)</label>
                <select class='form-control' name="rating" id="rating" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class='btn btn-primary'>Добавить</button>
        </form>





        <h5>Комментарии</h5>
        <?php 
        $comments = mysqli_query($link, "SELECT * FROM comments WHERE film_id=$id ORDER BY created_at DESC");
        while($comment = mysqli_fetch_array($comments)){
           echo "<div class='comment'>";
           echo "<p><strong>{$comment['author']} ({$comment['created_at']}):</strong> {$comment['comment']} <strong>Оценка:</strong> {$comment['rating']}</p>";
           echo "</div>";
        }
        ?>
    </div>
</div>

<!-- Футер -->
<?php include ('components/footer.php'); ?>
</body>
</html>
