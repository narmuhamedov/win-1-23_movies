<?php 
include ("db.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title = trim($_POST['title']);

    if (!empty($title)) {
        $stmt = mysqli_prepare($link, "INSERT INTO movies(title) VALUE(?)");
        mysqli_stmt_bind_param($stmt, "s", $title);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }else{
        echo "Create your film!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Movie</title>
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

        input[type="text"] {
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
        <h2>Create Movie</h2>
        <form method="POST">
            <input type="text" name='title' placeholder='Enter movie title'>
            <button type='submit'>Create</button>
        </form>
        <br>
        <a href="/"><button>Главная</button></a>
        <div class="message">
            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo !empty($title) ? "Movie Created" : "Create your film!";
                }
            ?>
        </div>
    </div>

</body>
</html>
