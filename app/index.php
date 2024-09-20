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
            <h1 class="indexTitle">Welcome to CyberPlayground</h1>
            <p>Let's learn together!</p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col" style="text-align:center; color:white">
                <?php

                    try {
                        
                        $dsn = 'pgsql:host=postgres;port=5432;dbname=database';
                        $username = 'user'; 
                        $password = '.UYr930Qr';

                        $pdo = new PDO($dsn, $username, $password);

                        echo "<div class='container' style='margin-top:5vh'>";
                            echo "<div class='row'>";
                                echo "<div class='col-lg-6 col-md-12' style='margin-bottom:6vh; border-right: 2px solid;'>";
                                    echo "<h3 class='tableTitle'>Users</h3>";
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
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                echo "</div>";
                                echo "<div class='col-lg-6 col-md-12' style='margin-bottom:6vh;'>";
                                    echo "<h3>Login</h3>";
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
                            echo "</div>";
                        echo "</div>";

                        echo "<hr style='margin: 0 auto 4vh auto; width:50%; text-align:center;'>";


                        if (isset($_GET['username']) && isset($_GET['password'])) {
                            $username = $_GET['username'];
                            $password = $_GET['password'];
                            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                            $stmt = $pdo->query($sql);

                            if ($stmt->rowCount() > 0) {
                                $_SESSION['username'] = $_GET['username'];
                            } else {
                                echo "<div style='margin: 3vh auto 3vh auto'>Invalid credentials</div>";
                            }
                        } 

                    } catch (PDOException $e) {
                        echo 'Connection failed: ' . $e->getMessage();
                    }

                        if(isset($_SESSION['username'])){
                            $user = $_SESSION['username'];
                            echo "<h5>Logged in as $user</h5>";

                            echo "<div class='container' style='text-align:center;'>";
                            echo "<a href='logout.php' id='logout_button' style='margin: 3vh; display:block;'>Logout</a>";
                            echo "</div>";
                        }

                        

                    ?>
                </div>
            </div>
            <?php
                if(isset($_SESSION['username'])){
                    echo "<style> .check{ display:flex } </style>";
                }else{
                    echo "<style> .check{ display:none } </style>";
                }
            ?>
            <div class="row check">
                <div class="col-lg-4 col-sm-6">
                    <div class="attackContainer">
                        <h4 style="text-align:center;">SQL Injection</h4>
                        <p style="text-align:justify">SQL injection (SQLi) is a type of attack where an attacker can execute malicious SQL statements to manipulate a web application's database. This can lead to unauthorized access to sensitive data, modification of data, or even deletion of the entire database. SQLi attacks are categorized into different types, including in-band (same channel), inferential (blind), and out-of-band.</p>
                        <button class="btn btn-primary" onclick="window.location.href='/sqli/app.php'">Start</button>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="attackContainer">
                        <h4 style="text-align:center;">Cross-Site Scripting</h4>
                        <p style="text-align:justify">Cross-Site Scripting (XSS) is a type of security vulnerability that allows attackers to inject malicious scripts into web pages viewed by other users. These scripts can steal sensitive information, deface websites, or redirect users to malicious websites. XSS attacks are categorized into different types, including stored, reflected, and DOM-based.</p>
                        <button class="btn btn-primary" onclick="window.location.href='/xss/app.php'">Start</button>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="attackContainer">
                        <h4 style="text-align:center;">Local File Inclusion</h4>
                        <p style="text-align:justify">Local File Inclusion (LFI) is a type of vulnerability that allows an attacker to include files on a server through the web browser. This can lead to unauthorized access to sensitive files, such as configuration files, source code, or even system files. LFI attacks are categorized into different types, including direct and indirect.</p>
                        <button class="btn btn-primary" onclick="window.location.href='/lfi/app.php'">Start</button>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="attackContainer">
                        <h4 style="text-align:center;">Command Injection</h4>
                        <p style="text-align:justify">Command Injection is a type of vulnerability that allows attackers to execute arbitrary commands on a server. This can lead to unauthorized access to sensitive data, modification of files, or even complete control of the server. Command Injection attacks are categorized into different types, including blind, time-based, and out-of-band.</p>
                        <button class="btn btn-primary" onclick="window.location.href='/cmi/app.php'">Start</button>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="attackContainer">
                        <h4 style="text-align:center;">Insecure Direct Object Reference</h4>
                        <p style="text-align:justify">Insecure Direct Object Reference (IDOR) is a type of vulnerability that allows attackers to access unauthorized resources on a server. This can lead to unauthorized access to sensitive data, such as user accounts, files, or database records. IDOR attacks are categorized into different types, including direct and indirect.</p>
                        <?php
                            $user = $_SESSION['username'];
                            echo "<a class='btn btn-primary' href='../idor/app.php?username=" . urlencode($user) . "' >Start</a>";
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="attackContainer">
                        <h4 style="text-align:center;">Cross-Site Request Forgery</h4>
                        <p style="text-align:justify">Cross-Site Request Forgery (CSRF) is a type of attack where an attacker tricks a user into performing actions on a website without their knowledge or consent. This can lead to unauthorized transactions, data manipulation, or account takeover. CSRF attacks are categorized into different types, including stored, reflected, and DOM-based.</p>
                        <button class="btn btn-primary" onclick="window.location.href='/csrf/app.php'">Start</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>