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
        <h5>Комментарии</h5>
        <div class="comment">
            <p> (2024-09-24): Офигенный фильм! Рекомендую! <strong>Оценка:</strong> 5</p>
        </div>
    </div>
</div>

<!-- Футер -->
<?php include ('components/footer.php'); ?>
</body>
</html>
