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
            <h1 style='text-align:center;>'>Command Injection</h1>
            <p>Command Injection is a type of vulnerability that allows attackers to execute arbitrary commands on a server. This can lead to unauthorized access to sensitive data, modification of files, or even complete control of the server. Command Injection attacks are categorized into different types, including direct command injections, blind command injections, and OS command injections.</p>
        </div>
        

        <div class="container" style="color:white">
            <div class="row">
                <div class="col colCenter">
                    <?php

                        // ; cat ../../../../etc/passwd; 

                        echo "<h3 class='tableTitle'>Ping test</h3>";
                        echo "<p>Enter an IP address to ping:</p>";

                        echo "<form method='POST'>";
                        echo "<input type='text' name='ip' placeholder='Enter ip to ping...'>";
                        echo "<input type='submit' value='Execute' style='margin-bottom:4vh'>";
                        echo "</form>";


                        if(isset($_POST['ip'])) {
                            include('ping.php');
                        }
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