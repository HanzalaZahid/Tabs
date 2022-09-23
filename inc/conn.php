<?php

    // CREDENTIALS

    $host       =   "localhost";
    $user       =   "root";
    $pass       =   "";
    $database   =   "tabs";


    //CONNECTION

    $conn = new mysqli($host, $user, $pass, $database);

    // $class_methods = get_class_methods($conn);
    // foreach ($class_methods as $method_name) 
    // {
    //     echo "$method_name<br/>";
    // }

    if ($conn->connect_error)
    {
        die("Connection Failed: " . $conn->connect_error);
    }
    echo "Connection Successful <br>";
?>