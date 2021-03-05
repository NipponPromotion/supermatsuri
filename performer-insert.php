<?php
// Initialize the session
session_start();


// Include config file
require_once "config.php";





$image = $_FILES['perfimages']['name'];

  	// image file directory
  	$target = "uploads/".time().'.png';

  	if (move_uploaded_file($_FILES['perfimages']['tmp_name'], $target)) {
  		echo "Image uploaded successfully";
  	}else{
  		echo "Failed to upload image";
  	}




// Create connection
$conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
$useridsi = $_SESSION[ "id" ];
$name =$_POST["perfname"];
$spec = $_POST[ 'perfspec' ];
$date = $_POST[ 'perfdate' ] ;
$time = $_POST[ 'perftime' ] ;
$desc=$_POST[ 'perfdesc' ] ;


if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}

    $sql = "insert into performers (perf_name,perf_spec,gorsel,aciklama,tarih,saat) values ('$name','$spec','$target','$desc','$date','$time')";
    if ( $conn->query( $sql ) === TRUE ) {
		$last_id = $conn->insert_id;
        echo "Kayıtlar eklendi";
		
		
	 $sql = "insert into ceviriler (ceviri_tablosu,fk_id,dil,metin) values ('performers','$last_id','en','$desc')";	
		  if ( $conn->query( $sql ) === TRUE ) {
        echo "Ceviri Eklendi";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
		
		$kategoriler="";


$sql="select * from performers where id='$last_id'";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    // output data of each row
    while ( $row = $result->fetch_assoc() ) {
		
		$yuklenenid=$row[ 'id'];
		
	}

}
	
	$sql="delete from performers_category where performers_id=$yuklenenid";
  if ( $conn->query( $sql ) === TRUE ) {
        echo "kategori kayitlari silindi";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	
	if(empty($_POST['coklucat']))
	{echo "boşi";}
		else
{echo "dolu";
foreach ($_POST["coklucat"] as $icon) 
{echo $icon;
$sql="select * from category where category_name='$icon'";
 $result = $conn->query( $sql );

	if ( $result->num_rows > 0 ) {
    // output data of each row
    while ( $row = $result->fetch_assoc() ) {
		$tamcatid=$row[ 'id'];
	$sql="insert into performers_category (performers_id,category_id) values ('$yuklenenid','$tamcatid')";
		  if ( $conn->query( $sql ) === TRUE ) {
        echo "kategori kayitlari silindi";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	}

}


}
		
		
		
	}	
		
		
		
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }











$conn->close();

header( "location:admin.php" );

?>
