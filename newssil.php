<?php
$baslik=$_POST['id'];

 require_once "config.php";

echo"girdik";

 // Create connection
        $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
        if ( $conn->connect_error ) {
            die( "Connection failed: " . $conn->connect_error );
        }
        $sql = "delete from news where id=$baslik";
        if ( $conn->query( $sql ) === TRUE ) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

 $conn->close();





       



?>