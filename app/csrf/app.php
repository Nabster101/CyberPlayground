<?php
    session_start();
    $dsn = 'pgsql:host=postgres;port=5432;dbname=database';
    $username = 'user';
    $password = '.UYr930Qr';

    $pdo = new PDO($dsn, $username, $password);
?>


<!DOCTYPE html>

<html>
    <head>
        <title>CyberPlayground</title>
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="../logo.png">
    </head>

    <body>
        <div class='container' style='width:40%; text-align:justify; margin: 3vh auto 5vh auto; color:white'>
            <h1 style='text-align:center;>'>Cross-Site Request Forgery</h1>
            <p>Cross-Site Request Forgery (CSRF) is a type of attack where an attacker tricks a user into performing actions on a website without their knowledge or consent. This can lead to unauthorized transactions, data manipulation, or account takeover. CSRF attacks are categorized into different types, including stored, reflected, and DOM-based.</p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col colCenter">
                    <div class="content">
                        <?php
                            $user = $_SESSION['username'];
                            echo "<h3 class='tableTitle'>Welcome $user</h3>";
                            echo "<p>This form is to change your password!</p>";

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $newPassword = $_POST['password'];
                                
                                $sql = "UPDATE users SET password='$newPassword' WHERE username='$user'";
                                $stmt = $pdo->query($sql);
                            }


                        ?>

                        <form method="POST" action="">
                            <label>Nuova password:</label>
                            <input type="password" name="password">
                            <button type="submit">Change password!</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col colCenter">
                    <button class="btn btn-danger" onclick="window.location.href='attack.html'">Inject code!</button>
                </div>
            </div>

            <hr style='color:white; margin-top:5vh'>

            <div class="row">
                <div class="col colCenter">
                    <?php

                        echo "<a href='../index.php' id='home_button' class='homeButton'><i class='fa-solid fa-house' style='color:white'></i></a>";

                    ?>
                </div>
            </div>
        </div>
        
        <script src="https://kit.fontawesome.com/44d253a4e8.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>