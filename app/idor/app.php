<?php
    session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <title>CyberPlayground</title>
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="indexTitleContainer">
            <h1 class="indexTitle">Totally legit cool website</h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="col colCenter">
                    <?php
                        $dsn = 'pgsql:host=postgres;port=5432;dbname=database';
                        $username = 'user';
                        $password = '.UYr930Qr';
        
                        $pdo = new PDO($dsn, $username, $password);

                        echo "<form method='GET'>";
                        echo "<input type='text' name='username' placeholder='Username'>";
                        echo "<br>";
                        echo "<br>";
                        echo "<input type='password' name='password' placeholder='Password'>";
                        echo "<br>";
                        echo "<br>";
                        echo "<input type='submit' value='Login'>";
                        echo "</form>";

                        if(isset($_GET['username']) && isset($_GET['password'])) {
                            $username = $_GET['username'];
                            $password = $_GET['password'];
                            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                            $stmt = $pdo->query($sql);

                            if ($stmt->rowCount() > 0) {
                                echo "<h2 style='color:white;'>Logged in</h2>";
                                echo "<p style='color:white;'>Welcome, $username</p>";
                                echo "<p style='color:white;'>Important info!</p>";
                            }
                        }

                        if(isset($_GET['username'])){
                            $username = $_GET['username'];
                            $sql = "SELECT * FROM users WHERE username = '$username'";
                            $stmt = $pdo->query($sql);
                            if ($stmt->rowCount() > 0) {
                                echo "<h2 style='color:white;'>Logged in</h2>";
                                echo "<p style='color:white;'>Welcome, $username</p>";
                            }
                        }
                    ?>
                </div>
            </div>
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