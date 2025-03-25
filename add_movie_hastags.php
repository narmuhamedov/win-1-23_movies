<?php 
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_id = $_POST['movie_id'];
    $hastag = trim($_POST['hastag']);
    $hastags_id = null; // Variable to store hashtag ID

    if (!empty($hastag)) {
        // Check if the hashtag exists
        $stmt = mysqli_prepare($link, "SELECT id FROM hastags WHERE name = ?");
        mysqli_stmt_bind_param($stmt, 's', $hastag);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $hastags_id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // If hashtag doesn't exist, insert it
        if ($hastags_id === null) {
            $stmt = mysqli_prepare($link, "INSERT INTO hastags(name) VALUES(?)");
            mysqli_stmt_bind_param($stmt, 's', $hastag);
            mysqli_stmt_execute($stmt);
            $hastags_id = mysqli_insert_id($link); // Get the new hashtag ID
            mysqli_stmt_close($stmt);
        }
    }

    if (!empty($hastags_id)) {
        // Add the relationship between movie and hashtag
        $stmt = mysqli_prepare($link, "INSERT INTO movie_hastags(movie_id, hastags_id) VALUES(?, ?)");
        mysqli_stmt_bind_param($stmt, "ii", $movie_id, $hastags_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo "Tag Created for film";
    } else {
        echo "Error: Invalid tag";
    }
} else {
    echo 'Create tags';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Movie Tag</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Create Movie Tag</h2>
        <form method="POST">
            <input type="number" name="movie_id" placeholder="Create movie ID" required>
            <input type="text" name="hastag" placeholder="Create hashtag" required>
            <button type="submit">Create</button>
        </form>
        <div class="message">
            <?php 
                // Display message after form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo !empty($hastags_id) ? "Tag Created for film" : "Error: Invalid tag";
                }
            ?>
        </div>
    </div>

</body>
</html>
