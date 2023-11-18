<?php
    $servername = 'localhost';
    $username = 'Abdelouahed';
    $password = '1234';
    $db_name = 'data_banque';


    $connectionDB = new mysqli($servername, $username, $password , $db_name);

    if ($connectionDB->connect_error) {
        die("Connection failed: " . $connectionDB->connect_error);
    }

?> 