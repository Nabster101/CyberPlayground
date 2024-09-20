<!DOCTYPE html>

<html>
    <head>
        <title>CyberPlayground</title>
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        
        <div class='container' style='width:40%; text-align:justify; margin: 3vh auto 5vh auto; color:white'>
            <h1 style='text-align:center;>'>Cross-Site Scripting</h1>
            <p>Cross-Site Scripting (XSS) is a type of security vulnerability that allows attackers to inject malicious scripts into web pages viewed by other users. These scripts can steal sensitive information, deface websites, or redirect users to malicious websites. XSS attacks are categorized into different types, including stored, reflected, and DOM-based.</p>
        </div>
        

        <div class="container">
            <div class="row">
                <div class="col colCenter" style="margin-top:4vh!important">
                    <?php

                        echo "<form method='GET'>";
                        echo "<input type='text' name='username' placeholder='Username'>";
                        echo "<br>";
                        echo "<br>";
                        echo "<input type='submit' value='Login'>";
                        echo "</form>";

                        if(isset($_GET['username'])) {
                            $username = $_GET['username'];
                        }

                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col colCenter">
                    <?php

                        if(isset($username)) {
                            echo "<h2 style='color:white;'>Displaying: $username!</h2>";
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
        
        <script src="https://kit.fontawesome.com/44d253a4e8.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>