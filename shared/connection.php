
<?php

    // Check if the file is accessed directly
    if ($_SERVER['SCRIPT_FILENAME'] == __FILE__) {
        exit("This file cannot be accessed directly.");
    }

    $hostnames = "localhost";
    $username = "root";
    $password = "";
    $dbname = "starmart";
    $port = 3307;

    $conn = mysqli_connect($hostnames, $username, $password, $dbname, $port);

?>