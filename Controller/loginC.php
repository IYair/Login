<?php
    
    include('./config.php');
    if (isset($_POST['login'])) {
        $matricula = $_POST['matricula'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE matricula=:matricula");
        $query->bindParam("matricula", $matricula, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            session_start();
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['matricula'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
                header('Location: ../View/profile.php');
                    die();
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
    }
?> 
