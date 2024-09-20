<!DOCTYPE html>

<html>
    <head>
        <title>CyberPlayground</title>
        <link rel="stylesheet" type="text/css" href="./styles.css">
    </head>

    <body>
        <div style="color:white">

            <?php

                if(isset($user)){
                    echo "<table class='userTable'>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Email</th>";
                    echo "<th>Password</th>";
                    echo "</tr>";
                    $sql = "SELECT * FROM users WHERE username = '$user'";
                    $result = $pdo->query($sql);
                    if($result->rowCount() > 0){
                        while($row = $result->fetch()) {
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
                    echo "</table>";
                }

                ?>

        </div>
    
    </body>
</html>