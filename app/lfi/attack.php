<?php

    $file = '../password.txt';  
    if (file_exists($file)) {
        echo "<p>Contenuto del file:</p>";
        echo nl2br(file_get_contents($file));  
    } else {
        echo "<p>File non trovato.</p>";
    }

?>