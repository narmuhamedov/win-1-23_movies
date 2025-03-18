<?php 
include ("db.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title = trim($_POST['title']);

    if (!empty($title)) {
        $stmt = mysqli_prepare($link, "INSERT INTO movies(title) VALUE(?)");
        mysqli_stmt_bind_param($stmt, "s", $title);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo "Moive Created";
    }else{
        echo "Create your film!";
    }
}
?>

<form method="POST">
    <input type="text" name='title' placeholder='Create your film'>
    <button type='submit'>Create</button>
</form>