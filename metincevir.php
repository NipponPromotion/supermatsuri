<?php
// Initialize the session
session_start();
 

if ( !isset( $_SESSION[ "loggedin" ] ) ) {
    header( "location: register.php" );
    exit;
}


// Include config file
require_once "config.php";
 $hata=0;
$ingilizce =$_POST["ingilizce"];
$japonca = $_POST[ 'japonca' ];
$turkce = $_POST[ 'turkce' ] ;
$tablo = $_POST[ 'tablo' ] ;
$fk_id= $_POST[ 'fk_id' ] ;


$conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
// Check connection
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}



$sql = "select * from ceviriler
where ceviri_tablosu='$tablo'
and fk_id='$fk_id'
and dil='en'";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
$sql = "update ceviriler set metin='$ingilizce'
where ceviri_tablosu='$tablo'
and fk_id='$fk_id'
and dil='en'";
    if ( $conn->query( $sql ) === TRUE ) {
		echo "ingilizce update edildi";
    } else {
		echo "ingilizce update edilemedi";
       $hata=1;
    }
}
else
{
	if ($ingilizce!=""){
    $sql = "insert into ceviriler (ceviri_tablosu,fk_id,dil,metin) values ('$tablo','$fk_id','en','$ingilizce')";	
    if ( $conn->query( $sql ) === TRUE ) {
		echo "ingilizce insert edildi";
    } else {
		echo "ingilizce insert edilemedi";
       $hata=1;
    }
	}
	
}

	
$sql = "select * from ceviriler
where ceviri_tablosu='$tablo'
and fk_id='$fk_id'
and dil='ja'";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
$sql = "update ceviriler set metin='$japonca'
where ceviri_tablosu='$tablo'
and fk_id='$fk_id'
and dil='ja'";
    if ( $conn->query( $sql ) === TRUE ) {
		echo "japonca update edildi";
    } else {
		echo "japonca update edilemedi";
       $hata=1;
    }
}
else
{if (japonca!=""){
    $sql = "insert into ceviriler (ceviri_tablosu,fk_id,dil,metin) values ('$tablo','$fk_id','ja','$japonca')";	
    if ( $conn->query( $sql ) === TRUE ) {
		echo "japonca insert edildi";
    } else {
		echo "japonca insert edilemedi";
       $hata=1;
    }
	
}
}



$sql = "select * from ceviriler
where ceviri_tablosu='$tablo'
and fk_id='$fk_id'
and dil='tr'";
$result = $conn->query( $sql );
if ( $result->num_rows > 0 ) {
$sql = "update ceviriler set metin='$turkce'
where ceviri_tablosu='$tablo'
and fk_id='$fk_id'
and dil='tr'";
    if ( $conn->query( $sql ) === TRUE ) {
		echo "turkce update edildi";
    } else {
		echo "turkce update edilemedi";
       $hata=1;
    }
}
else
{if ($turkce!=""){
    $sql = "insert into ceviriler (ceviri_tablosu,fk_id,dil,metin) values ('$tablo','$fk_id','tr','$turkce')";	
    if ( $conn->query( $sql ) === TRUE ) {
		echo "turkce insert edildi";
    } else {
		echo "turkce insert edilemedi";
       $hata=1;
    }
	
}
}


$conn->close();





?>
