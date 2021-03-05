<?php
$title="Performers – Nippon Promotion";
$meta_title="Performers";
$meta_type="article";
$meta_url=( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$meta_site_name="Nippon Promotion";
$meta_description="Online Japanese Cultural Festival Performers Nippon Promotion Project";
$meta_image="https://npp.world/images/facebook20Ikazuni20shutten_edited.jpg";
include "top.php";
require_once "config.php";
?>




   


<div id="sayfabilgisi" adi="performers" style="display: none;"></div>
<div class="icerik performers-header">
	 <div data-youtube="https://www.youtube.com/watch?v=2HGlIh9JsYE" style="z-index: -1"></div>
  <div class="container">
    <div class="performers-baslik-buyuk"><?= _OJCF ?></div>

    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>

<div class="icerik" style="background: #262528">
	<div class="container">
<div class="performers-baslik-buyuk" style="margin-top: 0"><?= _MENU_PERF ?></div>
		<div class="performers-baslik-kucuk"><?= _PAI ?></div>

		
	<?php	
	$conn = new mysqli( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME );
// Check connection
if ( $conn->connect_error ) {
    die( "Connection failed: " . $conn->connect_error );
}
$sql = "SELECT * FROM performers";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    // output data of each row
    while ( $row = $result->fetch_assoc() ) {
		
		$isim=str_replace('ş','s',str_replace('ü','u',strtolower(str_replace(' ', '_', $row[ "perf_name" ]))));
		
		echo"<a href='event/".$isim."'><div class='performers-person-box'  style='background-image:url(".$row[ "gorsel" ].")'>
	<div class='performers-name'>".$row[ "perf_name" ]."</div>
	<div class='performers-job'>".$row[ "perf_spec" ]."</div>
	
</div></a>";
    }
}


$conn->close();	
		
		
		?>
		


		
		
		
		
  <div style="clear:both;"></div>		
</div>
	
	
	
	
	
  <div style="clear:both;"></div>	
</div>




 <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('[data-youtube]').youtube_background();
			$(".youtube-background").css('z-index','-1')
        });
    </script>


<script src="js/yt-bg.js"></script>






<?php
include "bottom.php";

?>
