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
            <h1 style='text-align:center;>'>Cross-Site Scripting</h1>
            <p>Cross-Site Scripting (XSS) is a type of security vulnerability that allows attackers to inject malicious scripts into web pages viewed by other users. These scripts can steal sensitive information, deface websites, or redirect users to malicious websites. XSS attacks are categorized into different types, including stored, reflected, and DOM-based.</p>
        </div>
        

        <div class="container">
            <div class="row">
                <div class="col colCenter" style="margin-top:4vh!important">
                    <form method="GET">
                        <input type="text" name="search" placeholder="Search...">
                        <br><br>
                        <input type="submit" value="Search">
                    </form>

                    <!-- <script>alert('ao')</script> -->

                    <p id="results" style='color:white; margin-top:2vh;'></p>

                </div>
            </div>
            <div class="row">
                <div class="col colCenter" style="margin-top:4vh!important">
                    <?php

                        $dsn = 'pgsql:host=postgres;port=5432;dbname=database';
                        $username = 'user';
                        $password = '.UYr930Qr';

                        $pdo = new PDO($dsn, $username, $password);

                        if(isset($_SESSION['username'])) {
                            $user = $_SESSION['username'];
                            echo "<form method='POST'>";
                            echo "<h2 style='color:white;'>Welcome, " . $user . "!</h2>";
                            echo "<form method='POST'>";
                            echo "<textarea name='comment' placeholder='Enter your comment'></textarea>";
                            echo "<br><br>";
                            echo "<input type='submit' value='Submit Comment'>";
                            echo "</form>";

                            if (isset($_POST['comment'])) {
                                $user_comment = $user;
                                $comment = $_POST['comment'];
    
                                $sql = "INSERT INTO comments (username, comment) VALUES ('$user', '$comment')";
                                $stmt = $pdo->exec($sql);
                            }
                        }


                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col colCenter" style="margin-top:4vh!important;color:white">
                    <h2 style='color:white;'>Comments:</h2>
                    <?php
                        $sql = "SELECT * FROM comments";
                        $stmt = $pdo->query($sql);

                        if($stmt->rowCount() == 0) {
                            echo "<p>No comments yet.</p>";
                        }else{
                            while ($row = $stmt->fetch()) {
                                $usr = $row['username'];
                                $cmt = $row['comment'];
    
                                echo "<p><strong>$usr:</strong> $cmt</p>";
                            }
                        }

                    ?>
                </div>
            </div>
            <hr style='color:white'>
            <div class="row">
                <div class="col colCenter" style="margin-top:4vh!important">
                    <?php

                        echo "<a href='../index.php' id='home_button' class='homeButton'><i class='fa-solid fa-house' style='color:white'></i></a>";

                    ?>
                </div>
            </div>
        </div>

        <script>
            let urlParams = new URLSearchParams(window.location.search);
            let searchTerm = urlParams.get('search');
            
            if (searchTerm) {
                document.getElementById('results').innerHTML = "Search results for: " + searchTerm;
            }
        </script>
        
        <script src="https://kit.fontawesome.com/44d253a4e8.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>