<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="scribbles";
    $connection=mysqli_connect($server, $username, $password, $database);
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
    }
    
?>