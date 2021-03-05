<?php
$baslik=$_POST['newsbaslik'];
$metin=$_POST['newsmetin'];



$target_dir = "uploads/";
$target_file = $target_dir.time().".png";


move_uploaded_file($_FILES['newsresim']['tmp_name'], 'uploads/' .time().".png");


session_start();
echo 'successfully uploaded';

 require_once "config.php";



 // Create connection
        $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
        $useridsi = $_SESSION[ "id" ];
        if ( $conn->connect_error ) {
            die( "Connection failed: " . $conn->connect_error );
        }
        $sql = "insert into news (baslik,metin,gorsel) values ('$baslik','$metin','$target_file')";
        if ( $conn->query( $sql ) === TRUE ) {
			$last_id = mysqli_insert_id($conn);
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

		
		$sql="insert into ceviriler (ceviri_tablosu,fk_id,dil,metin,baslik) values ('news','$last_id','en','$metin','$baslik')";
		if ( $conn->query( $sql ) === TRUE ) {
        echo "Kayıtlar eklendi cevirilere";}



 $conn->close();





       



?>