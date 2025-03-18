<?php 
include "db.php";
$result = mysqli_query($link, "
    SELECT movies.id, movies.title, GROUP_CONCAT(hastags.name ORDER BY hastags.name SEPARATOR ',')AS hastags FROM movies
    LEFT JOIN movie_hastags ON movies.id = movie_hastags.movie_id
    LEFT JOIN hastags ON movie_hastags.hastags_id = hastags.id
    GROUP BY movies.id");

echo "<ul>";

while($row = mysqli_fetch_assoc($result)){
    echo "<li>{$row['title']}-Tags:# {$row['hastags']}</li>";
}
echo "</ul>";
mysqli_free_result($result);
?>