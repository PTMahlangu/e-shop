<?php 
    // Database configuration 
    $Host     = 'sql10.freemysqlhosting.net'; 
    $Username = ''; 
    $Password = ''; 
    $DatabaseName     = 'sql10368085'; 

    // Create database connection 
    $conn = new mysqli($Host,$Username,$Password,$DatabaseName) or  die("Connection failed: " . $conn->connect_error); 

?>

