<!DOCTYPE html>

<html>
    <head>
        <title>CyberPlayground</title>
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="indexTitleContainer">
            <h1 class="indexTitle">Welcome to CyberPlayground</h1>
            <p>Let's learn together!</p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <?php

                        echo "<a href='/sqli/app.php' id='register_button' style='margin: 3vh;'>SQLi</a>";
                        echo "<a href='/xss/app.php' id='register_button' style='margin: 3vh;'>XSS</a>";

                    ?>
                </div>
            </div>
        </div>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>