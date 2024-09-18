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
                        echo "<input type='text' name='profile' placeholder='Search for user profile...'>";
                        echo "<br>";
                        echo "<br>";
                        echo "<input type='submit' value='login'>";
                        echo "</form>";
    

                        if (isset($_GET['profile'])) {
                            $user = $_GET['profile'];
                            include($user);
                            $sql = "SELECT * FROM users WHERE username = '$username'";
                            $stmt = $pdo->query($sql);
                            if ($stmt->rowCount() > 0) {
                                echo "<script>document.getElementById('login-form').style.display = 'none';</script>";
                                echo "<h2>Logged in</h2>";
                                echo "<p>Welcome, $username</p>";
                                
                                echo "<div class='container'>";
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
        
                                        
                                echo "<div class='container' style='text-align:center;'>";
                                echo "<a href='index.php' id='logout_button' style='margin: 3vh; display:block;'>Logout</a>";
                                echo "</div>";
        
                            } else {
                                echo "<div style='margin: 3vh auto 3vh auto'>Invalid credentials</div>";
                            }
                        } else {
                            echo "<p style='color:red;'>No file specified!</p>";
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