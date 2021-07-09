<?php
    $host = "localhost";
    $user = "jinmopin";
    $pw = "wlswogus12!";
    $dbName = "jinmopin";
    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect -> set_charset("utf8");

    if( mysqli_connect_errno()) {
        echo "database connect false";
    } else {
        // echo "database connect true";
    }
    
?>