<?php
$title="Interviews – Nippon Promotion";
$meta_title="Interviews";
$meta_type="article";
$meta_url=( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$meta_site_name="Nippon Promotion";
$meta_description="Interviews FROM NIPPON PROMOTION PROJECTS PROFESSIONAL CONTENT CREATORS  ";
$meta_image="https://npp.world/images/facebook20Ikazuni20shutten_edited.jpg";

include "top.php";

?>
<div id="sayfabilgisi" adi="interviews" style="display: none;"></div>
<div class="icerik stream">
  <div class="container">
	  
	      <div class="about-baslik">
      <?= _INTERVIEWS ?>
      <br />
      <span class="about-baslik-iki">
      <?= _INTERVIEWS_SMALL ?>
      </span> </div>
	  
	  
	  
    <div class="stream-video-channel">


      <iframe width="100%" height="500" src="https://www.youtube.com/embed/xXAxsH9i4v0?enablejsapi=1&amp;wmode=opaque" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" id="player_1"></iframe>
    </div>
	  
	   <div class="stream-video-channel">
      <iframe width="100%" height="500" src="https://www.youtube.com/embed/dqNgNXoL5tY?enablejsapi=1&amp;wmode=opaque" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" id="player_1"></iframe>
    </div>
	  
	  
	  
	  
	   <div class="stream-video-channel">
      <iframe width="100%" height="500" src="https://www.youtube.com/embed/TSuQEfGPPLM?enablejsapi=1&amp;wmode=opaque" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" id="player_1"></iframe>
    </div>
  </div>
</div>
<?php
include "bottom.php";

?>
