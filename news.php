<?php
$title="News – Nippon Promotion";
$meta_title="News";
$meta_type="article";
$meta_url=( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$meta_site_name="Nippon Promotion";
$meta_description="Latest News about Nippon Promotion Project";
$meta_image="https://npp.world/images/facebook20Ikazuni20shutten_edited.jpg";

include "top.php";
require_once "config.php";
?>
<div id="sayfabilgisi" adi="performers" style="display: none;"></div>
<div class="icerik about">
  <div class="container">
    <div class="about-baslik">
      <?= _NEWS?>
      <br />
      <span class="about-baslik-iki">
      <?= _NEWS_SMALL ?>
      </span> </div>
  </div>
</div>
<div class="icerik about-content">
  <div class="container">
    <?php


    $url = ( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $url_components = parse_url( $url );

    parse_str( $url_components[ 'query' ], $params );

    if ( $params[ 'news_id' ] ) {

        $news_id = $params[ 'news_id' ];
       
		
		        // Create connection
        $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );


        $sql = "SELECT * FROM news where id=$news_id";
        $result = $conn->query( $sql );


        if ( $result->num_rows > 0 ) {
            // output data of each row

            while ( $row = $result->fetch_assoc() ) {
				
				
				
									$kimdeyiz=$row[ "id"];

	  $sql = "SELECT * FROM ceviriler where ceviri_tablosu='news' and fk_id='$kimdeyiz' and dil='$kimdil'";
$resultcev = $conn->query( $sql );
	  if ( $resultcev->num_rows > 0 ) {
		  while ( $rowcev = $resultcev->fetch_assoc() ) {

			  $yazi=$rowcev[ "metin"];
			  $baslik=$rowcev[ "baslik"];
		  
	  }}
		else
		{
			
				  $sql = "SELECT * FROM ceviriler where ceviri_tablosu='news' and fk_id='$kimdeyiz' and dil='en'";
$resultcev = $conn->query( $sql );

			while ( $rowcev = $resultcev->fetch_assoc() ) {
		  $yazi=$rowcev[ "metin"];
				$baslik=$rowcev[ "baslik"];
			}
	 
			
			
		}
				
				
				

                $gorselyolu = $row[ "gorsel" ];
                $monthNum = date( "m", strtotime( $row[ "eklenme_zamani" ] ) );
                $dayNum = date( "d", strtotime( $row[ "eklenme_zamani" ] ) );
                $yearNum = date( "y", strtotime( $row[ "eklenme_zamani" ] ) );
                $dateObj = DateTime::createFromFormat( '!m', $monthNum );
                $monthName = $dateObj->format( 'F' ); // March


                echo "
				
						
		    <div class='row'>
      <div class='col-lg-8 col-md-8 col-sm-12'>
        
        <div class='news-resim'> <img src='" . $row[ "gorsel" ] . "' width='100%' alt='Nippon Promotion Project News ". $baslik ."'> </div>
		<div class='news-baslik'>" . $baslik . "</div>
      </div>
      <div class='col-lg-4 col-md-4 col-sm-12'>
        <div class='news-kucuk-tarih '> <i class='far fa-calendar-check' style='color: red'></i>&nbsp;&nbsp;" . $monthName . " " . $dayNum . "," . $yearNum . "20 </div>
        <div class='sponsor-kutusu news-icinde'><img src='images/banner-here-ad.png' width='100%' alt='Nippon Promotion Project News Sponsor Banner'></div>
        <div class='sponsor-kutusu news-icinde'><img src='images/banner-here-ad.png' width='100%' alt='Nippon Promotion Project News Sponsor Banner'></div>
        <div class='sponsor-kutusu news-icinde'><img src='images/banner-here-ad.png' width='100%' alt='Nippon Promotion Project News Sponsor Banner'></div>
      </div>
    </div>
    <div class='row'>
      <div class='col-lg-12 col-md-12 col-sm-12'>
        <div class='news-yazilari'>" .$yazi. "
        </div>
      </div>
    </div>";


            }
        }

        $conn->close();
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		

    } else {
        // Create connection
        $conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );


        $sql = "SELECT * FROM news order by eklenme_zamani desc";
        $result = $conn->query( $sql );


        if ( $result->num_rows > 0 ) {
            // output data of each row

            while ( $row = $result->fetch_assoc() ) {

				
									$kimdeyiz=$row[ "id"];

	  $sql = "SELECT * FROM ceviriler where ceviri_tablosu='news' and fk_id='$kimdeyiz' and dil='$kimdil'";
$resultcev = $conn->query( $sql );
	  if ( $resultcev->num_rows > 0 ) {
		  while ( $rowcev = $resultcev->fetch_assoc() ) {

			  $yazi=mb_substr($rowcev[ "metin"], 0, 90);
			  $baslik=$rowcev[ "baslik"];
		  
	  }}
		else
		{
			
				  $sql = "SELECT * FROM ceviriler where ceviri_tablosu='news' and fk_id='$kimdeyiz' and dil='en'";
$resultcev = $conn->query( $sql );

			while ( $rowcev = $resultcev->fetch_assoc() ) {
		  $yazi=mb_substr($rowcev[ "metin"], 0, 90);
				$baslik=$rowcev[ "baslik"];
			}
	 
			
			
		}
				
				
				
                $gorselyolu = $row[ "gorsel" ];
                $monthNum = date( "m", strtotime( $row[ "eklenme_zamani" ] ) );
                $dayNum = date( "d", strtotime( $row[ "eklenme_zamani" ] ) );
                $yearNum = date( "y", strtotime( $row[ "eklenme_zamani" ] ) );
                $yazikucuk = mb_substr( $yazi, 0, 90 );
                $dateObj = DateTime::createFromFormat( '!m', $monthNum );
                $monthName = $dateObj->format( 'F' ); // March


                echo "
  	<a href='news.php?news_id=" . $row[ "id" ] . "'>
      <div class='haberler-ana-sayfa'>
        <div class='haberler-ana-resim-buyuk'><img src='" . $row[ "gorsel" ] . "' width='100%' alt='Nippon Promotion Project News ". $baslik ."'></div>
        <div class='haberler-ana-baslik'>" . $baslik . "</div>
        <div class='haberler-ana-tarih'>" . $monthName . " " . $dayNum . "," . $yearNum . "20</div>
        <div class='haberler-ana-yazi'>" . $yazikucuk . "...</div>
      </div>
		
		</a>
		
		";


            }
        }

        $conn->close();
    } //news gelmedi else


    ?>
<div style="clear: both"></div>
  </div>
    <div style="clear: both"></div>
  </div>
</div>
<?php
include "bottom.php";

?>
