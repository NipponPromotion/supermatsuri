<?php
include "top.php";


// Include config file
require_once "config.php";


// Create connection
$conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
$useridsi = $_SESSION[ "id" ];
$url = ( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$url_components = parse_url( $url );

parse_str( $url_components[ 'query' ], $params );

$event_id = $params[ 'event_id' ];


?>
<div id="sayfabilgisi" adi="performers" style="display: none;"></div>

	

        <?php

        $sql = "SELECT * FROM performers where id=$event_id";
        $result = $conn->query( $sql );

        if ( $result->num_rows > 0 ) {
            // output data of each row
            while ( $row = $result->fetch_assoc() ) {
                $yenitarih = str_replace( "-", "", $row[ "tarih" ] );
                $yenisaat = str_replace( ":", "", $row[ "saat" ] );
                $tarih = $row[ "tarih" ];
                $saat = $row[ "saat" ];
                $perf_spec = $row[ "perf_spec" ];
                $perf_name = $row[ "perf_name" ];
				
				
				echo"
				
				<div class='icerik about'>
  <div class='container'>
    <div class='about-baslik'><span class='about-baslik-iki' style='color:red;'>" . $row[ "perf_name" ] . "</span> </div>
  </div>
</div>
<div class='icerik mb-8' style='margin-bottom: 10px;'>
<div class='container mt-4'>
<div class='row mb-6'>
				
				<div class='col-12 ' style='position: relative'><img src='" . $row[ "gorsel" ] . "' width='100%'>
				<div class='event-gorsel-ustu'>
    <div class='row'>
      <div class='col-6 event-gorsel-sol'>" . $row[ "perf_name" ] . " ( " . $row[ "perf_spec" ] . " )</div>
      <div class='col-6 text-right event-gorsel-sag'>" . $row[ "tarih" ] . " @ " . $row[ "saat" ] . "</div>
    </div>
  </div>
</div>
				<div class='col-12 mb-4'>
  <div class='event-baslik-kucuk'>EVENT SUMMARY</div>
</div>
			<div class='col-12 mb-4'>";
			
			
		

	  $sql = "SELECT * FROM ceviriler where ceviri_tablosu='performers' and fk_id='$event_id' and dil='$kimdil'";
$resultcev = $conn->query( $sql );
	  if ( $resultcev->num_rows > 0 ) {
		  while ( $rowcev = $resultcev->fetch_assoc() ) {

		  echo"  <div class='event-detay'>" . $rowcev[ "metin"]. "</div>";
		  
	  }}
		else
		{
			
				  $sql = "SELECT * FROM ceviriler where ceviri_tablosu='beauty' and fk_id='$event_id' and dil='en'";
$resultcev = $conn->query( $sql );

			while ( $rowcev = $resultcev->fetch_assoc() ) {
		  echo"  <div class='event-detay'>" . $rowcev[ "metin"]. "</div>";
			}
	 
			
			
		}
			
			
			
			

echo "</div>	
				<div class='col-12 event-sol p-4 '>
  <div class='row'>
    <div class='col-lg-3 col-md-6 col-sm-6'>
      <div class='event-baslik-kucuk'>Kürşad Ulusoy(Baglama)</div>
      <div class='event-baslik-kucuk'><a href='http://www.google.com/calendar/event?action=TEMPLATE&dates=".$yenitarih."T".$yenisaat."/".$yenitarih."T".$yenisaat."&text=Nippon%20Promotion%20Project%20-".$row[ "perf_name"]."%20Event&location=Online%2C%20Japan&details=".$row[ "perf_name"]."%20".$row[ "perf_spec"]."' target='_blank'>+Google Calender</a></div>
      <div class='event-baslik'> " . _EVENT_DETAILS . "</div>
      <div class='event-baslik-kucuk'> " . _EVENT_DATE . "</div>
      <div class='event-detay'>" . $row[ "tarih" ] . "</div>
      <div class='event-baslik-kucuk'> " . _EVENT_TIME . " </div>
      <div class='event-detay'>" . $row[ "saat" ] . "</div>
      <div class='event-baslik-kucuk'>" . _EVENT_CATEGORIES . "</div>
	  <div class='event-detay'>";
				
	  $sqlcat = "SELECT c.category_name as name FROM performers_category pc,category c where c.id=pc.category_id and pc.performers_id=$event_id";
        $resultcat = $conn->query( $sqlcat );

        if ( $resultcat->num_rows > 0 ) {
            // output data of each row
            while ( $rowcat = $resultcat->fetch_assoc() ) {
			
			echo $rowcat[ "name" ].", ";
			
			
			}	}	
				
      
		  
echo "</div>		  
    </div>
   <div class='col-lg-3 col-md-6 col-sm-6'>
      <div class='event-baslik'>" . _EVENT_ORGANISER . "</div>
     <a href='http://supermatsuri.com/' target='_blank'> <div class='event-detay'>Supermatsuri LLC</div></a>
      <div class='event-baslik-kucuk'>" . _EVENT_WEBSITE . "</div>
      <div class='event-detay'>npp.world</div>
    </div>
    <div class='col-lg-3 col-md-6 col-sm-6'>
      <div class='event-baslik'>" . _EVENT_VENUE . "</div>
      <div class='event-detay'>Online</div>
      <div class='event-baslik-kucuk'>Japan</div>
      <div class='event-detay'><a href='https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Japan' target='_blank'><i class='fas fa-map-marker-alt'></i>&nbsp;&nbsp;Google Maps</a></div>
      <div class='event-baslik-kucuk'>" . _EVENT_WEBSITE . "</div>
     <a href='http://npp.world' target='_blank'>   <div class='event-detay'>npp.world</div></a>
    </div>
    <div class='col-lg-3 col-md-6 col-sm-6'>
      <iframe width='100%' height='350px' frameborder='0' style='border:0;margin-top: 20px;' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyDNsicAsP6-VuGtAb1O9riI3oc_NOb7IOU&amp;q=FL+Japan+' allowfullscreen=''> </iframe>
    </div>
  </div>
</div>
		
	</div>
	</div>
	</div>


				";
				
				
	
            }

        }

        $conn->close();


        ?>	
	
	
	

  



	
	
	
	
	
	
	
	
	
	
	
	













<?php
include "bottom.php";
?>
