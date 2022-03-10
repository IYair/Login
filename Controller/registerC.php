<?php
session_start();
include('./config.php');
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $matricula = $_POST['matricula'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
    }
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(name,lastname,matricula,password,email,rol) VALUES (:name,:lastname,:matricula,:password_hash,:email,:rol)");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
        $query->bindParam("matricula", $matricula, PDO::PARAM_INT);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("rol", $rol, PDO::PARAM_INT);
        $result = $query->execute();
        if ($result) {
            echo '<p class="success">Your registration was successful!</p>';
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
}
?>