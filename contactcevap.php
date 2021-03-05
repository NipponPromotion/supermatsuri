<?php

$kim = $_POST['kim'];

// Include config file
require_once "config.php";

$conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}
$date = date("Y-m-d");
	$sql="update contact set answered='1', answertime='$date' where id='$kim'";
		if ( $conn->query( $sql ) === TRUE ) {
        echo "Kayıtlar eklendi contactlara";}
// Düzenleme: Domainhizmetleri.com

