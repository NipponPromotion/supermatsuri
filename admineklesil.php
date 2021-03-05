<?php
$kullanici=$_POST['id'];
$islem=$_POST['islem'];

 require_once "config.php";



 // Create connection
        $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
        if ( $conn->connect_error ) {
            die( "Connection failed: " . $conn->connect_error );
        }


if ($islem=="ekle")
{$sql = "insert into admins (fk_users_id) values ('$kullanici')";}

if ($islem=="sil")
{$sql = "delete from admins where fk_users_id=$kullanici";}

        
        if ( $conn->query( $sql ) === TRUE ) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

 $conn->close();





       



?>