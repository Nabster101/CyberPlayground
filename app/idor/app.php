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
                <div class="col colCenter" style="color:white">
                    <?php
                        $dsn = 'pgsql:host=postgres;port=5432;dbname=database';
                        $username = 'user';
                        $password = '.UYr930Qr';
        
                        $pdo = new PDO($dsn, $username, $password);


                        if (isset($_GET['username'])) {
                            $username = $_GET['username'];
                            $sql = "SELECT * FROM users WHERE username = '$username'";
                            $stmt = $pdo->query($sql);

                            echo "<h3 class='tableTitle' style='margin-top:4vh'>User profile</h3>";
                            echo "<table class='table' style='color:white; margin-top:3vh;'>";
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

                        echo "<a href='../index.php' id='home_button' class='homeButton'><i class='fa-solid fa-house' style='color:white'></i></a>";

                    ?>
                </div>
            </div>
        </div>
        
        <script src="https://kit.fontawesome.com/44d253a4e8.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>