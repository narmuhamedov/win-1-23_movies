<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список фильмов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #e2e2e2;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .tags {
            color: #555;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Список фильмов</h2>
        <a href="/">На главную</a>
        <?php 
        include "db.php";
        
        $result = mysqli_query($link, "
            SELECT movies.id, movies.title, GROUP_CONCAT(hastags.name ORDER BY hastags.name SEPARATOR ', ') AS hastags FROM movies
            LEFT JOIN movie_hastags ON movies.id = movie_hastags.movie_id
            LEFT JOIN hastags ON movie_hastags.hastags_id = hastags.id
            GROUP BY movies.id");
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<li><strong>{$row['title']}</strong><br><span class='tags'># {$row['hastags']}</span></li>";
        }
        echo "</ul>";
        mysqli_free_result($result);
        ?>
    </div>
</body>
</html>
