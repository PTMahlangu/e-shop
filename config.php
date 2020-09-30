<?php 
    // Database configuration 
    $Host     = 'localhost'; 
    $Username = 'root'; 
    $Password = ''; 
    $DatabaseName     = 'mbali'; 

    // Create database connection 
    $conn = new mysqli($Host,$Username,$Password,$DatabaseName) or  die("Connection failed: " . $conn->connect_error); 

?>

