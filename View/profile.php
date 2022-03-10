<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // En caso contrario devolvemos a la página login.php
    header('Location: ./login.html');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="index.html" class="brand-logo"><i class="material-icons">school</i>Portal</a>
            <ul id="nav-mobile" class="right">
                <li><a href="index.html">Home</a></li>
                <li><a href="#"><?= $_SESSION['user_id'] ?></a></li>
                <li><a href="../Controller/logout.php">Log out</a></li>
            </ul>
        </div>
    </nav>
    <script src="./View/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>