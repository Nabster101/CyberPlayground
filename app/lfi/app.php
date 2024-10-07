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
            <h1 style='text-align:center;>'>File Inclusion</h1>
            <p>File inclusion attacks are a type of web vulnerability that occurs when a web application includes files dynamically, without properly validating the input provided by users. These vulnerabilities allow an attacker to include unauthorized files, potentially leading to the execution of malicious code, data theft, or server compromise.</p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col colCenter" style="color:white; margin-top:4vh!important">
                    <?php

                        $dsn = 'pgsql:host=postgres;port=5432;dbname=database';
                        $username = 'user';
                        $password = '.UYr930Qr';

                        $pdo = new PDO($dsn, $username, $password);

                        echo "<h3 class='tableTitle'>Imporant info to display</h3>";
                        echo "<p>Some important information to display here...</p>";
                        
                        echo "<form method='GET'>";
                        echo "<input type='text' name='file' placeholder='Search for data to show...'>";
                        echo "<br>";
                        echo "<br>";
                        echo "<input style='margin-bottom:3vh' type='submit' value='search'>";
                        echo "</form>";                        

                        if (isset($_GET['file'])) {
                            
                            $data = $_GET['file'];
                            if(!include($data)){
                                echo "<p>File not found!</p>";
                            }
                        } 
                        

                    ?>
                </div>
            </div>

            <hr style='color:white'>

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