<?php include ('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon"
          href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9RaqWhNrT68sVwQFo4ZAs1VRsUZImppmaqg&s">
    <link rel="stylesheet" href="css/index_style.css">
</head>
<body>

<!--Навигационная панель-->
<?php include ('components/navigation.php'); ?>
<!-- Контент с карточками -->
<div class="container mt-4 content">
    <div class="row justify-content-center">

    
    <?php
    $result = mysqli_query($link, "SELECT * FROM films");
    $myrow = mysqli_fetch_array($result);

    do{
        printf('  <div class="col-md-4 mb-4">
            <div class="card" style="width: 100;">
                <img src="%s" class="card-img-top" alt="вставьте логику картинки">
                <div class="card-body">
                    <h5 class="card-title">%s</h5>
                    <p class="card-text">%s</p>
                    <a href="show_detail.php?id=%s" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>', $myrow['image'], $myrow['title'], $myrow['created_at'], $myrow['id']);


    }while($myrow = mysqli_fetch_array($result))

    
    
    ?>
        <!-- Пример для еще одной карточки -->
      


    


    </div>
</div>


<!--Футер-->
<?php include ('components/footer.php'); ?>
</body>
</html>
