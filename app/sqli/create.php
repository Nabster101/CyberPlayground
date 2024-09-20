
<!DOCTYPE html>
<html>
    <head>
        <title>SQLi-pentest</title>
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

        <?php

            try {
                $dsn = 'pgsql:host=postgres;port=5432;dbname=database';
                $username = 'user';
                $password = '.UYr930Qr';

                $pdo = new PDO($dsn, $username, $password);

                echo "<div class='container' id='login-form' style='margin-top:5vh;display: block; text-align:center;'>";
                echo "<h2>Account Creation</h2>";
                echo "<form method='POST'>";
                echo "<input type='text' name='username' placeholder='Username'>";
                echo "<br>";
                echo "<br>";
                echo "<input type='email' name='email' placeholder='Email'>";
                echo "<br>";    
                echo "<br>";
                echo "<input type='text' name='password' placeholder='Password'>";
                echo "<br>";
                echo "<br>";
                echo "<input type='submit' value='Register'>";
                echo "</form>";
                echo "</div>";    
                echo "<hr style='margin: 6vh auto 0 auto; width:50%; text-align:center;'>";

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $id = random_int(3, 100000);
                    $sql = "INSERT INTO users (id,username, email, password) VALUES ($id, '$username', '$email', '$password')";

                    // Preparare ed eseguire la query
                    $stmt = $pdo->exec($sql);

                }


            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }

            echo "<div style='text-align:center;margin-top:3vh;'>";
            echo "<a href='../sqli/app.php' id='back_button' style='margin-top: 3vh;'>Back</a>";
            echo "</div>";
        ?>
    
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>