
<!DOCTYPE html>
<html>
    <head>
        <title>SQLi-pentest</title>
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="../logo.png">
    </head>

    <body>

        <?php

            try {
                $dsn = 'pgsql:host=postgres;port=5432;dbname=database';
                $username = 'user';
                $password = '.UYr930Qr';

                $pdo = new PDO($dsn, $username, $password);

                echo "<div class='container' style='width:40%; text-align:justify; margin: 3vh auto 5vh auto;'>";
                echo "<h1 style='text-align:center;>'>SQL Injection</h1>";
                echo "<p>SQL injection (SQLi) is a type of attack where an attacker can execute malicious SQL statements to manipulate a web application's database. This can lead to unauthorized access to sensitive data, modification of data, or even deletion of the entire database. SQLi attacks are categorized into different types, including in-band (same channel), inferential (blind), and out-of-band.</p>";
                echo "</div>";

                echo "<div class='container' id='login-form' style='display: block; text-align:center;'>";
                echo "<h2>Login</h2>";
                echo "<form method='GET'>";
                echo "<input type='text' name='username' placeholder='Username'>";
                echo "<br>";
                echo "<br>";
                echo "<input type='password' name='password' placeholder='Password'>";
                echo "<br>";
                echo "<br>";
                echo "<input type='submit' value='Login'>";
                echo "</form>";
                echo "</div>";    
                echo "<hr style='margin: 6vh auto 0 auto; width:50%; text-align:center;'>";

                if (isset($_GET['username']) && isset($_GET['password'])) {
                    $username = $_GET['username'];
                    $password = $_GET['password'];
                    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                    $stmt = $pdo->query($sql);

                    if ($stmt->rowCount() > 0) {
                        echo "<script>document.getElementById('login-form').style.display = 'none';</script>";
                        echo "<div class='container' style='text-align:center; margin: 3vh auto 3vh auto'>";
                        echo "<h2>Logged in</h2>";
                        echo "<p>Welcome, $username</p>";
                        echo "</div>";
                        
                        echo "<div class='container' style='text-align:center'>";
                        echo "<h1 class='tableTitle'>Users</h1>";
                        echo "<table class='userTable'>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>Password</th>";
                        echo "</tr>";
                        $sql = "SELECT * FROM users";
                        $result = $pdo->query($sql);
                        while($row = $result->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['password'] . "</td>";
                            echo "<td><a href='user.php?id=" . $row['id'] . "'>View</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";

                                
                        echo "<div style='text-align:center;'>";
                        echo "<a href='./app.php' id='logout_button' style='text-align:center; margin: 3vh; display:block;'>Logout</a>";
                        echo "</div>";

                    } else {
                        echo "<div style='text-align:center; margin: 3vh auto 3vh auto'>Invalid credentials</div>";
                    }
                } 

            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }

            echo "<br>";
            echo "<br>";
            echo "<div style='text-align:center;'>";
            echo "<a href='create.php' id='register_button' style='margin: 3vh;'>Create Account</a>";
            echo "</div>";

        ?>

        <div class="colCenter" style='text-align:center; margin-top:2vh;'>
            <?php

                echo "<a href='../index.php' id='home_button' style='font-size:3vh' class='homeButton'><i class='fa-solid fa-house' style='color:white'></i></a>";

            ?>
        </div>
    
    </body>
    <script src="https://kit.fontawesome.com/44d253a4e8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
