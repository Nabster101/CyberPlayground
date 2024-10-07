<?php
    session_start();
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
            <h1 style='text-align:center;>'>Insecure Direct Object Reference</h1>
            <p style="text-align:justify">An Insecure Direct Object Reference (IDOR) attack occurs when a web application exposes references to internal objects, like database records or files, through user inputs, without proper authorization checks. Attackers can manipulate these references (such as IDs or usernames in URLs) to access or modify data they shouldn't be allowed to view, leading to unauthorized access to sensitive information.</p>
        </div>
        

        <div class="container">
            <div class="row">
                <div class="col colCenter" style="color:white">
                    <?php
                        $dsn = 'pgsql:host=postgres;port=5432;dbname=database';
                        $username = 'user';
                        $password = '.UYr930Qr';
        
                        $pdo = new PDO($dsn, $username, $password);


                        if (isset($_GET['user'])) {
                            $user = $_GET['user'];
                            $sql = "SELECT * FROM users WHERE username = '$user'";
                            $stmt = $pdo->query($sql);

                            echo "<h3 class='tableTitle' style='margin-top:4vh; margin-bottom: 4vh'>User profile</h3>";
                            echo "<table class='table' style='color:white; margin: 0 auto; width: 50%'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th scope='col'>ID</th>";
                                        echo "<th scope='col'>Name</th>";
                                        echo "<th scope='col'>Email</th>";
                                        echo "<th scope='col'>Password</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                    if($stmt->rowCount() > 0){
                                        while($row = $stmt->fetch()) {
                                            echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . $row['username'] . "</td>";
                                                echo "<td>" . $row['email'] . "</td>";
                                                echo "<td>" . $row['password'] . "</td>";
                                            echo "</tr>";
                                        }
                                    }else{
                                        echo "<tr>";
                                            echo "<td colspan='4'>Invalid username!</td>";
                                        echo "</tr>";
                                    }
                                echo "</tbody>";
                            echo "</table>";
                        }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col colCenter">
                    <?php
                        echo "<p style='color:white'>Currently logged in as: <b>" . $_SESSION['username'] . "</b></p>";
                    ?>
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