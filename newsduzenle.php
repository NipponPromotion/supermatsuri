<?php
$baslik=$_POST['newsdbaslik'];
$metin=$_POST['newsdmetin'];
$newsidd=$_POST['newsidd'];
$resimyolu=$_POST['resimyolu'];


if(isset($_FILES['newsdresim'])){
	
$target_dir = "uploads/";
$target_file = $target_dir.time().".png";
move_uploaded_file($_FILES['newsdresim']['tmp_name'], 'uploads/' .time().".png");	
	
}

else
{
	$target_file=$resimyolu;
}


session_start();
echo 'successfully uploaded';

 require_once "config.php";



 // Create connection
        $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
        if ( $conn->connect_error ) {
            die( "Connection failed: " . $conn->connect_error );
        }
        $sql = "update news set baslik='$baslik',metin='$metin',gorsel='$target_file' where id='$newsidd'";
        if ( $conn->query( $sql ) === TRUE ) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

		 $sql = "update ceviriler set baslik='$baslik',metin='$metin'where fk_id='$newsidd' and ceviri_tablosu='news' and dil='en'";
        if ( $conn->query( $sql ) === TRUE ) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
		

		

 $conn->close();





       



?>