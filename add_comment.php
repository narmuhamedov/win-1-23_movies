<?php 
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $film_id = $_POST['film_id'];
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $comment = mysqli_real_escape_string($link, $_POST['comment']);
    $rating = (int)$_POST['rating'];

    $query = "INSERT INTO comments(film_id, author, comment, rating)VALUES('$film_id',
    '$author', '$comment', '$rating')";
    
    if (mysqli_query($link, $query)) {
        header("Location: show_detail.php?id=$film_id");
        exit();
    }else{
        echo "Ошибка: ".mysqli_error($link);
    }

}

?>